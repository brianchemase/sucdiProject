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
        <img src="{{public_path('logo/logo.png')}}" alt="logo" width="50" height="50">
        <h1>{{$title}}</h1>
    </div>
   
      <div class="col-lg-12" style="margin-top: 5px ">     
        <div class="pull-right">
        <h4>As of: {{$date}}</h4> 
        </div>
      </div>
    </div><br>
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <th>#</th>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>RegNo</th>
        <th>Residence</th>
        <th>Postal Address</th>
        <th>Client Type</th>
      </thead>
      @foreach ($clients as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->client_names }}</td>
        <td>{{ $data->phone }}</td>
        <td>{{ $data->email }}</td>
        <td>{{ $data->national_id }}</td>
        <td>{{ $data->home_residence }}</td>
        <td>{{ $data->postal_address }} - {{ $data->postal_code }}</td>
        <td>
            {{ $data->client_type === 'individual' ? 'Personal' : 'Company' }}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  <p class="mb-2 text-center"><I>Report generated by <b>{{ Session::get('username')}}</b>  on {{ $mytime = Carbon\Carbon::now(); }} <br>Report generated from SUCDI Insuarance System </I></p>
</body>
</html>