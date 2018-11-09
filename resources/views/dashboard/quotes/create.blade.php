@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('quotes') }}">Quotes</a> | 
    Create
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Add Quote</h4>
            </div>
            <div class="content">
                <form method="POST" action="/quotes">
                    
                    @csrf
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer</label>
                                <select class="form-control" name="customer_id">
                                    <option disabled="" selected="">Select a customer</option>
                                    @foreach ($customers->sortBy('company') as $customer)
                                        <option value="{{ $customer->id }}">
                                            {{ $customer->company }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Quote</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
    </div>

</div>

@endsection