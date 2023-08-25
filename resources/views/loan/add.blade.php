@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Loan Disbursal and collecton</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Loan</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                  <h5 class="card-title">Issue of Loan and Collection</h5>
                  <form action="{{url('/society/loan/store')}}" method="post" id="loanform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="loandate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-responsive table-bordered datatable">
                                <thead style="text-align: center">
                                <tr>
                                    <th scope="col" rowspan="2">Type of Loan</th>
                                    <th scope="col" colspan="2" rowspan="1">Issue of Loan</th>
                                    <th scope="col" colspan="2" rowspan="1">Collection of Loan</th>
                                    <th scope="col" rowspan="2">Action</th>
                                </tr>
                                <tr>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                                  <th scope="col" >No. of Loan</th>
                                  <th scope="col" >Amount of Loan</th>
                              </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr data-id="1" id="row1">
                                        <td>
                                            <select class="form-control" id="floatingName" name="loantype_id[]" value="{{ old('loantype_id') }}">
                                                <option value="">--SELECT--</option>
                                                @foreach($mtr_loan as $loan)
                                                    <option value="{{ $loan->id }}">{{ $loan->loantype }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="floatingName"  name="disbursedno[]" value="{{ old('disbursedno[]') }}"  required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="floatingName"  name="disbursedamount[]" value="{{ old('disbursedamount[]') }}"  required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="floatingName"  name="collectedno[]" value="{{ old('collectedno[]') }}"  required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="floatingName"  name="collectedamount[]" value="{{ old('collectedamount[]') }}" required>
                                        </td>
                                        <td>
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
                                <button type="submit" class="btn btn-primary" id="loansubmit">Preview</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                  </form
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
        var html = '<tr data-id="'+updatedrowadded+'" id="row'+updatedrowadded+'"> <td> <select class="form-control" id="floatingName" name="loantype_id[]" ><option value="">--SELECT--</option> <?php foreach($mtr_loan as $loan){ ?> <option value="<?php echo $loan->id ?>"><?php echo $loan->loantype ?></option> <?php } ?> </select> </td> <td> <input type="text" class="form-control" id="floatingName"  name="disbursedno[]"  required> </td> <td> <input type="text" class="form-control" id="floatingName"  name="disbursedamount[]"  required> </td> <td> <input type="text" class="form-control" id="floatingName"  name="collectedno[]"  required> </td> <td> <input type="text" class="form-control" id="floatingName"  name="collectedamount[]"  required> </td> <td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';
        console.log(html);
        $("#tbody").append(html);
        $("#rowadded").val(updatedrowadded);
    });
    function deletethisrow(deletethisrow){
        console.log(deletethisrow);
        var rowtodelete = $(this).attr("data-delete-id");
        $("#row"+deletethisrow).remove();
    }
</script>
@endsection
