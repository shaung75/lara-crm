@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('customers') }}">Customers</a> | 
    <a href="{{ route('customer', $customer->id) }}">{{ $customer->company }}</a> |
    Quotes
</p>

<div class="row">
    <div class="col-md-8">
        @if (count($customer->quotes) === 0 )
        
            <div class="alert alert-danger">You have no invoices</div>

            <p><a href="{{ route('quotes.create') }}" class="btn btn-default">Add Quote</a></p>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('customers.quotes.create', $customer->id) }}" class="btn btn-default pull-right">Add Quote</a>
                <h4 class="title">All Quotes</h4>
                <p class="category">Potential money</p>
            </div>

            <div class="content table-responsive table-full-width">
                
                <table class="table table-hover table-striped">
                    <thead>
                        <th class="text-center">Quote No</th>
                        <th>Customer</th>
                        <th>Value</th>
                        <th class="text-center">Invoiced</th>
                        <th>Print</th>
                    </thead>
                    <tbody>

                        @foreach($customer->quotes as $quote)
                            <tr>
                                <td class="text-center"><a href="/quotes/{{ $quote->id }}">#{{ $quote->id }}</a></td>
                                <td><a href="/customers/{{ $quote->customer->id}}">{{ $quote->customer->company }}</a></td>
                                <td>&pound;{{ number_format($quote->total(), 2, '.', ',') }}</td>
                                <td class="text-center">{!! $quote->invoice_id ? '<i class="pe-7s-check"></i>' : '' !!}</td>
                                <td><a href="{{ route('quote.print', $quote->id) }}" class="btn btn-default">Print</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        
        @endif
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <a href="{{ route('customers.invoices', $customer->id) }}" class="btn btn-default pull-right">Invoices</a>
                <a href="{{ route('customers.quotes', $customer->id) }}" class="btn btn-default pull-right">Quotes</a>
                <h4 class="title" style="line-height: 2.2em">Account Balance: &pound;{{ number_format($customer->balance(), 2, '.', ',') }}</h4>
            </div>
        </div>
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $customer->gravatar }}" alt="{{ $customer->firstname}} {{ $customer->lastname }}"/>

                    <h4 class="title">{{ $customer->company }}<br />
                        <small>{{ $customer->firstname}} {{ $customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></p>
                    <p>{{ $customer->address }}</p>
                    <p>{{ $customer->town }}, {{ $customer->county }}, {{ $customer->postcode }}</p>
                    <p>{{ $customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection