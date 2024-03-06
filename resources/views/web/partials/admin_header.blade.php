<div class="border border-secondary border-0 border-bottom-1">
    <div class="d-flex justify-content-center align-items-center">
        <div class="rounded-background" style="background-color: #148b9b">
            @php
                $initials   = strtoupper(substr(auth()->user()->first_name, 0, 1));
                $last       = strtoupper(substr(auth()->user()->last_name, 0, 1));
            @endphp
            <span class="initial-letter">{{ $initials }}{{$last}}</span>
        </div>
        <div class="d-flex flex-column">
            <h3 class="bg-title" style="font-size: 25px;"> {{auth()->user()->first_name}} {{auth()->user()->last_name}} </h3>
            <h5 class="" style="font-size: 18px; color: #2c95d5;"> {{auth()->user()->city}}, {{auth()->user()->country}} </h5>
        </div>
    </div>
    <hr style="border-top: 3px solid gray; margin: 15px 45px;">
</div>
<div class="pl-5" style="/* background-color: #f6f6f6 !important; */">
    <div id="left-menu">
        <ul>
            <li class="{{ Route::currentRouteName() == 'web.dashboard' ? 'active' : '' }} ">
                <a href="{{ route('web.dashboard') }}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Route::currentRouteName() == 'web.profile' ? 'active' : '' }}">
                <a href="{{ route('web.profile') }}">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="{{ Route::currentRouteName() == 'web.track' ? 'active' : '' }}">
                <a href="{{ route('web.track') }}">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    <span>Track Beneficiaries</span>
                </a>
            </li>

            <li class="{{ Route::currentRouteName() == 'web.donation' ? 'active' : '' }}">
                <a href="{{ route('web.donation') }}">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <span>Donation History</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Logout</span>
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>