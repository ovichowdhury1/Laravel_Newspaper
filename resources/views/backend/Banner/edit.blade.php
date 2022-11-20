@extends('layouts.backend')

@section('content')
    <div class="card col-lg-5 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>Edit Banner Item</h2>
        </div>
        <div class="card-body">
            <form action="{{route('banner.update',$oldBannerData->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="banner_name" placeholder="Banner Name" class="form-control mb-2" value="{{$oldBannerData->banner_img}}">
                @error('banner_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="file" name="banner_img" class="form-control mb-2">
                <img src="{{asset('/storage/img/'.$oldBannerData->banner_img)}}" alt="" style="height: 200px;margin:20px 0;"> <br>
                @error('banner_img')
                <span class="text-danger">{{$message}}</span>
                @enderror
            <button type="submit" class="btn btn-sm btn-secondary mt-3">Add Banner Items</button>
            </form>

        </div>

    </div>

@endsection




