    <?php
       //include_once( plugin_dir_url( __FILE__ ) . 'view/partials-ajax-form-view.php' );
        

        
        /**
         * The form to be loaded on the plugin's admin page
         */
        if (current_user_can('edit_users'))
        {

            // Populate the dropdown list with exising users.
            $dropdown_html = '<select required id="blm_user_select" name="blm[user_select]">
                                    <option value="">' . __('Select a User', $this->plugin_text_domain) . '</option>';
            $wp_users = get_users(array(
                'fields' => array(
                    'user_login',
                    'display_name'
                )
            ));

            foreach ($wp_users as $user)
            {
                $user_login = esc_html($user->user_login);
                $user_display_name = esc_html($user->display_name);

                $dropdown_html .= '<option value="' . $user_login . '">' . $user_login . ' (' . $user_display_name . ') ' . '</option>' . "\n";
            }
            $dropdown_html .= '</select>';

            // Generate a custom nonce value.
            $blm_add_meta_nonce = wp_create_nonce('blm_add_user_meta_form_nonce');
            $mb = new Member();
            // Build the Form
            
?>				
		<h2><?php _e('WordPress AJAX form request via wp-admin/admin-ajax.php', $this->plugin_name); ?></h2>		
		<div class="blm_add_user_meta_form">
					
		<form action="" method="post" id="blm_add_user_meta_ajax_form" >			

			<?php echo $dropdown_html; ?>
			<input type="hidden" name="action" value="blm_form_response">
			<input type="hidden" name="blm_add_user_meta_nonce" value="<?php echo $blm_add_meta_nonce ?>" />			
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-mem_id"> <?php _e('Member ID', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-mem_id" type="text" name="<?php echo "blm"; ?>[memid]" value="<?php echo $mb->getNextID(); ?>" placeholder="<?php _e('Member ID', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-parent_id"> <?php _e('Parent ID', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-parent_id" type="text" name="<?php echo "blm"; ?>[parentid]" value="" placeholder="<?php _e('Parent ID', $this->plugin_name); ?>"/><br>
			</div>  
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-user_name"> <?php _e('User Name', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-user_name" type="text" name="<?php echo "blm"; ?>[username]" value="" placeholder="<?php _e('User Name', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-password"> <?php _e('Password', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-password" type="text" name="<?php echo "blm"; ?>[password]" value="" placeholder="<?php _e('Password', $this->plugin_name); ?>"/><br>
			</div>   
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-first_name"> <?php _e('First Name', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-first_name" type="text" name="<?php echo "blm"; ?>[firstname]" value="" placeholder="<?php _e('First Name', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-last_name"> <?php _e('Last Name', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-last_name" type="text" name="<?php echo "blm"; ?>[lastname]" value="" placeholder="<?php _e('Last Name', $this->plugin_name); ?>"/><br>
			</div>   
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-gender"> <?php _e('Gender', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-dender" type="text" name="<?php echo "blm"; ?>[gender]" value="" placeholder="<?php _e('Gender', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-birth_date"> <?php _e('Birth Date', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-birth_date" type="text" name="<?php echo "blm"; ?>[birthdate]" value="" placeholder="<?php _e('Birst Day', $this->plugin_name); ?>"/><br>
			</div> 
			<div>
				<label for="<?php echo $this->plugin_name; ?>-address"> <?php _e('Address', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-address" type="text" name="<?php echo "blm"; ?>[address]" value="" placeholder="<?php _e('Address', $this->plugin_name); ?>"/><br>
			</div>   
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-city"> <?php _e('City', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-city" type="text" name="<?php echo "blm"; ?>[city]" value="" placeholder="<?php _e('City', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-state"> <?php _e('State', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-state" type="text" name="<?php echo "blm"; ?>[state]" value="" placeholder="<?php _e('State', $this->plugin_name); ?>"/><br>
			</div> 
			<div>
				<label for="<?php echo $this->plugin_name; ?>-country"> <?php _e('Country', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-country" type="text" name="<?php echo "blm"; ?>[country]" value="" placeholder="<?php _e('Country', $this->plugin_name); ?>"/><br>
			</div>   
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-pin_code"> <?php _e('Pin Code', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-pin_code" type="text" name="<?php echo "blm"; ?>[pincode]" value="" placeholder="<?php _e('Pin Code', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-mobile"> <?php _e('Mobile', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-mobile" type="text" name="<?php echo "blm"; ?>[mobile]" value="" placeholder="<?php _e('Mobile', $this->plugin_name); ?>"/><br>
			</div> 
			<div>
				<label for="<?php echo $this->plugin_name; ?>-email"> <?php _e('Email', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-email" type="text" name="<?php echo "blm"; ?>[email]" value="" placeholder="<?php _e('EMail', $this->plugin_name); ?>"/><br>
			</div>   
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-image"> <?php _e('Image', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-image" type="text" name="<?php echo "blm"; ?>[image]" value="" placeholder="<?php _e('Image', $this->plugin_name); ?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-account_flag"> <?php _e('Account Flag', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-account_flag" type="text" name="<?php echo "blm"; ?>[accflag]" value="" placeholder="<?php _e('Accoung Flag', $this->plugin_name); ?>"/><br>
			</div>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Submit Form"></p>
		</form>
		<br/><br/>
		<div id="blm_form_feedback"></div>
		<br/><br/>			
		</div>
    	<?php
        }
        else
        {
?>
    		<p> <?php __("You are not authorized to perform this operation.", $this->plugin_name) ?> </p>
    	<?php
        }