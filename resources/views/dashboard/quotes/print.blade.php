<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $quote->customer->company }}</title>
    
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
                                <img src="/img/shaun-gill-logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td style="text-align: right">
                                <h1>QUOTE</h1>
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
                                        <td>{{ $quote->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>QUOTE #</td>
                                        <td>{{ $quote->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>CUSTOMER ID</td>
                                        <td>{{ $quote->customer->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>VALID UNTIL</td>
                                        <td>{{ $quote->created_at->addDays(30)->format('d/m/Y') }}</td>
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
                                            {{ $quote->customer->firstname }} {{ $quote->customer->lastname }}<br>
                                            {{ $quote->customer->company }}<br>
                                            {{ $quote->customer->address }}, {{ $quote->customer->town }}<br>
                                            {{ $quote->customer->county }}<br>
                                            {{ $quote->customer->postcode }}
                                        </td>
                                        
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                @if($quote->paid)
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

            @foreach($quote->items as $item)
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
                        <td>Terms &amp; Conditions</td>
                    </tr>
                    <tr>
                        <td>
                            <p>Unless otherwise agreed:</p>
                            <ol>
                                <li>Customer will be invoiced 50% after indicating acceptance of this quote</li>
                                <li>Work will not commence until initial payment has been received</li>
                                <li>Customer will be invoiced for the remaining 50% upon completion</li>
                                <li>All files and documentation will be handed over once payment received</li>
                            </ol>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width:30%; vertical-align: middle; text-align: right;">
                <p class="total">Total: &pound;{{ number_format($quote->total(), 2, '.', ',') }}</p>
            </td>
        </table>
        <div class="footer">
            <p>If you have any questions about this quote, please contact<br>Shaun Gill: shaung75@gmail.com</p>
            <p class="thank">Thank You For Your Business!</p>
        </div>
    </div>
</body>
</html>