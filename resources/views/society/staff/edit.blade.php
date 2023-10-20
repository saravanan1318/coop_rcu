@extends('layouts.master')
<?php
//    print_r("<pre>");
//    print_r($records);
//    print_r("</pre>");
//    exit();
    ?>
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"  />

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Office Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/office/case/add">Dashboard</a></li>
                    <li class="breadcrumb-item">Court Case</li>
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

                            <form action="{{url("/society/staff/edit")}}" method="post" id="cmform" class="row g-3">
                                @csrf
                                <div class="row margindiv">

                                    <input type="hidden" name="id" value="{{$records->id}}">
                                    <div class="col-3 mt-4">
                                        <label for="region">Region</label>
                                        <select class="form-control" name="region" id="region" required>
                                            <option value="">Please select </option>
                                    @foreach($region as $value)
                                        <option value="{{$value->id}}" {{$value->id==$records->region?"selected":""}}>{{$value->region_name}}</option>
                                    @endforeach
                                            <!-- Add more region options as needed -->
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="circle">Circle</label>
                                        <select  class="form-control" name="circle" id="circle">
                                            <option value="">Please select </option>
                                            @foreach($circle as $value)
                                                <option value="{{$value->id}}" {{$value->id==$records->circle?"selected":""}}>{{$value->circle_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="society">Society</label>
                                        <select  class="form-control" name="society" id="society">
                                            <option value="">Please select </option>
                                            @foreach($society as $value)
                                                <option value="{{$value->id}}" {{$value->id==$records->society?"selected":""}}>{{$value->society_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="PFNO">ID/PF no</label>
                                        <input  required type="text" class="form-control" name="PFNO" id="PFNO" placeholder="PFNO" value="{{$records->PFNO}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="staffName">Staff Name</label>
                                        <input  required type="text" class="form-control" name="staffName" id="staffName" placeholder="Staff Name" value="{{$records->staffName}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="DOB">Date of Birth</label>
                                        <input  required type="date" class="form-control" name="DOB" id="DOB" placeholder="Date of Birth"value="{{$records->DOB}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="address">Address</label>
                                        <input  required type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{$records->address}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="mobile">Mobile Number</label>
                                        <input  required type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" value="{{$records->mobile}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="aadhar">Aadhar Number</label>
                                        <input  required type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Aadhar Number" value="{{$records->aadhar}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="pan">PAN Number</label>
                                        <input  required type="text" class="form-control" name="pan" id="pan" placeholder="PAN Number" value="{{$records->pan}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="educationQualification">Education Qualification</label>
                                        <select class="form-control" name="educationQualification" id="educationQualification">
                                            <option value="">Please select </option>
                                            @foreach($qualification as $value)
                                                <option value="{{$value}}" {{$value==$records->educationQualification?"selected":""}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="isObtainCoopTraing">Whether Obtained Coop Training</label>
                                        <select class="form-control" name="isObtainCoopTraing" id="isObtainCoopTraing">
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}" {{$value->value==$records->isObtainCoopTraing?"selected":""}}>{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4 {{$records->isObtainCoopTraing=="YES"?"":"hidefield"}} iscooptraing">
                                        <label for="isObtainCoopTraing">Year of Coop Training Completion</label>
                                        <input type="date" name="yearofCoopTraingCompleation" id="yearofCoopTraingCompleation" class="form-control " value="{{$records->yearofCoopTraingCompleation}}">

                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="appointmentType">Appointment Type</label>
                                        <select class="form-control" name="appointmentType" id="appointmentType">
                                            <option value="">Please select </option>
                                            @foreach($AppointmentType as $value)
                                                <option value="{{$value}}" {{$value==$records->appointmentType?"selected":""}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4  {{$records->appointmentType=="Regular"?"hidefield":""}} regularoption">
                                        <label for="ModeOFAppointment">Mode of Appointment if Regular on Col</label>
                                        <select class="form-control" name="ModeOFAppointment" id="ModeOFAppointment">
                                            <option value="">Please select </option>
                                            @foreach($RegularAppointmentType as $value)
                                                <option value="{{$value}}" {{$value==$records->ModeOFAppointment?"selected":""}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="fristCadre">Cadre at the time of first appointment</label>
                                        <select class="form-control" name="fristCadre" id="fristCadre">
                                            <option value="">Please select </option>
                                            @foreach($cadre as $value)
                                                <option value="{{$value}}" {{$value==$records->fristCadre?"selected":""}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="dateOfJoining">Date of Joining</label>
                                        <input  required type="date" class="form-control" name="dateOfJoining" id="dateOfJoining" placeholder="Date of Joining" value="{{$records->dateOfJoining}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="presentWorkingCadre">Present Working Cadre</label>

                                        <select class="form-control" name="presentWorkingCadre" id="presentWorkingCadre">
                                            <option value="">Please select </option>
                                            @foreach($presentworkingcadre as $value)
                                                <option value="{{$value}}" {{$value==$records->presentWorkingCadre?"selected":""}}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="DOJ_presentcadre">Date of Joining in present working cadre</label>
                                        <input  required type="date" class="form-control" name="DOJ_presentcadre" id="DOJ_presentcadre" placeholder="Date of Joining (Present Cadre)" value="{{$records->DOJ_presentcadre}}">
                                    </div>

                                    <div class="col-3 mt-4">
                                        <label for="payScale">Pay Scale</label>
                                        <input  required type="text" class="form-control" name="payScale" id="payScale" placeholder="Pay Scale" value="{{$records->payScale}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="presentPay">Present Pay</label>
                                        <input  required type="text" class="form-control" name="presentPay" id="presentPay" placeholder="Present Pay" value="{{$records->presentPay}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="DOP_Paysanctioned">Date of Present Pay Sanctioned</label>
                                        <input  required type="date" class="form-control" name="DOP_Paysanctioned" id="DOP_Paysanctioned" placeholder="Date of Payscale Sanction" value="{{$records->DOP_Paysanctioned}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="DO_NextIncrement">Date of Next Increment</label>
                                        <input  required type="date" class="form-control" name="DO_NextIncrement" id="DO_NextIncrement" placeholder="Date of Next Increment" value="{{$records->DO_NextIncrement}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="nextPromotion">Next Promotion</label>
                                        <input  required type="text" class="form-control" name="nextPromotion" id="nextPromotion" placeholder="Next Promotion" value="{{$records->nextPromotion}}">
                                    </div>
                                    <div class="col-3 mt-4">
                                        <label for="isonDeputation">Working On Deputation?</label>
                                        <select class="form-control" name="isonDeputation" id="isonDeputation">
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}" {{$value->value==$records->isonDeputation?"selected":""}}>{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4  {{$records->isonDeputation=="YES"?"":"hidefield"}}  deputationoption">
                                        <label for="deputatedSociety">Name of the Society deputed to</label>
                                        <select class="form-control" name="deputatedSociety" id="deputatedSociety">
                                            <option value="">Please select </option>
                                            @foreach($society as $value)
                                                <option value="{{$value->id}}" {{$value->id==$records->deputatedSociety?"selected":""}}>{{$value->society_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mt-4 {{$records->isonDeputation=="YES"?"":"hidefield"}} deputationoption">
                                        <label for="DO_deputatedPeriod">Date of Deputated Period</label>
                                        <input  type="date" class="form-control" name="DO_deputatedPeriod" id="DO_deputatedPeriod" placeholder="Date of Deputated Period" value="{{$records->DO_deputatedPeriod}}">
                                    </div>

                                    <div class="col-md-10">
                                        <!-- Other form fields go here -->
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-center">
                                            <input  required type="hidden" value="1" id="rowadded">
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

@endsection<!-- End #main -->
