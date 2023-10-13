<!DOCTYPE html>
<html>
<head>
  <title>{{$title}}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
    <div style="text-align: center;">
        <img src="{{public_path('logo/logo.png')}}" alt="logo" width="50" height="60">
        <h1>{{$title}}</h1>
    </div>
   
      <div class="col-lg-12" style="margin-top: 15px ">     
        
        <div class="pull-right">
        <h4>As of: {{$date}}</h4>
          
        </div>
      </div>
    </div><br>
    <table class="table table-bordered">
      <tr>
        <th>#</th>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
      </tr>
      @foreach ($issuedCovers as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->client_names }}</td>
        <td>{{ $data->phone }}</td>
        <td>{{ $data->email }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>