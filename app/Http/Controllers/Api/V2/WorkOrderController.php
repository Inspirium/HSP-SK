<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderQuery;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderRequest;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderSchema;
use Inspirium\Models\WorkOrder;
use Inspirium\Notifications\WorkOrderApproved;
use Inspirium\Notifications\WorkOrderSignatureRequested;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;
use PhpOffice\PhpWord\TemplateProcessor;

class WorkOrderController extends Controller
{

    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Store;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;


    public function created(WorkOrder $workOrder, WorkOrderRequest $request, WorkOrderQuery $query) {
        if (!$workOrder->assigner_id) {
            $workOrder->assigner()->associate(\Auth::user());
            $workOrder->save();
        }
        $workOrder->assignNewThread();
    }

    public function approve(WorkOrderSchema $orderSchema, WorkOrderQuery $query, WorkOrder $workOrder) {
        $workOrder->signatures()->where('employee_id', Auth::id())->update(['signed' => true, 'signed_at' => Date::now()]);
        $next = $workOrder->signatures()->where('signed', false)->orderBy('order')->first();
        if ($next) {
            $next->employee->notify(new WorkOrderSignatureRequested($workOrder));
        } else {
            $workOrder->assignee->notify(new WorkOrderApproved($workOrder));
        }
    }

    public function download(WorkOrder $workOrder){
        $templateProcessor = new TemplateProcessor(resource_path(''));
        $workOrder->proposition->load(['owner']);

        $templateProcessor->setValue('project_name', $workOrder->proposition->project_name);
        $templateProcessor->setValue('circulation', $workOrder->proposition->circulations);
        $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
        $templateProcessor->setValue('date', $workOrder->proposition->date);
        $templateProcessor->setValue('note', $workOrder->note);
        $templateProcessor->setValue('book_binding', $workOrder->proposition->book_binding);
        $templateProcessor->setValue('colors', $workOrder->proposition->colors);
        $templateProcessor->setValue('colors_first_page', $workOrder->proposition->colors_first_page);
        $templateProcessor->setValue('colors_last_page', $workOrder->proposition->colors_last_page);
        $templateProcessor->setValue('additional_work', $workOrder->proposition->additional_work);
        $templateProcessor->setValue('task_type', $workOrder->type);
        $templateProcessor->setValue('paper_type', $workOrder->proposition->options[0]->paper_type);

        $sum = 0;
        foreach($workOrder->proposition->options()->where('cover_type', 'hard')->get() as $option) {
            $sum += $option->hard_cover_circulation;
        }
        $templateProcessor->setValue('hard_cover_circulation', $sum);

        $sum = 0;
        foreach($workOrder->proposition->options()->where('cover_type', 'soft')->get() as $option) {
            $sum += $option->hard_cover_circulation;
        }
        $templateProcessor->setValue('soft_cover_circulation', $sum);

        $templateProcessor->setValue('cover_paper_type', $workOrder->proposition->options[0]->cover_paper_type);
        $templateProcessor->setValue('cover_colors', $workOrder->proposition->options[0]->cover_colors);
        $templateProcessor->setValue('cover_plastification', $workOrder->proposition->options[0]->cover_plastification);
        $templateProcessor->setValue('film_print', $workOrder->proposition->options[0]->film_print);
        $templateProcessor->setValue('blind_print', $workOrder->proposition->options[0]->blind_print);
        $templateProcessor->setValue('uv_print', $workOrder->proposition->options[0]->uv_print);
        
        /*
        $templateProcessor->setValue('coverpaper_paper_type');
        $templateProcessor->setValue('coverpaper_colors');
        $templateProcessor->setValue('coverpaper_plastification');
        $templateProcessor->setValue('coverpaper_film_print');
        $templateProcessor->setValue('cpverpaper_blind_print');
        $templateProcessor->setValue('coverpaper_uv_print');
        */

        $templateProcessor->saveAs(storage_path(""));

        return response()->download(storage_path(""));
    }

}
