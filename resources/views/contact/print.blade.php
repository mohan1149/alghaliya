<table class="header">
    <tr>
        <td>
            {{-- <img src="../../../public/img/default.png"  alt="" style="width: 75%"> --}}
            {{-- <img src="../../../public/img/default.png" alt="Image" style="width: 75%"> --}}
            {{-- <img src="../../../public/img/default.png" alt="Image" style="width: 75%"> --}}
            <img src="{{ url('/img/default.png') }}" alt="Image" style="width: 75%">
        </td>
        <td style="font-size: 24px;">
            <h6>مصبغة رايت إكسبريس
                <br>   جمعية كيفان التعاونية
                <br> داخل مجمع كيفان التجاري
                <br> block 2
            <br>Tel ::29415416
            <br> Delivery ::66444477</h6>
        </td>
    </tr>
    <tr>
        <td style="font-size: 24px;">
            <h5>Receipt - Membership</h5>
            
        </td>
        <td style="font-size: 24px;">
            <h5>Paid Amount : {{ number_format($data->total_paid_value,3) }}</h5>
        </td>

    </tr>

</table>
{{-- <table class="main"> --}}
        {{-- <td class="left" > --}}
            <table class="main" style="width: 100%; font-size: 20px">
                <tr>
                    <td>{{ __("lang_v1.name") }}</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.address") }}</td>
                    <td>{{ $data->custom_field4.','.$data->city.','.$data->state.','.$data->country }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.contact") }}</td>
                    <td>{{ $data->mobile }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.member_from") }}</td>
                    <td>{{ $from_date }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.start_balance") }}</td>
                    <td>{{ number_format($data->subscription_pieces,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.used_balance") }}</td>
                    <td>{{ number_format($data->custom_field2,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.available_balance") }}</td>
                    <td>{{ number_format($data->custom_field3,3) }}</td>
                </tr>
            </table>
        {{-- </td> --}}
        {{-- <td class="right">
            <table style="width: 100%  font-size: 22px">
                <tr>
                    <td>{{ __("lang_v1.start_balance") }}</td>
                    <td>{{ number_format($data->subscription_pieces,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.used_balance") }}</td>
                    <td>{{ number_format($data->custom_field2,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.available_balance") }}</td>
                    <td>{{ number_format($data->custom_field3,3) }}</td>
                </tr>
            </table>
        </td> --}}
        {{-- <td class="left">
            <table style="width: 100%">
                <tr>
                    <td>{{ __("lang_v1.name") }}</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.address") }}</td>
                    <td>{{ $data->custom_field4.','.$data->city.','.$data->state.','.$data->country }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.contact") }}</td>
                    <td>{{ $data->mobile }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.member_from") }}</td>
                    <td>{{ $from_date }}</td>
                </tr>
            </table>
        </td> --}}
        {{-- <td class="right">
            <table style="width: 100%">
                <tr>
                    <td>{{ __("lang_v1.start_balance") }}</td>
                    <td>{{ number_format($data->subscription_pieces,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.used_balance") }}</td>
                    <td>{{ number_format($data->custom_field2,3) }}</td>
                </tr>
                <tr>
                    <td>{{ __("lang_v1.available_balance") }}</td>
                    <td>{{ number_format($data->custom_field3,3) }}</td>
                </tr>
            </table>
        </td> --}}
{{-- </table> --}}
{{-- <div class="hr"></div> --}}

<style>
	@media print{
        .header{
            width: 100%;
            /* font-size: 22px; */
        }
        .hr{
            height: 2px;
            font-size: 26px;

        }
        .main{
            width: 100%;
            font-size: 26px;
        }

        .main, .main tr,.main td {
         border: 1px solid black;
          border-collapse: collapse;
        }
   
        td.left{
        
            font-size: 26px;
        }
        td.right{
           
            font-size: 26px;
        }

        
    }
</style>
