@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR PDS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/drpds/iso/list">Dashboard</a></li>
        <li class="breadcrumb-item">Build Yet To Be Initiated</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Build Yet To Be Initiated</h5>
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
                        <th scope="col">Number of full-time fair price shops in the zones (as on 31.08.2023) </th>
                        <th scope="col">Number of full-time fair price shops to be certified with ISO 9001 Certification (Target)</th>
                        <th scope="col">No. of full time fair price shops certified with ISO 9001 certification </th>
                        <th scope="col">No. of Fair Price Shops to be certified with ISO 9001 Certification </th>
                        <th scope="col">Percentage of full-time fair price shops that have been certified as ISO 9001</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drpds as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->identifieddate)->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $data->ftfps }}</td>
                            <td style="text-align: right;">{{ $data->ftfpsc }}</td>
                            <td style="text-align: right;">{{ $data->wc }}</td>
                            <td style="text-align: right;">{{ $data->twc }}</td>
                            <td style="text-align: right;">{{ $data->percentage }}</td>
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
