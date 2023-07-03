

<?php $__env->startSection('title', __('lang_v1.drivers')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <?php echo app('translator')->getFromJson('lang_v1.drivers'); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'lang_v1.drivers', ['drivers' => __('lang_v1.drivers') ])]); ?>
        <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('DriverController@create'), false); ?>" 
                    data-container=".driver_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="drivers_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('lang_v1.driver_name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('contact.mobile'); ?></th>
                            <th><?php echo app('translator')->getFromJson('business.email'); ?></th>
                            
                            <th><?php echo app('translator')->getFromJson('lang_v1.civil_id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.company'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.actions'); ?></th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade driver_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>