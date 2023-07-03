<div class="">
    <?php $__env->startComponent('components.widget'); ?>
	
        <table class="table table-striped">
			
			<?php $__currentLoopData = $payments_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$payments_report_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
				<th><?php echo e($payments_report_item['name'], false); ?>:</th>
                <td>
                    <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($payments_report_item['amount'], false); ?>

                    </span>
                </td>
                
            </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			
        </table>
    <?php echo $__env->renderComponent(); ?>
</div>