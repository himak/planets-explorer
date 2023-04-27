<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rotation_period',
        'diameter',
        'gravity',
        'population',
        'terrain',
    ];

    /**
     * The residents that belong to the planet.
     */
    public function residents()
    {
        return $this->belongsToMany(Resident::class);
    }
}
