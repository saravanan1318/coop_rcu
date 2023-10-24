@extends('layouts.master')
@section('content')
<main id="main" class="main">
  
    <div class="d-flex justify-content-between">
        <div class="pagetitle" class="col-sm-6">
            <h1>{{$title}}</h1>
            <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/superadmin/societytypemaster">Society Type</a></li>
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
                @if(isset($societytype))
                <div class="col-md-6">
                  <input type="text" class="form-control" name="societytype" value="{{$societytype->societytype}}" placeholder="Society Type" required>
                </div>
                <div class="col-md-6">
                  <select id="region" name="role" class="form-select" required>
                    <option value="{{$societytype->role_id}}">{{$societytype->role_name}}</option>
                    @foreach($roles as $item)
                    <option value="{{$item->id}}">{{$item->role_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="code" value="{{$societytype->societycode}}" placeholder="Society Code" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="col-md-6">
                  <input type="text" class="form-control" name="societytype" placeholder="Society Type" required>
                </div>
                <div class="col-md-6">
                  <select id="region" name="role" class="form-select" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $item)
                    <option value="{{$item->id}}">{{$item->role_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="code" placeholder="Society Code" required>
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
