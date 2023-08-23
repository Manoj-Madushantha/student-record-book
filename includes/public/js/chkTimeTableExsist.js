jQuery( document ).ready( function( jQuery ) {

    "use strict";
    // from ftp-simple via vs Code
    // after recovering
    
     // grade 10 / 11                   
    jQuery("#srb_class_select").on('change', function(e) {
            e.preventDefault(); 
            console.log(jQuery('#recorddateol').val());
            if(jQuery('#recorddateol').val() != null || jQuery('#recorddateol').val() != "") {
                var cl_id = jQuery(this).val();
                var rdate = jQuery('#recorddateol').val();
                
                jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : myAjax.ajaxurl,
                    data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                    success: function(response) {
                        
                        if(response!= "") {
                            
                            if(JSON.stringify(response).includes("timeslots")) {

                                const slotArr = [];
                                for(let i = 0; i<response.timeslots.length; i++ ) {
                                    slotArr.push(response.timeslots[i].slot);
                                }
    
                                if(slotArr.includes('8')) {
                                    alert('all records all ready entered. have a coffee.');
                                    jQuery('#recorddateol').val('');
                                    jQuery("#srb_class_select").val('');
                                }
                            }
                            
                        }
                        else {
                           alert("response type is not success");
                        }
                    }
                });   
            }  
    });
    // grade 10 / 11
    jQuery('#recorddateol').change(function() {
        var rdate = jQuery(this).val();
        console.log(rdate, 'change');
       
        if(jQuery("#srb_class_select").val() != "") {
                var cl_id = jQuery('#srb_class_select').val();
                //post_id = jQuery($this).attr("srb[clid]")
                console.log(cl_id, 'selected');
                //nonce = jQuery(this).attr("data-nonce")
                            
                jQuery.ajax({
                    type : "post",
                    dataType : "json",
                    url : myAjax.ajaxurl,
                    data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                    success: function(response) {
                        
                        if(response!= "") {
                            
                            if(JSON.stringify(response).includes("timeslots")) {

                                const slotArr = [];
                                for(let i = 0; i<response.timeslots.length; i++ ) {
                                    slotArr.push(response.timeslots[i].slot);
                                }
    
                                if(slotArr.includes('8')) {
                                    alert('all records all ready entered. have a coffee.');
                                    jQuery('#recorddateol').val('');
                                    jQuery("#srb_class_select").val('');
                                }
                            }
                            
                            
                        }
                    }
                });   
            }  
    
    });
    // grade 6 / 7 / 8 / 9 
    jQuery("#srb_class_select69").on('change', function(e) {
        e.preventDefault(); 
        console.log(jQuery('#recorddateol').val());
        if(jQuery('#recorddateol').val() != null || jQuery('#recorddateol').val() != "") {
            var cl_id = jQuery(this).val();
            var rdate = jQuery('#recorddate69').val();
            
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                success: function(response) {
                    
                    if(response!= "") {
                        
                        
                        if(JSON.stringify(response).includes("timeslots")) {

                            const slotArr = [];
                            for(let i = 0; i<response.timeslots.length; i++ ) {
                                slotArr.push(response.timeslots[i].slot);
                            }

                            if(slotArr.includes('8')) {
                                alert('all records all ready entered. have a coffee.');
                                jQuery('#recorddate69').val('');
                                jQuery("#srb_class_select69").val('');
                            }
                        }
                    }
                }
            });
        }
        
    });
     
    // grade 6 / 7 / 8 / 9 
    jQuery('#recorddate69').change(function() {
        var rdate = jQuery(this).val();
        console.log(rdate, 'change');
       
        if(jQuery("#srb_class_select69").val() != "") {
            var cl_id = jQuery('#srb_class_select69').val();
            //post_id = jQuery($this).attr("srb[clid]")
            console.log(cl_id, 'selected');
            //nonce = jQuery(this).attr("data-nonce")
            
                        
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                success: function(response) {
                
                    if(response != "") {
                        if(JSON.stringify(response).includes("timeslots")) {

                            const slotArr = [];
                            for(let i = 0; i<response.timeslots.length; i++ ) {
                                slotArr.push(response.timeslots[i].slot);
                            }

                            if(slotArr.includes('8')) {
                                alert('all records all ready entered. have a coffee.');
                                jQuery('#recorddate69').val('');
                                jQuery("#srb_class_select69").val('');
                            }
                        }
                    }
                }
            });
        }
    });
    // grade 12 / 13 
    jQuery("#srb_class_select_al").on('change', function(e) {
        e.preventDefault(); 
        console.log(jQuery('#recorddateal').val());
        if(jQuery('#recorddateal').val() != null || jQuery('#recorddateal').val() != "") {
            var cl_id = jQuery(this).val();
            var rdate = jQuery('#recorddateal').val();
            
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                success: function(response) {
                    
                    if(response!= "") {
                        
                        
                        if(JSON.stringify(response).includes("timeslots")) {

                            const slotArr = [];
                            for(let i = 0; i<response.timeslots.length; i++ ) {
                                slotArr.push(response.timeslots[i].slot);
                            }

                            if(slotArr.includes('8')) {
                                alert('all records all ready entered. have a coffee.');
                                jQuery('#recorddateal').val('');
                                jQuery("#srb_class_select_al").val('');
                            }
                        }
                    }
                }
            });
        }
        
    });
    
    // grade 12 / 13 
    jQuery('#recorddateal').change(function() {
        var rdate = jQuery(this).val();
        console.log(rdate, 'change');
       
        if(jQuery("#srb_class_select_al").val() != "") {
            var cl_id = jQuery('#srb_class_select_al').val();
            //post_id = jQuery($this).attr("srb[clid]")
            console.log(cl_id, 'selected');
            //nonce = jQuery(this).attr("data-nonce")
            
                        
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : myAjax.ajaxurl,
                data : {action: "check_time_slots_exist_response", cl_id : cl_id, rdate: rdate},
                success: function(response) {
                
                    if(response != "") {
                        if(JSON.stringify(response).includes("timeslots")) {

                            const slotArr = [];
                            for(let i = 0; i<response.timeslots.length; i++ ) {
                                slotArr.push(response.timeslots[i].slot);
                            }

                            if(slotArr.includes('8')) {
                                alert('all records all ready entered. have a coffee.');
                                jQuery('#recorddateal').val('');
                                jQuery("#srb_class_select_al").val('');
                            }
                        }
                    }
                }
            });
        }
    });

});