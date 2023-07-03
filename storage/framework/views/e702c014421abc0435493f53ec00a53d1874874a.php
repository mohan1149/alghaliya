
<?php $__env->startSection('title', __( 'report.purchase_sell' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson( 'report.purchase_sell' ); ?>
        <small><?php echo app('translator')->getFromJson( 'report.purchase_sell_msg' ); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="print_section"><h2><?php echo e(session()->get('business.name'), false); ?> - <?php echo app('translator')->getFromJson( 'report.purchase_sell' ); ?></h2></div>
    <div class="row no-print">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="purchase_sell_location_filter">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key, false); ?>"><?php echo e($value, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="purchase_sell_date_filter">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date'), false); ?>

                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget', ['title' => __('sale.sells')]); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('report.total_sell'), false); ?>:</th>
                        <td>
                            <span class="total_sell">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.sell_inc_tax'), false); ?>:</th>
                        <td>
                             <span class="sell_inc_tax">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('lang_v1.total_sell_return_inc_tax'), false); ?>:</th>
                        <td>
                             <span class="total_sell_return">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.sell_due'), false); ?>: <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.sell_due') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                        <td>
                            <span class="sell_due">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
		    <div id="profit_loss_payments"></div>
		</div>
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget', ['title' => __('purchase.purchases')]); ?>
                <table class="table table-striped">
                    <tr>
                        <th><?php echo e(__('report.total_purchase'), false); ?>:</th>
                        <td>
                            <span class="total_purchase">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.purchase_inc_tax'), false); ?>:</th>
                        <td>
                             <span class="purchase_inc_tax">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('lang_v1.total_purchase_return_inc_tax'), false); ?>:</th>
                        <td>
                             <span class="purchase_return_inc_tax">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo e(__('report.purchase_due'), false); ?>: <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.purchase_due') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                        <td>
                             <span class="purchase_due">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </td>
                    </tr>
                </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-xs-6 col-md-6">
            <?php $__env->startComponent('components.widget', ['title' => __('sale.outside_orders')]); ?>
            <table class="table table-striped">
                <tr>
                    <th><?php echo e(__('report.total_outdoor_orders'), false); ?>:</th>
                    <td>
                        <span class="total_outdoor_orders">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_completed'), false); ?>:</th>
                    <td>
                        <span class="total_completed">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_outdoor_orders_value'), false); ?>:</th>
                    <td>
                        <span class="total_outdoor_orders_value">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
        
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget', ['title' => __('sale.subscriptions')]); ?>
            <table class="table table-striped">
                <tr>
                    <th><?php echo e(__('report.total_subscriptions'), false); ?>:</th>
                    <td>
                        <span class="total_subscriptions">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_paid_subscribers'), false); ?>:</th>
                    <td>
                        <span class="total_paid_subscribers">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_unpaid_subscribers'), false); ?>:</th>
                    <td>
                        <span class="total_unpaid_subscribers">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
        
        
        <div class="col-xs-6">
            <?php $__env->startComponent('components.widget', ['title' => __('sale.expenses')]); ?>
            <table class="table table-striped">
                <tr>
                    <th><?php echo e(__('report.total_expenses'), false); ?>:</th>
                    <td>
                        <span class="total_expenses">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_paid_expenses'), false); ?>:</th>
                    <td>
                        <span class="total_paid_expenses">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th><?php echo e(__('report.total_unpaid_expenses'), false); ?>:</th>
                    <td>
                        <span class="total_unpaid_expenses">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            </table>
            <?php echo $__env->renderComponent(); ?>
        </div>
        
        
        
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php $__env->startComponent('components.widget'); ?>
                <?php $__env->slot('title'); ?>
                    <?php echo e(__('lang_v1.purchase_sell_report_formula'), false); ?>  <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.over_all_sell_purchase') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php $__env->endSlot(); ?>
                <h3 class="text-muted">
                    <?php echo e(__('report.sell_minus_purchase'), false); ?>: 
                    <span class="sell_minus_purchase">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </h3>

                <h3 class="text-muted">
                    <?php echo e(__('report.difference_due'), false); ?>: 
                    <span class="difference_due">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </h3>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?></button>
        </div>
    </div>
	

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>