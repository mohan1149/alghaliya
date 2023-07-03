
<?php $__env->startSection('title', __('expense.expenses')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson('expense.expenses'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                        <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_for', __('expense.expense_for').':'); ?>

                        <?php echo Form::select('expense_for', $users, null, ['class' => 'form-control select2']);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_category_id',__('expense.expense_category').':'); ?>

                        <?php echo Form::select('expense_category_id', $categories, null, ['placeholder' =>
                        __('report.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'expense_category_id']);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'expense_date_range', 'readonly']);; ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php echo Form::label('expense_payment_status',  __('purchase.payment_status') . ':'); ?>

                        <?php echo Form::select('expense_payment_status', ['paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due'), 'partial' => __('lang_v1.partial')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]);; ?>

                    </div>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __('expense.all_expenses')]); ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.view')): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="expense_table_v2">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('messages.id'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('expense.expense_category'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('business.location'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('sale.payment_status'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('product.tax'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('sale.total_amount'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('purchase.payment_due'); ?>
                                    <th><?php echo app('translator')->getFromJson('expense.expense_for'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('expense.expense_note'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang_v1.added_by'); ?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray font-17 text-center footer-total">
                                    <td colspan="6"><strong><?php echo app('translator')->getFromJson('sale.total'); ?>:</strong></td>
                                    <td id="footer_payment_status_count"></td>
                                    <td><span class="display_currency" id="footer_expense_total" data-currency_symbol ="true"></span></td>
                                    <td><span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span></td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>

</section>
<!-- /.content -->
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
 <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>