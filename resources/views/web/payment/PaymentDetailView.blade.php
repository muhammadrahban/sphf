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
            style="background-image: url('{{ asset('images/Your-Benificiary-List-banner.jpg') }}'); background-size:cover;">
            <div class="container py-5">
                <h1 class="my-5 text-white text-center text-lg-left">Checkout</h1>
            </div>
        </section>
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <form action="{{route('web.SubmitDonation')}}" method="post">
                            @csrf
                            <div class="bg-white border border-secondary rounded m-3 p-3">
                                <h4 class="bg-title p-3">
                                    Add Payment Information
                                </h4>
                                <div class="form-check m-2 py-2" style="background-color: #dfdfdf;"> &nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="transaction_type" id="gridRadios1"
                                        value="dod" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Donate with Office Donation
                                    </label>
                                </div>
                                <div class="form-check m-2 py-2" style="background-color: #dfdfdf;"> &nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="transaction_type" id="gridRadios1"
                                        value="card">
                                    <label class="form-check-label" for="gridRadios1">
                                        Donate with Credit / Debit Card
                                    </label>
                                </div>
                                <div class="form-check m-2 py-2" style="background-color: #dfdfdf;"> &nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="transaction_type" id="gridRadios1"
                                        value="obt">
                                    <label class="form-check-label" for="gridRadios1">
                                        Donate via Online Bank Transfer
                                    </label>
                                </div>
                            </div>
                            <div id="dod" class="bg-white border border-secondary rounded m-3 p-3 payment-section">
                                <h4 class="bg-title p-2">
                                    Donate with Office Donation
                                </h4>
                                <p class="p-2">
                                    To make an office donation toward this SPHF caise, follow these steps:
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
                            <div id="card" class="bg-white border border-secondary rounded m-3 p-3 payment-section">
                                <h4 class="bg-title p-2">
                                    Donate with Credit / Debit Card
                                </h4>
                                <div class="d-flex justify-content-between">
                                    <p class="p-2" style="font-size: 14px;">
                                        To make an office donation toward this SPHF caise, follow these steps:
                                    </p>
                                    <img src="{{ asset('images/payment.png') }}" alt="" width="200">
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="card_number">Card: <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="card_number"
                                                        placeholder="Card Number" min="16" max="16" name="card">
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
                                                    <input type="text" id="last_name" class="form-control" name="cardholder_last_name">
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
                                                    <input type="text" id="bank_list" class="form-control"
                                                        max="16" name="bank">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_num">Enter Account Number / IBAN: <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="account_num" class="form-control" name="iban">
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
                                                    <input type="text" id="account_title" class="form-control" name="account_title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="routing_num">Bank Routing Number: <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="routing_num" class="form-control" name="bank_routing_number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_amount">Enter Amount: <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="account_amount" class="form-control" readonly value="{{number_format(count(session('cart', [])) * 300000, 0)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-2">
                                            <button class="btn btn-warning px-5 py-2 font-weight-bold"
                                                style="font-size: 18px;">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="py-4 text-secondary"> Here's what you're about to donate</p>
                                <div class="py-4 d-flex justify-content-between">
                                    <h4 class="bg-title">Your Donation Summary</h4>
                                    <a href="{{route('filterView')}}" class="text-success">Edit Donation &nbsp;&nbsp; <i
                                            class="fa fa-pencil-square" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <table class="table table-bordered checkout-list">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total
                                                Beneficiaries</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ count(session('cart', [])) }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Houses
                                                Sponsored</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ count(session('cart', [])) }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Houses Sponsored</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ count(session('cart', [])) }}</p>
                                        </td>
                                    </tr>
                                    @php
                                        $amount         = count(session('cart', [])) * 300000;
                                        $two_per        = (($amount * 2) / 100);
                                        $thirteen_per   = (($amount * 13) / 100);
                                        $final          = $two_per + $two_per + $thirteen_per + $amount;
                                    @endphp
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Donation incl MDR & SST</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ $two_per }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Bank charges</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ $two_per }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">SST on Bank Charges</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{ $thirteen_per }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total
                                                Donation Amount</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">PKR {{ number_format($final, 0) }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Net Receipt to SPHF &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: 400;" class="text-secondary">(Exempted from all kind of taxes)</span></p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">PKR {{ number_format($amount, 0) }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="py-4">
                                <button type="submit" class="btn btn-success mx-2 float-right ">
                                    DONATE NOW &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
