@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-2">
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
                        <form action="{{ route('web.filterWiew', ['page' => 0]) }}" method="post" id="clear_all_form">
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
                                    <label for="district" style="font-size: 20px;">district</label>
                                    <select class="custom-select mb-3" id="district" name="district"
                                        placeholder="Dadu, karachi">
                                        <option>Select district</option>
                                        @foreach (@$location_list as $location => $location_data)
                                            <option value="{{ $location_data['district'] }}" @selected(@$data['district'] == $location_data['district'])>
                                                {{ $location_data['district'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="tehsil" style="font-size: 20px;">tehsil</label>
                                    <select class="custom-select mb-3" id="tehsil" name="tehsil"
                                        placeholder="Dadu, karachi">
                                        <option>Select tehsil</option>
                                        @foreach (@$location_list_tehsil as $location => $location_data)
                                            <option value="{{ $location_data['tehsil'] }}" @selected(@$data['tehsil'] == $location_data['tehsil'])>
                                                {{ $location_data['tehsil'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="union_council" style="font-size: 20px;">union council</label>
                                    <select class="custom-select mb-3" id="union_council" name="union_council"
                                        placeholder="Dadu, karachi">
                                        <option>Select union council</option>
                                        @foreach (@$location_list_union_council as $location => $location_data)
                                            <option value="{{ $location_data['union_council'] }}" @selected(@$data['union_council'] == $location_data['union_council'])>
                                                {{ $location_data['union_council'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="deh" style="font-size: 20px;">deh</label>
                                    <select class="custom-select mb-3" id="deh" name="deh"
                                        placeholder="Dadu, karachi">
                                        <option>Select deh</option>
                                        @foreach (@$location_list_deh as $location => $location_data)
                                            <option value="{{ $location_data['deh'] }}" @selected(@$data['deh'] == $location_data['deh'])>
                                                {{ $location_data['deh'] }}</option>
                                        @endforeach
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
                                        <input class="form-check-input" type="checkbox" id="widow" name="widow" value="widow">
                                        <label class="form-check-label" for="widow">Widow</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Women" name="women" value="women">
                                        <label class="form-check-label" for="Women">Women with disabled husband</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Elderly" name="elderly" value="elderly">
                                        <label class="form-check-label" for="Elderly">Elderly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Differntly_Abled" name="differently_abled" value="differently_abled">
                                        <label class="form-check-label" for="Differntly_Abled">Differently Abled</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="orphan" name="orphan" value="orphan">
                                        <label class="form-check-label" for="orphan">Orphans</label>
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
                                    <select class="custom-select mb-3" id="currency" name="currency">
                                        <option value="PKR" @selected(session()->get('currency') == 'PKR')>PKR</option>
                                        <option value="USD" @selected(session()->get('currency') == 'USD')>USD</option>
                                        <option value="EUR" @selected(session()->get('currency') == 'EUR')>EURO</option>
                                        <option value="GBP" @selected(session()->get('currency') == 'GBP')>GBP</option>
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
                <div class="col-md-9 px-2">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end mb-4">
                            <button type="button" class="btn btn-outline-warning mx-2"><i class="fa fa-heart"
                                    aria-hidden="true"></i> Your Beneficiaries List &nbsp;&nbsp; <i
                                    class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            {{-- <a href="{{ route('web.checkOutList') }}" class="btn btn-warning mx-2">Checkout &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a> --}}
                            <button type="submit" class="btn btn-warning mx-2">Checkout &nbsp;&nbsp; <i
                                    class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-flex justify-content-start m-2">
                            @foreach ($data as $key => $list)
                                @if ($key != 'page')
                                    <button type="button" class="btn btn-outline-warning mx-2">{{ $list }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-start m-3 filter_row">
                            <div class="form-check form-check-inline mx-3">
                                <input class="form-check-input" type="checkbox" id="select_all">
                                <label class="form-check-label bg-title" for="select_all"
                                    style="font-size: 20px; color: #878787;">Select All</label>
                            </div>
                            <!--<div class="d-flex mx-3">
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
                            </div>-->
                            <div class="d-flex ml-auto w-40 sort_filter">
                                <label class="w-50" for="sort_by">Sort by : </label>
                                <select class="form-control" id="sort_by">
                                    <option value="most_relevant">Most Relevant</option>
                                    <option value="show_all">Show All</option>
                                </select>
                            </div>
                        </div>
                        <div class="mx-3 my-4 found-items-table">
                            @foreach ($foundItems as $item)
                                <div class="d-flex justify-content-between my-3 align-items-center searchable-item">
                                    <input class="mx-3" type="checkbox" class="heart" name="item_ids[]"
                                        value="{{ $item->id }}" />
                                    {{-- <img src="{{$item['__metadata']['uri']}}" width="70" height="70" class="rounded-circle"> --}}
                                    {{-- <img src="{{ asset('images/users/1.jpg') }}" width="70" height="70" class="rounded-circle"> --}}
                                    <div class="rounded-background" id="profile-background">
                                        <span class="initial-letter">{{ substr($item['da_occupant_name'], 0, 1) }}</span>
                                    </div>
                                    <div class="d-flex flex-column mx-3">
                                        <h5 class="bg-title benf_name">{{ $item['da_occupant_name'] }}</h5>
                                        <div class="d-flex" style="font-size: 18px;">
                                            <p class="text-primary m-0 mr-4"><i class="fa fa-bars"
                                                    aria-hidden="true"></i>
                                                {{ $item['widows'] != 0 ? 'Widow ' : '' }}
                                                {{ $item['women_with_disable_husband'] != 0 ? 'Women ' : '' }}
                                                {{ $item['unaccompained_elders_over_the_age_of_60'] != 0 ? 'Elderly ' : '' }}
                                                {{ $item['people_with_disability_physically_or_mentally'] != 0 ? 'Differntly Abled ' : '' }}
                                            </p>
                                            <p class="text-secondary m-0 mx-4"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i> {{ $item['district'] }} /
                                                {{ $item['tehsil'] }}
                                            </p>
                                            <p class="text-secondary m-0 mx-4">{{session()->get('currency')}} {{number_format($item['price'], 0)}}</p>
                                        </div>
                                        <p class="m-0 w-auto rounded text-left px-2 my-3"
                                            style="background-color: #ececec;">
                                            Beneficiary CNIC {{ !$item['da_cnic'] ? 'not' : '' }} available
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="d-flex flex-column">
                                            <p class="bg-title text-success text-right m-0">ID:
                                                {{ $item['filled_da_form_id'] }}</p>
                                            <!--<button type="button" class="btn btn-info mt-4 px-4 py-2 text-center">View-->
                                            <!--    Profile</button>-->
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $perPage = 10;
                        $totalPages = (int) ceil($count / $perPage) - 1;
                        $currentPage = (int) @$data['page'];
                    @endphp

                    <nav class="Pager5" aria-label="pagination example pagination_nav">
                        <ul class="pagination pagination-circle justify-content-center">
                            <!--Arrow left-->
                            <li class="page-item {{ $currentPage === 0 ? 'disabled' : '' }}">
                                <a class="page-link prev"
                                    href="{{ $currentPage > 0 ? route('web.filterWiew', array_merge(request()->all(), ['page' => $currentPage - 1])) : '#' }}"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <!--Numbers-->
                            @php
                                $start = max(0, $currentPage - 2);
                                $end = min($totalPages, $start + 4);
                            @endphp
                            @for ($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $currentPage === $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ route('web.filterWiew', array_merge(request()->all(), ['page' => $i])) }}">{{ $i + 1 }}</a>
                                </li>
                            @endfor
                            <!--Arrow right-->
                            <li class="page-item {{ $currentPage === $totalPages ? 'disabled' : '' }}">
                                <a class="page-link next"
                                    href="{{ $currentPage < $totalPages ? route('web.filterWiew', array_merge(request()->all(), ['page' => $currentPage + 1])) : '#' }}"
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
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        $(Document).ready(function(){
            $('.rounded-background').css('background-color', getRandomColor());
        })
        // document.get('').style.backgroundColor = getRandomColor();

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
