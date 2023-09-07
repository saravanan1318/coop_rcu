@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/seventeena/add">Dashboard</a></li>
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

                  {{-- Your DR Details Form Goes Here --}}
                  <form action="{{url("/dr/seventeena/store")}}" method="post" id="seventeenaform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <!-- Your other form fields go here -->
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
                                        <td><input type="text" name="disciplinary_ob_seventeena" class="form-control" required></td>
                                        <td><input type="text" name="initiated_during_month_seventeena" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_total_seventeena" class="form-control" required></td>
                                        <td><input type="text" name="disposed_this_month_seventeena" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_pending_seventeena" class="form-control" required></td>
                                        <td><input type="text" name="disciplinary_pending_percentage_seventeena" class="form-control" required></td>
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
                                            <td><input type="text" name="disciplinary_ob_seventeenb" class="form-control" required></td>
                                            <td><input type="text" name="initiated_during_month_seventeenb" class="form-control" required></td>
                                            <td><input type="text" name="disciplinary_total_seventeenb" class="form-control" readonly></td>
                                            <td><input type="text" name="disposed_this_month_seventeenb" class="form-control" required></td>
                                            <td><input type="text" name="disciplinary_pending_seventeenb" class="form-control" readonly></td>
                                            <td><input type="text" name="disciplinary_pending_percentage_seventeenb" class="form-control" readonly></td>
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
    const obInput = document.querySelector('input[name="disciplinary_ob_seventeenb"]');
    const initiateInput = document.querySelector('input[name="initiated_during_month_seventeenb"]');
    const totalInput = document.querySelector('input[name="disciplinary_total_seventeenb"]');
    const disposedInput = document.querySelector('input[name="disposed_this_month_seventeenb"]');
    const pendingInput = document.querySelector('input[name="disciplinary_pending_seventeenb"]');
    const percentageInput = document.querySelector('input[name="disciplinary_pending_percentage_seventeenb"]');

    // Attach event listeners to the relevant input fields
    obInput.addEventListener('input', updateTotalAndPending);
    initiateInput.addEventListener('input', updateTotalAndPending);
    disposedInput.addEventListener('input', updatePending);

    // Function to update total and pending fields
    function updateTotalAndPending() {
      const obValue = parseFloat(obInput.value) || 0;
      const initiateValue = parseFloat(initiateInput.value) || 0;
      const totalValue = obValue + initiateValue;
      totalInput.value = totalValue.toFixed(2);
      updatePending();
    }

    // Function to update pending and percentage fields
    function updatePending() {
      const totalValue = parseFloat(totalInput.value) || 0;
      const disposedValue = parseFloat(disposedInput.value) || 0;
      const pendingValue = totalValue - disposedValue;
      pendingInput.value = pendingValue.toFixed(2);

      // Calculate the pending percentage
      const percentage = (pendingValue / totalValue) * 100;
      percentageInput.value = percentage.toFixed(2) + '%';
    }

    // Initial calculation
    updateTotalAndPending();
  </script><!-- End #main -->
@endsection

