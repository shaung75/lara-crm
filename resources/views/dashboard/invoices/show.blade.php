@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('invoices') }}">Invoices</a> | 
    <a href="{{ route('customer', $invoice->customer->id) }}">{{ $invoice->customer->company }}</a> | 
    Invoice #{{ $invoice->id }}
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-default pull-right">Print Invoice</a>
                <h4 class="title">Invoice #{{ $invoice->id }}</h4>
                <p class="category">{{ $invoice->customer->company }}</p>
            </div>

            <div class="content">
                
                <p>Date: <span class="category">{{ $invoice->created_at->format('d-m-Y') }}</span></p>
                <form method="POST" action="/invoices/{{ $invoice->id }}">
                    @method('PATCH')
                    @csrf
                    <p style="display: inline-block;">Purchase Order:</p> 
                    <input type="hidden" name="updateType" value="po">
                    <input type="text" name="purchase_order" value="{{ $invoice->purchase_order }}">

                    <button type="submit" class="btn btn-default" >Update</button>
                </form> 

                @if($invoice->items->count())
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Line Item</th>
                            <th>Qty</th>
                            <th>Value</th>
                            <th>Total</th>
                        </thead>
                        <tbody>

                        @foreach ($invoice->items as $item)
                            <tr>
                                <td>{{ $item->lineItem }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>&pound;{{ number_format($item->amount, 2, '.', ',') }}</td>
                                <td>&pound;{{ number_format($item->total(), 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>

                    <h4>Total: &pound;{{ number_format($invoice->total(), 2, '.', ',') }}</h4>
                @endif

                @if(!$invoice->locked)
                    <h4>Add Item</h4>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form class="form-inline" action="/invoices/{{ $invoice->id }}/items/create" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="sr-only" for="lineItem">Line Item</label>
                            <input type="text" class="form-control" id="lineItem" name="lineItem" placeholder="Line Item">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="lineItem">Line Item</label>
                            <input type="number" step="0.01" class="form-control" id="qty" name="qty" placeholder="Qty">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">£</div>
                                <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="Value">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Add Item</button>
                    </form>
                @endif

                <hr>

                <form method="POST" action="/invoices/{{ $invoice->id }}/lock">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="updateType" value="lock">
                    <input type="hidden" name="locked" value="{{ $invoice->locked ? '0' : '1' }}">

                    <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure?')">{{ $invoice->locked ? 'Unlock' : 'Lock & Mark as Sent' }}</button>
                </form>              
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $invoice->customer->gravatar }}" alt="{{ $invoice->customer->firstname}} {{ $invoice->customer->lastname }}"/>

                    <h4 class="title">{{ $invoice->customer->company }}<br />
                        <small>{{ $invoice->customer->firstname}} {{ $invoice->customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $invoice->customer->email }}">{{ $invoice->customer->email }}</a></p>
                    <p>{{ $invoice->customer->address }}</p>
                    <p>{{ $invoice->customer->town }}, {{ $invoice->customer->county }}, {{ $invoice->customer->postcode }}</p>
                    <p>{{ $invoice->customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $invoice->customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $invoice->customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection