@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Gunny Sales</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Gunny Sales</li>
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
                                        <th scope="col" rowspan="2">Initial Balance</th>
                                        <th scope="col" rowspan="2">Current Month Income</th>
                                        <th scope="col" rowspan="2">Total</th>
                                        <th scope="col" colspan="4">Current Month Sold</th>
                                        <th scope="col" rowspan="2">Final Balance</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" >TNSCS</th>
                                        <th scope="col" >MSTC (eTender)</th>
                                        <th scope="col" >NCDFI (eMarket)</th>
                                        <th scope="col" >Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alldata as $data)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($data->fin_month)->format('d-m-Y') }}</td>
                                            <td>{{ $data->region->region_name??"" }}</td>
                                            <td style="text-align: right;">{{ $data->initial_balance }}</td>
                                            <td style="text-align: right;">{{ $data->curr_month_income }}</td>
                                            <td style="text-align: right;">{{ $data->total }}</td>
                                            <td style="text-align: right;">{{ $data->cms_tncsc }}</td>
                                            <td style="text-align: right;">{{ $data->cms_mstc }}</td>
                                            <td style="text-align: right;">{{ $data->cms_ncdfi }}</td>
                                            <td style="text-align: right;">{{ $data->cms_total }}</td>
                                            <td style="text-align: right;">{{ $data->final_balance }}</td>
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
