@extends('admin_layouts.admin')
@section('content')

{{-- @dd(Auth::guard('doctor')->user()->hasrole('doctor')) --}}
<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
        {{-- <a href="{{route('orders.create')}}" class="btn btn-success mb-5" style="align-center">Create Order</a> --}}
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

                
                
                    <form method="POST" action="{{route('orders.destroy',[$order->id])}}">
                    <td>
                    <a href="{{route('orders.show',['order' => $order->id])}}" class="btn btn-primary btn-sm">  <i class="fas fa-folder">
            </i> View</a></td>
            <td>
                        <a href="{{route('orders.edit',['order'=>$order->id])}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
            </i> Edit</a></a></td>
                        @csrf
                        @method('DELETE')
                        <td>
                        <button class="btn btn-danger" type="submit" on_click="confirm('are you sure you want to delete this order?')"  role="button" aria-pressed="true">Delete</button>
                        </td>
                    </form>
                    
            </tr>
            @endforeach

        </tbody>
    </table>
    </div>
</div>

@endsection