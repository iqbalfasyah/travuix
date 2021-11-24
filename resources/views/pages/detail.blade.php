@extends('layouts.app')

@section('title', 'Detail Travel')

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
                                    <li class="breadcrumb-item active">
                                        Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 pl-lg-8">
                            <div class="card card-details">
                                <h1>{{ $TravelPackage->title }}</h1>
                                <p>{{ $TravelPackage->location }}</p>
                                @if($TravelPackage->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img style="object-fit:cover;" width='800' height='420'  src="{{ Storage::url($TravelPackage->galleries->first()->image) }}" class="xzoom" id="xzoom-default"
                                            xoriginal="{{ Storage::url($TravelPackage->galleries->first()->image) }}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($TravelPackage->galleries as $item)
                                        <a href="{{ Storage::url($item->image) }}">
                                            <img  style="object-fit: cover;" src="{{ Storage::url($item->image) }}" class="xzoom-gallery" width="128" height="86"
                                                xpreview="{{ Storage::url($item->image) }}">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <h2>About</h2>
                                <p>{{$TravelPackage->about}}
                                </p>

                                <div class="features row">
                                    <div class="col-md-4">
                                        <img src="{{ url('frontend/assets/event-1.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Featured Event</h3>
                                            <p>{{ $TravelPackage->featured_event }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <img src="{{ url('frontend/assets/event-2.png') }}" alt="" class="features-image">
                                        <div class="description">
                                            <h3>Language</h3>
                                            <p>{{ $TravelPackage->language }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border-left">
                                        <div class="description">
                                            <img src="{{ url('frontend/assets/event-3.png') }}" alt="" class="features-image">
                                            <div class="description">
                                                <h3>Foods</h3>
                                                <p>{{ $TravelPackage->foods }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-details card-right">
                                <h2>Members are going</h2>
                                <div class="members my-2">
                                    <img src="/frontend/assets/member-1.png" alt="" class="member-image mr-1">
                                    <img src="/frontend/assets/member-2.png" alt="" class="member-image mr-1">
                                    <img src="/frontend/assets/member-3.png" alt="" class="member-image mr-1">
                                    <img src="/frontend/assets/member-4.png" alt="" class="member-image mr-1">
                                    <img src="/frontend/assets/member-5.png" alt="" class="member-image mr-1">
                                </div>
                                <hr>
                                <h2>Trip Informations</h2>
                                <table class="trip-information">
                                    <tr>
                                        <th width="50%">Date of Departure</th>
                                        <td width="50%" class="text-right">{{ \Carbon\Carbon::create($TravelPackage->departure_date)->format('F n, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Duration</th>
                                        <td width="50%" class="text-right">{{ $TravelPackage->duration }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <td width="50%" class="text-right">{{ $TravelPackage->type }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Price</th>
                                        <td width="50%" class="text-right">${{ $TravelPackage->price }},00 / person</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="join-container">

                                @auth
                                    <form action="{{ route('checkout_process', $TravelPackage->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn w-100 btn-join-now mt-3 py-2">
                                            Join Now
                                        </button>
                                    </form>
                                @endauth
                                @guest
                                <a href="{{route('login')}}" class="btn w-100 btn-join-now mt-3 py-2">
                                    Get Started
                                </a>
                                @endguest
                               
                            </div>
                        </div>
                    </div>
            </section>
        </main>

@endsection

@push('prepend-style')
        <link rel="stylesheet" href="{{ url('frontend/assets/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
        <script src="{{ url('frontend/assets/libraries/xzoom/xzoom.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $(".xzoom, .xzoom-gallery").xzoom({
                    zoomWidth: 500,
                    title: false,
                    tint: '#333',
                    xoffset: 15
                });
            })
        </script>
@endpush