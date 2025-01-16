<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'bullet_points', 'image'];
}
