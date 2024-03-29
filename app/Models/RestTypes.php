<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestTypes extends Model
{
    use HasFactory;

    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }
}
