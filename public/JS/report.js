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
        maxDate: new Date().fp_incr(1)
    });
    
    // Close Modal
    $('#send_pdf').on("click", () => {
        $('#exportPdfModal').modal('hide');
    });

    // ==================================================================================================================

    // For Excel
    $(".date_excel").flatpickr({
        mode: "range",
        maxDate: new Date().fp_incr(1)
    });

    // On or Off Button
    $(".date_excel").on('change', () => {

        // Check The value
        if($('.date_excel').val() != '')
        {
            // Remove disabled
            $('#send_excel').removeClass('disabled');
        }else
        {
            // Add Disabled
            $('#send_excel').addClass('disabled');
        }
    });

    // Close Modal
    $('#send_escel').on("click", () => {
        $('#exportExcelModal').modal('hide');
    });
})