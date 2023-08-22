@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Crop Loan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop Loan</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Crop Loan Add</h5>
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
                        <form action="{{url('/society/croploan/entry/store')}}" method="post" id="croploanentryadd" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="croploandate" value="{{ date("Y-m-d") }}" placeholder="croploandate" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                        <div class="invalid-feedback">Please select Date.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="applicationsreceived" value="{{ old('applicationsreceived') }}" placeholder="Your Applications Received" required>
                                          <label for="floatingName">Application Received</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Application Received.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="applicationssanctioned" value="{{ old('applicationssanctioned') }}" placeholder="Your Applications Sanctioned." required>
                                            <label for="floatingName">Application Sanctioned.</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter  Application Sanctioned.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="applicationspending" value="{{ old('applicationspending') }}" placeholder="Your Application Pending." required>
                                            <label for="floatingName">Application Pending.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter  Application Pending.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="totalcultivatedarea" value="{{ old('totalcultivatedarea') }}" placeholder="Your Total cutivated area." required>
                                            <label for="floatingName">Total cutivated area.</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Total cutivated area.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="loanissuedarea" value="{{ old('loanissuedarea') }}" placeholder="Your Loan issued area." required>
                                            <label for="floatingName">Loan issued area.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Loan issued area.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="outstandingno" value="{{ old('outstandingno') }}" placeholder="Your Outstanding number." required>
                                            <label for="floatingName">Outstanding number.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Outstanding number.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="outstandingamount" value="{{ old('outstandingamount') }}" placeholder="Your Outstanding amount." required>
                                            <label for="floatingName">Outstanding amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Outstanding amount.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="overdueno" value="{{ old('overdueno') }}" placeholder="Your Overdue number." required>
                                            <label for="floatingName">Overdue number.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Overdue number.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="overdueamount" value="{{ old('overdueamount') }}" placeholder="Your Overdue amount." required>
                                            <label for="floatingName">Overdue amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter Overdue amount.</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="croploanentrysubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection