<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * 
     */
    public function openingHours()
    {
        return $this->hasOne(OpeningHours::class);
    }
}
