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
        <img src="{{ $image ?? asset('images/frontend/card 11.png') }}" alt="{{ $name ?? 'Category' }}">
    </div>
    <div class="cardcontent">
        <h4 class="mt-3 Category_Name">{{ $name ?? 'Category Name' }}</h4>
        <p class="text-muted Category_desc">
            @if(isset($description))
                {{ $description[app()->getLocale()] }}
            @endif
        </p>
    </div>
    <div class="cardbtns">
        @if(isset($category_id))
            <a href="{{ route('frontend.category.details', $category_id) }}" class="btn btn-primary" style="width: 100%;background:#BF9456;">{{ __('messagess.details') }}</a>
        @else
            <a href="#" class="btn btn-outline-light" style="width: 100%;background:#BF9456;">{{ __('messagess.details') }}</a>
        @endif
            <br>
        <a href="#" class="btn btn-outline-light" style="width: 100%;margin-top:10px">{{ __('messagess.bookNow') }}</a>
    </div>
</div>