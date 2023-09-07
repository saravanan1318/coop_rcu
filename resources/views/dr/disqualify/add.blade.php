@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>DR Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dr/disqualify/add">Dashboard</a></li>
        <li class="breadcrumb-item">36-Disqualification</li>
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

                <form action="{{url("/dr/disqualify/store")}}" method="post" id="disqualifyform" class="row g-3">
                    @csrf
                        <div class="col-md-12" style="margin-top: 10px">

                                      <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">OB</th>
                                        <th colspan="2">Initiated during the month</th>
                                        <th colspan="2">Total</th>
                                        <th colspan="2">Disposed this month</th>
                                        <th colspan="2">Pending at the end of the month</th>
                                        <th colspan="2">Pending Percentage</th>

                                    </tr>
                                    <tr>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                        <th>No. of Societies</th>
                                        <th>No. of Board of Directors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="societies_ob" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_ob" class="form-control" required></td>
                                        <td><input type="text" name="societies_im" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_im" class="form-control" required></td>
                                        <td><input type="text" name="societies_total" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_total" class="form-control" required></td>
                                        <td><input type="text" name="societies_dam" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_dam" class="form-control" required></td>
                                        <td><input type="text" name="societies_pam" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_pam" class="form-control" required></td>
                                        <td><input type="text" name="societies_pp" class="form-control" required></td>
                                        <td><input type="text" name="board_of_directors_pp" class="form-control" required></td>
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
</main><!-- End #main -->
@endsection
