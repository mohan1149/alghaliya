
<?php $__env->startSection('title', __('lang_v1.login')); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-form col-md-12 col-xs-12 right-col-content">
        <p class="form-header"><?php echo app('translator')->getFromJson('lang_v1.login'); ?></p>
        <form method="POST" action="<?php echo e(route('login'), false); ?>">
            <?php echo e(csrf_field(), false); ?>

            <div class="form-group has-feedback <?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
                <?php
                    $username = old('username');
                    $password = null;
                    if(config('app.env') == 'demo'){
                        $username = 'admin';
                        $password = '123456';

                        $demo_types = array(
                            'all_in_one' => 'admin',
                            'super_market' => 'admin',
                            'pharmacy' => 'admin-pharmacy',
                            'electronics' => 'admin-electronics',
                            'services' => 'admin-services',
                            'restaurant' => 'admin-restaurant',
                            'superadmin' => 'superadmin',
                            'woocommerce' => 'woocommerce_user',
                            'essentials' => 'admin-essentials',
                            'manufacturing' => 'manufacturer-demo',
                        );

                        if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
                            $username = $demo_types[$_GET['demo_type']];
                        }
                    }
                ?>
                <input id="username" type="text" class="form-control" name="username" value="<?php echo e($username, false); ?>" required autofocus placeholder="<?php echo app('translator')->getFromJson('lang_v1.username'); ?>">
                <span class="fa fa-user form-control-feedback"></span>
                <?php if($errors->has('username')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('username'), false); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
                <input id="password" type="password" class="form-control" name="password"
                value="<?php echo e($password, false); ?>" required placeholder="<?php echo app('translator')->getFromJson('lang_v1.password'); ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password'), false); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : '', false); ?>> <?php echo app('translator')->getFromJson('lang_v1.remember_me'); ?>
                    </label>
                </div>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat btn-login"><?php echo app('translator')->getFromJson('lang_v1.login'); ?></button>
                <?php if(config('app.env') != 'demo'): ?>
                <a href="<?php echo e(route('password.request'), false); ?>" class="pull-right">
                    <?php echo app('translator')->getFromJson('lang_v1.forgot_your_password'); ?>
                </a>
            <?php endif; ?>
            </div>
        </form>
    </div>
    <?php if(config('app.env') == 'demo'): ?>
    <div class="col-md-12 col-xs-12" style="padding-bottom: 30px;">
        <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'header' => '<h4 class="text-center">Demo Shops <small><i> Demos are for example purpose only, this application <u>can be used in many other similar businesses.</u></i></small></h4>']); ?>

            <a href="?demo_type=all_in_one" class="btn btn-app bg-olive" data-toggle="tooltip" title="Showcases all feature available in the application." > <i class="fa fa-star"></i> All In One</a>

            <a href="?demo_type=pharmacy" class="btn bg-maroon btn-app" data-toggle="tooltip" title="Shops with products having expiry dates." ><i class="fa fa-medkit"></i>Pharmacy</a>

            <a href="?demo_type=services" class="btn bg-orange btn-app" data-toggle="tooltip" title="For all service providers like Web Development, Restaurants, Repairing, Plumber, Salons, Beauty Parlors etc."><i class="fa fa-wrench"></i>Multi-Service Center</a>

            <a href="?demo_type=electronics" class="btn bg-purple btn-app" data-toggle="tooltip" title="Products having IMEI or Serial number code." ><i class="fa fa-laptop"></i>Electronics & Mobile Shop</a>
            <a href="?demo_type=super_market" class="btn bg-navy btn-app" data-toggle="tooltip" title="Super market & Similar kind of shops." ><i class="fa fa-shopping-cart"></i> Super Market</a>
            <a href="?demo_type=restaurant" class="btn bg-red btn-app" data-toggle="tooltip" title="Restaurants, Salons and other similar kind of shops." ><i class="fa fa-cutlery"></i> Restaurant</a>
            <hr>

            <i class="icon fa fa-plug"></i> Premium optional modules:<br><br>
            <a href="?demo_type=superadmin" class="btn bg-red-active btn-app" data-toggle="tooltip" title="SaaS & Superadmin extension Demo"><i class="fa fa-university"></i> SaaS / Superadmin</a>

            <a href="?demo_type=woocommerce" class="btn bg-woocommerce btn-app" data-toggle="tooltip" title="WooCommerce demo user - Open web shop in minutes!!" style="color:white !important"> <i class="fa fa-wordpress"></i> WooCommerce</a>

            <a href="?demo_type=essentials" class="btn bg-navy btn-app" data-toggle="tooltip" title="Essentials & HRM (human resource management) Module Demo" style="color:white !important">
                    <i class="fa fa-check-circle-o"></i>
                    Essentials & HRM</a>
                    
            <a href="?demo_type=manufacturing" class="btn bg-orange btn-app" data-toggle="tooltip" title="Manufacturing module demo" style="color:white !important">
                    <i class="fa fa-industry"></i>
                    Manufacturing Module</a>
        <?php echo $__env->renderComponent(); ?>   
    </div>
    <?php endif; ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "<?php echo e(route('login'), false); ?>?lang=" + $(this).val();
        });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>