<!DOCTYPE html>
<html>
<head>
  <title>Login Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/css/uikit.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


</head>
<body>

  <style>

    body{
      height: 100vh;
      font-family: 'Titillium web', sans-serif;
      background-color: #f8f8f8;
    }

    .input-group input{
      height: 50px;
      border:none;
      border:1px solid lightgray;
      border-left: none;
    }

    .input-group input:focus{
      box-shadow: none;
    }

    .form{
      margin: 0 auto; 
      max-width: 480px; 
      padding-top: 120px;
    }

    .card{
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.10) !important;
      border:none;

    }

    .card-body{
      padding-top: 30px;
      padding-bottom: 20px;
    }

    .card-header{
      background:#fff;
      color: #000; 
      padding: 20px;
      font-size: 22px;
      letter-spacing: 0.5px;
      font-weight: bold;
      border-top: 3px solid green;
      border-bottom: 1px dashed lightgray;
    }

    #login{
      background-color: green; 
      color: #fff; 
      letter-spacing: 1px;
      border-radius: 5px;
      font-weight: bold;
      margin-top: 15px;
    }

    .input-group-text{
      background-color: green;
      color: #fff;
      border:none;
    }




  </style>


  <div class="container">

    <form   method="POST" action="{{ URL::to('Login-Admin') }}" class="form" data-aos="fade-in" data-aos-duration="2000">
        @csrf

      <div class="card">
        <div class="card-header">
          <center>
           
          <img src="http://halalbuy.com.bd/public/halallogo.jpg" class="img-fluid logo" style="height: 50px"></center>
        </div>

        <div class="card-body">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><span uk-icon="icon: user; ratio: 1"></span></span>
            </div>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" placeholder="Email" required="">
             @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>


          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><span uk-icon="icon: unlock; ratio: 1"></span></span>
            </div>
            <input type="password" class="form-control" placeholder="Password"  name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
              @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>

          <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" onclick="myFunction()" id="login">Login</button>


        </div>
      </div>


    </form>

  </div>




 <!--<script src="{{asset('/public')}}/assets/vendor/jquery/jquery.min.js"></script>-->
    <script src="{{asset('/public')}}/assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.4/dist/js/uikit-icons.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true
    });     
  </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
          @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
            case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
        }
        @endif
    </script>

</body>
</html>


