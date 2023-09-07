@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/disqualify/list">Dashboard</a></li>
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
                    <h5 class="card-title">OB Data</h5>
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
                            <th colspan="2">OB</th>
                            <th colspan="2">Initiated during the month</th>
                            <th colspan="2">Total</th>
                            <th colspan="2">Disposed this month</th>
                            <th colspan="2">Pending at the end of the month</th>
                            <th colspan="2">Pending Percentage</th>

                        </tr>
                        <tr>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                            <th>No. of Societies</th>
                            <th>No. of Board of Directors</th>
                        </tr>
                    </thead>
            <tbody>
                @foreach($dr as $row)
                <tr>
                    <td>{{ $row->societies_ob }}</td>
                    <td>{{ $row->board_of_directors_ob }}</td>
                    <td>{{ $row->societies_im }}</td>
                    <td>{{ $row->board_of_directors_im }}</td>
                    <td>{{ $row->societies_total }}</td>
                    <td>{{ $row->board_of_directors_total }}</td>
                    <td>{{ $row->societies_dam }}</td>
                    <td>{{ $row->board_of_directors_dam }}</td>
                    <td>{{ $row->societies_pam }}</td>
                    <td>{{ $row->board_of_directors_pam }}</td>
                    <td>{{ $row->societies_pp }}</td>
                    <td>{{ $row->board_of_directors_pp }}</td>
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
