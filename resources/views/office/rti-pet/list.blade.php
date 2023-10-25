@extends('layouts.master')
@php
    function removeDuplicatesFromString($inputString) {
        // Convert the string to an array of characters
        $stringArray = explode(",",$inputString);

        // Remove duplicates by using array_unique
        $uniqueArray = array_unique($stringArray);

        // Convert the unique array back to a string
        $resultString = implode(',', $uniqueArray);

        return $resultString;
    }

    // Example usage:
    $inputString = "hello";
    $result = removeDuplicatesFromString($inputString);
    echo $result; // Output: "helo"

@endphp
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>RTI - PETITION</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/office/cm/list">Dashboard</a></li>
        <li class="breadcrumb-item">RTI - PETITION</li>
        <li class="breadcrumb-item">List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">RTI - PETITIONS</h5>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-4">
                            <!-- Add button can be placed here -->
                        </div>
                    </div>

                    {{-- Success Message --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-4">
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                <div class="col-md-12" style="margin-top: 10px">
                <table class="table table-responsive table-bordered datatable">
                <thead style="text-align: center">
                    <tr>
                        <th scope="col">Name of the Petitioner</th>
                        <th scope="col">District</th>
                        <th scope="col">Date of Petition received </th>
                        <th scope="col">RTI Petition File No.</th>
                        <th scope="col">Forwarded to Section, Region, Other Department 6(3)</th>
                        <th scope="col">Forwarded Section</th>
                        <th scope="col">Forwarded Region</th>
                        <th scope="col">Forwarded Value</th>
                        <th scope="col">PIO to whom transferred</th>
                        <th scope="col">Date of Disposal of Petition</th>
{{--                        <th scope="col">Closure</th>--}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rti as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->region_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->petitionrecieved)->format('d-m-Y') }}</td>
                        <td>{{ $data->fileNo }}</td>
                        <td>{{ $data->frwdsectionType }}</td>
                        <td>{{ (!empty($data->frwdsection_names)?removeDuplicatesFromString($data->frwdsection_names):"")}}</td>
                        <td>{{ !empty($data->fwd_region_names)?removeDuplicatesFromString($data->fwd_region_names):"" }}</td>
                        <td>{{ $data->frwdother }}</td>
                        <td>{{ $data->whompassed }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->disposaldateofpetition)->format('d-m-Y') }}</td>
{{--                        <td>{{ $data->closure }}</td>--}}
                        <td><a class="btn btn-warning" href="edit/{{$data->id}}">Edit</a></td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
             </div>
        </div>
        </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
