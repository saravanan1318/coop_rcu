@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Crop loan entry</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop loan Crop wise</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Crop loan Crop wise List</h5>
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
                        <div class="col-md-12 table-responsive" style="margin-top: 10px">
                            <table class="table table-responsive table-bordered">
                                <thead style="text-align: center">
                                <tr>
                                    <th scope="col" rowspan="2">Date</th>
                                    <th scope="col" rowspan="2">Type of Crop</th>
                                    <th scope="col" colspan="3" rowspan="1">Issue of Loan</th>
                                    <th scope="col" colspan="2" rowspan="1">New Members</th>
                                    <th scope="col" colspan="2" rowspan="1">SC / ST</th>
                                    <th scope="col" colspan="2" rowspan="1">Women</th>
                                    <th scope="col" colspan="2" rowspan="1">SF / MF</th>
                                    <th scope="col" colspan="2" rowspan="1">OF</th>
                                </tr>
                                <tr>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >Area covered</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach($croploan_cropwise as $croploan)
                                    <tr>
                                        <td scope="row">{{ $croploan->croploandate }}</td>
                                        <td scope="row">{{ $croploan->crop_id }}</td>
                                        <td scope="row">{{ $croploan->noofloan }}</td>
                                        <td scope="row">{{ $croploan->noofamount }}</td>
                                        <td scope="row">{{ $croploan->areacovered }}</td>
                                        <td scope="row">{{ $croploan->newmembernoofloan }}</td>
                                        <td scope="row">{{ $croploan->newmembernoofamount }}</td>
                                        <td scope="row">{{ $croploan->scstnoofloan }}</td>
                                        <td scope="row">{{ $croploan->scstnoofamount }}</td>
                                        <td scope="row">{{ $croploan->womennoofloan }}</td>
                                        <td scope="row">{{ $croploan->womennoofamount }}</td>
                                        <td scope="row">{{ $croploan->sfmfnoofloan }}</td>
                                        <td scope="row">{{ $croploan->sfmfnoofamount }}</td>
                                        <td scope="row">{{ $croploan->ofnoofloan }}</td>
                                        <td scope="row">{{ $croploan->ofnoofamount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {!! $croploan_cropwise->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection