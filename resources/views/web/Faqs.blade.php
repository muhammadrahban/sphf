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
                                                    1. What is SPHF donor platform ?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                The SPHF Donor Platform is an online system that facilitates and streamlines the process of contributing to the Sindh People’s Housing for Flood Affectees (SPHF) program. It serves as a digital space where donors (Individuals & and organizations) can securely make contributions and engage in initiatives aimed at constructing resilient homes for those affected by floods in Sindh, Pakistan.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 2 -->
                                    <div>
                                        <div class="card-header p-0" id="heading2">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                <span class="text-white mr-3">
                                                    2. How will my donation create a positive impact?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Your donation for resilient houses for flood-affected individuals has the potential to bring about a transformative impact in the lives of those affected by the 2022 floods in Sindh. Your contribution to the construction of resilient homes offers a vital lifeline to families in need, providing a secure and durable shelter amidst the challenges in the aftermath of the floods. Beyond the immediate relief, your support plays a crucial role in strengthening communities against future floods, as the constructed houses are specifically designed to withstand adverse weather conditions. This not only safeguards families from displacement but also lays the foundation for long-term resilience. Your generosity extends beyond shelter, becoming a cornerstone in the effort to empower communities and enhance their capacity to withstand future challenges.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 3 -->
                                    <div>
                                        <div class="card-header p-0" id="heading3">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                <span class="text-white mr-3">
                                                    3. What is Direct Transfer to SPHF ?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                A direct transfer to SPHF implies that the donor prefers not to individually select beneficiaries but instead entrusts SPHF with the responsibility of choosing and disbursing funds to relevant beneficiaries
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 4 -->
                                    <div>
                                        <div class="card-header p-0" id="heading4">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                <span class="text-white mr-3">
                                                    4. What is adopt a beneficiary?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Adopt a Beneficiary" is a personalized donation approach where you have the opportunity to select a specific beneficiary based on criteria such as district, tehsil, deh, UC, gender, and vulnerability. Once chosen, SPHF will transfer the funds directly to the selected beneficiary, ensuring a direct and targeted impact on the recipient you have personally identified. This approach adds a meaningful and individualized dimension to your contribution.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 5 -->
                                    <div>
                                        <div class="card-header p-0" id="heading5">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                <span class="text-white mr-3">
                                                    5. In how many installments are funds transferred to beneficiaries?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                The funds are disbursed to the beneficiaries in four installments. After the beneficiary becomes eligible for the grant, an initial amount of 75,000 PKR is transferred for excavation, followed by 100,000 PKR after the completion and certification of the plinth. Another installment of 100,000 PKR is transferred after the completion of the lintel, and a final amount of 25,000 PKR is disbursed upon the completion of the roof. 
The phased allocation is linked with certifications, ensuring adherence to resilient construction guidelines at each stage of the process. This approach guarantees that the construction progresses systematically, meeting the necessary standards and certifications to ensure the creation of resilient homes.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 6 -->
                                    <div>
                                        <div class="card-header p-0" id="heading6">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                <span class="text-white mr-3">
                                                    6. How are the beneficiaries selected and verified?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                The beneficiaries are selected and verified through the implementation of a Management Information System (MIS), designed to guarantee transparency in the damage assessment and validation process for houses affected by the 2022 floods in Sindh. This MIS incorporates a mobile app, encompassing 130 fields and questions pertaining to General Information, Family and Occupant details, Location Information, Land Ownership, Damage Intensity, as well as the submission of bank account details and document images.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 7 -->
                                    <div>
                                        <div class="card-header p-0" id="heading7">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                <span class="text-white mr-3">
                                                    7. Can I track my donations?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                Yes, you can track your donations by accessing the "Track Your Donation" link on this portal.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 8 -->
                                    <div>
                                        <div class="card-header p-0" id="heading8">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                <span class="text-white mr-3">
                                                    8. What is the minimum donation amount required to sponsor the construction of a single house?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                The minimum donation amount required to sponsor the construction of a house in Sindh is Rs. 300,000. Each house costs Rs. 300,000, and you are encouraged to make donations equivalent to the number of houses you wish to sponsor. For example, sponsoring three houses would require a donation of Rs. 900,000. Your support will contribute to providing homes for those in need in Sindh.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 9 -->
                                    <div>
                                        <div class="card-header p-0" id="heading9">
                                            <h5 class="mb-0 p-3 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                                <span class="text-white mr-3">
                                                    9. How may I get in touch with the organization for additional inquiries or assistance?
                                                </span>
                                                <i class="fa fa-minus"></i>
                                                <i class="fa fa-plus text-white"></i>
                                            </h5>
                                        </div>
                                        <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#myAccordion">
                                            <div class="card-body text-light p-3">
                                                For any further inquiries or assistance, please don't hesitate to contact the organization through our website at <a href="www.sphf.gos.pk/contact-us">www.sphf.gos.pk/contact-us </a>. We welcome your questions and are here to help.
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 10 -->
                                    <!--
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
-->
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

