@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/eightytwo/add">Dashboard</a></li>
        <li class="breadcrumb-item">82 - Inspection</li>
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

                <form action="{{url("/dr/eightytwo/store")}}" method="post" id="eightytwoform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <!-- Your other form fields go here -->
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <h6>82- Inspection</h6>
                                    <tr>
                                        <th>OB</th>
                                        <th>Ordered this month</th>
                                        <th>Total (OB+Ordered)</th>
                                        <th>Completed this month</th>
                                        <th>Pending within 3 months</th>
                                        <th>Pending in 3 - 6 months</th>
                                        <th>Pending Above 6 months</th>
                                        <th>Total Pending</th>
                                        <th>Pending percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="ob_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="ordered_this_month_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="total_ob_ordered_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="completed_this_month_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="pending_within_3_months_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="pending_in_3_to_6_months_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="pending_above_6_months_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="total_pending_eighty_two" class="form-control" required></td>
                                        <td><input type="text" name="pending_percentage_eighty_two" class="form-control" required></td>
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
</main><!-- End #main -->
@endsection
