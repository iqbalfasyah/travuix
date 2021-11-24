@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Package Travel -  {{$item->title}}</h1>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
               <div class="form-group">
                   <label for="transaction_status">Status</label>
                    <select name="transaction_status"  class="form-grop" readonly>
                        <option value="{{ $item->transaction_status }}">{{ $item->transaction_status}}</option>
                        <option value="IN_CART">IN CART</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="CANCEL">CANCEL</option>
                        <option value="FAILED">FAILED</option>
                    </select>
               </div>
                @include('includes.admin.action-submit-continue')
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection