<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="col-md-2 col-xs-4 product_list no-print" >
	 <div class="product_box bg-gray"  data-toggle="tooltip" data-placement="bottom" data-variation_id="<?php echo e($product->product_id, false); ?>" title="<?php echo e($product->name, false); ?>" >
		<div class="image-container" style="height: 100px; width :90px;">
			<?php if(!empty($product->product_image)): ?>
				<img src="<?php echo e(asset('/uploads/img/' . $product->product_image), false); ?>" alt="Product Image" width="193px;" height="194px;">
			<?php else: ?>
				<img src="<?php echo e(asset('/img/default.png'), false); ?>" alt="Product Image" width="193px;" height="194px;">
			<?php endif; ?>
		</div>
			<div class="text text-muted text-uppercase">
				<small><?php echo e($product->name, false); ?> 
				
				</small>
			</div>
			
		</div>
		
	</div>
	
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<input type="hidden" id="no_products_found">
	<div class="col-md-12">
		<h4 class="text-center">
			<?php echo app('translator')->getFromJson('lang_v1.no_products_to_display'); ?>
		</h4>
	</div>
<?php endif; ?>

<div id="myModal" class="modal">
</div>
 