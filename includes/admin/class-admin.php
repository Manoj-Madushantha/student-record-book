<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.ictknowledgehub.com/
 * @since      1.0.0
 *
 * @package    Student Record Book
 * @subpackage Student Record Book/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Student Record Book
 * @subpackage Student Record Book/admin
 * @author     Manoj Madushantha <manojmadushantha@gmail.com>
 */

class SRB_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;


    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        add_filter('set-screen-option', array(__CLASS__, 'set_screen'), 10, 3);

    }

    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name . '-admin', plugin_dir_url(__FILE__) . 'css/srb.admin.css', array() , $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-admin-cards', plugin_dir_url(__FILE__) . 'css/srb.styles.cards.css', array() , $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-admin-product', plugin_dir_url(__FILE__) . 'css/srb-table-product.css', array() , $this->version, 'all');
        wp_register_style($this->plugin_name . '-jquery-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' , array() , $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-jquery-font-awesome');
    }

    public function enqueue_scripts()
    {

        $params = array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'adminurl' => plugin_dir_url(__FILE__)
        );
        wp_register_script('srb_ajax_handle', plugin_dir_url(__FILE__) . 'js/srb-admin-ajax.js', array('jquery') , $this->version, false);
        wp_localize_script('srb_ajax_handle', 'params', $params);
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'srb_ajax_handle' );
        wp_enqueue_script('srb_ajax_form_handle', plugin_dir_url(__FILE__) . 'js/srb-form.js', array(
            'jquery'
        ) , $this->version, false);
        
        wp_register_script('jquery_confirm', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js', array('jquery') , $this->version, false);
        wp_enqueue_script('jquery_confirm');
        //}
        

    }
    
    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
        */

        add_menu_page('Student Record Book Setting Page', 'SRB', 'manage_options', $this->plugin_name, array(
            $this,
            'dashboard_form_page_content'
        ) , 'dashicons-id-alt');

        // Add a submenu page and save the returned hook suffix.
        $html_teacher_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('TEACHER', $this->plugin_text_domain) , //page title
        __('TEACHER', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-teacher', //menu_slug
        array(
            $this,
            'html_teacher_form_page_content'
        ) //callback for page content
        );

        // Add a submenu page and save the returned hook suffix.
        $ajax_class_form_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('CLASS', $this->plugin_text_domain) , //page title
        __('CLASS', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-class', //menu_slug
        array(
            $this,
            'html_class_form_page_content'
        ) //callback for page content
        );
        
        // Add a submenu page display categories the returned hook suffix.
        $ajax_sub_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('SUBJECT', $this->plugin_text_domain) , //page title
        __('SUBJECT', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-sub' , //menu_slug
        array(
            $this,
            'html_sub_page_content'
        ) //callback for page content
        );
        
        
        // Add a submenu page display categories the returned hook suffix.
         $ajax_class_timetable_entry_page_hook = add_submenu_page($this->plugin_name, //parent slug
         __('TIMETABLE ENTRY', $this->plugin_text_domain) , //page title
         __('TIMETABLE ENTRY', $this->plugin_text_domain) , //menu title
         'manage_options', //capability
         $this->plugin_name . '-class-timetable-entry' , //menu_slug
         array(
             $this,
             'html_timetable_entry_page_content'
         ) //callback for page content
         );
         
        // Add a submenu page display categories the returned hook suffix.
         $ajax_class_timetable_page_hook = add_submenu_page($this->plugin_name, //parent slug
         __('TIMETABLE ', $this->plugin_text_domain) , //page title
         __('TIMETABLE', $this->plugin_text_domain) , //menu title
         'manage_options', //capability
         $this->plugin_name . '-class-timetable' , //menu_slug
         array(
             $this,
             'html_class_timetable_page_content'
         ) //callback for page content
         );

         // Add a submenu page display categories the returned hook suffix.
         $ajax_whatsapp_page_hook = add_submenu_page($this->plugin_name, //parent slug
         __('WHATSAPP', $this->plugin_text_domain) , //page title
         __('WHATSAPP', $this->plugin_text_domain) , //menu title
         'manage_options', //capability
         $this->plugin_name . '-whatsapp' , //menu_slug
         array(
             $this,
             'html_whatsapp_page_content'
         ) //callback for page content
         );
        
        // Add a submenu page display categories the returned hook suffix.
        $ajax_report_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('Report', $this->plugin_text_domain) , //page title
        __('REPORT', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-report' , //menu_slug
        array(
            $this,
            'html_report_page_content'
        ) //callback for page content
        );
        
        // Add a submenu page display categories the returned hook suffix.
        $ajax_report_by_date_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('Report By Date', $this->plugin_text_domain) , //page title
        __('REPORT BY DATE', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-report-by-date' , //menu_slug
        array(
            $this,
            'html_report_by_date_page_content'
        ) //callback for page content
        );
        
        // Add a submenu page display categories the returned hook suffix.
        $ajax_report_summary_by_date_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('Report Summary By Date', $this->plugin_text_domain) , //page title
        __('REPORT SUMMARY BY DATE', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-report-summary-by-date' , //menu_slug
        array(
            $this,
            'html_report_summary_by_date_page_content'
        ) //callback for page content
        );
        
        // Add a submenu page display Import the returned hook suffix.
        $ajax_import_page_hook = add_submenu_page($this->plugin_name, //parent slug
        __('Import CSV', $this->plugin_text_domain) , //page title
        __('IMPORT', $this->plugin_text_domain) , //menu title
        'manage_options', //capability
        $this->plugin_name . '-import' , //menu_slug
        array(
            $this,
            'html_import_page_content'
        ) //callback for page content
        );
       
        
        
        /*
         * The $page_hook_suffix can be combined with the load-($page_hook) action hook
         * https://codex.wordpress.org/Plugin_API/Action_Reference/load-(page)
         *
         * The callback below will be called when the respective page is loaded
        */
        add_action('load-' . $html_teacher_page_hook, array(
            $this,
            'loaded_html_teacher_form_submenu_page'
        ));
        add_action('load-' . $ajax_class_form_page_hook, array(
            $this,
            'loaded_html_class_form_submenu_page'
        ));
        add_action('load-' . $ajax_sub_page_hook, array(
            $this,
            'loaded_html_sub_submenu_page'
        ));
        add_action('load-' . $ajax_class_timetable_entry_page_hook, array(
            $this,
            'loaded_html_class_timetable_entry_submenu_page'
        ));
        add_action('load-' . $ajax_class_timetable_page_hook, array(
            $this,
            'loaded_html_class_timetable_submenu_page'
        ));
        add_action('load-' . $ajax_whatsapp_page_hook, array(
            $this,
            'loaded_html_whatsapp_submenu_page'
        ));
        add_action('load-' . $ajax_report_page_hook, array(
            $this,
            'loaded_html_report_submenu_page'
        ));
        add_action('load-' . $ajax_report_by_date_page_hook, array(
            $this,
            'loaded_html_report_by_date_submenu_page'
        ));
        add_action('load-' . $ajax_report_summary_by_date_page_hook, array(
            $this,
            'loaded_html_report_summary_by_date_submenu_page'
        ));
        add_action('load-' . $ajax_import_page_hook, array(
            $this,
            'loaded_html_import_submenu_page'
        ));

    }

    /*
     * Callback for the load-($html_form_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
    public function loaded_html_teacher_form_submenu_page()
    {
        // called when the particular page is loaded.
        
    }

    /*
     * Callback for the load-($ajax_form_page_hook)
     * Called when the plugin's submenu Ajax form page is loaded
     *
     * @since	1.0.0
    */
    public function loaded_html_class_form_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
     public function loaded_html_sub_submenu_page()
    {
        // called when the particular page is loaded.
        
    }

    
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
     public function loaded_html_class_timetable_entry_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
     public function loaded_html_class_timetable_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
    public function loaded_html_whatsapp_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
    public function loaded_html_report_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    /*
     * Callback for the load-($html_cat_page_hook)
     * Called when the plugin's submenu HTML form page is loaded
     *
     * @since	1.0.0
    */
    public function loaded_html_report_by_date_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    public function loaded_html_report_summary_by_date_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    
    public function loaded_html_import_submenu_page()
    {
        // called when the particular page is loaded.
        
    }
    

     public function dashboard_form_page_content(){}

    public function html_class_form_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-class-form-view.php' );

    }
    
    public function html_teacher_form_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-teacher-view.php' );

    }
    
    public function html_sub_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-sub-view.php' );

    }
    
    public function html_timetable_entry_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-class-timetable-entry-view.php' );

    }
    
    public function html_class_timetable_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-class-timetable-view.php' );

    }

    public function html_whatsapp_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-whatsapp-view.php' );

    }
    
    public function html_report_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-report-view.php' );
        
    }
    
    public function html_report_by_date_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-report-by-date-view.php' );
        
    }
    
    public function html_report_summary_by_date_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-report-summary-by-date-view.php' );
        
    }
    
    public function html_import_page_content()
    {
        include_once( plugin_dir_path(  __FILE__  ) . 'view/partial-import-view.php' );
        
    }
    

    public function save_teacher()
    {

        if (isset($_POST['srb_add_user_meta_nonce']) && wp_verify_nonce($_POST['srb_add_user_meta_nonce'], 'srb_add_user_meta_form_nonce'))
        {
            

            // server processing logic
            if (isset($_POST['ajaxrequest']) && $_POST['ajaxrequest'] === 'true')
            {
                
                // server response
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
                wp_die();
                
            } else {
                
                $srb_teaid = sanitize_text_field($_POST['srb']['teaid']);
                $srb_teaname = sanitize_text_field($_POST['srb']['teaname']);
                $srb_code = sanitize_text_field($_POST['srb']['code']);
    
                $mb = new Teacher();
    
                $mb->setTid($srb_teaid);
                $mb->setTeaname($srb_teaname);
                $mb->setCode($srb_code);
    
                //insert to data base
                $mb->Insert();
                
                // server response
                $admin_notice = "success";
                $this->custom_redirect($admin_notice, nl2br($mb->getOutput()));
                exit;
            }

            
        }
        else
        {
             wp_die(__('Invalid nonce specified', $this->plugin_name) , __('Error', $this->plugin_name) , array(
                'response' => 403,
                'back_link' => 'admin.php?page=' . $this->plugin_name,
             ));
        }
    }

    public function save_class() {
        
        if (isset($_POST['srb_add_user_class_nonce']) && wp_verify_nonce($_POST['srb_add_user_class_nonce'], 'srb_add_user_class_form_nonce'))
        {
            $srb_cid = sanitize_text_field($_POST['srb']['cid']);
            $srb_cname = sanitize_text_field($_POST['srb']['cname']);
            $srb_ctid = sanitize_text_field($_POST['srb']['ctid']);
            $srb_grade = sanitize_text_field($_POST['srb']['grade']);
            $srb_section = sanitize_text_field($_POST['srb']['section']);

            $tea = new Teacher();
            
            //$teacher = $tea->getOneTeacher($srb_ctid);
            $srb_ctname = $tea->getOneTeacher($srb_ctid)->getTeaname();
            
            $cat = new stClass();
            
            $cat->setCid($srb_cid);
            $cat->setCname($srb_cname);
            $cat->setCtid($srb_ctid);
            $cat->setCtname($srb_ctname);
            $cat->setCgrade($srb_grade);
            $cat->setCsection($srb_section);
            
            //insert to data base
            $cat->Insert();
            
            // server response
            $admin_notice = "success";
            $this->custom_redirect($admin_notice, $cat->getOutput(), '-class');
            exit;
        } else {
            wp_die(__('Invalid nonce specified', $this->plugin_name.'-class') , __('Error', $this->plugin_name) , array(
                'response' => 403,
                'back_link' => 'admin.php?page=' . $this->plugin_name,
            ));
        }
            
    }
    
    public function save_subject() {
        
        if (isset($_POST['srb_add_user_sub_nonce']) && wp_verify_nonce($_POST['srb_add_user_sub_nonce'], 'srb_add_user_sub_form_nonce'))
        {
            $srb_sid = sanitize_text_field($_POST['srb']['sid']);
            $srb_sname = sanitize_text_field($_POST['srb']['sname']);
            $srb_stid = sanitize_text_field($_POST['srb']['scode']);
            
            $sub = new Subject();
            
            
            $sub->setSid($srb_sid);
            $sub->setSname($srb_sname);
            $sub->setCode($srb_stid);
            
            //insert to data base
            $sub->Insert();
            
            // server response
            $admin_notice = "success";
            $this->custom_redirect($admin_notice, $sub->getOutput(), '-sub');
            exit;
        } else {
            wp_die(__('Invalid nonce specified', $this->plugin_name.'-sub') , __('Error', $this->plugin_name) , array(
                'response' => 403,
                'back_link' => 'admin.php?page=' . $this->plugin_name,
            ));
        }
            
    }
    
    
    public function set_class_timetable() {
        
            global $wpdb;

            if (isset($_POST['srb_timetable_entry_nonce']) && wp_verify_nonce($_POST['srb_timetable_entry_nonce'], 'srb_add_user_tt_entry_form_nonce'))
            {
                $clid = sanitize_text_field($_POST['srb']['clid']);
                $year = sanitize_text_field($_POST['srb']['year']);
                
                $monslot1 = sanitize_text_field($_POST['srb']['monslot1']);
                $monslot2 = sanitize_text_field($_POST['srb']['monslot2']);
                $monslot3 = sanitize_text_field($_POST['srb']['monslot3']);
                $monslot4 = sanitize_text_field($_POST['srb']['monslot4']);
                $monslot5 = sanitize_text_field($_POST['srb']['monslot5']);
                $monslot6 = sanitize_text_field($_POST['srb']['monslot6']);
                $monslot7 = sanitize_text_field($_POST['srb']['monslot7']);
                $monslot8 = sanitize_text_field($_POST['srb']['monslot8']);
                
                $tueslot1 = sanitize_text_field($_POST['srb']['tueslot1']);
                $tueslot2 = sanitize_text_field($_POST['srb']['tueslot2']);
                $tueslot3 = sanitize_text_field($_POST['srb']['tueslot3']);
                $tueslot4 = sanitize_text_field($_POST['srb']['tueslot4']);
                $tueslot5 = sanitize_text_field($_POST['srb']['tueslot5']);
                $tueslot6 = sanitize_text_field($_POST['srb']['tueslot6']);
                $tueslot7 = sanitize_text_field($_POST['srb']['tueslot7']);
                $tueslot8 = sanitize_text_field($_POST['srb']['tueslot8']);
                
                $wedslot1 = sanitize_text_field($_POST['srb']['wedslot1']);
                $wedslot2 = sanitize_text_field($_POST['srb']['wedslot2']);
                $wedslot3 = sanitize_text_field($_POST['srb']['wedslot3']);
                $wedslot4 = sanitize_text_field($_POST['srb']['wedslot4']);
                $wedslot5 = sanitize_text_field($_POST['srb']['wedslot5']);
                $wedslot6 = sanitize_text_field($_POST['srb']['wedslot6']);
                $wedslot7 = sanitize_text_field($_POST['srb']['wedslot7']);
                $wedslot8 = sanitize_text_field($_POST['srb']['wedslot8']);
                
                $thuslot1 = sanitize_text_field($_POST['srb']['thuslot1']);
                $thuslot2 = sanitize_text_field($_POST['srb']['thuslot2']);
                $thuslot3 = sanitize_text_field($_POST['srb']['thuslot3']);
                $thuslot4 = sanitize_text_field($_POST['srb']['thuslot4']);
                $thuslot5 = sanitize_text_field($_POST['srb']['thuslot5']);
                $thuslot6 = sanitize_text_field($_POST['srb']['thuslot6']);
                $thuslot7 = sanitize_text_field($_POST['srb']['thuslot7']);
                $thuslot8 = sanitize_text_field($_POST['srb']['thuslot8']);
                
                $frislot1 = sanitize_text_field($_POST['srb']['frislot1']);
                $frislot2 = sanitize_text_field($_POST['srb']['frislot2']);
                $frislot3 = sanitize_text_field($_POST['srb']['frislot3']);
                $frislot4 = sanitize_text_field($_POST['srb']['frislot4']);
                $frislot5 = sanitize_text_field($_POST['srb']['frislot5']);
                $frislot6 = sanitize_text_field($_POST['srb']['frislot6']);
                $frislot7 = sanitize_text_field($_POST['srb']['frislot7']);
                $frislot8 = sanitize_text_field($_POST['srb']['frislot8']);
                
                $table = $wpdb->prefix . "srb_timetable_class";
                
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $table . "  
    			(`cl_id`, `academic_year`, `day`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`) 
    			VALUES ( $clid, $year, 'mon', $monslot1 , $monslot2, $monslot3, $monslot4, $monslot5, $monslot6, $monslot7, $monslot8),
    			       ( $clid, $year, 'tue', $tueslot1 , $tueslot2, $tueslot3, $tueslot4, $tueslot5, $tueslot6, $tueslot7, $tueslot8),
    			       ( $clid, $year, 'wed', $wedslot1 , $wedslot2, $wedslot3, $wedslot4, $wedslot5, $wedslot6, $wedslot7, $wedslot8),
    			       ( $clid, $year, 'thu', $thuslot1 , $thuslot2, $thuslot3, $thuslot4, $thuslot5, $thuslot6, $thuslot7, $thuslot8),
    			       ( $clid, $year, 'fri', $frislot1 , $frislot2, $frislot3, $frislot4, $frislot5, $frislot6, $frislot7, $frislot8)"));
    			        
    			        if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            
    			        }
                
                
                // server response
                $admin_notice = "success";
                $this->custom_redirect($admin_notice, "Time Table Succsessfully Entered", '-class-timetable-entry');
                exit;
            } else {
                wp_die(__('Invalid nonce specified', $this->plugin_name.'-class-timetable-entry') , __('Error', $this->plugin_name) , array(
                    'response' => 403,
                    'back_link' => 'admin.php?page=' . $this->plugin_name.'-class-timetable-entry',
                ));
        }
    }
    
    
     public function get_class_timetable() {

            $clid = $_POST['class_id'];
            $year = $_POST['year'];
            
            $cl = new stClass();
            $sub = new Subject();
            $ts = new TimeTable();

            
            $tss = $ts->getAll($clid, $year);
            
            //var_dump($tss);

            foreach( $tss as $ts ) {
               
                $clname = $cl->getOneClass($ts->getClid())->getCname();
                $subnameslot1 = $sub->getOneSubject($ts->getSlot1())->getSname();
                $subnameslot2 = $sub->getOneSubject($ts->getSlot2())->getSname();
                $subnameslot3 = $sub->getOneSubject($ts->getSlot3())->getSname();
                $subnameslot4 = $sub->getOneSubject($ts->getSlot4())->getSname();
                $subnameslot5 = $sub->getOneSubject($ts->getSlot5())->getSname();
                $subnameslot6 = $sub->getOneSubject($ts->getSlot6())->getSname();
                $subnameslot7 = $sub->getOneSubject($ts->getSlot7())->getSname();
                $subnameslot8 = $sub->getOneSubject($ts->getSlot8())->getSname();
                
              
                $returnArr[] = array(
                    
                    'classid' => $ts->getClid(),
                    'classname' =>$clname,
                    'academic_year' => $ts->getAcademicyear(),
                    'day' => $ts->getDay(),
                    'slot1'=> $subnameslot1,
                    'slot2'=> $subnameslot2,
                    'slot3'=> $subnameslot3,
                    'slot4'=> $subnameslot4,
                    'slot5'=> $subnameslot5,
                    'slot6'=> $subnameslot6,
                    'slot7'=> $subnameslot7,
                    'slot8'=> $subnameslot8
                    
                    );

                   
            }
            //$returnArr = $this->flipDiagonally($returnArr);
            /*
            $result = [];
            $keys = array_keys($returnArr);
            foreach ($returnArr[$keys[0]] as $k => $v) {  // only iterate first "row"
                $result[] = array_combine($keys, array_column($returnArr, $k));  // store each "column" as an associative "row"
            }
            var_dump($result);*/
            echo json_encode($returnArr);
            wp_die();
        
    }
    

    public function send_message() {
        
        if(isset($_POST['srb']['to']) && $_POST['srb']['to']!='') {
            
            $srb_to = sanitize_text_field($_POST['srb']['to']);
            $srb_msg = sanitize_text_field($_POST['srb']['msg']);
    
            $ultramsg_token="tm69ccf6qiq796v9"; // Ultramsg.com token
            $instance_id="instance23977"; // Ultramsg.com instance id
            $client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);
    
            $to=$srb_to; 
            $body=$srb_msg; 
            $api=$client->sendChatMessage($to,$body);
            //print_r($api);
                
                // server response
            $admin_notice = "success";
            $this->custom_redirect($admin_notice, $api, '-whatsapp');
            exit;
        }
        exit;
            
    }
    
    public function get_report() {

            $clid = $_POST['class_id'];
            $rdate = $_POST['report_date'];
            
            $cl = new stClass();
            $sub = new Subject();
            $ts = new TimeSlot();

            
            $tss = $ts->getAll($clid, $rdate);
            
            //var_dump($tss);

            foreach( $tss as $ts ) {
               
                $clname = $cl->getOneClass($ts->getClid())->getCname();
                $subname = $sub->getOneSubject($ts->getSubid())->getSname();
                
                $returnArr[] = array(
                    
                    'id'=> $ts->getTsid(),
                    'subname'=> $subname,
                    'classid' =>$ts->getClid(),
                    'classname' =>$clname,
                    'slot'=> $ts->getSlot(),
                    'isdone'=> $ts->getIsdone(),
                    'reason'=> $ts->getReason(),
                    'tdate'=> date("Y-m-d", strtotime($ts->getTsdate()))
                    
                    );
                   
            }
            
            echo json_encode($returnArr);
            wp_die();
        
    }
    
    
   
    function get_report_by_date() {
        
            global $wpdb;
            $rdate = $_POST['report_date'];
            //var_dump($_POST);
            $summaryall = array();
            $timeslotAll = array();
            $timeslot = array();
            $cl = new stClass();
            $sub = new Subject();
            $ts = new TimeSlot();

 
            $nocl = $ts->getDistinctCountClasses($rdate);
            $clses = $ts->getDistinctClassesList($rdate); // get class id array in given date

                    
            for($i=0; $i<$nocl; $i++ )  {       
              
                    $numrec = $ts->getRowCountByClass($clses[$i], $rdate);
                    //var_dump($rdate);
                    $clname = $cl->getOneClass($clses[$i])->getCname();
                    
                    //$rdat = strtotime($rdate);
                    
                    $results = $wpdb->get_results(
                        "SELECT * FROM `" . $wpdb->prefix . "srb_timeslot`  WHERE `cl_id`=". $clses[$i] ." AND `ts_date`='" . $rdate . "'"
                    );
                    
                    foreach ( $results as $result => $row ) {
                        
                        $subname = $sub->getOneSubject($row->sub_id)->getSname();
                        
                        $timeslot[] = array(
                                        'ts_id' => $row->ts_id,
                                        'cl_id' => $row->cl_id,
                                        'cl_name' => $clname,
                                        'numofclass' => $nocl,
                                        'numofrecords'=>$numrec,
                                        'sub_id' => $row->sub_id,
                                        'subname'=> $subname,
                                        'slot' => $row->slot,
                                        'isdone' => $row->isDone,
                                        'reason' => $row->reason,
                                        'ts_date' => date('Y-m-d', strtotime($row->ts_date))
                                    
                                      );
                    }
                    
                    $timeslotAll[] =  $timeslot;
                    $timeslot = array();
                    
            }
            //var_dump($timeslotAll);
            echo json_encode($timeslotAll);
            wp_die();
        
    }
    
    function get_report_by_date_pdf() {
        
            global $wpdb;
            $rdate = $_POST['rdate'];
            //var_dump($_POST);
            $summaryall = array();
            $timeslotAll = array();
            $timeslot = array();
            $cl = new stClass();
            $sub = new Subject();
            $ts = new TimeSlot();

 
            $nocl = $ts->getDistinctCountClasses($rdate);
            $clses = $ts->getDistinctClassesList($rdate); // get class id array in given date

                    
            for($i=0; $i<$nocl; $i++ )  {       
              
                    $numrec = $ts->getRowCountByClass($clses[$i], $rdate);
                    //var_dump($rdate);
                    $clname = $cl->getOneClass($clses[$i])->getCname();
                    
                    //$rdat = strtotime($rdate);
                    
                    $results = $wpdb->get_results(
                        "SELECT * FROM `" . $wpdb->prefix . "srb_timeslot`  WHERE `cl_id`=". $clses[$i] ." AND `ts_date`='" . $rdate . "'"
                    );
                    
                    foreach ( $results as $result => $row ) {
                        
                        $subname = $sub->getOneSubject($row->sub_id)->getSname();
                        
                        $timeslot[] = array(
                                        'ts_id' => $row->ts_id,
                                        'cl_id' => $row->cl_id,
                                        'cl_name' => $clname,
                                        'numofclass' => $nocl,
                                        'numofrecords'=>$numrec,
                                        'sub_id' => $row->sub_id,
                                        'subname'=> $subname,
                                        'slot' => $row->slot,
                                        'isdone' => $row->isDone,
                                        'reason' => $row->reason,
                                        'ts_date' => date('Y-m-d', strtotime($row->ts_date))
                                    
                                      );
                    }
                    
                    $timeslotAll[] =  $timeslot;
                    $timeslot = array();
                    
            }
            //var_dump($timeslotAll);
            
            $pdf = new PDF("P","mm","A4");
            // Column headings
            $header = array('PERIOD', 'SUBJECT', 'ISDONE', 'REASON');
            // Data loading
            //$data = $pdf->LoadData('countries.txt');
            $pdf->SetFont('Arial','',14);
            $pdf->AddPage();
            //var_dump($pdf->GetX(), $pdf->GetY());
            $pdf->BasicTable1($header,$timeslotAll);

            $pdf->Output();
            
            $admin_notice = "success";
            

            
        
    }
    
    function get_report_summary_by_date() {
        
            global $wpdb;
            $rdate = $_POST['report_date'];
            
            //var_dump($_POST);
            $summaryall = array();
            $summary = array();
            $clsList = array();
            $totall = 0;
            $tottaughtall = 0;
            $totnotall = 0;
            $totlib = 0;
            
            //$rdat = strtotime($rdate);
        
        for ( $i=6; $i<14; $i++ ) {
                
                $totall = 0;
                $tottaughtall = 0;
                $totnotall = 0;
                $totlib = 0;
                
                try {
            
                    $results = $wpdb->get_results(
                        "SELECT * FROM `" . $wpdb->prefix . "srb_class` WHERE grade=".$i." ORDER BY `cl_name`"
                    );
                    
                    if (count($results)> 0) {
                        //do here
                        foreach ( $results as $result => $row ) {
                        
                        $clsList[] = array (
                            'cl_id' => $row->cl_id,
                            'cl_name' => $row->cl_name,
                            'section' => $row->section
                        );
        
                    }
                    
                    
                    for( $j=0; $j<count($clsList); $j++ ) {
                        
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE `cl_id` =" . $clsList[$j]['cl_id'] . " AND `reason` LIKE '%No students follow this subject in this Class%' AND  `ts_date` = '" . $rdate . "'";
                        $nostufollow = intval($wpdb-> get_var($sql));
                                       
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND ts_date='" . $rdate . "'";
                        $total = intval($wpdb-> get_var($sql)) - $nostufollow;

                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND isDone=0 AND ts_date='" . $rdate . "'";
                        $nottaught = intval($wpdb-> get_var($sql)) - $nostufollow; 
                            
                        $taught = $total - $nottaught;
                            
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND sub_id=27 AND ts_date='" . $rdate . "'";
                        $library = intval($wpdb-> get_var($sql));
                            
                        $totall += $total;
                        $tottaughtall += $taught;
                        $totnotall += $nottaught;
                        $totlib += $library;
                            
                        $summary[] = array (
            
                            'cl_name'   =>  $clsList[$j]['cl_name'],
                            'section'   =>  $clsList[$j]['section'],
                            'total'     =>  $total,
                            'taught'    =>  $taught,
                            'nottaught' =>  $nottaught,
                            'library'   =>  $library, 
                            'date'      =>  $rdate,
                            'totall'    =>  $totall,
                            'tottaughtall' => $tottaughtall,
                            'totnotall' =>  $totnotall,
                            'totlib'    =>  $totlib
                                
                        );
                        
                    }
                        
                    $summaryall[$i] = $summary;
                    $summary = array();
                    $clsList = array();
                        
                } else {
                        
                    $summaryall[$i] = 'empty';

                }
                    
                    
                    
            } catch (Exception $ex) {
                    
                wp_die(__('Invalid nonce specified', $this->plugin_name.'-report-summary-by-date') , __('Error', $this->plugin_name) , array(
                    'response' => 403,
                    'back_link' => 'admin.php?page=' . $this->plugin_name,
                ));
            }
        }
        
        //var_dump($summaryall);
        echo json_encode($summaryall);
        wp_die();
        
    }
    
    
    function get_report_summary_print_pdf() {
        
        global $wpdb;
        $rdate = $_POST['rdate'];
            
        //var_dump($_POST);
        $summaryall = array();
        $summary = array();
        $clsList = array();

            
        //$rdat = strtotime($rdate);
            
        for ( $i=6; $i<14; $i++ ) {
                
            $totall = 0;
            $tottaughtall = 0;
            $totnotall = 0;
            $totlib = 0;
                
            try {
            
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_class` WHERE grade=".$i." ORDER BY `cl_name`"
                );
                    
                if (count($results)> 0) {
                    //do here
                    foreach ( $results as $result => $row ) {
                        
                    $clsList[] = array (
                        'cl_id' => $row->cl_id,
                        'cl_name' => $row->cl_name,
                        'section' => $row->section
                    );
        
                }
                    
                    
                    for( $j=0; $j<count($clsList); $j++ ) {
                            
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND ts_date='" . $rdate . "'";
                        $total = intval($wpdb-> get_var($sql));
                            
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND isDone=0 AND ts_date='" . $rdate . "'";
                        $nottaught = intval($wpdb-> get_var($sql));
                            
                        $taught = $total - $nottaught;
                            
                        $sql = "SELECT COUNT(ts_id) FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clsList[$j]['cl_id'] . " AND sub_id=27 AND ts_date='" . $rdate . "'";
                        $library = intval($wpdb-> get_var($sql));
                            
                        $totall += $total;
                        $tottaughtall += $taught;
                        $totnotall += $nottaught;
                        $totlib += $library;
                            
                        $summary[] = array (
            
                            'cl_name'   =>  $clsList[$j]['cl_name'],
                            'total'     =>  $total,
                            'taught'    =>  $taught,
                            'nottaught' =>  $nottaught,
                            'library'   =>  $library, 
                            'date'      =>  $rdate,
                            'totall'    =>  $totall,
                            'tottaughtall' => $tottaughtall,
                            'totnotall' =>  $totnotall,
                            'totlib'    =>  $totlib
                                
                        );
                        
                    }
                        
                    $summaryall[$i] = $summary;
                    $summary = array();
                    $clsList = array();
                        
                } else {
                        
                    $summaryall[$i] = 'empty';

                }
                    
                    
                    
            } catch (Exception $ex) {
                    
                wp_die(__('Invalid nonce specified', $this->plugin_name.'-report-summary-by-date') , __('Error', $this->plugin_name) , array(
                    'response' => 403,
                    'back_link' => 'admin.php?page=' . $this->plugin_name,
                ));
            }
        }
        //var_dump($summaryall);
        
            $pdf = new PDF();
            // Column headings
            $header = array('ClName', 'Tot', 'Taut', 'NotTau', 'Lib');
            // Data loading
            //$data = $pdf->LoadData('countries.txt');
            $pdf->SetFont('Arial','',8);
            $pdf->AddPage();
            //var_dump($pdf->GetX(), $pdf->GetY());
            $pdf->BasicTable($header,$summaryall);

            $pdf->Output();
            
            $admin_notice = "success";
            //$this->custom_redirect($admin_notice, 'success', '-report-summary-by-date');
            //exit;
        
    }
    
    /* Ajax result import function */

