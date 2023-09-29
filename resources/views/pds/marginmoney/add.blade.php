@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Margin Money Add Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Margin Money</li>
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
                  <form action="{{url('/drpds/margin-money/store')}}" method="post" id="marginmoneyform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="fin_date" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                       {{--   <div class="col-md-4">
                              <input type="hidden" id="endDate">
                              <input type="hidden" id="startDate">
                          </div>--}}
                        <div class="col-md-12" style="margin-top: 10px">
{{--                            <table class="table table-responsive table-bordered datatable">--}}
                            <table class="table table-bordered">
                                <thead style="text-align: center">
                                <tr>
{{--                                  <th scope="col" >Region</th>--}}
                                  <th scope="col" >Price Difference Due Amount</th>
                                  <th scope="col" >Marginal for Supplier Free of Cost</th>
                                  <th scope="col" >Marginal for PMGKAY scheme</th>
                                  <th scope="col" >Margin Amount Due for Cashew</th>
                                  <th scope="col" >Marginal for PMGKAY scheme</th>
                                  <th scope="col" >Difference to be paid</th>
                                  <th scope="col" >Additional</th>
                                  <th scope="col" >Consumer Goods synchronized date</th>
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
                                            <input  type="number" min="0" step="any" class="form-control" id="price_diff_due_amount"  name="price_diff_due_amount" value="{{ old('price_diff_due_amount') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="margin_supp_free_cost"  name="margin_supp_free_cost" value="{{ old('margin_supp_free_cost') }}"  required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="margin_pmgkay_scheme_a"  name="margin_pmgkay_scheme_a" value="{{ old('margin_pmgkay_scheme_a') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="margin_amt_due_cashew"  name="margin_amt_due_cashew" value="{{ old('margin_amt_due_cashew') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="margin_pmgkay_scheme_b"  name="margin_pmgkay_scheme_b" value="{{ old('margin_pmgkay_scheme_b') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="diff_to_be_paid"  name="diff_to_be_paid" value="{{ old('diff_to_be_paid') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" class="form-control" id="additional"  name="additional" value="{{ old('additional') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="consumer_goods_sync_date"  name="consumer_goods_sync_date" value="{{ old('consumer_goods_sync_date') }}" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="marginmoneysubmit">Submit</button>
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
