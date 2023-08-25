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
                        <h5 class="card-title">Services List</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <div class="text-center">
                                    <a href="/society/services/add" class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>
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
                        <h5 class="card-title">services</h5>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-responsive table-bordered datatable" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" rowspan="2">Date</th>
                                        <th scope="col" rowspan="2">Categories</th>
                                        <th scope="col" rowspan="2">No of varieties</th>
                                        <th scope="col" rowspan="2">No of Outlets</th>
                                        <th scope="col" rowspan="2">No of Customers</th>
                                        <th scope="col" rowspan="2">No of farmers</th>
                                        <th scope="col" colspan="2">Quantity</th>
                                        <th scope="col" colspan="2">services amount</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="7"></th>
                                        <th scope="col">Kilo</th>
                                        <th scope="col">Litres</th>
                                        <th scope="col">Physical</th>
                                        <th scope="col">Coop Bazaar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $Services)
                                    <tr>
                                        <th scope="row">{{ $Services->id }}</th>
                                        <td>{{ $Services->Servicesdate }}</td>
                                        <td>{{ $Services->Services_id }}</td>
                                        <td>{{ $Services->noofvarieties }}</td>
                                        <td>{{ $Services->noofoutlets }}</td>
                                        <td>{{ $Services->noofcustomers }}</td>
                                        <td>{{ $Services->nooffarmers }}</td>
                                        <td>{{ $Services->quantitykilo }}</td>
                                        <td>{{ $Services->quantitylitres }}</td>
                                        <td>{{ $Services->servicesamountphysical }}</td>
                                        <td>{{ $Services->servicesamountcoopbazaar }}</td>
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
