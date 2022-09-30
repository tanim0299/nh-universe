@extends('User.layouts.master')
@section('body')


<div class="col-sm-12 col-12 pt-3 pb-5 bg-light">
  <div class="container-fluid">
    <div>
      <ul class="uk-breadcrumb bg-white p-0 p-3" style="border-radius: 30px;">
        <li><a href="{{ url('/') }}" class="font-weight-bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
        <li><span class="text-dark font-weight-bold">Whole Sale</span></li>
      </ul>
    </div>

    <div class="row">

      @if(isset($view))
      @foreach($view as $v)

      <div class="col-lg-2 col-md-4 col-sm-6 col-6 mt-4">
       <div class="importback">
        <center>
          <a href="{{ url('View_Wholsale/'. $v->id) }}">
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


@endsection