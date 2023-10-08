@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

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
