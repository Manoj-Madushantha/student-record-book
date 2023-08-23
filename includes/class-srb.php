<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.ictknowledgehub.com/
 * @since      1.0.0
 *
 * @package    Student Record Book
 * @subpackage Student Record Book/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Student Record Book
 * @subpackage Student Record Book/includes
 * @author     Manoj Madushantha <manojmadushantha@gmail.com>
 */
class SRB {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Quiz_Maker_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
	    
		if ( defined( 'SRB_VERSION' ) ) {
			$this->version = SRB_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'student-record-book';

		$this->load_dependencies();
		//$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();


	}


    /**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Quiz_Maker_Loader. Orchestrates the hooks of the plugin.
	 * - Quiz_Maker_i18n. Defines internationalization functionality.
	 * - Quiz_Maker_Admin. Defines all hooks for the admin area.
	 * - Quiz_Maker_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {


        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-teacher.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-cl.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-subject.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-timeslot.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-report.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-timetable.php';
        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin/libs/fpdf.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin/libs/whatsapp-php-sdk-main/ultramsg.class.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/srb/class-pdf.php';

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-srb-loader.php';


		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin/class-admin.php';

        /**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/public/class-srb-public.php';
		
        //$cat = new Category();
        $this->loader = new SRB_Loader();

    }


    /**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new SRB_Admin( $this->get_plugin_name(), $this->get_version() );

        //$this->loader->add_filter('theme_page_templates', $plugin_admin , 'my_template_register', 10, 3);

        //$this->loader->add_filter('template_include', $plugin_admin , 'my_template_select', 99);

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		
        // Add menu item
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

        $this->loader->add_action( 'admin_post_srb_form_response', $plugin_admin, 'save_teacher' );
        //$this->loader->add_action( 'wp_ajax_srb_form_response', $plugin_admin, 'save_member');

        
        $this->loader->add_action( 'admin_post_srb_cat_form_response', $plugin_admin, 'save_class' );
        $this->loader->add_action( 'admin_post_srb_sub_form_response', $plugin_admin, 'save_subject' );
                                                                                            
        $this->loader->add_action('admin_post_srb_timetable_entry_response', $plugin_admin, 'set_class_timetable');
        
        $this->loader->add_action('wp_ajax_srb_class_timetable_response', $plugin_admin, 'get_class_timetable'); // This is for authenticated users
        $this->loader->add_action('wp_ajax_nopriv_srb_class_timetable_response', $plugin_admin, 'get_class_timetable'); // This is for unauthenticated users.    
        
        $this->loader->add_action( 'admin_post_srb_whatsapp_response', $plugin_admin, 'send_message' );
        
        $this->loader->add_action('wp_ajax_srb_report_response', $plugin_admin, 'get_report'); // This is for authenticated users
        $this->loader->add_action('wp_ajax_nopriv_srb_report_response', $plugin_admin, 'get_report'); // This is for unauthenticated users.
                
        $this->loader->add_action('wp_ajax_srb_report_by_date_response', $plugin_admin, 'get_report_by_date'); // This is for authenticated users
        $this->loader->add_action('wp_ajax_nopriv_srb_report_by_date_response', $plugin_admin, 'get_report_by_date'); // This is for unauthenticated users.        
        
        $this->loader->add_action('wp_ajax_srb_report_summary_response', $plugin_admin, 'get_report_summary_by_date'); // This is for authenticated users
        $this->loader->add_action('wp_ajax_nopriv_srb_report_summary_response', $plugin_admin, 'get_report_summary_by_date');
        
        $this->loader->add_action('admin_post_srb_report_by_date_print_pdf_action', $plugin_admin, 'get_report_by_date_pdf');    
        $this->loader->add_action('admin_post_srb_report_summary_print_pdf_action', $plugin_admin, 'get_report_summary_print_pdf'); 
        
        
        $this->loader->add_action('wp_ajax_srbmsp_ari', $plugin_admin, 'srbmsp_ajaxResultImport');
        $this->loader->add_action('wp_ajax_nopriv_srbmsp_ari', $plugin_admin, 'srbmsp_ajaxResultImport');
        
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'srbmsp_csv_import_script');
        
        //$this->loader->add_action( 'wp_ajax_srb_class_report_response', $plugin_admin, 'get_report');
        //$this->loader->add_action( 'wp_ajax_nopriv_srb_class_report_response', $plugin_admin, 'get_report');
        
        //$this->loader->add_action( 'admin_post_srb_product_form_response', $plugin_admin, 'save_product' );
        
        // Register admin notices
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'print_plugin_admin_notices');
        

    }

    /**
	 * Register all of the hooks related to the public area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
	    
	    $plugin_public = new SRB_Public( $this->get_plugin_name(), $this->get_version() );
	    
		//$plugin_public_quiz_category = new Quiz_Maker_Quiz_Category( $this->get_plugin_name(), $this->get_version() );
		//$plugin_public_results_page = new Quiz_Maker_All_Results( $this->get_plugin_name(), $this->get_version() );
		//$plugin_public_quiz_all_results_page = new Quiz_Maker_Quiz_All_Results( $this->get_plugin_name(), $this->get_version() );
		//$plugin_public_display_questions = new Quiz_Maker_Display_Questions( $this->get_plugin_name(), $this->get_version() );
		//$plugin_public_extra_shortcodes = new Ays_Quiz_Maker_Extra_Shortcodes_Public( $this->get_plugin_name(), $this->get_version() );
		//$plugin_public_most_popular_shortcodes = new Ays_Quiz_Maker_Most_Popular_Shortcodes_Public( $this->get_plugin_name(), $this->get_version() );admin_post_srb_form_time_record_response
        $this->loader->add_action( 'init', $plugin_public, 'my_script_enqueuer' );

        $this->loader->add_action( 'init', $plugin_public, 'srb_generate_time_record_action_method' );
		$this->loader->add_action( 'init', $plugin_public, 'srb_generate_time_record_action_method69' );
		$this->loader->add_action( 'init', $plugin_public, 'srb_generate_time_record_action_methodal' );
		
		$this->loader->add_action( 'wp_ajax_check_time_slots_exist_response', $plugin_public, 'srb_check_timeslot_exsist' );
		$this->loader->add_action('wp_ajax_nopriv_check_time_slots_exist_response', $plugin_public, 'srb_check_timeslot_exsist');
		
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public , 'enqueue_styles' );
		
        
		//$this->loader->add_action( 'wp_ajax_srb_generate_timetable_mid_section_response', $plugin_public, 'srb_generate_time_table_mid_section_method' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' ); 
		
		
		// $this->loader->add_action( 'wp_head', $plugin_public, 'aaaa' );
	}
	
    /**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Quiz_Maker_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
?>