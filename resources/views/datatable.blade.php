@extends('admin_layouts.admin')
@section('content')

<div class="d-flex align-content-stretch flex-wrap" style="text-align:center">
    <div class="container " style="text-align:center">
        <br>
      

<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5 - Implementing datatables tutorial using yajra package</title>

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

</head>

<body>


<div class="container">

  <table id="users" class="table table-hover table-condensed" style="width:100%">

    <thead>

        <tr>

            <th>Name</th>

            <th>Email</th>

            <th>Image</th>

            <th>National_ID</th>

            <th>Pharmacy_Id</th>

        </tr>

    </thead>

  </table>

</div>


<script type="text/javascript">

$(document).ready(function() {

    oTable = $('#doctors').DataTable({

        "processing": true,

        "serverSide": true,

        "ajax": "{{ route('datatable.getposts') }}",

        "columns": [

            {data: 'name', name: 'name'},

            {data: 'email', name: 'email'},

            {data: 'national_id', name: 'national_id'},

            {data: 'pharmacy_id', name: 'pharmacy_id'}

        ]

    });

});

</script>

</body>

</html>

</div>
</div>

@endsection