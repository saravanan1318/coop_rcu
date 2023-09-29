@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Godown Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Godown</li>
        <li class="breadcrumb-item activegit ">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">

            <div class="col-md-12" style="margin-top: 10px">
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
                        <th colspan="6">
                            <center>Godown Report - ({{$showCase}})</center>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" >Region</th>
                        <th scope="col" >Count</th>
                        <th scope="col" >Capacity</th>
                        <th scope="col" >Utilized</th>
                        <th scope="col" >Utilized (%)</th>
                        <th scope="col" >Income</th>
                    </tr>

                    </thead>
                    <tbody >
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->Region_Name}}</td>
                            <td>{{$result->count}}</td>
                            <td>{{$result->capacity}}</td>
                            <td>{{$result->utilized??"-"}}</td>
                            <td>{{$result->Percentage??"-"}}</td>
                            <td>{{$result->income??"-"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
