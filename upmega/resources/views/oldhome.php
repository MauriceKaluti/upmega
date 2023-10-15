@extends('upmega.layouts.main')
@section('content')
<section id="season_home">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 mb-4 mb-md-0">
            <div class="card h-100 shadow">
               <div class="card-body">
                  <h1 class="upmega-bold mb-3">Are you searching for a better future? - <span class="upmega-text-secondary">Then Attention Hard Working East Africans!</span> </h1>
                  <p class="mb-3">The UK is seeking short-term labour to fill their upmega Job Visa programme for 2024 in the Agricultural Sector.</p>
                  <button class="btn btn-primary mb-3 upmega-round">Get Started Now</button>
                  <h5 class="upmega-bold mb-3">Earn between <span class="upmega-text-secondary">£500 & £800</span> per week!
                     (Less accommodation costs which will be provided)
                  </h5>
                  <p class="mb-3">This opportunity is NOT available through agents based in East Africa.</p>
                  <h4 class="upmega-bold"><span class="upmega-text-secondary">ACT NOW for 2024: </span> Remember, next week may be too late. If you are not in it, you cannot win it!!</h4>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card h-100 shadow">
               <div class="card-body">
                  <img src="{{asset('images/assets/home.png')}}">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section id="season_cta">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <img src="{{asset('images/assets/home.png')}}">
         </div>
         <div class="col-md-6">
            <h1 class="mb-3 upmega-bold">Migrant Workers are <span class="upmega-text-secondary"> Respected </span> in the UK!</h1>
            <p class="mb-3">WE ARE HERE TO HELP YOU & THE UK! For a WIN – WIN situation.</p>
            <h3 class="mb-3">
               Register Now for 2024. <span class="upmega-text-secondary upmega-bold"> You snooze, you lose!</span> Do it now!
            </h3>
            <a class="btn btn-primary upmega-round">Apply Now</a>
         </div>
      </div>
   </div>
</section>
<section id="season_info">
   <div class="container">
      <div class="row">
 
         <div class="col-md-6">
            <h3 class="mb-3 upmega-bold">Brief information to consider:</h3>
           <ol type="1">
               <li>2023 guaranteed minimum wage per hour in the UK is set at <span class="upmega-text-secondary"> £10.42.</span> This will increase for 2024.</li>
 <li>Applicants with machinery skills or farming knowledge will probably be on a higher pay scale.</li>
 <li>All farm work, livestock, fruit, vegetables will be offered with accommodation, charged at a government rate.</li>
 <li>All applicants will require a valid passport with at least one year before expiry.</li>
 <li>If the applicant is successful & an offer is received, then it will be the responsibility of the applicant to pay for the Bio-metric data collection & the upmega Job Visa which will be approved with a <span class="upmega-text-secondary"> Sponsorship Number </span> from the UK. </li>
 <li>Ideally, to cost of the flight ticket should be borne by the applicant, although in certain cases arrangements can be made to assist with this cost.</li>
 <li>At the end of the visa duration, please abide by our own <span class="upmega-text-secondary"> “Bring it Home” policy </span> to allow the same opportunity for people from East Africa for years to come. Also, remember a successful applicant can return year after year.</li>
           </ol>
         </div>

                 <div class="col-md-6">
            <img src="{{asset('images/assets/home.png')}}">
         </div>
      </div>
   </div>
</section>

<section id="season_bring">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <img src="{{asset('images/assets/home.png')}}">
         </div>
         <div class="col-md-6">
             
           <h1 class="upmega-bold upmega-text-secondary mb-3"> “BRING IT HOME!”</h1>

           <blockquote class="blockquote">
              People of East Africa: - “Bring it Home” for your family, for your community & for your Country!
 </blockquote>
<p class="mb-3">“Bring it Home” is our way to tell you that the value of money you earn in the UK is greater if you bring it home to spend in East Africa. If you do not return to East Africa, 3 things will happen;
 <ol class="mb-3" type="1">
     <li> Future generations of East Africans will have this opportunity removed. </li>
      <li> The money you earned will not last more than 4 months in the UK </li>
    <li> As an illegal immigrant you will not be treated with respect & you will have no avenue to complain.</li>
