@extends('insuarance.inc.master')

@section('title','Dashboard Table')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registered Clients Claims</h4>
              </div>
              
              <div class="card-body">
                <div class="pull-right">
                  <a class="btn btn-primary" href="{{route('clientsRegisterPDF')}}" target="_blank">Generate Client List</a>
                </div>
              </div>
                
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Names</th>
                        <th>RegNo</th>
                        <th>Phone</th>
                        <th>Claim Date</th>
                        
                        <th>Status</th>
                        <th>Claim Amount</th>
                                           
                        <th>Claim Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientdata as $client)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $client->client_names }}</td>
                                <td>{{ $client->national_id }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ date('d/m/Y', strtotime($client->ClaimDate)) }}</td>
                               
                                <td>{{ $client->ClaimStatus }}</td>
                                <td>{{ number_format($client->ClaimAmount, 2, '.', ',') }}</td>                                                              
                                <td>{{ $client->ClaimDetails }}</td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Client Names</th>
                                <th>National ID</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>status</th>
                                <th>Claim Amount</th>                                                             
                                <th>Claim Details</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>


@endsection