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
                                @php
                                    $totalDisbursedNo=0;
                                    $totaldisbursedamount=0;
                                    $totalcollectedno=0;
                                    $totalcollectedamount=0;
                                    function formatIndianNumber($number) {
                                        // Convert the number to a float
                                        return number_format($number, 2, '.', ',');
                                                                                $number =$number;

                                        // Check if the number is greater than or equal to 1 lakh (100,000)
                                        if ($number >= 100000) {
                                            // Convert the number to a string with 2 decimal places
                                            $formatted = number_format($number, 2);

                                            // Split the formatted string into parts (before and after the decimal point)
                                            $parts = explode('.', $formatted);

                                            // Format the thousands part with commas as separators
                                            $thousands = number_format((float)$parts[0]);

                                            // Combine the thousands part and the decimal part with a comma separator
                                            $formatted = $thousands . ',' . $parts[1];
                                        } else {
                                            // If the number is less than 1 lakh, format it with commas as separators
                                            $formatted = number_format($number);
                                        }

                                        return $formatted;
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
                                        $totalDisbursedNo += $loan->disbursed_count;
                                        $totaldisbursedamount +=$loan ->disbursed_total;
                                        $totalcollectedno +=$loan ->collected_count;
                                        $totalcollectedamount +=$loan ->collect_total;
                                        }
                                    @endphp
                                @endforeach
                                <div class="row p-4">
                                    <div class="row p-4">
                                        <table class="table table-bordered table-info" style="font-size: 16px;">
                                            <thead>
                                                <tr>
                                                    <th  scope="col" class="py-4" rowspan="2" rowspan="2"><center>Abstract</center></th>
                                                    <th scope="col" rowspan="1"><center>Issue Of Loan No</center></th>
                                                    <th scope="col" rowspan="1"><center>Issue Of Loan Amount</center></th>
                                                    <th scope="col" rowspan="1"><center>Collection Of Loan No</center></th>
                                                    <th scope="col" rowspan="1"><center>Collection Of Loan Amount</center></th>
                                                </tr>
                                                <tr>
                                                    <td><center><?= $totalDisbursedNo ?></center></td>
                                                    <td><center><?= formatIndianNumber($totaldisbursedamount) ?></center></td>
                                                    <td><center><?= $totalcollectedno ?></center></td>
                                                    <td><center><?= formatIndianNumber($totalcollectedamount) ?></center></td>
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
                                                <th scope="col" rowspan="2"><center>Date</center></th>
                                                <th scope="col" rowspan="2"><center>Loan Types</center></th>
                                                <th scope="col" colspan="2" rowspan="1"><center>Issue Of Loan</center></th>
                                                <th scope="col" colspan="2" rowspan="1"><center>Collection Of Loan</center></th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th scope="col"><center>No. of Loan</center></th>
                                                <th scope="col"><center>Amount of Loan</center></th>
                                                <th scope="col"><center>No. of Loan</center></th>
                                                <th scope="col"><center>Amount of Loan</center></th>
                                            </tr>
                                            </thead>
                                            <tbody >

                                            @php
                                               $loans = collect($loans)->sortByDesc('loandate')->values()->all();
                                            @endphp
                                            @foreach($loans as $loan)

                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($loan->loandate)->format('d-m-Y') }}</td>
                                                    <td>{{ $loan->loantype->loantype??"" }}</td>
                                                    @if(isset($subloans))
                                                        <td style="text-align: right;">{{ $loan->disbursed_count }}</td>
                                                        <td style="text-align: right;">{{ formatIndianNumber($loan->disbursed_total) }}</td>
                                                        <td style="text-align: right;">{{ $loan->collected_count }}</td>
                                                        <td style="text-align: right;">{{ formatIndianNumber($loan->collect_total) }}</td>
                                                    @else
                                                        <td style="text-align: right;">{{ $loan->disbursedno }}</td>
                                                        <td style="text-align: right;">{{ $loan->disbursedamount }}</td>
                                                        <td style="text-align: right;">{{ $loan->collectedno }}</td>
                                                        <td style="text-align: right;">{{ $loan->collectedamount }}</td>
                                                    @endif

                                                </tr>
                                            @endforeach
{{--                                            <tr style="display: none">--}}
{{--                                                <td colspan="2"><b>Total</b></td>--}}
{{--                                                <td colspan="" style="display: none"><b></b></td>--}}
{{--                                                <td colspan="" ><b><?=$totalDisbursedNo?></b></td>--}}
{{--                                                <td colspan="" ><b><?=$totaldisbursedamount?></b></td>--}}
{{--                                                <td colspan="" ><b><?=$totalcollectedno?></b></td>--}}
{{--                                                <td colspan="" ><b><?=$totalcollectedamount?></b></td>--}}


{{--                                            </tr>--}}
                      </tbody>
                  </table>
                                    <br />
                                    <br />
                                    @if(isset($subloans))
                                        <h3>Details of Loans</h3>
                                        <br />
                                        <table class="stripe table-bordered table-info " id="sub-data-table">
                                            <thead style="text-align: center">
                                            <tr>
                                                <th scope="col" rowspan="2"><center>Date</center></th>
                                                <th scope="col" rowspan="2"><center>Loan Types</center></th>
                                                <th scope="col" colspan="2" rowspan="1"><center>Issue Of Loan</center></th>
                                                <th scope="col" colspan="2" rowspan="1"><center>Collection Of Loan</center></th>
                                            </tr>
                                            <tr style="text-align: center">
                                                <th scope="col"><center>No. of Loan</center></th>
                                                <th scope="col"><center>Amount of Loan</center></th>
                                                <th scope="col"><center>No. of Loan</center></th>
                                                <th scope="col"><center>Amount of Loan</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subloans as $loan)

                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($loan->loandate)->format('d-m-Y') }}</td>
                                                    <td>{{ $loan->loantype->loantype??"" }}</td>
                                                    <td style="text-align: right;">{{ $loan->disbursedno }}</td>
                                                    <td style="text-align: right;">{{ $loan->disbursedamount }}</td>
                                                    <td style="text-align: right;">{{ $loan->collectedno }}</td>
                                                    <td style="text-align: right;">{{ $loan->collectedamount }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
              </div>
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
