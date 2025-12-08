

<?php $__env->startSection('title', 'لوحة التحكم'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    
    <div class="col-lg-3 col-md-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <h6 class="text-muted">الزوار</h6>
                <h3 class="mb-0"><?php echo e($totalVisitors); ?></h3>
            </div>
        </div>
    </div>

    
    <div class="col-lg-3 col-md-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <h6 class="text-muted">التحويلات</h6>
                <h3 class="mb-0"><?php echo e($totalConversions); ?></h3>
            </div>
        </div>
    </div>

    
    <div class="col-lg-3 col-md-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <h6 class="text-muted">إجمالي الأرباح</h6>
                <h3 class="mb-0">$ <?php echo e(number_format($totalEarnings, 2)); ?></h3>
            </div>
        </div>
    </div>

    
    <div class="col-lg-3 col-md-6">
        <div class="card card-block card-stretch card-height">
            <div class="card-body">
                <h6 class="text-muted">الرصيد المتاح</h6>
                <h3 class="mb-0 text-success">$ <?php echo e(number_format($availableEarnings, 2)); ?></h3>
            </div>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">الزوار آخر 30 يوم</h5>
    </div>
    <div class="card-body">
        <canvas id="visitorsChart" height="100"></canvas>
    </div>
</div>



<div class="row mt-4">
    

    
    <div class="col-lg-6">
        <div class="card card-block">
            <div class="card-header">
                <h5>آخر التحويلات</h5>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <?php $__empty_1 = true; $__currentLoopData = $lastConversions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>طلب #<?php echo e($conv->order_id); ?></span>
                            <span class="text-success">$<?php echo e($conv->commission); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item text-muted">لا يوجد تحويلات</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let ctx = document.getElementById('visitorsChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($chartLabels, 15, 512) ?>,
            datasets: [{
                label: 'Visitors',
                data: <?php echo json_encode($chartData, 15, 512) ?>,
                borderWidth: 2,
                borderColor: "#4e73df",
                fill: false,
                tension: 0.3
            }]
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('affiliate::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\Modules/Affiliate\Resources/views/dashboard.blade.php ENDPATH**/ ?>