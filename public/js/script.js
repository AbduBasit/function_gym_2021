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



})