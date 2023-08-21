@extends('layouts.master')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> User Add</h5>
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
                        <form action="{{url('/superadmin/user/store')}}" method="post" id="useradd" class="row g-3">
                            @csrf
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="row margindiv">
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="username" value="{{ old('username') }}" placeholder="username" required>
                                            <label for="floatingName">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" name="name" value="{{ old('name') }}" placeholder="name" required>
                                            <label for="floatingName">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="floatingName" name="email" value="{{ old('email') }}" placeholder="email" required>
                                            <label for="floatingName">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <select class="form-control" id="region_id" name="region_id" value="{{ old('region_id') }}" required>
                                                  <option value="">SELECT</option>
                                                  @foreach($mtr_region as $region)
                                                    <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                                  @endforeach
                                                </select>
                                                  <label for="floatingName">Region</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <select class="form-control" id="circle_id" name="circle_id" value="{{ old('circle_id') }}" required>
                                                  
                                                </select>
                                                  <label for="floatingName">Circle</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row margindiv">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <select class="form-control" id="society_id" name="society_id" value="{{ old('society_id') }}" required>
                                                 
                                                </select>
                                                  <label for="floatingName">Society</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <div class="form-floating">
                                                <select class="form-control" id="role" name="role" value="{{ old('role') }}" required>
                                                    <option value="">SELECT</option>
                                                    @foreach($mtr_role as $role)
                                                      <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                    @endforeach
                                                </select>
                                                  <label for="floatingName">Role</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="usersubmit">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection