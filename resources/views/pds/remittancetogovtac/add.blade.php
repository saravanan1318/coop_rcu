@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Remittance To Govt Ac Add Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Remittance To Govt Ac</li>
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
                  <form action="{{url('/drpds/remittance-to-govt-ac/store')}}" method="post" id="remittancetogovtacform" class="row g-3">
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
{{--                                  <th scope="col" >Region</th>--}}
                                  <th scope="col" >Balance Amount</th>
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
                                            <input  type="number" min="0" step="any" class="form-control" id="balance_amt"  name="balance_amt" value="{{ old('balance_amt') }}"  required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="remittancetogovtacsubmit">Submit</button>
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
