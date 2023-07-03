<strong><i class="fa fa-mobile margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.mobile'); ?></strong>
<p class="text-muted">
    <?php echo e($contact->mobile, false); ?>

</p>
<?php if($contact->landline): ?>
    <strong><i class="fa fa-phone margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.landline'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->landline, false); ?>

    </p>
<?php endif; ?>
<?php if($contact->alternate_number): ?>
    <strong><i class="fa fa-phone margin-r-5"></i> <?php echo app('translator')->getFromJson('contact.alternate_contact_number'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->alternate_number, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field1)): ?>
    <strong><?php echo app('translator')->getFromJson('lang_v1.contact_custom_field1'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field1, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field2)): ?>
    <strong><?php echo app('translator')->getFromJson('lang_v1.contact_custom_field2'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field2, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field3)): ?>
    <strong><?php echo app('translator')->getFromJson('lang_v1.contact_custom_field3'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field3, false); ?>

    </p>
<?php endif; ?>

<?php if(!empty($contact->custom_field4)): ?>
    <strong><?php echo app('translator')->getFromJson('lang_v1.contact_custom_field4'); ?></strong>
    <p class="text-muted">
        <?php echo e($contact->custom_field4, false); ?>

    </p>
<?php endif; ?>