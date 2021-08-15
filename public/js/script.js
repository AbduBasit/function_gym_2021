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

})