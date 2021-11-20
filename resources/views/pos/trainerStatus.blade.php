<script src="{{ asset('./js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<style>
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

 
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    
                    <div class="card-body h-100">
                        <form action="{{route('three-info')}}" id="step-form-horizontal" class="step-form-horizontal" method="POST">
                            <div>
                                @csrf
                                <section>
                                    {{-- Scheduling Section --}}
                                    <div class="display">
                                        <div class="heading-title mt-3">
                                            <h4>Check Trainer Availability</h4>
                                            <hr>
                                        </div>
                                            {{-- <input type="hidden" name = "tname" value = "" id = "tname"> --}}
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


                                {{-- <div class="row">
                                    <button type="submit" class="btn  ml-auto mr-3 btn-primary">Submit</button>
                                </div> --}}
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
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
    /*$("#sunday_btn").css({"color":"#fff", "background-color": "#184aa4", "border-color": "#184aa4" });*/
    if($('#sunday_btn').is(':checked')){
        
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
    if($('#saturday_btn').is(':checked')){
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
    if($('#friday_btn').is(':checked')){
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
    if($('#thursday_btn').is(':checked')){
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
    if($('#wednesday_btn').is(':checked')){ 
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
    if($('#tuesday_btn').is(':checked')){
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
    if($('#monday_btn').is(':checked')){
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
        $('#sunday-select').html('');
        document.getElementById('monday_time_out').value = "";
        document.getElementById('monday_time_in').value = "";
    } 
});    
</script>

  



@endsection
