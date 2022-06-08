<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\TemporaryFile;

class ClearTmpFolder
{
    public function __invoke() {
        //get all directories inside tmp folder
        $directories = collect(Storage::allDirectories('public/tmp/'));

        $directories->each(function ($directory) {

            //get file inside each tmp folder
            $file = Storage::files($directory)[0];

            //get last modified date
            $lastModified =  Storage::lastModified($file);
            $lastModified = Carbon::parse($lastModified);

            if (Carbon::now()->gt($lastModified->addHour())) {
                //remove path to file, only leave filename
                $filename = str_replace($directory.'/', "", $file);

                //delete directory with the file inside
                Storage::deleteDirectory($directory);

                //delete tmp file from database
                TemporaryFile::where('filename', $filename)->delete();
            }
        });

        //Log::info()
        info('Temporary Files folder was cleared.');

        return true;
    }
}
