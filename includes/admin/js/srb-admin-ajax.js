

jQuery( document ).ready( function( $ ) {

"use strict";
/**
 * The file is enqueued from inc/admin/class-admin.php.
*/        
$( '#blm_add_user_meta_ajax_form' ).submit( function( event ) {
    
    event.preventDefault(); // Prevent the default form submit.            
    
    // serialize the form data
    var ajax_form_data = $("#blm_add_user_meta_ajax_form").serialize();
    
    //add our own ajax check as X-Requested-With is not always reliable
    ajax_form_data = ajax_form_data+'&ajaxrequest=true&submit=Submit+Form';
    
    $.ajax({
        url:    params.ajaxurl, // domain/wp-admin/admin-ajax.php
        type:   'post',                
        data:   ajax_form_data
    })
    
    .done( function( response ) { // response from the PHP action
        $(" #blm_form_feedback ").html( "<h2>The request was successful </h2><br>" + response );
    })
    
    // something went wrong  
    .fail( function(response ) {
        $(" #blm_form_feedback ").html( "<h2>Something went wrong.</h2><br>" + response );                  
    })

    // after all this time?
    .always( function() {
        event.target.reset();
    });

});


/* Default Upload modal */
/* Default Upload modal */
$('.srbmsp_csv_upload').click(function(e) {
    e.preventDefault();
    var image = wp.media({ 
        title: 'Upload CSV',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
    }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('.srbmsp-csv-upload').val(image_url);
        });
    });
    
$('.srbmsp_csv_upload-class').click(function(e) {
    e.preventDefault();
    var image = wp.media({ 
        title: 'Upload CSV',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
    }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('.srbmsp-csv-upload-class').val(image_url);
        });
    });
                	
/* Main job */
    $('form#srbmsp-import').submit(function(e) {
        //Execute when submit
        e.preventDefault();
                		
        //Add necessary veritable
                		
        var srbmsp_rstatus = $('#result-status').val();
        var srbmsp_csv_file = $('#srbmsp-csv-file').val();
                		
        //Add Jquery ajax method
                		
        $.ajax({
            type: 'POST',
            url:  params.ajaxurl,
            data: {
                action: 'srbmsp_ari',
                srbmsp_rstatus: srbmsp_rstatus,
                srbmsp_csv_file: srbmsp_csv_file
            },
            success: function(data){
                $('.ajax-response-message').html( data );
            },
            error: function(XMLHttpRequest, textStatus, errorTown){
                alert(errorTown);
            },
            beforeSend: function(){
                $('#srbmsp-imload').show()
            },
            complete: function(){
                $('#srbmsp-imload').hide();
            }
                  
        });
    }); // End form submit


    $('form#srbmsp-import-class').submit(function(e) {
        //Execute when submit
        e.preventDefault();
                		
        //Add necessary veritable
                		
        var srbmsp_rstatus = $('#result-status-class').val();
        var srbmsp_csv_file = $('#srbmsp-csv-file-class').val();
                		
        //Add Jquery ajax method
                		
        $.ajax({
            type: 'POST',
            url:  params.ajaxurl,
            data: {
                action: 'srbmsp_ari',
                srbmsp_rstatus_class: srbmsp_rstatus,
                srbmsp_csv_file_class: srbmsp_csv_file
            },
            success: function(data){
                $('.ajax-response-message').html( data );
            },
            error: function(XMLHttpRequest, textStatus, errorTown){
                alert(errorTown);
            },
            beforeSend: function(){
                $('#srbmsp-imload').show()
            },
            complete: function(){
                $('#srbmsp-imload').hide();
            }
                  
        });
    }); // End form submit
});


