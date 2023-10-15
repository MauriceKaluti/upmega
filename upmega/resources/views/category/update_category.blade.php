@extends('upmega.layouts.main')
@section('content')
<title>Upmega :: Update {{$category->name}} Category - Admin Dashboard</title>
<section>
   <div class="container-fluid">
   <div class="py-5"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-3 upmega-round shadow-lg">
            <div class="card-body">
               <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                  <div class="form-body">
                     <h6 class="card-title">Update Category - {{$category->name}} </h6>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="control-label">Category Name</label>
                              <input required="" value="{{$category->name}}" name="name" type="text" id="name" class="form-control shadow-none" placeholder="Category Name Here"> 
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="control-label">Category Description</label>
                              <textarea required="" style="resize: none;" name="description" class="form-control shadow-none" rows="4">{{$category->description}}</textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <h5 class="card-title mt-6">Category Image</h5>
                           <div class="btn btn-primary waves-effect waves-light">
                              <input accept="image/png, image/jpeg" value="{{$category->image_big}}" name="image_big" type="file" class="upload"> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-actions mt-5">
                     <input type="submit" class="btn btn-primary btn-lg upmega-round w-100" onClick="this.form.submit(); this.disabled=true; this.value='Updating Category...';" value="Update Category"/>
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
         <div class="card mb-3 upmega-round shadow-lg">
            <div class="card-body">
               <h4 class="card-title">Other Categories</h4>
               <h6 class="card-subtitle mb-3">Use the action column to manage other product categories </h6>
               <div class="table-responsive">
                  <table id="file_export" class="table table-striped table-bordered display no-wrap">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($categories as $category)
                        <tr>
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                           <td>
                              <div class="upmega-flex">
                                 <a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}"><i class="fa fa-refresh"></i></a>
                                 <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-trash"></i> </button>
                                 </form>
                                 <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#previewBox-{{$category->id}}">
                                 <i class="fa fa-eye"></i>
                                 </button>
                              </div>
                           </td>
                        </tr>
                        @empty
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="animated">
   @foreach ($categories  as $category)
   <div class="modal fade" id="previewBox-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="previewBoxLabel"
      data-backdrop="static" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="previewBoxLabel">Preview {{$category->name}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4 mb-1">{{$category->description}}</div>
                        <div class="col-md-4 mb-1">@if(!empty($category->image_big))
                           <img src="{{url('images/categories/',$category->image_big)}}" class="img-thumbnail">
                           @endif
                        </div>
                        <div class="col-md-4 mb-1">@if(!empty($category->image_small))
                           <img src="{{url('images/categories/',$category->image_small)}}" class="img-thumbnail">
                           @endif
                        </div>
                        <div class="col-md-4 mb-1">{{$category->created_at}}</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
   @endforeach
   <!-- .content -->
</div>
</section>
@endsection