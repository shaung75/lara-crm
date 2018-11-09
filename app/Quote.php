<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'customer_id',
        'invoice_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function total()
    {
        /*
        $items = $this->items;
        $total = 0;

        foreach($items as $item)
        {
            $total += $item->total();
        }
        */
        return 10;
        return $total;
    }
}
