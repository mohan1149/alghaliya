<span id="pl_span">
<div class="col-xs-6">
    <?php $__env->startComponent('components.widget'); ?>
        <table class="table table-striped">
            <tr>
                <th><?php echo e(__('report.opening_stock'), false); ?>:</th>
                <td>
                    <span class="opening_stock">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('home.total_purchase'), false); ?>:<br><small class="text-muted">(<?php echo app('translator')->getFromJson('product.exc_of_tax'); ?>, <?php echo app('translator')->getFromJson('sale.discount'); ?>)</small></th>
                <td>
                     <span class="total_purchase">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('report.total_stock_adjustment'), false); ?>:</th>
                <td>
                     <span class="total_adjustment">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr> 
            <tr>
                <th><?php echo e(__('report.total_expense'), false); ?>:</th>
                <td>
                     <span class="total_expense">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <?php
                $essentials_enabled = Module::has('Essentials') && !empty($__is_essentials_enabled) ? true : false;
            ?>
            <?php if($essentials_enabled): ?>
                <tr>
                    <th><?php echo e(__('essentials::lang.total_payroll'), false); ?>:</th>
                    <td>
                         <span class="total_payroll">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            <?php endif; ?>

            <?php if(isset($show_manufacturing_data) && $show_manufacturing_data): ?>
                <tr>
                    <th><?php echo e(__('manufacturing::lang.total_production_cost'), false); ?>:</th>
                    <td>
                         <span class="total_production_cost">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <th><?php echo e(__('lang_v1.total_shipping_charges'), false); ?>:</th>
                <td>
                     <span class="total_transfer_shipping_charges">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_sell_discount'), false); ?>:</th>
                <td>
                     <span class="total_sell_discount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_reward_amount'), false); ?>:</th>
                <td>
                     <span class="total_reward_amount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_sell_return'), false); ?>:</th>
                <td>
                     <span class="total_sell_return">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
        </table>
    <?php echo $__env->renderComponent(); ?>
</div>

	

	

	
	
<div class="col-xs-6">
    <?php $__env->startComponent('components.widget'); ?>
        <table class="table table-striped">
            <tr>
                <th><?php echo e(__('report.closing_stock'), false); ?>:</th>
                <td>
                    <span class="closing_stock">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>

            <tr>
                <th><?php echo e(__('report.total_stock_recovered'), false); ?>:</th>
                <td>
                     <span class="total_recovered">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_purchase_return'), false); ?>:</th>
                <td>
                     <span class="total_purchase_return">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th><?php echo e(__('lang_v1.total_purchase_discount'), false); ?>:</th>
                <td>
                     <span class="total_purchase_discount">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="2">
                &nbsp;
                </td>
            </tr>
        </table>
    <?php echo $__env->renderComponent(); ?>
</div>
		
<br>
<div class="col-xs-12">
    <?php $__env->startComponent('components.widget'); ?>
        <h3 class="text-muted mb-0">
            <?php echo e(__('lang_v1.gross_profit'), false); ?>: 
            <span class="gross_profit">
                <i class="fa fa-refresh fa-spin fa-fw"></i>
            </span>
        </h3>
        <small class="help-block">(<?php echo app('translator')->getFromJson('lang_v1.total_sell_price'); ?> - <?php echo app('translator')->getFromJson('lang_v1.total_purchase_price'); ?>)</small>

        <h3 class="text-muted mb-0">
            <?php echo e(__('report.net_profit'), false); ?>: 
            <span class="net_profit">
                <i class="fa fa-refresh fa-spin fa-fw"></i>
            </span>
        </h3>
        <small class="help-block">(<?php echo app('translator')->getFromJson('report.closing_stock'); ?> + <?php echo app('translator')->getFromJson('home.total_sell'); ?> + <?php echo app('translator')->getFromJson('report.total_stock_recovered'); ?> + <?php echo app('translator')->getFromJson('lang_v1.total_purchase_return'); ?> + <?php echo app('translator')->getFromJson('lang_v1.total_purchase_discount'); ?>) <br> - (<?php echo app('translator')->getFromJson('report.opening_stock'); ?> + <?php echo app('translator')->getFromJson('home.total_purchase'); ?> + <?php echo app('translator')->getFromJson('report.total_expense'); ?> <?php if($essentials_enabled): ?> + <?php echo app('translator')->getFromJson('essentials::lang.total_payroll'); ?> <?php endif; ?> + <?php echo app('translator')->getFromJson('lang_v1.total_shipping_charges'); ?> + <?php echo app('translator')->getFromJson('lang_v1.total_sell_discount'); ?> + <?php echo app('translator')->getFromJson('lang_v1.total_reward_amount'); ?>)</small>
    <?php echo $__env->renderComponent(); ?>
</div>
</span>