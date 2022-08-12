


<?php $__env->startSection('extracss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/leaflet.css ')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('/css/leaflet-routing-machine.css ')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
    <script src="<?php echo e(asset('/js/leaflet.js')); ?>"></script>

    <script src="<?php echo e(asset('/js/leaflet-routing-machine.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <home-page></home-page>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\eshen\Desktop\Github\webbased_bhinfosys\resources\views/welcome.blade.php ENDPATH**/ ?>