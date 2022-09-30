@extends('User.layouts.master')
@section('body')



<div class="col-sm-12 col-12 bg-light">
  <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 pb-5">
    <div class="container-fluid">
      <div class="col-sm-12 col-12 bg-white p-3 loginback">
        @include('msg.flash')
        <form method="get" action="">
          <h5>Track Order</h5><hr>
          @csrf
          
          <div class="row p-2">
            <div class="form-group mform col-sm-12">
              <label>Invoice ID</label>
              <input type="text" class="form-control textfill" name="id" placeholder="Invoice ID" required="">
              <span style="color: gray;font-size: 13px;">Your Invoice ID</span>
            </div>

            <div class="form-group mform col-sm-12">
              <label>Phone Number</label>
              <input type="number" class="form-control textfill" name="number" placeholder="Phone Number" required="">
              <span style="color: gray;font-size: 13px;">Phone Number you provided to create this order</span>
            </div>



            <div class="form-group mform col-sm-12">
              <center><input type="submit" value="Track My Order" class="form-control logbutton w-50" style="background-color: #0a0a0a;"></center>
            </div>

          </div>
        </form>




       </div>
     </div>
   </div>
 </div>





 @endsection
