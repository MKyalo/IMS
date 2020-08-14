@extends('layouts.dashBoardLayout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content justify-content-center">
            <!-- Default box -->
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Profile: {{$user->name}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body justify-content-center">
          <div class="col-md-3 ">

            <!-- Profile Image -->
            <div class="card card-primary card-outline ">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('public/storage/avatars/'.$user->avatar)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>
                @if ($user->role == 'Admin')
                    <p class="text-muted text-center"><span class=" badge badge-success" >Administrator</span></p>
                @elseif ($user->role== 'Sales')
                    <p class="text-muted text-center"><span class=" badge badge-info" >Sales Representative</span></p>
                @elseif ($user->role== 'User')
                    <p class="text-muted text-center"><span class=" badge badge-info" >Normal User</span></p>
                @endif
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><i class="fas fa-envelope mr-1"></i>Email</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  
                  
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b><i class="fas fa-user-edit mr-1"></i>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
</section>
@endsection