

<?php $__env->startSection('content'); ?>
    <boarder-reservation prop-data='<?php echo json_encode($data, 15, 512) ?>'></boarder-reservation>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.landowner-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\keypanze\Dropbox\My PC (hezzle)\Desktop\bh_reservation_locator\resources\views/landowner/boarder-reservation.blade.php ENDPATH**/ ?>