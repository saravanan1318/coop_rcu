@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR PDS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/drpds/tea/list">Dashboard</a></li>
        <li class="breadcrumb-item">Ooty Tea Sales</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ooty Tea Sales</h5>
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
                        <th scope="col">Fixed monthly code</th>
                        <th scope="col">Need List</th>
                        <th scope="col">Purchases </th>
                        <th scope="col">Sale </th>
                        <th scope="col">Percentage of sale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drpds as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->identifieddate)->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $data->fmc }}</td>
                            <td style="text-align: right;">{{ $data->nl }}</td>
                            <td style="text-align: right;">{{ $data->purchase }}</td>
                            <td style="text-align: right;">{{ $data->sale }}</td>
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
