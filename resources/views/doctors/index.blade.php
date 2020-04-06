@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      
  <a href="{{route('doctors.create')}}"  class="btn btn-success mb-5" style="align-center" >Add New Doctor</a></div>
      <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)" id="doctor_table">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Avatar</th>
              <th scope="col">National ID</th>
              <th scope="col">Added On</th>
              <th scope="col">Ban Status</th>
              <th scope="col"></th>
              <th scope="col">Actions</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($doctors as $doctor)
            <tr>
                
            <th scope="row">{{ $doctor->id }}</th>
              <td>{{ $doctor->name }} </td>
              <td>{{$doctor->email}}</td>
              <td>{{ $doctor->image}}</td>
              <td>{{ $doctor->national_id}}</td> 
              {{-- <td>{{ $post->user ? $post->user->name : 'not exist'}}</td> --}}
              {{-- <td>{{ $doctor->created_at->format('d-m-y')}}</td>   --}}
              <td>date</td>  
              <td>{{ $doctor->ban_flag}}</td> 
              
            
              <td><a href="{{route('doctors.show',['doctor' => $doctor->id])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
            </i> View</a></td>
              <td><a href="{{route('doctors.edit',['doctor' => $doctor->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt">
            </i> Edit</a></td> 

            <td>
              <button type="submit" class="btn btn-danger btn-sm delete" >Delete</button></td>


{{-- DELETE DOCTOR MODAL --}}
            {{-- <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure you want to delete this doctor?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                  </div>
                </div>
              </div>
            </div> --}}



            {{-- <form method="POST" action="#"  id="deleteFormID">
              @method('DELETE')
              @csrf --}}

              {{-- <button type="submit" class="btn btn-danger btn-sm" >Delete</button> --}}
          </form>
            






{{-- 
              <td><a href="#" class="btn btn-danger btn-sm deletebtn"><i class="fas fa-trash">
            </i> Delete</a></td>  --}}

            {{-- <td> 
                <form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}" >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                </form>
            </td> --}}
            </tr>
          @endforeach
          </tbody>
        </table> 
        {{$doctors->links()}}
  </div>

  @endsection

  <script>
  
  // var doctor_id;

$(document).on('click', '.delete', function(){
 var id = $(this).attr("id");

if(confirm("Are you sure delete?"))

{
  $.ajax({
  url:"{{ route('doctors.destroy')}}",
  method:"POST",
  data:{id:id,_token:_token},
  success:function(data)
{
  $('#message').html(data);
  fetch_data();
  }
})


//  $('#confirmModal').modal('show');
// });

// $('#ok_button').click(function(){
//  $.ajax({
//   url:"/doctors/destroy/"+doctor_id,
//   beforeSend:function(){
//    $('#ok_button').text('Deleting...');
//   },
//   success:function(doctor)
//   {
//    setTimeout(function(){
//     $('#confirmModal').modal('hide');
//     $('#doctor_table').DataTable().ajax.reload();
//     alert('Data Deleted');
//    }, 2000);
//   }
//  })
});

});
</script>