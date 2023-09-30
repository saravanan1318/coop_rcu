@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/profit/list">Dashboard</a></li>
        <li class="breadcrumb-item">jr </li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data</h5>
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
                <table class="table table-responsive table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Total No of Institutions</th>
                            <th colspan="2">Number Societies in net Profit</th>
                            <th colspan="2">Number Societies in current year profit and cumulative loss</th>
                            <th colspan="2">Number Societies in current year loss and cumulative loss  </th>
                            <th scope="col">Progress during the week </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Number</th>
                            <th>Percentage</th>
                            <th>Number</th>
                            <th>Percentage</th>
                            <th>Number</th>
                            <th>Percentage</th>
                            <th></th>
                        </tr>
                    </thead>
            <tbody>
                @foreach($jr as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->profitdate)->format('d-m-Y') }}</td>
                    <td style="text-align: right;">{{ $row->total }}</td>
                    <td style="text-align: right;">{{ $row->nsnp_no }}</td>
                    <td style="text-align: right;">{{ $row->nsnp_percentage }}</td>
                    <td style="text-align: right;">{{ $row->nsp_no }}</td>
                    <td style="text-align: right;">{{ $row->nsp_percentage }}</td>
                    <td style="text-align: right;">{{ $row->nsl_no }}</td>
                    <td style="text-align: right;">{{ $row->nsl_percentage }}</td>
                    <td style="text-align: right;">{{ $row->progress }}</td>
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
