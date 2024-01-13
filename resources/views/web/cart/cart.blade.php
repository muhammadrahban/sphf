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
    <section style="background-image: url('{{asset('images/Your-Benificiary-List-banner.jpg')}}'); background-size:cover;">
        <div class="container py-5">
            <h1 class="my-5 text-white text-center text-lg-left">Your Beneficiary List</h1>
        </div>
    </section>
    <section>
        <div class="container py-5">
            <table class="table table-bordered text-center checkout-list">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Your Selected Beneficiaries</th>
                        <th>Your Donation</th>
                        <th>House Sponsored</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (@$foundItems as $item)
                        <tr>
                            <td>
                                <a href="{{ route('cart.remove', $item->id) }}" type="button" class="btn btn-warning mx-2">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <div class="rounded-background" id="profile-background">
                                        <span class="initial-letter">{{ substr($item['da_occupant_name'], 0, 1) }}</span>
                                    </div>
                               {{--  <img src="{{asset('images/adopt-beneficiary-01.jpg')}}" width="70" height="70" class="rounded-circle">--}}
                            </td>
                            <td>
                                <div class="d-flex flex-column mx-3 text-left">
                                    <h5 class="bg-title">{{ $item['da_occupant_name'] }}</h5>
                                    <div class="d-flex" style="font-size: 18px;">
                                        <p class="text-primary mr-4"><i class="fa fa-bars" aria-hidden="true"></i>
                                            {{ $item['widows'] != 0 ? 'Widow ' : '' }}
                                            {{ $item['women_with_disable_husband'] != 0 ? 'Women ' : '' }}
                                            {{ $item['unaccompained_elders_over_the_age_of_60'] != 0 ? 'Elderly ' : '' }}
                                            {{ $item['people_with_disability_physically_or_mentally'] != 0 ? 'Differntly Abled ' : '' }}
                                        </p>
                                        <a href="#" class="text-secondary mx-4"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item['district'] }} / {{ $item['tehsil'] }}</a>
                                        <a href="#" class="text-secondary mx-4">{{session()->get('currency')}} {{number_format(@$item['price'], 0)}}</a>
                                    </div>
                                    <p class="m-0 w-auto rounded text-center my-3" style="background-color: #ececec;">Beneficiary CNIC {{ !$item['da_cnic'] ? 'not' : '' }} available</p>
                                </div>
                            </td>
                            <td>
                                <p class="text-secondary m-0" style="font-size: 18px;">{{session()->get('currency')}} {{number_format($item['price'], 0)}}</p>
                            </td>
                            <td>
                                <p class="text-secondary m-0" style="font-size: 18px;">1</p>
                            </td>
                            <td>
                                <p class="text-secondary m-0" style="font-size: 18px;">{{session()->get('currency')}} {{number_format($item['price'], 0)}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <p class="text-dark m-0" style="font-size: 18px;">Showing {{$count}} of {{$count}} Beneficiaries</p>
                        </td>
                        <td colspan="2">
                            <a href="{{route('filterView')}}" class="btn btn-warning mx-2 btn-block">UPDATE YOUR LIST</a>
                        </td>
                        {{-- <td colspan="2">
                            <button type="button" class="btn btn-warning mx-2 p-3 font-weight btn-block">
                                UPDATE YOUR LIST
                            </button>
                        </td> --}}
                    </tr>
                </tfoot>
            </table>
            <h1 class="py-4 bg-title">Your Beneficiaries & Donation Summary</h1>
            <table class="table table-bordered checkout-list">
                <tbody>
                    <tr>
                        <td>
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Beneficiaries</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{$count}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Houses Sponsored</p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{$count}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--<p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Donation Amount &nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 14px; font-weight: 400;" class="text-secondary">(Exempted from all kind of taxes)</span></p>-->
                            <p class="text-dark m-0 font-weight-bold" style="font-size: 18px;">Total Donation Amount &nbsp;&nbsp;&nbsp;&nbsp; </p>
                        </td>
                        <td>
                            <p class="text-secondary m-0 text-center" style="font-size: 18px;">{{session()->get('currency')}} {{number_format($count * @$item['price'], 0)}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="py-4">
                @if (count($foundItems) > 0)
                    <a href="{{route('user.paymentuser')}}" class="btn btn-warning mx-2 float-right ">
                        Proceed To Checkout &nbsp;&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>
</main>
   <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        $(Document).ready(function(){
            // $('.rounded-background').css('background-color', getRandomColor());
            $('.rounded-background').each(function() {
                $(this).css('background-color', getRandomColor());
            });
        })
        // document.get('').style.backgroundColor = getRandomColor();

        function clear_all_button() {
            $('#clear_all_form').find(':input').each(function() {
                if (this.type !== 'submit' && this.type !== 'button' && this.type !== 'hidden') {
                    $(this).val('');
                }
            });
        }

        $('#select_all').click(function() {

            var isChecked = this.checked;
            $('.searchable-item input[type="checkbox"]').each(function() {
                this.checked = isChecked;
            });

        })
    </script>
@endsection