</ol>
</p>

<p class="mb-3">We urge you to return to East Africa, invest in East Africa, develop in East Africa for you, your family, your children & their children when that day comes. Bring it Home, build, buy land, expand your business & repeat the upmega work programme for many years to secure your family for the future.</p>
          
<p>Earnings in the UK have SO much more value if you <span class="upmega-bold upmega-text-secondary">“BRING IT HOME!”</span></p>
 
         </div>
      </div>
   </div>
</section>

<section id="season_apply">
   <div class="container">
         <div class="card shadow upmega-round">
         <div class="card-body">
            <div class="section-heading">
               <h6>Get Started</h6>
               <h4>Register Now</h4>
            </div>
            <form id="apply_now" action="" method="get">
               <div class="row">
                  <div class="col-md-4">
                     <fieldset>
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control shadow-none" name="name" id="name" placeholder="" autocomplete="on" required>
                     </fieldset>
                  </div>
                  <div class="col-md-4">
                     <fieldset>
                        <label for="email">Your Email</label>
                        <input type="text" class="form-control shadow-none" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="" required="">
                     </fieldset>
                  </div>
                  <div class="col-md-4">
                     <fieldset>
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control shadow-none" name="subject" id="subject" placeholder="" autocomplete="on" >
                     </fieldset>
                  </div>
                  <div class="col-md-4 mb-3">
                     <fieldset>
                        <label for="chooseOption" class="form-label">Your Reason</label>
                        <select class="form-select" aria-label="Default select example" id="chooseOption" onchange="this.form.click()">
                           <option selected>Choose an Option</option>
                           <option type="checkbox" name="option1" value="Online Banking">Online Banking</option>
                           <option value="Financial Control">Financial Control</option>
                           <option value="Yearly Profit">Yearly Profit</option>
                           <option value="Crypto Investment">Crypto Investment</option>
                        </select>
                     </fieldset>
                  </div>
                        <button type="submit" id="form-submit" class="btn btn-primary upmega-round">Apply Now</button>
                   
               </div>
            </form>
         </div>
         </div>
   </div>
</section>
<section class="testimonials" id="testimonials">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
               <h6>Testimonials</h6>
               <h4>What They Say</h4>
            </div>
         </div>
         <div class="col-lg-10 offset-lg-1">
            <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
               <div class="item">
                  <i class="fa fa-quote-left"></i>
                  <p>“Donec et nunc massa. Nullam non felis dignissim, dapibus turpis semper, vulputate lorem. Nam volutpat posuere tellus, in porttitor justo interdum nec. Aenean in dapibus risus, in euismod ligula. Aliquam vel scelerisque elit.”</p>
                  <h4>David Eigenberg</h4>
                  <span>CEO of Mexant</span>
                  <div class="right-image">
                     <img src="assets/images/testimonials-01.jpg" alt="">
                  </div>
               </div>
               <div class="item">
                  <i class="fa fa-quote-left"></i>
                  <p>“Etiam id ligula risus. Fusce fringilla nisl nunc, nec rutrum lectus cursus nec. In blandit nibh dolor, at rutrum leo accumsan porta. Nullam pulvinar eros porttitor risus condimentum tempus.”</p>
                  <h4>Andrew Garfield</h4>
                  <span>CTO of Mexant</span>
                  <div class="right-image">
                     <img src="assets/images/testimonials-01.jpg" alt="">
                  </div>
               </div>
               <div class="item">
                  <i class="fa fa-quote-left"></i>
                  <p>“Ut dictum vehicula massa, ac pharetra leo tincidunt eu. Phasellus in tristique magna, ac gravida leo. Integer sed lorem sapien. Ut viverra mauris sed lobortis commodo.”</p>
                  <h4>George Lopez</h4>
                  <span>Crypto Manager</span>
                  <div class="right-image">
                     <img src="assets/images/testimonials-01.jpg" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="partners">
   <div class="container">
      <div class="row">
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
         <div class="col-lg-2 col-sm-4 col-6">
            <div class="item">
               <img src="assets/images/client-01.png" alt="">
            </div>
         </div>
      </div>
   </div>
</section>
@endsection