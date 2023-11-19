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
                        <form action="{{route('web.filterWiew')}}" method="post" id="clear_all_form">
                            @csrf
                            <div class="form-row align-items-center my-2">
                                <div class="col-12">
                                    <label for="keywords" style="font-size: 20px;">Search by Keywords</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="keywords" name="keywords"
                                            placeholder="Beneficiary Name" value="{{ @$data['keywords'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row align-items-center my-2">
                                <div class="col-12">
                                    <label for="location" style="font-size: 20px;">Location</label>
                                    <select class="custom-select mb-3" id="location" name="location"
                                        placeholder="Dadu, karachi">
                                        <option>Select Location</option>
                                        @foreach (@$location_list as $location => $location_data)
                                            <option value="{{ $location }}" @selected(@$data['location'] == $location)>
                                                {{ $location }}</option>
                                        @endforeach
                                        {{-- <option value="Jati" @selected(@$data['location'] == 'Jati')>Jati</option>
                                        <option value="Taluka" @selected(@$data['location'] == 'Taluka')>Taluka</option>
                                        <option value="karachi" @selected(@$data['location'] == 'karachi')>karachi</option>
                                        <option value="Ghotki" @selected(@$data['location'] == 'Ghotki')>Ghotki</option>
                                        <option value="Lakhi" @selected(@$data['location'] == 'Lakhi')>Lakhi</option> --}}
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
                                    <select class="custom-select mb-3" id="gender" name="gender">
                                        <option>Select Gender</option>
                                        <option value="Male" @selected(@$data['gender'] == 'Male')>Male</option>
                                        <option value="Female" @selected(@$data['gender'] == 'Female')>Female</option>
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
                            <div class="form-row align-items-center my-2">
                                <div class="col-12">
                                    <input type="hidden" name="page" value="0">
                                    <button type="submit" class="btn btn-warning btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8 px-2">
                    <div class="d-flex justify-content-end mb-4">
                        <button type="button" class="btn btn-outline-warning mx-2"><i class="fa fa-heart"
                                aria-hidden="true"></i> Your Beneficiaries List &nbsp;&nbsp; <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></button>
                        <a href="{{ route('web.checkOutList') }}" class="btn btn-warning mx-2">Checkout &nbsp;&nbsp; <i
                                class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="d-flex justify-content-start m-2">
                        @foreach ($data as $key => $list)
                            @if ($key != 'page')
                                <button type="button" class="btn btn-outline-warning mx-2">{{ $list }} </button>
                            @endif
                        @endforeach
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
                                <p style="font-size: 20px; font-weight: 600; margin: 0;">{{ $count }}</p>
                            </div>
                        </div>
                        <div class="d-flex mx-3">
                            <i class="fa fa-home" style="font-size: 2.73em;margin-top: 5px;margin-right: 5px;"
                                aria-hidden="true"></i>
                            <div class="d-flex flex-column">
                                <p class="m-0">Homes</p>
                                <p style="font-size: 20px; font-weight: 600; margin: 0;">{{ $count }}</p>
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
                        @foreach ($foundItems as $item)
                            <div class="d-flex justify-content-between my-3 align-items-center searchable-item">
                                <input class="mx-3" type="checkbox" class="heart" />
                                {{-- <img src="{{$item['__metadata']['uri']}}" width="70" height="70" class="rounded-circle"> --}}
                                <img src="{{ asset('images/users/1.jpg') }}" width="70" height="70"
                                    class="rounded-circle">
                                <div class="d-flex flex-column mx-3">
                                    <h5 class="bg-title benf_name">{{ $item['da_occupant_name'] }}</h5>
                                    <div class="d-flex" style="font-size: 18px;">
                                        <p class="text-primary m-0 mr-4"><i class="fa fa-bars" aria-hidden="true"></i>
                                            {{ $item['widows'] != 0 ? 'Widow ' : '' }}
                                            {{ $item['women_with_disable_husband'] != 0 ? 'Women ' : '' }}
                                            {{ $item['unaccompained_elders_over_the_age_of_60'] != 0 ? 'Elderly ' : '' }}
                                            {{ $item['people_with_disability_physically_or_mentally'] != 0 ? 'Differntly Abled ' : '' }}
                                        </p>
                                        <p class="text-secondary m-0 mx-4"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i> {{ $item['district'] }} / {{ $item['tehsil'] }}
                                        </p>
                                        <p class="text-secondary m-0 mx-4"><i class="fa fa-btc" aria-hidden="true"></i>
                                            PKR 300,000</p>
                                    </div>
                                    <p class="m-0 w-auto rounded text-left px-2 my-3" style="background-color: #ececec;">
                                        Beneficiary CNIC {{ !$item['da_cnic'] ? 'not' : '' }} available
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <div class="d-flex flex-column">
                                        <p class="bg-title text-success text-right m-0">ID:
                                            {{ $item['filled_da_form_id'] }}</p>
                                        <button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View
                                            Profile</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $perPage        = 10;
                        $totalPages     = (int)ceil($count / $perPage) - 1;
                        $currentPage    = (int)@$data['page'];
                    @endphp

                    <nav class="Pager5" aria-label="pagination example pagination_nav">
                        <ul class="pagination pagination-circle justify-content-center">

                            <!--Arrow left-->
                            <li class="page-item {{ $currentPage === 0 ? 'disabled' : '' }}">
                                <a class="page-link prev"
                                    href="{{ $currentPage > 0 ? url('web/filter?page=' . ($currentPage - 1)) : '#' }}"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <!--Numbers-->
                            @for ($i = 0; $i <= $totalPages; $i++)
                                <li class="page-item {{ $currentPage === $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ url('web/filter?page=' . $i) }}">{{ $i +1 }}</a>
                                </li>
                            @endfor

                            <!--Arrow right-->
                            <li class="page-item {{ $currentPage === $totalPages ? 'disabled' : '' }}">
                                <a class="page-link next"
                                    href="{{ $currentPage < $totalPages ? url('web/filter?page=' . ($currentPage + 1)) : '#' }}"
                                    aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </section>
    </main>

    <script>
        function clear_all_button() {
            $('#clear_all_form').find(':input').each(function() {
                if (this.type !== 'submit' && this.type !== 'button' && this.type !== 'hidden') {
                    $(this).val('');
                }
            });
        }

        $('#select_all').click(function() {

            var isChecked = this.checked;
            $('.searchable-item input[type="checkbox"]').each(function() {
                this.checked = isChecked;
            });

        })
    </script>
@endsection
