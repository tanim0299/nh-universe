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
             Add Import/Export/Wholesale
           </div> 
           <div class="card-title" style="float: right;">

           </div>
         </div>
         <div class="card-body">
          <form method="post" action="{{ url('addimportexports') }}" enctype="multipart/form-data">
           @csrf
           <div class="row">
            <div class="col-md-12">

             <div class="form-group">
              <label class="control-label">Title</label>
              <div class="controls">
                <input type="text" name="title" class="form-control" placeholder="Title" required="">
              </div>
            </div>  


            <div class="form-group">
              <label class="control-label">Type</label>
              <div class="controls">
                <select class="form-control" name="type">
                  <option value="0">Import</option>
                  <option value="1">Export</option>
                  <option value="2">Wholesale</option>
                </select>
              </div>
            </div> 
            
            
            
            <div class="form-group">
              <label class="control-label">Short Details</label>
              <div class="controls">
                <textarea  name="short_details" id="product_us" class="form-control"></textarea>
              </div>
            </div>




            <div class="form-group">
              <label class="control-label">Details</label>
              <div class="controls">
                <textarea  name="details" id="condition" class="form-control"></textarea>
              </div>
            </div>


              <div class="input-group mt-3">

                <div class="custom-file">
                  <input type="file" class="custom-file-input" type="file" id="file" name="image" onchange="readURL(this);"  accept="image" required="">
                  <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>

                </div>

              </div>
              <img src="#" id="one" class="img-fluid" alt="" style="height: 100px;">
    



          </div>
        </div>
        <br>
        <div>
         <input type="submit" name="submit" class="btn btn-success">
       </div>
     </form>
   </div>
 </div>


<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#one')
        .attr('src', e.target.result)

      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>


</div>
</div>
</div>
</div>
@include('Admin.footer')


<!--<script src="{{URL::to('/')}}/public/editor3/ckeditor.js"></script> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<script>
  $('#product_us').summernote(); 
  $('#product_details').summernote(); 
  $('#condition').summernote(); 
</script>


