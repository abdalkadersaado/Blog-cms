@extends('layouts.app')
@section('content')

<div class="col-lg-9 col-12">
    <h3 class="text-center">تغيير كلمة المرور</h3>
    <br>
    <br>
        <form action="{{ route('users.update_password') }}" method="POST" id="user_password">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="current_password">Current password</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="password_confirmation">Re Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                </div>
            </div>
        </div>
        </form>
</div>
@endsection
