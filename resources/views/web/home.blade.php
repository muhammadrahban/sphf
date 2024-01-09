@extends('web.master')
@section('webcontain')
    <main>
        <section class="home-slider slider">
            <div class="slide" style="background-image: url('{{ asset('images/home_banner/SPHF-Banner-Ov.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-white display-1 font-weight-bold mb-4">Empower Communities, Empower Lives</h1>
                            <h4 class="text-white mb-5">Join the Largest Housing Rehabilitation Program – 2.1 Million
                                Resilient Houses Need Your Support</h4>
                            <a href="#hdws" target="_self" class="btn text-white primary_button rounded-0 px-4 py-3">LEARN
                                MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('images/home_banner/SPHF-Banner-Ov-02.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-white display-1 font-weight-bold mb-4">Impact Beyond Walls</h1>

                            <h4 class="text-white mb-5">Join us in Creating Resilient Housing for Vulnerable Communities</h4>

                        </div>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('images/home_banner/SPHF-Banner-Ov-03.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <h1 class="text-white display-1 font-weight-bold mb-4">Invest in Resilience</h1>
                            <h4 class="text-white mb-5">Give the gift of homes that rise above disaster</h4>

                            <a href="/adopt-beneficiary" class="btn text-white primary_button rounded-0 px-4 py-3">ADOPT A BENEFICIARY</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('images/home_banner/SPHF-Banner-Ov-04.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10">
                            <h1 class="text-white display-1 font-weight-bold mb-4">Together Against Adversity</h1>
                            <h4 class="text-white mb-5">Your Support Builds Homes for a Steadfast Tomorrow</h4>
                            <a href="/sphf/public/transfer-sphf"
                                class="btn text-white primary_button rounded-0 px-4 py-3">TRANSFER TO SPHF</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="box-slider slider" id="hdws">
            <!--1-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-01.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>70%</h4>
                        <p class="mb-0">SINDH SUBMERGED UNDER FLOOD</p>
                    </div>
                </div>
            </div>
            <!--2-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-02.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>85%</h4>
                        <p class="mb-0">KATCHA HOUSES DAMAGED</p>
                    </div>
                </div>
            </div>
            <!--3-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-03.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>$5.5 BILLION </h4>
                        <p class="mb-0">DAMAGES</p>
                    </div>
                </div>
            </div>
            <!--4-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-04.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>2.1 MILLION</h4>
                        <p class="mb-0">HOUSES DESTROYED</p>
                    </div>
                </div>
            </div>
            <!--5-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-05.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>12.36 MILLION</h4>
                        <p class="mb-0">PEOPLE AFFECTED</p>
                    </div>
                </div>
            </div>
            <!--6-->
            <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-10.jpg') }}');">
                <div class="cover">
                    <div>
                        <h4>24</h4>
                        <p class="mb-0">DISTRICTS CALAMITY HIT</p>
                    </div>
                </div>
            </div>
            <!-- <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-06.jpg') }}');">
                    <div class="cover">
                        <div>
                            <h4>$1000</h4>
                            <p class="mb-0">ONE HOME COST</p>
                        </div>
                    </div>
                </div>
                    <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-07.jpg') }}');">
                    <div class="cover">
                        <div>
                            <h4>10,000+</h4>
                            <p class="mb-0">HOUSE GRANTS GIVEN</p>
                        </div>
                    </div>
                </div>
                    <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-08.jpg') }}');">
                    <div class="cover">
                        <div>
                            <h4>2500+</h4>
                            <p class="mb-0">WOMEN-LED CONSTRUCTIONS</p>
                        </div>
                    </div>
                </div>
                    <div class="slide" style="background-image: url('{{ asset('images/Slider_box_home/images-09.jpg') }}');">
                    <div class="cover">
                        <div>
                            <h4>700,000</h4>
                            <p class="mb-0">DAMAGE ASSESSMENT CONDUCTED</p>
                        </div>
                    </div>
                </div>-->

        </section>

        <section class="container">
            <div class="row my-5">
                <!--<div class="col-lg-6">
                        <label class="leading-line">Simple, transparent & joyful</label>
                        <h1>How donating with SPHF Donor Platform works</h1>
                        <p>In order to help the flood affectees build their resilient houses in Sindh, you can donate as an individual or organization, whether you are located in Pakistan or overseas.</p>
                        <p>Each beneficiary under the <a href="http://www.sphf.gos.pk/" class="p-link"> Sindh People’s Housing for Flood Affectees (SPHF) program</a> is to receive PKR. 300,000 to build their home. The amount is to be disbursed in installments after verification of their profile and completion of building phases.</p>
                        <p class="mb-5">Donors have two options. First is to explore and select beneficiaries online and donate directly to them. Second is to transfer funds to SPHF and assign them to disburse to relevant beneficiaries. Donations are processed securely online through various payment options. All donations made through the SPHF platform are online via credit/ debit card and bank transfer and securely processed with help of our technology, banking and legal partners.</p>
                    </div>-->

                <!-- Umer Code Strat -->
                <div class="col-lg-6">
                    <!-- <label class="leading-line">Simple, transparent & joyful</label>-->
                    <h1>How donating with SPHF Donor Platform works</h1>
                    <p class="text-justify">Supporting the beneficiaries who lost their homes in the floods of 2022 in
                        Sindh, Pakistan, is a simple process with the SPHF Donor Platform. Individuals and organizations,
                        both local and overseas, can contribute to the construction of resilient homes.</p>
                    <p class="text-justify">Under the <a href="http://www.sphf.gos.pk/" class="p-link">Sindh People’s
                            Housing for Flood Affectees (SPHF)</a> program, each beneficiary is designated to receive PKR
                        300,000 for their home reconstruction. This ensures that each contribution has a meaningful impact
                        on the ground.</p>
                    <p class="text-justify">Donors have two options for contributing. The first option is to 'Adopt a
                        Beneficiary,' allowing donors to explore and select beneficiaries online for a more personalized
                        connection. The second option is to transfer funds directly to SPHF, which will be assigned and
                        disbursed to the relevant beneficiaries.</p>
                    <p class="text-justify">Donations are securely processed online through various payment options,
                        including credit/debit cards and bank transfers. The SPHF platform ensures the security and
                        transparency of every donation with the assistance of its Management Information System (MIS) and
                        banking partners.</p>
                    <p class="text-justify">With a global reach, the SPHF Donor Platform accepts contributions from
                        individuals and organizations worldwide. This inclusivity allows everyone to play a part in the
                        global effort to rebuild resilient homes in Sindh.</p>
                    <p class="text-justify">The online experience on the SPHF Donor Platform is user-friendly, allowing
                        donors to explore and contribute securely. Join the collective effort to rebuild communities
                        affected by the floods.</p>
                </div>
                <!-- Umer Code End -->

                <div class="col-lg-6">
                    <div class="row mt-5 mb-1">
                        <div class="col-md-6">

                            <div class="custom-card orange p-4 text-right mb-4"
                                style="width: 100%; min-height:200px; background-color: #df5311; height:90%;">
                                <!--<i class="fa-5x far fa-heart text-light"></i>-->

                                 </a><img  style="width: 70px; height: 70px;" src="{{asset('images/Home_icon/Icons-04.svg')}}">
                               <a href="/adopt-beneficiary"> <h4 class="text-light text-left">Register</h4></a>
                                <a href="/adopt-beneficiary"><p class="text-light text-left">Signing up as a donor is quick, easy, systematic and secure</p></a>
                            </div>  
                        </div>
                        <div class="col-md-6 ">
                            <div class="custom-card orange p-4 text-right mb-4" style="width: 100%; min-height:200px; background-color: #FBB329; height:90%">
                               <!-- <i class="fa-5x far fa-heart text-light"></i>-->
                                 <img  style="width: 70px; height: 70px;" src="{{asset('images/Home_icon/Icons-05.svg')}}">
                               <a href="/sphf/public/transfer-sphf">  <h4 class="text-light text-left">Transfer to </br>SPHF</h4></a>
                               <a href="/sphf/public/transfer-sphf"> <p class="text-light text-left">Confide in SPHF with your donations.</p></a>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="custom-card orange p-4 text-right mb-4" style="width: 100%; min-height:200px; background-color: #138999; height:90%">
                                <!--<i class="fa-5x far fa-heart text-light"></i>-->
                                 <img  style="width: 70px; height: 70px;" src="{{asset('images/Home_icon/Icons-06.svg')}}">
                               <a href="/adopt-beneficiary">  <h4 class="text-light text-left">Adopt a Beneficiary</h4></a>
                               <a href="/adopt-beneficiary">  <p class="text-light text-left">Select & foster personalized connection with beneficiaries.</p></a>

                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="custom-card orange p-4 text-right mb-4"
                                style="width: 100%; min-height:200px; background-color: #138999; height:90%">
                                <!--<i class="fa-5x far fa-heart text-light"></i>-->
                                <img style="width: 70px; height: 70px;"
                                    src="{{ asset('images/Home_icon/Icons-06.svg') }}">
                                <a href="/sphf/public/doner/register">
                                    <h4 class="text-light text-left">Adopt a Beneficiary</h4>
                                </a>
                                <a href="/sphf/public/doner/register">
                                    <p class="text-light text-left">Select & foster personalized connection with
                                        beneficiaries.</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="custom-card orange p-4 text-right mb-4"
                                style="width: 100%; min-height:200px; background-color: #8139e7; height:90%;">
                                <!--<i class="fa-5x far fa-heart text-light"></i>-->
                                <img style="width: 70px; height: 70px;"
                                    src="{{ asset('images/Home_icon/Icons-04.svg') }}">
                                <a href="/sphf/public/doner/login">
                                    <h4 class="text-light text-left">Track</h4><a />
                                    <a href="/sphf/public/doner/login">
                                        <p class="text-light text-left">Track the use of your donated funds for updates</p>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="{{ asset('images/Slider_box_home/images-01.jpg') }}" alt="First slide" style="height: 300px !important;">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="{{ asset('images/Slider_box_home/images-02.jpg') }}" alt="Second slide" style="height: 300px !important;">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="{{ asset('images/Slider_box_home/images-01.jpg') }}" alt="Third slide" style="height: 300px !important;">
                            </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>-->
                </div>
            </div>
        </section>

        <section
            style="position: relative; background-image: url('{{ asset('images/bg-2.jpg') }}'); background-size: cover; background-attachment: fixed;">
            <div class="overlay"></div>
            <div class="container my-5 py-5 text-center">
                <div class="my-5 col-md-10 mx-auto">
                    <a href="https://youtu.be/m86jWvYeoJY" class="video-link">
                        <i class="fa fa-play"></i>
                        <span></span>
                    </a>
                    <h5 class="text-white my-5">Watch the Impact of Your Generosity</h5>
                    <h1 class="text-white mb-5">Building homes with disaster-ready designs – where resilience meets the
                        blueprint for a secure tomorrow</h1>
                    <a href="#our_donors" class="btn text-white primary_button rounded-0 px-4 py-3">OUR DONORS</a>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row mb-4 align-items-center">
                    <div class="col-lg-8 col-md-6">
                        <label class="leading-line">Support people to build homes</label>
                        <h1 class="mb-4">Explore & adopt a beneficiary</h1>
                    </div>
                    <div class="col-lg-4 col-md-6 text-left text-md-right">

                        <a href="/adopt-beneficiary" class="btn text-white primary_button rounded-0 px-4 py-3">ADOPT A BENEFICIARY</a>
                    </div>
                </div>
                    <div class="box-slider-2 slider">
    <!--1-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_khairpur.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px;">KHAIRPUR</label>
            <h4 class="text-white">275,644 <small>Affected by 2022 Floods</small> </h4>
            <!--<div class="progress">
                <div style="width:11%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">11%</span>
