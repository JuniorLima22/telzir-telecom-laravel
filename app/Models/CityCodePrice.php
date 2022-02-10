<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityCodePrice extends Model
{
    protected $table = 'city_code_prices';

    protected $fillable = ['origin', 'destination', 'price'];
}
