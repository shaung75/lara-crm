<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $route = $request->route()->uri;

        if($route == 'invoices')
        {
            $invoices = $user->invoices;    
        } else {
            $invoices = $user->invoices->where('paid', 0);
        }
        
        return view('dashboard.invoices', compact('user', 'invoices', 'route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $customers = $user->customer;

        return view('dashboard.invoices.create', compact('user', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = Invoice::create(request()->validate([
            'customer_id' => 'required',
            'purchase_order' => 'nullable'
        ]));
        
        return redirect()->route('invoice', ['id' => $invoice->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('dashboard.invoices.show', compact('invoice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function print(Invoice $invoice)
    {
        return view('dashboard.invoices.print', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        if($request->updateType == 'paid')
        {
            $invoice->update([
                'paid' => request()->has('paid')
            ]);
        }
        elseif($request->updateType == 'lock')
        {
            $invoice->update([
                'locked' => request()->locked
            ]);
        }
        elseif($request->updateType == 'po')
        {
            $invoice->update([
                'purchase_order' => request()->purchase_order
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
