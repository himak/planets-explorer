<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // Accessors for convert null to string: 'unknown' for view
    public function getNameAttribute($value): string
    {
        return $this->isUnknown($value);
    }

    public function getRotationPeriodAttribute($value): string
    {
        return $this->isUnknown($value);
    }

    public function getDiameterAttribute($value): string
    {
        return $this->isUnknown($value);
    }

    public function getGravityAttribute($value): string
    {
        return $this->isUnknown($value);
    }

    /**
     * Helping function for accessors
     * Check is value is null, if yes set to 'unknown'
     */
    public function isUnknown($value): string
    {
        return $value ?? 'unknown';
    }

    /**
     * The residents that belong to the planet.
     */
    public function residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class);
    }
}
