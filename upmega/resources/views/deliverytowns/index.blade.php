@extends('admin.layout.admin')
@section('content')
  <title>Toyshaven 254 :: Delivery Towns - Admin Dashboard</title>

<div class="page-breadcrumb mb-3">
   <div class="row">
      <div class="col-md-12 card align-self-center">
         <div class="d-flex align-items-center card-body">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Delivery Towns</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
<div class="container-fluid">
   <!-- Start Page Content -->
   <div class="row">
      <!-- Column -->
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="{{route('storeDeliveryTown')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-body">
                     <h5 class="card-title">Create Delivery Town</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"> Name</label>
                              <input required="" name="name" type="text" id="name" class="form-control" placeholder="Delivery Town Here"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label"> Amount(Ksh)</label>
                              <input required="" name="amount" type="number"   class="form-control" placeholder="Amount Here"> 
                           </div>
                        </div>
                        <!--/span-->
                     </div>
                     <div class="form-actions mt-5">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Delivery Town</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Column -->
   </div>
   <!-- File export -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Delivery Towns</h4>
               <h6 class="card-subtitle">Use the action column to manage all  Delivery Towns </h6>
               <div class="table-responsive">
                  <table id="file_export" class="table table-striped table-bordered display no-wrap">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Amount</th>
                           <th>Created_At</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($delivery_towns as $key => $delivery_town)
                        <tr>
                           <td>{{$key+1}}</td>
                           <td>{{$delivery_town->name}}</td>
                           <td>{{$delivery_town->amount}}</td>
                           <td>{{$delivery_town->created_at}}</td>
                           <td>
                              <button type="button" class="btn btn-success" data-toggle="modal"
                                 data-target="#editModal-{{$delivery_town->id}}">
                              <i class="fa fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-danger" data-toggle="modal"
                                 data-target="#deleteModal-{{$delivery_town->id}}">
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
</div>
<!-- .animated -->
<div class="animated">
   @foreach ($delivery_towns  as $delivery_town)
   <div class="modal fade" id="deleteModal-{{$delivery_town->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
      data-backdrop="static" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticModalLabel">Delete {{$delivery_town->name}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <p>
                  Delete {{$delivery_town->name}} Forever! <i class="fa fa-frown-o"></i>
               </p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="button" class="btn btn-danger" onclick="event.preventDefault();
                  document.getElementById('deletepost-{{$delivery_town->id}}').submit();">Confirm</button>
               <form action="{{route('deleteDeliveryTown', $delivery_town->id)}}" style="display: none" id="deletepost-{{$delivery_town->id}}" method="POST">
                  @csrf
                  @method('DELETE')
               </form>
            </div>
         </div>
      </div>
   </div>
   @endforeach
   <!-- .content -->
</div>
<!-- edit modal -->
<div class="animated">
   @foreach ($delivery_towns  as $delivery_town)
   <div class="modal fade" id="editModal-{{$delivery_town->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
      data-backdrop="static" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticModalLabel">Edit {{$delivery_town->name}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="card">
                  <div class="card-body">
                     <form action="{{route('updateDeliveryTown',$delivery_town->id)}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-body">
                           <h5 class="card-title">Update {{$delivery_town->name}}</h5>
                           <hr>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label"> Name</label>
                                    <input value="{{$delivery_town->name}}" required="" name="name" type="text" id="name" class="form-control" placeholder="Delivery Town Here"> 
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label"> Amount(Ksh)</label>
                                    <input value="{{$delivery_town->amount}}" required="" name="amount" type="number"   class="form-control" placeholder="Amount Here"> 
                                 </div>
                              </div>
                              <!--/span-->
                           </div>
                           <div class="form-actions mt-5">
                              <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Delivery Town</button>
                           </div>
                        </div>
                     </form>
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
@endsection