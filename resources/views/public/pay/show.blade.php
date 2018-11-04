@extends('layouts.public')

@section('content')
<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark">
                    <div class="card-header">{{ __('Invoice Details') }}</div>

                    <div class="card-body bg-light text-dark">
                        <form method="POST" action="{{ route('pay') }}">
                            @csrf

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
                                    <h5>Total: &pound;{{ $invoice->total() }}</h5>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
