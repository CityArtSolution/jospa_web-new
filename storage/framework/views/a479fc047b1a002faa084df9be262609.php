<?php
use App\Models\GiftCard;
?>


<?php $__env->startSection('title'); ?>
<?php echo e(__($module_action)); ?> <?php echo e(__($module_title)); ?>

<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<?php $__env->startPush('after-styles'); ?>

        <style>
.invoice-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 15px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.3s;
}
.invoice-card:hover {
    background-color: #f9f9f9;
}
.invoice-details {
    display: none;
    margin-top: 10px;
    padding: 15px;
    border-top: 1px solid #ccc;
    background-color: #fafafa;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
<form method="GET" action="" id="filterForm" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="text" style="font-weight: bold;" name="customer_name" class="form-control" placeholder="<?php echo e(__('booking.lbl_customer_name')); ?>" value="<?php echo e(request('customer_name')); ?>">
        </div>
        <div class="col-md-4">
            <input type="date" name="date" class="form-control" value="<?php echo e(request('date')); ?>">
        </div>
        <div class="col-md-4" style="text-align: center;">
            <button style="font-weight: bold;" type="submit" class="btn btn-primary"><?php echo e(__('messages.search')); ?></button>
            <button type="button" id="resetButton" class="btn btn-secondary" style="font-weight: bold;"><?php echo e(__('messages.reset')); ?></button>
        </div>
    </div>
</form>


        <h3 class="mb-4"><?php echo e(__('messages.invoice_cards_list')); ?></h3>

<?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="invoice-card" onclick="toggleInvoiceDetails(<?php echo e($invoice->id); ?>)">
        <div>
            <strong><?php echo e($invoice->user->first_name); ?> <?php echo e($invoice->user->last_name); ?></strong>
        </div>
        <div>
            <?php echo e($invoice->created_at->format('Y-m-d H:i')); ?>

        </div>
    </div>

<div id="invoice-details-<?php echo e($invoice->id); ?>" class="invoice-details">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
            <div style="display: flex;justify-content: flex-end;">
                <a href="<?php echo e(route('invoices.destroy', $invoice->id)); ?>" class="btn btn-soft-danger btn-sm delete-invoice" title="<?php echo e(__('messages.delete')); ?>">
                    <i class="fas fa-trash"></i>
                </a>            
            </div>
    <div style="background: #f7f7f7; border-radius: 10px; padding: 20px; margin-top: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h5 style="border-bottom: 1px solid #ddd; padding-bottom: 8px; margin-bottom: 15px;"><?php echo e(__('messages.bookings')); ?>:</h5>
        <?php
            $cartIds = json_decode($invoice->cart_ids, true);
            $bookings = Modules\Booking\Models\Booking::whereIn('id', $cartIds)->with('services', 'branch')->get();
            $gift_ids = json_decode($invoice->gift_ids, true);
            $bookingsGift = GiftCard::whereIn('id', $gift_ids)->get();
        ?>

        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="background: #ffffff; border: 1px solid #eee; border-radius: 8px; padding: 15px; margin-bottom: 10px;">
                <?php $__currentLoopData = $booking->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="margin-bottom: 5px;display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.booking_id')); ?>:</strong> <?php echo e($service->service_name); ?></p>
                <p style="margin-bottom: 5px;display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('booking.lbl_staff_name')); ?>:</strong> <?php echo e($service->employee->full_name ?? ''); ?> <?php echo e($service->employee->last_name ?? ''); ?></p>
                <p style="margin-bottom: 5px;display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messagess.price')); ?>:</strong> <?php echo e($service->service_price); ?> SR</p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p style="margin-bottom: 10px;display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.branch')); ?>:</strong> <?php echo e($booking->branch->name ?? '-'); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
<?php $__currentLoopData = $bookingsGift; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div style="background: #ffffff; border: 1px solid #eee; border-radius: 8px; padding: 15px; margin-bottom: 10px;">
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.sender_name')); ?>:</strong> <?php echo e($gift->sender_name); ?></p>
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.recipient_name')); ?>:</strong> <?php echo e($gift->recipient_name); ?></p>
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.sender_phone')); ?>:</strong> <?php echo e($gift->sender_phone); ?></p>
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.recipient_phone')); ?>:</strong> <?php echo e($gift->recipient_phone); ?></p>
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.delivery_method')); ?>:</strong> <?php echo e($gift->delivery_method); ?></p>

    <?php
        $requestedServices = json_decode($gift->requested_services, true);
        $packageIds = json_decode($gift->package_ids, true);
    ?>

    <?php if(!empty($requestedServices)): ?>
        <p style="color:#bf9456 !important"><strong><?php echo e(__('booking.lbl_services')); ?>:</strong></p>
        <ul>
            <?php $__currentLoopData = $gift->services_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="display: flex;justify-content: space-between;" class="list-group-item">→ <?php echo e($service->name); ?> <span style="color:#4CAF50"><?php echo e($service->default_price); ?> <?php echo e(__('messages.currency')); ?></span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>


    <?php if(!empty($packageIds)): ?>
        <p style="color:#bf9456 !important"><strong><?php echo e(__('messages.packages')); ?>:</strong></p>
        <ul>
            <?php $__currentLoopData = $packageIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $package = Modules\Package\Models\Package::find($packageId);
                ?>
                <li style="display: flex;justify-content: space-between;" class="list-group-item">→ <?php echo e($package->name); ?> <span style="color:#4CAF50"><?php echo e($package->package_price); ?> <?php echo e(__('messages.currency')); ?></span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <p style="display: flex; justify-content: space-between; padding: 5px 0; border-top: 1px dashed #ddd;"><strong><?php echo e(__('messages.subtotal')); ?>:</strong> <?php echo e($gift->subtotal); ?> SR</p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div><?php echo e(__('messages.invoice_discount')); ?>:</div>
            <div style="color: #dc3545;">- <?php echo e($invoice->discount_amount); ?> SR</div>
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <div><?php echo e(__('messages.loyalty_discount')); ?>:</div>
            <div style="color: #28a745;">- <?php echo e($invoice->loyalty_points_discount); ?> SR</div>
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
            <div>
                <strong><?php echo e(__('messages.total')); ?>:</strong>
            </div>
            <div>
                <span style="font-weight: bold; color: #333;"><?php echo e($invoice->final_total); ?> SR</span>
            </div>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<script>

    document.getElementById('resetButton').addEventListener('click', function() {
        document.querySelector('input[name="customer_name"]').value = '';
        document.querySelector('input[name="date"]').value = '';
        document.getElementById('filterForm').submit();
    });
    function toggleInvoiceDetails(id) {
        const detailsDiv = document.getElementById(`invoice-details-${id}`);
        if (detailsDiv.style.display === 'none' || detailsDiv.style.display === '') {
            detailsDiv.style.display = 'block';
        } else {
            detailsDiv.style.display = 'none';
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/city2tec/project/resources/views/backend/invoice/index_datatable.blade.php ENDPATH**/ ?>