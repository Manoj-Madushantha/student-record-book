<?php

    $mb = new Member();
    $results = $mb->getAll();
            
    //echo $cat->getOutput();
    $dropdown_html = '<select required id="blm_parent_select_memtree_view" name="blm[parentid]">
                    <option value="">' . __('Select a Parent', $this->plugin_text_domain) . '</option>';
                         
    foreach ($results as $result)
    {
        $memid = esc_html($result->getMemid());
        $first_name = esc_html($result->getFirstname());
        $last_name = esc_html($result->getLastname());
                
        $dropdown_html .= '<option value="' . $memid . '">( '. $memid .' )-' . $first_name . '  ' . $last_name . '</option>' . "\n";
    }
    
    $dropdown_html .= '</select>';
    
    $blm_add_meta_nonce = wp_create_nonce('blm_get_tree_view_meta_form_nonce');
    
?>

    <div id="wrap">
        
        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="blm_get_tree_view_meta_ajax_form" >			

			<?php echo $dropdown_html; ?>
			<input type="hidden" name="action" value="blm_memtree_form_response">
			<input type="hidden" name="blm_mem_tree_meta_nonce" value="<?php echo $blm_add_meta_nonce ?>" />
			<input id="<?php echo $this->plugin_name; ?>-treeview_mem_id"  type="hidden" name="<?php echo "blm"; ?>[memid]" value="">
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="GET TREE"></p>
        </form>
        <div id="blm_form_feedback"></div>
    </div>
    
    <?php 