@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaction -  {{$item->User->name}}</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>   
    </div>
    @endif

    <div class="card shadoow">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Travel Package</th>
                    <td>{{ $item->TravelPackage->title  }}</td>
                </tr>
                <tr>
                    <th>Buyer</th>
                    <td>{{ $item->User->name  }}</td>
                </tr>
                <tr>
                    <th>Additional  Visa</th>
                    <td>{{$item->additional_visa  }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Purchases</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Nationality</th>
                                <th>Visa</th>
                                <th>DOE Passport</th>
                            </tr>
                            @foreach ($item->TransactionDetail as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->username }}</td>
                                    <td>{{ $detail->nationality }}</td>
                                    <td>{{ $detail->is_visa? "30 Days" : "N/A" }}</td>
                                    <td>{{ $detail->doe_passport }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection