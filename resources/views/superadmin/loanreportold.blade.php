@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Loan Report</h5>
                  <form action="{{url('/superadmin/loanreport')}}" method="get" id="loanreportform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingName" name="loanreportdate" placeholder="date" value="{{$loanreportdate}}" required>
                              <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="loanreportsubmit">Submit</button>
                          </div>
                      </div>
                  </form
                  </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered datatable">
                            <thead style="text-align: center">
                            <tr>
                                <th scope="col" rowspan="2">Date</th>
                                <th scope="col" rowspan="2">Loan Types</th>
                                <th scope="col" rowspan="2">Overall Outstanding</th>
                                <th scope="col" rowspan="2">Outstanding in the current financial year (from 01.04.23)</th>
                                <th scope="col" rowspan="2">Annual Target</th>
                                <th scope="col" colspan="4" rowspan="1">Issued</th>
                                <th scope="col" colspan="2" rowspan="1">Collection</th>
                                <th scope="col" rowspan="2">% Achieved on target</th>
                            </tr>
                            <tr>
                              <th scope="col" >Total No.</th>
                              <th scope="col" >Total Amount</th>
                              <th scope="col" >SC/ST No.</th>
                              <th scope="col" >SC/ST Amount</th>
                              <th scope="col" >Numbers</th>
                              <th scope="col" >Amount</th>
                          </tr>
                            </thead>
                            <tbody>
                              @foreach($finalarr as $indarr)
                                <tr>
                                    <td>{{ $indarr['date'] }}</td>
                                    <td>{{ $indarr['loantype'] }}</td>
                                    <td>{{ $indarr['overall_outstanding'] }}</td>
                                    <td>{{ $indarr['current_outstanding'] }}</td>
                                    <td>{{ $indarr['annual_target'] }}</td>
                                    <td>{{ $indarr['totalno'] }}</td>
                                    <td>{{ $indarr['totalamount'] }}</td>
                                    <td>{{ $indarr['scstissuedtotalno'] }}</td>
                                    <td>{{ $indarr['scstissuedtotalamount'] }}</td>
                                    <td>{{ $indarr['collectedtotalno'] }}</td>
                                    <td>{{ $indarr['collectedtotalamount'] }}</td>
                                    <td>{{ $indarr['achieved'] }}</td>
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