 <!-- أو حسب الماستر عندك -->

<?php $__env->startSection('title', __('auth.login')); ?>

<?php $__env->startSection('content'); ?>

<div style="
    display:flex;
    justify-content:center;
    align-items:flex-start;
    min-height:calc(100vh - 100px);
    padding:0 20px 40px 20px;
    direction:<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>;
    text-align:<?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;
    font-family:'Almarai',sans-serif !important;
    font-style:italic !important;
    background-color:#f9f9f9;
    margin:0;
    padding-top:200px;
    padding-bottom:40px;

">
    <div style="
        background:#fff;
        border-radius:12px;
        padding:40px 30px;
        width:100%;
        max-width:420px;
        box-shadow:0 6px 18px rgba(0,0,0,0.1);
        position:relative;
        z-index:10;
    ">
        <h2 style="text-align:center;margin-bottom:20px;font-size:24px;font-weight:bold;"><?php echo e(__('auth.login')); ?></h2>

        <!-- Validation Errors -->
        <?php if (isset($component)) { $__componentOriginal0ff1ee8966084a5d418f848c5e125b44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ff1ee8966084a5d418f848c5e125b44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ff1ee8966084a5d418f848c5e125b44)): ?>
<?php $attributes = $__attributesOriginal0ff1ee8966084a5d418f848c5e125b44; ?>
<?php unset($__attributesOriginal0ff1ee8966084a5d418f848c5e125b44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ff1ee8966084a5d418f848c5e125b44)): ?>
<?php $component = $__componentOriginal0ff1ee8966084a5d418f848c5e125b44; ?>
<?php unset($__componentOriginal0ff1ee8966084a5d418f848c5e125b44); ?>
<?php endif; ?>

        <form method="POST" action="<?php echo e(route('signin.verify')); ?>" style="display:flex;flex-direction:column;">
            <?php echo csrf_field(); ?>

            <!-- Name -->
            <div style="margin-bottom:15px;">
                <label for="username" style="display:block;margin-bottom:6px;font-weight:500;font-size:14px;"><?php echo e(__('auth.name')); ?></label>
                <input id="username" type="text" name="username"
                    value="<?php echo e(old('username')); ?>" required autofocus
                    placeholder="<?php echo e(__('auth.enter_name')); ?>"
                    style="
                        width:100%;
                        border:1px solid #ddd;
                        border-radius:6px;
                        padding:10px 14px;
                        font-size:14px;
                        outline:none;
                        box-sizing:border-box;
                        font-style:italic !important;
                        transition:border-color 0.3s,box-shadow 0.3s;
                        text-align:<?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;
                    ">
            </div>

            <!-- Mobile -->
            <div style="margin-bottom:15px;">
                <label for="mobile" style="display:block;margin-bottom:6px;font-weight:500;font-size:14px;"><?php echo e(__('auth.mobile')); ?></label>
                <input id="mobile" type="text" name="mobile"
                    value="<?php echo e(old('mobile')); ?>" required
                    placeholder="<?php echo e(__('auth.enter_mobile')); ?>"
                    style="
                        width:100%;
                        border:1px solid #ddd;
                        border-radius:6px;
                        padding:10px 14px;
                        font-size:14px;
                        outline:none;
                        box-sizing:border-box;
                        font-style:italic !important;
                        transition:border-color 0.3s,box-shadow 0.3s;
                        text-align:<?php echo e(app()->getLocale() == 'ar' ? 'right' : 'left'); ?>;
                    ">
            </div>

            <!-- Remember Me -->
            <div style="display:flex;flex-direction:<?php echo e(app()->getLocale() == 'ar' ? 'row-reverse' : 'row'); ?>;align-items:center;margin-bottom:15px;">
                <input id="remember_me" type="checkbox" name="remember" style="width:16px;height:16px;margin-right:6px;">
                <label for="remember_me" style="margin:0;font-size:14px;"><?php echo e(__('auth.remember_me')); ?></label>
            </div>

            <!-- Submit -->
            <div style="margin-top:15px;">
                <button type="submit" style="
                    background:linear-gradient(135deg,#ffcc00,#ff9900);
                    color:#fff !important;
                    font-weight:bold;
                    border:none;
                    border-radius:8px;
                    padding:12px 20px;
                    width:100%;
                    cursor:pointer;
                    transition:background 0.3s ease,transform 0.2s ease;
                    display:inline-block;
                    text-align:center;
                " onmouseover="this.style.background='linear-gradient(135deg,#ffdb4d,#ff751a)';this.style.transform='translateY(-2px)';"
                   onmouseout="this.style.background='linear-gradient(135deg,#ffcc00,#ff9900)';this.style.transform='none';">
                    <?php echo e(__('auth.login_button')); ?>

                </button>
            </div>
        </form>

        <p style="text-align:center;margin-top:20px;">
            <?php echo e(__('auth.no_account')); ?>

            <a href="<?php echo e(route('signup')); ?>" style="color:#ff9900;font-weight:500;text-decoration:none;"
               onmouseover="this.style.color='#cc7a00';" onmouseout="this.style.color='#ff9900';"><?php echo e(__('auth.signup')); ?></a>
        </p>
    </div>
</div>

<!-- Toastr JS & CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "timeOut": "7000",
    "extendedTimeOut": "1000"
};

<?php if(session('message')): ?>
    toastr.success("<?php echo e(session('message')); ?>");
<?php endif; ?>

if (localStorage.getItem('flash_message')) {
    toastr.success(localStorage.getItem('flash_message'));
    localStorage.removeItem('flash_message');
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend::layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/city2tec/project/resources/views/components/frontend/auth/signin.blade.php ENDPATH**/ ?>