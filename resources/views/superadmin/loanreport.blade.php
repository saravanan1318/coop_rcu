@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Report on Loan</h1>
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
                                {{--                  <table class="table table-responsive table-bordered datatable">--}}
                                {{--                      <thead style="text-align: center">--}}
                                {{--                        <tr>--}}
                                {{--                            <th scope="col" rowspan="2">Date</th>--}}
                                {{--                            <th scope="col" rowspan="2">Loan Types</th>--}}
                                {{--                            <th scope="col" colspan="2" rowspan="1">Disbursed</th>--}}
                                {{--                            <th scope="col" colspan="2" rowspan="1">Collected</th>--}}
                                {{--                        </tr>--}}

                                {{--                      </thead>--}}
                                {{--                      <tr style="text-align: center">--}}
                                {{--                        <th scope="col" ></th>--}}
                                {{--                        <th scope="col" ></th>--}}
                                {{--                        <th scope="col" >No. of Loan</th>--}}
                                {{--                        <th scope="col" >Amount of Loan</th>--}}
                                {{--                        <th scope="col" >No. of Loan</th>--}}
                                {{--                        <th scope="col" >Amount of Loan</th>--}}
                                {{--                      </tr>--}}
                                {{--                      <tbody>--}}
                                {{--                        @foreach($loans as $loan)--}}
                                {{--                          <tr>--}}
                                {{--                            <td>{{ $loan->loandate }}</td>--}}
                                {{--                            <td>{{ $loan->loantype->loantype }}</td>--}}
                                {{--                            <td>{{ $loan->disbursedno }}</td>--}}
                                {{--                            <td>{{ $loan->disbursedamount }}</td>--}}
                                {{--                            <td>{{ $loan->collectedno }}</td>--}}
                                {{--                            <td>{{ $loan->collectedamount }}</td>--}}
                                {{--                          </tr>--}}
                                {{--                        @endforeach--}}
                                {{--                      </tbody>--}}
                                {{--                  </table>--}}
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
                                                            value="{{ $region->id }}" {{$regionFilter == $region->id? "selected":""}}>{{ $region->region_name}}</option>
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

{{--                                        <div class="col-3 mt-3" `>--}}
{{--                                            <button type="submit" class="btn btn-primary m-1">Apply Filters</button>--}}
{{--                                            <a href="{{ URL::current() }}" type="submit"--}}
{{--                                               class=" m-1 btn btn-primary">Clear</a>--}}
{{--                                        </div>--}}
                                    </div>


                                </form>
                                @php
                                    function formatIndianNumber($number) {
                                        $formatted_number = '';
                                        if(strlen($number) >4)
                                        {
                                            $tmpnumber=substr($number,0,strlen($number)-3);
                                            $number_str = strrev((string)$tmpnumber);
                                            for ($i = 0; $i < strlen($number_str); $i++) {
                                                if($i > 0 && $i % 2 == 0 ) {
                                                    $formatted_number .= ',' ;
                                                }
                                                $formatted_number .= $number_str[$i];
                                            }
                                            $number=strrev((string)$number);
                                            $formatted_number = strrev($formatted_number).",".$number[2].$number[1].$number[0];
                                            return ($formatted_number);
                                        }
                                        else{
                                            return $number;
                                        }
                                    }
                                @endphp
                                <table class="stripe table-bordered table-info " id="data-table">
                                    <thead style="text-align: center">
                                    <tr>
                                        <th colspan="4">
                                            <center>Loan Report - ({{$showCase}})</center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Region Name</th>
                                        <th scope="col">Target (2023-2024)</th>
                                        <th scope="col">Received Amount</th>
                                        <th scope="col">% Of Loans</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{$result->Region_Name}}</td>
                                            <td>{{formatIndianNumber((int)$result->Loan_Target_2023_24)}}</td>
                                            <td>{{formatIndianNumber((int)$result->Disbursed_Amount)}}</td>
                                            <td>{{$result->Disbursed_Amount!=0 &&$result->Loan_Target_2023_24!=0?number_format($result->Disbursed_Amount/$result->Loan_Target_2023_24*100,2,".",","):""}}</td>
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
