@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Godown</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Godown</li>
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
                  {{-- <h5 class="card-title">Issue of Loan and Collection</h5> --}}
                  <form action="{{url('/society/godown/store')}}" method="post" id="godownform" class="row g-3">
                    @csrf
                      <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="godowndate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <table class="table table-responsive table-bordered datatable">
                                <thead style="text-align: center">
                                <tr>
                                  <th scope="col" >Count</th>
                                  <th scope="col" >Capacity (in metric Ton)</th>
                                  <th scope="col" >Utilized</th>
                                  <th scope="col" >Utilised (in Percentage)</th>
                                  <th scope="col" >Income In Rental</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr data-id="1" id="row1">
                                        <td>
                                            <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="count1" name="count[]" value="{{ old('count[]') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="capacity1" name="capacity[]" value="{{ old('capacity[]') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="utilized1" name="utilized[]" value="{{ old('utilized[]') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="percentageutilized1" name="percentageutilized[]" value="{{ old('percentageutilized[]') }}" required>
                                        </td>
                                        <td>
                                            <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="income1" name="income[]" value="{{ old('income[]') }}" required>
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
                                          <button type="submit" class="btn btn-primary" id="godownsubmit">Submit</button>
                                        </div>
                                      </div>
                                    </div>
                                </div><!-- End Large Modal-->
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
    //Loan Add new
    $('#addrow').on('click', function() {
        console.log("Add new clicked");
        var rowadded = $("#rowadded").val();
        var updatedrowadded = parseInt(rowadded) + 1;
        var html = ' <tr data-id="'+updatedrowadded+'" id="row'+updatedrowadded+'"> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="count'+updatedrowadded+'" name="count[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="capacity'+updatedrowadded+'" name="capacity[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="utilized'+updatedrowadded+'" name="utilized[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="percentageutilized'+updatedrowadded+'" name="percentageutilized[]" required> </td> <td> <input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  class="form-control"  id="income'+updatedrowadded+'" name="income[]" required> </td> <td> </td><td> <a  class="btn btn-danger deleterow" data-delete-id="'+updatedrowadded+'" onclick="deletethisrow('+updatedrowadded+')" >Delete</a> </td> </tr>';
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

        var html = '<table class="table table-responsive table-bordered datatable"> <thead style="text-align: center"> <tr> <th scope="col" >Count</th> <th scope="col" >Capacity (in metric Ton)</th> <th scope="col" >Utilized</th> <th scope="col" >Utilised (in Percentage)</th> <th scope="col" >Income In Rental</th> </tr> </thead> <tbody id="tbody">';
        var  arraycount = parseInt($("#rowadded").val())+1;
        console.log(arraycount);
        for(var i=1; i<arraycount; i++){
            console.log(arraycount);
            var count =  $("#count"+i).val();
            var capacity = $("#capacity"+i).val();
            var utilized = $("#utilized"+i).val();
            var percentageutilized = $("#percentageutilized"+i).val();
            var income = $("#income"+i).val();
            if (count != undefined) {
                html += '<tr><td>'+count+'</td><td>'+capacity+'</td><td>'+utilized+'</td><td>'+percentageutilized+'</td><td>'+income+'</td></tr>';
            }
        }

        html += '</tbody></table>';

        $("#forminputs").html(html);

        console.log(html);
    }
</script>
@endsection
