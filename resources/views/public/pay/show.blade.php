@extends('layouts.public')

@section('content')
<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header">{{ __('Invoice Details') }}</div>

                    <div class="card-body bg-light text-dark">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{ $invoice->customer->company }}</h2>
                                    <h4>Invoice: #{{ $invoice->id }}</h4>
                                    <h5>Total: &pound;{{ number_format($invoice->total(), 2, '.', ',') }}</h5>

                                    @if($invoice->paid)
                                    {{-- If the invoice has been paid --}}
                                        <div class="alert alert-success">
                                            This invoice as been paid!
                                        </div>
                                    @else
                                    {{-- If the invoice hasnt been paid --}}
                                        <form action="/charge" method="post" id="payment-form">
                                            <div class="form-group row">
                                                <label for="card-element" class="col-sm-4 col-form-label text-md-right">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element" class="form-control col-md-6">
                                                <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display Element errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <button class="btn btn-primary btn-xl sr-button">Submit Payment</button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
