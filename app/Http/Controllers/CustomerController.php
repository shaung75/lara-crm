<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        
        return view('dashboard.customers', compact('user'));
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $atts = request()->validate([
            'company' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required',
            'telno' => 'required',
            'notes' => 'nullable'
        ]);
        $atts['user_id'] = auth()->user()->id;
        $atts['gravatar'] = md5(strtolower(trim(request('email'))));
        
        $customer->update($atts);
        return back()->with('status', 'Profile updated!');
        //return redirect()->route('customers');
    }

    public function edit (Customer $customer)
    {
        return view('dashboard.customers.edit', compact('customer'));
    }

    public function store()
    {
        $atts = request()->validate([
            'company' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required',
            'telno' => 'required',
            'notes' => 'nullable'
        ]);
        $atts['user_id'] = auth()->user()->id;
        $atts['gravatar'] = md5(strtolower(trim(request('email'))));
        
        Customer::create($atts);

        return redirect()->route('customers');
    }

    public function invoices (Request $request, Customer $customer)
    {
        $route = $request->route()->uri;

        if($route == 'customers/{customer}/invoices')
        {
            $invoices = $customer->invoices;    
        } else {
            $invoices = $customer->invoices->where('paid', 0);
        }

        return view('dashboard.customers.invoices.show', compact('customer', 'route', 'invoices'));
    }

    public function invoicesCreate (Customer $customer)
    {
        $invoice = new Invoice;

        $invoice->customer_id = $customer->id;

        $invoice->save();
        
        return redirect()->route('invoice', ['id' => $invoice->id]);
    }
}
