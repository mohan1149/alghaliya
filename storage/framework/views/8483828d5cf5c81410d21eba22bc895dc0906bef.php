<div class="box box-widget <?php if($pos_settings['hide_product_suggestion'] == 0): ?> collapsed-box <?php endif; ?>">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo app('translator')->getFromJson('sale.recent_transactions'); ?></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<?php if($pos_settings['hide_product_suggestion'] == 0): ?>
					<i class="fa fa-plus"></i>
				<?php else: ?>
					<i class="fa fa-minus"></i>
				<?php endif; ?>
			</button>
		</div>

	<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->

	<div class="box-body">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_final" data-toggle="tab" aria-expanded="true"><b><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('sale.final'); ?></b></a></li>

				<li class=""><a href="#tab_quotation" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> <?php echo app('translator')->getFromJson('lang_v1.quotation'); ?></b></a></li>
				
				<li class=""><a href="#tab_draft" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> <?php echo app('translator')->getFromJson('sale.draft'); ?></b></a></li>
				
								<li class=""><a href="#tab_due" data-toggle="tab" aria-expanded="false"><b><i class="fa fa-terminal"></i> <?php echo app('translator')->getFromJson('lang_v1.due'); ?></b></a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_final">
				</div>
				<div class="tab-pane" id="tab_quotation">
				</div>
				<div class="tab-pane" id="tab_draft">
				</div>
				<div class="tab-pane" id="tab_due">
				</div>
			</div>
		</div>
	</div>
	<!-- /.box-body -->
</div>