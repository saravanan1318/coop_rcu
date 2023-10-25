@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Details of  Income earned and Expenditure incurred  by the Fair Price Shops</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/cm/list">Dashboard</a></li>
        <li class="breadcrumb-item">Details of  Income earned and Expenditure incurred  by the Fair Price Shops</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Details of  Income earned and Expenditure incurred  by the Fair Price Shops</h5>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-4">
                            <!-- Add button can be placed here -->
                        </div>
                    </div>

                    {{-- Success Message --}}
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
                <table class="table table-responsive table-bordered datatable" id="data-table">
                <thead style="text-align: center">
                <tr>
{{--                    <th rowspan="2">Name of the  Region</th>--}}
                    <th rowspan="2">Total No of Full Time FPS </th>
                    <th rowspan="2"> No of  Full time  FPS in Rental building</th>
                    <th colspan="7" ><center>Expenditures</center></th>
                    <th rowspan="2"><center>Total Expen diture</center></th>
                    <th colspan="2"><center>Income</center></th>
                    <th rowspan="2">Total Income</th>
                    <th rowspan="2">Difference</th>
                </tr>
                <tr>

                    <th>Establi shment and Contingencies Charges</th>
                    <th>Trans port Expenses</th>
                    <th >Rental Expenses</th>
                    <th>Electri city Charges</th>
                    <th>Printing and Stationeries</th>
                    <th>FPS Mainte nance Expenses</th>
                    <th>Other Expenses</th>

                    <th>Margin Money</th>
                    <th>Sale of Empty Gunnies</th>

                    {{--                                                    <th>Date of Disposal of First Appeal Petition</th>--}}
                    {{--                                                    <th>Date of Second Appeal Petition received (TNIC)</th>--}}
                    {{--                                                    <th>Final Order passed (TNIC)</th>--}}
                </tr>
                </thead>
                <tbody>
                    @foreach($result as $data)
                    <tr>
{{--                        <td>{{ $data->region_name }}</td>--}}
                        <td>{{ $data->FTFPS }}</td>
                        <td>{{ $data->FPSRental }}</td>
                        <td>{{ $data->contiogencharge }}</td>
                        <td>{{ $data->tpexpense }}</td>
                        <td>{{ $data->rentexpense }}</td>
                        <td>{{ $data->ebcharge }}</td>
                        <td>{{ $data->printstation }}</td>
                        <td>{{ $data->maintanaceexpense }}</td>
                        <td>{{ $data->otherexpense }}</td>
                        <td>{{ $data->totalexpense }}</td>
                        <td>{{ $data->marginmoney }}</td>
                        <td>{{ $data->saleemptygunnies }}</td>
                        <td>{{ $data->totalincome }}</td>
                        <td>{{ $data->difference }}</td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
             </div>
        </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
