<!-- business information here -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Receipt-{{ $receipt_details->invoice_no }}</title>
</head>

<body>
    <div class="ticket">
        <!-- Logo -->
        <table width="100%">
            <tr>
                <td width="60%"><img src="/img/default.png" style="width: 80%"></td>
                <td>
                    <p> مصبغة الغالية الخليجية <br>الري - مقابل الأفنيوز</p>
                    <p style="line-height: 0%">Tel::(57777283</p>
                    <p>-57777284)</p>
                </td>
            </tr>
        </table>

        <div>
            <br>
            {{-- <strong>{!! $receipt_details->invoice_no_prefix !!}</strong> --}}
            <strong
                style="font-size: 26px;font-weight:bold;text-align:right;float: right;">{{ $receipt_details->invoice_no }}</strong>
            <br>
            <table style="width: 100%" border="2px">
                <tr>
                    <td>
                        <strong>Received Date</strong>
                    </td>
                    <td>
                        {{ $receipt_details->invoice_date }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Delivery Date</strong>
                    </td>
                    <td>
                        @if (isset($receipt_details->types_of_service_custom_fields))
                            {{ $receipt_details->types_of_service_custom_fields['Delivery Date'] }}
                        @endif
                    </td>
                </tr>
            </table>
            <br>
            <strong>{{ $receipt_details->customer_label }}</strong>
            <strong style="font-size:18px">{{ $receipt_details->customer_name }}</strong>
            <br>
            <strong>Phone</strong>
            <strong style="font-size:18px">{{ $receipt_details->contact }}</strong>
            <br>
            <strong>Address</strong>
            <th>
                @if (!empty($receipt_details->customer_info))
                    <strong style="font-size:16px">{!! $receipt_details->customer_info !!}</strong>
                @endif
            </th>
        </div>
        <br>
        <table style="background-color: #CCC" class="cbl" border="2">
            <tr style="background-color: #CCC" class="cbl">
                <td class="sub-headings cbl" style="background-color: #CCC">
                    @if (isset($receipt_details->current_balance) && $receipt_details->current_balance !== 'Full')
                        <span class="cbl" style="background-color: #CCC">Current Balance =
                            {{ number_format($receipt_details->current_balance, 3) }}</span>
                    @endif
                </td>
            </tr>
        </table>
        <br> <br> 
        <table style="padding-top: 5px !important" class="border-bottom width-100" border="2px">
            <thead class="border-top border-bottom">
                <tr>
                    <th class="description">
                        {{ $receipt_details->table_product_label }}
                    </th>
                    <th class="quantity text-right">
                        QUN
                    </th>
                    <th class="price text-right">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sum = 0;
                @endphp
                @forelse($receipt_details->lines as $line)
                    @php
                        $sum += $line['quantity'];
                    @endphp
                    <tr>
                        <td class="description">
                            {{ $line['name'] }} {{ $line['variation'] }}
                        </td>
                        <td class="quantity text-right">{{ $line['quantity'] }}</td>
                        {{-- <td class="unit_price text-right">{{$line['unit_price_inc_tax']}}</td> --}}
                        <td class="price text-right">{{ $line['line_total'] }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td colspan="5">&nbsp;</td>
                </tr> --}}
            </tbody>
        </table>

        <table class="border-bottom width-100">
            <tr>
                <th class="left text-right sub-headings">
                    Total Items
                </th>
                <td class="width-50 text-right sub-headings">
                    {{ $sum }}
                </td>
            </tr>
            <tr>
                <th class="width-50 text-right">
                    {!! $receipt_details->total_label !!}
                </th>
                <td class="width-50 text-right sub-headings">
                    {{ $receipt_details->total }}
                </td>
            </tr>
        </table>
        {{-- <table class="border-bottom width-100">
            <tr>
                <td>Sales person</td>
                <td></td>
                <td>{{ $receipt_details->sales_person }}</td>
            </tr>
        </table> --}}
		<br>
		<br>
		<br>
		<br>
        <ul style="text-align: right;direction:rtl;">
            <li style="text-align: right;"> زبوننا الكريم الشركة غير مسؤولة عن الملابس التي يمضي عليها<br> أكثر من 30 يوم.</li>
        </ul>
    </div>
</body>

</html>

<style type="text/css">
    @media print {
        p {
            font-weight: bold !important;
            font-size: 12px;
        }

        th {
            font-weight: bold !important;
            font-size: 14px !important;
        }

        td,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        th,
        td {
            font-weight: bold !important;
            font-size: 14px;
        }

        .cbl {
            background-color: #CCC;
	font-size: 20px
        }

        * {
            font-size: 12px;
            font-family: 'Times New Roman';
            word-break: break-all;
        }

        li {
            font-size: 12px;
            font-weight: bold;
        }

        .headings {
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .sub-headings {
            font-size: 18px;
            font-weight: 700;
            background-color: #CCC;
        }

        .border-top {
            border-top: 1px dotted darkgrey;
        }

        .border-bottom {
            border-bottom: 1px dotted darkgrey;
        }

        td.serial_number,
        th.serial_number {
            width: 5%;
            max-width: 5%;
        }

        td.description,
        th.description {
            width: 35%;
            max-width: 35%;
            word-break: break-all;
        }

        td.quantity,
        th.quantity {
            width: 15%;
            max-width: 15%;
            word-break: break-all;
        }

        td.unit_price,
        th.unit_price {
            width: 25%;
            max-width: 25%;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 20%;
            max-width: 20%;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 80mm;
            max-width: 80mm;
        }

        img {
            max-width: inherit;
            width: auto;
        }

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
</style>
