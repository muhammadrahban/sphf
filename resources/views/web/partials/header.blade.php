<header class="top-bar d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <a href="#" class="p-2 text-light">
                    <i class="fa fa-phone-alt text-warning mr-2"></i>
                    +92 111 111 111
                </a>
                <a href="#" class="p-2 text-light">
                    <i class="fas fa-envelope text-warning"></i>
                    donor@sphf.gos.pk
                </a>
                <a href="{{route('web.faqs')}}" class="p-2 text-light">
                    <i class="fa fa-info text-warning"></i>
                    Donor FAQs
                </a>
            </div>
            <!-- social icon-->
            <div class="col-md-6 text-right">
                <div class="d-flex align-items-center  justify-content-end">
                    <div class="px-3 top-bar-icons-bg">
                        <div class="d-flex align-items-center">
                            <a href="#" class="p-2 text-light"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="p-2 text-light"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="p-2 text-light"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="p-2 text-light"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="d-flex align-items-center">
                            <a class="p-2" href="#">
                                <i style="position:relative; z-index:0" class="fas fa-heart text-light"></i>
                                <span class="cart-indicator">{{ count(session('cart', [])) }}</span>
                            </a>
                            <a class="waves-effect waves-dark" href="#"><i class="fas fa-search text-light"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<header class="top-bar mobile d-block d-md-none" style="background: #144047;">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <a href="#" class="p-2 text-light">
                    <i class="fa fa-phone-alt text-warning mr-2"></i>
                    <small>+92 111 111 111</small>
                </a>
            </div>
            <!-- social icon-->
            <div class="col-6 text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="#" class="p-2 text-light"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="p-2 text-light"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="p-2 text-light"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="p-2 text-light"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="stickey-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/SPHF-donor-logo.png')}}" alt="SPHF-donor-logo" width="150">
            </a>
            <div class="d-none d-md-flex">
                <a href="#" class="underline-link p-2">Why & How Donate</a>
                <a href="#" class="underline-link p-2">Track Your Donation</a>
            </div>
            <div class="d-none d-md-flex">
                <a class="btn p-2 nav-btn-secondary mx-2 text-white"  href="{{route('becom.doner')}}">
                    <span class="px-2">TRANSFER TO SPHF</span>
                    <i class="fa fa-heart text-warning"></i>
                </a>
                @auth
                    <a class="btn p-2 nav-btn-primary mx-2 text-white" href="{{route('filterView')}}">
                        <span class="px-2">ADOPT A BENEFICIARY</span>
                        <i class="fa fa-heart text-warning"></i>
                    </a>
                @else
                    <a class="btn p-2 nav-btn-primary mx-2 text-white" href="{{route('register.doner')}}">
                        <span class="px-2">ADOPT A BENEFICIARY</span>
                        <i class="fa fa-heart text-warning"></i>
                    </a>
                @endauth
            </div>
            @auth
            <a href="#" class="underline-link p-2 d-none d-md-block">My Account</a>
            @else
                <a href="{{route('login.doner')}}" class="underline-link p-2 d-none d-md-block">Login</a>
            @endauth
            <a href="javascript:void(0);" onclick="$('.mobile-nav').addClass('open')" class="p-3 d-block d-md-none"><i class="fa fa-2x fa-bars"></i></a>
        </div>
    </div>
</nav>

<div class="mobile-nav">
    <div class="d-flex justify-content-between" style="background-color: #F1F6F7;">
        <a class="navbar-brand" href="#">
            <img class="mx-2" src="{{asset('images/SPHF-donor-logo.png')}}" alt="SPHF-donor-logo" height="40">
        </a>
        <a href="javascript:void(0);" onclick="$('.mobile-nav').removeClass('open')" class="btn py-2 px-3 rounded-0" style="background-color: #df5311;">
            <i class="mt-2 fa fa-times-circle text-white"></i>
        </a>
    </div>
    <div class="p-3" style="height: calc(100vh - 50px); overflow-y: auto; overflow-x: hidden;">
        <a href="#" class="btn btn-lg btn-block text-left px-0 mb-2 border-bottom-1">Why & How Donate</a>
        <a href="#" class="btn btn-lg btn-block text-left px-0 mb-2 border-bottom-1">Track Your Donation</a>
        <button class="btn btn-block p-2 nav-btn-secondary d-flex align-items-center justify-content-between">
            <span class="px-2">TRANSFER TO SPHF</span>
            <i class="fa fa-heart text-warning"></i>
        </button>
        <a class="btn btn-block p-2 nav-btn-primary d-flex align-items-center justify-content-between text-white" href="adopt-a-beneficiary.html">
            <span class="px-2">ADOPT A BENEFICIARY</span>
            <i class="fa fa-heart text-warning"></i>
        </a>
        <a href="#" class="btn btn-lg btn-block text-left px-0 mb-2 border-bottom-1">Login</a>
    </div>
</div>
