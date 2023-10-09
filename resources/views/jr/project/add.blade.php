@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/project/add">Dashboard</a></li>
        <li class="breadcrumb-item">Project Monitoring</li>
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

                <form action="{{url("/jr/project/store")}}" method="post" id="projectform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="projectdate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <div class="col-md-12 table-responsive form-container">
                                <div class="col-md-12" style="margin-top: 10px">
                                    <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th colspan="2" scope="col">Of column No.4</th>
                                        <th colspan="7" scope="col">Stage of work (Civil) (Out of Col.5)</th>
                                        <th colspan="4" scope="col">Machineries / Others (Out of Col.6)</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Total No. of Society</th>
                                        <th scope="col">Total No. of Work / Supply orders</th>
                                        <th scope="col">Civil works</th>
                                        <th scope="col">Machineries/Others</th>
                                        <th scope="col">Yet to be started</th>
                                        <th scope="col">Foundation / Basement</th>
                                        <th scope="col">Lintel Level</th>
                                        <th scope="col">Roofing Level</th>
                                        <th scope="col">Electrical, Plastering and Painting</th>
                                        <th scope="col">Work Completed</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">No. of Machineries / Others Purchased</th>
                                        <th scope="col">No. of Machineries / Others Put into use</th>
                                        <th scope="col">So far income generated (Amount in Lakhs)</th>
                                        <th scope="col">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="total_no_of_society" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="total_no_of_work_supply_orders" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="column_no4_civil" id="action_taken" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="column_no4_machineries" id="disposal" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="yet_to_be_started" id="percentage_of_disposal" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="foundation_basement" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="lintel_level" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="roofing_level" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="electrical_plastering_painting" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="work_completed" class="form-control" required></td>
                                        <td><input type="text" name="remarks_civil" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="machineries_purchased" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="machineries_put_into_use" class="form-control" required></td>
                                        <td><input type="number" min="0" step="any" onkeyup="return isNumberKey(event)" name="income_generated" class="form-control" required></td>
                                        <td><input type="text" name="remarks_machineries" class="form-control" required></td>
                                    </tr>
                                </tbody>
                               </table>
                                </div>
                            </div>
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
@endsection
