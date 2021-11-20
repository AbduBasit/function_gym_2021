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
    <div id = "alert"></div>

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
                                                <input id = "doj" type="date" name="doj" class="form-control"
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
                                        {{-- <div class="col-lg-3 mb-2 display">
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
                                        </div> --}}
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
                                                <input onchange="change_registration_fee(this)" type="text" value = "0" id = "reg_fees" name="regfee" class="form-control" placeholder="3000"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Gym Fee*</label>
                                                <input type="text" value = "0" name="gymfee" class="form-control" onblur="get_fees(this)" id="g-fees"
                                                    placeholder="5000" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2 ">
                                                <div class="form-group">
                                                    <label  class="text-label">Total Payment</label>
                                                    <input style = "border:3px solid #3ff50c !important;" readonly type="text" value = "0" id = "total_payment" name="total_payment" class="form-control /"
                                                        placeholder="2000">
                                                </div>
                                            </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Advance Payment?</label>
                                                <div class="material-switch mt-3">
                                                    <input id="discounttoggle" name="advnace_allow" value="1"
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
                                                        <input onchange="monthly_payment(this)" type="number" min="0" max="24" name="advance_month"
                                                            id="total_months" placeholder="10" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group ">
                                                        <label class="text-label">discount</label>
                                                        <input onchange="get_discount(this)" type="number" min="0" name="discount" id="total-discount"
                                                            placeholder="10" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group ">
                                                        <label class="text-label">Total Amount</label>
                                                        <input type="text" id="avance_total" name="avance_total" value = "0" placeholder="0"
                                                             class="disable form-control">
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
                                            <div class="col-lg-3 mb-2 display">
                                                <div class="form-group">
                                                    <label class="text-label">Trainer Fee Per Session*</label>
                                                    <input onchange="change_trainer_fee_per_session(this)" type="text" id = "trainfee" value = "0" name="trainfee" class="form-control"
                                                        placeholder="2000">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-2 ml-auto display">
                                                <div class="form-group">
                                                    <label class="text-label">Total Session</label>
                                                    <input type="number" name="tsession" id="total_session"
                                                        class="form-control disable" value="0" readonly>
                                                </div>
                                            </div>
                                        </div>
                                            <input type="hidden" name = "tname" value = "" id = "tname">
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
                                                    <td>
                                                    <label><input class="btnlike" name = "days[]" type="checkbox" id = "monday_btn" value = "monday"><span>Monday</span></label>
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
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
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
                                                </tr>
                                                <tr>
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
                                                        <li class="list-group-item">{{$trainer->first_name." ".$trainer->last_name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
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

    <script>
        function sundaysInMonth( m, y, day ) {
        var days = new Date( y,m,0 ).getDate();
        var sundays = [ day - (new Date( m +'/01/'+ y ).getDay()) ];
        for ( var i = sundays[0] + 7; i < days; i += 7 ) {
            sundays.push( i );
        }
        return sundays;
        }
        //console.log( sundaysInMonth( 11,2021, 2 ).length );
    /*Sunday Check*/
    $("#sunday_time_in").blur(function(){
        if($('#sunday_btn').is(':checked')){
        var time = document.getElementById('sunday_time_in').value;
        var dt = moment(time,["hh:mm A"]).format("HH:mm");
        console.log(dt)
        var hours = time[0]+time[1];
        var minutes = time[3]+time[4];
        hours = parseInt(hours);
        hours++;
        var string = hours+":"+minutes
        var dt_out = moment(string,["hh:mm A"]).format("HH:mm");
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
        var date = document.getElementById('doj').value;
        dateArray = date.split("-");
        var sunday_sessions = sundaysInMonth( dateArray[0],dateArray[1], 8 ).length
        /*$("#sunday_btn").css({"color":"#fff", "background-color": "#184aa4", "border-color": "#184aa4" });*/
        if($('#sunday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                
                //console.log(monday_sessions)
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+sunday_sessions;
                var new_total_price = (parseInt(trainfee)*parseInt(sunday_sessions))+parseInt(total_payment);
                document.getElementById('total_payment').value = new_total_price;
                //console.log(total_sessions);
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
            var trainfee = document.getElementById('trainfee').value;
            var total_sessions = document.getElementById('total_session').value;
            document.getElementById('total_session').value = parseInt(total_sessions)-sunday_sessions;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-(parseInt(trainfee)*parseInt(sunday_sessions))
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

    function monthly_payment(months){
        var gym_fee = document.getElementById('g-fees').value
        var regfee = document.getElementById('reg_fees').value
        var total_payment = document.getElementById('total_payment').value
        //alert(regfee)
        //var payment = parseInt(total_payment)-parseInt(regfee);
        var payment = parseInt(total_payment);
        var final_patment = parseInt(payment)*parseInt(months.value)+parseInt(regfee)
        document.getElementById('avance_total').value =final_patment
    }

    function get_discount(discount){
        var gym_fee = document.getElementById('g-fees').value
        var regfee = document.getElementById('reg_fees').value
        var total_payment = document.getElementById('total_payment').value
        var total_months = document.getElementById('total_months').value
        //alert(regfee)
        //var payment = parseInt(total_payment)-parseInt(regfee);
        var payment = parseInt(total_payment);
        var final_patment = parseInt(payment)*parseInt(total_months)+parseInt(regfee)
        //var total_amount = document.getElementById('avance_total').value
        //total_payment = (parseInt(gym_fee)*parseInt(total_months))+parseInt(regfee)
        discount = ((discount.value /100 ) * final_patment);
        console.log(discount)
        document.getElementById('avance_total').value = final_patment-discount;
    }
    
    </script>
  



@endsection
