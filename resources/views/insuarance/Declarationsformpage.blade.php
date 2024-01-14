@extends('insuarance.inc.master')

@section('title','Declarations Generation')

@section('content')

<div class="content">
       

            <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Filter declarations using the Month and Year</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('DeclarationsPDF') }}">
                                    @csrf
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                           
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">Select Month  &nbsp;&nbsp;&nbsp;</div>
                                            </div>
                                            <select name="month" class="input-group-text" id="month">
                                                <!-- Add options for months -->
                                                @for ($m = 1; $m <= 12; $m++)
                                                    <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                                                @endfor
                                            </select>
                                        </div>


                                        
                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Year</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">Select Year  &nbsp;&nbsp;&nbsp;</div>
                                            </div>
                                            <!-- <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username"> -->
                                            <select name="year" id="year" class="input-group-text">
                                                <!-- Add options for years, adjust the range as needed -->
                                                @for ($y = date('Y'); $y >= (date('Y') - 10); $y--)
                                                    <option value="{{ $y }}">{{ $y }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        </div>
                                        
                                        <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2">Generate Declaration</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                  
            </div>
            
            
</div>




@endsection