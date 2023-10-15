<?php 

use App\Category;
use App\SubCategory;
use Illuminate\Support\Str;

 ?>     
@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')

<title>Upmega :: Products - Admin Dashboard</title>

<div class="container-fluid">
    <div class="py-5"></div>
    <div class="row">
        <div class="col-12">
            <div class="card upmega-round">
                <div class="card-body">
                    <h4 class="card-title mb-3">Manage Products</h4>
                    <h6 class="card-subtitle mb-3">Use the action column to manage all products </h6>
                                      <div class="row">
         <div class="col-md-3 mb-3">
         <a href="{{route('products.create')}}">
            <div class="card bg-primary upmega-create-card shadow-lg upmega-round">
               <div class="card-body">
                  <div class="card-img-overlay text-white d-flex justify-content-center align-items-center">
                     <i class="fa fa-plus fs-1 text-white"></i>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>
                    <div class="table-responsive">
      <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Desc</th>
                                    <th>Image</th>
                                    
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                @forelse($products as $product)

                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                 <td>
                                    <div class="upmega-flex">
                                    <a class="btn btn-success" href="{{url('/add_product_images/'.$product->id)}}" title="Upload Product Plus Images"><i class="fa fa-image"></i></a>

                                    <a class="btn btn-info" href="{{route('products.edit',$product->id)}}"><i class="fa fa-refresh"></i></a>
                                     
                                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                    </form>
                                    </div>

                                    </td>
                                    <td>{{Str::words($product->description, 5, '...')}}</td>
                                    <td>@if(!empty($product->image))
                        <img height="100" width="100" src="{{url('images/products/',$product->image)}}" class="img-thumbnail">
                    @endif</td>
                           
                                    <td>{{$product->created_at}}</td>
                            
                                </tr>
                                        @empty


                             @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Desc</th>
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
