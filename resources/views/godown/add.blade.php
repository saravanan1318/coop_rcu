@extends('layouts.master')
@section('content')
<style>
    input[readonly] {
        background-color: white;
    }
</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Godown</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Godown</li>
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
                        <form action="{{url('/society/godown/store')}}" method="post" id="godownadd" class="row g-3">
                            @csrf
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="godowndate" placeholder="date" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="count" placeholder="Your Others No." required>
                                            <label for="floatingName">Count</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter your count.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="capacityInput" name="capacity" placeholder="Your Capacity (in metric Ton)." required>
                                            <label for="capacityInput">Capacity (in metric Ton)</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter capacity.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="utilizedInput" name="utilized" placeholder="Your Utilized Amount." required>
                                            <label for="utilizedInput">Utilized</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter utilized.</div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="utilizedPercentageInput" name="percentageutilized" placeholder="Utilised (in Percentage)" readonly>
                                            <label for="utilizedPercentageInput">Utilised (in Percentage)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="income" placeholder="Your Others Amount." required>
                                            <label for="floatingName">Income In Rental</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please enter income.</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="godownsubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->
<script>
    const capacityInput = document.getElementById("capacityInput");
    const utilizedInput = document.getElementById("utilizedInput");
    const utilizedPercentageInput = document.getElementById("utilizedPercentageInput");
    utilizedInput.addEventListener("input", updateUtilizedPercentage);
    capacityInput.addEventListener("input", updateUtilizedPercentage);
    function updateUtilizedPercentage() {
        const capacity = parseFloat(capacityInput.value);
        const utilized = parseFloat(utilizedInput.value);
        if (!isNaN(capacity) && !isNaN(utilized)) {
            const utilizationPercentage = (utilized / capacity) * 100;
            utilizedPercentageInput.value = utilizationPercentage.toFixed(2);
        } else {
            utilizedPercentageInput.value = "";
        }
    }
</script>
@endsection
