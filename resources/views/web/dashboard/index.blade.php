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
                    <h2 style="padding: 20px 0px;">Your Giving Stats</h2>
                    <div class="row p-3 bg-white border border-white">
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2 text-center">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h3 font-bold mb-0 text-success"> {{ $count }} </span>
                                            <span class="h6 font-semibold text-sm d-block mb-2"> NUMBER OF DONATIONS </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="card shadow border-0 mt-2 text-center">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h3 font-bold mb-0 text-success"><sup>₨</sup> {{ number_format(($count * 300000), 0) }}</span>
                                            <span class="h6 font-semibold text-sm d-block mb-2">LIFETIME DONATIONS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2 text-center">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h3 font-bold mb-0 text-success"><sup>₨</sup>{{ number_format((300000 / $average), 0) }}</span>
                                            <span class="h6 font-semibold text-sm d-block mb-2">AVERAGE DONATION</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 style="padding: 20px 0px;">Recent Donation</h2>
                    <div class="row">
                        <div class="col-12">
                            <table class="table text-center">
                                <thead style="background-color: #e1e1e1;">
                                    <tr>
                                        <td>DONATION</td>
                                        <td>CAMPAIGN</td>
                                        <td>DATE</td>
                                        <td>STATUS</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donation as $key => $item)
                                        @php
                                            $totalAmount = 0;
                                            $victim_count = 0;
                                            foreach ($item as $index => $element) {
                                                $totalAmount += $element->DonationInvoice->total_amount;
                                                $victim_count++;
                                            }
                                        @endphp

                                        <tr>
                                            <td class="text-success text-nowrap align-middle">PKR {{ number_format($totalAmount, 0) }}</td>
                                            <td class="text-left align-middle">
                                                <h6>Transfer your donation to SPHF</h6>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6>{{ \Carbon\Carbon::parse($item[0]->created_at)->isoFormat('MMMM DD, YYYY') }}<br>
                                                    {{ \Carbon\Carbon::parse($item[0]->created_at)->isoFormat('h:mm a') }}</h6>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6><span class="badge badge-success" style="height: 15px;width: 15px;border-radius: 50%;"> </span> {{ $item[0]->DonationInvoice->payment_status }}</h6>
                                                <span class="bg-warning p-1 rounded">Donation</span>
                                            </td>
                                        </tr>
                                        <tr>
                                           <td colspan="4">
                                               <div class="d-flex justify-content-between align-items-center p-1 mx-4 bg-white border border-white rounded">
                                                   <div>ID:{{$item[0]->id}}</div>
                                                   <div>Beneficiaries: {{$victim_count}}</div>
                                                   <a href="#" class="text-success" data-toggle="modal" data-target="#receiptModal" onclick="passItemToModal({{ json_encode($item) }})">View Receipt ></a>
                                               </div>
                                           </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <b>Showing 2 of 2 Beneficiaries</b>
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
                                    <td>Type</td>
                                    <td>Address</td>
                                    <td>Phase</td>
                                    <td>Date</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody id="model_victims">
                                
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
            var modelId             = document.getElementById('model_id');
            var modalName           = document.getElementById('model_name');
            var modalMail           = document.getElementById('model_mail');
            var modelVictims        = document.getElementById('model_victims');
            var modelAmount         = document.getElementById('model_amount');
            var modelTotal          = document.getElementById('model_total');
            modelId.innerHTML       = item[0].id;
            modalName.innerHTML     = item[0].user.first_name + ' ' + item[0].user.last_name;
            modalMail.innerHTML     = item[0].user.email;
            var victim_count, amount = 0;
            var detail              = '';
            item.map(function(key){
                var date    = new Date(key.created_at);
                var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
                var formattedDate = date.toLocaleString('en-US', options);
                detail += '<tr>';
                detail += '<td><h6>'+ key.victim.da_occupant_name + '</h6></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-list"></i>';
                    key.victim.widows != 0 ? 'Widow ' : '';
                    key.victim.women_with_disable_husband != 0 ? 'Women ' : '';
                    key.victim.unaccompained_elders_over_the_age_of_60 != 0 ? 'Elderly ' : '';
                    key.victim.people_with_disability_physically_or_mentally != 0 ? 'Differntly Abled ' : '';
                detail += '</small></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-marker-alt"></i> ' + key.victim.tehsil +' </small></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-calendar"></i> '+ formattedDate +' </small></td>';
                detail += '<td><small class="text-nowrap">0/4 installment provided </small></td>';
                detail += '<td><small class="text-nowrap"><i class="fa fa-money"></i> PKR '+ key.donation_invoice.charged_amount +'</small></td>';
                detail += '</tr>';
                victim_count++;
                amount += key.donation_invoice.charged_amount;
            });
            modelVictims.innerHTML  = detail;
            modelAmount.innerHTML   = 'Rs '+ amount;
            modelTotal.innerHTML    = 'Rs '+ amount;
        }
    </script>
    </main>
@endsection
