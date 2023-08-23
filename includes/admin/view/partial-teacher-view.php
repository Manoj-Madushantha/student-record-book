<?php
/**
         * The form to be loaded on the plugin's admin page
         */
        global $wpdb;
        if (current_user_can('edit_users'))
        {

            // Generate a custom nonce value.
            $blm_add_meta_nonce = wp_create_nonce('blm_add_user_meta_form_nonce');
            
            $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}srb_teacher WHERE `status`='active' ORDER BY tea_no"));
            $sql="SELECT COUNT(tea_id) FROM `" .  $wpdb->prefix . 'srb_teacher' . "`";
            $nextid = intval($wpdb-> get_var($sql));

            $sql="SELECT COUNT(tea_id) FROM `" .  $wpdb->prefix . 'srb_teacher' . "`";
            $rowcount = intval($wpdb-> get_var($sql));

            //echo $cat->getOutput();
            $dropdown_html = '<select required id="blm_parent_select" name="blm[parentid]">
                                        <option value="">' . __('Select a Parent', $this->plugin_text_domain) . '</option>';
                         
            foreach ($results as $result)
            {
                $memid = esc_html($result->tea_id);
                $first_name = esc_html($result->tea_name);
                $last_name = esc_html($result->tea_no);
                
                $dropdown_html .= '<option value="' . $memid . '">( '. $memid .' )-' . $first_name . '  ' . $last_name . '</option>' . "\n";
            }
            $dropdown_html .= '</select>';
            // Build the Form
             $srb_add_meta_nonce = wp_create_nonce('srb_add_user_meta_form_nonce');
?>				        <div class="wrap">
            				<h2><?php _e( 'Teacher', $this->plugin_name ); ?></h2>
                    		<div class="blm_add_user_meta_form">
                    		    
                    		    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="blm_add_user_meta_form" >			

                    			<input type="hidden" name="action" value="srb_form_response">
                    			<input type="hidden" name="srb_add_user_meta_nonce" value="<?php echo $srb_add_meta_nonce ?>" />
                    			
                        			<table class="">
                        			    <tr>
                        			        <td>
                        			            <div>
                                				<label for="<?php echo $this->plugin_name; ?>-tea_id"> <?php _e('Teacher ID', $this->plugin_name); ?> </label><br>
                                				<input required id="<?php echo $this->plugin_name; ?>-teaid" type="text" name="<?php echo "srb"; ?>[teaid]" value="<?php echo $nextid; ?>" placeholder="<?php _e('Teacher ID', $this->plugin_name); ?>" />
                                    			</div>
                        			        </td>
                        			    <tr>
                        			        <td>
                        			            <div>
                                				<label for="<?php echo $this->plugin_name; ?>-name"> <?php _e('Name', $this->plugin_name); ?> </label><br>
                        				        <input required id="<?php echo $this->plugin_name; ?>-teaname" type="text" name="<?php echo "srb"; ?>[teaname]" value="" placeholder="<?php _e('Name', $this->plugin_name); ?>"/><br>
                        			            </div>  
                        			        </td>
                        			    </tr>
                        			    <tr>
                        			        <td>
                        			            <div>
                                				<label for="<?php echo $this->plugin_name; ?>-code"> <?php _e('Code', $this->plugin_name); ?> </label><br>
                        				        <input required id="<?php echo $this->plugin_name; ?>-code" type="text" name="<?php echo "srb"; ?>[code]" value="" placeholder="<?php _e('code', $this->plugin_name); ?>"/><br>
                        			            </div>
                        			        </td>
                        			    </tr>
                        			</table>
                                
          
                    			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary blm-button" value="Add"></p>
                    			
                    		    </form>
                    		    <div id="blm_form_feedback"></div>
                    		 </div>
                    	</div>
                    		<br/><br/>
                    		
                    		<br/>
                    		
                    	
                    		
                    		
                    		<div class="wrap">
                    		    <p>Number of Rows : <?php echo $rowcount; ?></p>
                    		    <table class="blm-table">
                                <thead>
                                  <tr>
                                    <th >Teacher ID</th>
                                    <th >Teacher Name</th>
                                    <th >Teacher Code</th>
                                    <th width="5%">Edit</th>
                                    <th width="5%">Del</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 1;
                                         foreach ( $results as $result )  {
                                             
                                            echo '<tr>';
                                            echo '<td> '.$i.'</td>';
                                            echo '<td> '.$result->tea_name.'</td>';
                                            echo '<td> '.$result->tea_no.'</td>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-teacher&action=edit&id='.$result->tea_id.'" ><i class="fa fa-pencil-square  fa-lg" aria-hidden="true"></i></a></td>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-teacher&action=delete&id='.$result->tea_id.'" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
                                            echo '</tr>';
                                            $i++;

                                         }   
                                        
                                    ?>

     
                                    </tbody>
                                </table>
                    		    
                    		</div>
                    		
                        	
            	<?php
        }
        else
        {
?>
            		<p> <?php __("You are not authorized to perform this operation.", $this->plugin_name) ?> </p>
            	<?php
        }

