@extends('layouts.dashBoardLayout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Supplers</h1>
          </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Suppliers</li>
                </ol>
            </div><!-- /.col-sm-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
			<div class="col-12">
                <div class="card">
                        <div class="card-header">
                        <h3 class="card-title"><button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#addSupplier"><i class="fas fa-plus"></i> Add Supplier</button></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        @include('alerts')
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>SUPPLIER NAME</th>
                                    <th>PHONE NUMER</th>
                                    <th>EMAIL</th>
                                    <th>ADDRESS</th>
                                    <th>LOCATION</th>
                                    <th>ACTION</th>
                                    </tr>
                                </thead>
                                        @if(count($suppliers))
                                        @foreach ($suppliers as $sup)

                                <tbody>
                                    <tr>
                                        <td>{{$sup->id}}</td>
                                        <td>{{$sup->supplier_name}}</td>
                                        <td>{{$sup->phone_number}}</td>
                                        <td>{{$sup->email}}</td>
                                        <td>{{$sup->address}}</td>
                                        <td>{{$sup->location}}</td>
                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">Action </button>
                                                    <div class="dropdown-menu">
                                                         <a class="dropdown-item" href="{{route('suppliers.show',$sup->id)}} "data-toggle="modal" data-target="#supplierInfo{{$sup->id}}" class="btn btn primary">View </a>
														<a class="dropdown-item" href="{{route('suppliers.edit',$sup->id)}} "data-toggle="modal" data-target="#editSupplier{{$sup->id}}" class="btn btn primary">Edit </a>
														<a class="dropdown-item" href="{{route('suppliers.destroy',$sup->id)}}"data-toggle="modal" data-target="#deleteSupplier{{$sup->id}}" class="btn btn primary" >Delete </a>
                                                    </div>
                                            </div><!-- /.btn-group -->
                                        </td>

                                    
                                    </tr>
                                    


<!--MODAL TO DISPLAY SUPPLIER INFO-->
<div class="modal fade" id="supplierInfo{{$sup->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Supplier Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$sup->supplier_name}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$sup->address}} {{$sup->location}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +{{$sup->phone_number}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: +{{$sup->email}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('public/dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-print"></i> Print
                    </a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!--END OF MODAL TO DISPLAY SUPPLIER INFO-->
                                    <!--BEGIN OF EDIT MODAL-->
<div class="modal fade" id="editSupplier{{$sup->id}}">

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
<h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Edit Supplier</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form role="form" method="POST" action="{{route('suppliers.update',$sup->id)}}">
    @csrf
    @method('PUT')

        <div class="card-body">
            <div class="form-group">
            <label for="Supplier Name">Supplier Name</label>
            <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{($sup->supplier_name)}}">
            </div>

            <div class="form-group">
            <label for="Phone Number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{($sup->phone_number )}}">
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{($sup->email )}}" >
            </div>

            <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{($sup->address )}}" >
            </div>

            <div class="form-group">
            <label for="Location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{($sup->location )}}" >
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

<!--MODAL TO CONFIRM DELETE-->
<div class="modal fade" id="deleteSupplier{{$sup->id}}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure you want to delete this Supplier? </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <form method="post" action="{{ route('suppliers.destroy',$sup->id)}}">
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

									@endforeach
									@else
											<tr><td colspan="7"> No Supplier Data</td></tr>
									 @endif         
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                   </div> <!-- /.card -->
            </div><!-- /.col-12 -->
		</div> <!--/.container-fluid-->
		<!--MODAL TO ADD SUPPLIER-->
        <div class="modal fade" id="addSupplier">

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
            <h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Add Supplier</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="{{route('suppliers.store')}}">
                @csrf
                

                    <div class="card-body">
                        <div class="form-group">
                        <label for="Supplier Name">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{old('supplier_name')}}">
                        </div>

                        <div class="form-group">
                        <label for="Phone Number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number' )}}">
                        </div>

                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email' )}}" >
                        </div>

                        <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address' )}}" >
                        </div>

                        <div class="form-group">
                        <label for="Location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{old('location' )}}" >
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
  </section>
                 

@endsection
