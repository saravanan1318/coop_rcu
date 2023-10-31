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

                <form action="{{url("/office/annexureone/store")}}" method="post" id="annexureoneform" class="row g-3">
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
                                        <th>Liquidation Ordered during the month</th>
                                        <th>Revived during the month</th>
                                        <th>Finally wounded up during the month</th>
                                        <th>Pending at the end of the month</th>
                                        <th>Within one year</th>
                                        <th>1-5 years</th>
                                        <th>5-10 years</th>
                                        <th>Over 10 years</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" class="form-control" min="4" step="any" name="pending_beginning" class="form-control" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="liquidation_ordered" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="revived_during_month"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="wounded_up_during_month" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="pending_end"  required  readonly></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="within_one_year" required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="one_to_five_years"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="five_to_ten_years"  required></td>
                                        <td><input type="number" class="form-control" min="0" step="any" name="over_ten_years"  required></td>
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
    // Function to calculate pending_end based on the given formula and set it as expectedSum
    function calculatePendingEndAndSetExpectedSum() {
        // Get input values
        const pendingBeginning = parseFloat(document.querySelector('input[name="pending_beginning"]').value) || 0;
        const liquidationOrdered = parseFloat(document.querySelector('input[name="liquidation_ordered"]').value) || 0;
        const revivedDuringMonth = parseFloat(document.querySelector('input[name="revived_during_month"]').value) || 0;
        const woundedUpDuringMonth = parseFloat(document.querySelector('input[name="wounded_up_during_month"]').value) || 0;
        const withinOneYear = parseFloat(document.querySelector('input[name="within_one_year"]').value) || 0;
        const oneToFiveYears = parseFloat(document.querySelector('input[name="one_to_five_years"]').value) || 0;
        const fiveToTenYears = parseFloat(document.querySelector('input[name="five_to_ten_years"]').value) || 0;
        const overTenYears = parseFloat(document.querySelector('input[name="over_ten_years"]').value) || 0;

        // Check if any of the required fields are empty
        if (
            pendingBeginning === 0 ||
            liquidationOrdered === 0 ||
            revivedDuringMonth === 0 ||
            woundedUpDuringMonth === 0 ||
            withinOneYear === 0 ||
            oneToFiveYears === 0 ||
            fiveToTenYears === 0 ||
            overTenYears === 0
        ) {
            // Fields are not filled out, don't calculate or display an alert
            return;
        }

        // Calculate pending_end based on the given formula
        const calculatedPendingEnd = pendingBeginning + liquidationOrdered - (revivedDuringMonth + woundedUpDuringMonth);

        // Calculate the expected sum
        const expectedSum = withinOneYear + oneToFiveYears + fiveToTenYears + overTenYears;

        // Set the expectedSum as the value for pending_end
        const pendingEndInput = document.querySelector('input[name="pending_end"]');
        pendingEndInput.value = expectedSum;

        // Check if calculatedPendingEnd and expectedSum are equal and display an alert if not
        if (calculatedPendingEnd !== expectedSum) {
            alert("The value of 'pending_end' must be equal to the sum of (within_one_year + one_to_five_years + five_to_ten_years + over_ten_years).");
        }
    }

    // Attach the calculation function to input change events for all relevant fields
    const inputFields = document.querySelectorAll('input[name="pending_beginning"], input[name="liquidation_ordered"], input[name="revived_during_month"], input[name="wounded_up_during_month"], input[name="within_one_year"], input[name="one_to_five_years"], input[name="five_to_ten_years"], input[name="over_ten_years"]');
    inputFields.forEach((input) => {
        input.addEventListener('input', calculatePendingEndAndSetExpectedSum);
    });
</script>


@endsection<!-- End #main -->
