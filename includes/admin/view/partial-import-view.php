<!-- CSV IMPORT PART -->
                    		
    <div class="wrap">
        <!-- Some inline style -->
        <style type="text/css">
            .srbmsp-m-title {
                margin: 0 !important;
                padding: 8px 12px !important;
            }
        </style>
        
        <div style="display: none;" id="srbmsp-imload" class="updated fade">
                        
            <p><img style="height: 15px; vertical-align: middle;" src="<?php echo plugin_dir_url(__FILE__); ?>../images/loader.gif" alt="" /> Importing Results...Please wait... </p>
                        
        </div>
                        		
    </div><!-- end wrap -->
    
    <!-- Upload facility for Teacher Table -->                    	
    <div class="wrap">
        <h2><?php _e('Import CSV for Teacher Table'); ?></h2>
        <!-- Ajax Response Message -->
        <div class="ajax-response-message"></div>
                        		
        <div id="dashboard-widgets-wrap">
            <div class="metabox-holder" id="dashboard-widgets">
                <div id="postbox-container" class="postbox-container">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable"><div style="display: block;" id="dashboard_quick_press" class="postbox ">
                        <h3 class="hndle srbmsp-m-title" style="cursor: default;"><span><span class="hide-if-no-js">Upload Csv File</span></span></h3>
                        	<div style="overflow: hidden;" class="inside">

                        		<form action="" method="post" id="srbmsp-import" class="srbmsp-import">
                                                    
                        			<div style="margin: 10px 0;" class="input-text-wrap">
                        				<span style="font-size: 15px; margin-right: 5px;"><label for="result-status">Result will be</label></span>
                        				<select id="result-status" name="srbmsp_rstatus" class="" required>	
                        					<option selected="selected" value="">Select</option>
                        					<option value="draft">Drafted</option>
                        					<option value="publish">Published</option>
                        				</select>
                        			</div>
                        						
                        			<div class="input-text-wrap">
                        				<input type="text" name="srbmsp_csv_file" id="srbmsp-csv-file" placeholder="Upload or paste direct url of .csv file" class="srbmsp-csv-upload" id="srbmsp_csv_file" required />
                        			</div>
                        							
                        			<div style="margin: 10px 0;" class="input-text-wrap">
                        				<button style="float: right;" class="srbmsp_csv_upload button">Upload</button>
                        			</div>
                        
                        			<p class="submit">
                        				<?php submit_button('Import'); ?>
                        			</p>
                        							
                        		</form>
                        	</div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    
    <!-- Upload facility for Teacher Table --> 
    <div class="wrap">
        <h2><?php _e('Import CSV for Class Table'); ?></h2>
        <!-- Ajax Response Message -->
        <div class="ajax-response-message-class"></div>
                        		
        <div id="dashboard-widgets-wrap">
            <div class="metabox-holder" id="dashboard-widgets">
                <div id="postbox-container" class="postbox-container">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable"><div style="display: block;" id="dashboard_quick_press" class="postbox ">
                        <h3 class="hndle srbmsp-m-title" style="cursor: default;"><span><span class="hide-if-no-js">Upload Csv File</span></span></h3>
                        	<div style="overflow: hidden;" class="inside">

                        		<form action="" method="post" id="srbmsp-import-class" class="srbmsp-import-class">
                                                    
                        			<div style="margin: 10px 0;" class="input-text-wrap">
                        				<span style="font-size: 15px; margin-right: 5px;"><label for="result-status">Result will be</label></span>
                        				<select id="result-status-class" name="srbmsp_rstatus-class" class="" required>	
                        					<option selected="selected" value="">Select</option>
                        					<option value="draft">Drafted</option>
                        					<option value="publish">Published</option>
                        				</select>
                        			</div>
                        						
                        			<div class="input-text-wrap">
                        				<input type="text" name="srbmsp_csv_file-class" id="srbmsp-csv-file-class" placeholder="Upload or paste direct url of .csv file" class="srbmsp-csv-upload-class" id="srbmsp_csv_file-class" required />
                        			</div>
                        							
                        			<div style="margin: 10px 0;" class="input-text-wrap">
                        				<button style="float: right;" class="srbmsp_csv_upload-class button">Upload</button>
                        			</div>
                        
                        			<p class="submit">
                        				<?php submit_button('Import'); ?>
                        			</p>
                        							
                        		</form>
                        	</div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
 
 <?php
 
