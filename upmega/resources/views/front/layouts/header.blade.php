<style>

.site-span-btn{
    font-size: 10px; padding-left: 6px; padding-bottom: 2px; padding-top: 2px; padding-right: 6px;
}
.landing-page-header{
   height: 100px;
}
   .upmega-img-contain{
  object-fit: contain;
  width: 100%;
}

.upmega-img-cover{
  object-fit: cover;
  width: 100%;
}

.upmega-profile-img{
  object-fit: cover;
  /*width: 100%;*/
  /*height: 300px;*/
  border-radius: 50%;
}

   .upmega-members-wako {
    animation-duration: 2s;
}

   .upmega-card-upload-icon{
position:relative; 
top: calc(50% - 75px);  
font-size: 100px;
}
span .badge{
   border-radius: 30px!important;
}
.upmega-btm-cta{
   width: 90%;
left: 50%; margin-top: 50px;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
    position: absolute;
    bottom: 10px;
}
   .upmega-dropdown-toggle {
   position: relative;
   }
   .upmega-dropdown-toggle::after {
   display: none!important;
   position: absolute;
   right: 20px;
   bottom: 45%;
   }
   .upmega-dropdown-toggle-icon {
   position: absolute;
   right: 20px;
   bottom: 45%;
   }
 
    .visit_profile{

   cursor: pointer;
 }

  .upmega_top_btn{
   font-size: 10px;
   }
 .upmega-discoverleft-top{
 position: fixed; bottom: 88%; left: 0; z-index: 1000;
}

.upmega-discoverleft-mid{
 position: fixed; bottom: 58%; left: 0; z-index: 1000;
}

.upmega-discoverleft-btm{
position: fixed; bottom: 35%; left: 0; right: 0; z-index: 1000; padding: 0;
}


      @media screen and (max-width: 600px){



.upmega-footer-icon{

   font-size: 40px;
}



         .upmega-mobile-hide{
            display: none;
         }

           .upmega_top_btn{
   font-size: 8px;
   }
.upmega-discoverbtn{
   font-size: 8px;
}
.upmega-discoverleft-top {
    bottom: 86%;
   }
.upmega-discoverleft-mid {
    bottom: 58%;
   }

}

       .upmega-material-input {
    position: relative;
    display: inline-block;
    font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
    font-size: 16px;
    line-height: 1.5;
    overflow: hidden;
    width: 100%;
}

/* Input, Textarea */
.upmega-material-input > input,
.upmega-material-input > textarea {
    display: block;
    box-sizing: border-box;
    margin: 0;
    border: none;
    border-top: solid 27px transparent;
    border-bottom: solid 1px rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.6);
    border-radius: 4px 4px 0 0;
    padding: 0 12px 10px;
    width: 100%;
    height: inherit;
    color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.87);
    /*background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.04);*/
    box-shadow: none; /* Firefox */
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    caret-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
    transition: border-bottom 0.2s, background-color 0.2s;
}

/* Span */
.upmega-material-input > input + span,
.upmega-material-input > textarea + span {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: block;
    box-sizing: border-box;
    padding: 7px 12px 0;
    color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.6);
    font-size: 75%;
    line-height: 18px;
    pointer-events: none;
    transition: color 0.2s, font-size 0.2s, line-height 0.2s;
}

/* Underline */
.upmega-material-input > input + span::after,
.upmega-material-input > textarea + span::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    display: block;
    width: 100%;
    height: 2px;
    /*background-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));*/
    transform-origin: bottom center;
    transform: scaleX(0);
    transition: transform 0.3s;
}

/* Hover */
.upmega-material-input > input:hover,
.upmega-material-input > textarea:hover {
    border-bottom-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.87);
    /*background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.08);*/
}

/* Placeholder-shown */
.upmega-material-input > input:not(:focus):placeholder-shown + span,
.upmega-material-input > textarea:not(:focus):placeholder-shown + span {
    font-size: inherit;
    line-height: 48px;
}

/* Focus */
.upmega-material-input > input:focus,
.upmega-material-input > textarea:focus {
    outline: none;
}

.upmega-material-input > input:focus + span,
.upmega-material-input > textarea:focus + span {
    color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
}

.upmega-material-input > input:focus + span::before,
.upmega-material-input > textarea:focus + span::before {
    opacity: 0.12;
}

.upmega-material-input > input:focus + span::after,
.upmega-material-input > textarea:focus + span::after {
    transform: scale(1);
}

/* Disabled */
.upmega-material-input > input:disabled,
.upmega-material-input > textarea:disabled {
    border-bottom-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
    color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
    background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.24);
}

.upmega-material-input > input:disabled + span,
.upmega-material-input > textarea:disabled + span {
    color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
}

/* Faster transition in Safari for less noticable fractional font-size issue */
@media not all and (min-resolution:.001dpcm) {
    @supports (-webkit-appearance:none) {
        .upmega-material-input > input,
        .upmega-material-input > input + span,
        .upmega-material-input > input + span::after,
        .upmega-material-input > textarea,
        .upmega-material-input > textarea + span,
        .upmega-material-input > textarea + span::after {
            transition-duration: 0.1s;
        }
    }
}


 [data-theme="dark"] body .upmega-material-input > input,
.upmega-material-input > textarea {
background-color: transparent;
    border-bottom: solid 2px #747794;
    transition: border-bottom 0.2s, background-color 0.2s;
}

 [data-theme="dark"] body .upmega-material-input-label {
 color: #747794;
}

</style>

 
<div class="header-area upmega-bg" id="headerArea">
   <div class="container-fluid h-100 d-flex align-items-center justify-content-between">
      <div>
         <a onclick="window.history.go(-1); return false;" class="text-site upmega-bold" href="javascript:">
         <i class="fa fa-angle-left"></i>
         </a>
      </div>
      <div class="logo-wrapper">
        
  <a class="text-site upmega-bold" href="{{url('/')}}">
         FX Bar</a>
      </div>
     
      @if (Auth::guest())
      <div>
         <a class="text-site upmega-bold" href="{{url('/register')}}"> <i class="fa fa-user-plus"></i> <span class="upmega-text-hide"> Create Account</span></a>
      </div>
      <div>
         <a class="text-site upmega-bold" href="{{url('/login')}}"> <i class="fa fa-lock"></i> <span class="upmega-text-hide"> Login</span> </a>
      </div>
      @else
     
      
      @endif

       <div>
         <button class="btn btn-primary bg-transparent border-0 shadow-none outline-0 text-site upmega-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#toggleSideNav" aria-controls="toggleSideNav"><i class="fa fa-bars"></i> <span class="upmega-text-hide"> Menu</span> </button>
      </div>
   </div>
</div>
 




