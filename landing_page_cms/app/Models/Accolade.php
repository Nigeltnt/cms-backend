<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accolade extends Model
{
    protected $fillable = ['name', 'description', 'icon', 'color'];
}
