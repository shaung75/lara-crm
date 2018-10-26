<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'customer_id',
        'name',
        'description',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
