@extends('yetu.layouts.main')
       
@section('content')

  <title>Yetu :: Categories Main Images - Admin Dashboard</title>

       <!-- Bread crumb and right sidebar toggle -->
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <h4 class="page-title">Explore {{$category->name}} Images Plus</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                                     <li class="breadcrumb-item"><a href="{{url('admin/Category')}}">Categorys</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Category Main Images Plus</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-7 align-self-center d-none d-md-block">
                        <a href="{{url('/admin/add_category_alt_images/'.$category->id)}}" class="btn float-right btn-success"><i class="mdi mdi-plus-circle"></i> Add Alt Plus Images</a>
                    
                    </div>
                </div>
            </div>
            
            <!-- End Bread crumb and right sidebar toggle -->

            <div class="container-fluid">
                 
                <!-- Start Page Content -->

                <!-- create Categorys -->

                 <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('storeCategoryImages')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <h5 class="card-title">Create Category Main Images Plus</h5>
                                        <hr>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category ID</label>
                                                    <input required="" value="{{$category->id}}" name="category_id" type="text" class="form-control" placeholder="Category ID"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Add Category Main Images Plus</label>
                                            <input required="" type="file" name="image_big[]" multiple="" class="form-control" title="Add Category Main Plus Images">
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

                <!-- end create Categorys -->
                 
                 <!-- File export -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All {{$category->name}} Plus Images</h4>
                                <h6 class="card-subtitle">Use the action column to manage all Category plus images </h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display no-wrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            @forelse($showcategoryimages as $showcategoryimage)

                                            <tr>
                                                <td>{{$showcategoryimage->id}}</td>
                                                <td>{{$category->name}}</td>
                                                   <td>
                                                     <form action="{{route('deleteCategoryImage',$showcategoryimage->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                    </form>
                                                </td>
                                                <td>@if(!empty($showcategoryimage->image_big))
                                                <img style="width: 100px; height: 100px;" src="{{url('images/categoryplusimages/medium',$showcategoryimage->image_big)}}" class="img-thumbnail">
                                            @endif</td>
                                                <td>{{$showcategoryimage->created_at}}</td>
                                            </tr>
                                          @empty
                                         @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>Category Name</th>
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
