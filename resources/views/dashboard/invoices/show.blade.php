@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('customers') }}">Customers</a> | 
    <a href="{{ route('customer', $invoice->customer->id) }}">{{ $invoice->customer->company }}</a> | 
    Invoice #{{ $invoice->id }}
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Invoice #{{ $invoice->id }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $invoice->customer->gravatar }}" alt="{{ $invoice->customer->firstname}} {{ $invoice->customer->lastname }}"/>

                    <h4 class="title">{{ $invoice->customer->company }}<br />
                        <small>{{ $invoice->customer->firstname}} {{ $invoice->customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $invoice->customer->email }}">{{ $invoice->customer->email }}</a></p>
                    <p>{{ $invoice->customer->address }}</p>
                    <p>{{ $invoice->customer->town }}, {{ $invoice->customer->county }}, {{ $invoice->customer->postcode }}</p>
                    <p>{{ $invoice->customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $invoice->customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $invoice->customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection