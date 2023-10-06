@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Loan Report</h1>
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
                                    {{--                                    <h3>Filters:</h3>--}}
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
                                <?php
                                $userid = \Illuminate\Support\Facades\Auth::user()->role;
                                ?>
                                @if(isset($loans) && $userid >=5)
                                    @php
                                        $totalDisbursedNo=0;
                                        $totaldisbursedamount=0;
                                        $totalcollectedno=0;
                                        $totalcollectedamount=0;
                                        $originalcollectedLoan=[];
                                        function formatIndianNumber($number) {
//                                            return $number;
                                            // Convert the number to a float
                                            $formatted_number = '';
                                            if(strlen($number) >4)
                                                {
                                            $tmpnumber=substr($number,0,strlen($number)-3);
    //                                        $tmpnumber=$number;
        $number_str = strrev((string)$tmpnumber); // Reverse the number to process from right to left

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
                                    @foreach($loans as $loan)
                                        @php
                                            if(isset($from))
                                                {
                                                    $from=$from;
                                                }
                                            else{
                                                $from="";
                                            }
                                            if($from=="society")
                                            {
                                                $totalDisbursedNo += $loan->disbursedno;
                                                $totaldisbursedamount +=$loan ->disbursedamount;
                                                $totalcollectedno +=$loan ->collectedno;
                                                $totalcollectedamount +=$loan ->collectedamount;
                                            }
                                            else
                                                {
                                                $totalDisbursedNo += !empty($loan->disbursed_count)?$loan->disbursed_count:$loan->disbursedno;
                                                $totaldisbursedamount +=!empty($loan ->disbursed_total)?$loan ->disbursed_total:$loan ->disbursedamount;
                                                $totalcollectedno +=!empty($loan ->collected_count)?$loan ->collected_count:$loan ->collectedno;
                                                $totalcollectedamount +=!empty($loan ->collect_total)?$loan ->collect_total:$loan ->collectedamount;
                                                }
//                                                $totalDisbursedNo += $loan->disbursedno;
//                                                $totaldisbursedamount +=$loan ->disbursedamount;
//                                                $totalcollectedno +=$loan ->collectedno;
//                                                $totalcollectedamount +=$loan ->collectedamount;
//                                                $tmpvalue=0;
//
                                        @endphp
                                    @endforeach
                                    <div class="row p-4">
                                        <div class="row p-4">
                                            <table class="table table-bordered table-info" style="font-size: 16px;">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="py-4" rowspan="2" rowspan="2">
                                                        <center>Abstract</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Issue of Loan No</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Issue of Loan Amount (Rs)</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Collection of Loan No</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Collection of Loan Amount (Rs)</center>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center><?= $totalDisbursedNo ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= formatIndianNumber($totaldisbursedamount) ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= $totalcollectedno ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= formatIndianNumber($totalcollectedamount) ?></center>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>


                                        {{--                  <table class="table table-responsive table-bordered datatable" id="data-table">--}}
                                        <table class="stripe table-bordered table-info " id="data-table">
                                            <thead style="text-align: center">
                                            <tr>
                                                <th scope="col" rowspan="2">
                                                    <center>Date</center>
                                                </th>
                                                <th scope="col" rowspan="2">
                                                    <center>Type of Loan</center>
                                                </th>
                                                <th scope="col" colspan="2" rowspan="1">
                                                    <center>Issue of Loan</center>
                                                </th>
                                                <th scope="col" colspan="2" rowspan="1">
                                                    <center>Collection of Loan</center>
                                                </th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th scope="col">
                                                    <center>No. of Loan</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Amount of Loan (Rs)</center>
                                                </th>
                                                <th scope="col">
                                                    <center>No. of Loan</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Amount of Loan (Rs)</center>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($loans as $loan)
                                                @if($loan->disbursed_count !=0 || $loan->disbursedno!=0)

                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($loan->loandate)->format('d-m-Y') }}</td>
                                                        <td>{{ $loan->loantype->loantype??"" }}</td>
                                                        <td>{{ formatIndianNumber($loan->disbursedno) }}</td>
                                                        <td style="text-align: right;">{{ formatIndianNumber($loan->disbursedamount) }}</td>
                                                        <td style="text-align: right;">{{ formatIndianNumber($loan->collectedno) }}</td>
                                                        <td style="text-align: right;">{{ formatIndianNumber($loan->collectedamount) }}</td>
                                                        @if(isset($subloans))
                                                            @if(empty($loan->disbursed_count))
                                                                <td style="text-align: right;"><a
                                                                        href="loanlist?region={{$regionFilter}}&circle={{$circleFilter}}&societyTypes={{$societyTypesFilter}}&society={{$societyFilter}}&loantype={{$loan->loantype->id}}&startDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&endDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&filterssocietyby={{$loan->loantype->id}}">{{ formatIndianNumber($loan->disbursedno) }}</a>
                                                                </td>

                                                            @else
                                                                <td style="text-align: right;"><a
                                                                        href="loanlist?region={{$regionFilter}}&circle={{$circleFilter}}&societyTypes={{$societyTypesFilter}}&society={{$societyFilter}}&loantype={{$loan->loantype->id}}&startDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&endDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&filterssocietyby={{$loan->loantype->id}}">{{ $loan->disbursed_count }}</a>
                                                                </td>
                                                            @endif
                                                            @if(empty($loan->disbursed_total))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->disbursedamount) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->disbursed_total) }}</td>
                                                            @endif
                                                            @if(empty($loan->collected_count))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collectedno) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ $loan->collected_count }}</td>
                                                            @endif
                                                            @if(empty($loan->collect_total))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collectedamount) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collect_total) }}</td>
                                                            @endif

                                                        @endif

                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                                @if(isset($loans) && $userid <=4)
                                    @php
                                        $totalDisbursedNo=0;
                                        $totaldisbursedamount=0;
                                        $totalcollectedno=0;
                                        $totalcollectedamount=0;
                                        $originalcollectedLoan=[];
                                        function formatIndianNumber($number) {
                                            $formatted_number = '';
                                            if(strlen($number) >4)
                                                {
                                            $tmpnumber=substr($number,0,strlen($number)-3);
                                            $number_str = strrev((string)$tmpnumber); // Reverse the number to process from right to left

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
                                    @foreach($loans as $loan)
                                        @php
                                            if(isset($from))
                                                {
                                                    $from=$from;
                                                }
                                            else{
                                                $from="";
                                            }
                                            if($from=="society")
                                            {
                                                $totalDisbursedNo += $loan->disbursedno;
                                                $totaldisbursedamount +=$loan ->disbursedamount;
                                                $totalcollectedno +=$loan ->collectedno;
                                                $totalcollectedamount +=$loan ->collectedamount;
                                            }
                                            else
                                                {
                                                $totalDisbursedNo += !empty($loan->disbursed_count)?$loan->disbursed_count:$loan->disbursedno;
                                                $totaldisbursedamount +=!empty($loan ->disbursed_total)?$loan ->disbursed_total:$loan ->disbursedamount;
                                                $totalcollectedno +=!empty($loan ->collected_count)?$loan ->collected_count:$loan ->collectedno;
                                                $totalcollectedamount +=!empty($loan ->collect_total)?$loan ->collect_total:$loan ->collectedamount;
                                                }
//                                                $totalDisbursedNo += $loan->disbursedno;
//                                                $totaldisbursedamount +=$loan ->disbursedamount;
//                                                $totalcollectedno +=$loan ->collectedno;
//                                                $totalcollectedamount +=$loan ->collectedamount;
//                                                $tmpvalue=0;
//
                                        @endphp
                                    @endforeach
                                    <div class="row p-4">
                                        <div class="row p-4">
                                            <table class="table table-bordered table-info" style="font-size: 16px;">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="py-4" rowspan="2" rowspan="2">
                                                        <center>Abstract</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Issue of Loan No</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Issue of Loan Amount (Rs)</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Collection of Loan No</center>
                                                    </th>
                                                    <th scope="col" rowspan="1">
                                                        <center>Collection of Loan Amount (Rs)</center>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <center><?= $totalDisbursedNo ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= formatIndianNumber($totaldisbursedamount) ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= $totalcollectedno ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?= formatIndianNumber($totalcollectedamount) ?></center>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>


                                        {{--                  <table class="table table-responsive table-bordered datatable" id="data-table">--}}
                                        <table class="stripe table-bordered table-info " id="data-table">
                                            <thead style="text-align: center">
                                            <tr>
                                                <th scope="col" rowspan="2">
                                                    <center>Date</center>
                                                </th>
                                                <th scope="col" rowspan="2">
                                                    <center>Type of Loan</center>
                                                </th>
                                                <th scope="col" rowspan="2">
                                                    <center>Name of Societies</center>
                                                </th>
                                                <th scope="col" colspan="2" rowspan="1">
                                                    <center>Issue of Loan</center>
                                                </th>
                                                <th scope="col" colspan="2" rowspan="1">
                                                    <center>Collection of Loan</center>
                                                </th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th scope="col">
                                                    <center>No. of Loan</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Amount of Loan (Rs)</center>
                                                </th>
                                                <th scope="col">
                                                    <center>No. of Loan</center>
                                                </th>
                                                <th scope="col">
                                                    <center>Amount of Loan (Rs)</center>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            {{--//                                               $loans = collect($loans)->sortByDesc('loandate')->values()->all();--}}
                                            {{--                                            @foreach($loans as $loan)--}}
                                            {{--                                                @php--}}
                                            {{--                                               print_r("<pre>");--}}
                                            {{--                                               print_r($loan);--}}
                                            {{--                                               print_r("</pre>");--}}
                                            {{--                                               @endphp--}}
                                            {{--                                            @endforeach--}}

                                            @foreach($loans as $loan)
                                                @if($loan->disbursed_count !=0 || $loan->disbursedno!=0)
                                                    {{--                                                @if(1==1)--}}
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($loan->loandate)->format('d-m-Y') }}</td>
                                                        <td>{{ $loan->loantype->loantype??"" }}</td>
                                                        <td>{{ $loan->society_name??"-" }}</td>
                                                        @if(isset($subloans))
                                                            @if(empty($loan->disbursed_count))
                                                                <td style="text-align: right;"><a
                                                                        href="loanlist?region={{$regionFilter}}&circle={{$circleFilter}}&societyTypes={{$societyTypesFilter}}&society={{$societyFilter}}&loantype={{$loan->loantype->id}}&startDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&endDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&filterssocietyby={{$loan->loantype->id}}">{{ formatIndianNumber($loan->disbursedno) }}</a>
                                                                </td>

                                                            @else
                                                                <td style="text-align: right;"><a
                                                                        href="loanlist?region={{$regionFilter}}&circle={{$circleFilter}}&societyTypes={{$societyTypesFilter}}&society={{$societyFilter}}&loantype={{$loan->loantype->id}}&startDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&endDate={{\Carbon\Carbon::parse($loan->loandate)->format('Y-m-d') }}&filterssocietyby={{$loan->loantype->id}}">{{ $loan->disbursed_count }}</a>
                                                                </td>
                                                            @endif
                                                            @if(empty($loan->disbursed_total))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->disbursedamount) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->disbursed_total) }}</td>
                                                            @endif
                                                            @if(empty($loan->collected_count))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collectedno) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ $loan->collected_count }}</td>
                                                            @endif
                                                            @if(empty($loan->collect_total))
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collectedamount) }}</td>

                                                            @else
                                                                <td style="text-align: right;">{{ formatIndianNumber($loan->collect_total) }}</td>
                                                            @endif

                                                        @endif

                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <br/>
                                        <br/>
                                        {{--                                        @if(isset($subloans))--}}
                                        {{--                                            <h3>Details of Loans</h3>--}}
                                        {{--                                            <br/>--}}
                                        {{--                                            <table class="stripe table-bordered table-info " id="sub-data-table">--}}
                                        {{--                                                <thead style="text-align: center">--}}
                                        {{--                                                <tr>--}}
                                        {{--                                                    <th scope="col" rowspan="2">--}}
                                        {{--                                                        <center>Date</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col" rowspan="2">--}}
                                        {{--                                                        <center>Loan Types</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col" colspan="2" rowspan="1">--}}
                                        {{--                                                        <center>Issue of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col" colspan="2" rowspan="1">--}}
                                        {{--                                                        <center>Collection of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                <tr style="text-align: center">--}}
                                        {{--                                                    <th scope="col">--}}
                                        {{--                                                        <center>No. of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col">--}}
                                        {{--                                                        <center>Amount of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col">--}}
                                        {{--                                                        <center>No. of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                    <th scope="col">--}}
                                        {{--                                                        <center>Amount of Loan</center>--}}
                                        {{--                                                    </th>--}}
                                        {{--                                                </tr>--}}
                                        {{--                                                </thead>--}}
                                        {{--                                                <tbody>--}}
                                        {{--                                                @foreach($subloans as $loan)--}}

                                        {{--                                                    <tr>--}}
                                        {{--                                                        <td>{{ \Carbon\Carbon::parse($loan->loandate)->format('d-m-Y') }}</td>--}}
                                        {{--                                                        <td>{{ $loan->loantype->loantype??"" }}</td>--}}
                                        {{--                                                        <td style="text-align: right;">{{ $loan->disbursedno }}</td>--}}
                                        {{--                                                        <td style="text-align: right;">{{ $loan->disbursedamount }}</td>--}}
                                        {{--                                                        <td style="text-align: right;">{{ $loan->collectedno }}</td>--}}
                                        {{--                                                        <td style="text-align: right;">{{ $loan->collectedamount }}</td>--}}
                                        {{--                                                    </tr>--}}
                                        {{--                                                @endforeach--}}
                                        {{--                                                </tbody>--}}
                                        {{--                                            </table>--}}
                                        {{--                                        @endif--}}
                                    </div>
                                @endif
            </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->''
    <style>
        #sub-data-table {
            border: 1px solid #000; /* Add a 1px solid black border to the table */
        }
    </style>
    <script>
        $(document).ready(function () {
            var subTable = $('#sub-data-table').DataTable( {
                dom: 'Bfrtip',
                pageLength: 15,
                lengthChange: false,
                buttons: []
            } );

            // Handle click event on the first table
            $('#data-table tbody').on('click', 'td', function() {
                if(this._DT_CellIndex.column === 2){
                    var loan_date = this.parentElement.children[0].textContent;
                    var loan_type = this.parentElement.children[1].textContent;
                    subTable.column(0).search(loan_date).column(1).search(loan_type).draw();
                }
            });

        });
    </script>
@endsection
