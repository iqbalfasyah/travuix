@extends('layouts.checkout')
@section('title', 'Checkout')

@section('content')
    
<main>
    <section class="section-details-header">

    </section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-8">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item )
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h1>Who is Going?</h1>
                        <p>Trip to {{ $item->TravelPackage->title }}, {{ $item->TravelPackage->location }}</p>

                        <div class="attendee table-responsive-sm">
                            <table class="table table-borderless text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Visa</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                        @forelse ($item->TransactionDetail as $objDetail)
                                        <tr>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name={{ $objDetail->username }}" height="60">
                                            </td>
                                            <td class="align-middle">{{ $objDetail->username }}</td>
                                            <td class="align-middle">{{ $objDetail->nationality }}</td>
                                            <td class="align-middle">{{ $objDetail->is_visa ? "30 Days" : "N/A" }}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate($objDetail->doe_passport) > \Carbon\Carbon::now() ? "Active" : "Inactive" }}</td>
                                            <td class="align-middle">
                                                <a href="{{ route('checkout-remove',$objDetail->id) }}">
                                                    <img src="{{ url('frontend/assets/images/ic_remove.png')}}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                       
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No  Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="post">
                                @csrf
                                <div class="g-4 row">
                                        <div class="col-sm-3">
                                            <label for="username" class="visually-hidden">Name</label>
                                            <input type="text" name="username" class="form-control mb-2 me-sm-2"
                                                id="username" placeholder="Username" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <label for="nationality" class="visually-hidden">Name</label>
                                            <input type="text" name="nationality" class="form-control mb-2 me-sm-2"
                                                id="nationality" placeholder="Nationality" required>
                                        </div>
                                    <div class="col-sm-3">
                                        <label for="is_visa" class="visually-hidden">Visa</label>
                                        <select name="is_visa" id="is_visa"
                                            class="form-control custom-select mb-2 me-sm-2">
                                            <option value="" selected>VISA</option>
                                            <option value="1">30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                                        <div class="input-group mb-2 me-sm-2">
                                            <input type="text" class="form-control datepicker" id="doe_passport"
                                                placeholder="DOE Passport" name="doe_passport">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-block btn-add-now mb-2 px-4">Add Now</button>
                                    </div>
                                </div>
                            </form>

                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">You are only able to invite member that has registered in
                                Nomads.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">

                        <h2>Checkout Informations</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">{{ $item->TransactionDetail->count() }} person</td>
                            </tr>
                            <tr>
                                <th width="50%">Additional VISA</th>
                                <td width="50%" class="text-right">$ {{ $item->additional_visa }}.00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Pice</th>
                                <td width="50%" class="text-right">$ {{ $item->TravelPackage->price }}.00 / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">$ {{ $item->transaction_total }}.00</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique Code)</th>
                                <td width="50%" class="text-right">
                                    <span class="text-blue">$ {{ $item->transaction_total }}.</span>
                                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">Please complete your payment before to continue the wonderful
                            trip</p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/assets/images/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT IFUIX ID</h3>
                                    <p>2700411713
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/assets/images/ic_bank.png')}}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT IFUIX ID</h3>
                                    <p>0852 1122 2122
                                        <br>
                                        Bank Syariah Indonesia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="join-container">
                        <a href="{{route('checkout-success', $item->id)}}" class="btn w-100 btn-join-now mt-3 py-2">
                            I Have Made Payment
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{route('detail', $item->TravelPackage->slug)}}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
    </section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/assets/libraries/gijgo/css/gijgo.min.css')}}">
    
@endpush

@push('addon-script')
<script src="{{url('frontend/assets/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            uilibrary: 'bootstrap5',
            icons: {
                rightIcon: '<img src="{{url('frontend/assets/images/ic_doe.png')}}"/>'
            }
        })
    })
</script>
@endpush