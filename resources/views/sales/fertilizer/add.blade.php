@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Fertilizer</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">sales</li>
        <li class="breadcrumb-item">Fertilizer</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Fertilizer Add</h5>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 mb-4">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-12 mb-4">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                  <!-- Floating Labels Form -->
                  <form action="{{url('/society/sales/fertilizer/store')}}" method="post" id="Fertilizeradd" class="row g-3">
                    @csrf
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="date" class="form-control" id="floatingName" name="Fertilizerdate" placeholder="date" required>
                                  <label for="floatingName">Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName" name="scstno" placeholder="Your SC / ST No." required>
                                  <label for="floatingName">Quantity</label>
                                </div>
                                <div class="invalid-feedback">Quantity</div>
                            </div>
                        </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName"  name="scstamount" placeholder="Your SC / ST Amount." required>
                                  <label for="floatingName">Value (Rs.).</label>
                                </div>
                                <div class="invalid-feedback">Value (Rs.)</div>
                            </div>
                        </div>
                       </div>
                    <div class="col-md-3">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="Fertilizersubmit">Submit</button>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
