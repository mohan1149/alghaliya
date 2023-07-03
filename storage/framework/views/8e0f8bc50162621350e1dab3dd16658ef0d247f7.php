<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('CustomerGroupController@store'), 'method' => 'post', 'id' => 'customer_group_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'lang_v1.add_customer_group' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' ) ]);; ?>

      </div>  

      <div class="form-group">
        <?php echo Form::label('amount', __( 'lang_v1.amount' ) . ':*'); ?>

          <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.amount' ) ]);; ?>

      </div>   
      <div class="form-group">
        <?php echo Form::label('subscription_amout', __( 'lang_v1.subscription_cost' ) . ':*'); ?>

          <?php echo Form::text('subscription_amout', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.subscription_cost' ) ]);; ?>

      </div>    
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->