<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Support\Facades\Auth;
use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\Propositions\PropositionQuery;
use Inspirium\JsonApi\V2\Propositions\PropositionRequest;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

class PropositionController extends Controller
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

    public function created(BookProposition $model, PropositionRequest $request, PropositionQuery $query) {
        if (!$model->owner_id) {
            $model->owner()->associate(Auth::user());
            $model->save();
        }
    }

}
