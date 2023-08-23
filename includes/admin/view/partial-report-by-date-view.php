<?php

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    //printf($id);
    global $wpdb;
    $result = $wpdb->delete(
                $wpdb->prefix . 'srb_timeslot',
                array(
                    'ts_id' => $id
                ),
                array(
                    '%d'
                )
            );
    if($result) {
        printf($id . ' Successfully deleted');
    }
    
}

if(isset($_GET['submitdelete'])) {
    global $wpdb;
    if(isset($_GET['srb_chk'])) {
        $chk_array = $_GET['srb_chk'];
        foreach($chk_array as $chk) {
            $result = $wpdb->delete(
                $wpdb->prefix . 'srb_timeslot',
                array(
                    'ts_id' => $chk
                ),
                array(
                    '%d'
                )
            );
            if($result) {
                printf($chk . ' Successfully deleted');
            }
        }
    }
}

// Generate a custom nonce value.
    $srb_add_meta_nonce = wp_create_nonce('srb_add_user_report_by_date_form_nonce');
    
    $html = '';
    
    $html .= '<div class="">
                    <form action="" method="post" id="srb_get_report_by_date_meta_form" >
                    	<!--<input type="hidden" name="action" value="srb_class_by_date_response">-->
                    	<input type="hidden" name="srb_add_user_report_by_date_nonce" value="'. $srb_add_meta_nonce .'" />
                        		        
                        <table class="">
                        	<tr>
                        		<td><div>
                                <br>
                        			</div>
                        		</td>
                        	</tr>
                        		            
                        	<tr>
                        		<td><input type="date" id="srb-recorddate-by-date" name="srb[reportdate_by_date]" required><br></td>
                        	</tr>
                        </table>
                        		        
                        <p class="submit"><input type="submit" name="submit" id="reportsubmit" class="button button-primary srb-button" value="Search">
                        <img src="'.admin_url('images/wpspin_light.gif').'" id="srb_loading" class="waitting" style="display:none"/>
                        </p>
                    </form>
                </div>	
                            
             
            <br/><br/>
                    		
            <div class="wrap">
                <div class="wpwrap">
                    <div id="render-tables">
                    </div>

                    
                </div>
            </div>
                    		
            <div id="emptyWarnning" style="text-align: center" >
                <h2 id="empty-warnning" style="color:red"></h2>
            </div>    
                   		    
            <div id="srb_form_feedback" style="" >
                <form action="'. esc_url( admin_url( 'admin-post.php' ) ).'" method="post" target="_blank" name="srb_report_by_date_print_pdf">
                    <input type="hidden" name="action" value="srb_report_by_date_print_pdf_action">
                    <input type="hidden" name="rdate" value="" id="rdatehidden">
                    <p class="submit"><input type="submit" name="submitprint" id="reportsubmitprint" class="button button-primary srb-button" value="Print">
                </form>
            </div>
            <div id="loader" class="lds-dual-ring display-none overlay"></div>';
            echo $html;
            
