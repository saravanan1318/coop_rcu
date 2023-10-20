@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>CM CELL Petitions</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/cm/list">Dashboard</a></li>
        <li class="breadcrumb-item">CM CELL Petitions</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CM CELL Petitions</h5>
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
                        <th scope="col">Name</th>
                        <th scope="col">Region</th>
                        <th scope="col">Circle </th>
                        <th scope="col">Society</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">aadhar</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rti as $data)
                    <tr>
                        <td>{{ $data->staffName }}</td>
                        <td>{{ $data->region_name }}</td>
                        <td>{{ $data->circle_name }}</td>
                        <td>{{ $data->society_name }}</td>
                        <td>{{ $data->mobile }}</td>
                        <td>{{ $data->aadhar }}</td>
                        <td>{{ $data->address }}</td>
                        <td><a class="btn btn-warning" href="edit/{{$data->id}}">Edit</a></td>
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
