@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Target & outstanding (onetime)</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">Target & outstanding (onetime)</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Annual Target and Outstanding </h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/loan/annual/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">Loan type</th>
                            <th scope="col">Overall outstanding</th>
                            <th scope="col">Current outstanding (from 1st April to current date)</th>
                            <th scope="col">Current Year</th>
                            <th scope="col">Annual target</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($loan_onetimeentry as $loan_onetime)
                                <tr>
                                    <th scope="row">{{ $loan_onetime->id }}</th>
                                    <td>{{ $loan_onetime->loan_id}}</td>
                                    <td>{{ $loan_onetime->overall_outstanding }}</td>
                                    <td>{{ $loan_onetime->current_outstanding }}</td>
                                    <td>{{ $loan_onetime->current_year }}</td>
                                    <td>{{ $loan_onetime->annual_target }}</td>
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
