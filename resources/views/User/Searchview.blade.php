				@if(isset($search))
        @foreach($search as $s)
        @php 
        $productname=str_replace(["%","/"," "],"-",$s->product_name)
        @endphp
        <div class="col-lg-3 cl-md-4 col-sm-6 col-6 mt-4">
          <div class="homeproducts border">
            <center>
              <a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><img src="{{asset('public/productImage')}}/{{$s->image}}" class="img-fluid" style=""></a>
            </center>
            

            
            
            <div >
              <a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><center>{{ substr($s->product_name, 0,20) }}<br>
                <span>@if($s->discount_price>0)<del>TK.{{$s->sale_price}}</del>@endif&nbsp;&nbsp;TK.{{$s->current_price}}</span></center></a>
              </div>
            </div>
          </div>


          @endforeach
          @endif