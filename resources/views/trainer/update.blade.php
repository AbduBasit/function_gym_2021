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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trainers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Trainer</a></li>
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
                    <form action="/update_trainer" method="POST" enctype="multipart/form-data">


                        <div>
                            @csrf
                            <input type="text" name="id" hidden value={{$datas->id}}>
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Personal Information</h4>
                                    <hr />
                                </div>
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">First Name*</label>
                                            <input type="text" value={{$datas->first_name}} name="firstName" class="form-control" placeholder="Asim" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Last Name</label>
                                            <input type="text" name="lastName" value={{$datas->last_name}} class="form-control" placeholder="Azher">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input type="email" class="form-control" value={{$datas->email}} name="email" placeholder="abc@xyz.com" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" name="phoneNumber" value={{$datas->phone_number}} class="form-control" placeholder="0300-XXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" name="place" value={{$datas->address}} class="form-control" placeholder="101 House, Street 1A, Area, City">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" name="dob" value={{$datas->date_of_birth}} class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" value={{$datas->cnic}} class="form-control" placeholder="42874-7358088-1">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Fixed Salary</label>
                                            <input type="text" name="fixed_salary" value={{$datas->fixed_salary}} placeholder="50000" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Commision Percentage</label>
                                            <input type="number" min="0" max="100" value="{{$datas->commision}}" name="commision" placeholder="10%" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing In</label>
                                            <input type="text" name="tin" value={{$datas->timing_in}} class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing Out</label>
                                            <input type="text" name="tout" value={{$datas->timing_out}} class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="tfile" value="value={{$datas->image}}" class="custom-file-input" id="trainer-img">
                                                <label class="custom-file-label" for="trainer-img">{{$datas->image}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            <div class="row float-right mr-3 mt-5">
                                <button type="submit" class="btn btn-primary dark">Update Trainer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection