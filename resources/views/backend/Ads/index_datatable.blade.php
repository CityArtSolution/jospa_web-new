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

<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- HOME SECTION -->
    <div class="section">
        <h2>Main Page Banners</h2>
        <input type="hidden" name="page" value="home">
        <label class="upload-btn" for="home-input">{{ __('messagess.upload_banners') }}</label>
        <button type="submit" class="upload-btn">{{ __('messagess.save') }}</button>
        <input type="file" id="home-input" name="images" accept="image/*">

        <div class="image-grid" id="home-grid">
            @foreach($home as $img)
                <div class="image-card">
                    <img src="{{ asset($img->image) }}" alt="Ad Image">
                    <div class="image-actions">
                        @if($img->status == 1)
                            <button class="btn-toggle active" type="button" onclick="updateStatus({{ $img->id }}, 1, this)">{{ __('messagess.active') }}</button>
                        @else
                            <button class="btn-toggle inactive" type="button" onclick="updateStatus({{ $img->id }}, 0, this)">{{ __('messagess.inactive') }}</button>
                        @endif

                        <button class="btn-delete" type="button" onclick="deleteImge({{ $img->id }})">{{ __('messagess.delete') }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>


<!-- PACKAGES SECTION -->
<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section">
        <h2>{{ __('messagess.packages_section_images') }}</h2>
        <label class="upload-btn" for="packages-input">{{ __('messagess.upload_packages') }}</label>
        <input type="hidden" name="page" value="packages">
        <input type="file" id="packages-input" name="images" accept="image/*">
        <button type="submit" class="upload-btn">{{ __('messagess.save') }}</button>
    
        <div class="image-grid" id="packages-grid">
            @foreach($packages as $pack)
                <div class="image-card">
                    <img src="{{ asset($pack->image) }}" alt="Ad Image">
    
                    <div class="image-actions">
                        @if($pack->status == 1)
                            <button class="btn-toggle active" type="button" onclick="updateStatus({{ $pack->id }}, 1, this)">{{ __('messagess.active') }}</button>
                        @else
                            <button class="btn-toggle inactive" type="button" onclick="updateStatus({{ $pack->id }}, 0, this)">{{ __('messagess.inactive') }}</button>
                        @endif

                        <button class="btn-delete" type="button" onclick="deleteImge({{ $pack->id }})">{{ __('messagess.delete') }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>

<!-- SERVICES SECTION -->
<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section">
        <h2>{{ __('messagess.services_section_images') }}</h2>
        <label class="upload-btn" for="services-input">{{ __('messagess.upload_services') }}</label>
        <input type="hidden" name="page" value="services">
        <input type="file" id="services-input" name="images" accept="image/*">
        <button type="submit" class="upload-btn">{{ __('messagess.save') }}</button>
    
        <div class="image-grid" id="services-grid">
            @foreach($services as $serve)
                <div class="image-card">
                    <img src="{{ asset($serve->image) }}" alt="Ad Image">
    
                    <div class="image-actions">
                        @if($serve->status == 1)
                            <button class="btn-toggle active" type="button" onclick="updateStatus({{ $serve->id }}, 1, this)">{{ __('messagess.active') }}</button>
                        @else
                            <button class="btn-toggle inactive" type="button" onclick="updateStatus({{ $serve->id }}, 0, this)">{{ __('messagess.inactive') }}</button>
                        @endif
    
                        <button class="btn-delete" type="button" onclick="deleteImge({{ $serve->id }})">{{ __('messagess.delete') }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>

<!-- SHOP SECTION -->
<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="section">
        <h2>{{ __('messagess.shop_section_images') }}</h2>
        <label class="upload-btn" for="shop-input">{{ __('messagess.upload_shop_images') }}</label>
        <input type="hidden" name="page" value="shop">
        <input type="file" id="shop-input" name="images" accept="image/*">
        <button type="submit" class="upload-btn">{{ __('messagess.save') }}</button>
    
        <div class="image-grid" id="shop-grid">
            @foreach($shop as $item)
                <div class="image-card">
                    <img src="{{ asset($item->image) }}" alt="Ad Image">
    
                    <div class="image-actions">
                            @if($item->status == 1)
                                <button class="btn-toggle active" type="button" onclick="updateStatus({{ $item->id }}, 1, this)">{{ __('messagess.active') }}</button>
                            @else
                                <button class="btn-toggle inactive" type="button" onclick="updateStatus({{ $item->id }}, 0, this)">{{ __('messagess.inactive') }}</button>
                            @endif

                        
                        <button class="btn-delete" type="button" onclick="deleteImge({{ $item->id }})">{{ __('messagess.delete') }}</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>
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
                `;
                container.appendChild(div);

                div.querySelector('.btn-delete').addEventListener('click', () => {
                    div.remove();
                });

                const toggleBtn = div.querySelector('.btn-toggle');
                toggleBtn.addEventListener('click', () => {
                    toggleBtn.classList.toggle('inactive');
                    toggleBtn.textContent = toggleBtn.classList.contains('inactive') ? 'Inactive' : 'Active';
                });
            };
            reader.readAsDataURL(file);
        });
    }

    document.getElementById('home-input').addEventListener('change', function() {
        previewImages(this, 'home-grid');
    });

    document.getElementById('packages-input').addEventListener('change', function() {
        previewImages(this, 'packages-grid');
    });

    document.getElementById('services-input').addEventListener('change', function() {
        previewImages(this, 'services-grid');
    });

    document.getElementById('shop-input').addEventListener('change', function() {
        previewImages(this, 'shop-grid');
    });
</script>
<!--change status script-->
<script>
function updateStatus(id, currentStatus, btn) {
    let newStatus = currentStatus == 1 ? 0 : 1;

    fetch(`/ads/update-status/${id}`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            if(newStatus == 1){
                btn.classList.remove('inactive');
                btn.classList.add('active');
                btn.innerText = 'Active';
                btn.setAttribute('onclick', `updateStatus(${id}, 1, this)`);
            } else {
                btn.classList.remove('active');
                btn.classList.add('inactive');
                btn.innerText = 'Inactive';
                btn.setAttribute('onclick', `updateStatus(${id}, 0, this)`);
            }
        } else {
            alert('حدث خطأ أثناء تغيير الحالة');
        }
    })
    .catch(err => {
        console.log(err);
        alert('حدث خطأ في الاتصال');
    });
}
</script>
<!--delete Imge script-->
<script>
    function deleteImge(id, btn) {

    if(!confirm('هل أنت متأكد من حذف هذه الصورة؟')) return;

    fetch(`/app/ads/destroy/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
    })
    .then(res => res.json())
    .then(data => {
        location.reload();
    })
    .catch(err => {
        console.log(err);
        alert('حدث خطأ في الاتصال');
    });
}

</script>

@endpush
