<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = [
        'quote_id',
        'lineItem',
        'qty',
        'amount',
    ];
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function total()
    {
        return $this->qty * $this->amount;
    }
}
