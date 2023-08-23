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
                                				     <br>
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
                    		
    <div class="wrapper1">
    	<div id="headersummary" class="header">DAY SUMMARY REPORT </div>
        
        <div id="wwrapp"></div>
  
    </div>              		
    <div style="text-align: center" >
        <h2 id="empty-warnning" style="color:red"></h2>
    </div>    
                    		    
    <div id="srb_form_feedback" style="" >
        <form action="'. esc_url( admin_url( 'admin-post.php' ) ).'" method="post" target="_blank" name="srb_report_summary_print_pdf">
            <input type="hidden" name="action" value="srb_report_summary_print_pdf_action">
            <input type="hidden" name="rdate" value="" id="rdatehidden">
            <p class="submit"><input type="submit" name="submitprint" id="reportsubmitprint" class="button button-primary srb-button" value="Print">
        </form>
    </div>';
    echo $html;
        ?>
        
        <script type="text/javascript">
        
            "use strict";
            jQuery(function ($) {
            
                $(document).ready(function () {
                
                    jQuery('#srb_get_report_meta_form').on('submit', function () {
                        
                        
                        $('srb_loading').show();
                        
        	            var data = {
        	            	action:"srb_report_summary_response",
        	            	report_date: $('#srb-recorddate').val()
        	            };
                        
                        jQuery.post(params.ajaxurl, data, function(response) {
        	            	//alert(response);
        	            	//$("#srb_form_feedback").html(response);
        	            
        	            	//$("#reportsummary tbody").empty();
        	            	
        	                var data = JSON.parse(response);
        	                
        	                if( data == null ) {
        	                    
        	                    $("#empty-warnning").html("----- No Records Found -----");
        	                    
        	                } else {
        	                    $('srb_form_feedback').show();
        	                    $("#headersummary").html("DAY SUMMARY REPORT - " + data[6][0].date);
                                $('input[name="rdate"]').val(data[6][0].date);
          	                    var tr_str='<div class="cards_wrap">';
          	                    
            	            	for(let i=6; i<14; ++i) {
            	            	    
            	            	    if( i == 12 || i == 13 ) {
            	            	        var card_inner = "card_inneral";
            	            	    } else {
            	            	        var card_inner = "card_inner";
            	            	    }
            	            	    
            	            	    tr_str+='<div class="card_item"><div class="'+ card_inner +'"><img src="'+ params.adminurl +'images/grade'+i+'.png"><div class="role_name">GRADE '+i+'</div><div class="real_name">'+ data[i][0].section +'</div><div class="film"><table id="reportsummary" class="styled-table" ><thead><tr><th>class</th><th>total</th><th>tau </th><th>not t</th><th>Lib</th></tr></thead><tbody>';
                                
            	            	    for(let j=0; j<data[i].length; j++) {
            	            	            
                                            var cl_name = data[i][j].cl_name;
                                            var total = data[i][j].total;
                                            var taught = data[i][j].taught;
                                            var nottaught = data[i][j].nottaught;
                                            var library = data[i][j].library;
                                
                                            tr_str += "<tr>" +
                                                "<td><b>" + cl_name + "</b></td>" +
                                                "<td>" + total + "</td>" +
                                                "<td>" + taught + "</td>" +
                                                "<td>" + nottaught + "</td>" +
                                                "<td>" + library + "</td>" +
                                                "</tr>";

            	            	    }
                                
                                    tr_str += "<tr>" +
                                            "<td></td>" +
                                            "<td><b>" + data[i][data[i].length-1].totall + "</b></td>" +
                                            "<td><b>" + data[i][data[i].length-1].tottaughtall + "</b></td>" +
                                            "<td><b>" + data[i][data[i].length-1].totnotall + "</b></td>" +
                                            "<td><b>" + data[i][data[i].length-1].totlib + "</b></td>" +
                                            "</tr></tbody></table></div></div></div>";
            	            	}
            	            	 tr_str += "</div>";
                                
        	                    $('#wwrapp').html(tr_str);
        	                }
                            $('srb_loading').hide();
        	                });
                        return false;
                    });
                });
            });  	

        </script>

<?php
