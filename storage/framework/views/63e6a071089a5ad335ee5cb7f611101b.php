<?php
    $currentLocale = session('locale', app()->getLocale());
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(language_direction()); ?>" class="theme-fs-sm">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?php echo e($category->name); ?> - <?php echo e(__('messagess.category_details')); ?></title>

    
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(mix('css/libs.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/backend.css')); ?>">
    <?php if(language_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/rtl.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('custom-css/frontend.css')); ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.5/font/bootstrap-icons.css" rel="stylesheet">
    <?php echo $__env->yieldPushContent('after-styles'); ?>
        
    <style>
    body {
      margin: 0;
      font-family: 'Almarai', sans-serif;
      background: #fff;
    }

    .service-container {
      display: flex;
      align-items: stretch;
      justify-content: center;
      max-width: 1100px;
      margin: 50px auto;
      background: #fff;
    }

    .service-image {
      flex: 1;
    }

    .service-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .service-content {
      font-family: 'Almarai';
      flex: 1;
      background: #1c1c1c;
      color: #fff;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .service-content h4 {
    color: #cf9233;
    margin: 0 0 11px 0;
    font-size: 18px;
    }

    .service-content h2 {
      margin: 10px 0;
      font-size: 28px;
    }

    .stars {
      margin: 15px 0;
    }

    .stars i {
      color: gold;
      font-size: 18px;
      margin-left: 4px;
    }

    .service-content h3 {
      margin-top: 20px;
      font-size: 20px;
      color: #f5f5f5;
    }

    .service-content p {
      line-height: 2.3;
      margin-top: 10px;
      font-size: 15px;
      color: #ddd;
    }

    @media (max-width: 768px) {
      .service-container {
        flex-direction: column;
      }
      .service-image img {
        height: auto;
      }
    }
    .galary{
    height: 169px;
    background-size: cover;
    background-position: center;
    border-radius: 16px;
    }
    .overlay{
    width: 100%;
    font-size: 17px;
    height: 100%;
    font-family: Almarai;
    transition: opacity 0.3s ease-in-out;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.1));
    display: flex;
    justify-content: center;
    align-items: flex-end;
    color: #fff;
    padding: 20px;
    border-radius: 21px;
    }
    .cont{
        width: 70%;
        height: 208px;
        position: absolute;
        top: 7%;
        left: 50%;
        transform: translate(-50%, 10px);
        border-radius: 19px;
        background: rgb(0 0 0 / 33%);
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .cont h1{
        font-size: 18px;
        text-align: center;
        color: #ffffff;
        font-family: Almarai;
        margin: 15px 0;
    }
    .descrip{
        line-height: 1.7;
        font-size: 12px;
        text-align: center;
        font-weight: 100;
        color: #ffffffbd !important;
        font-family: Almarai;
    }
    .price_min{
        color: white;
        display: flex;
        justify-content: space-around;
        margin-top: 12px;
        font-family: Almarai;
        flex-direction: row-reverse;
    }
    .promo-btn {
      display:block;
      margin: 0 auto;
      width: 210px;
      border-radius: 40px;
      padding: .6rem 1rem;
      font-weight:700;
      letter-spacing:.2px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.35);
      border: 3px solid rgba(255,255,255,0.18);
      background: linear-gradient(180deg, #d99b33, #c6861f);
      color: #fff;
    }
    .more-btn-hero{
    width: 59%;
    height: 43px;
    background-color: #CF9233;
    border-radius: 28px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
.more-btn-hero::before {
    content: "";
    position: absolute;
    width: 91%;
    height: 80%;
    border: 2px solid white;
    border-radius: 28px;
}
.m-btn {
    bottom: 5px;
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.vh-17{
    height: 17vh;
}
@media (max-width: 576px) {
    .vh-17{
        height: 2.9vh;
    }
}
  </style>

</head>

<body>
    <?php echo $__env->make('components.frontend.progress-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="position-relative vh-17">
        <?php echo $__env->make('components.frontend.second-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <!-- image && sumary-->
     <div class="service-container" data-aos="fade-up">
    <div class="service-content">
      <h4> <?php echo e(__('messagess.nav_services')); ?></h4>
      <h2><?php echo e($category->name); ?></h2>
      <div class="stars">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h3><?php echo e(__('service.description')); ?>:</h3>
      <p> <?php echo e($category->description[$currentLocale] ?? __('messagess.category_description_default', ['name' => $category->name])); ?> </p>
    </div>
    <div class="service-image">
      <img src="<?php echo e(asset($category->av2)); ?>" alt="<?php echo e($category->name); ?>">
    </div>
  </div>
    
    <!-- main serves card-->
<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-3 p-3"> 
        <?php $__currentLoopData = $allCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <a href="<?php echo e(url('services/category/' . $Cat->id)); ?>" style="text-decoration-line: none;">
                    <div class="galary" 
                         style="background-image: url(<?php echo e(asset($Cat->av2)); ?>); 
                                background-size: cover; 
                                background-position: center; 
                                height: 200px; 
                                border-radius: 18px !important;
                                <?php if($Cat->id == $category->id): ?> border: 4px #CF9233 solid; <?php endif; ?>">
                        
                        <!-- Overlay -->
                        <div class="overlay d-flex align-items-end justify-content-center" 
                             style="width: 100%; height: 100%; border-radius: 12px;
                                    background: linear-gradient(to top, rgba(0,0,0,0.6) 40%, rgba(0,0,0,0.0) 100%);">
                            <h3 class="text-white text-center m-2"><?php echo e($Cat->name); ?></h3>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

    <!-- sub serves card-->
<div class="container my-5">
    <?php if($category->services && $category->services->count() > 0): ?>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3 p-3"> 
            <?php $__currentLoopData = $category->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col position-relative" style="min-height: 260px;">
                    <div class="galary" style="background-image: url(<?php echo e($service->av2 ?? asset('images/pages/Rectangle%2042520.png')); ?>); 
                                background-size: cover; 
                                background-position: center; 
                                height: 100%; "></div>
                    <div class="cont">
                        <h1><?php echo e($service->name); ?></h1>
                            <?php
                                $description = json_decode($service->description, true);
                            ?>
                        <?php if($description[$currentLocale]): ?>
                        <div class="descrip"><?php echo e(Str::limit($description[$currentLocale], 120)); ?></div>
                        <?php endif; ?>
                        
                        <div class="price_min">
                            <div> <img style="width: 15px;margin: 0 7px;" src="<?php echo e(asset('/images/icons/Vector (3).png')); ?>"> <?php echo e($service->default_price); ?> <?php echo e(__('messagess.SAR')); ?></div>
                            <span><img style="width: 15px;margin: 0 7px;" src="<?php echo e(asset('/images/icons/Vector (4).png')); ?>"> <?php echo e($service->duration_min ?? 0); ?> <?php echo e(__('messagess.minutes')); ?> </span>
                        </div>
                        
                        <div class="m-btn">
                        <a href="<?php echo e(route('salon.create')); ?>" class="more-btn-hero">
                            <p style="font-weight: 100;color:white;font-size: 16px;margin: 0 13px;font-family: 'Almarai', sans-serif;"><img style="width: 15px;margin: 0 7px;" src="<?php echo e(asset('images/icons/Vector (2).png')); ?>" > <?php echo e(__('messagess.book_now')); ?> </p>
                        </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <p><?php echo e(__('messagess.no_services_in_category')); ?></p>
        </div>
    <?php endif; ?>
</div>


    <div class="position-relative" style="height: 17vh;"></div>
    <!-- Footer -->
    <?php echo $__env->make('components.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- ملفات JS -->
    <script src="<?php echo e(mix('js/backend.js')); ?>"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
      <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      function toggleDescription(el) {
        let parent = el.closest(".desc"); 
    
        if (parent.classList.contains("desc-short")) {
            parent.classList.add("d-none");
            parent.nextElementSibling.classList.remove("d-none"); 
        } else if (parent.classList.contains("desc-full")) {
            parent.classList.add("d-none");
            parent.previousElementSibling.classList.remove("d-none"); 
        }
    }
    AOS.init({
      duration: 1200, // مدة الأنيميشن
    });
  </script>
    <?php echo $__env->yieldPushContent('after-scripts'); ?>
</body>

</html><?php /**PATH /home/city2tec/project/Modules/rontend/Resources/views/category-details.blade.php ENDPATH**/ ?>