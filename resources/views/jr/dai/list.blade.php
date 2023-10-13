@extends('layouts.master')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Details of Disciplinary Action-Institution</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/dai/list">Dashboard</a></li>
        <li class="breadcrumb-item">Disciplinary Action-Institution</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Disciplinary Action-Institution</h5>
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
                        <th scope="col">Date</th>
                        <th scope="col">OB</th>
                        <th scope="col">Initiated during the month</th>
                        <th scope="col">Total</th>
                        <th scope="col">Disposed this month</th>
                        <th scope="col">Pending</th>
                        <th scope="col">Percentage of Pending</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $data=$jr;
                @endphp
{{--                    @foreach($jr as $data)--}}
                @if(!empty($data))
                        <tr>
                            <td>{{!empty($data->daidate)? \Carbon\Carbon::parse($data->daidate)->format('d-m-Y'):"" }}</td>
                            <td style="text-align: right;">{{ $data->ob }}</td>
                            <td style="text-align: right;">{{ $data->Initiated_during_the_month }}</td>
                            <td style="text-align: right;">{{ $data->total }}</td>
                            <td style="text-align: right;">{{ $data->disposed_this_month }}</td>
                            <td style="text-align: right;">{{ $data->pending }}</td>
                            <td style="text-align: right;">{{ $data->percentage_of_disposal }}</td>
                        </tr>
                @endif
{{--                    @endforeach--}}
                </tbody>
              </table>
             </div>
        </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
