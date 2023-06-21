$(document).ready( () => {

    // On or Off Button
    $(".date").on('change', () => {

        // Check The value
        if($('.date').val() != '')
        {
            // Remove disabled
            $('#send_pdf').removeClass('disabled');
        }else
        {
            // Add Disabled
            $('#send_pdf').addClass('disabled');
        }
    });

    // For PDF
    $(".date").flatpickr({
        mode: "range",
        maxDate: "today"
    });


})