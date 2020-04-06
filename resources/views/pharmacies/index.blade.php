@extends('admin_layouts.admin')
@section('content')
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
      <div class="container m-5">
        <table class="table" >
          <thead>
            <tr>
              {{-- <th scope="col">Created at</th> --}}
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              {{-- <th scope="col">Password</th> --}}
              <th scope="col">National Id</th>
              <th scope="col">Revenue</th>
               <th scope="col">Profil</th>
               <th scope="col">Area Id</th>
               <h3><th scope="col">Actions</th></h3>
        
            </tr>
          </thead>
          <tbody>
            <div>
            <h1 style="display: inline;">Dream System</h1>
            <a href="{{route('pharmacies.create')}}" class="btn btn-outline-success mb-4" style="margin-left: 300px">Create Pharmacy</a>
          </div>
            @foreach($pharmacies as $pharmacy)
            <tr>
              {{-- <th>{{$pharmacy->created_at}}</th> --}}
              <td>{{$pharmacy->name}}</td>
              <td>{{ $pharmacy->email }}</td>
              {{-- <td>{{$pharmacy->password}}</td> --}}
               <td>{{ $pharmacy->national_id}}</td>
              <td>{{$pharmacy->revenue}}</td>
              <td>{{$pharmacy->profil}}</td>
              <td>{{$pharmacy->area_id}}</td>
              <td><a href="#" class="btn btn-outline-primary">Details</a>
              <a href="#" class="btn btn-outline-warning">Edit</a>
               
        <form action="{{ route('pharmacies.destroy',['pharmacy'=>$pharmacy->id]) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button  class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this pharmacy ?')">Delete</button>
                </form>
              
         
           
              </td>
            </div>
            @endforeach
        
          </tbody>
        </table>
        
        </div>

    </div>
</div>

@endsection










