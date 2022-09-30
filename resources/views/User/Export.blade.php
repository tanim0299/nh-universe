@extends('User.layouts.master')
@section('body')


<div class="col-sm-12 col-12 pt-3 pb-5 bg-light">
  <div class="container-fluid">
    <div>
      <ul class="uk-breadcrumb bg-white p-0 p-3" style="border-radius: 30px;">
        <li><a href="{{ url('/') }}" class="font-weight-bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
        <li><span class="text-dark font-weight-bold">Export</span></li>
      </ul>
    </div>
    
    
    
<button type="button" class="btn btn-success w-100 rounded p-2" data-toggle="modal" data-target="#myModal">
 Submit Information
</button>


    <div class="row">

      @if(isset($view))
      @foreach($view as $v)

      <div class="col-lg-2 col-md-4 col-sm-6 col-6 mt-4">
       <div class="importback">
        <center>
          <a href="{{ url('View_Export/'. $v->id) }}">
            <img src="{{ url($v->image) }}" class="img-fluid"><br><br>
            {{ $v->title }}
          </a>
        </center>
      </div>
    </div>


    @endforeach
    @endif




  </div>


</div>
</div>



<style type="text/css">
  .importback{background: #fff; padding: 20px; border-radius: 5px;}
  .importback img{max-height: 100px; transform: scale(0.95); transition: 0.5s;}
  .importback img:hover{transform: scale(1.00);}
  .importback a{font-weight: bold; color: #414141; text-decoration: none;}
</style>




<div id="myModal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light">Your Information</h5>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('/export-import-sent')}}">
                    @csrf
            	   <div class="form-group mform col-sm-12">
              <label>Name</label>
              <input type="text" class="form-control textfill" name="name" placeholder="Name" required="">
            </div>
            
            
            	   <div class="form-group mform col-sm-12">
              <label>Email</label>
              <input type="email" class="form-control textfill" name="email" placeholder="Email" required="">
            </div>
            
            
           <div class="form-group mform col-sm-12">
              <label>Phone</label>
              <input type="number" class="form-control textfill" name="phone" placeholder="Phone" required="">
            </div>
            
            
               <div class="form-group mform col-sm-12">
              <label>Description</label>
              <textarea row="3"  class="form-control textfill2" name="description"></textarea>
            </div>
            
            <div class="form-group mform col-sm-12">
                <input type="submit" value="Submit Now" name="export_btn" class="btn btn-success w-100 rounded">
            </div>
            
        </form>
           
            </div>
        </div>
    </div>
</div>



@endsection