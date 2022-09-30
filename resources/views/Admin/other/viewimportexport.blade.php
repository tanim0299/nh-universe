@include('Admin.header')

<br>
<br>
<br>




<div class="main-content" style="overflow: hidden;">
    <!--page title start-->
    <div class="page-title" style="float: left;">
        <h4 class="mb-0">View Import Export Wholesale
            <small></small>
        </h4>

    </div>
    <div class="page-title" style="float: right; ">
        <a href="{{url('addimportexport')}}" class="btn btn-outline-success">Add Import/Export/Wholesale</a> 
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                                @php $i=0; @endphp

                                @if(isset($view))
                                @foreach($view as $showdata)
                                @php $i++; @endphp

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $showdata->title }}</td>
                                    <td>
                                        @if($showdata->type == 0)
                                        Import
                                        @elseif($showdata->type == 1)
                                        Export
                                        @else
                                        Wholesale
                                        @endif
                                    </td>
                                    <td><img src="{{ url($showdata->image) }}" class="img-fluid" style="height: 50px;"></td>
                                    <td><a href="{{ url('/EditImportExport/'. $showdata->id) }}" class="btn btn-info">Edit</a>
                                        &nbsp;<a href="{{ url('/DeleteImportExport/'. $showdata->id) }}" class="btn btn-danger">Delete</a></td>
                                    
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

</script>