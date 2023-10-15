       
@extends('admin.layout.admin')

@section('content')


       <!-- Bread crumb and right sidebar toggle -->
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-md-5 align-self-center">
                        <h4 class="page-title">Explore {{$product->name}} Images Plus</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                                     <li class="breadcrumb-item"><a href="{{url('admin/product')}}">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product Alt Images Plus</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-7 align-self-center d-none d-md-block">
                        <a href="{{url('/admin/add_product_main_images/'.$product->id)}}" class="btn float-right btn-success"><i class="mdi mdi-plus-circle"></i> Add Main Plus Images</a>
                    
                    </div>
                </div>
            </div>
            
            <!-- End Bread crumb and right sidebar toggle -->

            <div class="container-fluid">
                 
                <!-- Start Page Content -->

                <!-- create products -->

                 <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('storeProductImagesAlt')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <h5 class="card-title">Create Product Alt Images Plus</h5>
                                        <hr>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product ID</label>
                                                    <input required="" value="{{$product->id}}" name="product_id" type="text" class="form-control" placeholder="Product ID"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Add Product Alt Images Plus</label>
                                            <input required="" type="file" name="image_alt[]" multiple="" class="form-control" title="Add Product Alt Plus Images">
                                    </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                      
                                        <hr> 

                                    </div>
                                    <div class="form-actions mt-5">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-dark">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- end create products -->
                 
                 <!-- File export -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All {{$product->name}} Plus Images</h4>
                                <h6 class="card-subtitle">Use the action column to manage all product plus images </h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Action</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            @forelse($showproductimages as $showproductimage)

                                            <tr>
                                                <td>{{$showproductimage->id}}</td>
                                                <td>{{$product->name}}</td>
                                                   <td>
                                                     <form action="{{route('deleteProductImageAlt',$showproductimage->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                    </form>



                                                </td>
 



                                                <td>@if(!empty($showproductimage->image_alt))
                                                <img style="width: 122,5px; height: 150px;" src="{{url('images/productplusimages/medium',$showproductimage->image_alt)}}" class="img-thumbnail">
                                            @endif</td>
                                                <td>{{$showproductimage->created_at}}</td>
                                            </tr>
                                          @empty
                                         @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>Product Name</th>
                                                <th>Action</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection
