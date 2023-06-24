@extends('layouts.master')

@section('content')
    <section id="contact" class="contact">
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
              <div class="info">
                <div class="address">
                  <i class="fas fa-location-arrow"></i>
                  <h4>Location:</h4>
                  <p>Software Company Lahore, Pakistan</p>
                </div>
                 <div class="email">
                  <i class="fas fa-envelope"></i>
                  <h4>Email:</h4>
                  <p>rahmatul368@gmail.com</p>
                </div>
                 <div class="phone">
                  <i class="fas fa-phone"></i>
                  <h4>Call:</h4>
                  <p>+92 346 9070799</p>
                </div>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="240px" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=Software Company Liberty Market Gulberg III, Lahore, Punjab 54000&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <contact-component></contact-component>
            </div>
          </div>
        </div>
      </section>
@endsection
