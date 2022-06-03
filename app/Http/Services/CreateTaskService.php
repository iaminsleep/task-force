<?php

namespace App\Http\Services;

use App\Models\Task;

use App\Models\TemporaryFile;
use App\Models\File;

use Illuminate\Support\Facades\Storage;

class CreateTaskService {
  public function execute(array $data) : Task {
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->category_id = $data['category_id'];
    $task->user_id = auth()->user()->id;
    $task->city_id = auth()->user()->city->id;
    $task->budget = $data['budget'];
    $task->deadline = $data['deadline'];
    $task->location = $data['location'];

    $task->save();

    foreach($data['files'] as $fileFolderName) {
        $tmpFile = TemporaryFile::where('folder', $fileFolderName)->first();
        $filename = $tmpFile->filename;
        $alias = $tmpFile->alias;

        Storage::move('public/tmp/'.$fileFolderName.'/'.$filename, 'public/'.$filename);
        Storage::deleteDirectory('public/tmp/'.$fileFolderName);

        File::create([
            'task_id' => $task->id,
            'filename' => $filename,
            'alias' => $alias,
        ]);

        $tmpFile->delete();
    }

    return $task;
  }
}
