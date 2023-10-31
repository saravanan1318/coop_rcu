@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>RCS OFFICE Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/appeal/add">Dashboard</a></li>
        <li class="breadcrumb-item"> Progress  in disposing the Appeals filed under section 152(2) </li>
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

                <form action="{{url("/office/appeal/store")}}" method="post" id="appealform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-12" style="margin-top: 10px">

                            <table class="table table-bordered">
                                <thead style="text-align: center">
                                    <tr>
                                        <th colspan="5"></th>
                                        <th colspan="4">Breakup details for pendency</th>
                                    </tr>
                                    <tr>
                                        <th>Pending at the beginning of the month</th>
                                        <th>Received during the month</th>
                                        <th>Total</th>
                                        <th>Disposed Off During tht month</th>
                                        <th>Pending at the end of the month</th>
                                        <th>Within 3 Months</th>
                                        <th>3-6 months</th>
                                        <th>6-12 months</th>
                                        <th>Over one years</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" class="form-control" min="0" step="any" name="pending_beginning" class="form-control" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="received_during_month" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="total"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="disposed_off_during_month" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="pending_end"  required ></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="within_3_months" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="three_to_6_months"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="six_to_12_months"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="over_one_year"  required></td>
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
                        <!-- Rest of your form goes here -->
                    </form>
                </div>
            </div>
        </div>
     </div>
  </section>
</main>
@endsection<!-- End #main -->
