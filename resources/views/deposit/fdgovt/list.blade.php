@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>FD-Government</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Deposit</li>
                <li class="breadcrumb-item">FD-Government</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">FD-Goverment Add</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                            </div>
                            <div class="col-sm-4 col-md-4 mb-4">
                                <div class="text-center">
                                    <a href="/society/deposit/fdgovt/add" class="btn btn-primary">Add</a>
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
                        <h5 class="card-title">Deposit Recieved</h5>
                        <div class="col-md-12">
                            <table class="table table-responsive datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fdgovt Date</th>
                                        <th scope="col">Number </th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Total No.</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deposit_fdgovts as $deposit_fdgovt)
                                    <tr>
                                        <th scope="row">{{ $deposit_fdgovt->id }}</th>
                                        <td>{{ $deposit_fdgovt->recieveddate }}</td>
                                        <td>{{ $deposit_fdgovt->recievedothersno }}</td>
                                        <td>{{ $deposit_fdgovt->recievedothersamount }}</td>
                                        <td>{{ $deposit_fdgovt->recievedtotal }}</td>
                                        <td>{{ $deposit_fdgovt->recievedtotalamount }}</td>
                                        <td><a href='/society/deposit/fdgovt/edit/{{$loan_issue->id}}'>view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h5 class="card-title">Deposit Closed</h5>
                        <div class="col-md-12">
                            <table class="table table-responsive datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fdgovt Date</th>
                                        <th scope="col">Number </th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Total No.</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deposit_fdgovts as $deposit_fdgovt)
                                    <tr>
                                        <th scope="row">{{ $deposit_fdgovt->id }}</th>
                                        <td>{{ $deposit_fdgovt->closeddate }}</td>
                                        <td>{{ $deposit_fdgovt->closedothersno }}</td>
                                        <td>{{ $deposit_fdgovt->closedothersamount }}</td>
                                        <td>{{ $deposit_fdgovt->closedtotalno }}</td>
                                        <td>{{ $deposit_fdgovt->closedtotalamount }}</td>
                                        <td><a href='/society/deposit/fdgovt/edit/{{$loan_issue->id}}'>view</a></td>
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