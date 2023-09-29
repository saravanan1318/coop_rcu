@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Sale Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Sale</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                      <div class="row margindiv">


                     </div>
                    <div class="col-md-12" style="margin-top: 10px">
{{--                        <table class="table table-responsive table-bordered" style="text-align: center">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" rowspan="2" >Date</th>--}}
{{--                                    <th scope="col" rowspan="2">Categories</th>--}}
{{--                                    <th scope="col" rowspan="2">No of varieties</th>--}}
{{--                                    <th scope="col" rowspan="2">No of Outlets</th>--}}
{{--                                    <th scope="col" rowspan="2">No of Customers</th>--}}
{{--                                    <th scope="col" rowspan="2">No of farmers</th>--}}
{{--                                    <th scope="col" colspan="2">Quantity</th>--}}
{{--                                    <th scope="col" colspan="2">Sales amount</th>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Kilo</th>--}}
{{--                                    <th scope="col">Litres</th>--}}
{{--                                    <th scope="col">Physical</th>--}}
{{--                                    <th scope="col">Coop Bazaar</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach($sales as $sale)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $sale->saledate }}</td>--}}
{{--                                    <td>{{ $sale->saletype->sale_name }}</td>--}}
{{--                                    <td>{{ $sale->noofvarieties }}</td>--}}
{{--                                    <td>{{ $sale->noofoutlets }}</td>--}}
{{--                                    <td>{{ $sale->noofcustomers }}</td>--}}
{{--                                    <td>{{ $sale->nooffarmers }}</td>--}}
{{--                                    <td>{{ $sale->quantitykilo }}</td>--}}
{{--                                    <td>{{ $sale->quantitylitres }}</td>--}}
{{--                                    <td>{{ $sale->salesamountphysical }}</td>--}}
{{--                                    <td>{{ $sale->salesamountcoopbazaar }}</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <div class="d-flex">--}}
{{--                            {!! $sales->links() !!}--}}
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
                                <th colspan="9">
                                    <center>Deposit Report - ({{$showCase}})</center>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" rowspan="2">Categories</th>
                                <th scope="col" rowspan="2">No of varieties</th>
                                <th scope="col" rowspan="2">No of Outlets</th>
                                <th scope="col" rowspan="2">No of Customers</th>
                                <th scope="col" rowspan="2">No of farmers</th>
                                <th scope="col" colspan="2">Quantity</th>
                                <th scope="col" colspan="2">Sales amount</th>
                            </tr>
                            <tr>
                                <th scope="col">Kilo</th>
                                <th scope="col">Litres</th>
                                <th scope="col">Physical</th>
                                <th scope="col">Coop Bazaar</th>
                            </tr>

                            </thead>
                            <tbody >
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->Region_Name}}</td>
                                    <td>{{$result->varieties}}</td>
                                    <td>{{$result->outlets}}</td>
                                    <td>{{$result->customers??"-"}}</td>
                                    <td>{{$result->farmers??"-"}}</td>
                                    <td>{{$result->quantitykilo??"-"}}</td>
                                    <td>{{$result->quantitylitres??"-"}}</td>
                                    <td>{{$result->salesamountphysical??"-"}}</td>
                                    <td>{{$result->salesamountcoopbazaar??"-"}}</td>
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
