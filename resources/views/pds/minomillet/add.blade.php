@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Mino Millet Add Form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Mino Millet</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    </div>
                    <div class="row margindiv">
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
                  {{-- <h5 class="card-title">Issue of Loan and Collection</h5> --}}
                  <form action="{{url('/drpds/mino-millet/store')}}" method="post" id="minomilletform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="fin_date" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                          <div class="col-md-4">
                              <div class="form-floating">
                                  <input type="text" class="form-control" id="fps_name"  name="fps_name" value="{{ old('fps_name') }}"  required>
                                  <label for="floatingName">FPS Name</label>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-floating">
                                  <input type="text" class="form-control" id="purchase_company_name"  name="purchase_company_name" value="{{ old('purchase_company_name') }}"  required>
                                  <label for="floatingName">Purchased Company Name</label>
                              </div>
                          </div>
                          <div class="col-md-10">

                          </div>
                          <div class="col-md-2">
                              <div class="text-center">
                                  <input type="hidden" value="1" id="rowadded">
                                  <a  class="btn btn-warning" id="addrow" >Add new</a>
                              </div>
                          </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-responsive table-bordered datatable">
                                <thead style="text-align: center">
                                <tr>
                                  <th scope="col" >Region</th>
                                  <th scope="col" >Small Grain Type</th>
                                  <th scope="col" >Quantity Purchased</th>
                                  <th scope="col" >Quantity Sold</th>
                                  <th scope="col" >Sales Amount</th>
                              </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr data-id="1" id="row1">
                                        <td>
                                            <select class="form-control" id="region" name="region[]" required>
                                                <option value="">--SELECT--</option>
                                                @foreach($mtr_regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="small_grain_type"  name="small_grain_type[]" value="{{ old('small_grain_type[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="quantity_purchased"  name="quantity_purchased[]" value="{{ old('quantity_purchased[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="quantity_sold"  name="quantity_sold[]" value="{{ old('quantity_sold[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="sales_amount"  name="sales_amount[]" value="{{ old('sales_amount[]') }}" required>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="minomilletsubmit">Submit</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>

  </section>

</main><!-- End #main -->
<script>
    //Loan Add new
    $('#addrow').on('click', function() {
        console.log("Add new clicked");
        var rowadded = $("#rowadded").val();
        var updatedrowadded = parseInt(rowadded) + 1;
        var html = `
                                        <tr data-id="`+updatedrowadded+`" id="row`+updatedrowadded+`">
                                        <td>
                                           <select class="form-control" id="region" name="region[]" required>
                                             <option value="">--SELECT--</option>
                                             @foreach($mtr_regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                             @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="small_grain_type"  name="small_grain_type[]" value="{{ old('small_grain_type[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="quantity_purchased"  name="quantity_purchased[]" value="{{ old('quantity_purchased[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="quantity_sold"  name="quantity_sold[]" value="{{ old('quantity_sold[]') }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="sales_amount"  name="sales_amount[]" value="{{ old('sales_amount[]') }}" required>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
        `;
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);
    });
</script>
@endsection
