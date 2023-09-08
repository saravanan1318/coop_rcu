@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/surcharge/add">Dashboard</a></li>
        <li class="breadcrumb-item">87-Surcharge</li>
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

                <form action="{{url("/jr/surcharge/store")}}" method="post" id="surchargeform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="surchargedate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-bordered">
                                <thead>
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
                                    <tr>
                                        <td><input type="text" name="surcharge_order_issued_number" class="form-control" required></td>
                                        <td><input type="text" name="surcharge_issued_amount" class="form-control" required></td>
                                        <td><input type="text" name="numbers_collected_during_month" class="form-control" required></td>
                                        <td><input type="text" name="collected_amount" class="form-control" required></td>
                                        <td><input type="text" name="balance_numbers" class="form-control" required></td>
                                        <td><input type="text" name="balance_amount" class="form-control" required></td>
                                        <td><input type="text" name="percentage_of_collection" class="form-control" required></td>
                                    </tr>
                                </tbody>
                            </table>

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
    const orderIssuedNumberInput = document.querySelector('input[name="surcharge_order_issued_number"]');
    const issuedAmountInput = document.querySelector('input[name="surcharge_issued_amount"]');
    const collectedNumberInput = document.querySelector('input[name="numbers_collected_during_month"]');
    const collectedAmountInput = document.querySelector('input[name="collected_amount"]');
    const balanceNumbersInput = document.querySelector('input[name="balance_numbers"]');
    const balanceAmountInput = document.querySelector('input[name="balance_amount"]');
    const percentageInput = document.querySelector('input[name="percentage_of_collection"]');

    // Attach event listeners to the relevant input fields
    orderIssuedNumberInput.addEventListener('input', calculatePercentage);
    issuedAmountInput.addEventListener('input', calculatePercentage);
    collectedNumberInput.addEventListener('input', calculatePercentage);
    collectedAmountInput.addEventListener('input', calculatePercentage);
    balanceNumbersInput.addEventListener('input', calculatePercentage);
    balanceAmountInput.addEventListener('input', calculatePercentage);

    // Function to calculate the percentage
    function calculatePercentage() {
        const orderIssuedNumber = parseFloat(orderIssuedNumberInput.value) || 0;
        const issuedAmount = parseFloat(issuedAmountInput.value) || 0;
        const collectedNumber = parseFloat(collectedNumberInput.value) || 0;
        const collectedAmount = parseFloat(collectedAmountInput.value) || 0;
        const balanceNumbers = parseFloat(balanceNumbersInput.value) || 0;
        const balanceAmount = parseFloat(balanceAmountInput.value) || 0;

        // Calculate the percentage
        const percentage = (collectedNumber / orderIssuedNumber) * 100;

        // Set the calculated percentage to the input field
        percentageInput.value = percentage.toFixed(2);
    }

    // Initialize the calculation
    calculatePercentage();
</script><!-- End #main -->
@endsection
