@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>UPI-FPS Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">UPI-FPS</li>
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
                                    Details on cashless transaction through UPI system
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" rowspan="2">Name of the District</th>
                                <th scope="col" colspan="3" >N.of Fair Price Shops in Zones</th>
                                <th scope="col" colspan="3">Details of Fair Price Shops where cashless transaction facility through UPI system has been introduced</th>
                            </tr>
                            <tr>
                                <th scope="col">Full time</th>
                                <th scope="col">Part time</th>
                                <th scope="col">Total</th>
                                <th scope="col">Introduced</th>
                                <th scope="col">To be Introduced</th>
                                <th scope="col">% of Introduced</th>

                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                @php
                                $total= $result->fps_fulltime + $result->fps_parttime;
                                $balanceIntro= $total - $result->upi_introduced;
                                if($total==0)
                                    {
                                        $percentage=0;
                                    }
                                else{
                                $percentage= ($result->upi_introduced/$total)*100;
                                $percentage =number_format($percentage, 2);
                                }
                                @endphp
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->fps_fulltime}}</td>
                                    <td>{{$result->fps_parttime}}</td>
                                    <td>{{$total}}</td>
                                    <td>{{$result->upi_introduced }}</td>
                                    <td>{{$balanceIntro }}</td>
                                    <td>{{$percentage}}</td>
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
