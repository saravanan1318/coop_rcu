@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Godown</li>
        <li class="breadcrumb-item activegit ">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Godown Report</h5>
            <form action="{{url('/superadmin/godownreport')}}" method="get" id="godownform" class="row g-3">
              @csrf
              <div class="row margindiv">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="floatingName" name="godownreportdate" placeholder="date" value="{{$godownreportdate}}" required>
                    <label for="floatingName">Date</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="godownsubmit">Submit</button>
                  </div>
                </div>
            </form </div>
            <div class="col-md-12" style="margin-top: 10px">
              <table class="table table-responsive table-bordered datatable">
                <thead style="text-align: center">
                  <tr>
                    <th scope="col" rowspan="2">Date</th>
                    <th scope="col" colspan="1" rowspan="2">Count</th>
                    <th scope="col" colspan="1" rowspan="2">Capacity</th>
                    <th scope="col" colspan="1" rowspan="2">Utilized</th>
                    <th scope="col" colspan="1" rowspan="2">Utilized (%)</th>
                    <th scope="col" rowspan="1">Income</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($godownreportdata as $godownData)
                  <tr>
                    <td>{{ $godownData['godowndate'] }}</td>
                    <td>{{ $godownData['count'] }}</td>
                    <td>{{ $godownData['capacity'] }}</td>
                    <td>{{ $godownData['utilized'] }}</td>
                    <td>{{ $godownData['percentageutilized'] }}</td>
                    <td>{{ $godownData['income'] }}</td>
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
