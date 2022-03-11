@extends('layouts.app')
@section('content')

<div class="col-lg-9 col-12">
        <form action="{{ route('users.update_info') }}" name="user_info" id="user_info" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf

        <h3>Company's Information</h3>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="company_name">Company's Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name', auth()->user()->company_name) }}" class="form-control">
                    @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="license_number">license number</label>
                    <input type="number" name="license_number" value="{{ old('license_number', auth()->user()->license_number) }}" class="form-control">
                    @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="Commercial_Register">Commercial Register</label>
                    <input type="text" name="Commercial_Register" value="{{ old('Commercial_Register', auth()->user()->Commercial_Register) }}" class="form-control">
                    @error('Commercial_Register')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <br>
        <hr>
        <h3>Contract Details</h3>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="about_owner_company"> About Owner Company</label>
                    <input type="text" name="about_owner_company" value="{{ old('about_owner_company', auth()->user()->about_owner_company) }}" class="form-control">
                    @error('about_owner_company')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="about_company">About Company</label>
                    <input type="text" name="about_company" value="{{ old('about_company', auth()->user()->about_company) }}" class="form-control">
                    @error('about_company')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="partners_company">Partners Company</label>
                    <input type="text" name="partners_company" value="{{ old('partners_company', auth()->user()->partners_company) }}" class="form-control">
                    @error('partners_company')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="date_contract">Contract's Date</label>
                    <input type="date" name="date_contract" value="{{ old('date_contract', auth()->user()->date_contract) }}" class="form-control">
                    @error('date_contract')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label for="contract_pdf">Contract PDF</label>
                   <input type="file" name="contract_pdf" class="custom-file">
                    @error('contract_pdf')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                @if (auth()->user()->contract_pdf != '')
                <div >
                    <img src="{{ asset('assets/users/contract_pdf/' . auth()->user()->contract_pdf) }}" class="img-fluid" width="220" alt="{{ auth()->user()->name }}">
                </div>
            @endif
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
