<?php

namespace App;

use App\Invoice;
Use App\InvoiceItem;
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

    public function items()
    {
        return $this->hasMany(QuoteItem::class);
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

    public function makeInvoice()
    {
        // Create the Invoice
        $invoice = new Invoice;

        $invoice->customer_id = $this->customer->id;

        $invoice->save();

        // Add the line items
        foreach($this->items as $item)
        {
            $line = new InvoiceItem;

            $line->invoice_id = $invoice->id;
            $line->lineItem = $item->lineItem;
            $line->qty = $item->qty;
            $line->amount = $item->amount;

            $line->save();
        }

        // Update quote to include invoice ID
        $this->invoice_id = $invoice->id;
        $this->save();
        
        return $invoice;
    }
}
