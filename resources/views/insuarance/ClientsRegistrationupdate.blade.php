@extends('insuarance.inc.master')

@section('title','Dashboard Clients Update')

@section('content')

<div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                        @if ($message = Session::get('success'))

                                <script>
                                    window.addEventListener('DOMContentLoaded', function() {
                                        swal("Client Registered", "{{ $message }}", "success");
                                    });
                                </script>

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
                        <h4 class="card-title"> Clients Registration Update</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateClient', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="names">Client Names</label>
                                    <input type="text" class="form-control" id="namesinput" name="client_names" placeholder="Enter Client Names" value="{{ old('client_names', $client->client_names) }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputidnumber">Client ID No/Passport No/Registration No</label>
                                    <input type="text" class="form-control" id="inputidnumber" name="national_id" placeholder="Enter Client Registration No" value="{{ old('national_id' , $client->national_id) }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="KRA">Client KRA Pin</label>
                                    <input type="text" class="form-control" id="namesinput" name="client_kra" placeholder="Enter Client KRA Pin" value="{{ old('client_kra', $client->kra_pin) }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputdob">Date of Birth/Registration Date</label>
                                    <input type="date" class="form-control" id="inputdob" name="date_reg" value="{{ old('date_reg', $client->registration_date) }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputphone">Client Phone</label>
                                    <input type="text" class="form-control" id="inputphone" name="client_phone" placeholder="Enter Client phone" value="{{ old('client_phone', $client->phone) }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Client Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="client_email" placeholder="Enter Client Email address" value="{{ old('client_email' , $client->email) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputresidence">Client Residence</label>
                                    <input type="text" class="form-control" id="inputresidence" name="client_residence" placeholder="Enter Client Residence" value="{{ old('client_residence', $client->home_residence) }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputpobox">Client PO Box</label>
                                    <input type="text" class="form-control" id="inputpobox" name="client_postal_address" placeholder="PO BOX" value="{{ old('client_postal_address', $client->postal_address) }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputpostal">Client Postal Code</label>
                                    <input type="text" class="form-control" id="inputpostal" name="client_postalCode" placeholder="------" value="{{ old('client_postalCode', $client->postal_code) }}">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="inputtown">Town</label>
                                    <input type="text" class="form-control" id="inputtown" name="client_town" placeholder="Enter Client Town" value="{{ old('client_town', $client->city) }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputCountry">Country</label>
                                    <input type="text" class="form-control" id="inputCountry" name="client_country"  value="{{ old('client_country', $client->country) }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputNationality">Nationality</label>
                                    <input type="text" class="form-control" id="inputNationality" name="client_nationality" value="{{ old('client_nationality', $client->nationality) }}">
                                </div>

                                <!-- <div class="form-group col-md-4">
                                    <label for="inputState">Client Type</label>
                                    <select id="inputState" name="client_type" class="form-control">
                                        <option value="individual" selected>Individual</option>
                                        <option value="non-individual">Company</option>
                                    </select>
                                </div> -->

                                <div class="form-group col-md-4">
                                    <label for="inputState">Branch/Office</label>
                                    <select id="inputState" name="branch_id" class="form-control">
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}" {{ $client->branchcode == $branch->id ? 'selected' : '' }}>
                                                {{ $branch->branchName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Client Data</button>
                        </form>

                    </div>
            </div>
        </div>
</div>




@endsection


                