@extends('admin_layouts.admin')
@section('content')
<div class="container">
        <form method="post" action="{{route('orders.store')}}"> 
        @csrf
        <div class="form-group">
            <label for="medicine">medicine</label>

            <select class="form-control" name="medicine_id">
            @foreach($meds as $medicine)
                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">quantity</label>
            <input name="quantity" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="total_price">total price</label>
            <input name="total_price"  type="number" class="form-control">
        </div>
        <div class="form-group">
            <label for="delivering_address">delivering address</label>
            <input name="delivering_address" type="text" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="action">action</label>
            <input name="action" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_insured">is_insured</label>
            <select class="form-control" name="is_insured">
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
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection