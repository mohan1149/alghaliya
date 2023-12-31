

<?php $__env->startSection('title', __( 'user.edit_user' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson( 'user.edit_user' ); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['url' => action('ManageUserController@update', [$user->id]), 'method' => 'PUT', 'id' => 'user_edit_form' ]); ?>

    <div class="row">
        <div class="col-md-12">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
            <div class="col-md-2">
                <div class="form-group">
                  <?php echo Form::label('surname', __( 'business.prefix' ) . ':'); ?>

                    <?php echo Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]);; ?>

                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                  <?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

                    <?php echo Form::text('first_name', $user->first_name, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]);; ?>

                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                  <?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

                    <?php echo Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]);; ?>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="form-group">
                  <?php echo Form::label('email', __( 'business.email' ) . ':*'); ?>

                    <?php echo Form::text('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.email' ) ]);; ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('password', __( 'business.password' ) . ':'); ?>

                    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => __( 'business.password' ) ]);; ?>

                    <p class="help-block"><?php echo app('translator')->getFromJson('user.leave_password_blank'); ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <?php echo Form::label('confirm_password', __( 'business.confirm_password' ) . ':'); ?>

                    <?php echo Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => __( 'business.confirm_password' ) ]);; ?>

                  
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-4">
                <div class="form-group">
                  <?php echo Form::label('cmmsn_percent', __( 'lang_v1.cmmsn_percent' ) . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.commsn_percent_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    <?php echo Form::text('cmmsn_percent', $user->cmmsn_percent, ['class' => 'form-control input_number', 'placeholder' => __( 'lang_v1.cmmsn_percent' )]);; ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <div class="checkbox">
                    <br/>
                      <label>
                        <?php echo Form::checkbox('selected_contacts', 1, 
                        $user->selected_contacts, 
                        [ 'class' => 'input-icheck', 'id' => 'selected_contacts']);; ?> <?php echo e(__( 'lang_v1.allow_selected_contacts' ), false); ?>

                      </label>
                      <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.allow_selected_contacts_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 selected_contacts_div <?php if(!$user->selected_contacts): ?> hide <?php endif; ?>">
                <div class="form-group">
                  <?php echo Form::label('selected_contacts', __('lang_v1.selected_contacts') . ':'); ?>

                    <div class="form-group">
                      <?php echo Form::select('selected_contact_ids[]', $contacts, $contact_access, ['class' => 'form-control select2', 'multiple', 'style' => 'width: 100%;' ]);; ?>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-4">
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                         <?php echo Form::checkbox('is_active', $user->status, $is_checked_checkbox, ['class' => 'input-icheck status']);; ?> <?php echo e(__('lang_v1.status_for_user'), false); ?>

                    </label>
                    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_enable_user_active') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                  </div>
                </div>
            </div>
            
        <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-12">
        <?php $__env->startComponent('components.widget', ['title' => __('lang_v1.roles_and_permissions')]); ?>
            <div class="col-md-6">
                <div class="form-group">
					 <div class="col-md-12">
                    <div class="checkbox">
                      <label>	

						  
                        <?php echo Form::checkbox('OEX_SHOW_HRM', 'OEX_SHOW_HRM', $user->OEX_SHOW_HRM, 
                        [ 'class' => 'input-icheck']);; ?> Access HRM
                      </label>
                    </div>
						 
						      <div class="checkbox">
                      <label>	

						  
                        <?php echo Form::checkbox('OEX_SHOW_POSTAB', 'OEX_SHOW_POSTAB', $user->OEX_SHOW_POSTAB, 
                        [ 'class' => 'input-icheck']);; ?> Access POS Tablet
                      </label>
                    </div>

                    <div class="checkbox">
                      <label>	

						  
                        <?php echo Form::checkbox('OEX_STOCK_TRANSFER_APPROVAL', 'OEX_STOCK_TRANSFER_APPROVAL', $user->OEX_STOCK_TRANSFER_APPROVAL, 
                        [ 'class' => 'input-icheck']);; ?> Access Stock Approval
                      </label>
                    </div>
						 
					                    <div class="checkbox">
                      <label>	

						  
                        <?php echo Form::checkbox('OEX_STORE_MANAGER', 'OEX_STORE_MANAGER', $user->OEX_STORE_MANAGER, 
                        [ 'class' => 'input-icheck']);; ?> Store Manager
                      </label>
                    </div>
						 
						 
                </div>
					
					
                  <?php echo Form::label('role', __( 'user.role' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.admin_role_location_permission_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    <?php echo Form::select('role', $roles, $user->roles->first()->id, ['class' => 'form-control select2']);; ?>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <h4><?php echo app('translator')->getFromJson( 'role.access_locations' ); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.access_locations_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h4>
            </div>
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                          <?php echo Form::checkbox('access_all_locations', 'access_all_locations', !is_array($permitted_locations) && $permitted_locations == 'all', 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'role.all_locations' ), false); ?> 
                        </label>
                        <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.all_location_permission') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    </div>
                  </div>
				
				<?php if($permitted_locations != "all"): ?>
				<?php $__currentLoopData = $permitted_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permitted_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php echo e($permitted_location, false); ?>

				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
			
	
				
              <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <div class="checkbox">
                      <label>
						
                        <?php echo Form::checkbox('location_permissions[]', 'location.' . $location->id, is_array($permitted_locations) && in_array($location->id, $permitted_locations), 
                        [ 'class' => 'input-icheck']);; ?> <?php echo e($location->name, false); ?>

                      </label>
                    </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php echo $__env->make('user.edit_profile_form_part', ['bank_details' => !empty($user->bank_details) ? json_decode($user->bank_details, true) : null], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" id="submit_user_button"><?php echo app('translator')->getFromJson( 'messages.update' ); ?></button>
        </div>
    </div>
    <?php echo Form::close(); ?>

  <?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#selected_contacts').on('ifChecked', function(event){
      $('div.selected_contacts_div').removeClass('hide');
    });
    $('#selected_contacts').on('ifUnchecked', function(event){
      $('div.selected_contacts_div').addClass('hide');
    });
  });

  $('form#user_edit_form').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    email: {
                        email: true,
                        remote: {
                            url: "/business/register/check-email",
                            type: "post",
                            data: {
                                email: function() {
                                    return $( "#email" ).val();
                                },
                                user_id: <?php echo e($user->id, false); ?>

                            }
                        }
                    },
                    password: {
                        minlength: 5
                    },
                    confirm_password: {
                        equalTo: "#password",
                    }
                },
                messages: {
                    password: {
                        minlength: 'Password should be minimum 5 characters',
                    },
                    confirm_password: {
                        equalTo: 'Should be same as password'
                    },
                    username: {
                        remote: 'Invalid username or User already exist'
                    },
                    email: {
                        remote: '<?php echo e(__("validation.unique", ["attribute" => __("business.email")]), false); ?>'
                    }
                }
            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>