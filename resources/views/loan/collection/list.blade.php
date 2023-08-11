@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Collection</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">collection</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">collection Add</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/loan/collection/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">Loan</th>
                            <th scope="col">Collection Date</th>
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
                            @foreach($loan_collection as $loan_collection)
                                <tr>
                                    <th scope="row">{{ $loan_collection->id }}</th>
                                    <td>{{ $loan_collection->loantype}}</td>
                                    <td>{{ $loan_collection->collectiondate}}</td>
                                    <td>{{ $loan_collection->scstno }}</td>
                                    <td>{{ $loan_collection->scstamount }}</td>
                                    <td>{{ $loan_collection->othersno }}</td>
                                    <td>{{ $loan_collection->othersamount }}</td>
                                    <td>{{ $loan_collection->totalno }}</td>
                                    <td>{{ $loan_collection->totalamount }}</td>
                                   <td><a href='/society/loan/collection/edit/{{$loan_collection->id}}'>view</a></td>
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