function srbmsp_ajaxResultImport(){
	

	/* Check form data */

	if( isset($_POST['srbmsp_csv_file']) && isset($_POST['srbmsp_rstatus']) ){
		
		try{
			
			if( empty($_POST['srbmsp_rstatus']) ) {
			
				throw new Exception("Please Select result status...Drafted or Published.");
			}
			
			if( empty($_POST['srbmsp_csv_file']) ) {
			
				throw new Exception("Please Select a file");
			}
			
			$temp = explode(".", $_POST['srbmsp_csv_file']);
			$allowedExts = array("csv");
			$extension = end($temp);
			
			if( !in_array($extension, $allowedExts)){

				throw new Exception("Please Select .CSV file");

			}

			// Result status and file link
			
			$srbmsp_csv_file = $_POST['srbmsp_csv_file'];
			$srbmsp_rstatus = $_POST['srbmsp_rstatus'];
			
			/* Copy to a temp path for importing */
			
			$csv_url  = $srbmsp_csv_file;

			$csv_file = plugin_dir_path( __FILE__ )."temp_csv/results.csv";

			$ch = curl_init($csv_url);
			
			/* Below three line for https url */
			
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$csv_data = curl_exec($ch);

			curl_close($ch);

			if(file_put_contents($csv_file, $csv_data)) {
				// Success
			}
			else {
				// Failed
			}
			

			$handle = fopen($csv_file, 'r');
			
			global $wpdb;
			
			$sql = "delete from {$wpdb->prefix}srb_teacher";
			
			$wpdb->query($sql);
			
			$i = 0;
			
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				
				if($i>0) {
            		
            		$teacher = new Teacher();
            		$teacher->setTid($data[0]);
            		$teacher->setTeaname($data[1]);
            		$teacher->setCode($data[2]);
            		$teacher->setNIC($data[3]);
            		$teacher->Insert();
					
				}
				
				$i++;
			}
			
			/* Count all inserted results */
			$cair = $i-1;
			
			$success = "$cair Results imported and $srbmsp_rstatus successfully";
			
			fclose($handle);
			unlink($csv_file);
			
		}
		
		catch(Exception $e){
		
			$error = $e->getMessage();
		
		}
		
	}
	
	if( isset($_POST['srbmsp_csv_file_class']) && isset($_POST['srbmsp_rstatus_class']) ){
		
		try{
			
			if( empty($_POST['srbmsp_rstatus_class']) ) {
			
				throw new Exception("Please Select result status...Drafted or Published.");
			}
			
			if( empty($_POST['srbmsp_csv_file_class']) ) {
			
				throw new Exception("Please Select a file");
			}
			
			$temp = explode(".", $_POST['srbmsp_csv_file_class']);
			$allowedExts = array("csv");
			$extension = end($temp);
			
			if( !in_array($extension, $allowedExts)){

				throw new Exception("Please Select .CSV file");

			}

			// Result status and file link
			
			$srbmsp_csv_file = $_POST['srbmsp_csv_file_class'];
			$srbmsp_rstatus = $_POST['srbmsp_rstatus_class'];
			
			/* Copy to a temp path for importing */
			
			$csv_url  = $srbmsp_csv_file;

			$csv_file = plugin_dir_path( __FILE__ )."temp_csv/results.csv";

			$ch = curl_init($csv_url);
			
			/* Below three line for https url */
			
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$csv_data = curl_exec($ch);

			curl_close($ch);

			if(file_put_contents($csv_file, $csv_data)){
				// Success
			}
			else{
				// Failed
			}

			$handle = fopen($csv_file, 'r');
			
			global $wpdb;
			
			$sql = "delete from {$wpdb->prefix}srb_class";
			
			$wpdb->query($sql);
			
			$i = 0;
			
			while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				
				if($i>0) {
            	    	
            		$class = new stClass();
            		$class->setCid($data[0]);
            		$class->setCname($data[1]);
            		$class->setCtid($data[2]);
            		$class->setCtname($data[3]);
            		$class->setCgrade($data[4]);
            		$class->setCsection($data[5]);
            		$class->Insert();
					
				}
				
				$i++;
			}
			
			/* Count all inserted results */
			$cair = $i-1;
			
			$success = "$cair Results imported and $srbmsp_rstatus successfully";
			
			fclose($handle);
			unlink($csv_file);
			
		}
		
		catch(Exception $e){
		
			$error = $e->getMessage();
		
		}
		
	}
	
    //Error Message -->
	if( isset( $error ) ): 
    	echo '<div class="error">
    		  <p>'. $error .'</p>
    	      </div>';
    endif;
	
	//Success Message -->
	if( isset( $success ) ):
	    echo '<div class="updated fade">
		      <p>'. $success . '</p>
	          </div>';
	endif;
	
	wp_die();
}
   
