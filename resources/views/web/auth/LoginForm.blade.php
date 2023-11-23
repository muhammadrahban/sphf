@extends('web.master')
@section('webcontain')
<main>
    <section class="container my-5" style="position: relative; background-image: url('{{asset('images/adopt-beneficiary-01.jpg')}}'); background-size: cover; background-attachment: fixed;">
        <div class="overlay_adopt"></div>
        <div class="px-3 py-5 row">
            <div class="col-md-6">
                <div class="my-5 mx-auto">
                    <a href="#" class="video-link">
                        <i class="fa fa-play"></i>
                        <span></span>
                    </a>
                    <h2 style="font-size: 40px;" class="text-white my-4">Adopt a beneficiary & directly donate to
                        them</h2 style="font-size: 40px;">
                    <ul class="adopt_list_group">
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> First register on the
                                SPFH platform</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Our team will connect
                                & approve your donor account</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span>
                                Soon after, you can explore & add beneficiary to your list</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Make direct online
                                donations to your chosen beneficiary</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 p-3">
                                <input size="40" class="form-control @error('email') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Email" type="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-sm-12 col-xs-12 action text-left">
                                <button type="submit" class="btn btn-danger">Login</button>
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
