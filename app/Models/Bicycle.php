<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bicycle extends Model
{
    protected $fillable = [
        'location', 'status', 'bicycle_model_id'
    ];
    use HasFactory;
    public function bicycleModel(): BelongsTo
    {
        return $this->belongsTo(Bicycle_model::class);
    }

    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'rentals');
    }
}
