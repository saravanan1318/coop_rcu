@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Details of Disciplinary Action-Institution</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/dai/add">Dashboard</a></li>
        <li class="breadcrumb-item">Disciplinary Action-Institution</li>
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

                <form action="{{url("/jr/dai/store")}}" method="post" id="daiform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="daidate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">

                            <table class="table table-bordered">
                                <thead>
                                    <h6>Disciplinary Action-Institution</h6>
                                    <tr>
                                        <th>OB</th>
                                        <th>Initiated during the month</th>
                                        <th>Total</th>
                                        <th>Disposed this month</th>
                                        <th>Pending</th>
                                        <th>Percentage of Pending</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="ob" id="ob" class="form-control" required value="{{$jr->pending??""}}" {{!empty($jr->pending)?"readonly":""}}></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="Initiated_during_the_month" id="Initiated_during_the_month" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="total" id="total" class="form-control" required readonly></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="disposed_this_month" id="disposed_this_month" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="pending" id="pending" class="form-control" required readonly></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="percentage_of_disposal" id="percentage_of_disposal" class="form-control" required readonly></td>
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
    document.getElementById('Initiated_during_the_month').addEventListener('input', calculateTotal);
    document.getElementById('disposed_this_month').addEventListener('input', calculatePercentage);
    function calculatePercentage() {
      const actionTaken = parseFloat(document.getElementById('total').value) || 0;
      const disposal = parseFloat(document.getElementById('disposed_this_month').value) || 0;
      const pending=actionTaken-disposal;
        document.getElementById('pending').value = isNaN(pending) ? '' : pending;
      const percentage = 100 - (disposal / actionTaken) * 100;
      document.getElementById('percentage_of_disposal').value = isNaN(percentage) ? '' : percentage.toFixed(2);
    }
    function calculateTotal()
    {
const OB= parseFloat(document.getElementById('ob').value) || 0;
const initial= parseFloat(document.getElementById('Initiated_during_the_month').value) || 0;
var total=OB+initial;
        document.getElementById('total').value = isNaN(total) ? '' : total.toFixed(2);
    }

  </script>
  @endsection<!-- End #main -->
