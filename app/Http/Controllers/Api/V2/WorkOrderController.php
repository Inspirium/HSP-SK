<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderQuery;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderRequest;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderSchema;
use Inspirium\Models\WorkOrder;
use Inspirium\Notifications\WorkOrderApproved;
use Inspirium\Notifications\WorkOrderSignatureRequested;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

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
        if ($workOrder->signatures) {
            //send notification to first one
            $workOrder->signatures[0]->employee->notify(new WorkOrderSignatureRequested($workOrder));
        }
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

}
