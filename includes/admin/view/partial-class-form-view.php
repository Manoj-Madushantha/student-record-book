<?php

    // Generate a custom nonce value.
    $srb_add_meta_nonce = wp_create_nonce('srb_add_user_class_form_nonce');
    
    $cat2 = new stClass();
    
    $next = $cat2->getNextID();

    $results = $cat2->getAll();
    
    //echo $cat->getOutput();

            $mb = new Teacher();
            $resultst = $mb->getAll();
            
            //echo $cat->getOutput();
            $dropdown_html = '<select id="srb_teacher_select" name="srb[ctid]">
                                        <option value="">' . __('Select Class Teacher', $this->plugin_text_domain) . '</option>';
                         
            foreach ($resultst as $result)
            {
                $tid = esc_html($result->getTid());
                $teaname = esc_html($result->getTeaname());
                $teacode = esc_html($result->getCode());
                
                $dropdown_html .= '<option value="' . $tid . '">( '. $tid .' )-' . $teaname . '  ' . $teacode . '</option>' . "\n";
            }
            
            $dropdown_html .= '</select>';
            
            
    
    
    $html = '';
    
	?>			
            				<h2><?php _e( 'Categories', $this->plugin_name ); ?></h2>		
                    		<div class="wrap">
                    		    <div class="wpwrap">
                    		        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="srb_add_cat_meta_form" >
                    		            <input type="hidden" name="action" value="srb_cat_form_response">
                    			        <input type="hidden" name="srb_add_user_class_nonce" value="<?php echo $srb_add_meta_nonce ?>" />
                        		        <table class="">
                        		            <tr>
                        		                <td><?php _e('Class ID', $this->plugin_name); ?> </td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-cid" type="text" name="<?php echo "srb"; ?>[cid]" value="<?php echo $next; ?>" placeholder="<?php _e('Class ID', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Class Name', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-cname" type="text" name="<?php echo "srb"; ?>[cname]" value="" placeholder="<?php _e('Class Name', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Grade', $this->plugin_name); ?></td>
                        		                <td><select required id="srb_grade_select" name="srb[grade]">
                                                        <option value="">Select Grade</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                    </select>
                                                </td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Section', $this->plugin_name); ?></td>
                        		                <td>
                        		                    <select required id="srb_section_select" name="srb[section]">
                                                        <option value="">Select Section</option>
                                                        <option value="junior_section">junior_section</option>
                                                        <option value="junior_middle_section">junior_middle_section</option>
                                                        <option value="middle_section">middle_section</option>
                                                        <option value="al_section">al_section</option>
                                                    </select>
                                                </td>
                        		            </tr>
                        		            <tr>
                        		                <td colspan="2" >
                        		                <div>
                                				    <label for="<?php echo $this->plugin_name; ?>-ctid"> <?php _e('Class Teacher', $this->plugin_name); ?> </label><br>
                        				            <?php echo $dropdown_html; ?><br>
                        			             </div>
                        			             </td>
                        			             <input id="srb_ctid_hidden" type="hidden" name="srb[ctidhiden]" value="">
                        		            </tr>
                        		        </table>
                        		        
                        		        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary srb-button" value="Add"></p>
                        		        </form>
                    		    </div>	
                    		    
                    		<table class="wp-list-table fixed striped blm-table">
                                <thead>
                                  <tr>
                                    <th >Class ID</th>
                                    <th >Class Name</th>
                                    <th >Class Teacher ID</th>
                                    <th >Class Teacher Name</th>
                                    <th width="5%"> Edit </th>
                                    <th width="5%"> Del </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                         foreach ( $results as $resul )  {
                                             
                                            echo '<tr>';
                                            echo '<td> '.$resul->getCid().'</td>';
                                            echo '<td> '.$resul->getCname().'</td>';
                                            echo '<td> '.$resul->getCtid().'</td>';
                                            echo '<td> '.$resul->getCtname().'</td>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-class&action=edit&id='.$resul->getCid().'" ><i class="fa fa-pencil-square  fa-lg" aria-hidden="true"></i></a>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-class&action=delete&id='.$resul->getCid().'" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>';
                                            echo '</tr>';
                                        
                                         }   
                                        
                                    ?>

     
                                </tbody>
                            </table>
                            
                            </div>
                    		<br/><br/>
                    		<div id="srb_form_feedback"></div>
   		
                    		
            	
            	<?php
        