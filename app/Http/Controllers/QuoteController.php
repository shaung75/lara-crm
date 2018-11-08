<?php

namespace App\Http\Controllers;

use App\quotes;
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
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function show(quotes $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function edit(quotes $quotes)
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
    public function update(Request $request, quotes $quotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotes  $quotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(quotes $quotes)
    {
        //
    }
}
