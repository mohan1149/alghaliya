
<?php $__env->startSection('title', __('lang_v1.regular_customers')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <?php echo app('translator')->getFromJson('lang_v1.regular_customers'); ?>
        <small><?php echo app('translator')->getFromJson( 'contact.manage_your_contact', ['contacts' =>  __('lang_v1.regular_customers') ]); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <input type="hidden" value="regular" id="contact_type">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'contact.all_your_contact', ['contacts' => __('lang_v1.regular_customers') ])]); ?>
        <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                        data-href="<?php echo e(action('ContactController@create', ['type' => 'regular']), false); ?>" 
                        data-container=".contact_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="regular_customers_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('user.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('contact.mobile'); ?></th>
                            <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade contact_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>