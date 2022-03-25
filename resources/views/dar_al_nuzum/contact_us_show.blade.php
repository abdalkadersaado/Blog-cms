<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ __('Frontend/general.Contact_US') }}</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/stylecontact.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/stylecontact.css.map') }}" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additionala CSS Files -->
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>

    @toastr_css
<style>
        .btn_submit
        {
            font-size: 13px;
            color: #fff;
            background-color: #ba0f0f;
            padding: 8px 30px;
            display: inline-block;
            border-radius: 22px;
            font-weight: 500;
            text-transform: uppercase;
            transition: all .3s;
            padding-top: 17px;
        }
        h6{
            font-size: 12px;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

  </head>
  <body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
             @include('dar_al_nuzum.partial.nav_daralnuzum')
          </div>
        </div>
      </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <a class="button" href="#popup1">Get Quote</a>
     @include('dar_al_nuzum.partial.get_quote')
    <div id="contact">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="wrapper">
                <div class="row no-gutters mb-5">
                  <div class="col-md-7">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                      <h3 class="mb-4">{{ __('Frontend/general.Contact_US') }}</h3>
                      <div id="form-message-warning" class="mb-4"></div>
                      <div id="form-message-success" class="mb-4">
                        Your message was sent, thank you!
                      </div>
                      <form
                        action="{{ route('frontend.do_contact') }}"
                        method="POST"
                        {{-- id="contactForm" --}}
                        name="contactForm"
                        class="contactForm"
                      >
                      @csrf
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="name">{{ __('Frontend/general.Full_Name') }}</label>
                              <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                placeholder="Name"
                              />
                              @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="email"
                                >{{ __('Frontend/general.Email') }}</label
                              >
                              <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                placeholder="Email"
                              />
                              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="subject">{{ __('Frontend/general.Subject') }}</label>
                              <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="subject"
                                placeholder="Subject"
                              />
                              @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="email"
                                >{{ __('Frontend/general.Mobile_Number') }}</label
                              >
                              <input
                                type="number"
                                name="mobile"
                                class="form-control"
                                id="mobile"
                                placeholder="Mobile Number"
                              />
                              @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="label" for="message">{{ __('Frontend/general.Message') }}</label>
                              <textarea
                                name="message"
                                class="form-control"
                                id="message"
                                cols="30"
                                rows="4"
                                placeholder="Message"
                              ></textarea>
                              @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              {{-- <input type="submit" value="Send Message" class="btn btn-primary"/> --}}
                              <button type="submit" class="btn btn-primary">{{ __('Frontend/general.send_Message') }}</button>
                              <div class="submitting"></div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-5 d-flex align-items-stretch">
                    <div id="map" ></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text">
                        <p>
                          {{ __('Frontend/general.address_contact') }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text">
                        <p>
                          <a href="tel:+971-4-3964900">TEL: +971-4-3964900</a>
                          <br /><a href=" ">FAX: +971-4-3965025</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text">
                        <p>
                          <a href="mailto:info@daralnuzum.com"
                            >INFO@DARALNUZUM.COM
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="dbox w-100 text-center">
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text">
                        <p>MON - SAT | 9AM - 6PM</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section class="contact-us" id="contact">
      @include('dar_al_nuzum.partial.footer_daralnuzum')
    </section>

    @include('dar_al_nuzum.partial.leave_message')
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('DAR-ALNUZUM1/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/video.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/custom.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/popper.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/jquery.validate.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('message'))
        <script>
            toastr.success("{!! Session::get('message') !!}")
        </script>
    @endif
    @if(Session::has('error'))
       <script>
            toastr.error("{!! Session::get('error') !!}")
        </script>
    @endif
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false&"></script> --}}
  <script>
       // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 25.2739142, lng: 55.3281456 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
   </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&callback=initMap&v=weekly"
      async
    ></script>

    <script src="{{ asset('DAR-ALNUZUM1/assets/js/google-map.js') }}"></script>
    <script src="{{ asset('DAR-ALNUZUM1/assets/js/main.js') }}"></script>

     <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                modal.style.display = "none";
                }
            }
            </script>

  </body>

</html>
