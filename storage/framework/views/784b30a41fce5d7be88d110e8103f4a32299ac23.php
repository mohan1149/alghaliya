
<?php $__env->startSection('title', __('lang_v1.'.$type.'s')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <?php echo app('translator')->getFromJson('lang_v1.'.$type.'s'); ?>
        <small><?php echo app('translator')->getFromJson( 'contact.manage_your_contact', ['contacts' =>  __('lang_v1.'.$type.'s') ]); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <input type="hidden" value="<?php echo e($type, false); ?>" id="contact_type">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'contact.all_your_contact', ['contacts' => __('lang_v1.'.$type.'s') ])]); ?>
        <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create')): ?>
            <?php $__env->slot('tool'); ?>
                <div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                        data-href="<?php echo e(action('ContactController@create', ['type' => $type]), false); ?>" 
                        data-container=".contact_modal">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('messages.add'); ?></button>
                </div>
            <?php $__env->endSlot(); ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')): ?>
            <div class="container-fluid">
                <?php echo Form::label('sell_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('contact_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control contact_list_filter_date_range', 'readonly']);; ?>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="contact_table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('lang_v1.contact_id'); ?></th>
                            <?php if($type == 'supplier'): ?> 
                                <th><?php echo app('translator')->getFromJson('business.business_name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('contact.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.added_on'); ?></th>
                                <th><?php echo app('translator')->getFromJson('contact.mobile'); ?></th>
                                <th><?php echo app('translator')->getFromJson('contact.total_purchase_due'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.total_purchase_return_due'); ?></th>
                                <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                            <?php elseif( $type == 'customer'): ?>
                                <th><?php echo app('translator')->getFromJson('user.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.added_on'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.renewal_count'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.customer_group'); ?></th>
                                <th><?php echo app('translator')->getFromJson('business.address'); ?></th>
                                <th><?php echo app('translator')->getFromJson('contact.mobile'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.subscription_cost'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.subscription_pieces'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.quota_used'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.quota_left'); ?></th>
                                <th><?php echo app('translator')->getFromJson('lang_v1.customer_status'); ?></th>
                                <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php if($type == 'customer'): ?>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="7"><?php echo app('translator')->getFromJson('lang_v1.grand_total'); ?></td>
                            <td><span class="display_currency" id="footer_subscription_total" data-currency_symbol ="true"></span></td>
                            <td colspan="5"></td>
                        </tr>
                    </tfoot>
                    <?php else: ?>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td <?php if($type == 'supplier'): ?> colspan="5" <?php elseif( $type == 'customer'): ?> <?php if($reward_enabled): ?> colspan="7" <?php else: ?> colspan="6" <?php endif; ?> <?php endif; ?>><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                            <td><span class="display_currency" id="footer_contact_due" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_contact_return_due" data-currency_symbol ="true"></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
                    <?php endif; ?>
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