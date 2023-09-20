@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title">Issue of Loan and Collection</h5> --}}
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        {{-- <div class="text-center">
                            <a href="/society/loan/add"  class="btn btn-primary" >Add</a>
                        </div> --}}
                    </div>
                </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-4">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                  <table class="table table-responsive table-bordered datatable">
                      <thead style="text-align: center">
                        <tr>
                            <th scope="col" rowspan="2">Date</th>
                            <th scope="col" rowspan="2">Loan Types</th>
                            <th scope="col" colspan="2" rowspan="1">Disbursed</th>
                            <th scope="col" colspan="2" rowspan="1">Collected</th>
                        </tr>

                      </thead>
                      <tr style="text-align: center">
                        <th scope="col" ></th>
                        <th scope="col" ></th>
                        <th scope="col" >No. of Loan</th>
                        <th scope="col" >Amount of Loan</th>
                        <th scope="col" >No. of Loan</th>
                        <th scope="col" >Amount of Loan</th>
                      </tr>
                  </table>
                  <div class="d-flex">
                    {!! $loans->links() !!}
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
