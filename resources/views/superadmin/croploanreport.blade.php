@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Service</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">service Report</h5>
                  <form action="{{url('/superadmin/croploanreport')}}" method="get" id="croploanreportform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingName" name="croploanreportdate" placeholder="date" value="{{$croploanreportdate}}" required>
                              <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="croploanreportsubmit">Submit</button>
                          </div>
                      </div>
                  </form
                  </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered" style="text-align: center">
                            <thead>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Application Received.</th>
                                        <th scope="col">Application Sanctioned</th>
                                        <th scope="col">Application Pending.</th>
                                        <th scope="col">Total cutivated area</th>
                                        <th scope="col">Loan issued area</th>
                                        <th scope="col">Outstanding number</th>
                                        <th scope="col">Outstanding amount</th>
                                        <th scope="col">Overdue number</th>
                                        <th scope="col">Overdue amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($croploan_entry as $croploan)
                                    <tr>
                                        <th scope="row">{{ $croploan->id }}</th>
                                        <td>{{ $croploan->croploandate }}</td>
                                        <td>{{ $croploan->applicationsreceived }}</td>
                                        <td>{{ $croploan->applicationssanctioned }}</td>
                                        <td>{{ $croploan->applicationspending }}</td>
                                        <td>{{ $croploan->totalcultivatedarea }}</td>
                                        <td>{{ $croploan->loanissuedarea }}</td>
                                        <td>{{ $croploan->outstandingno }}</td>
                                        <td>{{ $croploan->outstandingamount }}</td>
                                        <td>{{ $croploan->overdueno }}</td>
                                        <td>{{ $croploan->overdueamount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $croploan_entry->links() !!}
                        </div>
                    </div>
                </div>
            </div>
     </div>
  </section>

</main><!-- End #main -->
@endsection
