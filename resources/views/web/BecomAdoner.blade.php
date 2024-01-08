@extends('web.master')
@section('webcontain')
    <main>
        <section style="background-image: url({{ asset('images/shape-8.png') }}); background-size:auto 100%;">
            <div class="container py-5">
                <h1 class="mb-5">Transfer your donation to SPHF</h1>
                <form class="card mb-5" id="multi-step-form" method="POST" action="{{ route('become.doner') }}">
                    @csrf
                    <div class="step" data-step="1">
                        <div class="py-4 px-0">
                            <ul>
                                <li>Add the amount you want to donate.</li>
                                <li>Add your details, select payment mode and make online payment.</li>
                                <li>You can also choose offline payment option.</li>
                                <li>Your donation will be transferred securely to SPHF, and SPHF will be assigned to
                                    disburse your funds to flood-affected beneficiaries in Sindh.</li>
                                <li>Once you submit donation, you’ll receive e-receipt on e-mail.</li>
                                <li>You can also login to your donor account to view and track your donation.</li>
                            </ul>
                            <h4 class="ml-4  text-center">Unite for Resilience, Empower Change </br> Building a Stronger
                                Sindh For a Better tomorrow, Today</h4>
                        </div>
                        <img class="w-100" src="{{ asset('/images/our_donor/Transfer_to_SPHF.jpg') }}">
                        <div class="row text-center">
                            <div class="col-md-4 p-3">
                                <h5 class="mb-0">$2.08 Billion</h5>
                                <small>Financial Needs</small>
                            </div>
                            <div class="col-md-4 p-3">
                                <h5 class="mb-0">$727 Million</h5>
                                <small>Donor Compliment</small>
                            </div>
                            <div class="col-md-4 p-3">
                                <h5 class="mb-0">$1.35 Billion</h5>
                                <h4>Financial Gap</h4>
                            </div>
                        </div>
                        <div class="progress py-2 rounded mx-4">
                            <div class="progress-bar bg-success py-2 rounded" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="text-center p-4">
                            <button type="button" class="btn btn-lg btn-success next-step" data-step="2">Donate Now <i
                                    class="fa fa-chevron-right"></i></button>
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
                            <p>The cost of building one house is PKR 300,000. Any amount you contribute will go towards
                                building houses in flood-affected areas of Sindh, Pakistan.</p>
                            <h4>Thank you for your generosity!</h4>
                        </div>

                        <div class="row mx-0">
                            <div class="col-md-3 p-4">
                                <p>Choose your currency</p>
                                <select class="btn alert-success" id="currency">
                                    <option value="PKR" data-symbol="₨">PKR - Pakistani Rupee</option>
                                    <option value="USD" data-symbol="$">USD - United States Dollar</option>
                                    <option value="EUR" data-symbol="€">Euro - European Union</option>
                                    <option value="GBP" data-symbol="£">GBP - Great British Pound</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="card mx-auto" style="width:fit-content">
                                    <div class="d-flex align-items-center">
                                        <h4 class="m-3 input_symbol">₨</h4>
                                        <input id="amount" name="amount" class="p-3" required value="100000"
                                            style="font-size: 24px; border:1px solid lightgray; border-width: 0 0 0 1px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-4"></div>
                            <div class="col-12"></div>
                            <div class="col-md-4 p-2 static__amount">
                                <button type="button" onclick="selectAmount(this,10000)"
                                    class="amount-btn btn btn-lg btn-success btn-block py-3 select__amount"
                                    data-amount="10000" data-symbal="PKR">
                                    <h4 class="mb-0"><span class="input_symbol">₨</span> 10,000</h4>
                                </button>
                            </div>
                            <div class="col-md-4 p-2 static__amount">
                                <button type="button" onclick="selectAmount(this,50000)"
                                    class="amount-btn btn btn-lg btn-success btn-block py-3 select__amount"
                                    data-amount="50000" data-symbal="PKR">
                                    <h4 class="mb-0"><span class="input_symbol">₨</span> 50,000</h4>
                                </button>
                            </div>
                            <div class="col-md-4 p-2 static__amount">
                                <button type="button" onclick="selectAmount(this,100000)"
                                    class="amount-btn btn btn-lg btn-outline-success btn-block py-3 select__amount"
                                    data-amount="100000" data-symbal="PKR">
                                    <h4 class="mb-0"><span class="input_symbol">₨</span> 100,000</h4>
                                </button>
                            </div>
                            <div class="col-md-4 p-2 static__amount">
                                <button type="button" onclick="selectAmount(this,1500000)"
                                    class="amount-btn btn btn-lg btn-success btn-block py-3 select__amount"
                                    data-amount="1500000" data-symbal="PKR">
                                    <h4 class="mb-0"><span class="input_symbol">₨</span> 1,500,000</h4>
                                </button>
                            </div>
                            <div class="col-md-4 p-2 static__amount">
                                <button type="button" onclick="selectAmount(this,3000000)"
                                    class="amount-btn btn btn-lg btn-success btn-block py-3 select__amount"
                                    data-amount="3000000" data-symbal="PKR">
                                    <h4 class="mb-0"><span class="input_symbol">₨</span> 3,000,000</h4>
                                </button>
                            </div>
                            <div class="col-md-4 p-2">
                                <button type="button" onclick="selectAmount(this,'custom')"
                                    class="amount-btn btn btn-lg btn-success btn-block py-3 select__amount"
                                    data-amount="custom">
                                    <h4 class="mb-0">Custom Amount</h4>
                                </button>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <button type="button" class="btn btn-lg btn-success next-step" data-step="3">Continue <i
                                    class="fa fa-chevron-right"></i></button>
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
                            <p><i>You’re required to fill your information. You can donate anonymously or as an individual
                                    or as a company.</i>
                            </p>
                        </div>
                        <div class="row mx-0">
                            @auth

                            @else
                                <div class="col-md-2">
                                    <select name="title" class="form-control mb-3">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input name="first_name" placeholder="First Name*" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-5">
                                    <input name="last_name" placeholder="Last Name" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Email" class="form-control mb-3 @error('email') is-invalid @enderror"
                                        required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-md-6">
                                    <input name="cnic" placeholder="CNIC" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-6">
                                    <input name="phone" placeholder="Mobile Number" class="form-control mb-3 @error('phone') is-invalid @enderror" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input name="job_title" placeholder="Job Title" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-12">
                                    <input name="company_name" placeholder="Company Name*" class="form-control mb-3"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <input name="country" placeholder="Country*" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-12">
                                    <input name="city" placeholder="City*" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-12">
                                    <input name="postal_code" placeholder="postal code*" class="form-control mb-3" required>
                                </div>
                                <div class="col-md-12">
                                    <input name="postalcode" placeholder="Donor consent*" class="form-control mb-3" required>
                                </div>
                                <div class="col-sm-12">
                                    <input size="40" class="form-control mb-3 @error('password') is-invalid @enderror"
                                        required aria-required="true" aria-invalid="false" placeholder="Password"
                                        type="password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input size="40"
                                        class="form-control mb-3 @error('confirm_password') is-invalid @enderror" required
                                        aria-required="true" aria-invalid="false" placeholder="Confirm Paswword"
                                        type="password" name="confirm_password" />
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="checkbox" name="is_anonymous" id="anonymous" />
                                    <label for="anonymous">Donation anonymously.</label>
                                </div>
                                <div class="col-md-12">
                                    <textarea name="comment" class="form-control mb-3" id="comment" placeholder="Leave a comment"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start">
                                        <input type="radio" id="individual" class="m-2" name="donation_type"
                                            value="individual" />
                                        <label for="individual">
                                            Donate as individual.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start">
                                        <input type="radio" id="company" class="m-2" name="donation_type"
                                            value="company" />
                                        <label for="company">
                                            Donate as company.
                                        </label>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="bg-white border border-secondary rounded m-3 p-3">
                            <h4 class="bg-title p-3">
                                Add Payment Information
                            </h4>
                            <div class="form-check m-2 py-2" style="background-color: #dfdfdf;"> &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="transaction_type" id="gridRadios1"
                                    value="dod">
                                <label class="form-check-label" for="gridRadios1">
                                    Donate with Offline Donation
                                </label>
                            </div>
                            <div class="form-check m-2 py-2" style="background-color: #dfdfdf;"> &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="transaction_type" id="gridRadios1"
                                    value="card" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Donate with Credit / Debit Card
                                </label>
                            </div>
                        </div>
                        <div id="dod" class="bg-white border border-secondary rounded m-3 p-3 payment-section">
                            <h4 class="bg-title p-2">
                                Donate with Offline Donation
                            </h4>
                            <p class="p-2">
                                To make an Offline donation toward this SPHF caise, follow these steps:
                            </p>
                            <ol>
                                <li> Write a check payable to "Sindh People's Housing for Flood Affectees"</li>
                                <li> On the memo line of the check, indicate that the donation is for "Sindh People's
                                    Housing for Flood Affectees"</li>
                                <li> Mail your check to:</li>
                            </ol>
                            <p class="px-4">
                                Sindh People's Housing for Flood Affectees
                            </p>
                            <p class="font-weight-bold py-2 px-4" style="font-size: 20px;">
                                Bungalow No.20, Block 7/8, Modern Cooperative Housing Society, Tipu Sultan Road,
                                Karachi, Pakistan
                            </p>

                        </div>
                        {{-- <div id="card" class="bg-white border border-secondary rounded m-3 p-3 payment-section">
                            <h4 class="bg-title p-2">
                                Donate with Credit / Debit Card
                            </h4>
                            <div class="d-flex justify-content-between">
                                <p class="p-2" style="font-size: 14px;">
                                    To make an Offline donation toward this SPHF caise, follow these steps:
                                </p>
                                <img src="{{ asset('images/payment.png') }}" alt="" width="200">
                            </div>
                            <div class="row p-2">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="card_number">Card: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="card_number"
                                                    placeholder="Card Number" min="16" max="16"
                                                    name="card">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="expire">Expire: <span class="text-danger">*</span></label>
                                                <input type="number" id="expire" class="form-control"
                                                    placeholder="MM/YY" name="expire">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cvv">CVV: <span class="text-danger">*</span></label>
                                                <input type="number" id="cvv" class="form-control"
                                                    placeholder="CVV" name="cvv">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">Cardholder First Name: <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" id="first_name" class="form-control"
                                                    id="card_number" name="cardholder_first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="last_name">Cardholder Last Name: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="last_name" class="form-control"
                                                    name="cardholder_last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-warning px-5 py-2 font-weight-bold"
                                            style="font-size: 18px;">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="obt" class="bg-white border border-secondary rounded m-3 p-3 payment-section">
                            <h4 class="bg-title p-2">
                                Donate via Online Bank Transfer
                            </h4>
                            <div class="row p-2">
                                <div class="col-md-10">
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bank_list">Select Bank: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="bank_list" class="form-control" max="16"
                                                    name="bank">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account_num">Enter Account Number / IBAN: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="account_num" class="form-control"
                                                    name="iban">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <button class="btn btn-warning px-5 py-2 font-weight-bold"
                                            style="font-size: 18px;">VERIFY</button>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account_title">Account Title: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="account_title" class="form-control"
                                                    name="account_title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="routing_num">Bank Routing Number: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="routing_num" class="form-control"
                                                    name="bank_routing_number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account_amount">Enter Amount: <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="account_amount" class="form-control" readonly
                                                    value="{{ number_format(count(session('cart', [])) * 300000, 0) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <button class="btn btn-warning px-5 py-2 font-weight-bold"
                                            style="font-size: 18px;">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- PAYMENT -->
                        <div class="p-4 px-0 text-center">
                            <p><i>Here's what you're about to donate</i></p>
                        </div>
                        <table class="table bg-light">
                            <tr>
                                <td><b>Donation Summary</b></td>
                                <td class="text-right">
                                    <a class="text-success prev-step" data-step="2">Edit Donation <i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Payment Amount</td>
                                <td class="text-right">
                                    <span class="input_symbol">₨</span> <span class="input_amount">100,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Donation incl MDR & SST</td>
                                <td class="text-right">
                                    <span class="input_symbol">₨</span> <span class="mdr_sst">100,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Bank charges</td>
                                <td class="text-right">
                                    <span class="input_symbol">₨</span> <span class="bank_charges">100,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td>SST on Bank Charges</td>
                                <td class="text-right">
                                    <span class="input_symbol">₨</span> <span class="sst_bank_charges">100,000</span>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <td>Giving Frequency</td>-->
                            <!--    <td class="text-right">One time</td>-->
                            <!--</tr>-->
                            <tr>
                                <td><b>Total</b></td>
                                <td class="text-right"><b><span class="input_symbol">₨</span> <span
                                            class="total_amount">100,000</span></b></td>
                            </tr>
                            {{-- <tr>
                                <td><b>Net Receipt to SPHF</b></td>
                                <td class="text-right"><b><span class="input_symbol">₨</span> <span
                                            class="input_amount">100,000</span></b></td>
                            </tr> --}}
                        </table>
                        <input type="hidden" name="amount" value="0" id="amount_value">
                        <input type="hidden" name="charges" value="0" id="amount_charges">
                        <input type="hidden" name="total_amount" value="0" id="total_amount">
                        <input type="hidden" name="charged_amount" value="0" id="charged_amount">
                        <input type="hidden" name="symbol" value="PKR" id="symbol">
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
                <p>Email us at donor@sphf.gos.pk or call at +92 21 99334119-20</p>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $('.payment-section').not(':first').hide();
            $('input[type="radio"][name="transaction_type"]').change(function() {
                $('.payment-section').hide();
                var selectedValue = $(this).val();
                $('#' + selectedValue).show();
            });
        });
    </script>
@endsection
