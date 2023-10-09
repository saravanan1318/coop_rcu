@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Services</h1>
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
                        {{-- <h5 class="card-title"> Sale Add</h5> --}}
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
                        <form action="{{url('/society/services/store')}}" method="post" id="serviceadd" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating">
                                <input type="date" class="form-control" id="servicedate" name="servicedate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                                <label for="floatingName">Date</label>
                                </div>
                            </div>
                            <div class="col-md-12 table-responsive">

                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2">Categories</th>
                                            <th scope="col" rowspan="2">Count</th>
                                            <th scope="col" rowspan="2">No of Centres</th>
                                            <th scope="col" rowspan="2">No of varieties</th>
                                            <th scope="col" rowspan="2">No of Customers</th>
                                            <th scope="col" rowspan="2">No of Farmers</th>
                                            <th scope="col" colspan="2">Quantity</th>
                                            <th scope="col" rowspan="2">Purchase</th>
                                            <th scope="col" colspan="2">Sales</th>
                                            <th scope="col" rowspan="2">Income Generated (rs.)</th>
                                            <th scope="col" rowspan="2">Profit (Rs)</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Kilo</th>
                                            <th scope="col">Litres</th>
                                            <th scope="col">E trading</th>
                                            <th scope="col">Physcial</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr data-id="1" id="row1">
                                            <td>
                                                <select class="form-control service_id" data-rowid="1" style=" width: 150px; " id="service_id1" name="service_id[]" required>
                                                    <option value="">SELECT</option>
                                                    @foreach($mtr_services as $services)
                                                      <option value="{{ $services->id }}">{{ $services->services_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px;" id="count1" name="count[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofcentres1" name="noofcentres[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofvarieties1" name="noofvarieties[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofcustomers1" name="noofcustomers[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="nooffarmers1" name="nooffarmers[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="quantitykilos1" name="quantitykilos[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="quantitylitres1" name="quantitylitres[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="purchase1" name="purchase[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="salesamountetrading1" name="salesamountetrading[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="salesamountphysical1" name="salesamountphysical[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="incomegenerated1" name="incomegenerated[]" required>
                                            </td>
                                            <td>
                                                <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="profit1" name="profit[]" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-10">

                            </div>
                            <div class="col-md-2">
                                <div class="text-center">
                                    <input type="hidden" value="1" id="rowadded">
                                    <a  class="btn btn-warning" id="addrow" >Add new</a>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal" onclick="forminputsappend()">
                                        Preview
                                    </button>
                                    {{-- <button type="submit" class="btn btn-primary" id="loansubmit">Preview</button> --}}
                                    <div class="modal fade" id="largeModal" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Form preview</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="forminputs">

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
                                              <button type="submit" class="btn btn-primary" id="servicesubmit">Submit</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div><!-- End Large Modal-->
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </form><!-- End floating Labels Form -->

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
        var html = '<tr data-id="'+updatedrowadded+'" id="'+updatedrowadded+'"> <td> <select class="form-control service_id" data-rowid="'+updatedrowadded+'" style=" width: 150px; " id="service_id'+updatedrowadded+'" name="service_id[]" required> <option value="">SELECT</option> <?php foreach($mtr_services as $services){ ?> <option value="<?php echo $services->id ?>"><?php echo $services->services_name ?></option> <?php } ?> </select> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="count'+updatedrowadded+'" name="count[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofcentres'+updatedrowadded+'" name="noofcentres[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofvarieties'+updatedrowadded+'" name="noofvarieties[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="noofcustomers'+updatedrowadded+'" name="noofcustomers[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="nooffarmers'+updatedrowadded+'" name="nooffarmers[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="quantitykilos'+updatedrowadded+'" name="quantitykilos[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="quantitylitres'+updatedrowadded+'" name="quantitylitres[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="purchase'+updatedrowadded+'" name="purchase[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="salesamountetrading'+updatedrowadded+'" name="salesamountetrading[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="salesamountphysical'+updatedrowadded+'" name="salesamountphysical[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="incomegenerated'+updatedrowadded+'" name="incomegenerated[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control" style=" width: 150px; " id="profit'+updatedrowadded+'" name="profit[]" required> </td><td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';

        console.log(html);
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);

        $('.service_id').on('change', function() {

        var rowid = $(this).attr("data-rowid");

        $("#count"+rowid).val("");
        $("#noofcentres"+rowid).val("");
        $("#noofvarieties"+rowid).val("");
        $("#noofcustomers"+rowid).val("");
        $("#nooffarmers"+rowid).val("");
        $("#quantitykilos"+rowid).val("");
        $("#quantitylitres"+rowid).val("");
        $("#purchase"+rowid).val("");
        $("#salesamountetrading"+rowid).val("");
        $("#salesamountphysical"+rowid).val("");
        $("#incomegenerated"+rowid).val("");
        $("#profit"+rowid).val("");

        if(this.value == "1"){

            $("#count"+rowid).attr("readonly",false);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",true);
            $("#incomegenerated"+rowid).attr("readonly",false);
            $("#profit"+rowid).attr("readonly",true);


        }else if(this.value == "2"){

            $("#count"+rowid).attr("readonly",false);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",true);
            $("#incomegenerated"+rowid).attr("readonly",false);
            $("#profit"+rowid).attr("readonly",true);

        }else if(this.value == "3"){

            $("#count"+rowid).attr("readonly",true);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",false);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#incomegenerated"+rowid).attr("readonly",true);
            $("#profit"+rowid).attr("readonly",true);

        }else if(this.value == "4"){


            $("#count"+rowid).attr("readonly",true);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",false);
            $("#quantitykilos"+rowid).attr("readonly",false);
            $("#quantitylitres"+rowid).attr("readonly",false);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#incomegenerated"+rowid).attr("readonly",true);
            $("#profit"+rowid).attr("readonly",true);


        }else if(this.value == "5"){

            $("#count"+rowid).attr("readonly",true);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",false);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",true);
            $("#incomegenerated"+rowid).attr("readonly",false);
            $("#profit"+rowid).attr("readonly",true);

        }else if(this.value == "6"){

            $("#count"+rowid).attr("readonly",true);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",false);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#incomegenerated"+rowid).attr("readonly",true);
            $("#profit"+rowid).attr("readonly",true);


        }

        });

    });
    function deletethisrow(deletethisrow){
        console.log(deletethisrow);
        var rowtodelete = $(this).attr("data-delete-id");
        $("#row"+deletethisrow).remove();
    }

    $('.service_id').on('change', function() {

    var rowid = $(this).attr("data-rowid");
    console.log(rowid);
    $("#count"+rowid).val("");
    $("#noofcentres"+rowid).val("");
    $("#noofvarieties"+rowid).val("");
    $("#noofcustomers"+rowid).val("");
    $("#nooffarmers"+rowid).val("");
    $("#quantitykilos"+rowid).val("");
    $("#quantitylitres"+rowid).val("");
    $("#purchase"+rowid).val("");
    $("#salesamountetrading"+rowid).val("");
    $("#salesamountphysical"+rowid).val("");
    $("#incomegenerated"+rowid).val("");
    $("#profit"+rowid).val("");

    if(this.value == "1"){

        $("#count"+rowid).attr("readonly",false);
        $("#noofcentres"+rowid).attr("readonly",true);
        $("#noofvarieties"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilos"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#purchase"+rowid).attr("readonly",true);
        $("#salesamountetrading"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",true);
        $("#incomegenerated"+rowid).attr("readonly",false);
        $("#profit"+rowid).attr("readonly",true);


    }else if(this.value == "2"){

        $("#count"+rowid).attr("readonly",false);
        $("#noofcentres"+rowid).attr("readonly",true);
        $("#noofvarieties"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilos"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#purchase"+rowid).attr("readonly",true);
        $("#salesamountetrading"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",true);
        $("#incomegenerated"+rowid).attr("readonly",false);
        $("#profit"+rowid).attr("readonly",true);

    }else if(this.value == "3"){

        $("#count"+rowid).attr("readonly",true);
        $("#noofcentres"+rowid).attr("readonly",true);
        $("#noofvarieties"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",false);
        $("#quantitykilos"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#purchase"+rowid).attr("readonly",true);
        $("#salesamountetrading"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#incomegenerated"+rowid).attr("readonly",true);
        $("#profit"+rowid).attr("readonly",true);

    }else if(this.value == "4"){


        $("#count"+rowid).attr("readonly",true);
        $("#noofcentres"+rowid).attr("readonly",true);
        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",false);
        $("#quantitykilos"+rowid).attr("readonly",false);
        $("#quantitylitres"+rowid).attr("readonly",false);
        $("#purchase"+rowid).attr("readonly",true);
        $("#salesamountetrading"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#incomegenerated"+rowid).attr("readonly",true);
        $("#profit"+rowid).attr("readonly",true);


    }else if(this.value == "5"){

        $("#count"+rowid).attr("readonly",true);
            $("#noofcentres"+rowid).attr("readonly",true);
            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",false);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilos"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#purchase"+rowid).attr("readonly",true);
            $("#salesamountetrading"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",true);
            $("#incomegenerated"+rowid).attr("readonly",false);
            $("#profit"+rowid).attr("readonly",true);

    }else if(this.value == "6"){

        $("#count"+rowid).attr("readonly",true);
        $("#noofcentres"+rowid).attr("readonly",true);
        $("#noofvarieties"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",false);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilos"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#purchase"+rowid).attr("readonly",true);
        $("#salesamountetrading"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",true);
        $("#incomegenerated"+rowid).attr("readonly",false);
        $("#profit"+rowid).attr("readonly",true);


    }

    });

    function forminputsappend() {
    $("#forminputs").html("");

    var html = '<table class="table table-responsive table-bordered datatable"> <thead style="text-align: center"> <tr> <th scope="col" rowspan="2">Categories</th> <th scope="col" rowspan="2">Count</th> <th scope="col" rowspan="2">No of Centres</th> <th scope="col" rowspan="2">No of varieties</th> <th scope="col" rowspan="2">No of Customers</th> <th scope="col" rowspan="2">No of Farmers</th> <th scope="col" colspan="2">Quantity</th> <th scope="col" rowspan="2">Purchase</th> <th scope="col" colspan="2">Sales</th> <th scope="col" rowspan="2">Income Generated (rs.)</th> <th scope="col" rowspan="2">Profit (Rs)</th> </tr> <tr> <th scope="col">Kilo</th> <th scope="col">Litres</th> <th scope="col">E trading</th> <th scope="col">Physcial</th> </tr> </thead> <tbody id="tbody">';

    var arraycount = parseInt($("#rowadded").val()) + 1;

    for (var i = 1; i < arraycount; i++) {

        var servicestype= $("#services_id" + i + " option:selected").text();
        var count = $("#count" + i).val();
        var noofcentres = $("#noofcentres" + i).val();
        var noofvarieties = $("#noofvarieties" + i).val();
        var noofcustomers = $("#noofcustomers" + i).val();
        var nooffarmers = $("#nooffarmers" + i).val();
        var quantitykilos = $("#quantitykilos" + i).val();
        var quantitylitres = $("#quantitylitres" + i).val();
        var purchase = $("#purchase" + i).val();
        var salesamountetrading = $("#salesamountetrading" + i).val();
        var salesamountphysical = $("#salesamountphysical" + i).val();
        var incomegenerated = $("#incomegenerated" + i).val();
        var profit = $("#profit" + i).val();

        html += '<tr><td>' + service_id + '</td><td>' + count + '</td><td>' + noofcentres + '</td><td>' + noofvarieties + '</td><td>' + noofcustomers + '</td><td>' + nooffarmers + '</td><td>' + quantitykilos + '</td><td>' + quantitylitres + '</td><td>' + purchase + '</td><td>' + salesamountetrading + '</td><td>' + salesamountphysical + '</td><td>' + incomegenerated + '</td><td>' + profit + '</td></tr>';
    }

    html += '</tbody></table>';

    $("#forminputs").html(html);
}

</script>
@endsection
