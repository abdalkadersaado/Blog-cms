<nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.html" class="logo">
                                {{-- <img src="{{ asset('DAR-ALNUZUM1/assets/images/logo.png') }}" style="width: 40%;     min-width: 170px;" class="logo1"> --}}
                                {{-- <img src="{{ asset('DAR-ALNUZUM1/assets/images/Dar Logo 2.png') }}" style="width: 25%; min-width: 127px;" class="logo2"> --}}
                                <img src="/assets/images/Dar Logo.png" style="width: 25%;     min-width: 170px;" class="logo1">
                                 <img src="/assets/images/Dar Logo.png" style="width: 25%; min-width: 127px;" class="logo2">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="drop with--one--item"><a href="{{ route('dar.home') }}">{{ __('Frontend/general.Home') }}</a></li>
                                <li class="nav-item dropdown has-megamenu">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" style="padding: 0;"> {{ __('Frontend/general.Services') }} </a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        @include('dar_al_nuzum.partial.services_header')
                                    <!-- end row -->
                                    </div> <!-- dropdown-mega-menu.// -->
                                </li>

                               <li class="drop with--one--item"><a href="{{ route('blogs') }}">{{ __('Frontend/general.Blogs') }}</a></li>
                               <li class="drop with--one--item"><a href="{{ route('dar.contact') }}">Contact</a></li>
                               <li class=""><a href="{{ route('about.us') }}">About </a></li>
                                @if (config('app.locale') == 'ar')
                                    <li class="lang_link">
                                        <a href="{{ route('change_locale','en') }}">English</a>
                                    </li>

                                @else
                                    <li class="lang_link">
                                        <a href="{{ route('change_locale','ar') }}">Arabic</a>
                                    </li>

                                @endif

                                    {{-- <user-notification></user-notification> --}}
                                <li class="dropdown" >
                                    @guest
                                            <li >
                                                    <div class="main-button-red">
                                                        <div class="" ><a href="{{ route('frontend.show_login_form') }}"  class="whi"
                                                        style="
                                                            padding: 2px 18px;
                                                            font-size: 12px;
                                                            line-height: 34px;
                                                            height: 36px;
                                                            color: #ffffff!important;">
                                                            Sign in</a>
                                                        </div>
                                                    </div>
                                            </li>
                                    @else


                                                    <div class="main-button-red">
                                                        <div class="" >
                                                            <a href="#"
                                                                class="whi"
                                                                style="
                                                                    padding: 2px 18px;
                                                                    font-size: 12px;
                                                                    line-height: 34px;
                                                                    height: 36px;
                                                                    color: #ffffff!important;">
                                                                    <button class="dropbtn">
                                                                            <li class="dropbtn">
                                                                                <span class="drno" style="color: #ffffff!important"  >
                                                                                @if (auth()->user())
                                                                                    {{ auth()->user()->name}}
                                                                                @endif
                                                                            </span>
                                                                            </li>
                                                                        </button>
                                                            </a>

                                                        </div>

                                                    </div>

                                                    <div class="dropdown-content">
                                                                <a href="{{ route('profile') }}" class="drno">Profile</a>
                                                                <a href="{{ route('edit_profile') }}" class="drno">Edit profile</a>
                                                                <a href="{{ route('frontend.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="drno">Sign out</a>
                                                                    <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                            </div>

                                    {{-- <a href="#" >
                                        <button class="dropbtn">
                                            <li class="dropbtn">
                                                <span class="drno"  >
                                                  @if (auth()->user())
                                                    {{ auth()->user()->name}}
                                                 @endif
                                            </span>
                                            </li>
                                        </button>
                                    </a>
                                        <div class="dropdown-content">
                                            <a href="{{ route('profile') }}" class="drno">Profile</a>
                                            <a href="{{ route('edit_profile') }}" class="drno">Edit profile</a>
                                            <a href="{{ route('frontend.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="drno">Sign out</a>
                                                <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div> --}}
                                    @endguest
                                </li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>
