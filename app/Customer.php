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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
