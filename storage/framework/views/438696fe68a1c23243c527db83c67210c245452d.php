<?php $layoutHelper = app('\JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper'); ?>

<?php ( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') ); ?>

<?php if(config('adminlte.use_route_url', false)): ?>
    <?php ( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' ); ?>
<?php else: ?>
    <?php ( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' ); ?>
<?php endif; ?>

<div class="row justify-content-center mt-1 logo-adjust">

    <img  src="<?php echo e(asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png'))); ?>"
          alt="<?php echo e(config('adminlte.logo_img_alt', 'AdminLTE')); ?>"
          class="<?php echo e(config('adminlte.logo_img_class', 'brand-image img-circle elevation-3')); ?>">

</div>

<div class="main-sid-ctl">
    <a href="<?php echo e($dashboard_url); ?>"

       <?php if($layoutHelper->isLayoutTopnavEnabled()): ?>
       class="navbar-brand  text-center <?php echo e(config('adminlte.classes_brand')); ?>"
       <?php else: ?>
       class="brand-link text-center   <?php echo e(config('adminlte.classes_brand')); ?>"
            <?php endif; ?>>

        




        
        <span class="brand-text font-weight-light <?php echo e(config('adminlte.classes_brand_text')); ?>">
        <?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?>

    </span>

    </a>
    <div class="all-ctr">
        <div id="upSideBar">
            <i class="fas fa-chevron-up"></i>
        </div>
        <div id="downSideBar">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</div><?php /**PATH F:\Laravel-Projects\Smart Accountant\resources\views/vendor/adminlte/partials/common/brand-logo-xs.blade.php ENDPATH**/ ?>