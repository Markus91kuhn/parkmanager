<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        // 'number',
        // 'country',
        'zip_code',
        // 'street',
        // 'city',
        'firstname',
        'lastname',
        'google',
        'email',
        'phone',       
        'valid_license',
     ];
}
