<div class="row payment_panel">
	<div class="container-fluid">
		
		
	</div>
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body bg-gray disabled" style="margin-bottom: 0px !important">
				<div class="col-sm-3 col-sm-offset-6 col-xs-6 d-inline-table" style="margin-bottom: 10px;">
					<b><?php echo app('translator')->getFromJson('sale.item'); ?>:</b>&nbsp;
					<span class="total_quantity">0</span>
				</div>
				<div class="col-sm-3 col-xs-6 d-inline-table" style="margin-bottom: 10px;">
					<b><?php echo app('translator')->getFromJson('sale.total'); ?>:</b> &nbsp;
					<span class="price_total">0</span>
				</div>
				<table class="table table-condensed" 
					style="margin-bottom: 0px !important">
					<tbody>
					<?php
						$col = in_array('types_of_service', $enabled_modules) ? 'col-sm-2' : 'col-sm-3';
					?>
					<tr>
						<td>
							<div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">
								<?php
									$is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
									$is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
								?>
								<span class="<?php if(!$is_discount_enabled && !$is_rp_enabled): ?> hide <?php endif; ?>">

								<b>
								<?php if($is_discount_enabled): ?>
									<?php echo app('translator')->getFromJson('sale.discount'); ?>
									<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sale_discount') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
								<?php endif; ?>
								<?php if($is_rp_enabled): ?>
									<?php echo e(session('business.rp_name'), false); ?>

								<?php endif; ?>
								(-):</b> 
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer" id="pos-edit-discount" title="<?php echo app('translator')->getFromJson('sale.edit_discount'); ?>" aria-hidden="true" data-toggle="modal" data-target="#posEditDiscountModal"></i>
								<span id="total_discount">0</span>
								<input type="hidden" name="discount_type" id="discount_type" value="<?php if(empty($edit)): ?><?php echo e('percentage', false); ?><?php else: ?><?php echo e($transaction->discount_type, false); ?><?php endif; ?>" data-default="percentage">

								<input type="hidden" name="discount_amount" id="discount_amount" value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->default_sales_discount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format($transaction->discount_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="<?php echo e($business_details->default_sales_discount, false); ?>">

								<input type="hidden" name="rp_redeemed" id="rp_redeemed" value="<?php if(empty($edit)): ?><?php echo e('0', false); ?><?php else: ?><?php echo e($transaction->rp_redeemed, false); ?><?php endif; ?>">

								<input type="hidden" name="rp_redeemed_amount" id="rp_redeemed_amount" value="<?php if(empty($edit)): ?><?php echo e('0', false); ?><?php else: ?> <?php echo e($transaction->rp_redeemed_amount, false); ?> <?php endif; ?>">

								</span>
							</div>

							<div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">

								<span class="<?php if($pos_settings['disable_order_tax'] != 0): ?> hide <?php endif; ?>">

								<b><?php echo app('translator')->getFromJson('sale.order_tax'); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sale_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b>
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer" title="<?php echo app('translator')->getFromJson('sale.edit_order_tax'); ?>" aria-hidden="true" data-toggle="modal" data-target="#posEditOrderTaxModal" id="pos-edit-tax" ></i> 
								<span id="order_tax">
									<?php if(empty($edit)): ?>
										0
									<?php else: ?>
										<?php echo e($transaction->tax_amount, false); ?>

									<?php endif; ?>
								</span>

								<input type="hidden" name="tax_rate_id" 
									id="tax_rate_id" 
									value="<?php if(empty($edit)): ?> <?php echo e($business_details->default_sales_tax, false); ?> <?php else: ?> <?php echo e($transaction->tax_id, false); ?> <?php endif; ?>" 
									data-default="<?php echo e($business_details->default_sales_tax, false); ?>">

								<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
									value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format(optional($transaction->tax)->amount, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="<?php echo e($business_details->tax_calculation_amount, false); ?>">

								</span>
							</div>
							
							<!-- shipping -->
							<div class="<?php echo e($col, false); ?> col-xs-6 d-inline-table">

								<span class="<?php if($pos_settings['disable_discount'] != 0): ?> hide <?php endif; ?>">

								<b><?php echo app('translator')->getFromJson('sale.shipping'); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.shipping') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b> 
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer"  title="<?php echo app('translator')->getFromJson('sale.shipping'); ?>" aria-hidden="true" data-toggle="modal" data-target="#posShippingModal"></i>
								<span id="shipping_charges_amount">0</span>
								<input type="hidden" name="shipping_details" id="shipping_details" value="<?php if(empty($edit)): ?><?php echo e("", false); ?><?php else: ?><?php echo e($transaction->shipping_details, false); ?><?php endif; ?>" data-default="">

								<input type="hidden" name="shipping_address" id="shipping_address" value="<?php if(empty($edit)): ?><?php echo e("", false); ?><?php else: ?><?php echo e($transaction->shipping_address, false); ?><?php endif; ?>">

								<input type="hidden" name="shipping_status" id="shipping_status" value="<?php if(empty($edit)): ?><?php echo e("", false); ?><?php else: ?><?php echo e($transaction->shipping_status, false); ?><?php endif; ?>">

								<input type="hidden" name="delivered_to" id="delivered_to" value="<?php if(empty($edit)): ?><?php echo e("", false); ?><?php else: ?><?php echo e($transaction->delivered_to, false); ?><?php endif; ?>">

								<input type="hidden" name="shipping_charges" id="shipping_charges" value="<?php if(empty($edit)): ?><?php echo e(number_format(0.00, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?><?php echo e(number_format($transaction->shipping_charges, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="0.00">

								</span>
							</div>
							<?php if(in_array('types_of_service', $enabled_modules)): ?>
								<div class="col-sm-3 col-xs-6 d-inline-table">
									<b><?php echo app('translator')->getFromJson('lang_v1.packing_charge'); ?>(+):</b>
									<br/>
									<i class="fa fa-pencil-square-o cursor-pointer service_modal_btn"></i> 
									<span id="packing_charge_text">
										0
									</span>
								</div>
							<?php endif; ?>
							<div class="col-sm-3 col-xs-12 d-inline-table">
								<b><?php echo app('translator')->getFromJson('sale.total_payable'); ?>:</b>
								<br/>
								<input type="hidden" name="final_total" 
									id="final_total_input" value=0>
								<span id="total_payable" class="text-success lead text-bold">0</span>
								<?php if(empty($edit)): ?>
									<button type="button" class="btn btn-danger btn-flat btn-xs pull-right" id="pos-cancel"><?php echo app('translator')->getFromJson('sale.cancel'); ?></button>
								<?php else: ?>
									<button type="button" class="btn btn-danger btn-flat hide btn-xs pull-right" id="pos-delete"><?php echo app('translator')->getFromJson('messages.delete'); ?></button>
								<?php endif; ?>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							
							<div class="col-sm-3 col-xs-6 col-2px-padding">
								<?php if(!empty($pos_settings['show_credit_sale_button'])): ?>
									<input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">
									<button type="button" 
									class="btn bg-purple btn-block btn-flat no-print pos-express-finalize" 
									data-pay_method="credit_sale"
									title="<?php echo app('translator')->getFromJson('lang_v1.tooltip_credit_sale'); ?>" >
									<div class="text-center">
										<i class="fa fa-check" aria-hidden="true"></i>
	    								<b><?php echo app('translator')->getFromJson('lang_v1.credit_sale'); ?></b>
	    							</div>
									</button>
								<?php else: ?>
									<button type="button" 
									class="btn bg-maroon btn-block btn-flat no-print <?php if(!empty($pos_settings['disable_suspend'])): ?> pos-express-btn btn-lg <?php endif; ?> pos-express-finalize <?php if(!array_key_exists('card', $payment_types)): ?> hide <?php endif; ?>" 
									data-pay_method="card"
									title="<?php echo app('translator')->getFromJson('lang_v1.tooltip_express_checkout_card'); ?>" >
									<div class="text-center">
										<i class="fa fa-check" aria-hidden="true"></i>
	    								<b><?php echo app('translator')->getFromJson('lang_v1.express_checkout_card'); ?></b>
	    							</div>
									</button>
								<?php endif; ?>
								
								
							</div>
							<div class="col-sm-4 col-xs-12 col-2px-padding">
								
								
							</div>
							<div class="col-sm-3 col-xs-12 col-2px-padding">
								<button type="button" class="btn btn-success btn-block btn-flat btn-lg no-print <?php if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)): ?> hide <?php endif; ?> pos-express-btn pos-express-finalize"
								data-pay_method="cash"
								title="<?php echo app('translator')->getFromJson('tooltip.express_checkout'); ?>">
								<div class="text-center">
									<i class="fa fa-check" aria-hidden="true"></i>
    								<b><?php echo app('translator')->getFromJson('lang_v1.save'); ?></b>
    							</div>
								</button>
							</div>

							<div class="div-overlay pos-processing"></div>
						</td>
					</tr>

					</tbody>
				</table>

				<!-- Button to perform various actions -->
				<div class="row">
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(isset($transaction)): ?>
	<?php echo $__env->make('sale_pos.partials.edit_discount_modal', ['sales_discount' => $transaction->discount_amount, 'discount_type' => $transaction->discount_type, 'rp_redeemed' => $transaction->rp_redeemed, 'rp_redeemed_amount' => $transaction->rp_redeemed_amount, 'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('sale_pos.partials.edit_discount_modal', ['sales_discount' => $business_details->default_sales_discount, 'discount_type' => 'percentage', 'rp_redeemed' => 0, 'rp_redeemed_amount' => 0, 'max_available' => 0], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if(isset($transaction)): ?>
	<?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $business_details->default_sales_tax], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>