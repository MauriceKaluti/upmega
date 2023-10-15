@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')
<title>Upmega :: Categories - Admin Dashboard</title>
<section>
   <div class="container-fluid">
   <div class="py-5"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-3 upmega-round shadow-lg">
            <div class="card-body">
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong>Something went wrong.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-body">
                     <h5 class="card-title">Create Category</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="control-label">Category Name</label>
                              <input required="" name="name" type="text" id="name" class="form-control shadow-none" placeholder="Category Name Here"> 
                           </div>
                        </div>

                             <div class="col-md-6 mb-3">
                              <label class="control-label">Category Image</label><br>
                           <div class="btn btn-primary waves-effect waves-light">
                              <input required="" accept="image/png, image/jpeg" name="image_big" type="file" class="upload"> 
                           </div>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                           <div class="form-group">
                              <label class="control-label">Category Description</label>
                              <textarea required="" style="resize: none;" name="description" class="form-control shadow-none" rows="4"></textarea>
                           </div>
                           
                        </div>
                        
                     </div>
                 
                     
                  </div>
                  <hr>
                  <div class="form-actions mt-5">
                     <input type="submit" class="btn btn-primary btn-lg upmega-round w-100" onClick="this.form.submit(); this.disabled=true; this.value='Uploading Category...';" value="Upload Category"/>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Column -->
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card mb-3 upmega-round shadow-lg">
            <div class="card-body">
               <h4 class="card-title">Categories</h4>
               <h6 class="card-subtitle mb-3">Use the action column to manage all product categories </h6>
               <div class="table-responsive">
                  <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($categories as $category)
                        <tr>
                           <td>{{$category->name}}</td>
                           <td>
                              <div class="upmega-flex">
                                 <a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}"><i class="fa fa-refresh"></i></a>
                                 <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-trash"></i> </button>
                                 </form>
                                 
                              </div>
                           </td>
                        </tr>
                        @empty
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
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
                     <form action="{{route('categories.update',$category->id)}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Status</label>
                                    <br/>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input  value="1" id="customRadioInline1_{{$category->id}}" type="radio" name="status" class="custom-control-input" @if($category->status == 1) checked @else  @endif>
                                       <label class="custom-control-label" for="customRadioInline1_{{$category->id}}">Live</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                       <input value="0" id="customRadioInline2_{{$category->id}}" type="radio" name="status" class="custom-control-input" @if($category->status == 0) checked @else  @endif>
                                       <label class="custom-control-label" for="customRadioInline2_{{$category->id}}">Not Live</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-actions">
                              <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Status</button>
                           </div>
                        </div>
                     </form>
                     <!-- details -->
                     <hr>
                     <div class="row">
                        <div class="col-md-4 mb-1">{{$category->description}}</div>
                        <div class="col-md-4 mb-1">@if(!empty($category->image_big))
                           <img src="{{url('images/categories',$category->image_big)}}" class="img-thumbnail">
                           @endif
                        </div>
                        <div class="col-md-4 mb-1">@if(!empty($category->image_small))
                           <img src="{{url('images/categories',$category->image_small)}}" class="img-thumbnail">
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