<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('ContactController@update', [$contact->id]), 'method' => 'PUT', 'id' => 'contact_edit_form']); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson('contact.edit_contact'); ?></h4>
    </div>

    <div class="modal-body">

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
              <?php echo Form::label('type', __('contact.contact_type') . ':*' ); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                  </span>
                  <?php echo Form::select('type', $types, $contact->type, ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']);; ?>

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
                  <?php echo Form::text('name', $contact->name, ['class' => 'form-control','placeholder' => __('contact.name'), 'required']);; ?>

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
                  <?php echo Form::text('supplier_business_name', 
                  $contact->supplier_business_name, ['class' => 'form-control', 'required', 'placeholder' => __('business.business_name')]);; ?>

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
                  <input type="hidden" id="hidden_id" value="<?php echo e($contact->id, false); ?>">
                  <?php echo Form::text('contact_id', $contact->contact_id, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]);; ?>

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
                  <?php echo Form::select('customer_group_id', $customer_groups, $contact->customer_group_id, ['class' => 'form-control']);; ?>

              </div>
          </div>
        </div>
        
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
                <?php echo Form::text('mobile', $contact->mobile, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]);; ?>

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
                <?php echo Form::text('landline', $contact->landline, ['class' => 'form-control', 'placeholder' => __('contact.landline')]);; ?>

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
                <?php echo Form::text('city', $contact->city, ['class' => 'form-control', 'placeholder' => __('business.block_num')]);; ?>

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
                <?php echo Form::text('state', $contact->state, ['class' => 'form-control', 'placeholder' => __('business.street')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('country', __('business.house_num') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <?php echo Form::text('country', $contact->country, ['class' => 'form-control', 'placeholder' => __('business.house_num')]);; ?>

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
                <?php echo Form::text('landmark', $contact->landmark, ['class' => 'form-control', 'placeholder' => __('business.landmark')]);; ?>

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
              <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $uni_area = app()->getLocale() == 'en' ? $item->AREA_NAME_EN : $item->AREA_NAME_AR;
              ?>
                <option <?php echo e($contact->custom_field4 == $uni_area ? 'selected' : 'none', false); ?>>
                  <?php echo e($uni_area, false); ?>

                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
      
      
      <div class="clearfix"></div>

    </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->