{{-- mohan_pos_terminal --}}
@extends('layouts.app')

@section('title', 'POS')

@section('content')

    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>Add Purchase</h1> -->
    <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
    <!-- </section> -->
    <style type="text/css">
        .product_box .image-container img {
            height: 90px;
            width: 84px;
        }
    </style>
    <!-- Main content -->
    <section class="content no-print">
        @if (!empty($pos_settings['allow_overselling']))
            <input type="hidden" id="is_overselling_allowed">
        @endif
        @if (session('business.enable_rp') == 1)
            <input type="hidden" id="reward_point_enabled">
        @endif
        <div class="row">
            <div class="@if (!empty($pos_settings['hide_product_suggestion']) && !empty($pos_settings['hide_recent_trans'])) col-md-5 col-md-offset-1 @else col-md-5 @endif col-sm-8">
                @component('components.widget', ['class' => 'box-success'])
                    @slot('header')
                        <div class="col-sm-6">
                            <h3 class="box-title">POS Terminal <i class="fa fa-keyboard-o hover-q text-muted" aria-hidden="true"
                                    data-container="body" data-toggle="popover" data-placement="bottom"
                                    data-content="@include('sale_pos.partials.keyboard_shortcuts_details')" data-html="true" data-trigger="hover"
                                    data-original-title="" title=""></i></h3>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-right"><strong>@lang('sale.location'):</strong> {{ $default_location->name }}</p>
                        </div>
                        <input type="hidden" id="item_addition_method" value="{{ $business_details->item_addition_method }}">
                    @endslot
                    <div class="modal fade outside_customer_modal" tabindex="-1" role="dialog"
                        aria-labelledby="gridSystemModalLabel">
                    </div>
                    <div class="modal fade vallet_form" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                    </div>
                    <div class="modal fade outside_order_modal" tabindex="-1" role="dialog"
                        aria-labelledby="gridSystemModalLabel">
                    </div>
                    <div style="display: flex">
                        <input type="text" name="" id="searchReportsInput" placeholder="Phone/Invoice" class="form-control"
                            width="70%">
                        <button type="button" id="searchReports" class="btn btn-info" data-toggle="modal" data-target="#oldOrders">
                            Search
                        </button>
                    </div>
                    <div class="text-center bg-red bg-danger">
                        <p style="padding: 4px;margin-top:5px"><strong>Today Items Count: {{$todayItemsCount}}. </strong>(Max Allowed - 700)</p>
                    </div>
                    <div class="modal fade" id="oldOrders" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Customer Orders</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
									<table class="table">
										<th>Name</th>
										<th>Phone</th>
										<th>Invoice ID</th>
										<th>Payment Status</th>
										<th>Amount</th>
										<th>Date</th>
										<th>View</th>
										<tbody id="oldOrdersTable"></tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::open(['url' => action('SellPosController@store'), 'method' => 'post', 'id' => 'add_pos_sell_form']) !!}
                    {!! Form::hidden('location_id', $default_location->id, [
                        'id' => 'location_id',
                        'data-receipt_printer_type' => !empty($default_location->receipt_printer_type)
                            ? $default_location->receipt_printer_type
                            : 'browser',
                        'data-default_accounts' => $default_location->default_payment_accounts,
                    ]) !!}

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @if (!empty($pos_settings['enable_transaction_date']))
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('transaction_date', __('sale.sale_date') . ':*') !!}
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            {!! Form::text('transaction_date', $default_datetime, ['class' => 'form-control', 'readonly', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (config('constants.enable_sell_in_diff_currency') == true)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-exchange"></i>
                                            </span>
                                            {!! Form::text('exchange_rate', config('constants.currency_exchange_rate'), [
                                                'class' => 'form-control input-sm input_number',
                                                'placeholder' => __('lang_v1.currency_exchange_rate'),
                                                'id' => 'exchange_rate',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($price_groups) && count($price_groups) > 1)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            @php
                                                reset($price_groups);
                                                $selected_price_group = !empty($default_price_group_id) && array_key_exists($default_price_group_id, $price_groups) ? $default_price_group_id : null;
                                            @endphp
                                            {!! Form::hidden('hidden_price_group', key($price_groups), ['id' => 'hidden_price_group']) !!}
                                            {!! Form::select('price_group', $price_groups, $selected_price_group, [
                                                'class' => 'form-control select2',
                                                'id' => 'price_group',
                                                'style' => 'width: 100%;',
                                            ]) !!}
                                            <span class="input-group-addon">
                                                @show_tooltip(__('lang_v1.price_group_help_text'))
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @php
                                    reset($price_groups);
                                @endphp
                                {!! Form::hidden('price_group', key($price_groups), ['id' => 'price_group']) !!}
                            @endif
                            @if (!empty($default_price_group_id))
                                {!! Form::hidden('default_price_group', $default_price_group_id, ['id' => 'default_price_group']) !!}
                            @endif

                            @if (in_array('types_of_service', $enabled_modules) && !empty($types_of_service))
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-external-link text-primary service_modal_btn"></i>
                                            </span>
                                            {!! Form::select('types_of_service_id', $types_of_service, null, [
                                                'class' => 'form-control',
                                                'id' => 'types_of_service_id',
                                                'style' => 'width: 100%;',
                                                'placeholder' => __('lang_v1.select_types_of_service'),
                                            ]) !!}

                                            {!! Form::hidden('types_of_service_price_group', null, ['id' => 'types_of_service_price_group']) !!}

                                            <span class="input-group-addon">
                                                @show_tooltip(__('lang_v1.types_of_service_help'))
                                            </span>
                                        </div>
                                        <small>
                                            <p class="help-block hide" id="price_group_text">@lang('lang_v1.price_group'): <span></span>
                                            </p>
                                        </small>
                                    </div>
                                </div>
                                <div class="modal fade types_of_service_modal" tabindex="-1" role="dialog"
                                    aria-labelledby="gridSystemModalLabel"></div>
                            @endif
                            <div class="col-md-4 col-sm-6">
                                <span class="customer-type hidden"></span>
                            </div>

                            @if (in_array('subscription', $enabled_modules))
                                <div class="col-md-4 pull-right col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            <!-- {!! Form::checkbox('is_recurring', 1, false, ['class' => 'input-icheck', 'id' => 'is_recurring']) !!} @lang('lang_v1.subscribe')? -->
                                            <!-- </label><button type="button" data-toggle="modal" data-target="#recurringInvoiceModal" class="btn btn-link"><i class="fa fa-external-link"></i></button>@show_tooltip(__('lang_v1.recurring_invoice_help')) -->

                                            {!! Form::checkbox('is_subscription', 1, false, ['id' => 'is_subscription']) !!} @lang('lang_v1.subscribe')?
                                        </label>

                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="@if (!empty($commission_agent)) col-sm-4 @else col-sm-6 @endif">
                                <div class="form-group" style="width: 100% !important">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="hidden" id="default_customer_id" value="{{ $walk_in_customer['id'] }}">
                                        <input type="hidden" id="default_customer_name"
                                            value="{{ $walk_in_customer['name'] }}">
                                        {!! Form::select('contact_id', [], null, [
                                            'class' => 'form-control mousetrap',
                                            'id' => 'customer_id',
                                            'placeholder' => 'Enter Customer name / phone',
                                            'required',
                                            'style' => 'width: 100%;',
                                        ]) !!}
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default bg-white btn-flat add_new_customer"
                                                data-name="" @if (!auth()->user()->can('customer.create')) disabled @endif><i
                                                    class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="@if (!empty($commission_agent)) col-sm-4 @else col-sm-6 @endif cu_add_sh"
                                style="display: none;">
                                <div class="form-group" style="width: 100% !important">
                                    <div class="input-group" style="margin-left: 47px;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list"></i>
                                        </span>
                                        <textarea class="form-control" name="cust_address" id="cust_address"></textarea>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="pay_term_number" id="pay_term_number"
                                value="{{ $walk_in_customer['pay_term_number'] }}">
                            <input type="hidden" name="pay_term_type" id="pay_term_type"
                                value="{{ $walk_in_customer['pay_term_type'] }}">

                            @if (!empty($commission_agent))
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::select('commission_agent', $commission_agent, null, [
                                            'class' => 'form-control select2',
                                            'placeholder' => __('lang_v1.commission_agent'),
                                        ]) !!}
                                    </div>
                                </div>
                            @endif

                            <div class="@if (!empty($commission_agent)) col-sm-4 @else col-sm-6 @endif">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default bg-white btn-flat"
                                                data-toggle="modal" data-target="#configure_search_modal"
                                                title="{{ __('lang_v1.configure_product_search') }}"><i
                                                    class="fa fa-barcode"></i></button>
                                        </div>
                                        {!! Form::text('search_product', null, [
                                            'class' => 'form-control mousetrap',
                                            'id' => 'search_product',
                                            'placeholder' => __('lang_v1.search_product_placeholder'),
                                            'disabled' => is_null($default_location) ? true : false,
                                            'autofocus' => is_null($default_location) ? false : true,
                                        ]) !!}
                                        <span class="input-group-btn">
                                            <button type="button"
                                                class="btn btn-default bg-white btn-flat pos_add_quick_product"
                                                data-href="{{ action('ProductController@quickAdd') }}"
                                                data-container=".quick_add_product_modal"><i
                                                    class="fa fa-plus-circle text-primary fa-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <select class="form-control" name="payment_status"id="payment_status">
                                    <option value="due">DUE</option>
                                    <option value="paid">PAID</option>
                                </select>
                            </div>

                            <!-- Call restaurant module if defined -->
                            @if (in_array('tables', $enabled_modules) || in_array('service_staff', $enabled_modules))
                                <span id="restaurant_module_span">
                                    <div class="col-md-3"></div>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-12 pos_product_div">
                                <input type="hidden" name="sell_price_tax" id="sell_price_tax"
                                    value="{{ $business_details->sell_price_tax }}">

                                <!-- Keeps count of product rows -->
                                <input type="hidden" id="product_row_count" value="0">
                                @php
                                    $hide_tax = '';
                                    if (session()->get('business.enable_inline_tax') == 0) {
                                        $hide_tax = 'hide';
                                    }
                                @endphp
                                <table class="table table-condensed table-bordered table-striped table-responsive"
                                    id="pos_table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="tex-center @if (!empty($pos_settings['inline_service_staff'])) col-md-3 @else col-md-4 @endif">
                                                @lang('sale.product') @show_tooltip(__('lang_v1.tooltip_sell_product_column'))
                                            </th>
                                            <th class="text-center col-md-3">
                                                @lang('sale.qty')
                                            </th>
                                            @if (!empty($pos_settings['inline_service_staff']))
                                                <th class="text-center col-md-2">
                                                    @lang('restaurant.service_staff')
                                                </th>
                                            @endif
                                            <th class="text-center col-md-2 {{ $hide_tax }}">
                                                @lang('sale.price_inc_tax')
                                            </th>
                                            <th class="text-center col-md-2">
                                                @lang('sale.subtotal')
                                            </th>
                                            <th class="text-center"><i class="fa fa-close" aria-hidden="true"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        @include('sale_pos.partials.pos_details')

                        @include('sale_pos.partials.payment_modal')

                        @if (empty($pos_settings['disable_suspend']))
                            @include('sale_pos.partials.suspend_note_modal')
                        @endif

                        @if (empty($pos_settings['disable_recurring_invoice']))
                            @include('sale_pos.partials.recurring_invoice_modal')
                        @endif
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
                @endcomponent
            </div>
            <div class="col-md-7 col-sm-12 pos_pod_list">
                @include('sale_pos.partials.right_div')
            </div>
            <div class="col-md-5 col-sm-12 pos_customer_subscripion_info">
                @include('sale_pos.partials.customer_subscription_info')
            </div>
        </div>
    </section>

    <!-- This will be printed -->
    <section class="invoice print_section" id="receipt_section">
    </section>
    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        @include('contact.create', ['quick_add' => true])
    </div>
    <!-- /.content -->
    <div class="modal fade register_details_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade close_register_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <!-- quick product modal -->
    <div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

    @include('sale_pos.partials.configure_search_modal')
    @include('restaurant.booking.create')

@stop

@section('javascript')
    <script>
        $('button.add_new_booking_btn').click(function() {
            $('div#add_booking_modal').modal('show');
        });
    </script>
    <script src="{{ asset('js/pos.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/printer.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>
    @include('sale_pos.partials.keyboard_shortcuts')

    <!-- Call restaurant module if defined -->
    @if (in_array('tables', $enabled_modules) ||
            in_array('modifiers', $enabled_modules) ||
            in_array('service_staff', $enabled_modules))
        <script src="{{ asset('js/restaurant.js?v=' . $asset_v) }}"></script>
    @endif
@endsection
