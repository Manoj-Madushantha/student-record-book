<?php


    $prod = new Product();
    
    $next = $prod->getNextID();

    $results = $prod->getAll();
    
    //echo $cat->getOutput();
    $dropdown_html = '<select required id="blm_category_select" name="blm[ctgid]">
                                        <option value="">' . __('Select a Category', $this->plugin_text_domain) . '</option>';
    $cat = new Category();
    
    $categories = $cat->getAll();
                         
    foreach ($categories as $category)
            {
                $ctgid = esc_html($category->getCatId());
                $cat_name = esc_html($category->getCatName());

                $dropdown_html .= '<option value="' . $ctgid . '">( '. $ctgid .' )-' . $cat_name .  '</option>' . "\n";
            }
            $dropdown_html .= '</select>';
    // Generate a custom nonce value.
    $blm_add_meta_nonce = wp_create_nonce('blm_add_user_product_form_nonce');
    
    $html = '';
    
	?>			
            				<h2><?php _e( 'PRODUCTS', $this->plugin_name ); ?></h2>		
                    		<div class="wrap">
                    		    <div class="wpwrap ">
                    		        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="blm_add_prouct_meta_form" >
                    		            <input type="hidden" name="action" value="blm_product_form_response">
                    			        <input type="hidden" name="blm_add_product_meta_nonce" value="<?php echo $blm_add_meta_nonce ?>" />
                        		        <table class="form-table">
                        		            <tr>
                        		                <td><?php _e('Product ID', $this->plugin_name); ?> </td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-item_id" type="text" name="<?php echo "blm"; ?>[itemid]" value="<?php echo $next; ?>" placeholder="<?php _e('Product ID', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Item Name', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-item_name" type="text" name="<?php echo "blm"; ?>[itemname]" value="" placeholder="<?php _e('Item Name', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><?php _e('Category ID', $this->plugin_name); ?> </td>
                        		                <td> <?php echo $dropdown_html; ?></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Category Name', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-cat_name" type="text" name="<?php echo "blm"; ?>[ctgname]" value="" placeholder="<?php _e('Category Name', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><?php _e('Stock', $this->plugin_name); ?> </td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-stock" type="text" name="<?php echo "blm"; ?>[stock]" value="" placeholder="<?php _e('Stock', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Rate', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-stock" type="text" name="<?php echo "blm"; ?>[rate]" value="" placeholder="<?php _e('Rate', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><?php _e('Pre Level', $this->plugin_name); ?> </td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-pre_level" type="text" name="<?php echo "blm"; ?>[prelevel]" value="" placeholder="<?php _e('Pre Level', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            <tr>
                        		                <td><?php _e('Tax', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-tax" type="text" name="<?php echo "blm"; ?>[tax]" value="" placeholder="<?php _e('Tax', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><?php _e('Image', $this->plugin_name); ?></td>
                        		                <td><input required id="<?php echo $this->plugin_name; ?>-image" type="text" name="<?php echo "blm"; ?>[img]" value="" placeholder="<?php _e('Image', $this->plugin_name); ?>" /></td>
                        		            </tr>
                        		            
                        		        </table>
                        		        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary blm-button" value="Add"></p>
                        		        </form>
                    		    </div>	
                    		    
                    		<table class="blm-table-product">
                                <thead>
                                  <tr>
                                    <th >ITEM ID</th>
                                    <th >ITEM NAME</th>
                                    <th >CTG ID</th>
                                    <th >CTG NAME</th>
                                    <th >STOCK</th>
                                    <th >RATE</th>
                                    <th >PRELEVEL</th>
                                    <th >TAX</th>
                                    <th >IMAGE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                         foreach ( $results as $result )  {
                                             
                                            echo '<tr>';
                                            echo '<td> '.$result->getItemId().'</td>';
                                            echo '<td> '.$result->getItemname().'</td>';
                                            echo '<td> '.$result->getCtgid().'</td>';
                                            echo '<td> '.$result->getCtgname().'</td>';
                                            echo '<td> '.$result->getStock().'</td>';
                                            echo '<td> '.$result->getRate().'</td>';
                                            echo '<td> '.$result->getPrelevel().'</td>';
                                            echo '<td> '.$result->getTax().'</td>';
                                            echo '<td> '.$result->getImg().'</td>';
                                            echo '</tr>';
                                        
                                         }   
                                        
                                    ?>

     
                                </tbody>
                            </table>
                            
                            </div>
                    		<br/><br/>
                    		<div id="blm_form_feedback"></div>
   		
                    		
            	
            	<?php
        