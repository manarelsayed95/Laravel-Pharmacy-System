
@extends('layouts.app')


@section('content')
      <div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
        <div class="container " style="text-align:center">
      <a href="#"  class="btn btn-success mb-5" style="align-center" >Create Post</a></div>
      {{-- <a href="{{route('posts.create')}}"  class="btn btn-success mb-5" style="align-center" >Create Post</a></div> --}}
          <table class="table table-hover table-dark" class="mx-auto">
            <thead class="thead-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Avatar</th>
                  <th scope="col">Ban status</th>
                  <th scope="col">Created At</th>
                  <th scope="col"></th>
                  <th scope="col">Actions</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($doctors as $doctor)
                <tr>
                <th scope="row">{{ $doctor->id }}</th>
                  <td>{{ $doctor->name }}</td>
                  <td>{{$doctor->email}}
                  <td>{{ $doctor->image }}</td>
                  <td>{{ $doctor->ban_flag }}</td>
                  {{-- <td>{{ $doctor->user ? $post->user->name : 'not exist'}}</td> --}}
                  <td>{{ $doctor->created_at->format('d-m-y')}}</td>
                

                {{-- <td><a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{route('posts.edit',['post' => $post->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                <td> 
                    <form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}" >
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
                </tr> --}}
              @endforeach
              </tbody>
            </table>
            {{-- {{$posts->links()}} --}}
      </div>

@endsection

