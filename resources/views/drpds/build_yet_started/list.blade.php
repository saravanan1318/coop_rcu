@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR PDS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/drpds/build_yet_started/list">Dashboard</a></li>
        <li class="breadcrumb-item">Build Yet To Be Started</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Build Yet To Be Started</h5>
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
                        <th scope="col">Date</th>
                        <th scope="col">No of FPS functioning in Private rental buildings</th>
                        <th scope="col">No.of places identified for Fair price shop construction</th>
                        <th scope="col">No of cases Administrative Sanction made by  District Collector (MGNREGA/MLACDS/ MPLADS)</th>
                        <th Scope="col">Construction Commenced but not yet completed (Nos)</th>
                        <th scope="col">Construction fully completed (Nos) </th>
                        <th scope="col">Construction Not yet Commenced (Nos)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drpds as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->starteddate)->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $data->prb }}</td>
                            <td style="text-align: right;">{{ $data->fps }}</td>
                            <td style="text-align: right;">{{ $data->cas }}</td>
                            <td style="text-align: right;">{{ $data->cc }}</td>
                            <td style="text-align: right;">{{ $data->cfc }}</td>
                            <td style="text-align: right;">{{ $data->cnc }}</td>
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
