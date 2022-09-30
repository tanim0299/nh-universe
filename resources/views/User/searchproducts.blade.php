@extends('User.layouts.master')
@section('body')






<div class="col-sm-12 col-12 pt-3 pb-5 bg-light">
  <div class="container-fluid">
    <ul class="uk-breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="uk-disabled"><a>Search Products</a></li>
    </ul>

    <div class="col-sm-12 col-12 pa">
     <div class="row"  id="showdata">


      @if(isset($searchproducts))
      @foreach($searchproducts as $s)
      @php 
      $productname=str_replace(["%","/"," "],"-",$s->product_name)
      @endphp
      <div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4">
       <div class="homeproducts border">
          <center>
            <a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><img src="{{asset('public/productImage')}}/{{$s->image}}" class="img-fluid" style=""></a>
          </center>


          <div>
            <a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><center>{{ substr($s->product_name, 0,20) }}<br>
              <span>@if($s->discount_price>0)<del>TK.{{$s->sale_price}}</del>@endif&nbsp;&nbsp;TK.{{$s->current_price}}</span></center></a>
            </div>
          </div>
        </div>



        @endforeach
        @endif


        <div class="col-sm-12 col-12 mt-5">
         {{ $searchproducts->links() }}
       </div>

     </div>
   </div>
 </div>


</div>
</div>




@endsection