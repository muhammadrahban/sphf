@extends('web.master')
@section('webcontain')
    <main>
        <!--<section class="container my-5" style="max-width: 90% !important;">-->
        <section>
            <div class="row" style="margin:0px">
                <div class="col-md-3" style="border-radius: 5px;">
                    <div class="row">
                        <div class="offset-1 col-md-10" style="height: 100vh; box-shadow: 14px 10px 14px 0px #e3e1e1ab; padding: 50px 0px;">
                            @include('web.partials.admin_header')
                        </div>
                    </div>
                </div>
                <div class="col-md-9 bg-light" style="padding: 50px;">
                    <h2 style="padding: 20px 0px;">Track Beneficiaries</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-wrap justify-content-center" style="gap:12px;">
                                <div style="color: #5f3c03;" class="d-flex flex-column text-center justify-content-center align-items-center rounded bg-warning shadow text-center px-2 py-1">
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
                                            <h3>PKR <br />{{number_format(($count * 300000), 0)}}</h3>
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
                                        <td colspan="3">Construction Status</td>
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
                                            <!--<td>-->
                                            <!--    <label><b>Phase 1</b></label>-->
                                            <!--    <label>-->
                                            <!--        Mobilization-->
                                            <!--    </label>-->
                                            <!--    <br>-->
                                            <!--    <span class="text-warning">in progress</span>-->
                                            <!--</td>-->
                                            <!--<td>-->
                                            <!--    <label><b>Phase 2</b></label>-->
                                            <!--    <label>-->
                                            <!--        Mobilization-->
                                            <!--    </label>-->
                                            <!--    <br>-->
                                            <!--    <span class="text-danger">Not Started</span>-->
                                            <!--</td>-->
                                            <!--<td>-->
                                            <!--    <label><b>Phase 3</b></label>-->
                                            <!--    <label>-->
                                            <!--        Mobilization-->
                                            <!--    </label>-->
                                            <!--    <br>-->
                                            <!--    <span class="text-danger">Not Started</span>-->
                                            <!--</td>-->
                                            <!--<td>-->
                                            <!--    <label><b>Phase 4</b></label>-->
                                            <!--    <label>-->
                                            <!--        Mobilization-->
                                            <!--    </label>-->
                                            <!--    <br>-->
                                            <!--    <span class="text-danger">Not Started</span>-->
                                            <!--</td>-->
                                            @if($item->ext_data != null)
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Plint Status</b></label>
                                                        <span class="text-danger">{{ $item->plint_status_name }}</span>
                                                    </div>    
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Roof Status</b></label>
                                                        <span class="text-danger">{{ $item->roof_status_name }}</span>
                                                    </div>    
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Lintel Status</b></label>
                                                        <span class="text-danger">{{ $item->lintel_status_name }}</span>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Plint Status</b></label>
                                                        <span class="text-danger">Not Started</span>
                                                    </div>    
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Roof Status</b></label>
                                                        <span class="text-danger">Not Started</span>
                                                    </div>    
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <label><b>Lintel Status</b></label>
                                                        <span class="text-danger">Not Started</span>
                                                    </div>
                                                </td>
                                            @endif
                                            <td class="text-nowrap align-middle">
                                                <h6>PRK 300,000</h6>
                                                <a href="#" class="text-success" data-toggle="modal" data-target="#receiptModal" onclick="passItemToModal({{ json_encode($item) }})">View Receipt ></a>
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
        
        <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">Donation Receipt #<span id="model_id"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="myModalBody">
                        <div class="bg-light p-2">
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Donor Name:</strong>
                                <h6 id="model_name">umer shafi</h6>
                            </div>
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Email Address:</strong>
                                <h6 id="model_mail">umer.shafi@hasnain.biz</h6>
                            </div>
                        </div>
                        <hr>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>CNIC</td>
                                    <td>Address</td>
                                    <td>Date</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody id="model_victims">
                                
                            </tbody>
                        </table>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>Construction</td>
                                    <td>Media</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="align-content: center;"><h6><b>Plint</b></h6></td>
                                    <td>
                                        <img id="construction_plink_image" src="https://demofree.sirv.com/nope-not-here.jpg?w=150" width="150" height="150" target="_blank" />
                                    </td>
                                    <td id="construction_plink_status"></td>
                                </tr>
                                <tr>
                                    <td style="align-content: center;"><h6><b>Lintel</b></h6></td>
                                    <td>
                                        <img id="construction_lintel_image" src="https://demofree.sirv.com/nope-not-here.jpg?w=150" width="150" height="150" target="_blank" />
                                    </td>
                                    <td id="construction_lintel_status"></td>
                                </tr>
                                <tr>
                                    <td style="align-content: center;"><h6><b>Roof</b></h6></td>
                                    <td>
                                        <img id="construction_roof_image" src="https://demofree.sirv.com/nope-not-here.jpg?w=150" width="150" height="150" target="_blank" />
                                    </td>
                                    <td id="construction_roof_status"></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="bg-light p-2">
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Payment Status:</strong>
                                <span class="badge badge-success">Complete</span>
                            </div>
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Payment Method:</strong>
                                <h6>Donation</h6>
                            </div>
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Donation Amount:</strong>
                                <h6 id="model_amount">Rs 300000</h6>
                            </div>
                            <div class="mb-2 d-flex justify-content-between bg-white p-1">
                                <strong>Donation Total:</strong>
                                <h6 id="model_total" class="text-success">Rs 300000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function passItemToModal(item) {
                console.log(item.victim);
                var modelId             = document.getElementById('model_id');
                var modalName           = document.getElementById('model_name');
                var modalMail           = document.getElementById('model_mail');
                var modelVictims        = document.getElementById('model_victims');
                var modelAmount         = document.getElementById('model_amount');
                var modelTotal          = document.getElementById('model_total');
                
                var construction_plink_image    = document.getElementById('construction_plink_image');
                var construction_plink_status   = document.getElementById('construction_plink_status');
                
                var construction_lintel_image   = document.getElementById('construction_lintel_image');
                var construction_lintel_status  = document.getElementById('construction_lintel_status');
                
                var construction_roof_image     = document.getElementById('construction_roof_image');
                var construction_roof_status    = document.getElementById('construction_roof_status');
                
                if (item.ext_data) {
                    construction_plink_image.src = item.ext_data.plint_image || 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_plink_status.innerHTML = item.ext_data.plint_status_name || 'Not Started';
                    
                    construction_lintel_image.src = item.ext_data.lintel_image || 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_lintel_status.innerHTML = item.ext_data.lintel_status_name || 'Not Started';
                    
                    construction_roof_image.src = item.ext_data.roof_image || 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_roof_status.innerHTML = item.ext_data.roof_status_name || 'Not Started';
                } else {
                    construction_plink_image.src = 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_plink_status.innerHTML = 'Not Started';
                    
                    construction_lintel_image.src = 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_lintel_status.innerHTML = 'Not Started';
                    
                    construction_roof_image.src = 'https://demofree.sirv.com/nope-not-here.jpg?w=150';
                    construction_roof_status.innerHTML = 'Not Started';
                }
                
                modelId.innerHTML       = item.id;
                modalName.innerHTML     = item.user.first_name + ' ' + item.user.last_name;
                modalMail.innerHTML     = item.user.email;
                var amount              = 0;
                var detail              = '';
                var date                = new Date(item.victim.created_at);
                var options             = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
                var formattedDate       = date.toLocaleString('en-US', options);
                // Victim Detail
                detail += '<tr>';
                detail += '<td><h6>'+ item.victim.da_occupant_name + '</h6></td>';
                detail += '<td><small class="text-nowrap">'+ item.victim.da_cnic + '</small></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-marker-alt"></i> ' + item.victim.tehsil +' </small></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-calendar"></i> '+ formattedDate +' </small></td>';
                
                detail += '<td><small class="text-nowrap"><i class="fa fa-money"></i> PKR '+ item.donation_invoice.charged_amount +'</small></td>';
                detail += '</tr>';
    
                amount += item.donation_invoice.charged_amount;
                modelVictims.innerHTML  = detail;
                modelAmount.innerHTML   = 'Rs '+ amount;
                modelTotal.innerHTML    = 'Rs '+ amount;
            }
        </script>
        
    </main>
@endsection
