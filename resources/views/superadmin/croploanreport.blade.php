@extends('layouts.master')
@section('content')
<style>
    table.table th, table.table td {
        text-align: center;
    }
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Crop loan entry</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop loan entry</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Crop Loan Report</h5>
                        <form action="{{url('/superadmin/croploanreport')}}" method="get" id="croploanform" class="row g-3">
                          @csrf
                            <div class="row margindiv">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="floatingName" name="croploanreportdate" placeholder="date" value="{{$godownreportdate}}" required>
                                        <label for="floatingName">Date</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" id="godownsubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                    <table class="table table-responsive table-bordered datatable">
                        <thead style="text-align: center">
                            <tr>
                                <th rowspan="3">Date</th>
                                <th rowspan="3">Annual Target</th>
                                <th rowspan="3">Proportionate target up to the month</th>
                                <th rowspan="3">Total cultivable land area (in hectare)</th>
                                <th colspan="6">Application received</th>
                                <th colspan="6">Application disposed</th>
                                <th colspan="2">Application pending</th>
                            </tr>
                            <tr>
                                <th colspan="2">Opening Balance</th>
                                <th colspan="2">Received</th>
                                <th colspan="2">Total</th>
                                <th colspan="3">Sanctioned</th>
                                <th>% of achievement to annual target</th>
                                <th>% of achievement to proportionate target</th>
                                <th>Rejected</th>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Amount</th>
                                <th>No.</th>
                                <th>Amount</th>
                                <th>No.</th>
                                <th>Amount</th>
                                <th>No.</th>
                                <th>Amount</th>
                                <th>Area of land (hectare)</th>
                                <th></th>
                                <th></th>
                                <th>No.</th>
                                <th>No.</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($croploan_entry as $croploan)
                            <tr>
                                <td>{{ $croploan->croploandate }}</td>
                                <td>{{ $croploan->annualTarget }}</td>
                                <td>{{ $croploan->proportionateTarget }}</td>
                                <td>{{ $croploan->cultivableLand }}</td>
                                <td>{{ $croploan->openingBalanceNo }}</td>
                                <td>{{ $croploan->openingBalanceAmount }}</td>
                                <td>{{ $croploan->receivedNo }}</td>
                                <td>{{ $croploan->receivedAmount }}</td>
                                <td>{{ $croploan->totalNo }}</td>
                                <td>{{ $croploan->totalAmount }}</td>
                                <td>{{ $croploan->sanctionedNo }}</td>
                                <td>{{ $croploan->sanctionedAmount }}</td>
                                <td>{{ $croploan->sanctionedLand }}</td>
                                <td>{{ $croploan->achievementAnnual }}</td>
                                <td>{{ $croploan->achievementProportionate }}</td>
                                <td>{{ $croploan->rejectedno }}</td>
                                <td>{{ $croploan->applicationpendingno }}</td>
                                <td>{{ $croploan->applicationpendingamount }}</td>
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
