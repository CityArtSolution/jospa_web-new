@extends('backend.layouts.app')

@section('title')

@endsection

@push('after-styles')
<style>
    h2 {
        color: #BF9456;
        margin-bottom: 15px;
        font-size: 1.5rem;
        border-bottom: 2px solid #BF9456;
        padding-bottom: 5px;
    }

    .section {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    .upload-btn {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom: 15px;
        border-radius: 5px;
        background: #BF9456;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        border: none;
    }

    .upload-btn:hover {
        background: #a67c45;
    }

    input[type="file"] { display: none; }

    .image-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }

    .image-card {
        width: 150px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        background: #fafafa;
        padding: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 14px;
    }

    .image-card img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        margin-bottom: 5px;
        border-radius: 3px;
    }

    .image-actions {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .image-actions button {
        padding: 5px 10px;
        font-size: 12px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-toggle {
        background: #4CAF50;
        color: #fff;
    }

    .btn-toggle.inactive {
        background: #f44336;
    }

    .btn-delete {
        background: #888;
        color: #fff;
    }
</style>
@endpush

@section('content')
{{--<div class="container ads-page">
    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            
            <!-- السلايدر الأول -->
            <div class="col-md-4 text-center">
                <div class="ads-card">
                    <h5>{{ __('messagess.shop_bannar') }}</h5>
                    <input type="file" id="slider1" name="shop_bannar" accept="image/*">
                    <label for="slider1"><i class="fa fa-upload"></i> {{ __('messagess.chose_img') }} </label>
                </div>
                <img id="preview1" class="preview-img" />
            </div>

            <!-- السلايدر الثاني -->
            <div class="col-md-4 text-center">
                <div class="ads-card">
                    <h5>{{ __('messagess.service_bannar') }}</h5>
                    <input type="file" id="slider2" name="serve_bannar" accept="image/*">
                    <label for="slider2"><i class="fa fa-upload"></i> {{ __('messagess.chose_img') }} </label>
                </div>
                <img id="preview2" class="preview-img" />
            </div>

            <!-- صورة الإعلان المصغرة -->
            <div class="col-md-4 text-center">
                <div class="ads-card">
                    <h5>{{ __('messagess.packages_bannar') }}</h5>
                    <input type="file" id="thumbnail" name="pack_bannar" accept="image/*">
                    <label for="thumbnail"><i class="fa fa-upload"></i> {{ __('messagess.chose_img') }} </label>
                </div>
                <img id="preview3" class="preview-img" />
            </div>

        </div>

        <!-- زر الحفظ -->
        <div class="text-center">
            <button type="submit" class="save-btn">
                <i class="fa fa-save"></i> {{ __('messagess.save') }}
            </button>
        </div>
    </form>
</div>--}}
<div class="section">
    <h2>Main Page Banners</h2>
    <label class="upload-btn" for="banners">Upload Banners</label>
    <input type="file" id="banners" multiple accept="image/*">
    
    <div class="image-grid" id="banners-grid">
        <!-- Example: صور موجودة من الداتابيز -->
        <div class="image-card">
            <img src="banner1.jpg" alt="Banner 1">
            <div class="image-actions">
                <button class="btn-toggle">Active</button>
                <button class="btn-delete">Delete</button>
            </div>
        </div>
        <div class="image-card">
            <img src="banner2.jpg" alt="Banner 2">
            <div class="image-actions">
                <button class="btn-toggle inactive">Inactive</button>
                <button class="btn-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Packages Section -->
<div class="section">
    <h2>Packages Section Images</h2>
    <label class="upload-btn" for="packages">Upload Packages</label>
    <input type="file" id="packages" multiple accept="image/*">

    <div class="image-grid" id="packages-grid">
        <!-- Example images -->
    </div>
</div>

<!-- Services Section -->
<div class="section">
    <h2>Services Section Images</h2>
    <label class="upload-btn" for="services">Upload Services</label>
    <input type="file" id="services" multiple accept="image/*">

    <div class="image-grid" id="services-grid">
        <!-- Example images -->
    </div>
</div>
@endsection

@push('after-scripts')
<script>
    function previewImages(input, containerId) {
        const container = document.getElementById(containerId);
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = () => {
                const div = document.createElement('div');
                div.classList.add('image-card');
                div.innerHTML = `
                    <img src="${reader.result}" alt="Uploaded Image">
                    <div class="image-actions">
                        <button class="btn-toggle active">Active</button>
                        <button class="btn-delete">Delete</button>
                    </div>
                `;
                container.appendChild(div);

                // Delete functionality
                div.querySelector('.btn-delete').addEventListener('click', () => {
                    div.remove();
                });

                // Toggle functionality
                const toggleBtn = div.querySelector('.btn-toggle');
                toggleBtn.addEventListener('click', () => {
                    toggleBtn.classList.toggle('inactive');
                    if(toggleBtn.classList.contains('inactive')){
                        toggleBtn.textContent = 'Inactive';
                    } else {
                        toggleBtn.textContent = 'Active';
                    }
                });
            };
            reader.readAsDataURL(file);
        });
    }

    document.getElementById('banners').addEventListener('change', function() {
        previewImages(this, 'banners-grid');
    });

    document.getElementById('packages').addEventListener('change', function() {
        previewImages(this, 'packages-grid');
    });

    document.getElementById('services').addEventListener('change', function() {
        previewImages(this, 'services-grid');
    });
</script>
<!-- JS -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>-->
<!--<script>-->

<!--    function previewImage(inputId, previewId) {-->
<!--        const input = document.getElementById(inputId);-->
<!--        const preview = document.getElementById(previewId);-->

<!--        input.addEventListener("change", function () {-->
<!--            const file = this.files[0];-->
<!--            if (file) {-->
<!--                const reader = new FileReader();-->
<!--                reader.onload = function (e) {-->
<!--                    preview.src = e.target.result;-->
<!--                    preview.style.display = "block";-->
<!--                };-->
<!--                reader.readAsDataURL(file);-->
<!--            }-->
<!--        });-->
<!--    }-->

<!--    previewImage("slider1", "preview1");-->
<!--    previewImage("slider2", "preview2");-->
<!--    previewImage("thumbnail", "preview3");-->
            
<!--    @if(session('success'))-->
<!--        toastr.success("{{ session('success') }}");-->
<!--    @endif-->

<!--    @if(session('error'))-->
<!--        toastr.error("{{ session('error') }}");-->
<!--    @endif-->
<!--</script>-->
@endpush
