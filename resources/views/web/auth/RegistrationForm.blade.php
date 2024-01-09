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
                    <h2 style="font-size: 40px;" class="text-white my-4">Spark joy with direct giving!</h2 style="font-size: 40px;">
                    <h2 style="font-size: 30px; margin-top:-22px !important;" class="text-white my-4">Adopt a beneficiary, change a life. Your support matters.</h2 style="font-size: 30px;">
                    <ul class="adopt_list_group">
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Begin by registering on the SPHF platform to create your donor account.</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Our dedicated team will promptly review and approve your donor account, ensuring a seamless connection.</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Once approved, you can easily explore and add beneficiaries to your personalized list.</span>
                        </li>
                        <li class="adopt_list_item">
                            <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Take advantage of the convenience of making direct online donations to your chosen beneficiaries, making a positive impact with just a few clicks.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--<div class="col-md-6">-->
            <!--    <div class="my-5 mx-auto">-->
            <!--        <a href="#" class="video-link">-->
            <!--            <i class="fa fa-play"></i>-->
            <!--            <span></span>-->
            <!--        </a>-->
            <!--        <h2 style="font-size: 40px;" class="text-white my-4">Adopt a beneficiary & directly donate to-->
            <!--            them</h2 style="font-size: 40px;">-->
            <!--        <ul class="adopt_list_group">-->
            <!--            <li class="adopt_list_item">-->
            <!--                <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> First register on the-->
            <!--                    SPHF platform</span>-->
            <!--            </li>-->
            <!--            <li class="adopt_list_item">-->
            <!--                <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Our team will connect-->
            <!--                    & approve your donor account</span>-->
            <!--            </li>-->
            <!--            <li class="adopt_list_item">-->
            <!--                <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span>-->
            <!--                    Soon after, you can explore & add beneficiary to your list</span>-->
            <!--            </li>-->
            <!--            <li class="adopt_list_item">-->
            <!--                <i class="fas fa-check-circle" style="color: #FDBE44;"></i><span> Make direct online-->
            <!--                    donations to your chosen beneficiary</span>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-md-6">
                <div class="bg-white p-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                            {{ Session::get('error')}}
                            </div>
                        @endif
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
                                <input size="40" class="form-control @error('first_name') is-invalid @enderror" required placeholder="First Name" type="text" name="first_name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('last_name') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Last Name" type="text" name="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('email') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Email" type="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('password') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Password" type="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('confirm_password') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Confirm Paswword" type="password" name="confirm_password">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('phone') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Mobile" type="text" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('nationality_no') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="National Identity/ Passport Number" type="text" name="nationality_no">
                                @error('nationality_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('nationality') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Nationality" type="text" name="nationality">
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('address') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Address" type="text" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('city') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="City" type="text" name="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('country') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Country" type="text" name="country">
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('post_code') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Post code" type="text" name="post_code">
                                @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('organiation') is-invalid @enderror" required placeholder="Organization" type="text" name="organiation">
                                @error('organiation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 p-3">
                                <input size="40" class="form-control @error('job_title') is-invalid @enderror" required aria-required="true" aria-invalid="false" placeholder="Job title" type="text" name="job_title">
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 pl-3 py-2 ">
                                <textarea cols="40" rows="10" class="form-control @error('comments') is-invalid @enderror" placeholder="Comments" name="comments"></textarea>
                                @error('comments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <!--<div class="col-sm-6">
                                    <div class="d-flex align-items-start">
                                        <input type="checkbox" id="note" required class="m-2"/>
                                        <label for="note">
                                            Donor consent.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start" >
                                        <input type="checkbox" id="note" required class="m-2"/>
                                        <label for="note">
                                            Donor Undertaking.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start">
                                        <input type="checkbox" id="note" required class="m-2" name="is_anonymously"/>
                                        <label for="note">
                                            Donate anonymously.
                                        </label>
                                    </div>
                                </div>-->
                                <div class="col-sm-12">
                                    <div class="d-flex align-items-start">
                                        <input type="checkbox" id="termsCheckbox" class="m-2" required />
                                        <label for="termsCheckbox">I agree to the <a href="#" id="termsLink" required style="color:#428bca;">Terms and Conditions</a>.</label>
                                    </div>
                                </div>
                                
                            </p>
                            <div class="col-sm-12 col-xs-12 action text-left pl-3 py-2 ">
                                <button type="submit" class="btn btn-danger">Register</button>
                            </div>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <ol>
                    <li>I declare that I do not belong to any negative or harmful organization. I affirm my commitment to ethical and lawful conduct in all interactions related to this donation portal.</li>
                    <li>I understand that the information of beneficiaries within this donation portal is confidential. I commit to not sharing this information with others and acknowledge the importance of respecting privacy.</li>
                    <li>I acknowledge that the collection and use of information will be in accordance with relevant privacy laws and regulations. I understand the organization's commitment to compliance with these laws.</li>
                    <li>I recognize that the information provided is for the sole purpose of facilitating donations and support for beneficiaries through this portal. I agree that the information will be used only for this intended purpose.</li>
                    <li>I understand that any violation of these terms may result in legal action and the termination of my access to the donation portal.</li>
                    <li>I acknowledge that I have read and understood the terms outlined above, and I willingly agree to abide by them in my use of this donation portal.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<script>
    // JavaScript for Modal
    document.getElementById('termsLink').addEventListener('click', function () {
        // Show the terms modal
        $('#termsModal').modal('show');
    });
</script>

</main>
@endsection



