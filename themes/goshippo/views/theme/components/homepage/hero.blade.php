
@php
    $textColor   = array_key_exists('text_color', $data) && $data['text_color'] ? "color: {$data['text_color']} !important;" : 'color: ;';
    $titleColor  = array_key_exists('title_color', $data) && $data['title_color'] ? "color: {$data['title_color']} !important;" : 'color: ;';
    $buttonColor = array_key_exists('button_text_color', $data) && $data['button_text_color'] ? "color: {$data['button_text_color']} !important;" : 'color: ;';
    $buttonBgColor = array_key_exists('button_bg_color', $data) && $data['button_bg_color'] ? "background-color: {$data['button_bg_color']} !important;" : 'background-color: ;';
@endphp

<!-- banner -->
<section id="banner" aria-label="banner" style="{{ array_key_exists('header_bg', $data) && $data['header_bg'] ? "background-color: {$data['header_bg']} !important;" : 'background-color: #fff;' }}">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="intro">
          <h1 class="heading ff-header" style="{{$titleColor}}" >{{$data['section_title'][app()->getLocale()] ?? ''}}</h1>
          <p class="sub ff-header" style="{{$textColor}}">
            {{$data['section_description'][app()->getLocale()] ?? ''}}
          </p>

          @php
            $button_type = isset($data['section_url']) ? $data['section_url']['type'] : '';
          @endphp
          <div class="actions d-flex align-items-center">
            <form action="{{$data['section_url'][$button_type] ?? ''}}">
              <button type="submit" class="btn btn-primary " style="  color: #7fad34; {{$buttonColor }} {{$buttonBgColor}} ">
                {{$data['section_button'][app()->getLocale()] ?? ''}}
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="wrapper">
          <img
            src="{{ theme_setting_image($section->id,'section_banner') != '' ? theme_setting_image($section->id,'section_banner') : (get_general_setting('website_logo', asset('themes/easyship/assets/img/4.svg'))) }}"
            alt="hero"
          />
        </div>
      </div>
    </div>
  </div>
</section>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Banner & Testimonials</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        #banner {
            background-color: #fff;
            padding: 50px 0;
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease-in-out;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .intro {
            animation: fadeInUp 1s ease-in-out;
            max-width: 50%;
        }
        .wrapper img {
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 1.2s ease-in-out;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn {
            background-color: #7fad34;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        /* Testimonial Section */
        #testimonials {
            background-color: #f9f9f9;
            padding: 50px 0;
            text-align: center;
        }
        .testimonials-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: auto;
        }
        .testimonial {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 280px;
            text-align: center;
        }
        .testimonial img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .testimonial p {
            font-size: 14px;
            color: #555;
        }
        .testimonial h4 {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <section id="banner">
        <div class="container">
            <div class="intro">
                <h1>Why Choose Cargo?</h1>
                <p>Fast & Reliable | Affordable Rates | Global Reach | Secure Shipping</p>
                <button class="btn">Get Started</button>
            </div>
            <div class="wrapper">
                <img src="https://via.placeholder.com/500" alt="Cargo Service">
            </div>
        </div>
    </section>

    <section id="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonials-container">
            <div class="testimonial">
                <img src="https://via.placeholder.com/80" alt="Customer 1">
                <p>"Cargo provided exceptional service! My package arrived on time and in perfect condition."</p>
                <h4>- John Doe</h4>
            </div>
            <div class="testimonial">
                <img src="https://via.placeholder.com/80" alt="Customer 2">
                <p>"Affordable pricing and reliable delivery. Highly recommended for businesses!"</p>
                <h4>- Sarah Lee</h4>
            </div>
            <div class="testimonial">
                <img src="https://via.placeholder.com/80" alt="Customer 3">
                <p>"Fast and secure shipping. Their tracking system is very accurate!"</p>
                <h4>- Michael Smith</h4>
            </div>
            <div class="testimonial">
                <img src="https://via.placeholder.com/80" alt="Customer 4">
                <p>"Excellent customer support and hassle-free delivery process."</p>
                <h4>- Emma Johnson</h4>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const banner = document.getElementById("banner");
            window.addEventListener("scroll", function () {
                if (banner.getBoundingClientRect().top < window.innerHeight - 100) {
                    banner.style.opacity = 1;
                    banner.style.transform = "translateY(0)";
                }
            });
        });
    </script>
</body>
</html>

