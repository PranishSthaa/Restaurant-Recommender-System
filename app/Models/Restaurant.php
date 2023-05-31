<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    public function cuisine(): BelongsTo
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function restaurant_type(): BelongsTo
    {
        return $this->belongsTo(RestTypes::class, 'rest_type_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
