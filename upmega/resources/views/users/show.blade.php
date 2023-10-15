    @extends('upmega.layouts.main')

    @section('content')
    <title>upmega :: User Details - {{$user->name}}</title>
    <section id="show_user">
                <div class="container-fluid">
     

                   <?php 
                       if (!empty($user->user_id)) {
                      $added_by = App\Models\User::where('id','=',$user->user_id)->first();
                      $added_by_name = $added_by->name;
                       }else{
                      $added_by_name = '';
                       }
                       if (!empty($user->updated_by)) {
                       $updated_by = App\Models\User::where('id','=',$user->updated_by)->first();
                      $updated_by_name = $updated_by->name;  
                       }else{
                      $updated_by_name = '';  
                       }
                      ?>

    <div class="card upmega-round shadow-lg">
        <div class="card-body">
                     <div class="col-md-4 mb-3">
         <?php 
            $profileimg_path = 'images/profilephotos/' . $user->image;
            $profileimgExists = file_exists($profileimg_path);
             ?>
         @if(!empty($user->image))
         @if($profileimgExists)
         <img height="200" width="200" src="{{url('images/profilephotos',$user->image)}}" alt="image" class="upmega-rounded upmega-profile-img">
         @else
         <img height="200" width="200" src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
         @endif
         @else
         <img height="200" width="200" src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
         @endif
      </div>
            <div class="row">
       <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
             <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $user->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
                   <div class="col-xs-12 col-sm-12 col-md-12 mb-3 mb-2">
            <div class="form-group">
                <strong>Activity Logs:</strong>
            <p class="mb-3">Added By: {{ $added_by_name }} </p>
            <p class="mb-3">Updated By: {{ $updated_by_name }}</p>
            <p class="mb-3">Added On: {{ $user->created_at }}</p>
            <p class="mb-3">Updated On: {{ $user->updated_at }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success upmega-bg-primary upmega-round">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
     
       </div>

      
    </div>
        </div>
    </div>
            </div>

            <div class="py-5"></div>
    </section>
          

    @endsection