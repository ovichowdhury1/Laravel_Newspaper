@extends('layouts.backend')

@section('content')
    <div class="card col-lg-5 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>Add Latest News</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="banner_name" placeholder="Banner Name" class="form-control mb-2">
                {{-- @error('banner_name')
                <span class="text-danger">{{$message}}</span>
                @enderror --}}
                <input type="file" name="banner_img" class="form-control mb-2">
                {{-- @error('banner_img')
                <span class="text-danger">{{$message}}</span>
                @enderror --}}
            <button type="submit" class="btn btn-sm btn-secondary mt-3">Add Latest post</button>
            </form>

        </div>

    </div>

@endsection
