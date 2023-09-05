@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Crop loan entry</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop loan entry</li>
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
                        <h5 class="card-title">Crop loan entry</h5>
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Application Received.</th>
                                        <th scope="col">Application Sanctioned</th>
                                        <th scope="col">Application Pending.</th>
                                        <th scope="col">Total cutivated area</th>
                                        <th scope="col">Loan issued area</th>
                                        <th scope="col">Outstanding number</th>
                                        <th scope="col">Outstanding amount</th>
                                        <th scope="col">Overdue number</th>
                                        <th scope="col">Overdue amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($croploan_entry as $croploan)
                                    <tr>
                                        <th scope="row">{{ $croploan->id }}</th>
                                        <td>{{ $croploan->croploandate }}</td>
                                        <td>{{ $croploan->noofappreceived }}</td>
                                        <td>{{ $croploan->noofappsanctioned }}</td>
                                        <td>{{ $croploan->noofapppending }}</td>
                                        <td>{{ $croploan->totalcultivatedarea }}</td>
                                        <td>{{ $croploan->cultivatedarealoanissuedto }}</td>
                                        <td>{{ $croploan->outstandingno }}</td>
                                        <td>{{ $croploan->outstandingamount }}</td>
                                        <td>{{ $croploan->overdueno }}</td>
                                        <td>{{ $croploan->overdueamount }}</td>
                                        <td><a href="/society/croploan/cropwise/{{ $croploan->id }}">Cropwise view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <div class="d-flex">
                                    {!! $croploan_entry->links() !!}
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection