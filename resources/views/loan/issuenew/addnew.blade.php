@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Issue</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item">issuenew</li>
        <li class="breadcrumb-item active">add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <h4 class="card-title">Loan Issue Add</h4>
                        </div>
                        <div class="col-lg-6 mb-4" style="text-align: right">

                        </div>
                    </div>
                    <form id="farm_bill" method="post">
                        <div class="row">
                            <div class="col-lg-6 mb-4">


                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label for="username">Date</label>
                                    <input class="form-control" type="date" name="" id=""
                                           required=""  required>
                                </div>

                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover  table-responsive" id="tab_logic">
                                    <tbody>
                                        <tr>
                                            <td rowspan="3">Sl. No</td>
                                            <td rowspan="3">Loan Types</td>
                                            <td rowspan="3">Overall Outstanding</td>
                                            <td colspan="4">Issued</td>
                                            <td colspan="2" rowspan="2">Collection</td>
                                            <td rowspan="3">% Achieved on target</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Total</td>
                                            <td colspan="2">Out of which belongs to SC/ ST</td>
                                        </tr>
                                        <tr>
                                            <td>Numbers</td>
                                            <td>Amount</td>
                                            <td>Numbers</td>
                                            <td>Amount</td>
                                            <td>Numbers</td>
                                            <td>Amount</td>
                                        </tr>
                                    </tbody>
                                    <tbody id='addr'>
                                    <tr id='addr1' >
                                        <td>1</td>
                                        <td>
                                            <input list="browsers" name='product[]' autocomplete="off" class="form-control browser" required>
                                            <datalist id="browsers">

                                            </datalist>
                                        </td>


                                        <td><input type="text" name='Totalnumber[]' placeholder='Totalnumber' class="form-control qty" step="0" min="0" required/></td>
                                        <td><input type="text" name='Total Amount[]' placeholder='Total Amount' class="form-control price" step="0.00" min="0" required/></td>
                                        <td><input type="text" name='scstnumber[]'  placeholder='scstnumber' class="form-control salesprice" step="0.00" min="0" /></td>
                                        <td><input type="text" name='scstAmount[]' value="0"  onblur="scstAmount" placeholder='Enter Unit gst' class="form-control gst" step="0.00" min="0" required/></td>
                                        <td><input type="text" name='Totalnumber[]' placeholder='Totalnumber' class="form-control qty" step="0" min="0" required/></td>
                                        <td><input type="text" name='Total Amount[]' placeholder='Total Amount' class="form-control price" step="0.00" min="0" required/></td>
                                        <td><input type="text" name='Totalnumber[]' placeholder='Totalnumber' class="form-control qty" step="0" min="0" required/></td>


                                        <td><input type="text" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                                        <td><a data-id='1' id="1" onclick="deletethisrow(this.id)" style="color: white" class="deletethisrow pull-right btn btn-danger">Delete Row</a></td>
                                    </tr>
                                    <input type="hidden" value="1" id="serialno">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-2">
                                <a id="add_row" style="color: white" class="btn btn-success btn-default pull-right">Add Row</a>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="pull-right col-md-4"></div>
                            <div class="pull-right col-md-4"></div>
                            <div class="pull-right col-md-4">

                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" id="submit" class="btn btn-primary pull-center">Submit</button>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

</main><!-- End #main -->
@endsection
