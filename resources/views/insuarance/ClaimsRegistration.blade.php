@extends('insuarance.inc.master')

@section('title','Dashboard Clients Claim Registration')

@section('content')

<div class="content">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Search Clients Registred</h4>
                    </div>
                    <div class="card-body">
                    <form action="{{route('ClaimRegpage')}}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="form-group col-md-4">
                            <label class="sr-only" for="inlineFormInput">Name</label>
                                        <select id="inputState" class="form-control" name="q">
                                        <option selected disabled>Choose...</option>
                                        @foreach($issuedCovers as $client)
                                            <option value="{{ $client->id }},{{ $client->refno }}">{{ $client->client_names }} - {{ $client->national_id }} - {{ $client->plate_number }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>

                    </div>
            </div>
        
            @if(isset($results))

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                                @if ($message = Session::get('success'))

                                        <script>
                                            window.addEventListener('DOMContentLoaded', function() {
                                                swal("Client Registered", "{{ $message }}", "success");
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

                            <div class="card-header">
                                <h4 class="card-title"> Clients Claim Registration</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('saveClient') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="names">Client Names</label>
                                            <input type="text" class="form-control" id="namesinput" name="client_names" placeholder="Enter Client Names" value="{{ $clientData->client_names }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputidnumber">Client National ID/Passport No/Registration No</label>
                                            <input type="text" class="form-control" id="inputidnumber" name="national_id" placeholder="Enter Client Registration No" value="{{ $clientData->national_id }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="KRA">Client KRA Pin</label>
                                            <input type="text" class="form-control" id="namesinput" name="client_kra" placeholder="Enter Client KRA Pin" value="{{ $clientData->kra_pin }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputdob">Date of Birth/Registration Date</label>
                                            <input type="date" class="form-control" id="inputdob" name="date_reg" value="{{ $clientData->DOB }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputphone">Client Phone</label>
                                            <input type="text" class="form-control" id="inputphone" name="client_phone" placeholder="Enter Client phone" value="{{ $clientData->phone }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Client Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" name="client_email" placeholder="Enter Client Email address" value="{{ $clientData->email }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputresidence">Policy Type</label>
                                            <input type="text" class="form-control" id="inputresidence" name="client_residence" placeholder="Enter Client Residence" value="{{ $coverdata->policytype }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputpobox">Policy Start Date</label>
                                            <input type="date" class="form-control" id="inputpobox" name="client_postal_address" placeholder="PO BOX" value="{{ $coverdata->start_date }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputpostal">Policy End Date</label>
                                            <input type="date" class="form-control" id="inputpostal" name="client_postalCode" placeholder="------" value="{{ $coverdata->end_date }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputpostal">Plate Number</label>
                                            <input type="text" class="form-control" id="inputpostal" name="client_postalCode" placeholder="------" value="{{ $coverdata->plate_number }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputpostal">Chasis Number</label>
                                            <input type="text" class="form-control" id="inputpostal" name="client_postalCode" placeholder="------" value="{{ $coverdata->chasis_number }}">
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="inputtown">Cover Details</label>
                                            <input type="text" class="form-control" id="inputtown" name="client_town" placeholder="Enter Client Town" value="{{ $coverdata->coverdetails }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputCountry">Policy ID</label>
                                            <input type="text" class="form-control" id="inputCountry" name="client_country"  value="{{ $coverdata->policyid }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCountry">Policy Ref No</label>
                                            <input type="text" class="form-control" id="inputCountry" name="refno"  value="{{ $coverdata->refno }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCountry">Policy Code</label>
                                            <input type="text" class="form-control" id="inputCountry" name="client_country"  value="{{ $coverdata->policy_code }}">
                                        </div>

                                        </div>
                                        

                                        <hr>
                                        <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="inputNationality">Claim Date</label>
                                            <input type="date" class="form-control" id="inputNationality" name="claimDate" value="{{ old('claimDate') }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputNationality">Claim Amount</label>
                                            <input type="number" class="form-control" id="inputNationality" name="claimAmount" value="{{ old('claimAmount') }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputNationality">Claim Description</label>
                                            <input type="text" class="form-control" id="inputNationality" name="claimdescription" value="{{ old('claimdescription') }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="inputNationality">Claim Registered by</label>
                                            <input type="number" class="form-control" id="inputNationality" name="agent" value="System Admin">
                                        </div>                                  
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save Claim Record</button>
                                </form>

                            </div>
                    </div>
                </div>

            

                @endif
</div>




@endsection


                