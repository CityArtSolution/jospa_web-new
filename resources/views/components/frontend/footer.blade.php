<style>
/* -------------------------------------- */
/* Global Styles (Standard) */
/* -------------------------------------- */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #f5f5f5;
}

/* -------------------------------------- */
/* Footer Styles (JO | SPA Design) */
/* -------------------------------------- */
.footer-section {
    position: relative;
    background: #4D4541; /* بني داكن */
    color: #fff;
    margin-top: 0;
    padding-top: 150px; /* مسافة من الموجة */
    padding-bottom: 50px;
    text-align: center;
    direction: rtl;
    overflow: hidden;
}

.footer-background-layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('images/footer-bg-spa.jpg') }}'); // change image
    background-size: cover;
    background-position: center;
    z-index: 1;
}
.footer-background-layer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(43, 38, 36, 0.85); /* تظليل داكن أكثر */
}

/* الموجة العلوية */
.footer-curve-top {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 150px;
    overflow: hidden;
    line-height: 0;
    z-index: 5;
    transform: translateY(-99%);
}
.footer-curve-top svg {
    display: block;
    width: 100%;
    height: 150px;
}
.footer-curve-top .shape-fill {
    fill: #f5f5f5; /* لون خلفية الصفحة الرئيسي */
}

.footer-content {
    max-width: 900px; 
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 10;
}

/* **إخفاء العناصر غير المطلوبة في التصميم المركزي** */
.footer-grid {
    display: none; 
}
.subscription-form,
.whatsapp-btn.full-width,
.payment-icons {
    display: none; 
}

.footer-logo-container {
    text-align: center;
    margin: 0 0 40px 0;
}
.footer-logo {
    font-family: 'Playfair Display', serif; 
    font-size: 3rem; 
    font-weight: 400;
    color: #E8D3C4;
    letter-spacing: 15px; 
    margin-bottom: 5px;
}
.footer-logo-exp {
    font-family: 'Almarai', sans-serif; 
    font-size: 1rem;
    color: #E8D3C4;
    font-weight: 300;
    letter-spacing: 2px;
    margin-bottom: 25px;
    opacity: 0.8;
}

.footer-description {
    color: #bbb;
    font-size: 1rem;
    line-height: 1.8;
    margin-bottom: 40px;
    padding: 0 50px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.contact-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.contact-btn {
    display: flex;
    align-items: center;
    padding: 12px 30px;
    background-color: #9F8C6D; /* لون ترابي دافئ */
    color: #fff;
    border: 1px solid #9F8C6D;
    border-radius: 50px;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    min-width: 250px; 
    justify-content: center;
}

.contact-btn:hover {
    background-color: #E8D3C4;
    color: #4D4541;
    border-color: #E8D3C4;
    transform: translateY(-2px);
}

.contact-btn i {
    margin-left: 10px;
    font-size: 1.1rem;
}

/* ستايل أيقونات التواصل الاجتماعي */
.social-icons-main {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 40px;
    margin-top: 40px;
}

.social-icons-main a {
    color: #E8D3C4;
    font-size: 1.1rem;
    border: 1px solid #E8D3C4;
    border-radius: 8px; /* حواف مربعة قليلاً */
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.social-icons-main a:hover {
    background-color: #E8D3C4;
    color: #4D4541;
    transform: scale(1.1);
}

.footer-copyright {
    padding-top: 25px;
    border-top: 1px solid rgba(232, 211, 196, 0.2);
    color: #E8D3C4;
    font-size: 0.9rem;
    text-align: center;
    opacity: 0.7;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-section {
        padding-top: 100px;
    }
    .footer-curve-top {
        height: 100px;
    }
    .footer-curve-top svg {
        height: 100px;
    }
    .footer-logo {
        font-size: 2.2rem;
        letter-spacing: 10px;
    }
    .footer-description {
        padding: 0 10px;
    }
    .contact-buttons {
        gap: 10px;
    }
    .contact-btn {
        min-width: 80%;
        max-width: 300px;
    }
}
</style>

<footer class="footer-section">
    <div class="footer-background-layer"></div>

    <div class="footer-curve-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66 92.83C906.67 72 823.75 51.44 743.84 43.41c-82.5-8.31-182.25 18-219.79 38.48-111 61.15-180.71 131.5-220.19 146.43-30.82 11.85-61.94 22.95-101.41 29.86-75.14 13.56-126.92 23.36-196.53 47.04V0h1200Z" class="shape-fill"></path>
        </svg>
    </div>
    
    <div class="footer-content">
        
        <div class="footer-logo-container">
            <h1 class="footer-logo">JO | SPA</h1>
            <p class="footer-logo-exp">EXPERIENCE RIYADH</p>
        </div>

        <p class="footer-description">
             {{ __('frontend.footer_description') }}
        </p>

        <div class="contact-buttons">
            <a href="tel:0000000000" class="contact-btn">
                <i class="bi bi-telephone-fill"></i> 000 0000 0000
            </a>
            <a href="tel:0000000000" class="contact-btn">
                <i class="bi bi-telephone-fill"></i> 000 0000 0000
            </a>
            <a href="mailto:contact@jospa.com.sa" class="contact-btn">
                <i class="bi bi-envelope-fill"></i> contact@jospa.com.sa
            </a>
        </div>

        <div class="social-icons-main">
            <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
            <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
        

        <div class="footer-copyright">
             &copy; {{ date('Y') }} JO SPA. All rights reserved.
        </div>

    </div>
</footer>

<script>
    // تم إلغاء وظائف الاشتراك القديمة لعدم وجودها في التصميم الجديد
    function subscribeWhatsApp() {
        // يمكن وضع منطق لإرسال رسالة واتساب عامة هنا إذا لزم الأمر.
        // مثال: window.open('https://wa.me/966555666777', '_blank');
        alert('للتواصل السريع، يرجى الضغط على أحد أزرار الهاتف أعلاه.');
    }

    // وظيفة الانضمام محذوفة لعدم وجود حقل إدخال في التصميم الجديد
    function joinOffers() {
        // لا يوجد منطق هنا
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
</script>