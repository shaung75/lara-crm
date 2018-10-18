@extends ('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if (count($customers) === 0 )
        
            <div class="alert alert-danger">You have no customers</div>
        
        @else 

        <div class="card">
            <div class="header">
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

                        @foreach($customers as $customer)
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