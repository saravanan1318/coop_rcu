@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Report</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Sale</li>
        <li class="breadcrumb-item active">Report</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Sale Report</h5>
                  <form action="{{url('/superadmin/salereport')}}" method="get" id="salereportform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingName" name="salereportdate" placeholder="date" value="{{$salereportdate}}" required>
                              <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="salereportsubmit">Submit</button>
                          </div>
                      </div>
                  </form
                  </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered" style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" >Date</th>
                                    <th scope="col" rowspan="2">Categories</th>
                                    <th scope="col" rowspan="2">No of varieties</th>
                                    <th scope="col" rowspan="2">No of Outlets</th>
                                    <th scope="col" rowspan="2">No of Customers</th>
                                    <th scope="col" rowspan="2">No of farmers</th>
                                    <th scope="col" colspan="2">Quantity</th>
                                    <th scope="col" colspan="2">Sales amount</th>
                                </tr>
                                <tr>
                                    <th scope="col">Kilo</th>
                                    <th scope="col">Litres</th>
                                    <th scope="col">Physical</th>
                                    <th scope="col">Coop Bazaar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->saledate }}</td>
                                    <td>{{ $sale->saletype->sale_name }}</td>
                                    <td>{{ $sale->noofvarieties }}</td>
                                    <td>{{ $sale->noofoutlets }}</td>
                                    <td>{{ $sale->noofcustomers }}</td>
                                    <td>{{ $sale->nooffarmers }}</td>
                                    <td>{{ $sale->quantitykilo }}</td>
                                    <td>{{ $sale->quantitylitres }}</td>
                                    <td>{{ $sale->salesamountphysical }}</td>
                                    <td>{{ $sale->salesamountcoopbazaar }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $sales->links() !!}
                        </div>
                    </div>
                </div>
            </div>
     </div>
  </section>

</main><!-- End #main -->
@endsection