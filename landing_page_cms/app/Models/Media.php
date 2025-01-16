<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'type',
        'file_path', // Assuming you'll store the file path
        // Add other fields as necessary
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
