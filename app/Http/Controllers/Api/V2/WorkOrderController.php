<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderQuery;
use Inspirium\JsonApi\V2\WorkOrders\WorkOrderRequest;
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

}
