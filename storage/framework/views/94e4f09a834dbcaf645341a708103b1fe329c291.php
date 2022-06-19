<?php $__env->startSection('content'); ?>

    <div class="printarea">
        <div class="print-title">
            <div class="receipt">
                <div class="receipt-header">
                    RECEIPT
                </div>
                <div class="receipt-body">
                    <div> <?php echo e($data->bhouse_name); ?></div>
                    <div><?php echo e($data->street); ?>, <?php echo e($data->brgyDesc); ?>, <?php echo e($data->citymunDesc); ?></div>

                    <div style="margin-top: 25px;">OFFICIAL RECEIPT</div>

                    <div style="display: flex; margin-top: 25px;">
                        <div style="margin-left: auto;">
                            Date : <?php echo e($dateNow); ?> Receipt No. <?php echo e($data->payment_detail_id); ?>

                        </div>

                    </div>
                    <div style="display: flex; text-align: left; margin-top: 25px;">
                        <div>Received from: <?php echo e($data->fname); ?>, <?php echo e($data->mname); ?> <?php echo e($data->lname); ?> the amount of <?php echo e($data->amount_paid); ?>

                            for payment of boarding house rental.</div>
                    </div>

                    <div class="receipt-table">

                        <table>
                            <tr>
                                <td>Amount to be received</td>
                                <td> <?php echo e($data->rental_price); ?></td>
                            </tr>
                            <tr>
                                <td>Amount received</td>
                                <td><?php echo e($data->amount_paid); ?></td>
                            </tr>
                            
                            <tr>
                                <td>Total Balance</td>
                                <td><?php echo $data->balance; ?></td>
                            </tr>

                          
                        </table>
                    </div>

                </div><!-- receipt body -->

            </div><!--receipt -->



        </div><!--print-title -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.print-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\eshen\Desktop\Github\bh_reservation_locator\resources\views/boarder/my-payment-receipt.blade.php ENDPATH**/ ?>