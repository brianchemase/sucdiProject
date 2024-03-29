@extends('insuarance.inc.master')

@section('title','Dashboard Table')

@section('content')

<div class="content">
                        @if ($message = Session::get('success'))

                        <script>
                            window.addEventListener('DOMContentLoaded', function() {
                                swal("Client Update Registered", "{{ $message }}", "success");
                            });
                        </script>

      
                        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registered Clients</h4>
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
                        <th>National ID</th>
                        <th>Date of Birth</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Residence</th>                        
                        <th>City</th>                       
                        <th>Client Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientdata as $client)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $client->client_names }}</td>
                                <td>{{ $client->national_id }}</td>
                                <td>{{ $client->DOB }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->home_residence }}</td>                                
                                <td>{{ $client->city }}</td>                                
                                <td>{{ $client->client_type }}</td>
                                <td>
                                <a href="{{ route('editClient', $client->id) }}" class="btn btn-warning">Edit</a>
                                  
                                </td>
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
                                <th>Email</th>
                                <th>Residence</th>
                                <th>City</th>                                
                                <th>Client Type</th>
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