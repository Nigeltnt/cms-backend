<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = ['name', 'description', 'icon'];
    protected $table = 'stats_sections';
}
