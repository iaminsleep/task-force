<?php

namespace App\Http\Services;

use App\Models\Task;

use App\Models\TemporaryFile;
use App\Models\File;

use Illuminate\Support\Facades\Storage;

class CreateTaskService {
  public function execute(array $data) : Task {
    $task = Task::create([
        'title' => $data['title'],
        'description' => $data['description'],
        'category_id' => $data['category_id'],
        'user_id' => auth()->user()->id,
        'city_id' => auth()->user()->city->id,
        'budget' => $data['budget'],
        'deadline' => $data['deadline'],
        'location' => $data['location'],
    ]);

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
