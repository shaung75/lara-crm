<?php

namespace App\Http\Controllers;

use App\PayInvoice;
use App\Invoice;
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

    public function update(Invoice $invoice)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $token = $_POST['stripeToken'];

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $invoice->total() * 100,
                'currency' => 'gbp',
                'description' => 'Shaun Gill Inv ' . $invoice->id,
                'source' => $token,
                'receipt_email' => $invoice->customer->email,
            ]);

            $invoice->update([
                'paid' => true
            ]);

            return redirect()->route('pay')->with('success', 'Thanks for your payment!');

        } catch (\Stripe\Error\Card $e) {
            return redirect()->route('pay')->with('error', $e->jsonBody['error']['message']);
        }
    }
}
