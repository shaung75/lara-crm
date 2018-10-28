@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    Invoices
</p>

<div class="row">
    <div class="col-md-8">
        
        @if (count($user->invoices) === 0 )
        
            <div class="alert alert-danger">You have no invoices</div>

            <p><a href="{{ route('invoices.create') }}" class="btn btn-default">Add Invoice</a></p>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('invoices.create') }}" class="btn btn-default pull-right">Add Invoice</a>
                <h4 class="title">All Invoices</h4>
                <p class="category">Show me the money</p>
            </div>

            <div class="content">
                <p><small>Show: <a href="{{ $route == 'invoices' ? route('invoices.unpaid') : route('invoices') }}">{{ $route == 'invoices' ? 'Unpaid' : 'All' }}</a></small></p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Paid</th>
                        <th class="text-center">Locked &amp; Sent</th>
                        <th class="text-center">Inoice No</th>
                        <th>Customer</th>
                        <th>Value</th>
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