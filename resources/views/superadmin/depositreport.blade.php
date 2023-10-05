@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Report on Deposit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item">Deposit</li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Deposit Report</h5>
                            <form action="{{url('/superadmin/depositreport')}}" method="get" id="depositreportform"
                                  class="row g-3">
                                @csrf
                                {{--                      <div class="row margindiv">--}}
                                {{--                        <div class="col-md-4">--}}
                                {{--                            <div class="form-floating">--}}
                                {{--                              <input type="date" class="form-control" id="floatingName" name="depositreportdate" placeholder="date" value="{{$depositreportdate}}" required>--}}
                                {{--                              <label for="floatingName">Date</label>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}
                                {{--                        <div class="col-md-4">--}}
                                {{--                          <div class="text-center">--}}
                                {{--                            <button type="submit" class="btn btn-primary" id="depositreportsubmit">Submit</button>--}}
                                {{--                          </div>--}}
                                {{--                      </div>--}}
                                {{--                  </div>--}}
                                <div class="col-md-12" style="margin-top: 10px">
                                    {{--                      <table class="table table-responsive">--}}
                                    {{--                        <thead>--}}
                                    {{--                            <tr>--}}
                                    {{--                                <th scope="col">Deposit Name</th>--}}
                                    {{--                                <th scope="col">Deposit Date</th>--}}
                                    {{--                                <th scope="col">Received No.</th>--}}
                                    {{--                                <th scope="col">Received Amount</th>--}}
                                    {{--                                <th scope="col">Closed No.</th>--}}
                                    {{--                                <th scope="col">Closed Amount</th>--}}
                                    {{--                            </tr>--}}
                                    {{--                        </thead>--}}
                                    {{--                        <tbody>--}}
                                    {{--                            @foreach($deposits as $deposit)--}}
                                    {{--                            <tr>--}}
                                    {{--                                <td>{{ $deposit->deposittype->deposit_name }}</td>--}}
                                    {{--                                <td>{{ $deposit->depositdate }}</td>--}}
                                    {{--                                <td>{{ $deposit->recievedno }}</td>--}}
                                    {{--                                <td>{{ $deposit->recievedamount }}</td>--}}
                                    {{--                                <td>{{ $deposit->closedno }}</td>--}}
                                    {{--                                <td>{{ $deposit->closedamount }}</td>--}}
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
                                            <th colspan="4">
                                                <center>Deposit Report - ({{$showCase}})</center>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Region Name</th>
                                            <th scope="col">Target (2023-2024)</th>
                                            <th scope="col">Received Amount</th>
                                            <th scope="col">% Of Deposits</th>
                                        </tr>

                                        </thead>
                                        <tbody >
                                        @foreach($results as $result)
                                            <tr>
                                                <td>{{$result->Region_Name}}</td>
                                                <td>{{$result->Deposit_Target_2023_24}}</td>
                                                <td>{{$result->Recieved_Amount}}</td>
                                                <td>{{$result->Percent_of_Deopsits_Achievements??"-"}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{--                    <div class="d-flex">--}}
                                    {{--                        {!! $deposits->links() !!}--}}
                                    {{--                    </div>--}}
                                </div>
                        </div>
                    </div>
                </div>
        </section>

    </main><!-- End #main -->
@endsection
