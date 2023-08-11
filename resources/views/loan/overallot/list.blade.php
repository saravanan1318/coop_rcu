@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Overall Outstanding</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">overallot Target</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">overallot Add</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/loan/overallot/add"  class="btn btn-primary" >Add</a>
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
                <div class="col-md-12">
                    <table class="table table-responsive datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">overallot target Date</th>
                            <th scope="col">SC / SC No.</th>
                            <th scope="col">SC / SC Amount</th>
                            <th scope="col">Others No.</th>
                            <th scope="col">Others Amount</th>
                            <th scope="col">Total No.</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($loan_overallot as $loan_overallot)
                                <tr>
                                    <th scope="row">{{ $loan_overallot->id }}</th>
                                    <td>{{ $loan_overallot->overallotdate}}</td>
                                    <td>{{ $loan_overallot->scstno }}</td>
                                    <td>{{ $loan_overallot->scstamount }}</td>
                                    <td>{{ $loan_overallot->othersno }}</td>
                                    <td>{{ $loan_overallot->othersamount }}</td>
                                    <td>{{ $loan_overallot->totalno }}</td>
                                    <td>{{ $loan_overallot->totalamount }}</td>
                                   <td><a href='/society/loan/overallot/edit/{{$loan_overallot->id}}'>view</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
  </section>

</main>
@endsection
