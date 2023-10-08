@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>JR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/jr/press/add">Dashboard</a></li>
        <li class="breadcrumb-item">Press</li></li>
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

                <form action="{{url("/jr/press/store")}}" method="post" id="daiform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="pressdate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Number of Printing Press</th>
                                        <th>Development Target</th>
                                        <th>Achievement</th>
                                        <th>Percentage of Achievement</th>
                                        <th>Last year Corresponding period achievement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="npp" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="dt" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="achievement" id="action_taken" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="percentage" id="disposal" class="form-control" required></td>
                                        <td><input  type="number" min="0" step="any" onkeypress="return isNumberKey(event)"  name="lya" id="percentage_of_disposal" class="form-control" required ></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-10">
                            <!-- Other form fields go here -->
                        </div>
                        <div class="col-md-2">
                            <div class="text-center">
                                <input type="hidden" value="1" id="rowadded">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </div>
                        <!-- Rest of your form goes here -->
                    </form>
                </div>
            </div>
        </div>
     </div>
  </section>
</main>
@endsection<!-- End #main -->
