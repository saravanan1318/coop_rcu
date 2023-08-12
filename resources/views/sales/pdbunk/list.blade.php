@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Petrol/Diesel Bunks</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">sales</li>
        <li class="breadcrumb-item">Petrol/Diesel Bunks</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">pdbunk Add</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/sales/pdbunk/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">pdbunk Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sales_pdbunk as $sales_pdbunk)
                                <tr>
                                    <th scope="row">{{ $sales_pdbunk->id }}</th>
                                    <td>{{ $sales_pdbunk->pdbunkdate}}</td>
                                    <td>{{ $sales_pdbunk->scstno }}</td>
                                    <td>{{ $sales_pdbunk->Quantity }}</td>
                                    <td>{{ $sales_pdbunk->amount }}</td>
                                    <td>{{ $sales_pdbunk->totalamount }}</td>
                                   <td><a href='/society/sales/pdbunk/edit/{{$sales_pdbunk->id}}'>view</a></td>
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
