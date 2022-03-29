<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/register.css">
     <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @toastr_css
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

  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Register</h6>
          <!-- <h2>Online Teaching and Learning Tools</h2> -->
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings" style="display: block;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item"data-aos="fade-up"
              data-aos-duration="1000">
                <div class="down-content bodyk">
                  <div class="title__container" style="    display: flex;
                    align-items: center;
                    height: 78px;">
                      <img src="/assets/images/Dar Logo.png" style="    width: 15%;" class="logo1">
                      <div class="titj">
                        {{-- <h1>Sign in</h1> --}}
                        <p>Sign in with user name and password you already have.<br><span class="if">Or already have account? <a href="register.html" class="redd">Login </a></span></p>
                      </div>
                    </div>
                    <!-- <div class="title__container">

                        <h1>Sign in</h1>
                        <p>Sign in with user name and password you already have.</p>
                    </div> -->
                    <div class="body__container">
                        <div class="left__container">
                            <div class="side__titles">
                              <div class="title__name">
                                    <h3>Company Details</h3>
                                    <!-- <p>Enter & press next</p> -->
                                </div>
                                <div class="title__name">
                                  <h3>Contract Details</h3>
                                  <!-- <p>Enter & press next</p> -->
                              </div>
                              <div class="title__name">
                                  <h3>About Owner</h3>
                                  <!-- <p>Enter & press next</p> -->
                              </div>

                            </div>
                            <div class="progress__bar__container">
                                <ul>
                                    <li class="active" id="icon1">

                                        <ion-icon name="podium-outline"></ion-icon>
                                    </li>
                                    <li id="icon2">
                                      <ion-icon name="document-outline"></ion-icon>

                                    </li>
                                    <li id="icon3">
                                      <ion-icon name="person-outline"></ion-icon>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="right__container">
                            <form action="{{ route('users.complete_user_info',auth()->user()->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                            <fieldset id="form1">
                                <div class="sub__title__container ">
                                    <p>Step 1/3</p>

                                    <h2>Company Details</h2>
                                    <p>Please enter your Company Details.</p>
                                    <div class="formain">
                                                <label for="" class="forml">Company Name</label>
                                                <input type="text" name="company_name" value="{{ old('company_name',auth()->user()->company_name) }}" class="formi">
                                                @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                                                <label for="" class="forml">Trade License Number</label>
                                                <input type="text" name="license_number" value="{{ old('license_number',auth()->user()->license_number) }}"  class="formi">
                                                @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                <label for="" class="forml">Trade License</label>
                                                <input type="file" name="Commercial_Register" value="{{ old('license_number',auth()->user()->Commercial_Register) }}" class="formi" style="padding:0;"  >
                                                @error('Commercial_Register')<span class="text-danger">{{ $message }}</span>@enderror
                                                <label for="" class="forml">MOA</label>
                                                <input type="file" name="MOA" value="{{ old('MOA',auth()->user()->MOA) }}" class="formi" style="padding:0;"  >
                                                @error('MOA')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                </div>
                                <div class="input__container"> <a class="nxt__btn" onclick="nextForm();"> Next</a> </div>
                            </fieldset>
                            <fieldset class="active__form" id="form2">
                                <div class="sub__title__container">
                                    <p>Step 2/3</p>
                                    <h2>Contract Details</h2>
                                    <p>Please enter your Contract Details</p>
                                    <div class="formain">
                                            <label for="" class="forml">Contract Approval Date</label>
                                            <input type="date" name="date_contract" value="{{ old('date_contract',auth()->user()->date_contract) }}"  class="formi">
                                            @error('date_contract')<span class="text-danger">{{ $message }}</span>@enderror
                                            <label for="" class="forml">Contract (Signed Copy)</label>
                                            <input type="file" name="contract_pdf" value="{{ old('contract_pdf',auth()->user()->contract_pdf) }}"  class="formi" style="padding:0;"  >
                                            @error('contract_pdf')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                 </div>
                                <div class="input__container">
                                    <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                                </div>
                            </fieldset>
                            <fieldset class="active__form" id="form3">
                                <div class="sub__title__container">
                                    <p>Step 3/3</p>
                                    <h2>About the Owner</h2>

                                  <div class="partnerrs">
                                        <div id="par" class="partner-form">

                                        <div id="par" class="partner-form">
                                                    <p class="par-tit">Owner Details</p>
                                                    <label for="" class="forml">Passport Number</label>
                                                    <input type="number" name="passport_number" value="{{ old('passport_number',auth()->user()->passport_number) }}"  class="formi">
                                                    @error('passport_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                    <label for="" class="forml">Expiry Date</label>
                                                    <input type="date" name="expiry_date_passport" value="{{ old('expiry_date_passport',auth()->user()->expiry_date_passport) }}" class="formi">
                                                    @error('expiry_date_passport')<span class="text-danger">{{ $message }}</span>@enderror
                                                    <label for="" class="forml">ID Number</label>
                                                    <input type="number" name="id_number" placeholder="" value="{{ old('id_number',auth()->user()->id_number) }}" class="formi">
                                                    @error('id_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                    <label for="" class="forml">Expiry Date</label>
                                                    <input type="date" name="expiry_date" value="{{ old('expiry_date',auth()->user()->expiry_date) }}" class="formi">
                                                    @error('expiry_date')<span class="text-danger">{{ $message }}</span>@enderror
                                                    <label for="" class="forml">visa attachement</label>
                                                    <input type="file" name="emirates_id"  class="formi" value="{{ old('emirates_id',auth()->user()->emirates_id) }}" style="padding:0;"  >
                                                    @error('emirates_id')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                        </div>
                                </div>
                                <div class="input__container">
                                    <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <button class="nxt__btn" id="submitBtn" >Next</button> </div>
                                </div>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">

    <div class="footer">
      <div class="footer-flex">
        <div class="logo"><img src="/assets/images/Dar Logo with white text.png"></div>
        <div class="sections">
          <p class="pold mpo">Explore More </p>
          <a href="index.html">Home</a>
          <a href="index.html">Services</a>
          <a href="index.html">Blogs</a>
          <a href="index.html">Contact Us</a>
        </div>
        <div class="contact">
          <p class="pold">Contact Us </p>
          <div class="vivi">

            <div class="add">
              <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <g filter="url(#filter0_d_53_7908)"> <path d="M14 9C14 15 8 21 8 21C8 21 2 15 2 9C2 7 3.5 3 8 3C12.5 3 14 7 14 9Z" stroke="white" stroke-linejoin="round"/> </g> <g filter="url(#filter1_d_53_7908)"> <circle cx="8" cy="9" r="2" stroke="white" stroke-linejoin="round"/> </g> <defs> <filter id="filter0_d_53_7908" x="0.5" y="2.5" width="15" height="21" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"> <feFlood flood-opacity="0" result="BackgroundImageFix"/> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/> <feOffset dy="1"/> <feGaussianBlur stdDeviation="0.5"/> <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/> <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7908"/> <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7908" result="shape"/> </filter> <filter id="filter1_d_53_7908" x="4.5" y="6.5" width="7" height="7" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"> <feFlood flood-opacity="0" result="BackgroundImageFix"/> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/> <feOffset dy="1"/> <feGaussianBlur stdDeviation="0.5"/> <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/> <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7908"/> <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7908" result="shape"/> </filter> </defs>
              </svg>
               <p class="coni">
                  Office No. 203 Al Mulla Building, AlMuteena P. O. Box: 25256 Dubai, United Arab Emirates
                </p>
            </div>

            <div class="add">

              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_53_7922)">
                <path d="M3 18V6C3 5.44772 3.44772 5 4 5H20C20.5523 5 21 5.44772 21 6V18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" stroke="white" stroke-linejoin="round"/>
                </g>
                <g filter="url(#filter1_d_53_7922)">
                <path d="M3.5 5.5L12 12L20.5 5.5" stroke="white" stroke-linejoin="round"/>
                </g>
                <defs>
                <filter id="filter0_d_53_7922" x="1.5" y="4.5" width="21" height="17" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="1"/>
                <feGaussianBlur stdDeviation="0.5"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7922"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7922" result="shape"/>
                </filter>
                <filter id="filter1_d_53_7922" x="2.19629" y="5.10254" width="19.6074" height="9.39746" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="1"/>
                <feGaussianBlur stdDeviation="0.5"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7922"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7922" result="shape"/>
                </filter>
                </defs>
                </svg>

                             <p class="coni">
                              Tel: +971-4-3964900 <br>
                              Fax: +971-4-3965025
                              </p>
               </div>


            <div class="add">

                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.3332 13.1004V15.6004C17.3341 15.8325 17.2866 16.0622 17.1936 16.2749C17.1006 16.4875 16.9643 16.6784 16.7933 16.8353C16.6222 16.9922 16.4203 17.1116 16.2005 17.186C15.9806 17.2603 15.7477 17.288 15.5165 17.2671C12.9522 16.9884 10.489 16.1122 8.32486 14.7087C6.31139 13.4293 4.60431 11.7222 3.32486 9.70874C1.91651 7.53474 1.04007 5.05957 0.76653 2.48374C0.745705 2.2533 0.773092 2.02104 0.846947 1.80176C0.920801 1.58248 1.03951 1.38098 1.1955 1.21009C1.3515 1.0392 1.54137 0.902664 1.75302 0.809175C1.96468 0.715685 2.19348 0.667291 2.42486 0.667073H4.92486C5.32928 0.663093 5.72136 0.806305 6.028 1.07002C6.33464 1.33373 6.53493 1.69995 6.59153 2.10041C6.69705 2.90046 6.89274 3.68601 7.17486 4.44207C7.28698 4.74034 7.31125 5.0645 7.24478 5.37614C7.17832 5.68778 7.02392 5.97383 6.79986 6.20041L5.74153 7.25874C6.92783 9.34503 8.65524 11.0724 10.7415 12.2587L11.7999 11.2004C12.0264 10.9764 12.3125 10.8219 12.6241 10.7555C12.9358 10.689 13.2599 10.7133 13.5582 10.8254C14.3143 11.1075 15.0998 11.3032 15.8999 11.4087C16.3047 11.4658 16.6744 11.6697 16.9386 11.9817C17.2029 12.2936 17.3433 12.6917 17.3332 13.1004Z" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

               <p class="coni">
                info@daralnuzum.com
                </p>
            </div>


            <div class="add">

              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0003 15.8337C13.222 15.8337 15.8337 13.222 15.8337 10.0003C15.8337 6.77866 13.222 4.16699 10.0003 4.16699C6.77866 4.16699 4.16699 6.77866 4.16699 10.0003C4.16699 13.222 6.77866 15.8337 10.0003 15.8337Z" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 7.5V10L11.25 11.25" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.7584 14.458L13.4667 17.6497C13.4292 18.0652 13.2371 18.4516 12.9286 18.7324C12.62 19.0132 12.2173 19.168 11.8001 19.1664H8.19173C7.77451 19.168 7.37182 19.0132 7.06323 18.7324C6.75465 18.4516 6.56261 18.0652 6.52507 17.6497L6.2334 14.458M6.24173 5.54136L6.5334 2.34969C6.57082 1.93559 6.76167 1.55043 7.06849 1.26982C7.37531 0.989205 7.77594 0.833413 8.19173 0.833022H11.8167C12.234 0.831329 12.6366 0.986187 12.9452 1.267C13.2538 1.54781 13.4459 1.93415 13.4834 2.34969L13.7751 5.54136" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

               <p class="coni">
                Mon - Sat | 9am - 6pm
                </p>
            </div>
          </div>

        </div>
      </div>
      <hr class="zizi">
      <p>© 2022 Dar AlNuzum All Rights Reserved. </p>

    </div>
  </section>

<section id="message">
<button id="myBtn"><img src="/assets/images/message.png"></button>
<div id="myModal" class="modal">


  <div class="modal-contentr">
    <div class="modale-header">
      <span class="close">&times;</span>
      <p class="mes-tit">Leave A Message</p>
    </div>
    <div class="modale-body">
      <p class="sorry">Sorry, we aren't online at the moment. Leave a message and we'll get back to you.
      </p>
      <div class="forn">
        <label for="" class="vui">Name</label>
        <input type="text" class="mes-in">
        <label for="" class="vui">Email</label>
        <input type="email" class="mes-in">
        <label for="" class="vui">Phone Number</label>
        <input type="number" class="mes-in">
        <label for="" class="vui">Message</label>
        <textarea class="mes-in ui"></textarea>

      </div>
      <div class="main-button-redi marb">
        <div class="scroll-to-section"><a href="register.html">Send Message</a></div>
    </div>
    </div>

  </div>

</div>
</section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    @jquery
    @toastr_js
    @toastr_render
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    <script>
      const nxtBtn = document.querySelector('#submitBtn');
const form1 = document.querySelector('#form1');
const form2 = document.querySelector('#form2');
const form3 = document.querySelector('#form3');
const form4 = document.querySelector('#form4');
const form5 = document.querySelector('#form5');


const icon1 = document.querySelector('#icon1');
const icon2 = document.querySelector('#icon2');
const icon3 = document.querySelector('#icon3');
const icon4 = document.querySelector('#icon4');
const icon5 = document.querySelector('#icon5');


var viewId = 1;
function nextForm(){
console.log("hellonext");
viewId=viewId+1;
progressBar();
displayForms();

console.log(viewId);

}

function prevForm(){
console.log("helloprev");
viewId=viewId-1;
console.log(viewId);
progressBar1();
displayForms();
}
function progressBar1(){
if(viewId===1){
icon2.classList.add('active');
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===2){
icon2.classList.add('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===3){
icon3.classList.add('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===4){
icon4.classList.add('active');
icon5.classList.remove('active');
}
if(viewId===5){
icon5.classList.add('active');
nxtBtn.innerHTML = "Submit"
}
if(viewId>5){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');

}
}

function progressBar(){
if(viewId===2){
icon2.classList.add('active');
}
if(viewId===3){
icon3.classList.add('active');
}
if(viewId===4){
icon4.classList.add('active');
}
if(viewId===5){
icon5.classList.add('active');
nxtBtn.innerHTML = "Submit"
}
if(viewId>5){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');

}
}

function displayForms(){

if(viewId>5){
viewId=1;
}

if(viewId ===1){
form1.style.display = 'block';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'none';
form5.style.display = 'none';


}else if(viewId === 2){
form1.style.display = 'none';
form2.style.display = 'block';
form3.style.display = 'none';
form4.style.display = 'none';
form5.style.display = 'none';

}else if(viewId === 3){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'block';
form4.style.display = 'none';
form5.style.display = 'none';
}else if(viewId === 4){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'block';
form5.style.display = 'none';

}else if(viewId === 5){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'none';
form5.style.display = 'block';

}
}

// for slider

var slider = document.querySelector(".slider");
var output = document.querySelector(".output__value");
output.innerHTML = slider.value ;

slider.oninput = function() {
output.innerHTML = this.value ;


}
    </script>
        <script>
          //according to loftblog tut
          $('.nav li:first').addClass('active');

          var showSection = function showSection(section, isAnimate) {
            var
            direction = section.replace(/#/, ''),
            reqSection = $('.section').filter('[data-section="' + direction + '"]'),
            reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
              $('body, html').animate({
                scrollTop: reqSectionPos },
              800);
            } else {
              $('body, html').scrollTop(reqSectionPos);
            }

          };

          var checkSection = function checkSection() {
            $('.section').each(function () {
              var
              $this = $(this),
              topEdge = $this.offset().top - 80,
              bottomEdge = topEdge + $this.height(),
              wScroll = $(window).scrollTop();
              if (topEdge < wScroll && bottomEdge > wScroll) {
                var
                currentId = $this.data('section'),
                reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                reqLink.closest('li').addClass('active').
                siblings().removeClass('active');
              }
            });
          };

          $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
          });

          $(window).scroll(function () {
            checkSection();
          });
      </script>
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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
         <script>
          AOS.init();
        </script>

</body>


  </body>

</html>
