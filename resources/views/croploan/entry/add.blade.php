@extends('layouts.master')
@section('content')
<style>
    table.table th, table.table td {
        text-align: center;
    }
</style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Crop Loan </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item">Crop Loan</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row margindiv">
                                <div class="col-sm-12 col-md-12 mb-4">
                                    @if(session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
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

                            <form action="{{ url("/society/croploan/store") }}" method="post" id="croploanform" class="row g-3">
                                @csrf
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="croploandate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>

                                  <div class="col-md-12 table-responsive">
                                    <div class="col-md-12" style="margin-top: 10px">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
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
                                                    <th></th>
                                                    <th></th>
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
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Amount</th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="annualTarget" value="{{ old('annualTarget') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="proportionateTarget" value="{{ old('proportionateTarget') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="cultivableLand" value="{{ old('cultivableLand') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="openingBalanceNo" value="{{ old('openingBalanceNo') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="openingBalanceAmount" value="{{ old('openingBalanceAmount') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="receivedNo" value="{{ old('receivedNo') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="receivedAmount" value="{{ old('receivedAmount') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="totalNo" value="{{ old('totalNo') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="totalAmount" value="{{ old('totalAmount') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="sanctionedNo" value="{{ old('sanctionedNo') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="sanctionedAmount" value="{{ old('sanctionedAmount') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="sanctionedLand" value="{{ old('sanctionedLand') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="achievementAnnual" value="{{ old('achievementAnnual') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="achievementProportionate" value="{{ old('achievementProportionate') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="rejectedno" value="{{ old('rejectedno') }}" required></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="applicationpendingno" value="{{ old('applicationpendingno') }}"></td>
                                                    <td><input type="text"  onkeypress="return isNumberKey(event)"  onkeyup="return isNumberKey(event)"   class="form-control" style="width: 100px;" name="applicationpendingamount" value="{{ old('applicationpendingamount') }}"></td>
                                                </tr>

                                        </table>

                                    </div>
                                  </div>
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-center">
                                            <input type="hidden" value="1" id="rowadded">
                                            <button type="submit" class="btn btn-warning">Submit</button>
                                        </div>
                                    </div>
                                    <!-- Rest of your form goes here -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
