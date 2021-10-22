@extends('layouts.app')


@section('profile')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Profile')}}</div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('create_profile', app()->getLocale()) }}">
                        @csrf 
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 

                        <div class="form-group row">
                            <label for="lastNameProfile" class="col-md-4 col-form-label text-md-right">{{__('Last Name')}}</label>
                            <div class="col-md-6">
                                <input id="lastNameProfile" type="text" class="form-control" name="lastName" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstNameProfile" class="col-md-4 col-form-label text-md-right">{{__('First Name')}}</label>
                            <div class="col-md-6">
                                <input id="firstNameProfile" type="text" class="form-control" name="firstName" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresseProfile" class="col-md-4 col-form-label text-md-right">{{__('Address')}}</label>
                            <div class="col-md-6">
                                <input id="adresseProfile" type="text" class="form-control" name="adress" value="">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="additionalProfile" class="col-md-4 col-form-label text-md-right">{{__('Additional Address')}}</label>
                            <div class="col-md-6">
                                <input id="additionalProfile" type="text" class="form-control" name="additional_address" value="">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="zipProfile" class="col-md-4 col-form-label text-md-right">{{__('ZIP CODE')}}</label>
                            <div class="col-md-6">
                                <input id="zipProfile" type="text" class="form-control" name="zip_code" value="">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="cityProfile" class="col-md-4 col-form-label text-md-right">{{__('Town')}}</label>
                            <div class="col-md-6">
                                <input id="cityProfile" type="text" class="form-control" name="city" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneProfile" class="col-md-4 col-form-label text-md-right">{{__('Phone Number')}}</label>
                            <div class="col-md-6">
                                <input id="phoneProfile" type="tel" class="form-control" name="phone" value="" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('VALIDATE')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


{{-- section changepassword --}}

@section('change-password')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Change Password')}}</div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password', app()->getLocale()) }}">
                        @csrf 
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('Old Password')}}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="old_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('New Password')}}</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('New Confirm Password')}}</label>
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('Update Password')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection