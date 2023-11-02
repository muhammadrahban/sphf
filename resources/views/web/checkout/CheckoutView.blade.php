@extends('web.master')
@section('webcontain')

<main>
    <style>
        h5[aria-expanded] .fa{
            display: none;
        }
        h5[aria-expanded="true"] .fa-minus{
            color:#FDBE44;
            display: block !important;
        }
        h5[aria-expanded="false"] .fa-plus{
            display: block !important;
        }
        .accordion div+div{
            border-top:1px solid rgba(255,255,255,0.1);
        }
    </style>
    <section style="background-image: url('{{asset('images/Your-Benificiary-List-banner.jpg')}}'); background-size:cover;">
        <div class="container py-5">
            <h1 class="my-5 text-white text-center text-lg-left">Your Beneficiary List</h1>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <table class="table table-bordered text-center checkout-list">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Your Selected Beneficiaries</th>
                        <th>Your Donation</th>
                        <th>House Sponsored</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning mx-2">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex flex-column mx-3 text-left">
                                <h5 class="bg-title">Mai Khadija</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                                </div>
                                <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning mx-2">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex flex-column mx-3 text-left">
                                <h5 class="bg-title">Mai Khadija</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                                </div>
                                <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning mx-2">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex flex-column mx-3 text-left">
                                <h5 class="bg-title">Mai Khadija</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                                </div>
                                <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning mx-2">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex flex-column mx-3 text-left">
                                <h5 class="bg-title">Mai Khadija</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                                </div>
                                <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning mx-2">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                        <td>
                            <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        </td>
                        <td>
                            <div class="d-flex flex-column mx-3 text-left">
                                <h5 class="bg-title">Mai Khadija</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                    <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                                </div>
                                <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                            </div>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0" style="font-size: 18px;">PKR 300,000</p>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <p class="text-dark m-0" style="font-size: 18px;">Showing 5 of 5 Beneficiaries</p>
                        </td>
                        <td colspan="2">
                            <button type="button" class="btn btn-warning mx-2 p-3 font-weight btn-block">
                                UPDATE YOUR LIST
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <h1 class="py-4 bg-title">Your Beneficiaries & Donation Summary</h1>
            <table class="table table-bordered checkout-list">
                <tbody>
                    <tr>
                        <td>
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Beneficiaries</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">5</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Houses Sponsored</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">5</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Donation Amount &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: 400;" class="text-secondary">(Exempted from all kind of taxes)</span></p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">PKR 1,500,000</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="py-4">
                <a href="{{route('web.proceedCheckoutview')}}" class="btn btn-warning mx-2 float-right ">
                    Proceed To Checkout &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
