@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Margin Money</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Margin Money</li>
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
                                            <th scope="col" >Financial Month</th>
                                            <th scope="col" >Region</th>
                                            <th scope="col" >Price Difference Due Amount</th>
                                            <th scope="col" >Marginal for Supplier Free of Cost</th>
                                            <th scope="col" >Marginal for PMGKAY scheme</th>
                                            <th scope="col" >Margin Amount Due for Cashew</th>
                                            <th scope="col" >Marginal for PMGKAY scheme</th>
                                            <th scope="col" >Difference to be paid</th>
                                            <th scope="col" >Additional</th>
                                            <th scope="col" >Consumer Goods synchronized date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alldata as $data)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($data->fin_month)->format('d-m-Y') }}</td>
                                            <td>{{ $data->region->region_name??"" }}</td>
                                            <td style="text-align: right;">{{ $data->price_diff_due_amount }}</td>
                                            <td style="text-align: right;">{{ $data->margin_supp_free_cost }}</td>
                                            <td style="text-align: right;">{{ $data->margin_pmgkay_scheme_a }}</td>
                                            <td style="text-align: right;">{{ $data->margin_amt_due_cashew }}</td>
                                            <td style="text-align: right;">{{ $data->margin_pmgkay_scheme_b }}</td>
                                            <td style="text-align: right;">{{ $data->diff_to_be_paid }}</td>
                                            <td style="text-align: right;">{{ $data->additional }}</td>
                                            <td style="text-align: right;">{{ $data->consumer_goods_sync_date }}</td>
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
