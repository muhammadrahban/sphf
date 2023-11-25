@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-3 py-2 pt-4" style="background-color: #f5f5f5; border-radius: 5px;">
                    @include('web.partials.admin_header')
                </div>
                <div class="col-md-9 px-2">
                    <form action="{{route('user.adminupdate')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <select class="form-control" required="">
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('first_name') is-invalid @enderror" required placeholder="First Name" type="text" name="first_name" value="{{auth()->user()->first_name}}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('last_name') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Last Name" type="text" name="last_name" value="{{auth()->user()->last_name}}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('phone') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Mobile" type="text" name="phone" value="{{auth()->user()->phone}}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('nationality_no') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="National Identity/ Passport Number" type="text" name="nationality_no" value="{{auth()->user()->nationality_no}}">
                                @error('nationality_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('nationality') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Nationality" type="text" name="nationality" value="{{auth()->user()->nationality}}">
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('address') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Address" type="text" name="address" value="{{auth()->user()->address}}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('city') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="City" type="text" name="city" value="{{auth()->user()->city}}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('country') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Country" type="text" name="country" value="{{auth()->user()->country}}">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('post_code') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Post code" type="text" name="post_code" value="{{auth()->user()->post_code}}">
                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('organiation') is-invalid @enderror" required placeholder="My organization" type="text" name="organiation" value="{{auth()->user()->organiation}}">
                                @error('organiation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('job_title') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Job title" type="text" name="job_title" value="{{auth()->user()->job_title}}">
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <textarea cols="40" rows="10" class="form-control @error('comments') is-invalid @enderror" required placeholder="Comments" name="comments">{{auth()->user()->comments}}</textarea>
                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="pl-3 py-2 d-flex align-items-start" style="color:red">
                                    <input type="checkbox" id="note" required class="m-2"/>
                                    <label for="note">
                                        Note Additional fields to be added - tick boxes Donor consent,
                                        Donor Undertaking, Donate anonymously. Donate as individual,
                                        Donate&nbsp;as&nbsp;company.
                                    </label>
                                </div>
                            </p>
                            <div class="col-sm-12 col-xs-12 action text-left">
                                <button type="submit" class="btn btn-warning">Update &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection