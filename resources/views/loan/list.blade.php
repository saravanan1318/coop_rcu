@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item">Loan</li>
                    <li class="breadcrumb-item">List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Issue of Loan and Collection</h5> --}}
                            <div class="row">
                                <div class="col-sm-4 col-md-4 mb-4">

                                </div>
                                <div class="col-sm-4 col-md-4 mb-4">

                                </div>
                                <div class="col-sm-4 col-md-4 mb-4">
                                    {{-- <div class="text-center">
                                        <a href="/society/loan/add"  class="btn btn-primary" >Add</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-4">
                                    @if(session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">

                                {{--                                <form method="GET" action="{{ route('loanlist.index') }}">--}}
                                <form method="GET" action="{{ URL::current() }}">
                                    <h3>Filters:</h3>
                                    <div class="row filterpaddings">
                                        @if(isset($regions))
                                            <div class="col-3">
                                                <label for="region">Region:</label>
                                                <select name="region" id="region" class="form-control">
                                                    <option value="">All</option>
                                                    @foreach($regions as $region)
                                                        <option
                                                            value="{{ $region->id }}" {{$regionFilter == $region->id? "selected":""}}>{{ $region->region_name}}{{count($circles)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @if(isset($circles))
                                            <div class="col-3">
                                                <label for="circle">Circle:</label>
                                                <select name="circle" id="circle" class="form-control">
                                                    <option value="">Please select circle</option>
                                                    @foreach($circles as $circle)
                                                        @if($circle->region_id == $regionFilter || count($circles)==1)
                                                            <option
                                                                value="{{ $circle->id }}" {{$circleFilter == $circle->id? "selected":""}}>{{ $circle->circle_name }}</option>
                                                        @endif
                                                        @if(!isset($regions) && count($circles)>0)
                                                            <option
                                                                value="{{ $circle->id }}" {{$circleFilter == $circle->id? "selected":""}}>{{ $circle->circle_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @if(isset($societiestypes))
                                            <div class="col-3 ">
                                                <label for="society">Society Types:</label>
                                                <select name="societyTypes" id="societyTypes" class="form-control">
                                                    <option value="">Please select Society Types</option>
                                                    @foreach($societiestypes as $societytype)
                                                        {{--                                                        @if($societytype->id == $societyTypesFilter)--}}
                                                        <option
                                                            value="{{ $societytype->id }}" {{$societyTypesFilter == $societytype->id ? "selected" : "" }}>{{ $societytype->societytype }}</option>
                                                        {{--                                                        @endif--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        @if(isset($societies))
                                            <div class="col-3 ">
                                                <label for="society">Society:</label>
                                                <select name="society" id="society" class="form-control">
                                                    <option value="">Please select Society</option>
                                                    @foreach($societies as $society)
                                                        @if($society->circle_id == $circleFilter)
                                                            <option
                                                                value="{{ $society->id }}" {{$societyFilter == $society->id ? "selected" : "" }}>{{ $society->society_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row filterpaddings">
                                        @if(isset($loantypes))
                                            <div class="col-3 ">
                                                <label for="society">Loan type:</label>
                                                <select name="loantype" id="loantype" class="form-control">
                                                    <option value="">Please select Loan Type</option>
                                                    @foreach($loantypes as $loantype)
                                                        {{--                                                            @if($loantype->id == $loantypeFilter)--}}
                                                        <option
                                                            value="{{ $loantype->id }}" {{$loantypeFilter == $loantype->id ? "selected" : "" }}>{{ $loantype->loantype }}</option>
                                                        {{--                                                            @endif--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="col-3">
                                            <label for="startDate">Start Date:</label>
                                            <input type="date" class="form-control" id="startDate" name="startDate"
                                                   value={{isset($startDate)?$startDate:""}} >
                                        </div>
                                        <div class="col-3">
                                            <label for="endDate">End Date:</label>
                                            <input type="date" class="form-control" id="endDate" name="endDate"
                                                   value={{isset($endDate)?$endDate:""}} >
                                        </div>
                                        <div class="col-3 mt-3" `>
                                            <button type="submit" class="btn btn-primary m-1">Apply Filters</button>
                                            <a href="{{ URL::current() }}" type="submit" class=" m-1 btn btn-primary">Clear</a>
                                        </div>
                                    </div>


                                </form>
                                @php
                                    $totalDisbursedNo=0;
                                    $totaldisbursedamount=0;
                                    $totalcollectedno=0;
                                    $totalcollectedamount=0;
                                @endphp
                                @foreach($loans as $loan)
                                    @php
                                        $totalDisbursedNo += $loan->disbursedno;
                                        $totaldisbursedamount +=$loan ->disbursedamount;
                                        $totalcollectedno +=$loan ->collectedno;
                                        $totalcollectedamount +=$loan ->collectedamount;
                                    @endphp
                                @endforeach
                                <div class="row p-4">
                                    <div class="col-3"><h5><b>Distributed Loan No:<?= $totalDisbursedNo ?></b></h5></div>
                                    <div class="col-3"><h5><b>Distributed Amount :<?= $totaldisbursedamount ?></b></h5></div>
                                    <div class="col-3"><h5><b>Collected Loan No:<?= $totalcollectedamount ?></b></h5></div>
                                    <div class="col-3"><h5><b>Collected Amount:<?= $totalcollectedamount ?></b></h5></div>
                                    <div>


                                        {{--                  <table class="table table-responsive table-bordered datatable" id="data-table">--}}
                                        <table class="stripe table-bordered table-info " id="data-table">
                                            <thead style="text-align: center">
                                            <tr>
                                                <th scope="col" rowspan="2">Date</th>
                                                <th scope="col" rowspan="2">Loan Types</th>
                                                <th scope="col" colspan="2" rowspan="1">Disbursed</th>
                                                <th scope="col" colspan="2" rowspan="1">Collected</th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th scope="col">No. of Loan</th>
                                                <th scope="col">Amount of Loan</th>
                                                <th scope="col">No. of Loan</th>
                                                <th scope="col">Amount of Loan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($loans as $loan)

                                                <tr>
                                                    <td>{{ $loan->loandate }}</td>
                                                    <td>{{ $loan->loantype->loantype??"" }}</td>
                                                    <td>{{ $loan->disbursedno }}</td>
                                                    <td>{{ $loan->disbursedamount }}</td>
                                                    <td>{{ $loan->collectedno }}</td>
                                                    <td>{{ $loan->collectedamount }}</td>
                                                </tr>
                                            @endforeach
                      </tbody>
                  </table>

              </div>
            </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
