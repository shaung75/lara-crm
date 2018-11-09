<?php

namespace App\Http\Controllers;

use App\Quote;
use App\QuoteItem;
use Illuminate\Http\Request;

class QuoteItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Quote $quote)
    {
        $atts = request()->validate([
            'lineItem' => 'required',
            'qty' => 'required',
            'amount' => 'required'
        ]);
        $atts['quote_id'] = $quote->id;

        QuoteItem::create($atts);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteItem $quoteItem)
    {
        //
    }
}
