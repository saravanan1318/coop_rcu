@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report on Salt Sales</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Salt Sales</li>
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
                                    Details of Salt Sales Report
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Region</th>
                                <th scope="col"> Demand List</th>
                                <th scope="col"> Sale</th>
                                <th scope="col"> Purchase</th>
                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->dl}}</td>
                                    <td>{{$result->sale}}</td>
                                    <td>{{$result->purchase}}</td>
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
