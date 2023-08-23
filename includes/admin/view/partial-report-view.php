<?php
// Generate a custom nonce value.
    $srb_add_meta_nonce = wp_create_nonce('srb_add_user_report_form_nonce');
    
    $cat2 = new stClass();

    $results = $cat2->getAll();
    
    
    //echo $cat->getOutput();

            
            //echo $cat->getOutput();
            $dropdown_html = '<select required id="srb_class_select" name="srb[clid]">
                                        <option value="">' . __('Select Class', $this->plugin_text_domain) . '</option>';
                         
            foreach ($results as $result)
            {
                $clid = esc_html($result->getCid());
                $clname = esc_html($result->getCname());
                    
                $dropdown_html .= '<option value="' . $clid . '">( '. $clid .' )-' . $clname . '</option>' . "\n";
            }
            
            $dropdown_html .= '</select>';
            
            
    
    
            $html = '';
    
		

                    		$html .= '<div class="wrap">
                    		    <div class="wpwrap ">
                    		        <form action="" method="post" id="srb_get_report_meta_form" >
                    		            <!--<input type="hidden" name="action" value="srb_class_report_response">-->
                    			        <input type="hidden" name="srb_add_user_report_nonce" value="'. $srb_add_meta_nonce .'" />
                        		        
                        		        <table class="">
                        		            <tr>
                        		              <td><div>
                                				    <label for="'.$this->plugin_name.'-ctid"> '. _e("Class", $this->plugin_name).' </label><br>
                        				             ' . $dropdown_html . ' <br>
                        			             </div>
                        			         </td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><input type="date" id="srb-recorddate" name="srb[reportdate]" required><br></td>
                        		            </tr>
                        		        </table>
                        		        
                        		        <p class="submit"><input type="submit" name="submit" id="reportsubmit" class="button button-primary srb-button" value="Search">
                        		            <img src="'.admin_url('images/wpspin_light.gif').'" id="srb_loading" class="waitting" style="display:none"/>
                        		        </p>
                        		        </form>
                    		    </div>	
                            
                            </div>
                    		<br/><br/>
                    		
                    		<div class="wrap">
                    		    <div class="wpwrap ">
                    		    <div>
                                    <h2 id="srb-class"> Class : </h2>
                                    <h2 id="srb-tsdate"> Date : </h2>
                        		</div>
                    		        <table  class="blm-table" id="reporttable" border="1" >
                                      <thead>
                                       <tr>
                                        <th width="15%">Period</th>
                                        <th width="25%">Subject</th>
                                        <th width="15%">IsDone</th>
                                        <th width="25%">Reason</th>
                                      </tr>
                                      </thead>
                                  <tbody>
                                  </tbody>
                                  </table>
                    		    </div>
                    		</div>
                    		
                    		<div style="text-align: center" >
                    		    <h2 id="empty-warnning" style="color:red"></h2>
                    		</div>    
                    		    
                    		<div id="srb_form_feedback"></div>';
                    		echo $html;
        ?>
        
        <script type="text/javascript">
        
            "use strict";
            jQuery(function ($) {
            
                $(document).ready(function () {
                
                    jQuery('#srb_get_report_meta_form').on('submit', function () {
                        $('srb_loading').show();
        	            var data = {
        	            	action:"srb_report_response",
        	            	class_id: $('#srb_class_select').val(),
        	            	report_date: $('#srb-recorddate').val()
        	            };
                        
                        jQuery.post(params.ajaxurl, data, function(response){
        	            	//alert(response);
        	            	
        	            	$("#reporttable tbody").empty();
        	            	$("#empty-warnning").html("");
        	            	$('#srb-class').html("Class : ");
        	            	$('#srb-tsdate').html("Date : ");
        	            	
        	                var data = JSON.parse(response);
        	                
        	                if( data == null ) {
        	                    
        	                    $("#empty-warnning").html("----- No Records Found -----");
        	                    
        	                } else {
        	                    
                                $('#srb-class').html("Class : " + data[0].classname);
            	            	$('#srb-tsdate').html("Date : " + data[0].tdate);
          	                
            	            	for(let i=0; i<data.length; ++i) {
                                    var id = data[i].id;
                                    var slot = data[i].slot;
                                    var subname = data[i].subname;
                                    var isdone = data[i].isdone == 1 ? '<span style="color:green;font-weight:bold">Yes</span>' : '<span style="color:red;font-weight:bold">No</span>';
                                    var reason = data[i].reason == null ? '': '<span style="color:red;font-weight:bold">' + data[i].reason + '</span>';
                        
                                    var tr_str = "<tr>" +
                                        "<td align='center'>" + slot + "</td>" +
                                        "<td align='center'>" + subname + "</td>" +
                                        "<td align='center'>" + isdone + "</td>" +
                                        "<td align='center'>" + reason + "</td>" +
                                        "</tr>";
                        
                                    $("#reporttable tbody").append(tr_str);
                                }
        	                    
        	                }
                                $('srb_loading').hide(); 
        	                });
                        return false;
                    });
                });
            });  	
    	            /*
    	            jQuery.post('https://www.mrcstudent.com/wp-admin/admin-ajax.php', data, function(response){
    	            	//alert(response);
    	            	//$('#srb-class').html(response);
    	                   var keys = Object.keys(response);
  
                            
    	            	var len = response.size;
    	            	$('#srb-class').html("Date :" + response['subname']);
    	            	$("#srb-tsdate").html("Date :" + response[0][7]);
    	            	

    	                
    	            	for(let i=0; i<len; ++i) {
                                var id = response[i].id;
                                var slot = response[i].slot;
                                var subname = response[i].subname;
                                var isdone = response[i].isdone;
                                var reason = response[i].reason;
                
                                var tr_str = "<tr>" +
                                    "<td align='center'>" + slot + "</td>" +
                                    "<td align='center'>" + subname + "</td>" +
                                    "<td align='center'>" + isdone + "</td>" +
                                    "<td align='center'>" + reason + "</td>" +
                                    "</tr>";
                
                                $("#reporttable tbody").append(tr_str);
                            }
                        
    	            });
    	            */
    	            
                 	/*
                 	 $.ajax({
                        type:'post',
                        dataType: 'json',
                        url: 'https://www.mrcstudent.com/wp-admin/admin-ajax.php',
                        success:function(data) {
                            $('#srb-class').html(JSON.parse(response));
                        }
                        
                 	 });
                    */
            

        </script>

<?php
