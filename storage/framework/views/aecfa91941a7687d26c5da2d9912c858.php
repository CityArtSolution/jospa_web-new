<div class="card-header border-bottom p-3">
  <h5 class="mb-0"><?php echo e(__('messages.all_notifications')); ?> (<?php echo e($all_unread_count); ?>)</h5>
</div>
<div class="card-body overflow-auto card-header-border p-0 card-body-list max-17 scroll-thin">
    <div class="dropdown-menu-1 overflow-y-auto list-style-1 mb-0 notification-height">
        <?php if(isset($notifications) && count($notifications) > 0): ?>
            <?php $__currentLoopData = $notifications->sortByDesc('created_at')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($notification->data['data']['notification_group']=='booking'): ?>
                <div class="dropdown-item-1 float-none p-3 list-unstyled iq-sub-card  <?php echo e($notification->read_at ? '':'notify-list-bg'); ?> ">
                  <a href="<?php echo e(route('backend.bookings.index', ['booking_id' => $notification->data['data']['id']])); ?>" class="">
                    <h6><?php echo e($notification->data['subject']); ?></h6>
                    <div class="list-item d-flex">
                        <div class="me-3 mt-1">
                            <button type="button" class="btn btn-soft-primary btn-icon rounded-pill">
                                <?php echo e(strtoupper(substr($notification->data['data']['user_name'], 0, 1))); ?>

                            </button>
                        </div>

                        <div class="list-style-detail">
                            <p class="text-body mb-1">Booking received for <span class="text-primary">
                                <?php if(!empty($notification->data['data']['service_name'])): ?>
                                    <?php echo e($notification->data['data']['service_name']); ?>

                                <?php else: ?>
                                    <?php echo e($notification->data['data']['package_name'] ?? '-'); ?>

                                <?php endif; ?>
                            </span> service by <span class="text-black"><?php echo e(($notification->data['data']['user_name'])); ?></span></p>
                            <div class="d-flex justify-content-between">
                                <p class="text-body"><?php echo e(($notification->data['data']['booking_date'])); ?></p>
                                <p class="text-body"><?php echo e(($notification->data['data']['booking_time'])); ?></p>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>

                <?php elseif($notification->data['data']['notification_group']=='package'): ?>
                <div class="dropdown-item-1 float-none p-3 list-unstyled iq-sub-card <?php echo e($notification->read_at ? '' : 'notify-list-bg'); ?>">
                    <a href="<?php echo e(route('backend.package.index')); ?>" class="">    
                    <h6><?php echo e($notification->data['subject']); ?></h6>
                        <div class="list-item d-flex">
                            <div class="me-3 mt-1">
                                <button type="button" class="btn btn-soft-primary btn-icon rounded-pill">
                                    <?php echo e(strtoupper(substr($notification->data['data']['user_name'], 0, 1))); ?>

                                </button>
                            </div>
                        
                            <div class="list-style-detail">
                                <p class="text-body mb-1">Package <span class="text-primary">
                                    <?php if(!empty($notification->data['data']['package_name'])): ?>
                                        <?php echo e($notification->data['data']['package_name']); ?>

                                    <?php else: ?>
                                        <?php echo e('-'); ?>

                                    <?php endif; ?>
                                </span> is about to expire soon for <span class="text-black"><?php echo e($notification->data['data']['user_name']); ?></span></p>
                                <div class="d-flex justify-content-between">
                                    <p class="text-body">on <?php echo e($notification->data['data']['package_expiry_date']); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                 <?php else: ?>
                     <div class="dropdown-item-1 float-none p-3 list-unstyled iq-sub-card  <?php echo e($notification->read_at ? '':'notify-list-bg'); ?> ">
                     <a href="<?php echo e(route('backend.orders.show', ['id' => $notification->data['data']['id']])); ?>" class="">
                     <div class="d-flex justify-content-between">
                    <h6><?php echo e($notification->data['subject']); ?></h6>
                    <h6><?php echo e(($notification->data['data']['order_code']) ?? '-'); ?> </h6>
                    </div>
                    <div class="list-item d-flex">
                        <div class="me-3 mt-1">
                            <button type="button" class="btn btn-soft-primary btn-icon rounded-pill">
                                <?php echo e(strtoupper(substr($notification->data['data']['user_name'], 0, 1))); ?>

                            </button>
                        </div>
                         <div class="list-style-detail">
                            <?php if($notification->data['data']['notification_type']=='order_placed'): ?>
                            <p class="text-body mb-1">New Order received from <span class="text-black"><?php echo e(($notification->data['data']['user_name'])); ?>.</span></p>
                            <div class="d-flex justify-content-between">
                                <p class="text-body"><?php echo e(($notification->data['data']['order_date'])); ?></p>
                                <p class="text-body"><?php echo e(($notification->data['data']['order_time'])); ?></p>
                            </div>

                             <?php elseif($notification->data['data']['notification_type']=='order_proccessing'): ?>
                            <p class="text-body mb-1">Order <span class="text-black"><?php echo e(($notification->data['data']['order_code'])); ?></span> has been Processing.</p>
                            <div class="d-flex justify-content-between">
                                <p class="text-body"><?php echo e(($notification->data['data']['order_date'])); ?></p>
                                <p class="text-body"><?php echo e(($notification->data['data']['order_time'])); ?></p>
                            </div>

                             <?php elseif($notification->data['data']['notification_type']=='order_delivered'): ?>
                            <p class="text-body mb-1">Order <span class="text-black"><?php echo e(($notification->data['data']['order_code'])); ?> </span> has been Delivered.</p>
                            <div class="d-flex justify-content-between">
                                <p class="text-body"><?php echo e(($notification->data['data']['order_date'])); ?></p>
                                <p class="text-body"><?php echo e(($notification->data['data']['order_time'])); ?></p>
                            </div>

                              <?php elseif($notification->data['data']['notification_type']=='order_cancelled'): ?>
                            <p class="text-body mb-1">Order <span class="text-black"><?php echo e(($notification->data['data']['order_code'])); ?> </span> has been Cancelled.</p>
                            <div class="d-flex justify-content-between">
                                <p class="text-body"><?php echo e(($notification->data['data']['order_date'])); ?></p>
                                <p class="text-body"><?php echo e(($notification->data['data']['order_time'])); ?></p>
                            </div>

                            <?php else: ?>


                            <?php endif; ?>
                        </div>

                    </div>
                  </a>
                </div>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <li class="list-unstyled dropdown-item-1 float-none p-3">
                <div class="list-item d-flex justify-content-center align-items-center">
                    <div class="list-style-detail ml-2 mr-2">
                    <h6 class="font-weight-bold"><?php echo e(__('messages.no_notification')); ?></h6>
                    <p class="mb-0"></p>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </div>
</div>
<div class="card-footer py-2 border-top">
  <div class="d-flex align-items-center justify-content-between">
      <?php if($all_unread_count > 0 ): ?>
        <a href="<?php echo e(route('backend.notifications.markAllAsRead')); ?>" data-type="markas_read" class="text-primary mb-0 notifyList pull-right" ><span><?php echo e(__('messages.mark_all_as_read')); ?></span></a>
      <?php endif; ?>
      <?php if(isset($notifications) && count($notifications) > 0): ?>
        <a href="<?php echo e(route('backend.notifications.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('messages.view_all')); ?></a>
      <?php endif; ?>
  </div>
</div>

<?php /**PATH /home/city2tec/project/resources/views/backend/notifications/list.blade.php ENDPATH**/ ?>