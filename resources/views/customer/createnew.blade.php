<script src="{{ asset('./js/jquery.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#mondaytimein').on('change', ()=>{
            var mon1 = $('#mondaytimein').val();
            // var tue1 = $('#tuesdaytimein').val();
            // var wed1 = $('#wednesdaytimein').val();
            // var thu1 = $('#thursdaytimein').val();
            // var fri1 = $('#fridaytimein').val();
            // var sat1 = $('#saturdaytimein').val();
            // var sun1 = $('#sundaytimein').val();


            let mon_m = mon1.split('')[5] +mon1.split('')[6]
            // let tue_m = tue1.split('')[5] +tue1.split('')[6]
            // let wed_m = wed1.split('')[5] +wed1.split('')[6]
            // let thu_m = thu1.split('')[5] +thu1.split('')[6]
            // let fri_m = fri1.split('')[5] +fri1.split('')[6]
            // let sat_m = sat1.split('')[5] +sat1.split('')[6]
            // let sun_m = sun1.split('')[5] +sun1.split('')[6]



            let mon = mon1.split(':')[0]
            // let tue = tue1.split(':')[0]
            // let wed = wed1.split(':')[0]
            // let thu = thu1.split(':')[0]
            // let fri = fri1.split(':')[0]
            // let sat = sat1.split(':')[0]
            // let sun = sun1.split(':')[0]

            var values = {
                    monday:mon,
                    // tuesday:tue,
                    // wednesday:wed,
                    // thursday:thu,
                    // friday:fri,
                    // saturday:sat,
                    // sunday:sun,

                    monday_m:mon_m,
                    // tuesday_m:tue_m,
                    // wednesday_m:wed_m,
                    // thursday_m:thu_m,
                    // friday_m:fri_m,
                    // saturday_m:sat_m,
                    // sunday_m:sun_m,
                    
            };

            // console.log(values);
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                type: "post",
                url: "{{ route('trainer_check')}}",
                data: values,
                success: function (response) {

                    
                    if(response){
                        response_mon = response[0];
                        for(i=0; i<response_mon.length; i++){

                            console.log(response[0][i])
                        if(response_mon[i]['mon_start']==3){
                            console.log(response_mon[0]['mon_start'] + ' Full');
                        }
                        else if(response_mon[i]['mon_start']==2 ){
                            console.log(response_mon[i]['trainer_name'] + ' only One are input');
                        }
                        else if(response_mon[i]['mon_start']==1){
                            console.log(response_mon[i]['trainer_name'] + ' only two are input');
                        }
                        else if(!response_mon){
                            console.log(response_mon[i]['trainer_name'] + 'Allow input');
                        }
                        else{
                        console.log('Error Secondary');
                        }
                        }
                    }
                    
                }
            });
        })
    });
