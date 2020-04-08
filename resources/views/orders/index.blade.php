@extends('admin_layouts.admin')
@section('content')
<div class="container">
    <h1>orders</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">medicine</th>
            <th scope="col">quantity</th>
            <th scope="col">total_price</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
            <th scope="col">is_insured</th>
            <th scope="col">delivering_address</th>
            <th scope="col">user</th>
            <th scope="col">doctor</th>
            <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->medicine->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->order->status->status}}</td>
                <td>{{$order->order->action}}</td>
                @if($order->order->is_insured)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                <td>{{$order->order->delivering_address}}</td>
                <td>{{$order->order->user->name}}</td>
                
                <td>
                    <form method="POST" action="{{route('orders.destroy',[$order->id])}}">
                        <a href="{{route('orders.edit',['order'=>$order->id])}}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary" type="submit" on_click="confirm('are you sure you want to delete this order?')">Delete</button>
                       
                    </form>
                </td>
            </tr>
            @endforeach
        <a href="{{route('orders.create')}}" class="btn btn-success" >Create Order</a>
        </tbody>
    </table>

</div>

@endsection