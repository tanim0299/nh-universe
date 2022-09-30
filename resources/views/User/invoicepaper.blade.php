
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{URL::to('public')}}/invoice.css" media="all" />
    <link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/css/bootstrap.min.css">

    <style type="text/css">

      @media print
      {
       .print{
        display: none;
    }
    #thanks{
        display: none;
    }
}
</style>
</head>
<body style="margin:0 auto;"  class="mt-4">




    <div class="table-responsive ee_invoice border" style="font-size:13px;">
        <div style="overflow: hidden;">
            <div style="overflow: hidden">
                <center><header style="width: 100%;">
                    <img style="width: 20%" src="{{asset('public')}}/black.png">
                    <br>
                    Our Office Address<br>
                   Corporate Office: 15, Masjid Goli, Nayapaltan, Dhaka, Bangladesh.
</br>
China Office: 689, Gong Ren Bei Lu, Yiwu, Zhejiang, China.
                    <br>
                    +8801321410005, +8801829968783
                    <br>
                    Email: halalbuy.com@gmail.com
                </header>
                <!--{!! $contact->description !!}-->

            </center>
        </div>
        @php
        $date = substr($viewcart[0]->created_at,0,10)
        @endphp
        <div class="p-3">
            Invoice ID :#{{$viewcart[0]->invoice_id}} <br>
            Order Date :{{$date}} <br>
            Payment Type :{{$viewcart[0]->payment_type}} <br>
            Delivery Date :<?php echo date($date, strtotime('+2 days' )) ?>


        </div>

    </div>





    <style>
        table td{
            padding:2px!important;
        }
    </style>
    <!--UserProfileTable-->
    <table class="table" style="margin-bottom:0px">

        <thead style="border-top:2px solid black">
            <tr>
                <th style="background:#fffdfd;border-bottom:none; font-weight:bold;">Bill To</th>
                <th style="background:#fffdfd;border-bottom:none; font-weight:bold;">Ship To</th>

            </tr>
        </thead>
        <tbody style="border-top:none;">
            <tr>
                <td style="background:#fffdfd;border-top:2px solid #ccc;text-align:left">
                    Name :{{$viewcart[0]->first_name}}&nbsp;{{$viewcart[0]->last_name}} <br>
                    E-mail :{{$viewcart[0]->email}}<br>
                    Address :{{$viewcart[0]->address}}<br>
                    Phone :{{$viewcart[0]->phone}}<br>
                    Country :{{$viewcart[0]->country}},{{$viewcart[0]->district_name}}<br>


                </td>
                <td style="background:#fffdfd;border-top:2px solid #ccc;text-align:left">
                 Name :{{$viewcart[0]->first_name}}&nbsp;{{$viewcart[0]->last_name}} <br>
                 E-mail :{{$viewcart[0]->email}}<br>
                 Address :{{$viewcart[0]->address}}<br>
                 phone :{{$viewcart[0]->phone}}<br>
                 country :{{$viewcart[0]->country}},{{$viewcart[0]->district_name}}<br>


             </td>

         </tr>
     </tbody>
 </table>
 <!--OrderTable--->
 <table class="table" style="border-bottom:1px solid #ccc">
    <thead style="border-top:2px solid black;border-bottom:2px solid black">
        <tr>
            <th style="border-bottom:none;border-top:none">SL</th>
            <th style="border-bottom:none;border-top:none">Product</th>
            <th style="border-bottom:none;border-top:none">Unite Price</th>
            <th style="border-bottom:none;border-top:none;text-align:center;">QTY</th>
            <th style="border-bottom:none;border-top:none;text-align:center;">Size</th>
            <th style="border-bottom:none;border-top:none;text-align:center;">Color</th>
            <th style="border-bottom:none;border-top:none;text-align: right">Amount</th>
        </tr>
    </thead>
    <tbody style="border-top:none">
        @php
        $sl=1;
        @endphp

        @if(isset($viewcart))
        @foreach($viewcart as $cart)
        <tr>
            <td style="border-top:1px solid #ccc">{{$sl++}}</td>
            <td style="border-top:1px solid #ccc;text-align:center"> {{$cart->product_name}} <b>( {{ $cart->product_id }} )</b></td>
            <td style="border-top:1px solid #ccc;text-align:center">৳ {{$cart->current_price}}</td>
            <td style="border-top:1px solid #ccc;text-align:center">{{$cart->quantity}}</td>
            <td style="border-top:1px solid #ccc;text-align:center">{{$cart->size}}</td>
            <td style="border-top:1px solid #ccc;text-align:center">{{$cart->color}}</td>
            <td style="border-top:1px solid #ccc;text-align:right">৳{{$cart->current_price * $cart->quantity}}</td>
        </tr>
        @endforeach
        @endif


        <tr style="border-top:1px solid #ccc">
            <td style="border-top:2px solid #000;"></td>
            <td style="border-top:2px solid #000;"></td>
            <td style="border-top:2px solid #000;"></td>
            <td style="border-top:2px solid #000;"></td>
            <td style="border-top:2px solid #000;"></td>
            <td style="border-top:2px solid #000;text-align:right;">Sub price</td>
            <td style="border-top:2px solid #000;text-align:right">
               ৳ {{$viewcart[0]->sub_total}}
           </td>
       </tr>



       <tr>
        <td style="border-top:none;"></td>
        <td style="border-top:none;"></td>
        <td style="border-top:none;"></td>
        <td style="border-top:none;"></td>
        <!--<td style="border-top:none;"></td>-->
        <td colspan="2" style="border-top:none;text-align:right;">Delivery charge (+)</td>
        <td style="border-top:none;text-align:right">
         ৳ {{$viewcart[0]->delivery_charge}}
     </td>
 </tr>
 @if($viewcart[0]->coupon_id !='' && $viewcart[0]->discount>0)
 <tr>
    <td style="border-top:none;"></td>
    <td style="border-top:none;"></td>
    <td style="border-top:none;"></td>
    <td style="border-top:none;"></td>
    <!--<td style="border-top:none;"></td>-->
    <td colspan="2" style="border-top:none;text-align:right;">Discount (-)</td>
    <td style="border-top:none;text-align:right">
     ৳ {{$viewcart[0]->discount}}
 </td>
