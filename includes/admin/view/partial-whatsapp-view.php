<?php
/**
         * The form to be loaded on the plugin's admin page
         */
        if (current_user_can('edit_users'))
        {

            // Generate a custom nonce value.
            $blm_add_meta_nonce = wp_create_nonce('blm_add_user_meta_form_nonce');

            

            // Build the Form
             $srb_add_meta_nonce = wp_create_nonce('srb_add_user_meta_form_nonce');
?>				
            				<h2><?php _e( 'Whatsapp', $this->plugin_name ); ?></h2>		
                    		<div class="blm_add_user_meta_form">
                    		    
                    		    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="blm_whatsapp_meta_form" >			

                    			<input type="hidden" name="action" value="srb_whatsapp_response">
    
                    			<div class="srb_cat_meta_form">
                        			<table class="">
                        			    <tr>
                        			        <td>
                        			            <div>
                                				<label for="<?php echo $this->plugin_name; ?>-recipient"> <?php _e('To', $this->plugin_name); ?> </label><br>
                                				<input required id="<?php echo $this->plugin_name; ?>-teaid" type="text" name="<?php echo "srb"; ?>[to]" value="" placeholder="<?php _e('Whatsapp Number', $this->plugin_name); ?>" />
                                    			</div>
                        			        </td>
                        			    <tr>
                        			        <td>
                        			            <div>
                                				<label for="<?php echo $this->plugin_name; ?>-msg"> <?php _e('Message', $this->plugin_name); ?> </label><br>
                        				        <input required id="<?php echo $this->plugin_name; ?>-msg" type="text" name="<?php echo "srb"; ?>[msg]" value="" placeholder="<?php _e('Message', $this->plugin_name); ?>"/><br>
                        			            </div>  
                        			        </td>
                        			    </tr>
                        			</table>
                                </div>
          
                    			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary blm-button" value="Send"></p>
                    			
                    		    </form>
                    		    
                    		<br/><br/>
                    		<div id="blm_form_feedback"></div>
                    		<br/><br/>			

            	<?php
        }
        else
        {
?>
            		<p> <?php __("You are not authorized to perform this operation.", $this->plugin_name) ?> </p>
            	<?php
        }