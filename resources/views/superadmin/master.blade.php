@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Master</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Master</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="card info-card sales-card">
        <div class="card-body">
            <div class="col-12">
                @if(isset($regions))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Region</th>
                        <th>Region Code</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($regions as $region)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$region->region_name}}</td>
                            <td>{{$region->region_code}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if(isset($circles))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Region Name</th>
                        <th>Circle Name</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($circles as $circle)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$circle->region_name}}</td>
                            <td>{{$circle->circle_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if(isset($societies))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Region Name</th>
                        <th>Circle Name</th>
                        <th>Society Type</th>
                        <th>Society Name</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($societies as $society)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$society->region_name}}</td>
                            <td>{{$society->circle_name}}</td>
                            <td>{{$society->societytype}}</td>
                            <td>{{$society->society_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>


</main><!-- End #main -->
@endsection
