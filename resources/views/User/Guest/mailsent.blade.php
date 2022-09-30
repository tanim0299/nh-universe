<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Lemon|Montserrat&display=swap" rel="stylesheet">
  
</head>
<body>

  <div class="container">
    <div class="col-sm-6 offset-sm-3 mt-3">
      <div class="card">

        <div class="card-header" style="font-family: 'Lemon', cursive; background-color: #4cd137; color: #fff;text-align: center;font-size: 20px">
          {{$type}} Information!
        </div>
        <div class="card-body">
          <center>
            <img src="https://halalbuy.com.bd/public/halallogo.jpg" class="img-fluid" alt="halal-logo" style="height: 200px; width: 220px;">
          </center>
          <h5>User Name:{{$to_name}}</h5>
          <h5>User Phone:{{$phone}}</h5>
          <h5>Name:{{$to_email}}</h5>
          <span style="font-family: 'Montserrat';color: red">
          {{$description}}
          </span>
        </div>
        
      </div>

    </div>
  </div>
</body>
</html>
