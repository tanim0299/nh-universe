@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View On the Way Order
                    <small></small>
                </h4>
              
            </div>
               <div class="page-title" style="float: right; ">
                <a href="{{url('pendingOrder')}}" class="btn btn-warning">Pending</a> 
            </div>  
            
            <div class="page-title" style="float: right; ">
                <a href="{{url('ProcessOrder')}}" class="btn btn-info">Process</a> 
            </div>   

            <div class="page-title" style="float: right; ">
                <a href="{{url('onthewayOrder')}}" class="btn btn-primary">On the Way</a> 
            </div>


            <div class="page-title" style="float: right; ">
                <a href="{{url('CompleteOrder')}}" class="btn btn-success">Success</a> 
            </div>

            <div class="page-title" style="float: right; ">
                <a href="{{url('RejectOrder')}}" class="btn btn-danger">Reject</a> 
            </div>
             <div class="page-title" style="float: right; ">
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container-fluid" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   <span id="sms"></span>
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%;text-align:center;">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Invoice ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Delivery Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Invoice ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Delivery Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->invoice_id}}</td>
                                        <td>{{$showdata->first_name}}&nbsp;{{$showdata->last_name}}</td>
                                        <td>{{$showdata->phone}}</td>
                                          <td>{{$showdata->product_name}} <b>({{ $showdata->product_id }})</b></td>
                                        <td uk-lightbox><a href="{{ url('public/productImage') }}/{{ $showdata->image }}"><img src="{{ url('public/productImage') }}/{{ $showdata->image }}" style="max-height:100px;"></a></td>
                                        <td>{{$showdata->district_name}}</td>
                                        <td>{{$showdata->payment_type}}</td>
                                        <td>{{$showdata->mobile_acc}}</td>
                                        <td>{{$showdata->trans_id}}</td>
                                        <td>{{$showdata->delivery_charge}}</td>
                                        <td>{{$showdata->discount}}</td>
                                        <td>{{$showdata->sub_total}}</td>
                                        <td>{{$showdata->grand_total}}</td>
                                        <td>
                                            
                                            <a class="btn btn-success" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Success</a>


                                            
                                            <a class="btn btn-danger" onclick="penTorejectOrder('{{$showdata->invoice_id}}')">Reject</a>

                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-warning" target="_blank">Report</a>
                                        </td>
                                    </tr>
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">


  
function ontheTosuccOrder(id)
{
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("ontheTosuccOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Delivery Success</span>');
            }
        })  

    
}
  
function penTorejectOrder(id)
{
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penTorejectOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-danger">Order Reject</span>');
            }
        })  

    
}
</script>