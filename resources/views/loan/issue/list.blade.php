@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Issue</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">issue</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Issue Add</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/loan/issue/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">Issue Date</th>
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
                            @foreach($loan_issues as $loan_issue)
                                <tr>
                                    <th scope="row">{{ $loan_issue->id }}</th>
                                    <td>{{ $loan_issue->issuedate }}</td>
                                    <td>{{ $loan_issue->scstno }}</td>
                                    <td>{{ $loan_issue->scstamount }}</td>
                                    <td>{{ $loan_issue->othersno }}</td>
                                    <td>{{ $loan_issue->othersamount }}</td>
                                    <td>{{ $loan_issue->totalno }}</td>
                                    <td>{{ $loan_issue->totalamount }}</td>
                                    <td><a href='/society/loan/issue/edit/{{$loan_issue->id}}'>view</a></td>
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