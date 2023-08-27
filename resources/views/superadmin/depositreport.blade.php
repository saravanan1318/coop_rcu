@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Deposit</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Deposit Report</h5>
                  <form action="{{url('/superadmin/depositreport')}}" method="get" id="depositreportform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingName" name="depositreportdate" placeholder="date" value="{{$depositreportdate}}" required>
                              <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="depositreportsubmit">Submit</button>
                          </div>
                      </div>
                  </form
                  </div>
                    <div class="col-md-12" style="margin-top: 10px">
                      <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Deposit Name</th>
                                <th scope="col">Deposit Date</th>
                                <th scope="col">Received No.</th>
                                <th scope="col">Received Amount</th>
                                <th scope="col">Closed No.</th>
                                <th scope="col">Closed Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->deposittype->deposit_name }}</td>
                                <td>{{ $deposit->depositdate }}</td>
                                <td>{{ $deposit->recievedno }}</td>
                                <td>{{ $deposit->recievedamount }}</td>
                                <td>{{ $deposit->closedno }}</td>
                                <td>{{ $deposit->closedamount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                        {!! $deposits->links() !!}
                    </div>
                    </div>
                </div>
            </div>
     </div>
  </section>

</main><!-- End #main -->
@endsection