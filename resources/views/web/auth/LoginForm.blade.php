@extends('web.master')
@section('webcontain')
<main>
    <section class="container my-5" style="position: relative; background-image: url('{{asset('images/adopt-beneficiary-01.jpg')}}'); background-size: cover; background-attachment: fixed;">
        <div class="overlay_adopt"></div>
        <div class="px-3 py-5 row">
            <div class="col-md-7">
                <div class="my-5 mx-auto">
                    <a href="#" class="video-link">
                        <i class="fa fa-play"></i>
                        <span></span>
                    </a>
                   <h2 style="font-size: 40px;" class="text-white my-4">Spark joy with direct giving!</h2 style="font-size: 40px;">
                    <h2 style="font-size: 20px; margin-top:-22px !important;" class="text-white my-4">Adopt a beneficiary, change a life. Your support matters.</h2 style="font-size: 30px;">
                    <ul class="adopt_list_group">
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Register on SPHF platform to create your donor account</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Our team will promptly review and approve your donor account</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Then you can explore & add beneficiaries to your personalized list</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Make direct online donations to your chosen beneficiary</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 my-5 mx-auto">
                <div class="bg-white p-4 my-5 mx-auto">
                    <div class=" col-md-12 col-sm-12 col-xs-12 text-center">
                <img  src="{{asset('images/SPHF-donor-logo.png')}}" alt="SPHF-donor-logo" width="150">
                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row text-center">
                            <div class="col-md-12 col-sm-12 col-xs-12 p-3">
                                <input size="40" class="form-control @error('email') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Email" type="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12 col-sm-12 col-xs-12 p-3">
                                <input size="40" class="form-control @error('password') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Password" type="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 action text-center">
                                <button type="submit" class="btn btn-danger">Login</button>
                                <a href="/sphf/public/doner/register" style="color:red">Register</a>
                            </div>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
