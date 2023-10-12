@extends('layouts.master')
@section('content')
<main id="main" class="main">
  
    <div class="d-flex justify-content-between">
        <div class="pagetitle" class="col-sm-6">
            <h1>{{$title}}</h1>
            <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Master</li>
            </ol>
            </nav>
        
        </div><!-- End Page Title -->
        <div>
            @if(isset($regions))
            <p style="align:right;"><a href="regionmaster/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
            @elseif(isset($circles))
            <p style="align:right;"><a href="circlemaster/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
            @elseif(isset($societies))
            <p style="align:right;"><a href="societymaster/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
            @endif
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
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
                        <th>Edit</th>
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
                            <td><a href="regionmaster/edit/{{$region->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
                        <th>Edit</th>
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
                            <td><a href="circlemaster/edit/{{$circle->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
                        <th>Edit</th>
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
                            <td><a href="societymaster/edit/{{$society->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
