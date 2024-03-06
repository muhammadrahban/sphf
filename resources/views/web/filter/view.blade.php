@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-2">
                    <form action="{{ route('web.filterWiew', ['page' => 0]) }}" method="post" id="clear_all_form">
                    <div class="border border-secondary border-0 border-bottom-1">

                        <!--<h5 class="bg-title"><img style="width: 25px; height: 25px;"-->
                        <!--        src="/sphf/public/images/Home_icon/Filter-icon-01.svg"> Filters </h5>-->
                                
                                <div class="d-flex justify-content-between">
                        <h5 class="bg-title"><img style="width: 25px; height: 25px;" 
                        src="/sphf/public/images/Home_icon/Filter-icon-01.svg"> Filters </h5>
                        
                        <input type="hidden" name="page" value="0">
                                    <button type="submit" class="btn btn-warning btn-block" style="width: 80px; height: 40px;" >Search</button>
                        <!--<p class="bg-title clear_all" onclick="clear_all_button()"-->
                        <!--    style="border: none; background-color: transparent; cursor: pointer;">Clear all <span-->
                        <!--        style="font-weight: 700; font-size: 18px;">X</span></p>-->
                    </div>
                        <hr style="border-top: 3px solid gray;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="bg-title m-0">Applied Filters</p>
                        <p class="bg-title clear_all" onclick="clear_all_button()"
                            style="border: none; background-color: transparent; cursor: pointer;">Clear all <span
                                style="font-weight: 700; font-size: 18px;">X</span></p>
                    </div>
                    <div class="d-flex flex-wrap align-content-between">
                        @php
                            $is_location = 0;
                        @endphp
                        @foreach ($data as $key => $list)
                            @if ($key != 'page')
                                @if($key == 'district' || $key == 'tehsil' || $key == 'union_council' || $key == 'deh')
                                    @if($is_location == 0)
                                        <button type="button" class="btn btn-outline-primary my-2 mx-1"
                                            data-key="location"
                                            onclick="removeParentValue(this)">Location&nbsp;&nbsp;X
                                        </button>
                                        @php
                                            $is_location++;
                                        @endphp 
                                    @endif
                                @else
                                    <button type="button" class="btn btn-outline-primary my-2 mx-1"
                                        data-key="{{ $key }}"
                                        onclick="removeParentValue(this)">{{ucfirst(str_replace('_', ' ', $key))  }}&nbsp;&nbsp;X
                                    </button>
                                @endif
                            @endif
                        @endforeach
                        @if (count($selectedOptions) > 0)
                            <button type="button" class="btn btn-outline-primary my-2 mx-1" data-key="Vulnerability"
                                onclick="removeParentValue(this)">Vulnerability &nbsp;&nbsp;X
                            </button>
                        @endif
                    </div>
                    <div class="my-4 p-4" style="background-color: #f6f6f6 !important;">
                        
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
                                    <label for="district" style="font-size: 20px;">District</label>
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
                                    <label for="tehsil" style="font-size: 20px;">Tehsil</label>
                                    <select class="custom-select mb-3" id="tehsil" name="tehsil"
                                        placeholder="Dadu, karachi">
                                        <option value="">Select Tehsil</option>
                                        @foreach (@$location_list_tehsil as $location => $location_data)
                                            <option value="{{ $location_data['tehsil'] }}" @selected(@$data['tehsil'] == $location_data['tehsil'])>
                                                {{ $location_data['tehsil'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="union_council" style="font-size: 20px;">Union Council</label>
                                    <select class="custom-select mb-3" id="union_council" name="union_council"
                                        placeholder="Dadu, karachi">
                                        <option value="">Select Union Council</option>
                                        @foreach (@$location_list_union_council as $location => $location_data)
                                            <option value="{{ $location_data['union_council'] }}"
                                                @selected(@$data['union_council'] == $location_data['union_council'])>
                                                {{ $location_data['union_council'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="deh" style="font-size: 20px;">Deh</label>
                                    <select class="custom-select mb-3" id="deh" name="deh"
                                        placeholder="Dadu, karachi">
                                        <option value="">Select Deh</option>
                                        @foreach (@$location_list_deh as $location => $location_data)
                                            <option value="{{ $location_data['deh'] }}" @selected(@$data['deh'] == $location_data['deh'])>
                                                {{ $location_data['deh'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row align-items-center my-2">
                                <label for="vulnerability" style="font-size: 20px;">Vulnerability</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="widow" name="widow"
                                            value="widow" @if (in_array('widow', $selectedOptions)) checked @endif>
                                        <label class="form-check-label" for="widow">Widow</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="elderly" name="elderly"
                                            value="elderly" @if (in_array('elderly', $selectedOptions)) checked @endif>
                                        <label class="form-check-label" for="Elderly">Elderly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="differently_abled"
                                            name="differently_abled" value="differently_abled"
                                            @if (in_array('differently_abled', $selectedOptions)) checked @endif>
                                        <label class="form-check-label" for="Differntly_Abled">Differently-able</label>
                                    </div>
                                    <!--<div class="form-check form-check-inline">-->
                                    <!--    <input class="form-check-input" type="checkbox" id="orphan" name="orphan"-->
                                    <!--        value="orphan" @if (in_array('orphan', $selectedOptions)) checked @endif>-->
                                    <!--    <label class="form-check-label" for="orphan">Orphans</label>-->
                                    <!--</div>-->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="Women" name="women"
                                            value="women" @if (in_array('women', $selectedOptions)) checked @endif>
                                        <label class="form-check-label" for="Women">Disabled Spouse</label>
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
                            <!--<div class="form-row align-items-center my-2">-->
                            <!--    <div class="col-12">-->
                            <!--        <input type="hidden" name="page" value="0">-->
                            <!--        <button type="submit" class="btn btn-warning btn-block">Search</button>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </form>
                    </div>
                </div>
                <div class="col-md-9 px-2">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-end mb-4">
                            <button type="submit" name="action" value="button" class="btn btn-outline-warning mx-2">
                                <i class="fa fa-heart" aria-hidden="true"></i> Your Beneficiaries List &nbsp;&nbsp; <i
                                    class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                            <button type="submit" name="action" value="submit"
                                class="btn btn-warning mx-2 checkout_btn"
                                @if (count(session('cart', [])) < 1) disabled @endif>Checkout &nbsp;&nbsp;
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="d-flex justify-content-start m-2">
                            @foreach ($data as $key => $list)
                                @if ($key != 'page')
                                    <button type="button" class="btn btn-outline-warning mx-2"
                                        data-key="{{ $key }}" data-value="{{ $list }}"
                                        onclick="removeValue(this)">{{  ucfirst(str_replace('_', ' ', $list)) }}&nbsp;&nbsp;X
                                    </button>
                                @endif
                            @endforeach
                            @if (count($selectedOptions) > 0)
                                @foreach ($selectedOptions as $list)
                                    <button type="button" class="btn btn-outline-warning mx-2" data-key="Vulnerability"
                                        data-value="{{ $list }}"
                                        onclick="removeValue(this)">{{ ucfirst(str_replace('_', ' ', $list)) }}&nbsp;&nbsp;X
                                    </button>
                                @endforeach
                            @endif
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
                            <!--<div class="d-flex ml-auto w-40 sort_filter">-->
                            <!--    <label class="w-50" for="sort_by">Sort by : </label>-->
                            <!--    <select class="form-control" id="sort_by">-->
                            <!--        <option value="most_relevant">Most Relevant</option>-->
                            <!--        <option value="show_all">Show All</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                        </div>
                        <div class="mx-3 my-4 found-items-table">
                            @foreach ($foundItems as $item)
                                <div class="d-flex justify-content-between my-3 align-items-center searchable-item">
                                    <input class="mx-3 heart checkbox_items" type="checkbox" name="item_ids[]"
                                        value="{{ $item->id }}" />
                                    <div class="rounded-background" id="profile-background">
                                        <span class="initial-letter">{{ substr($item['da_occupant_name'], 0, 1) }}</span>
                                    </div>
                                    <div class="d-flex flex-column mx-3">
                                        <h5 class="bg-title benf_name">{{ $item['da_occupant_name'] }}</h5>
                                        <div class="d-flex" style="font-size: 18px;">
                                            <p class="text-primary m-0 mr-4"><i class="fa fa-bars"
                                                    aria-hidden="true"></i>
                                                @if (in_array('widow', $selectedOptions))
                                                    Widow
                                                @endif
                                                @if (in_array('elderly', $selectedOptions))
                                                    Elderly
                                                @endif
                                                @if (in_array('differently_abled', $selectedOptions))
                                                    Differently able
                                                @endif
                                                @if (in_array('orphan', $selectedOptions))
                                                    Orphan
                                                @endif
                                                @if (in_array('women', $selectedOptions))
                                                    Disabled Spouse
                                                @endif
                                            </p>
                                            <p class="text-secondary m-0 mx-4"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i> {{ $item['district'] }} /
                                                {{ $item['tehsil'] }}
                                            </p>
                                            <p class="text-secondary m-0 mx-4">{{ session()->get('currency') }}
                                                {{ number_format($item['price'], 0) }}</p>
                                        </div>
                                        <p class="m-0 rounded text-left px-2 my-3"
                                            style="background-color: #ececec; width:250px; ">
                                            Beneficiary CNIC {{ !$item['da_cnic'] ? 'not' : '' }} available
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="d-flex flex-column">
                                            <p class="bg-title text-success text-right m-0">ID:
                                                {{ $item['filled_da_form_id'] }}</p>
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

        $(Document).ready(function() {
            $('.rounded-background').each(function() {
                $(this).css('background-color', getRandomColor());
            });

            $('.checkbox_items').change(function() {
                var checkedCheckboxes = $('.checkbox_items:checked');
                checkedCheckboxes.each(function() {
                    console.log('Checkbox with value ' + $(this).val() + ' is checked.');
                });
                var checkedValues = checkedCheckboxes.map(function() {
                    return $(this).val();
                }).get();
                console.log('Checked values: ', checkedValues);
                if ({{ count(session('cart', [])) }} > 0 || checkedValues.length > 0) {
                    $('.checkout_btn').attr('disabled', false);
                } else {
                    $('.checkout_btn').attr('disabled', true);
                }
            });
        })

        function clear_all_button() {
            $('#clear_all_form').find(':input').each(function() {
                if (this.type !== 'submit' && this.type !== 'button' && this.type !== 'hidden') {
                    if (this.type === 'checkbox') {
                        $(this).prop('checked', false);
                    } else {
                        $(this).val('');
                    }
                    console.log($(this));
                }
            });
            $('#clear_all_form').submit();
        }

        function removeValue(e) {
            var key = $(e).attr('data-key');
            var value = $(e).attr('data-value');
            if (key == 'keywords') {
                $('#clear_all_form').find('#keywords').each(function() {
                    $(this).val('');
                });
            } else if (key == 'district' && value != null) {
                $('#clear_all_form').find('#district').each(function() {
                    $(this).val('');
                });
                $('#clear_all_form').find('#tehsil').each(function() {
                    $(this).html('');
                });
                $('#clear_all_form').find('#union_council').each(function() {
                    $(this).html('');
                });
                $('#clear_all_form').find('#deh').each(function() {
                    $(this).html('');
                });
            } else if (key == 'tehsil' && value != null) {
                $('#clear_all_form').find('#tehsil').each(function() {
                    $(this).val('');
                });
                $('#clear_all_form').find('#union_council').each(function() {
                    $(this).html('');
                });
                $('#clear_all_form').find('#deh').each(function() {
                    $(this).html('');
                });
            } else if (key == 'union_council' && value != null) {
                $('#clear_all_form').find('#union_council').each(function() {
                    $(this).val('');
                });
                $('#clear_all_form').find('#deh').each(function() {
                    $(this).html('');
                });
            } else if (key == 'deh' && value != null) {
                $('#clear_all_form').find('#deh').each(function() {
                    $(this).val('');
                });
            } else if (key == 'gender') {
                $('#clear_all_form').find('#gender').each(function() {
                    $(this).val('');
                });
            } else if (key == 'Vulnerability' && value != null) {
                $('#clear_all_form').find('#' + value).each(function() {
                    $(this).prop('checked', false);
                });
            }
            $(e).remove();
            $('#clear_all_form').submit();
        }

        function removeParentValue(e) {
            var key = $(e).attr('data-key');
            if (key == 'keywords') {
                $('#clear_all_form').find('#keywords').each(function() {
                    $(this).val('');
                });
            } else if (key == 'location') {
                $('#clear_all_form').find('#district').each(function() {
                    $(this).val('');
                });
                $('#clear_all_form').find('#tehsil').each(function() {
                    $(this).html('');
                });
                $('#clear_all_form').find('#union_council').each(function() {
                    $(this).html('');
                });
                $('#clear_all_form').find('#deh').each(function() {
                    $(this).html('');
                });
            // } else if (key == 'district') {
            //     $('#clear_all_form').find('#district').each(function() {
            //         $(this).val('');
            //     });
            //     $('#clear_all_form').find('#tehsil').each(function() {
            //         $(this).html('');
            //     });
            //     $('#clear_all_form').find('#union_council').each(function() {
            //         $(this).html('');
            //     });
            //     $('#clear_all_form').find('#deh').each(function() {
            //         $(this).html('');
            //     });
            // } else if (key == 'tehsil') {
            //     $('#clear_all_form').find('#tehsil').each(function() {
            //         $(this).val('');
            //     });
            //     $('#clear_all_form').find('#union_council').each(function() {
            //         $(this).html('');
            //     });
            //     $('#clear_all_form').find('#deh').each(function() {
            //         $(this).html('');
            //     });
            // } else if (key == 'union_council') {
            //     $('#clear_all_form').find('#union_council').each(function() {
            //         $(this).val('');
            //     });
            //     $('#clear_all_form').find('#deh').each(function() {
            //         $(this).html('');
            //     });
            // } else if (key == 'deh') {
            //     $('#clear_all_form').find('#deh').each(function() {
            //         $(this).val('');
            //     });
            } else if (key == 'gender') {
                $('#clear_all_form').find('#gender').each(function() {
                    $(this).val('');
                });
            } else if (key == 'Vulnerability') {
                $('#clear_all_form').find(':input').each(function() {
                    if (this.type === 'checkbox') {
                        $(this).prop('checked', false);
                    }
                });
            }
            $(e).remove();
            $('#clear_all_form').submit();
        }

        $('#select_all').click(function() {

            var isChecked = this.checked;
            $('.searchable-item input[type="checkbox"]').each(function() {
                this.checked = isChecked;
            });

        })

        $('#district').change(function() {
            var val = $(this).val();
            $.ajax({
                url: '{{ route('filter.victims') }}',
                method: 'POST',
                data: {
                    district: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#tehsil').html();
                    var data = '<option value="">Select Tehsil</option>';
                    response.forEach(function(res) {
                        data += '<option value="' + res.tehsil + '">' + res.tehsil +
                            '</option>';
                    })
                    $('#tehsil').html(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#tehsil').change(function() {
            var val = $(this).val();
            $.ajax({
                url: '{{ route('filter.victims') }}',
                method: 'POST',
                data: {
                    tehsil: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#union_council').html();
                    var data = '<option value="">Select Union Council</option>';
                    response.forEach(function(res) {
                        data += '<option value="' + res.union_council + '">' + res
                            .union_council + '</option>';
                    })
                    $('#union_council').html(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        $('#union_council').change(function() {
            var val = $(this).val();
            $.ajax({
                url: '{{ route('filter.victims') }}',
                method: 'POST',
                data: {
                    union_council: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#deh').html();
                    var data = '<option value="">Select Deh</option>';
                    response.forEach(function(res) {
                        data += '<option value="' + res.deh + '">' + res.deh + '</option>';
                    })
                    $('#deh').html(data);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
@endsection
