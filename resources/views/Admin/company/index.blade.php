@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Brand
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{route('brand-add.create')}}" class="btn btn-outline-success">Add Brand</a> 
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container-fluid" style="overflow-x: scroll;">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Brand Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->id}}">
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->company_name}}</td>
                                        <td>
                                      
                                            @if($showdata->image)
                                    <div uk-lightbox="animation: fade">
                                           <a href="{{asset('/public/companyImage')}}/{{$showdata->image}}"> <img src="{{asset('/public/companyImage')}}/{{$showdata->image}}" style="width: 50px;height: 50px"></a>
                                        </div>        

                                            @else
                                            <div uk-lightbox="animation: fade">
                                             <a href="{{asset('/public')}}/noimage.png"> <img src="{{asset('/public')}}/noimage.png" style="width: 50px;height: 50px"></a>
                                         </div>
                                         @endif


                                        </td>
                                        <td>
                                            <a href="{{route('brand-add.edit',$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                            <form method="POST" action="{{ route('brand-add.destroy',$showdata->id) }}">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                                            </form>
                                            
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




            </div>
        </div>

@include('Admin.footer')
