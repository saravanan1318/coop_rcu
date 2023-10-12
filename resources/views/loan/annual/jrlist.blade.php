@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Target & outstanding</h1>
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
                  {{-- <h5 class="card-title">Annual Target and Outstanding </h5> --}}
                  <div class="row">
                      <div class="col-sm-12 col-md-12 mb-4">
                          @if(session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                      </div>
                    <div class="col-sm-4 col-md-4 mb-4">
<form name="import" method="post" action="{{'/jr/importtraget'}}"  enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
    <input type="file" name="uploadfile" class="form-control" required accept=".csv">
        </div>
        <div class="col-6">
    <button type="submit"  class="btn-sm btn btn-primary">Upload</button>
        </div>
    </div>
</form>

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4">

                    </div>
                    <div class="col-sm-4 col-md-4 mb-4 p-4" style="border:2px  solid #8fb0bc">
                        <div class="row">
                            @if(isset($circles))
                                <div class="col-6">
{{--                                    <label for="circle">Circle:</label>--}}
                                    <select name="circle" id="circle" class="form-control col-6">
                                        <option value="">Please select circle</option>
                                        @foreach($circles as $circle)
                                            <option
                                                value="{{ $circle->id }}">{{ $circle->circle_name }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="col-6">
                                    <button class="btn btn-info btn-sm float-end" id="generateSampleFile">Download Sample File</button>
                                </div>
                            @endif

{{--                            <a href="/society/loan/annual/add"  class="btn btn-primary" >Add</a>--}}
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
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($loan_onetimeentry as $loan_onetime)
                                <tr>
                                    <th scope="row">{{ $loan_onetime->id }}</th>
                                    <td>{{ $loan_onetime->loan_id}}</td>
                                    <td style="text-align: right;">{{ $loan_onetime->overall_outstanding }}</td>
                                    <td style="text-align: right;">{{ $loan_onetime->current_outstanding }}</td>
                                    <td style="text-align: right;">{{ $loan_onetime->current_year }}</td>
                                    <td style="text-align: right;">{{ $loan_onetime->annual_target }}</td>
                                    <td><a class="btn btn-warning" href="annual/update?id={{$loan_onetime->id}}">Edit</a></td>
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
