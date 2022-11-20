@extends('layouts.backend')

@section('content')
    <div class="card col-lg-10 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>ALL CATAGORIES</h2>
        </div>
        <div class="card-body">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Status</th>
            </tr>

            @forelse ($categories as $key=>$categories )
            <tr>
                <td>{{++$key}}</td>
                <td>{{$categories->name}}</td>
                <td>{{$categories->status==0 ? 'SHOWED':'deactive'}}</td>
            </tr>
            @empty
            @endforelse

        </table>

        </div>

    </div>

@endsection
