<style>
    .bootstrap-select.form-control border-light-lg .dropdown-toggle {
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }
</style>

{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
@if(session('user'))
<div class="alert alert-success" role="alert">
    <strong>Success! </strong>Data Inserted Successfully.
</div>

@elseif(session('error'))
<div class="alert alert-success" role="alert">
    <strong>Error! </strong>Something went wrong!.
</div>

@endif

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active"><a href="create-trainer">Update Trainer</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Trainer</h4>
                </div>
                <div class="card-body h-100">
                    <form action="/update_user_data" method="POST" enctype="multipart/form-data">    
                        <div>
                            @csrf
                            <input type="text" value="{{$data->id}}" name="id" hidden>
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Personal Information</h4>
                                    <hr />
                                </div>
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Name*</label>
                                            <input type="text" name="name" value="{{$data->user_name}}" class="form-control border-light" placeholder="Asim Azhar" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input value="{{$data->email}}" type="email" class="form-control border-light" name="email_user" placeholder="abc@xyz.com" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" value="{{$data->phone}}" name="phone" class="form-control border-light" placeholder="0300-XXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Password* </label>
                                            <input type="password" value="{{$data->password}}" required name="passwoRd" class="form-control border-light">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" value="{{$data->address}}" name="place" class="form-control border-light" placeholder="101 House, Street 1A, Area, City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Roles</label>
                                              <select class="form-control border-light" required name="roles">
                                                  <option value="{{$data->roles}}" hidden>{{$data->roles}}</option>
                                                <option value="user">User (Secondary)</option>
                                                <option value="admin">Admin (Primary)</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" value="{{$data->dob}}" name="dob" class="form-control border-light">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Joining</label>
                                            <input type="date" name="doj" value="{{$data->doj}}"class="form-control border-light">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" value="{{$data->cnic}}" class="form-control border-light" placeholder="42xxx-xxxxxx-x">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Fixed Salary</label>
                                            <input type="text" name="fixed_salary" value="{{$data->salary}}" placeholder="50000" class="form-control border-light" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing In</label>
                                            <input type="time" name="tin" value="{{$data->t_in}}" class="form-control border-light">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing Out</label>
                                            <input type="time" name="tout" value="{{$data->t_out}}" class="form-control border-light">
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" value="{{$data->image}}" name="image" class="custom-file-input" id="user-img">
                                                <label class="custom-file-label" for="user-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            <div class="row float-right mr-3 mt-5">
                                <button type="submit" class="btn btn-primary dark">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection