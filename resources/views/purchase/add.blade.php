@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Purchase</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Purchase</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Purchase Add</h5>
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
                        <form action="{{url('/society/purchase/store')}}" method="post" id="purchasesadd" class="row g-3">
                            @csrf
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="row margindiv">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="floatingName" name="purchasedate" value="{{ old('purchasedate') }}" placeholder="purchasedate" required>
                                            <label for="floatingName">Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <select class="form-control" id="purchase_id" name="purchase_id" value="{{ old('purchase_id') }}">
                                                  @foreach($mtr_purchases as $purchases)
                                                    <option value="{{ $purchases->id }}">{{ $purchases->purchase_name }}</option>
                                                  @endforeach
                                                </select>
                                                  <label for="floatingName">Purchase Type</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>Govt. Institutions</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="govtnoofvarieties" name="govtnoofvarieties" value="{{ old('govtnoofvarieties') }}" placeholder="Your No of Varieties." required>
                                            <label for="floatingName">No of Varieties</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Varieties.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="govtquantity" name="govtquantity" value="{{ old('govtquantity') }}" placeholder="Your Quantity." required>
                                            <label for="floatingName">Quantity</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Quantity.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="govtvalues" name="govtvalues" value="{{ old('govtvalues') }}" placeholder="Your Value (Rs.)." required>
                                            <label for="floatingName">Value (Rs.)</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Value (Rs.).</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>Coop Institutions</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="coopnoofvarieties" name="coopnoofvarieties" value="{{ old('coopnoofvarieties') }}" placeholder="Your No of Varieties." required>
                                            <label for="floatingName">No of Varieties</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Varieties.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="coopquantity" name="coopquantity" value="{{ old('coopquantity') }}" placeholder="Your Quantity." required>
                                            <label for="floatingName">Quantity</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Quantity.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="coopvalues" name="coopvalues" value="{{ old('coopvalues') }}" placeholder="Your Value (Rs.)." required>
                                            <label for="floatingName">Value (Rs.)</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Value (Rs.).</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>JPC Approved Traders</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="jpcnoofvarieties" name="jpcnoofvarieties" value="{{ old('jpcnoofvarieties') }}" placeholder="Your No of Varieties." required>
                                            <label for="floatingName">No of Varieties</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Varieties.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="jpcquantity" name="jpcquantity" value="{{ old('jpcquantity') }}" placeholder="Your Quantity." required>
                                            <label for="floatingName">Quantity</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Quantity.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="jpcvalues" name="jpcvalues" value="{{ old('jpcvalues') }}" placeholder="Your Value (Rs.)." required>
                                            <label for="floatingName">Value (Rs.)</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Value (Rs.).</div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <h6>Private Traders</h6>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="privatenoofvarieties" name="privatenoofvarieties" value="{{ old('privatenoofvarieties') }}" placeholder="Your No of Varieties." required>
                                            <label for="floatingName">No of Varieties</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter No of Varieties.</div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="privatequantity" name="privatequantity" value="{{ old('privatequantity') }}" placeholder="Your Quantity." required>
                                            <label for="floatingName">Quantity</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Quantity.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="privatevalues" name="privatevalues" value="{{ old('privatevalues') }}" placeholder="Your Value (Rs.)." required>
                                            <label for="floatingName">Value (Rs.)</label>
                                        </div>
                                        <div class="invalid-feedback">Please enter Value (Rs.).</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="purchasesubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection