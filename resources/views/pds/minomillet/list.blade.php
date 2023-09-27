@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Mino Millet</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mino Millet</li>
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
                                            <th scope="col" >FPS Name</th>
                                            <th scope="col" >Purchased Company Name</th>
                                            <th scope="col" >Small Grain Type</th>
                                            <th scope="col" >Quantity Purchased</th>
                                            <th scope="col" >Quantity Sold</th>
                                            <th scope="col" >Sales Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alldata as $data)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($data->fin_month)->format('d-m-Y') }}</td>
                                            <td>{{ $data->region->region_name??"" }}</td>
                                            <td style="text-align: right;">{{ $data->fps_name }}</td>
                                            <td style="text-align: right;">{{ $data->purchase_company_name }}</td>
                                            <td style="text-align: right;">{{ $data->small_grain_type }}</td>
                                            <td style="text-align: right;">{{ $data->quantity_purchased }}</td>
                                            <td style="text-align: right;">{{ $data->quantity_sold }}</td>
                                            <td style="text-align: right;">{{ $data->sales_amount }}</td>
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
