<?php

namespace Inspirium\Http\Controllers\Api\FileManagement;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inspirium\Models\FileManagement\File;

class FileController extends Controller {

    public function getFileInfo(File $file) {
        return response()->json($file);
    }

    public function postFile(Request $request) {
        if(!$request->hasFile('file')) {
            return response()->json(['result' => 'error', 'message' => 'Upload file not found'], 400);
        }
        $file = $request->file('file');
        if(!$file->isValid()) {
            return response()->json([ 'result' => 'error', 'message' => 'Invalid file upload'], 400);
        }
        $disk = $request->input('disk');
        if (!$disk) {
        	$disk = 'public';
        }
        $dir = $request->input('dir');
        if (!$dir) {
        	$dir = 'public';
        }
	    $path = $file->store(sprintf('%s/%d/%d', $dir, date('Y'), date('m') ), $disk);
       // $file->move($path, $file->getClientOriginalName() );
        $owner = \Auth::user();
        $f = File::create([
            'title' => $request->get('title'),
            'location' => $path,
            'link' => Storage::disk($disk)->url($path),
            'type' => $file->getClientMimeType(),
	        'disk' => $disk
        ]);
        $f->owner()->associate($owner);
        $f->save();
        return response()->json(['result' => 'success', 'message' => 'File succesfully uploaded', 'data' => $f]);
    }

    public function updateFile(Request $request, File $file) {
        $file->title = $request->get('title');
        $file->save();
    }

    public function deleteFile(File $file) {
    	Storage::disk($file->disk)->delete($file->location);
    	$file->delete();
    	return response()->json(['message' => 'success']);
    }
}
