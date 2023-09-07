@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/list">Dashboard</a></li>
        <li class="breadcrumb-item">DR </li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">OB Data</h5>
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

                    {{-- Table --}}
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered datatable">
                            <thead style="text-align: center">
                                <tr>
                                    <th scope="col">OB</th>
                                    <th scope="col">Ordered this month</th>
                                    <th scope="col">Total (OB+Ordered)</th>
                                    <th scope="col">Completed this month</th>
                                    <th scope="col">Pending within 3 months</th>
                                    <th scope="col">Pending in 3 - 6 months</th>
                                    <th scope="col">Pending Above 6 months</th>
                                    <th scope="col">Total Pending</th>
                                    <th scope="col">Pending percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dr as $data)
                                    <tr>
                                        <td>{{ $data->ob }}</td>
                                        <td>{{ $data->ordered_this_month }}</td>
                                        <td>{{ $data->total_ob_ordered }}</td>
                                        <td>{{ $data->completed_this_month }}</td>
                                        <td>{{ $data->pending_within_3_months }}</td>
                                        <td>{{ $data->pending_in_3_to_6_months }}</td>
                                        <td>{{ $data->pending_above_6_months }}</td>
                                        <td>{{ $data->total_pending }}</td>
                                        <td>{{ $data->pending_percentage }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                      <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered datatable">
                            <thead style="text-align: center">
                                <tr>
                                    <th scope="col">OB</th>
                                    <th scope="col">Initiated during the month</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Disposed this month</th>
                                    <th scope="col">Pending</th>
                                    <th scope="col">Pending percentage </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dr as $data)
                                    <tr>
                                        <td>{{ $data->ob }}</td>
                                        <td>{{ $data->initiated_during_month }}</td>
                                        <td>{{ $data->total }}</td>
                                        <td>{{ $data->disposed_this_month }}</td>
                                        <td>{{ $data->pending }}</td>
                                        <td>{{ $data->pending_percentage }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                <table class="table table-responsive table-bordered datatable">
                <thead style="text-align: center">
                    <tr>
                        <th scope="col">Recommended</th>
                        <th scope="col">Action taken</th>
                        <th scope="col">Disposal</th>
                        <th scope="col">Percentage of Disposal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dr as $data)
                        <tr>
                            <td>{{ $data->recommended_action }}</td>
                            <td>{{ $data->action_taken }}</td>
                            <td>{{ $data->disposal }}</td>
                            <td>{{ $data->percentage_of_disposal }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
             </div>
             <div class="col-md-12" style="margin-top: 10px">
             <table class="table table-responsive table-bordered datatable">
             <thead style="text-align: center">
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
                @foreach($dr as $data)
                    <tr>
                        <td>{{ $data->surcharge_order_issued_number }}</td>
                        <td>{{ $data->surcharge_issued_amount }}</td>
                        <td>{{ $data->numbers_collected_during_month }}</td>
                        <td>{{ $data->collected_amount }}</td>
                        <td>{{ $data->balance_numbers }}</td>
                        <td>{{ $data->balance_amount }}</td>
                        <td>{{ $data->percentage_of_collection }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
             </div>
             <div class="col-md-12" style="margin-top: 10px">
            <table class="table table-responsive table-bordered datatable">
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
                </tr>
            </thead>
            <tbody>
                @foreach($dr as $row)
                <tr>
                    <td>{{ $row->disqualification_36 }}</td>
                    <td>{{ $row->ob_36 }}</td>
                    <td>{{ $row->initiated_during_month_36 }}</td>
                    <td>{{ $row->total_36 }}</td>
                    <td>{{ $row->disposed_this_month_36 }}</td>
                    <td>{{ $row->pending_end_of_month_36 }}</td>
                    <td>{{ $row->pending_percentage_36 }}</td>
                    <td>{{ $row->societies_36 }}</td>
                    <td>{{ $row->board_of_directors_36 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
