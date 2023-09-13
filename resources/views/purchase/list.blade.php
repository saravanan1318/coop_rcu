@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Purchase</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Purchase</li>
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
                        <h5 class="card-title"></h5>
                        <div class="col-md-12 table-responsive">
                            <table class="table table-responsive table-bordered datatable" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3"></th>
                                        <th scope="col" colspan="12">Purchase Form</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col" colspan="3" >Govt. Institutions</th>
                                        <th scope="col" colspan="3" >Coop Institutions</th>
                                        <th scope="col" colspan="3" >Private Traders</th>
                                        <th scope="col" colspan="3">JPC Approved Traders</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="3"></th>
                                        <th scope="col">No of Varieties</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Value (Rs.)</th>
                                        <th scope="col">No of Varieties</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Value (Rs.)</th>
                                        <th scope="col">No of Varieties</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Value (Rs.)</th>
                                        <th scope="col">No of Varieties</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Value (Rs.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <th scope="row">{{ $purchase->id }}</th>
                                        <td>{{ $purchase->purchasedate }}</td>
                                        <td>{{ $purchase->purchasetype->purchase_name }}</td>
                                        <td>{{ $purchase->govtnoofvarieties }}</td>
                                        <td>{{ $purchase->govtquantity }}</td>
                                        <td>{{ $purchase->govtvalues }}</td>
                                        <td>{{ $purchase->coopnoofvarieties }}</td>
                                        <td>{{ $purchase->coopquantity }}</td>
                                        <td>{{ $purchase->coopvalues }}</td>
                                        <td>{{ $purchase->privatenoofvarieties }}</td>
                                        <td>{{ $purchase->privatequantity }}</td>
                                        <td>{{ $purchase->privatevalues }}</td>
                                        <td>{{ $purchase->jpcnoofvarieties }}</td>
                                        <td>{{ $purchase->jpcquantity }}</td>
                                        <td>{{ $purchase->jpcvalues }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {!! $purchases->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection
