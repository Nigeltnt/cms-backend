<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }
}
