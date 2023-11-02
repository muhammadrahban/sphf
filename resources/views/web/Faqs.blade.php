@extends('web.master')
@section('webcontain')

    <main>
        <style>
            h5[aria-expanded] .fa{
                display: none;
            }
            h5[aria-expanded="true"] .fa-minus{
                color:#FDBE44;
                display: block !important;
            }
            h5[aria-expanded="false"] .fa-plus{
                display: block !important;
            }
            .accordion div+div{
                border-top:1px solid rgba(255,255,255,0.1);
            }
        </style>
        <section style="background-image: url('{{asset('images/breadcrumb.jpg')}}'); background-size:cover;">
            <div class="container py-5">
                <h1 class="my-5 text-white text-center text-lg-left">Faqs</h1>
            </div>
        </section>
        <section style="background-color: #144047; background-image: url('{{asset('images/bg-10.png')}}'); background-repeat: no-repeat;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <label class="leading-line text-light">Question & answers</label>
                        <h1 class="text-white">How donating with SPHF Donor Platform works</h1>
                        <p class="text-light">Here are some commonly asked questions (FAQs) along with their detailed answers.</p>
                        <div class="row">
                            <div class="col-12 px-0">
                                <div class="accordion" id="myAccordion" style="background-color: rgba(0,0,0,0.1);">
                                    <!-- Accordion Item 1 -->
                                    <div>
                                        <div class="card-header p-0" id="heading1">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                <span class="text-white mr-3">
                                                    1. How can I donate to the flood relief efforts?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Donors have two options on SPHF Donor Platform. First is to Transfer funds to SPHF and assign them to disburse to relevant beneficiaries. Second is to Adopt a beneficiary by selecting beneficiaries they would like to donate to and making the donation.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 2 -->
                                    <div>
                                        <div class="card-header p-0" id="heading2">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                <span class="text-white mr-3">
                                                    2. What is the impact of my donation?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Flood 2022 in Pakistan caused significant damage to homes and displaced numerous families. By directing your donation towards constructing resilient houses, you contribute to meeting an immediate need. Resilient houses are designed to withstand floodwaters, reducing the risk of damage and ensuring the safety of the affected individuals.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 3 -->
                                    <div>
                                        <div class="card-header p-0" id="heading3">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                <span class="text-white mr-3">
                                                    3. What is the minimum donation amount?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                The cost of building one house is Rs. 300,000. You’re requested to make donations equivalent to number of house(s) you want to sponsor construction in Sindh. For e.g. sponsoring 3 houses means a donation of Rs. 900,000.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 4 -->
                                    <div>
                                        <div class="card-header p-0" id="heading4">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                <span class="text-white mr-3">
                                                    4. Is tax applied on my donation?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Yes
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 5 -->
                                    <div>
                                        <div class="card-header p-0" id="heading5">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                <span class="text-white mr-3">
                                                    5. Will I receive a receipt for my donation?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Once you submit donation, you will receive e-receipt on e-mail & browser generated by the platform itself. You can also login into their donor account to view their donation history and e-receipt.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 6 -->
                                    <div>
                                        <div class="card-header p-0" id="heading6">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                <span class="text-white mr-3">
                                                    6. Do beneficiaries receive the entire house grant in one go?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                No. The donation amount is disbursed in four installments after verification of the beneficiaries’ profiles and completion of consecutive building phases (four).
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 7 -->
                                    <div>
                                        <div class="card-header p-0" id="heading7">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                <span class="text-white mr-3">
                                                    7. Can I track the progress made as result of my donation?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Yes. In case you have opted for Adopt a Beneficiary option, you can log in to your donor account to view and track your donation.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 8 -->
                                    <div>
                                        <div class="card-header p-0" id="heading8">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                <span class="text-white mr-3">
                                                    8. Can I choose the specific beneficiaries I want to support?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Yes. In case you have opted for Adopt a Beneficiary option, you can log in to your donor account to view and track your donation.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 9 -->
                                    <div>
                                        <div class="card-header p-0" id="heading9">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                                <span class="text-white mr-3">
                                                    9. How are the beneficiaries selected and verified?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                A Management Information System (MIS) has been implemented to ensure a transparent and clear process for assessing and verifying damage to houses affected by the 2022 floods in Sindh. The MIS includes a mobile app called GoS Survey, which allows for inspections and verification at different stages of house reconstruction. The goal is to provide a detailed view of the process, down to individual beneficiaries
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 10 -->
                                    <div>
                                        <div class="card-header p-0" id="heading10">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                                <span class="text-white mr-3">
                                                    10. How can I contact the organization for further inquiries or assistance?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Feel free to reach us at <a href="www.sphf.gos.pk/contact-us">www.sphf.gos.pk/contact-us</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add more Accordion Items here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="background-image: url('{{asset('images/bg-6.jpg')}}'); background-size: cover; background-position: center;">
                        <div style="min-height: 300px;"></div>
                    </div>
                </div>

            </div>
        </section>
    </main>
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
     --}}

  @endsection

