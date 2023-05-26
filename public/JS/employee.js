$(document).ready(function(){

    // Button
    var button_warn = '.button_warn';

    // Fetching Data to form Update
    $('body').on('click', button_warn, function(event){
        event.preventDefault();
        
        // Getting value of id
        let id = $(this).attr('data-id');
 
        // Set the value of id
        $('#id_employee').val(id)
    });

});