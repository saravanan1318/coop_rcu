@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Office Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/cm/add">Dashboard</a></li>
        <li class="breadcrumb-item">CM CELL Petitions</li>
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

                <form action="{{url("/office/cm/store")}}" method="post" id="cmform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-12" style="margin-top: 20px padding:50px">
                            <div class="table-responsive">
                            <table class="table  table-bordered" style=" ">
                                <thead>
                                    <h6>CM CELL Petitions</h6>
                                    <tr>
                                        <th>Cm Cell Petition No</th>
                                        <th>Petitioner Name</th>
                                        <th>Petition related to </th>
                                        <th>Recevied Date</th>
                                        <th>Fwd to Section Name </th>
                                        <th>Reply Sent date</th>
                                        <th>Edited (New Section Name)</th>
                                        <th>Edited dated</th>
                                        <th>Closure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td ><input type="text" min="0" step="any" onkeypress="return isNumberKey(event)" name="cm_cell_petition_no" class="form-control" required></td>
                                        <td><input type="text" name="petitioner_name" class="form-control" required></td>
                                        <td>
                                            <select class="form-control js-example-basic-multiple" data-rowid="1" name="petition_related_to" class="form-control" style=" width: 150px; "  required>
                                                <option value="">--SELECT--</option>
                                                @foreach($peti as $s)
                                                <option value="{{ $s->id }}">{{ $s->subject }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="date" name="received_date" class="form-control" required></td>
                                        <td>
                                            <select class="form-control" data-rowid="1" name="fwd_to_section_name" class="form-control" style=" width: 150px; " required>
                                                <option value="">--SELECT--</option>
                                                @foreach($section as $sec)
                                                <option value="{{ $sec->id }}">{{ $sec->section_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="date" name="reply_sent_date" class="form-control" required></td>
                                        <td>
                                            <select class="form-control" data-rowid="1" name="edited_new_section_name" class="form-control" style=" width: 150px; " required>
                                                <option value="">--SELECT--</option>
                                                @foreach($section as $sec)
                                                <option value="{{ $sec->id }}">{{ $sec->section_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="date" name="edited_date" class="form-control" required></td>
                                        <td><input type="text" name="closure" class="form-control" required></td>
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
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

@endsection<!-- End #main -->
