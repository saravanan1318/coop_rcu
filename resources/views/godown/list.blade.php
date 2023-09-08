@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Godown</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/society/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Godown</li>
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
                        <h5 class="card-title"></h5>
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Count</th>
                                        <th scope="col">Capacity (Metric Ton) </th>
                                        <th scope="col">Utilised</th>
                                        <th scope="col">Utilised (%).</th>
                                        <th scope="col">Income in Rental</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($godowns as $godown)
                                    <tr>
                                        <th scope="row">{{ $godown->id }}</th>
                                        <td>{{ $godown->godowndate }}</td>
                                        <td>{{ $godown->count }}</td>
                                        <td>{{ $godown->capacity }}</td>
                                        <td>{{ $godown->utilized }}</td>
                                        <td>{{ $godown->percentageutilized }}</td>
                                        <td>{{ $godown->income }}</td>
                                        {{-- <td><a href='/society/godown/edit/{{$godown->id}}'>view</a></td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                {!! $godowns->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection
