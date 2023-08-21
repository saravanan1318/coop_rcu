@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Current Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Deposit</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Deposit Add</h5>
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
                        <form action="{{url('/society/deposit/store')}}" method="post" id="depositsadd" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="depositdate" value="{{ old('depositdate') }}" placeholder="depositdate" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                        <select class="form-control" id="floatingName" name="deposit_id" value="{{ old('deposit_id') }}">
                                          @foreach($mtr_deposits as $deposits)
                                            <option value="{{ $deposits->id }}">{{ $deposits->deposit_name }}</option>
                                          @endforeach
                                        </select>
                                          <label for="floatingName">Deposit Type</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="recievedno" value="{{ old('recievedno') }}" placeholder="Your Received No." required>
                                            <label for="floatingName">Received No.</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Received No.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="recievedamount" value="{{ old('recievedamount') }}" placeholder="Your Received Amount." required>
                                            <label for="floatingName">Received Amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Received Amount.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="closedno" value="{{ old('closedno') }}" placeholder="Your Closed No." required>
                                            <label for="floatingName">Closed No.</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Closed No.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="closedamount" value="{{ old('closedamount') }}" placeholder="Your Closed Amount." required>
                                            <label for="floatingName">Closed Amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Closed Amount.</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="depositsubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection