@extends('insuarance.inc.master')

@section('title','Dashboard Form')

@section('content')

<div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Issued Covers</h4>
                    </div>

                    <div class="card-body">
                    @if ($message = Session::get('success'))

                    <script>
                        window.addEventListener('DOMContentLoaded', function() {
                            swal("Client Data Registered", "{{ $message }}", "success");
                        });
                    </script>

                    <!-- <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                    <strong>{{ $message }}</strong> 

                    </div>
                    </div> -->
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                    <strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </strong> 
                    </div>
                    </div>	
                    @endif

                            <div class="card-body">
                               <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Register Issued Covers
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Register Client's Cover</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('saveissuedcover') }}">
                                                @csrf
                                                

                                                <div class="form-group">
                                                    <label for="inputState">Select The Client</label>
                                                    <select id="inputState" class="form-control" name="client_id">
                                                        <option selected>Choose...</option>
                                                        @foreach ($clientNames as $client)
                                                            <option value="{{ $client->national_id }}">{{ $client->client_names }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputState">Select Policy</label>
                                                    <select id="inputState" class="form-control" name="policy_id">
                                                        <option selected>Choose...</option>
                                                        @foreach ($policies as $policy)
                                                            <option value="{{ $policy->id }}">{{ $policy->policy_name }} - {{ $policy->policy_duration }} months - {{ $policy->policy_cost }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Policy Start Date</label>
                                                    <input type="date" class="form-control" id="inputtext" name="start_date" aria-describedby="emailHelp" placeholder="Enter Policy Name">       
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Plate Number</label>
                                                    <input type="text" class="form-control" id="inputtext" name="plate_number" aria-describedby="emailHelp" placeholder="Enter Plate Number">       
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Chasis Number</label>
                                                    <input type="text" class="form-control" id="inputtext" name="chasis_number" aria-describedby="emailHelp" placeholder="Enter Chasis number">       
                                                </div>


                                                <div class="form-group">
                                                    <label for="tab1">Amount fee</label>
                                                    <input type="number" class="form-control" name="amountfee" id="inputtext" aria-describedby="policycode" placeholder="Enter Amount Paid">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Comment</label>
                                                    <input type="textarea" class="form-control" name="comment" id="inputtext" aria-describedby="policycode" placeholder="Enter Policy Description">
                                                </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Policy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                            </div>

                            
                    </div>
            </div>
        </div>        
</div>

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Issued Covers</h4>
              </div>
                    <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{route('issuedCoversPDF')}}" target="_blank">Generate Report</a>
                            </div>
                    </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-striped sm" style="width:100%">
                    <thead style="font-weight: bold;">
                    <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Policy Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Amount</th>
                    <th>Policy Code</th>
                    <th>Policy Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                    </thead>
                    <tbody>
                            @foreach ($issuedCovers as $cover)
                                <tr>
                                    <td>{{ $cover->id }}</td>
                                    <td>{{ $cover->client_names }}</td>
                                    <td>{{ $cover->policytype }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cover->start_date)->format('jS F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cover->end_date)->format('jS F Y') }}</td>
                                    <td>{{ $cover->PremiumAmount }}</td>
                                    <td>{{ $cover->policy_code }}</td> <!-- Display policy_code -->
                                    <td>{{ $cover->policy_name }}</td> 
                                    <td style="color: 
                                        @if ($cover->status == 'running')
                                            green
                                        @elseif ($cover->status == 'expired')
                                            red
                                        @else
                                            amber
                                        @endif
                                        ">
                                        @if ($cover->status == 'running')
                                           <b> Active </b>
                                        @elseif ($cover->status == 'expired')
                                            Expired
                                        @else
                                            On Review
                                        @endif
                                    </td>
                                    <td></td>
                                    <!-- Add other table data cells for the columns you want to display -->
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Policy Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            <th>Policy Code</th>
                            <th>Policy Name</th>
                            <th>Status</th>
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


                