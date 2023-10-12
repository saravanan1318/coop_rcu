@extends('layouts.master')
@section('content')
<main id="main" class="main">
  
    <div class="d-flex justify-content-between">
        <div class="pagetitle" class="col-sm-6">
            <h1>{{$title}}</h1>
            <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/superadmin/societymaster">Society Master</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
            </nav>
        
        </div><!-- End Page Title -->
        <!-- <div>
            <p style="align:right;"><a class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
        </div> -->
    </div>
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$title}}</h5>

              <!-- No Labels Form -->
              <form class="row g-3" method="post">
                @csrf
                @if(isset($jruser))
                <div class="col-md-6">
                  <input type="text" class="form-control" name="username" value="{{$jruser->username}}" placeholder="User Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" value="{{$jruser->name}}" placeholder="Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="col-md-6">
                  <select id="region" name="region" class="form-select" required>
                    <option value="{{$jruser->region_id}}">{{$jruser->region_name}}</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="col-md-6">
                  <input type="text" class="form-control" name="username" placeholder="User Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="password" placeholder="Password" required>
                </div>

                <div class="col-md-6">
                  <select id="region" name="region" class="form-select" required>
                    <option value="">Select Region</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @endif
              </form><!-- End No Labels Form -->

            </div>
          </div>


</main><!-- End #main -->
@endsection
