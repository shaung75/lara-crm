<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'company',
        'firstname',
        'lastname',
        'email',
        'address',
        'town',
        'county',
        'postcode',
        'telno',
        'gravatar',
        'notes'
    ];
}
