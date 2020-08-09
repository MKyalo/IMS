@extends('layouts.dashBoardLayout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">User Management</li>
                </ol>
            </div><!-- /.col-sm-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#addUser"><i class="fas fa-plus"></i> Add User</button></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  @include('alerts')
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
				  
                  <tbody>
                  <tr>
				  
                  @foreach ($users as $user)
                    <td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role}}</td>
					<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">Action </button>
									<div class="dropdown-menu">
										 <a class="dropdown-item" href=" "data-toggle="modal" data-target="#" class="btn btn primary">View </a>
										<a class="dropdown-item" href=" {{route('users.edit',$user->id)}}"data-toggle="modal" data-target="#editUser{{$user->id}}" class="btn btn primary">Edit </a>
										<a class="dropdown-item" href="{{route('users.destroy',$user->id)}}"data-toggle="modal" data-target="#deleteUser{{$user->id}}" class="btn btn primary" >Delete </a>
									</div>
							</div><!-- /.btn-group -->
					</td>
                  </tr>
                  <!--BEGIN OF EDIT MODAL-->
<div class="modal fade" id="editUser{{$user->id}}">

<div class="modal-dialog">
<div class="modal-content">
<style>
.modal-header{
background-color:#001f3f ;
}
.modal-title{
color: #ffffff  ;
}
</style>
<div class="modal-header">
<h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Edit User</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form role="form" method="POST" action="{{route('users.update',$user->id)}}">
    @csrf
    @method('PUT')

        <div class="card-body">
            <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{($user->name)}}">
            </div>

            <div class="form-group">
            <label for="Product Name">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{($user->email )}}">
            </div>

            <div class="form-group">
                <label for="Category">Role</label>
                <select class="form-control" id="category_id" name="role"  placeholder="">
                <option value="">Select Role</option> 
                        
                        <option value="Admin">Admin</option>
                        <option value="Sales">Sales</option>
                        <option value="User">User</option>
                        
                    
            </select>
                        
                </select>
            </div>  

            
        </div>
    <!-- /.card-body -->

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div><!-- /.modal-body -->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div> <!-- /.modal-fade -->
<!--END OF EDIT MODAL-->


				  @endforeach
									
				  </tbody>
                  <tfoot>
                  <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                  <!--MODAL TO CONFIRM DELETE-->
<div class="modal fade" id="deleteUser{{$user->id}}">
<div class="modal-dialog">
<div class="modal-content bg-danger">
    <div class="modal-header">
    <h4 class="modal-title">Are you sure you want to delete this User </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
        <form method="post" action="{{ route('users.destroy',$user->id)}}">
            @method('DELETE')
            @csrf

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">NO</button>
                <button type="submit" class="btn btn-outline-light">YES</button>
        </div>
        </form>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /. MODAL TO CONFIRM DELETE -->
                </table>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
		</div> <!--/.container-fluid-->
		

<!--MODAL TO ADD USER-->
<div class="modal fade" id="addUser">

<div class="modal-dialog">
<div class="modal-content">
<style>
.modal-header{
background-color:#001f3f ;
}
.modal-title{
color: #ffffff  ;
}
</style>
<div class="modal-header">
<h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Add User</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form role="form" method="POST" action="{{route('users.store')}}">
    @csrf
    

        <div class="card-body">
        
        <div class="input-group mb-3">
          <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required autocomplete="name" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
                <label for="Category">Role</label>
                <select class="form-control" id="category_id" name="role"  placeholder="">
                    <option value="">Select Role</option> 
                        
                            <option value="Admin">Admin</option>
                            <option value="Sales">Sales</option>
                            <option value="User">User</option>
                            
                        
                </select>
            </div>  

        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-8">
            
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
          </div>
          <!-- /.col -->
        </div>
      
        </div>
    <!-- /.card-body -->

<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
</div><!-- /.modal-body -->
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div> <!-- /.modal-fade -->
<!-- page script -->


  </section>
                 
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
@endsection
