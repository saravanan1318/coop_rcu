@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Trans List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">Trans List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <table class="table table-responsive datatable">
                        <thead>
                          <tr>
                            <th scope="col" >Type of Loan</th>
                            <th scope="col" >No. of Loan</th>
                            <th scope="col" >Amount of Loan</th>
                            <th scope="col" >No. of Loan</th>
                            <th scope="col" >Amount of Loan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($loan_trans as $loan_tran)
                                <tr>
                                    <td>{{ $loan_tran->loantype->loantype }}</td>
                                    <td>{{ $loan_tran->disbursedno }}</td>
                                    <td>{{ $loan_tran->disbursedamount }}</td>
                                    <td>{{ $loan_tran->collectedno }}</td>
                                    <td>{{ $loan_tran->collectedamount }}</td>
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
