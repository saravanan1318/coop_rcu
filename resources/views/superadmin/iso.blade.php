@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>ISO Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">ISO</li>
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

{{--                        <table class="stripe table-bordered table-info " id="data-table">--}}
{{--                            <table class="stripe table-bordered table-info " id="data-table">--}}
{{--                            <thead style="text-align: center">--}}
{{--                            <tr>--}}
{{--                                <th colspan="4">--}}
{{--                                    <center>BYI Report </center>--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="col" rowspan="2">Name of the District</th>--}}
{{--                                <th scope="col" rowspan="2">No of FPS functioning in Private rental buildings</th>--}}
{{--                                <th scope="col" rowspan="2">No.of places identified for Fair price shop construction</th>--}}
{{--                                <th scope="col" rowspan="2">No of Places yet to be identified for Fair Price Shop construction</th>--}}
{{--                            </tr>--}}

{{--                            </thead>--}}
{{--                            <tbody >--}}
{{--                            @foreach($results as $result)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$result->Region_Name}}</td>--}}
{{--                                    <td>{{$result->prb}}</td>--}}
{{--                                    <td>{{$result->fps}}</td>--}}
{{--                                    <td>{{$result->fpsc}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
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
                                <th colspan="4">
                                    2023 - 2024 Grant Request - Notification No. 40 - Zone wise details of ISO 9001 certification for full-time fair-price stores
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Name of the District</th>
                                <th scope="col">No.of Full Time Fair Price Shops in Region</th>
                                <th scope="col">No.of Full Time Fair Price Stores to be ISO 9001 Certified (Target)</th>
                                <th scope="col">No.of full-time fair price stores that have obtained ISO 9001 certification</th>
                                <th scope="col">No.of Fair Price Stores to be ISO 9001 certified</th>
                                <th scope="col">% of full-time fair price stores that are ISO 9001 certified</th>
                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->ftfps}}</td>
                                    <td>{{$result->ftfpsc}}</td>
                                    <td>{{$result->wc}}</td>
                                    <td>{{$result->twc}}</td>
                                    <td>{{$result->percentage}}</td>
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
