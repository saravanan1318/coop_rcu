@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 mb-4">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <h5 class="card-title">Services</h5>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-responsive table-bordered datatable" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" rowspan="2">Date</th>
                                        <th scope="col" rowspan="2">Categories</th>
                                        <th scope="col" rowspan="2">Count</th>
                                        <th scope="col" rowspan="2">No of Centers</th>
                                        <th scope="col" rowspan="2">No of varieties</th>
                                        <th scope="col" rowspan="2">No of Customers</th>
                                        <th scope="col" rowspan="2">No of Farmers</th>
                                        <th scope="col" colspan="2">Quantity</th>
                                        <th scope="col" rowspan="2">Purchase</th>
                                        <th scope="col" colspan="2">Sales</th>
                                        <th scope="col" rowspan="2">Income Generated (Rs)</th>
                                        <th scope="col" rowspan="2">Profit (Rs)</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="7"></th>
                                        <th scope="col">Kilo</th>
                                        <th scope="col">Litres</th>
                                        <th scope="col">E-Trading</th>
                                        <th scope="col">Physical</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                <tr>
                                  <th scope="row">{{ $service->id }}</th>
                                  <td>{{ $service->servicesdate }}</td>
                                  <td>{{ $service->services_id }}</td>
                                  <td>{{ $service->count }}</td>
                                  <td>{{ $service->noofcenters }}</td>
                                  <td>{{ $service->noofvarieties }}</td>
                                  <td>{{ $service->noofcustomers }}</td>
                                  <td>{{ $service->nooffarmers }}</td>
                                  <td>{{ $service->quantitykilo }}</td>
                                  <td>{{ $service->quantitylitres }}</td>
                                  <td>{{ $service->purchase }}</td>
                                  <td>{{ $service->servicesamountetrading }}</td>
                                  <td>{{ $service->servicesamountphysical }}</td>
                                  <td>{{ $service->income }}</td>
                                  <td>{{ $service->profit }}</td>
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
