@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-3 py-2 pt-4" style="background-color: #f5f5f5; border-radius: 5px;">
                    @include('web.partials.admin_header')
                </div>
                <div class="col-md-9 px-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Donation</span>
                                            <span class="h3 font-bold mb-0">PKR {{ number_format(($count * 300000), 0) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Victims</span>
                                            <span class="h3 font-bold mb-0">{{ $count }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Phase 1</span>
                                            <span class="h3 font-bold mb-0">{{ $count_phase_one }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Phase 2</span>
                                            <span class="h3 font-bold mb-0">{{ $count_phase_two }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Phase 3</span>
                                            <span class="h3 font-bold mb-0">{{ $count_phase_three }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Phase 4</span>
                                            <span class="h3 font-bold mb-0">{{ $count_phase_four }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow border-0 mt-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">House Completed</span>
                                            <span class="h3 font-bold mb-0">{{ $count_completed }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
