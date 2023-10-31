@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>RCS OFFICE Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/annexureone/add">Dashboard</a></li>
        <li class="breadcrumb-item"> Progress In Liquidation Of Pending Case</li>
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

                <form action="{{url("/office/annexuretwo/store")}}" method="post" id="annexuretwoform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-12" style="margin-top: 10px">

                            <table class="table table-bordered">
                                <thead style="text-align: center">
                                    <tr>
                                        <th colspan="3"></th>
                                        <th colspan="4">Of the liabilities to be discharged</th>
                                    </tr>
                                    <tr>
                                        <th>Number of liquidated societies not finally wound up </th>
                                        <th>Total Assets to be recovered by these Societies</th>
                                        <th>Total Liabilities to be discharged</th>
                                        <th>Government Share capital</th>
                                        <th>Government loan</th>
                                        <th>Other dues to the Government</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" class="form-control" min="0" step="any" name="number_of_liquidated_societies" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="total_assets_to_be_recovered" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="total_liabilities_to_be_discharged" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="government_share_capital" required></td>
                                        <td><input type="number" class= "form-control" min="0" step="any" name="government_loan" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="other_dues_to_the_government" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="total" required></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-10">
                            <!-- Other form fields go here -->
                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <input type="hidden" value="1" id="rowadded">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
  </section>
</main>
  @endsection
