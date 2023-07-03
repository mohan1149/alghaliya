

<?php $__env->startSection('title', __( 'lang_v1.view_user' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->getFromJson( 'lang_v1.view_user' ); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="profile-username"><?php echo e($user->user_full_name, false); ?></h3>
                </div>
                <div class="col-md-6">
                    <p><strong><?php echo app('translator')->getFromJson( 'business.email' ); ?>: </strong> <?php echo e($user->email, false); ?></p>
                    <p><strong><?php echo app('translator')->getFromJson( 'user.role' ); ?>: </strong> <?php echo e($user->role_name, false); ?></p>
                    <p><strong><?php echo app('translator')->getFromJson( 'business.username' ); ?>: </strong> <?php echo e($user->username, false); ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong><?php echo app('translator')->getFromJson( 'lang_v1.cmmsn_percent' ); ?>: </strong> <?php echo e($user->cmmsn_percent, false); ?>%</p>
                    <p><?php if($user->status == 'active'): ?> <span class="label label-success"><?php echo app('translator')->getFromJson('business.is_active'); ?></span> <?php else: ?> <span class="label label-danger"><?php echo app('translator')->getFromJson('business.inactive'); ?></span> <?php endif; ?></p>
                    <p><strong><?php echo app('translator')->getFromJson( 'lang_v1.cmmsn_percent' ); ?>: </strong> <?php echo e($user->cmmsn_percent, false); ?>%</p>
                    <?php
                        $selected_contacts = ''
                    ?>
                    <?php if(count($user->contactAccess)): ?> 
                        <?php
                            $selected_contacts_array = [];
                        ?>
                        <?php $__currentLoopData = $user->contactAccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <?php
                                $selected_contacts_array[] = $contact->name; 
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php
                            $selected_contacts = implode(', ', $selected_contacts_array);
                        ?>
                    <?php else: ?> 
                        <?php
                            $selected_contacts = __('lang_v1.all'); 
                        ?>
                    <?php endif; ?>
                    <p><strong><?php echo app('translator')->getFromJson( 'lang_v1.allowed_contacts' ); ?>: </strong> <?php echo e($selected_contacts, false); ?></p>
                </div>
            </div>
           <?php echo $__env->make('user.show_details', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->renderComponent(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>