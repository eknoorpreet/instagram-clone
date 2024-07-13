<?php

namespace App\Services;

use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FileService
{
    public function updateFile($model, $request, $type)
    {
        // is the file column on the db exist
        if (!empty($model->file)) {
            // get the file
            $currentFile = public_path() . $model->file;

            // if the file exists and the current file is not the default one
            if (file_exists($currentFile) && $currentFile != public_path() . '/user-placeholder.png') {
                // delete it
                unlink($currentFile);
            }
        }

        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read($request->file('file'));

        $file = $image;
        if ($type === "user") {
            // get the file and resize it
            $file = $image->resize(400, 400);
        }
        // Get the extension
        $ext = $request->file('file');
        $extension = $ext->getClientOriginalExtension();
        // Rename the file
        $name = time() . '.' . $extension;
        $file->save(public_path() . '/file/' . $name);
        // Save it to the path
        $model->file = '/file/' . $name;

        return $model;
    }
}
