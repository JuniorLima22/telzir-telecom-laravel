<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityCode extends Model
{
    protected $table = 'city-codes';

    protected $fillable = ['code'];
}
