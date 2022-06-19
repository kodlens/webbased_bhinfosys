

<?php $__env->startSection('extracss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/leaflet.css ')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
    <script src="<?php echo e(asset('/js/leaflet.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <boarding-house-edit></boarding-house-edit>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.no-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\eshen\Desktop\Github\bh_reservation_locator\resources\views/landowner/boarding-house-edit.blade.php ENDPATH**/ ?>