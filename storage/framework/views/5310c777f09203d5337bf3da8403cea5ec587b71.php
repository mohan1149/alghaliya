<?php if(!session('business.enable_price_tax')): ?> 
    <?php
        $default = 0;
        $class = 'hide';
    ?>
<?php else: ?>
    <?php
        $default = null;
        $class = '';
    ?>
<?php endif; ?>

<?php
 $array_name = 'product_variation_edit';
 $variation_array_name = 'variations_edit';
 if($action == 'duplicate'){
    $array_name = 'product_variation';
    $variation_array_name = 'variations';
 }
?>

<tr class="variation_row">
    <td>
        <?php echo Form::text($array_name . '[' . $row_index .'][name]', $product_variation->name, ['class' => 'form-control input-sm variation_name', 'required', 'readonly']);; ?>


        <?php echo Form::hidden($array_name . '[' . $row_index .'][variation_template_id]', $product_variation->variation_template_id);; ?>


        <input type="hidden" class="row_index" value="<?php if($action == 'edit'): ?><?php echo e($row_index, false); ?><?php else: ?><?php echo e($loop->index, false); ?><?php endif; ?>">
        <input type="hidden" class="row_edit" value="edit">
    </td>

    <td>
        <table class="table table-condensed table-bordered blue-header variation_value_table">
            <thead>
            <tr>
                <th><?php echo app('translator')->getFromJson('product.sku'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sub_sku') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                <th><?php echo app('translator')->getFromJson('product.value'); ?></th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->getFromJson('product.default_purchase_price'); ?> 
                    <br/>
                    <span class="pull-left"><small><i><?php echo app('translator')->getFromJson('product.exc_of_tax'); ?></i></small></span>

                    <span class="pull-right"><small><i><?php echo app('translator')->getFromJson('product.inc_of_tax'); ?></i></small></span>
                </th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->getFromJson('product.profit_percent'); ?></th>
                <th class="<?php echo e($class, false); ?>"><?php echo app('translator')->getFromJson('product.default_selling_price'); ?> 
                <br/>
                <small><i><span class="dsp_label"></span></i></small>
                </th>
                <th><?php echo app('translator')->getFromJson('lang_v1.variation_images'); ?></th>
                <th><button type="button" class="btn btn-success btn-xs add_variation_value_row">+</button></th>
            </tr>
            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $product_variation->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $variation_row_index = $variation->id;
                    $sub_sku_required = 'required';
                    if($action == 'duplicate'){
                        $variation_row_index = $loop->index;
                        $sub_sku_required = '';
                    }
                ?>
                <tr>
                    <td>
                        <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][sub_sku]', $action == 'edit' ? $variation->sub_sku : null, ['class' => 'form-control input-sm variation_value_name', $sub_sku_required]);; ?>

                    </td>
                    <td>
                        <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][value]', $variation->name, ['class' => 'form-control input-sm variation_value_name', 'required', 'readonly']);; ?>


                        <?php echo Form::hidden($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][variation_value_id]', $variation->variation_value_id);; ?>

                    </td>
                    <td class="<?php echo e($class, false); ?>">
                        <div class="col-sm-6">
                            <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][default_purchase_price]', number_format($variation->default_purchase_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm variable_dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']);; ?>

                        </div>

                        <div class="col-sm-6">
                            <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][dpp_inc_tax]', number_format($variation->dpp_inc_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm variable_dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']);; ?>

                        </div>
                    </td>
                    <td class="<?php echo e($class, false); ?>">
                        <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][profit_percent]', number_format($variation->profit_percent, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm variable_profit_percent input_number', 'required']);; ?>

                    </td>
                    <td class="<?php echo e($class, false); ?>">
                        <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][default_sell_price]', number_format($variation->default_sell_price, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm variable_dsp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']);; ?>


                        <?php echo Form::text($array_name . '[' . $row_index .'][' . $variation_array_name . '][' . $variation_row_index . '][sell_price_inc_tax]', number_format($variation->sell_price_inc_tax, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm variable_dsp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']);; ?>

                    </td>
                    <td>
                        <?php 
                            $action = !empty($action) ? $action : '';
                        ?>
                        <?php if($action !== 'duplicate'): ?>
                            <?php $__currentLoopData = $variation->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="img-thumbnail">
                                    <span class="badge bg-red delete-media" data-href="<?php echo e(action('ProductController@deleteMedia', ['media_id' => $media->id]), false); ?>"><i class="fa fa-close"></i></span>
                                    <?php echo $media->thumbnail(); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo Form::file('edit_variation_images_' . $row_index . '_' . $variation_row_index . '[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']);; ?>

                        <?php else: ?>
                            <?php echo Form::file('edit_variation_images_' . $row_index . '_' . $variation_row_index . '[]', ['class' => 'variation_images', 'accept' => 'image/*', 'multiple']);; ?>

                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs remove_variation_value_row">-</button>
                        <input type="hidden" class="variation_row_index" value="<?php if($action == 'duplicate'): ?><?php echo e($loop->index, false); ?><?php else: ?><?php echo e(0, false); ?><?php endif; ?>">
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                &nbsp;
            <?php endif; ?>
            </tbody>
        </table>
    </td>
</tr>