 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 {{-- <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                         aria-expanded="false"><span class="hide-menu"> --}}
                 {{-- <h4>{{ auth()->user()->full_name }}</h4> --}}
                 </span></a>

                 <ul aria-expanded="false" class="collapse">
{{--
                     <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                     <li><a href="{{ route('password.request') }}"><i class="ti-settings"></i> Reset Password</a>
                         </li> --}}


                     {{-- logout form --}}
                     {{-- <li>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                             <a class="waves-effect waves-dark" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"
                                 aria-expanded="false">
                                 <i class="icon-logout"></i>
                                 <span class="hide-menu">Log Out</span>
                             </a>
                         </li> --}}
                 </ul>
                 </li>
                 {{-- <li class="nav-small-cap">--- PERSONAL</li> --}}
                 <li> <a class="waves-effect waves-dark" title="Activities" href="{{ Route('activity.list') }}"><i
                             class="fas fa-bell">

                             <div class="notify">
                                 <span class="heartbit"></span>
                             </div>

                         </i><span class="hide-menu">

                             <span id="data-container" class="badge rounded-pill bg-cyan ms-auto"></span>

                             Activities
                         </span>
                     </a>
                 <li> <a class="waves-effect waves-dark" title="Dashboard" href="{{ url('/') }}"><i
                             class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                 {{-- <li> <a class="waves-effect waves-dark" title="Customers Management" href="{{ Route('customer.list') }}"><i
                             class="fa fa-users "></i><span class="hide-menu">Customers Management</span></a> --}}
                 <li> <a class="waves-effect waves-dark" title="Caregivers Management" href="{{ Route('user.list') }}"><i
                             class="fas fa-users"></i></i><span class="hide-menu">Users Management</span></a>
                 <li>
                 <li> <a class="waves-effect waves-dark" title="Content Management" href="{{ Route('content.list') }}"><i
                             class="fa fa-tag"></i><span class="hide-menu">Content Management</span></a>
                 <li> <a class="waves-effect waves-dark" title="Offer Management" href="{{ Route('offer.list') }}"><i
                    class="fa fa-coins" aria-hidden="true"></i></i><span
                             class="hide-menu">Offer Management</span></a>
                 <li> <a class="waves-effect waves-dark" title="Reward Management"
                         href="{{ Route('reward.list') }}"><i class="fas fa-award"></i><span
                             class="hide-menu">Reward Management</span></a>
                             <li> <a title="survey Management" class=" waves-effect waves-dark" href="{{route('survey.list')}}"><i class="fa fa-check-circle"></i><span class="hide-menu">survey Management</span></a>
                             <li> <a title="product Management" class=" waves-effect waves-dark" href="{{route('product.list')}}"><i class="fas fa-shopping-cart"></i><span class="hide-menu">product Management</span></a>
                 <li> <a class="waves-effect waves-dark" title="Settings Management"
                         href="{{ Route('setting.list') }}"><i class=" fas fa-cog"></i><span
                             class="hide-menu">Settings</span></a>
                     {{-- <li> <a class="waves-effect waves-dark" title="Discounts List" href="{{ Route('Discounts.list') }}"><i
                             class="fa fa-percent"></i><span class="hide-menu">Discounts</span></a> --}}
                 <li> <a class="waves-effect waves-dark" title="Faqs Management"
                         href="{{ Route('faqs.list') }}"><i class="fa fa-question"></i><span
                             class="hide-menu">Faqs Management</span></a>
                 {{-- <li> <a class="waves-effect waves-dark" title="Appointment Dispute"
                         href="{{ Route('disputeList.List') }}"><i class="fa fa-question"></i><span
                             class="hide-menu">Appointment Dispute</span></a> --}}
                     {{-- <li> <a class="waves-effect waves-dark" title="Address" href=""><i
                             class="fas fa-map-marker"></i><span class="hide-menu">Addresses</span></a> --}}
                     {{-- <li> <a class="waves-effect waves-dark" title="Location" href=""><i
                             class="fas fa-map-marker-alt"></i><span class="hide-menu">Locations</span></a> --}}
                     {{-- <li> <a class="waves-effect waves-dark" title="Faqs" href=""><i
                             class="fa fa-question"></i><span class="hide-menu">Faqs</span></a>
                 </li> --}}
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <script>
    function getData() {
        $.ajax({
            url: '{{Route("activity.count")}}',
            success: function(data) {
                // Update the data container with the new data
                $('#data-container').html(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Call the getData function every 5 seconds
    setInterval(getData, 4000);
</script>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
