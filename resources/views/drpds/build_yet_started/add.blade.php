@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1> DR PDS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/drpds/build_yet_started/add">Dashboard</a></li>
        <li class="breadcrumb-item">Build Yet To Be Started</li>
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

                <form action="{{url("/drpds/build_yet_started/store")}}" method="post" id="identifiedform" class="row g-3">
                    @csrf
                    <div class="row margindiv">
                        <div class="col-md-4">
                            <div class="form-floating">
                            <input type="date" class="form-control" id="floatingName" name="starteddate" placeholder="date" value="{{ date("Y-m-d") }}" required>
                            <label for="floatingName">Date</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No of FPS functioning in Private rental buildings</th>
                                        <th scope="col">No.of places identified for Fair price shop construction</th>
                                        <th scope="col">No of cases Administrative Sanction made by  District Collector (MGNREGA/MLACDS/ MPLADS)</th>
                                        <th Scope="col">Construction Commenced but not yet completed (Nos)</th>
                                        <th scope="col">Construction fully completed (Nos) </th>
                                        <th scope="col">Construction Not yet Commenced (Nos)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="prb" class="form-control" required></td>
                                        <td><input type="text" name="fps" id="action_taken" class="form-control" required></td>
                                        <td><input type="text" name="cas" id="disposal" class="form-control" required></td>
                                        <td><input type="text" name="cc" id="disposal" class="form-control" required></td>
                                        <td><input type="text" name="cfc" id="disposal" class="form-control" required></td>
                                        <td><input type="text" name="cnc" id="disposal" class="form-control" required></td>
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
