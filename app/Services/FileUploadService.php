<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function upload(Collection $files, Model $model)
    {
        $files->each(function (UploadedFile $file) use ($model) {
            $hashName = $file->hashName();
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public/images/', $hashName);
            $image = new Image();
            $image->original_name = $originalName;
            $image->hash_name = $hashName;
            $image->post_id = $model->id;
            $image->save();
        });
    }

    public function delete(Collection $images)
    {
        foreach ($images as $image) {
            Storage::delete('public/images/' . $image->hash_name);
            $image->delete();
        }

    }
}
