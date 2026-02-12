<div class="content-container">
    <div class="hero-section">
        <div class="background-overlay"></div>
        <div class="text-content">
            <h1 class="hearo">India's Fastest Growing End-to-End Logistics Provider</h1>
            <p>Your trusted partner for seamless business solutions offering intercity express parcels, reverse logistics, same day delivery, next day delivery, instant 30-minute delivery & fulfillment.</p>
            @if(array_key_exists('header_bg', $data) && $data['display'])
                <div id="shipments-tracking" class="tracking-widget">
                    <form class="form" action="{{route('shipments.tracking')}}" method="GET">
                        <p class="tracking-title">{{$data['section_title'][app()->getLocale()] ?? ''}}</p>
                        <p>{{ __('cargo::view.enter_your_tracking_code') }}</p>
                        <input type="text" name="code" placeholder="{{__('cargo::view.example_SH00001')}}">
                        <input type="submit" class="btn-submit" value="{{__('cargo::view.search')}}">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Main Container */
.content-container {
    position: relative;
    width: 100%;
    height: 80vh;
    background: url("{{ asset('assets/log.svg') }}") no-repeat center center/cover;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    text-align: left;
    color: white;
    padding: 50px;
}

/* Background Overlay */
.background-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

/* Text Content */
.text-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    text-align: left;
}

/* Heading */
.hearo {
    font-size: 6rem;
    margin-bottom: 20px;
}

