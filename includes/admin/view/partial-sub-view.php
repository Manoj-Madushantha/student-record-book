<?php

    // Generate a custom nonce value.
    $srb_add_meta_nonce = wp_create_nonce('srb_add_user_sub_form_nonce');
    
    $sub = new Subject();
    
    $next = $sub->getNextID();

    $results = $sub->getAll();  
            
    
    
    $html = '';
    
	?>			
            				<h2><?php _e( 'Subjects', $this->plugin_name ); ?></h2>		
                    		<div class="wrap">
                    		    <div class="wpwrap ">
                    		        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="srb_add_sub_meta_form" >
                    		            <input type="hidden" name="action" value="srb_sub_form_response">
                    			        <input type="hidden" name="srb_add_user_sub_nonce" value="<?php echo $srb_add_meta_nonce ?>" />
                        		        <table class="">
                        		            <tr>
                        		                <td><?php _e('Subject ID', $this->plugin_name); ?> </td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-sid" type="text" name="<?php echo "srb"; ?>[sid]" value="<?php echo $next; ?>" placeholder="<?php _e('Subject ID', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Subject Name', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-sname" type="text" name="<?php echo "srb"; ?>[sname]" value="" placeholder="<?php _e('Subject Name', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Subject Code', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-scode" type="text" name="<?php echo "srb"; ?>[scode]" value="" placeholder="<?php _e('Subject Code', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		        </table>
                        		        
                        		        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary srb-button" value="Add"></p>
                        		        </form>
                    		    </div>	
                    		    
                    		<table class="wp-list-table fixed striped blm-table">
                                <thead>
                                  <tr>
                                    <th >Subject ID</th>
                                    <th >Subject Name</th>
                                    <th width="10%">Subject Code</th>
                                    <th width="5%">Edit</th>
                                    <th width="5%">Del</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                         foreach ( $results as $resul )  {
                                             
                                            echo '<tr>';
                                            echo '<td> '.$resul->getSid().'</td>';
                                            echo '<td> '.$resul->getSname().'</td>';
                                            echo '<td> '.$resul->getCode().'</td>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-class&action=edit&id='.$resul->getSid().'" ><i class="fa fa-pencil-square  fa-lg" aria-hidden="true"></i></a>';
                                            echo '<td> <a class="list-group-item" href="?page=student-record-book-class&action=delete&id='.$resul->getSid().'" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>';
                                            echo '</tr>';
                                        
                                         }   
                                        
                                    ?>

     
                                </tbody>
                            </table>
                            
                            </div>
                    		<br/><br/>
                    		<div id="srb_form_feedback"></div>
   		
                    		
            	
            	<?php