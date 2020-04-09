<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function deleteOne($file_location = null, $disk = 'public')
    {
        $local_loc = str_replace("/storage", "", $file_location);
        Log::debug($local_loc);
        Log::debug(Storage::disk($disk)->missing($local_loc));
        Storage::disk($disk)->delete($local_loc);
    }
}