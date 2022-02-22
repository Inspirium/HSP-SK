<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderQuery;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderRequest;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderSchema;
use Inspirium\Models\WorkOrder;
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
    }

    public function approve(WorkOrderSchema $orderSchema, WorkOrderQuery $query, WorkOrder $workOrder) {
        $workOrder->signatures()->updateExistingPivot(Auth::id(), ['signed' => 1, 'signed_at' => Date::now()]);
    }

}
