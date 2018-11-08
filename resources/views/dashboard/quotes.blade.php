@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    Quotes
</p>

<div class="row">
    <div class="col-md-8">
        
        @if (count($user->quotes) === 0 )
        
            <div class="alert alert-danger">You have no quotes</div>

            <p><a href="{{ route('quotes.create') }}" class="btn btn-default">Add Quote</a></p>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('quotes.create') }}" class="btn btn-default pull-right">Add Quote</a>
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

                        @foreach($user->quotes as $quote)
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
</div>

@endsection