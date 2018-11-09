@extends ('layouts.dashboard')

@section('content')

<p class="small">
    <a href="{{ route('dashboard') }}">Dashboard</a> | 
    <a href="{{ route('quotes') }}">Quotes</a> | 
    <a href="{{ route('customer', $quote->customer->id) }}">{{ $quote->customer->company }}</a> | 
    Invoice #{{ $quote->id }}
</p>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <a href="{{ route('quote.print', $quote->id) }}" class="btn btn-default pull-right">Print Quote</a>
                <h4 class="title">Quote #{{ $quote->id }}</h4>
                <p class="category">{{ $quote->customer->company }}</p>
            </div>

            <div class="content">
                <p>Date: <span class="category">{{ $quote->created_at->format('d-m-Y') }}</span></p>

                @if($quote->items->count())
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Line Item</th>
                            <th>Qty</th>
                            <th>Value</th>
                            <th>Total</th>
                        </thead>
                        <tbody>

                        @foreach ($quote->items as $item)
                            <tr>
                                <td>{{ $item->lineItem }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>&pound;{{ number_format($item->amount, 2, '.', ',') }}</td>
                                <td>&pound;{{ number_format($item->total(), 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>

                    <h4>Total: &pound;{{ number_format($quote->total(), 2, '.', ',') }}</h4>
                @endif

                @if(!$quote->invoice_id)
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
                    
                    <form class="form-inline" action="/quotes/{{ $quote->id }}/items/create" method="POST">
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

                <form method="POST" action="{{ route('makeinvoice', $quote->id)}}">
                    @csrf

                    <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure?')">Convert to Invoice</button>
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
                    <img class="avatar border-gray" src="https://www.gravatar.com/avatar/{{ $quote->customer->gravatar }}" alt="{{ $quote->customer->firstname}} {{ $quote->customer->lastname }}"/>

                    <h4 class="title">{{ $quote->customer->company }}<br />
                        <small>{{ $quote->customer->firstname}} {{ $quote->customer->lastname }}</small>
                    </h4>
                    <p><a href="mailto:{{ $quote->customer->email }}">{{ $quote->customer->email }}</a></p>
                    <p>{{ $quote->customer->address }}</p>
                    <p>{{ $quote->customer->town }}, {{ $quote->customer->county }}, {{ $quote->customer->postcode }}</p>
                    <p>{{ $quote->customer->telno }}</p>
                </div>
                <p class="description text-center">Notes: <br/>{{ $quote->customer->notes }}</p>
            </div>
            <hr>
            <div class="text-center">
                <p><a href="/customers/{{ $quote->customer->id }}/edit" class="btn btn-default">Edit</a></p>
            </div>
        </div>
    </div>

</div>

@endsection