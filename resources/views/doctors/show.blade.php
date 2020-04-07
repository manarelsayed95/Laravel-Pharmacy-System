@extends('admin_layouts.admin')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Doctor Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="../../dist/img/user4-128x128.jpg"
                   alt="User profile picture">
            </div>

          <h3 class="profile-username text-center">{{$doctor->name}}</h3>

            <p class="text-muted text-center">Doctor</p>

            

            <a href="#" class="btn btn-primary btn-block"><b>Recommend</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Doctor</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Name</strong>

            <p class="text-muted">
             {{$doctor->name}}
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Hired On</strong>

            <p class="text-muted">{{$doctor->created_at}}</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

            <p class="text-muted">
              <span class="tag tag-danger">{{$doctor->email}}</span>
           
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> National ID</strong>

            <p class="text-muted">{{$doctor->national_id}}</p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i>Pharmacy</strong>

            <p class="text-muted">Pharmacy name</p>
            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('doctors.edit',['doctor' => $doctor->id])}}" >Edit</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                    <a href="#">{{$doctor->name}}</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                  <span class="description">Hired on {{$doctor->created_at}}</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                
    
                </div>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Add comments">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Add</button>
                      </div>
                    </div>
                  </form>
                </div>
              
                  <br>
                  <br>
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                   
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

               

              
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
                
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="float-right d-none d-sm-block">
  <b>Version</b> 3.0.4
</div>
<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>

@endsection