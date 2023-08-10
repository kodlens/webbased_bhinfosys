



<?php $__env->startSection('content'); ?>

    <boarding-house-room :prop-boarding-house='<?php echo json_encode($bhouse, 15, 512) ?>' prop-route-back="<?php echo e(url()->previous()); ?>"></boarding-house-room>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.landowner-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\eshen\Desktop\Github\webbased_bhinfosys\resources\views/landowner/room/boarding-house-room.blade.php ENDPATH**/ ?>