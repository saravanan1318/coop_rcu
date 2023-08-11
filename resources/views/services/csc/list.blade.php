@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item">Common Services Centres</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CSC Add</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <div class="text-center">
                                    <a href="/society/services/csc/add" class="btn btn-primary">Add</a>
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
                        <h5 class="card-title">Godown</h5>
                        <div class="col-md-12">
                            <table class="table table-responsive datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Count</th>
                                        <th scope="col">Income Generated (rs)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services_cscs as $services_csc)
                                    <tr>
                                        <th scope="row">{{ $services_csc->id }}</th>
                                        <td>{{ $services_csc->count }}</td>
                                        <td>{{ $services_csc->income }}</td>
                                        <td><a href='/services/csc/edit/'>view</a></td>
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