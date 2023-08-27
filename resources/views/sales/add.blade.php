@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sale</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Sale</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Sale Add</h5>
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
                        <form action="{{url('/society/sale/store')}}" method="post" id="salesadd" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating">
                                <input type="date" class="form-control" id="saledate" name="saledate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                                <label for="floatingName">Date</label>
                                </div>
                            </div>
                            <div class="col-md-12 table-responsive">

                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
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
                                    <tbody id="tbody">
                                        <tr data-id="1" id="row1">
                                            <td>
                                                <select class="form-control sale_id" style=" width: 150px; " id="sale_id1" name="sale_id[]" value="{{ old('sale_id') }}" required>
                                                    <option value="">SELECT</option>
                                                    @foreach($mtr_sales as $sales)
                                                      <option value="{{ $sales->id }}">{{ $sales->sale_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="noofvarieties1" name="noofvarieties[]" value="{{ old('noofvarieties') }}" placeholder="Your No of Varieties." required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="noofoutlets1" name="noofoutlets[]" value="{{ old('noofoutlets') }}" placeholder="Your No of Outlets." required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="noofcustomers1" name="noofcustomers[]" value="{{ old('noofcustomers') }}" placeholder="Your No of Customers" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="nooffarmers1" name="nooffarmers[]" value="{{ old('nooffarmers') }}" placeholder="Your No of farmers" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="quantitykilo1" name="quantitykilo[]" value="{{ old('quantitykilo') }}" placeholder="Your Quantity in Kilo." required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="quantitylitres1" name="quantitylitres[]" value="{{ old('quantitylitres') }}" placeholder="Your Quantity in Litres." required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="salesamountphysical1" name="salesamountphysical[]" value="{{ old('salesamountphysical') }}" placeholder="Your Physical." required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" style=" width: 150px; " id="salesamountcoopbazaar1" name="salesamountcoopbazaar[]" value="{{ old('salesamountcoopbazaar') }}" placeholder="Your Coop Bazaar." required>
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
                                    <a  class="btn btn-warning" id="addrow" >Add row</a>
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
                                              <button type="submit" class="btn btn-primary" id="loansubmit">Submit</button>
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
    //Loan add row
    $('#addrow').on('click', function() {
        console.log("Add new clicked");
        var rowadded = $("#rowadded").val();
        var updatedrowadded = parseInt(rowadded) + 1;
        var html = '<tr data-id="'+updatedrowadded+'" id="row'+updatedrowadded+'"> <td> <select class="form-control sale_id" data-rowid="'+updatedrowadded+'" id="sale_id'+updatedrowadded+'" style=" width: 150px; " name="sale_id[]" ><option value="">--SELECT--</option> <?php foreach($mtr_sales as $sales){ ?> <option value="<?php echo $sales->id ?>"><?php echo $sales->sale_name ?></option> <?php } ?> </select> <td> <input type="text" class="form-control" style=" width: 150px; " id="noofvarieties'+updatedrowadded+'" name="noofvarieties[]" value="{{ old('noofvarieties') }}" placeholder="Your No of Varieties." required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="noofoutlets'+updatedrowadded+'" name="noofoutlets[]" value="{{ old('noofoutlets') }}" placeholder="Your No of Outlets." required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="noofcustomers'+updatedrowadded+'" name="noofcustomers[]" value="{{ old('noofcustomers') }}" placeholder="Your No of Customers" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="nooffarmers'+updatedrowadded+'" name="nooffarmers[]" value="{{ old('nooffarmers') }}" placeholder="Your No of farmers" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="quantitykilo'+updatedrowadded+'" name="quantitykilo[]" value="{{ old('quantitykilo') }}" placeholder="Your Quantity in Kilo." required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="quantitylitres'+updatedrowadded+'" name="quantitylitres[]" value="{{ old('quantitylitres') }}" placeholder="Your Quantity in Litres." required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="salesamountphysical'+updatedrowadded+'" name="salesamountphysical[]" value="{{ old('salesamountphysical') }}" placeholder="Your Physical." required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="salesamountcoopbazaar'+updatedrowadded+'" name="salesamountcoopbazaar[]" value="{{ old('salesamountcoopbazaar') }}" placeholder="Your Coop Bazaar." required> </td> <td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';

        console.log(html);
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);

        $('.sale_id').on('change', function() {

        var rowid = $(this).attr("data-rowid");

        $("#noofvarieties"+rowid).val("");
        $("#noofoutlets"+rowid).val("");
        $("#noofcustomers"+rowid).val("");
        $("#nooffarmers"+rowid).val("");
        $("#quantitykilo"+rowid).val("");
        $("#quantitylitres"+rowid).val("");
        $("#salesamountphysical"+rowid).val("");
        $("#salesamountcoopbazaar"+rowid).val("");

        if(this.value == "1"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",false);
            $("#quantitykilo"+rowid).attr("readonly",false);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

        }else if(this.value == "2"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",false);
            $("#quantitykilo"+rowid).attr("readonly",false);
            $("#quantitylitres"+rowid).attr("readonly",false);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

        }else if(this.value == "3"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",false);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilo"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

        }else if(this.value == "4"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",false);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilo"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);


        }else if(this.value == "5"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",false);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilo"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",false);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

        }else if(this.value == "6"){

            $("#noofvarieties"+rowid).attr("readonly",false);
            $("#noofoutlets"+rowid).attr("readonly",true);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilo"+rowid).attr("readonly",false);
            $("#quantitylitres"+rowid).attr("readonly",false);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",false);

        }else if(this.value == "7"){

            $("#noofvarieties"+rowid).attr("readonly",true);
            $("#noofoutlets"+rowid).attr("readonly",false);
            $("#noofcustomers"+rowid).attr("readonly",true);
            $("#nooffarmers"+rowid).attr("readonly",true);
            $("#quantitykilo"+rowid).attr("readonly",true);
            $("#quantitylitres"+rowid).attr("readonly",true);
            $("#salesamountphysical"+rowid).attr("readonly",false);
            $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

        }
        });

    });
    function deletethisrow(deletethisrow){
        console.log(deletethisrow);
        var rowtodelete = $(this).attr("data-delete-id");
        $("#row"+deletethisrow).remove();
    }

    $('.sale_id').on('change', function() {

    var rowid = $(this).attr("data-rowid");

    $("#noofvarieties"+rowid).val("");
    $("#noofoutlets"+rowid).val("");
    $("#noofcustomers"+rowid).val("");
    $("#nooffarmers"+rowid).val("");
    $("#quantitykilo"+rowid).val("");
    $("#quantitylitres"+rowid).val("");
    $("#salesamountphysical"+rowid).val("");
    $("#salesamountcoopbazaar"+rowid).val("");

    if(this.value == "1"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",false);
        $("#quantitykilo"+rowid).attr("readonly",false);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

    }else if(this.value == "2"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",false);
        $("#quantitykilo"+rowid).attr("readonly",false);
        $("#quantitylitres"+rowid).attr("readonly",false);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

    }else if(this.value == "3"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",false);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilo"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

    }else if(this.value == "4"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",false);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilo"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);


    }else if(this.value == "5"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",false);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilo"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",false);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

    }else if(this.value == "6"){

        $("#noofvarieties"+rowid).attr("readonly",false);
        $("#noofoutlets"+rowid).attr("readonly",true);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilo"+rowid).attr("readonly",false);
        $("#quantitylitres"+rowid).attr("readonly",false);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",false);

    }else if(this.value == "7"){

        $("#noofvarieties"+rowid).attr("readonly",true);
        $("#noofoutlets"+rowid).attr("readonly",false);
        $("#noofcustomers"+rowid).attr("readonly",true);
        $("#nooffarmers"+rowid).attr("readonly",true);
        $("#quantitykilo"+rowid).attr("readonly",true);
        $("#quantitylitres"+rowid).attr("readonly",true);
        $("#salesamountphysical"+rowid).attr("readonly",false);
        $("#salesamountcoopbazaar"+rowid).attr("readonly",true);

    }
    });

    function forminputsappend() {
    $("#forminputs").html("");

    var html = '<table class="table table-responsive table-bordered datatable"> <thead style="text-align: center"> <tr> <th scope="col" rowspan="2">Categories</th> <th scope="col" rowspan="2">No of varieties</th> <th scope="col" rowspan="2">No of Outlets</th> <th scope="col" rowspan="2">No of Customers</th> <th scope="col" rowspan="2">No of farmers</th> <th scope="col" colspan="2">Quantity</th> <th scope="col" colspan="2">Sales amount</th> </tr> <tr> <th scope="col">Kilo</th> <th scope="col">Litres</th> <th scope="col">Physical</th> <th scope="col">Coop Bazaar</th> </tr> </thead> <tbody id="tbody">';

    var arraycount = parseInt($("#rowadded").val()) + 1;

    for (var i = 1; i < arraycount; i++) {
        var saletype = $("#sale_id" + i + " option:selected").text();
        var noofvarieties = $("#noofvarieties" + i).val();
        var noofoutlets = $("#noofoutlets" + i).val();
        var noofcustomers = $("#noofcustomers" + i).val();
        var nooffarmers = $("#nooffarmers" + i).val();
        var quantitykilo = $("#quantitykilo" + i).val();
        var quantitylitres = $("#quantitylitres" + i).val();
        var salesamountphysical = $("#salesamountphysical" + i).val();
        var salesamountcoopbazaar = $("#salesamountcoopbazaar" + i).val();

        html += '<tr><td>' + saletype + '</td><td>' + noofvarieties + '</td><td>' + noofoutlets + '</td><td>' + noofcustomers + '</td><td>' + nooffarmers + '</td><td>' + quantitykilo + '</td><td>' + quantitylitres + '</td><td>' + salesamountphysical + '</td><td>' + salesamountcoopbazaar + '</td></tr>';
    }

    html += '</tbody></table>';

    $("#forminputs").html(html);
}

</script>
@endsection
