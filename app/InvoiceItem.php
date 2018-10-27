<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id',
        'lineItem',
        'qty',
        'amount',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function total()
    {
        return $this->qty * $this->amount;
    }
}