/* Paragraph */
p {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* Tracking Widget */
.tracking-widget {
    background: rgba(255, 255, 255, 0.8);
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: black;
    width: 100%;
    max-width: 600px;
}

.tracking-title {
    font-size: 2rem;
    margin-bottom: 10px;
}

.form p {
    font-size: 1.2rem;
}

input[type="text"] {
    width: 100%;
    padding: 15px;
    font-size: 1.2rem;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
}

.btn-submit {
    background-color: #007bff;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2rem;
    width: 100%;
}

.btn-submit:hover {
    background-color: #0056b3;
}

/* ============================
   RESPONSIVE DESIGN
   ============================ */

/* Large screens (1200px and above) */
@media (min-width: 1200px) {
    .text-content {
        position: absolute;
        top: 180px;
        left: 180px;
        text-align: left;
    }
}

/* Medium screens (992px - 1200px) */
@media (max-width: 1200px) {
    .text-content {
        max-width: 700px;
        left: 100px;
    }
    .hearo {
        font-size: 4.5rem;
    }
    p {
        font-size: 1.4rem;
    }
}

/* Tablets (720px - 992px) */
@media (max-width: 992px) {
    .content-container {
        justify-content: center;
        text-align: center;
    }
    .text-content {
        position: relative;
        max-width: 80%;
        text-align: center;
    }
    .hearo {
        font-size: 4rem;
    }
    p {
        font-size: 1.3rem;
    }
}

/* Small Tablets & Large Phones (480px - 720px) */
@media (max-width: 720px) {
    .text-content {
        max-width: 90%;
    }
    .hearo {
        font-size: 3rem;
    }
    p {
        font-size: 1.2rem;
    }
    .tracking-widget {
        padding: 20px;
    }
}

/* Small Phones (320px - 480px) */
@media (max-width: 480px) {
    .text-content {
        max-width: 95%;
        position: absolute;
        top: 50px; /* Moves content higher */
        left: 50%;
        transform: translateX(-50%); /* Centers content */
        text-align: center;
    }
    .hearo {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    p {
        font-size: 1rem;
        margin-bottom: 15px;
    }
    .tracking-widget {
        padding: 15px;
        margin-top: 20px;
    }
    .btn-submit {
        font-size: 1rem;
    }
}


/* Extra Small Phones (0px - 320px) */
@media (max-width: 320px) {
    .hearo {
        font-size: 2rem;
    }
    p {
        font-size: 0.9rem;
    }
    .tracking-widget {
        padding: 10px;
    }
    .btn-submit {
        font-size: 0.9rem;
    }
}

</style>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logo Carousel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h2 {
            padding-top: 40px;
            font-size: 24px;
            margin-bottom: 90px;
        }
        .swiper-container {
            width: 80%;
            padding-top: 40px;
            margin: auto;
            overflow: hidden;
            margin-bottom: 60px;

        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-slide img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <h2>100,000+ Retailers solved shipping with Easyship</h2>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://cdn.prod.website-files.com/660e658c0cfb31720d893396/668bdaf05542ac899a5c1352_Layer%202.svg" alt="Logo 1"></div>
            <div class="swiper-slide"><img src="https://cdn.prod.website-files.com/660e658c0cfb31720d893396/668bdae1410ce6d4d54570b7_sunglass%20hut.svg" alt="Logo 2"></div>
            <div class="swiper-slide"><img src="https://cdn.prod.website-files.com/660e658c0cfb31720d893396/668bdaab0d6a8deedc77d73d_ebay.svg" alt="Logo 3"></div>
            <div class="swiper-slide"><img src="https://cdn.prod.website-files.com/660e658c0cfb31720d893396/66a9340e1605ced8fc1169b2_American%20Express%20(1).svg" alt="Logo 4"></div>
            <div class="swiper-slide"><img src="https://cdn.prod.website-files.com/660e658c0cfb31720d893396/668bdad01ca199ac26a1b4e1_Luxottica.svg" alt="Logo 5"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.swiper-container', {
            slidesPerView: 3, // Number of logos visible at once
            spaceBetween: 20, // Spacing between logos
            loop: true,
            autoplay: {
                delay: 2000, // 2-second delay
                disableOnInteraction: false
            }
        });
    </script>

</body>
</html>

<h2 style="font-size: 45px">Ship in 4 simple steps</h2>
<p>Our online shipping platform is easy to use. Here is all you need to do -</p>

    <div class="container text-center">
       
        
        <div class="row mt-5 step-container">
            <div class="col-md-3 step">
                <img src="https://itl-website-aws.s3.ap-south-1.amazonaws.com/manage/assets/images/shipping-easy-step01.png" alt="Step 1">
                <h5>Set up your e-commerce store</h5>
                <p>(WordPress, OpenCart, Magento, Shopify, etc.)</p>
            </div>
            <div class="col-md-3 step">
                <img src="https://itl-website-aws.s3.ap-south-1.amazonaws.com/manage/assets/images/shipping-easy-step02.png" alt="Step 2">
                <h5>Connect your website with iThink API</h5>
                <p>(Select your preferred courier from the list of fast, reliable, and affordable courier companies)</p>
            </div>
            <div class="col-md-3 step">
                <img src="https://itl-website-aws.s3.ap-south-1.amazonaws.com/manage/assets/images/shipping-easy-step03.png" alt="Step 3">
                <h5>Get ready to start shipping</h5>
                <p>(Set up your products for shipment)</p>
            </div>
            <div class="col-md-3 step">
                <img src="https://itl-website-aws.s3.ap-south-1.amazonaws.com/manage/assets/images/shipping-easy-step04.png" alt="Step 4">
                <h5>Get real-time data</h5>
                <p>(With AI-driven technology, get real-time updates and ship easily)</p>
            </div>
        </div>
    </div>




<section class="why-nimbuspost">
    <div class="container">
      
        <h1 class="section-description">
            Offering quality products isn’t enough to succeed in business. To stay ahead of the competition, you need an automated shipping platform that delivers efficiency and reliability.
        </h1>
    </div>

    <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-md-6">
                <h1 class="custom-heading">Grow Your E-commerce Business and Maximize Profits</h1>
                <ul class="custom-list">
                    <li>Quick COD Remittance & Dedicated Support</li>
                </ul>

                <h1 class="custom-heading">Revolutionized Shipping Experience</h1>
                <ul class="custom-list">
                    <li>Industry-Leading Smart Shipping Automation</li>
                    <li>Enhanced Post-Shipment Tracking & Experience</li>
                </ul>
            </div>

            <!-- Right Content - Image Carousel (Auto-Slide, No Buttons) -->
            <div class="col-md-6">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://ship.nimbuspost.com/assets/signup/img/creat-banner2.png" class="d-block w-100 rounded" style="aspect-ratio: 9/7;" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://ship.nimbuspost.com/assets/signup/img/creat-banner1.png" class="d-block w-100 rounded" style="aspect-ratio: 9/7;" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://ship.nimbuspost.com/assets/signup/img/creat-banner3.png" class="d-block w-100 rounded" style="aspect-ratio: 9/7;" alt="Slide 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExample'), {
        interval: 3000, // 3 seconds per slide
        wrap: true
    });
