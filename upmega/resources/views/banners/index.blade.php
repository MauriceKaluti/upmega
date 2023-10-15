@extends('yetu.layouts.main')
@section('content')
<div class="container">
   <div class="row mb-3">
      <div class="col-lg-12">
         <div class="card shadow-lg">
            <div class="card-body">
            @include('yetu_errors')
               <form action="{{route('banners.store')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-body">
                     <h5 class="card-title">Create Banner</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                               <div class="form-group">
                              <label class="control-label">Select Category</label>
                              <select id="yetu_categories" required="" name="category_id" class="form-control" data-placeholder="Select Product Category" tabindex="1">
                                 <option></option>
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Banner Image</label>
                              <input required="" name="image" type="file" id="image" class="form-control" title="Banner Image"> 
                           </div>
                        </div>
                     </div>
                     <div class="form-actions mt-5">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save Banner</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card shadow-lg">
            <div class="card-body">
               <hr>
               <h4 class="card-title">Banners</h4>
               <h6 class="card-subtitle">Use the action column to manage all Banners </h6>
               <hr>
               <div class="table-responsive">
                  <table id="yetuDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Details</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($banners as $key => $banner)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>
                              <p><strong>Banner Image: </strong><img width="200" height="200" class="img-fluid" src="{{url('images/',$banner->image)}}"></p>
                              <p><strong>Banner Create Date: </strong>{{$banner->created_at}}</p>
                           </td>
                           <td>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                 data-bs-target="#deleteModal-{{$banner->id}}">
                              <i class="fa fa-trash"></i>
                              </button>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="py-3"></div>
</div>
<!-- .animated -->
<div class="animated">
   @foreach ($banners as $banner)
   <div class="modal fade" id="deleteModal-{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
      data-bs-backdrop="static" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticModalLabel">Delete </h5>
               <button type="button" class="close bg-transparent outline-0 border-0" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <p>
                  Delete  Forever! <i class="fa fa-frown-o"></i>
               </p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-danger" onclick="event.preventDefault();
                  document.getElementById('deleteBanner-{{$banner->id}}').submit();">Confirm</button>
               <form action="{{route('banners.destroy', $banner->id)}}" style="display: none" id="deleteBanner-{{$banner->id}}" method="POST">
                  @csrf
                  @method('DELETE')
               </form>
            </div>
         </div>
      </div>
   </div>
   @endforeach
</div>
 
@endsection