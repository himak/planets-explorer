<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    // Accessors for convert null to string: 'unknown' for view
    public function getNameAttribute($value)
    {
        return $this->isUnknown($value);
    }

    public function getRotationPeriodAttribute($value)
    {
        return $this->isUnknown($value);
    }

    public function getDiameterAttribute($value)
    {
        return $this->isUnknown($value);
    }

    public function getGravityAttribute($value)
    {
        return $this->isUnknown($value);
    }

    /**
     * Helping function for accessors
     * Check is value is null, if yes set to 'unknown'
     */
    public function isUnknown($value)
    {
        return $value ?? 'unknown';
    }
}
