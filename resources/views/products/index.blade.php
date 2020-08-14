@extends('layouts.dashBoardLayout')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col-sm-6 -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active">Product Management</li>
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
							  <h3 class="card-title"><button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus"></i> Add Product</button></h3>
							</div><!-- /.card-header -->
						<div class="card-body">
							 @include('alerts')
								<table id="example2" class="table table-bordered table-hover">
									 <thead>
											<tr>
												<th>No.</th>
												<th>SERIAL NUMBER</th>
												<th>PRODUCT NAME</th>
												<th>CATEGORY</th>
												<th>PURCHASE PRICE</th>
												<th>SELL PRICE</th>
												<th>ACTION</th>
											</tr>
									</thead>
											@if(count($products))
											@foreach ($products as $prod)
									<tbody>
										  <tr>
											<td>{{$prod->id}}</td>
											<td>{{$prod->serial_no}}</td>
											<td>{{$prod->product_name}}</td>
											<td>{{$prod->category->category_name}}</td>
											<td>{{$prod->purchase_price}}</td>
											<td>{{$prod->retail_price}}</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">Action </button>
														<div class="dropdown-menu">
															 <a class="dropdown-item" href="{{route('products.show',$prod->id)}} "data-toggle="modal" data-target="#productInfo{{$prod->id}}" class="btn btn primary">View </a>
															<a class="dropdown-item" href="{{route('products.edit',$prod->id)}} "data-toggle="modal" data-target="#editProduct{{$prod->id}}" class="btn btn primary">Edit </a>
															<a class="dropdown-item" href="{{route('products.destroy',$prod->id)}}"data-toggle="modal" data-target="#deleteProduct{{$prod->id}}" class="btn btn primary" >Delete </a>
														</div>
												</div><!-- /.btn-group -->
											</td>
										  </tr>
										  <!--BEGIN OF EDIT MODAL-->
	<div class="modal fade" id="editProduct{{$prod->id}}">

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
<h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Edit Product</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form role="form" method="POST" action="{{route('products.update',$prod->id)}}">
    @csrf
    @method('PUT')

        <div class="card-body">
            <div class="form-group">
            <label for="Serial Number">Serial Number</label>
            <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{($prod->serial_no)}}">
            </div>

            <div class="form-group">
            <label for="Product Name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{($prod->product_name )}}">
            </div>

            <div class="form-group">
                <label for="Category">Category</label>
                <select class="form-control" id="category_id" name="category_id"  placeholder="">
                    <option value="">Select Category</option> 
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}"

                                
                            >{{$cat->category_name}} </option>
                        @endforeach
                </select>
            </div> 

            <div class="form-group">
                <label for="Supplier">Supplier</label>
                <select class="form-control" id="supplier_id" name="supplier_id"  placeholder="">
                    <option value="">Select Supplier</option> 
                        @foreach ($suppliers as $sup)
                            <option value="{{$sup->id}}">  {{$sup->supplier_name}} </option>
                        @endforeach
                </select>
            </div>

            

            <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" rows="5" id="description" name="description"  value="" placeholder="">
            {{$prod->description}}
            </textarea>
            </div>

            <div class="form-group">
            <label for="purchase_price">Purchase Price</label>
            <input type="text" class="form-control" id="purchase_price" name="purchase_price" value="{{($prod->purchase_price )}}" >
            </div>

            <div class="form-group">
            <label for="retail_price">Retail Price</label>
            <input type="text" class="form-control" id="retail_price" name="retail_price" value="{{($prod->retail_price )}}" >
            </div>

            <div class="form-group">
            <label for="Purchase Date">Purchase Date</label>
            <input type="date" class="form-control" name="purchase_date" value="{{old('purchase_date')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyy/mm/dd" data-mask>
            </div>

            <div class="form-group">
            <label for="quantity">Purchase Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{($prod->quantity )}}" >
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
<!-- MODAL TO CONFIRM DELETE -->
<div class="modal fade" id="deleteProduct{{$prod->id}}">
		<div class="modal-dialog">
		  <div class="modal-content bg-danger">
			<div class="modal-header">
			  <h4 class="modal-title">Are you sure you want to delete this Product? </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
				<form method="post" action="{{ route('products.destroy',$prod->id)}}">
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
												<tr><td colspan="7"> No Products Founde</td></tr>
											@endif 
									</tbody>
                  
									<tfoot>
										<tr>
											<th>No.</th>
											<th>SERIAL NUMBER</th>
											<th>PRODUCT NAME</th>
											<th>CATEGORY</th>
											<th>PURCHASE PRICE</th>
											<th>SELL PRICE</th>
											<th>ACTION</th>
										</tr>
									</tfoot>
                  
								</table>
							</div><!-- /.card-body -->
							</div> <!-- /.card -->	  
				</div> <!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
    
	</div> <!--/.container-fluid-->

	

    <div class="modal fade" id="addProduct">

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
				<h4 class="modal-title "><i class="nav-icon fas fa-user-graduate"></i> Add Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{route('products.store')}}">
					@csrf
					

					<div class="card-body">
				<div class="form-group">
				<label for="Serial Number">Serial Number</label>
				<input type="text" class="form-control" id="serial_no" name="serial_no" value="{{old('serial_no')}}">
				</div>

				<div class="form-group">
				<label for="Product Name">Product Name</label>
				<input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name' )}}">
				</div>

				<div class="form-group">
					<label for="Category">Category</label>
					<select class="form-control" id="category_id" name="category_id"  placeholder="">
						<option value="">Select Category</option> 
							@foreach ($categories as $cat)
								<option value="{{$cat->id}}">  {{$cat->category_name}} </option>
							@endforeach
					</select>
				</div> 

				<div class="form-group">
					<label for="Supplier">Supplier</label>
					<select class="form-control" id="supplier_id" name="supplier_id"  placeholder="">
						<option value="">Select Supplier</option> 
							@foreach ($suppliers as $sup)
								<option value="{{$sup->id}}">  {{$sup->supplier_name}} </option>
							@endforeach
					</select>
				</div>

				<div class="form-group">
				<label for="Description">Description</label>
				<textarea class="form-control" rows="5" id="description" name="description"  value="{{old('description' )}}" placeholder=""></textarea>
				</div>

				<div class="form-group">
				<label for="purchase_price">Purchase Price</label>
				<input type="text" class="form-control" id="purchase_price" name="purchase_price" value="{{old('purchase_price' )}}" >
				</div>

				<div class="form-group">
				<label for="retail_price">Retail Price</label>
				<input type="text" class="form-control" id="retail_price" name="retail_price" value="{{old('retail_price' )}}" >
				</div>

				<div class="form-group">
				<label for="Purchase Date">Purchase Date</label>
				<input type="date" class="form-control" name="purchase_date" value="{{old('purchase_date')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyy/mm/dd" data-mask>
				</div>

				<div class="form-group">
				<label for="quantity">Purchase Quantity</label>
				<input type="text" class="form-control" id="quantity" name="quantity" value="{{old('quantity' )}}" >
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
				
	<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
	  "autoWidth": false,
	  "paging": true,
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
	

</section>
                 

@endsection
