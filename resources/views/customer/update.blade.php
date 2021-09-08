<style>
    .bootstrap-select.form-control-lg .dropdown-toggle {
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }

    .wizard>.steps>ul>li {
        width: 25% !important;
    }

</style>

{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    @if (session('user'))
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Customers</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Customer</h4>
                    </div>
                    <div class="card-body h-100">
                        <form action="/update-customer" id="step-form-horizontal" class="step-form-horizontal" method="POST"
                            enctype="multipart/form-data">


                            <div>
                                @csrf
                                <input type="text" value="{{ $datas->id }}" name="id" hidden>
                                <h4>Information</h4>
                                <section class="pl-2 pr-2">
                                    <div class="heading-section mt-lg-2">
                                        <h4>Personal Information</h4>
                                        <hr />
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">First Name*</label>
                                                <input type="text" name="firstName" class="form-control"
                                                    placeholder="Asim" value="{{ $datas->first_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Last Name</label>
                                                <input type="text" name="lastName" class="form-control"
                                                    placeholder="Azher" value="{{ $datas->last_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Email Address*</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="abc@xyz.com" required value="{{ $datas->email }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Phone Number*</label>
                                                <input type="text" name="phoneNumber" class="form-control"
                                                    placeholder="0300-XXXXXXX" required value="{{ $datas->phone_number }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Residential Address</label>
                                                <input type="text" name="place" class="form-control"
                                                    placeholder="101 House, Street 1A, Area, City"
                                                    value="{{ $datas->address }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control"
                                                    value="{{ $datas->date_of_birth }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Select Gender*</label>
                                                <select name="gender" class="form-control form-control-lg" required>
                                                    <option value="{{ $datas->gender }}">{{ $datas->gender }}</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">CNIC</label>
                                                <input type="text" name="cnic" class="form-control"
                                                    placeholder="42874-7358088-1" value="{{ $datas->cnic }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label class="text-label">Upload Image</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="cfile" class="custom-file-input"
                                                        id="customer-img" value="{{ $datas->image }}">
                                                    <label class="custom-file-label" for="customer-img">
                                                        @if ($datas->image)
                                                            {{ $datas->image }}
                                                        @else
                                                            Choose Image
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>






                                <h4>Account Details</h4>
                                <section>
                                    <div class="row pl-2 pr-2">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Date of Joining*</label>
                                                <input type="date" name="doj" class="form-control"
                                                    onchange="dateCalc(this.value, {{ $rul[0]->values }})"
                                                    placeholder="Cellophane Square" value="{{ $datas->date_of_joining }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Month End Date</label>
                                                <input type="text" class="form-control disable" id="month-end"
                                                    value="{{ $datas->month_end }}" name="mde" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Training Type*</label>
                                                <select name="ttype" id="select_training"
                                                    class="form-control form-control-lg" required>
                                                    <option hidden value="{{ $datas->training_type }}">
                                                        {{ $datas->training_type }}</option>
                                                    <option value="PT">Person Training (PT)</option>
                                                    <option value="GT">General Training (GT)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Trainer Name</label>
                                                <select name="tname" id="single-select" class="form-control form-control-lg"
                                                    required>
                                                    <option hidden value="{{ $datas->trainer_name }}">
                                                        {{ $datas->trainer_name }}</option>
                                                    @foreach ($trainers as $trainer)
                                                        <option
                                                            value="{{ $trainer->first_name . ' ' . $trainer->last_name }}">
                                                            {{ $trainer->first_name . ' ' . $trainer->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Status*</label>
                                                <select name="status" class="form-control form-control-lg" required>
                                                    <option hidden value="{{ $datas->status }}">{{ $datas->status }}
                                                    </option>
                                                    <option value="active">Active</option>
                                                    <option value="deactive">Deactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-label">Due Fees*</label>
                                            <select name="fees_status" class="form-control form-control-lg" required>
                                                <option hidden value="{{ $datas->fees_clear }}">{{ $datas->fees_clear }}
                                                </option>
                                                <option value="All Clear">All Clear</option>
                                                <option value="Unpaid">Unpaid</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Reference</label>
                                                <select name="reference" id="single-select"
                                                    class="form-control form-control-lg" required>
                                                    <option hidden value="{{ $datas->reference_name }}">
                                                        {{ $datas->reference_name }}</option>
                                                    @foreach ($trainers as $trainer)
                                                        <option
                                                            value="{{ $trainer->first_name . ' ' . $trainer->last_name }}">
                                                            {{ $trainer->first_name . ' ' . $trainer->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Registration Fee*</label>
                                                <input type="text" name="regfee" class="form-control"
                                                    value="{{ $datas->registration_fees }}" placeholder="3000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Gym Fee*</label>
                                                <input type="text" name="gymfee" class="form-control"
                                                    value="{{ $datas->gym_fees }}" id="g-fees" placeholder="5000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Trainer Fee Per Session*</label>
                                                <input type="text" name="trainfee"
                                                    value="{{ $datas->trainer_fees_per_session }}" class="form-control"
                                                    placeholder="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Total Session</label>
                                                <input type="number" name="tsession" value="{{ $datas->total_session }}"
                                                    class="form-control disable" value="0" disabled>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Advance Payment?</label>
                                                @if ($datas->advnace_allow == ' yes' || $datas->advnace_allow == 'on')
                                                    <div class="material-switch mt-3">
                                                        <input id="discounttoggle" hidden name="advnace_allow" value="yes"
                                                            type="checkbox" checked />
                                                        <label for="discounttoggle" id="toggle-discount"
                                                            class="label-default"></label>
                                                    </div>
                                                @else
                                                    <div class="material-switch mt-3">
                                                        <input id="discounttoggle" hidden name="advnace_allow"
                                                            type="checkbox" />
                                                        <label for="discounttoggle" id="toggle-discount"
                                                            class="label-default"></label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($datas->advnace_allow == ' yes' || $datas->advnace_allow == 'on')

                                            <div class="discount1 pl-3 pr-3">
                                                <div class="row">

                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Enter Total of Months</label>
                                                            <input type="number" min="0" max="24" name="advance_month"
                                                                value="{{ $datas->advance_month }}" id="t-months"
                                                                placeholder="10" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Discount</label>
                                                            <input type="text" name="discount" placeholder="0"
                                                                id="t-discount" value="{{ $datas->discount }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Total Amount</label>
                                                            <input type="text" name="avance_total" placeholder="0"
                                                                id="t-amount" value="{{ $datas->avance_total }}" disabled
                                                                class="disable form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        @else
                                            <div class="discount pl-3 pr-3">
                                                <div class="row">

                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Enter Total of Months</label>
                                                            <input type="number" min="0" max="24" name="advance_month"
                                                                value="{{ $datas->advance_month }}" id="t-months"
                                                                placeholder="10" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Discount</label>
                                                            <input type="text" name="discount" placeholder="0"
                                                                id="t-discount" value="{{ $datas->discount }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Total Amount</label>
                                                            <input type="text" name="avance_total" placeholder="0"
                                                                id="t-amount" value="{{ $datas->avance_total }}" disabled
                                                                class="disable form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </section>
                                <h4>Gym Schedule</h4>
                                <section class="pl-2 pr-2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Monday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->mon_start_time }}"
                                                                    name="mondaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->mon_end_time }}"
                                                                    name="mondaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 pt-0 display">
                                                    <p class="card-text d-inline">Person Training (PT)?</p>
                                                    @if ($datas->mon_allow_pt == 'on' || $datas->mon_allow_pt == 'yes')
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="mondaypt" name="mondaypt" value="yes" hidden
                                                                type="checkbox" checked />
                                                            <label for="mondaypt" class="label-default"></label>
                                                        </div>
                                                    @else
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="mondaypt" name="mondaypt" hidden type="checkbox" />
                                                            <label for="mondaypt" class="label-default"></label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Tuesday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->tue_start_time }}"
                                                                    name="tuesdaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->tue_end_time }}"
                                                                    name="tuesdaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($datas->tue_allow_pt == 'on' || $datas->tue_allow_pt == 'yes')
                                                    <div class="card-footer border-0 pt-0 display">
                                                        <p class="card-text d-inline">Person Training (PT)?</p>
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="tuesdaypt" value="yes" hidden name="tuesdaypt"
                                                                type="checkbox" checked />
                                                            <label for="tuesdaypt" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="card-footer border-0 pt-0 display">
                                                        <p class="card-text d-inline">Person Training (PT)?</p>
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="tuesdaypt" value="yes" hidden name="tuesdaypt"
                                                                type="checkbox" />
                                                            <label for="tuesdaypt" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Wednesday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->wed_start_time }}"
                                                                    name="wednesdaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->wed_end_time }}"
                                                                    name="wednesdaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($datas->wed_allow_pt == 'on' || $datas->wed_allow_pt == 'yes')
                                                    <div class="card-footer border-0 pt-0 display">
                                                        <p class="card-text d-inline">Person Training (PT)?</p>
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="wednesdaypt" value="yes" name="wednesdaypt" checked
                                                                hidden type="checkbox" />
                                                            <label for="wednesdaypt" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="card-footer border-0 pt-0 display">
                                                        <p class="card-text d-inline">Person Training (PT)?</p>
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="wednesdaypt" value="yes" name="wednesdaypt" hidden
                                                                type="checkbox" />
                                                            <label for="wednesdaypt" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>





                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Thursday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->thu_start_time }}"
                                                                    name="thursdaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->thu_start_time }}"
                                                                    name="thursdaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 pt-0 display">
                                                    <p class="card-text d-inline">Person Training (PT)?</p>
                                                    @if ($datas->thu_allow_pt == 'on' || $datas->thu_allow_pt == 'yes')
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="thursdaypt" value="yes" hidden name="thursdaypt"
                                                                checked type="checkbox" />
                                                            <label for="thursdaypt" class="label-default"></label>
                                                        </div>
                                                    @else
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="thursdaypt" value="yes" hidden name="thursdaypt"
                                                                type="checkbox" />
                                                            <label for="thursdaypt" class="label-default"></label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Friday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->fri_start_time }}"
                                                                    name="fridaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->fri_end_time }}"
                                                                    name="fridaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 pt-0 display">
                                                    <p class="card-text d-inline">Person Training (PT)?</p>
                                                    @if ($datas->fri_allow_pt == 'on' || $datas->fri_allow_pt == 'yes')
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="fridaypt" value="yes" name="fridaypt" hidden checked
                                                                type="checkbox" />
                                                            <label for="fridaypt" class="label-default"></label>
                                                        </div>
                                                    @else
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="fridaypt" value="yes" name="fridaypt" hidden
                                                                type="checkbox" />
                                                            <label for="fridaypt" class="label-default"></label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Saturday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->sat_start_time }}"
                                                                    name="saturdaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->sat_start_time }}"
                                                                    name="saturdaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 pt-0 display">
                                                    <p class="card-text d-inline">Person Training (PT)?</p>
                                                    @if ($datas->sat_allow_pt == 'on' || $datas->sat_allow_pt == 'yes')
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="saturdaypt" value="yes" hidden name="saturdaypt"
                                                                checked type="checkbox" />
                                                            <label for="saturdaypt" class="label-default"></label>
                                                        </div>
                                                    @else
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="saturdaypt" value="yes" hidden name="saturdaypt"
                                                                type="checkbox" />
                                                            <label for="saturdaypt" class="label-default"></label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card bg-card-form-customer">
                                                <div class="card-header border-0 pb-0">
                                                    <h5 class="card-title">Sunday</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label>Start Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->sun_start_time }}"
                                                                    name="sundaytimein"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label>End Timming</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $datas->sun_start_time }}"
                                                                    name="sundaytimeout"> <span
                                                                    class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-0 pt-0 display">
                                                    <p class="card-text d-inline">Person Training (PT)?</p>
                                                    @if ($datas->sun_allow_pt == 'on' || $datas->sun_allow_pt == 'yes')
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="sundaypt" hidden name="sundaypt" value="yes" checked
                                                                type="checkbox" />
                                                            <label for="sundaypt" class="label-default"></label>
                                                        </div>
                                                    @else
                                                        <div class="material-switch mt-3 float-right">
                                                            <input id="sundaypt" hidden name="sundaypt" value="yes"
                                                                type="checkbox" />
                                                            <label for="sundaypt" class="label-default"></label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h4>Confirmation</h4>
                                <section>
                                    <div class="checkout-name text-center mt-5 pt-5">
                                        <img src="{{ asset('./images/custom/check.png') }}" alt="check image"
                                            width="100px">
                                        <h1 class="display-5 mt-3">Your Form is Update</h1>
                                        <p class="lead">Check Your Detail again? or Finish Your Process</p>
                                    </div>

                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
