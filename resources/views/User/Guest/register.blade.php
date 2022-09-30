@extends('User.layouts.master')
@section('body')




<div class="col-sm-12 col-12 bg-light">
  <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 pb-5">
    <div class="container-fluid">
      <div class="col-sm-12 col-12 bg-white p-3 loginback">
        
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{route('user-Register.store')}}" method="POST">
          <h5>Create your Account</h5><hr>
          @csrf
          
          <div class="row p-2">

            <div class="form-group mform col-sm-12">
              <label>Name</label>
              <input type="text" class="form-control textfill" name="first_name" placeholder="Name" required="" value="{{old('first_name')}}">
            </div>

            <!--<div class="form-group mform col-sm-6">-->
              <!--  <label>Last Name</label>-->
              <!--  <input type="text" class="form-control textfill" name="last_name" placeholder="Last Name" required="" value="{{old('last_name')}}">-->
              <!--</div>-->
              
              
              <div class="form-group mform col-sm-12">
                <label>Phone</label>
                <input type="text" class="form-control textfill" name="phone" placeholder="Mobile" value="{{old('phone')}}" required="">
              </div>


              <div class="form-group mform col-sm-12">
                <label>Email</label>
                <input type="email" class="form-control textfill" name="email" placeholder="Email"  value="{{old('email')}}">
              </div>


              <div class="form-group mform col-sm-6">
                <label>Password</label>
                <input type="Password" class="form-control textfill" name="password" id="password" placeholder="Password" required="" value="{{old('password')}}" onkeyup="checkpassword()">
                <span id="p_sms"></span>
              </div>


              <div class="form-group mform col-sm-6">
                <label>Confirm Password</label>
                <input type="Password"  disabled="disabled" class="form-control textfill" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="" value="{{old('confirm_password')}}" onkeyup="checkconfirm_p()">
                <span id="c_sms"></span>
              </div>

              <div class="form-group mform col-sm-12">
                <label>Address</label>
                <textarea class="form-control textfill2" rows="3" placeholder="Address" name="address" >{{old('address')}}</textarea>
              </div>


              <div class="form-group mform col-sm-12">
                <a href="{{ url('/user-login') }}">Already Have Account ?</a>
              </div>

              <div class="form-group mform col-sm-12">
                <center><input type="submit" value="SIGN UP" class="d-block form-control logbutton w-100" style="background-color: #0a0a0a;"></center>
              </div>
            </div>
          </form>

          

          <center>
            <span style="color:gray;">
             or
           </span><br><br>
             <div class="mt-2">
              <a href="{{url('/user-login/facebook')}}" class="btn btn-primary p-2 text-light w-100"><span uk-icon="icon: facebook; ratio: 1"></span>&nbsp;&nbsp;Login with Facebook</a>
         </div>
    
         </center>



       </div>
     </div>
   </div>
 </div>










 @endsection

 <script>
  var minLength = 8;

  function checkpassword(){
   
    var password = document.getElementById("password").value;
    //  alert(password.length)
    if (password.length < minLength) {
      $("#p_sms").html("<font style='color:red;font-size:12px'>**Password minimum 8 character</font>");
      document.getElementById("confirm_password").disabled = true;
    }else if (password.length >= minLength){
     $("#p_sms").html("<font style='color:green;font-size:12px'>This password is accepted</font>");
     document.getElementById("confirm_password").disabled = false;
   }
   else
   {
    $("#p_sms").html("");
    document.getElementById("confirm_password").disabled = true;
  }
}
function checkconfirm_p(){
 $("#p_sms").html("");
 var password = document.getElementById("password").value;
 var c_password = document.getElementById("confirm_password").value;
    //  alert(c_password)
    if (password === c_password) {
      $("#c_sms").html("<font style='color:green;font-size:12px'>This Password Match Successfully</font>");
    }
    else if (password.length < c_password.length)
    {
     $("#c_sms").html("<font style='color:red;font-size:12px'>**The confirm password and password must match.</font>");
   }
   else
   {
    $("#c_sms").html("<font style='color:red;font-size:12px'>*Password try to matching...</font>");
  }
}
</script>