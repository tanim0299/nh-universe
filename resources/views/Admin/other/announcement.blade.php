@include('Admin.header')
<div class="main-content">
  <div class="container">

    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-md-12">

        <div class="card card-shadow mb-4">
          <div class="card-header">
            <div class="card-title" style="float: left;">
             Update Announcement
            </div> 
            <div class="card-title" style="float: right;">

            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ url('/insertannouncement') }}">
             @csrf
             <div class="row">
              <div class="col-md-12">


                <div class="control-group">

                  <label class="control-label">Title</label>

                  <div class="controls">
                    <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
                  </div>
                </div>        

                <div class="control-group">

                  <label class="control-label">Details</label>

                  <div class="controls">
                    <textarea  name="description" id="description" class="form-control">{!! $data->description !!}</textarea>
                  </div>
                </div>        



              </div>
            </div>
            <br>
            <div align="center">
             <input type="submit" name="submit" class="btn btn-success">
           </div>
         </form>
       </div>
     </div>




   </div>
 </div>
</div>
</div>
@include('Admin.footer')


<!--<script src="{{URL::to('/')}}/public/editor3/ckeditor.js"></script> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<script>
$('#description').summernote({
  lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
  
});
</script>


