<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
@media (max-width: 576px) {
    .s-s-mt-100 {
        margin-top: 100px;
    }
    #bookNaw{
      margin-top: 50px;
    }
}
.row {
    --bs-gutter-x: 0rem;
}
#branchContainer {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 1000px;
    max-height: 80vh;
    overflow-y: auto;
    background: #bf9456;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.2);
    z-index: 9999;
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

/* كل كارت فرع */
.branch-card {
    background: #f9f6f0;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.branch-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

/* صورة الفرع */
.branch-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

/* اسم الفرع */
.branch-card h5 {
    font-size: 18px;
    font-weight: 600;
    color: #BF9456;
    margin: 10px 0 5px 0;
}

/* وصف الفرع */
.branch-card p {
    font-size: 14px;
    color: #555;
    padding: 0 10px 10px 10px;
}
#branchContainer .close-btn {
    position: absolute;
    top: 15px;
    right: 20px;
    background: #BF9456;
    color: #fff;
    border: none;
    font-size: 18px;
    padding: 5px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.2s;
    z-index: 10000;
}

#branchContainer .close-btn:hover {
    background: #a37440;
}
#wifi-loader {
  --background: #62abff;
  --front-color: #BF9456;
  --back-color: #c3c8de;
  --text-color: #414856;
  width: 64px;
  height: 64px;
  border-radius: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999999;
  display: flex;
  justify-content: center;
  align-items: center;
}

#wifi-loader svg {
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
}

#wifi-loader svg circle {
  position: absolute;
  fill: none;
  stroke-width: 6px;
  stroke-linecap: round;
  stroke-linejoin: round;
  transform: rotate(-100deg);
  transform-origin: center;
}

#wifi-loader svg circle.back {
  stroke: var(--back-color);
}

#wifi-loader svg circle.front {
  stroke: var(--front-color);
}

#wifi-loader svg.circle-outer {
  height: 86px;
  width: 86px;
}

#wifi-loader svg.circle-outer circle {
  stroke-dasharray: 62.75 188.25;
}

#wifi-loader svg.circle-outer circle.back {
  animation: circle-outer135 1.8s ease infinite 0.3s;
}

#wifi-loader svg.circle-outer circle.front {
  animation: circle-outer135 1.8s ease infinite 0.15s;
}

#wifi-loader svg.circle-middle {
  height: 60px;
  width: 60px;
}

#wifi-loader svg.circle-middle circle {
  stroke-dasharray: 42.5 127.5;
}

#wifi-loader svg.circle-middle circle.back {
  animation: circle-middle6123 1.8s ease infinite 0.25s;
}

#wifi-loader svg.circle-middle circle.front {
  animation: circle-middle6123 1.8s ease infinite 0.1s;
}

#wifi-loader svg.circle-inner {
  height: 34px;
  width: 34px;
}

#wifi-loader svg.circle-inner circle {
  stroke-dasharray: 22 66;
}

#wifi-loader svg.circle-inner circle.back {
  animation: circle-inner162 1.8s ease infinite 0.2s;
}

#wifi-loader svg.circle-inner circle.front {
  animation: circle-inner162 1.8s ease infinite 0.05s;
}

#wifi-loader .text {
  position: absolute;
  bottom: -40px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-transform: lowercase;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 0.2px;
}

#wifi-loader .text::before, #wifi-loader .text::after {
  content: attr(data-text);
}

#wifi-loader .text::before {
  color: var(--text-color);
}

#wifi-loader .text::after {
  color: var(--front-color);
  animation: text-animation76 3.6s ease infinite;
  position: absolute;
  left: 0;
}

@keyframes circle-outer135 {
  0% {
    stroke-dashoffset: 25;
  }

  25% {
    stroke-dashoffset: 0;
  }

  65% {
    stroke-dashoffset: 301;
  }

  80% {
    stroke-dashoffset: 276;
  }

  100% {
    stroke-dashoffset: 276;
  }
}

@keyframes circle-middle6123 {
  0% {
    stroke-dashoffset: 17;
  }

  25% {
    stroke-dashoffset: 0;
  }

  65% {
    stroke-dashoffset: 204;
  }

  80% {
    stroke-dashoffset: 187;
  }

  100% {
    stroke-dashoffset: 187;
  }
}

@keyframes circle-inner162 {
  0% {
    stroke-dashoffset: 9;
  }

  25% {
    stroke-dashoffset: 0;
  }

  65% {
    stroke-dashoffset: 106;
  }

  80% {
    stroke-dashoffset: 97;
  }

  100% {
    stroke-dashoffset: 97;
  }
}

