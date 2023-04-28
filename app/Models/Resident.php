<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species'
    ];

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class);
    }
}
