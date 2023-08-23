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
                    		        <form action="" method="post" id="srb_get_class_timetable_meta_form" >
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
                        		                <td><select required id="srb_year_select" name="srb[year]">
                                                        <option value="">' . __('Select year', $this->plugin_text_domain) . '</option>
                                                        <option value="2022"> 2022 </option>
                                                        <option value="2023"> 2023 </option>
                                                    </select>
                                                        </td>
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
                                    <h2 id="srb-year"> Year : </h2>
                        		</div>
                    		        <table  class="blm-table" id="classtimetable" border="1" >
                                      <thead>
                                       <tr>
                                        <th width="10%">Period</th>
                                        <th width="15%">Monday</th>
                                        <th width="15%">Tuesday</th>
                                        <th width="15%">Wednsday</th>
                                        <th width="15%">Thursday</th>
                                        <th width="15%">Friday</th>
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
                
                    jQuery('#srb_get_class_timetable_meta_form').on('submit', function () {
                        $('srb_loading').show();
        	            var data = {
        	            	action:"srb_class_timetable_response",
        	            	class_id: $('#srb_class_select').val(),
        	            	year: $('#srb_year_select').val()
        	            };
                        
                        jQuery.post(params.ajaxurl, data, function(response){
        	            	//alert(response);
        	            	//var data = JSON.parse(response);
        	            	
        	            	//alert(response);
        	            
        	            	$("#classtimetable tbody").empty();
        	            	$("#empty-warnning").html("");
        	            	$('#srb-class').html("Class : ");
        	            	$('#srb-year').html("Year : ");
        	            	
        	                var data = JSON.parse(response);
        	                
        	                if( response == null ) {
        	                    
        	                    $("#empty-warnning").html("----- No Records Found -----");
        	                    
        	                } else {
        	                    
                                $('#srb-class').html("Class : " + data[0].classname);
            	            	$('#srb-year').html("Year : " + data[0].academic_year);
          	                    const slots = ['7.50 - 8.30','8.30 - 9.10','9.10 - 9.50','9.50 - 10.30','10.50 - 11.30','11.30 - 12.10','12.10 - 12.50','12.50 - 1.30'];
          	                    
          	                        
          	                    const timeslot = [[data[0].slot1,data[1].slot1,data[2].slot1,data[3].slot1,data[4].slot1], 
          	                                      [data[0].slot2,data[1].slot2,data[2].slot2,data[3].slot2,data[4].slot2],
          	                                      [data[0].slot3,data[1].slot3,data[2].slot3,data[3].slot3,data[4].slot3],
          	                                      [data[0].slot4,data[1].slot4,data[2].slot4,data[3].slot4,data[4].slot4],
          	                                      [data[0].slot5,data[1].slot5,data[2].slot5,data[3].slot5,data[4].slot5],
          	                                      [data[0].slot6,data[1].slot6,data[2].slot6,data[3].slot6,data[4].slot6],
          	                                      [data[0].slot7,data[1].slot7,data[2].slot7,data[3].slot7,data[4].slot7],
          	                                      [data[0].slot8,data[1].slot8,data[2].slot8,data[3].slot8,data[4].slot8]]
          	                

          	                   
                            for( let i=0; i< timeslot.length; i++ ) {
                                
                                if (i==4) {
                                    var tr_str = "<tr><td align='center'>10.30 - 10.50</td><td align='center' colspan='5'>Interval</td></tr>";
                                    $("#classtimetable tbody").append(tr_str);
                                }
                                
                                var tr_str = "<tr>" + "<td align='center'>" + slots[i] + "</td>";
                                
                                for( let j=0; j< 5; j++ ) {

                                    tr_str +=  "<td align='center'>" + timeslot[i][j] + "</td>";
                                            
                                }
                                
                                tr_str +=  "</tr>";
                            
                                $("#classtimetable tbody").append(tr_str);
                                
                                
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
