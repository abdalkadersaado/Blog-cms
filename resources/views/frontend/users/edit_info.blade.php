@extends('layouts.app')
@section('content')

    <div class="col-lg-9 col-12">
        <h3>Personal Information</h3>
        <form action="{{ route('users.update_personal_info') }}" name="user_info" id="user_info" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control">
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" class="form-control">
                    @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="receive_email">Receive email</label>
                    <select name="receive_email" class="form-control">
                        <option value="1" {{ old('receive_email', auth()->user()->receive_email) == '1' ? 'selected' : '' }} >Yes</option>
                        <option value="0" {{ old('receive_email', auth()->user()->receive_email) == '0' ? 'selected' : '' }} >No</option>
                    </select>
                    @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" cols="30" rows="10" class="form-control">{{ old('bio', auth()->user()->bio) }}</textarea>
                    @error('bio')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-4">
            @if (auth()->user()->user_image != '')
                <div class="form-group">
                    <img src="{{ asset('assets/users/' . auth()->user()->user_image) }}" class="img-fluid" width="220" alt="{{ auth()->user()->name }}">
                </div >
            @endif
            <div >
                <div class="form-group">
                    <label for="user_image">User image</label>
                    <input type="file" name="user_image" class="custom-file">
                    @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            </div>

        </div>

        <h3>Emirates ID information</h3>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="emirates_id">Emirates ID</label>
                    <input type="file" name="emirates_id"class="form-control">
                    @error('emirates_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

            @if (auth()->user()->emirates_id != '')
                <div class="form-group">
                    <img src="{{ asset('assets/users/emirates_ID/' . auth()->user()->emirates_id) }}" class="img-fluid" width="220" alt="{{ auth()->user()->emirates_id }}">
                </div >
            @endif
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="id_number">ID number</label>
                    <input type="number" name="id_number" value="{{ old('id_number', auth()->user()->id_number) }}" class="form-control">
                    @error('id_number')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="expiry_date">Expiry date</label>
                    <input type="date" name="expiry_date" value="{{ old('expiry_date', auth()->user()->expiry_date) }}" class="form-control">
                    @error('expiry_date')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <br>
        <hr>
        <h3>Passport Information</h3>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="passport_image">A copy of the Passport</label>
                    <input type="file" name="passport_image"  class="form-control">
                    @error('passport_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                 @if (auth()->user()->passport_image != '')
                <div >
                    <img src="{{ asset('assets/users/passport/' . auth()->user()->passport_image) }}" class="img-fluid" width="220" alt="{{ auth()->user()->passport_image }}">
                </div>
                @endif
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="passport_number">Passport's Number</label>
                    <input type="number" name="passport_number" value="{{ old('passport_number', auth()->user()->passport_number) }}" class="form-control">
                    @error('passport_number')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" name="release_date" value="{{ old('release_date', auth()->user()->release_date) }}" class="form-control">
                    @error('release_date')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="expiry_date_passport">Expiry date Passport</label>
                   <input type="date" name="expiry_date_passport" value="{{ old('release_date', auth()->user()->expiry_date_passport) }}" class="form-control">
                    @error('expiry_date_passport')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <button type="submit" name="update_information" class="btn btn-primary">Update information</button>
                </div>
            </div>
        </div>
        </form>


    </div>

    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        @include('partial.frontend.users.sidebar')
    </div>

@endsection
