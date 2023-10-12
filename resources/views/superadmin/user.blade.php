@extends('layouts.master')
@section('content')
<main id="main" class="main">
<div class="d-flex justify-content-between">
  <div class="pagetitle">
    <h1>{{$title}}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">{{$title}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div>
    @if(isset($jrusers))
    <p style="align:right;"><a href="jrusers/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
    @elseif(isset($drusers))
    <p style="align:right;"><a href="drusers/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
    @elseif(isset($societyusers))
    <p style="align:right;"><a href="societyusers/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
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
                @if(isset($jrusers))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Region Name</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($jrusers as $user)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->region_name}}</td>
                            <td><a href="jrusers/edit/{{$user->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if(isset($drusers))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Region Name</th>
                        <th>Circle Name</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($drusers as $user)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->region_name}}</td>
                            <td>{{$user->circle_name}}</td>
                            <td><a href="drusers/edit/{{$user->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @if(isset($societyusers))
                <table id="data-table-dashboard">
                    <thead>
                    <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Region Name</th>
                        <th>Circle Name</th>
                        <th>Society Name</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody id="logged-datas">

                        <?php $tmp=0 ?>
                        @foreach($societyusers as $user)
                            @php
                            $tmp++;
                            @endphp
                        <tr>
                            <td>{{$tmp}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->region_name}}</td>
                            <td>{{$user->circle_name}}</td>
                            <td>{{$user->society_name}}</td>
                            <td><a href="societyusers/edit/{{$user->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