function srbmsp_csv_import_script() {
	// This will enqueue the Media Uploader script
	wp_enqueue_media();
}

   
function my_template_array() {

    $temps = [];
    $temps['teacher-template.php'] = 'Teacher Login';
    return $temps;
    
}

function my_template_register($page_templates, $theme, $post) {

    $templates = my_template_array();

    foreach($templates as $tk=>$tv) {
        $page_templates[$tk] = $tv;
    }

    return $page_templates;
}



    function my_template_select($template) {

        global $post, $wp_query, $wpdb;

        if(isset($post->ID)) {

            $page_temp_slug = get_page_template_slug( $post->ID );

            $templates = my_template_array();
            
            if(isset($templates[$page_temp_slug])) {
                $template = plugin_dir_path(__FILE__).$page_temp_slug;
                
            }

        }

        return $template;

    }
   
    public function array_push_assoc($array, $key, $value) {
        
       $array[$key] = $value;
       return $array;
       
    }

    /**
     * Redirect
     *
     * @since    1.0.0
     */
    public function custom_redirect($admin_notice, $response, $slug='')
    {
        wp_redirect(esc_url_raw(add_query_arg(array(
            'srb_admin_add_notice' => $admin_notice,
            'srb_response' => $response,
        ) , admin_url('admin.php?page=' .$this->plugin_name.$slug))));

    }

    /**
     * Print Admin Notices
     *
     * @since    1.0.0
     */
    public function print_plugin_admin_notices()
    {
        if (isset($_REQUEST['srb_admin_add_notice']))
        {
            if ($_REQUEST['srb_admin_add_notice'] === "success")
            {
                $html = '<div class="notice notice-success is-dismissible"> 
							<h2>The request was successful. </h2>';
                $html .= '<pre style="color:green">' . $_REQUEST['srb_response'] . '</pre></div>';
                echo $html;
            } else {
				$html = '<div class="notice notice-error is-dismissible"> 
							<h2>The request was not successful. </h2>';
                $html .= '<pre style="color:red">' . $_REQUEST['srb_response'] . '</pre></div>';
                echo $html;
			}

            // handle other types of form notices
            
        }
        else
        {
            return;
        }

    }


    public function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags)
        {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    
    public function flipDiagonally($arr) {
        $out = array();
        foreach ($arr as $key => $subarr) {
            foreach ($subarr as $subkey => $subvalue) {
                $out[$subkey][$key] = $subvalue;
            }
        }
        return $out;
    }
    
    function my_print_error(){

        global $wpdb;
        
        if($wpdb->last_error !== '') :
        
            $str   = htmlspecialchars( $wpdb->last_result, ENT_QUOTES );
            $query = htmlspecialchars( $wpdb->last_query, ENT_QUOTES );
        
            print "<div id='error'>
            <p class='wpdberror'><strong>WordPress database error:</strong> [$str]<br />
            <p>$wpdb->last_error </p>
            <code>$query</code></p>
            </div>";
        
        endif;

    }

}

?>
