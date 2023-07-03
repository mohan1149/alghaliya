

<?php $__env->startSection('title', __('lang_v1.renews')); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <?php echo app('translator')->getFromJson('lang_v1.renews'); ?>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'lang_v1.renews', ['outside_customers' => __('lang_v1.outside_customers') ])]); ?>
            <div class="table-responsive">
                <?php echo Form::text('renews_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control renews_list_filter_date_range', 'readonly']);; ?>


                <table class="table table-bordered table-striped" id="renews">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('lang_v1.customer_name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.customer_phone'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('lang_v1.date'); ?></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="2"><?php echo app('translator')->getFromJson('lang_v1.total'); ?></td>
                            <td><span class="display_currency" id="footer_renews_total" data-currency_symbol ="true"></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>