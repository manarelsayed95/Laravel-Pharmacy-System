@extends('admin_layouts.admin')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Adding a new medicine</a>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
<div class="container">
        <form method="post" action="{{route('orders.store')}}"> 
        @csrf
        <div class="row form-group" id="inputFormRow">
            <div class="col-md-10">
                <label for="medicine">medicine</label>
                <input name="name" type="text" class="form-control" >
                
                <!-- <div class=" input-group-append col-md-2"> -->
                    <div class="input-group-append col-md-2"><a id="addRow" class=""><i class="fas fa-plus"></i></a></div>
                    <!-- <div class="col-md-3"><a id="removeRow" type="button" class=""><i class="fas fa-minus"></i></a></div> -->
                    
                <!-- </div> -->
            </div>
        </div>
        <div id="newRow"></div>
        

        <div class="form-group">
            <label for="quantity">quantity</label>
            <input name="quantity" type="number" class="form-control" >
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input name="type" type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="price">price</label>
            <input name="price"  type="number" class="form-control">
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
    <script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div class="row form-group" id="inputFormRow">';
        html += '<div class="col-md-10">';
        html += '<label for="medicine">medicine</label>';
        html += '<input name="name" type="text" class="form-control" >';
        // html += '<div class="input-group-append col-md-2">';
        html += '<div class="col-md-2"><a id="removeRow" type="button" class=""><i class="fas fa-minus"></i></a></div>';
        // html += '</div>';            
        html += '</div>';
        html += '</div>';
        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
@endsection