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
                            <div class="col-md-4">
                                <div class="form-floating">
                                <input type="date" class="form-control" id="floatingName" name="purchasedate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                                <label for="floatingName">Date</label>
                                </div>
                            </div>
                            <div class="col-md-12 table-responsive">
                                
                                <table class="table table-responsive table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Purchase type</th>
                                            <th scope="col" colspan="3" >Govt. Institutions</th>
                                            <th scope="col" colspan="3" >Coop Institutions</th>
                                            <th scope="col" colspan="3" >Private Traders</th>
                                            <th scope="col" colspan="3">JPC Approved Traders</th>
                                        </tr>
                                        <tr>
                                            <th scope="col"></th>
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
                                    <tbody id="tbody">
                                        <tr data-id="1" id="row1">
                                            <td>
                                                <select class="form-control purchase_id" data-rowid="1" id="purchase_id1" name="purchase_id[]" style=" width: 150px; " value="{{ old('purchase_id') }}">
                                                    <option value="">--SELECT--</option>
                                                    @foreach($mtr_purchases as $purchases)
                                                    <option value="{{ $purchases->id }}">{{ $purchases->purchase_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="govtnoofvarieties[]" id="govtnoofvarieties1" style=" width: 150px; " value="{{ old('govtnoofvarieties') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="govtquantity[]" id="govtquantity1" style=" width: 150px; " value="{{ old('govtquantity') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="govtvalues[]" id="govtvalues1" style=" width: 150px; " value="{{ old('govtvalues') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="coopnoofvarieties[]" id="coopnoofvarieties1" style=" width: 150px; " value="{{ old('coopnoofvarieties') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="coopquantity[]" id="coopquantity1" style=" width: 150px; " value="{{ old('coopquantity') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="coopvalues[]" id="coopvalues1" style=" width: 150px; " value="{{ old('coopvalues') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jpcnoofvarieties[]" id="jpcnoofvarieties1" style=" width: 150px; " value="{{ old('jpcnoofvarieties') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jpcquantity[]" id="jpcquantity1" style=" width: 150px; " value="{{ old('jpcquantity') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="jpcvalues[]" id="jpcvalues1" style=" width: 150px; " value="{{ old('jpcvalues') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="privatenoofvarieties[]" id="privatenoofvarieties1" style=" width: 150px; " value="{{ old('privatenoofvarieties') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="privatequantity[]" id="privatequantity1" style=" width: 150px; " value="{{ old('privatequantity') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="privatevalues[]" id="privatevalues1" style=" width: 150px; " value="{{ old('privatevalues') }}" required>
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
                                    <button type="submit" class="btn btn-primary" id="purchasesubmit">Submit</button>
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
        var html = '<tr data-id="'+updatedrowadded+'" id="row'+updatedrowadded+'"> <td> <select class="form-control purchase_id" data-rowid="'+updatedrowadded+'" id="purchase_id'+updatedrowadded+'" style=" width: 150px; " name="purchase_id[]" ><option value="">--SELECT--</option> <?php foreach($mtr_purchases as $purchases){ ?> <option value="<?php echo $purchases->id ?>"><?php echo $purchases->purchase_name ?></option> <?php } ?> </select> </td> <td> <input type="text" class="form-control" name="govtnoofvarieties[]" style=" width: 150px; " id="govtnoofvarieties'+updatedrowadded+'" value="{{ old('govtnoofvarieties') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " name="govtquantity[]" id="govtquantity'+updatedrowadded+'" value="{{ old('govtquantity') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " name="govtvalues[]" id="govtvalues'+updatedrowadded+'" style=" width: 150px; " value="{{ old('govtvalues') }}" required> </td> <td> <input type="text" class="form-control" name="coopnoofvarieties[]" style=" width: 150px; " id="coopnoofvarieties'+updatedrowadded+'" value="{{ old('coopnoofvarieties') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="coopquantity'+updatedrowadded+'" name="coopquantity[]" value="{{ old('coopquantity') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="coopvalues'+updatedrowadded+'" name="coopvalues[]" value="{{ old('coopvalues') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="jpcnoofvarieties'+updatedrowadded+'" name="jpcnoofvarieties[]" value="{{ old('jpcnoofvarieties') }}" required> </td> <td> <input type="text" style=" width: 150px; " class="form-control" id="jpcquantity'+updatedrowadded+'" name="jpcquantity[]" value="{{ old('jpcquantity') }}" required> </td> <td> <input type="text" style=" width: 150px; " class="form-control" id="jpcvalues'+updatedrowadded+'" name="jpcvalues[]" value="{{ old('jpcvalues') }}" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="privatenoofvarieties'+updatedrowadded+'" name="privatenoofvarieties[]" value="{{ old('privatenoofvarieties') }}" required> </td> <td> <input type="text" style=" width: 150px; " class="form-control" id="privatequantity'+updatedrowadded+'" name="privatequantity[]" style=" width: 150px; " value="{{ old('privatequantity') }}" required> </td> <td> <input type="text" class="form-control" id="privatevalues'+updatedrowadded+'" style=" width: 150px; " name="privatevalues[]" value="{{ old('privatevalues') }}" required> </td> <td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';

        console.log(html);
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);

        $('.purchase_id').on('change', function() {

            var rowid = $(this).attr("data-rowid");

            console.log(rowid);
            $("#govtnoofvarieties"+rowid).val("");
            $("#govtquantity"+rowid).val("");
            $("#govtvalues"+rowid).val("");
            $("#coopnoofvarieties"+rowid).val("");
            $("#coopquantity"+rowid).val("");
            $("#coopvalues"+rowid).val("");
            $("#privatenoofvarieties"+rowid).val("");
            $("#privatequantity"+rowid).val("");
            $("#privatevalues"+rowid).val("");
            $("#jpcnoofvarieties"+rowid).val("");
            $("#jpcquantity"+rowid).val("");
            $("#jpcvalues"+rowid).val("");

            if(this.value == "1"){

                $("#govtnoofvarieties"+rowid).attr("readonly",false);
                $("#govtquantity"+rowid).attr("readonly",false);
                $("#govtvalues"+rowid).attr("readonly",false);
                $("#coopnoofvarieties"+rowid).attr("readonly",false);
                $("#coopquantity"+rowid).attr("readonly",false);
                $("#coopvalues"+rowid).attr("readonly",false);
                $("#privatenoofvarieties"+rowid).attr("readonly",false);
                $("#privatequantity"+rowid).attr("readonly",false);
                $("#privatevalues"+rowid).attr("readonly",false);
                $("#jpcnoofvarieties"+rowid).attr("readonly",true);
                $("#jpcquantity"+rowid).attr("readonly",true);
                $("#jpcvalues"+rowid).attr("readonly",true);
                
            }else if(this.value == "2"){

                $("#govtnoofvarieties"+rowid).attr("readonly",true);
                $("#govtquantity"+rowid).attr("readonly",true);
                $("#govtvalues"+rowid).attr("readonly",true);
                $("#coopnoofvarieties"+rowid).attr("readonly",true);
                $("#coopquantity"+rowid).attr("readonly",true);
                $("#coopvalues"+rowid).attr("readonly",true);
                $("#privatenoofvarieties"+rowid).attr("readonly",true);
                $("#privatequantity"+rowid).attr("readonly",false);
                $("#privatevalues"+rowid).attr("readonly",false);
                $("#jpcnoofvarieties"+rowid).attr("readonly",true);
                $("#jpcquantity"+rowid).attr("readonly",false);
                $("#jpcvalues"+rowid).attr("readonly",false);

            }else if(this.value == "3"){
                $("#govtnoofvarieties"+rowid).attr("readonly",true);
                $("#govtquantity"+rowid).attr("readonly",true);
                $("#govtvalues"+rowid).attr("readonly",true);
                $("#coopnoofvarieties"+rowid).attr("readonly",true);
                $("#coopquantity"+rowid).attr("readonly",false);
                $("#coopvalues"+rowid).attr("readonly",false);
                $("#privatenoofvarieties"+rowid).attr("readonly",true);
                $("#privatequantity"+rowid).attr("readonly",false);
                $("#privatevalues"+rowid).attr("readonly",false);
                $("#jpcnoofvarieties"+rowid).attr("readonly",true);
                $("#jpcquantity"+rowid).attr("readonly",true);
                $("#jpcvalues"+rowid).attr("readonly",true);

            }else if(this.value == "4"){

                $("#govtnoofvarieties"+rowid).attr("readonly",false);
                $("#govtquantity"+rowid).attr("readonly",false);
                $("#govtvalues"+rowid).attr("readonly",false);
                $("#coopnoofvarieties"+rowid).attr("readonly",true);
                $("#coopquantity"+rowid).attr("readonly",true);
                $("#coopvalues"+rowid).attr("readonly",true);
                $("#privatenoofvarieties"+rowid).attr("readonly",true);
                $("#privatequantity"+rowid).attr("readonly",true);
                $("#privatevalues"+rowid).attr("readonly",true);
                $("#jpcnoofvarieties"+rowid).attr("readonly",true);
                $("#jpcquantity"+rowid).attr("readonly",true);
                $("#jpcvalues"+rowid).attr("readonly",true);

            }else if(this.value == "5"){

                $("#govtnoofvarieties"+rowid).attr("readonly",false);
                $("#govtquantity"+rowid).attr("readonly",true);
                $("#govtvalues"+rowid).attr("readonly",false);
                $("#coopnoofvarieties"+rowid).attr("readonly",false);
                $("#coopquantity"+rowid).attr("readonly",true);
                $("#coopvalues"+rowid).attr("readonly",false);
                $("#privatenoofvarieties"+rowid).attr("readonly",false);
                $("#privatequantity"+rowid).attr("readonly",true);
                $("#privatevalues"+rowid).attr("readonly",false);
                $("#jpcnoofvarieties"+rowid).attr("readonly",false);
                $("#jpcquantity"+rowid).attr("readonly",true);
                $("#jpcvalues"+rowid).attr("readonly",false);

            }
        });

    });
    function deletethisrow(deletethisrow){
        console.log(deletethisrow);
        var rowtodelete = $(this).attr("data-delete-id");
        $("#row"+deletethisrow).remove();
    }

    $('.purchase_id').on('change', function() {

        var rowid = $(this).attr("data-rowid");

        console.log(rowid);
        $("#govtnoofvarieties"+rowid).val("");
        $("#govtquantity"+rowid).val("");
        $("#govtvalues"+rowid).val("");
        $("#coopnoofvarieties"+rowid).val("");
        $("#coopquantity"+rowid).val("");
        $("#coopvalues"+rowid).val("");
        $("#privatenoofvarieties"+rowid).val("");
        $("#privatequantity"+rowid).val("");
        $("#privatevalues"+rowid).val("");
        $("#jpcnoofvarieties"+rowid).val("");
        $("#jpcquantity"+rowid).val("");
        $("#jpcvalues"+rowid).val("");

        if(this.value == "1"){

            $("#govtnoofvarieties"+rowid).attr("readonly",false);
            $("#govtquantity"+rowid).attr("readonly",false);
            $("#govtvalues"+rowid).attr("readonly",false);
            $("#coopnoofvarieties"+rowid).attr("readonly",false);
            $("#coopquantity"+rowid).attr("readonly",false);
            $("#coopvalues"+rowid).attr("readonly",false);
            $("#privatenoofvarieties"+rowid).attr("readonly",false);
            $("#privatequantity"+rowid).attr("readonly",false);
            $("#privatevalues"+rowid).attr("readonly",false);
            $("#jpcnoofvarieties"+rowid).attr("readonly",true);
            $("#jpcquantity"+rowid).attr("readonly",true);
            $("#jpcvalues"+rowid).attr("readonly",true);
            
        }else if(this.value == "2"){

            $("#govtnoofvarieties"+rowid).attr("readonly",true);
            $("#govtquantity"+rowid).attr("readonly",true);
            $("#govtvalues"+rowid).attr("readonly",true);
            $("#coopnoofvarieties"+rowid).attr("readonly",true);
            $("#coopquantity"+rowid).attr("readonly",true);
            $("#coopvalues"+rowid).attr("readonly",true);
            $("#privatenoofvarieties"+rowid).attr("readonly",true);
            $("#privatequantity"+rowid).attr("readonly",false);
            $("#privatevalues"+rowid).attr("readonly",false);
            $("#jpcnoofvarieties"+rowid).attr("readonly",true);
            $("#jpcquantity"+rowid).attr("readonly",false);
            $("#jpcvalues"+rowid).attr("readonly",false);

        }else if(this.value == "3"){
            $("#govtnoofvarieties"+rowid).attr("readonly",true);
            $("#govtquantity"+rowid).attr("readonly",true);
            $("#govtvalues"+rowid).attr("readonly",true);
            $("#coopnoofvarieties"+rowid).attr("readonly",true);
            $("#coopquantity"+rowid).attr("readonly",false);
            $("#coopvalues"+rowid).attr("readonly",false);
            $("#privatenoofvarieties"+rowid).attr("readonly",true);
            $("#privatequantity"+rowid).attr("readonly",false);
            $("#privatevalues"+rowid).attr("readonly",false);
            $("#jpcnoofvarieties"+rowid).attr("readonly",true);
            $("#jpcquantity"+rowid).attr("readonly",true);
            $("#jpcvalues"+rowid).attr("readonly",true);

        }else if(this.value == "4"){

            $("#govtnoofvarieties"+rowid).attr("readonly",false);
            $("#govtquantity"+rowid).attr("readonly",false);
            $("#govtvalues"+rowid).attr("readonly",false);
            $("#coopnoofvarieties"+rowid).attr("readonly",true);
            $("#coopquantity"+rowid).attr("readonly",true);
            $("#coopvalues"+rowid).attr("readonly",true);
            $("#privatenoofvarieties"+rowid).attr("readonly",true);
            $("#privatequantity"+rowid).attr("readonly",true);
            $("#privatevalues"+rowid).attr("readonly",true);
            $("#jpcnoofvarieties"+rowid).attr("readonly",true);
            $("#jpcquantity"+rowid).attr("readonly",true);
            $("#jpcvalues"+rowid).attr("readonly",true);

        }else if(this.value == "5"){

            $("#govtnoofvarieties"+rowid).attr("readonly",false);
            $("#govtquantity"+rowid).attr("readonly",true);
            $("#govtvalues"+rowid).attr("readonly",false);
            $("#coopnoofvarieties"+rowid).attr("readonly",false);
            $("#coopquantity"+rowid).attr("readonly",true);
            $("#coopvalues"+rowid).attr("readonly",false);
            $("#privatenoofvarieties"+rowid).attr("readonly",false);
            $("#privatequantity"+rowid).attr("readonly",true);
            $("#privatevalues"+rowid).attr("readonly",false);
            $("#jpcnoofvarieties"+rowid).attr("readonly",false);
            $("#jpcquantity"+rowid).attr("readonly",true);
            $("#jpcvalues"+rowid).attr("readonly",false);

        }
    });

</script>
@endsection