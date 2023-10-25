@extends('layouts.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <main id="main" class="main">
        <div class="pagetitle">
            <h1> Details of  Income earned and Expenditure incurred  by the Fair Price Shops</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/office/cm/add">Dashboard</a></li>
                    <li class="breadcrumb-item"> Income earned and Expenditure incurred  by the Fair Price Shops</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row margindiv">
                                <div class="col-sm-12 col-md-12 mb-4">
                                    @if(session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-12 mb-4">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <form action="{{url("/office/FPEI/store")}}" method="post" id="cmform" class="row g-3">
                                @csrf
                                <div class="row margindiv">
                                    <div class="col-md-12" style="margin-top: 20px padding:50px">
                                        <div class="table-responsive">
                                            @php
                                            $frowd=["SECTION","REGION","OTHERS"];
                                            @endphp

                                            <div class="container">
                                                <h6>Income earned and Expenditure incurred by the Fair Price Shops</h6>
                                                <div class="row">
{{--                                                    <div class="col-4">--}}
{{--                                                        <label for="region">Name of the Region</label>--}}
{{--                                                        <select class="form-control" name="region" id="region" required>--}}
{{--                                                            <option value="">Please select</option>--}}
{{--                                                            @foreach($region as $value)--}}
{{--                                                                <option value="{{$value->id}}">{{$value->region_name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
                                                    <div class="col-4">
                                                        <label for="FTFPS">Total No of Full Time FPS</label>
                                                        <input type="number" class="form-control" name="FTFPS" id="FTFPS" min="0" step="any" onkeypress="return isNumberKey(event)">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="FPSRental">No of Full-time FPS in Rental building</label>
                                                        <input type="number" class="form-control" name="FPSRental" id="FPSRental" min="0" step="any" onkeypress="return isNumberKey(event)">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="contiogencharge">Establishment and Contingencies Charges</label>
                                                        <input type="number" class="form-control" name="contiogencharge" id="contiogencharge" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>
                                                    <div class="col-12"><br><b><center>Expenditures</center></b></div>
                                                    <div class="col-4">
                                                        <label for="tpexpense">Transport Expenses</label>
                                                        <input type="number" class="form-control" name="tpexpense" id="tpexpense" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="rentexpense">Rental Expenses</label>
                                                        <input type="number" class="form-control" name="rentexpense" id="rentexpense" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="ebcharge">Electricity Charges</label>
                                                        <input type="number" class="form-control" name="ebcharge" id="ebcharge" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="printstation">Printing and Stationeries</label>
                                                        <input type="number" class="form-control" name="printstation" id="printstation" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="maintanaceexpense">FPS Maintenance Expenses</label>
                                                        <input type="number" class="form-control" name="maintanaceexpense" id="maintanaceexpense" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="otherexpense">Other Expenses</label>
                                                        <input type="number" class="form-control" name="otherexpense" id="otherexpense" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="totalexpense">Total Expenditure</label>
                                                        <input type="number" class="form-control" name="totalexpense" id="totalexpense" min="0" step="any" onkeypress="return isNumberKey(event)" readonly>
                                                    </div>
                                                    <div class="col-12"><br><b><center>Income</center></b></div>
                                                    <div class="col-4">
                                                        <label for="marginmoney">Margin Money</label>
                                                        <input type="number" class="form-control" name="marginmoney" id="marginmoney" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="saleemptygunnies">Sale of Empty Gunnies</label>
                                                        <input type="number" class="form-control" name="saleemptygunnies" id="saleemptygunnies" min="0" step="any" onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()">
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="totalincome">Total Income</label>
                                                        <input type="number" class="form-control" name="totalincome" id="totalincome" min="0" step="any" onkeypress="return isNumberKey(event)" readonly>
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="difference">Difference</label>
                                                        <input type="number" class="form-control" name="difference" id="difference" min="0" step="any" onkeypress="return isNumberKey(event)" readonly>
                                                    </div>
                                                </div>
                                                <div class="row" ></div>
                                            </div>
                                            <br>







                                            {{--<table class="table  table-bordered" style=" ">
                                                <thead>
                                                <h6>Income earned and Expenditure incurred  by the Fair Price Shops</h6>
                                                <tr>
                                                    <th rowspan="2">Name of the  Region</th>
                                                    <th rowspan="2">Total No of Full Time FPS </th>
                                                    <th rowspan="2"> No of  Full time  FPS in Rental building</th>
                                                    <th colspan="7" ><center>Expenditures</center></th>
                                                    <th rowspan="2"><center>Total Expen diture</center></th>
                                                    <th colspan="2"><center>Income</center></th>
                                                    <th rowspan="2">Total Income</th>
                                                    <th rowspan="2">Difference</th>
                                                </tr>
                                                <tr>

                                                    <th>Establi shment and Contingencies Charges</th>
                                                    <th>Trans port Expenses</th>
                                                    <th >Rental Expenses</th>
                                                    <th>Electri city Charges</th>
                                                    <th>Printing and Stationeries</th>
                                                    <th>FPS Mainte nance Expenses</th>
                                                    <th>Other Expenses</th>

                                                    <th>Margin Money</th>
                                                    <th>Sale of Empty Gunnies</th>

                                                    <th>Date of Disposal of First Appeal Petition</th>
                                                    <th>Date of Second Appeal Petition received (TNIC)</th>
                                                    <th>Final Order passed (TNIC)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><select class="form-control" name="region" id="region" required>
                                                            <option value="" >Please select</option>
                                                            @foreach($region as $value)
                                                                <option value="{{$value->id}}">{{$value->region_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td><input type="number" class="form-control" name="FTFPS" id="FTFPS" min="0" step="any"  onkeypress="return isNumberKey(event)"></td>
                                                    <td><input type="number" class="form-control" name="FPSRental" id="FPSRental" min="0" step="any"  onkeypress="return isNumberKey(event)"></td>
                                                    <td><input type="number" class="form-control" name="contiogencharge" id="contiogencharge" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="tpexpense" id="tpexpense" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="rentexpense" id="rentexpense" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="ebcharge" id="ebcharge" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="printstation" id="printstation" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="maintanaceexpense" id="maintanaceexpense" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="otherexpense" id="otherexpense" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="totalexpense" id="totalexpense" min="0" step="any"  onkeypress="return isNumberKey(event)" readonly></td>
                                                    <td><input type="number" class="form-control" name="marginmoney" id="marginmoney" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="saleemptygunnies" id="saleemptygunnies" min="0" step="any"  onkeypress="return isNumberKey(event)" onchange="FPSChangesExpens()"></td>
                                                    <td><input type="number" class="form-control" name="totalincome" id="totalincome" min="0" step="any"  onkeypress="return isNumberKey(event)" readonly></td>
                                                    <td><input type="number" class="form-control" name="difference" id="difference" min="0" step="any"  onkeypress="return isNumberKey(event)" readonly></td>
                                                </tr>
                                                </tbody>
                                            </table>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <!-- Other form fields go here -->
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-center">
                                            <input type="hidden" value="1" id="rowadded">
                                            <button type="submit" class="btn btn-warning">Submit</button>
                                        </div>
                                    </div>
                                    <!-- Rest of your form goes here -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

        });
    </script>
    <script>
        // Get the input element
        const receivedDateInput = document.getElementById('received_date');

        // Get the current date
        const today = new Date().toISOString().split('T')[0];

        // Set the min attribute to the current date
        receivedDateInput.setAttribute('max', today);
    </script>
@endsection<!-- End #main -->
