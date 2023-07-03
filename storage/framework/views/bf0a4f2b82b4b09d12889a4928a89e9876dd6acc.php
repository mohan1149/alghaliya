<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo e($types_of_service->name, false); ?></h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <?php
                        $packing_charge = !empty($transaction) ? $transaction->packing_charge : $types_of_service->packing_charge;
                        $packing_charge_type = !empty($transaction) ? $transaction->packing_charge_type : $types_of_service->packing_charge_type;
                    ?>
                    <?php echo Form::label('packing_charge', __( 'lang_v1.packing_charge' ) . ':'); ?>

                    <div class="input-group" <?php if($types_of_service->packing_charge_type != 'percent'): ?> style="width: 100%;" <?php endif; ?>>
                        <?php echo Form::text('packing_charge', number_format($packing_charge, config('constants.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'placeholder' => __( 'lang_v1.packing_charge'), 'style' => 'width: 100%;' ]);; ?>

                        <?php if($packing_charge_type == 'percent'): ?>
                            <span class="input-group-addon">%</span>
                        <?php endif; ?>

                        <?php echo Form::hidden('packing_charge_type', $packing_charge_type, ['id' => 'packing_charge_type']);; ?>

                    </div>
                </div>
                <?php if($types_of_service->enable_custom_fields == 1): ?>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('service_custom_field_1', __( 'lang_v1.service_custom_field_1' ) . ':'); ?>

                        <?php echo Form::date('service_custom_field_1', !empty($transaction) ? $transaction->service_custom_field_1 : date('Y-m-d'), ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_1') ]);; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('service_custom_field_2', __( 'lang_v1.service_custom_field_2', ['number' => 2] ) . ':'); ?>

                        <?php echo Form::text('service_custom_field_2', !empty($transaction) ? $transaction->service_custom_field_2 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_2') ]);; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('service_custom_field_3', __( 'lang_v1.service_custom_field_3') . ':'); ?>

                        <?php echo Form::text('service_custom_field_3', !empty($transaction) ? $transaction->service_custom_field_3 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_3') ]);; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('service_custom_field_4', __( 'lang_v1.service_custom_field_4') . ':'); ?>

                        <?php echo Form::text('service_custom_field_4', !empty($transaction) ? $transaction->service_custom_field_4 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_4') ]);; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->