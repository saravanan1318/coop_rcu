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
                        <th colspan="3"></th>
                        <th colspan="4">Of the liabilities to be discharged</th>
                    </tr>
                    <tr>
                        <th>Number of liquidated societies not finally wound up </th>
                        <th>Total Assets to be recovered by these Societies</th>
                        <th>Total Liabilities to be discharged</th>
                        <th>Government Share capital</th>
                        <th>Government loan</th>
                        <th>Other dues to the Government</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($annexuretwo as $data)
                        <tr>
                            <td style="text-align: right;">{{ $data->number_of_liquidated_societies }}</td>
                            <td style="text-align: right;">{{ $data->total_assets_to_be_recovered}}</td>
                            <td style="text-align: right;">{{ $data->total_liabilities_to_be_discharged }}</td>
                            <td style="text-align: right;">{{ $data->government_share_capital }}</td>
                            <td style="text-align: right;">{{ $data->government_loan}}</td>
                            <td style="text-align: right;">{{ $data->other_dues_to_the_government}}</td>
                            <td style="text-align: right;">{{ $data->total}}</td>
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
