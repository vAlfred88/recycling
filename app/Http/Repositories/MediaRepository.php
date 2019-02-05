<?php

namespace App\Http\Repositories;

use App\Media;
use Illuminate\Http\UploadedFile;

class MediaRepository
{
    public function create(UploadedFile $file, $model, $path)
    {
        $image = new Media(
            [
                'path' => $file->store($path),
                'name' => str_random(10)
            ]
        );

        $image->save();

        $model->media()->save($image);
    }
}