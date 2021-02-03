<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        // 'country',
        // 'street',
        // 'city',
        'google'
     ];
}
