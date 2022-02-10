<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityCode extends Model
{
    protected $table = 'city_codes';

    protected $fillable = ['code'];
}
