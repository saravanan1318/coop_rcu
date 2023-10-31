@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>RCS Office List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/review/list">Dashboard</a></li>
        <li class="breadcrumb-item">Disciplinary Action-Institution</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Disciplinary Action-Institution</h5>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-4">
                            <!-- Add button can be placed here -->
                        </div>
                    </div>

                    {{-- Success Message --}}
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
                <table class="table table-responsive table-bordered datatable">
                <thead style="text-align: center">
                    <tr>
                        <th colspan="5"></th>
                        <th colspan="4">Breakup details for pendency</th>
                    </tr>
                    <tr>
                        <th>Pending at the beginning of the month</th>
                        <th>Received during the month</th>
                        <th>Total</th>
                        <th>Disposed Off During tht month</th>
                        <th>Pending at the end of the month</th>
                        <th>Within 3 Months</th>
                        <th>3-6 months</th>
                        <th>6-12 months</th>
                        <th>Over one years</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($review as $data)
                        <tr>
                            <td style="text-align: right;">{{ $data->pending_beginning }}</td>
                            <td style="text-align: right;">{{ $data->revived_during_month }}</td>
                            <td style="text-align: right;">{{ $data->total}}</td>
                            <td style="text-align: right;">{{ $data->disposed_off_during_month }}</td>
                            <td style="text-align: right;">{{ $data->pending_end}}</td>
                            <td style="text-align: right;">{{ $data->within_3_months}}</td>
                            <td style="text-align: right;">{{ $data->three_to_6_months}}</td>
                            <td style="text-align: right;">{{ $data->six_to_12_months}}</td>
                            <td style="text-align: right;">{{ $data->over_one_year}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
             </div>
        </div>
        </div>
    </div>
  </section>
</main>
<!-- End #main -->
@endsection
