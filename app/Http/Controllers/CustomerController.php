<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('dashboard.customers');
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store()
    {
        $customer = new Customer();

        $customer->user_id = auth()->user()->id;
        $customer->company = request('company');
        $customer->firstname = request('firstname');
        $customer->lastname = request('lastname');
        $customer->email = request('email');
        $customer->address = request('address');
        $customer->town = request('town');
        $customer->county = request('county');
        $customer->postcode = request('postcode');
        $customer->telno = request('telno');
        $customer->notes = request('notes');
        $customer->gravatar = md5(strtolower(trim(request('email'))));

        $customer->save();

        return redirect()->route('customers');;
    }
}
