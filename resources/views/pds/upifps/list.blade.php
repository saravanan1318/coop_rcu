@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>UPI FPS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">UPI FPS</li>
                    <li class="breadcrumb-item">List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <br />
                        <div class="card-body">
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
                                <table class="stripe table-bordered table-info " id="data-table">
                                    <thead style="text-align: center">
                                    <tr>
                                        <th scope="col" rowspan="2">Financial Month</th>
                                        <th scope="col" rowspan="2">Region</th>
                                        <th scope="col" colspan="3">FPS</th>
                                        <th scope="col" colspan="3">UPI</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" >Full Time</th>
                                        <th scope="col" >Part Time</th>
                                        <th scope="col" >Total</th>
                                        <th scope="col" >Introduced</th>
                                        <th scope="col" >To be Introduced</th>
                                        <th scope="col" >Introduced %</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alldata as $data)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($data->fin_month)->format('d-m-Y') }}</td>
                                            <td>{{ $data->region->region_name??"" }}</td>
                                            <td style="text-align: right;">{{ $data->fps_fulltime }}</td>
                                            <td style="text-align: right;">{{ $data->fps_parttime }}</td>
                                            <td style="text-align: right;">{{ $data->fps_total }}</td>
                                            <td style="text-align: right;">{{ $data->upi_introduced }}</td>
                                            <td style="text-align: right;">{{ $data->upi_tobe_introduced }}</td>
                                            <td style="text-align: right;">{{ $data->upi_introduced_per }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</main><!-- End #main -->''
@endsection
