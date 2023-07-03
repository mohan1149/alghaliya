<div class="modal-dialog" role="document">
	<?php echo Form::open(['url' => action('SellController@updateShipping', [$transaction->id]), 'method' => 'put', 'id' => 'edit_shipping_form' ]); ?>

	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo app('translator')->getFromJson('lang_v1.edit_shipping'); ?> - <?php echo e($transaction->invoice_no, false); ?></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
			        <div class="form-group">
			            <?php echo Form::label('shipping_details', __('sale.shipping_details') . ':*' ); ?>

			            <?php echo Form::textarea('shipping_details', !empty($transaction->shipping_details) ? $transaction->shipping_details : '', ['class' => 'form-control','placeholder' => __('sale.shipping_details'), 'required' ,'rows' => '4']);; ?>

			        </div>
			    </div>

			    <div class="col-md-6">
			        <div class="form-group">
			            <?php echo Form::label('shipping_address', __('lang_v1.shipping_address') . ':' ); ?>

			            <?php echo Form::textarea('shipping_address',!empty($transaction->shipping_address) ? $transaction->shipping_address : '', ['class' => 'form-control','placeholder' => __('lang_v1.shipping_address') ,'rows' => '4']);; ?>

			        </div>
			    </div>

			    <div class="col-md-6">
			        <div class="form-group">
			            <?php echo Form::label('shipping_status', __('lang_v1.shipping_status') . ':' ); ?>

			            <?php echo Form::select('shipping_status',$shipping_statuses, !empty($transaction->shipping_status) ? $transaction->shipping_status : null, ['class' => 'form-control','placeholder' => __('messages.please_select')]);; ?>

			        </div>
			    </div>

			    <div class="col-md-6">
			        <div class="form-group">
			            <?php echo Form::label('delivered_to', __('lang_v1.delivered_to') . ':' ); ?>

			            <?php echo Form::text('delivered_to', !empty($transaction->delivered_to) ? $transaction->delivered_to : null, ['class' => 'form-control','placeholder' => __('lang_v1.delivered_to')]);; ?>

			        </div>
			    </div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('messages.update'); ?></button>
		    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('messages.cancel'); ?></button>
		</div>
		<?php echo Form::close(); ?>

	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->