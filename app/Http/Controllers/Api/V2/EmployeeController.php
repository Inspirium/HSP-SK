<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Inspirium\Http\Controllers\Controller;
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

}
