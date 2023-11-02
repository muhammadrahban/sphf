@extends('web.master')
@section('webcontain')
<main>
    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 px-2">
                <div class="border border-secondary border-0 border-bottom-1">
                    <h1 class="bg-title"> Filters </h1>
                    <hr style="border-top: 3px solid gray;">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="#" class="bg-title">Applied Filters</a>
                    <a href="#" class="bg-title">Clear all <span
                            style="font-weight: 700; font-size: 18px;">X</span></a>
                </div>
                <div class="my-4 p-4" style="background-color: #f6f6f6 !important;">
                    <form action="">
                        <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="keywords" style="font-size: 20px;">Search by Keywords</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-search"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="keywords"
                                        placeholder="Beneficiary Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="location" style="font-size: 20px;">Location</label>
                                <select class="custom-select mb-3" id="location" placeholder="Dadu, Sukkar">
                                    <option value="dadu">Dadu</option>
                                    <option value="sukkar">Sukkar</option>
                                    <option value="karachi">karachi</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="location" style="font-size: 13px;">Radius around selected destination</label>
                                <select class="custom-select mb-3" id="location" placeholder="Dadu, Sukkar">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-row align-items-center my-2">
                            <label for="vulnerability" style="font-size: 20px;">Vulnerability</label>
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="widow"
                                        value="vulnerability">
                                    <label class="form-check-label" for="widow">Widow</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Women"
                                        value="vulnerability">
                                    <label class="form-check-label" for="Women">Women</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Elderly"
                                        value="vulnerability">
                                    <label class="form-check-label" for="Elderly">Elderly</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Differntly_Abled"
                                        value="vulnerability">
                                    <label class="form-check-label" for="Differntly_Abled">Differntly Abled</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="gender" style="font-size: 20px;">Gender</label>
                                <select class="custom-select mb-3" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="currency" style="font-size: 20px;">Currency</label>
                                <select class="custom-select mb-3" id="currency">
                                    <option value="pkr">PKR</option>
                                    <option value="usd">USD</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 px-2">
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-outline-warning mx-2"><i class="fa fa-heart"
                            aria-hidden="true"></i> Your Beneficiaries List &nbsp;&nbsp; <i
                            class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    <a href="{{route('web.checkOutList')}}" class="btn btn-warning mx-2">Checkout &nbsp;&nbsp; <i
                            class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="d-flex justify-content-start m-2">
                    <button type="button" class="btn btn-outline-warning mx-2">Sukkar &nbsp;&nbsp; X</button>
                    <button type="button" class="btn btn-outline-warning mx-2">Dadu &nbsp;&nbsp; X</button>
                    <button type="button" class="btn btn-outline-warning mx-2">Widow &nbsp;&nbsp; X</button>
                </div>
                <div class="d-flex justify-content-start m-3">
                    <div class="form-check form-check-inline mx-3">
                        <input class="form-check-input" type="checkbox" id="select_all" value="select_all">
                        <label class="form-check-label bg-title" for="select_all"
                            style="font-size: 20px; color: #878787;">Select All</label>
                    </div>
                    <div class="d-flex mx-3">
                        <i class="fa fa-user" style="font-size: 2.73em;margin-top: 5px;margin-right: 5px;"
                            aria-hidden="true"></i>
                        <div class="d-flex flex-column">
                            <p class="m-0">Persons</p>
                            <p style="font-size: 20px; font-weight: 600; margin: 0;">300</p>
                        </div>
                    </div>
                    <div class="d-flex mx-3">
                        <i class="fa fa-home" style="font-size: 2.73em;margin-top: 5px;margin-right: 5px;"
                            aria-hidden="true"></i>
                        <div class="d-flex flex-column">
                            <p class="m-0">Homes</p>
                            <p style="font-size: 20px; font-weight: 600; margin: 0;">300</p>
                        </div>
                    </div>
                    <div class="d-flex ml-auto w-40">
                        <label class="w-50" for="sort_by">Sort by : </label>
                        <select class="form-control" id="sort_by">
                            <option value="most_relevant">Most Relevant</option>
                            <option value="show_all">Show All</option>
                        </select>
                    </div>
                </div>
                <div class="mx-3 my-4">
                    <div class="d-flex justify-content-between my-3 align-items-center">
                        <input class="mx-3" type="checkbox" id="heart" />
                        <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        <div class="d-flex flex-column mx-3">
                            <h5 class="bg-title">Mai Khadija</h5>
                            <div class="d-flex" style="font-size: 18px;">
                                <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                            </div>
                            <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                        </div>
                        <div class="ml-auto">
                            <div class="d-flex flex-column">
                                <a href="#" class="bg-title text-success text-right">ID: SD-DD129</a>
                                <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3 align-items-center">
                        <input class="mx-3" type="checkbox" id="heart" />
                        <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        <div class="d-flex flex-column mx-3">
                            <h5 class="bg-title">Mai Khadija</h5>
                            <div class="d-flex" style="font-size: 18px;">
                                <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                            </div>
                            <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                        </div>
                        <div class="ml-auto">
                            <div class="d-flex flex-column">
                                <a href="#" class="bg-title text-success text-right">ID: SD-DD129</a>
                                <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3 align-items-center">
                        <input class="mx-3" type="checkbox" id="heart" />
                        <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        <div class="d-flex flex-column mx-3">
                            <h5 class="bg-title">Mai Khadija</h5>
                            <div class="d-flex" style="font-size: 18px;">
                                <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                            </div>
                            <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                        </div>
                        <div class="ml-auto">
                            <div class="d-flex flex-column">
                                <a href="#" class="bg-title text-success text-right">ID: SD-DD129</a>
                                <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3 align-items-center">
                        <input class="mx-3" type="checkbox" id="heart" />
                        <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        <div class="d-flex flex-column mx-3">
                            <h5 class="bg-title">Mai Khadija</h5>
                            <div class="d-flex" style="font-size: 18px;">
                                <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                            </div>
                            <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                        </div>
                        <div class="ml-auto">
                            <div class="d-flex flex-column">
                                <a href="#" class="bg-title text-success text-right">ID: SD-DD129</a>
                                <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3 align-items-center">
                        <input class="mx-3" type="checkbox" id="heart" />
                        <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">
                        <div class="d-flex flex-column mx-3">
                            <h5 class="bg-title">Mai Khadija</h5>
                            <div class="d-flex" style="font-size: 18px;">
                                <a href="#" class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i> Widow</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> Dadu</a>
                                <a href="#" class="text-secondary mx-4"><i class="fa fa-btc" aria-hidden="true"></i> PKR 300,000</a>
                            </div>
                            <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">house grant required</p>
                        </div>
                        <div class="ml-auto">
                            <div class="d-flex flex-column">
                                <a href="#" class="bg-title text-success text-right">ID: SD-DD129</a>
                                <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
