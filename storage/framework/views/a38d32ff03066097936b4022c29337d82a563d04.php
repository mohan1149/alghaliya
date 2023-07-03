<script>
      jQuery(".var_quantity").change(function() {
        var qty = $(this).val(); 
        var prc = $(this).closest("tr").find('td:nth-child(3) .sell_prc').val(); 
        if(qty > 0){
          var prc_sell = qty * prc;
              prc_sell = parseFloat(prc_sell).toFixed(3);
          $(this).closest("tr").find('td:nth-child(3) .sell_price_inc').val(prc_sell); 
        }
      });
     $(document).on('click', '.listItems', function() {
             $('.listItems').hide();
             var nm =$("#type_add_clk").val();
             var product_id = $("#product_id").val();
             if(nm == 0){
             $.getJSON("/sell/product/variation/list/" + product_id, (response) => {
              $.each(response,function(index, element){
               var qty = $("#"+element.id).val(); 
               var variation_id = element.id;
                if(qty > 0){
                   var product_row = $('input#product_row_count').val();          
                   var location_id = $('input#location_id').val();
                   var customer_id = $('select#customer_id').val();
                   var is_direct_sell = false;
                 if (
                    $('input[name="is_direct_sale"]').length > 0 &&
                    $('input[name="is_direct_sale"]').val() == 1
                    ) {
                    is_direct_sell = true;
                   }

                   var price_group = '';
                   if ($('#price_group').length > 0) {
                   price_group = parseInt($('#price_group').val());
                   }

              //If default price group present
                   if ($('#default_price_group').length > 0 &&
                      !price_group) {
                      price_group = $('#default_price_group').val();
                   }

             //If types of service selected give more priority
                  if ($('#types_of_service_price_group').length > 0 &&
                      $('#types_of_service_price_group').val()) {
                      price_group = $('#types_of_service_price_group').val();
                   }
                  var purchase_line_id = null;
                  
                    $.ajax({
                    method: 'GET',
                    url: '/sells/pos/get_variation_row/' + variation_id + '/' + qty +'/' + location_id,
                    async: false,
                    data: {
                       product_row: product_row,
                       customer_id: customer_id,
                       is_direct_sell: is_direct_sell,
                       price_group: price_group,
                       purchase_line_id: purchase_line_id
                    },
                   dataType: 'json',
                   success: function (result) { 
                       if (result.success) {
                    $('table#pos_table tbody')
                        .append(result.html_content)
                        .find('input.pos_quantity');
                    //increment row count
                    $('input#product_row_count').val(parseInt(product_row) + 1);
                    var this_row = $('table#pos_table tbody')
                        .find('tr')
                        .last();
                    pos_each_row(this_row);

                    //For initial discount if present
                    var line_total = __read_number(this_row.find('input.pos_line_total'));
                    this_row.find('span.pos_line_total_text').text(line_total);

                    pos_total_row();

                    //Check if multipler is present then multiply it when a new row is added.
                    if (__getUnitMultiplier(this_row) > 1) {
                        this_row.find('select.sub_unit').trigger('change');
                    }

                    if (result.enable_sr_no == '1') {
                        var new_row = $('table#pos_table tbody')
                            .find('tr')
                            .last();
                        new_row.find('.add-pos-row-description').trigger('click');
                    }

                    round_row_to_iraqi_dinnar(this_row);
                    __currency_convert_recursively(this_row);

                    $('input#search_product')
                        .focus()
                        .select();

                    //Used in restaurant module
                    if (result.html_modifier) {
                        $('table#pos_table tbody')
                            .find('tr')
                            .last()
                            .find('td:first')
                            .append(result.html_modifier);
                    }

                    //scroll bottom of items list
                    $(".pos_product_div").animate({ scrollTop: $('.pos_product_div').prop("scrollHeight") }, 1000);
                    } else {
                        toastr.error(result.msg);
                        $('input#search_product')
                        .focus()
                        .select();
                    }
                   },
                   });
                
                }
             });   
            });
           }
           $("#type_add_clk").val(1);
           var modal = document.getElementById("myModal");
           modal.style.display = "none";
      }); 
</script>

<div class="modal-dialog modal-lg pdt_vt_cls" id="pdt_vt_cls" role="document">
  <div class="modal-content ">
  
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h3 class="modal-title" style="text-align: center;">Choose Service for <?php echo e($pd_nm->name, false); ?></h3>
    </div>

    <div class="modal-body">
      <div class="row"> 
    <div class="col-md-6" style="display: inline-block;"> 
      <div class="form-group">
     <?php $__currentLoopData = $pdt_variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
        <input class="form-control btn btn-primary"  type="submit" id="variation"  value="<?php echo e($variation->name, false); ?>"></br>
      
      
        <table>
          <?php $__currentLoopData = $variation_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($variation->id == $list->product_variation_id): ?>
          <input type="hidden" name="type_add_clk" id="type_add_clk" value="0">
          <input type="hidden" name="product_id" id="product_id" value="<?php echo e($pd_nm->id, false); ?>">
          <input type="hidden" name="enable_sr_no" id="enable_sr_no" value="<?php echo e($pd_nm->enable_sr_no, false); ?>">
          <input type="hidden" name="enable_stock" id="enable_stock" value="<?php echo e($pd_nm->enable_stock, false); ?>">
          
          <tr >
            <td><div class="input-group input-number">
              <span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-down"><i class="fa fa-minus text-danger"></i></button></span>
              <input type="number" data-min="0" class="form-control  input_number mousetrap input_quantity col-md-2 var_quantity" id="<?php echo e($list->id, false); ?>" value="0" name="var_quantity" data-allow-overselling="" style="width: 100px;">
              <span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-up"><i class="fa fa-plus text-success"></i></button></span></div>
            </td>
            <td>
              <label class="form-control col-md-3" style="width:150px;"><?php echo e($list->name, false); ?></label>
            </td>
            <td>
              <input type="hidden" name="sell_price" id="sell_price<?php echo e($list->id, false); ?>" value="<?php echo e($list->sell_price_inc_tax, false); ?>" class="form-control sell_prc">
               <input type="text" name="price" id="<?php echo e($list->id, false); ?>" value="<?php echo e($list->sell_price_inc_tax, false); ?>" class="form-control col-md-1 sell_price_inc" style="width: 100px;">
            </td>
          </tr>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table></br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <div class="col-md-6 contact_type_div" style="display: inline-block;">
        <div class="form-group">
          <?php if(!empty($pd_nm->image)): ?>
          <img src="<?php echo e(asset('/uploads/img/' . $pd_nm->image), false); ?>" alt="Product Image" width="300" height="300">
          <?php else: ?>
          <img src="<?php echo e(asset('/img/default.png'), false); ?>" alt="Product Image" width="193px;" height="194px;">
          <?php endif; ?>
        </div>
    </div> 

    </div>   
   </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary listItems" data-dismiss="modal">Add</button>
      <button type="button" class="btn btn-default popclose" data-dismiss="modal">Close</button>
    </div>

  </div><!-- /.modal-content -->
</div>