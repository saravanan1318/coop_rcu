@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>UPI FPS Add Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">UPI FPS</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    </div>
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
                  {{-- <h5 class="card-title">Issue of Loan and Collection</h5> --}}
                  <form action="{{url('/drpds/upi-fps/store')}}" method="post" id="upifpsform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="fin_date" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-responsive table-bordered datatable">
                                <thead style="text-align: center">
                                <tr>
{{--                                    <th scope="col" rowspan="2">Region</th>--}}
                                    <th scope="col" colspan="3">FPS</th>
                                    <th scope="col" colspan="3">UPI</th>
                                </tr>
                                <tr>
                                  <th scope="col" >Full Time</th>
                                  <th scope="col" >Part Time</th>
                                  <th scope="col" >Total</th>
                                  <th scope="col" >Introduced</th>
                                  <th scope="col" >To be Introduced</th>
                                  <th scope="col" >Introduced %</th>
                              </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr data-id="1" id="row1">

{{--                                        <td>--}}
{{--                                            <select class="form-control" id="region" name="region" required>--}}
{{--                                                <option value="">--SELECT--</option>--}}
{{--                                                @foreach($mtr_regions as $region)--}}
{{--                                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </td>--}}
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="fps_fulltime"  name="fps_fulltime" value="{{ old('fps_fulltime') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="fps_parttime"  name="fps_parttime" value="{{ old('fps_parttime') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="fps_total"  name="fps_total" value="{{ old('fps_total') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="upi_introduced"  name="upi_introduced" value="{{ old('upi_introduced') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="upi_tobe_introduced"  name="upi_tobe_introduced" value="{{ old('upi_tobe_introduced') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="upi_introduced_per"  name="upi_introduced_per" value="{{ old('upi_introduced_per') }}" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="upifpssubmit">Submit</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>

  </section>

</main><!-- End #main -->
@endsection
