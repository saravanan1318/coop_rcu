@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sale</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Services Add</h5>
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
                        <form action="{{url('/society/services/store')}}" method="post" id="servicesadd" class="row g-3">
                            @csrf
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="row margindiv">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="servicesdate" value="{{ old('saledate') }}" placeholder="saledate" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                            <select class="form-control" id="services_id" name="services_id" value="{{ old('services_id') }}" required>
                                                  <option value="">SELECT</option>
                                                  @foreach($mtr_services as $services)
                                                    <option value="{{ $services->id }}">{{ $services->services_name }}</option>
                                                  @endforeach
                                                </select>
                                                  <label for="floatingName">Services Type</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="count" name="count" value="{{ old('count') }}" placeholder="Count" required>
                                            <label for="floatingName">Count</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Count</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="noofcenters" name="noofcenters" value="{{ old('noofcenters') }}" placeholder="Your No of Outlets." required>
                                            <label for="floatingName">No of Centers</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of centers.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="noofvarieties" name="noofvarieties" value="{{ old('noofvarieties') }}" placeholder="Your No of Varieties." required>
                                            <label for="floatingName">No of Varieties</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Varieties.</div>
                                    </div>
                                    <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="noofcustomers" name="noofcustomers" value="{{ old('noofcustomers') }}" placeholder="Your No of Customers" required>
                                            <label for="floatingName">No of Customers</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Customers</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="nooffarmers" name="nooffarmers" value="{{ old('nooffarmers') }}" placeholder="Your No of farmers" required>
                                            <label for="floatingName">No of farmers</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of farmers</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="quantitykilo" name="quantitykilo" value="{{ old('quantitykilo') }}" placeholder="Your Quantity in Kilo." required>
                                            <label for="floatingName">Your Quantity in Kilo</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Your Quantity in Kilo.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="quantitylitres" name="quantitylitres" value="{{ old('quantitylitres') }}" placeholder="Your Quantity in Litres." required>
                                            <label for="floatingName">Your Quantity in Litres</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Your Quantity in Litres</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>Sales amount</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="salesamountetrading" name="salesamountetrading" value="{{ old('servicesamountetrading') }}" placeholder="Your E-Trading." required>
                                            <label for="floatingName">E-trading</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Coop Bazaar.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="salesamountphysical" name="salesamountphysical" value="{{ old('salesamountphysical') }}" placeholder="Your Physical." required>
                                            <label for="floatingName">Physical</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Physical</div>
                                    </div>

                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="purchase" name="purchase" value="{{ old('purchase') }}" placeholder="Purchase." required>
                                            <label for="floatingName">Purchase</label>
                                        </div>
                                        <div class="invalid-feedback">Purchase.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="income" name="income" value="{{ old('income') }}" placeholder="Income." required>
                                            <label for="floatingName">Income Generated</label>
                                        </div>
                                        <div class="invalid-feedback">Income Generated.</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="profit" name="profit" value="{{ old('profit') }}" placeholder="Profit" required>
                                            <label for="floatingName">Profit</label>
                                        </div>
                                        <div class="invalid-feedback">Profit</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="salesubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
