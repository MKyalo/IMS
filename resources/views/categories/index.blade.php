@extends('layouts.dashBoardLayout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">Suppliers</a></li>
                <li class="breadcrumb-item active">Categories</li>
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
                        <h3 class="card-title"><button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#addCategory"><i class="fas fa-plus"></i> Add Category</button></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        @include('alerts')
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>CATEGORY NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>ACTION</th>
                                    </tr>
                                </thead>
                                        @if(count($categories))
                                        @foreach ($categories as $cat)

                                <tbody>
                                    <tr>
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->category_name}}</td>
                                        <td>{{$cat->description}}</td>
                                                          
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">Action </button>
                                                    <div class="dropdown-menu">
                                                         <a class="dropdown-item" href="{{route('categories.show',$cat->id)}} "data-toggle="modal" data-target="#categoryInfo{{$cat->id}}" class="btn btn primary">View </a>
														<a class="dropdown-item" href="{{route('categories.edit',$cat->id)}} "data-toggle="modal" data-target="#editCategory{{$cat->id}}" class="btn btn primary">Edit </a>
														<a class="dropdown-item" href="{{route('categories.destroy',$cat->id)}}"data-toggle="modal" data-target="#deleteCategory{{$cat->id}}" class="btn btn primary" >Delete </a>
                                                    </div>
                                            </div><!-- /.btn-group -->
                                        </td>

                                    
                                    </tr>
                                    


<!--MODAL TO DISPLAY CATEGORY INFO-->
<div class="modal fade" id="categoryInfo{{$cat->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Category Information</h4>
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
                      <h2 class="lead"><b>{{$cat->category_name}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email #: +</li>
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

<!--END OF MODAL TO DISPLAY CATEGORY INFO-->

<!--BEGIN OF EDIT MODAL-->
<div class="modal fade" id="editCategory{{$cat->id}}">

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
    <h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Edit Category</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <form role="form" method="POST" action="{{route('categories.update',$cat->id)}}">
        @csrf
        @method('PUT')

            <div class="card-body">
                <div class="form-group">
                <label for="Category Name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="{{($cat->category_name)}}">
                </div>

                <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="{{($cat->description)}}" rows="3" ></textarea>
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
<div class="modal fade" id="deleteCategory{{$cat->id}}">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure you want to delete this Category? </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
            <form method="post" action="{{ route('categories.destroy',$cat->id)}}">
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
											<tr><td colspan="4"> No Category Data</td></tr>
									 @endif         
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                   </div> <!-- /.card -->
            </div><!-- /.col-12 -->
		</div> <!--/.container-fluid-->
		<!--MODAL TO ADD SUPPLIER-->
        <div class="modal fade" id="addCategory">

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
            <h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Add Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" method="POST" action="{{route('categories.store')}}">
                @csrf
                

                    <div class="card-body">
                        <div class="form-group">
                        <label for="Category Name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{old('category_name' )}}">
                        </div>

                        <div class="form-group">
                        <label for="Description">Description</label>
                        <textarea class="form-control" id="description" name="description" value="{{old('description' )}}" rows="3" ></textarea>
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
