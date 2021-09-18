jQuery(document).ready(() => {

        
        jQuery('#g-fees, #t-months, #t-discount').on('keyup', () => {
            var month = document.getElementById('t-months').value;
            var gfees = document.getElementById('g-fees').value;
            var discountval = document.getElementById('t-discount').value;
            var result = month * gfees  - discountval;
            $("#t-amount").val(function () {
                return result;
            });
            
        })

    jQuery('#select_training').on('change', () => {
        jQuery('.display').fadeToggle();
    })

    if (document.getElementById('select_training').value == "GT") {
        jQuery('.display').hide();   
    }
    else{
        jQuery('.display').show(); 
          
    }
 
    dateCalc = (value, data) => {
        var ruleDays = data;
        var chooseDate = new Date(value);
        chooseDate.setDate(chooseDate.getUTCDate() + ruleDays);
        var futureDate = chooseDate.getFullYear() + '-' + ('0' + (chooseDate.getMonth() + 2)).slice(-2) + '-' + ('0' + (chooseDate.getDate())).slice(-2);
        $("#month-end").val(function() {
            return futureDate;
        });
    }
    var ob = [{
        'mondaypt':0,'tuesdaypt':0, 'wednesdaypt':0, 'thursdaypt':0, 'fridaypt':0, 'saturdaypt':0, 'sundaypt':0
    }
    ]
    $('#mondaypt').on('click', ()=>{
        if ($('#mondaypt').prop('checked')==true){ 
            ob.mondaypt = document.getElementById('mondaypt').value
            
        }
    })
    $('#tuesdaypt').on('click', ()=>{
        if ($('#tuesdaypt').prop('checked')==true){ 
            ob.tuesdaypt = document.getElementById('tuesdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })
    $('#wednesdaypt').on('click', ()=>{
        if ($('#wednesdaypt').prop('checked')==true){ 
            ob.wednesdaypt = document.getElementById('wednesdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })
    $('#thursdaypt').on('click', ()=>{
        if ($('#thursdaypt').prop('checked')==true){ 
            ob.thursdaypt = document.getElementById('thursdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })
    
        
    $('#fridaypt').on('click', ()=>{
        if ($('#fridaypt').prop('checked')==true){ 
            ob.fridaypt = document.getElementById('fridaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })
    $('#saturdaypt').on('click', ()=>{
        if ($('#saturdaypt').prop('checked')==true){ 
            ob.saturdaypt = document.getElementById('saturdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })
    $('#sundaypt').on('click', ()=>{
        if ($('#sundaypt').prop('checked')==true){ 
            ob.sundaypt = document.getElementById('sundaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            // console.log(result)
        }
    })

})

// scheduling systems
jQuery(document).ready(function(){

    function TimeOut(tin_id, tout_id) 
    {
        mondayValue = document.getElementById(tin_id);
        if(mondayValue.value == '00:00'){
            alert('Input Valid Time');
        }
        else{
            var h = mondayValue.value;
         
            var value = h.split('');
            var meridiem =  value[5] + value[6]
            var min_g = parseInt(h.split(':')[1])
            var min = min_g.toString()
            var hours = parseInt(h.split(':')[0])
        
            if(hours==12 && meridiem == 'PM'){
                meridiem = 'AM';
                result = hours - 11;
                var final =result+':'+min+meridiem
                document.getElementById(tout_id).value = final;

                $('#'+tout_id).val(
                    ()=>{
                        return final;
                    }
                )
            }
            else if(hours==12 && meridiem == 'AM'){
                meridiem = 'PM';
                result = hours - 11;
                var final =result+':'+min+meridiem
                document.getElementById(tout_id).value = final;
                $('#'+tout_id).val(
                    ()=>{
                        return final;
                    }
                )
            }
            else if(hours==11 && min==59 && meridiem == 'AM'){
                meridiem = 'PM';
                result = hours + 1;
                var final =result+':'+min+meridiem
                document.getElementById(tout_id).value = final;
                $('#'+tout_id).val(
                    ()=>{
                        return final;
                    }
                )
            }
            else if(hours==11 && min==59 && meridiem == 'PM'){
                meridiem = 'AM';
                result = hours + 1;
                var final =result+':'+min+meridiem
                document.getElementById(tout_id).value = final;
                $('#'+tout_id).val(
                    ()=>{
                        return final;
                    }
                )
            }
            else if(meridiem == 'AM' || meridiem == 'PM'){
                result = hours + 1;
                var final =result+':'+min+meridiem
                document.getElementById(tout_id).value = final;
                $('#'+tout_id).val(
                    ()=>{
                        return final;
                    }
                )
            }
            else{
                alert('Error')
            }
            
        }
    }





    $('.clock-n').clockpicker({
        autoclose: true,
        twelvehour: true
      });

    var mondayCheck = $('#mondaypt');
    var tuesdayCheck = $('#tuesdaypt');
    var wednesdayCheck = $('#wednesdaypt');
    var thursdayCheck = $('#thursdaypt');
    var fridayCheck = $('#fridaypt');
    var saturdayCheck = $('#saturdaypt');
    var sundayCheck = $('#sundaypt');
   
    $('#mondaypt').on('change', ()=>{
        if($(mondayCheck).is(':checked')){
            jQuery('#mondaytimeout').removeClass('disable');
            jQuery('#mondaytimein').removeClass('disable');
            jQuery('#mondaytimeout').attr('disabled',false);
            jQuery('#mondaytimein').attr('disabled',false);

            jQuery('#mondaytimein').on('change', ()=>{
                TimeOut('mondaytimein', 'mondaytimeout');
            })
        }
        else{
            jQuery('#mondaytimeout').addClass('disable');
            jQuery('#mondaytimein').addClass('disable');
            jQuery('#mondaytimeout').attr('disabled','disabled');
            jQuery('#mondaytimein').attr('disabled','disabled');
        }
    })

    $('#tuesdaypt').on('change', ()=>{
        if($(tuesdayCheck).is(':checked')){
            jQuery('#tuesdaytimeout').removeClass('disable');
            jQuery('#tuesdaytimein').removeClass('disable');
            jQuery('#tuesdaytimeout').attr('disabled',false);
            jQuery('#tuesdaytimein').attr('disabled',false);
            jQuery('#tuesdaytimein').on('change', ()=>{
                TimeOut('tuesdaytimein', 'tuesdaytimeout');
            })
        }
        else{
            jQuery('#tuesdaytimeout').addClass('disable');
            jQuery('#tuesdaytimein').addClass('disable');
            jQuery('#tuesdaytimeout').attr('disabled','disabled');
            jQuery('#tuesdaytimein').attr('disabled','disabled');
        }
    })

    $('#wednesdaypt').on('change', ()=>{
        if($(wednesdayCheck).is(':checked')){
            jQuery('#wednesdaytimeout').removeClass('disable');
            jQuery('#wednesdaytimein').removeClass('disable');
            jQuery('#wednesdaytimeout').attr('disabled',false);
            jQuery('#wednesdaytimein').attr('disabled',false);

            jQuery('#wednesdaytimein').on('change', ()=>{
                TimeOut('wednesdaytimein', 'wednesdaytimeout');
            })
        }
        else{
            jQuery('#wednesdaytimeout').addClass('disable');
            jQuery('#wednesdaytimein').addClass('disable');
            jQuery('#wednesdaytimeout').attr('disabled','disabled');
            jQuery('#wednesdaytimein').attr('disabled','disabled');
        }
    })

    $('#thursdaypt').on('change', ()=>{
        if($(thursdayCheck).is(':checked')){
            jQuery('#thursdaytimeout').removeClass('disable');
            jQuery('#thursdaytimein').removeClass('disable');
            jQuery('#thursdaytimeout').attr('disabled',false);
            jQuery('#thursdaytimein').attr('disabled',false);

            jQuery('#thursdaytimein').on('change', ()=>{
                TimeOut('thursdaytimein', 'thursdaytimeout');
            })
        }
        else{
            jQuery('#thursdaytimeout').addClass('disable');
            jQuery('#thursdaytimein').addClass('disable');
            jQuery('#thursdaytimeout').attr('disabled','disabled');
            jQuery('#thursdaytimein').attr('disabled','disabled');
        }
    })

    $('#fridaypt').on('change', ()=>{
        if($(fridayCheck).is(':checked')){
            jQuery('#fridaytimeout').removeClass('disable');
            jQuery('#fridaytimein').removeClass('disable');
            jQuery('#fridaytimeout').attr('disabled',false);
            jQuery('#fridaytimein').attr('disabled',false);
            
            jQuery('#fridaytimein').on('change', ()=>{
                TimeOut('fridaytimein', 'fridaytimeout');
            })
        }
        else{
            jQuery('#fridaytimeout').addClass('disable');
            jQuery('#fridaytimein').addClass('disable');
            jQuery('#fridaytimeout').attr('disabled','disabled');
            jQuery('#fridaytimein').attr('disabled','disabled');
        }
    })

    $('#saturdaypt').on('change', ()=>{
        if($(saturdayCheck).is(':checked')){
            jQuery('#saturdaytimeout').removeClass('disable');
            jQuery('#saturdaytimein').removeClass('disable');
            jQuery('#saturdaytimeout').attr('disabled',false);
            jQuery('#saturdaytimein').attr('disabled',false);

            jQuery('#saturdaytimein').on('change', ()=>{
                TimeOut('saturdaytimein', 'saturdaytimeout');
            })
        }
        else{
            jQuery('#saturdaytimeout').addClass('disable');
            jQuery('#saturdaytimein').addClass('disable');
            jQuery('#saturdaytimeout').attr('disabled','disabled');
            jQuery('#saturdaytimein').attr('disabled','disabled');
        }
    })
    
    $('#sundaypt').on('change', ()=>{
        if($(sundayCheck).is(':checked')){
            jQuery('#sundaytimeout').removeClass('disable');
            jQuery('#sundaytimein').removeClass('disable');
            jQuery('#sundaytimeout').attr('disabled',false);
            jQuery('#sundaytimein').attr('disabled',false);

            jQuery('#sundaytimein').on('change', ()=>{
                TimeOut('sundaytimein', 'sundaytimeout');
            })
        }
        else{
            jQuery('#sundaytimeout').addClass('disable');
            jQuery('#sundaytimein').addClass('disable');
            jQuery('#sundaytimeout').attr('disabled','disabled');
            jQuery('#sundaytimein').attr('disabled','disabled');
        }
    })


    
})