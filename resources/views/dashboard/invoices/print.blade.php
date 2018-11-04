<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->customer->company }}</title>
    
    <link href="/css/invoice.css" rel="stylesheet" />

</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="http://www.shaungill.co.uk/wp-content/uploads/2014/08/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td style="text-align: right">
                                <h1>{{ $invoice->total() >= 0 ? 'INVOICE' : 'CREDIT NOTE' }}</h1>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="3" style="padding-left: 0px;">
                    <table>
                        <tr>
                            <td style="width:50%;">
                                14 Roxholme Road<br>
                                Leasingham, Lincolnshire, NG34 8LF<br>
                                Website: shaungill.co.uk<br>
                                Email: shaung75@gmail.com<br>
                                Phone: 07920 292323
                            </td>
                            
                            <td style="width:50%; text-align: right;">
                                <table class="meta">
                                    <tr>
                                        <td>DATE</td>
                                        <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>INVOICE #</td>
                                        <td>{{ $invoice->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>CUSTOMER ID</td>
                                        <td>{{ $invoice->customer->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>DUE</td>
                                        <td>{{ $invoice->created_at->addDays(14)->format('d/m/Y') }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="padding-left: 0px;">
                    <table>
                        <tr class="heading">
                            <td style="width: 50%;">Customer</td>
                        </tr>
                        <tr class="information">
                            <td colspan="2" style="padding-left: 0px;">
                                <table>
                                    <tr>
                                        <td>
                                            {{ $invoice->customer->firstname }} {{ $invoice->customer->lastname }}<br>
                                            {{ $invoice->customer->company }}<br>
                                            {{ $invoice->customer->address }}, {{ $invoice->customer->town }}<br>
                                            {{ $invoice->customer->county }}<br>
                                            {{ $invoice->customer->postcode }}
                                        </td>
                                        
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                @if($invoice->paid)
                                    <img src="/img/paid.png" style="height: 120px; float:right;">
                                @endif
                            </td>
                        </tr>
                    </table>   
                </td>
            </tr>
            
            <tr class="heading item-row">
                <td>
                    Item
                </td>
                
                <td>
                    Qty
                </td>
                <td>
                    Price
                </td>
            </tr>

            @foreach($invoice->items as $item)
                <tr class="item item-row {{ $loop->last ? 'last' : '' }}">
                    <td>
                        {{ $item->lineItem }}
                    </td>
                    
                    <td>
                        {{ $item->qty }}
                    </td>
                    <td>
                        &pound;{{ number_format($item->amount, 2, '.', ',') }}
                    </td>
                </tr>
            @endforeach
            
        </table>

        <table>
            <td style="width:60%; padding-left: 0px;">
                <table class="payment">
                    <tr class="heading">
                        <td>Payment Details</td>
                    </tr>
                    <tr>
                        <td>
                            <p>I accept paymet by either Card, Bank Transfer or cash.</p>
                            <p>Card Payments: <a href="https://www.shaungill.co.uk/pay">https://www.shaungill.co.uk/pay</a></p>
                            <p><strong>
                                Barclays Bank<br>
                                20-25-36<br>
                                60043044
                            </strong></p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:30%; vertical-align: middle; text-align: right;">
                <p class="total">Total: &pound;{{ number_format($invoice->total(), 2, '.', ',') }}</p>
            </td>
        </table>
        <div class="footer">
            <p>If you have any questions about this invoice, please contact<br>Shaun Gill: shaung75@gmail.com</p>
            <p class="thank">Thank You For Your Business!</p>
        </div>
    </div>
</body>
</html>