@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>RCS Office List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/annexureone/list">Dashboard</a></li>
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
                        <th>Liquidation Ordered during the month</th>
                        <th>Revived during the month</th>
                        <th>Finally wounded up during the month</th>
                        <th>Pending at the end of the month</th>
                        <th>Within one year</th>
                        <th>1-5 years</th>
                        <th>5-10 years</th>
                        <th>Over 10 years</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annexureone as $data)
                        <tr>
                            <td style="text-align: right;">{{ $data->pending_beginning }}</td>
                            <td style="text-align: right;">{{ $data->liquidation_ordered}}</td>
                            <td style="text-align: right;">{{ $data->revived_during_month }}</td>
                            <td style="text-align: right;">{{ $data->wounded_up_during_month }}</td>
                            <td style="text-align: right;">{{ $data->pending_end}}</td>
                            <td style="text-align: right;">{{ $data->within_one_year}}</td>
                            <td style="text-align: right;">{{ $data->one_to_five_years}}</td>
                            <td style="text-align: right;">{{ $data->five_to_ten_years}}</td>
                            <td style="text-align: right;">{{ $data->over_ten_years}}</td>
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
