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
                @if(isset($society))
                <div class="col-md-6">
                  <select id="region" name="region" class="form-select" required>
                    <option value="{{$society->region_id}}">{{$society->region_name}}</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <select id="circle" name="circle" class="form-select" required>
                    <option value="{{$society->circle_id}}">{{$society->circle_name}}</option>
                    @foreach($circles as $circle)
                    <option value="{{$circle->id}}">{{$circle->circle_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <select id="societytype" name="societytype" class="form-select" required>
                    <option value="{{$society->societytype_id}}">{{$society->societytype}}</option>
                    @foreach($societytypes as $societytype)
                    <option value="{{$societytype->id}}">{{$societytype->societytype}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="society" value="{{$society->society_name}}" placeholder="Society Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="regno" value="{{$society->registration_no}}" placeholder="Registration No" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="staff_name" value="{{$society->staff_name}}" placeholder="Staff Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="designation" value="{{$society->designation}}" placeholder="Designation" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="mobile_no" value="{{$society->mobile_no}}" placeholder="Mobile No" required>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="address" placeholder="Address" rows="3">{{$society->address}}</textarea>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="pincode" value="{{$society->pincode}}" placeholder="PIN Code" required style="margin-bottom:10px;">
                  <input type="email" class="form-control" name="email" value="{{$society->email}}" placeholder="Email ID" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="col-md-6">
                  <select id="region" name="region" class="form-select" required>
                    <option value="">Select Region</option>
                    @foreach($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <select id="circle" name="circle" class="form-select" required>
                    <option value="">Select Circle</option>
                    @foreach($circles as $circle)
                    <option value="{{$circle->id}}">{{$circle->circle_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <select id="societytype" name="societytype" class="form-select" required>
                    <option value="">Select Society Type</option>
                    @foreach($societytypes as $societytype)
                    <option value="{{$societytype->id}}">{{$societytype->societytype}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="society" placeholder="Society Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="regno" placeholder="Registration No" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="staff_name" placeholder="Staff Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="designation" placeholder="Designation" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="mobile_no" placeholder="Mobile No" required>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" name="address" placeholder="Address" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="pincode" placeholder="PIN Code" required style="margin-bottom:10px;">
                  <input type="email" class="form-control" name="email" placeholder="Email ID" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
                @endif
              </form><!-- End No Labels Form -->

            </div>
          </div>


</main><!-- End #main -->
@endsection
