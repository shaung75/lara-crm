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
                            
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                {{ $message }}
                            </div>
                            @endif
                            
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                {{ $message }}
                            </div>
                            @endif

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Invoice #') }}</label>

                                <div class="col-md-6">
                                    <input id="invoiceNo" type="text" class="form-control{{ $errors->has('invoiceNo') ? ' is-invalid' : '' }}" name="invoiceNo" value="{{ old('invoiceNo') }}" required autofocus>

                                    @if ($errors->has('invoiceNo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invoiceNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Value (£)') }}</label>

                                <div class="col-md-6">
                                    <input id="invVal" type="text" class="form-control{{ $errors->has('invVal') ? ' is-invalid' : '' }}" name="invVal" required>

                                    @if ($errors->has('invVal'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('invVal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-xl sr-button">
                                        {{ __('Fetch Invoice') }}
                                    </button>
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
