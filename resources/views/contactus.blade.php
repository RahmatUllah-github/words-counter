@extends('layouts.master')

@section('meta')
    {{-- <meta name="keywords" content="{{ $setting->blogs_page_meta_keywords ?? '' }}" /> --}}
    <meta name="description" content="Got questions or need help with The Words Counter? Contact us now! We're here to assist you with our handy online text analysis tools" />
    <meta property="og:title" content="The Words Counter - Contact Us" />
    <meta property="og:description" content="Got questions or need help with The Words Counter? Contact us now! We're here to assist you with our handy online text analysis tools" />
    <meta property="og:url" content="{{ config('app.url') }}contactus" />
    <meta property="og:image" content="{{ asset('images/logos/thewordscounter-logo.png') }}" />
    <link rel="canonical" href="{{ config('app.url') }}contactus" />
    <link rel="alternate" href="{{ config('app.url') }}" hreflang="en" />

    <title>The Words Counter - Contact Us</title>
@endsection

@section('content')
    <section id="contact" class="contact text-secondary">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h3 class="h3_heading pt-3">Contact</h3>
            <p class="p_para">
                Welcome to The Words Counter! We value your feedback and inquiries.
                If you have any questions, suggestions, or collaboration opportunities,
                please don't hesitate to reach out to us. Our dedicated team is here to assist you.
                Contact us today and let's explore the exciting possibilities together.
            </p>
          </div>

          <div class="row flex-md-row flex-column-reverse">
            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info border-radius-5">
                <div class="address">
                  <i class="fas fa-location-arrow"></i>
                  <h4>Location:</h4>
                  <p>
                    <a target="_blank" href="https://www.google.com/maps/place/Lahore,+Pakistan" class="text-secondary">Lahore, Pakistan</a>
                  </p>
                </div>
                 <div class="email">
                  <i class="fas fa-envelope"></i>
                  <h4>Email:</h4>
                  <p>
                    <a href="mailto:rahmatul368@gmail.com" class="text-secondary">rahmatul368@gmail.com</a>
                  </p>
                </div>
                 <div class="phone">
                  <i class="fas fa-phone"></i>
                  <h4>Call:</h4>
                  <p>
                    <a href="tel:+923469070799" class="text-secondary">+92 346 9070799</a>
                  </p>
                </div>

                <div style="width: 100%"><iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=Canal%20Colony,%20residential,%20Lahore,%20Pakistan+(Rahmat%20Ullah)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">hiking gps</a></iframe></div>
              </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <contact-component></contact-component>
            </div>
          </div>
        </div>
      </section>
@endsection
