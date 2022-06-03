<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\TemporaryFile;

class UploadController extends Controller
{
    public function store(UploadFileRequest $request) {
        if($request->hasFile('file')) {
            $file = $request->validated('file');
            $folder = uniqid().'-'.now()->timestamp;
            $filename = uniqid('', true).'.'.$file->getClientOriginalExtension();
            $alias = $file->getClientOriginalName();

            $file->storeAs('public/tmp/'.$folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
                'alias' => $alias,
            ]);

            $data = ['folder' => $folder, 'alias' => $alias];

            return (object) $data;
        }

        return '';
    }

    public function delete(Request $request) {
        $folderName = $request->get('folderName');
        $path = storage_path('app/public/tmp/'.$folderName);

        if (file_exists($path)) {
            Storage::deleteDirectory('public/tmp/'.$folderName); //deletes tmp file with folder
            TemporaryFile::where('folder', $folderName)->delete(); //delete record from DB

            return response($folderName, 200); //success
        } else {
            return response($folderName, 404); //file not found
        }
    }
}
