@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-3 py-2 pt-4" style="background-color: #f5f5f5; border-radius: 5px;">
                    @include('web.partials.admin_header')
                </div>
                <div class="col-md-9 p-5 bg-light">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-center" style="gap:10px;">
                                <div style="color: #5f3c03;" class="rounded bg-warning shadow text-center px-2 py-1 ">
                                    <h2>{{$count}}</h2>
                                    <h6>Total Beneficiaries</h6>
                                </div>
                                <div class="rounded bg-info shadow px-4 py-2 text-white">
                                    <div class="d-flex text-center align-items-center" style="gap:15px;">
                                        <div>
                                            
                                            <h3 class="mb-0 "><img class="mr-2 mt-0 mb-2" style="width: 25px; height: 25px;" src="{{asset('images/home_icon_01.svg')}}">{{$count}}</h3>
                                            <h6><small>House Sponsored</small></h6>
                                        </div>
                                        <div style="height:50px; width:2px; background:lightgray"></div>
                                        <div>
                                            <h3>{{number_format(($count * 300000), 0)}} <small>PKR</small></h3>
                                            <h6><small>Total Donations</small></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="rounded bg-light shadow text-center px-2 py-1 box-data">
                                    <h6>Phase 1</h6>
                                    <h2>{{$count_phase_one}}</h2>
                                </div>
                                <div class="rounded bg-light shadow text-center px-2 py-1 box-data">
                                    <h6>Phase 2</h6>
                                    <h2>{{$count_phase_two}}</h2>
                                </div>
                                <div class="rounded bg-light shadow text-center px-2 py-1 box-data">
                                    <h6>Phase 3</h6>
                                    <h2>{{$count_phase_three}}</h2>
                                </div>
                                <div class="rounded bg-light shadow text-center px-2 py-1 box-data">
                                    <h6>Phase 4</h6>
                                    <h2>{{$count_phase_four}}</h2>
                                </div>
                                <div class="rounded alert-success shadow text-center px-2 py-1 box-data">
                                    <h6>Houses Completed</h6>
                                    <h2>{{$count_completed}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <table class="table bg-white text-center">
                                <thead>
                                    <tr>
                                        <td>ID Number</td>
                                        <td colspan="2">My Beneficiaries</td>
                                        <td colspan="5">Construction Status</td>
                                        <td>Amount Disbursed</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donation as $item)
                                        <tr>
                                            <td class="text-success text-nowrap align-middle">{{$item->id}}</td>
                                            <td><img class="avatar"></td>
                                            <td class="text-left align-middle">
                                                <h6>{{$item->victim->da_occupant_name}}</h6>
                                                <small class="text-nowrap">
                                                    <i class="fa fa-list"></i>
                                                    {{ $item->victim->widows != 0 ? 'Widow ' : '' }}
                                                    {{ $item->victim->women_with_disable_husband != 0 ? 'Women ' : '' }}
                                                    {{ $item->victim->unaccompained_elders_over_the_age_of_60 != 0 ? 'Elderly ' : '' }}
                                                    {{ $item->victim->people_with_disability_physically_or_mentally != 0 ? 'Differntly Abled ' : '' }}
                                                </small>
                                                <small class="text-nowrap">
                                                    <i class="fa fa-marker-alt"></i>
                                                    {{$item->victim->tehsil}}
                                                </small>
                                                <small class="text-nowrap">
                                                    <i class="fa fa-money"></i>
                                                    PKR 300,000
                                                </small>
                                                <small class="text-nowrap">
                                                    <i class="fa fa-calendar"></i>
                                                    {{$item->created_at->diffForHumans()}}
                                                </small>
                                                <small class="text-nowrap">
                                                    0/4 installment provided
                                                </small>
                                            </td>
                                            <td>
                                                <label><b>Phase 1</b></label>
                                                <label>
                                                    Mobilization
                                                </label>
                                                <br>
                                                <span class="text-warning">in progress</span>
                                            </td>
                                            <td>
                                                <label><b>Phase 2</b></label>
                                                <label>
                                                    Mobilization
                                                </label>
                                                <br>
                                                <span class="text-danger">Not Started</span>
                                            </td>
                                            <td>
                                                <label><b>Phase 3</b></label>
                                                <label>
                                                    Mobilization
                                                </label>
                                                <br>
                                                <span class="text-danger">Not Started</span>
                                            </td>
                                            <td>
                                                <label><b>Phase 4</b></label>
                                                <label>
                                                    Mobilization
                                                </label>
                                                <br>
                                                <span class="text-danger">Not Started</span>
                                            </td>
                                            <td>
                                                <img>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6>PRK 300,000</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <b>Showing 10 of 10 Beneficiaries</b>
                        </div>
                        <div class="col-md-6">
                            {{-- <nav aria-label="Page navigation example" >
                                <ul class="pagination ml-auto mr-0" style="width: fit-content;">
                                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
