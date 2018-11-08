<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function projects()
    {
        return $this->hasManyThrough('App\Project', 'App\Customer');
    }

    public function invoices()
    {
        return $this->hasManyThrough('App\Invoice', 'App\Customer');
    }

    public function quotes()
    {
        return $this->hasManyThrough('App\Quote', 'App\Customer');
    }
}
