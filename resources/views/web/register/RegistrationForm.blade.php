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
                    <form action="{{route('web.filterWiew')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <select class="form-control" required>
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required placeholder="First Name" value="" type="text" name="First-Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Last Name" value="" type="text" name="Last-Name">
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Email" value="" type="text" name="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Mobile" value="" type="text" name="your-name">
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="National Identity/ Passport Number" value="" type="text" name="p-number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Nationality" value="" type="text" name="Nationality">
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Address" value="" type="text" name="Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="City" value="" type="text" name="City">
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Country" value="" type="text" name="Country">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Post code" value="" type="email" name="Post-code">
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required placeholder="My organization" value="" type="text" name="My-organization">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control" required aria-required="true" aria-invalid="false" placeholder="Job title" value="" type="text" name="your-name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <textarea cols="40" rows="10" class="form-control" required placeholder="Comments" name="Comments"></textarea>
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
                                <button type="submit" class="btn btn-danger">Register</button>
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
