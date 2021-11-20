<script src="{{ asset('./js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<style>
.bootstrap-select.form-control-lg .dropdown-toggle {
    border: 0px none !important;
    padding: 0.9rem 1rem !important;
    font-size: 15px !important;
}
.wizard>.steps>ul>li {
    width: 25% !important;
}
.display {
    display: none;
}
.btnlike{
display : none;
}

input.btnlike + span{
background-color : #DDD;
color : #111;
padding: 9px;

width : 100px;
margin : 2px;
font-size: 0.813rem !important;
border-radius: 0.875rem;
font-weight: 500;
text-align-last: center;
display: inline-block;
}

input.btnlike:checked + span{
border-radius: 0.875rem;
font-weight: 500;
font-size: 0.813rem !important;
color: #fff;
background-color: #1b75bc;
border-color: #1b75bc;
}
.ajax-loader {
visibility: hidden;
/*background-color: rgba(255,255,255,0.7);*/
position: absolute;
z-index: +100 !important;
width: 100%;
height:100%;
}
.ajax-loader img {
margin: -15%;
width: 50;
position: relative;
top:50%;
left:50%;
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






                                <h4 class="mb-2 mt-5 ml-2">Account Details</h4>
                                <hr class="mb-4"/>
                                <section id="trainer_assign">
                                    <div class="row pl-2 pr-2">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Date of Joining*</label>
                                                <input type="date" id="doj" name="doj" class="form-control"
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
                                        {{-- <div class="col-lg-3 mb-2 display">
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
                                        </div> --}}
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
                                            <label class="text-label">Dues*</label>
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
                                                <input onchange="change_registration_fee(this)" type="text" id = "reg_fees" name="regfee" class="form-control"
                                                    value="{{ $datas->registration_fees }}" placeholder="3000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Gym Fee*</label>
                                                <input type="text" name="gymfee" class="form-control"
                                                    value="{{ $datas->gym_fees }}" id="g-fees" onblur="get_fees(this)" placeholder="5000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                @php
                                                    $total_payment = $datas->trainer_fees_per_session*$datas->total_session+$datas->gym_fees+$datas->registration_fees
                                                @endphp
                                                <label class="text-label">Total Payment</label>
                                                <input style = "border:3px solid #3ff50c !important;" readonly type="text" value = "{{$total_payment}}" id = "total_payment" name="total_payment" class="form-control /"
                                                        placeholder="2000">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Advance Payment?</label>
                                                @if ($datas->advnace_allow == '1' || $datas->advnace_allow == 'on')
                                                    <div class="material-switch mt-3">
                                                        <input id="discounttoggle" hidden name="advnace_allow" value="1"
                                                            type="checkbox" checked />
                                                        <label for="discounttoggle" id="toggle-discount"
                                                            class="label-default"></label>
                                                    </div>
                                                @else
                                                    <div class="material-switch mt-3">
                                                        <input id="discounttoggle" hidden name="advnace_allow" value="1"
                                                            type="checkbox" />
                                                        <label for="discounttoggle" id="toggle-discount"
                                                            class="label-default"></label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($datas->advnace_allow == '1' || $datas->advnace_allow == 'on')

                                            <div class="discount1 pl-3 pr-3">
                                                <div class="row">

                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Enter Total of Months</label>
                                                            <input onchange="monthly_payment(this)" type="number" min="0" max="24" name="advance_month"
                                                                value="{{ $datas->advance_month }}" id="total_months"
                                                                placeholder="10" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Discount</label>
                                                            <input onchange="get_discount(this)" type="text" name="discount" placeholder="0"
                                                                id="total-discount" value="{{ $datas->discount }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Total Amount</label>
                                                            <input type="text" name="avance_total" placeholder="0"
                                                                id="avance_total" value="{{ $datas->avance_total }}"
                                                                class=" form-control">
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
                                                            <input onchange="monthly_payment(this)" type="number" min="0" max="24" name="advance_month"
                                                                value="{{ $datas->advance_month }}" id="total_months"
                                                                placeholder="10" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Discount</label>
                                                            <input onchange="get_discount(this)" type="text" name="discount" placeholder="0"
                                                                id="total-discount" value="{{ $datas->discount }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group ">
                                                            <label class="text-label">Total Amount</label>
                                                            <input type="text" name="avance_total" placeholder="0"
                                                                id="avance_total" value="{{ $datas->avance_total }}"
                                                                class="disable form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </section>
                                <div class="display">
                                        <div class="heading-title mt-3">
                                            <h4>Gym Schedule</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 mb-2 display">
                                                <div class="form-group">
                                                    <label class="text-label">Trainer Fee Per Session*</label>
                                                    <input onchange="change_trainer_fee_per_session(this)" type="text" id = "trainfee" value = "{{$datas->trainer_fees_per_session}}" name="trainfee" class="form-control"
                                                        placeholder="2000">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-2 ml-auto display">
                                                <div class="form-group">
                                                    <label class="text-label">Total Session</label>
                                                    <input type="number" name="tsession" id="total_session"
                                                        class="form-control disable" value="{{ $datas->total_session }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                            <input type="hidden" name = "tname" value = "{{$datas->trainer_name}}" id = "tname">
                                            <div class="row">
                                            <div class = "col-md-8">
                                            <table class="table table-outline-danger table-lg-responsive table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Days</th>
                                                    <th style = "width: 25%;">Time Start</th>
                                                    <th style = "width: 25%;">Time End</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    @if ($datas->mon_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" name = "days[]" type="checkbox" id = "monday_btn" value = "monday" checked><span>Monday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="monday_time_in" name="mondaytimein" value = "{{$datas->mon_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="monday_time_out" name="mondaytimeout" value = "{{$datas->mon_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else    
                                                    <td>
                                                    <label><input class="btnlike" name = "days[]" type="checkbox" id = "monday_btn" value = "monday" ><span>Monday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="monday_time_in" name="mondaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="monday_time_out" name="mondaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($datas->tue_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "tuesday_btn" value = "tuesday" checked><span>Tuesday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="tuesday_time_in" name="tuesdaytimein" value = "{{$datas->tue_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="tuesday_time_out" name="tuesdaytimeout" value = "{{$datas->tue_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "tuesday_btn" value = "tuesday"><span>Tuesday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="tuesday_time_in" name="tuesdaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="tuesday_time_out" name="tuesdaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($datas->wed_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "wednesday_btn" value = "wednesday" checked><span>Wednasday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="wednesday_time_in" name="wednesdaytimein" value = "{{$datas->wed_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="wednesday_time_out" name="wednesdaytimeout" value = "{{$datas->wed_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "wednesday_btn" value = "wednesday"><span>Wednasday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="wednesday_time_in" name="wednesdaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="wednesday_time_out" name="wednesdaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($datas->thu_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "thursday_btn" value = "thursday" checked><span>Thursday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="thursday_time_in" name="thursdaytimein" value="{{$datas->thu_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="thursday_time_out" name="thursdaytimeout" value="{{$datas->thu_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else    
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "thursday_btn" value = "thursday"><span>Thursday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="thursday_time_in" name="thursdaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="thursday_time_out" name="thursdaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                <tr>
                                                    @if ($datas->fri_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "friday_btn" value = "friday" checked><span>Friday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="friday_time_in" name="fridaytimein" value = "{{$datas->fri_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="friday_time_out" name="fridaytimeout" value = "{{$datas->fri_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "friday_btn" value = "friday"><span>Friday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="friday_time_in" name="fridaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="friday_time_out" name="fridaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                     @if ($datas->sat_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "saturday_btn" value = "saturday" checked><span>Saturday</span></label>
                                                    {{-- <input type = "checkbox" class="btn btn-md mr-2 btn-primary " id = "sunday_btn" value = "Sunday"> --}}
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="saturday_time_in" name="saturdaytimein" value="{{$datas->sat_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="saturday_time_out" name="saturdaytimeout" value = "{{$datas->sat_end_time}}" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "saturday_btn" value = "saturday"><span>Saturday</span></label>
                                                    {{-- <input type = "checkbox" class="btn btn-md mr-2 btn-primary " id = "sunday_btn" value = "Sunday"> --}}
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="saturday_time_in" name="saturdaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="saturday_time_out" name="saturdaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($datas->sun_allow_pt == 'yes')
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "sunday_btn" value = "sunday" checked><span>Sunday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="sunday_time_in" name="sundaytimein" value="{{$datas->sun_start_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="sunday_time_out" name="sundaytimeout" value = "{{$datas->sun_end_time}}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                    <label><input class="btnlike" type="checkbox" name = "days[]" id = "sunday_btn" value = "sunday"><span>Sunday</span></label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control"  id="sunday_time_in" name="sundaytimein">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group " data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="time" class="form-control "  id="sunday_time_out" name="sundaytimeout" >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    
                                                </tr>
                                            </table>
                                            </div>
                                            <div class = "col-md-4">
                                                <br><br>
                                                <div class="ajax-loader">
                                                <img src="{{ url('images/loading-buffering.gif') }}" class="img-responsive" />
                                                </div>
                                                <h3>Trainers</h3>
                                                <ul class="list-group" id = "sunday-select">
                                                    @foreach ($trainers as $trainer)
                                                        @if($datas->trainer_name == $trainer->id)
                                                            <li class="list-group-item" style = "background-color:blue; color: white;">{{$trainer->first_name." ".$trainer->last_name}}</li>
                                                        @else
                                                            <li class="list-group-item">{{$trainer->first_name." ".$trainer->last_name}}</li>
                                                        @endif
                                                        
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <footer>
                                    <div class="row">
                                        <div class="btn-group ml-auto">
                                            {{-- <a href="{{url('manage-customer')}}" class="btn btn-md ml-auto mt-3 btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> --}}
                                            <button type="submit" class="btn btn-md mt-3 mr-2 btn-primary"><i class="fa fa-clipboard" aria-hidden="true"></i> Update Data</button>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
function sundaysInMonth( m, y, day ) {
        var days = new Date( y,m,0 ).getDate();
        var sundays = [ day - (new Date( m +'/01/'+ y ).getDay()) ];
        for ( var i = sundays[0] + 7; i < days; i += 7 ) {
            sundays.push( i );
        }
        return sundays;
        }
/*Sunday Check*/
$("#sunday_time_in").blur(function(){
    if($('#sunday_btn').is(':checked')){
    var time = document.getElementById('sunday_time_in').value;
    var dt = time
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = string;
    document.getElementById('sunday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_sunday_time')}}",
            data: {
                day:7,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
})
$("#sunday_btn").click(function(){
    /*$("#sunday_btn").css({"color":"#fff", "background-color": "#184aa4", "border-color": "#184aa4" });*/
    if($('#sunday_btn').is(':checked')){
        
        var total_sessions = document.getElementById('tsession').value;
        total_sessions = document.getElementById('tsession').value = parseInt(total_sessions)+1;
        
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_sunday')}}",
            data: {
                day:7
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        
        var total_sessions = document.getElementById('tsession').value;
        document.getElementById('tsession').value = parseInt(total_sessions)-1;
        
        console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('sunday_time_out').value = "";
        document.getElementById('sunday_time_in').value = "";
    } 
    
        

});
/*Saturday Check*/
$("#saturday_time_in").blur(function(){
    if($('#saturday_btn').is(':checked')){
    var time = document.getElementById('saturday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('saturday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_saturday_time')}}",
            data: {
                day:6,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#saturday_btn").click(function(){
    var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var saturday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 7 ).length
    if($('#saturday_btn').is(':checked')){
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+saturday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(saturday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_saturday')}}",
            data: {
                day:6
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        var trainfee = document.getElementById('trainfee').value;
        var total_sessions = document.getElementById('total_session').value;
        document.getElementById('total_session').value = parseInt(total_sessions)-saturday_sessions;
        var total_payment = document.getElementById('total_payment').value;
        document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(saturday_sessions))
        console.log(total_sessions);
        console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('saturday_time_out').value = "";
        document.getElementById('saturday_time_in').value = "";
    } 
    
        

});
/*Friday Check*/
$("#friday_time_in").blur(function(){
    if($('#friday_btn').is(':checked')){
    var time = document.getElementById('friday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('friday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_friday_time')}}",
            data: {
                day:5,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#friday_btn").click(function(){
    var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var friday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 6 ).length
    if($('#friday_btn').is(':checked')){
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+friday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(friday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_friday')}}",
            data: {
                day:5
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        var trainfee = document.getElementById('trainfee').value;
            var total_sessions = document.getElementById('total_session').value;
            document.getElementById('total_session').value = parseInt(total_sessions)-friday_sessions;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(friday_sessions))
            console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('friday_time_out').value = "";
        document.getElementById('friday_time_in').value = "";
    } 
    
        

});
/*Thursday Check*/
$("#thursday_time_in").blur(function(){
    if($('#thursday_btn').is(':checked')){
    var time = document.getElementById('thursday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('thursday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_thursday_time')}}",
            data: {
                day:4,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#thursday_btn").click(function(){
    var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var thursday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 5 ).length
    if($('#thursday_btn').is(':checked')){
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+thursday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(thursday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_thursday')}}",
            data: {
                day:4
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        var trainfee = document.getElementById('trainfee').value;
        var total_sessions = document.getElementById('total_session').value;
        document.getElementById('total_session').value = parseInt(total_sessions)-thursday_sessions;
        var total_payment = document.getElementById('total_payment').value;
        document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(thursday_sessions))
        console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('thursday_time_out').value = "";
        document.getElementById('thursday_time_in').value = "";
    } 
    
        

});
/*Wednesday Check*/
$("#wednesday_time_in").blur(function(){
    if($('#wednesday_btn').is(':checked')){
    var time = document.getElementById('wednesday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('wednesday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_wednesday_time')}}",
            data: {
                day:3,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#wednesday_btn").click(function(){
    var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var wednesday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 4 ).length
    if($('#wednesday_btn').is(':checked')){ 
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+wednesday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(wednesday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_wednesday')}}",
            data: {
                day:3
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        
        var trainfee = document.getElementById('trainfee').value;
            var total_sessions = document.getElementById('total_session').value;
            document.getElementById('total_session').value = parseInt(total_sessions)-wednesday_sessions;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(wednesday_sessions))
            console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('wednesday_time_out').value = "";
        document.getElementById('wednesday_time_in').value = "";
    } 
    
        

});
/*Tuesday Check*/
$("#tuesday_time_in").blur(function(){
    if($('#tuesday_btn').is(':checked')){
    var time = document.getElementById('tuesday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('tuesday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_tuesday_time')}}",
            data: {
                day:2,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#tuesday_btn").click(function(){
    var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var tuesday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 3 ).length
    if($('#tuesday_btn').is(':checked')){
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+tuesday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(tuesday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_tuesday')}}",
            data: {
                day:2
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        
        var trainfee = document.getElementById('trainfee').value;
            var total_sessions = document.getElementById('total_session').value;
            document.getElementById('total_session').value = parseInt(total_sessions)-tuesday_sessions;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(tuesday_sessions))
            console.log(total_sessions);
        $('#sunday-select').html('');
        document.getElementById('tuesday_time_out').value = "";
        document.getElementById('tuesday_time_in').value = "";
    } 
    
        

});
/*Monday Check*/
$("#monday_time_in").blur(function(){
    if($('#monday_btn').is(':checked')){
    var time = document.getElementById('monday_time_in').value;
    var dt = moment(time,["hh:mm A"]).format("HH:mm");
    console.log(dt)
    var hours = time[0]+time[1];
    var minutes = time[3]+time[4];
    hours = parseInt(hours);
    hours++;
    var string = hours+":"+minutes
    var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
    document.getElementById('monday_time_out').value = dt_out;
    console.log(dt_out)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_monday_time')}}",
            data: {
                day:1,
                time_in:dt,
                time_out:dt_out,
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        alert('Please Select day')
    }
    

})
$("#monday_btn").click(function(){
    var date = document.getElementById('doj').value;
    dateArray = date.split("-");
    var monday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 2 ).length
    if($('#monday_btn').is(':checked')){
        var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+monday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(monday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                console.log(total_sessions);
            }else{
                alert('Please Enter Price Per Session')
                return false;
            }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method : "post",
            dataType: 'json',
            beforeSend: function(){
                $('.ajax-loader').css("visibility", "visible");
            },
            url : "{{route('check_monday')}}",
            data: {
                day:1
            },
            success: function(data){
                console.log(data.trainers)
                $('#sunday-select').html('');
                data.trainers.forEach(value => {
                    
                    if(value.Count == 3){
                        
                    }else if(value.Count == 2){
                        $('#sunday-select').append(
                        '<li  onclick = "get_trainer_id(this)" class="list-group-item trainer_id" style = "background-color:orange; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else if(value.Count == 1){
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:red; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }else{
                        $('#sunday-select').append(
                        '<li onclick = "get_trainer_id(this)" class="list-group-item" style = "background-color:green; color: white;" value = '+value.id+' >'+value.first_name+' '+value.last_name+'</li>'
                        )
                    }
                } )
            
                },
                complete: function(){
                    $('.ajax-loader').css("visibility", "hidden");
                }
        })
    }else{
        
        var trainfee = document.getElementById('trainfee').value;
            var total_sessions = document.getElementById('total_session').value;
            var new_total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)-monday_sessions;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(monday_sessions))
            console.log(total_payment);
        $('#sunday-select').html('');
        document.getElementById('monday_time_out').value = "";
        document.getElementById('monday_time_in').value = "";
    } 
});
function get_fees(gym_fees){
        var reg_fees = document.getElementById('reg_fees').value;
        var trainfee = document.getElementById('trainfee').value;
        var total_sessions = document.getElementById('total_session').value;
        var gym_fees = gym_fees.value;
        console.log(gym_fees.value);
        document.getElementById('total_payment').value = parseInt(reg_fees)+parseInt(gym_fees)+(parseInt(trainfee)*parseInt(total_sessions)) 
    }

function monthly_payment(months){
        var gym_fee = document.getElementById('g-fees').value
        var regfee = document.getElementById('reg_fees').value
        var total_payment = document.getElementById('total_payment').value
        //alert(total_payment)
        var payment = parseInt(total_payment)-parseInt(regfee);
        //var payment = parseInt(total_payment);
        var final_patment = parseInt(payment)*parseInt(months.value)+parseInt(regfee)
        //alert(payment);
        document.getElementById('avance_total').value =final_patment
    }
function get_discount(discount){
        var gym_fee = document.getElementById('g-fees').value
        var regfee = document.getElementById('reg_fees').value
        var total_payment = document.getElementById('total_payment').value
        var total_months = document.getElementById('total_months').value
        //alert(regfee)
        var payment = parseInt(total_payment)-parseInt(regfee);
        //var payment = parseInt(total_payment);
        var final_patment = parseInt(payment)*parseInt(total_months)+parseInt(regfee)
        //var total_amount = document.getElementById('avance_total').value
        //total_payment = (parseInt(gym_fee)*parseInt(total_months))+parseInt(regfee)
        discount = ((discount.value /100 ) * final_patment);
        console.log(discount)
        document.getElementById('avance_total').value = final_patment-discount;
    }
function change_registration_fee(reg_fees){
        var trainfee = document.getElementById('trainfee').value;
        var total_sessions = document.getElementById('total_session').value;
        var gym_fees = document.getElementById('g-fees').value;
        var reg_fees = reg_fees.value;
        document.getElementById('total_payment').value = parseInt(reg_fees)+parseInt(gym_fees)+(parseInt(trainfee)*parseInt(total_sessions)) 
    }
function change_trainer_fee_per_session(trainfee){
        var trainfee = trainfee.value;
        var total_sessions = document.getElementById('total_session').value;
        var gym_fees = document.getElementById('g-fees').value;
        var reg_fees = document.getElementById('reg_fees').value;
        document.getElementById('total_payment').value = parseInt(reg_fees)+parseInt(gym_fees)+(parseInt(trainfee)*parseInt(total_sessions)) 
    }
function get_trainer_id(id){
        if(id.style.backgroundColor == 'red' || id.style.backgroundColor == 'orange'){
            alert('x');
            $('#select_training').html('');
            $('#select_training').append(
                            '<option value = "Semi PT" selected>Semi Personal Training(Semi PT)</select>'
                            )
                
            }else{
                $('#select_training').html('');
                $('#select_training').append(
                            '<option value = "PT" selected>Personal Training(PT)</select>'
                            )
            }
        var previous_color = id.style.backgroundColor;
        if(!sessionStorage.getItem("Previous_color")){
            sessionStorage.setItem("Previous_color", previous_color);
        }
        console.log(sessionStorage.getItem("Previous_color"));
        if(previous_color == "blue"){
            id.style.backgroundColor = sessionStorage.getItem("Previous_color");
        }else{
            sessionStorage.setItem("Previous_color", previous_color);
            id.style.backgroundColor = "blue";
        }
        document.getElementById('tname').value = id.value;
        

    }
</script>


@endsection