</script>
<style>
    .bootstrap-select.form-control-lg .dropdown-toggle,
    .new-lg {
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }

    .display {
        display: none;
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
                        <h4 class="card-title">Create a New Customer</h4>
                    </div>
                    <div class="card-body h-100">
                        <form action="/create-customer" id="step-form-horizontal" class="step-form-horizontal" method="POST"
                            enctype="multipart/form-data">


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
                                                <input type="text" name="firstName" class="form-control"
                                                    placeholder="Asim" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Last Name</label>
                                                <input type="text" name="lastName" class="form-control"
                                                    placeholder="Azher">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Email Address*</label>
                                                <input type="email"  class="form-control" name="email"
                                                    placeholder="abc@xyz.com" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Phone Number*</label>
                                                <input type="text" name="phoneNumber" class="form-control"
                                                    placeholder="0300-XXXXXXX" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Residential Address</label>
                                                <input type="text" name="place" class="form-control"
                                                    placeholder="101 House, Street 1A, Area, City">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Select Gender*</label>
                                                <select name="gender" class="form-control form-control-lg" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">CNIC</label>
                                                <input type="text" name="cnic" class="form-control"
                                                    placeholder="42874-7358088-1">
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
                                                        id="customer-img">
                                                    <label class="custom-file-label" for="customer-img">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               





                                <h4 class="mb-2 mt-5 ml-2">Account Details</h4>
                                <hr class="mb-4"/>
                              
                                    <div class="row pl-2 pr-2">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Date of Joining*</label>
                                                <input type="date" name="doj" class="form-control"
                                                    onchange="dateCalc(this.value, 0)"
                                                    placeholder="Cellophane Square" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Month End Date</label>
                                                <input type="text" class="form-control disable" id="month-end" name="mde"
                                                    value="undefine" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Training Type*</label>
                                                <select name="ttype" id="select_training"
                                                    class="form-control form-control-lg" required>
                                                    <option value="GT">General Training (GT)</option>
                                                    <option value="PT">Person Training (PT)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Trainer Name</label>
                                                <select name="tname" id="single-select"
                                                    class="form-control new-lg form-control-lg" required>
                                                    <option hidden>Select Trainer</option>
                                                    @foreach ($trainers as $trainer)
                                                        <option
                                                            value="{{ $trainer->first_name . ' ' . $trainer->last_name }}">
                                                            {{ $trainer->first_name . ' ' . $trainer->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Status*</label>
                                                <select name="status" class="form-control form-control-lg" required>
                                                    <option hidden>Select status</option>
                                                    <option value="active">Active</option>
                                                    <option value="deactive">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Dues*</label>
                                                <select name="fees_status" class="form-control form-control-lg" required>
                                                    <option hidden>Select status</option>
                                                    <option value="All Clear">All Clear</option>
                                                    <option value="Unpaid">Unpaid</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Reference Name</label>
                                                <select name="reference" id="single-select"
                                                    class="form-control new-lg form-control-lg" required>
                                                    <option hidden>Select Trainer</option>
                                                    @foreach ($trainers as $trainer)
                                                        <option
                                                            value="{{ $trainer->first_name . ' ' . $trainer->last_name }}">
                                                            {{ $trainer->first_name . ' ' . $trainer->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Registration Fee*</label>
                                                <input type="text" name="regfee" class="form-control" placeholder="3000"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Gym Fee*</label>
                                                <input type="text" name="gymfee" class="form-control" id="g-fees"
                                                    placeholder="5000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 display">
                                            <div class="form-group">
                                                <label class="text-label">Trainer Fee Per Session*</label>
                                                <input type="text" name="trainfee" class="form-control"
                                                    placeholder="2000">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Advance Payment?</label>
                                                <div class="material-switch mt-3">
                                                    <input id="discounttoggle" hidden name="advnace_allow" value="1"
                                                        type="checkbox" />
                                                    <label for="discounttoggle" id="toggle-discount"
                                                        class="label-default"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="discount pl-3 pr-3">
                                            <div class="row">

                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group ">
                                                        <label class="text-label">Enter Total of Months</label>
                                                        <input type="number" min="0" max="24" name="advance_month"
                                                            id="t-months" placeholder="10" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group ">
                                                        <label class="text-label">discount</label>
                                                        <input type="number" min="0" name="discount" id="t-discount"
                                                            placeholder="10" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group ">
                                                        <label class="text-label">Total Amount</label>
                                                        <input type="text" name="avance_total" placeholder="0" id="t-amount"
                                                            disabled class="disable form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Scheduling Section --}}
                                    <div class="display">
                                        <div class="heading-title mt-3">
                                            <h4>Gym Schedule</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 mb-2 ml-auto display">
                                                <div class="form-group">
                                                    <label class="text-label">Total Session</label>
                                                    <input type="number" name="tsession" id="total_session"
                                                        class="form-control disable" value="0" disabled>
                                                </div>
                                            </div>
                                            <table class="table table-outline-danger table-lg-responsive table-bordered">
                                                <thead>
                                                    <th class="width80">PT</th>
                                                    <th>Days</th>
                                                    <th>Time Start</th>
                                                    <th>Time End</th>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="mondaypt" value="yes" name="mondaypt" hidden type="checkbox" />
                                                            <label for="mondaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Monday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="mondaytimein" name="mondaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="mondaytimeout" name="mondaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="tuesdaypt" value="yes" name="tuesdaypt" hidden type="checkbox" />
                                                            <label for="tuesdaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Tuesday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="tuesdaytimein" name="tuesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="tuesdaytimeout" name="tuesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="wednesdaypt" value="yes" name="wednesdaypt" hidden type="checkbox" />
                                                            <label for="wednesdaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Wednesday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="wednesdaytimein" name="wednesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="wednesdaytimeout" name="wednesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="thursdaypt" value="yes" name="thursdaypt" hidden type="checkbox" />
                                                            <label for="thursdaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Thursday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="thursdaytimein" name="thursdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="thursdaytimeout" name="thursdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="fridaypt" value="yes" name="fridaypt" hidden type="checkbox" />
                                                            <label for="fridaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Friday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="fridaytimein" name="fridaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="fridaytimeout" name="fridaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="saturdaypt" value="yes" name="saturdaypt" hidden type="checkbox" />
                                                            <label for="saturdaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Saturday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="saturdaytimein" name="saturdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="saturdaytimeout" name="saturdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="material-switch data-input mt-3 float-right">
                                                            <input id="sundaypt" value="yes" name="sundaypt" hidden type="checkbox" />
                                                            <label for="sundaypt" class="label-default"></label> 
                                                        </div>
                                                    </td>
                                                    <td>Sunday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="sundaytimein" name="sundaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control clock-n disable" disabled id="sundaytimeout" name="sundaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </section>

                                <footer>
                                    <div class="row">
                                        <div class="btn-group ml-auto">
                                             {{-- <a href="{{url('manage-customer')}}" class="btn btn-md ml-auto mt-3 btn-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a> --}}
                                            <button type="submit" class="btn btn-md mt-3 mr-2 btn-primary"><i class="fa fa-clipboard" aria-hidden="true"></i> Register</button>
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

  



@endsection
