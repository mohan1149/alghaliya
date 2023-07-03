
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <?php
    $form_id = 'contact_add_form';
    if(isset($quick_add)){
    $form_id = 'quick_add_contact';
    }
  ?>
    <?php echo Form::open(['url' => action('ContactController@store'), 'method' => 'post', 'id' => $form_id ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson('contact.add_contact'); ?> </h4>
    </div>

    <div class="modal-body">
      <div class="row">

      <div class="col-md-6 contact_type_div">
        <div class="form-group">
            <?php echo Form::label('type', __('contact.contact_type') . ':*' ); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php echo Form::select('type', $types, null , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('name', __('contact.name') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' => __('contact.name'), 'required']);; ?>

            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-4 supplier_fields">
        <div class="form-group">
            <?php echo Form::label('supplier_business_name', __('business.business_name') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-briefcase"></i>
                </span>
                <?php echo Form::text('supplier_business_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('business.business_name')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('contact_id', __('lang_v1.contact_id') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-badge"></i>
                </span>
                <?php echo Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-6 customer_fields">
        <div class="form-group">
            <?php echo Form::label('customer_group_id', __('lang_v1.customer_group') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-users"></i>
                </span>
                <?php echo Form::select('customer_group_id', $customer_groups, 28, ['class' => 'form-control']);; ?>

            </div>
        </div>
      </div>
        
        <div class="clearfix"></div>

        
        
        

        
      <div class="col-md-12">
        <hr/>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('mobile', __('contact.mobile') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                </span>
                <?php echo Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]);; ?>

            </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('landline', __('contact.landline') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]);; ?>

            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('city', __('business.block_num') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.block_num')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('state', __('business.street') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.street')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('country', __('business.house_num') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-home"></i>
                </span>
                <?php echo Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.house_num')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('landmark', __('business.landmark') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('landmark', null, ['class' => 'form-control', 
                'placeholder' => __('business.landmark')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <?php echo Form::label('customer_area', __('business.area') . ':'); ?>

          <div class="input-group">
              <span class="input-group-addon">
                  <i class="fa fa-map-marker"></i>
              </span>
            <select class="form-control" name="customer_area" id="customer_area">
              <option value="">--Please Select Area--</option>
              <?php $__currentLoopData = $customer_areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option><?php echo e(app()->getLocale() == 'en' ? $item->AREA_NAME_EN : $item->AREA_NAME_AR, false); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
      </div>

      <div> 
      <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
      <div class="col-md-3">
        <div class="form-group">

          <label for="custom_field1"><?php echo e(__('lang_v1.contact_custom_field1'), false); ?></label>
          <input value="0" type="text" class="form-control" name="custom_field1" id="custom_field1">
        </div>
      </div>
      
      
      
      </div>
      <div class="clearfix"></div>

    </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>

  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->