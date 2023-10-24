@extends('layouts.master')
@section('content')
<main id="main" class="main">
  
    <div class="d-flex justify-content-between">
        <div class="pagetitle" class="col-sm-6">
            <h1>{{$title}}</h1>
            <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/superadmin/loanmaster">Loan Master</a></li>
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
                @if(isset($loan))
                <div class="col-md-12">
                  <input type="text" class="form-control" name="loan" value="{{$loan->loantype}}" placeholder="Loan Name" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="col-md-12">
                  <input type="text" class="form-control" name="loan" placeholder="Loan Name" required>
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
