@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report on Gunny sale </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Gunny sale</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                      <div class="row margindiv">


                     </div>
                    <div class="col-md-12" style="margin-top: 10px">

                        <form method="GET" action="{{ URL::current() }}">
                            <h3>Filters:</h3>
                            <div class="row filterpaddings">
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
                                    <a href="{{ URL::current() }}" type="submit"
                                       class=" m-1 btn btn-primary">Clear</a>
                                </div>
                            </div>


                        </form>
                        <table class="stripe table-bordered table-info " id="data-table">

                            <thead style="text-align: center">
                            <tr>
                                <th colspan="9">
                                    Sales and Closing Balance of Gallicons (in Lakhs) – As on this month 2023
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" rowspan="2">Name of the District</th>
                                <th scope="col" rowspan="2">Initial balance</th>
                                <th scope="col" rowspan="2">Current month's income</th>
                                <th scope="col" rowspan="2">Total</th>
                                <th scope="col"  colspan="4">Current Month Sales</th>
                                <th scope="col" rowspan="2">OverAll Balance</th>
                            </tr>
                            <tr>
                                <th>TNCSC</th>
                                <th>MSTC (Tender)</th>
                                <th>NCDFI (e-market)</th>
                                <th>Total</th>
                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                @php
                                $intialBalance=$result->initial_balance;
                                $intialCurrent=$result->curr_month_income;
                                $total=$intialBalance+$intialCurrent;
                                $cms_tncsc=$result->cms_tncsc;
                                $cms_mstc=$result->cms_mstc;
                                $cms_ncdfi=$result->cms_ncdfi;
                                $totalsc=$cms_tncsc+$cms_mstc+$cms_ncdfi;
                                @endphp
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->initial_balance}}</td>
                                    <td>{{$result->curr_month_income}}</td>
                                    <td>{{$total}}</td>
                                    <td>{{$cms_tncsc}}</td>
                                    <td>{{$cms_mstc}}</td>
                                    <td>{{$cms_ncdfi}}</td>
                                    <td>{{$totalsc}}</td>
                                    <td>{{$total-$totalsc}}</td>
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
