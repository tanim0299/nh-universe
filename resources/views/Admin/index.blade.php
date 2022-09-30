@include('Admin.header')


<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    
    <!--===========header end===========-->

    <!--===========app body start===========-->
    <div class="app-body">

        <main class="main-content">
            <!--page title start-->
            <div class="page-title">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="mb-0"> Dashboard
                                <small></small>
                            </h4>
                            <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                     
                    </div>
                </div>
            </div>

            <!--page title end-->


            <div class="container-fluid">

                <!--state widget start-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                                <a href="{{url('GuestList')}}" style="text-decoration:none;color:red;"><h6 class="mb-0 mt-3">Register Users</h6>
                                <p class="f12 mb-0">{{$user}}  Users</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                               <a href="{{url('GuestListactive')}}" style="text-decoration:none;color:green;"> <h6 class="mb-0 mt-3">Active Users</h6>
                                <p class="f12 mb-0">{{$acuser}}  Users</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                               <a href="{{url('GuestListinactive')}}" style="text-decoration:none;color:red;"> <h6 class="mb-0 mt-3">Inactive Users</h6>
                                <p class="f12 mb-0">{{$inuser}}  Users</p></a>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                                <a href="{{url('sellerlist')}}" style="text-decoration:none;color:red;"><h6 class="mb-0 mt-3">Register Seller</h6>
                                <p class="f12 mb-0">{{$seller}}  Users</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                               <a href="{{url('selleractivelist')}}" style="text-decoration:none;color:green;"> <h6 class="mb-0 mt-3">Active Seller</h6>
                                <p class="f12 mb-0">{{$acseller}}  Users</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-people text-primary f30"></i>
                               <a href="{{url('sellerinactivelist')}}" style="text-decoration:none;color:red;"> <h6 class="mb-0 mt-3">Inactive Seller</h6>
                                <p class="f12 mb-0">{{$inseller}}  Users</p></a>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                                <a href="{{url('totalOrder')}}" style="text-decoration:none;color:red;"><h6 class="mb-0 mt-3">Order Placed</h6></a>
                                <p class="f12 mb-0">{{$order}} Order Placed</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                                <a href="{{url('pendingOrder')}}" style="text-decoration:none;color:red;"> <h6 class="mb-0 mt-3">Pending Order Placed</h6>
                                <p class="f12 mb-0" style="color: red">{{$porder}} Order Placed</p></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                               <a href="{{url('ProcessOrder')}}" style="text-decoration:none;color:yellow;"> <h6 class="mb-0 mt-3">Process Order Placed</h6>
                                <p class="f12 mb-0" style="color: green">{{$pporder}} Order Placed</p></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                               <a href="{{url('onthewayOrder')}}" style="text-decoration:none;color:yellow;"> <h6 class="mb-0 mt-3">On the way Order Placed</h6>
                                <p class="f12 mb-0" style="color: green">{{$onorder}} Order Placed</p> </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                              <a href="{{url('CompleteOrder')}}" style="text-decoration:none;color:green;">   <h6 class="mb-0 mt-3">Success Order Placed</h6>
                                <p class="f12 mb-0" style="color: green">{{$sorder}} Order Placed</p></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-basket-loaded text-info f30"></i>
                                <a href="{{url('RejectOrder')}}" style="text-decoration:none;color:red;"> <h6 class="mb-0 mt-3">Reject Order Placed</h6>
                                <p class="f12 mb-0" style="color: red">{{$reorder}} Order Placed</p></a>
                            </div>
                        </div>
                    </div>



     

                 <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <a href="{{url('schedule')}}" style="text-decoration:none;"><i class="fa fa-toggle-off text-info f30"></i>
                                 <h6 class="mb-0 mt-3">Flash Sale Off</h6>
                               <p class="f12 mb-0" style="color: green"></p></a>
                            </div>
                        </div>
                    </div>
                    
                                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow">
                            <div class="card-body ">
                                <i class="icon-trash text-info f30"></i>
                                <a href="{{url('clearshopping')}}" style="text-decoration:none;color:red;" onclick="return confirm('Are you sure delete all inactive data?')"> <h6 class="mb-0 mt-3">Clear shopping cart data</h6>
                                <p class="f12 mb-0" style="color: red">Clear Shopping</p></a>
                            </div>
                        </div>
                    </div>



                 <!--<div class="col-xl-3 col-sm-6 mb-4">-->
                 <!--       <div class="card card-shadow">-->
                 <!--           <div class="card-body ">-->
                 <!--               <i class="icon-basket-loaded text-info f30"></i>-->
                 <!--               <h6 class="mb-0 mt-3">Today Account Statement</h6>-->
                 <!--               <p class="f12 mb-0" style="color: green">0</p>-->
                 <!--           </div>-->
                 <!--       </div>-->
                 <!--   </div>-->


                
                </div>

            </div>

        </main>

    </div>


    @include('Admin.footer')

</body>

</html>
<!-- Data table -->

<!-- https://datatables.net/extensions/buttons/examples/initialisation/export.html -->