>>>>>>> Stashed changes
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">275,644 </h4>
            </div>-->
        </div>
    </div>
     
    <!--2-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Dadu.png')}}');">
                            <div class="overlay"></div>
                            <div class="cover p-4">
                                <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a;  font-size: 15px">DADU</label>
                                <h4 class="text-white">164,103<small>Affected by 2022 Floods</small></h4>
                                <!--<div class="progress">
                                    <div style="width:9.4%; background-color: #ceaa6a;">
                                        <span style="background-color: #ceaa6a;">9.4%</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-white"><small>Beneficiaries</small></h5>
                                    <h4 class="text-white">164,103</h4>
                                </div>-->
                            </div>
    </div>

    <!--3-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_kamber_shahdatkot.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px;">KAMBER SHAHDADKOT</label>
            <h4 class="text-white">143,017 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:0.9%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">0.9%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">143,017 </h4>
            </div>-->
        </div>
    </div>

    <!--4-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_naushro_feroz.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px">NAUSHERO FEROZ</label>
            <h4 class="text-white">143,323 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:8%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">8%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">143,323</h4>
            </div>-->
        </div>
    </div>

    <!--5-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_shaheed_benazirabad.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px">SHAHEED BENAZIRABAD</label>
            <h4 class="text-white">114,181 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:6.1%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">6.1%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">114,181</h4>
            </div>-->
        </div>
    </div>

    <!--6-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_jacobabad.png')}}');">
                <div class="overlay"></div>
                <div class="cover p-4">
                    <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #df5311; font-size: 15px;">JACOBABAD</label>
                    <h4 class="text-white">112,411 <small>Affected by 2022 Floods</small></h4>
                    <!--<div class="progress">
                        <div style="width:10%; background-color: #df5311;">
                            <span style="background-color: #df5311;">10%</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-white"><small>Beneficiaries</small></h5>
                        <h4 class="text-white">112,411 </h4>
                    </div>-->
                </div>
    </div>

    <!--7-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_sanghar.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px;">SANGHAR</label>
            <h4 class="text-white">105,864 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:4.5%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">4.5%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">105,864 </h4>
            </div>-->
        </div>
    </div>

    <!--8-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_sukkur.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7;  font-size: 15px">SUKHAR</label>
            <h4 class="text-white">83,417 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:15%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">15%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">83,417</h4>
            </div>-->
        </div>
    </div>

    <!--9-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Ghotki.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px;">GHOTKI</label>
            <h4 class="text-white">85,162  <small>Affected by 2022 Floods</small></h4>
        <!--  <div class="progress">
                <div style="width:4.8%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">4.8%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">85,162 </h4>
            </div>-->
        </div>
    </div>

    <!--10-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Mirpurkhas.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px;">MIRPURKHAS</label>
            <h4 class="text-white">86,269 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:17%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">17%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">86,269 </h4>
            </div>-->
        </div>
    </div>

    <!--11-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_shikarpur.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px;">SHIKARPUR</label>
            <h4 class="text-white">89,791 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:7%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">7%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">89,791 </h4>
            </div>-->
        </div>
    </div>

    <!--12-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_omerkot.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7;  font-size: 15px">UMERKOT</label>
            <h4 class="text-white">68,092 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:5.8%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">5.8%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">68,092</h4>
            </div>-->
        </div>
    </div>

    <!--13-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Kashmore.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px">KASHMORE</label>
            <h4 class="text-white">76,278 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:6.1%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">6.1%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">76,278 </h4>
            </div>-->
        </div>
    </div>

    <!--14-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Tando_Allahyar.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7;">TANDO ALLAHYAR</label>
            <h4 class="text-white">30,116 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:3.2%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">3.2%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">30,116 </h4>
            </div>-->
        </div>
    </div>

    <!--15-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_jamshoro.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px">JAMSHORO</label>
            <h4 class="text-white">60,609 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:5.4%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">5.4%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">60,609</h4>
            </div>-->
        </div>
    </div>

    <!--16-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_sujawal.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a; font-size: 15px;">SUJAWAL</label>
            <h4 class="text-white">52,615 <small>Affected by 2022 Floods</small></h4>
        <!--   <div class="progress">
                <div style="width:6.2%; background-color: #ceaa6a;">
                    <span style="background-color: #ceaa6a;">6.2%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">52,615 </h4>
            </div>-->
        </div>
    </div>

    <!--17-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Matiari.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #df5311; font-size: 15px;">MATIARI</label>
            <h4 class="text-white">46,485 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:5.6%; background-color: #df5311;">
                    <span style="background-color: #df5311;">5.6%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">46,485 </h4>
            </div>-->
        </div>
    </div>

    <!--18-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_unknow.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #df5311;  font-size: 15px">THATTA</label>
            <h4 class="text-white">24,716 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:2.3%; background-color: #df5311;">
                    <span style="background-color: #df5311;">2.3%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">24,716</h4>
            </div>-->
        </div>
    </div>

    <!--19-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img-24.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px">HYDERABAD</label>
            <h4 class="text-white">20,008 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:0.2%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">0.2%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">20,008 </h4>
            </div>-->
        </div>
    </div>

    <!--20-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_tando_muhammad_khan.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #df5311; font-size: 15px;">TANDO MUHAMMAD KHAN</label>
            <h4 class="text-white">28,456 <small>Affected by 2022 Floods</small></h4>
            <!-- <div class="progress">
                <div style="width:2.05%; background-color: #df5311;">
                    <span style="background-color: #df5311;">2.05%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">28,456 </h4>
            </div>-->
        </div>
    </div>

    <!--21-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Badin.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px;">BADIN</label>
            <h4 class="text-white">111,179 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:6%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">6%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">111,179 </h4>
            </div>-->
        </div>
    </div>

    <!--22-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Larkana.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <h4 class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7; font-size: 15px;">LARKANA</h4>
            <h4 class="text-white">131,896 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:26%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">26%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">131,806 </h4>
            </div>-->
        </div>
    </div>

    <!--23-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Tando_Allahyar.png')}}');">
        <div class="overlay"></div>
        <div class="cover p-4">
            <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #8139e7;">TANDO ALLAHYAR</label>
            <h4 class="text-white">30,116 <small>Affected by 2022 Floods</small></h4>
            <!--<div class="progress">
                <div style="width:3.2%; background-color: #8139e7;">
                    <span style="background-color: #8139e7;">3.2%</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="text-white"><small>Beneficiaries</small></h5>
                <h4 class="text-white">30,116 </h4>
            </div>-->
        </div>
    </div>

    <!--24-->
    <div class="slide" style="background-image: url('{{asset('images/home_adopt_beneficiary/Img_Malir.png')}}');">
                            <div class="overlay"></div>
                            <div class="cover p-4">
                                <label class="badge badge-warning text-white px-2 py-1 rounded-0" style="background-color: #ceaa6a;  font-size: 15px">MALIR</label>
                                <h4 class="text-white">55 <small>Affected by 2022 Floods</small></h4>
                                <!--<div class="progress">
                                    <div style="width:0.2%; background-color: #ceaa6a;">
                                        <span style="background-color: #ceaa6a;">0.2%</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-white"><small>Beneficiaries</small></h5>
                                    <h4 class="text-white">55</h4>
                                </div>-->
                            </div>
    </div>
    </div>
            </div>
        </section>

        <section>
            <div class="container" id="DdSPHF">
                <div class="row mx-0 my-5">
                    <div class="col-md-6 p-3 p-md-5 order-2 order-md-1" style="background: #144047;">
                        <h4 class="text-warning">Direct your donations to SPHF</h4>
                        <h3 class="text-white">Empower Change, Impact Lives</h3>

                        <form action="">
                            <div style="margin-top: 20%;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form_span input_symbol">Rs</span>
                                        <input id="amount" name="amount" type="text" class="form_input_amount" min="1000">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="btn alert-success" id="currency">
                                            <option value="PKR" data-symbol="₨">PKR - Pakistani Rupee</option>
                                            <option value="USD" data-symbol="$">USD - United States Dollar</option>
                                            <option value="EUR" data-symbol="€">Euro - European Union</option>
                                            <option value="GBP" data-symbol="£">GBP - Great British Pound</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between flex-wrap">
                                        <div class="static__amount">
                                            <button type="button" onclick="selectAmount(this,300000)" data-amount="300000" data-symbal="PKR" class="form_price_btn">
                                                <h4 class="mb-0">
                                                    <span class="input_symbol">₨</span> 300,000
                                                </h4>
                                            </button>
                                        </div>
                                        <div class="static__amount">
                                            <button type="button" onclick="selectAmount(this,600000)" data-amount="600000" data-symbal="PKR" class="form_price_btn">
                                                <h4 class="mb-0"><span class="input_symbol">₨</span> 600,000</h4>
                                            </button>
                                        </div>
                                        <div class="static__amount">
                                            <button type="button" onclick="selectAmount(this,900000)" data-amount="900000" data-symbal="PKR" class="form_price_btn">
                                                <h4 class="mb-0"><span class="input_symbol">₨</span> 900,000</h4>
                                            </button>
                                        </div>
                                        <div class="static__amount">
                                            <button type="button" onclick="selectAmount(this,'custom')" data-amount="custom" class="form_price_btn"><h4 class="mb-0">Custom Amount</h4></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--<button type="button" data-toggle="modal" data-target="#modelId" class="form_submit_btn">DONATE</button>-->
                                        <a href="{{ route('becom.doner') }}" type="button"
                                            class="form_submit_btn form_price_btn" style="color:white">DONATE</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6 order-1 order-md-2 p-0 form-cover"
                        style="background-image: url('{{ asset('images/Transfer-you-donation-overlay-02.jpg') }}');">
                        <div class="overlay"></div>
                        <div class="cover p-3 p-md-5">
                            <h3 class="text-white">Adopt a Home for 300,000 PKR</h3>
                            <label class="text-white">Join the Movement for Relief, Renewal, and Hope</label>
                            <!-- <div class="progress">
                                    <div style="width:33.1%; background-color: #df5311;">
                                        <span style="background-color: #df5311;">33.1%</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-white">Rs 727,300,000 <small>Raised</small></h5>
                                    <h5 class="text-white">Rs 2,200,000,000 <small>Goal</small></h5>
                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="our_donors">
            <div class="container">
                <div class="text-center">
                    <label class="leading-line">Creating joy & impact</label>
                    <h1>Our Donors</h1>
                </div>
                <div class="row my-5">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <img class="img-fluid" src="{{ asset('images/our_donor/world_bank.png') }}">
                        <div class="text-center"
                            style="background-color:#8139E7; background-image: url('{{ asset('images/shape-1.png') }}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">
                            <div class="video-link" style="background-color: white;margin-top:-46px ">
                                <!--<i class="fa fa-2x mt-4 fa-pills" style="color:#8139E7"></i>-->
                                <img style="width: 50px; height: 50px;" src="{{ asset('images/Home_icon/WB.svg') }}">
                            </div>
                            <div class="p-4">
                                <h3 class="text-white">World Bank</h3>
                                <p class="text-white">The World Bank has allocated $500 million to assist in the
                                    reconstruction of houses affected by the 2022 floods. The bank is offering technical
                                    assistance to shape and execute a comprehensive reconstruction plan, ensuring an
                                    informed and beneficiary-focused approach to the reconstruction program.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <img class="img-fluid" src="{{ asset('images/our_donor/govt_of_sindh.png') }}">
                        <div class="text-center"
                            style="background-color:#df5311; background-image: url('{{ asset('images/shape-1.png') }}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">
                            <div class="video-link" style="background-color: white; margin-top:-46px">
                                <!--<i class="fa fa-2x mt-4 fa-pills" style="color:#df5311"></i>-->
                                <img style="width: 50px; height: 50px;" src="{{ asset('images/Home_icon/GS.svg') }}">
                            </div>
                            <div class="p-4">
                                <h3 class="text-white">Government of Sindh</h3>
                                <p class="text-white">The Government of Sindh (GoS) has initiated the Sindh People’s
                                    Housing for Flood Affectees (SPHF), a Section 42 company. In a display of long-term
                                    commitment, the government has contributed $227 million for the construction of houses.
                                    The beneficiaries will be awarded land titles, reinforcing the government's enduring
                                    support for those affected by the floods.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="h-100"
                            style="position:relative; background-image:url('{{ asset('images/our_donor/make_a_difference.jpg') }}'); background-size: cover; background-position: center;">
                            <div class="overlay" style="background-color: #1389999e;"></div>
                            <div class="p-5" style="position: relative;">
                                <!--<i class="far fa-4x mt-4 fa-heart text-white"></i>-->
                                <img style="width: 70px; height: 70px;"
                                    src="{{ asset('images/Home_icon/Icons-03.svg') }}">
                                <h2 class="text-white">Let’s make a difference in the lives of other people</h2>
                                <div class="text-right">
                                    <img src="{{ asset('images/shape-arrow.png') }}">
                                    <a href="#"
                                        class="btn btn-block text-white primary_button rounded-0 px-4 py-3 mt-3"
                                        style="background-color: #fdbe44;">OUR DONORS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- <section style="background-color: #f1f6f7;">
                <div class="container py-5">
                    <div class="logo-slider">
                        <div class="slide text-center">
                            <img src="{{ asset('images/logo-01_.png') }}" class="img-fluid partner-logo mx-auto">
                        </div>
                        <div class="slide text-center">
                            <img src="{{ asset('images/logo-02_.png') }}" class="img-fluid partner-logo mx-auto">
                        </div>
                    </div>
                </div>
