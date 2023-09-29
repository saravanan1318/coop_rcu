@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR PDS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/drpds/duesalt/list">Dashboard</a></li>
        <li class="breadcrumb-item">duesalt</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">duesalt</h5>
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
                        <th scope="col">3 months dues (June 2023 to August 2023) </th>
                        <th scope="col">(3-6) monthly dues (March 2023 to May 2023)  </th>
                        <th scope="col">Outstanding for more than 6 months (outstanding up to February 2023)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drpds as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->duesaltdate)->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $data->three }}</td>
                            <td style="text-align: right;">{{ $data->six }}</td>
                            <td style="text-align: right;">{{ $data->abovesix }}</td>
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
