<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Complete Information</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/assets/css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    @toastr_css
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <h6>Complete Information <h6>{{ auth()->user()->name }}</h6></h6>
                <!-- <h2>Online Teaching and Learning Tools</h2> -->
                </div>
            </div>
            </div>
        </section>
         @if (auth()->user()->status_order == '1')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <h3 class="text-center" style="background: rgb(128, 41, 0); color:white">Status Your Order is Under Processing ....</h3>
                    </div>
                </div>
            </div>

        @elseif ( auth()->user()->status_order == '2')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <p class="text-center" style="background: green; color:white">State order : Accepted</p>
                    </div>
                </div>
            </div>
        @endif
        <section class="meetings-page" id="meetings" style="display: block;">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="meeting-single-item">
                        <div class="down-content bodyk">

                            <div class="title__container">
                                <h1>Profile</h1>
                                <p>{{ __('Frontend/general.p_complete_info') }}</p>
                            </div>
                            <div class="body__container">
                                <div class="left__container">
                                    <div class="side__titles">
                                        {{-- <div class="title__name">
                                            <h3>Your name</h3>
                                            <p>Enter & press next</p>
                                        </div> --}}
                                        <div class="title__name">
                                            <h3>Company Details</h3>
                                            <p>Enter & press next</p>
                                        </div>
                                        <div class="title__name">
                                            <h3>Contract Details</h3>
                                            <p>Enter & press next</p>
                                        </div>
                                        <div class="title__name">
                                            <h3>About Owner</h3>
                                            <p>Enter & press next</p>
                                        </div>
                                        <div class="title__name">
                                            <h3>Choose Your Category</h3>
                                            <p>Finaly press submit</p>
                                        </div>
                                    </div>
                                    <div class="progress__bar__container">
                                        <ul>
                                            {{-- <li class="active" id="icon1">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </li> --}}
                                            <li id="icon2">
                                                <ion-icon name="book-outline"></ion-icon>
                                            </li>
                                            <li id="icon3">
                                                <ion-icon name="layers-outline"></ion-icon>
                                            </li>
                                            <li id="icon4">
                                                <ion-icon name="pricetag-outline"></ion-icon>
                                            </li>
                                            <li id="icon5">
                                                <ion-icon name="mail-outline"></ion-icon>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- form right  --}}


                                <div class="right__container">
                                    <form action="{{ route('users.complete_user_info',auth()->user()->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <fieldset id="form1">
                                        <div class="sub__title__container ">
                                            <p>Step 1/5</p>
                                            <div class="formain">
                                            <label for="" class="forml">Username</label>
                                            <input type="text" name="username" placeholder="username" class="formi">
                                            <label for="" class="forml">Password</label>
                                            <input type="text" name="password" placeholder="Your Password" class="formi">
                                            </div>
                                        </div>
                                        <div class="input__container"> <a class="nxt__btn" onclick="nextForm();"> Next</a> </div>
                                    </fieldset> --}}

                                    <fieldset  id="form1">
                                        <div class="sub__title__container">
                                            <p>Step 1/4</p>
                                            <h2>Company Details</h2>
                                            <p>Please enter your Company Details.</p>
                                            <div class="formain">
                                                <label for="" class="forml">Company Name</label>
                                                <input type="text" name="company_name" value="{{ old('company_name',auth()->user()->company_name) }}" class="formi">
                                                @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                                                <label for="" class="forml">Trade License Number</label>
                                                <input type="number" name="license_number" value="{{ old('license_number',auth()->user()->license_number) }}"  class="formi">
                                                @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                                                <label for="" class="forml">Trade License</label>
                                                <input type="file" name="Commercial_Register" value="{{ old('license_number',auth()->user()->Commercial_Register) }}" class="formi" style="padding:0;"  >
                                                @error('Commercial_Register')<span class="text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="input__container">
                                            <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="active__form" id="form2">
                                        <div class="sub__title__container">
                                            <p>Step 2/4/p>
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
                                            <p>Step 3/4</p>
                                            <h2>About the Owner</h2>
                                            <p>Please select number of Owner</p>
                                            <div id="r1">
                                            <div  class="wrapper">
                                            <input type="radio" name="select" id="option-1" checked>
                                            <input type="radio" name="select" id="option-2">
                                            <label for="option-1" class="option option-1">
                                                <div class="dot"></div>
                                                <span>Single Owner</span>
                                                </label>
                                            <label for="option-2" class="option option-2">
                                                <div class="dot"></div>
                                                <span>Partners</span>
                                            </label>
                                            </div>
                                            </div>
                                        <div id="r2">
                                            {{-- <form class="fore12"> --}}
                                            <p>
                                                <input type="radio" id="test1" name="radio-group" checked>
                                                <label for="test1">Two Partner</label>
                                            </p>
                                            <p>
                                                <input type="radio" id="test2" name="radio-group">
                                                <label for="test2">three Partner </label>
                                            </p>
                                            <p>
                                                <input type="radio" id="test3" name="radio-group">
                                                <label for="test3">Four Partner</label>
                                            </p>
                                            {{-- </form> --}}

                                        </div>
                                        <div class="partnerrs">
                                        <div id="par" class="partner-form">
                                            <p class="par-tit">First Partner</p>
                                            <label for="" class="forml">Passport Number</label>
                                            <input type="num" placeholder="" class="formi">
                                            <label for="" class="forml">Expiry Date</label>
                                            <input type="date" class="formi">
                                            <label for="" class="forml">ID Number</label>
                                            <input type="num" placeholder="" class="formi">
                                            <label for="" class="forml">Expiry Date</label>
                                            <input type="date" class="formi">
                                            <label for="" class="forml">visa attachement</label>
                                            <input type="file"  class="formi" style="padding:0;"  >
                                        </div>
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
                                        <div class="input__container">

                                            <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="active__form" id="form4">
                                        <div class="sub__title__container">
                                            <p>Step 4/4</p>
                                            <h2>Choose Your Category</h2>
                                            <select name="user_category_id" id="service" class="formi" style="padding:0;">
                                                <option value="">Choose Service ---</option>
                                                @foreach ($categories as $category )
                                                <option value="{{ $category->id }}" {{ old('user_category_id',auth()->user()->category_id) == $category->id  ? 'selected' : '' }} >{{ $category->name() }}</option>
                                                @endforeach
                                                </select>
                                            @error('user_category_id')<span class="text-danger">{{ $message }}</span>@enderror
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

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
// const form5 = document.querySelector('#form5');


const icon1 = document.querySelector('#icon1');
const icon2 = document.querySelector('#icon2');
const icon3 = document.querySelector('#icon3');
const icon4 = document.querySelector('#icon4');
// const icon5 = document.querySelector('#icon5');


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
nxtBtn.innerHTML = "Submit"
}
if(viewId>4){
icon1.classList.remove('active');
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');

}
}

function progressBar(){
if(viewId===1){
icon1.classList.add('active');
}
if(viewId===2){
icon2.classList.add('active');
}
if(viewId===3){
icon3.classList.add('active');
}
if(viewId===4){
icon4.classList.add('active');
nxtBtn.innerHTML = "Submit"
}
if(viewId>4){
icon1.classList.remove('active');
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');

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
// form5.style.display = 'none';


}else if(viewId === 2){
form1.style.display = 'none';
form2.style.display = 'block';
form3.style.display = 'none';
form4.style.display = 'none';
// form5.style.display = 'none';

}else if(viewId === 3){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'block';
form4.style.display = 'none';
// form5.style.display = 'none';
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
</body>


  </body>

</html>
