<table class="header">
    <tr>
        <td>
            
            
            
            <img src="<?php echo e(url('/img/default.png'), false); ?>" alt="Image" style="width: 75%">
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
            <h5>Paid Amount : <?php echo e(number_format($data->total_paid_value,3), false); ?></h5>
        </td>

    </tr>

</table>

        
            <table class="main" style="width: 100%; font-size: 20px">
                <tr>
                    <td><?php echo e(__("lang_v1.name"), false); ?></td>
                    <td><?php echo e($data->name, false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.address"), false); ?></td>
                    <td><?php echo e($data->custom_field4.','.$data->city.','.$data->state.','.$data->country, false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.contact"), false); ?></td>
                    <td><?php echo e($data->mobile, false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.member_from"), false); ?></td>
                    <td><?php echo e($from_date, false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.start_balance"), false); ?></td>
                    <td><?php echo e(number_format($data->subscription_pieces,3), false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.used_balance"), false); ?></td>
                    <td><?php echo e(number_format($data->custom_field2,3), false); ?></td>
                </tr>
                <tr>
                    <td><?php echo e(__("lang_v1.available_balance"), false); ?></td>
                    <td><?php echo e(number_format($data->custom_field3,3), false); ?></td>
                </tr>
            </table>
        
        
        
        



<style>
	@media  print{
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
