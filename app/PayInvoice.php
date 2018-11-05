<?php

namespace App;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class PayInvoice extends Model
{
    public static function fetch($request)
    {
        $invoice = Invoice::find($request['invoiceNo']);

        return is_null($invoice) || $invoice->total() != $request['invVal'] ?  false : $invoice;
    }
}
