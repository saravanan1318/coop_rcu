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
                                        <th scope="col">No of Places yet to be identified for Fair Price Shop construction</th>
                                        <th scope="col">No of cases Administrative Sanction made by  District Collector (MGNREGA/MLACDS/ MPLADS)</th>
                                        <th Scope="col">Construction Commenced but not yet completed (Nos)</th>
                                        <th scope="col">Construction fully completed (Nos) </th>
                                        <th scope="col">Construction Not yet Commenced (Nos)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="prb" id="prb"class="form-control" required></td>
                                        <td><input type="text" name="fps" id="fps" class="form-control" required></td>
                                        <td><input type="text" name="fpsc" id="fpsc" class="form-control" required></td>
                                        <td><input type="text" name="cas" id="cas" class="form-control" required></td>
                                        <td><input type="text" name="cc" id="cc" class="form-control" required></td>
                                        <td><input type="text" name="cfc" id="cfc" class="form-control" required></td>
                                        <td><input type="text" name="cnc" id="cnc" class="form-control" required></td>
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

<script>
    // Get references to the input fields
    const prbInput = document.getElementById("prb");
    const fpsInput = document.getElementById("fps");
    const fpscInput = document.getElementById("fpsc");

    // Add an event listener to prb and fps inputs
    prbInput.addEventListener("input", updateFpsc);
    fpsInput.addEventListener("input", updateFpsc);

    // Function to update fpsc based on prb and fps values
    function updateFpsc() {
        const prbValue = parseFloat(prbInput.value) || 0; // Use 0 if not a valid number
        const fpsValue = parseFloat(fpsInput.value) || 0;
        const fpscValue = prbValue - fpsValue;

        fpscInput.value = fpscValue;
    }

    const casInput = document.getElementById("cas");
        const ccInput = document.getElementById("cc");
        const cfcInput = document.getElementById("cfc");
        const cncInput = document.getElementById("cnc");

        // Add event listeners to all inputs for real-time calculation
        casInput.addEventListener("input", updateCalculations);
        ccInput.addEventListener("input", updateCalculations);
        cfcInput.addEventListener("input", updateCalculations);
        cncInput.addEventListener("input", updateCalculations);

        // Function to update cas based on the sum of cc, cfc, and cnc
        function updateCalculations() {
            const ccValue = parseFloat(ccInput.value) || 0;
            const cfcValue = parseFloat(cfcInput.value) || 0;
            const cncValue = parseFloat(cncInput.value) || 0;
            const total = ccValue + cfcValue + cncValue;
            casInput.value = total;
        }
</script>
@endsection<!-- End #main -->

