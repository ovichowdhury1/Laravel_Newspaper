@extends('layouts.backend')

@section('content')
    <div class="card col-lg-10 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>Add Banner Item</h2>
        </div>
        <div class="card-body">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Banner Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @forelse ($banners as $key=>$banner )
            <tr>
                <td>{{++$key}}</td>
                <td><img style="height: 100px" src="{{asset('storage/img/'.$banner->banner_img)}}" alt="$banner->banner_name"></td>
                <td>{{$banner->status==0 ? 'active':'deactive'}}</td>
                <td>
                    <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-secondary">Status</a>
                    <button class="btn btn-sm btn-danger btn_delete">Delete</button>
                    <form class=" delete_form d-inline-block" action="{{route('banner.destroy',$banner->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
            @endforelse

        </table>

        </div>

    </div>

@endsection


@section('custom_JS')
<script>
    $(".btn_delete").click(function(){
        Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $(this).next('.delete_form').submit()
      }
    })
     });
</script>
@endsection
