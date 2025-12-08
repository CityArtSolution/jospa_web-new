<?php
    use App\Models\Ouroffersection;
    use Carbon\Carbon;
    $page = Ouroffersection::where('end_date', '>', Carbon::now())->latest()->first();
?>
<style>
    .head-discount{
        width: 100%;
        height: 80vh;
        position: relative;
        overflow: hidden;
    }
    .radius{
        background-image: url(carly.png);
        height: 440px;
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .discount-section {
        margin-top: 70px;
        text-align: center;
    }
    .discount-section h1 {
        font-family: 'Zain', sans-serif;
        font-size: 57px;
        font-weight: bold;
        color: white;
        margin-bottom: 20px;
    }
    .discount-section h3 {
        color: white;
        font-family: 'Zain', sans-serif;
        font-size: 27px;
        margin: 44px;
    }
    .more-btn-discount {
        margin-top: 0;
        width: 100%;
        height: 55px;
        background-color: white;
        border-radius: 28px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        border: 3px solid #BF9456;
    }
    @media (max-width: 576px) {
        .radius {
            left: -77px;
        }
        .more-btn-discount {
            width: fit-content;
            padding: 11px;
        }
    }
</style>
<?php if($page): ?>
<div class="head-discount">
    <div class="radius">
        <div class="discount-section">
            <?php if($page): ?>
                <?php
                    $startDate = Carbon::parse($page->start_date ?? 0)->translatedFormat('l d-m-Y');
                    $endDate   = Carbon::parse($page->end_date ?? 0)->translatedFormat('l d-m-Y');
                    $description = $page->description[app()->getLocale()] ?? '';
                    $originalPrice = 500;
        
                    if ($page->discount_type === 'percentage') {
                        $result = $originalPrice - ($originalPrice * ($page->discount_value / 100));
                    } else {
                        $result = $originalPrice - $page->discount_value;
                    }
                ?>
                <h1><?php echo e(__('messages.discount')); ?> <?php echo e(intval($page->discount_value)); ?> <?php echo e($page->discount_type == 'percentage' ? '%' : 'ريال'); ?></h1>
                <h3><?php echo e($description); ?> "vdsfimvdfojbdgoindgoi nfgonfgon"</h3>
                <div style="width: 17%;margin: auto;">
                    <a href="<?php echo e(route('frontend.Ouroffers')); ?>" class="more-btn-discount">
                        <p style="color:white;font-size: 16px;margin: 0 13px;color:#BF9456"><?php echo e(__('messagess.learn_more')); ?></p>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <img src="<?php echo e(asset('fl-dis.png')); ?>" alt="" style="position: absolute;left: 0;bottom: -11px;width: 195px;">
    </div>
</div>
<?php endif; ?><?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\resources\views/components/frontend/discount.blade.php ENDPATH**/ ?>