<<<<<<< Updated upstream
            </section>-->

        <!-- Umer Code Strat -->
        <section style="background-color: #f1f6f7;">
            <div class="container py-3 ">
                <div class="row text-center ">
                    <div class="col">
                        <img src="{{ asset('/images/Client_logo/logo-01.svg') }}" class="img-fluid partner-logo mx-auto "
                            style="width: 150px; height: 150px;">
                        <h5>Internal Auditor</h5>
                    </div>
                    <div class="col  ">
                        <img src="{{ asset('/images/Client_logo/logo-02.svg') }}" class="img-fluid partner-logo mx-auto "
                            style="width: 150px; height: 150px;">
                        <h5>Execution Partner</h5>
                    </div>
                    <div class="col   ">
                        <img src="{{ asset('/images/Client_logo/logo-03.svg') }}" class="img-fluid partner-logo mx-auto "
                            style="width: 150px; height: 150px;">
                        <h5>MIS Partner</h5>
                    </div>
                    <div class="col   ">
                        <img src="{{ asset('/images/Client_logo/logo-04.svg') }}" class="img-fluid partner-logo mx-auto"
                            style="width: 150px; height: 150px;">
                        <h5>Internal Auditor</h5>
                    </div>
                    <div class="col  ">
                        <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto"
                            style="width: 150px; height: 150px;">
                        <h5>Technology Partner</h5>
                    </div>
                </div>
            </div>
        </section>

        <!--<section>-->
        <!--    <img src="{{ asset('images/bg-2.jpg') }}" class="img-fluid partner-logo mx-auto" style="width:100%; height: 500px;" >-->
        <!--  </section>-->

        <!--  <section class="box-slider  box_center">-->

        <!--      <div class="slide box_last  ">-->
        <!--          <div class="text-center" >-->
        <!--              <div>-->
        <!--                <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >-->
        <!--                  <h5>Technology Partner</h5>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->

        <!--        <div class="slide box_last">-->
        <!--          <div class="text-center" >-->
        <!--              <div>-->
        <!--                <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >-->
        <!--                   <div class="video-link" style="background-color: #df5311; margin-top:-46px">-->
        <!--                          <p>Technology Partner</p>-->
        <!--                      </div>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->

        <!--         <div class="slide box_last">-->
        <!--          <div class="text-center" >-->
        <!--              <div>-->
        <!--                <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >-->
        <!--                  <h5>Technology Partner</h5>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->

        <!--         <div class="slide box_last">-->
        <!--          <div class="text-center" >-->
        <!--              <div>-->
        <!--                <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >-->
        <!--                  <h5>Technology Partner</h5>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->

        <!--         <div class="slide box_last">-->
        <!--          <div class="text-center" >-->
        <!--              <div>-->
        <!--                <img src="{{ asset('/images/Client_logo/logo-05.svg') }}" class="img-fluid partner-logo mx-auto" style="width: 200px; height: 200px;" >-->
        <!--                  <h5>Technology Partner</h5>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->




        <!--  </section>-->

        <!--       <section>-->
        <!--      <div class="container">-->
        <!--          <div class="row my-5">-->
        <!--              <div class="col-lg-6 col-md-12 mb-4">-->
        <!--                  <div class="text-center" style="background-color:#8139E7; background-image: url('{{ asset('images/shape-1.png') }}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">-->
        <!--                      <div class="p-4">-->
        <!--                          <h3 class="text-white">Our Pastners</h3>-->
        <!--                          <p class="text-white">The World Bank has allocated $500 million to assist in the reconstruction of houses affected by the 2022 floods. The bank is offering technical assistance to shape and execute a comprehensive reconstruction plan, ensuring an informed and beneficiary-focused approach to the reconstruction program.</p>-->
        <!--                      </div>-->
        <!--                  </div>-->
        <!--              </div>-->
        <!--              <div class="col-lg-6 col-md-12 mb-4">-->
        <!--                  <div class="text-center" style="background-color:#df5311; background-image: url('{{ asset('images/shape-1.png') }}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">-->
        <!--                      <div class="p-4">-->
        <!--                          <h3>Government of Sindh</h3>-->
        <!--                          <p >The Government of Sindh (GoS) has initiated the Sindh People’s Housing for Flood Affectees (SPHF), a Section 42 company. In a display of long-term commitment, the government has contributed $227 million for the construction of houses. The beneficiaries will be awarded land titles, reinforcing the government's enduring support for those affected by the floods.</p>-->
        <!--                      </div>-->
        <!--                  </div>-->
        <!--              </div>-->
        <!--          </div>-->
        <!--      </div>-->
        <!--  </section>-->

        <!-- Umer Code End -->
