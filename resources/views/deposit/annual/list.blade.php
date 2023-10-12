@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Target & outstanding (onetime)</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Deposit</li>
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
                  <h5 class="card-title">Target & outstanding Add</h5>
                  <div class="row">
                      <div class="col-sm-12 col-md-12 mb-4">
                          @if(session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                      </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">
                        <div class="text-center">
                            <a href="/society/deposit/annual/add"  class="btn btn-primary" >Add</a>
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
                            <th scope="col">Deposit type</th>
                            <th scope="col">Overall outstanding</th>
                            <th scope="col">Current outstanding</th>
                            <th scope="col">Current Year</th>
                            <th scope="col">Annual target</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($deposit_onetimeentry as $deposit_onetime)
                                <tr>
                                    <th scope="row">{{ $deposit_onetime->id }}</th>
                                    <td>{{ $deposit_onetime->deposit_id}}</td>
                                    <td style="text-align: right;">{{ $deposit_onetime->overall_outstanding }}</td>
                                    <td style="text-align: right;">{{ $deposit_onetime->current_outstanding }}</td>
                                    <td >{{ $deposit_onetime->current_year }}</td>
                                    <td style="text-align: right;">{{ $deposit_onetime->annual_target }}</td>
                                    <td><a class="btn btn-warning" href="annual/update?id={{$deposit_onetime->id}}">Edit</a></td>
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
