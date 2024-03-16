<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bicycle_model extends Model
{
    use HasFactory;
    public function bicycles() : HasMany
    {
        return $this->hasMany(Bicycle::class);
    }
}
