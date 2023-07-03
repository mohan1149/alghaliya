<?php $request = app('Illuminate\Http\Request'); ?>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p> -->
          <!-- Status -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">

        <!-- Call superadmin module if defined -->
        <?php if(Module::has('Superadmin')): ?>
          <?php if ($__env->exists('superadmin::layouts.partials.sidebar')) echo $__env->make('superadmin::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <!-- Call ecommerce module if defined -->
        <?php if(Module::has('Ecommerce')): ?>
          <?php if ($__env->exists('ecommerce::layouts.partials.sidebar')) echo $__env->make('ecommerce::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <!-- <li class="header">HEADER</li> -->
        <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : '', false); ?>">
          <a href="<?php echo e(action('HomeController@index'), false); ?>">
            <i class="fa fa-dashboard"></i> <span>
            <?php echo app('translator')->getFromJson('home.home'); ?></span>
          </a>
        </li>
        <?php if(auth()->user()->can('user.view') || auth()->user()->can('user.create') || auth()->user()->can('roles.view')): ?>
        <li class="treeview <?php echo e(in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'active active-sub' : '', false); ?>">
            <a href="#">
                <i class="fa fa-users"></i>
                <span class="title"><?php echo app('translator')->getFromJson('user.user_management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check( 'user.view' )): ?>
                <li class="<?php echo e($request->segment(1) == 'users' ? 'active active-sub' : '', false); ?>">
                  <a href="<?php echo e(action('ManageUserController@index'), false); ?>">
                      <i class="fa fa-user"></i>
                      <span class="title">
                          <?php echo app('translator')->getFromJson('user.users'); ?>
                      </span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'roles' ? 'active active-sub' : '', false); ?>">
                  <a href="<?php echo e(action('RoleController@index'), false); ?>">
                      <i class="fa fa-briefcase"></i>
                      <span class="title">
                        <?php echo app('translator')->getFromJson('user.roles'); ?>
                      </span>
                  </a>
                </li>
              <?php endif; ?>
              
            </ul>
        </li>
        <?php endif; ?>
        <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view') ): ?>
          <li class="treeview <?php echo e(in_array($request->segment(1), ['contacts', 'customer-group']) ? 'active active-sub' : '', false); ?>" id="tour_step4">
            <a href="#" id="tour_step4_menu"><i class="fa fa-address-book"></i> <span><?php echo app('translator')->getFromJson('contact.contacts'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier.view')): ?>
                <li class="<?php echo e($request->input('type') == 'supplier' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ContactController@index', ['type' => 'supplier']), false); ?>"><i class="fa fa-star"></i> <?php echo app('translator')->getFromJson('report.supplier'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.view')): ?>
                <li class="<?php echo e($request->input('type') == 'customer' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ContactController@index', ['type' => 'customer']), false); ?>"><i class="fa fa-star"></i> <?php echo app('translator')->getFromJson('report.member'); ?></a></li>
                <li class="<?php echo e($request->input('type') == 'regular' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ContactController@index', ['type' => 'regular']), false); ?>"><i class="fa fa-star"></i> <?php echo app('translator')->getFromJson('lang_v1.regular_customer'); ?></a></li>
                <li class="<?php echo e($request->segment(1) == 'customer-group' ? 'active' : '', false); ?>"><a href="<?php echo e(action('CustomerGroupController@index'), false); ?>"><i class="fa fa-users"></i> <?php echo app('translator')->getFromJson('lang_v1.customer_groups'); ?></a></li>
                <li class="<?php echo e($request->segment(1) == 'renews' ? 'active' : '', false); ?>"><a href="/renews"><i class="fa fa-users"></i> <?php echo app('translator')->getFromJson('lang_v1.renews'); ?></a></li>                
              <?php endif; ?>

              <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create') ): ?>
                <li class="<?php echo e($request->segment(1) == 'contacts' && $request->segment(2) == 'import' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ContactController@getImportContacts'), false); ?>"><i class="fa fa-download"></i> <?php echo app('translator')->getFromJson('lang_v1.import_contacts'); ?></a></li>
              <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('product.view') || 
        auth()->user()->can('product.create') || 
        auth()->user()->can('brand.view') ||
        auth()->user()->can('unit.view') ||
        auth()->user()->can('category.view') ||
        auth()->user()->can('brand.create') ||
        auth()->user()->can('unit.create') ||
        auth()->user()->can('category.create') ): ?>
          <li class="treeview <?php echo e(in_array($request->segment(1), ['variation-templates', 'products', 'labels', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories', 'warranties']) ? 'active active-sub' : '', false); ?>" id="tour_step5">
            <a href="#" id="tour_step5_menu"><i class="fa fa-cubes"></i> <span><?php echo app('translator')->getFromJson('sale.products'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'products' && $request->segment(2) == '' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ProductController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('lang_v1.list_products'); ?></a></li>
              <?php endif; ?>
				              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'product-stock-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getProductStockReport'), false); ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i><?php echo app('translator')->getFromJson('report.stock_report'); ?></a></li>
              <?php endif; ?>
				
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'products' && $request->segment(2) == 'create' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ProductController@create'), false); ?>"><i class="fa fa-plus-circle"></i><?php echo app('translator')->getFromJson('product.add_product'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'gift-vouchers', false); ?>"><a href="<?php echo e(action('GiftVoucherController@index'), false); ?>"><i class="fa fa-gift"></i><?php echo app('translator')->getFromJson('lang_v1.gift_vouchers'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'gift-redeems', false); ?>"><a href="/gift-redeems"><i class="fa fa-plus-circle"></i><?php echo app('translator')->getFromJson('lang_v1.gift_redeems'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'labels' && $request->segment(2) == 'show' ? 'active' : '', false); ?>"><a href="<?php echo e(action('LabelsController@show'), false); ?>"><i class="fa fa-barcode"></i><?php echo app('translator')->getFromJson('barcode.print_labels'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'variation-templates' ? 'active' : '', false); ?>"><a href="<?php echo e(action('VariationTemplateController@index'), false); ?>"><i class="fa fa-circle-o"></i><span><?php echo app('translator')->getFromJson('product.variations'); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'import-products' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ImportProductsController@index'), false); ?>"><i class="fa fa-download"></i><span><?php echo app('translator')->getFromJson('product.import_products'); ?></span></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.opening_stock')): ?>
                <li class="<?php echo e($request->segment(1) == 'import-opening-stock' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ImportOpeningStockController@index'), false); ?>"><i class="fa fa-download"></i><span><?php echo app('translator')->getFromJson('lang_v1.import_opening_stock'); ?></span></a></li>
              <?php endif; ?>
              
              
              <?php if(auth()->user()->can('unit.view') || auth()->user()->can('unit.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'units' ? 'active' : '', false); ?>">
                  <a href="<?php echo e(action('UnitController@index'), false); ?>"><i class="fa fa-balance-scale"></i> <span><?php echo app('translator')->getFromJson('unit.units'); ?></span></a>
                </li>
              <?php endif; ?>

              <?php if(auth()->user()->can('category.view') || auth()->user()->can('category.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'categories' ? 'active' : '', false); ?>">
                  <a href="<?php echo e(action('CategoryController@index'), false); ?>"><i class="fa fa-tags"></i> <span><?php echo app('translator')->getFromJson('category.categories'); ?> </span></a>
                </li>
              <?php endif; ?>

              <?php if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'brands' ? 'active' : '', false); ?>">
                  <a href="<?php echo e(action('BrandController@index'), false); ?>"><i class="fa fa-diamond"></i> <span><?php echo app('translator')->getFromJson('brand.brands'); ?></span></a>
                </li>
              <?php endif; ?>

              
            </ul>
          </li>
        <?php endif; ?>
        <?php if(Module::has('Manufacturing')): ?>
          <?php if ($__env->exists('manufacturing::layouts.partials.sidebar')) echo $__env->make('manufacturing::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') || auth()->user()->can('purchase.update') ): ?>
        <li class="treeview <?php echo e(in_array($request->segment(1), ['purchases', 'purchase-return']) ? 'active active-sub' : '', false); ?>" id="tour_step6">
          <a href="#" id="tour_step6_menu"><i class="fa fa-arrow-circle-down"></i> <span><?php echo app('translator')->getFromJson('purchase.purchases'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == null ? 'active' : '', false); ?>"><a href="<?php echo e(action('PurchaseController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('purchase.list_purchase'); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchases' && $request->segment(2) == 'create' ? 'active' : '', false); ?>"><a href="<?php echo e(action('PurchaseController@create'), false); ?>"><i class="fa fa-plus-circle"></i> <?php echo app('translator')->getFromJson('purchase.add_purchase'); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.update')): ?>
              <li class="<?php echo e($request->segment(1) == 'purchase-return' ? 'active' : '', false); ?>"><a href="<?php echo e(action('PurchaseReturnController@index'), false); ?>"><i class="fa fa-undo"></i> <?php echo app('translator')->getFromJson('lang_v1.list_purchase_return'); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if(auth()->user()->can('sell.view') || auth()->user()->can('sell.create') || auth()->user()->can('direct_sell.access') ||  auth()->user()->can('view_own_sell_only')): ?>
          <li class="treeview <?php echo e(in_array( $request->segment(1), ['sells', 'pos', 'sell-return', 'ecommerce', 'discount', 'shipments']) ? 'active active-sub' : '', false); ?>" id="tour_step7">
            <a href="#" id="tour_step7_menu"><i class="fa fa-arrow-circle-up"></i> <span><?php echo app('translator')->getFromJson('sale.sale'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(auth()->user()->can('direct_sell.access') ||  auth()->user()->can('view_own_sell_only')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == null ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('lang_v1.all_sales'); ?></a></li>
              <?php endif; ?>
              <!-- Call superadmin module if defined -->
              <?php if(Module::has('Ecommerce')): ?>
                <?php if ($__env->exists('ecommerce::layouts.partials.sell_sidebar')) echo $__env->make('ecommerce::layouts.partials.sell_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('direct_sell.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'create' ? 'active' : '', false); ?>"><a href="<?php echo e(action('SellController@create'), false); ?>"><i class="fa fa-plus-circle"></i><?php echo app('translator')->getFromJson('sale.add_sale'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'pos' && $request->segment(2) == null ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellPosController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('sale.list_pos'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                <li class="<?php echo e($request->segment(1) == 'pos' && $request->segment(2) == 'create' ? 'active' : '', false); ?>"><a href="<?php echo e(action('SellPosController@create'), false); ?>"><i class="fa fa-plus-circle"></i><?php echo app('translator')->getFromJson('sale.pos_sale'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_drafts')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'drafts' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellController@getDrafts'), false); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i><?php echo app('translator')->getFromJson('lang_v1.list_drafts'); ?></a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('list_quotations')): ?>
                <li class="<?php echo e($request->segment(1) == 'sells' && $request->segment(2) == 'quotations' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellController@getQuotations'), false); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i><?php echo app('translator')->getFromJson('lang_v1.list_quotations'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <li class="<?php echo e($request->segment(1) == 'sell-return' && $request->segment(2) == null ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellReturnController@index'), false); ?>"><i class="fa fa-undo"></i><?php echo app('translator')->getFromJson('lang_v1.list_sell_return'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_shipping')): ?>
                <li class="<?php echo e($request->segment(1) == 'shipments' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellController@shipments'), false); ?>"><i class="fa fa-truck"></i><?php echo app('translator')->getFromJson('lang_v1.shipments'); ?></a></li>
              <?php endif; ?>
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('discount.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'discount' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('DiscountController@index'), false); ?>"><i class="fa fa-percent"></i><?php echo app('translator')->getFromJson('lang_v1.discounts'); ?></a></li>
              <?php endif; ?>
              
              <?php if(in_array('subscription', $enabled_modules) && auth()->user()->can('direct_sell.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'subscriptions'? 'active' : '', false); ?>" ><a href="<?php echo e(action('SellPosController@listSubscriptions'), false); ?>"><i class="fa fa-recycle"></i><?php echo app('translator')->getFromJson('lang_v1.subscriptions'); ?></a></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
        <?php if(Module::has('Repair')): ?>
          <?php if ($__env->exists('repair::layouts.partials.sidebar')) echo $__env->make('repair::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        

        

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
        <li class="treeview <?php echo e(in_array( $request->segment(1), ['expense-categories', 'expenses']) ? 'active active-sub' : '', false); ?>">
          <a href="#"><i class="fa fa-minus-circle"></i> <span><?php echo app('translator')->getFromJson('expense.expenses'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo e($request->segment(1) == 'expenses' && empty($request->segment(2)) ? 'active' : '', false); ?>"><a href="<?php echo e(action('ExpenseController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('lang_v1.list_expenses'); ?></a></li>
            <li class="<?php echo e($request->segment(1) == 'expenses' && $request->segment(2) == 'create' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ExpenseController@create'), false); ?>"><i class="fa fa-plus-circle"></i><?php echo app('translator')->getFromJson('messages.add'); ?> <?php echo app('translator')->getFromJson('expense.expenses'); ?></a></li>
            <li class="<?php echo e($request->segment(1) == 'expense-categories' ? 'active' : '', false); ?>"><a href="<?php echo e(action('ExpenseCategoryController@index'), false); ?>"><i class="fa fa-circle-o"></i><?php echo app('translator')->getFromJson('expense.expense_categories'); ?></a></li>
          </ul>
        </li>
        <?php endif; ?>
        

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account.access')): ?>
          <?php if(in_array('account', $enabled_modules)): ?>
            <li class="treeview <?php echo e($request->segment(1) == 'account' ? 'active active-sub' : '', false); ?>">
              <a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span><?php echo app('translator')->getFromJson('lang_v1.payment_accounts'); ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'account' ? 'active' : '', false); ?>"><a href="<?php echo e(action('AccountController@index'), false); ?>"><i class="fa fa-list"></i><?php echo app('translator')->getFromJson('account.list_accounts'); ?></a></li>

                  <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'balance-sheet' ? 'active' : '', false); ?>"><a href="<?php echo e(action('AccountReportsController@balanceSheet'), false); ?>"><i class="fa fa-book"></i><?php echo app('translator')->getFromJson('account.balance_sheet'); ?></a></li>

                  <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'trial-balance' ? 'active' : '', false); ?>"><a href="<?php echo e(action('AccountReportsController@trialBalance'), false); ?>"><i class="fa fa-balance-scale"></i><?php echo app('translator')->getFromJson('account.trial_balance'); ?></a></li>

                  <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'cash-flow' ? 'active' : '', false); ?>"><a href="<?php echo e(action('AccountController@cashFlow'), false); ?>"><i class="fa fa-exchange"></i><?php echo app('translator')->getFromJson('lang_v1.cash_flow'); ?></a></li>

                  <li class="<?php echo e($request->segment(1) == 'account' && $request->segment(2) == 'payment-account-report' ? 'active' : '', false); ?>"><a href="<?php echo e(action('AccountReportsController@paymentAccountReport'), false); ?>"><i class="fa fa-file-text-o"></i><?php echo app('translator')->getFromJson('account.payment_account_report'); ?></a></li>
              </ul>
            </li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if(auth()->user()->can('purchase_n_sell_report.view') 
          || auth()->user()->can('contacts_report.view') 
          || auth()->user()->can('stock_report.view') 
          || auth()->user()->can('tax_report.view') 
          || auth()->user()->can('trending_product_report.view') 
          || auth()->user()->can('sales_representative.view') 
          || auth()->user()->can('register_report.view')
          || auth()->user()->can('expense_report.view')
          ): ?>

          <li class="treeview <?php echo e(in_array( $request->segment(1), ['reports']) ? 'active active-sub' : '', false); ?>" id="tour_step8">
            <a href="#" id="tour_step8_menu"><i class="fa fa-bar-chart-o"></i> <span><?php echo app('translator')->getFromJson('report.reports'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit_loss_report.view')): ?>
                
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'purchase-sell' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getPurchaseSell'), false); ?>"><i class="fa fa-exchange"></i><?php echo app('translator')->getFromJson('report.purchase_sell_report'); ?></a></li>
                <li class="<?php echo e($request->segment(2) == 'today' ? 'active' : '', false); ?>" ><a href="/reports/today/profits"><i class="fa fa-exchange"></i><?php echo app('translator')->getFromJson('lang_v1.today_profits'); ?></a></li>
              <?php endif; ?>

              

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacts_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'customer-supplier' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getCustomerSuppliers'), false); ?>"><i class="fa fa-address-book"></i><?php echo app('translator')->getFromJson('report.contacts'); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'customer-group' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getCustomerGroup'), false); ?>"><i class="fa fa-users"></i><?php echo app('translator')->getFromJson('lang_v1.customer_groups_report'); ?></a></li>
              <?php endif; ?>
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'stock-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getStockReport'), false); ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i><?php echo app('translator')->getFromJson('report.stock_report'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <?php if(session('business.enable_product_expiry') == 1): ?>
                <li class="<?php echo e($request->segment(2) == 'stock-expiry' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getStockExpiryReport'), false); ?>"><i class="fa fa-calendar-times-o"></i><?php echo app('translator')->getFromJson('report.stock_expiry_report'); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                <?php if(session('business.enable_lot_number') == 1): ?>
                <li class="<?php echo e($request->segment(2) == 'lot-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getLotReport'), false); ?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i><?php echo app('translator')->getFromJson('lang_v1.lot_report'); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>

              

              

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>

                <li class="<?php echo e($request->segment(2) == 'items-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@itemsReport'), false); ?>"><i class="fa fa-tasks"></i><?php echo app('translator')->getFromJson('lang_v1.items_report'); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'product-purchase-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getproductPurchaseReport'), false); ?>"><i class="fa fa-arrow-circle-down"></i><?php echo app('translator')->getFromJson('lang_v1.product_purchase_report'); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'product-sell-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getproductSellReport'), false); ?>"><i class="fa fa-arrow-circle-up"></i><?php echo app('translator')->getFromJson('lang_v1.product_sell_report'); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'purchase-payment-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@purchasePaymentReport'), false); ?>"><i class="fa fa-money"></i><?php echo app('translator')->getFromJson('lang_v1.purchase_payment_report'); ?></a></li>

                <li class="<?php echo e($request->segment(2) == 'sell-payment-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@sellPaymentReport'), false); ?>"><i class="fa fa-money"></i><?php echo app('translator')->getFromJson('lang_v1.sell_payment_report'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_report.view')): ?>
                
                
                <li class="<?php echo e($request->segment(2) == 'expense-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getExpenseReportV2'), false); ?>"><i class="fa fa-search-minus" aria-hidden="true"></i></i><?php echo app('translator')->getFromJson('report.expense_report'); ?></a></li>
                
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register_report.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'register-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getRegisterReport'), false); ?>"><i class="fa fa-briefcase"></i><?php echo app('translator')->getFromJson('report.register_report'); ?></a></li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_representative.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'sales-representative-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getSalesRepresentativeReport'), false); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo app('translator')->getFromJson('report.sales_representative'); ?></a></li>
              <?php endif; ?>

              <?php if(in_array('tables', $enabled_modules)): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_n_sell_report.view')): ?>
                  <li class="<?php echo e($request->segment(2) == 'table-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getTableReport'), false); ?>"><i class="fa fa-table"></i><?php echo app('translator')->getFromJson('restaurant.table_report'); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>
              <?php if(in_array('service_staff', $enabled_modules)): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_representative.view')): ?>
                <li class="<?php echo e($request->segment(2) == 'service-staff-report' ? 'active' : '', false); ?>" ><a href="<?php echo e(action('ReportController@getServiceStaffReport'), false); ?>"><i class="fa fa-user-secret"></i><?php echo app('translator')->getFromJson('restaurant.service_staff_report'); ?></a></li>
                <?php endif; ?>
              <?php endif; ?>

            </ul>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup')): ?>
          <li class="treeview <?php echo e(in_array( $request->segment(1), ['backup']) ? 'active active-sub' : '', false); ?>">
              <a href="<?php echo e(action('BackUpController@index'), false); ?>"><i class="fa fa-dropbox"></i> <span><?php echo app('translator')->getFromJson('lang_v1.backup'); ?></span>
              </a>
          </li>
        <?php endif; ?>

        <!-- Call restaurant module if defined -->
        <?php if(in_array('booking', $enabled_modules)): ?>
          
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'bookings'? 'active active-sub' : '', false); ?>">
              <a href="<?php echo e(action('Restaurant\BookingController@index'), false); ?>"><i class="fa fa-calendar-check-o"></i> <span><?php echo app('translator')->getFromJson('restaurant.bookings'); ?></span></a>
          </li>
          <?php endif; ?>
          
        <?php endif; ?>

        
        <?php if(in_array('service_staff', $enabled_modules)): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'orders' ? 'active active-sub' : '', false); ?>">
              <a href="<?php echo e(action('Restaurant\OrderController@index'), false); ?>"><i class="fa fa-list-alt"></i> <span><?php echo app('translator')->getFromJson('restaurant.orders'); ?></span></a>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_notifications')): ?>
          <li class="treeview <?php echo e($request->segment(1) == 'notification-templates' ? 'active active-sub' : '', false); ?>">
              <a href="<?php echo e(action('NotificationTemplateController@index'), false); ?>"><i class="fa fa-envelope"></i> <span><?php echo app('translator')->getFromJson('lang_v1.notification_templates'); ?></span>
              </a>
          </li>
        <?php endif; ?>
        




          
        
        <li class="treeview <?php if( $request->segment(1) == 'outside-orders' || $request->segment(1) == 'drivers' || $request->segment(1) == 'outside-customers'): ?> <?php echo e('active active-sub', false); ?> <?php endif; ?>">
        	<a href="#" ><i class="fa fa-cog"></i> <span><?php echo app('translator')->getFromJson('lang_v1.outside_orders'); ?></span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu" >
            	<li class="treeview <?php echo e($request->segment(1) == 'outside-orders' && $request->segment(2) == '' ? 'active active-sub' : '', false); ?>">
            		<a href="<?php echo e(action('OutsideOrderController@index'), false); ?>"><i class="fa fa-cogs"></i> <span><?php echo app('translator')->getFromJson('lang_v1.outside_orders'); ?></span></a>
            	</li>
            	<li class="treeview <?php echo e(($request->segment(1) == 'outside-customers') ? 'active active-sub' : '', false); ?>">
            		<a href="<?php echo e(action('OutsideCustomerController@index'), false); ?>"><i class="fa fa-users"></i> <span><?php echo app('translator')->getFromJson('lang_v1.customers'); ?></span></a>
            	</li>
            	<li class="treeview <?php echo e(($request->segment(1) == 'drivers') ? 'active active-sub' : '', false); ?>">
            		<a href="<?php echo e(action('DriverController@index'), false); ?>"><i class="fa fa-car"></i> <span><?php echo app('translator')->getFromJson('lang_v1.drivers'); ?></span></a>
            	</li>
          	</ul>
        <li>
        

        <?php if(auth()->user()->can('business_settings.access') || 
        auth()->user()->can('barcode_settings.access') ||
        auth()->user()->can('invoice_settings.access') ||
        auth()->user()->can('tax_rate.view') ||
        auth()->user()->can('tax_rate.create')): ?>
        
        
        <li class="treeview <?php if( in_array($request->segment(1), ['business', 'tax-rates', 'barcodes', 'invoice-schemes', 'business-location', 'invoice-layouts', 'printers', 'subscription', 'types-of-service']) || in_array($request->segment(2), ['tables', 'modifiers']) ): ?> <?php echo e('active active-sub', false); ?> <?php endif; ?>">
        
          <a href="#" id="tour_step2_menu"><i class="fa fa-cog"></i> <span><?php echo app('translator')->getFromJson('business.settings'); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" id="tour_step3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
              <li class="<?php echo e($request->segment(1) == 'business' ? 'active' : '', false); ?>">
                <a href="<?php echo e(action('BusinessController@getBusinessSettings'), false); ?>" id="tour_step2"><i class="fa fa-cogs"></i> <?php echo app('translator')->getFromJson('business.business_settings'); ?></a>
              </li>
              <li class="<?php echo e($request->segment(1) == 'business-location' ? 'active' : '', false); ?>" >
                <a href="<?php echo e(action('BusinessLocationController@index'), false); ?>"><i class="fa fa-map-marker"></i> <?php echo app('translator')->getFromJson('business.business_locations'); ?></a>
              </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_settings.access')): ?>
              <li class="<?php if( in_array($request->segment(1), ['invoice-schemes', 'invoice-layouts']) ): ?> <?php echo e('active', false); ?> <?php endif; ?>">
                <a href="<?php echo e(action('InvoiceSchemeController@index'), false); ?>"><i class="fa fa-file"></i> <span><?php echo app('translator')->getFromJson('invoice.invoice_settings'); ?></span></a>
              </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('barcode_settings.access')): ?>
            <li class="<?php echo e($request->segment(1) == 'barcodes' ? 'active' : '', false); ?>">
              <a href="<?php echo e(action('BarcodeController@index'), false); ?>"><i class="fa fa-barcode"></i> <span><?php echo app('translator')->getFromJson('barcode.barcode_settings'); ?></span></a>
            </li>
            <?php endif; ?>

            <li class="<?php echo e($request->segment(1) == 'printers' ? 'active' : '', false); ?>">
              <a href="<?php echo e(action('PrinterController@index'), false); ?>"><i class="fa fa-share-alt"></i> <span><?php echo app('translator')->getFromJson('printer.receipt_printers'); ?></span></a>
            </li>

            <?php if(auth()->user()->can('tax_rate.view') || auth()->user()->can('tax_rate.create')): ?>
              <li class="<?php echo e($request->segment(1) == 'tax-rates' ? 'active' : '', false); ?>">
                <a href="<?php echo e(action('TaxRateController@index'), false); ?>"><i class="fa fa-bolt"></i> <span><?php echo app('translator')->getFromJson('tax_rate.tax_rates'); ?></span></a>
              </li>
            <?php endif; ?>

            <?php if(in_array('tables', $enabled_modules)): ?>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('business_settings.access')): ?>
                <li class="<?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'tables' ? 'active' : '', false); ?>">
                  <a href="<?php echo e(action('Restaurant\TableController@index'), false); ?>"><i class="fa fa-table"></i> <?php echo app('translator')->getFromJson('restaurant.tables'); ?></a>
                </li>
              <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('modifiers', $enabled_modules)): ?>
              <?php if(auth()->user()->can('product.view') || auth()->user()->can('product.create') ): ?>
                <li class="<?php echo e($request->segment(1) == 'modules' && $request->segment(2) == 'modifiers' ? 'active' : '', false); ?>">
                  <a href="<?php echo e(action('Restaurant\ModifierSetsController@index'), false); ?>"><i class="fa fa-delicious"></i> <?php echo app('translator')->getFromJson('restaurant.modifiers'); ?></a>
                </li>
              <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('types_of_service', $enabled_modules)): ?>
              <li class="<?php echo e($request->segment(1) == 'types-of-service' ? 'active active-sub' : '', false); ?>">
                  <a href="<?php echo e(action('TypesOfServiceController@index'), false); ?>"><i class="fa fa-user-circle-o"></i> <span><?php echo app('translator')->getFromJson('lang_v1.types_of_service'); ?></span>
                  </a>
              </li>
              <?php endif; ?>

            <?php if(Module::has('Superadmin')): ?>
              <?php if ($__env->exists('superadmin::layouts.partials.subscription')) echo $__env->make('superadmin::layouts.partials.subscription', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

          </ul>
        </li>
        <?php endif; ?>
        <!-- call Project module if defined -->
        <?php if(Module::has('Project')): ?>
          <?php if ($__env->exists('project::layouts.partials.sidebar')) echo $__env->make('project::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <!-- call Essentials module if defined -->
        <?php if(Module::has('Essentials')): ?>
	       
          <?php if ($__env->exists('essentials::layouts.partials.sidebar')) echo $__env->make('essentials::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        
        <?php if(Module::has('Woocommerce')): ?>
          <?php if ($__env->exists('woocommerce::layouts.partials.sidebar')) echo $__env->make('woocommerce::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
      </ul>

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  