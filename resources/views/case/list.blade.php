@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>CM CELL Petitions</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/case/list">Dashboard</a></li>
        <li class="breadcrumb-item">CM CELL Petitions</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CM CELL Petitions</h5>
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
                <div class="col-md-12" style="margin-top: 10px">
                <table class="table table-responsive table-bordered datatable">
                <thead style="text-align: center">
                    <tr>
                        <th>Madras High Court / Type of Case</th>
                        <th>Case No</th>
                        <th>Year</th>
                        <th>Petitioner</th>
                        <th>Respondents</th>
                        <th>Subject of Case</th>
                        <th>Prayer</th>
                        <th>Counter filed</th>
                        <th>If Yes, Counter filed date</th>
                        <th>If No, Reason</th>
                        <th>Whether any Interim Stay given</th>
                        <th>If Yes, Order details</th>
                        <th>Final Judgement</th>
                        <th>If direction is issued, whom to comply with time limit</th>
                        <th>Whether complied</th>
                        <th>If any Writ Appeal</th>
                        <th>If yes, filed by whom and Writ Appeal No.</th>
                        <th>Whether stay obtained to Writ Petition</th>
                        <th>Writ appeal stage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($off as $data)
                    <tr>
                        <td>{{ $data->type_of_case }}</td>
                        <td>{{ $data->case_no }}</td>
                        <td>{{ $data->year }}</td>
                        <td>{{ $data->petitioner }}</td>
                        <td>{{ $data->respondents }}</td>
                        <td>{{ $data->subject_of_case }}</td>
                        <td>{{ $data->prayer }}</td>
                        <td>{{ $data->counter_filed }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->counter_filed_date)->format('d-m-Y') }}</td>
                        <td>{{ $data->no_reason }}</td>
                        <td>{{ $data->interim_stay }}</td>
                        <td>{{ $data->order_details }}</td>
                        <td>{{ $data->final_judgement }}</td>
                        <td>{{ $data->direction_to_comply }}</td>
                        <td>{{ $data->complied }}</td>
                        <td>{{ $data->writ_appeal }}</td>
                        <td>{{ $data->writ_appeal_details }}</td>
                        <td>{{ $data->writ_appeal_stay }}</td>
                        <td>{{ $data->writ_appeal_stage }}</td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
             </div>
        </div>
        </div>
    </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
