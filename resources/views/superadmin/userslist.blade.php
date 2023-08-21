@extends('layouts.master')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Superadmin Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/superadmin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Users list</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users List</h5>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 mb-4">
                        </div>
                        <div class="col-sm-4 col-md-4 mb-4">
                        </div>
                        <div class="col-sm-4 col-md-4 mb-4">
                            <div class="text-center">
                                <a href="/superadmin/user/add" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                    </div>
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
                    <h5 class="card-title">Users</h5>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-responsive table-bordered datatable" style="text-align: center">
                            <thead>
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Circle</th>
                                    <th scope="col">Society</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->region_id }}</td>
                                    <td>{{ $user->circle_id }}</td>
                                    <td>{{ $user->society_id }}</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection