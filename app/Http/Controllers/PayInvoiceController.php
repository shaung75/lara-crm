<?php

namespace App\Http\Controllers;

use App\PayInvoice;
use Illuminate\Http\Request;

class PayInvoiceController extends Controller
{
    /**
     * Show payment form for invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($invoice = PayInvoice::fetch($request->all()))
        {
            return view('public.pay.show', compact('invoice'));
        } else {
            return back()->withErrors(['Error:', 'Invoice Not Found']);
        }
    }
}
