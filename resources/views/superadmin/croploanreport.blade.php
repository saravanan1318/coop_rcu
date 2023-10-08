@extends('layouts.master')
@section('content')
<style>
    table.table th, table.table td {
        text-align: center;
    }
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Report on Crop loan </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop loan entry</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Crop Loan Report</h5>
{{--                        <form action="{{url('/superadmin/croploanreport')}}" method="get" id="croploanform" class="row g-3">--}}
{{--                          @csrf--}}
{{--                            <div class="row margindiv">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="form-floating">--}}
{{--                                        <input type="date" class="form-control" id="floatingName" name="croploanreportdate" placeholder="date" value="{{$godownreportdate}}" required>--}}
{{--                                        <label for="floatingName">Date</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <button type="submit" class="btn btn-primary" id="godownsubmit">Submit</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                        <div class="col-md-12" style="margin-top: 10px">
                            {{--                    <table class="table table-responsive table-bordered datatable">--}}
                            {{--                        <thead style="text-align: center">--}}
                            {{--                            <tr>--}}
                            {{--                                <th rowspan="3">Date</th>--}}
                            {{--                                <th rowspan="3">Annual Target</th>--}}
                            {{--                                <th rowspan="3">Proportionate target up to the month</th>--}}
                            {{--                                <th rowspan="3">Total cultivable land area (in hectare)</th>--}}
                            {{--                                <th colspan="6">Application received</th>--}}
                            {{--                                <th colspan="6">Application disposed</th>--}}
                            {{--                                <th colspan="2">Application pending</th>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <th colspan="2">Opening Balance</th>--}}
                            {{--                                <th colspan="2">Received</th>--}}
                            {{--                                <th colspan="2">Total</th>--}}
                            {{--                                <th colspan="3">Sanctioned</th>--}}
                            {{--                                <th>% of achievement to annual target</th>--}}
                            {{--                                <th>% of achievement to proportionate target</th>--}}
                            {{--                                <th>Rejected</th>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>Amount</th>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>Amount</th>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>Amount</th>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>Amount</th>--}}
                            {{--                                <th>Area of land (hectare)</th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>No.</th>--}}
                            {{--                                <th>Amount</th>--}}
                            {{--                            </tr>--}}
                            {{--                        </thead>--}}
                            {{--                        <tbody>--}}
                            {{--                            @foreach($croploan_entry as $croploan)--}}
                            {{--                            <tr>--}}
                            {{--                                <td>{{ $croploan->croploandate }}</td>--}}
                            {{--                                <td>{{ $croploan->annualTarget }}</td>--}}
                            {{--                                <td>{{ $croploan->proportionateTarget }}</td>--}}
                            {{--                                <td>{{ $croploan->cultivableLand }}</td>--}}
                            {{--                                <td>{{ $croploan->openingBalanceNo }}</td>--}}
                            {{--                                <td>{{ $croploan->openingBalanceAmount }}</td>--}}
                            {{--                                <td>{{ $croploan->receivedNo }}</td>--}}
                            {{--                                <td>{{ $croploan->receivedAmount }}</td>--}}
                            {{--                                <td>{{ $croploan->totalNo }}</td>--}}
                            {{--                                <td>{{ $croploan->totalAmount }}</td>--}}
                            {{--                                <td>{{ $croploan->sanctionedNo }}</td>--}}
                            {{--                                <td>{{ $croploan->sanctionedAmount }}</td>--}}
                            {{--                                <td>{{ $croploan->sanctionedLand }}</td>--}}
                            {{--                                <td>{{ $croploan->achievementAnnual }}</td>--}}
                            {{--                                <td>{{ $croploan->achievementProportionate }}</td>--}}
                            {{--                                <td>{{ $croploan->rejectedno }}</td>--}}
                            {{--                                <td>{{ $croploan->applicationpendingno }}</td>--}}
                            {{--                                <td>{{ $croploan->applicationpendingamount }}</td>--}}
                            {{--                            </tr>--}}
                            {{--                            @endforeach--}}
                            {{--                        </tbody>--}}
                            {{--                    </table>--}}
                            <form method="GET" action="{{ URL::current() }}">
                                <h3>Filters:</h3>
                                <div class="row filterpaddings">
                                    @if(isset($societiestypes))
                                        <div class="col-3 ">
                                            <label for="society">Types:</label>
                                            <select name="societyTypes" id="societyTypes" class="form-control">
                                                <option value="">All</option>
                                                {{$showCase="ALL"}}
                                                @foreach($societiestypes as $societytype)
                                                    {{$societyTypesFilter == $societytype->role_id? $showCase=$societytype->societytype:""}}
                                                    {{--                                                        @if($societytype->id == $societyTypesFilter)--}}
                                                    <option
                                                        value="{{ $societytype->role_id }}" {{$societyTypesFilter == $societytype->role_id ? "selected" : "" }}>{{ $societytype->societytype }}</option>
                                                    {{--                                                        @endif--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <div class="col-3 mt-3" `>
                                        <button type="submit" class="btn btn-primary m-1">Apply Filters</button>
                                        <a href="{{ URL::current() }}" type="submit"
                                           class=" m-1 btn btn-primary">Clear</a>
                                    </div>
                                </div>


                            </form>
                            <table class="stripe table-bordered table-info " id="data-table">
                                <thead style="text-align: center">
                                <tr>
                                    <th colspan="10">
                                        <center>Crop Loan Report - ({{$showCase}})</center>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" >Region</th>
                                    <th scope="col" >No.of Application Received</th>
                                    <th scope="col" >No.of  Received Amount</th>
                                    <th scope="col" >No.of Application Sanctioned</th>
                                    <th scope="col" >No.of Sanctioned Amount</th>
                                    <th scope="col" >No.of Application Pending</th>
                                    <th scope="col" >No.of Pending Amount</th>
                                    <th scope="col" >Total Cultivate Area</th>
{{--                                    <th scope="col" >Cultivated Area Loan issued</th>--}}
{{--                                    <th scope="col" >No of Outstanding </th>--}}
{{--                                    <th scope="col" > Outstanding Amount</th>--}}
{{--                                    <th scope="col" >No of OverDue</th>--}}
{{--                                    <th scope="col" >OverDue Amount</th>--}}
                                </tr>

                                </thead>
                                <tbody >
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->Region_Name}}</td>
                                        <td>{{$result->noofappreceived}}</td>
                                        <td>{{$result->noofappreceivedAmount}}</td>
                                        <td>{{$result->noofappsanctioned}}</td>
                                        <td>{{$result->noofappsanctionedAmount}}</td>
                                        <td>{{$result->noofapppending}}</td>
                                        <td>{{$result->noofappapplicationpendingamount}}</td>
                                        <td>{{$result->totalcultivatedarea??"-"}}</td>
{{--                                        <td>{{$result->cultivatedarealoanissuedto??"-"}}</td>--}}
{{--                                        <td>{{$result->outstandingno??"-"}}</td>--}}
{{--                                        <td>{{$result->outstandingamount??"-"}}</td>--}}
{{--                                        <td>{{$result->overdueno??"-"}}</td>--}}
{{--                                        <td>{{$result->overdueamount??"-"}}</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
