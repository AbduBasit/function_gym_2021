<style>
    .bootstrap-select.form-control-lg .dropdown-toggle {
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trainer</a></li>
            <li class="breadcrumb-item active"><a href="create-trainer">Add Trainer</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create a New Trainer</h4>
                </div>
                <div class="card-body h-100">
                    <form action="/create-trainer" method="POST" enctype="multipart/form-data">


                        <div>
                            @csrf

                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Personal Information</h4>
                                    <hr />
                                </div>
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">First Name*</label>
                                            <input type="text" name="firstName" class="form-control" placeholder="Asim" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Azher">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input type="email" class="form-control" name="email" placeholder="abc@xyz.com" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" name="phoneNumber" class="form-control" placeholder="0300-XXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" name="place" class="form-control" placeholder="101 House, Street 1A, Area, City">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control" placeholder="42874-7358088-1">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Fixed Salary</label>
                                            <input type="text" name="fixed_salary" placeholder="50000" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Commision Percentage</label>
                                            <input type="number" min="0" max="100" name="commision" placeholder="10%" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing In</label>
                                            <input type="text" name="tin" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing Out</label>
                                            <input type="text" name="tout" class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="tfile" class="custom-file-input" id="trainer-img">
                                                <label class="custom-file-label" for="trainer-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            <div class="row float-right mr-3 mt-5">
                                <button type="submit" class="btn btn-primary dark">Create Trainer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection