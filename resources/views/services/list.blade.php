@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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
                        <h5 class="card-title">Services</h5>
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
                            <table class="stripe table-bordered table-info " id="data-table">
{{--                            <table class="table table-responsive table-bordered datatable" style="text-align: center">--}}
                                <thead>
                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" rowspan="2">Date</th>
                                        <th scope="col" rowspan="2">Categories</th>
                                        <th scope="col" rowspan="2">Count</th>
                                        <th scope="col" rowspan="2">No of Centers</th>
                                        <th scope="col" rowspan="2">No of varieties</th>
                                        <th scope="col" rowspan="2">No of Customers</th>
                                        <th scope="col" rowspan="2">No of Farmers</th>
                                        <th scope="col" colspan="2">Quantity</th>
                                        <th scope="col" rowspan="2">Purchase</th>
                                        <th scope="col" colspan="2">Sales</th>
                                        <th scope="col" rowspan="2">Income Generated (Rs)</th>
                                        <th scope="col" rowspan="2">Profit (Rs)</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" colspan="7"></th>
                                        <th scope="col">Kilo</th>
                                        <th scope="col">Litres</th>
                                        <th scope="col">E-Trading</th>
                                        <th scope="col">Physical</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $service)
                                <tr>
                                  <th scope="row">{{ $service->id }}</th>
                                  <td>{{ \Carbon\Carbon::parse($service->servicedate)->format('d-m-Y') }}</td>
                                  <td>{{ $service->services_id}}</td>
                                  <td style="text-align: right;">{{ $service->count }}</td>
                                  <td style="text-align: right;">{{ $service->noofcenters }}</td>
                                  <td style="text-align: right;">{{ $service->noofvarieties }}</td>
                                  <td style="text-align: right;">{{ $service->noofcustomers }}</td>
                                  <td style="text-align: right;">{{ $service->nooffarmers }}</td>
                                  <td style="text-align: right;">{{ $service->quantitykilo }}</td>
                                  <td style="text-align: right;">{{ $service->quantitylitres }}</td>
                                  <td style="text-align: right;">{{ $service->purchase }}</td>
                                  <td style="text-align: right;">{{ $service->servicesamountetrading }}</td>
                                  <td style="text-align: right;">{{ $service->servicesamountphysical }}</td>
                                  <td style="text-align: right;">{{ $service->incomegenerated }}</td>
                                  <td style="text-align: right;">{{ $service->profit }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection
