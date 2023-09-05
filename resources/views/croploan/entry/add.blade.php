@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Crop Loan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Crop Loan</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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
                        <form action="{{url('/society/croploan/store')}}" method="post" id="cropform" class="row g-3">
                            @csrf
                              <div class="row margindiv">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                    <input type="date" class="form-control" id="floatingName" name="croploandate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                                    <label for="floatingName">Date</label>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="noofappreceived" name="noofappreceived" required>
                                        <label for="floatingName">Appl received(Nos)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="noofappsanctioned" name="noofappsanctioned" required>
                                        <label for="floatingName">Appl sanctioned(Nos)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="noofapppending" name="noofapppending" required>
                                        <label for="floatingName">Appl pending(Nos)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="totalcultivatedarea" name="totalcultivatedarea" required>
                                        <label for="floatingName">Total Cultivable Area</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="cultivatedarealoanissuedto" name="cultivatedarealoanissuedto" required>
                                        <label for="floatingName">Out of which Loan issued to</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="outstandingno" name="outstandingno" required>
                                        <label for="floatingName">Outstanding No.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="outstandingamount" name="outstandingamount" required>
                                        <label for="floatingName">Outstanding Amount</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="overdueno" name="overdueno" required>
                                        <label for="floatingName">Overdue No.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="overdueamount" name="overdueamount" required>
                                        <label for="floatingName">Overdue Amount.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 table-responsive" style="margin-top: 10px">
                                    <table class="table table-responsive table-bordered">
                                        <thead style="text-align: center">
                                        <tr>
                                            <th scope="col" rowspan="2">Type of Crop</th>
                                            <th scope="col" colspan="3" rowspan="1">Issue of Loan</th>
                                            <th scope="col" colspan="2" rowspan="1">New Members</th>
                                            <th scope="col" colspan="2" rowspan="1">SC / ST</th>
                                            <th scope="col" colspan="2" rowspan="1">Women</th>
                                            <th scope="col" colspan="2" rowspan="1">SF / MF</th>
                                            <th scope="col" colspan="2" rowspan="1">OF</th>
                                            <th scope="col" rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                          <th scope="col" >Area covered</th>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                          <th scope="col" >No. of Loan</th>
                                          <th scope="col" >Amount of Loan</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            <tr data-id="1" id="row1">
                                                <td>
                                                    <select class="form-control" id="crop_id1" name="crop_id[]" style=" width: 150px; ">
                                                        <option value="">--SELECT--</option>
                                                        @foreach($mtr_crop as $crop)
                                                            <option value="{{ $crop->id }}">{{ $crop->crop_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="noofloan1"  name="noofloan[]" value="0"  required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="noofamount1"  name="noofamount[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="areacovered1"  name="areacovered[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="newmembernoofloan1"  name="newmembernoofloan[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="newmembernoofamount1"  name="newmembernoofamount[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="scstnoofloan1"  name="scstnoofloan[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="scstnoofamount1"  name="scstnoofamount[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="womennoofloan1"  name="womennoofloan[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="womennoofamount1"  name="womennoofamount[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="sfmfnoofloan1"  name="sfmfnoofloan[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="sfmfnoofamount1"  name="sfmfnoofamount[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="ofnoofloan1"  name="ofnoofloan[]" value="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" style=" width: 150px; " id="ofnoofamount1"  name="ofnoofamount[]" value="0" required>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-10">
        
                                </div>
                                <div class="col-md-2 margindiv">
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
                                                  <button type="submit" class="btn btn-primary" id="loansubmit">Submit</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div><!-- End Large Modal-->
                                    </div>
                                </div>
                                <div class="col-md-4">
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
        var html = '<tr data-id="'+updatedrowadded+'" id="row'+updatedrowadded+'"> <td> <select class="form-control crop_id" data-rowid="'+updatedrowadded+'" style=" width: 150px; " id="crop_id'+updatedrowadded+'" name="crop_id[]" required> <option value="">SELECT</option> <?php foreach($mtr_crop as $crop){ ?> <option value="<?php echo $crop->id ?>"><?php echo $crop->crop_name ?></option> <?php } ?> </select> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="noofloan'+updatedrowadded+'"  name="noofloan[]" value="0"  required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="noofamount'+updatedrowadded+'"  name="noofamount[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="areacovered'+updatedrowadded+'"  name="areacovered[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="newmembernoofloan'+updatedrowadded+'"  name="newmembernoofloan[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="newmembernoofamount'+updatedrowadded+'"  name="newmembernoofamount[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="scstnoofloan'+updatedrowadded+'"  name="scstnoofloan[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="scstnoofamount'+updatedrowadded+'"  name="scstnoofamount[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="womennoofloan'+updatedrowadded+'"  name="womennoofloan[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="womennoofamount'+updatedrowadded+'"  name="womennoofamount[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="sfmfnoofloan'+updatedrowadded+'"  name="sfmfnoofloan[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="sfmfnoofamount'+updatedrowadded+'"  name="sfmfnoofamount[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="ofnoofloan'+updatedrowadded+'"  name="ofnoofloan[]" value="0" required> </td> <td> <input type="text" class="form-control" style=" width: 150px; " id="ofnoofamount'+updatedrowadded+'"  name="ofnoofamount[]" value="0" required> </td> <td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';
        console.log(html);
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);
    });
    function deletethisrow(deletethisrow){
        console.log(deletethisrow);
        var rowtodelete = $(this).attr("data-delete-id");
        $("#row"+deletethisrow).remove();
    }
    function forminputsappend(){

        $("#forminputs").html("");

        var html = '<table class="table table-responsive table-bordered"> <thead style="text-align: center"> <tr> <th scope="col" rowspan="2">Type of Crop</th> <th scope="col" colspan="3" rowspan="1">Issue of Loan</th> <th scope="col" colspan="2" rowspan="1">New Members</th> <th scope="col" colspan="2" rowspan="1">SC / ST</th> <th scope="col" colspan="2" rowspan="1">Women</th> <th scope="col" colspan="2" rowspan="1">SF / MF</th> <th scope="col" colspan="2" rowspan="1">OF</th> </tr> <tr> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> <th scope="col" >Area covered</th> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> <th scope="col" >No. of Loan</th> <th scope="col" >Amount of Loan</th> </tr> </thead>';
        var  arraycount = parseInt($("#rowadded").val())+1;
        console.log(arraycount);
        for(var i=1; i<arraycount; i++){
            console.log(arraycount);
            var crop_id = $("#crop_id" + i + " option:selected").text();
            var noofloan = $("#noofloan"+i).val();
            var noofamount = $("#noofamount"+i).val();
            var areacovered = $("#areacovered"+i).val();
            var newmembernoofloan = $("#newmembernoofloan"+i).val();
            var newmembernoofamount = $("#newmembernoofamount"+i).val();
            var scstnoofloan = $("#scstnoofloan"+i).val();
            var scstnoofamount = $("#scstnoofamount"+i).val();
            var womennoofloan = $("#womennoofloan"+i).val();
            var womennoofamount = $("#womennoofamount"+i).val();
            var sfmfnoofloan = $("#sfmfnoofloan"+i).val();
            var sfmfnoofamount = $("#sfmfnoofamount"+i).val();
            var ofnoofloan = $("#ofnoofloan"+i).val();
            var ofnoofamount = $("#ofnoofamount"+i).val();
            if (noofloan != undefined) {
                html += '<tr><td>'+crop_id+'</td><td>'+noofloan+'</td><td>'+noofamount+'</td><td>'+areacovered+'</td><td>'+newmembernoofloan+'</td><td>'+newmembernoofamount+'</td><td>'+scstnoofloan+'</td><td>'+scstnoofamount+'</td><td>'+womennoofloan+'</td><td>'+womennoofamount+'</td><td>'+sfmfnoofloan+'</td><td>'+sfmfnoofamount+'</td><td>'+ofnoofloan+'</td><td>'+ofnoofamount+'</td></tr>';
            }
        }

        html += '</tbody></table>';

        $("#forminputs").html(html);

        console.log(html);
    }
</script>
@endsection