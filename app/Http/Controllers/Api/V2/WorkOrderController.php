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

        switch($workOrder->type){
            case 'Sifra':
                
                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('autor', $workOrder->proposition->author);
                //$templateProcessor->setValue('podrucje', $workOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Ugovor':
                
                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);

                //Podatci o djelu
                $templateProcessor->setValue('autor', $workOrder->proposition->author);
                $templateProcessor->setValue('izdanja', $workOrder->book->createdAt);
                $templateProcessor->setValue('naklada', $workOrder->proposition->edition);
                //$templateProcessor->setValue('vrstaPosla', $workOrder->);
                //$templateProcessor->setValue('vrstaAutorskogUgovora', $workOrder->);

                //Podatci o autoru/suradniku
                //$templateProcessor->setValue('contractor.firstName', $workOrder->);
                //$templateProcessor->setValue('contractor.lastName', $workOrder->);
                //$templateProcessor->setValue('contractor.email', $workOrder->);
                //$templateProcessor->setValue('contractor.phone', $workOrder->);
                //$templateProcessor->setValue('contractor.address', $workOrder->);
                //$templateProcessor->setValue('contracotr.city', $workOrder->);
                //$templateProcessor->setValue('contractor.poslaCode', $workOrder->);
                //$templateProcessor->setValue('percentageFee', $workOrder->);
                //$templateProcessor->setValue('freeCopies', $workOrder->);
                //$templateProcessor->setValue('freeCopiesReprint', $workOrder->);
                //$templateProcessor->setValue('contractorNote', $workOrder->);

                //Podatci o autorskom honoraru
                //$templateProcessor->setValue('jednokratnaIsplata', $workOrder->);
                //$templateProcessor->setValue('postotakIsplata', $workOrder->);
                //$templateProcessor->setValue('jobDesc', $workOrder->);

                //Podatci o rukopisu
                //$templateProcessor->setValue('tipPredaje', $workOrder->);
                $templateProcessor->setValue('rokPredaje', $workOrder->deadlineAt);
                //$templateProcessor->setValue('dinamikaIsplate', $workOrder->);

                //Napomena
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Anotacija':

                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                $templateProcessor->setValue('urednik', $workOrder->proposition->editors->name);
                $templateProcessor->setValue('autor', $workOrder->proposition->author);
                $templateProcessor->setValue('naslov', $workOrder->proposition->title);
                //$templateProcessor->setValue('izdavac', $workOrder->);
                $templateProcessor->setValue('uvez', $workOrder->proposition->bookBinding);
                $templateProcessor->setValue('broj_stranica', $workOrder->proposition->numberOfPages);
                $templateProcessor->setValue('godina_izdanja', $workOrder->book->createdAt);
                $templateProcessor->setValue('isbn', $workOrder->proposition->isbn);
                //$templateProcessor->setValue('format', $workOrder->);
                $templateProcessor->setValue('cijena', $workOrder->proposition->retailPrice);
                //$templateProcessor->setValue('podrucje', $workOrder->);
                $templateProcessor->setValue('prodajne_poruke', $workOrder->comment);
                //$templateProcessor->setValue('posebnost', $workOrder->);
                $templateProcessor->setValue('o_djelu', $workOrder->book->description);
                $templateProcessor->setValue('o_autoru', $workOrder->proposition->author);
                //$templateProcessor->setValue('iz_recenzije', $workOrder->);
                //$templateProcessor->setValue('poglavlja', $workOrder->);
                //$templateProcessor->setValue('prevoditelj', $workOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Lektura':

                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                //$templateProcessor->setValue('textCards',$workOrder);
                $templateProcessor->setValue('title',$workOrder->proposition->title);
                //$templateProcessor->setValue('pravopis',$workOrder);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");
                
            case 'Glr':

                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);

                //Dodatni podatci
                $templateProcessor->setValue('urednik', $workOrder->proposition->editors->name);
                $templateProcessor->setValue('autor', $workOrder->proposition->author);
                $templateProcessor->setValue('godinaPosljednjegIzdanja', $workOrder->book->updateAt);
                //$templateProcessor->setValue('vrstaPosla',$workdOrder->);
                //$templateProcessor->setValue('razradaPosla',$workdOrder->);

                //Tehnicki podatci
                //$templateProcessor->setValue('format',$workdOrder->);
                $templateProcessor->setValue('opseg',$workOrder->proposition->width * $workOrder->proposition->height);
                $templateProcessor->setValue('rok',$workOrder->deadlineAt);
                //$templateProcessor->setValue('bojeKnjBloka',$workOrder->);
                //$templateProcessor->setValue('bojeOmota',$workOrder->);
                $templateProcessor->setValue('uvez', $workOrder->proposition->bookBinding);

                //Obogacivanje
                //$templateProcessor->setValue('zappar',$workOrder->);
                //$templateProcessor->setValue('mozzabook',$workOrder->);
                //$templateProcessor->setValue('esfera',$workOrder->);
                //$templateProcessor->setValue('listalica',$workOrder->);
                $templateProcessor->setValue('odobrenje',$workOrder->proposition->approved);

                //Napomena
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");
                
            case 'Redaktura':

                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                $templateProcessor->setValue('brojStranica', $workOrder->proposition->numberOfPages);
                //$templateProcessor->setValue('nacinDostave',$workdOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Listalica':
                
                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                //$templateProcessor->setValue('popisDuplerica',$workdOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Isporuka':
                
                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                //$templateProcessor->setValue('ime',$workdOrder->);
                //$templateProcessor->setValue('adresa',$workdOrder->);
                //$templateProcessor->setValue('mobitel',$workdOrder->);
                //$templateProcessor->setValue('svrha',$workdOrder->);
                //$templateProcessor->setValue('kolicina',$workdOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");

            case 'Drim':

                $templateProcessor = new TemplateProcessor(resource_path('resources/nalog.anotacija.docx'));
                $workOrder->proposition->load(['owner']);

                $templateProcessor->setValue('taskType', $workOrder->type);
                $templateProcessor->setValue('assigner.name', $workOrder->assigner->name);
                $templateProcessor->setValue('assignee.name', $workOrder->assignee->name);
                $templateProcessor->setValue('createdAt', $workOrder->createdAt);
                $templateProcessor->setValue('deadlineAt', $workOrder->deadlineAt);
                $templateProcessor->setValue('title', $workOrder->proposition->title);
                $templateProcessor->setValue('projectNumber', $workOrder->proposition->projectNumber);
                //$templateProcessor->setValue('vrstaPlatforme', $workdOrder->);
                //$templateProcessor->setValue('opisPosla', $workdOrder->);
                $templateProcessor->setValue('note', $workOrder->note);
                $templateProcessor->setValue('owner', $workOrder->proposition->owner->name);
                $templateProcessor->setValue('date', $workOrder->proposition->date);

                ob_start();
                $templateProcessor->saveAs("php://output");
                $contents = ob_get_contents();
                ob_end_clean();

                return response()->streamDownload(function () use ($contents){
                    echo $contents;
                }, "nalog-{$workOrder->type}-{$workOrder->id}.docx");
        }

        return response()->download(storage_path("downloadPDF"));

    }

}
