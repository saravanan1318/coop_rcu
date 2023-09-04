@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Target & outstanding</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Deposit</li>
        <li class="breadcrumb-item">Target & outstanding</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  {{--  <h5 class="card-title">Target & outstanding Add</h5>  --}}
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
                  <form action="{{url('/society/deposit/annual/store')}}" method="post" id="annualadd" class="row g-3">
                    @csrf
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="row margindiv">
                          <div class="col-md-12">
                              <div class="form-floating">
                              <select class="form-control" id="floatingName" name="deposit_id" value="{{ old('loan_id') }}">
                                @foreach($mtr_deposits as $deposit)
                                  <option value="{{ $deposit->id }}">{{ $deposit->deposit_name }}</option>
                                @endforeach
                              </select>
                                <label for="floatingName">Deposit Type</label>
                              </div>
                          </div>
                      </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName" name="current_year" value="{{date("Y-04-01")}}" placeholder="date" readonly required>
                                  <label for="floatingName">Current year</label>
                                </div>
                            </div>
                        </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName" name="overall_outstanding" placeholder="Your overall outstanding." required>
                                  <label for="floatingName">Overall outstanding.</label>
                                </div>
                                <div class="invalid-feedback">Please enter your Overall outstanding.</div>
                            </div>
                        </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName"  name="current_outstanding" placeholder="Your Current outstanding." required>
                                  <label for="floatingName">Your Current outstanding.</label>
                                </div>
                                <div class="invalid-feedback">Please enter your Current outstanding.</div>
                            </div>
                        </div>
                        <div class="row margindiv">
                            <div class="col-md-12">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingName" name="annual_target" placeholder="Your Annual target." required>
                                  <label for="floatingName">Annual target.</label>
                                </div>
                                <div class="invalid-feedback">Please enter your Annual target.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="annualsubmit">Submit</button>
                    </div>
                  </form><!-- End floating Labels Form -->

                </div>
              </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection
