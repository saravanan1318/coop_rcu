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
                  <h5 class="card-title">Issue Report</h5>
                    <div class="col-md-12">
                        <table class="table table-responsive datatable">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Loan Types</th>
                                <th scope="col">Overall Outstanding</th>
                                <th scope="col">Outstanding in the current financial year (from 01.04.23)</th>
                                <th scope="col">Annual Target</th>
                                <th scope="col" colspan="4">Issued</th>
                                <th scope="col" colspan="2">Collection</th>
                                <th scope="col">% Achieved on target</th>
                            </tr>
                            <tr>
                              <th scope="col" colspan="5">Date</th>
                              <th scope="col" >Others No.</th>
                              <th scope="col" >Others Total</th>
                              <th scope="col" >SC/ST No.</th>
                              <th scope="col" >SC/ST Total</th>
                              <th scope="col" >Numbers</th>
                              <th scope="col" >Total</th>
                              <th scope="col"></th>
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
                                    <td>{{ $indarr['othersissuedtotalno'] }}</td>
                                    <td>{{ $indarr['othersissuedtotalamount'] }}</td>
                                    <td>{{ $indarr['scstissuedtotalno'] }}</td>
                                    <td>{{ $indarr['scstissuedtotalamount'] }}</td>
                                    <td>{{ $indarr['collectedtotalno'] }}</td>
                                    <td>{{ $indarr['collectedtotalamount'] }}</td>
                                    <td>{{ $indarr['collectedtotalamount'] }}</td>
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