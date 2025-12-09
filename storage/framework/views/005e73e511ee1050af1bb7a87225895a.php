

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(language_direction()); ?>" class="theme-fs-sm">
<head>
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(app_name()); ?></title>
    <link rel="stylesheet" href="<?php echo e(mix('css/libs.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/backend.css')); ?>">
    <?php if(language_direction() == 'rtl'): ?><link rel="stylesheet" href="<?php echo e(asset('css/rtl.css')); ?>"><?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom-css/frontend.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <?php echo $__env->yieldPushContent('after-styles'); ?>
    <link href="https://fonts.cdnfonts.com/css/lama-sans" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --background: hsl(30, 10%, 10%);
            --foreground: hsl(38, 20%, 95%);
            --card: hsl(30, 15%, 15%);
            --card-foreground: hsl(38, 20%, 95%);
            --primary: hsl(38, 70%, 55%);
            --primary-foreground: hsl(30, 10%, 10%);
            --secondary: hsl(30, 20%, 20%);
            --secondary-foreground: hsl(38, 20%, 95%);
            --muted: hsl(30, 15%, 25%);
            --muted-foreground: hsl(38, 10%, 65%);
            --accent: hsl(38, 85%, 60%);
            --accent-foreground: hsl(30, 10%, 10%);
            --border: hsl(30, 15%, 25%);
            --input: hsl(30, 15%, 20%);
        }

        body {
            font-family: 'Cairo', 'Tajawal', system-ui, -apple-system, sans-serif;
            background-color: var(--background);
            color: var(--foreground);
            line-height: 1.6;
        }

        /* Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: rgba(26, 23, 23, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-logo img {
            height: 48px;
            width: 48px;
            object-fit: contain;
            object-position: top;
        }

        .nav-menu {
            display: none;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
        }

        @media (min-width: 1024px) {
            .nav-menu {
                display: flex;
            }
        }

        .nav-menu a {
            color: rgba(242, 235, 226, 0.8);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--foreground);
        }

        .btn-outline:hover {
            background-color: var(--muted);
        }

        .btn-gold {
            background-color: var(--primary);
            color: var(--primary-foreground);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-gold:hover {
            background-color: var(--accent);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

  /* Hero Section */
.hero {
    position: relative;
    min-height: 120vh; /* تغطي حتى قبل الفوتر */
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 80px;
    overflow: hidden; /* يمنع تجاوز الصورة تحت الفوتر */
}

/* خلفية الهيرو فقط ضمن القسم */
.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 120%;
    z-index: 0;
}

.hero-bg img {
    width: 100%;
    height: 230%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(26, 23, 23, 0.8),
        rgba(26, 23, 23, 0.6),
        rgba(26, 23, 23, 0.8)
    );
}

.hero-content {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 1rem;
    position: relative;
    z-index: 10;
}

.hero-inner {
    max-width: 56rem;
    margin: 0 auto;
}

.hero-heading {
    text-align: center;
    margin-bottom: 2rem;
}

.hero-heading h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--foreground);
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .hero-heading h1 {
        font-size: 2.25rem;
    }
}

.hero-heading p {
    font-size: 1.25rem;
    color: rgba(242, 235, 226, 0.8);
}

.pricing-card {
    background-color: rgb(255 255 255 / 0%);
    backdrop-filter: blur(8px);
    border: 1px solid var(--border);
    border-radius: 0.5rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    padding: 1.5rem;
}

.pricing-header {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;
}

/* الفوتر */
footer {
    background-color: #000; /* تأكد إن الخلفية سوداء صافية */
    position: relative;
    z-index: 5; /* فوق الصورة */
}


        .pricing-header-item {
            background: #BF9456;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-align: center;
            font-weight: 700;
        }

        .pricing-rows {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .pricing-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            background: white;
            color: #000;
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            overflow: hidden;
            transition: border-color 0.3s;
        }

        .pricing-row:hover {
            border-color: #BF9456;
        }

        .pricing-cell {
            padding: 1rem 1.5rem;
            text-align: center;
            font-weight: 600;
        }

    </style>
</head>
<body class="bg-white">
    <?php echo $__env->make('components.frontend.progress-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="position-relative" style="height: 17vh;">
        <?php echo $__env->make('components.frontend.second-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- Page Content -->
            <section class="hero">
            <div class="hero-bg">
                <img src="<?php echo e(asset('loyality-bg.jpg')); ?>" alt="Background">
                <div class="hero-overlay"></div>
            </div>

        <div class="hero-content">
            <div class="hero-inner" style="padding-bottom:243px;">
                <div class="hero-heading">
                    <p>
                        <?php echo e(__('messages.loyalty_points_info')); ?>

                    </p>
                </div>

                <div class="pricing-card">
                    <div class="pricing-header">
                        <div class="pricing-header-item"><?php echo e(__('messages.points_number')); ?></div>
                        <div class="pricing-header-item"><?php echo e(__('messages.amount')); ?></div>
                    </div>

                    <div class="pricing-rows">
                        <div class="pricing-row">
                            <div class="pricing-cell">200 <?php echo e(__('messages.point')); ?></div>
                            <div class="pricing-cell"><?php echo e($point_value * 200); ?> <?php echo e(__('messages.currency')); ?></div>
                        </div>
                        <div class="pricing-row">
                            <div class="pricing-cell">400 <?php echo e(__('messages.point')); ?></div>
                            <div class="pricing-cell"><?php echo e($point_value * 400); ?> <?php echo e(__('messages.currency')); ?></div>
                        </div>
                        <div class="pricing-row">
                            <div class="pricing-cell">800 <?php echo e(__('messages.point')); ?></div>
                            <div class="pricing-cell"><?php echo e($point_value * 800); ?> <?php echo e(__('messages.currency')); ?></div>
                        </div>
                        <div class="pricing-row">
                            <div class="pricing-cell">1600 <?php echo e(__('messages.point')); ?></div>
                            <div class="pricing-cell"><?php echo e($point_value * 1600); ?> <?php echo e(__('messages.currency')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="position-relative" style="height: 0vh;"></div>
    <!-- Footer -->
    <?php echo $__env->make('components.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        <?php if(session('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        
        <?php if(session('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
    </script>
    
</body>
</html>
<?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\resources\views/components/frontend/loyalety.blade.php ENDPATH**/ ?>