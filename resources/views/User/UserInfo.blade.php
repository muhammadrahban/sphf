@extends('layouts.master')
@section('title')
    {{ 'Page Title Goes Here' }}
@endsection
@section('contain')

    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                @foreach ($nannyData as $user)
                    <div class="card-body">
                        {{-- <div class=" col-lg-12 col-md-5" style="margin-left: 17%;">
                            @php $rating = $user->rating; @endphp
                            @foreach (range(1, 5) as $i)
                                <span class="fa-stack" style="width:1em color: rgb(38, 105, 25)">
                                    <i class="far fa-star fa-stack-1x "></i>

                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            <i class="fas fa-star fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @endif
                                    @endif
                                    @php $rating--; @endphp
                                </span>
                            @endforeach
                            <div class="text-success" style="margin-left: 29%;">{{ round($user->rating, 1) }}</div>
                        </div> --}}
                        <center class="m-t-30">
                            <a href="{{ URL::asset($user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : 'images/placeholder_blue_user.png') }}"
                                target="_blank">
                                <img src="{{ $user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : asset('images/placeholder_blue_user.png') }}"
                                    class="img-circle" width="150" />
                            </a>
                            <h4 class=" waves-dark active m-t-10">{{ $user->full_name }}</h4>
                            @if ($user->user_role == 'nanny')
                                <h6 class="text-success">Caregiver</h6>
                            @else
                                <h6 class="text-success">{{ $user->user_role }}</h6>
                            @endif

                            {{-- <div class="row text-center justify-content-md-center">
                                <div class="col-6"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                        <font class="font-medium">254</font>
                                    </a></div>
                                <div class="col-6"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                        <font class="font-medium">54</font>
                                    </a></div>
                            </div> --}}
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ $user->address }}</h6>
                        <div id="map" style=" height: 150px;"></div>
                        {{-- <div  class="map-box"> --}}
                        {{-- <iframe

                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                            width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        {{-- </div> --}}
                        {{-- <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                            role="tab">Timeline</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#order" role="tab">Orders</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#wallet" role="tab">Wallet</a>
                    </li>
                    {{-- <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#booking"
                            role="tab">Appointments</a> </li> --}}
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#withdraw_log"
                            role="tab">Withdraw Log</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#media" role="tab">Media</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body" style="height: 75.5vh;">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->full_name ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Phone</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->phone }}</p>
                                            </div>
                                            {{-- <div class="col-md-3 col-xs-6 b-r"> <strong>Experiences</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ $user->experiences ? ucwords($user->experiences) : '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Qualification</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ $user->qualification ? ucwords($user->qualification) : '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Gender</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->gender }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Age </strong>
                                                <br>
                                                <p class="text-muted">{{ $user->age ?? '-' }}</p>
                                            </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Customer Stripe ID</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->customer_stripe_id }}</p>
                                            </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Ethnicity</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->ethnicity ?? '-' }}</p>
                                            </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Latitude</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->latitude ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Longitude</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->longitude ?? '-' }}</p>
                                            </div> --}}
                                            <input type="hidden" name="" id="lat"
                                                value="{{ $user->latitude }}">
                                            <input type="hidden" name="" id="long"
                                                value="{{ $user->longitude }}">
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Caregiver Status</strong>
                                                <br>
                                                @if ($user->is_online == 0)
                                                    <p class="badge rounded-pill bg-danger ms-auto mb-2 mb-md-0">offline
                                                    </p>
                                                @else
                                                    <p class="badge rounded-pill bg-success ms-auto mb-2 mb-md-0">online
                                                    </p>
                                                @endif
                                            </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>DOB	</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->dob	 }}</p>
                                            </div> --}}
                                            {{-- </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Biography</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->biography ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Language(s)</strong>
                                                <br>
                                                @php
                                                    $languages = explode(',', $user->language);
                                                @endphp

                                                @foreach ($languages as $language)
                                                    <p>{{ trim($language) }}</p>
                                                @endforeach
                                            </div> --}}
                                            {{-- <hr>
                                        <div class="col-md-3"> <strong>Media</strong><br>
                                            <h5>Agreement</h5>
                                            <p class="m-t-30"> <a
                                                    href="{{ URL::asset($user->agreement != null ? $user->agreement->media : null) }}"
                                                    target="_blank">
                                                    <img src="{{ asset($user->agreement != null ? $user->agreement->media : null) }}"
                                                        alt="Not Available" width="100">
                                                </a></p>
                                        </div>

                                        <div class="col-md-3" style="margin-top: 23px">
                                            <h5>Licens</h5>
                                            <p class="m-t-30"> <a
                                                    href="{{ URL::asset($user->license != null ? $user->license->media : null) }}"
                                                    target="_blank">
                                                    <img src="{{ asset($user->license != null ? $user->license->media : null) }}"
                                                        alt="Not Available" width="100">
                                                </a></p> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="selfie" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">
                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/update"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>
                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="picture" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">


                                                        <a href="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            target="blank"> Click to view </a>
                                                        <span class="badge badge-info">pending</span>

                                                        <span style="float:right;" class="p-1">
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/approved"
                                                                data-toggle="tooltip" data-original-title="Approved"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="icon-check" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/rejected"
                                                                data-toggle="tooltip" data-original-title="Disapproved"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="icon-close" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                        <img src="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            alt="" class="h-50 w-100">

                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="identity" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">

                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/identity"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>

                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="setting" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material"
                                            action="https://test-cmolds.com/zauj_admin/public/users/391" method="POST">
                                            <input type="hidden" name="_token"
                                                value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv"> <input type="hidden"
                                                name="_method" value="PATCH">
                                            <div class="form-group">
                                                <label class="col-sm-12">Status</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="status">
                                                        <option value="0" selected>Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Rejected</option>
                                                        <option value="3">InActive</option>
                                                        <option value="4">Blocked</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="wallet" role="tabpanel">
                        <div class="card-body">
                            {{-- @foreach ($user->wallet as $Cwallet) --}}
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Currency</strong>
                                    <br>
                                    <p class="text-muted">USD</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>FDP</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->fdp ?? '' }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Amount</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->total_amount ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- {{dd($user->wallet->transactions)}} --}}
                        <hr>
                        <div class="col-md-12 col-xs-6 b-r text-subtitle">
                            <h4 class="text-success">Transactions History</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable2" class="table table-striped border">
                                <thead>
                                    <tr class="text-white" style="background-color: gray;">
                                        <th>S.No</th>
                                        <th>Transaction Type</th>
                                        {{-- <th>Amount</th> --}}
                                        <th>FDP</th>
                                        <th>Amount Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @if ($user->wallet)
                                        {{-- @foreach ($user->nannyBookings as $Cusdevices) --}}
                                        @foreach ($user->wallet->transactions as $transaction)
                                            <tr>
                                                {{-- {{dd($media->media_type)}} --}}
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $transaction->type ?? '-' }}</td>
                                                {{-- <td>${{ $transaction->amount ?? '-' }}</td> --}}
                                                <td>{{ $transaction->fdp ?? '-' }}</td>
                                                <td>{{ $transaction->amount_type ?? '-' }}</td>
                                                <td>{{ $transaction->created_at->format('d/m/Y') ?? '-' }}</td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($transaction->created_at)->diffForHumans()}}</td> --}}
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="order" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive  m-t-40">
                                <table id="myTableorder" class="table table-striped border" style="    font-size: small">
                                    <thead>
                                        <tr class="text-white" style="background-color: gray;">
                                            <th>S.No</th>
                                            <th>Order Number</th>
                                            <th>Platform Fee</th>
                                            <th>Before Charge</th>
                                            <th>Total Charge</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        {{-- @if ($orders->wallet) --}}
                                        {{-- @foreach ($user->nannyBookings as $Cusdevices) --}}
                                        @foreach ($user->orders as $order)
                                            <tr>
                                                {{-- {{dd($media->media_type)}} --}}
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $order->order_number ?? '-' }}</td>
                                                <td>fdp {{ $order->platform_fee ?? '-' }}</td>
                                                <td>fdp {{ $order->befor_charge ?? '-' }}</td>
                                                <td>fdp {{ $order->total_charge ?? '-' }}</td>
                                                <td>{{ $order->total_item ?? '-' }}</td>
                                                @if ($order->status == 0)
                                                    <td><span class="badge bg-danger">Pending</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Dispatched</span></td>
                                                @endif
                                                <td>{{ $order->created_at->format('d/m/Y') ?? '-' }}</td>
                                                <td>
                                                    <a title="info" href="#" data-toggle="modal"
                                                        data-target="#orderModal{{ $order->id }}"
                                                        data-detail="{{ json_encode($order) }}" class="customModelOpen">
                                                        <i class="fa fa-info-circle"
                                                            style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                                    </a>
                                                    @if ($order->status == 0)
                                                    <a title="status update" href="{{route('status.update',['order' => $order->id,'status' => 1])}}">
                                                        <i class="fa fa-clock "
                                                            style="font-size: 20px;color: #d9534f;"></i>
                                                        </a>
                                                        @else
                                                        <a title="status update" href="{{route('status.update',['order' => $order->id,'status' => 0])}}">
                                                            <i class="fa fa-check"
                                                                style="font-size: 20px;color: #5cb85c; "></i>
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>
                                            <!-- Modal for each order -->
                                            <div class="modal" id="surveyModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content" style="font-size: small;">
                                                        <div class="modal-header bg-primary text-white" style="background: linear-gradient(45deg, #01c0c8c2, transparent);"
                                                            style="background: linear-gradient(45deg, #01c0c8c2, transparent;">
                                                            <h5 class="modal-title"
                                                                id="orderModalLabel{{ $order->id }}">Order Details</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul id="orderContent" class="list-group">
                                                                <!-- Product details will be populated here -->
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="booking" role="tabpanel">
                        <div class="card-body">
                            {{-- <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success text-white">Update Profile</button>
                                    </div>
                                </div>
                            </form> --}}

                        </div>
                    </div>
                    <div class="tab-pane" id="media" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable11" class="table table-striped border">
                                    <thead>
                                        <tr class="card-success text-white">
                                            <th>Media Type</th>
                                            <th>Media Title</th>
                                            <th>Media Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($user->nannyBookings as $Cusdevices) --}}
                                        @foreach ($user->userMedia as $media)
                                            <tr>
                                                {{-- {{dd($user->profile_image)}} --}}
                                                {{-- <td>{{ $media->media_type }}</td>
                                                <td>{{ $media->media_title }}</td> --}}
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_type)) }}</td>
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_title)) }}</td>
                                                <td>
                                                    <a href="{{ URL::asset($media->media_url != null ? env('MEDIA_URL') . $media->media_url : 'images/user') }}"
                                                        target="_blank">
                                                        <img src="{{ $media->media_url != null ? env('MEDIA_URL') . $media->media_url : asset('images/user') }}"
                                                            alt="Not Available" width="50px" class="img-circle">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="withdraw_log" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTableLogs" class="table table-striped border">
                                    <thead>
                                        <tr style="font-size: smaller;" class="card-info text-white">
                                            <th>S.No</th>
                                            <th>Payout Batch Id</th>
                                            <th>Sender Batch Id</th>
                                            <th>Amount</th>
                                            <th>Receiver Email</th>
                                            <th>Batch Status</th>
                                            <th>Date</th>
                                            {{-- <th>Date</th> --}}

                                        </tr>
                                    </thead>
                                    @php
                                        $num = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($user->withdrawlog as $logs)
                                            <tr style="font-size: smaller;">
                                                {{-- {{dd($logs)}} --}}
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $logs->payout_batch_id ?? '-' }}</td>
                                                <td>{{ $logs->sender_batch_id ?? '-' }}</td>
                                                <td>${{ $logs->amount ?? '0' }}</td>
                                                <td>${{ $logs->receiver_email ?? ' ' }}</td>
                                                <td>{{ $logs->batch_status ?? '-' }}</td>
                                                <td>{{ $logs->created_at->format('d/m/Y') ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    {{-- Custom pagination --}}
    <script>
        // function openorderModal(e) {
        $('.customModelOpen').on("click", function() {
            var data = $(this).data('detail');
            console.log(data);
            var modalContent = $('#orderContent');
            var table = document.createElement('table');
            table.classList.add('table', 'table-bordered');

            // Create a table header
            var thead = document.createElement('thead');
            thead.innerHTML =
                '<tr><th>S.No</th><th>Quantity</th><th>Price</th><th>Product Title</th><th>Product Subtitle</th><th>Product Image</th></tr>';
            table.appendChild(thead);

            // Create a table body
            var tbody = document.createElement('tbody');

            // Iterate through product_details and create table rows
            data.product_details.forEach(function(productDetail, index) {
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + (index + 1) + '</td>' +
                    '<td>' + productDetail.quantity + '</td>' +
                    '<td>' + '$' + productDetail.product.fdp + '</td>' +
                    '<td>' + productDetail.product.title + '</td>' +
                    '<td>' + productDetail.product.subtitle + '</td>' +
                        '</td><td><a href="{{ URL::asset('+productDetail.product.image+' != null ? env('MEDIA_URL') : null) }}' +
                            productDetail.product.image +
                            '" target="_blank"><img  width="50px" style="height: 50px" class="img-circle" src="{{ URL::asset(env('MEDIA_URL')) }}' +
                            productDetail.product.image + '" /></a></td></tr> <br>';

                console.log(productDetail);
                tbody.appendChild(row);
            });

            table.appendChild(tbody);

            // Empty the modal content and append the table
            modalContent.empty();
            modalContent.append(table);

            // Show the modal
            $('#surveyModal').modal('show');
        });
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAquzgo847shlU-SpPXLZMgShv6EW9pQmw&callback=initMap"></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of the marker
            const lati = document.getElementById("lat").value;
            const long1 = document.getElementById("long").value;
            const uluru = {
                lat: parseFloat(lati),
                lng: parseFloat(long1)
            };

            // Create a geocoder object
            const geocoder = new google.maps.Geocoder();

            // Reverse geocode the location to get the address
            geocoder.geocode({
                location: uluru
            }, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        // Extract the formatted address
                        const address = results[0].formatted_address;

                        // The map, centered at the marker
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 20,
                            center: uluru,
                        });

                        // The marker, positioned at the marker location
                        const marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                        });

                        // Create an info window to display the location name
                        const infowindow = new google.maps.InfoWindow({
                            content: address,
                        });

                        // Open the info window when the marker is clicked
                        marker.addListener("click", () => {
                            infowindow.open(map, marker);
                        });
                    } else {
                        console.log("No results found");
                    }
                } else {
                    console.log("Geocoder failed due to: " + status);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable11').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTableorder').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTableLogs').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTable2').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
    </script>
@endsection
