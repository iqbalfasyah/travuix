@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery </h1>
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
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="travel_packages_id">Package Travel </label>
                    <select name="travel_packages_id" readonly class="form-control" >
                        @foreach ($travel_packages as $tp)
                        
                                <option {!! $item->travel_packages_id == $tp->id ? "selected":"" !!} value="{{ $tp->id }}">{{ $tp->title }}</option>
                        
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if ($item->image != null)
                    <br>
                        <img src="{{ Storage::url($item->image ) }}" width="auto">
                    @endif
                    <input type="file" class="form-control" name="image" placeholder="Image" value="{{ $item->image }}">
                </div>
                @include('includes.admin.action-submit-continue')
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection