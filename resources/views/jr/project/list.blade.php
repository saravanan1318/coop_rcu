@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/project/list">Dashboard</a></li>
        <li class="breadcrumb-item">Project Monitering</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Project List</h5>
            <div class="row">
              <div class="col-sm-4 col-md-4 mb-4">
                <!-- Add button can be placed here -->
              </div>
            </div>

            {{-- Success Message --}}
            <div class="row">
              <div class="col-sm-12 col-md-12 mb-4">
                @if(session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
              </div>
            </div>
        <div class="col-md-12 table-responsive ">
            <div class="col-md-12" style="margin-top: 10px">
                <table class="stripe table-bordered table-info " id="data-table">
                <thead style="text-align: center">
                  <tr>
                    <th></th>
                    <th></th>
                    <th colspan="2">Of column No.4</th>
                    <th colspan="7">Stage of work (Civil) (Out of Col.5)</th>
                    <th colspan="4">Machineries / Others (Out of Col.6)</th>
                  </tr>
                  <tr>
                    <th>Total No. of Society</th>
                    <th>Total No. of Work / Supply orders</th>
                    <th>Civil</th>
                    <th>Machineries/Others</th>
                    <th>Yet to be started</th>
                    <th>Foundation / Basement</th>
                    <th>Lintel Level</th>
                    <th>Roofing Level</th>
                    <th>Electrical, Plastering and Painting</th>
                    <th>Work Completed</th>
                    <th>Remarks</th>
                    <th>No. of Machineries / Others Purchased</th>
                    <th>No. of Machineries / Others Put into use</th>
                    <th>So far income generated (Amount in Lakhs)</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jr as $data)
                    <tr>
                      <td>{{ $data->total_no_of_society }}</td>
                      <td>{{ $data->total_no_of_work_supply_orders }}</td>
                      <td>{{ $data->column_no4_civil }}</td>
                      <td>{{ $data->column_no4_machineries }}</td>
                      <td>{{ $data->yet_to_be_started }}</td>
                      <td>{{ $data->foundation_basement }}</td>
                      <td>{{ $data->lintel_level }}</td>
                      <td>{{ $data->roofing_level }}</td>
                      <td>{{ $data->electrical_plastering_painting }}</td>
                      <td>{{ $data->work_completed }}</td>
                      <td>{{ $data->remarks_civil }}</td>
                      <td>{{ $data->machineries_purchased }}</td>
                      <td>{{ $data->machineries_put_into_use }}</td>
                      <td>{{ $data->income_generated }}</td>
                      <td>{{ $data->remarks_machineries }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
