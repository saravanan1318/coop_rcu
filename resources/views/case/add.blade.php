@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Office Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/case/add">Dashboard</a></li>
        <li class="breadcrumb-item">Court Case</li>
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

                <form action="{{url("/office/case/store")}}" method="post" id="cmform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-12" style="margin-top: 20px padding:50px ">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100px;">
                                    <thead>
                                        <h6>Court Cases</h6>
                                        <tr>
                                            <th scope="col">Madras High Court / Type of Case</t>
                                            <th>Case Number</th>
                                            <th>Number of years</th>
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
                                        <tr>
                                            <td><input type="text" name="type_of_case" class="form-control" required></td>
                                            <td><input type="text" name="case_no" class="form-control" required></td>
                                            <td><input type="text" name="year" class="form-control" required></td>
                                            <td><input type="text" name="petitioner" class="form-control" required></td>
                                            <td><input type="text" name="respondents" class="form-control" required></td>
                                            <td><input type="text" name="subject_of_case" class="form-control" required></td>
                                            <td><input type="text" name="prayer" class="form-control" required></td>
                                            <td><input type="text" name="counter_filed" class="form-control" required></td>
                                            <td><input type="date" name="counter_filed_date" class="form-control" required></td>
                                            <td><input type="text" name="no_reason" class="form-control" required></td>
                                            <td><input type="text" name="interim_stay" class="form-control" required></td>
                                            <td><input type="text" name="order_details" class="form-control" required></td>
                                            <td><input type="text" name="final_judgement" class="form-control" required></td>
                                            <td><input type="text" name="direction_to_comply" class="form-control" required></td>
                                            <td><input type="text" name="complied" class="form-control" required></td>
                                            <td><input type="text" name="writ_appeal" class="form-control" required></td>
                                            <td><input type="text" name="writ_appeal_details" class="form-control" required></td>
                                            <td><input type="text" name="writ_appeal_stay" class="form-control" required></td>
                                            <td><input type="text" name="writ_appeal_stage" class="form-control" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@endsection<!-- End #main -->
