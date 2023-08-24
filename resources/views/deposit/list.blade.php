@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Deposit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Deposit</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Deposit List</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <div class="text-center">
                                    <a href="/society/deposit/add" class="btn btn-primary">Add</a>
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
                        <h5 class="card-title">Deposits</h5>
                        <div class="col-md-12">
                            <table class="table table-responsive datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Deposit Name</th>
                                        <th scope="col">Deposit Date</th>
                                        <th scope="col">Received No.</th>
                                        <th scope="col">Received Amount</th>
                                        <th scope="col">Closed No.</th>
                                        <th scope="col">Closed Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{$i=1}}
                                    @foreach($deposits as $deposit)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $deposit->deposittype->deposit_name }}</td>
                                        <td>{{ $deposit->depositdate }}</td>
                                        <td>{{ $deposit->recievedno }}</td>
                                        <td>{{ $deposit->recievedamount }}</td>
                                        <td>{{ $deposit->closedno }}</td>
                                        <td>{{ $deposit->closedamount }}</td>
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