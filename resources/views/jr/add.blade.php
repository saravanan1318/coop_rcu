@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/add">Dashboard</a></li>
        <li class="breadcrumb-item">JR</li>
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

                  {{-- Your DR Details Form Goes Here --}}
                  <form action="{{url('your_action_url')}}" method="post" id="jrform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <!-- Your other form fields go here -->
                        <div class="col-md-12" style="margin-top: 10px">
                            <h2>81 & 82</h2>
                            <table class="table table-bordered">
                                <thead>
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
                                        <td><input type="text" name="ob[]" class="form-control" required></td>
                                        <td><input type="text" name="ordered_this_month[]" class="form-control" required></td>
                                        <td><input type="text" name="total_ob_ordered[]" class="form-control" required></td>
                                        <td><input type="text" name="completed_this_month[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_within_3_months[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_in_3_to_6_months[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_above_6_months[]" class="form-control" required></td>
                                        <td><input type="text" name="total_pending[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_percentage[]" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>OB</th>
                                        <th>Initiated during the month</th>
                                        <th>Total</th>
                                        <th>Disposed this month</th>
                                        <th>Pending</th>
                                        <th>Pending percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="disciplinary_ob[]" class="form-control" required></td>
                                        <td><input type="text" name="initiated_during_month[]" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_total[]" class="form-control" required></td>
                                        <td><input type="text" name="disposed_this_month[]" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_pending[]" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_pending_percentage[]" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Recommended</th>
                                        <th>Action taken</th>
                                        <th>Disposal</th>
                                        <th>Percentage of Disposal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="recommended_action[]" class="form-control" required></td>
                                        <td><input type="text" name="action_taken[]" class="form-control" required></td>
                                        <td><input type="text" name="disposal[]" class="form-control" required></td>
                                        <td><input type="text" name="percentage_of_disposal[]" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Surcharge Order issued number</th>
                                        <th>Surcharge issued Amount</th>
                                        <th>Numbers Collected during the month</th>
                                        <th>Collected Amount</th>
                                        <th>Balance numbers</th>
                                        <th>Balance Amount</th>
                                        <th>Percentage of Collection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="surcharge_order_issued_number[]" class="form-control" required></td>
                                        <td><input type="text" name="surcharge_issued_amount[]" class="form-control" required></td>
                                        <td><input type="text" name="numbers_collected_during_month[]" class="form-control" required></td>
                                        <td><input type="text" name="collected_amount[]" class="form-control" required></td>
                                        <td><input type="text" name="balance_numbers[]" class="form-control" required></td>
                                        <td><input type="text" name="balance_amount[]" class="form-control" required></td>
                                        <td><input type="text" name="percentage_of_collection[]" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Disqualification - 36</th>
                                        <th>OB</th>
                                        <th>Initiated during the month</th>
                                        <th>Total</th>
                                        <th>Disposed this month</th>
                                        <th>Pending at the end of the month</th>
                                        <th>Pending percentage</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="disqualification_36[]" class="form-control" required></td>
                                        <td><input type="text" name="ob_36[]" class="form-control" required></td>
                                        <td><input type="text" name="initiated_during_month_36[]" class="form-control" required></td>
                                        <td><input type="text" name="total_36[]" class="form-control" required></td>
                                        <td><input type="text" name="disposed_this_month_36[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_end_of_month_36[]" class="form-control" required></td>
                                        <td><input type="text" name="pending_percentage_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
                                        <td><input type="text" name="societies_36[]" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_36[]" class="form-control" required></td>
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
                                <a class="btn btn-warning" id="addrow">Submit</a>
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
