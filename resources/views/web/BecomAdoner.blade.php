@extends('web.master')
@section('webcontain')
<main>
    <section style="background-image: url({{asset('images/shape-8.png')}}); background-size:auto 100%;">
        <div class="container py-5">
            <h1 class="mb-5">Transfer your donation to SPHF</h1>
            <form class="card mb-5" id="multi-step-form">
                <div class="step" data-step="1">
                    <div class="py-4 px-0">
                        <ul>
                            <li>Add the amount you want to donate.</li>
                            <li>Add donor’s basic detail, select payment mode and make online payment.</li>
                            <li>You can also choose offline payment option.</li>
                            <li>Your donation will be transferred securely to SPHF, and SPHF will be assigned to disburse your funds to flood-affected beneficiaries in Sindh.</li>
                            <li>Once you submit donation, you’ll receive e-receipt on e-mail.</li>
                            <li>You can also login to your donor account to view and track your donation.</li>
                        </ul>
                        <h4 class="ml-4">Let’s begin giving joy.</h4>
                    </div>
                    <img class="w-100" src="{{asset('images/transfer-your-donation-to-SPHF.jpg')}}">
                    <div class="row text-center">
                        <div class="col-md-4 p-3">
                            <h5 class="mb-0">₨ 733,131,000</h5>
                            <smal>Raised</smal>
                        </div>
                        <div class="col-md-4 p-3">
                            <h5 class="mb-0">15</h5>
                            <smal>Donations</smal>
                        </div>
                        <div class="col-md-4 p-3">
                            <h5 class="mb-0">₨ 2,200,000,000</h5>
                            <smal>Goal</smal>
                        </div>
                    </div>
                    <div class="progress py-2 rounded mx-4">
                        <div class="progress-bar bg-success py-2 rounded" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="text-center p-4">
                        <button class="btn btn-lg btn-success next-step" data-step="2">Donate Now <i class="fa fa-chevron-right"></i></button>
                        <div class="my-4">
                            <i class="fa fa-circle mx-2"></i>
                            <i class="fa fa-circle text-muted mx-2"></i>
                            <i class="fa fa-circle text-muted mx-2"></i>
                        </div>
                    </div>
                    <div class="bg-light p-3 text-center">
                        <i class="fa fa-lock text-muted"></i> Secure Donation
                    </div>
                </div>
                <div class="step" data-step="2">
                    <div class="bg-light d-flex align-items-center">
                        <button class="btn p-3 prev-step" data-step="2"><i class="fa fa-chevron-left"></i></button>
                        <span class="mx-auto">Choose Amount</span>
                    </div>
                    <div class="p-4 px-0">
                        <h4>How much would you like to donate?</h4>
                        <p>You can contribute any amount you wish to.</p>
                        <p>The cost of building one house is PKR 300,000. Any amount you contribute will go towards building houses in flood-affected areas of Sindh, Pakistan.</p>
                        <h4>Thank you for your generosity!</h4>
                    </div>
                    <div class="row mx-0">
                        <div class="col-md-3 p-4">
                            <select class="btn alert-success" id="currency">
                                <option value="PKR" data-symbol="₨">PKR - Pakistani Rupee</option>
                                <option value="USD" data-symbol="$">USD - United States Dollar</option>
                                <option value="Euro" data-symbol="€">Euro - European Union</option>
                                <option value="GBP" data-symbol="£">GBP - Great British Pound</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="card mx-auto" style="width:fit-content">
                                <div class="d-flex align-items-center">
                                    <h4 class="m-3 input_symbol">₨</h4>
                                    <input id="amount" name="amount" class="p-3" required value="100,000" style="font-size: 24px; border:1px solid lightgray; border-width: 0 0 0 1px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 p-4"></div>
                        <div class="col-12"></div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'10,000')" class="amount-btn btn btn-lg btn-success btn-block py-3">
                                <h4 class="mb-0"><span class="input_symbol">₨</span> 10,000</h4>
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'50,000')" class="amount-btn btn btn-lg btn-success btn-block py-3">
                                <h4 class="mb-0"><span class="input_symbol">₨</span> 50,000</h4>
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'100,000')" class="amount-btn btn btn-lg btn-outline-success btn-block py-3">
                                <h4 class="mb-0"><span class="input_symbol">₨</span> 100,000</h4>
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'1,500,000')" class="amount-btn btn btn-lg btn-success btn-block py-3">
                                <h4 class="mb-0"><span class="input_symbol">₨</span> 1,500,000</h4>
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'3,000,000')" class="amount-btn btn btn-lg btn-success btn-block py-3">
                                <h4 class="mb-0"><span class="input_symbol">₨</span> 3,000,000</h4>
                            </button>
                        </div>
                        <div class="col-md-4 p-2">
                            <button type="button" onclick="selectAmount(this,'custom')" class="amount-btn btn btn-lg btn-success btn-block py-3">
                                <h4 class="mb-0">Custom Amount</h4>
                            </button>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <button class="btn btn-lg btn-success next-step" data-step="3">Continue <i class="fa fa-chevron-right"></i></button>
                        <div class="my-4">
                            <i class="fa fa-circle text-muted mx-2"></i>
                            <i class="fa fa-circle mx-2"></i>
                            <i class="fa fa-circle text-muted mx-2"></i>
                        </div>
                    </div>
                    <div class="bg-light p-3 text-center">
                        <i class="fa fa-lock text-muted"></i> Secure Donation
                    </div>
                </div>
                <div class="step" data-step="3">
                    <div class="bg-light d-flex align-items-center">
                        <button class="btn p-3 prev-step" data-step="2"><i class="fa fa-chevron-left"></i></button>
                        <span class="mx-auto">Add Your Information</span>
                    </div>
                    <div class="p-4 px-0 text-center">
                        <h4>Who’s giving today?</h4>
                        <p><i>You’re required to fill your information. You can donate anonymously or as an individual or as a company.</i></p>
                        <p class="text-danger"><i>Note: Additional fields to be added in the form: CNIC, Mobile Number, JobTitle, Company, Country, City, postal code. Donor consent required</i></p>

                    </div>
                    <div class="row mx-0">
                        <div class="col-md-2">
                            <select name="title" class="form-control mb-3">
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input name="firstname" placeholder="First Name*" class="form-control mb-3" required>
                        </div>
                        <div class="col-md-5">
                            <input name="lastname" placeholder="Last Name" class="form-control mb-3">
                        </div>
                        <div class="col-md-12">
                            <input name="companyname" placeholder="Company Name*" class="form-control mb-3" required>
                        </div>
                        <div class="col-md-12">
                            <input name="email" placeholder="Email Address*" class="form-control mb-3" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="checkbox" name="anonymous" id="anonymous">
                            <label for="anonymous">Make this an anonymous donation.</label>
                        </div>
                        <div class="col-md-12">
                            <textarea name="comment" class="form-control mb-3" id="comment" placeholder="Leave a comment"></textarea>
                        </div>
                    </div>

                    <!-- PAYMENT -->

                    <div class="p-4 px-0 text-center">
                        <p><i>Here's what you're about to donate</i></p>
                    </div>
                    <table class="table bg-light">
                        <tr>
                            <td><b>Donation Summary</b></td>
                            <td class="text-right"><a class="text-success prev-step" data-step="2">Edit Donation <i class="fa fa-edit"></i></a></td>
                        </tr>
                        <tr>
                            <td>Payment Amount</td>
                            <td class="text-right"><span class="input_symbol">₨</span> <span class="input_amount">100,000</span></td>
                        </tr>
                        <tr>
                            <td>Giving Frequency</td>
                            <td class="text-right">One time</td>
                        </tr>
                        <tr>
                            <td><b>Donation Total</b></td>
                            <td class="text-right"><b><span class="input_symbol">₨</span> <span class="input_amount">100,000</span></b></td>
                        </tr>
                    </table>
                    <div class="text-center p-4">
                        <button type="submit" class="btn btn-lg btn-success">Donate Now</button>
                        <div class="my-4">
                            <i class="fa fa-circle text-muted mx-2"></i>
                            <i class="fa fa-circle text-muted mx-2"></i>
                            <i class="fa fa-circle mx-2"></i>
                        </div>
                    </div>
                    <div class="bg-light p-3 text-center">
                        <i class="fa fa-lock text-muted"></i> Secure Donation
                    </div>
                </div>
            </form>
            <p>Having problems making a donation?</p>
            <p>Email us at donor@sphf.gos.pk or call at +92 111 111 111</p>
        </div>
    </section>
</main>
@endsection
