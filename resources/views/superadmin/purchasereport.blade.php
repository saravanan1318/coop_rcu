@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Purchase Report</h5>
                  <form action="{{url('/superadmin/purchasereport')}}" method="get" id="purchaseform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingName" name="purchasereportdate" placeholder="date" value="{{$purchasereportdate}}" required>
                              <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="purchasereportsubmit">Submit</button>
                          </div>
                      </div>
                  </form
                  </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered" style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Purchase Name</th>
                                    <th scope="col">Purchase Date</th>
                                    <th scope="col" colspan="3" >Govt. Institutions</th>
                                    <th scope="col" colspan="3" >Coop Institutions</th>
                                    <th scope="col" colspan="3" >Private Traders</th>
                                    <th scope="col" colspan="3">JPC Approved Traders</th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="3"></th>
                                    <th scope="col">No of Varieties</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Value (Rs.)</th>
                                    <th scope="col">No of Varieties</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Value (Rs.)</th>
                                    <th scope="col">No of Varieties</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Value (Rs.)</th>
                                    <th scope="col">No of Varieties</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Value (Rs.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $purchase)
                                <tr>
                                    <th scope="row">{{ $purchase->id }}</th>
                                    <td>{{ $purchase->purchasetype->purchase_name }}</td>
                                    <td>{{ $purchase->purchasedate }}</td>
                                    <td>{{ $purchase->govtnoofvarieties }}</td>
                                    <td>{{ $purchase->govtquantity }}</td>
                                    <td>{{ $purchase->govtvalues }}</td>
                                    <td>{{ $purchase->coopnoofvarieties }}</td>
                                    <td>{{ $purchase->coopquantity }}</td>
                                    <td>{{ $purchase->coopvalues }}</td>
                                    <td>{{ $purchase->privatenoofvarieties }}</td>
                                    <td>{{ $purchase->privatequantity }}</td>
                                    <td>{{ $purchase->privatevalues }}</td>
                                    <td>{{ $purchase->jpcnoofvarieties }}</td>
                                    <td>{{ $purchase->jpcquantity }}</td>
                                    <td>{{ $purchase->jpcvalues }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $purchases->links() !!}
                        </div>
                    </div>
                </div>
            </div>
     </div>
  </section>

</main><!-- End #main -->
@endsection