@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | Customers
</p>

<div class="row">
    <div class="col-md-8">
        
        @if (count($user->customer) === 0 )
        
            <div class="alert alert-danger">You have no customers</div>
        
        @else 

        <div class="card">
            <div class="header">
                <a href="{{ route('customers.create') }}" class="btn btn-default pull-right">Add Customer</a>
                <h4 class="title">All Customers</h4>
                <p class="category">Here are the money makers</p>
            </div>

            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Account</th>
                        <th>Comany</th>
                        <th>Contact</th>
                    </thead>
                    <tbody>

                        @foreach($user->customer as $customer)
                            <tr>
                                <td><a href="/customers/{{ $customer->id }}">#{{ $customer->id }}</a></td>
                                <td><a href="/customers/{{ $customer->id }}">{{ $customer->company }}</a></td>
                                <td>{{ $customer->firstname }} {{ $customer->lastname }}</td>
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