$(document).ready(function(){

    // Button
    var button_warn = '.button_warn';
    var button_qr = '.button_qr';

    // Fetching Data to form Update
    $('body').on('click', button_warn, function(event){
        event.preventDefault();
        
        // Getting value of id
        let id = $(this).attr('data-id');
 
        // Set the value of id
        $('#id_employee').val(id)
    });

    // Fetching Data to form Update
    $('body').on('click', button_qr, function(event){
        event.preventDefault();
        
        // Getting value of id
        let id = $(this).attr('data-id');
        
        // Checking Each
        $('.qr').each((index) => {

            if($(this).attr('data-id') - 1 == index)
            {
                $('#qr_' + (index + 1)).removeClass('d-none')
            }else{
                $('#qr_' + (index + 1)).addClass('d-none')
            }

            // Test
            // console.log($(this).attr('data-id'))
            // console.log(index)
        });
        
        // Set the link id
        $('#qr_link').attr('href', '/admin/employee/pdf/'+id)

        // Set the value of id
        // console.log($('#qr_link').attr('href'))
    });

});