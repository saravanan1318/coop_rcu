@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sale</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Sale</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sale List</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <div class="text-center">
                                    <a href="/society/sale/add" class="btn btn-primary">Add</a>
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
                        <h5 class="card-title">Sales</h5>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-responsive table-bordered datatable" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" rowspan="2" >Date</th>
                                        <th scope="col" rowspan="2">Categories</th>
                                        <th scope="col" rowspan="2">No of varieties</th>
                                        <th scope="col" rowspan="2">No of Outlets</th>
                                        <th scope="col" rowspan="2">No of Customers</th>
                                        <th scope="col" rowspan="2">No of farmers</th>
                                        <th scope="col" colspan="2">Quantity</th>
                                        <th scope="col" colspan="2">Sales amount</th>
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
                                    @foreach($sales as $sale)
                                    <tr>
                                        <th scope="row">{{ $sale->id }}</th>
                                        <td>{{ $sale->saledate }}</td>
                                        <td>{{ $sale->sale_id }}</td>
                                        <td>{{ $sale->noofvarieties }}</td>
                                        <td>{{ $sale->noofoutlets }}</td>
                                        <td>{{ $sale->noofcustomers }}</td>
                                        <td>{{ $sale->nooffarmers }}</td>
                                        <td>{{ $sale->quantitykilo }}</td>
                                        <td>{{ $sale->quantitylitres }}</td>
                                        <td>{{ $sale->salesamountphysical }}</td>
                                        <td>{{ $sale->salesamountcoopbazaar }}</td>
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