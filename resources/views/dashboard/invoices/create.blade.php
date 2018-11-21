@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('invoices') }}">Invoices</a> | 
    Create
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Add Invoice</h4>
            </div>
            <div class="content">
                <form method="POST" action="/invoices">
                    
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="purchase_order">Purchase Order</label>
                                <input type="text" class="form-control" name="purchase_order" placeholder="Purchase Order" value="{{ old('purchase_order') }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Invoice</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
    </div>

</div>

@endsection