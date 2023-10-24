@extends('layouts.master')
@section('content')
<main id="main" class="main">
  
    <div class="d-flex justify-content-between">
        <div class="pagetitle" class="col-sm-6">
            <h1>{{$title}}</h1>
            <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/superadmin/blockmaster">Block Panchayat</a></li>
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
                @if(isset($block))
                <div class="col-md-6">
                  <input type="text" class="form-control" name="block" value="{{$block->blockPanchayatName}}" placeholder="Block Panchayat Name" required>
                </div>
                <div class="col-md-6">
                  <select id="region" name="district" class="form-select" required>
                    <option value="{{$block->districtID}}">{{$block->districtName}}</option>
                    @foreach($districts as $item)
                    <option value="{{$item->districtID}}">{{$item->districtName}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="col-md-6">
                  <input type="text" class="form-control" name="block" placeholder="Block Panchayat Name" required>
                </div>
                <div class="col-md-6">
                  <select id="region" name="district" class="form-select" required>
                    <option value="">Select District</option>
                    @foreach($districts as $item)
                    <option value="{{$item->districtID}}">{{$item->districtName}}</option>
                    @endforeach
                  </select>
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
