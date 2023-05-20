$(document).ready(function(){
    // Form List Update
    let name = '#username';
    let email = '#email';
    let password = '#password';

    // Confirmation Password
    let password_confirm = '#confirm_pass';

    // Form Update
    let form = '#update_form';

    // Button Update
    let button = '#button-update';

    $(form).on('input', function(event){

        // Making Sure There is a change
        if($(name).attr('data-initial') != $(name).val() || $(email).attr('data-initial') != $(email).val() || $(password).val() != '')
        {
            // Remove class in Button
            $(button).removeClass('d-none');
        }else{

            // Add class in Button
            $(button).addClass('d-none');
        }

        // Check Password Input
        if($(password).val() != '')
        {

            // Remove class in Pass Confirmation
            $(password_confirm).removeClass('d-none');
        }else{
            // Add class in Form Pas Confirmation
            $(password_confirm).addClass('d-none');
        }
    });
});