@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/seventeena/add">Dashboard</a></li>
        <li class="breadcrumb-item">Disciplinary Action-17(A) & 17(B)</li></li>
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

                  {{-- Your jr Details Form Goes Here --}}
                  <form action="{{url("/jr/seventeena/store")}}" method="post" id="seventeenaform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="seventeenadate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <h6>Disciplinary Action-17(A)</h6>
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
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_ob_seventeena" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="initiated_during_month_seventeena" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_total_seventeena" class="form-control" readonly></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disposed_this_month_seventeena" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_pending_seventeena" class="form-control" readonly></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_pending_percentage_seventeena" class="form-control" readonly></td>
                                    </tr>
                                </tbody>
                            </table>

                           <div class="col-md-12" style="margin-top: 10px">
                                <table class="table table-bordered">
                                    <thead>
                                        <h6>Disciplinary Action-17(B)</h6>
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
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_ob_seventeenb" class="form-control" required></td>
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="initiated_during_month_seventeenb" class="form-control" required></td>
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_total_seventeenb" class="form-control" readonly></td>
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disposed_this_month_seventeenb" class="form-control" required></td>
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_pending_seventeenb" class="form-control" readonly></td>
                                            <td><input type="text"  onkeypress="return isNumberKey(event)"  name="disciplinary_pending_percentage_seventeenb" class="form-control" readonly></td>
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
    // Get the input fields for 17(A)
    const obSeventeenaInput = document.querySelector('input[name="disciplinary_ob_seventeena"]');
    const initiateSeventeenaInput = document.querySelector('input[name="initiated_during_month_seventeena"]');
    const totalSeventeenaInput = document.querySelector('input[name="disciplinary_total_seventeena"]');
    const disposedSeventeenaInput = document.querySelector('input[name="disposed_this_month_seventeena"]');
    const pendingSeventeenaInput = document.querySelector('input[name="disciplinary_pending_seventeena"]');
    const percentageSeventeenaInput = document.querySelector('input[name="disciplinary_pending_percentage_seventeena"]');

    // Get the input fields for 17(B)
    const obSeventeenbInput = document.querySelector('input[name="disciplinary_ob_seventeenb"]');
    const initiateSeventeenbInput = document.querySelector('input[name="initiated_during_month_seventeenb"]');
    const totalSeventeenbInput = document.querySelector('input[name="disciplinary_total_seventeenb"]');
    const disposedSeventeenbInput = document.querySelector('input[name="disposed_this_month_seventeenb"]');
    const pendingSeventeenbInput = document.querySelector('input[name="disciplinary_pending_seventeenb"]');
    const percentageSeventeenbInput = document.querySelector('input[name="disciplinary_pending_percentage_seventeenb"]');

    // Attach event listeners to the relevant input fields for 17(A)
    obSeventeenaInput.addEventListener('input', updateTotalAndPendingSeventeena);
    initiateSeventeenaInput.addEventListener('input', updateTotalAndPendingSeventeena);
    disposedSeventeenaInput.addEventListener('input', updatePendingSeventeena);

    // Attach event listeners to the relevant input fields for 17(B)
    obSeventeenbInput.addEventListener('input', updateTotalAndPendingSeventeenb);
    initiateSeventeenbInput.addEventListener('input', updateTotalAndPendingSeventeenb);
    disposedSeventeenbInput.addEventListener('input', updatePendingSeventeenb);

    // Function to update total and pending fields for 17(A)
    function updateTotalAndPendingSeventeena() {
      const obValue = parseFloat(obSeventeenaInput.value) || 0;
      const initiateValue = parseFloat(initiateSeventeenaInput.value) || 0;
      const totalValue = obValue + initiateValue;
      totalSeventeenaInput.value = totalValue.toFixed();
      updatePendingSeventeena();
    }

    // Function to update pending and percentage fields for 17(A)
    function updatePendingSeventeena() {
      const totalValue = parseFloat(totalSeventeenaInput.value) || 0;
      const disposedValue = parseFloat(disposedSeventeenaInput.value) || 0;
      const pendingValue = totalValue - disposedValue;
      pendingSeventeenaInput.value = pendingValue.toFixed();

      // Calculate the pending percentage for 17(A)
      const percentage = (pendingValue / totalValue) * 100;
      percentageSeventeenaInput.value = percentage.toFixed(2);
    }

    // Function to update total and pending fields for 17(B)
    function updateTotalAndPendingSeventeenb() {
      const obValue = parseFloat(obSeventeenbInput.value) || 0;
      const initiateValue = parseFloat(initiateSeventeenbInput.value) || 0;
      const totalValue = obValue + initiateValue;
      totalSeventeenbInput.value = totalValue.toFixed();
      updatePendingSeventeenb();
    }

    // Function to update pending and percentage fields for 17(B)
    function updatePendingSeventeenb() {
      const totalValue = parseFloat(totalSeventeenbInput.value) || 0;
      const disposedValue = parseFloat(disposedSeventeenbInput.value) || 0;
      const pendingValue = totalValue - disposedValue;
      pendingSeventeenbInput.value = pendingValue.toFixed();

      // Calculate the pending percentage for 17(B)
      const percentage = (pendingValue / totalValue) * 100;
      percentageSeventeenbInput.value = percentage.toFixed(2);
    }

    // Initialize the calculations
    updateTotalAndPendingSeventeena();
    updateTotalAndPendingSeventeenb();
</script>
<!-- End #main -->
@endsection

