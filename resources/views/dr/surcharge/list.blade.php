@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/surcharge/list">Dashboard</a></li>
        <li class="breadcrumb-item">87-Surcharge </li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">87-Surcharge</h5>
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
             <table class="table table-responsive table-bordered datatable">
             <thead style="text-align: center">
                <tr>
                    <th>Surcharge Order to be collected</th>
                    <th>Surcharge issued Amount</th>
                    <th>Numbers Collected during the month</th>
                    <th>Collected Amount</th>
                    <th>Balance numbers</th>
                    <th>Balance Amount</th>
                    <th>Percentage of Collection</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dr as $data)
                    <tr>
                        <td>{{ $data->surcharge_order_issued_number }}</td>
                        <td>{{ $data->surcharge_issued_amount }}</td>
                        <td>{{ $data->numbers_collected_during_month }}</td>
                        <td>{{ $data->collected_amount }}</td>
                        <td>{{ $data->balance_numbers }}</td>
                        <td>{{ $data->balance_amount }}</td>
                        <td>{{ $data->percentage_of_collection }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
             </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
