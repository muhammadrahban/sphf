@extends('web.master')
@section('webcontain')
    <main>
        <section class="container my-5" style="max-width: 90% !important;">
            <div class="row">
                <div class="col-md-3 px-3 py-2 pt-4" style="background-color: #f5f5f5; border-radius: 5px;">
                    @include('web.partials.admin_header')
                </div>
                <div class="col-md-9 p-5 bg-light">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <table class="table bg-white text-center">
                                <thead>
                                    <tr>
                                        <td>ID Number</td>
                                        <td colspan="2">My Benificiaries</td>
                                        <td>Transction</td>
                                        <td>Transction status</td>
                                        <td>Amount Disbursed</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donation as $item)
                                        <tr>
                                            <td class="text-success text-nowrap align-middle">{{$item->id}}</td>
                                            <td><img class="avatar"></td>
                                            <td class="text-left align-middle">
                                                <h6>{{$item->victim->da_occupant_name}}</h6>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6>{{ $item->DonationInvoice->transaction_type }}</h6>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6>{{ $item->DonationInvoice->transaction_status }}</h6>
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                <h6>PKR {{ $item->DonationInvoice->total_amount }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <b>Showing 10 of 10 Banificiaries</b>
                        </div>
                        <div class="col-md-6">
                            {{-- <nav aria-label="Page navigation example" >
                                <ul class="pagination ml-auto mr-0" style="width: fit-content;">
                                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
