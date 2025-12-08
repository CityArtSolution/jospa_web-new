<style>
  .main-learn{
    font-family: 'Zain', sans-serif !important;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    align-items: center;
    padding: 50px;
    background-color: #F5F5F5;
    border-radius: 10px;
  }
  .learn-logo img{
    width: 500px;
    height: auto;
    filter: sepia(100%) saturate(16) hue-rotate(-50deg);
  }
  .learn-content{
    width: 50%;
    text-align: center;
    flex: 1;
    margin-left: 30px;
    margin-top: 15px;
  }
  .learn-content h2{
    font-size: 28px;
    margin-bottom: 15px;
    color: #BF9456;
    margin-top: 13px;
    font-weight: bold;
  }
  .learn-content span{
    margin: 6px 0;
    color: black;
    font-size: 18px;
  }
  .learn-content p{
    font-size: 16px;
    color: #555555;
        line-height: 2;
  }
  .f-sec, .s-sec{
    color: white;
    font-size: 14px;
    padding: 22px;
    width: 30%;
    background-color: #BF9456;
    margin-left: 10px;
    border-radius: 5px;
  }
  .f-sec h3, .s-sec h3{
    font-weight: 700;
    color: white;
    margin-bottom: 25px;
  }
</style>
<div class="main-learn">
  <div class="learn-logo">
    <img src="<?php echo e(asset('images/jospalogo.png')); ?>" alt="Learn About Us">
  </div>
  <div class="learn-content">
    <span><?php echo e(__('messagess.main_title')); ?></span>
    <h2><?php echo e(__('messagess.spa_atmosphere')); ?></h2>
    <p><?php echo e(__('messagess.spa_experience')); ?></p>
  </div>
  <div class="d-flex" style="justify-content: center;">
    <div class="f-sec">
      <h3><?php echo e(__('messagess.vision_title')); ?></h3>
      <p><?php echo e(__('messagess.vision_text')); ?></p>
    </div>
    <div class="s-sec">
      <h3><?php echo e(__('messagess.mission_title')); ?></h3>
      <p><?php echo e(__('messagess.mission_text')); ?></p>
    </div>
  </div>
</div><?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\resources\views/components/frontend/learn-about-section.blade.php ENDPATH**/ ?>