<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    protected $fillable = [
        'partner_id',
        'zip_code',
        'country'
     ];
}
