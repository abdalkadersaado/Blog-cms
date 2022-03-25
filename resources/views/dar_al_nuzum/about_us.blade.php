<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>About Us</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/ser.css') }}">
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/aboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @toastr_css
  </head>
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
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" >
          <!-- <h6></h6> -->
          <h2>About Us</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings" style="display: block;">

    <div class="aboutus">
      <p class="ser-title ">Who We Are</p>
      <hr class="redi">
      <p class="dar">DAR ALNUZUM Group</p>
      <p class="containn">Dar Alnuzum, Public Accountants was established in 1994 by Mahmoud Juma Assad, a certified public accountant. He formerly served as a director at Saba & Company (Deloitte Touch Ross).

        We have built a reputation of trust and reliability in the local market by providing the best accounting, bookkeeping and financial planning services to small and medium enterprises. Despite having over 20 years of experience in accounting, auditing, assurance and advisory services, we are still eager to grow and add more value to our clients’ business. We have a professional staff with an unwavering commitment to ethics, a desire for accountability, and a bottomless appetite for achievement.


        </p>
        <div class="v-m-con">
          <!-- <div class="v-m" data-aos="fade-right" data-aos-duration="2000">
            <p class="v-mtitle">Mission</p>
            <p class="v-mcon hu">Be recognized as a leading professional services firm in the UAE through developing value-centric, qualitative, timely, and cost-effective services.            </p>
          </div> -->
          <img src="{{ asset('DAR-ALNUZUM1/assets/images/m.png') }}" class="vim">
          <!-- <div class="v-m" data-aos="fade-left" data-aos-duration="2000">
            <p class="v-mtitle">Vision</p>
            <p class="v-mcon">Create a highly regarded brand name and unbeatable workplace in local market and all over the region that will provide professionals from all over the country with opportunities to develop successful careers.

            </p>
          </div> -->
          <img src="{{ asset('DAR-ALNUZUM1/assets/images/v.png') }}" class="vim">
        </div>

    </div>
    <div class="founder">
      <img src="{{ asset('DAR-ALNUZUM1/assets/images/founder1.png') }}" class="img-f" data-aos="zoom-in" data-aos-duration="2000">
      <div class="txt-fon">
        <p class="tit-f">The Founder</p>
        <p class="name-f">Mahmoud Juma Assad</p>
        <hr class="redi fi" style="width: 162px;">
        <p class="con-f">Late Mr. Mahmoud Establish the firm in 1994 and has since then transformed it into one of the best audit and financial consultancy firms in the UAE.
          Mr. Mahmoud served as an Audit Manager at Deloitte Touch Ross (Saba & Co) before the inauguration of Dar Al-Nuzum.
          External Audit, Audit of government entities, Liquidation and insolvency, Company formation, Business valuation, Due diligence reviews, Fraud and forensic audits, Legal Framework in UAE
          PROFESSIONAL AFFILIATIONS
          Member of JACPA, Affiliated member of ASCA</p>
      </div>
    </div>
    <div class="team">
      <p class="tit-f"><span class="slim">  PROFESSIONAL </span>TEAM</p>
      <hr class="redi" style="width: 162px;">
      <p class="con-f" style="    width: 75%;">
        Our Staff Holds High Academic Qualifications, And Have Long And Varied Experience. Our Customers Will Be Able To Benefit From The Expertise Of Our Partners Spread Across The World
      </p>
      <div class="founder">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/moha.png') }}" class="img-f" data-aos="zoom-in" data-aos-duration="2000">
        <div class="txt-fon">
          <!-- <p class="tit-f">The Founder</p> -->
          <p class="name-f">Mohammad Mahmoud Juma </p>
          <p class="sika">Managing Partner & CEO IACPA <br>
            GCC Tax Diploma (PWC)- Tax Agent</p>
          <hr class="redi " style="width: 162px;">
          <p class="con-f">Mr. Mohammed is IASCA and IACPA qualified and an active member of AAA. With over 21 years of post-qualification experience in the UAE, he brings along innovative ideas backed up with hard-work.
            Mohammed is specialized in the field of audit, accounting and management advisory services. Planning and administering the Audit Schedules, delegation and supervision of work, design and implementation of accounting systems and procedures are some of his areas of expertise.</p>
        </div>
      </div>
      <div class="team-grid">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/1.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/2.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/3.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/4.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/5.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/6.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/7.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/8.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('DAR-ALNUZUM1/assets/images/9.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">

    @include('dar_al_nuzum.partial.footer_daralnuzum')
  </section>

    @include('dar_al_nuzum.partial.leave_message')
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


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
        <script>
          AOS.init();
        </script>
</body>


  </body>

</html>
