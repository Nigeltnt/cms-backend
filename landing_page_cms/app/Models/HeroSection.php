<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = ['title', 'subtitle', 'button_text', 'description', 'image'];
}
