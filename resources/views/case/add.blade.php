@extends('layouts.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"  />

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Office Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/office/case/add">Dashboard</a></li>
                    <li class="breadcrumb-item">Court Case</li>
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

                            <form action="{{url("/office/case/store")}}" method="post" id="cmform" class="row g-3">
                                @csrf
                                <div class="row margindiv">
                                    <div class="col-4 mt-4"><label>Region</label>
                                        <select class="form-control" name="region" required>
                                            <option value="">Please select Region</option>
                                            @foreach($region as $regionvalue)
                                                <option value="{{$regionvalue->id}}">{{$regionvalue->region_name}}</option>
                                            @endforeach
                                        </select></div>
                                    <div class="col-4 mt-4"><label>Type of Case</label>
                                        <select class="form-control" name="type_of_case" required>
                                            <option value="">Please select Type</option>
                                            @foreach($typeofcase as $value)
                                                <option value="{{$value->id}}">{{$value->typename}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Case Number</label>
                                        <input type="text" required class="form-control" name="case_no">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>years</label>
                                        <input type="Number" required class="form-control" name="year">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Petitioner</label>
                                        <input type="text" required class="form-control" name="petitioner">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Respondents</label>
                                        <select class="form-control" name="respondents" required>
                                            <option value="">Please select respondents</option>
                                            @foreach($respondents as $value)
                                                <option value="{{$value->id}}">{{$value->respondentValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Subject of Case</label>
                                        <select class="form-control" name="subject_of_case" required>
                                            <option value="">Please select respondents</option>
                                            @foreach($subjectofcase as $value)
                                                <option value="{{$value->id}}">{{$value->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Prayer</label>
                                        <input type="text" required class="form-control" name="prayer">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Counter filed </label>
                                        <select class="form-control" name="counter_filed" required>
                                            <option value="">Please select respondents</option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>If Yes, Counter filed date </label>
                                        <input type="date"  class="form-control" name="counter_filed_date">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>If No, Reason </label>
                                        <input type="text"  class="form-control" name="no_reason">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Whether any Interim Stay given </label>
                                        <select class="form-control" name="interim_stay" required>
                                            <option value="">Please select respondents</option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>If Yes, Order details</label>
                                        <input type="text" class="form-control" name="order_details">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Final Judgement </label>
                                        <select class="form-control" name="final_judgement" required>
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>If direction is issued whom to comply with time  limit  </label>
                                        <input type="text" required class="form-control" name="direction_to_comply">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>Whether complied  </label>
                                        <select class="form-control" name="complied" required>
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label>If any Writ Appeal</label>
                                        <select class="form-control" name="writ_appeal" required>
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label> If yes  filed by whom and Writ Appeal No.</label>
                                        <input type="text"  class="form-control" name="writ_appeal_details">
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label> Whether stay obtained  to Writ Petition </label>
                                        <select class="form-control" name="writ_appeal_stay" required>
                                            <option value="">Please select </option>
                                            @foreach($yesorno as $value)
                                                <option value="{{$value->value}}">{{$value->ShowValue}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <label> Writ appeal stage </label>
                                        <textarea class="form-control" name="writ_appeal_stage" cols="2"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@endsection<!-- End #main -->
