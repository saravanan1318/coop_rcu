@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>CM CELL Petitions</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/cm/list">Dashboard</a></li>
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
                        <th scope="col">Cm Cell Petition No</th>
                        <th scope="col">Petitioner Name</th>
                        <th scope="col">Petition Subject </th>
                        <th scope="col">Recevied Date</th>
                        <th scope="col">Fwd to Section Name </th>
                        <th scope="col">Reply Sent date</th>
{{--                        <th scope="col">Edited (New Section Name)</th>--}}
{{--                        <th scope="col">Edited dated</th>--}}
{{--                        <th scope="col">Closure</th>--}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($off as $data)
                    <tr>
                        <td>{{ $data->cm_cell_petition_no }}</td>
                        <td>{{ $data->petitioner_name }}</td>
                        <td>{{ $data->subject }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->received_date)->format('d-m-Y') }}</td>
                        <td>{{ $data->fwd_section_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->reply_sent_date)->format('d-m-Y') }}</td>
{{--                        <td>{{ $data->edited_section_name }}</td>--}}
{{--                        <td>{{ \Carbon\Carbon::parse($data->edited_date)->format('d-m-Y') }}</td>--}}
{{--                        <td>{{ $data->closure }}</td>--}}
                        <td><a class="btn btn-warning" href="edit/{{$data->id}}">Edit</a></td>
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
