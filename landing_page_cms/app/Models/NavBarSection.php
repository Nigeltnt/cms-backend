<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavBarSection extends Model
{
    protected $fillable = ['name'];
    protected $table = 'navbar_sections';
}
