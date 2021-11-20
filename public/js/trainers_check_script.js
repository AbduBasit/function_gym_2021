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
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#saturday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#friday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#thursday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#wednesday_btn').is(':checked')){ 
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#tuesday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
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
        if($('#monday_btn').is(':checked')){
            var trainfee = document.getElementById('trainfee').value;
            if(trainfee != ""){
                var total_sessions = document.getElementById('total_session').value;
                var total_payment = document.getElementById('total_payment').value;
                total_sessions = document.getElementById('total_session').value = parseInt(total_sessions)+1;
                var new_total_price = parseInt(trainfee)+parseInt(total_payment);
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
            document.getElementById('total_session').value = parseInt(total_sessions)-1;
            var total_payment = document.getElementById('total_payment').value;
            document.getElementById('total_payment').value = parseInt(total_payment)-parseInt(trainfee)
            console.log(total_sessions);
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
        if(id.style.backgroundColor == 'red'){
            //document.getElementById('select_training').append('<option value = "Semi PT" selected>'+'Semi Personal Training(Semi PT)'+'</select>')
                
            }

    }