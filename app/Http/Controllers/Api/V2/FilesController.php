<?php

namespace Inspirium\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inspirium\Http\Controllers\Controller;
use Inspirium\JsonApi\V2\Files\FileQuery;
use Inspirium\Models\FileManagement\File;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

class FilesController extends Controller
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

    public function store(Request $request, FileQuery $query) {
        if(!$request->hasFile('file')) {
            return response()->json(['result' => 'error', 'message' => 'Upload file not found'], 400);
        }
        $file = $request->file('file');
        if(!$file->isValid()) {
            return response()->json([ 'result' => 'error', 'message' => 'Invalid file upload'], 400);
        }
        $disk = $request->input('disk', 'public');
        $dir = $request->input('dir', 'public');

        $path = $file->store(sprintf('%s/%d/%d', $dir, date('Y'), date('m') ), $disk);

        $owner = \Auth::user();
        $f = File::create([
            'title' => $request->get('title', $file->getClientOriginalName()),
            'location' => $path,
            'link' => Storage::disk($disk)->url($path),
            'type' => $file->getClientMimeType(),
            'disk' => $disk
        ]);
        $f->owner()->associate($owner);
        $f->save();
        return DataResponse::make($f)
            ->withQueryParameters($query)
            ->didCreate();
    }

}
