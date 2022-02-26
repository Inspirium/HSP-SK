<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Inspirium\Actions\SaveImageAction;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\Employees\EmployeeQuery;
use Inspirium\JsonApi\V2\Employees\EmployeeRequest;
use Inspirium\JsonApi\V2\Employees\EmployeeSchema;
use Inspirium\Models\HumanResources\Employee;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

class EmployeeController extends Controller
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

    public function me() {
        return DataResponse::make(\Auth::user());
    }

    public function saved(Employee $employee, EmployeeRequest $request, EmployeeQuery $query) {
        $image = $request->data['attributes']['image'];
        if ($image && str_contains($image, 'data')) {
            $saveImageAction = new SaveImageAction();
            $employee->image = $saveImageAction->execute($image, 'avatars');
            $employee->save();
        }
    }
}
