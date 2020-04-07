@extends('admin_layouts.admin')
@section('content')

    <div class="container">
        <form method="post" action="/orders/{{ $orderM->id }}"> 
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="quantity">quantity</label>
            <input name="quantity" value="{{$orderM->quantity}}" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="total_price">total price</label>
            <input name="total_price" value="{{$orderM->total_price}}" type="number" class="form-control">
        </div>
        <div class="form-group">
            <label for="delivering_address">delivering address</label>
            <input name="delivering_address" value="{{$orderM->order->delivering_address}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">status</label>

            <select class="form-control" name="status_id" >
            @foreach($statuses as $status)
                <option value="{{$status->id}}">{{$status->status}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="action">action</label>
            <input name="action" value="{{$orderM->order->action}}" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_insured">is_insured</label>
            <select class="form-control" value="{{$orderM->order->is_insured}}" name="is_insured">
                <option value="1">yes</option>
                <option value="0">no</option>
            </select>
            
        </div>
        <div class="form-group">
            <label for="user">User</label>

            <select class="form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor">Doctor</label>

            <select class="form-control" name="doctor_id" >
            @foreach($doctors as $doctor)
                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pharmacy">pharmacy</label>

            <select class="form-control" name="">
            @foreach($users as $user)
                <option value=""></option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
