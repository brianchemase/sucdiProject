@extends('insuarance.inc.master')

@section('title','Dashboard Form')

@section('content')

<div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Policies Tab</h4>
                    </div>
                    <div class="card-body">
                    @if ($message = Session::get('success'))

                    <script>
                        window.addEventListener('DOMContentLoaded', function() {
                            swal("Policy Registered", "{{ $message }}", "success");
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
                                        Register Policy
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Register Policies</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('savepolicy') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="tab1">Policy Name</label>
                                                    <input type="text" class="form-control" id="inputtext" aria-describedby="emailHelp" name="policy_name" placeholder="Enter Policy Name" required>
                                                    <small id="emailHelp" class="form-text text-muted">Capture the policy name.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Policy Code</label>
                                                    <input type="text" class="form-control" id="inputtext" aria-describedby="policycode" name="policy_code" placeholder="Enter Policy Code" required>
                                                    <small id="emailHelp" class="form-text text-muted">Capture the policy code.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Policy Duration</label>
                                                    <input type="number" class="form-control" id="inputtext" aria-describedby="policycode" name="policy_duration" placeholder="Enter Policy Duration in months" required>
                                                    <small id="emailHelp" class="form-text text-muted">Capture the policy duration.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Policy Cost</label>
                                                    <input type="number" class="form-control" id="inputtext" aria-describedby="policycode" name="policy_cost" placeholder="Enter Policy cost" required>
                                                    <small id="emailHelp" class="form-text text-muted">Capture the policy cost.</small>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tab1">Policy Description</label>
                                                    <input type="textarea" class="form-control" id="inputtext" aria-describedby="policycode" name="policy_description" placeholder="Enter Policy Description">
                                                    <small id="emailHelp" class="form-text text-muted">Capture the policy Description.</small>
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
                <h4 class="card-title"> Registered Policies</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Policy Code</th>
                      <th>Policy Name</th>
                      <th>Policy Duration</th>
                      <th>Policy Cost</th>
                      <th>Status</th>
                      <th>Description</th>
                      <th>Action</th>
                  </tr>
                    </thead>
                        <tbody>
                        @foreach ($policies as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->policy_code }}</td>
                                    <td>{{ $data->policy_name }}</td>
                                    <td>{{ $data->policy_duration }} Months</td>
                                    <td>{{ $data->policy_cost }}</td>
                                    <td>{{ $data->policy_status }}</td>
                                    <td>{{ $data->policy_description }}</td>
                                    
                                    <td></td>
                                    <!-- Add other table data cells for the columns you want to display -->
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>#</th>
                            <th>Policy Code</th>
                            <th>Policy Name</th>
                            <th>Policy Duration</th>
                            <th>Policy Cost</th>
                            <th>Status</th>
                            <th>Description</th>
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


                