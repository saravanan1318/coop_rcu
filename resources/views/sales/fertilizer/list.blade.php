@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Fertilizer</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">sales</li>
        <li class="breadcrumb-item">Fertilizer</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Fertilizer Add</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/sales/fertilizer/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">Fertilizer Date</th>
                            <th scope="col">No of varieties</th>
                            <th scope="col">No of farmers</th>
                            <th scope="col">Quantity In Kgs</th>
                            <th scope="col">Sales amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sales_Fertilizer as $sales_Fertilizer)
                                <tr>
                                    <th scope="row">{{ $sales_Fertilizer->id }}</th>
                                    <td>{{ $sales_Fertilizer->Fertilizerdate}}</td>
                                    <td>{{ $sales_Fertilizer->nosveriety }}</td>
                                    <td>{{ $sales_Fertilizer->nosfarmer }}</td>
                                    <td>{{ $sales_Fertilizer->qty }}</td>
                                    <td>{{ $sales_Fertilizer->totalamount }}</td>
                                   <td><a href='/society/sales/Fertilizer/edit/{{$sales_Fertilizer->id}}'>view</a></td>
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
