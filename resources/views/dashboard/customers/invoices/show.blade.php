@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('customers') }}">Customers</a> | 
    <a href="{{ route('customer', $customer->id) }}">{{ $customer->company }}</a> |
    Invoices
</p>

<div class="row">
    <div class="col-md-8">
        @if (count($customer->invoices) === 0 )
        
            <div class="alert alert-danger">You have no invoices</div>

            <p><a href="{{ route('invoices.create') }}" class="btn btn-default">Add Invoice</a></p>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('customers.invoices.create', $customer->id) }}" class="btn btn-default pull-right">Add Invoice</a>
                <h4 class="title">All Invoices</h4>
                <p class="category">Show me the money</p>
            </div>

            <div class="content">
                <p><small>Show: <a href="{{ basename(Request::url()) == 'invoices' ? route('customers.invoices.unpaid', $customer->id) : route('customers.invoices', $customer->id) }}">{{ $route == 'invoices' ? 'Unpaid' : 'All' }}</a></small></p>
            </div>
            <div class="content table-responsive table-full-width">
                @if($invoices->count())
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Paid</th>
                            <th class="text-center">Locked &amp; Sent</th>
                            <th class="text-center">Inoice No</th>
                            <th>Customer</th>
                            <th>Value</th>
                            <th></th>
                        </thead>
                        <tbody>

                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>
                                        <form method="POST" action="/invoices/{{ $invoice->id }}">
                                            @method('PATCH')
                                            @csrf

                                            <input type="hidden" name="updateType" value="paid">
                                            
                                            <div class="checkbox">
                                                <input id="checkbox{{ $invoice->id }}" type="checkbox" onChange="this.form.submit()" name="paid" {{ $invoice->paid ? 'checked' : '' }}>
                                                <label for="checkbox{{ $invoice->id }}"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center">{!! $invoice->locked ? '<i class="pe-7s-check"></i>' : '' !!}</td>
                                    <td class="text-center"><a href="/invoices/{{ $invoice->id }}">#{{ $invoice->id }}</a></td>
                                    <td><a href="/customers/{{ $invoice->customer->id}}">{{ $invoice->customer->company }}</a></td>
                                    <td>&pound;{{ number_format($invoice->total(), 2, '.', ',') }}</td>
                                    <td><a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-default">Print</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="content">
                        <div class="alert alert-success">
                            <p>All Invoices Paid Up</p>
                        </div>
                    </div>
                @endif
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