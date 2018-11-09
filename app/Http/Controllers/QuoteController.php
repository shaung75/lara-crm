<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.quotes', compact('user'));
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

        return view('dashboard.quotes.create', compact('user', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = Quote::create(request()->validate([
            'customer_id' => 'required'
        ]));
        
        return redirect()->route('quote', ['id' => $quote->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return view('dashboard.quotes.show', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
