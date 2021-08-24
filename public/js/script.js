jQuery(document).ready(() => {

        
        jQuery('#g-fees, #t-months').on('keyup', () => {
            var month = document.getElementById('t-months').value;
            var gfees = document.getElementById('g-fees').value;
            var result = month * gfees;
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
            console.log(result)
        }
    })
    $('#wednesdaypt').on('click', ()=>{
        if ($('#wednesdaypt').prop('checked')==true){ 
            ob.wednesdaypt = document.getElementById('wednesdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            console.log(result)
        }
    })
    $('#thursdaypt').on('click', ()=>{
        if ($('#thursdaypt').prop('checked')==true){ 
            ob.thursdaypt = document.getElementById('thursdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            console.log(result)
        }
    })
    $('#fridaypt').on('click', ()=>{
        if ($('#fridaypt').prop('checked')==true){ 
            ob.fridaypt = document.getElementById('fridaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            console.log(result)
        }
    })
    $('#saturdaypt').on('click', ()=>{
        if ($('#saturdaypt').prop('checked')==true){ 
            ob.saturdaypt = document.getElementById('saturdaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            console.log(result)
        }
    })
    $('#sundaypt').on('click', ()=>{
        if ($('#sundaypt').prop('checked')==true){ 
            ob.sundaypt = document.getElementById('sundaypt').value
            var result = ob.mondaypt + ob.tuesdaypt + ob.wednesdaypt + ob.thursdaypt + ob.fridaypt + ob.saturdaypt + ob.sundaypt;
            console.log(result)
        }
    })
    
   

})