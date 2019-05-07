<?php

namespace App\Http\Repositories;

use App\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaRepository
{
    public function create(UploadedFile $file, $model, $path)
    {
        $image = new Media(
            [
                'path' => $file->store($path),
            ]
        );

        $image->save();

        $model->media()->save($image);
        dump($model->id);
    }

    public function update(UploadedFile $file, $model, $path)
    {
        if ($model->media()->exists()) {
            Storage::delete($model->media->path);
            $model->media()->delete();
        }

        $this->create($file, $model, 'companies/' . $model->id);
    }
}
