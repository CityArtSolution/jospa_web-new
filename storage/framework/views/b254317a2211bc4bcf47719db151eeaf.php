<?php
$slot = '';
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(language_direction()); ?>" class="theme-fs-sm">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(app_name()); ?></title>

    <link rel="stylesheet" href="<?php echo e(mix('css/libs.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/backend.css')); ?>">
    <?php if(language_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/rtl.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom-css/frontend.css')); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <?php echo $__env->yieldPushContent('after-styles'); ?>
    <style>
        body {
          font-family: 'Almarai', sans-serif !important;
        }
        .vh-17{
            height: 17vh;
        }
        @media (max-width: 576px) {
            .vh-17{
                height: 8vh;
            }
        }
    </style>
</head>
<body>
    <?php echo $__env->make('components.frontend.progress-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="position-relative vh-17">

        <?php echo $__env->make('components.frontend.second-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <main>
        <?php echo $__env->make('components.frontend.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>

    <div class="position-relative vh-17"></div>
    <!-- Footer -->
    <?php echo $__env->make('components.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /home/city2tec/project/Modules/rontend/Resources/views/branches.blade.php ENDPATH**/ ?>