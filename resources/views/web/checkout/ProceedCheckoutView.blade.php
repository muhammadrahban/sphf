@extends('web.master')
@section('webcontain')
<main>
    <style>
        h5[aria-expanded] .fa {
            display: none;
        }

        h5[aria-expanded="true"] .fa-minus {
            color: #FDBE44;
            display: block !important;
        }

        h5[aria-expanded="false"] .fa-plus {
            display: block !important;
        }

        .accordion div+div {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
    <section
        style="background-image: url('{{asset('images/Your-Benificiary-List-banner.jpg')}}'); background-size:cover;">
        <div class="container py-5">
            <h1 class="my-5 text-white text-center text-lg-left">Checkout</h1>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <!-- <h2>Payment Detail</h2> -->
                    <h2 class="title-link">
                        Payment Detail
                        <span></span>
                    </h2>
                    <div class="bg-white p-3">
                        <form action="{{route('web.SubmitPaymentDetail')}}" method="post">
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
                                    <input size="40" class="form-control" required="" placeholder="First Name"
                                        value="" type="text" name="First-Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Last Name" value="" type="text"
                                        name="Last-Name">
                                </div>
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Email" value="" type="text" name="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Mobile" value="" type="text"
                                        name="your-name">
                                </div>
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="National Identity/ Passport Number"
                                        value="" type="text" name="p-number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Nationality" value="" type="text"
                                        name="Nationality">
                                </div>
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Address" value="" type="text"
                                        name="Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="City" value="" type="text" name="City">
                                </div>
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Country" value="" type="text"
                                        name="Country">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Post code" value="" type="email"
                                        name="Post-code">
                                </div>
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" placeholder="My organization"
                                        value="" type="text" name="My-organization">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 p-3">
                                    <input size="40" class="form-control" required="" aria-required="true"
                                        aria-invalid="false" placeholder="Job title" value="" type="text"
                                        name="your-name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <textarea cols="40" rows="10" class="form-control" required=""
                                        placeholder="Comments" name="Comments"></textarea>
                                </div>
                                <p class="pl-3 py-2" style="color:red">Note Additional fields to be added - tick
                                    boxes Donor consent,
                                    Donor Undertaking, Donate anonymously. Donate as individual,
                                    Donate&nbsp;as&nbsp;company.</p>
                                <div class="col-sm-12 col-xs-12 action text-left">
                                    <button type="submit" class="btn btn-warning">Select Payment Method &nbsp;&nbsp;
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                                </div>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="py-5 px-3">
                        <div class="d-flex border-rounded p-4" style="background-color: #e1e1e1;">
                            <i class="fa fa-exclamation-circle mx-3" style="font-size: 50px;" aria-hidden="true"></i>
                            <p style="font-size: 25px;font-weight: 200;">
                                This form is prefilled using the information you provided at time of registeration.
                                You can edit the slected information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
