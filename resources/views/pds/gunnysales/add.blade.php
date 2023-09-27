@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Gunny Sales Add Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Gunny Sales</li>
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
                  <form action="{{url('/drpds/gunny-sales/store')}}" method="post" id="gunnysalesform" class="row g-3">
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
                                    <th scope="col" rowspan="2">Initial Balance</th>
                                    <th scope="col" rowspan="2">Current Month Income</th>
                                    <th scope="col" rowspan="2">Total</th>
                                    <th scope="col" colspan="4">Current Month Sold</th>
                                    <th scope="col" rowspan="2">Final Balance</th>
                                </tr>
                                <tr>
                                  <th scope="col" >TNSCS</th>
                                  <th scope="col" >MSTC (eTender)</th>
                                  <th scope="col" >NCDFI (eMarket)</th>
                                  <th scope="col" >Total</th>
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
                                            <input  type="number" min="0" step="any" class="form-control" id="initial_balance"  name="initial_balance" value="{{ old('initial_balance') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="curr_month_income"  name="curr_month_income" value="{{ old('curr_month_income') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="total"  name="total" value="{{ old('total') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="cms_tncsc"  name="cms_tncsc" value="{{ old('cms_tncsc') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="cms_mstc"  name="cms_mstc" value="{{ old('cms_mstc') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="cms_ncdfi"  name="cms_ncdfi" value="{{ old('cms_ncdfi') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="cms_total"  name="cms_total" value="{{ old('cms_total') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="final_balance"  name="final_balance" value="{{ old('final_balance') }}" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="gunnysalessubmit">Submit</button>
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
