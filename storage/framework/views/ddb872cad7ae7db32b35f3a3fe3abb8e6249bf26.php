

<?php $__env->startSection('extracss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/leaflet.css ')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extrajs'); ?>
    <script src="<?php echo e(asset('/js/leaflet.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <?php if(isset($id)): ?>
        <boarding-house-create prop-data-id='<?php echo e($id); ?>' prop-data='<?php echo json_encode($bhouse, 15, 512) ?>'></boarding-house-create>
    <?php else: ?>
        <boarding-house-create prop-data-id='0' prop-data=''></boarding-house-create>
    <?php endif; ?>


<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.landowner-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\keypanze\Dropbox\My PC (hezzle)\Desktop\bh_reservation_locator\resources\views/landowner/boarding-house-create.blade.php ENDPATH**/ ?>