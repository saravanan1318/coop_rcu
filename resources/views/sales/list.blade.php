@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sale</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Sale</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sale List</h5>
                        <div class="row">
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
                        <h5 class="card-title"></h5>
                        <div class="col-md-12 table-responsive">
                            <form method="GET" action="{{ URL::current() }}">
                                <h3>Filters:</h3>
                                <div class="row filterpaddings">
                                    @if(isset($regions))
                                        <div class="col-3">
                                            <label for="region">Region:</label>
                                            <select name="region" id="region" class="form-control">
                                                <option value="">All</option>
                                                @foreach($regions as $region)
                                                    <option
                                                        value="{{ $region->id }}" {{$regionFilter == $region->id? "selected":""}}>{{ $region->region_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($circles))
                                        <div class="col-3">
                                            <label for="circle">Circle:</label>
                                            <select name="circle" id="circle" class="form-control">
                                                <option value="">Please select circle</option>
                                                @foreach($circles as $circle)
                                                    @if($circle->region_id == $regionFilter || count($circles)==1)
                                                        <option
                                                            value="{{ $circle->id }}" {{$circleFilter == $circle->id? "selected":""}}>{{ $circle->circle_name }}</option>
                                                    @endif
                                                    @if(!isset($regions) && count($circles)>0)
                                                        <option
                                                            value="{{ $circle->id }}" {{$circleFilter == $circle->id? "selected":""}}>{{ $circle->circle_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(isset($societiestypes))
                                        <div class="col-3 ">
                                            <label for="society">Society Types:</label>
                                            <select name="societyTypes" id="societyTypes" class="form-control">
                                                <option value="">Please select Society Types</option>
                                                @foreach($societiestypes as $societytype)
                                                    {{--                                                        @if($societytype->id == $societyTypesFilter)--}}
                                                    <option
                                                        value="{{ $societytype->id }}" {{$societyTypesFilter == $societytype->id ? "selected" : "" }}>{{ $societytype->societytype }}</option>
                                                    {{--                                                        @endif--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if(isset($societies))
                                        <div class="col-3 ">
                                            <label for="society">Society:</label>
                                            <select name="society" id="society" class="form-control">
                                                <option value="">Please select Society</option>
                                                @foreach($societies as $society)
                                                    @if($society->circle_id == $circleFilter)
                                                        <option
                                                            value="{{ $society->id }}" {{$societyFilter == $society->id ? "selected" : "" }}>{{ $society->society_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                <div class="row filterpaddings">
                                    @if(isset($loantypes))
                                        <div class="col-3 ">
                                            <label for="society">Loan type:</label>
                                            <select name="loantype" id="loantype" class="form-control">
                                                <option value="">Please select Loan Type</option>
                                                @foreach($loantypes as $loantype)
                                                    {{--                                                            @if($loantype->id == $loantypeFilter)--}}
                                                    <option
                                                        value="{{ $loantype->id }}" {{$loantypeFilter == $loantype->id ? "selected" : "" }}>{{ $loantype->loantype }}</option>
                                                    {{--                                                            @endif--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-3">
                                        <label for="startDate">Start Date:</label>
                                        <input type="date" class="form-control" id="startDate" name="startDate"
                                               value={{isset($startDate)?$startDate:""}} >
                                    </div>
                                    <div class="col-3">
                                        <label for="endDate">End Date:</label>
                                        <input type="date" class="form-control" id="endDate" name="endDate"
                                               value={{isset($endDate)?$endDate:""}} >
                                    </div>
                                    <div class="col-3 mt-3" `>
                                        <button type="submit" class="btn btn-primary m-1">Apply Filters</button>
                                        <a href="{{ URL::current() }}" type="submit" class=" m-1 btn btn-primary">Clear</a>
                                    </div>
                                </div>


                            </form>
{{--                            <table class="table table-responsive table-bordered datatable" style="text-align: center">--}}
                                <table class="stripe table-bordered table-info " id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2">Date</th>
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
                                <tbody>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->saledate }}</td>
                                        <td>{{ $sale->saletype->sale_name?? "" }}</td>
                                        <td>{{ $sale->noofvarieties }}</td>
                                        <td>{{ $sale->noofoutlets }}</td>
                                        <td>{{ $sale->noofcustomers }}</td>
                                        <td>{{ $sale->nooffarmers }}</td>
                                        <td>{{ $sale->quantitykilo }}</td>
                                        <td>{{ $sale->quantitylitres }}</td>
                                        <td>{{ $sale->salesamountphysical }}</td>
                                        <td>{{ $sale->salesamountcoopbazaar }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
{{--                            <div class="d-flex">--}}
{{--                                {!! $sales->links() !!}--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection
