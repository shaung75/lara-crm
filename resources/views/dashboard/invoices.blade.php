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
                <h4 class="title">All Invoices</h4>
                <p class="category">Show me the money</p>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Paid</th>
                        <th>ID</th>
                        <th>Value</th>
                        <th>Customer</th>
                    </thead>
                    <tbody>

                        @foreach($user->invoices as $invoice)
                            <tr>
                                <td></td>
                                <td><a href="/invoices/{{ $invoice->id }}">{{ $project->id }}</a></td>
                                <td></td>
                                <td><a href="/customers/{{ $project->customer->id}}">{{ $project->customer->company }}</a></td>
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