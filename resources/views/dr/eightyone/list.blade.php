@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/eightyone/list">Dashboard</a></li>
        <li class="breadcrumb-item">DR </li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">81- Inquiry</h5>
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

                    {{-- Table --}}
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered datatable">
                            <thead style="text-align: center">
                                <tr>
                                    <th scope="col">OB</th>
                                    <th scope="col">Ordered this month</th>
                                    <th scope="col">Total (OB+Ordered)</th>
                                    <th scope="col">Completed this month</th>
                                    <th scope="col">Pending within 3 months</th>
                                    <th scope="col">Pending in 3 - 6 months</th>
                                    <th scope="col">Pending Above 6 months</th>
                                    <th scope="col">Total Pending</th>
                                    <th scope="col">Pending percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dr as $data)
                                    <tr>

                                        <td>{{ $data->ob_eighty_one }}</td>
                                        <td>{{ $data->ordered_this_month_eighty_one }}</td>
                                        <td>{{ $data->total_ob_ordered_eighty_one}}</td>
                                        <td>{{ $data->completed_this_month_eighty_one }}</td>
                                        <td>{{ $data->pending_within_3_months_eighty_one }}</td>
                                        <td>{{ $data->pending_in_3_to_6_months_eighty_one }}</td>
                                        <td>{{ $data->pending_above_6_months_eighty_one }}</td>
                                        <td>{{ $data->total_pending_eighty_one }}</td>
                                        <td>{{ $data->pending_percentage_eighty_one }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection