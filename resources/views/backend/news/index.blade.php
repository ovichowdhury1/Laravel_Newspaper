@extends('layouts.backend')

@section('content')
    <div class="card col-lg-10 mx-auto mt-5 px-0">
        <div class="card-header">
            <h2>ALL News</h2>
        </div>
        <div class="card-body">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            @forelse ($newspaper as $key=>$data )
            <tr>
                <td>{{++$key}}</td>
                <td>{{$data->title}}</td>
                <td>
                    @forelse ($data->categories as $newsP )

                    <span class="badge bg-primary">{{$newsP->name}}</span>

                    @empty

                    @endforelse
                </td>
                <td>
                    <a href="{{route('news.edit',$news->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <button class="btn btn-sm btn-danger btn_delete">Delete</button>
                    <form class=" delete_form d-inline-block" action="{{route('banner.destroy',$banner->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                    </form> --}}
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
