<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{$types_of_service->name}}</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-12">
                    @php
                        $packing_charge = !empty($transaction) ? $transaction->packing_charge : $types_of_service->packing_charge;
                        $packing_charge_type = !empty($transaction) ? $transaction->packing_charge_type : $types_of_service->packing_charge_type;
                    @endphp
                    {!! Form::label('packing_charge', __( 'lang_v1.packing_charge' ) . ':') !!}
                    <div class="input-group" @if($types_of_service->packing_charge_type != 'percent') style="width: 100%;" @endif>
                        {!! Form::text('packing_charge', @num_format($packing_charge), ['class' => 'form-control input_number', 'placeholder' => __( 'lang_v1.packing_charge'), 'style' => 'width: 100%;' ]); !!}
                        @if($packing_charge_type == 'percent')
                            <span class="input-group-addon">%</span>
                        @endif

                        {!! Form::hidden('packing_charge_type', $packing_charge_type, ['id' => 'packing_charge_type']); !!}
                    </div>
                </div>
                @if($types_of_service->enable_custom_fields == 1)
                    <div class="form-group col-md-6">
                        {!! Form::label('service_custom_field_1', __( 'lang_v1.service_custom_field_1' ) . ':') !!}
                        {!! Form::date('service_custom_field_1', !empty($transaction) ? $transaction->service_custom_field_1 : date('Y-m-d'), ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_1') ]); !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('service_custom_field_2', __( 'lang_v1.service_custom_field_2', ['number' => 2] ) . ':') !!}
                        {!! Form::text('service_custom_field_2', !empty($transaction) ? $transaction->service_custom_field_2 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_2') ]); !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('service_custom_field_3', __( 'lang_v1.service_custom_field_3') . ':') !!}
                        {!! Form::text('service_custom_field_3', !empty($transaction) ? $transaction->service_custom_field_3 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_3') ]); !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('service_custom_field_4', __( 'lang_v1.service_custom_field_4') . ':') !!}
                        {!! Form::text('service_custom_field_4', !empty($transaction) ? $transaction->service_custom_field_4 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.service_custom_field_4') ]); !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.save' )</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->