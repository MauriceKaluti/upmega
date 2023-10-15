@extends('upmega.layouts.main')
@section('content')
<title>upmega :: Contact Us</title>
<div class="container-fluid">
    <div class="py-5"></div>
   <?php
      //if latitude and longitude are submitted
       $latitude= "-1.2841";
        $longitude= "36.8155";
       
       
      ?>
   <div class="row mb-3">
      <div class="col-md-6 mb-3">
         <div class="card naichannel-round shadow-lg upmega-popup-card upmega-round h-100 text-center">
            <div class="card-body">
               <i class="fa fa-map-marker"></i>
               <h3>Our Address</h3>
               <p>00100 - Nairobi, Kenya.</p>
            </div>
         </div>
      </div>
      <div class="col-md-6 mb-3">
         <div class="card naichannel-round shadow-lg upmega-popup-card upmega-round h-100 text-center">
            <div class="card-body">
               <i class="fa fa-envelope"></i>
               <h3>Email Us</h3>
               <p>info@upmega.com</p>
            </div>
         </div>
      </div>
   </div>
   <div class="card naichannel-round shadow-lg upmega-round mb-3">
      <div class="card-body upmega-contact">
         <h3 align="center">Contact Us 24/7</h3>
         <hr>
         <div class="form-contact">
            <form action="{{route('storeContact')}}" method="post" role="form">
               {{csrf_field()}}
               <div class="row">
                  <div class="col-md-3 mb-3">
                     <div class="single-input">
                        <input @if(Auth::guest())
                        value=""
                        @else
                        value="{{Auth::user()->id}}"
                        @endif type="hidden" class="form-control upmega-round shadow-none" name="user_id">
                        <input required type="text" class="form-control upmega-round shadow-none" name="name" placeholder="Enter Your Name">
                     </div>
                  </div>
                  <div class="col-md-3 mb-3">
                     <input required type="text" class="form-control upmega-round shadow-none" name="email" placeholder="Enter Your Email">
                  </div>
                  <div class="col-md-3 mb-3">
                     <input required type="text" class="form-control upmega-round shadow-none" name="phone" placeholder="Enter Your Phone Number">
                  </div>
                  <div class="col-md-3 mb-3">
                     <input type="text" class="form-control upmega-round shadow-none" name="subject" required placeholder="Enter Your Subject">
                  </div>
                  <div class="col-12 mb-3">
                     <textarea required class="form-control round shadow-none" name="message" placeholder="Enter Your Message"></textarea>
                  </div>
                  <div class="col-12">
                     <div class="submit-input text-center">
                        <button class="btn btn-primary upmega-btn-primary btn-lg btn-block upmega-round border-0 shadow-none" type="submit" name="submit"><i class="fa fa-paper-plane"></i> Send Message</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="card naichannel-round shadow-lg upmega-round mb-3">
      <div class="card-body">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5823.5928245885525!2d36.81499362635597!3d-1.2843743729413102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11efc0b203dd%3A0x5376f1de78cf155a!2sNairobi%20C%20B%20D!5e1!3m2!1sen!2ske!4v1662645579042!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         <div id="map"></div>
      </div>
   </div>
   <div class="py-5"></div>
</div>
 
@endsection