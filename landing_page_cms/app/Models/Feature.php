<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\HasMedia;

class Feature extends Model
{
    use HasMedia;

    protected $fillable = [
        'title',
        'html',
        'image',
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
