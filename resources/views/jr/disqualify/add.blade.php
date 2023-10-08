@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/disqualify/add">Dashboard</a></li>
        <li class="breadcrumb-item">36-Disqualification</li>
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

                <form action="{{url("/jr/disqualify/store")}}" method="post" id="disqualifyform" class="row g-3">
                    @csrf

                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="disqualifydate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">OB</th>
                                        <th colspan="2">Initiated during the month</th>
                                        <th colspan="2">Total</th>
                                        <th colspan="2">Disposed this month</th>
                                        <th colspan="2">Pending at the end of the month</th>
                                        <th colspan="2">Pending Percentage</th>

                                    </tr>
                                    <tr>
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
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_ob" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_ob" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_im" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_im" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_total" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_total" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_dam" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_dam" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_pam" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_pam" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="societies_pp" class="form-control" required></td>
                                        <td><input type="text"  onkeypress="return isNumberKey(event)"  name="board_of_directors_pp" class="form-control" required></td>
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
    // Get the input fields for societies
    const societiesObInput = document.querySelector('input[name="societies_ob"]');
    const societiesImInput = document.querySelector('input[name="societies_im"]');
    const societiesTotalInput = document.querySelector('input[name="societies_total"]');
    const societiesDamInput = document.querySelector('input[name="societies_dam"]');
    const societiesPamInput = document.querySelector('input[name="societies_pam"]');
    const societiesPpInput = document.querySelector('input[name="societies_pp"]');

    // Get the input fields for board of directors
    const boardOfDirectorsObInput = document.querySelector('input[name="board_of_directors_ob"]');
    const boardOfDirectorsImInput = document.querySelector('input[name="board_of_directors_im"]');
    const boardOfDirectorsTotalInput = document.querySelector('input[name="board_of_directors_total"]');
    const boardOfDirectorsDamInput = document.querySelector('input[name="board_of_directors_dam"]');
    const boardOfDirectorsPamInput = document.querySelector('input[name="board_of_directors_pam"]');
    const boardOfDirectorsPpInput = document.querySelector('input[name="board_of_directors_pp"]');

    // Attach event listeners to the relevant input fields for societies
    societiesObInput.addEventListener('input', calculateSocietiesPercentage);
    societiesImInput.addEventListener('input', calculateSocietiesPercentage);
    societiesDamInput.addEventListener('input', calculateSocietiesPercentage);
    societiesPamInput.addEventListener('input', calculateSocietiesPercentage);

    // Attach event listeners to the relevant input fields for board of directors
    boardOfDirectorsObInput.addEventListener('input', calculateBoardOfDirectorsPercentage);
    boardOfDirectorsImInput.addEventListener('input', calculateBoardOfDirectorsPercentage);
    boardOfDirectorsDamInput.addEventListener('input', calculateBoardOfDirectorsPercentage);
    boardOfDirectorsPamInput.addEventListener('input', calculateBoardOfDirectorsPercentage);

    // Function to calculate the pending percentage for societies
    function calculateSocietiesPercentage() {
        const obValue = parseFloat(societiesObInput.value) || 0;
        const imValue = parseFloat(societiesImInput.value) || 0;
        const damValue = parseFloat(societiesDamInput.value) || 0;
        const pamValue = parseFloat(societiesPamInput.value) || 0;

        const totalValue = obValue + imValue;
        const pendingValue = damValue + pamValue;

        // Calculate the pending percentage for societies
        const percentage = (pendingValue / totalValue) * 100;

        // Set the calculated percentage to the input field for societies
        societiesTotalInput.value = totalValue.toFixed();
        societiesPpInput.value = percentage.toFixed(2);
    }

    // Function to calculate the pending percentage for board of directors
    function calculateBoardOfDirectorsPercentage() {
        const obValue = parseFloat(boardOfDirectorsObInput.value) || 0;
        const imValue = parseFloat(boardOfDirectorsImInput.value) || 0;
        const damValue = parseFloat(boardOfDirectorsDamInput.value) || 0;
        const pamValue = parseFloat(boardOfDirectorsPamInput.value) || 0;

        const totalValue = obValue + imValue;
        const pendingValue = damValue + pamValue;

        // Calculate the pending percentage for board of directors
        const percentage = (pendingValue / totalValue) * 100;

        // Set the calculated percentage to the input field for board of directors
        boardOfDirectorsTotalInput.value = totalValue.toFixed();
        boardOfDirectorsPpInput.value = percentage.toFixed(2);
    }

    // Initialize the calculations
    calculateSocietiesPercentage();
    calculateBoardOfDirectorsPercentage();
</script>
<!-- End #main -->
@endsection
