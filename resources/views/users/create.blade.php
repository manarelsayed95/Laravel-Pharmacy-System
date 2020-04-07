@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>

        <form method="POST" action="{{route('users.store')}}">  
            @csrf
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleInputName">User Name</label>
                    <input  name="name" type="text" class="form-control" id="exampleInputName"  placeholder="user name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"  placeholder="name@example.com" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Confirm-Password</label>
                    <input  name="confirmPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm-password">
                    @error('confirmPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exampleInputName">Mobile Number</label>
                    <input name="mobile_number" type="text" class="form-control" id="exampleInputMobileNumber"  placeholder="0XX-XXXXXXXX">
                    @error('mobile_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleImage"> Profile-Image</label>
                    <br/>
                    <input name="image" type="file" name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="exampleDateOfBirth">Date Of Birth</label>
                    <input name="date_of_birth" type="text" class="form-control" id="example date_of_birth"  placeholder="day'xx'/month'xx' /year'xxxx'">
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleNationalId">National Id</label>
                    <input name="national_id" type="text" class="form-control" id="exampleNationalId"  placeholder="name@example.com">
                    @error('national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <select name="gender" class="form-control col-md-4">
                    <option>gender</option>
                    <option>Female</option>
                    <option>Male</option>
                    <option>Others</option>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection