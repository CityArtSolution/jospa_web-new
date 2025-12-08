<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(language_direction()); ?>" class="theme-fs-sm">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(app_name()); ?> — Affiliate</title>

    
    <link rel="stylesheet" href="<?php echo e(mix('css/icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/libs.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/backend.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dark.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom-css/dashboard.css')); ?>">

    <?php if(language_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/rtl.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/customizer.css')); ?>">
</head>

<body class="<?php echo e(auth()->user()->user_setting['theme_scheme'] ?? ''); ?>">
    
    <div id="loading">
        <?php if (isset($component)) { $__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials._body_loader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('partials._body_loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4)): ?>
<?php $attributes = $__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4; ?>
<?php unset($__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4)): ?>
<?php $component = $__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4; ?>
<?php unset($__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4); ?>
<?php endif; ?>
    </div>

    
    
    
    <div class="sidebar-base sidebar left-bordered sidebar-color">
        <div class="d-flex align-items-center justify-content-start">
            <div class="logo-main">
                <a href="<?php echo e(route('affiliate.dashboard')); ?>" class="navbar-brand">
                    <img class="logo-normal img-fluid" src="<?php echo e(asset('images/JOSPA.webp')); ?>" height="30">
                </a>
            </div>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg class="icon-20" width="20" viewBox="0 0 24 24">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                </i>
            </div>
        </div>

        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <ul class="navbar-nav iq-main-menu">

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.dashboard') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.dashboard')); ?>">
                            <i class="ri-dashboard-line"></i>
                            <span class="item-name">لوحة التحكم</span>
                        </a>
                    </li>

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.links') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.links')); ?>">
                            <i class="ri-links-line"></i>
                            <span class="item-name">روابط المسوّق</span>
                        </a>
                    </li>

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.stats') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.stats')); ?>">
                            <i class="ri-bar-chart-line"></i>
                            <span class="item-name">الإحصائيات</span>
                        </a>
                    </li>

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.conversions') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.conversions')); ?>">
                            <i class="ri-exchange-dollar-line"></i>
                            <span class="item-name">التحويلات</span>
                        </a>
                    </li>

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.earnings') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.earnings')); ?>">
                            <i class="ri-money-dollar-circle-line"></i>
                            <span class="item-name">الأرباح</span>
                        </a>
                    </li>

                    <li class="nav-item <?php echo e(request()->routeIs('affiliate.withdraw') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('affiliate.withdraw')); ?>">
                            <i class="ri-bank-card-line"></i>
                            <span class="item-name">طلبات السحب</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

     <div class="main-content wrapper">
        <div
            class="position-relative pr-hide <?php if(Auth::user()->can('menu_builder_sidebar')): ?>
                    <?php echo e(!isset($isBanner) ? 'iq-banner' : ''); ?> default
                    <?php endif; ?>">
            <!-- Header -->
            <?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /Header -->
            <?php if(!isset($isBanner)): ?>
                <!-- Header Banner Start-->
                <?php if(Auth::user()->can('menu_builder_sidebar')): ?>
                    <?php echo $__env->make('components.partials.sub-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <!-- Header Banner End-->
            <?php endif; ?>
        </div>

    
    
    
    <div class="main-content wrapper">
        <div class="content-inner p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    
    <div class="footer">
        <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    
    <script src="<?php echo e(mix('js/backend.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iqonic-script/utility.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\Modules/Affiliate\Resources/views/layouts/master.blade.php ENDPATH**/ ?>