<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'customer_id',
        'locked',
        'paid',
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function total()
    {
        $items = $this->items;
        $total = 0;

        foreach($items as $item)
        {
            $total += $item->total();
        }
        
        return $total;
    }
}
