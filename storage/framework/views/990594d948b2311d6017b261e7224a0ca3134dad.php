<strong><?php echo e($contact->name, false); ?></strong><br>
<strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo app('translator')->getFromJson('business.address'); ?></strong>
<p class="text-muted">
    <?php if($contact->landmark): ?>
        <?php echo e($contact->landmark, false); ?>

    <?php endif; ?>

    <?php echo e(', ' . $contact->city, false); ?>


    <?php if($contact->state): ?>
        <?php echo e(', ' . $contact->state, false); ?>

    <?php endif; ?>
    <br>
    <?php if($contact->country): ?>
        <?php echo e($contact->country, false); ?>

    <?php endif; ?>
</p>
<?php if($contact->supplier_business_name): ?>
    <strong><i class="fa fa-briefcase margin-r-5"></i> 
    <?php echo app('translator')->getFromJson('business.business_name'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->supplier_business_name, false); ?>

    </p>
<?php endif; ?>