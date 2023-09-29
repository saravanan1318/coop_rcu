@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/press/list">Dashboard</a></li>
        <li class="breadcrumb-item">Press</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Press</h5>
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
                        <th scope="col">Number of Printing Press</th>
                        <th scope="col">Development Target</th>
                        <th scope="col">Achievement</th>
                        <th scope="col">Percentage of Achievement</th>
                        <th scope="col">Last year Corresponding period achievement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jr as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->pressdate)->format('d-m-Y') }}</td>
                            <td style="text-align: right;">{{ $data->npp }}</td>
                            <td style="text-align: right;">{{ $data->dt}}</td>
                            <td style="text-align: right;">{{ $data->achievement }}</td>
                            <td style="text-align: right;">{{ $data->percentage }}</td>
                            <td style="text-align: right;">{{ $data->lya }}</td>
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
