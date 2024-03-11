<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    public function departureEvents()
    {
        return $this->hasMany(Event::class, 'departure_airport_id');
    }

    public function arrivalEvents()
    {
        return $this->hasMany(Event::class, 'arrival_airport_id');
    }
}
