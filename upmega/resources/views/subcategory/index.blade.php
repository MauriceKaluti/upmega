@extends('yetu.layouts.main')
@section('content')
@include('yetu.layouts.data_tables')
<title>Yetu :: Sub Categories - Admin Dashboard</title>
<div class="container-fluid">
   <div class="py-3"></div>
   <div class="card shadow-lg yetu-round mb-3">
            <div class="card-body">
            @include('yetu_errors')
               <form action="{{route('subcategories.store')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-body">
                     <h5 class="card-title">Create Subcategory</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              <label class="control-label">Subcategory Name</label>
                              <input required="" name="name" type="text" id="name" class="form-control" placeholder="Subcategory Name Here"> 
                           </div>
                        </div>
                                <div class="col-md-4 mb-3">
                           <div class="form-group">
                              <label class="control-label">Subcategory Image</label>
                              <input required="" name="image" type="file" class="form-control" title="Subcategory Image Here"> 
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              <label class="control-label mb-2">Select Category</label>
                              <select id="yetu_categories" required="" name="category_id" class="form-control" data-placeholder="Select Product Category" tabindex="1">
                                 <option></option>
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <div class="form-group">
                              <label class="control-label">Subcategory Description</label>
                              <textarea required="" style="resize: none;" name="description" class="form-control" rows="4"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-actions mt-5">
                      <input type="submit" class="btn btn-primary yetu-round w-100" onClick="this.form.submit(); this.disabled=true; this.value='Uploading SubCategory...';" value="Upload SubCategory"/>
                  </div>
               </form>
            </div>
         </div>
 
   <div class="card shadow-lg yetu-round mb-3">
            <div class="card-body">
               <h4 class="card-title mb-3">Subcategories</h4>
               <h6 class="card-subtitle mb-3">Use the action column to manage all product subcategories </h6>
               <div class="table-responsive">
      <table id="yetuDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($subcategories as $subcategory)
                        <tr>
                           <td>{{$subcategory->id}}</td>
                           <td>
                              <p>{{$subcategory->name}}</p>
                              <img width="100" height="100" class="img-thumbnail" src="{{url('images/subcategories',$subcategory->image)}}">
                           </td>
                           <td>
                              <div class="yetu-flex">
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#previewBox-{{$subcategory->id}}">
                                 <i class="fa fa-eye"></i>
                                 </button>
                                 <a class="btn btn-info" href="{{route('subcategories.edit',$subcategory->id)}}"><i class="fa fa-refresh"></i></a>
                                 <form action="{{route('subcategories.destroy',$subcategory->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                 </form>
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
<!-- preview box -->
<div class="animated">
   @foreach ($subcategories  as $subcategory)
   <div class="modal fade" id="previewBox-{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="previewBoxLabel"
      data-bs-backdrop="static" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="previewBoxLabel">Preview {{$subcategory->name}}</h5>
               <button type="button" class="close bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4 mb-1">@if($subcategory->status == 1) <span class="badge badge-primary bg-primary">Active</span> @else <span class="badge badge-primary bg-warning">Off</span> @endif</div>
                        <div class="col-md-4 mb-1">{{$subcategory->description}}</div>
                        <div class="col-md-4 mb-1">{{$subcategory->created_at}}</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
   @endforeach
   <!-- .content -->
</div>
@endsection