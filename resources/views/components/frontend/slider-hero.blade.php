<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
<style>
    .screen-hero {
        width: 100%;
        height: 100vh;
        background-image: url('images/pages/main-bg.png');
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        box-sizing: border-box;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .screen-hero::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1;
    }

    .screen-hero > * {
        position: relative;
        z-index: 2;
    }

    .hero-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        width: 100%;
        max-width: 1200px;
        align-items: center;
    }

    .first-sec {
        flex: 1 1 400px;
    }

    .first-sec h1 {
        font-size: 3rem;
        color: white;
        margin-bottom: 44px;
    }

    .first-sec p {
        font-weight: 300;
        font-size: 17px;
        line-height: 2;
        margin-bottom: 44px;
    }

    .buttons a {
        text-decoration: none;
        padding: 12px 25px;
        border-radius: 5px;
        margin-right: 10px;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-primary {
        background-color: #c69b6d;
        color: #fff;
        border: none;
        border: 1px solid;
    }

    .btn-primary:hover {
        background-color: #b5895e;
    }

    .buttons .btn{
        width: 40%;
        border-radius: 22px;
        width: 40%;
        font-weight: bold;
        border-radius: 22px;
        font-size: 17px;
    }

    .btn-outline-light {
        border: 2px solid #fff;
        color: #c69b6d;
        background: white;
        border: 1px solid #c69b6d;
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.2);
    }

    .second-sec {
        flex: 1 1 400px;
        position: relative;
        height: 400px;
    }

    .slider img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 230px;
    }

    .slider img.active {
        display: block;
        animation: fade 1s;
    }

    @keyframes fade {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    .pagination {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
    }

    .pagination span {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: 0.3s;
    }

    .pagination span.active {
        background: #c69b6d;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-container {
            flex-direction: column-reverse;
            text-align: center;
            margin-top: 35px;
        }
        .second-sec {
            height: 250px;
            width: 100%;
        }
        .first-sec h1 {
            font-size: 2rem;
        }
    }
</style>
<div class="screen-hero">
    <div class="hero-container">
        <div class="first-sec">
            <h1>{{ __('messagess.slogan') }}</h1>
            <p>{{ __('messagess.about_us') }}</p>
            <div class="buttons">
                <a href="#bookNaw" class="btn btn-primary"><span class="iconify" data-icon="uil:calender" data-width="30" data-height="30"></span> {{ __('messagess.book_now') }}</a>
                <a href="{{route('gift.page')}}" class="btn btn-outline-light"><span class="iconify" data-icon="basil:present-outline" data-width="32" data-height="32"></span> {{ __('messagess.choose_your_gift') }}</a>
            </div>
        </div>
        <div class="second-sec">
            <div class="slider">
                <img src="images/pages/main-bg.png" class="active" alt="">
                <img src="images/pages/main-bg.png" alt="">
                <img src="images/pages/main-bg.png" alt="">
            </div>
            <div class="pagination">
                <span class="active"></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    let currentIndex = 0;
    const slides = $('.slider img');
    const dots = $('.pagination span');
    const slideCount = slides.length;

    function showSlide(index){
        slides.removeClass('active').eq(index).addClass('active');
        dots.removeClass('active').eq(index).addClass('active');
    }

    function nextSlide(){
        currentIndex = (currentIndex + 1) % slideCount;
        showSlide(currentIndex);
    }

    let slideInterval = setInterval(nextSlide, 3000);

    dots.click(function(){
        currentIndex = $(this).index();
        showSlide(currentIndex);
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 3000);
    });
});
</script>