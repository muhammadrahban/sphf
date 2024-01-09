<footer style="background-color: #144047;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="d-flex flex-column">
                    <img class="mb-3" src="{{asset('images/SPHF-donor-logo-white.png')}}" alt="logo" width="150">
                    <p class="text-light text-justify footer_paragraph">
                       The SPHF Donor Platform serves as a convenient and secure channel for individuals and organizations looking to contribute online donations towards the construction of resilient houses for flood-affected individuals in Sindh, Pakistan. This user-friendly platform enables users to easily register, choose their preferred donation option, complete the payment process, and monitor the impact of their contributions.
                    </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-white mb-5">Links</h4>
                        <a href="{{route('web.home')}}" class="p-link text-white d-block mb-3">Why & How Donate</a>
                        <a href="{{route('filterView')}}" class="p-link text-white d-block mb-3">Explore Beneficiaries</a>
                        <a href="{{route('register.doner')}}" class="p-link text-white d-block mb-3">Become a Donor</a>
                        <a href="{{route('web.faqs')}}" class="p-link text-white d-block mb-3">Donor FAQs</a>
                       
                    </div>
                    <div class="col-md-4">
                        <h4 class="text-white mb-5">Contact</h4>
                        <a href="#" class="p-link text-white d-block mb-3"><i class="fa fa-map-marker"></i> Bungalow no. 20, Block 7/8, Modern Cooperative Housing Society, Karachi.</a>
                        <a href="#" class="p-link text-white d-block mb-3"><i class="fa fa-envelope"></i> Donations@sphf.gos.pk</a>
                        <a href="#" class="p-link text-white d-block mb-3"><i class="fa fa-phone"></i> +92 21 99334119-20</a>
                         <a href="#" class="p-link text-white mr-3">Privacy</a>
                        <a href="#" class="p-link text-white ">Terms</a>

                    </div>
                    <div class="col-md-4">
                        <h4 class="text-white mb-0">Sow Seeds of Change: Sponsor a home</h4>
                        <div class="text-right">
                            <img src="{{asset('images/arrow-3.png')}}">
                        </div>
                        <a class="btn p-2 nav-btn-secondary" href="{{route('becom.doner')}}">
                            <span class="px-2" style="color:#fff;">DONATE NOW</span>
                            <i class="fa fa-heart text-warning"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border-color:gray;">
        <div class="row">
            <div class="col-md-6 ">
                <p class="text-white mb-4 text-center text-md-left">© 2023 Copyrights by HTA. All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <a href="https://www.facebook.com/sindhpeopleshousing/" class="p-2 text-light"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/SphfOfficial" class="p-2 text-light"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/sphfofficial/" class="p-2 text-light"><i class="fab fa-instagram"></i></a>
                {{-- <a href="#" class="p-2 text-light"><i class="fab fa-pinterest"></i></a> --}}
            </div>
        </div>
    </div>
</footer>
