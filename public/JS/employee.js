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

    // Send Ajax
    $('#update_performance').on('change', function(event){
        event.preventDefault();

        // Url
        let url = $('#update_performance').attr('data-action');

        // let month_name = $('#performance_months').find(":selected").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // Start Row
                let row = '<tbody>';

                // let table = $('#performance-table .replacement').parent();
                for(i = 0; i < response.people.length; i++)
                {

                    row += `<tr class="replacement">
                                <th scope="row">${i + 1}</th>
                                <td>${response.people[i]}</td>
                                <td>${response.people[i].toLowerCase()+'_kriminal' in response.detail ? response.detail[response.people[i].toLowerCase()+'_kriminal'] : 0}</td>
                                <td>${response.people[i].toLowerCase()+'_tidak_puas' in response.detail ? response.detail[response.people[i].toLowerCase()+'_tidak_puas'] : 0}</td>
                                <td>${response.people[i].toLowerCase()+'_sesuai_janji' in response.detail ? response.detail[response.people[i].toLowerCase()+'_sesuai_janji'] : 0}</td>
                                <td>${response.people[i].toLowerCase()+'_memuaskan' in response.detail ? response.detail[response.people[i].toLowerCase()+'_memuaskan'] : 0}</td>
                                <td>${response.people[i].toLowerCase()+'_recommended' in response.detail ? response.detail[response.people[i].toLowerCase()+'_recommended'] : 0}</td>
                                <td>${response.scores[i]}</td>
                            </tr>`
                }

                // Close Row
                row += '</tbody>';

                // Update Value
                $('#performance-table .replacement').parent().replaceWith(row);

                // console.log(response.people.length)
            },
            error: function(response) {
                console.log(response)
            }
        });

    });

});