</script>

<style>
    .why-nimbuspost {
        background-color: #f8f9fa; /* Light background */
        padding: 50px 20px;
        text-align: center;
    }

    .section-heading {
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #000;
        align-items: center;
        padding-left: 50px;
    }

    .section-description {
        font-size: 28px;
        color: #333;
        max-width: 800px;
        margin: 0 auto 30px;
    }

    .custom-heading {
        font-size: 2.8rem; /* Adjust size as needed */
        font-weight: bold;
        color: #000;
        margin-bottom: 20px;
    }

    .custom-list {
        font-size: 1.5rem; /* Adjust size as needed */
        margin-left: 20px;
        text-align: left;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .custom-heading {
            font-size: 2.4rem;
        }

        .custom-list {
            font-size: 1.4rem;
        }
    }
</style>






<style>
    .technology-section {
        text-align: center;
        padding: 50px 20px;
        background-color: #fff;
    }

    .tech-title {
        font-size: 48px;
        font-weight: bold;
        color: #222;
        margin-bottom: 20px;
    }

    .tech-description {
        font-size: 20px;
        color: #555;
        max-width: 800px;
        margin: 0 auto 30px auto;
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .tech-item {
        background: #F7F7F7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .tech-item h4 {
        font-size: 22px;
        font-weight: bold;
        color: #D70040;
        margin-bottom: 10px;
    }

    .tech-item p {
        font-size: 16px;
        color: #444;
    }
</style>

<div class="technology-section">
    <h1 class="tech-title">Leverage Technology That’s Light Years Ahead</h1>
    <p class="tech-description">
        Revolutionize your customers’ shopping experience and stay ahead of the competitors with our automated logistics solutions.
    </p>

    <div class="tech-grid">
        <div class="tech-item">
            <h4>AI-enabled Courier Recommendation Engine</h4>
            <p>Allocate the best delivery partner for each shipment</p>
        </div>
        <div class="tech-item">
            <h4>Power-packed Dashboard</h4>
            <p>Access & manage everything on a single dashboard</p>
        </div>
        <div class="tech-item">
            <h4>Automated Order Confirmation</h4>
            <p>Confirm orders via automated IVR calls & WhatsApp</p>
        </div>
        <div class="tech-item">
            <h4>Real-time Shipment Tracking</h4>
            <p>Get the latest shipment status over SMS, email, and WhatsApp</p>
        </div>
        <div class="tech-item">
            <h4>Fraud Detection</h4>
            <p>AI-enabled fraud detection to save on RTO</p>
        </div>
        <div class="tech-item">
            <h4>Advanced NDR Panel</h4>
            <p>Process RTO-marked shipments in real-time</p>
        </div>
    </div>
</div>



<style>
    .channel-section {
        text-align: center;
        padding: 50px 20px;
    }

    .channel-title {
        font-size: 48px;
        font-weight: bold;
        color: #222;
        margin-bottom: 20px;
    }

    .channel-description {
        font-size: 20px;
        color: #555;
        max-width: 800px;
        margin: 0 auto 30px auto;
    }

    .channel-image {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="channel-section">
    <h1 class="channel-title">Channel Integrations</h1>
    <p class="channel-description">
        We’ve brought together India’s top eCommerce sales channels, marketplaces, and courier companies on a single platform.  
        Easily integrate your online store with the NimbusPost panel to ship your orders fast like a rocket.
    </p>
    <img src="https://itl-website-aws.s3.ap-south-1.amazonaws.com/manage/assets/images/home-page-sales-process-img.png" class="channel-image" alt="Channel Integrations">
</div>


<style>
    .business-benefits {
        text-align: center;
        padding: 50px 20px;
        background-color: #F7F7F7;
    }

    .benefits-title {
        font-size: 48px;
        font-weight: bold;
        color: #222;
        margin-bottom: 20px;
    }

    .benefits-description {
        font-size: 20px;
        color: #555;
        max-width: 800px;
        margin: 0 auto 30px auto;
    }

    .benefit-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .benefit-item {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .benefit-item h4 {
        font-size: 22px;
        font-weight: bold;
        color: #D70040;
        margin-bottom: 10px;
    }

    .benefit-item p {
        font-size: 16px;
        color: #444;
    }
</style>

<div class="business-benefits">
    <h1 class="benefits-title">Business Benefits</h1>
    <p class="benefits-description">
        Scale your eCommerce business seamlessly—no more missed sales, limited reach, or slow deliveries.  
        Grow faster with optimized logistics, reduced costs, and uninterrupted cash flow.
    </p>

    <div class="benefit-grid">
        <div class="benefit-item">
            <h4>Lowest Shipping Cost</h4>
            <p>Start shipping eCommerce orders at just ₹21/500gm</p>
        </div>
        <div class="benefit-item">
            <h4>Multiple Courier Services</h4>
            <p>Expand your reach with 27+ courier partners</p>
        </div>
        <div class="benefit-item">
            <h4>Widest Pin Code Network</h4>
            <p>Deliver orders across 29,000+ pin codes</p>
        </div>
        <div class="benefit-item">
            <h4>Swift Shipping</h4>
            <p>Fastest first-mile and last-mile pickup & delivery</p>
        </div>
        <div class="benefit-item">
            <h4>30% Lower RTO</h4>
            <p>Reduce return losses and boost profits</p>
        </div>
        <div class="benefit-item">
            <h4>One-day COD Remittance</h4>
            <p>Get early COD payments for better cash flow</p>
        </div>
        <div class="benefit-item">
            <h4>Enhanced Post-shipment Experience</h4>
            <p>Automated tracking updates for customer satisfaction</p>
        </div>
        <div class="benefit-item">
            <h4>Branded Tracking Page</h4>
            <p>Engage customers even after purchase</p>
        </div>
        <div class="benefit-item">
            <h4>24x7 Support</h4>
            <p>Enjoy uninterrupted eCommerce shipping assistance</p>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <img src="{{ asset('assets/hi.svg') }}" alt="Full Width Image" class="full-width-image">
</div>
<style>
    .full-width-image {
        width: 100%;
        height: auto;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .testimonial-section {
            background-color: #F7F7F7;
            padding: 60px 20px;
            text-align: center;
        }

        .testimonial-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .testimonial-name {
            font-size: 20px;
            font-weight: bold;
            color: #D70040;
            margin-top: 10px;
        }

        .testimonial-role {
            font-size: 16px;
            color: #555;
            font-weight: 500;
        }

        .testimonial-text {
            font-size: 16px;
            color: #444;
            margin-top: 15px;
        }
    </style>
</head>
<body>


    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>India Service Coverage</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
    font-size: 35px;
    margin-bottom: 20px;
    
    
    
}
   .service {
    font-size: 35px;
    margin-bottom: 20px;
    top: 20px;  /* Adjust vertical position */
    left: 20px; /* Moves heading to the left corner */
    text-align: left;
    padding-left: 70px;
    padding-top: 50px;
   }

        /* Styles for the GIF under the heading */
        .gif-container {
            margin-top: 20px;
        }
        .gif-container img {
            width: 100%;
            max-width: 600px; /* Adjust maximum size */
            height: auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h2 {
                font-size: 20px; /* Smaller heading on mobile */
                
            }
        }
    </style>
</head>


<body>

    <h1 class="service">Our Service Coverage</h1>

    <!-- GIF Section -->
    <div class="gif-container">
        <img src="assets/ind.gif" alt="Service Coverage GIF">
    </div>

</body>
</html>

<div class=" testimonial-section" style=" margin-top: 50px; position: relative; width: 100%; height: 50vh; background: url('{{ asset('assets/hy.svg') }}') no-repeat center center; background-size: cover;">
    <div style="display: flex; justify-content: flex-end; align-items: center; padding: 30px; height: 100%;">
        <div style="max-width: 800px; background: rgba(255, 255, 255, 0.9); padding: 30px; border-radius: 12px;">
            <h2 class="mb-4 fw-bold" style="font-size: 40px; color: #222; text-align: center;">Happy Client Says About Us</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="testimonial-card mx-auto" style="font-size: 20px;">
                            <p class="testimonial-text">"ZixCommerce transformed our business with its seamless logistics solutions. Now, our deliveries are faster and more efficient!"</p>
                            <p class="testimonial-name" style="font-weight: bold;">Rahul Sharma</p>
                            <p class="testimonial-role">Founder, FashionKart</p>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto" style="font-size: 20px;">
                            <p class="testimonial-text">"The AI-powered courier recommendation has saved us time and money. Our order fulfillment is now hassle-free."</p>
                            <p class="testimonial-name" style="font-weight: bold;">Priya Mehta</p>
                            <p class="testimonial-role">CEO, HomeStyle Decor</p>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto" style="font-size: 20px;">
                            <p class="testimonial-text">"NimbusPost's integration with multiple couriers gave us the flexibility we needed. Highly recommended for eCommerce!"</p>
                            <p class="testimonial-name" style="font-weight: bold;">Amit Verma</p>
                            <p class="testimonial-role">Co-founder, TechTrendy</p>
                        </div>
                    </div>
                    <!-- Testimonial 4 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto" style="font-size: 20px;">
                            <p class="testimonial-text">"Ever since we started using ZixCommerce, our RTO rates have dropped significantly. This is a game-changer for our industry!"</p>
                            <p class="testimonial-name" style="font-weight: bold;">Sneha Kapoor</p>
                            <p class="testimonial-role">Owner, EthnicWears</p>
                        </div>
                    </div>
                    <!-- Testimonial 5 -->
                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto" style="font-size: 20px;">
                            <p class="testimonial-text">"The branded tracking page has enhanced our customer experience. More transparency means more happy customers!"</p>
                            <p class="testimonial-name" style="font-weight: bold;">Vikram Iyer</p>
                            <p class="testimonial-role">Director, GadgetHub</p>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" >
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #D70040; border-radius: 5px; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" >
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #D70040; border-radius: 5px; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;"></span>
                </button>
            </div>
        </div>
    </div>
</div>



<section class="container">
    <!-- FAQ Section -->
    <div class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(0)">
                <h3>What is your delivery time?</h3>
            </div>
            <div class="faq-answer" id="answer-0">
                <p>Our delivery times vary depending on the service chosen. For express deliveries, we offer same-day or next-day delivery options, and for hyperlocal services, deliveries can be completed within 10 to 45 minutes.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(1)">
                <h3>What courier partners are available on your platform?
                </h3>
            </div>
            <div class="faq-answer" id="answer-1">
                <p>We partner with 27+ top courier services in India, offering seamless intercity and hyperlocal deliveries with extensive pin code coverage.</p>
            </div>
        </div>

        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(2)">
                <h3>Do you offer returns and reverse logistics?</h3>
            </div>
            <div class="faq-answer" id="answer-2">
                <p>Yes, we provide efficient reverse logistics services. You can easily handle returns with doorstep quality checks and instant refunds for D2C businesses and more.</p>
            </div>
        </div>

        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(3)">
                <h3>What is COD remittance, and how fast is it?
                </h3>
            </div>
            <div class="faq-answer" id="answer-3">
                <p>COD remittance is the process of transferring your collected cash-on-delivery (COD) payments. With NimbusPost, you receive your COD payments within one day.</p>
            </div>
        </div>


        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(4)">
                <h3>Can I integrate my eCommerce store with NimbusPost?
                </h3>
            </div>
            <div class="faq-answer" id="answer-4">
                <p>Yes! We support seamless integrations with India’s leading marketplaces and eCommerce platforms, ensuring easy shipping management.</p>
            </div>
        </div>


        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(5)">
                <h3>Do you provide support for bulk shipments?
                </h3>
            </div>
            <div class="faq-answer" id="answer-5">
                <p>Absolutely! We specialize in handling bulk shipments efficiently, ensuring timely deliveries with competitive pricing and high-speed processing.</p>
            </div>
        </div>


        <!-- Add more FAQ items as needed -->
    </div>

    <!-- Contact Form Section -->
    <div class="contact-form">
        <h2 class="contact-title">Contact Us</h2>
        <form id="contact-form" onsubmit="return validateForm()">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required>
            
            <label for="contact-number">Contact Number:</label>
            <input type="tel" id="contact-number" name="contact-number" required pattern="^\+?\d{10,15}$" placeholder="Enter phone number">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="company-name">Company Name:</label>
            <input type="text" id="company-name" name="company-name" required>

            <label for="company-website">Company Website:</label>
            <input type="url" id="company-website" name="company-website" required>

            <button type="submit">Submit</button>
        </form>
        <div id="form-message"></div>
    </div>
</section>


<style>
 /* Container for both FAQ and Contact Form */
.container {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    padding: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* FAQ Section Styling */
.faq-section {
    width: 50%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.faq-title {
    text-align: center;
    font-size: 28px;
    color: #D70040;
    margin-bottom: 30px;
    font-weight: bold;
}

.faq-item {
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    overflow: hidden;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.faq-item:hover {
    border-color: #D70040;
}

.faq-question {
    background-color: #D70040;
    padding: 15px;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.faq-answer {
    padding: 15px;
    background-color: #fff;
    color: #666;
    font-size: 16px;
    line-height: 1.6;
    display: none;
}

.faq-item:hover .faq-question {
    background-color: #B60035;
}

/* Contact Form Styling */
.contact-form {
    width: 40%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.contact-title {
    font-size: 28px;
    color: #D70040;
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
}

.contact-form label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

.contact-form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
}

.contact-form button {
    background-color: #D70040;
    color: #fff;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
}

.contact-form button:hover {
    background-color: #B60035;
}

/* Form Validation Message */
#form-message {
    font-size: 14px;
    color: red;
    margin-top: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
        align-items: center;
    }

    .faq-section, .contact-form {
        width: 100%;
    }
}

</style>

<script>
function toggleAnswer(index) {
    var allAnswers = document.querySelectorAll('.faq-answer');
    
    // Loop through all answers and hide them
    allAnswers.forEach(function(answer, i) {
        if (i !== index) {
            answer.style.display = "none"; // Hide all answers except the clicked one
        }
    });

    // Toggle the current answer
    var currentAnswer = document.getElementById('answer-' + index);
    if (currentAnswer.style.display === "block") {
        currentAnswer.style.display = "none"; // Close the clicked answer if it was open
    } else {
        currentAnswer.style.display = "block"; // Open the clicked answer
    }
}

// Form Validation
function validateForm() {
    var form = document.getElementById('contact-form');
    var fullName = document.getElementById('full-name').value;
    var contactNumber = document.getElementById('contact-number').value;
    var email = document.getElementById('email').value;
    var companyName = document.getElementById('company-name').value;
    var companyWebsite = document.getElementById('company-website').value;

    var message = document.getElementById('form-message');
    message.innerHTML = ''; // Clear previous error messages

    if (!fullName || !contactNumber || !email || !companyName || !companyWebsite) {
        message.innerHTML = 'All fields are required!';
        return false; // Prevent form submission
    }

    // Validate contact number using a regex pattern for phone numbers
    var phonePattern = /^\+?\d{10,15}$/;
    if (!phonePattern.test(contactNumber)) {
        message.innerHTML = 'Please enter a valid contact number!';
        return false;
    }

    // Validate email format
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        message.innerHTML = 'Please enter a valid email address!';
        return false;
    }

    return true; // Form is valid, proceed with submission
}



</script>

 














   
    













