@extends('admin_layouts.admin')
@section('content')

{{-- @dd(Auth::guard('doctor')->user()->hasrole('doctor')) --}}
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
        <a href="{{route('doctororders.create')}}" class="btn btn-success mb-5" style="align-center">Create Order</a>
    <table class="table table-bordered table-hover table-dark" class="mx-auto" style="background-color: 	rgb(52, 57, 64)">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            
            <th scope="col">Delivering Address</th>
            <th scope="col">Creation Date</th>
 
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            <th scope="col">Insured</th>
            <th scope="col">Assigned Pharmacy</th>
            
            
            <th scope="col"></th>
            
            <th scope="col-span=3">Actions</th>
            <th scope="col"></th>
            
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
            
                <td>{{$order->delivering_address}}</td>
                <td>{{$order->created_At}}</td>
                
                <td>{{$order->Status->status}}</td>
                <td>{{$order->action}}</td>
                
                @if($order->is_insured)
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif
               <td></td>
                {{-- <td>{{$order->Pharmacy->name}}</td> --}}

                
                
                    {{-- <form method="POST" action="{{route('orders.destroy',[$order->id])}}"> --}}
                    <td>
                            <a href="{{route('doctororders.show',['order' => $order->id])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
                    </i> View</a></td>
                    <td>
                                <a href="{{route('doctororders.edit',['order'=>$order->id])}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
                    </i> Edit</a></a></td>
                            
                            {{-- </form> --}}


                            <td> 
                                <form method="POST" action="{{route('doctororders.destroy',['order' => $order->id])}}" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fas fa-trash-alt">
                                    </i> Delete</button>
                                </form>
                            </td>
                            
                    </tr>
            @endforeach

        </tbody>
    </table>
    </div>
</div>

@endsection