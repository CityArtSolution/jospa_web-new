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
        <label class="upload-btn" for="home-input">Upload Banners</label>
        <button type="submit" class="btn-delete">save</button>
        <input type="file" id="home-input" name="images[]" multiple accept="image/*">

        <div class="image-grid" id="home-grid">
            @foreach($home as $img)
                <div class="image-card">
                    <img src="{{ asset($img->image) }}" alt="Ad Image">
                    <div class="image-actions">
                        @if($img->status == 1)
                            <button class="btn-toggle active">Active</button>
                        @else
                            <button class="btn-toggle inactive">Inactive</button>
                        @endif

                        <form action="{{ route('ads.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>


<!-- PACKAGES SECTION -->
<div class="section">
    <h2>Packages Section Images</h2>
    <label class="upload-btn" for="packages-input">Upload Packages</label>
    <input type="file" id="packages-input" multiple accept="image/*">

    <div class="image-grid" id="packages-grid">
        @foreach($packages as $pack)
            <div class="image-card">
                <img src="{{ asset($pack->image) }}" alt="Ad Image">

                <div class="image-actions">
                    @if($pack->status == 1)
                        <button class="btn-toggle active">Active</button>
                    @else
                        <button class="btn-toggle inactive">Inactive</button>
                    @endif

                    <form action="{{ route('ads.destroy', $pack->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- SERVICES SECTION -->
<div class="section">
    <h2>Services Section Images</h2>
    <label class="upload-btn" for="services-input">Upload Services</label>
    <input type="file" id="services-input" multiple accept="image/*">

    <div class="image-grid" id="services-grid">
        @foreach($servises as $serve)
            <div class="image-card">
                <img src="{{ asset($serve->image) }}" alt="Ad Image">

                <div class="image-actions">
                    @if($serve->status == 1)
                        <button class="btn-toggle active">Active</button>
                    @else
                        <button class="btn-toggle inactive">Inactive</button>
                    @endif

                    <form action="{{ route('ads.destroy', $serve->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- SHOP SECTION -->
<div class="section">
    <h2>Shop Section Images</h2>
    <label class="upload-btn" for="shop-input">Upload Shop Images</label>
    <input type="file" id="shop-input" multiple accept="image/*">

    <div class="image-grid" id="shop-grid">
        @foreach($shop as $item)
            <div class="image-card">
                <img src="{{ asset($item->image) }}" alt="Ad Image">

                <div class="image-actions">
                    @if($item->status == 1)
                        <button class="btn-toggle active">Active</button>
                    @else
                        <button class="btn-toggle inactive">Inactive</button>
                    @endif

                    <form action="{{ route('ads.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
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
@endpush