@keyframes text-animation76 {
  0% {
    clip-path: inset(0 100% 0 0);
  }

  50% {
    clip-path: inset(0);
  }

  100% {
    clip-path: inset(0 0 0 100%);
  }
}
</style>
<div id="wifi-loader" style="display:none;">
    <svg class="circle-outer" viewBox="0 0 86 86">
        <circle class="back" cx="43" cy="43" r="40"></circle>
        <circle class="front" cx="43" cy="43" r="40"></circle>
        <circle class="new" cx="43" cy="43" r="40"></circle>
    </svg>
    <svg class="circle-middle" viewBox="0 0 60 60">
        <circle class="back" cx="30" cy="30" r="27"></circle>
        <circle class="front" cx="30" cy="30" r="27"></circle>
    </svg>
    <svg class="circle-inner" viewBox="0 0 34 34">
        <circle class="back" cx="17" cy="17" r="14"></circle>
        <circle class="front" cx="17" cy="17" r="14"></circle>
    </svg>
    <div class="text" data-text="Loading"></div>
</div>

<section class="py-5" style="background: #bf945612">
    <div class="container" id="bookNaw"  style="padding: 0 5rem;">
        <h2 class="mb-5 mt-3 text-center" style="font-size: 42px;background: #BF9456;-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-weight: bold;">
            <?php echo e(__('messagess.our_service_categories')); ?>

        </h2>
        <?php if(isset($categories) && $categories->count() > 0): ?>
            <div class="row s-s-mt-100">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <?php echo $__env->make('components.frontend.category-card', [
                            'image' => $category->av2,
                            'name' => $category->name,
                            'description' => $category->description,
                            'price_range' => $category->services && $category->services->count() > 0 && $category->services->whereNotNull('default_price')->count() > 0 ?
                                'SR ' . number_format($category->services->whereNotNull('default_price')->min('default_price'), 2) . ' - SR ' . number_format($category->services->whereNotNull('default_price')->max('default_price'), 2) :
                                __('messagess.contact_for_pricing'),
                            'category_id' => $category->id
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <p class="text-muted"><?php echo e(__('messagess.no_service_categories')); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Service Details Modal -->
<div class="modal fade" id="serviceDetailsModal" tabindex="-1" aria-labelledby="serviceDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceDetailsModalLabel"><?php echo e(__('messagess.service_details')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo e(__('messagess.close')); ?>"></button>
            </div>
            <div class="modal-body">
                <div id="serviceDetailsContent">
                    <div class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden"><?php echo e(__('messagess.loading_service_details')); ?></span>
                        </div>
                        <p class="mt-2"><?php echo e(__('messagess.loading_service_details')); ?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('messagess.close')); ?></button>
                <button type="button" class="btn btn-primary"><?php echo e(__('messagess.book_this_service')); ?></button>
            </div>
        </div>
    </div>
</div>
    <div id="branchContainer" style="display:none;"></div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    const currentLang = '<?php echo e(app()->getLocale()); ?>'; // ar أو en
</script>

<script>
    AOS.init({ once: true });

function showCategoryServices(categoryId) {
    const modal = new bootstrap.Modal(document.getElementById('pricingModal'));
    const contentDiv = document.getElementById('pricingTable');

    contentDiv.innerHTML = `
      <div class="text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">${currentLang === 'ar' ? 'جارٍ تحميل الخدمات...' : 'Loading services...'}</span>
        </div>
        <p class="mt-2">${currentLang === 'ar' ? 'جارٍ تحميل الخدمات...' : 'Loading services...'}</p>
      </div>
    `;

    modal.show();

    fetch(`/api/v1/services?category_id=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            if (data.status && data.data && data.data.length > 0) {
                const services = data.data;
                let tableRows = '';

                services.forEach(service => {
                    const serviceName = service.name[currentLang] ?? service.name['en'];
                    const categoryName = service.category?.name?.[currentLang] ?? service.category?.name?.['en'] ?? '-';

                    tableRows += `
                      <tr>
                        <td>${serviceName}</td>
                        <td>${categoryName}</td>
                        <td>${parseFloat(service.default_price).toFixed(2)}</td>
                        <td>${service.duration_min}</td>
                      </tr>
                    `;
                });

                contentDiv.innerHTML = `
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>${currentLang === 'ar' ? 'الخدمة' : 'Service'}</th>
                      <th>${currentLang === 'ar' ? 'الفئة' : 'Category'}</th>
                      <th>${currentLang === 'ar' ? 'السعر' : 'Price'}</th>
                      <th>${currentLang === 'ar' ? 'المدة' : 'Duration'}</th>
                    </tr>
                  </thead>
                  <tbody>
                    ${tableRows}
                  </tbody>
                </table>
              `;
            } else {
                contentDiv.innerHTML = `<div class="text-center text-muted"><p>${currentLang === 'ar' ? 'لا توجد خدمات متاحة' : 'No services available'}</p></div>`;
            }
        })
        .catch(() => {
            contentDiv.innerHTML = `<div class="text-center text-danger"><p>${currentLang === 'ar' ? 'حدث خطأ أثناء تحميل الخدمات' : 'Error loading services'}</p></div>`;
        });
}

    document.addEventListener('DOMContentLoaded', function() {
        const pricingModal = document.getElementById('pricingModal');

        if (pricingModal) {
            pricingModal.addEventListener('hidden.bs.modal', function () {
                document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
                document.body.classList.remove('modal-open');
                document.body.style.paddingRight = '';
                document.body.style.overflow = '';

                const contentDiv = document.getElementById('pricingTable');
                if (contentDiv) {
                    contentDiv.innerHTML = `
            <div class="text-center">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"><?php echo e(__('messagess.loading_services')); ?></span>
              </div>
              <p class="mt-2"><?php echo e(__('messagess.loading_services')); ?></p>
            </div>
          `;
                }
            });
        }
    });

    function showServiceDetails(serviceId) {
        const modal = new bootstrap.Modal(document.getElementById('serviceDetailsModal'));
        const contentDiv = document.getElementById('serviceDetailsContent');

        contentDiv.innerHTML = `
      <div class="text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden"><?php echo e(__('messagess.loading_service_details')); ?></span>
        </div>
        <p class="mt-2"><?php echo e(__('messagess.loading_service_details')); ?></p>
      </div>
    `;

        modal.show();

        fetch(`/api/v1/services/${serviceId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status && data.data) {
                    const service = data.data;
                    contentDiv.innerHTML = `
            <div class="row">
              <div class="col-md-6">
                <img src="${service.feature_image}" alt="${service.name}" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
              </div>
              <div class="col-md-6">
                <h4 class="text-primary mb-3">${service.name}</h4>
                <p class="text-muted mb-3">${service.description || '<?php echo e(__('messagess.no_description_available')); ?>'}</p>
                <div class="row mb-3">
                  <div class="col-6">
                    <strong><?php echo e(__('messagess.price_label')); ?></strong><br>
                    <span class="text-primary h5">SR ${parseFloat(service.default_price).toFixed(2)}</span>
                  </div>
                  <div class="col-6">
                    <strong><?php echo e(__('messagess.duration_label')); ?></strong><br>
                    <span class="text-muted">${service.duration_min} <?php echo e(__('messagess.minutes')); ?></span>
                  </div>
                </div>
                <div class="mb-3">
                  <strong><?php echo e(__('messagess.category')); ?></strong><br>
                  <span class="badge bg-secondary">${service.category ? service.category.name : '<?php echo e(__('messagess.general')); ?>'}</span>
                </div>
                ${service.sub_category ? `
                <div class="mb-3">
                  <strong><?php echo e(__('messagess.sub_category')); ?></strong><br>
                  <span class="badge bg-light text-dark">${service.sub_category.name}</span>
                </div>` : ''}
              </div>
            </div>
          `;
                } else {
                    contentDiv.innerHTML = `<div class="text-center text-danger"><p><?php echo e(__('messagess.error_loading_services')); ?></p></div>`;
                }
            })
            .catch(() => {
                contentDiv.innerHTML = `<div class="text-center text-danger"><p><?php echo e(__('messagess.error_loading_services')); ?></p></div>`;
            });
    }
</script>
<script>
    let selectedMainServiceId = null;

  function showLoader() {
      document.getElementById("wifi-loader").style.display = "flex";
  }

  function hideLoader() {
      document.getElementById("wifi-loader").style.display = "none";
  }

  function selectMainService(mainServiceId) {
      selectedMainServiceId = mainServiceId;
      
      showBranchesForMainService(mainServiceId);
  }

  function showBranchesForMainService(mainServiceId) {
    showLoader()
      fetch(`all/branchs/`)  
          .then(res => res.json())
          .then(data => {
              const container = document.getElementById('branchContainer'); 
              container.style.position = "fixed";
              container.innerHTML = '';
              const closeBtn = document.createElement('button');
              closeBtn.className = 'close-btn';
              closeBtn.innerText = '✖';
              closeBtn.addEventListener('click', () => {
                container.style.setProperty('display', 'none', 'important');
              });
              container.appendChild(closeBtn);
              data.forEach(branch => {
                const card = document.createElement('div');
                card.className = 'branch-card';
                card.innerHTML = `
                    <img src="${branch.feature_image}" alt="${branch.name['<?php echo e(app()->getLocale()); ?>'] || branch.name}" style="width:100%; height:200px; object-fit:cover;">
                    <h5>${branch.name['<?php echo e(app()->getLocale()); ?>'] || branch.name}</h5>
                    <p>${branch.description}</p>
                `;
                card.addEventListener('click', () => {
                    window.location.href = `/salonService?branch_id=${branch.id}&mainService_id=${selectedMainServiceId}`;
                });
                container.appendChild(card);
            });

              container.style.display = 'block';
              hideLoader()
          })
          .catch(err => console.error(err));
  }

</script><?php /**PATH C:\Users\VIP\Desktop\jospa.v.4\jospa_web-new\resources\views/components/frontend/services-section.blade.php ENDPATH**/ ?>