</tr>
@endif
<tr style="border-top: 1px solid #ccc">
    <td style="border-top:none;border-bottom:none;"></td>
    <td style="border-top:none;border-bottom:none;"></td>
    <td style="border-top:none;border-bottom:none;"></td>
    <td style="border-top:none;border-bottom:none;"></td>
    <!--<td style="border-top:none;border-bottom:none;"></td>-->
    <td colspan="2" style="border-top:none;border-bottom:none;font-weight:bold;text-align:right;">Grand total</td>
    <td style="border-top:none;border-bottom:none;font-weight:bold;text-align:right">৳ {{$viewcart[0]->grand_total}}</td>
</tr>





</tbody>
</table>
<div class="ee_invoiceFT">
    <p style="margin: 0;font-size: 10px;text-align: center;letter-spacing: 2px;">http://halalbuy.com.bd<i class="fa fa-phone">/ +8801321410005, +8801829968783</i> <i class="fa fa-envelope-o">/ halalbuy.com@gmail.com</i></p>
</div>
</div>

<div id="thanks">
 <center><a href="{{ url('/') }}" class="btn btn-danger btn-sm" style="background-color: #ff5500; box-shadow: none; outline: none; border:none;">Go To Shopping</a></center>
</div>


<footer>
   <p style="font-size: 10px;font-weight: bold;text-align: center;">Developed By Skill Based IT (http://sbit.com.bd)</p> 
</footer>

<center><input type="button" name="" value="Print" class="btn btn-danger btn-sm print" onclick="window.print()"></center>
</body>
</html>
