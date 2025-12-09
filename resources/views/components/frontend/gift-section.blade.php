<style>
@media (max-width: 767.98px) {
    .gift-title-responsive {
        font-size: 1.6rem !important;
    }
    .gift-desc-responsive {
        font-size: 1rem !important;
        max-width: 95% !important; 
    }
    .gift-card-img-responsive {
        width: 48px !important;
        margin-bottom: 1rem !important; 
    }
}
.b_h {
  transition: all 0.5s ease;
}

.b_h:hover {
    background-color: rgba(255,255,255,0.2) !important;
    color: #000 !important;
}
@media (max-width: 576px) {
    .gift-desc-responsive {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
}
</style>
<section class="position-relative" style="height: calc(100vh - 200px);">
    <img src="{{ asset('images/pages/gift-bg.png') }}" alt="{{ __('messagess.background_alt') }}" class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover; min-height: 500px">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: #f5deb369;"></div>

    <div class="position-relative d-flex flex-column align-items-center justify-content-center text-center px-2 px-md-0" style="font-weight: bold;min-height: 500px; z-index: 3;line-height: 2;">
        <span class="iconify" data-icon="simple-line-icons:present" data-width="70" data-height="100" style="color:#FFFFFF;margin:0 0 60px 0px"></span>
        <h2 class="fw-bold mb-3 gift-title-responsive" style="font-size: 3rem;color: rgb(207 146 51)">
            {{ __('messagess.gift_line_1') }}
        </h2>
        <div class="text-black mb-4 mt-4 gift-desc-responsive" style="font-size: 1.6rem;color: white !important;font-weight: 300;">
            {{ __('messagess.gift_line_2') }}
        </div>
        <div class="text-black mb-4 mt-4 gift-desc-responsive" style="font-size: 1.6rem;color: white !important;font-weight: 300;">
            {{ __('messagess.gift_line_3') }}
        </div>
    </div>

    <div style="margin-top: -60px !important;">
        <a href="{{ route('gift.page') }}" class="btn b_h text-white d-flex align-items-center justify-content-center gap-2 mx-auto px-3 px-md-5 py-3 fs-5 fs-md-5 gift-btn-responsive" style="z-index: 9;position: relative;border-radius: 30px;border:1px solid #c69b6d;background:white;width: 349.775px;height: 54px;">
            <span class="iconify" data-icon="basil:present-outline" data-width="32" data-height="32" style="color:#c69b6d;"></span>
            <span class="text-center" style="font-size: 22.4px;white-space: nowrap;color:#c69b6d;">{{ __('messagess.gift_line_4') }}</span>
        </a> 
    </div>

<style>
@media (max-width: 767.98px) {
    .gift-btn-responsive {
        font-size: 0.95rem !important;
        max-width: 320px;
        margin-left: auto;
        margin-right: auto;
    }
}
</style>

    </div>
</section>