?>
        
        <script type="text/javascript">
            "use strict";
            jQuery(function ($) {
            
                $(document).ready(function () {
                    
                    
                    jQuery('#srb_get_report_by_date_meta_form').on('submit', function () {
                     
        	            var data = {
        	            	action:"srb_report_by_date_response",
        	            	report_date: $('#srb-recorddate-by-date').val(),
        	            	//report_submit: $('#reportsubmit').val(),
        	            	
        	            };
                        

                    $.ajax({
                            type: "POST",
                            url: params.ajaxurl,
                            dataType: 'json',
                            data: data,
                            beforeSend: function () {
                                $('#loader').removeClass('display-none');
                            },
                            success: function (data) {
                                console.log(data); 
                                if (data.length > 0) {
                                    $('#print-tables').html('<form action="<?php echo $this->plugin_name . '-report-summary-by-date'; ?>" method="get" id="srb_get_report_print_by_date_meta_form" ><p class="submit"><input type="submit" name="submitprint" id="reportprintsubmit" class="button button-primary srb-button" value="Print"></form>');
                                    //$("#srb_form_feedback").html('begin'+response);
                                    //var data = JSON.parse(response);
                                    //alert(data[0][0].cl_name);
                                    //$("#empty-warnning").html(JSON.stringify(data[0]));
                                    console.log(data);
                                    
                                    $("#empty-warnning").html("");                        
                                    
                                    $('input[name="rdate"]').val(data[0][0].ts_date);
                                    
                                    var htmlCont = '';
                                    
                                    for( let j=0; j<data.length; j++ ) {
                                        //alert(data[j].cl_name);
                                    htmlCont += '<div><h2> Class : ' + data[j][0].cl_name + '</h2>';
                                    htmlCont += '<h2> Date : ' + data[j][0].ts_date + '</h2></div><br />';
                                    htmlCont += '<form id="srb_timetable" name="srb_timetable_records" method="GET" onsubmit="return setAction(this)" >';
                                    htmlCont += '<input type="hidden" name="page" value="student-record-book-report-by-date">';
                                    htmlCont += '<table  class="blm-table" ><thead><tr><th width="5%"><th width="5%">Period</th><th width="25%">Subject</th><th width="15%">IsDone</th><th width="25%">Reason</th><th width="5%">Delete</th></tr></thead>';
                                    htmlCont += '<tbody>';
                                    
                                    var numofrecords = data[j][0].numofrecords;
                                
                                    for( let i=0; i<numofrecords; i++ ) {
                                            
                                        var id = data[j][i].ts_id;
                                        var slot = data[j][i].slot;
                                        var subname = data[j][i].subname;
                                        var isdone = data[j][i].isdone == 1 ? '<span style="color:green;font-weight:bold">Yes</span>' : '<span style="color:red;font-weight:bold">No</span>';
                                        var reason = data[j][i].reason == null ? '': '<span style="color:red;font-weight:bold">' + data[j][i].reason + '</span>';
                                                
                                        htmlCont += '<tr>';
                                        htmlCont += '<td align="center"><input type="checkbox" name="srb_chk[]" value="'+id+'" id="srb_rbd_chk'+id + '" ></td>';
                                        htmlCont += '<td align="center">' + slot + '</td>';
                                        htmlCont += '<td align="center">' + subname + '</td>';
                                        htmlCont += '<td align="center">' + isdone + '</td>';
                                        htmlCont += '<td align="center">' + reason + '</td>';
                                        htmlCont += '<td align="center"><a class="list-group-item" href="?page=student-record-book-report-by-date&action=delete&id='+id+'" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
                                        htmlCont += '</tr>';
                                        
                                        
                                            //?page=student-record-book-report-by-date&action=delete&id='+id+'
                                    }
                                        htmlCont += '<tr>';
                                        htmlCont += '<td align="center" colspan="5"></td>';
                                        htmlCont += '<td align="center"><input type="submit" name="submitdelete" id="reportsubmitdelete" class="button button-primary srb-button" value="Delete"></td>';
                                        htmlCont += '</tr>';
                                        htmlCont += '</tbody></table><br /><br />';
                                        htmlCont += '</form>';
                                    }
                                    $('#render-tables').html(htmlCont);
                                    $('#loader').addClass('display-none');
                                
                                } else {
                                    $('#render-tables').html("");
                                    $("#empty-warnning").html("----- No Records Found -----");
                                }
                            },
                            error: function(xhr, status, error){
                                //var err = eval("(" + xhr.responseText + ")");            
                                alert( xhr.responseText);
                            },
                            complete: function () {
                                $('#loader').addClass('display-none');
                            },
                        });

                       return false;
                    });
                    
                });
                
                
               
            });  
            
            function deleteTS(id) {
                        if(confirm("Are You Sure!") == true) {
                            $(location).prop('href', '?page=student-record-book-report-by-date&action=delete&id=' +id);
                        }
                    }
                    
            function setAction(dorm) {
              dorm.action = "admin.php?page=student-record-book-report-by-date&";
              return true;
            }
            
        </script>

<?php
