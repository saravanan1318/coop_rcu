@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Deposits</h1>
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
                        {{-- <h5 class="card-title">Deposit List</h5> --}}
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
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Deposit Name</th>
                                        <th scope="col">Deposit Date</th>
                                        <th scope="col">Received No.</th>
                                        <th scope="col">Received Amount</th>
                                        <th scope="col">Closed No.</th>
                                        <th scope="col">Closed Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deposits as $deposit)
                                    <tr>
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
                            <div class="d-flex">
                                {!! $deposits->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection