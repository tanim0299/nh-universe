@extends('User.layouts.master')
@section('body')



<div class="col-sm-12 col-12 bg-light">
  <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 pb-5">
    <div class="container-fluid">
      <div class="col-sm-12 col-12 bg-white p-3 loginback">
        @include('msg.flash')
        <form method="post" action="{{url('/guest-login')}}">
          <h5>Login your Account</h5><hr>
          @csrf
          
          <div class="row p-2">
            <div class="form-group mform col-sm-12">
              <label>Email/Mobile</label>
              <input type="text" class="form-control textfill" name="email" placeholder="Email/Mobile" required="">
            </div>

            <div class="form-group mform col-sm-12">
              <label>Password</label>
              <input type="Password" class="form-control textfill" name="password" placeholder="Password" required="">
            </div>

            <div class="form-group mform col-sm-12">
              <a href="{{ url('/user-Register') }}" style="text-align:left">Create New Account ?</a>
              
              {{-- <a href="{{ url('/forgot_password') }}" style="text-align:right">Forgot Account ?</a> --}}
            </div>


            <div class="form-group mform col-sm-12">
              <center><input type="submit" value="LOGIN" class="form-control logbutton w-100" style="background-color: #0a0a0a;"></center>
            </div>

          </div>
        </form>
        

        <center>
          <span style="color:gray;">
           or
         </span><br>
         <div class="mt-2">
              <a href="{{url('/user-login/facebook')}}" class="btn btn-primary p-2 text-light w-100"><span uk-icon="icon: facebook; ratio: 1"></span>&nbsp;&nbsp;Login with Facebook</a>
         </div>
        

       </center>



       </div>
     </div>
   </div>
 </div>





 @endsection