=======
            </div>
        </section>-->
        
         <!-- Umer Code Strat -->
        <!--<section style="background-color: #f1f6f7;">-->
        <!--  <div class="container py-3 ">-->
        <!--        <div class="row text-center ">-->
        <!--            <div class="col">-->
        <!--                <img src="{{asset('/images/Client_logo/logo-01.svg')}}" class="img-fluid partner-logo mx-auto "  style="width: 150px; height: 150px;" >-->
        <!--                <h5>Internal Auditor</h5>-->
        <!--            </div>-->
        <!--            <div class="col  ">-->
        <!--                <img src="{{asset('/images/Client_logo/logo-02.svg')}}" class="img-fluid partner-logo mx-auto "  style="width: 150px; height: 150px;" >-->
        <!--                <h5>Execution Partner</h5>-->
        <!--            </div>-->
        <!--            <div class="col   ">-->
        <!--                <img src="{{asset('/images/Client_logo/logo-03.svg')}}" class="img-fluid partner-logo mx-auto "  style="width: 150px; height: 150px;" >-->
        <!--                <h5>MIS Partner</h5>-->
        <!--            </div>-->
        <!--            <div class="col   ">-->
        <!--                <img src="{{asset('/images/Client_logo/logo-04.svg')}}" class="img-fluid partner-logo mx-auto"  style="width: 150px; height: 150px;" >-->
        <!--                <h5>Internal Auditor</h5>-->
        <!--            </div>-->
        <!--            <div class="col  ">-->
        <!--                <img src="{{asset('/images/Client_logo/logo-05.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 150px; height: 150px;" >-->
        <!--                <h5>Technology Partner</h5>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        
      <section>
          <img src="{{asset('images/bg_4.jpg')}}" class="img-fluid partner-logo mx-auto" style="width:100%; height: 500px;" >
        </section>

        <section class="box-slider  box_center">
            
            <div class="slide box_last  ">
                <div class="text-center" >
                    <div>
                      <img src="{{asset('/images/Client_logo/logo-02.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >
                         <div class="text-center"  style="margin-top:6% ; margin-left:10% ; margin-right:10% ; ">
                                    <p href="#" class="btn btn-block text-white  rounded-0" style="background-color: #df5311;">Execution Partner</p>
                                </div>
                    </div>
                </div>
            </div>
            
              <div class="slide box_last">
                <div class="text-center" >
                    <div>
                      <img src="{{asset('/images/Client_logo/logo-03.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >
                          <div class="text-center"  style="margin-top:6% ; margin-left:10% ; margin-right:10% ; ">
                                    <p href="#" class="btn btn-block text-white  rounded-0 " style="background-color: #df5311;">MIS Partner</p>
                                </div>
                    </div>
                </div>
            </div>
            
               <div class="slide box_last">
                <div class="text-center" >
                    <div>
                      <img src="{{asset('/images/Client_logo/logo-04.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >
                        <div class="text-center"  style="margin-top:6% ; margin-left:10% ; margin-right:10% ; ">
                                    <p href="#" class="btn btn-block text-white  rounded-0 " style="background-color: #df5311;">Internal Auditor</p>
                                </div>
                    </div>
                </div>
            </div>
            
               <div class="slide box_last">
                <div class="text-center" >
                    <div>
                      <img src="{{asset('/images/Client_logo/logo-01.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >
                         <div class="text-center"  style="margin-top:6%; margin-left:10% ; margin-right:10% ; ">
                                    <p href="#" class="btn btn-block text-white  rounded-0" style="background-color: #df5311;">Statuary Auditor</p>
                                </div>
                    </div>
                </div>
            </div>
            
               <div class="slide box_last">
                <div class="text-center" >
                    <div>
                      <img src="{{asset('/images/Client_logo/logo-05.svg')}}" class="img-fluid partner-logo mx-auto" style="width: 180px; height: 150px;" >
                         <div class="text-center"  style="margin-top:6%; margin-left:5% ; margin-right:5% ; ">
                                    <p href="#" class="btn btn-block text-white  rounded-0 " style="background-color: #df5311;">Technology Partner</p>
                                </div>
                    </div>
                </div>
            </div>



           
        </section>
        
             <section>
            <div class="container">
                <div class="row my-5">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="text-justify" style="background-image: url('{{asset('images/shape-1.png')}}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">
                            <div >
                                <h2 ><label class="leading-line">Our Pastners</label></h2>
                                <p >In order to implement the SPHF (Execution, Implementation, Communication, and Technology)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 mb-4">
                        <div class="text-justify"  style="background-image: url('{{asset('images/shape-1.png')}}'); background-repeat: no-repeat; background-position: bottom left; height:60%;">
                            <div class="p-4">
                                <p >We have formed a dynamic organization with top-tier partners. This ensures a comprehensive approach across key pillars, enhancing our capabilities in executing tasks with excellence, implementing seamlessly, communicating effectively, and utilizing rigotous technology. this collaborative and robust framework positions us for success in achieving our strategic objectives.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
         <!-- Umer Code End -->

    </main>


    <style>
        .box_last {
            width: 198px !important;
            height: 200px;
            /* Set your desired height */
            background-color: #f1f6f7;
            /* White background color */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Box shadow for a subtle effect */
        }

        .box_center {
            margin: 0 auto;
            /* Center the section horizontally */
            max-width: 1200px;
            /* Optional: Set a max-width for the section */
            margin-top: -100px;
        }
    </style>



    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="modelId" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-8">
                            <span class="form_span">Rs</span><input type="text" readonly class="form_input_amount"
                                value="1000">
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Select Payment Method</h4>
                    <hr>
                    <div class="px-3">
                        <input type="radio" name="payment" id="payment1" selected value="Test Donation">
                        <label for="payment1">Test Donation</label>

                        <input type="radio" name="payment" id="payment2" value="Offline Donation">
                        <label for="payment2">Offline Donation</label>
                    </div>
                    <h4>Personal Info</h4>
                    <hr>
                    <div class="row py-2">
                        <div class="col-md-2">
                            <label for="title">Title<span style="color: red;">*</span></label>
                            <select name="title" id="title" class="form-control">
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Ms">Ms.</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="firstname">First Name <span style="color: red;">*</span></label>
                            <input type="text" name="firstname" class="form-control" id="firstname"
                                placeholder="First Name">
                        </div>
                        <div class="col-md-5">
                            <label for="lastname">Last Name <span style="color: red;">*</span></label>
                            <input type="text" name="lastname" class="form-control" id="lastname"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="companyname">Company Name <span style="color: red;">*</span></label>
                            <input type="text" name="companyname" class="form-control" id="companyname"
                                placeholder="Company Name">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="email_address">Email Address <span style="color: red;">*</span></label>
                            <input type="text" name="email_address" class="form-control" id="email_address"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <input type="checkbox" name="anonymous" id="anonymous">
                            <label for="anonymous">Make this an anonymous donation.</label>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="comment">Comment <span style="color: red;">*</span></label>
                            <textarea name="comment" class="form-control" id="comment" placeholder="Leave a comment"></textarea>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Donation Total</div>
                                </div>
                                <input type="text" class="form-control" id="total_donation" placeholder="Rs300,000"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="form_submit_btn btn-block">DONATE NOW</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/slick.min.js')}}"></script> --}}
@endsection
