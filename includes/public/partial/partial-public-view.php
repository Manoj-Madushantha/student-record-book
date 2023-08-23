  <?php
       //include_once( plugin_dir_url( __FILE__ ) . 'view/partials-ajax-form-view.php' );
        
            // Generate a custom nonce value.
            $srb_add_meta_nonce = wp_create_nonce('srb_add_time_table_record_nonce');
            $mb = new stClass();
            $results = $mb->getAll();

            
            
            //drop down for member 
            $dropdown_class_html = '<select required id="srb_class_select" name="srb[clid]">
                                        <option value="">' . __('Select a Class', $this->plugin_text_domain) . '</option>';
                         
            foreach ($results as $result)
            {
                $clid = esc_html($result->getCid());
                $clname = esc_html($result->getCname());
                
                $dropdown_member_html .= '<option value="' . $clid . '">( '. $clid .' )-' . $clname . '</option>' . "\n";
            }
            $dropdown_member_html .= '</select>';
            
            
            // Build the Form

 ?>
                <h2><?php _e('ADD TIME RECORDS', $this->plugin_name); ?></h2>		
        		<div class="srb_add_user_meta_form">
        					
        		<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="srb_add_order_meta__form" >			
        
        			<input type="hidden" name="action" value="srb_form_order_response">
        			<input type="hidden" name="srb_add_class_meta_nonce" value="<?php echo $srb_add_meta_nonce ?>" />			
        			<div>
        				<br>
        				<label for="<?php echo $this->plugin_name; ?>-ts_id"> <?php _e('TS ID', $this->plugin_name); ?> </label><br>
        				<input required id="<?php echo $this->plugin_name; ?>-ts_id" type="text" name="<?php echo "srb"; ?>[tsid]" value="<?php echo $or->getNextID(); ?>" placeholder="<?php _e('TS ID', $this->plugin_name); ?>" /><br>
        			</div>
        			<div>
        				<label for="<?php echo $this->plugin_name; ?>-class_id"> <?php _e('CLASS ID', $this->plugin_name); ?> </label><br>
        				<?php echo $dropdown_class_html; ?><br>
        			</div> 
        			<div style="width: 250px; margin-top:20px">
                        <div id="srb-picker"></div>
                        <input required type="hidden" name="<?php echo "srb"; ?>[creaeddate]" id="result" value="" placeholder="<?php _e('Date', $this->plugin_name); ?>" /><br>
                    </div>
        			<div>
        				
        				
        			</div>
        			<p class="submit">
        			    <input type="submit" name="orderbutton" id="srb-order-button" class="button button-primary" value="Create Order">
        			</p>
        		</form>
        	</div>

    	
<?php 
        