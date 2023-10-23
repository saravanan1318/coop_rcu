@extends('layouts.master')

<?php
//    print_r($rti);
//    exit();
    ?>
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <main id="main" class="main">
        <div class="pagetitle">
            <h1> RTI - APPEAL PETITION DETAILS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/office/cm/add">Dashboard</a></li>
                    <li class="breadcrumb-item"> RTI - APPEAL PETITION DETAILS</li>
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

                            <form action="{{url("/office/rti/edit")}}" method="post" id="cmform" class="row g-3">
                                @csrf
                                <div class="row margindiv">
                                    <div class="col-md-12" style="margin-top: 20px padding:50px">
                                        <div class="table-responsive">
                                            @php
                                            $frowd=["SECTION","REGION","OTHERS"];
                                            @endphp
                                            <table class="table  table-bordered" style=" ">
                                                <thead>
                                                <h6>CM CELL Petitions</h6>
                                                <tr>
                                                    <th>Name of the Petitioner</th>
                                                    <th>District</th>
                                                    <th>Date of First Appeal Petition received </th>
                                                    <th>First Appeal Petition  File No.</th>
                                                    <th>Forwarded to  Section, Region, Other Department 6(3)</th>
                                                    <th class="{{$rti->frwdsectionType=="SECTION"?"":"hidefield"}} fwdsection">Section</th>
                                                    <th class="{{$rti->frwdsectionType=="REGION"?"":"hidefield"}} fwdregion">Region</th>
                                                    <th class="{{$rti->frwdsectionType=="OTHERS"?"":"hidefield"}} fwdother">others</th>
                                                    <th>Order passed / PIO to whom transferred</th>
                                                    <th>Date of Disposal of First Appeal Petition</th>
                                                    <th>Date of Second Appeal Petition received (TNIC)</th>
                                                    <th>Final Order passed (TNIC)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <input type="hidden" name="id" value="{{$rti->id}}">
                                                    <td><input type="text" name="name" class="form-control" id="name" required value="{{$rti->name}}" disabled></td>
                                                    <td><select class="form-control" name="region" id="region" required disabled>
                                                            <option value="">Please select</option>
                                                            @foreach($region as $value)
                                                                <option value="{{$value->id}}" {{$value->id==$rti->region?"selected":""}}>{{$value->region_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td><input type="date" name="appealDate" class="form-control" id="appealDate" required value="{{$rti->appealDate}}" disabled></td>
                                                    <td><input type="text" name="fileNo" class="form-control" id="fileNo" required value="{{$rti->fileNo}}" disabled></td>
                                                    <td><select class="form-control" name="frwdsectionType" id="frwdsectionType" >
                                                            <option value="">Please select</option>
                                                            @foreach($frowd as $value)
                                                                <option value="{{$value}}" {{$value==$rti->frwdsectionType?"selected":""}}>{{$value}}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td class="{{$rti->frwdsectionType=="SECTION"?"":"hidefield"}} fwdsection"><select class="form-control w-auto" name="frwdsection" id="frwdsection" >
                                                            <option value="">Please select</option>
                                                            @foreach($section as $value)
                                                                <option value="{{$value->id}}"  {{$value->id==$rti->frwdsection?"selected":""}}>{{$value->section_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td class="{{$rti->frwdsectionType=="REGION"?"":"hidefield"}} fwdregion"><select class="form-control w-auto" name="frwdregion" id="frwdregion" >
                                                            <option value="">Please select</option>
                                                            @foreach($region as $value)
                                                                <option value="{{$value->id}}" {{$value->id==$rti->frwdregion?"selected":""}}>{{$value->region_name}}</option>
                                                            @endforeach
                                                        </select></td>
                                                    <td class="{{$rti->frwdsectionType=="OTHERS"?"":"hidefield"}} fwdother"><textarea cols="3" class="form-control w-auto" name="frwdother">{{$rti->frwdother}}</textarea></td>
                                                    <td><input type="text" name="orderPass" class="form-control" id="orderPass" required value="{{$rti->orderPass}}"></td>
                                                    <td><input type="date" name="disposaldateofAppeal" class="form-control" id="disposaldateofAppeal" required value="{{$rti->disposaldateofAppeal}}"></td>
                                                    <td><input type="date" name="TNIC" class="form-control" id="TNIC" required value="{{$rti->TNIC}}"></td>
                                                    <td><input type="text" name="finalOrderPassed" class="form-control" id="finalOrderPassed" required value="{{$rti->finalOrderPassed}}"></td>

                                                </tr>
                                                </tbody>
                                            </table>
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
