<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class PayInvoice extends Model
{
    public static function fetch($request)
    {
        $invoice = Invoice::find($request['invoiceNo']);

        return $invoice->total() == $request['invVal'] ? $invoice : false;
    }
}
