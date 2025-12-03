    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
    body {
      font-family: 'Almarai', sans-serif !important;
    }
    .m-nav{
        width: 100%;
        height: 17vh;
        background: #212121;
        position: fixed;
        z-index: 9999;
        display: flex;
    }
    .loyalty{
        width: 18%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .settings{
        width: 18%;
        height: 100%;
        <?php if(app()->getLocale() == 'en'): ?>
            justify-content: flex-end !important;
        <?php else: ?>
            justify-content: center !important;
        <?php endif; ?>
    }
    .links{
        width: 53%;
        height: 100%;
        display: flex;
        font-family: Almarai;
    }
    .logo{
        width: 11%;
        height: 100%;
        display: flex;
        justify-content: center;
    }
    .logo img{
        height: 77px;
        margin-top: 6px;
    }
    .more-btn-nav{
        margin-top: 0;
        width: 71%;
        height: 55px;
        background-color: #212121;
        border-radius: 28px;
        display: flex;
        text-decoration-line: none;
        border: 2px #cf9233 solid;
        justify-content: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .more-btn-nav::before {
        content: "";
        position: absolute;
        width: 92%;
        height: 80%;
        border: 2px #cf9233 solid;e;
        border-radius: 28px;
    }
    .iconc{
        width: 100%;
        height: 58%;
        display: flex;
        justify-content: center;
    }
    .iconp{
        width: 100%;
        height: 58%;
        display: flex;
        justify-content: center;
    }
    .text{
        text-align: center;
        color: #cf9233;
        margin-top: 12px;
    }
.icon-circle {
  width: 48px;
  height: 48px;
  border: 2px solid #cf9233;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 6px auto;
  font-size: 20px;   /* حجم الأيقونة */
  color: #cf9233;
  transition: all 0.3s ease;
}

.icon-text {
  text-align: center;
  font-size: 13px;
  font-weight: 500;
  color: #cf9233;
}


    .icon-text {
      text-align: center;
      font-size: 16px;
      font-weight: 500;
      color: #cf9233;
    }
    .icon-circle:hover  {
        animation: flashBlur 1s infinite;
    }
    @keyframes flashBlur {
    0% {
        box-shadow: 0 0 0px #cf9233;
    }
    50% {
        box-shadow: 0 0 10px 3px #cf9233; /* درجة البلور */
    }
    100% {
        box-shadow: 0 0 0px #cf9233;
    }
}
    a {
            text-decoration-line: none;
    }
    .mob-btn{
        height: 45px;
    }
    .mob-nav{
        text-align: right;
        background: #212121;
        min-height: 45px;
        display: flex;
        direction: rtl;
    }
    .offcanvas{
        color:#979797;
        width: 65% !important;
    }
</style>

    <div class="m-nav d-none d-lg-flex">
        <div class="logo"><a href="/"> <img src="<?php echo e(asset('images/samilogo.png')); ?>"></a></div>
        <div class="links">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center gap-4" style="margin-right: 22px;flex-direction: row;white-space: nowrap;z-index: 999999;">

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.home') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.home')); ?>">
                            <?php echo e(__('messagess.nav_home')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.about') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.about')); ?>">
                            <?php echo e(__('messagess.nav_about')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.services') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.services')); ?>">
                            <?php echo e(__('messagess.nav_services')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.Packages') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.Packages')); ?>">
                            <?php echo e(__('messagess.nav_package')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.Ouroffers') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.Ouroffers')); ?>">
                            <?php echo e(__('messagess.our_offers')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.Shop') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.Shop')); ?>">
                            <?php echo e(__('messagess.store')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('gift.page') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('gift.page')); ?>">
                           <?php echo e(__('messagess.gift_cards')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.branches') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.branches')); ?>">
                            <?php echo e(__('messagess.our_branches')); ?>

                        </a>
                    </li>

                    <li class="nav-item h5">
                        <a class="nav-link text-white <?php echo e(request()->routeIs('frontend.contact') ? 'text-active' : ''); ?>"
                           href="<?php echo e(route('frontend.contact')); ?>">
                            <?php echo e(__('messagess.nav_contact')); ?>

                        </a>
                    </li>

                    <li  class="nav-item h5">
                        <a href="<?php echo e(route('language.switch', 'en')); ?>" style="color:#cf9233;text-decoration-line: none;">English</a> |
                        <a href="<?php echo e(route('language.switch', 'ar')); ?>" style="color:#cf9233;text-decoration-line: none;">العربية</a>
                    </li>
                </ul>
        </div>
    <div class="settings d-flex justify-content-center align-items-center gap-4">
        <!-- My Profile -->
        <a href="<?php echo e(route('profile')); ?>">
        <div class="text-center">
            <div class="icon-circle">
                <img class="fluentperson-28-regular"src="<?php echo e(asset('images/icons/fluent-person-28-regular-2.svg')); ?>"alt="fluent:person-28-regular"/>
            </div>
            <div class="icon-text"><?php echo e(__('messagess.profile')); ?></div>
        </div>
        </a>
        <!-- Cart -->
        <a href="<?php echo e(route('cart.page')); ?>">
        <div class="text-center">
            <div class="icon-circle">
                <img class="mdi-lightcart" src="<?php echo e(asset('images/icons/mdi-light-cart.svg')); ?>" alt="mdi-light:cart" />
            </div>
            <div class="icon-text"><?php echo e(__('messagess.nav_cart')); ?></div>
        </div>
        </a>

    </div>

        <div class="loyalty">
            <a href="<?php echo e(route('home.loyalety')); ?>" class="more-btn-nav">
                <p style="color:#cf9233 ;font-size: 16px;margin: 0 13px;"> <img style="width: 22px;margin: 0 7px;" src="<?php echo e(asset('images/icons/basil-present-outline-11.svg')); ?>" > <?php echo e(__('messagess.loyalty_points')); ?></p>
            </a>
        </div>
    </div>

    <!-- زرار فتح المينيو -->
    <div class="mob-nav">
        <button class="btn mob-btn d-lg-none" style="margin-top: 12px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
          <img src="<?php echo e(asset('images/icons/hugeicons_menu-02.png')); ?>">
        </button>

        <a href="/" style="display: flex;align-items: center;"> <img style="width: 37px;" src="<?php echo e(asset('images/samilogo.png')); ?>"></a>

        <div class="loyalty" style="width: 61% !important;height: 100%;margin: 11px;display: flex;justify-content: left;align-items: center;">
            <a href="<?php echo e(route('home.loyalety')); ?>" class="more-btn-nav">
                <p style="color:#cf9233 ;font-size: 16px;margin: 0 13px;"> <img style="width: 22px;margin: 0 7px;" src="<?php echo e(asset('images/icons/basil-present-outline-11.svg')); ?>" > <?php echo e(__('messagess.loyalty_points')); ?></p>
            </a>
        </div>
    </div>

    <!-- المينيو الجانبي -->
    <div class="offcanvas offcanvas-start bg-white " tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">القائمة</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.home') ? 'text-active' : ''); ?>" href="<?php echo e(route('frontend.home')); ?>">
              <?php echo e(__('messagess.nav_home')); ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.about') ? 'text-active' : ''); ?>" href="<?php echo e(route('frontend.about')); ?>">
              <?php echo e(__('messagess.nav_about')); ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.services') ? 'text-active' : ''); ?>" href="<?php echo e(route('frontend.services')); ?>">
              <?php echo e(__('messagess.nav_services')); ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.Packages') ? 'text-active' : ''); ?>"href="<?php echo e(route('frontend.Packages')); ?>">
                <?php echo e(__('messagess.nav_package')); ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.Ouroffers') ? 'text-active' : ''); ?>"href="<?php echo e(route('frontend.Ouroffers')); ?>">
                <?php echo e(__('messagess.our_offers')); ?>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.Shop') ? 'text-active' : ''); ?>"href="<?php echo e(route('frontend.Shop')); ?>">
                <?php echo e(__('messagess.store')); ?>

            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('gift.page') ? 'text-active' : ''); ?>"href="<?php echo e(route('gift.page')); ?>">
               <?php echo e(__('messagess.gift_cards')); ?>

            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.branches') ? 'text-active' : ''); ?>"href="<?php echo e(route('frontend.branches')); ?>">
                <?php echo e(__('messagess.our_branches')); ?>

            </a>
         </li>

         <li class="nav-item">
            <a class="nav-link  <?php echo e(request()->routeIs('frontend.contact') ? 'text-active' : ''); ?>"href="<?php echo e(route('frontend.contact')); ?>">
                <?php echo e(__('messagess.nav_contact')); ?>

            </a>
         </li>
         <li  class="nav-item">
            <a href="<?php echo e(route('language.switch', 'en')); ?>" style="color:#cf9233;text-decoration-line: none;">English</a> |
            <a href="<?php echo e(route('language.switch', 'ar')); ?>" style="color:#cf9233;text-decoration-line: none;">العربية</a>
         </li>
             <div class="settings d-flex justify-content-center align-items-center gap-4" style="width: 100% !important;height: 100% !important;margin-top: 22px !important;">
                <!-- My Profile -->
                <a href="<?php echo e(route('profile')); ?>">
                <div class="text-center">
                    <div class="icon-circle">
                        <img class="fluentperson-28-regular"src="<?php echo e(asset('images/icons/fluent-person-28-regular-2.svg')); ?>"alt="fluent:person-28-regular"/>
                    </div>
                    <div class="icon-text"><?php echo e(__('messagess.profile')); ?></div>
                </div>
                </a>
                <!-- Cart -->
                <a href="<?php echo e(route('cart.page')); ?>">
                <div class="text-center">
                    <div class="icon-circle">
                        <img class="mdi-lightcart" src="<?php echo e(asset('images/icons/mdi-light-cart.svg')); ?>" alt="mdi-light:cart" />
                    </div>
                    <div class="icon-text"><?php echo e(__('messagess.nav_cart')); ?></div>
                </div>
                </a>
            </div>
        </ul>
      </div>
    </div>
<?php /**PATH /home/city2tec/project/resources/views/components/frontend/second-navbar.blade.php ENDPATH**/ ?>