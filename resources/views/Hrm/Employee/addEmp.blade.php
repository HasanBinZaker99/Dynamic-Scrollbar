@extends('master.app')
@section('content')
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <span>Add New Employee</span>
                        </div>
                        <div class="card-body">
                            <form action="{{route('empCreate')}}" class="form-group" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="name">Full Name</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="joining">Date of Joining</label>
                                        <input class="form-control" type="date" name="joining" id="joining">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name">Department</label>
                                        <select class="form-control" name="dept">
                                        <option value="">Select a Department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name">Designation</label>
                                        <select class="form-control" name="designation">
                                        <option value="">Select a Designation</option>
                                        @foreach ($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->designationName}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="name">Role</label>
                                        <select class="form-control" name="role">
                                        <option value="">Select a Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="name">Gender</label>
                                        <select class="form-control" name="gender">
                                        <option value="">Select a Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="joining">Date of birth</label>
                                        <input class="form-control" type="date" name="dob" id="dob">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="image">Photo</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="phone">Phone</label>
                                        <input class="form-control" type="tel" name="phone" id="phone">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dhead">Department Head</label>
                                        <select class="form-control" name="dhead">
                                        <option value="">Select a Department Head</option>
                                        @foreach ($users as $user)
                                        <option value="{{($user->id)}}">{{$user->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-md-3">
                                        <label for="cpassword">Confirm Password</label>
                                        <input class="form-control" type="password" name="cpassword" id="cpassword">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="salary">Basic salary</label>
                                        <input class="form-control" type="text" name="salary" id="salary">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Add"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  @endsection
