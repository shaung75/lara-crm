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

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function balance()
    {
        $invoices = $this->invoices->where('paid', 0);
        $balance = 0;
        
        foreach ($invoices as $invoice)
        {
            $balance += $invoice->total();
        }

        return $balance;
    }

    public function totalValue()
    {
        $invoices = $this->invoices;
        $value = 0;
        
        foreach ($invoices as $invoice)
        {
            $value += $invoice->total();
        }

        return $value;
    }

    public function tasks()
    {
        return $this->hasManyThrough('App\Task', 'App\Project');
    }
}
