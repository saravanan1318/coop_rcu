@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>RD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Deposit</li>
                <li class="breadcrumb-item">RD</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Deposit Recieved </h5>
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
                        <form action="{{url('/society/deposit/rd/store')}}" method="post" id="rdadd" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="recieveddate" placeholder="date" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="recievedothersno" placeholder="Your Others No." required>
                                            <label for="floatingName">Number.</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter your Number.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="recievedothersamount" placeholder="Your Others Amount." required>
                                            <label for="floatingName">Amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter your Amount.</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            
                        </form><!-- End floating Labels Form -->

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Deposit Closed</h5>
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
                        <form action="{{url('/society/deposit/rd/store')}}" method="post" id="rdadd" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="closeddate" placeholder="date" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="closedothersno" placeholder="Your Others No." required>
                                            <label for="floatingName">Number</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter your Number.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="closedothersamount" placeholder="Your Others Amount." required>
                                            <label for="floatingName">Amount.</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter your Amount.</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="rdsubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection