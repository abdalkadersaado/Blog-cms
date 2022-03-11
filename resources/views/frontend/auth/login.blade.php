@extends('layouts.app-auth')

@section('content')
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Login</h3>
                        <form action="{{ route('frontend.login') }}" method="POST">
                        @csrf
                        <div class="account__form">
                            <div class="input__box">
                                <label for="username">Username *</label>
                                <input type="text" name="username" value="{{ old('username') }}">
                                @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="input__box">
                                <label for="password">Password *</label>
                                <input type="password" name="password">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form__btn">
                                <button type="submit" name="Login">Login</button>
                                <label class="label-for-checkbox">
                                    <input class="input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <a class="forget_pass" href="{{ route('password.request') }}">Lost your password?</a>

                            <div class="form__btn">
                                <a href="{{ route('frontend.social_login', 'facebook') }}" class="btn btn-block" style="background-color: #1877F2; color: #ffffff;">Login with Facebook</a>
                                <a href="{{ route('frontend.social_login', 'twitter') }}" class="btn btn-block" style="background-color: #1DA1F2; color: #ffffff;">Login with Twitter</a>
                                <a href="{{ route('frontend.social_login', 'google') }}" class="btn btn-block">Login with Google</a>
                            </div>



                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
