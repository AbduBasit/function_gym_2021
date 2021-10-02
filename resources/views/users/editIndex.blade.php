<style>
    .bootstrap-select.form-control border-light-lg .dropdown-toggle {
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }
</style>
<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
            <li class="breadcrumb-item active"><a href="create-user">Add users</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create a New User</h4>
                </div>
                <div class="card-body h-100">
                    <form action="/create-user_data" method="POST" enctype="multipart/form-data">    
                        <div>
                            @csrf

                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4><strong>Personal Information</strong></h4>
                                    <hr />
                                </div>
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Name*</label>
                                            <input type="text" value="{{$data->user_name}}" name="name" class="form-control border-light" placeholder="Asim Azhar" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" name="phone" value="{{$data->phone}}" class="form-control border-light" placeholder="0300-XXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" name="place" value="{{$data->address}}" class="form-control border-light" placeholder="101 House, Street 1A, Area, City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" name="dob" value="{{$data->dob}}" class="form-control border-light">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" value="{{$data->cnic}}" class="form-control border-light" placeholder="42xxx-xxxxxx-x">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" value="{{$data->image}}" class="custom-file-input" id="user-img">
                                                <label class="custom-file-label" for="user-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4><strong>Login Information</strong></h4>
                                    <hr />
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input type="email" value="{{$data->email}}" class="form-control border-light" name="email_user" placeholder="abc@xyz.com" required>
                                        </div>
                                    </div>
 
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Password* </label>
                                          
                                              <div class="input-group mb-3" id="show_hide_password">
                                                <input type="password" class="form-control" placeholder="Password" value="{{$data->password}}" name="passwoRd">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                                                  </div>
                                              </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Roles</label>
                                              <select class="form-control border-light" required name="roles">
                                                  <option value="{{$data->roles}}">{{$data->roles}}</option>
                                                <option value="user">User (Secondary)</option>
                                                <option value="admin">Admin (Primary)</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4><strong>Designation Details</strong></h4>
                                    <hr />
                                </div>
                                   <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Designation</label>
                                            <input type="text" name="designation" value="{{$data->designation}}" class="form-control border-light">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Joining</label>
                                            <input type="date" name="doj" value="{{$data->doj}}" class="form-control border-light">
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
                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <input type="text" value="{{$data->t_in}}" class="form-control clock-n" name="tin"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing Out</label>
                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <input type="text" value="{{$data->t_out}}" class="form-control clock-n" name="tin"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            <div class="row float-right mr-3 mt-5">
                                <button type="submit" class="btn btn-primary dark">Updates User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection