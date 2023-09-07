@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/seventeena/list">Dashboard</a></li>
        <li class="breadcrumb-item">Disciplinary Action-17(A) & 17(B) </li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Disciplinary Action-17(A) & 17(B)</h5>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-4">

                        </div>
                    </div>
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
                                <h6>Disciplinary Action-17(A)</h6>
                                <tr>
                                    <th scope="col">OB</th>
                                    <th scope="col">Initiated during the month</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Disposed this month</th>
                                    <th scope="col">Pending</th>
                                    <th scope="col">Pending percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dr as $data)
                                    <tr>
                                    <td>{{ $data->disciplinary_ob_seventeena }}</td>
                                    <td>{{ $data->initiated_during_month_seventeena }}</td>
                                    <td>{{ $data->disciplinary_total_seventeena}}</td>
                                    <td>{{ $data->disposed_this_month_seventeena }}</td>
                                    <td>{{ $data->disciplinary_pending_seventeena }}</td>
                                    <td>{{ $data->disciplinary_pending_percentage_seventeena }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>

                <div class="col-md-12" style="margin-top: 10px">
                    <table class="table table-responsive table-bordered datatable">
                        <thead style="text-align: center">
                            <h6>Disciplinary Action-17(B)</h6>
                            <tr>
                                <th scope="col">OB</th>
                                <th scope="col">Initiated during the month</th>
                                <th scope="col">Total</th>
                                <th scope="col">Disposed this month</th>
                                <th scope="col">Pending</th>
                                <th scope="col">Pending percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dr as $data)
                                <tr>
                                    <td>{{ $data->disciplinary_ob_seventeenb }}</td>
                                    <td>{{ $data->initiated_during_month_seventeenb }}</td>
                                    <td>{{ $data->disciplinary_total_seventeenb}}</td>
                                    <td>{{ $data->disposed_this_month_seventeenb }}</td>
                                    <td>{{ $data->disciplinary_pending_seventeenb }}</td>
                                    <td>{{ $data->disciplinary_pending_percentage_seventeenb }}</td>
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

