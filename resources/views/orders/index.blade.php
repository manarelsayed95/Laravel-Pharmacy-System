@extends('admin_layouts.admin')
@section('content')
<div class="container">
    <h1>orders</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">status</th>
            <th scope="col">action</th>
            <th scope="col">is_insured</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">1</th>
                <td>{{$order->status}}</td>
                <td>{{$order->action}}</td>
                <td>{{$order->is_insured}}</td>
                <td>{{$order->user->name}}</td>
            </tr>
            @endforeach
            <button type="button" class="btn btn-success">Create</button>
        </tbody>
    </table>
</div>

@endsection