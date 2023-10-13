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
    <table class="table table-bordered table-striped table-sm">
      <thead class="thead-dark">
        <th>#</th>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Policy Code</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Amount</th>
        <th>Plate No.</th>
        <th>Status</th>
      </thead>
      @foreach ($issuedCovers as $data)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->client_names }}</td>
        <td>{{ $data->phone }}</td>
        <td>{{ $data->policy_code }}</td>
        <td>{{ \Carbon\Carbon::parse($data->start_date)->format('jS F Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($data->end_date)->format('jS F Y') }}</td>
        <td>KES {{ number_format($data->PremiumAmount) }}</td>
        <td>{{ $data->plate_number }}</td>
        <td style="color: 
          @if ($data->status == 'running')
              green
          @elseif ($data->status == 'expired')
              red
          @else
              amber
          @endif
        ">
          @if ($data->status == 'running')
              Active
          @elseif ($data->status == 'expired')
              Expired
          @else
              On Review
          @endif
      </td>

      </tr>
      @endforeach
    </table>
  </div>
  <p class="mb-2 text-center"><I>Report generated by <b>{{ Session::get('username')}}</b>  on {{ $mytime = Carbon\Carbon::now(); }} <br>Report generated from SUCDI Insuarance System </I></p>
</body>
</html>