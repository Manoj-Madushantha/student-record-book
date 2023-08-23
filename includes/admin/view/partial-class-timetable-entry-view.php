<?php
// Generate a custom nonce value.
    $srb_add_meta_nonce = wp_create_nonce('srb_add_user_tt_entry_form_nonce');
    
    $cat2 = new stClass();

    $results = $cat2->getAll();
    
    $tb = new TimeTable();
    $year = 2023;
    $entered = $tb->getExistClassAll($year);
    
    //echo $cat->getOutput();

            
            //echo $cat->getOutput();
            $dropdown_html = '<select required id="srb_class_select_tt_entry" name="srb[clid]">
                                        <option value="">' . __('Select Class', $this->plugin_text_domain) . '</option>';
                         
            foreach ($results as $result)
            {
                $clid = esc_html($result->getCid());
                $clname = esc_html($result->getCname());
                    
                $dropdown_html .= '<option value="' . $clid . '">( '. $clid .' )-' . $clname . '</option>' . "\n";
            }
            
            $dropdown_html .= '</select>';
            
            
?>
            
            <div class="wrap">
                    		    <div class="wpwrap">
                    		    
                    		    <h3>Entered Time Tables for <?php echo $year ?> </h3>
                    		    <table>
                        		            <tr>
                        		            <th>class</th><th>Year</th>
                        		            </tr>
                        		            
                        		     <?php
                        		     
                        		     foreach($entered as $row) {
                        		         
                        		         echo '<tr><td>'. $cat2->getOneClass($row)->getCname()  .'</td><td>'. $year .'</td></tr>';
                        		         
                        		     }       
                        		            
                        		    ?>  
                        		            
                        		   <br/>         

                    		       <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ) ?>" method="post" id="srb_get_class_timetable_entry_meta_form" >
                    		            <input type="hidden" name="action" value="srb_timetable_entry_response">
                    			        <input type="hidden" name="srb_timetable_entry_nonce" value="<?php echo $srb_add_meta_nonce ?>" />
                        		        
                        		        <table class="">
                        		            <tr>
                        		              <td><div>
                                				    <label for="<?php echo $this->plugin_name ?>-ctid"> <?php _e("Class", $this->plugin_name) ?> </label><br>
                        				             <?php echo  $dropdown_html ?> <br>
                        			             </div>
                        			         </td>
                        		            </tr>
                        		            
                        		            <tr>
                        		                <td><select required id="srb_year_select" name="srb[year]">
                                                        <option value=""><?php  __('Select year', $this->plugin_text_domain) ?></option>
                                                        <option value="2022"> 2022 </option>
                                                        <option value="2023"> 2023 </option>
                                                        <option value="2024"> 2024 </option>
                                                        <option value="2025"> 2025 </option>
                                                    </select>
                                                </td>
                        		            </tr>
                        		        </table>
                        		        
                        		        
                    		<br/><br/>
                    		
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
                                    <tr>
                                        <td>7.50-8.30</td>
                                        <td> <select required id="srb_monslot1" name="srb[monslot1]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain) ?></option>
                                            </select>
                                        </td>
                                        <td><select required id="srb_tueslot1" name="srb[tueslot1]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot1" name="srb[wedslot1]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot1" name="srb[thuslot1]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot1" name="srb[frislot1]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>8.30-9.10</td>
                                        <td><select required id="srb_monslot2" name="srb[monslot2]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot2" name="srb[tueslot2]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot2" name="srb[wedslot2]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot2" name="srb[thuslot2]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot2" name="srb[frislot2]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>9.10-9.50</td>
                                        <td><select required id="srb_monslot3" name="srb[monslot3]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot3" name="srb[tueslot3]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot3" name="srb[wedslot3]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot3" name="srb[thuslot3]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot3" name="srb[frislot3]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>9.50-10.30</td>
                                        <td><select required id="srb_monslot4" name="srb[monslot4]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot4" name="srb[tueslot4]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot4" name="srb[wedslot4]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot4" name="srb[thuslot4]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot4" name="srb[frislot4]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    </tr>
                                    
                                    <tr>
                                        <td>10.30-10.50</td>
                                        <td colspan="5" align="center" > INTERVAL </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>10.50-11.30</td>
                                        <td><select required id="srb_monslot5" name="srb[monslot5]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot5" name="srb[tueslot5]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot5" name="srb[wedslot5]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot5" name="srb[thuslot5]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot5" name="srb[frislot5]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>11.30-12.10</td>
                                        <td><select required id="srb_monslot6" name="srb[monslot6]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot6" name="srb[tueslot6]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot6" name="srb[wedslot6]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot6" name="srb[thuslot6]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot6" name="srb[frislot6]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>12.10-12.50</td>
                                        <td><select required id="srb_monslot7" name="srb[monslot7]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot7" name="srb[tueslot7]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot7" name="srb[wedslot7]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot7" name="srb[thuslot7]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot7" name="srb[frislot7]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td>12.50-1.30</td>
                                        <td><select required id="srb_monslot8" name="srb[monslot8]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_tueslot8" name="srb[tueslot8]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_wedslot8" name="srb[wedslot8]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_thuslot8" name="srb[thuslot8]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                        <td><select required id="srb_frislot8" name="srb[frislot8]">
                                                <option value=""><?php __('Select Subject', $this->plugin_text_domain); ?></option>
                                            </select></td>
                                    </tr>
                                    </tr>
                                  </tbody>
                                  </table>
                                  
                                  <p class="submit"><input type="submit" name="submit" id="reportsubmit" class="button button-primary srb-button" value="Add">
                        		            <img src="'.admin_url('images/wpspin_light.gif').'" id="srb_loading" class="waitting" style="display:none"/>
                        		        </p>
                        		  </form>
                    		    </div>	
                            
                            </div>
                    		
                    		<div style="text-align: center" >
                    		    <h2 id="empty-warnning" style="color:red"></h2>
                    		</div>    
                    		    
                    		<div id="srb_form_feedback"></div>

                    <?php
