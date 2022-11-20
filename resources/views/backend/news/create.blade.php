@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('backend_assets/css/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
    <div class="card col-lg-5 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>Add POST</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="title" class="form-control mb-2">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" name="news_img" class="form-control mb-2">
                @error('news_img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <br>
                <select class="form-control" name='Category_name[]' id="category">
                    @foreach ($categories as $key => $data)
                        <option value="{{ $data->id }}" {{ $key == 0 ? 'slected' : '' }}>{{ $data->name }}</option>
                    @endforeach
                </select>

                <div class=""form-group mb-3"" col-md-12>
                    <label>Tags : <span class=""text-danger"">*</span></label>
                    <br>
                    <input type=""text"" data-role=""tagsinput"" name=""tags"" class=""form-control tags"">
                    <br>
                    @if ($errors->has('tags'))
                        <span class=""text-danger"">{{ $errors->first('tags') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-sm btn-secondary mt-3">Submit</button>
            </form>

        </div>

    </div>
@endsection


@section('custom_JS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="{{ asset('backend_assets/js/bootstrap-tagsinput.js') }}"></script>
    <script>
        $('#category').select2();
    </script>
@endsection
