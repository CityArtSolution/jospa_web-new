<style>
    .maincard{
        border: 1px solid #BF945633;
        padding: 26px;
        text-align: center;
    }
    .cardimg{
        width: 100%;
        height: 300px;
        background: #BF94561A;
        display: flex;
        justify-content: center; 
        align-items: center;
    }
    .cardimg img{
        width: 90%;
        height: 300px;
    }
    .Category_Name{
        font-size: 20px;
        font-weight: 200;
        color: #BF9456;
    }
    .Category_desc{
        font-size: 16px;
        font-weight: 200;
        color: #000000;
    }
</style>

<div class="maincard">
    <div class="cardimg">
        <img src="<?php echo e($image ?? asset('images/frontend/card 11.png')); ?>" alt="<?php echo e($name ?? 'Category'); ?>">
    </div>
    <div class="cardcontent">
        <h4 class="mt-3 Category_Name"><?php echo e($name ?? 'Category Name'); ?></h4>
        <p class="text-muted Category_desc">
            <?php if(isset($description)): ?>
                <?php echo e($description[app()->getLocale()]); ?>

            <?php endif; ?>
        </p>
    </div>
    <div class="cardbtns">
        <?php if(isset($category_id)): ?>
            <a href="<?php echo e(route('frontend.category.details', $category_id)); ?>" class="btn btn-primary" style="width: 100%;background:#BF9456;"><?php echo e(__('messagess.details')); ?></a>
        <?php else: ?>
            <a href="#" class="btn btn-outline-light" style="width: 100%;background:#BF9456;"><?php echo e(__('messagess.details')); ?></a>
        <?php endif; ?>
            <br>
        <a href="#" class="btn btn-outline-light" style="width: 100%;margin-top:10px"><?php echo e(__('messagess.bookNow')); ?></a>
    </div>
</div><?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\resources\views/components/frontend/category-card.blade.php ENDPATH**/ ?>