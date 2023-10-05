@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report on Purchase</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Purchase Report</h5>

                    <div class="col-md-12" style="margin-top: 10px">
{{--                        <table class="table table-responsive table-bordered" style="text-align: center">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope="col">Purchase Name</th>--}}
{{--                                    <th scope="col">Purchase Date</th>--}}
{{--                                    <th scope="col" colspan="3" >Govt. Institutions</th>--}}
{{--                                    <th scope="col" colspan="3" >Coop Institutions</th>--}}
{{--                                    <th scope="col" colspan="3" >Private Traders</th>--}}
{{--                                    <th scope="col" colspan="3">JPC Approved Traders</th>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" colspan="3"></th>--}}
{{--                                    <th scope="col">No of Varieties</th>--}}
{{--                                    <th scope="col">Quantity</th>--}}
{{--                                    <th scope="col">Value (Rs.)</th>--}}
{{--                                    <th scope="col">No of Varieties</th>--}}
{{--                                    <th scope="col">Quantity</th>--}}
{{--                                    <th scope="col">Value (Rs.)</th>--}}
{{--                                    <th scope="col">No of Varieties</th>--}}
{{--                                    <th scope="col">Quantity</th>--}}
{{--                                    <th scope="col">Value (Rs.)</th>--}}
{{--                                    <th scope="col">No of Varieties</th>--}}
{{--                                    <th scope="col">Quantity</th>--}}
{{--                                    <th scope="col">Value (Rs.)</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach($purchases as $purchase)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{ $purchase->id }}</th>--}}
{{--                                    <td>{{ $purchase->purchasetype->purchase_name }}</td>--}}
{{--                                    <td>{{ $purchase->purchasedate }}</td>--}}
{{--                                    <td>{{ $purchase->govtnoofvarieties }}</td>--}}
{{--                                    <td>{{ $purchase->govtquantity }}</td>--}}
{{--                                    <td>{{ $purchase->govtvalues }}</td>--}}
{{--                                    <td>{{ $purchase->coopnoofvarieties }}</td>--}}
{{--                                    <td>{{ $purchase->coopquantity }}</td>--}}
{{--                                    <td>{{ $purchase->coopvalues }}</td>--}}
{{--                                    <td>{{ $purchase->privatenoofvarieties }}</td>--}}
{{--                                    <td>{{ $purchase->privatequantity }}</td>--}}
{{--                                    <td>{{ $purchase->privatevalues }}</td>--}}
{{--                                    <td>{{ $purchase->jpcnoofvarieties }}</td>--}}
{{--                                    <td>{{ $purchase->jpcquantity }}</td>--}}
{{--                                    <td>{{ $purchase->jpcvalues }}</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <div class="d-flex">--}}
{{--                            {!! $purchases->links() !!}--}}
{{--                        </div>--}}
                        <form method="GET" action="{{ URL::current() }}">
                            <h3>Filters:</h3>
                            <div class="row filterpaddings">
                                @if(isset($societiestypes))
                                    <div class="col-3 ">
                                        <label for="society">Types:</label>
                                        <select name="societyTypes" id="societyTypes" class="form-control">
                                            <option value="">All</option>
                                            {{$showCase="ALL"}}
                                            @foreach($societiestypes as $societytype)
                                                {{$societyTypesFilter == $societytype->role_id? $showCase=$societytype->societytype:""}}
                                                {{--                                                        @if($societytype->id == $societyTypesFilter)--}}
                                                <option
                                                    value="{{ $societytype->role_id }}" {{$societyTypesFilter == $societytype->role_id ? "selected" : "" }}>{{ $societytype->societytype }}</option>
                                                {{--                                                        @endif--}}
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-3 mt-3" `>
                                    <button type="submit" class="btn btn-primary m-1">Apply Filters</button>
                                    <a href="{{ URL::current() }}" type="submit"
                                       class=" m-1 btn btn-primary">Clear</a>
                                </div>
                            </div>


                        </form>
                        <table class="stripe table-bordered table-info " id="data-table">
                            <thead style="text-align: center">
                            <tr>
                                <th colspan="4">
                                    <center>Deposit Report - ({{$showCase}})</center>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Region Name</th>
                                <th scope="col">Govt_institution</th>
                                <th scope="col">Coop</th>
                                <th scope="col">jpc</th>
                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->Govt_institution}}</td>
                                    <td>{{$result->Coop}}</td>
                                    <td>{{$result->jpc??"-"}}</td>
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
