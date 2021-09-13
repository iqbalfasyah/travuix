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
                        <h1>Who is Going?</h1>
                        <p>Trip to Ubud, Bali, Indonesia</p>

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
                                    <tr>
                                        <td>
                                            <img src="frontend/assets/images/avatar-1.png" height="60">
                                        </td>
                                        <td class="align-middle">Angga Risky</td>
                                        <td class="align-middle">CN</td>
                                        <td class="align-middle">N/A</td>
                                        <td class="align-middle">Active</td>
                                        <td class="align-middle">
                                            <a href="">
                                                <img src="frontend/assets/images/ic_remove.png" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="frontend/assets/images/avatar-2.png" height="60">
                                        </td>
                                        <td class="align-middle">Galih Pratama</td>
                                        <td class="align-middle">SC</td>
                                        <td class="align-middle">30 Days</td>
                                        <td class="align-middle">Active</td>
                                        <td class="align-middle">
                                            <a href="">
                                                <img src="frontend/assets/images/ic_remove.png" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="member mt-3">
                            <h2>Add Member</h2>
                            <form action="" class="form-inline">
                                <div class="g-4 row">
                                    <div class="col-sm-3">
                                        <label for="inputUsername" class="visually-hidden">Name</label>
                                        <input type="text" name="inputUsername" class="form-control mb-2 me-sm-2"
                                            id="inputUsername" placeholder="Username">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inputVisa" class="visually-hidden">Visa</label>
                                        <select name="inputVisa" id="inputVisa"
                                            class="form-control custom-select mb-2 me-sm-2">
                                            <option value="VISA" selected>VISA</option>
                                            <option value="30 Days">30 Days</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="doePassport" class="visually-hidden">DOE Passport</label>
                                        <div class="input-group mb-2 me-sm-2">
                                            <input type="text" class="form-control datepicker" id="doePassport"
                                                placeholder="DOE Passport">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
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
                                <td width="50%" class="text-right">2 person</td>
                            </tr>
                            <tr>
                                <th width="50%">dditional VISA</th>
                                <td width="50%" class="text-right">$ 190.00</td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Pice</th>
                                <td width="50%" class="text-right">$ 80.00 / person</td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">$ 280.00</td>
                            </tr>
                            <tr>
                                <th width="50%">Total (+Unique Code)</th>
                                <td width="50%" class="text-right">
                                    <span class="text-blue">$ 279.</span>
                                    <span class="text-orange">33</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Payment Instructions</h2>
                        <p class="payment-instructions">Please complete your payment before to continue the wonderful
                            trip</p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="frontend/assets/images/ic_bank.png" alt="" class="bank-image">
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
                                <img src="frontend/assets/images/ic_bank.png" alt="" class="bank-image">
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
                        <a href="{{route('checkout-success')}}" class="btn w-100 btn-join-now mt-3 py-2">
                            I Have Made Payment
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{route('detail')}}" class="text-muted">Cancel Booking</a>
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
            uilibrary: 'bootstrap5',
            icons: {
                rightIcon: '<img src="{{url('frontend/assets/images/ic_doe.png')}}"/>'
            }
        })
    })
</script>
@endpush