<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        //
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for($i=0; $i<12; $i++)
        {
            $invoices = Invoice::where( DB::raw('MONTH(created_at)'), '=', date('n')-$i )->get();

            $invoice_month_total[$i] = 0;

            foreach($invoices as $invoice)
            {
                $invoice_month_total[$i] += $invoice->total();
            }
        }

        $invoice_month_total = array_reverse($invoice_month_total);

        return view('dashboard.index')->with(compact('invoice_month_total'));
    }

    public function home()
    {
        return view('public.index');
    }

    public function freelance()
    {
        return view('public.freelance');
    }

    public function terms()
    {
        return view('public.terms');
    }

    public function privacy()
    {
        return view('public.privacy');
    }

    public function pay()
    {
        return view('public.pay');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
