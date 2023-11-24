@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 70% !important;">
            <div class="row">
                <div class="col-md-4 px-2">
                    <div class="border border-secondary border-0 border-bottom-1">
                        <h1 class="bg-title"> Filters </h1>
                        <hr style="border-top: 3px solid gray;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="bg-title m-0">Applied Filters</p>
                        <p class="bg-title clear_all" onclick="clear_all_button()"
                            style="border: none; background-color: transparent; cursor: pointer;">Clear all <span
                                style="font-weight: 700; font-size: 18px;">X</span></p>
                    </div>
                    <div class="my-4 p-4" style="background-color: #f6f6f6 !important;">
                        <div class="form-row align-items-center my-2">
                            <div class="col-12">
                                <label for="keywords" style="font-size: 20px;">Search by Keywords</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="keywords" name="keywords"
                                        placeholder="Beneficiary Name" value="">
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>
                <div class="col-md-8 px-2">
                    <div class="d-flex justify-content-end mb-4">
                        <button type="button" class="btn btn-outline-warning mx-2"><i class="fa fa-heart"
                                aria-hidden="true"></i> Your Beneficiaries List &nbsp;&nbsp; <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></button>
                        <button type="submit" class="btn btn-warning mx-2">Checkout &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="d-flex justify-content-start m-2">
                    </div>
                    <div class="d-flex justify-content-start m-3">
                        <div class="form-check form-check-inline mx-3">
                            <input class="form-check-input" type="checkbox" id="select_all">
                            <label class="form-check-label bg-title" for="select_all"
                                style="font-size: 20px; color: #878787;">Select All</label>
                        </div>
                        <div class="d-flex mx-3">
                            <i class="fa fa-user" style="font-size: 2.73em;margin-top: 5px;margin-right: 5px;"
                                aria-hidden="true"></i>
                            <div class="d-flex flex-column">
                                <p class="m-0">Persons</p>
                                <p style="font-size: 20px; font-weight: 600; margin: 0;">5</p>
                            </div>
                        </div>
                        <div class="d-flex mx-3">
                            <i class="fa fa-home" style="font-size: 2.73em;margin-top: 5px;margin-right: 5px;"
                                aria-hidden="true"></i>
                            <div class="d-flex flex-column">
                                <p class="m-0">Homes</p>
                                <p style="font-size: 20px; font-weight: 600; margin: 0;">5</p>
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
                        <div class="d-flex justify-content-between my-3 align-items-center searchable-item">
                            <input class="mx-3" type="checkbox" class="heart" name="item_ids[]"  value="1" />
                            <img src="{{ asset('images/users/1.jpg') }}" width="70" height="70"
                                class="rounded-circle">
                            <div class="d-flex flex-column mx-3">
                                <h5 class="bg-title benf_name">name</h5>
                                <div class="d-flex" style="font-size: 18px;">
                                    <p class="text-primary m-0 mr-4"><i class="fa fa-bars" aria-hidden="true"></i>
                                        Widow
                                    </p>
                                    <p class="text-secondary m-0 mx-4"><i class="fa fa-map-marker"
                                            aria-hidden="true"></i> location
                                    </p>
                                    <p class="text-secondary m-0 mx-4"><i class="fa fa-btc" aria-hidden="true"></i>
                                        PKR 300,000</p>
                                </div>
                                <p class="m-0 w-auto rounded text-left px-2 my-3" style="background-color: #ececec;">
                                    Beneficiary CNIC available
                                </p>
                            </div>
                            <div class="ml-auto">
                                <div class="d-flex flex-column">
                                    <p class="bg-title text-success text-right m-0">ID: </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection