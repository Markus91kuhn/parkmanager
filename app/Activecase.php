<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activecase extends Model
{
    protected $fillable = [
        // 'number',
        // 'country',
        // 'city',
        // 'street',
        'googe',
        'zip_code',  
        'city_name',
        'car_number',
        'car_color',
        'car_brand',
        'lat',
        'lng',
        'activetimveout',
        'partner_name',
        'user_name',
        'carpark'
     ];
}
