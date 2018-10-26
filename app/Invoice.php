<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer_id',
        'locked',
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
