<?php

namespace App\Http\Traits;

use App\Models\Media;
use App\Models\Feature;
use App\Http\Enums\MediaType;


trait HasMedia
{
    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function addMedia($file, $type = MediaType::Image)
        {
            // Create a new Media instance
            $media = new Media();
            $media->model()->associate($this); // Associate the current model
            $media->type = $type; // Set the media type

            // Store the file and set the file path
            $media->file_path = $this->storeFile($file); // Ensure the file path is set

            // Save the media instance with all properties set
            $media->save();

            return $media;
        }

        // Example method to handle file storage
    protected function storeFile($file)
        {
            // Store the file and return the path
            return $file->store('media'); // Adjust this as needed
        }

}