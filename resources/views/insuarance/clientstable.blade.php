@extends('insuarance.inc.master')

@section('title','Dashboard Table')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Registered Clients</h4>
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
                        <th>Postal Address</th>
                        <th>Postal Code</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Nationality</th>
                        <th>Client Type</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientdata as $client)
                            <tr>
                                <td> 12</td>
                                <td>{{ $client->client_names }}</td>
                                <td>{{ $client->national_id }}</td>
                                <td>{{ $client->DOB }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->home_residence }}</td>
                                <td>{{ $client->postal_address }}</td>
                                <td>{{ $client->postal_code }}</td>
                                <td>{{ $client->city }}</td>
                                <td>{{ $client->country }}</td>
                                <td>{{ $client->nationality }}</td>
                                <td>{{ $client->client_type }}</td>
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
                                <th>Postal Address</th>
                                <th>Postal Code</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Nationality</th>
                                <th>Client Type</th>
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