@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/eightytwo/add">Dashboard</a></li>
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

                <form action="{{url("/jr/eightytwo/store")}}" method="post" id="eightytwoform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="eightytwodate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <h6>82- Inspection</h6>
                                    <tr>
                                        <th>OB</th>
                                        <th>Ordered this month</th>
                                        <th>Total (OB+Ordered)</th>
                                        <th>Disposed this month</th>
                                        <th>Pending within 3 months</th>
                                        <th>Pending in 3 - 6 months</th>
                                        <th>Pending Above 6 months</th>
                                        <th>Total Pending</th>
                                        <th>Pending percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="ob_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="ordered_this_month_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="total_ob_ordered_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="completed_this_month_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="pending_within_3_months_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="pending_in_3_to_6_months_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="pending_above_6_months_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="total_pending_eighty_two" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="pending_percentage_eighty_two" class="form-control" required></td>
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
<script>
    // Get the input fields
    const obInput = document.querySelector('input[name="ob_eighty_two"]');
    const orderedThisWeekInput = document.querySelector('input[name="ordered_this_month_eighty_two"]');
    const totalInput = document.querySelector('input[name="total_ob_ordered_eighty_two"]');
    const completedThisMonthInput = document.querySelector('input[name="completed_this_month_eighty_two"]');
    const pendingWithin3MonthsInput = document.querySelector('input[name="pending_within_3_months_eighty_two"]');
    const pendingIn3To6MonthsInput = document.querySelector('input[name="pending_in_3_to_6_months_eighty_two"]');
    const pendingAbove6MonthsInput = document.querySelector('input[name="pending_above_6_months_eighty_two"]');
    const totalPendingInput = document.querySelector('input[name="total_pending_eighty_two"]');
    const pendingPercentageInput = document.querySelector('input[name="pending_percentage_eighty_two"]');

    // Attach event listeners to the relevant input fields
    obInput.addEventListener('input', calculateTotal);
    orderedThisWeekInput.addEventListener('input', calculateTotal);
    pendingWithin3MonthsInput.addEventListener('input', calculateTotalPending);
    pendingIn3To6MonthsInput.addEventListener('input', calculateTotalPending);
    pendingAbove6MonthsInput.addEventListener('input', calculateTotalPending);

    // Function to calculate the "total" field
    function calculateTotal() {
        const obValue = parseFloat(obInput.value) || 0;
        const orderedThisWeekValue = parseFloat(orderedThisWeekInput.value) || 0;
        const totalValue = obValue + orderedThisWeekValue;

        // Set the calculated "total" to the input field
        totalInput.value = totalValue.toFixed();
        calculatePendingPercentage();
    }

    // Function to calculate the "total pending" field
    function calculateTotalPending() {
        const pendingWithin3MonthsValue = parseFloat(pendingWithin3MonthsInput.value) || 0;
        const pendingIn3To6MonthsValue = parseFloat(pendingIn3To6MonthsInput.value) || 0;
        const pendingAbove6MonthsValue = parseFloat(pendingAbove6MonthsInput.value) || 0;
        const totalPendingValue = pendingWithin3MonthsValue + pendingIn3To6MonthsValue + pendingAbove6MonthsValue;

        // Set the calculated "total pending" to the input field
        totalPendingInput.value = totalPendingValue.toFixed();
        calculatePendingPercentage();
    }

    // Function to calculate the pending percentage
    function calculatePendingPercentage() {
        const totalValue = parseFloat(totalInput.value) || 0;
        const completedThisMonthValue = parseFloat(completedThisMonthInput.value) || 0;
        const totalPendingValue = parseFloat(totalPendingInput.value) || 0;

        // Calculate the pending percentage
        const pendingPercentage = (totalPendingValue / totalValue) * 100;

        // Set the calculated percentage to the input field
        pendingPercentageInput.value = pendingPercentage.toFixed(2);
    }
    // Initialize the calculations
    calculateTotal();
    calculateTotalPending();
</script><!-- End #main -->
@endsection
