<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClearTmpFolder
{
    public function __invoke() {
        $files = collect(Storage::allFiles('public/tmp/'));
        $files->each(function ($file) {
            $lastModified =  Storage::lastModified($file);
            $lastModified = Carbon::parse($lastModified);

            if (Carbon::now()->gt($lastModified->addHour())) {
                Storage::delete($file);
            }
        });

        info('tmp folder was cleared.');

        return true;
    }
}
