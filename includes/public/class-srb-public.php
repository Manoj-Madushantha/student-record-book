<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mrcstudent.com/
 * @since      1.0.0
 *
 * @package    Student_Record_Book
 * @subpackage Student_Record_Book/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Student_Record_Book
 * @subpackage Student_Record_Book/public
 * @author     Manoj Madushantha <manojmadushantha@gmail.com>
 */
class SRB_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    protected $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    protected $version;

    protected $settings;
    
    protected $buttons_texts;
    
    protected $fields_placeholders;

    /**
     * Initialize the class and set its properties.
     * :)
     * @since    1.0.0
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version){
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        //$this->settings = new Quiz_Maker_Settings_Actions($this->plugin_name);
        //$this->buttons_texts = $this->ays_set_quiz_texts();
        // Load frontend JS & CSS
        
        //add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );
        
        add_shortcode('srb_time_record', array($this, 'srb_generate_time_record_method'));
        
        add_shortcode('srb_time_record69', array($this, 'srb_generate_time_record_method69'));
        
        add_shortcode('srb_time_recordAL', array($this, 'srb_generate_time_record_methodAL'));
        
        
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Quiz_Maker_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Quiz_Maker_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_register_style( $this->plugin_name . '-frontend', plugin_dir_url(__FILE__) .'css/srbpublic.css', array(), $this->version );
		wp_enqueue_style( $this->plugin_name . '-frontend' );
		
        //wp_enqueue_style($this->plugin_name.'-public', plugin_dir_url(__FILE__) . 'css/srbpublic.css', array(), $this->version, 'all');
        
        wp_enqueue_style($this->plugin_name.'-public', plugin_dir_url(__FILE__) . 'css/sidebar.css', array(), $this->version, 'all');
        
        wp_enqueue_style($this->plugin_name.'-font-awesome', plugin_dir_url(__FILE__) . 'css/srbdatetimepicker.css', array(), $this->version, 'all');
        
        wp_enqueue_style($this->plugin_name . '-jquery-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' , array() , $this->version, 'all');
    }

    public function enqueue_styles_early(){

        // General CSS File 

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/srbdatetimepicker.css', array(), $this->version, 'all');


    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
                    
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Quiz_Maker_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Quiz_Maker_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
            
            
            //wp_enqueue_script('blm_jquery_datetimepicker_handle', plugin_dir_url(__FILE__) . 'js/datetimepicker.js', array('jquery') , $this->version, false);
            //wp_enqueue_script($this->plugin_name .'-jquery', plugin_dir_url(__FILE__) . 'js/jquery.min.js', array(), $this->version, false);
            wp_register_style($this->plugin_name .'-publicform', plugin_dir_url(__FILE__) . 'js/publicforms.js', array('jquery'), $this->version, true);
            wp_enqueue_style( $this->plugin_name . '-publicform' );
            //wp_enqueue_script($this->plugin_name .'-publicform', plugin_dir_url(__FILE__) . 'js/chkbx.js', array('jquery'), $this->version, true);
            
            //wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/quiz-maker-public.js', array('jquery'), time(), true);
            wp_register_script('srb_font_awesome', 'https://kit.fontawesome.com/b99e675b6e.js', array('jquery') , $this->version, true);
            wp_enqueue_script('srb_font_awesome');
            
            
    }
    
    function my_script_enqueuer() {

       wp_register_script($this->plugin_name .'-publicform', plugin_dir_url(__FILE__) . 'js/publicforms.js', array('jquery','check_timetable_exsist_script','student-record-book-alsubjectform'), $this->version, false);
       wp_register_script($this->plugin_name .'-alsubjectform', plugin_dir_url(__FILE__) . 'js/AL_Subject_Select.js', array('jquery'),$this->version, true);
       wp_register_script( "check_timetable_exsist_script", plugin_dir_url(__FILE__). 'js/chkTimeTableExsist.js', array('jquery',),$this->version, true );
       wp_localize_script( 'check_timetable_exsist_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
       
       wp_enqueue_script( 'jquery' );
        wp_enqueue_script( $this->plugin_name . '-publicform' );
        wp_enqueue_script( $this->plugin_name . '-alsubjectform' );
       
        wp_enqueue_script( 'check_timetable_exsist_script' );
        
       
    }


    
    public function srb_generate_time_record_action_method() {
        
        //echo "test";
        //wp_die();
        //exit();
        
    }

    
    


    public function srb_generate_time_record_method($attr) {
        
        $this->enqueue_styles();
        $this->enqueue_scripts();
        
        $srb_add_meta_nonce = wp_create_nonce('srb_add_time_table_record_nonce');
        
        if ( is_user_logged_in() ) {
            
            $user = wp_get_current_user();
            if ( in_array( 'student', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
                //The user has the "author" role
                
            $content='';
            
            if ($this->checkInput()) {
	
		        $success = $this->insertTimeSlot();
		        do_action('end_session_action');
		        $cachedFields = [];
		        unset($cachedFields);
		        $period_01_table = '';
		        $period_02_table = '';
		        $period_03_table = '';
		        $period_04_table = '';
		        $period_05_table = '';
		        $period_06_table = '';
		        $period_07_table = '';
		        $period_08_table = '';
		        
        	    if ($success) {

        			$content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Successfully send Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					<a href="https://www.mrcstudent.com/student-record-book" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;	
        	    } else {
        	        $content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Error Occured while sending Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					
        					<h3>'. $wpdb->last_query . ' </h3>
        					<h3>'. $wpdb->last_error . ' </h3>
        					<a href="https://www.mrcstudent.com/student-record-book" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;
        	    }
        	    
	        } else {
                    // Load the cached form fields if available
                    $cachedFields = isset($_SESSION['foo']) ? $_SESSION['foo'] : [];
                    $this->console_log($cachedFields);
                    $this->console_log($_SESSION['foo']);
                    do_action('end_session_action');
                    
                    $sub = [
                        $cachedFields['subid1'],
                        $cachedFields['subid2'],
                        $cachedFields['subid3'],
                        $cachedFields['subid4'],
                        $cachedFields['subid5'],
                        $cachedFields['subid6'],
                        $cachedFields['subid7'],
                        $cachedFields['subid8']
                     ];
                     
                     $table = [
                            'period_01_table',
                            'period_02_table',
                            'period_03_table',
                            'period_04_table',
                            'period_05_table',
                            'period_06_table',
                            'period_07_table',
                            'period_08_table'
                         ];
  
                        
                    $time = [
                            '7.50 - 8.30',
                            '8.30 - 9.10',
                            '9.10 - 9.50',
                            '9.50 - 10.30',
                            '10.50 - 11.30',
                            '11.30 - 12.10',
                            '12.10 - 12.50',
                            '12.50 - 1.30'
                        ];
                     
                     $dropdown = [
                        'dropdown_subject_html1',
                        'dropdown_subject_html2',
                        'dropdown_subject_html3',
                        'dropdown_subject_html4',
                        'dropdown_subject_html5',
                        'dropdown_subject_html6',
                        'dropdown_subject_html7',
                        'dropdown_subject_html8'
                     ];
                    
                    
                    $pb = [
                        'pbas1', 'pgeo1', 'pce1', 'pfr1', 'pjp1', 'pkr1', 'pta1',
                        'pbas2', 'pgeo2', 'pce2', 'pfr2', 'pjp2', 'pkr2', 'pta2',
                        'pbas3', 'pgeo3', 'pce3', 'pfr3', 'pjp3', 'pkr3', 'pta3',
                        'pbas4', 'pgeo4', 'pce4', 'pfr4', 'pjp4', 'pkr4', 'pta4',
                        'pbas5', 'pgeo5', 'pce5', 'pfr5', 'pjp5', 'pkr5', 'pta5',
                        'pbas6', 'pgeo6', 'pce6', 'pfr6', 'pjp6', 'pkr6', 'pta6',
                        'pbas7', 'pgeo7', 'pce7', 'pfr7', 'pjp7', 'pkr7', 'pta7',
                        'pbas8', 'pgeo8', 'pce8', 'pfr8', 'pjp8', 'pkr8', 'pta8',
                        'pom1', 'pwm1', 'pod1', 'par1', 'pelt1', 'psl1', 'pdt1',
                        'pom2', 'pwm2', 'pod2', 'par2', 'pelt2', 'psl2', 'pdt2',
                        'pom3', 'pwm3', 'pod3', 'par3', 'pelt3', 'psl3', 'pdt3',
                        'pom4', 'pwm4', 'pod4', 'par4', 'pelt4', 'psl4', 'pdt4',
                        'pom5', 'pwm5', 'pod5', 'par5', 'pelt5', 'psl5', 'pdt5',
                        'pom6', 'pwm6', 'pod6', 'par6', 'pelt6', 'psl6', 'pdt6',
                        'pom7', 'pwm7', 'pod7', 'par7', 'pelt7', 'psl7', 'pdt7',
                        'pom8', 'pwm8', 'pod8', 'par8', 'pelt8', 'psl8', 'pdt8',
                        'pict1', 'paft1', 'phpe1', 'pcms1', 'pdmt1',
                        'pict2', 'paft2', 'phpe2', 'pcms2', 'pdmt2',
                        'pict3', 'paft3', 'phpe3', 'pcms3', 'pdmt3',
                        'pict4', 'paft4', 'phpe4', 'pcms4', 'pdmt4',
                        'pict5', 'paft5', 'phpe5', 'pcms5', 'pdmt5',
                        'pict6', 'paft6', 'phpe6', 'pcms6', 'pdmt6',
                        'pict7', 'paft7', 'phpe7', 'pcms7', 'pdmt7',
                        'pict8', 'paft8', 'phpe8', 'pcms8', 'pdmt8'
                    ];
                    
                    $tb = [
                        'tbas1', 'tgeo1', 'tce1', 'tfr1', 'tjp1', 'tkr1', 'tta1',
                        'tbas2', 'tgeo2', 'tce2', 'tfr2', 'tjp2', 'tkr2', 'tta2',
                        'tbas3', 'tgeo3', 'tce3', 'tfr3', 'tjp3', 'tkr3', 'tta3',
                        'tbas4', 'tgeo4', 'tce4', 'tfr4', 'tjp4', 'tkr4', 'tta4',
                        'tbas5', 'tgeo5', 'tce5', 'tfr5', 'tjp5', 'tkr5', 'tta5',
                        'tbas6', 'tgeo6', 'tce6', 'tfr6', 'tjp6', 'tkr6', 'tta6',
                        'tbas7', 'tgeo7', 'tce7', 'tfr7', 'tjp7', 'tkr7', 'tta7',
                        'tbas8', 'tgeo8', 'tce8', 'tfr8', 'tjp8', 'tkr8', 'tta8',
                        'tom1', 'twm1', 'tod1', 'tar1', 'telt1', 'tsl1', 'tdt1',
                        'tom2', 'twm2', 'tod2', 'tar2', 'telt2', 'tsl2', 'tdt2',
                        'tom3', 'twm3', 'tod3', 'tar3', 'telt3', 'tsl3', 'tdt3',
                        'tom4', 'twm4', 'tod4', 'tar4', 'telt4', 'tsl4', 'tdt4',
                        'tom5', 'twm5', 'tod5', 'tar5', 'telt5', 'tsl5', 'tdt5',
                        'tom6', 'twm6', 'tod6', 'tar6', 'telt6', 'tsl6', 'tdt6',
                        'tom7', 'twm7', 'tod7', 'tar7', 'telt7', 'tsl7', 'tdt7',
                        'tom8', 'twm8', 'tod8', 'tar8', 'telt8', 'tsl8', 'tdt8',
                        'tict1', 'taft1', 'thpe1', 'tcms1', 'tdmt1',
                        'tict2', 'taft2', 'thpe2', 'tcms2', 'tdmt2',
                        'tict3', 'taft3', 'thpe3', 'tcms3', 'tdmt3',
                        'tict4', 'taft4', 'thpe4', 'tcms4', 'tdmt4',
                        'tict5', 'taft5', 'thpe5', 'tcms5', 'tdmt5',
                        'tict6', 'taft6', 'thpe6', 'tcms6', 'tdmt6',
                        'tict7', 'taft7', 'thpe7', 'tcms7', 'tdmt7',
                        'tict8', 'taft8', 'thpe8', 'tcms8', 'tdmt8'
                    ];
                    //bascket check boxes
                    $pbas = ['pbas1', 'pbas2', 'pbas3', 'pbas4', 'pbas5', 'pbas6', 'pbas7', 'pbas8'];
                    $pgeo = ['pgeo1', 'pgeo2', 'pgeo3', 'pgeo4', 'pgeo5', 'pgeo6', 'pgeo7', 'pgeo8'];
                    $pce  = ['pce1', 'pce2', 'pce3', 'pce4', 'pce5', 'pce6', 'pce7', 'pce8'];
                    $pfr  = ['pfr1', 'pfr2', 'pfr3', 'pfr4', 'pfr5', 'pfr6', 'pfr7', 'pfr8'];
                    $pjp = ['pjp1','pjp2', 'pjp3', 'pjp4', 'pjp5', 'pjp6', 'pjp7', 'pjp8',];
                    $pkr  = ['pkr1', 'pkr2', 'pkr3', 'pkr4', 'pkr5', 'pkr6', 'pkr7', 'pkr8'];
                    $pta  = ['pta1', 'pta2', 'pta3', 'pta4', 'pta5', 'pta6', 'pta7', 'pta8'];
                    $pom  = ['pom1', 'pom2', 'pom3', 'pom4', 'pom5', 'pom6', 'pom7', 'pom8'];
                    $pwm  = ['pwm1', 'pwm2', 'pwm3', 'pwm4', 'pwm5', 'pwm6', 'pwm7', 'pwm8'];
                    $pod  = ['pod1', 'pod2', 'pod3', 'pod4', 'pod5', 'pod6', 'pod7', 'pod8'];
                    $par  = ['par1', 'par2', 'par3', 'par4', 'par5', 'par6', 'par7', 'par8'];
                    $pelt = ['pelt1', 'pelt2', 'pelt3', 'pelt4', 'pelt5', 'pelt6', 'pelt7', 'pelt8'];
                    $psl  = ['psl1', 'psl2', 'psl3', 'psl4', 'psl5', 'psl6', 'psl7', 'psl8'];
                    $pdt  = ['pdt1', 'pdt2', 'pdt3', 'pdt4','pdt5', 'pdt6', 'pdt7', 'pdt8'];
                    $pict = ['pict1', 'pict2', 'pict3', 'pict4', 'pict5', 'pict6', 'pict7', 'pict8'];
                    $paft = ['paft1', 'paft2', 'paft3', 'paft4', 'paft5', 'paft6', 'paft7', 'paft8'];
                    $phpe = ['phpe1', 'phpe2', 'phpe3', 'phpe4', 'phpe5', 'phpe6', 'phpe7', 'phpe8'];
                    $pcms = ['pcms1', 'pcms2', 'pcms3', 'pcms4', 'pcms5', 'pcms6', 'pcms7', 'pcms8'];
                    $pdmt = ['pdmt1', 'pdmt2', 'pdmt3', 'pdmt4', 'pdmt5', 'pdmt6', 'pdmt7', 'pdmt8'];
                    
                    //basket textbox
                    $tbas = ['tbas1', 'tbas2', 'tbas3', 'tbas4', 'tbas5', 'tbas6', 'tbas7', 'tbas8'];
                    $tgeo = ['tgeo1', 'tgeo2', 'tgeo3', 'tgeo4', 'tgeo5', 'tgeo6', 'tgeo7', 'tgeo8'];
                    $tce  = ['tce1', 'tce2', 'tce3', 'tce4', 'tce5', 'tce6', 'tce7', 'tce8'];
                    $tfr  = ['tfr1', 'tfr2', 'tfr3', 'tfr4', 'tfr5', 'tfr6', 'tfr7', 'tfr8'];
                    $tjp = ['tjp1','tjp2', 'tjp3', 'tjp4', 'tjp5', 'tjp6', 'tjp7', 'tjp8',];
                    $tkr  = ['tkr1', 'tkr2', 'tkr3', 'tkr4', 'tkr5', 'tkr6', 'tkr7', 'tkr8'];
                    $tta  = ['tta1', 'tta2', 'tta3', 'tta4', 'tta5', 'tta6', 'tta7', 'tta8'];
                    $tom  = ['tom1', 'tom2', 'tom3', 'tom4', 'tom5', 'tom6', 'tom7', 'tom8'];
                    $twm  = ['twm1', 'twm2', 'twm3', 'twm4', 'twm5', 'twm6', 'twm7', 'twm8'];
                    $tod  = ['tod1', 'tod2', 'tod3', 'tod4', 'tod5', 'tod6', 'tod7', 'tod8'];
                    $tar  = ['tar1', 'tar2', 'tar3', 'tar4', 'tar5', 'tar6', 'tar7', 'tar8'];
                    $telt = ['telt1', 'telt2', 'telt3', 'telt4', 'telt5', 'telt6', 'telt7', 'telt8'];
                    $tsl  = ['tsl1', 'tsl2', 'tsl3', 'tsl4', 'tsl5', 'tsl6', 'tsl7', 'tsl8'];
                    $tdt  = ['tdt1', 'tdt2', 'tdt3', 'tdt4','tdt5', 'tdt6', 'tdt7', 'tdt8'];
                    $tict = ['tict1', 'tict2', 'tict3', 'tict4', 'tict5', 'tict6', 'tict7', 'tict8'];
                    $taft = ['taft1', 'taft2', 'taft3', 'taft4', 'taft5', 'taft6', 'taft7', 'taft8'];
                    $thpe = ['thpe1', 'thpe2', 'thpe3', 'thpe4', 'thpe5', 'thpe6', 'thpe7', 'thpe8'];
                    $tcms = ['tcms1', 'tcms2', 'tcms3', 'tcms4', 'tcms5', 'tcms6', 'tcms7', 'tcms8'];
                    $tdmt = ['tdmt1', 'tdmt2', 'tdmt3', 'tdmt4', 'tdmt5', 'tdmt6', 'tdmt7', 'tdmt8'];
                    
                    foreach($pb as $p) {
                        ${$p} = in_array($p, $cachedFields)&&$cachedFields[$p]==1?'checked':'';
                    }
                    
                    foreach($tb as $t) {
                        ${$t} = !is_null($cachedFields[$t])&&$cachedFields[$t]!='NULL'?$cachedFields[$t]:'';
                    }
                    
                    //check box sessions 
                    $pp1 = in_array('p1', $cachedFields)&&$cachedFields['p1']==1?'checked':'';
                    $pp2 = in_array('p2', $cachedFields)&&$cachedFields['p2']==1?'checked':'';
                    $pp3 = in_array('p3', $cachedFields)&&$cachedFields['p3']==1?'checked':'';
                    $pp4 = in_array('p4', $cachedFields)&&$cachedFields['p4']==1?'checked':'';
                    $pp5 = in_array('p5', $cachedFields)&&$cachedFields['p5']==1?'checked':'';
                    $pp6 = in_array('p6', $cachedFields)&&$cachedFields['p6']==1?'checked':'';
                    $pp7 = in_array('p7', $cachedFields)&&$cachedFields['p7']==1?'checked':'';
                    $pp8 = in_array('p8', $cachedFields)&&$cachedFields['p8']==1?'checked':'';
                    
                    //textbox sessions
                    $tt1 = !empty($cachedFields['t1'])&&$cachedFields['t1']!='NULL' ?$cachedFields['t1']:'';
                    $tt2 = !empty($cachedFields['t2'])&&$cachedFields['t1']!='NULL'?$cachedFields['t2']:'';
                    $tt3 = !empty($cachedFields['t3'])&&$cachedFields['t1']!='NULL'?$cachedFields['t3']:'';
                    $tt4 = !empty($cachedFields['t4'])&&$cachedFields['t1']!='NULL'?$cachedFields['t4']:'';
                    $tt5 = !empty($cachedFields['t5'])&&$cachedFields['t1']!='NULL'?$cachedFields['t5']:'';
                    $tt6 = !empty($cachedFields['t6'])&&$cachedFields['t1']!='NULL'?$cachedFields['t6']:'';
                    $tt7 = !empty($cachedFields['t7'])&&$cachedFields['t1']!='NULL'?$cachedFields['t7']:'';
                    $tt8 = !empty($cachedFields['t8'])&&$cachedFields['t1']!='NULL'?$cachedFields['t8']:'';
                    
                    $i=0;
                    //tables sessions
                    if(isset($_SESSION['foo'])) {
                        foreach( $sub as $s ) {
                            $j = $i+1;
                            if($s == 17) {
                                ${$table[$i]}='<table id="period-0'.$j.'-table">
                                                <tr><td>'.$time[$i].'</td><td>Business & Accounting Studies</td><td><input type="checkbox" id="basp'.$j.'" name="srb[basp'.$j.']" value="basp'.$j.'" '.${$pbas[$i]}.'></td><td><input list="reason" name="srb[bast'.$j.']"  id="bast'.$j.'" value="'.${$tbas[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>Geography</td><td><input type="checkbox" id="geop'.$j.'" name="srb[geop'.$j.']" value="geop'.$j.'" '.${$pgeo[$i]}.'></td><td><input list="reason" name="srb[geot'.$j.']"  id="geot'.$j.'" value="'.${$tgeo[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>Civic Education</td><td><input type="checkbox" id="cep'.$j.'" name="srb[cep'.$j.']" value="cep'.$j.'" '.${$pce[$i]}.' ></td><td><input list="reason" name="srb[cet'.$j.']"  id="cet'.$j.'" value="'.${$tce[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>French</td><td><input type="checkbox" id="frp'.$j.'" name="srb[frp'.$j.']" value="frp'.$j.'" '.${$pfr[$i]}.'></td><td><input list="reason" name="srb[frt'.$j.']"  id="frt'.$j.'" value="'.${$tfr[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>Japanese</td><td><input type="checkbox" id="jpp'.$j.'" name="srb[jpp'.$j.']" value="jpp'.$j.'" '.${$pjp[$i]}.' ></td><td><input list="reason" name="srb[jpt'.$j.']"  id="jpt'.$j.'" value="'.${$tjp[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>Korean</td><td><input type="checkbox" id="krp'.$j.'" name="srb[krp'.$j.']" value="krp'.$j.'" '.${$pkr[$i]}.'></td><td><input list="reason" name="srb[krt'.$j.']"  id="krt'.$j.'" value="'.${$tkr[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                    <tr><td>'.$time[$i].'</td><td>Tamil</td><td><input type="checkbox" id="tap'.$j.'" name="srb[tap'.$j.']" value="tap'.$j.'" '.${$pta[$i]}.'></td><td><input list="reason" name="srb[tat'.$j.']"  id="tat'.$j.'" value="'.${$tta[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                            </table>';
                            }
                            
                            if($s == 18) {
                                 ${$table[$i]}='<table id="period-0'.$j.'-table">
                                                <tr><td>'.$time[$i].'</td><td>Oriental Music</td><td><input type="checkbox" id="omp'.$j.'" name="srb[omp'.$j.']" value="omp'.$j.'" '.${$pom[$i]}.'></td><td><input list="reason" name="srb[omt'.$j.']"  id="omt'.$j.'" value="'.${$tom[$i]}.'"/><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Western Music</td><td><input type="checkbox" id="wmp'.$j.'" name="srb[wmp'.$j.']" value="wmp'.$j.'" '.${$pwm[$i]}.'></td><td><input list="reason" name="srb[wmt'.$j.']"  id="wmt'.$j.'" value="'.${$twm[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Oriental Dancing</td><td><input type="checkbox" id="odp'.$j.'" name="srb[odp'.$j.']" value="odp'.$j.'" '.${$pod[$i]}.'></td><td><input list="reason" name="srb[odt'.$j.']"  id="odt'.$j.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Art</td><td><input type="checkbox" id="arp'.$j.'" name="srb[arp'.$j.']" value="arp'.$j.'" '.${$par[$i]}.'></td><td><input list="reason" name="srb[art'.$j.']"  id="art'.$j.'" value="'.${$tar[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Appreciation of English Literary Texts</td><td><input type="checkbox" id="eltp'.$j.'" name="srb[eltp'.$j.']" value="eltp'.$j.'" '.${$pelt[$i]}.'></td><td><input list="reason" name="srb[eltt'.$j.']"  id="eltt'.$j.'" value="'.${$telt[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Sinhala Literature</td><td><input type="checkbox" id="slp'.$j.'" name="srb[slp'.$j.']" value="slp'.$j.'" '.${$psl[$i]}.'></td><td><input list="reason" name="srb[slt'.$j.']"  id="slt'.$j.'" value="'.${$tsl[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Drama and Theatre</td><td><input type="checkbox" id="dtp'.$j.'" name="srb[dtp'.$j.']" value="dtp'.$j.'" '.${$pdt[$i]}.'></td><td><input list="reason" name="srb[dtt'.$j.']"  id="dtt'.$j.'" value="'.${$tdt[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                </table>';
                            }
                            
                            if($s == 19) {
                                 ${$table[$i]}='<table id="period-0'.$j.'-table">
                                                <tr><td>'.$time[$i].'</td><td>Information & Communication Technology</td><td><input type="checkbox" id="ictp'.$j.'" name="srb[ictp'.$j.']" value="ictp'.$j.'" '.${$pict[$i]}.'></td><td><input list="reason" name="srb[ictt'.$j.']"  id="ictt'.$j.'" value="'.${$tict[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Agriculture & Food Technology</td><td><input type="checkbox" id="aftp'.$j.'" name="srb[aftp'.$j.']" value="aftp'.$j.'" '.${$paft[$i]}.'></td><td><input list="reason" name="srb[aftt'.$j.']"  id="aftt'.$j.'" value="'.${$taft[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Health & Physical Education</td><td><input type="checkbox" id="hpep'.$j.'" name="srb[hpep'.$j.']" value="hpep'.$j.'"  '.${$phpe[$i]}.'></td><td><input list="reason" name="srb[hpet'.$j.']"  id="hpet'.$j.'" value="'.${$thpe[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Communication & Media Studies</td><td><input type="checkbox" id="cmsp'.$j.'" name="srb[cmsp'.$j.']" value="cmsp'.$j.'" '.${$pcms[$i]}.'></td><td><input list="reason" name="srb[cmst'.$j.']"  id="cmst'.$j.'" value="'.${$tcms[$i]}.'"/><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td>Design & Mechanical Technology</td><td><input type="checkbox" id="dmtp'.$j.'" name="srb[dmtp'.$j.']" value="dmtp'.$j.'" '.${$pdmt[$i]}.'></td><td><input list="reason" name="srb[dmtt'.$j.']"  id="dmtt'.$j.'" value="'.${$tdmt[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr></table>';
                                 
                            }
                            
                            $i+=1;
                        }
                    }
                    
                    $table01 = !is_null($period_01_table)?$period_01_table:'<table id="period-01-table"></table>';
                    $table02 = !is_null($period_02_table)?$period_02_table:'<table id="period-02-table"></table>';
                    $table03 = !is_null($period_03_table)?$period_03_table:'<table id="period-03-table"></table>';
                    $table04 = !is_null($period_04_table)?$period_04_table:'<table id="period-04-table"></table>';
                    $table05 = !is_null($period_05_table)?$period_05_table:'<table id="period-05-table"></table>';
                    $table06 = !is_null($period_06_table)?$period_06_table:'<table id="period-06-table"></table>';
                    $table07 = !is_null($period_07_table)?$period_07_table:'<table id="period-07-table"></table>';
                    $table08 = !is_null($period_08_table)?$period_08_table:'<table id="period-08-table"></table>';
                    
                    
                    
                    
                    //drop down for class
                    $mb = new stClass();
                    $results = $mb->getAll1011();
                    
                    if(isset($_SESSION['foo'])) {
                        //drop down for class
                        $dropdown_class_html = '<select required id="srb_class_select" name="srb[clid]">
                                                    <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                                     
                        foreach ($results as $result)
                        {
                            $clid = esc_html($result->getCid());
                            $clname = esc_html($result->getCname());
                            $isSelect = $cachedFields['clid'] == $clid?'selected':'';    
                            $dropdown_class_html .= '<option value="' . $clid . '" '.$isSelect.'>( '. $clid .' )-' . $clname . '</option>' . "\n";
                        }
                        
                        $dropdown_class_html .= '</select>';
                    } else {
                        //drop down for class
                        $dropdown_class_html = '<select required id="srb_class_select" name="srb[clid]">
                                                    <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                                     
                        foreach ($results as $result)
                        {
                            $clid = esc_html($result->getCid());
                            $clname = esc_html($result->getCname());
                            $dropdown_class_html .= '<option value="' . $clid . '" >( '. $clid .' )-' . $clname . '</option>' . "\n";
                        }
                        
                        $dropdown_class_html .= '</select>';
                    }
                    
                    $sb = new Subject();
                    $resultsub = $sb->getCoreSubjects();
        
                    if(in_array($cachedFields['srb']['subid1'], [17, 18, 19])) {
                        
                    }
                    
                    //drop down for subject
                    $dropdown_subject_html = '';
                    
                    
                    if(isset($_SESSION['foo'])) {
                        
                        $i=0;
                        foreach ($sub as $s)
                        {
                            foreach ($resultsub as $result)
                            {
                                $sid = esc_html($result->getSid());
                                $sname = esc_html($result->getSname());
                                $scode = esc_html($result->getCode());
                                $isSelect = $s == $sid?'selected':'';    
                                ${$dropdown[$i]} .= '<option value="' . $sid . '" '.$isSelect.'>' . $sname . '( '. $scode .' )  </option>' . "\n";
                            }
                            ${$dropdown} .= '</select>';
                            $i +=1;
                        }
                        
                    } else {
                        foreach ($resultsub as $result)
                        {
                            $sid = esc_html($result->getSid());
                            $sname = esc_html($result->getSname());
                            $scode = esc_html($result->getCode());
                                
                            $dropdown_subject_html .= '<option value="' . $sid . '">' . $sname . '( '. $scode .' ) </option>' . "\n";
                        }
                        $dropdown_subject_html .= '</select>';
                    }
                    
                    
                    $dropdown_sub1 = isset($_SESSION['foo'])?$dropdown_subject_html1:$dropdown_subject_html;
                    $dropdown_sub2 = isset($_SESSION['foo'])?$dropdown_subject_html2:$dropdown_subject_html;
                    $dropdown_sub3 = isset($_SESSION['foo'])?$dropdown_subject_html3:$dropdown_subject_html;
                    $dropdown_sub4 = isset($_SESSION['foo'])?$dropdown_subject_html4:$dropdown_subject_html;
                    $dropdown_sub5 = isset($_SESSION['foo'])?$dropdown_subject_html5:$dropdown_subject_html;
                    $dropdown_sub6 = isset($_SESSION['foo'])?$dropdown_subject_html6:$dropdown_subject_html;
                    $dropdown_sub7 = isset($_SESSION['foo'])?$dropdown_subject_html7:$dropdown_subject_html;
                    $dropdown_sub8 = isset($_SESSION['foo'])?$dropdown_subject_html8:$dropdown_subject_html;
            
                    $content.='<h3>ADD TIME RECORDS</h3>';		
            		$content.='<div class="srb_add_user_meta_form">';
            					
            		$content.='<form action="'.get_permalink().'" method="post" id="srb_add_order_meta__form" >';			
            
            		$content.='<input type="hidden" name="action" value="srb_form_time_record_response">';
            		$content.='<input type="hidden" name="srb_add_class_meta_nonce" value="'. $srb_add_meta_nonce .'" />';
            		$content.='<input type="hidden" name="my-form-data" value="process"/>';
					$content.='<input type="hidden" name="notify" value="True"/>';
						
            			//$content.='<div>';
            				//$content.='<br>';
            				//$content.='<label for="'. $this->plugin_name.'-ts_id"> '._e("TS ID", $this->plugin_name).' </label><br>';
            			//$content.='<br><input required id="'.$this->plugin_name.'-ts_id" type="text" name="srb[tsid]" /><br>';
            			//$content.='</div>'
            			
            		$content.='<div id="classwrapper"><br>';
            				//$content.='<label for="'. $this->plugin_name.'-class_id"> '. _e("CLASS ID", $this->plugin_name).' </label><br>';
            		$content.='<label>Select Class:</label>';
            		$content.= $dropdown_class_html;
            		$content.='<br></div>';
            		$content.='<div style="width: 350px; margin-top:30px">';
                    $content.='<label>Select Date:</label>';
                    $content.='<input required type="date" id="recorddateol" name="srb[recorddate]" value="'.$cachedFields["sdate"].'" ><br>';
                    $content.='<input required type="hidden" name="srb[createddate]" id="result"  /><br>';
                    $content.='</div>';
                        
            		$content.='<div>';
            				
                	$content.='<table class="srb_rale">
                          <thead>
                           <tr>
                            <th>Period</th>
                            <th>Subject</th>
                            <th>IsDone</th>
                            <th>Reason</th>
                          </tr>
                          </thead>
                          <tbody>
                        
                                <!-- Start : Period 01 -->
                                <tr>
                                    <td>7.50-8.30</td>
                                    <td class="sub-01-td">
                                    <select required id="period-01-drop-down" name="srb[subid1]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub1 . '
                                    </td>
                                    <td class="check-01-td"><input type="checkbox" id="p1" name="srb[p1]" value="p1" '. $pp1 .' ></td>
                                    <td class="text-01-td"><input list="reason" name="srb[t1]" id="t1" value="'.$tt1.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                          <option value="No students follow this subject in this Class">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">'
                                        .$table01.
                                    '</td>
                                </tr>
                        
                                <!-- End : Period 01 -->
                        
                                <!-- Start : Period 02 -->
                        
                                <tr>
                                    <td>8.30-9.10</td>
                                    <td class="sub-02-td">
                                    <select required id="period-02-drop-down" name="srb[subid2]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub2 . '
                                    </td>
                                    <td class="check-02-td"><input type="checkbox" id="p2" name="srb[p2]" value="p2" '. $pp2 .' ></td>
                                    <td class="text-02-td"><input list="reason" name="srb[t2]" id="t2" value="'.$tt2.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">'
                                        .$table02.
                                    '</td>
                                </tr>
                        
                                <!-- End : Period 03 -->
                        
                                <!-- Start : Period 03 -->
                                <tr>
                                    <td>9.10-9.50</td>
                                    <td class="sub-03-td">
                                        <select required id="period-03-drop-down" name="srb[subid3]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub3 . '
                                    </td>
                                    <td class="check-03-td"><input type="checkbox" id="p3" name="srb[p3]" value="p3" '. $pp3 .' ></td>
                                    <td class="text-03-td"><input list="reason" name="srb[t3]" id="t3" value="'.$tt3.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td colspan="4">'
                                        .$table03.
                                    '</td>
                                </tr>
                                <!-- End : Period 03 -->
                        
                                <!-- Start : Period 04 -->
                                <tr>
                                    <td>9.50-10.30</td>
                                    <td class="sub-04-td">
                                        <select required id="period-04-drop-down" name="srb[subid4]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub4 . '
                                    </td>
                                    <td class="check-04-td"><input type="checkbox" id="p4" name="srb[p4]" value="p4" '. $pp4 .' ></td>
                                    <td class="text-04-td"><input list="reason" name="srb[t4]" id="t4" value="'.$tt4.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">'
                                        .$table04.
                                    '</td>
                                </tr>
                        
                                <!-- End : Period 04 -->
                        
                                <!-- Start : Period 05 -->
                                <tr>
                                    <td>10.50-11.30</td>
                                    <td class="sub-05-td">
                                        <select required id="period-05-drop-down" name="srb[subid5]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub5 . '
                                    </td>
                                    <td class="check-05-td"><input type="checkbox" id="p5" name="srb[p5]" value="p5" '. $pp5 .' ></td>
                                    <td class="text-05-td"><input list="reason" name="srb[t5]" id="t5" value="'.$tt5.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">'
                                        .$table05.
                                    '</td>
                                </tr>
                        
                                <!-- End : Period 05 -->
                        
                                <!-- Start : Period 06 -->
                        
                                <tr>
                                    <td>11.30-12.10</td>
                                    <td class="sub-06-td">
                                        <select required id="period-06-drop-down" name="srb[subid6]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub6 . '
                                    </td>
                                    <td class="check-06-td"><input type="checkbox" id="p6" name="srb[p6]" value="p6" '. $pp6 .' ></td>
                                    <td class="text-06-td"><input list="reason" name="srb[t6]" id="t6" value="'.$tt6.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">'
                                        .$table06.
                                    '</td>
                                </tr>
                                <!-- End : Period 06 -->
                        
                                <!-- Start : Period 07 -->
                        
                                <tr>
                                    <td>12.10-12.50</td>
                                    <td class="sub-07-td">
                                        <select required id="period-07-drop-down" name="srb[subid7]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub7 . '
                                    </td>
                                    <td class="check-07-td"><input type="checkbox" id="p7" name="srb[p7]" value="p7" '. $pp7 .' ></td>
                                    <td class="text-07-td"><input list="reason" name="srb[t7]" id="t7" value="'.$tt7.'" />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    <td colspan="4">'
                                        .$table07.
                                    '</td>
                                </tr>
                                <!-- End : Period 07 -->
                        
                                <!-- Start : Period 08 -->
                        
                                <tr>
                                    <td>12.50-1.30</td>
                                    <td class="sub-08-td">
                                        <select required id="period-08-drop-down" name="srb[subid8]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub8 . '
                                    </td>
                                    <td class="check-08-td"><input type="checkbox" id="p8" name="srb[p8]" value="p8" '. $pp8 .' ></td>
                                    <td class="text-08-td"><input list="reason" name="srb[t8]" id="t8" value="'.$tt8.'" /></label>
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td colspan="4">'
                                        .$table08.
                                    '</td>
                                </tr>
                                 <!-- End : Period 08 -->
                        
                              </tbody>
                            </table>';
                                
            	$content.='<br></div>';
            	$content.='<p class="submit">';
            	$content.='<input type="submit" name="addbutton" id="srb-order-button" class="button button-primary" value="Add Entry">';
            	$content.='</p>';
            	$content.='</form>';
            	$content.='</div>';
            	$content.='<h3><a href="'. wp_logout_url( home_url('/student-record-book/')  ) . '" title="Logout">Logout</a></h3>';
            	//unset($_SESSION['foo']);
            	unset($cachedFields);
            	return $content;
	       }
        }
    } else {
        
        $content.='<h3>Please Login </h3>';
        $args = array(
            'echo'            => false,
            'redirect'        => ( is_ssl() ? 'https://' : 'http://' ) . 'mrcstudent.com/student-record-book/',
            'remember'        => true,
            'value_remember'  => true,
          );
          
        if ( ! empty( $_REQUEST['redirect_to'] ) ) {
            $args['redirect'] = $_REQUEST['redirect_to'];
        }
        
        $content.= wp_login_form( $args );
        return $content;
    }
    
    }
    
    
    

    function checkInput() {
	// Bail right away if our hidden form value isn't there
	    if (!isset($_POST['srb_add_class_meta_nonce']) && !wp_verify_nonce($_POST['srb_add_user_meta_nonce'], 'srb_add_user_meta_form_nonce')) { return false; }
        $this->console_log($_POST);
        // Set variables from post
	    $this->tsid = $_POST['srb']['tsid'];
	    $this->clid = $_POST['srb']['clid'];
	    $this->sdate = strtotime($_POST['srb']['recorddate']);
        $this->subid1 = $_POST['srb']['subid1'];
        //$_SESSION['foo'] = $_POST;
        $_SESSION['foo']['clid'] = $this->clid;
        $_SESSION['foo']['sdate'] = $_POST['srb']['recorddate'];
        
        $this->p1 = isset($_POST['srb']['p1']) ? 1:0;
        $this->t1 = !empty($_POST['srb']['t1']) ? '"' .sanitize_text_field($_POST['srb']['t1']). '"' :"NULL";
        
        
        if($this->subid1 == 17) {
            
            $this->pbas1 = isset($_POST['srb']['basp1']) ? 1:0;
            $this->tbas1 = !empty($_POST['srb']['bast1']) ? '"' .$_POST['srb']['bast1']. '"' : "NULL";
            
            $this->pgeo1 = isset($_POST['srb']['geop1']) ? 1:0;
            $this->tgeo1 = !empty($_POST['srb']['geot1']) ? '"' .$_POST['srb']['geot1']. '"' : "NULL";
            
            $this->pce1 = isset($_POST['srb']['cep1']) ? 1:0;
            $this->tce1 = !empty($_POST['srb']['cet1']) ? '"' .$_POST['srb']['cet1']. '"' : "NULL";
            
            $this->pfr1 = isset($_POST['srb']['frp1']) ? 1:0;
            $this->tfr1 = !empty($_POST['srb']['frt1']) ? '"' .$_POST['srb']['frt1']. '"' : "NULL";
            
            $this->pjp1 = isset($_POST['srb']['jpp1']) ? 1:0;
            $this->tjp1 = !empty($_POST['srb']['jpt1']) ? '"' .$_POST['srb']['jpt1']. '"' : "NULL";
            
            $this->pkr1 = isset($_POST['srb']['krp1']) ? 1:0;
            $this->tkr1 = !empty($_POST['srb']['krt1']) ? '"' .$_POST['srb']['krt1']. '"' : "NULL";

            $this->pta1 = isset($_POST['srb']['tap1']) ? 1:0;
            $this->tta1 = !empty($_POST['srb']['tat1']) ? '"' .$_POST['srb']['tat1']. '"' : "NULL";

        }
        
        if($this->subid1 == 18) {
            
            $this->pom1 = isset($_POST['srb']['omp1']) ? 1:0;
            $this->tom1 = !empty($_POST['srb']['omt1']) ? '"' .$_POST['srb']['omt1']. '"' : "NULL";
            
            $this->pwm1 = isset($_POST['srb']['wmp1']) ? 1:0;
            $this->twm1 = !empty($_POST['srb']['wmt1']) ? '"' .$_POST['srb']['wmt1']. '"' : "NULL";
            
            $this->pod1 = isset($_POST['srb']['odp1']) ? 1:0;
            $this->tod1 = !empty($_POST['srb']['odt1']) ? '"' .$_POST['srb']['odt1']. '"' : "NULL";
            
            $this->par1 = isset($_POST['srb']['arp1']) ? 1:0;
            $this->tar1 = !empty($_POST['srb']['art1']) ? '"' .$_POST['srb']['art1']. '"' : "NULL";
            
            $this->pelt1 = isset($_POST['srb']['eltp1']) ? 1:0;
            $this->telt1 = !empty($_POST['srb']['eltt1']) ? '"' .$_POST['srb']['eltt1']. '"' : "NULL";
            
            $this->psl1 = isset($_POST['srb']['slp1']) ? 1:0;
            $this->tsl1 = !empty($_POST['srb']['slt1']) ? '"' .$_POST['srb']['slt1']. '"' : "NULL";
            
            $this->pdt1 = isset($_POST['srb']['dtp1']) ? 1:0;
            $this->tdt1 = !empty($_POST['srb']['dtt1']) ? '"' .$_POST['srb']['dtt1']. '"' : "NULL";

        }
        
        if($this->subid1 == 19) {
            
            $this->pict1 = isset($_POST['srb']['ictp1']) ? 1:0;
            $this->tict1 = !empty($_POST['srb']['ictt1']) ? '"' .$_POST['srb']['ictt1']. '"' : "NULL";
            
            $this->paft1 = isset($_POST['srb']['aftp1']) ? 1:0;
            $this->taft1 = !empty($_POST['srb']['aftt1']) ? '"' .$_POST['srb']['aftt1']. '"' : "NULL";

            $this->phpe1 = isset($_POST['srb']['hpep1']) ? 1:0;
            $this->thpe1 = !empty($_POST['srb']['hpet1']) ? '"' .$_POST['srb']['hpet1']. '"' : "NULL";
            
            $this->pcms1 = isset($_POST['srb']['cmsp1']) ? 1:0;
            $this->tcms1 = !empty($_POST['srb']['cmst1']) ? '"' .$_POST['srb']['cmst1']. '"' : "NULL";
            
            $this->pdmt1 = isset($_POST['srb']['dmtp1']) ? 1:0;
            $this->tdmt1 = !empty($_POST['srb']['dmtt1']) ? '"' .$_POST['srb']['dmtt1']. '"' : "NULL";
            
        }
        
        $this->subid2 = $_POST['srb']['subid2'];
        $this->p2 = isset($_POST['srb']['p2']) ? 1:0;
        $this->t2 = !empty($_POST['srb']['t2']) ? '"' .sanitize_text_field($_POST['srb']['t2']). '"' : "NULL";
        
        if($this->subid2 == 17) {
            
            $this->pbas2 = isset($_POST['srb']['basp2']) ? 1:0;
            $this->tbas2 = !empty($_POST['srb']['bast2']) ? '"' .$_POST['srb']['bast2']. '"' : "NULL";
            
            $this->pgeo2 = isset($_POST['srb']['geop2']) ? 1:0;
            $this->tgeo2 = !empty($_POST['srb']['geot2']) ? '"' .$_POST['srb']['geot2']. '"' : "NULL";
            
            $this->pce2 = isset($_POST['srb']['cep2']) ? 1:0;
            $this->tce2 = !empty($_POST['srb']['cet2']) ? '"' .$_POST['srb']['cet2']. '"' : "NULL";
            
            $this->pfr2 = isset($_POST['srb']['frp2']) ? 1:0;
            $this->tfr2 = !empty($_POST['srb']['frt2']) ? '"' .$_POST['srb']['frt2']. '"' : "NULL";
            
            $this->pjp2 = isset($_POST['srb']['jpp2']) ? 1:0;
            $this->tjp2 = !empty($_POST['srb']['jpt2']) ? '"' .$_POST['srb']['jpt2']. '"' : "NULL";
            
            $this->pkr2 = isset($_POST['srb']['krp2']) ? 1:0;
            $this->tkr2 = !empty($_POST['srb']['krt2']) ? '"' .$_POST['srb']['krt2']. '"' : "NULL";

            $this->pta2 = isset($_POST['srb']['tap2']) ? 1:0;
            $this->tta2 = !empty($_POST['srb']['tat2']) ? '"' .$_POST['srb']['tat2']. '"' : "NULL";

        }
        
        if($this->subid2 == 18) {
            
            $this->pom2 = isset($_POST['srb']['omp2']) ? 1:0;
            $this->tom2 = !empty($_POST['srb']['omt2']) ? '"' .$_POST['srb']['omt2']. '"' : "NULL";
            
            $this->pwm2 = isset($_POST['srb']['wmp2']) ? 1:0;
            $this->twm2 = !empty($_POST['srb']['wmt2']) ? '"' .$_POST['srb']['wmt2']. '"' : "NULL";
            
            $this->pod2 = isset($_POST['srb']['odp2']) ? 1:0;
            $this->tod2 = !empty($_POST['srb']['odt2']) ? '"' .$_POST['srb']['odt2']. '"' : "NULL";
            
            $this->par2 = isset($_POST['srb']['arp2']) ? 1:0;
            $this->tar2 = !empty($_POST['srb']['art2']) ? '"' .$_POST['srb']['art2']. '"' : "NULL";
            
            $this->pelt2 = isset($_POST['srb']['eltp2']) ? 1:0;
            $this->telt2 = !empty($_POST['srb']['eltt2']) ? '"' .$_POST['srb']['eltt2']. '"' : "NULL";
            
            $this->psl2 = isset($_POST['srb']['slp2']) ? 1:0;
            $this->tsl2 = !empty($_POST['srb']['slt2']) ? '"' .$_POST['srb']['slt2']. '"' : "NULL";
            
            $this->pdt2 = isset($_POST['srb']['dtp2']) ? 1:0;
            $this->tdt2 = !empty($_POST['srb']['dtt2']) ? '"' .$_POST['srb']['dtt2']. '"' : "NULL";

        }
        
        if($this->subid2 == 19) {
            
            $this->pict2 = isset($_POST['srb']['ictp2']) ? 1:0;
            $this->tict2 = !empty($_POST['srb']['ictt2']) ? '"' .$_POST['srb']['ictt2']. '"' : "NULL";
            
            $this->paft2 = isset($_POST['srb']['aftp2']) ? 1:0;
            $this->taft2 = !empty($_POST['srb']['aftt2']) ? '"' .$_POST['srb']['aftt2']. '"' : "NULL";

            $this->phpe2 = isset($_POST['srb']['hpep2']) ? 1:0;
            $this->thpe2 = !empty($_POST['srb']['hpet2']) ? '"' .$_POST['srb']['hpet2']. '"' : "NULL";
            
            $this->pcms2 = isset($_POST['srb']['cmsp2']) ? 1:0;
            $this->tcms2 = !empty($_POST['srb']['cmst2']) ? '"' .$_POST['srb']['cmst2']. '"' : "NULL";
            
            $this->pdmt2 = isset($_POST['srb']['dmtp2']) ? 1:0;
            $this->tdmt2 = !empty($_POST['srb']['dmtt2']) ? '"' .$_POST['srb']['dmtt2']. '"' : "NULL";
            
        }
        
        $this->subid3 = $_POST['srb']['subid3'];
        $this->p3 = isset($_POST['srb']['p3']) ? 1:0;
        $this->t3 = !empty($_POST['srb']['t3']) ? '"' .sanitize_text_field($_POST['srb']['t3']). '"' : "NULL";
        
        if($this->subid3 == 17) {
            
            $this->pbas3 = isset($_POST['srb']['basp3']) ? 1:0;
            $this->tbas3 = !empty($_POST['srb']['bast3']) ? '"' .$_POST['srb']['bast3']. '"' : "NULL";
            
            $this->pgeo3 = isset($_POST['srb']['geop3']) ? 1:0;
            $this->tgeo3 = !empty($_POST['srb']['geot3']) ? '"' .$_POST['srb']['geot3']. '"' : "NULL";
            
            $this->pce3 = isset($_POST['srb']['cep3']) ? 1:0;
            $this->tce3 = !empty($_POST['srb']['cet3']) ? '"' .$_POST['srb']['cet3']. '"' : "NULL";
            
            $this->pfr3 = isset($_POST['srb']['frp3']) ? 1:0;
            $this->tfr3 = !empty($_POST['srb']['frt3']) ? '"' .$_POST['srb']['frt3']. '"' : "NULL";
            
            $this->pjp3 = isset($_POST['srb']['jpp3']) ? 1:0;
            $this->tjp3 = !empty($_POST['srb']['jpt3']) ? '"' .$_POST['srb']['jpt3']. '"' : "NULL";
            
            $this->pkr3 = isset($_POST['srb']['krp3']) ? 1:0;
            $this->tkr3 = !empty($_POST['srb']['krt3']) ? '"' .$_POST['srb']['krt3']. '"' : "NULL";

            $this->pta3 = isset($_POST['srb']['tap3']) ? 1:0;
            $this->tta3 = !empty($_POST['srb']['tat3']) ? '"' .$_POST['srb']['tat3']. '"' : "NULL";

        }
        
        if($this->subid3 == 18) {
            
            $this->pom3 = isset($_POST['srb']['omp3']) ? 1:0;
            $this->tom3 = !empty($_POST['srb']['omt3']) ? '"' .$_POST['srb']['omt3']. '"' : "NULL";
            
            $this->pwm3 = isset($_POST['srb']['wmp3']) ? 1:0;
            $this->twm3 = !empty($_POST['srb']['wmt3']) ? '"' .$_POST['srb']['wmt3']. '"' : "NULL";
            
            $this->pod3 = isset($_POST['srb']['odp3']) ? 1:0;
            $this->tod3 = !empty($_POST['srb']['odt3']) ? '"' .$_POST['srb']['odt3']. '"' : "NULL";
            
            $this->par3 = isset($_POST['srb']['arp3']) ? 1:0;
            $this->tar3 = !empty($_POST['srb']['art3']) ? '"' .$_POST['srb']['art3']. '"' : "NULL";
            
            $this->pelt3 = isset($_POST['srb']['eltp3']) ? 1:0;
            $this->telt3 = !empty($_POST['srb']['eltt3']) ? '"' .$_POST['srb']['eltt3']. '"' : "NULL";
            
            $this->psl3 = isset($_POST['srb']['slp3']) ? 1:0;
            $this->tsl3 = !empty($_POST['srb']['slt3']) ? '"' .$_POST['srb']['slt3']. '"' : "NULL";
            
            $this->pdt3 = isset($_POST['srb']['dtp3']) ? 1:0;
            $this->tdt3 = !empty($_POST['srb']['dtt3']) ? '"' .$_POST['srb']['dtt3']. '"' : "NULL";

        }
        
        if($this->subid3 == 19) {
            
            $this->pict3 = isset($_POST['srb']['ictp3']) ? 1:0;
            $this->tict3 = !empty($_POST['srb']['ictt3']) ? '"' .$_POST['srb']['ictt3']. '"' : "NULL";
            
            $this->paft3 = isset($_POST['srb']['aftp3']) ? 1:0;
            $this->taft3 = !empty($_POST['srb']['aftt3']) ? '"' .$_POST['srb']['aftt3']. '"' : "NULL";

            $this->phpe3 = isset($_POST['srb']['hpep3']) ? 1:0;
            $this->thpe3 = !empty($_POST['srb']['hpet3']) ? '"' .$_POST['srb']['hpet3']. '"' : "NULL";
            
            $this->pcms3 = isset($_POST['srb']['cmsp3']) ? 1:0;
            $this->tcms3 = !empty($_POST['srb']['cmst3']) ? '"' .$_POST['srb']['cmst3']. '"' : "NULL";
            
            $this->pdmt3 = isset($_POST['srb']['dmtp3']) ? 1:0;
            $this->tdmt3 = !empty($_POST['srb']['dmtt3']) ? '"' .$_POST['srb']['dmtt3']. '"' : "NULL";
            
        }
        
        $this->subid4 = $_POST['srb']['subid4'];
        //$this->p4 = $_POST['srb']['p4'];
        //$this->t4 = $_POST['srb']['t4'];
        $this->p4 = isset($_POST['srb']['p4']) ? 1:0;
        $this->t4 = !empty($_POST['srb']['t4']) ? '"' .sanitize_text_field($_POST['srb']['t4']). '"' : "NULL";
        
        if($this->subid4 == 17) {
            
            $this->pbas4 = isset($_POST['srb']['basp4']) ? 1:0;
            $this->tbas4 = !empty($_POST['srb']['bast4']) ? '"' .$_POST['srb']['bast4']. '"' : "NULL";
            
            $this->pgeo4 = isset($_POST['srb']['geop4']) ? 1:0;
            $this->tgeo4 = !empty($_POST['srb']['geot4']) ? '"' .$_POST['srb']['geot4']. '"' : "NULL";
            
            $this->pce4 = isset($_POST['srb']['cep4']) ? 1:0;
            $this->tce4 = !empty($_POST['srb']['cet4']) ? '"' .$_POST['srb']['cet4']. '"' : "NULL";
            
            $this->pfr4 = isset($_POST['srb']['frp4']) ? 1:0;
            $this->tfr4 = !empty($_POST['srb']['frt4']) ? '"' .$_POST['srb']['frt4']. '"' : "NULL";
            
            $this->pjp4 = isset($_POST['srb']['jpp4']) ? 1:0;
            $this->tjp4 = !empty($_POST['srb']['jpt4']) ? '"' .$_POST['srb']['jpt4']. '"' : "NULL";
            
            $this->pkr4 = isset($_POST['srb']['krp4']) ? 1:0;
            $this->tkr4 = !empty($_POST['srb']['krt4']) ? '"' .$_POST['srb']['krt4']. '"' : "NULL";

            $this->pta4 = isset($_POST['srb']['tap4']) ? 1:0;
            $this->tta4 = !empty($_POST['srb']['tat4']) ? '"' .$_POST['srb']['tat4']. '"' : "NULL";

        }
        
        if($this->subid4 == 18) {
            
            $this->pom4 = isset($_POST['srb']['omp4']) ? 1:0;
            $this->tom4 = !empty($_POST['srb']['omt4']) ? '"' .$_POST['srb']['omt4']. '"' : "NULL";
            
            $this->pwm4 = isset($_POST['srb']['wmp4']) ? 1:0;
            $this->twm4 = !empty($_POST['srb']['wmt4']) ? '"' .$_POST['srb']['wmt4']. '"' : "NULL";
            
            $this->pod4 = isset($_POST['srb']['odp4']) ? 1:0;
            $this->tod4 = !empty($_POST['srb']['odt4']) ? '"' .$_POST['srb']['odt4']. '"' : "NULL";
            
            $this->par4 = isset($_POST['srb']['arp4']) ? 1:0;
            $this->tar4 = !empty($_POST['srb']['art4']) ? '"' .$_POST['srb']['art4']. '"' : "NULL";
            
            $this->pelt4 = isset($_POST['srb']['eltp4']) ? 1:0;
            $this->telt4 = !empty($_POST['srb']['eltt4']) ? '"' .$_POST['srb']['eltt4']. '"' : "NULL";
            
            $this->psl4 = isset($_POST['srb']['slp4']) ? 1:0;
            $this->tsl4 = !empty($_POST['srb']['slt4']) ? '"' .$_POST['srb']['slt4']. '"' : "NULL";
            
            $this->pdt4 = isset($_POST['srb']['dtp4']) ? 1:0;
            $this->tdt4 = !empty($_POST['srb']['dtt4']) ? '"' .$_POST['srb']['dtt4']. '"' : "NULL";

        }
        
        if($this->subid4 == 19) {
            
            $this->pict4 = isset($_POST['srb']['ictp4']) ? 1:0;
            $this->tict4 = !empty($_POST['srb']['ictt4']) ? '"' .$_POST['srb']['ictt4']. '"' : "NULL";
            
            $this->paft4 = isset($_POST['srb']['aftp4']) ? 1:0;
            $this->taft4 = !empty($_POST['srb']['aftt4']) ? '"' .$_POST['srb']['aftt4']. '"' : "NULL";

            $this->phpe4 = isset($_POST['srb']['hpep4']) ? 1:0;
            $this->thpe4 = !empty($_POST['srb']['hpet4']) ? '"' .$_POST['srb']['hpet4']. '"' : "NULL";
            
            $this->pcms4 = isset($_POST['srb']['cmsp4']) ? 1:0;
            $this->tcms4 = !empty($_POST['srb']['cmst4']) ? '"' .$_POST['srb']['cmst4']. '"' : "NULL";
            
            $this->pdmt4 = isset($_POST['srb']['dmtp4']) ? 1:0;
            $this->tdmt4 = !empty($_POST['srb']['dmtt4']) ? '"' .$_POST['srb']['dmtt4']. '"' : "NULL";
            
        }
        
        $this->subid5 = $_POST['srb']['subid5'];
        //$this->p5 = $_POST['srb']['p5'];
        //$this->t5 = $_POST['srb']['t5'];
        $this->p5 = isset($_POST['srb']['p5']) ? 1:0;
        $this->t5 = !empty($_POST['srb']['t5']) ? '"' .sanitize_text_field($_POST['srb']['t5']). '"' : "NULL";
        
        if($this->subid5 == 17) {
            
            $this->pbas5 = isset($_POST['srb']['basp5']) ? 1:0;
            $this->tbas5 = !empty($_POST['srb']['bast5']) ? '"' .$_POST['srb']['bast5']. '"' : "NULL";
            
            $this->pgeo5 = isset($_POST['srb']['geop5']) ? 1:0;
            $this->tgeo5 = !empty($_POST['srb']['geot5']) ? '"' .$_POST['srb']['geot5']. '"' : "NULL";
            
            $this->pce5 = isset($_POST['srb']['cep5']) ? 1:0;
            $this->tce5 = !empty($_POST['srb']['cet5']) ? '"' .$_POST['srb']['cet5']. '"' : "NULL";
            
            $this->pfr5 = isset($_POST['srb']['frp5']) ? 1:0;
            $this->tfr5 = !empty($_POST['srb']['frt5']) ? '"' .$_POST['srb']['frt5']. '"' : "NULL";
            
            $this->pjp5 = isset($_POST['srb']['jpp5']) ? 1:0;
            $this->tjp5 = !empty($_POST['srb']['jpt5']) ? '"' .$_POST['srb']['jpt5']. '"' : "NULL";
            
            $this->pkr5 = isset($_POST['srb']['krp5']) ? 1:0;
            $this->tkr5 = !empty($_POST['srb']['krt5']) ? '"' .$_POST['srb']['krt5']. '"' : "NULL";

            $this->pta5 = isset($_POST['srb']['tap5']) ? 1:0;
            $this->tta5 = !empty($_POST['srb']['tat5']) ? '"' .$_POST['srb']['tat5']. '"' : "NULL";

        }
        
        if($this->subid5 == 18) {
            
            $this->pom5 = isset($_POST['srb']['omp5']) ? 1:0;
            $this->tom5 = !empty($_POST['srb']['omt5']) ? '"' .$_POST['srb']['omt5']. '"' : "NULL";
            
            $this->pwm5 = isset($_POST['srb']['wmp5']) ? 1:0;
            $this->twm5 = !empty($_POST['srb']['wmt5']) ? '"' .$_POST['srb']['wmt5']. '"' : "NULL";
            
            $this->pod5 = isset($_POST['srb']['odp5']) ? 1:0;
            $this->tod5 = !empty($_POST['srb']['odt5']) ? '"' .$_POST['srb']['odt5']. '"' : "NULL";
            
            $this->par5 = isset($_POST['srb']['arp5']) ? 1:0;
            $this->tar5 = !empty($_POST['srb']['art5']) ? '"' .$_POST['srb']['art5']. '"' : "NULL";
            
            $this->pelt5 = isset($_POST['srb']['eltp5']) ? 1:0;
            $this->telt5 = !empty($_POST['srb']['eltt5']) ? '"' .$_POST['srb']['eltt5']. '"' : "NULL";
            
            $this->psl5 = isset($_POST['srb']['slp5']) ? 1:0;
            $this->tsl5 = !empty($_POST['srb']['slt5']) ? '"' .$_POST['srb']['slt5']. '"' : "NULL";
            
            $this->pdt5 = isset($_POST['srb']['dtp5']) ? 1:0;
            $this->tdt5 = !empty($_POST['srb']['dtt5']) ? '"' .$_POST['srb']['dtt5']. '"' : "NULL";

        }
        
        if($this->subid5 == 19) {
            
            $this->pict5 = isset($_POST['srb']['ictp5']) ? 1:0;
            $this->tict5 = !empty($_POST['srb']['ictt5']) ? '"' .$_POST['srb']['ictt5']. '"' : "NULL";
            
            $this->paft5 = isset($_POST['srb']['aftp5']) ? 1:0;
            $this->taft5 = !empty($_POST['srb']['aftt5']) ? '"' .$_POST['srb']['aftt5']. '"' : "NULL";

            $this->phpe5 = isset($_POST['srb']['hpep5']) ? 1:0;
            $this->thpe5 = !empty($_POST['srb']['hpet5']) ? '"' .$_POST['srb']['hpet5']. '"' : "NULL";
            
            $this->pcms5 = isset($_POST['srb']['cmsp5']) ? 1:0;
            $this->tcms5 = !empty($_POST['srb']['cmst5']) ? '"' .$_POST['srb']['cmst5']. '"' : "NULL";
            
            $this->pdmt5 = isset($_POST['srb']['dmtp5']) ? 1:0;
            $this->tdmt5 = !empty($_POST['srb']['dmtt5']) ? '"' .$_POST['srb']['dmtt5']. '"' : "NULL";
            
        }
        
        $this->subid6 = $_POST['srb']['subid6'];
        //$this->p6 = $_POST['srb']['p6'];
        //$this->t6 = $_POST['srb']['t6'];
        $this->p6 = isset($_POST['srb']['p6']) ? 1:0;
        $this->t6 = !empty($_POST['srb']['t6']) ? '"' .sanitize_text_field($_POST['srb']['t6']). '"' : "NULL";
        
        if($this->subid6 == 17) {
            
            $this->pbas6 = isset($_POST['srb']['basp6']) ? 1:0;
            $this->tbas6 = !empty($_POST['srb']['bast6']) ? '"' .$_POST['srb']['bast6']. '"' : "NULL";
            
            $this->pgeo6 = isset($_POST['srb']['geop6']) ? 1:0;
            $this->tgeo6 = !empty($_POST['srb']['geot6']) ? '"' .$_POST['srb']['geot6']. '"' : "NULL";
            
            $this->pce6 = isset($_POST['srb']['cep6']) ? 1:0;
            $this->tce6 = !empty($_POST['srb']['cet6']) ? '"' .$_POST['srb']['cet6']. '"' : "NULL";
            
            $this->pfr6 = isset($_POST['srb']['frp6']) ? 1:0;
            $this->tfr6 = !empty($_POST['srb']['frt6']) ? '"' .$_POST['srb']['frt6']. '"' : "NULL";
            
            $this->pjp6 = isset($_POST['srb']['jpp6']) ? 1:0;
            $this->tjp6 = !empty($_POST['srb']['jpt6']) ? '"' .$_POST['srb']['jpt6']. '"' : "NULL";
            
            $this->pkr6 = isset($_POST['srb']['krp6']) ? 1:0;
            $this->tkr6 = !empty($_POST['srb']['krt6']) ? '"' .$_POST['srb']['krt6']. '"' : "NULL";

            $this->pta6 = isset($_POST['srb']['tap6']) ? 1:0;
            $this->tta6 = !empty($_POST['srb']['tat6']) ? '"' .$_POST['srb']['tat6']. '"' : "NULL";

        }
        
        if($this->subid6 == 18) {
            
            $this->pom6 = isset($_POST['srb']['omp6']) ? 1:0;
            $this->tom6 = !empty($_POST['srb']['omt6']) ? '"' .$_POST['srb']['omt6']. '"' : "NULL";
            
            $this->pwm6 = isset($_POST['srb']['wmp6']) ? 1:0;
            $this->twm6 = !empty($_POST['srb']['wmt6']) ? '"' .$_POST['srb']['wmt6']. '"' : "NULL";
            
            $this->pod6 = isset($_POST['srb']['odp6']) ? 1:0;
            $this->tod6 = !empty($_POST['srb']['odt6']) ? '"' .$_POST['srb']['odt6']. '"' : "NULL";
            
            $this->par6 = isset($_POST['srb']['arp6']) ? 1:0;
            $this->tar6 = !empty($_POST['srb']['art6']) ? '"' .$_POST['srb']['art6']. '"' : "NULL";
            
            $this->pelt6 = isset($_POST['srb']['eltp6']) ? 1:0;
            $this->telt6 = !empty($_POST['srb']['eltt6']) ? '"' .$_POST['srb']['eltt6']. '"' : "NULL";
            
            $this->psl6 = isset($_POST['srb']['slp6']) ? 1:0;
            $this->tsl6 = !empty($_POST['srb']['slt6']) ? '"' .$_POST['srb']['slt6']. '"' : "NULL";
            
            $this->pdt6 = isset($_POST['srb']['dtp6']) ? 1:0;
            $this->tdt6 = !empty($_POST['srb']['dtt6']) ? '"' .$_POST['srb']['dtt6']. '"' : "NULL";

        }
        
        if($this->subid6 == 19) {
            
            $this->pict6 = isset($_POST['srb']['ictp6']) ? 1:0;
            $this->tict6 = !empty($_POST['srb']['ictt6']) ? '"' .$_POST['srb']['ictt6']. '"' : "NULL";
            
            $this->paft6 = isset($_POST['srb']['aftp6']) ? 1:0;
            $this->taft6 = !empty($_POST['srb']['aftt6']) ? '"' .$_POST['srb']['aftt6']. '"' : "NULL";

            $this->phpe6 = isset($_POST['srb']['hpep6']) ? 1:0;
            $this->thpe6 = !empty($_POST['srb']['hpet6']) ? '"' .$_POST['srb']['hpet6']. '"' : "NULL";
            
            $this->pcms6 = isset($_POST['srb']['cmsp6']) ? 1:0;
            $this->tcms6 = !empty($_POST['srb']['cmst6']) ? '"' .$_POST['srb']['cmst6']. '"' : "NULL";
            
            $this->pdmt6 = isset($_POST['srb']['dmtp6']) ? 1:0;
            $this->tdmt6 = !empty($_POST['srb']['dmtt6']) ? '"' .$_POST['srb']['dmtt6']. '"' : "NULL";
            
        }
        
        $this->subid7 = $_POST['srb']['subid7'];
        //$this->p7 = $_POST['srb']['p7'];
        //$this->t7 = $_POST['srb']['t7'];
        $this->p7 = isset($_POST['srb']['p7']) ? 1:0;
        $this->t7 = !empty($_POST['srb']['t7']) ? '"' .sanitize_text_field($_POST['srb']['t7']). '"' : "NULL";
        
        if($this->subid7 == 17) {
            
            $this->pbas7 = isset($_POST['srb']['basp7']) ? 1:0;
            $this->tbas7 = !empty($_POST['srb']['bast7']) ? '"' .$_POST['srb']['bast7']. '"' : "NULL";
            
            $this->pgeo7 = isset($_POST['srb']['geop7']) ? 1:0;
            $this->tgeo7 = !empty($_POST['srb']['geot7']) ? '"' .$_POST['srb']['geot7']. '"' : "NULL";
            
            $this->pce7 = isset($_POST['srb']['cep7']) ? 1:0;
            $this->tce7 = !empty($_POST['srb']['cet7']) ? '"' .$_POST['srb']['cet7']. '"' : "NULL";
            
            $this->pfr7 = isset($_POST['srb']['frp7']) ? 1:0;
            $this->tfr7 = !empty($_POST['srb']['frt7']) ? '"' .$_POST['srb']['frt7']. '"' : "NULL";
            
            $this->pjp7 = isset($_POST['srb']['jpp7']) ? 1:0;
            $this->tjp7 = !empty($_POST['srb']['jpt7']) ? '"' .$_POST['srb']['jpt7']. '"' : "NULL";
            
            $this->pkr7 = isset($_POST['srb']['krp7']) ? 1:0;
            $this->tkr7 = !empty($_POST['srb']['krt7']) ? '"' .$_POST['srb']['krt7']. '"' : "NULL";

            $this->pta7 = isset($_POST['srb']['tap7']) ? 1:0;
            $this->tta7 = !empty($_POST['srb']['tat7']) ? '"' .$_POST['srb']['tat7']. '"' : "NULL";

        }
        
        if($this->subid7 == 18) {
            
            $this->pom7 = isset($_POST['srb']['omp7']) ? 1:0;
            $this->tom7 = !empty($_POST['srb']['omt7']) ? '"' .$_POST['srb']['omt7']. '"' : "NULL";
            
            $this->pwm7 = isset($_POST['srb']['wmp7']) ? 1:0;
            $this->twm7 = !empty($_POST['srb']['wmt7']) ? '"' .$_POST['srb']['wmt7']. '"' : "NULL";
            
            $this->pod7 = isset($_POST['srb']['odp7']) ? 1:0;
            $this->tod7 = !empty($_POST['srb']['odt7']) ? '"' .$_POST['srb']['odt7']. '"' : "NULL";
            
            $this->par7 = isset($_POST['srb']['arp7']) ? 1:0;
            $this->tar7 = !empty($_POST['srb']['art7']) ? '"' .$_POST['srb']['art7']. '"' : "NULL";
            
            $this->pelt7 = isset($_POST['srb']['eltp7']) ? 1:0;
            $this->telt7 = !empty($_POST['srb']['eltt7']) ? '"' .$_POST['srb']['eltt7']. '"' : "NULL";
            
            $this->psl7 = isset($_POST['srb']['slp7']) ? 1:0;
            $this->tsl7 = !empty($_POST['srb']['slt7']) ? '"' .$_POST['srb']['slt7']. '"' : "NULL";
            
            $this->pdt7 = isset($_POST['srb']['dtp7']) ? 1:0;
            $this->tdt7 = !empty($_POST['srb']['dtt7']) ? '"' .$_POST['srb']['dtt7']. '"' : "NULL";

        }
        
        if($this->subid7 == 19) {
            
            $this->pict7 = isset($_POST['srb']['ictp7']) ? 1:0;
            $this->tict7 = !empty($_POST['srb']['ictt7']) ? '"' .$_POST['srb']['ictt7']. '"' : "NULL";
            
            $this->paft7 = isset($_POST['srb']['aftp7']) ? 1:0;
            $this->taft7 = !empty($_POST['srb']['aftt7']) ? '"' .$_POST['srb']['aftt7']. '"' : "NULL";

            $this->phpe7 = isset($_POST['srb']['hpep7']) ? 1:0;
            $this->thpe7 = !empty($_POST['srb']['hpet7']) ? '"' .$_POST['srb']['hpet7']. '"' : "NULL";
            
            $this->pcms7 = isset($_POST['srb']['cmsp7']) ? 1:0;
            $this->tcms7 = !empty($_POST['srb']['cmst7']) ? '"' .$_POST['srb']['cmst7']. '"' : "NULL";
            
            $this->pdmt7 = isset($_POST['srb']['dmtp7']) ? 1:0;
            $this->tdmt7 = !empty($_POST['srb']['dmtt7']) ? '"' .$_POST['srb']['dmtt7']. '"' : "NULL";
            
        }
        
        $this->subid8 = $_POST['srb']['subid8'];
        //$this->p8 = $_POST['srb']['p8'];
        //$this->t8 = $_POST['srb']['t8'];
        $this->p8 = isset($_POST['srb']['p8']) ? 1:0;
        $this->t8 = !empty($_POST['srb']['t8']) ? '"' .sanitize_text_field($_POST['srb']['t8']). '"' : "NULL";

        
        if($this->subid8 == 17) {
            
            $this->pbas8 = isset($_POST['srb']['basp8']) ? 1:0;
            $this->tbas8 = !empty($_POST['srb']['bast8']) ? '"' .$_POST['srb']['bast8']. '"' : "NULL";
            
            $this->pgeo8 = isset($_POST['srb']['geop8']) ? 1:0;
            $this->tgeo8 = !empty($_POST['srb']['geot8']) ? '"' .$_POST['srb']['geot8']. '"' : "NULL";
            
            $this->pce8 = isset($_POST['srb']['cep8']) ? 1:0;
            $this->tce8 = !empty($_POST['srb']['cet8']) ? '"' .$_POST['srb']['cet8']. '"' : "NULL";
            
            $this->pfr8 = isset($_POST['srb']['frp8']) ? 1:0;
            $this->tfr8 = !empty($_POST['srb']['frt8']) ? '"' .$_POST['srb']['frt8']. '"' : "NULL";
            
            $this->pjp8 = isset($_POST['srb']['jpp8']) ? 1:0;
            $this->tjp8 = !empty($_POST['srb']['jpt8']) ? '"' .$_POST['srb']['jpt8']. '"' : "NULL";
            
            $this->pkr8 = isset($_POST['srb']['krp8']) ? 1:0;
            $this->tkr8 = !empty($_POST['srb']['krt8']) ? '"' .$_POST['srb']['krt8']. '"' : "NULL";

            $this->pta8 = isset($_POST['srb']['tap8']) ? 1:0;
            $this->tta8 = !empty($_POST['srb']['tat8']) ? '"' .$_POST['srb']['tat8']. '"' : "NULL";

        }
        
        if($this->subid8 == 18) {
            
            $this->pom8 = isset($_POST['srb']['omp8']) ? 1:0;
            $this->tom8 = !empty($_POST['srb']['omt8']) ? '"' .$_POST['srb']['omt8']. '"' : "NULL";
            
            $this->pwm8 = isset($_POST['srb']['wmp8']) ? 1:0;
            $this->twm8 = !empty($_POST['srb']['wmt8']) ? '"' .$_POST['srb']['wmt8']. '"' : "NULL";
            
            $this->pod8 = isset($_POST['srb']['odp8']) ? 1:0;
            $this->tod8 = !empty($_POST['srb']['odt8']) ? '"' .$_POST['srb']['odt8']. '"' : "NULL";
            
            $this->par8 = isset($_POST['srb']['arp8']) ? 1:0;
            $this->tar8 = !empty($_POST['srb']['art8']) ? '"' .$_POST['srb']['art8']. '"' : "NULL";
            
            $this->pelt8 = isset($_POST['srb']['eltp8']) ? 1:0;
            $this->telt8 = !empty($_POST['srb']['eltt8']) ? '"' .$_POST['srb']['eltt8']. '"' : "NULL";
            
            $this->psl8 = isset($_POST['srb']['slp8']) ? 1:0;
            $this->tsl8 = !empty($_POST['srb']['slt8']) ? '"' .$_POST['srb']['slt8']. '"' : "NULL";
            
            $this->pdt8 = isset($_POST['srb']['dtp8']) ? 1:0;
            $this->tdt8 = !empty($_POST['srb']['dtt8']) ? '"' .$_POST['srb']['dtt8']. '"' : "NULL";

        }
        
        if($this->subid8 == 19) {
            
            $this->pict8 = isset($_POST['srb']['ictp8']) ? 1:0;
            $this->tict8 = !empty($_POST['srb']['ictt8']) ? '"' .$_POST['srb']['ictt8']. '"' : "NULL";
            
            $this->paft8 = isset($_POST['srb']['aftp8']) ? 1:0;
            $this->taft8 = !empty($_POST['srb']['aftt8']) ? '"' .$_POST['srb']['aftt8']. '"' : "NULL";

            $this->phpe8 = isset($_POST['srb']['hpep8']) ? 1:0;
            $this->thpe8 = !empty($_POST['srb']['hpet8']) ? '"' .$_POST['srb']['hpet8']. '"' : "NULL";
            
            $this->pcms8 = isset($_POST['srb']['cmsp8']) ? 1:0;
            $this->tcms8 = !empty($_POST['srb']['cmst8']) ? '"' .$_POST['srb']['cmst8']. '"' : "NULL";
            
            $this->pdmt8 = isset($_POST['srb']['dmtp8']) ? 1:0;
            $this->tdmt8 = !empty($_POST['srb']['dmtt8']) ? '"' .$_POST['srb']['dmtt8']. '"' : "NULL";
            
        }
        
        
        
        $this->bs1 = array();
        $this->bs2 = array();
        $this->bs3 = array();
		
		$this->bs1[0] = $this->subid1 == 17 ? 1:0;
        $this->bs1[1] = $this->subid2 == 17 ? 1:0;
		$this->bs1[2] = $this->subid3 == 17 ? 1:0;
        $this->bs1[3] = $this->subid4 == 17 ? 1:0;
		$this->bs1[4] = $this->subid5 == 17 ? 1:0;
        $this->bs1[5] = $this->subid6 == 17 ? 1:0;
		$this->bs1[6] = $this->subid7 == 17 ? 1:0;
        $this->bs1[7] = $this->subid8 == 17 ? 1:0;
		
		$this->bs2[0] = $this->subid1 == 18 ? 1:0;
        $this->bs2[1] = $this->subid2 == 18 ? 1:0;
		$this->bs2[2] = $this->subid3 == 18 ? 1:0;
        $this->bs2[3] = $this->subid4 == 18 ? 1:0;
		$this->bs2[4] = $this->subid5 == 18 ? 1:0;
        $this->bs2[5] = $this->subid6 == 18 ? 1:0;
		$this->bs2[6] = $this->subid7 == 18 ? 1:0;
        $this->bs2[7] = $this->subid8 == 18 ? 1:0;
        
        $this->bs3[0] = $this->subid1 == 19 ? 1:0;
        $this->bs3[1] = $this->subid2 == 19 ? 1:0;
		$this->bs3[2] = $this->subid3 == 19 ? 1:0;
        $this->bs3[3] = $this->subid4 == 19 ? 1:0;
		$this->bs3[4] = $this->subid5 == 19 ? 1:0;
        $this->bs3[5] = $this->subid6 == 19 ? 1:0;
		$this->bs3[6] = $this->subid7 == 19 ? 1:0;
        $this->bs3[7] = $this->subid8 == 19 ? 1:0;
        
        $this->console_log($this->bs1);
        $this->console_log($this->bs2);
        $this->console_log($this->bs3);
        
        $this->pm = ['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8'];
        
        $this->tm = ['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8'];
        
        $this->pb = [
                        'pbas1', 'pgeo1', 'pce1', 'pfr1', 'pjp1', 'pkr1', 'pta1',
                        'pbas2', 'pgeo2', 'pce2', 'pfr2', 'pjp2', 'pkr2', 'pta2',
                        'pbas3', 'pgeo3', 'pce3', 'pfr3', 'pjp3', 'pkr3', 'pta3',
                        'pbas4', 'pgeo4', 'pce4', 'pfr4', 'pjp4', 'pkr4', 'pta4',
                        'pbas5', 'pgeo5', 'pce5', 'pfr5', 'pjp5', 'pkr5', 'pta5',
                        'pbas6', 'pgeo6', 'pce6', 'pfr6', 'pjp6', 'pkr6', 'pta6',
                        'pbas7', 'pgeo7', 'pce7', 'pfr7', 'pjp7', 'pkr7', 'pta7',
                        'pbas8', 'pgeo8', 'pce8', 'pfr8', 'pjp8', 'pkr8', 'pta8',
                        'pom1', 'pwm1', 'pod1', 'par1', 'pelt1', 'psl1', 'pdt1',
                        'pom2', 'pwm2', 'pod2', 'par2', 'pelt2', 'psl2', 'pdt2',
                        'pom3', 'pwm3', 'pod3', 'par3', 'pelt3', 'psl3', 'pdt3',
                        'pom4', 'pwm4', 'pod4', 'par4', 'pelt4', 'psl4', 'pdt4',
                        'pom5', 'pwm5', 'pod5', 'par5', 'pelt5', 'psl5', 'pdt5',
                        'pom6', 'pwm6', 'pod6', 'par6', 'pelt6', 'psl6', 'pdt6',
                        'pom7', 'pwm7', 'pod7', 'par7', 'pelt7', 'psl7', 'pdt7',
                        'pom8', 'pwm8', 'pod8', 'par8', 'pelt8', 'psl8', 'pdt8',
                        'pict1', 'paft1', 'phpe1', 'pcms1', 'pdmt1',
                        'pict2', 'paft2', 'phpe2', 'pcms2', 'pdmt2',
                        'pict3', 'paft3', 'phpe3', 'pcms3', 'pdmt3',
                        'pict4', 'paft4', 'phpe4', 'pcms4', 'pdmt4',
                        'pict5', 'paft5', 'phpe5', 'pcms5', 'pdmt5',
                        'pict6', 'paft6', 'phpe6', 'pcms6', 'pdmt6',
                        'pict7', 'paft7', 'phpe7', 'pcms7', 'pdmt7',
                        'pict8', 'paft8', 'phpe8', 'pcms8', 'pdmt8'
                    ];
        
        $this->tb = [
                        'tbas1', 'tgeo1', 'tce1', 'tfr1', 'tjp1', 'tkr1', 'tta1',
                        'tbas2', 'tgeo2', 'tce2', 'tfr2', 'tjp2', 'tkr2', 'tta2',
                        'tbas3', 'tgeo3', 'tce3', 'tfr3', 'tjp3', 'tkr3', 'tta3',
                        'tbas4', 'tgeo4', 'tce4', 'tfr4', 'tjp4', 'tkr4', 'tta4',
                        'tbas5', 'tgeo5', 'tce5', 'tfr5', 'tjp5', 'tkr5', 'tta5',
                        'tbas6', 'tgeo6', 'tce6', 'tfr6', 'tjp6', 'tkr6', 'tta6',
                        'tbas7', 'tgeo7', 'tce7', 'tfr7', 'tjp7', 'tkr7', 'tta7',
                        'tbas8', 'tgeo8', 'tce8', 'tfr8', 'tjp8', 'tkr8', 'tta8',
                        'tom1', 'twm1', 'tod1', 'tar1', 'telt1', 'tsl1', 'tdt1',
                        'tom2', 'twm2', 'tod2', 'tar2', 'telt2', 'tsl2', 'tdt2',
                        'tom3', 'twm3', 'tod3', 'tar3', 'telt3', 'tsl3', 'tdt3',
                        'tom4', 'twm4', 'tod4', 'tar4', 'telt4', 'tsl4', 'tdt4',
                        'tom5', 'twm5', 'tod5', 'tar5', 'telt5', 'tsl5', 'tdt5',
                        'tom6', 'twm6', 'tod6', 'tar6', 'telt6', 'tsl6', 'tdt6',
                        'tom7', 'twm7', 'tod7', 'tar7', 'telt7', 'tsl7', 'tdt7',
                        'tom8', 'twm8', 'tod8', 'tar8', 'telt8', 'tsl8', 'tdt8',
                        'tict1', 'taft1', 'thpe1', 'tcms1', 'tdmt1',
                        'tict2', 'taft2', 'thpe2', 'tcms2', 'tdmt2',
                        'tict3', 'taft3', 'thpe3', 'tcms3', 'tdmt3',
                        'tict4', 'taft4', 'thpe4', 'tcms4', 'tdmt4',
                        'tict5', 'taft5', 'thpe5', 'tcms5', 'tdmt5',
                        'tict6', 'taft6', 'thpe6', 'tcms6', 'tdmt6',
                        'tict7', 'taft7', 'thpe7', 'tcms7', 'tdmt7',
                        'tict8', 'taft8', 'thpe8', 'tcms8', 'tdmt8'
                    ];
                    
        $this->sub = [
                        'subid1','subid2','subid3','subid4','subid5','subid6','subid7','subid8'
                     ];
        
                     
        foreach($this->sub as $ss) {
           $_SESSION['foo'][$ss] = $this->{$ss};
        }
        
        foreach($this->pm as $p) {
           $_SESSION['foo'][$p] = !empty($this->{$p})?1:0;
        }
        
        foreach($this->tm as $t) {
           $_SESSION['foo'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
           $this->console_log($_SESSION['foo'][$t]);
        }
        
        foreach($this->pb as $p) {
           $_SESSION['foo'][$p] = !empty($this->{$p})?1:0;
        }
        
        foreach($this->tb as $t) {
           $_SESSION['foo'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
        }
        
        
        foreach($this->sub as $ss) {
            if($this->{$ss} == 0) {
                echo '<script>alert("Please Select All Subject Slots")</script>';
                return false;
            }
        }

        $i=0;
        foreach($this->pm as $p) {
            $this->console_log($p + ' - ' + $this->{$p});
            $this->console_log($this->tm[$i] + ' - ' + $this->{$this->tm[$i]});
            $this->console_log($this->{$p} == 0  &&  (is_null($this->{$this->tm[$i]}) || $this->{$this->tm[$i]} === "NULL" ));
            $this->console_log($this->{$p} == 0);
            $this->console_log(is_null($this->{$this->tm[$i]}));
            if (!in_array($this->{$this->sub[$i]}, [17, 18, 19])) {
                // Code to execute if $this->{$this->sub[$i]} is not 17, 18, or 19
                if($this->{$p} == 0  &&  (is_null($this->{$this->tm[$i]}) || $this->{$this->tm[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots.")</script>';
                    return false;
                }
            }

            $i = $i + 1;
        }
        
        
        $i=0;
        foreach($this->pb as $p) {
            if(isset($this->{$p})) { //isset($this->{$p}
                $this->console_log($p + ' - ' + $this->{$p});
                $this->console_log($this->tb[$i] + ' - ' + $this->{$this->tb[$i]});
                $this->console_log($this->{$p} == 0  &&  (is_null($this->{$this->tb[$i]}) || $this->{$this->tb[$i]} === "NULL" ));
                $this->console_log($this->{$p} == 0);
                $this->console_log(is_null($this->{$this->tb[$i]}));
                if($this->{$p} == 0  &&  (is_null($this->{$this->tb[$i]}) || $this->{$this->tb[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots")</script>';
                    return false;
                }
            }
            $i = $i + 1;
        }
        
        
        //$_SESSION['time']=$_POST;
	    $this->notify = $_POST['notify'];
	    // Rest is coming soon!	
	    return true;
    }
    
    function insertTimeSlot() {
	    
	    global $wpdb;

        //$wpdb->hide_errors();
        
        
        $mb = new stClass();
        
        //$tbid = $mb->getTimeTable($this->clid);
        $this->console_log($this->clid);
        $this->console_log($tbid);
        $this->console_log($this->sdate);
        //$this->console_log(var_dump($this->bs3));
        $tableName = $wpdb->prefix . "srb_timeslot";
      
        if($this->bs1[0] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8 ,'1',$this->pbas1, $this->tbas1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16 ,'1',$this->pgeo1, $this->tgeo1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7 ,'1',$this->pce1, $this->tce1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9 ,'1',$this->pfr1, $this->tfr1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10 ,'1',$this->pjp1, $this->pjp1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11 ,'1',$this->pkr1, $this->tkr1, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'1',$this->pta1, $this->tta1, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[0] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12 ,'1',$this->pom1, $this->tom1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'1',$this->pwm1, $this->twm1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'1',$this->pod1, $this->tod1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15 ,'1',$this->par1, $this->tar1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20 ,'1',$this->pelt1, $this->telt1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'1',$this->psl1, $this->tsl1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'1',$this->pdt1, $this->tdt1, FROM_UNIXTIME($this->sdate))"));
			        
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[0] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22 ,'1',$this->pict1, $this->tict1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23 ,'1',$this->paft1, $this->taft1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'1',$this->phpe1, $this->thpe1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'1',$this->pcms1, $this->tcms1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'1',$this->pdmt1, $this->tdmt1, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid1 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid1,'1',$this->p1, $this->t1, FROM_UNIXTIME($this->sdate))")); 
                
                if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[1] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'2',$this->pbas2, $this->tbas2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'2',$this->pgeo2, $this->tgeo2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'2',$this->pce2, $this->tce2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'2',$this->pfr2, $this->tfr2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'2',$this->pjp2, $this->pjp2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'2',$this->pkr2, $this->tkr2, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'2',$this->pta2, $this->tta2, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[1] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'2',$this->pom2, $this->tom2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'2',$this->pwm2, $this->twm2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'2',$this->pod2, $this->tod2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'2',$this->par2, $this->tar2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'2',$this->pelt2, $this->telt2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'2',$this->psl2, $this->tsl2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'2',$this->pdt2, $this->tdt2, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[1] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'2',$this->pict2, $this->tict2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'2',$this->paft2, $this->taft2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'2',$this->phpe2, $this->thpe2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'2',$this->pcms2, $this->tcms2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'2',$this->pdmt2, $this->tdmt2, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
           if($this->subid2 != 0) { 
               $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid2,'2',$this->p2, $this->t2, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
           }
			        
        }
		
		
		if($this->bs1[2] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'3',$this->pbas3, $this->tbas3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'3',$this->pgeo3, $this->tgeo3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'3',$this->pce3, $this->tce3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'3',$this->pfr3, $this->tfr3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'3',$this->pjp3, $this->tjp3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'3',$this->pkr3, $this->tkr3, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'3',$this->pta3, $this->tta3, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[2] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'3',$this->pom3, $this->tom3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'3',$this->pwm3, $this->twm3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'3',$this->pod3, $this->tod3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'3',$this->par3, $this->tar3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'3',$this->pelt3, $this->telt3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'3',$this->psl3, $this->tsl3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'3',$this->pdt3, $this->tdt3, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[2] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'3',$this->pict3, $this->tict3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'3',$this->paft3, $this->taft3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'3',$this->phpe3, $this->thpe3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'3',$this->pcms3, $this->tcms3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'3',$this->pdmt3, $this->tdmt3, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid3 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid3,'3',$this->p3, $this->t3, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
        
        if($this->bs1[3] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'4',$this->pbas4, $this->tbas4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'4',$this->pgeo4, $this->tgeo4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'4',$this->pce4, $this->tce4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'4',$this->pfr4, $this->tfr4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'4',$this->pjp4, $this->tjp4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'4',$this->pkr4, $this->tkr4, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'4',$this->pta4, $this->tta4, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[3] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'4',$this->pom4, $this->tom4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'4',$this->pwm4, $this->twm4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'4',$this->pod4, $this->tod4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'4',$this->par4, $this->tar4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'4',$this->pelt4, $this->telt4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'4',$this->psl4, $this->tsl4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'4',$this->pdt4, $this->tdt4, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[3] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'4',$this->pict4, $this->tict4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'4',$this->paft4, $this->taft4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'4',$this->phpe4, $this->thpe4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'4',$this->pcms4, $this->tcms4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'4',$this->pdmt4, $this->tdmt4, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid4 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid4,'4',$this->p4, $this->t4, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
        
        if($this->bs1[4] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'5',$this->pbas5, $this->tbas5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'5',$this->pgeo5, $this->tgeo5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'5',$this->pce5, $this->tce5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'5',$this->pfr5, $this->tfr5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'5',$this->pjp5, $this->tjp5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'5',$this->pkr5, $this->tkr5, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'5',$this->pta5, $this->tta5, FROM_UNIXTIME($this->sdate))"));
			       
			       if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[4] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'5',$this->pom5, $this->tom5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'5',$this->pwm5, $this->twm5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'5',$this->pod5, $this->tod5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'5',$this->par5, $this->tar5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'5',$this->pelt5, $this->telt5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'5',$this->psl5, $this->tsl5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'5',$this->pdt5, $this->tdt5, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
            
        } else if($this->bs3[4] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'5',$this->pict5, $this->tict5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'5',$this->paft5, $this->taft5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'5',$this->phpe5, $this->thpe5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'5',$this->pcms5, $this->tcms5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'5',$this->pdmt5, $this->tdmt5, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid5 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid5,'5',$this->p5, $this->t5, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[5] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'6',$this->pbas6, $this->tbas6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'6',$this->pgeo6, $this->tgeo6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'6',$this->pce6, $this->tce6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'6',$this->pfr6, $this->tfr6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'6',$this->pjp6, $this->tjp6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'6',$this->pkr6, $this->tkr6, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'6',$this->pta6, $this->tta6, FROM_UNIXTIME($this->sdate))"));
			   
			   if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[5] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'6',$this->pom6, $this->tom6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'6',$this->pwm6, $this->twm6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'6',$this->pod6, $this->tod6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'6',$this->par6, $this->tar6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'6',$this->pelt6, $this->telt6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'6',$this->psl6, $this->tsl6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'6',$this->pdt6, $this->tdt6, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[5] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'6',$this->pict6, $this->tict6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'6',$this->paft6, $this->taft6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'6',$this->phpe6, $this->thpe6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'6',$this->pcms6, $this->tcms6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'6',$this->pdmt6, $this->tdmt6, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid6 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid6,'6',$this->p6, $this->t6, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[6] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'7',$this->pbas7, $this->tbas7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'7',$this->pgeo7, $this->tgeo7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'7',$this->pce7, $this->tce7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'7',$this->pfr7, $this->tfr7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'7',$this->pjp7, $this->tjp7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'7',$this->pkr7, $this->tkr7, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'7',$this->pta7, $this->tta7, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[6] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'7',$this->pom7, $this->tom7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'7',$this->pwm7, $this->twm7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'7',$this->pod7, $this->tod7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'7',$this->par7, $this->tar7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'7',$this->pelt7, $this->telt7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'7',$this->psl7, $this->tsl7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'7',$this->pdt7, $this->tdt7, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[6] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'7',$this->pict7, $this->tict7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'7',$this->paft7, $this->taft7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'7',$this->phpe7, $this->thpe7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'7',$this->pcms7, $this->tcms7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'7',$this->pdmt7, $this->tdmt7, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid7 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid7,'7',$this->p7, $this->t7, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[7] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 8,'8',$this->pbas8, $this->tbas8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 16,'8',$this->pgeo8, $this->tgeo8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 7,'8',$this->pce8, $this->tce8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 9,'8',$this->pfr8, $this->tfr8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 10,'8',$this->pjp8, $this->tjp8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11,'8',$this->pkr8, $this->tkr8, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 30 ,'8',$this->pta8, $this->tta8, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[7] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 12,'8',$this->pom8, $this->tom8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13,'8',$this->pwm8, $this->twm8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14,'8',$this->pod8, $this->tod8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 15,'8',$this->par8, $this->tar8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 20,'8',$this->pelt8, $this->telt8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 28 ,'8',$this->psl8, $this->tsl8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21,'8',$this->pdt8, $this->tdt8, FROM_UNIXTIME($this->sdate))"));
            
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[7] == 1) {
            
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 22,'8',$this->pict8, $this->tict8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 23,'8',$this->paft8, $this->taft8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 24,'8',$this->phpe8, $this->thpe8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 25,'8',$this->pcms8, $this->tcms8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 26,'8',$this->pdmt8, $this->tdmt8, FROM_UNIXTIME($this->sdate))"));
            
            if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid8 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES ( $this->clid, $this->subid8,'8',$this->p8, $this->t8, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
	
		return true;
    }
    
    
    //Grade 6 - 9 
        public function srb_generate_time_record_method69($attr) {
        
        $this->enqueue_styles();
        $this->enqueue_scripts();
        
        $srb_add_meta_nonce69 = wp_create_nonce('srb_add_time_table_record_nonce69'); 
        
        if ( is_user_logged_in() ) {
            
            $user = wp_get_current_user();
            if ( in_array( 'student', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
                //The user has the "author" role
            
            
            
            //drop down for class
            
            
            //drop down for subject
            
                
            $content='';
            
            if ($this->checkInput69()) {
	
		        $success = $this->insertTimeSlot69();
                do_action('end_session_action');
		        $cachedFields69 = [];
		        unset($cachedFields69);
		        $period_01_table = '';
		        $period_02_table = '';
		        $period_03_table = '';
		        $period_04_table = '';
		        $period_05_table = '';
		        $period_06_table = '';
		        $period_07_table = '';
		        $period_08_table = '';

        	    if ($success) {
        			$content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Successfully send Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					<a href="https://www.mrcstudent.com/student-record-book69" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;	
        	    } else {
        	        $content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Error Occured while sending Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					
        					<h3>'. $wpdb->last_query . ' </h3>
        					<h3>'. $wpdb->last_error . ' </h3>
        					<a href="https://www.mrcstudent.com/student-record-book69" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;
        	    }
        	    
	        } else {

                $cachedFields69 = isset($_SESSION['foo69']) ? $_SESSION['foo69'] : [];
                $this->console_log($cachedFields69);
                $this->console_log($_SESSION['foo69']);
                do_action('end_session_action');
                
                $sub = [
                    $cachedFields69['subid1'],
                    $cachedFields69['subid2'],
                    $cachedFields69['subid3'],
                    $cachedFields69['subid4'],
                    $cachedFields69['subid5'],
                    $cachedFields69['subid6'],
                    $cachedFields69['subid7'],
                    $cachedFields69['subid8']
                    ];
                    
                    $table = [
                        'period_01_table',
                        'period_02_table',
                        'period_03_table',
                        'period_04_table',
                        'period_05_table',
                        'period_06_table',
                        'period_07_table',
                        'period_08_table'
                        ];

                    
                $time = [
                        '7.50 - 8.30',
                        '8.30 - 9.10',
                        '9.10 - 9.50',
                        '9.50 - 10.30',
                        '10.50 - 11.30',
                        '11.30 - 12.10',
                        '12.10 - 12.50',
                        '12.50 - 1.30'
                    ];
                    
                $dropdown = [
                    'dropdown_subject_html1',
                    'dropdown_subject_html2',
                    'dropdown_subject_html3',
                    'dropdown_subject_html4',
                    'dropdown_subject_html5',
                    'dropdown_subject_html6',
                    'dropdown_subject_html7',
                    'dropdown_subject_html8'
                    ];
            
            
                $pb69 = [
                    'par691', 'pdc691', 'pom691', 'pwm691', 'pdr691',
                    'par692', 'pdc692', 'pom692', 'pwm692', 'pdr692',
                    'par693', 'pdc693', 'pom693', 'pwm693', 'pdr693',
                    'par694', 'pdc694', 'pom694', 'pwm694', 'pdr694',
                    'par695', 'pdc695', 'pom695', 'pwm695', 'pdr695',
                    'par696', 'pdc696', 'pom696', 'pwm696', 'pdr696',
                    'par697', 'pdc697', 'pom697', 'pwm697', 'pdr697',
                    'par698', 'pdc698', 'pom698', 'pwm698', 'pdr698'
                    ];

                $tb69 = [
                    'tar691', 'tdc691', 'tom691', 'twm691', 'tdr691',
                    'tar692', 'tdc692', 'tom692', 'twm692', 'tdr692',
                    'tar693', 'tdc693', 'tom693', 'twm693', 'tdr693',
                    'tar694', 'tdc694', 'tom694', 'twm694', 'tdr694',
                    'tar695', 'tdc695', 'tom695', 'twm695', 'tdr695',
                    'tar696', 'tdc696', 'tom696', 'twm696', 'tdr696',
                    'tar697', 'tdc697', 'tom697', 'twm697', 'tdr697',
                    'tar698', 'tdc698', 'tom698', 'twm698', 'tdr698'
                    ];
            
                $pom69  = ['pom691', 'pom692', 'pom693', 'pom694', 'pom695', 'pom696', 'pom697', 'pom698'];
                $pwm69  = ['pwm691', 'pwm692', 'pwm693', 'pwm694', 'pwm695', 'pwm696', 'pwm697', 'pwm698'];
                $pdc69  = ['pdc691', 'pdc692', 'pdc693', 'pdc694', 'pdc695', 'pdc696', 'pdc697', 'pdc698'];
                $par69  = ['par691', 'par692', 'par693', 'par694', 'par695', 'par696', 'par697', 'par698'];
                $pdr69  = ['pdr691', 'pdr692', 'pdr693', 'pdr694', 'pdr695', 'pdr696', 'pdr697', 'pdr698'];

                $tom69  = ['tom691', 'tom692', 'tom693', 'tom694', 'tom695', 'tom696', 'tom697', 'tom698'];
                $twm69  = ['twm691', 'twm692', 'twm693', 'twm694', 'twm695', 'twm696', 'twm697', 'twm698'];
                $tdc69  = ['tdc691', 'tdc692', 'tdc693', 'tdc694', 'tdc695', 'tdc696', 'tdc697', 'tdc698'];
                $tar69  = ['tar691', 'tar692', 'tar693', 'tar694', 'tar695', 'tar696', 'tar697', 'tar698'];
                $tdr69  = ['tdr691', 'tdr692', 'tdr693', 'tdr694', 'tdr695', 'tdr696', 'tdr697', 'tdr698'];
                
                
                foreach($pb69 as $p) {
                    ${$p} = in_array($p, $cachedFields69)&&$cachedFields69[$p]==1?'checked':'';
                }
                
                foreach($tb69 as $t) {
                    ${$t} = !is_null($cachedFields69[$t])&&$cachedFields69[$t]!='NULL'?$cachedFields69[$t]:'';
                }
                
                //check box sessions 
                $pp1 = in_array('p1', $cachedFields69)&&$cachedFields69['p1']==1?'checked':'';
                $pp2 = in_array('p2', $cachedFields69)&&$cachedFields69['p2']==1?'checked':'';
                $pp3 = in_array('p3', $cachedFields69)&&$cachedFields69['p3']==1?'checked':'';
                $pp4 = in_array('p4', $cachedFields69)&&$cachedFields69['p4']==1?'checked':'';
                $pp5 = in_array('p5', $cachedFields69)&&$cachedFields69['p5']==1?'checked':'';
                $pp6 = in_array('p6', $cachedFields69)&&$cachedFields69['p6']==1?'checked':'';
                $pp7 = in_array('p7', $cachedFields69)&&$cachedFields69['p7']==1?'checked':'';
                $pp8 = in_array('p8', $cachedFields69)&&$cachedFields69['p8']==1?'checked':'';
                
                //textbox sessions
                $tt1 = !empty($cachedFields69['t1'])&&$cachedFields69['t1']!='NULL' ?$cachedFields69['t1']:'';
                $tt2 = !empty($cachedFields69['t2'])&&$cachedFields69['t2']!='NULL'?$cachedFields69['t2']:'';
                $tt3 = !empty($cachedFields69['t3'])&&$cachedFields69['t3']!='NULL'?$cachedFields69['t3']:'';
                $tt4 = !empty($cachedFields69['t4'])&&$cachedFields69['t4']!='NULL'?$cachedFields69['t4']:'';
                $tt5 = !empty($cachedFields69['t5'])&&$cachedFields69['t5']!='NULL'?$cachedFields69['t5']:'';
                $tt6 = !empty($cachedFields69['t6'])&&$cachedFields69['t6']!='NULL'?$cachedFields69['t6']:'';
                $tt7 = !empty($cachedFields69['t7'])&&$cachedFields69['t7']!='NULL'?$cachedFields69['t7']:'';
                $tt8 = !empty($cachedFields69['t8'])&&$cachedFields69['t8']!='NULL'?$cachedFields69['t8']:'';
                
                $i=0;
                //tables sessions
                if(isset($_SESSION['foo69'])) {
                    foreach( $sub as $s ) {
                        $j = $i+1;
                        if($s == 29) {
                            ${$table[$i]}='<table id="period-0'.$j.'-table69">
                                            <tr><td>'.$time[$i].'</td><td>Art</td><td><input type="checkbox" id="ar69p'.$j.'" name="srb[ar69p'.$j.']" value="ar69p'.$j.'" '.${$par69[$i]}.'></td><td><input list="reason" name="srb[ar69t'.$j.']"  id="ar69t'.$j.'" value="'.${$tar69[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td>Oriental Dancing</td><td><input type="checkbox" id="dc69p'.$j.'" name="srb[dc69p'.$j.']" value="dc69p'.$j.'" '.${$pdc69[$i]}.'></td><td><input list="reason" name="srb[dc69t'.$j.']"  id="dc69t'.$j.'" value="'.${$tdc69[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td>Oriental Music</td><td><input type="checkbox" id="om69p'.$j.'" name="srb[om69p'.$j.']" value="om69p'.$j.'" '.${$pom69[$i]}.' ></td><td><input list="reason" name="srb[om69t'.$j.']"  id="om69t'.$j.'" value="'.${$tom69[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td>Western Music</td><td><input type="checkbox" id="wm69p'.$j.'" name="srb[wm69p'.$j.']" value="wm69p'.$j.'" '.${$pwm69[$i]}.'></td><td><input list="reason" name="srb[wm69t'.$j.']"  id="wm69t'.$j.'" value="'.${$twm69[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td>Drama and Theatre</td><td><input type="checkbox" id="dr69p'.$j.'" name="srb[dr69p'.$j.']" value="dr69p'.$j.'" '.${$pdr69[$i]}.' ></td><td><input list="reason" name="srb[dr69t'.$j.']"  id="dr69t'.$j.'" value="'.${$tdr69[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist></td></tr>                                           
                                        </table>';
                        }
                        
                        $i+=1;
                    }
                }
                
                $table01 = !is_null($period_01_table)?$period_01_table:'<table id="period-01-table69"></table>';
                $table02 = !is_null($period_02_table)?$period_02_table:'<table id="period-02-table69"></table>';
                $table03 = !is_null($period_03_table)?$period_03_table:'<table id="period-03-table69"></table>';
                $table04 = !is_null($period_04_table)?$period_04_table:'<table id="period-04-table69"></table>';
                $table05 = !is_null($period_05_table)?$period_05_table:'<table id="period-05-table69"></table>';
                $table06 = !is_null($period_06_table)?$period_06_table:'<table id="period-06-table69"></table>';
                $table07 = !is_null($period_07_table)?$period_07_table:'<table id="period-07-table69"></table>';
                $table08 = !is_null($period_08_table)?$period_08_table:'<table id="period-08-table69"></table>';


                //drop down for class
                $mb = new stClass();
                $results = $mb->getAll69();
                
                if(isset($_SESSION['foo69'])) {
                    //drop down for class
                    $dropdown_class_html = '<select required id="srb_class_select69" name="srb[clid]">
                                                <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                                 
                    foreach ($results as $result)
                    {
                        $clid = esc_html($result->getCid());
                        $clname = esc_html($result->getCname());
                        $isSelect = $cachedFields69['clid'] == $clid?'selected':'';    
                        $dropdown_class_html .= '<option value="' . $clid . '" '.$isSelect.'>( '. $clid .' )-' . $clname . '</option>' . "\n";
                    }
                    
                    $dropdown_class_html .= '</select>';
                } else {
                    //drop down for class
                    $dropdown_class_html = '<select required id="srb_class_select69" name="srb[clid]">
                                            <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                             
                    foreach ($results as $result)
                    {
                        $clid = esc_html($result->getCid());
                        $clname = esc_html($result->getCname());
                            
                        $dropdown_class_html .= '<option value="' . $clid . '">( '. $clid .' )-' . $clname . '</option>' . "\n";
                    }
                    
                    $dropdown_class_html .= '</select>';
                }
                
                $sb = new Subject();
                $resultsub = $sb->getCoreSubjects69();
    
                
                //drop down for subject
                $dropdown_subject_html = '';
                
                
                if(isset($_SESSION['foo69'])) {
                    
                    $i=0;
                    foreach ($sub as $s)
                    {
                        foreach ($resultsub as $result)
                        {
                            $sid = esc_html($result->getSid());
                            $sname = esc_html($result->getSname());
                            $scode = esc_html($result->getCode());
                            $isSelect = $s == $sid?'selected':'';    
                            ${$dropdown[$i]} .= '<option value="' . $sid . '" '.$isSelect.'>' . $sname . '( '. $scode .' )  </option>' . "\n";
                        }
                        ${$dropdown} .= '</select>';
                        $i +=1;
                    }
                    
                } else {
                             
                    foreach ($resultsub as $result)
                    {
                        $sid = esc_html($result->getSid());
                        $sname = esc_html($result->getSname());
                        $scode = esc_html($result->getCode());
                            
                        $dropdown_subject_html .= '<option value="' . $sid . '">' . $sname . '( '. $scode .' ) </option>' . "\n";
                    }
                    
                    $dropdown_subject_html .= '</select>';
                }
                
                
                $dropdown_sub1 = isset($_SESSION['foo69'])?$dropdown_subject_html1:$dropdown_subject_html;
                $dropdown_sub2 = isset($_SESSION['foo69'])?$dropdown_subject_html2:$dropdown_subject_html;
                $dropdown_sub3 = isset($_SESSION['foo69'])?$dropdown_subject_html3:$dropdown_subject_html;
                $dropdown_sub4 = isset($_SESSION['foo69'])?$dropdown_subject_html4:$dropdown_subject_html;
                $dropdown_sub5 = isset($_SESSION['foo69'])?$dropdown_subject_html5:$dropdown_subject_html;
                $dropdown_sub6 = isset($_SESSION['foo69'])?$dropdown_subject_html6:$dropdown_subject_html;
                $dropdown_sub7 = isset($_SESSION['foo69'])?$dropdown_subject_html7:$dropdown_subject_html;
                $dropdown_sub8 = isset($_SESSION['foo69'])?$dropdown_subject_html8:$dropdown_subject_html;






                    $content.='<h3>ADD TIME RECORDS GRADE 6 - 9</h3>';		
            		$content.='<div class="srb_add_user_meta_form">';
            					
            		$content.='<form action="'.get_permalink().'" method="post" id="srb_add_order_meta__form" >';			
            
            			$content.='<input type="hidden" name="action" value="srb_form_time_record_response69">';
            			$content.='<input type="hidden" name="srb_add_class_meta_nonce69" value="'. $srb_add_meta_nonce69 .'" />';
            			$content.='<input type="hidden" name="my-form-data" value="process"/>';
						$content.='<input type="hidden" name="notify" value="True"/>';
            			
            			$content.='<div><br>';
            				//$content.='<label for="'. $this->plugin_name.'-class_id"> '. _e("CLASS ID", $this->plugin_name).' </label><br>';
            			$content.='<label for="class">Select Class:</label>';
            			$content.= $dropdown_class_html; 
            			$content.='<br></div>';
            			$content.='<div style="width: 350px; margin-top:30px">';
                        $content.='<label for="selectdate">Select Date:</label>';
                        $content.='<input required type="date" id="recorddate69" name="srb[recorddate]" value="'.$cachedFields69["sdate"].'"><br>';
                        $content.='<input required type="hidden" name="srb[createddate]" id="result"  /><br>';    
                        $content.='</div>';
                        
            			$content.='<div>';
            				
                		$content.='<table class="srb_rale">
                          <thead>
                           <tr>
                            <th>Period</th>
                            <th>Subject</th>
                            <th>IsDone</th>
                            <th>Reason</th>
                          </tr>
                          </thead>
                          <tbody>
                        
                                <!-- Start : Period 01 -->
                                <tr>
                                    <td>7.50-8.30</td>
                                    <td>
                                    <select required id="period-01-drop-down69" name="srb[subid1]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub1 . '
                                    </td>
                                    <td><input type="checkbox" id="p1" name="srb[p1]" '.$pp1.'></td>
                                    <td><input list="reason" name="srb[t1]" id="t1" '.$tt1.' />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        '. $table01.'
                                    </td>
                                </tr>
                        
                                <!-- End : Period 01 -->
                        
                                <!-- Start : Period 02 -->
                        
                                <tr>
                                    <td>8.30-9.10</td>
                                    <td>
                                    <select required id="period-02-drop-down69" name="srb[subid2]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub2 . '
                                    </td>
                                    <td><input type="checkbox" id="p2" name="srb[p2]" '.$pp2.'></td>
                                    <td><input list="reason" name="srb[t2]" id="t2" '.$tt2.'/>
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        '.$table02.'
                                    </td>
                                </tr>
                        
                                <!-- End : Period 03 -->
                        
                                <!-- Start : Period 03 -->
                                <tr>
                                    <td>9.10-9.50</td>
                                    <td>
                                        <select required id="period-03-drop-down69" name="srb[subid3]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub3 . '
                                    </td>
                                    <td><input type="checkbox" id="p3" name="srb[p3]" '.$pp3.'></td>
                                    <td><input list="reason" name="srb[t3]" id="t3" '.$tt3.' />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                        '.$table03.'
                                    </td>
                                </tr>
                                <!-- End : Period 03 -->
                        
                                <!-- Start : Period 04 -->
                                <tr>
                                    <td>9.50-10.30</td>
                                    <td>
                                        <select required id="period-04-drop-down69" name="srb[subid4]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub4 . '
                                    </td>
                                    <td><input type="checkbox" id="p4" name="srb[p4]" '.$pp4.' ></td>
                                    <td><input list="reason" name="srb[t4]" id="t4" '.$tt4.' />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                        '.$table04.'
                                    </td>
                                </tr>
                        
                                <!-- End : Period 04 -->
                        
                                <!-- Start : Period 05 -->
                                <tr>
                                    <td>10.50-11.30</td>
                                    <td>
                                        <select required id="period-05-drop-down69" name="srb[subid5]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub5 . '
                                    </td>
                                    <td><input type="checkbox" id="p5" name="srb[p5]" '.$pp5.'></td>
                                    <td><input list="reason" name="srb[t5]" id="t5" '.$tt5.' />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                        '.$table05.'
                                    </td>
                                </tr>
                        
                                <!-- End : Period 05 -->
                        
                                <!-- Start : Period 06 -->
                        
                                <tr>
                                    <td>11.30-13.10</td>
                                    <td>
                                        <select required id="period-06-drop-down69" name="srb[subid6]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub6 . '
                                    </td>
                                    <td><input type="checkbox" id="p6" name="srb[p6]" '.$pp6.'></td>
                                    <td><input list="reason" name="srb[t6]" id="t6" '.$tt6.' />
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                        '.$table06.'
                                    </td>
                                </tr>
                                <!-- End : Period 06 -->
                        
                                <!-- Start : Period 07 -->
                        
                                <tr>
                                    <td>13.10-13.50</td>
                                    <td>
                                    <select required id="period-07-drop-down69" name="srb[subid7]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub7 . '
                                    </td>
                                    <td><input type="checkbox" id="p7" name="srb[p7]" '.$pp7.'></td>
                                    <td><input list="reason" name="srb[t7]" id="t7" '.$tt7.'/>
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    <td colspan="4">
                                        '.$table07.'
                                    </td>
                                </tr>
                                <!-- End : Period 07 -->
                        
                                <!-- Start : Period 08 -->
                        
                                <tr>
                                    <td>13.50-1.30</td>
                                    <td>
                                        <select required id="period-08-drop-down69" name="srb[subid8]">
                                            <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        ' . $dropdown_sub8 . '
                                    </td>
                                    <td><input type="checkbox" id="p8" name="srb[p8]" '.$pp8.'></td>
                                    <td><input list="reason" name="srb[t8]" id="t8" '.$tt8.'/></label>
                                        <datalist id="reason">
                                          <option value="Teacher is absent">
                                          <option value="Teacher is present but didnt come to class">
                                          <option value="An Assignment given by teacher">
                                        </datalist>
                                    </td>
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                        '.$table08.'
                                    </td>
                                </tr>
                                 <!-- End : Period 08 -->
                        
                              </tbody>
                            </table>';
                                
            	$content.='<br></div>';
            	$content.='<p class="submit">';
            	$content.='<input type="submit" name="addbutton" id="srb-order-button" class="button button-primary" value="Add Entry">';
            	$content.='</p>';
            	$content.='</form>';
            	$content.='</div>';
            	$content.='<h3><a href="'. wp_logout_url( home_url('/student-record-book69/')  ) . '" title="Logout">Logout</a></h3>';
            	return $content;
	       }
        }
    } else {
        
        $content.='<h3>Please Login </h3>';
        $args = array(
            'echo'            => false,
            'redirect'        => ( is_ssl() ? 'https://' : 'http://' ) . 'www.mrcstudent.com/student-record-book69/',
            'remember'        => true,
            'value_remember'  => true,
          );
        
        if ( ! empty( $_REQUEST['redirect_to'] ) ) {
            $args['redirect'] = $_REQUEST['redirect_to'];
        }
        
        $content.= wp_login_form( $args );
        return $content;
    }
    
    }




    function checkInput69() {
	// Bail right away if our hidden form value isn't there
	    if (!isset($_POST['srb_add_class_meta_nonce69']) && !wp_verify_nonce($_POST['srb_add_user_meta_nonce69'], 'srb_add_user_meta_form_nonce69')) { return false; }
        
        // Set variables from post
	    $this->tsid = $_POST['srb']['tsid'];
	    $this->clid = $_POST['srb']['clid'];
	    $this->sdate = strtotime($_POST['srb']['recorddate']);

        $_SESSION['foo69']['clid'] = $this->clid;
        $_SESSION['foo69']['sdate'] = $_POST['srb']['recorddate'];

        $this->subid1 = $_POST['srb']['subid1'];
        
        //if(isset($_POST['srb']['p1'])) {$this->p1 = 1; } else {$this->p1 = 0;};
        $this->p1 = isset($_POST['srb']['p1']) ? 1:0;
        $this->t1 = !empty($_POST['srb']['t1']) ? '"' .$_POST['srb']['t1']. '"' : "NULL";
        //if(!empty($_POST['srb']['t1'])) {$this->t1 = '"' .$_POST['srb']['t1']. '"'; } else {$this->t1 = ;};
        

        
        if($this->subid1 == 29) {
            
            $this->par691 = isset($_POST['srb']['ar69p1']) ? 1:0;
            $this->tar691 = !empty($_POST['srb']['ar69t1']) ? '"' .$_POST['srb']['ar69t1']. '"' : "NULL";
            
            $this->pdc691 = isset($_POST['srb']['dc69p1']) ? 1:0;
            $this->tdc691 = !empty($_POST['srb']['dc69t1']) ? '"' .$_POST['srb']['dc69t1']. '"' : "NULL";
            
            $this->pom691 = isset($_POST['srb']['om69p1']) ? 1:0;
            $this->tom691 = !empty($_POST['srb']['om69t1']) ? '"' .$_POST['srb']['om69t1']. '"' : "NULL";
            
            $this->pwm691 = isset($_POST['srb']['wm69p1']) ? 1:0;
            $this->twm691 = !empty($_POST['srb']['wm69t1']) ? '"' .$_POST['srb']['wm69t1']. '"' : "NULL";
            
            $this->pdr691 = isset($_POST['srb']['dr69p1']) ? 1:0;
            $this->tdr691 = !empty($_POST['srb']['dr69t1']) ? '"' .$_POST['srb']['dr69t1']. '"' : "NULL";


        }
        
       
        
        $this->subid2 = $_POST['srb']['subid2'];
        $this->p2 = isset($_POST['srb']['p2']) ? 1:0;
        $this->t2 = !empty($_POST['srb']['t2']) ? '"' .$_POST['srb']['t2']. '"' : "NULL";
        
        if($this->subid2 == 29) {
            
            $this->par692 = isset($_POST['srb']['ar69p2']) ? 1:0;
            $this->tar692 = !empty($_POST['srb']['ar69t2']) ? '"' .$_POST['srb']['ar69t2']. '"' : "NULL";
            
            $this->pdc692 = isset($_POST['srb']['dc69p2']) ? 1:0;
            $this->tdc692 = !empty($_POST['srb']['dc69t2']) ? '"' .$_POST['srb']['dc69t2']. '"' : "NULL";
            
            $this->pom692 = isset($_POST['srb']['om69p2']) ? 1:0;
            $this->tom692 = !empty($_POST['srb']['om69t2']) ? '"' .$_POST['srb']['om69t2']. '"' : "NULL";
            
            $this->pwm692 = isset($_POST['srb']['wm69p2']) ? 1:0;
            $this->twm692 = !empty($_POST['srb']['wm69t2']) ? '"' .$_POST['srb']['wm69t2']. '"' : "NULL";
            
            $this->pdr692 = isset($_POST['srb']['dr69p2']) ? 1:0;
            $this->tdr692 = !empty($_POST['srb']['dr69t2']) ? '"' .$_POST['srb']['dr69t2']. '"' : "NULL";


        }
        
        
        $this->subid3 = $_POST['srb']['subid3'];
        //$this->p3 = $_POST['srb']['p3'];
        //$this->t3 = $_POST['srb']['t3'];
        $this->p3 = isset($_POST['srb']['p3']) ? 1:0;
        $this->t3 = !empty($_POST['srb']['t3']) ? '"' .$_POST['srb']['t3']. '"' : "NULL";
        
        if($this->subid3 == 29) {
            
            $this->par693 = isset($_POST['srb']['ar69p3']) ? 1:0;
            $this->tar693 = !empty($_POST['srb']['ar69t3']) ? '"' .$_POST['srb']['ar69t3']. '"' : "NULL";
            
            $this->pdc693 = isset($_POST['srb']['dc69p3']) ? 1:0;
            $this->tdc693 = !empty($_POST['srb']['dc69t3']) ? '"' .$_POST['srb']['dc69t3']. '"' : "NULL";
            
            $this->pom693 = isset($_POST['srb']['om69p3']) ? 1:0;
            $this->tom693 = !empty($_POST['srb']['om69t3']) ? '"' .$_POST['srb']['om69t3']. '"' : "NULL";
            
            $this->pwm693 = isset($_POST['srb']['wm69p3']) ? 1:0;
            $this->twm693 = !empty($_POST['srb']['wm69t3']) ? '"' .$_POST['srb']['wm69t3']. '"' : "NULL";
            
            $this->pdr693 = isset($_POST['srb']['dr69p3']) ? 1:0;
            $this->tdr693 = !empty($_POST['srb']['dr69t3']) ? '"' .$_POST['srb']['dr69t3']. '"' : "NULL";


        }
        
        
        $this->subid4 = $_POST['srb']['subid4'];
        //$this->p4 = $_POST['srb']['p4'];
        //$this->t4 = $_POST['srb']['t4'];
        $this->p4 = isset($_POST['srb']['p4']) ? 1:0;
        $this->t4 = !empty($_POST['srb']['t4']) ? '"' .$_POST['srb']['t4']. '"' : "NULL";
        
        if($this->subid4 == 29) {
            
            $this->par694 = isset($_POST['srb']['ar69p4']) ? 1:0;
            $this->tar694 = !empty($_POST['srb']['ar69t4']) ? '"' .$_POST['srb']['ar69t4']. '"' : "NULL";
            
            $this->pdc694 = isset($_POST['srb']['dc69p4']) ? 1:0;
            $this->tdc694 = !empty($_POST['srb']['dc69t4']) ? '"' .$_POST['srb']['dc69t4']. '"' : "NULL";
            
            $this->pom694 = isset($_POST['srb']['om69p4']) ? 1:0;
            $this->tom694 = !empty($_POST['srb']['om69t4']) ? '"' .$_POST['srb']['om69t4']. '"' : "NULL";
            
            $this->pwm694 = isset($_POST['srb']['wm69p4']) ? 1:0;
            $this->twm694 = !empty($_POST['srb']['wm69t4']) ? '"' .$_POST['srb']['wm69t4']. '"' : "NULL";
            
            $this->pdr694 = isset($_POST['srb']['dr69p4']) ? 1:0;
            $this->tdr694 = !empty($_POST['srb']['dr69t4']) ? '"' .$_POST['srb']['dr69t4']. '"' : "NULL";


        }
        
        
        
        $this->subid5 = $_POST['srb']['subid5'];
        //$this->p5 = $_POST['srb']['p5'];
        //$this->t5 = $_POST['srb']['t5'];
        $this->p5 = isset($_POST['srb']['p5']) ? 1:0;
        $this->t5 = !empty($_POST['srb']['t5']) ? '"' .$_POST['srb']['t5']. '"' : "NULL";
        
        if($this->subid5 == 29) {
            
            $this->par695 = isset($_POST['srb']['ar69p5']) ? 1:0;
            $this->tar695 = !empty($_POST['srb']['ar69t5']) ? '"' .$_POST['srb']['ar69t5']. '"' : "NULL";
            
            $this->pdc695 = isset($_POST['srb']['dc69p5']) ? 1:0;
            $this->tdc695 = !empty($_POST['srb']['dc69t5']) ? '"' .$_POST['srb']['dc69t5']. '"' : "NULL";
            
            $this->pom695 = isset($_POST['srb']['om69p5']) ? 1:0;
            $this->tom695 = !empty($_POST['srb']['om69t5']) ? '"' .$_POST['srb']['om69t5']. '"' : "NULL";
            
            $this->pwm695 = isset($_POST['srb']['wm69p5']) ? 1:0;
            $this->twm695 = !empty($_POST['srb']['wm69t5']) ? '"' .$_POST['srb']['wm69t5']. '"' : "NULL";
            
            $this->pdr695 = isset($_POST['srb']['dr69p5']) ? 1:0;
            $this->tdr695 = !empty($_POST['srb']['dr69t5']) ? '"' .$_POST['srb']['dr69t5']. '"' : "NULL";


        }
        
        
        
        $this->subid6 = $_POST['srb']['subid6'];
        //$this->p6 = $_POST['srb']['p6'];
        //$this->t6 = $_POST['srb']['t6'];
        $this->p6 = isset($_POST['srb']['p6']) ? 1:0;
        $this->t6 = !empty($_POST['srb']['t6']) ? '"' .$_POST['srb']['t6']. '"' : "NULL";
        
        if($this->subid6 == 29) {
            
            $this->par696 = isset($_POST['srb']['ar69p6']) ? 1:0;
            $this->tar696 = !empty($_POST['srb']['ar69t6']) ? '"' .$_POST['srb']['ar69t6']. '"' : "NULL";
            
            $this->pdc696 = isset($_POST['srb']['dc69p6']) ? 1:0;
            $this->tdc696 = !empty($_POST['srb']['dc69t6']) ? '"' .$_POST['srb']['dc69t6']. '"' : "NULL";
            
            $this->pom696 = isset($_POST['srb']['om69p6']) ? 1:0;
            $this->tom696 = !empty($_POST['srb']['om69t6']) ? '"' .$_POST['srb']['om69t6']. '"' : "NULL";
            
            $this->pwm696 = isset($_POST['srb']['wm69p6']) ? 1:0;
            $this->twm696 = !empty($_POST['srb']['wm69t6']) ? '"' .$_POST['srb']['wm69t6']. '"' : "NULL";
            
            $this->pdr696 = isset($_POST['srb']['dr69p6']) ? 1:0;
            $this->tdr696 = !empty($_POST['srb']['dr69t6']) ? '"' .$_POST['srb']['dr69t6']. '"' : "NULL";


        }
        
        
        $this->subid7 = $_POST['srb']['subid7'];
        //$this->p7 = $_POST['srb']['p7'];
        //$this->t7 = $_POST['srb']['t7'];
        $this->p7 = isset($_POST['srb']['p7']) ? 1:0;
        $this->t7 = !empty($_POST['srb']['t7']) ? '"' .$_POST['srb']['t7']. '"' : "NULL";
        
        if($this->subid7 == 29) {
            
            $this->par697 = isset($_POST['srb']['ar69p7']) ? 1:0;
            $this->tar697 = !empty($_POST['srb']['ar69t7']) ? '"' .$_POST['srb']['ar69t7']. '"' : "NULL";
            
            $this->pdc697 = isset($_POST['srb']['dc69p7']) ? 1:0;
            $this->tdc697 = !empty($_POST['srb']['dc69t7']) ? '"' .$_POST['srb']['dc69t7']. '"' : "NULL";
            
            $this->pom697 = isset($_POST['srb']['om69p7']) ? 1:0;
            $this->tom697 = !empty($_POST['srb']['om69t7']) ? '"' .$_POST['srb']['om69t7']. '"' : "NULL";
            
            $this->pwm697 = isset($_POST['srb']['wm69p7']) ? 1:0;
            $this->twm697 = !empty($_POST['srb']['wm69t7']) ? '"' .$_POST['srb']['wm69t7']. '"' : "NULL";
            
            $this->pdr697 = isset($_POST['srb']['dr69p7']) ? 1:0;
            $this->tdr697 = !empty($_POST['srb']['dr69t7']) ? '"' .$_POST['srb']['dr69t7']. '"' : "NULL";


        }
        
        
        
        $this->subid8 = $_POST['srb']['subid8'];
        //$this->p8 = $_POST['srb']['p8'];
        //$this->t8 = $_POST['srb']['t8'];
        $this->p8 = isset($_POST['srb']['p8']) ? 1:0;
        $this->t8 = !empty($_POST['srb']['t8']) ? '"' .$_POST['srb']['t8']. '"' : "NULL";
        
        if($this->subid8 == 29) {
            
            $this->par698 = isset($_POST['srb']['ar69p8']) ? 1:0;
            $this->tar698 = !empty($_POST['srb']['ar69t8']) ? '"' .$_POST['srb']['ar69t8']. '"' : "NULL";
            
            $this->pdc698 = isset($_POST['srb']['dc69p8']) ? 1:0;
            $this->tdc698 = !empty($_POST['srb']['dc69t8']) ? '"' .$_POST['srb']['dc69t8']. '"' : "NULL";
            
            $this->pom698 = isset($_POST['srb']['om69p8']) ? 1:0;
            $this->tom698 = !empty($_POST['srb']['om69t8']) ? '"' .$_POST['srb']['om69t8']. '"' : "NULL";
            
            $this->pwm698 = isset($_POST['srb']['wm69p8']) ? 1:0;
            $this->twm698 = !empty($_POST['srb']['wm69t8']) ? '"' .$_POST['srb']['wm69t8']. '"' : "NULL";
            
            $this->pdr698 = isset($_POST['srb']['dr69p8']) ? 1:0;
            $this->tdr698 = !empty($_POST['srb']['dr69t8']) ? '"' .$_POST['srb']['dr69t8']. '"' : "NULL";


        }
        
        
        $this->bs1 = array();

		$this->bs1[0] = $this->subid1 == 29 ? 1:0;
        $this->bs1[1] = $this->subid2 == 29 ? 1:0;
		$this->bs1[2] = $this->subid3 == 29 ? 1:0;
        $this->bs1[3] = $this->subid4 == 29 ? 1:0;
		$this->bs1[4] = $this->subid5 == 29 ? 1:0;
        $this->bs1[5] = $this->subid6 == 29 ? 1:0;
		$this->bs1[6] = $this->subid7 == 29 ? 1:0;
        $this->bs1[7] = $this->subid8 == 29 ? 1:0;
		
        $this->pm69 = ['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8'];
        $this->tm69 = ['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8'];
        
        $this->pb69 = [
                        'par691', 'pdc691', 'pom691', 'pwm691', 'pdr691',
                        'par692', 'pdc692', 'pom692', 'pwm692', 'pdr692',
                        'par693', 'pdc693', 'pom693', 'pwm693', 'pdr693',
                        'par694', 'pdc694', 'pom694', 'pwm694', 'pdr694',
                        'par695', 'pdc695', 'pom695', 'pwm695', 'pdr695',
                        'par696', 'pdc696', 'pom696', 'pwm696', 'pdr696',
                        'par697', 'pdc697', 'pom697', 'pwm697', 'pdr697',
                        'par698', 'pdc698', 'pom698', 'pwm698', 'pdr698'
                     ];

        $this->tb69 = [
                        'tar691', 'tdc691', 'tom691', 'twm691', 'tdr691',
                        'tar692', 'tdc692', 'tom692', 'twm692', 'tdr692',
                        'tar693', 'tdc693', 'tom693', 'twm693', 'tdr693',
                        'tar694', 'tdc694', 'tom694', 'twm694', 'tdr694',
                        'tar695', 'tdc695', 'tom695', 'twm695', 'tdr695',
                        'tar696', 'tdc696', 'tom696', 'twm696', 'tdr696',
                        'tar697', 'tdc697', 'tom697', 'twm697', 'tdr697',
                        'tar698', 'tdc698', 'tom698', 'twm698', 'tdr698'
                     ];
        
        


        
        $this->sub = [
                        'subid1','subid2','subid3','subid4','subid5','subid6','subid7','subid8'
                     ];
        
                     

        foreach($this->sub as $ss) {
            $_SESSION['foo69'][$ss] = $this->{$ss};
        }
        
        foreach($this->pm69 as $p) {
            $_SESSION['foo69'][$p] = !empty($this->{$p})?1:0;
        }
        
        foreach($this->tm69 as $t) {
            $_SESSION['foo69'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
            $this->console_log($_SESSION['foo69'][$t]);
        }
        
        foreach($this->pb69 as $p) {
            $_SESSION['foo69'][$p] = !empty($this->{$p})?1:0;
        }
        
        foreach($this->tb69 as $t) {
            $_SESSION['foo69'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
        }



        foreach($this->sub as $ss) {
            if($this->{$ss} == 0) {
                echo '<script>alert("Please Select All Subject Slots")</script>';
                return false;
            }
        }

        $i=0;
        foreach($this->pm69 as $p) {

            $this->console_log(is_null($this->{$this->tm[$i]}));
            if (!in_array($this->{$this->sub[$i]}, [29])) {
                // Code to execute if $this->{$this->sub[$i]} is not 17, 18, or 19
                if($this->{$p} == 0  &&  (is_null($this->{$this->tm69[$i]}) || $this->{$this->tm69[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots.")</script>';
                    return false;
                }
            }

            $i = $i + 1;
        }
        
        
        $i=0;
        foreach($this->pb69 as $p) {
            if(isset($this->{$p})) {

                if($this->{$p} == 0  &&  (is_null($this->{$this->tb69[$i]}) || $this->{$this->tb69[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots")</script>';
                    return false;
                }
            }
            $i = $i + 1;
        }
        
        $_SESSION['time']=$_POST;
	    $this->notify = $_POST['notify'];
	    // Rest is coming soon!	
	    return true;
    }
    
    
    
    function insertTimeSlot69() {
	    
	    global $wpdb;

        //$wpdb->hide_errors(); 
        
        
        $mb = new stClass();
        
        //$tbid = $mb->getTimeTable($this->clid);
        $tableName = $wpdb->prefix . "srb_timeslot";
      
        if($this->bs1[0] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'1',$this->par691, $this->tar691 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'1',$this->pdc691, $this->tdc691, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'1',$this->pom691, $this->tom691, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'1',$this->pwm691, $this->twm691, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'1',$this->pdr691, $this->tdr691, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid1 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid1,'1',$this->p1, $this->t1, FROM_UNIXTIME($this->sdate))")); 
                
                if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[1] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'2',$this->par692, $this->tar692 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'2',$this->pdc692, $this->tdc692, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'2',$this->pom692, $this->tom692, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'2',$this->pwm692, $this->twm692, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'2',$this->pdr692, $this->tdr692, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid2 != 0) { 
               $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid2,'2',$this->p2, $this->t2, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
		
		
		if($this->bs1[2] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'3',$this->par693, $this->tar693 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'3',$this->pdc693, $this->tdc693, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'3',$this->pom693, $this->tom693, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'3',$this->pwm693, $this->twm693, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 11 ,'3',$this->pdr693, $this->tdr693, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid3 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid3,'3',$this->p3, $this->t3, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
        
        if($this->bs1[3] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'4',$this->par694, $this->tar694 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'4',$this->pdc694, $this->tdc694, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'4',$this->pom694, $this->tom694, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'4',$this->pwm694, $this->twm694, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'4',$this->pdr694, $this->tdr694, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid4 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid4,'4',$this->p4, $this->t4, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[4] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'5',$this->par695, $this->tar695 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'5',$this->pdc695, $this->tdc695, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'5',$this->pom695, $this->tom695, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'5',$this->pwm695, $this->twm695, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'5',$this->pdr695, $this->tdr695, FROM_UNIXTIME($this->sdate))"));
			       
			       if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else {
            if($this->subid5 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid5,'5',$this->p5, $this->t5, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[5] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'6',$this->par696, $this->tar696 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'6',$this->pdc696, $this->tdc696, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'6',$this->pom696, $this->tom696, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'6',$this->pwm696, $this->twm696, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'6',$this->pdr696, $this->tdr696, FROM_UNIXTIME($this->sdate))"));
			   
			   if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        
        } else {
            if($this->subid5 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid6,'6',$this->p6, $this->t6, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[6] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'7',$this->par697, $this->tar697 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'7',$this->pdc697, $this->tdc697, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'7',$this->pom697, $this->tom697, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'7',$this->pwm697, $this->twm697, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'7',$this->pdr697, $this->tdr697, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid7 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid7,'7',$this->p7, $this->t7, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        if($this->bs1[7] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 15 ,'8',$this->par698, $this->tar698 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 14 ,'8',$this->pdc698, $this->tdc698, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 12 ,'8',$this->pom698, $this->tom698, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 13 ,'8',$this->pwm698, $this->twm698, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 21 ,'8',$this->pdr698, $this->tdr698, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
			        
        } else {
            if($this->subid8 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES ( $this->clid, $this->subid8,'8',$this->p8, $this->t8, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
	
		return true;
    }
    
    
    public function srb_generate_time_record_methodAL($attr) {
        
        $this->enqueue_styles();
        $this->enqueue_scripts();
        
        $srb_add_meta_nonce = wp_create_nonce('srb_add_time_table_record_nonce');

        
        $mb = new stClass();
        $results = $mb->getAllAL();
        
        

        
        if ( is_user_logged_in() ) {
            
            $user = wp_get_current_user();
            if ( in_array( 'student', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
                //The user has the "author" role
            
            //drop down for class
        
            
            //drop down for subject

                
            $content='';
            
            if ($this->checkInputAL()) {
	
		        $success = $this->insertTimeSlotAL();
                
                do_action('end_session_action');
		        $cachedFieldsal = [];
		        unset($cachedFieldsal);
		        $period_01_table = '';
		        $period_02_table = '';
		        $period_03_table = '';
		        $period_04_table = '';
		        $period_05_table = '';
		        $period_06_table = '';
		        $period_07_table = '';
		        $period_08_table = '';

        	    if ($success) {
        			$content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Successfully send Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					<a href="https://www.mrcstudent.com/student-record-bookal" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;	
        	    } else {
        	        $content .= '
        				<div class="srb_add_user_meta_form">
        					<h3>Error Occured while sending Time Table!</h3>
        					<p>Thank you very much for your interest, and wishing you many exciting adventures ahead!</p>
        					<br />
        					
        					<h3>'. $wpdb->last_query . ' </h3>
        					<h3>'. $wpdb->last_error . ' </h3>
        					<a href="https://www.mrcstudent.com/student-record-bookal" >Go Back to Time Table Page</a>
        				</div>';
        				return $content;
        	    }
        	    
	        } else {

                $cachedFieldsal = isset($_SESSION['fooal']) ? $_SESSION['fooal'] : [];
                $this->console_log($cachedFieldsal);
                $this->console_log($_SESSION['fooal']);
                do_action('end_session_action');
                $cl_id = $cachedFieldsal['clid'];
                $sub = [
                    $cachedFieldsal['subid1'],
                    $cachedFieldsal['subid2'],
                    $cachedFieldsal['subid3'],
                    $cachedFieldsal['subid4'],
                    $cachedFieldsal['subid5'],
                    $cachedFieldsal['subid6'],
                    $cachedFieldsal['subid7'],
                    $cachedFieldsal['subid8']
                    ];
                    $this->console_log($sub);
                    $table = [
                        'period_01_table',
                        'period_02_table',
                        'period_03_table',
                        'period_04_table',
                        'period_05_table',
                        'period_06_table',
                        'period_07_table',
                        'period_08_table'
                        ];

                    
                $time = [
                        '7.50 - 8.30',
                        '8.30 - 9.10',
                        '9.10 - 9.50',
                        '9.50 - 10.30',
                        '10.50 - 11.30',
                        '11.30 - 12.10',
                        '12.10 - 12.50',
                        '12.50 - 1.30'
                    ];
                    
                    $dropdown = [
                    'dropdown_subject_html1',
                    'dropdown_subject_html2',
                    'dropdown_subject_html3',
                    'dropdown_subject_html4',
                    'dropdown_subject_html5',
                    'dropdown_subject_html6',
                    'dropdown_subject_html7',
                    'dropdown_subject_html8'
                    ];
                
                
                $this->pbal = ['pchAL1', 'pictAL1', 'pphAL1', 'pagriAL1', 'pmediaAL1', 'pGeogAL1', 'pmathAL1', 'partAL1', 'pjapAL1', 'pfrenchAL1', 'pkoreanAL1', 'phindiAL1', 'pdramaAL1', 'peconAL1', 'ppoliticAL1', 'pbusistatAL1','pbusistudAL1','pomusicAL1','pheconAL1', 'psinAL1', 'pengAL1', 'plogicAL1', 'phistAL1', 'pdanceAL1', 'pchAL2', 'pictAL2', 'pphAL2', 'pagriAL2', 'pmediaAL2', 'pGeogAL2', 'pmathAL2', 'partAL2', 'pjapAL2', 'pfrenchAL2', 'pkoreanAL2', 'phindiAL2', 'pdramaAL2', 'peconAL2', 'ppoliticAL2', 'pbusistatAL2','pbusistudAL2','pomusicAL2','pheconAL2', 'psinAL2', 'pengAL2', 'plogicAL2', 'phistAL2', 'pdanceAL2', 'pchAL3', 'pictAL3', 'pphAL3', 'pagriAL3', 'pmediaAL3', 'pGeogAL3', 'pmathAL3', 'partAL3', 'pjapAL3', 'pfrenchAL3', 'pkoreanAL3', 'phindiAL3', 'pdramaAL3', 'peconAL3', 'ppoliticAL3', 'pbusistatAL3','pbusistudAL3','pomusicAL3','pheconAL3', 'psinAL3', 'pengAL3', 'plogicAL3', 'phistAL3', 'pdanceAL3', 'pchAL4', 'pictAL4', 'pphAL4', 'pagriAL4', 'pmediaAL4', 'pGeogAL4', 'pmathAL4', 'partAL4', 'pjapAL4', 'pfrenchAL4', 'pkoreanAL4', 'phindiAL4', 'pdramaAL4', 'peconAL4', 'ppoliticAL4', 'pbusistatAL4','pbusistudAL4','pomusicAL4','pheconAL4', 'psinAL4', 'pengAL4', 'plogicAL4', 'phistAL4', 'pdanceAL4', 'pchAL5', 'pictAL5', 'pphAL5', 'pagriAL5', 'pmediaAL5', 'pGeogAL5', 'pmathAL5', 'partAL5', 'pjapAL5', 'pfrenchAL5', 'pkoreanAL5', 'phindiAL5', 'pdramaAL5', 'peconAL5', 'ppoliticAL5', 'pbusistatAL5','pbusistudAL5','pomusicAL5','pheconAL5', 'psinAL5', 'pengAL5', 'plogicAL5', 'phistAL5', 'pdanceAL5', 'pchAL6', 'pictAL6', 'pphAL6', 'pagriAL6', 'pmediaAL6', 'pGeogAL6', 'pmathAL6', 'partAL6', 'pjapAL6', 'pfrenchAL6', 'pkoreanAL6', 'phindiAL6', 'pdramaAL6', 'peconAL6', 'ppoliticAL6', 'pbusistatAL6','pbusistudAL6','pomusicAL6','pheconAL6', 'psinAL6', 'pengAL6', 'plogicAL6', 'phistAL6', 'pdanceAL6', 'pchAL7', 'pictAL7', 'pphAL7', 'pagriAL7', 'pmediaAL7', 'pGeogAL7', 'pmathAL7', 'partAL7', 'pjapAL7', 'pfrenchAL7', 'pkoreanAL7', 'phindiAL7', 'pdramaAL7', 'peconAL7', 'ppoliticAL7', 'pbusistatAL7','pbusistudAL7','pomusicAL7','pheconAL7', 'psinAL7', 'pengAL7', 'plogicAL7', 'phistAL7', 'pdanceAL7', 'pchAL8', 'pictAL8', 'pphAL8', 'pagriAL8', 'pmediaAL8', 'pGeogAL8', 'pmathAL8', 'partAL8', 'pjapAL8', 'pfrenchAL8', 'pkoreanAL8', 'phindiAL8', 'pdramaAL8', 'peconAL8', 'ppoliticAL8', 'pbusistatAL8','pbusistudAL8','pomusicAL8','pheconAL8', 'psinAL8', 'pengAL8', 'plogicAL8', 'phistAL8', 'pdanceAL8'];
                $this->tbal = ['tchAL1', 'tictAL1', 'tphAL1', 'tagriAL1', 'tmediaAL1', 'tGeogAL1', 'tmathAL1', 'tartAL1', 'tjapAL1', 'tfrenchAL1', 'tkoreanAL1', 'thindiAL1', 'tdramaAL1', 'teconAL1', 'tpoliticAL1', 'tbusistatAL1','tbusistudAL1','tomusicAL1','theconAL1', 'tsinAL1', 'tengAL1', 'tlogicAL1', 'thistAL1', 'tdanceAL1', 'tchAL2', 'tictAL2', 'tphAL2', 'tagriAL2', 'tmediaAL2', 'tGeogAL2', 'tmathAL2', 'tartAL2', 'tjapAL2', 'tfrenchAL2', 'tkoreanAL2', 'thindiAL2', 'tdramaAL2', 'teconAL2', 'tpoliticAL2', 'tbusistatAL2','tbusistudAL2','tomusicAL2','theconAL2', 'tsinAL2', 'tengAL2', 'tlogicAL2', 'thistAL2', 'tdanceAL2', 'tchAL3', 'tictAL3', 'tphAL3', 'tagriAL3', 'tmediaAL3', 'tGeogAL3', 'tmathAL3', 'tartAL3', 'tjapAL3', 'tfrenchAL3', 'tkoreanAL3', 'thindiAL3', 'tdramaAL3', 'teconAL3', 'tpoliticAL3', 'tbusistatAL3','tbusistudAL3','tomusicAL3','theconAL3', 'tsinAL3', 'tengAL3', 'tlogicAL3', 'thistAL3', 'tdanceAL3', 'tchAL4', 'tictAL4', 'tphAL4', 'tagriAL4', 'tmediaAL4', 'tGeogAL4', 'tmathAL4', 'tartAL4', 'tjapAL4', 'tfrenchAL4', 'tkoreanAL4', 'thindiAL4', 'tdramaAL4', 'teconAL4', 'tpoliticAL4', 'tbusistatAL4','tbusistudAL4','tomusicAL4','theconAL4', 'tsinAL4', 'tengAL4', 'tlogicAL4', 'thistAL4', 'tdanceAL4', 'tchAL5', 'tictAL5', 'tphAL5', 'tagriAL5', 'tmediaAL5', 'tGeogAL5', 'tmathAL5', 'tartAL5', 'tjapAL5', 'tfrenchAL5', 'tkoreanAL5', 'thindiAL5', 'tdramaAL5', 'teconAL5', 'tpoliticAL5', 'tbusistatAL5','tbusistudAL5','tomusicAL5','theconAL5', 'tsinAL5', 'tengAL5', 'tlogicAL5', 'thistAL5', 'tdanceAL5', 'tchAL6', 'tictAL6', 'tphAL6', 'tagriAL6', 'tmediaAL6', 'tGeogAL6', 'tmathAL6', 'tartAL6', 'tjapAL6', 'tfrenchAL6', 'tkoreanAL6', 'thindiAL6', 'tdramaAL6', 'teconAL6', 'tpoliticAL6', 'tbusistatAL6','tbusistudAL6','tomusicAL6','theconAL6', 'tsinAL6', 'tengAL6', 'tlogicAL6', 'thistAL6', 'tdanceAL6', 'tchAL7', 'tictAL7', 'tphAL7', 'tagriAL7', 'tmediaAL7', 'tGeogAL7', 'tmathAL7', 'tartAL7', 'tjapAL7', 'tfrenchAL7', 'tkoreanAL7', 'thindiAL7', 'tdramaAL7', 'teconAL7', 'tpoliticAL7', 'tbusistatAL7','tbusistudAL7','tomusicAL7','theconAL7', 'tsinAL7', 'tengAL7', 'tlogicAL7', 'thistAL7', 'tdanceAL7', 'tchAL8', 'tictAL8', 'tphAL8', 'tagriAL8', 'tmediaAL8', 'tGeogAL8', 'tmathAL8', 'tartAL8', 'tjapAL8', 'tfrenchAL8', 'tkoreanAL8', 'thindiAL8', 'tdramaAL8', 'teconAL8', 'tpoliticAL8', 'tbusistatAL8','tbusistudAL8','tomusicAL8','theconAL8', 'tsinAL8', 'tengAL8', 'tlogicAL8', 'thistAL8', 'tdanceAL8'];
 
                //bascket check boxes
                $pchAL = ['pchAL1', 'pchAL2', 'pchAL3', 'pchAL4', 'pchAL5', 'pchAL6', 'pchAL7', 'pchAL8'];
                $pictAL = ['pictAL1', 'pictAL2', 'pictAL3', 'pictAL4', 'pictAL5', 'pictAL6', 'pictAL7', 'pictAL8'];
                $pphAL  = ['pphAL1', 'pphAL2', 'pphAL3', 'pphAL4', 'pphAL5', 'pphAL6', 'pphAL7', 'pphAL8'];
                $pagriAL  = ['pagriAL1', 'pagriAL2', 'pagriAL3', 'pagriAL4', 'pagriAL5', 'pagriAL6', 'pagriAL7', 'pagriAL8'];
                $pmediaAL = ['pmediaAL1','pmediaAL2', 'pmediaAL3', 'pmediaAL4', 'pmediaAL5', 'pmediaAL6', 'pmediaAL7', 'pmediaAL8'];
                $pGeogAL  = ['pGeogAL1', 'pGeogAL2', 'pGeogAL3', 'pGeogAL4', 'pGeogAL5', 'pGeogAL6', 'pGeogAL7', 'pGeogAL8'];
                $pmathAL  = ['pmathAL1', 'pmathAL2', 'pmathAL3', 'pmathAL4', 'pmathAL5', 'pmathAL6', 'pmathAL7', 'pmathAL8'];
                $partAL  = ['partAL1', 'partAL2', 'partAL3', 'partAL4', 'partAL5', 'partAL6', 'partAL7', 'partAL8'];
                $pjapAL  = ['pjapAL1', 'pjapAL2', 'pjapAL3', 'pjapAL4', 'pjapAL5', 'pjapAL6', 'pjapAL7', 'pjapAL8'];
                $pfrenchAL  = ['pfrenchAL1', 'pfrenchAL2', 'pfrenchAL3', 'pfrenchAL4', 'pfrenchAL5', 'pfrenchAL6', 'pfrenchAL7', 'pfrenchAL8'];
                $pkoreanAL = ['pkoreanAL1', 'pkoreanAL2', 'pkoreanAL3', 'pkoreanAL4', 'pkoreanAL5', 'pkoreanAL6', 'pkoreanAL7', 'pkoreanAL8'];
                $phindiAL  = ['phindiAL1', 'phindiAL2', 'phindiAL3', 'phindiAL4', 'phindiAL5', 'phindiAL6', 'phindiAL7', 'phindiAL8'];
                $pdramaAL  = ['pdramaAL1', 'pdramaAL2', 'pdramaAL3', 'pdramaAL4','pdramaAL5', 'pdramaAL6', 'pdramaAL7', 'pdramaAL8'];
                $peconAL = ['peconAL1', 'peconAL2', 'peconAL3', 'peconAL4', 'peconAL5', 'peconAL6', 'peconAL7', 'peconAL8'];
                $ppoliticAL = ['ppoliticAL1', 'ppoliticAL2', 'ppoliticAL3', 'ppoliticAL4', 'ppoliticAL5', 'ppoliticAL6', 'ppoliticAL7', 'ppoliticAL8'];
                $pbusistatAL = ['pbusistatAL1', 'pbusistatAL2', 'pbusistatAL3', 'pbusistatAL4', 'pbusistatAL5', 'pbusistatAL6', 'pbusistatAL7', 'pbusistatAL8'];
                $pbusistudAL = ['pbusistudAL1', 'pbusistudAL2', 'pbusistudAL3', 'pbusistudAL4', 'pbusistudAL5', 'pbusistudAL6', 'pbusistudAL7', 'pbusistudAL8'];
                $pomusicAL = ['pomusicAL1', 'pomusicAL2', 'pomusicAL3', 'pomusicAL4', 'pomusicAL5', 'pomusicAL6', 'pomusicAL7', 'pomusicAL8'];
                $pheconAL = ['pheconAL1', 'pheconAL2', 'pheconAL3', 'pheconAL4', 'pheconAL5', 'pheconAL6', 'pheconAL7', 'pheconAL8'];
                $psinAL = ['psinAL1', 'psinAL2', 'psinAL3', 'psinAL4', 'psinAL5', 'psinAL6', 'psinAL7', 'psinAL8'];
                $pengAL = ['pengAL1', 'pengAL2', 'pengAL3', 'pengAL4', 'pengAL5', 'pengAL6', 'pengAL7', 'pengAL8'];
                $plogicAL = ['plogicAL1', 'plogicAL2', 'plogicAL3', 'plogicAL4', 'plogicAL5', 'plogicAL6', 'plogicAL7', 'plogicAL8'];
                $phistAL = ['phistAL1', 'phistAL2', 'phistAL3', 'phistAL4', 'phistAL5', 'phistAL6', 'phistAL7', 'phistAL8'];
                $pdanceAL = ['pdanceAL1', 'pdanceAL2', 'pdanceAL3', 'pdanceAL4', 'pdanceAL5', 'pdanceAL6', 'pdanceAL7', 'pdanceAL8'];
                
                //basket textbox
                $tchAL = ['tchAL1', 'tchAL2', 'tchAL3', 'tchAL4', 'tchAL5', 'tchAL6', 'tchAL7', 'tchAL8'];
                $tictAL = ['tictAL1', 'tictAL2', 'tictAL3', 'tictAL4', 'tictAL5', 'tictAL6', 'tictAL7', 'tictAL8'];
                $tphAL  = ['tphAL1', 'tphAL2', 'tphAL3', 'tphAL4', 'tphAL5', 'tphAL6', 'tphAL7', 'tphAL8'];
                $tagriAL  = ['tagriAL1', 'tagriAL2', 'tagriAL3', 'tagriAL4', 'tagriAL5', 'tagriAL6', 'tagriAL7', 'tagriAL8'];
                $tmediaAL = ['tmediaAL1','tmediaAL2', 'tmediaAL3', 'tmediaAL4', 'tmediaAL5', 'tmediaAL6', 'tmediaAL7', 'tmediaAL8'];
                $tGeogAL  = ['tGeogAL1', 'tGeogAL2', 'tGeogAL3', 'tGeogAL4', 'tGeogAL5', 'tGeogAL6', 'tGeogAL7', 'tGeogAL8'];
                $tmathAL  = ['tmathAL1', 'tmathAL2', 'tmathAL3', 'tmathAL4', 'tmathAL5', 'tmathAL6', 'tmathAL7', 'tmathAL8'];
                $tartAL  = ['tartAL1', 'tartAL2', 'tartAL3', 'tartAL4', 'tartAL5', 'tartAL6', 'tartAL7', 'tartAL8'];
                $tjapAL  = ['tjapAL1', 'tjapAL2', 'tjapAL3', 'tjapAL4', 'tjapAL5', 'tjapAL6', 'tjapAL7', 'tjapAL8'];
                $tfrenchAL  = ['tfrenchAL1', 'tfrenchAL2', 'tfrenchAL3', 'tfrenchAL4', 'tfrenchAL5', 'tfrenchAL6', 'tfrenchAL7', 'tfrenchAL8'];
                $tkoreanAL = ['tkoreanAL1', 'tkoreanAL2', 'tkoreanAL3', 'tkoreanAL4', 'tkoreanAL5', 'tkoreanAL6', 'tkoreanAL7', 'tkoreanAL8'];
                $thindiAL  = ['thindiAL1', 'thindiAL2', 'thindiAL3', 'thindiAL4', 'thindiAL5', 'thindiAL6', 'thindiAL7', 'thindiAL8'];
                $tdramaAL  = ['tdramaAL1', 'tdramaAL2', 'tdramaAL3', 'tdramaAL4','tdramaAL5', 'tdramaAL6', 'tdramaAL7', 'tdramaAL8'];
                $teconAL = ['teconAL1', 'teconAL2', 'teconAL3', 'teconAL4', 'teconAL5', 'teconAL6', 'teconAL7', 'teconAL8'];
                $tpoliticAL = ['tpoliticAL1', 'tpoliticAL2', 'tpoliticAL3', 'tpoliticAL4', 'tpoliticAL5', 'tpoliticAL6', 'tpoliticAL7', 'tpoliticAL8'];
                $tbusistatAL = ['tbusistatAL1', 'tbusistatAL2', 'tbusistatAL3', 'tbusistatAL4', 'tbusistatAL5', 'tbusistatAL6', 'tbusistatAL7', 'tbusistatAL8'];
                $tbusistudAL = ['tbusistudAL1', 'tbusistudAL2', 'tbusistudAL3', 'tbusistudAL4', 'tbusistudAL5', 'tbusistudAL6', 'tbusistudAL7', 'tbusistudAL8'];
                $tomusicAL = ['tomusicAL1', 'tomusicAL2', 'tomusicAL3', 'tomusicAL4', 'tomusicAL5', 'tomusicAL6', 'tomusicAL7', 'tomusicAL8'];
                $theconAL = ['theconAL1', 'theconAL2', 'theconAL3', 'theconAL4', 'theconAL5', 'theconAL6', 'theconAL7', 'theconAL8'];
                $tsinAL = ['tsinAL1', 'tsinAL2', 'tsinAL3', 'tsinAL4', 'tsinAL5', 'tsinAL6', 'tsinAL7', 'tsinAL8'];
                $tengAL = ['tengAL1', 'tengAL2', 'tengAL3', 'tengAL4', 'tengAL5', 'tengAL6', 'tengAL7', 'tengAL8'];
                $tlogicAL = ['tlogicAL1', 'tlogicAL2', 'tlogicAL3', 'tlogicAL4', 'tlogicAL5', 'tlogicAL6', 'tlogicAL7', 'tlogicAL8'];
                $thistAL = ['thistAL1', 'thistAL2', 'thistAL3', 'thistAL4', 'thistAL5', 'thistAL6', 'thistAL7', 'thistAL8'];
                $tdanceAL = ['tdanceAL1', 'tdanceAL2', 'tdanceAL3', 'tdanceAL4', 'tdanceAL5', 'tdanceAL6', 'tdanceAL7', 'tdanceAL8'];
                
                
                
                foreach($pbal as $p) {
                    ${$p} = in_array($p, $cachedFieldsal)&&$cachedFieldsal[$p]==1?'checked':'';
                }
                
                foreach($tbal as $t) {
                    ${$t} = !is_null($cachedFieldsal[$t])&&$cachedFieldsal[$t]!='NULL'?$cachedFieldsal[$t]:'';
                }
                

                
                //check box sessions 
                $pp1 = in_array('p1', $cachedFieldsal)&&$cachedFieldsal['p1']==1?'checked':'';
                $pp2 = in_array('p2', $cachedFieldsal)&&$cachedFieldsal['p2']==1?'checked':'';
                $pp3 = in_array('p3', $cachedFieldsal)&&$cachedFieldsal['p3']==1?'checked':'';
                $pp4 = in_array('p4', $cachedFieldsal)&&$cachedFieldsal['p4']==1?'checked':'';
                $pp5 = in_array('p5', $cachedFieldsal)&&$cachedFieldsal['p5']==1?'checked':'';
                $pp6 = in_array('p6', $cachedFieldsal)&&$cachedFieldsal['p6']==1?'checked':'';
                $pp7 = in_array('p7', $cachedFieldsal)&&$cachedFieldsal['p7']==1?'checked':'';
                $pp8 = in_array('p8', $cachedFieldsal)&&$cachedFieldsal['p8']==1?'checked':'';
                
                //textbox sessions
                $tt1 = !empty($cachedFieldsal['t1'])&&$cachedFieldsal['t1']!='NULL' ?$cachedFieldsal['t1']:'';
                $tt2 = !empty($cachedFieldsal['t2'])&&$cachedFieldsal['t2']!='NULL'?$cachedFieldsal['t2']:'';
                $tt3 = !empty($cachedFieldsal['t3'])&&$cachedFieldsal['t3']!='NULL'?$cachedFieldsal['t3']:'';
                $tt4 = !empty($cachedFieldsal['t4'])&&$cachedFieldsal['t4']!='NULL'?$cachedFieldsal['t4']:'';
                $tt5 = !empty($cachedFieldsal['t5'])&&$cachedFieldsal['t5']!='NULL'?$cachedFieldsal['t5']:'';
                $tt6 = !empty($cachedFieldsal['t6'])&&$cachedFieldsal['t6']!='NULL'?$cachedFieldsal['t6']:'';
                $tt7 = !empty($cachedFieldsal['t7'])&&$cachedFieldsal['t7']!='NULL'?$cachedFieldsal['t7']:'';
                $tt8 = !empty($cachedFieldsal['t8'])&&$cachedFieldsal['t8']!='NULL'?$cachedFieldsal['t8']:'';
                
                $i=0;
                //tables sessions
                if(isset($_SESSION['fooal'])) {
                    foreach( $sub as $s ) {
                        $j = $i+1;
                        if($s == 88) {
                            ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Chemistry </td><td><input type="checkbox" id="chALp'.$j.'" name="srb[chALp'.$j.']" value="chALp'.$j.'" '.${$pchAL[$i]}.'></td><td><input list="reason" name="srb[chALt'.$j.']"  id="chALt'.$j.'" value="'.${$tchAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                        </table>';
                        }

                        if($s == 89) {
                            ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Physics </td><td><input type="checkbox" id="phALp'.$j.'" name="srb[phALp'.$j.']" value="phALp'.$j.'" '.${$pphAL[$i]}.'></td><td><input list="reason" name="srb[phALt'.$j.']"  id="phALt'.$j.'" value="'.${$tphAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Agricultural Science </td><td><input type="checkbox" id="agriALp'.$j.'" name="srb[agriALp'.$j.']" value="agriALp'.$j.'" '.${$pagriAL[$i]}.'></td><td><input list="reason" name="srb[agriALt'.$j.']"  id="agriALt'.$j.'" value="'.${$tagriAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                        </table>';
                        }

                        if($s == 90) {
                            if($cl_id==116 || $cl_id==117) {
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                                <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                </table>';
                            } else {
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                                <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Geography </td><td><input type="checkbox" id="GeogALp'.$j.'" name="srb[GeogALp'.$j.']" value="GeogALp'.$j.'" '.${$pGeogAL[$i]}.'></td><td><input list="reason" name="srb[GeogALt'.$j.']"  id="pGeogALt'.$j.'" value="'.${$tGeoAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Mathematics </td><td><input type="checkbox" id="mathALp'.$j.'" name="srb[mathALp'.$j.']" value="mathALp'.$j.'" '.${$pmathAL[$i]}.'></td><td><input list="reason" name="srb[mathALt'.$j.']"  id="mathALt'.$j.'" value="'.${$tmathAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ART </td><td><input type="checkbox" id="artALp'.$j.'" name="srb[artALp'.$j.']" value="artALp'.$j.'" '.${$partAL[$i]}.'></td><td><input list="reason" name="srb[artALt'.$j.']"  id="artALt'.$j.'" value="'.${$tartAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                </table>';
                            }
                           
                        }

                        if($s == 91) {
                            ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Geography </td><td><input type="checkbox" id="GeogALp'.$j.'" name="srb[GeogALp'.$j.']" value="GeogALp'.$j.'" '.${$pGeogAL[$i]}.'></td><td><input list="reason" name="srb[GeogALt'.$j.']"  id="GeogALt'.$j.'" value="'.${$tGeoAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Agricultural Science </td><td><input type="checkbox" id="agriALp'.$j.'" name="srb[agriALp'.$j.']" value="agriALp'.$j.'" '.${$pagriAL[$i]}.'></td><td><input list="reason" name="srb[agriALt'.$j.']"  id="agriALt'.$j.'" value="'.${$tagriAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                          </table>';
                        }
                        
                        if($s == 92) {
                            if($cl_id==103) {
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> ECONOMICS </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Political Science </td><td><input type="checkbox" id="politicALp'.$j.'" name="srb[politicALp'.$j.']" value="politicALp'.$j.'" '.${$ppoliticAL[$i]}.'></td><td><input list="reason" name="srb[politicALt'.$j.']"  id="politicALt'.$j.'" value="'.${$tpoliticAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>            
                                            <tr><td>'.$time[$i].'</td><td> Business Statistics </td><td><input type="checkbox" id="busistatALp'.$j.'" name="srb[busistatALp'.$j.']" value="busistatALp'.$j.'" '.${$pbusistatAL[$i]}.'></td><td><input list="reason" name="srb[busistatALt'.$j.']"  id="busistatALt'.$j.'" value="'.${$tbusistatAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                          </table>';
                            } else if($cl_id==104) { 
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Hindi </td><td><input type="checkbox" id="hindiALp'.$j.'" name="srb[hindiALp'.$j.']" value="hindiALp'.$j.'" '.${$phindiAL[$i]}.'></td><td><input list="reason" name="srb[hindiALt'.$j.']"  id="hindiALt'.$j.'" value="'.${$thindiAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ART </td><td><input type="checkbox" id="artALp'.$j.'" name="srb[artALp'.$j.']" value="artALp'.$j.'" '.${$partAL[$i]}.'></td><td><input list="reason" name="srb[artALt'.$j.']"  id="artALt'.$j.'" value="'.${$tartAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Drama & Theatre </td><td><input type="checkbox" id="dramaALp'.$j.'" name="srb[dramaALp'.$j.']" value="dramaALp'.$j.'" '.${$pdramaAL[$i]}.'></td><td><input list="reason" name="srb[dramaALt'.$j.']"  id="pdramaALt'.$j.'" value="'.${$tdramaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ECONOMICS </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                          </table>';
                            }else {

                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                                <tr><td>'.$time[$i].'</td><td> Japanese </td><td><input type="checkbox" id="japALp'.$j.'" name="srb[japALp'.$j.']" value="japALp'.$j.'" '.${$pjapAL[$i]}.'></td><td><input list="reason" name="srb[japALt'.$j.']"  id="japALt'.$j.'" value="'.${$tjapAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> French </td><td><input type="checkbox" id="frenchALp'.$j.'" name="srb[frenchALp'.$j.']" value="frenchALp'.$j.'" '.${$pfrenchAL[$i]}.'></td><td><input list="reason" name="srb[frenchALt'.$j.']"  id="frenchALt'.$j.'" value="'.${$tfrenchAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Korean </td><td><input type="checkbox" id="koreanALp'.$j.'" name="srb[koreanALp'.$j.']" value="koreanALp'.$j.'" '.${$pkoreanAL[$i]}.'></td><td><input list="reason" name="srb[koreanALt'.$j.']"  id="koreanALt'.$j.'" value="'.${$tkoreanAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Hindi </td><td><input type="checkbox" id="hindiALp'.$j.'" name="srb[hindiALp'.$j.']" value="hindiALp'.$j.'" '.${$phindiAL[$i]}.'></td><td><input list="reason" name="srb[hindiALt'.$j.']"  id="hindiALt'.$j.'" value="'.${$thindiAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ART </td><td><input type="checkbox" id="artALp'.$j.'" name="srb[artALp'.$j.']" value="artALp'.$j.'" '.${$partAL[$i]}.'></td><td><input list="reason" name="srb[artALt'.$j.']"  id="artALt'.$j.'" value="'.${$tartAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Drama & Theatre </td><td><input type="checkbox" id="dramaALp'.$j.'" name="srb[dramaALp'.$j.']" value="dramaALp'.$j.'" '.${$pdramaAL[$i]}.'></td><td><input list="reason" name="srb[dramaALt'.$j.']"  id="pdramaALt'.$j.'" value="'.${$tdramaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ECONOMICS </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Political Science </td><td><input type="checkbox" id="politicALp'.$j.'" name="srb[politicALp'.$j.']" value="politicALp'.$j.'" '.${$ppoliticAL[$i]}.'></td><td><input list="reason" name="srb[politicALt'.$j.']"  id="politicALt'.$j.'" value="'.${$tpoliticAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>            
                                                <tr><td>'.$time[$i].'</td><td> Business Statistics </td><td><input type="checkbox" id="busistatALp'.$j.'" name="srb[busistatALp'.$j.']" value="busistatALp'.$j.'" '.${$pbusistatAL[$i]}.'></td><td><input list="reason" name="srb[busistatALt'.$j.']"  id="busistatALt'.$j.'" value="'.${$tbusistatAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            </table>';
                            }
                        }

                        if($s == 93) {
                            if($cl_id==103) { 
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                                <tr><td>'.$time[$i].'</td><td> Sinhala </td><td><input type="checkbox" id="sinALp'.$j.'" name="srb[sinALp'.$j.']" value="sinALp'.$j.'" '.${$psinAL[$i]}.'></td><td><input list="reason" name="srb[sinALt'.$j.']"  id="sinALt'.$j.'" value="'.${$tsinAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Geography </td><td><input type="checkbox" id="GeogALp'.$j.'" name="srb[GeogALp'.$j.']" value="GeogALp'.$j.'" '.${$pGeogAL[$i]}.'></td><td><input list="reason" name="srb[GeogALt'.$j.']"  id="GeogALt'.$j.'" value="'.${$tGeogAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Agricultural Science </td><td><input type="checkbox" id="agriALp'.$j.'" name="srb[agriALp'.$j.']" value="agriALp'.$j.'" '.${$pagriAL[$i]}.'></td><td><input list="reason" name="srb[agriALt'.$j.']"  id="agriALt'.$j.'" value="'.${$tagriAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            </table>';
                            } else if($cl_id==104) { 
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Sinhala </td><td><input type="checkbox" id="sinALp'.$j.'" name="srb[sinALp'.$j.']" value="sinALp'.$j.'" '.${$psinAL[$i]}.'></td><td><input list="reason" name="srb[sinALt'.$j.']"  id="sinALt'.$j.'" value="'.${$tsinAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Geography </td><td><input type="checkbox" id="GeogALp'.$j.'" name="srb[GeogALp'.$j.']" value="GeogALp'.$j.'" '.${$pGeogAL[$i]}.'></td><td><input list="reason" name="srb[GeogALt'.$j.']"  id="GeogALt'.$j.'" value="'.${$tGeogAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Music (Oriental) </td><td><input type="checkbox" id="omusicALp'.$j.'" name="srb[omusicALp'.$j.']" value="omusicALp'.$j.'" '.${$pomusicAL[$i]}.'></td><td><input list="reason" name="srb[omusicALt'.$j.']"  id="omusicALt'.$j.'" value="'.${$tomusicAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Agricultural Science </td><td><input type="checkbox" id="agriALp'.$j.'" name="srb[agriALp'.$j.']" value="agriALp'.$j.'" '.${$pagriAL[$i]}.'></td><td><input list="reason" name="srb[agriALt'.$j.']"  id="agriALt'.$j.'" value="'.${$tagriAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Home Economics </td><td><input type="checkbox" id="heconALp'.$j.'" name="srb[heconALp'.$j.']" value="heconALp'.$j.'" '.${$pheconAL[$i]}.'></td><td><input list="reason" name="srb[heconALt'.$j.']"  id="heconALt'.$j.'" value="'.${$theconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                          </table>';
                            } else {
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Sinhala </td><td><input type="checkbox" id="sinALp'.$j.'" name="srb[sinALp'.$j.']" value="sinALp'.$j.'" '.${$psinAL[$i]}.'></td><td><input list="reason" name="srb[sinALt'.$j.']"  id="sinALt'.$j.'" value="'.${$tsinAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ENGLISH </td><td><input type="checkbox" id="engALp'.$j.'" name="srb[engALp'.$j.']" value="engALp'.$j.'" '.${$pengAL[$i]}.'></td><td><input list="reason" name="srb[engALt'.$j.']"  id="engALt'.$j.'" value="'.${$tengAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Geography </td><td><input type="checkbox" id="GeogALp'.$j.'" name="srb[GeogALp'.$j.']" value="GeogALp'.$j.'" '.${$pGeogAL[$i]}.'></td><td><input list="reason" name="srb[GeogALt'.$j.']"  id="GeogALt'.$j.'" value="'.${$tGeogAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Music (Oriental) </td><td><input type="checkbox" id="omusicALp'.$j.'" name="srb[omusicALp'.$j.']" value="omusicALp'.$j.'" '.${$pomusicAL[$i]}.'></td><td><input list="reason" name="srb[omusicALt'.$j.']"  id="omusicALt'.$j.'" value="'.${$tomusicAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Agricultural Science </td><td><input type="checkbox" id="agriALp'.$j.'" name="srb[agriALp'.$j.']" value="agriALp'.$j.'" '.${$pagriAL[$i]}.'></td><td><input list="reason" name="srb[agriALt'.$j.']"  id="agriALt'.$j.'" value="'.${$tagriAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Home Economics </td><td><input type="checkbox" id="heconALp'.$j.'" name="srb[heconALp'.$j.']" value="heconALp'.$j.'" '.${$pheconAL[$i]}.'></td><td><input list="reason" name="srb[heconALt'.$j.']"  id="heconALt'.$j.'" value="'.${$theconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                          </table>';
                            }
                        }

                        if($s == 94) {
                            if($cl_id==103) { 
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                                <tr><td>'.$time[$i].'</td><td> Logic and Scientific Method </td><td><input type="checkbox" id="logicALp'.$j.'" name="srb[logicALp'.$j.']" value="logicALp'.$j.'" '.${$plogicAL[$i]}.'></td><td><input list="reason" name="srb[logicALt'.$j.']"  id="logicALt'.$j.'" value="'.${$tlogicAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Economics </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> History </td><td><input type="checkbox" id="histALp'.$j.'" name="srb[histALp'.$j.']" value="histALp'.$j.'" '.${$phistAL[$i]}.'></td><td><input list="reason" name="srb[histALt'.$j.']"  id="histALt'.$j.'" value="'.${$thistAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                <tr><td>'.$time[$i].'</td><td> Information Communication Technology </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                                </table>';
                            } else {
                                ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> Logic and Scientific Method </td><td><input type="checkbox" id="logicALp'.$j.'" name="srb[logicALp'.$j.']" value="logicALp'.$j.'" '.${$plogicAL[$i]}.'></td><td><input list="reason" name="srb[logicALt'.$j.']"  id="logicALt'.$j.'" value="'.${$tlogicAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Economics </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> History </td><td><input type="checkbox" id="histALp'.$j.'" name="srb[histALp'.$j.']" value="histALp'.$j.'" '.${$phistAL[$i]}.'></td><td><input list="reason" name="srb[histALt'.$j.']"  id="histALt'.$j.'" value="'.${$thistAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Information Communication Technology </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Dancing (Indigenous) </td><td><input type="checkbox" id="danceALp'.$j.'" name="srb[danceALp'.$j.']" value="danceALp'.$j.'" '.${$pdanceAL[$i]}.'></td><td><input list="reason" name="srb[danceALt'.$j.']"  id="danceALt'.$j.'" value="'.${$tdanceAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr></table>';
                            }
                        }

                        if($s == 95) {
                            ${$table[$i]}='<table id="period-0'.$j.'-tableAL">
                                            <tr><td>'.$time[$i].'</td><td> ART </td><td><input type="checkbox" id="artALp'.$j.'" name="srb[artALp'.$j.']" value="artALp'.$j.'" '.${$partAL[$i]}.'></td><td><input list="reason" name="srb[artALt'.$j.']"  id="artALt'.$j.'" value="'.${$tartAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Drama & Theatre </td><td><input type="checkbox" id="dramaALp'.$j.'" name="srb[dramaALp'.$j.']" value="dramaALp'.$j.'" '.${$pdramaAL[$i]}.'></td><td><input list="reason" name="srb[dramaALt'.$j.']"  id="pdramaALt'.$j.'" value="'.${$tdramaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ECONOMICS </td><td><input type="checkbox" id="econALp'.$j.'" name="srb[econALp'.$j.']" value="econALp'.$j.'" '.${$peconAL[$i]}.'></td><td><input list="reason" name="srb[econALt'.$j.']"  id="econALt'.$j.'" value="'.${$teconAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Political Science </td><td><input type="checkbox" id="politicALp'.$j.'" name="srb[politicALp'.$j.']" value="politicALp'.$j.'" '.${$ppoliticAL[$i]}.'></td><td><input list="reason" name="srb[politicALt'.$j.']"  id="politicALt'.$j.'" value="'.${$tpoliticAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Communication & Media Studies </td><td><input type="checkbox" id="mediaALp'.$j.'" name="srb[mediaALp'.$j.']" value="mediaALp'.$j.'" '.${$pmediaAL[$i]}.'></td><td><input list="reason" name="srb[mediaALt'.$j.']"  id="mediaALt'.$j.'" value="'.${$tmediaAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"></datalist><option value="No students follow this subject in this Class"></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> ICT </td><td><input type="checkbox" id="ictALp'.$j.'" name="srb[ictALp'.$j.']" value="ictALp'.$j.'" '.${$pictAL[$i]}.'></td><td><input list="reason" name="srb[ictALt'.$j.']"  id="ictALt'.$j.'" value="'.${$tictAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>            
                                            <tr><td>'.$time[$i].'</td><td> Business Statistics </td><td><input type="checkbox" id="busistatALp'.$j.'" name="srb[busistatALp'.$j.']" value="busistatALp'.$j.'" '.${$pbusistatAL[$i]}.'></td><td><input list="reason" name="srb[busistatALt'.$j.']"  id="busistatALt'.$j.'" value="'.${$tbusistatAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            <tr><td>'.$time[$i].'</td><td> Business Studies </td><td><input type="checkbox" id="busistudALp'.$j.'" name="srb[busistudALp'.$j.']" value="busistudALp'.$j.'" '.${$pbusistudAL[$i]}.'></td><td><input list="reason" name="srb[busistudALt'.$j.']"  id="busistudALt'.$j.'" value="'.${$tbusistudAL[$i]}.'" /><datalist id="reason"><option value="Teacher is absent"><option value="Teacher is present but didnt come to class"><option value="An Assignment given by teacher"><option value="No students follow this subject in this Class"></datalist></td></tr>
                                            </table>';
                        }
                        
                        $i+=1;
                    }
                }
                
                $table01 = !is_null($period_01_table)?$period_01_table:'<table id="period-01-tableAL"></table>';
                $table02 = !is_null($period_02_table)?$period_02_table:'<table id="period-02-tableAL"></table>';
                $table03 = !is_null($period_03_table)?$period_03_table:'<table id="period-03-tableAL"></table>';
                $table04 = !is_null($period_04_table)?$period_04_table:'<table id="period-04-tableAL"></table>';
                $table05 = !is_null($period_05_table)?$period_05_table:'<table id="period-05-tableAL"></table>';
                $table06 = !is_null($period_06_table)?$period_06_table:'<table id="period-06-tableAL"></table>';
                $table07 = !is_null($period_07_table)?$period_07_table:'<table id="period-07-tableAL"></table>';
                $table08 = !is_null($period_08_table)?$period_08_table:'<table id="period-08-tableAL"></table>';
                
                                
                
                //drop down for class
                $mb = new stClass();
                $results = $mb->getAllAL();
                
                if(isset($_SESSION['fooal'])) {
                    //drop down for class
                    $dropdown_class_html = '<select required id="srb_class_select_al" name="srb[clid]">
                                                <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                                    
                    foreach ($results as $result)
                    {
                        $clid = esc_html($result->getCid());
                        $clname = esc_html($result->getCname());
                        $isSelect = $cachedFieldsal['clid'] == $clid?'selected':'';    
                        $dropdown_class_html .= '<option value="' . $clid . '" '.$isSelect.'>( '. $clid .' )-' . $clname . '</option>' . "\n";
                    }
                    
                    $dropdown_class_html .= '</select>';
                } else {
                    //drop down for class
                    $dropdown_class_html = '<select required id="srb_class_select_al" name="srb[clid]">
                                                <option value="">' . __("Select a Class", $this->plugin_text_domain) . '</option>';
                                    
                    foreach ($results as $result)
                    {
                        $clid = esc_html($result->getCid());
                        $clname = esc_html($result->getCname());
                        $dropdown_class_html .= '<option value="' . $clid . '" >( '. $clid .' )-' . $clname . '</option>' . "\n";
                    }
                    
                    $dropdown_class_html .= '</select>';
                }
                
                $sb = new Subject();
                $resultsub = $sb->getCoreSubjectsAL($cachedFieldsal['clid']);
                $this->console_log($resultsub);
                
                if(isset($_SESSION['fooal'])) {
                    
                    $i=0;
                    
                    foreach ($sub as $s)
                    {
                        foreach ($resultsub as $result)
                        {
                            $sid = esc_html($result->getSid());
                            $sname = esc_html($result->getSname());
                            $scode = esc_html($result->getCode());
                            $isSelect = $s == $sid?'selected':'';
                            ${$dropdown[$i]} .= '<option value="' . $sid . '" '.$isSelect.'>' . $sname . '( '. $scode .' )  </option>' . "\n";
                        }
                        ${$dropdown} .= '</select>';
                        $i +=1;
                    }
                }
                 
                if(isset($_SESSION['fooal'])) {
                    $dropdown_sub1 = $dropdown_subject_html1;
                    $dropdown_sub2 = $dropdown_subject_html2;
                    $dropdown_sub3 = $dropdown_subject_html3;
                    $dropdown_sub4 = $dropdown_subject_html4;
                    $dropdown_sub5 = $dropdown_subject_html5;
                    $dropdown_sub6 = $dropdown_subject_html6;
                    $dropdown_sub7 = $dropdown_subject_html7;
                    $dropdown_sub8 = $dropdown_subject_html8;
                }

            
                    $content.='<h3>ADD TIME RECORDS</h3>';		
            		$content.='<div class="srb_add_user_meta_form">';
            					
            		$content.='<form action="'.get_permalink().'" method="post" id="srb_add_order_meta__form" >';			
            
                    $content.='<input type="hidden" name="action" value="srb_form_time_record_response">';
                    $content.='<input type="hidden" name="srb_add_class_meta_nonce" value="'. $srb_add_meta_nonce .'" />';
                    $content.='<input type="hidden" name="my-form-data" value="process"/>';
                    $content.='<input type="hidden" name="notify" value="True"/>';
                    
                    $content.='<div><br>';
                        //$content.='<label for="'. $this->plugin_name.'-class_id"> '. _e("CLASS ID", $this->plugin_name).' </label><br>';
                    $content.='<label for="class">Select Class:</label>';
                    $content.= $dropdown_class_html; 
                    $content.='<br></div>';
                    $content.='<div style="width: 350px; margin-top:30px">';
                    $content.='<label for="selectdate">Select Date:</label>';
                    $content.='<input required type="date" id="recorddateal" name="srb[recorddate]" value="'.$cachedFieldsal["sdate"].'"><br>';
                    $content.='<input required type="hidden" name="srb[createddate]" id="result"  /><br>';    
                    $content.='</div>';
                    
                    $content.='<div>';
                        
                    $content.='<table class="srb_rale">
                        <thead>
                        <tr>
                        <th>Period</th>
                        <th>Subject</th>
                        <th>IsDone</th>
                        <th>Reason</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                            <!-- Start : Period 01 -->
                            <tr>
                                <td>7.50-8.30</td>
                                <td>
                                <select required id="period-01-drop-downAL" name="srb[subid1]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub1.'
                                </td>
                                <td><input type="checkbox" id="p1" name="srb[p1]" value="p1" '.$pp1.' ></td>
                                <td><input list="reason" name="srb[t1]" id="t1" value="'.$tt1.'" />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    '.$table01.'
                                </td>
                            </tr>
                    
                            <!-- End : Period 01 -->
                    
                            <!-- Start : Period 02 -->
                    
                            <tr>
                                <td>8.30-9.10</td>
                                <td>
                                <select required id="period-02-drop-downAL" name="srb[subid2]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub2.'
                                </td>
                                <td><input type="checkbox" id="p2" name="srb[p2]"  value="p2" '.$pp2.' ></td>
                                <td><input list="reason" name="srb[t2]" id="t2" value="'.$tt2.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    '.$table02.'
                                </td>
                            </tr>
                    
                            <!-- End : Period 03 -->
                    
                            <!-- Start : Period 03 -->
                            <tr>
                                <td>9.10-9.50</td>
                                <td>
                                    <select required id="period-03-drop-downAL" name="srb[subid3]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub3.'
                                </td>
                                <td><input type="checkbox" id="p3" name="srb[p3]"  value="p3" '.$pp3.' ></td>
                                <td><input list="reason" name="srb[t3]" id="t3" value="'.$tt3.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                            </tr>
                    
                            <tr>
                                <td colspan="4">
                                    '.$table03.'
                                </td>
                            </tr>
                            <!-- End : Period 03 -->
                    
                            <!-- Start : Period 04 -->
                            <tr>
                                <td>9.50-10.30</td>
                                <td>
                                    <select required id="period-04-drop-downAL" name="srb[subid4]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub4.'
                                </td>
                                <td><input type="checkbox" id="p4" name="srb[p4]"  value="p4" '.$pp4.' ></td>
                                <td><input list="reason" name="srb[t4]" id="t4" value="'.$tt4.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                                
                            </tr>
                    
                            <tr>
                                <td colspan="4">
                                    '.$table04.'
                                </td>
                            </tr>
                    
                            <!-- End : Period 04 -->
                    
                            <!-- Start : Period 05 -->
                            <tr>
                                <td>10.50-11.30</td>
                                <td>
                                    <select required id="period-05-drop-downAL" name="srb[subid5]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub5.'
                                </td>
                                <td><input type="checkbox" id="p5" name="srb[p5]"  value="p5" '.$pp5.' ></td>
                                <td><input list="reason" name="srb[t5]" id="t5" value="'.$tt5.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                                
                            </tr>
                    
                            <tr>
                                <td colspan="4">
                                    '.$table05.'
                                </td>
                            </tr>
                    
                            <!-- End : Period 05 -->
                    
                            <!-- Start : Period 06 -->
                    
                            <tr>
                                <td>11.30-12.10</td>
                                <td>
                                    <select required id="period-06-drop-downAL" name="srb[subid6]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub6.'
                                </td>
                                <td><input type="checkbox" id="p6" name="srb[p6]"  value="p6" '.$pp6.' ></td>
                                <td><input list="reason" name="srb[t6]" id="t6" value="'.$tt6.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                                
                            </tr>
                    
                            <tr>
                                <td colspan="4">
                                    '.$table06.'
                                </td>
                            </tr>
                            <!-- End : Period 06 -->
                    
                            <!-- Start : Period 07 -->
                    
                            <tr>
                                <td>12.10-12.50</td>
                                <td>
                                    <select required id="period-07-drop-downAL" name="srb[subid7]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub7.'
                                </td>
                                <td><input type="checkbox" id="p7" name="srb[p7]"  value="p7" '.$pp7.' ></td>
                                <td><input list="reason" name="srb[t7]" id="t7" value="'.$tt7.'"  />
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="4">
                                    '.$table07.'
                                </td>
                            </tr>
                            <!-- End : Period 07 -->
                    
                            <!-- Start : Period 08 -->
                    
                            <tr>
                                <td>12.50-1.30</td>
                                <td>
                                    <select required id="period-08-drop-downAL" name="srb[subid8]">
                                        <option value="0">' . __("Select a Subject", $this->plugin_text_domain) . '</option>
                                        '.$dropdown_sub8.'
                                </td>
                                <td><input type="checkbox" id="p8" name="srb[p8]"  value="p8" '.$pp8.' ></td>
                                <td><input list="reason" name="srb[t8]" id="t8" value="'.$tt8.'"  /></label>
                                    <datalist id="reason">
                                        <option value="Teacher is absent">
                                        <option value="Teacher is present but didnt come to class">
                                        <option value="An Assignment given by teacher">
                                        <option value="No students follow this subject in this Class">
                                    </datalist>
                                </td>
                            </tr>
                    
                            <tr>
                                <td colspan="4">
                                    '.$table08.'
                                </td>
                            </tr>
                                <!-- End : Period 08 -->
                    
                            </tbody>
                        </table>';
                                
            	$content.='<br></div>';
            	$content.='<p class="submit">';
            	$content.='<input type="submit" name="addbutton" id="srb-order-button" class="button button-primary" value="Add Entry">';
            	$content.='</p>';
            	$content.='</form>';
            	$content.='</div>';
            	$content.='<h3><a href="'. wp_logout_url( home_url('/student-record-bookal/')  ) . '" title="Logout">Logout</a></h3>';
            	return $content;
	       }
        }
    } else {
        
        $content.='<h3>Please Login </h3>';
        $args = array(
            'echo'            => false,
            'redirect'        => ( is_ssl() ? 'https://' : 'http://' ) . 'mrcstudent.com/student-record-bookal/',
            'remember'        => true,
            'value_remember'  => true,
          );
          
        if ( ! empty( $_REQUEST['redirect_to'] ) ) {
            $args['redirect'] = $_REQUEST['redirect_to'];
        }
        
        $content.= wp_login_form( $args );
        return $content;
    }
    
        
      
    
    }
    
    function checkInputAL() {
	// Bail right away if our hidden form value isn't there
	    if (!isset($_POST['srb_add_class_meta_nonce']) && !wp_verify_nonce($_POST['srb_add_user_meta_nonce'], 'srb_add_user_meta_form_nonce')) { return false; }
        
        // Set variables from post
	    $this->tsid = $_POST['srb']['tsid'];
	    $this->clid = $_POST['srb']['clid'];
	    $this->sdate = strtotime($_POST['srb']['recorddate']);
        
        $_SESSION['fooal']['clid'] = $this->clid;
        $_SESSION['fooal']['sdate'] = $_POST['srb']['recorddate'];
        
        $this->subid1 = $_POST['srb']['subid1'];
        //if(isset($_POST['srb']['p1'])) {$this->p1 = 1; } else {$this->p1 = 0;};
        $this->p1 = isset($_POST['srb']['p1']) ? 1:0;
        $this->t1 = !empty($_POST['srb']['t1']) ? '"' .$_POST['srb']['t1']. '"' : "NULL";
        //if(!empty($_POST['srb']['t1'])) {$this->t1 = '"' .$_POST['srb']['t1']. '"'; } else {$this->t1 = ;};
        
  
        if($this->subid1 == 88) {
            
            $this->pchAL1 = isset($_POST['srb']['chALp1']) ? 1:0;
            $this->tchAL1 = !empty($_POST['srb']['chALt1']) ? '"' .$_POST['srb']['chALt1']. '"' : "NULL";
            
            $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
            $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";

        }
        
        if($this->subid1 == 89) {
            
            $this->pphAL1 = isset($_POST['srb']['phALp1']) ? 1:0;
            $this->tphAL1 = !empty($_POST['srb']['phALt1']) ? '"' .$_POST['srb']['phALt1']. '"' : "NULL";
            
            $this->pagriAL1 = isset($_POST['srb']['agriALp1']) ? 1:0;
            $this->tagriAL1 = !empty($_POST['srb']['agriALt1']) ? '"' .$_POST['srb']['agriALt1']. '"' : "NULL";

        }
        
        if($this->subid1 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL1 = isset($_POST['srb']['ictALp1'])  ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
            } else {
                $this->pictAL1 = isset($_POST['srb']['ictALp1'])  ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
                
                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pGeogAL1 = isset($_POST['srb']['GeogALp1']) ? 1:0;
                $this->tGeogAL1 = !empty($_POST['srb']['GeogALt1']) ? '"' .$_POST['srb']['GeogALt1']. '"' : "NULL";
                
                $this->pmathAL1 = isset($_POST['srb']['mathALp1']) ? 1:0;
                $this->tmathAL1 = !empty($_POST['srb']['mathALt1']) ? '"' .$_POST['srb']['mathALt1']. '"' : "NULL";
                
                $this->partAL1 = isset($_POST['srb']['artALp1']) ? 1:0;
                $this->tartAL1 = !empty($_POST['srb']['artALt1']) ? '"' .$_POST['srb']['artALt1']. '"' : "NULL";
            }
        }
        
        if($this->subid1 == 91) {
            
            $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
            $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
            
            $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
            $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
            
            $this->pGeogAL1 = isset($_POST['srb']['GeogALp1']) ? 1:0;
            $this->tGeogAL1 = !empty($_POST['srb']['GeogALt1']) ? '"' .$_POST['srb']['GeogALt1']. '"' : "NULL";
            
            $this->pagriAL1 = isset($_POST['srb']['agriALp1']) ? 1:0;
            $this->tagriAL1 = !empty($_POST['srb']['agriALt1']) ? '"' .$_POST['srb']['agriALt1']. '"' : "NULL";

        }
        
        if($this->subid1 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
                $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";
                
                $this->ppoliticAL1 = isset($_POST['srb']['politicALp1']) ? 1:0;
                $this->tpoliticAL1 = !empty($_POST['srb']['politicALt1']) ? '"' .$_POST['srb']['politicALt1']. '"' : "NULL";
                
                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
                
                $this->pbusistatAL1 = isset($_POST['srb']['busistatALp1']) ? 1:0;
                $this->tbusistatAL1 = !empty($_POST['srb']['busistatALt1']) ? '"' .$_POST['srb']['busistatALt1']. '"' : "NULL";
            
            } else if($this->clid == 104) {

                $this->phindiAL1 = isset($_POST['srb']['hindiALp1']) ? 1:0;
                $this->thindiAL1 = !empty($_POST['srb']['hindiALt1']) ? '"' .$_POST['srb']['hindiALt1']. '"' : "NULL";

                $this->partAL1 = isset($_POST['srb']['artALp1']) ? 1:0;
                $this->tartAL1 = !empty($_POST['srb']['artALt1']) ? '"' .$_POST['srb']['artALt1']. '"' : "NULL";

                $this->pdramaAL1 = isset($_POST['srb']['dramaALp1']) ? 1:0;
                $this->tdramaAL1 = !empty($_POST['srb']['dramaALt1']) ? '"' .$_POST['srb']['dramaALt1']. '"' : "NULL";

                $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
                $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";

                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";

            } else {

                $this->pjapAL1 = isset($_POST['srb']['japALp1']) ? 1:0;
                $this->tjapAL1 = !empty($_POST['srb']['japALt1']) ? '"' .$_POST['srb']['japALt1']. '"' : "NULL";
                
                $this->pfrenchAL1 = isset($_POST['srb']['frenchALp1']) ? 1:0;
                $this->tfrenchAL1 = !empty($_POST['srb']['frenchALt1']) ? '"' .$_POST['srb']['frenchALt1']. '"' : "NULL";
                
                $this->pkoreanAL1 = isset($_POST['srb']['koreanALp1']) ? 1:0;
                $this->tkoreanAL1 = !empty($_POST['srb']['koreanALt1']) ? '"' .$_POST['srb']['koreanALt1']. '"' : "NULL";
                
                $this->phindiAL1 = isset($_POST['srb']['hindiALp1']) ? 1:0;
                $this->thindiAL1 = !empty($_POST['srb']['hindiALt1']) ? '"' .$_POST['srb']['hindiALt1']. '"' : "NULL";
                
                $this->partAL1 = isset($_POST['srb']['artALp1']) ? 1:0;
                $this->tartAL1 = !empty($_POST['srb']['artALt1']) ? '"' .$_POST['srb']['artALt1']. '"' : "NULL";
                
                $this->pdramaAL1 = isset($_POST['srb']['dramaALp1']) ? 1:0;
                $this->tdramaAL1 = !empty($_POST['srb']['dramaALt1']) ? '"' .$_POST['srb']['dramaALt1']. '"' : "NULL";
                
                $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
                $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";
                
                $this->ppoliticAL1 = isset($_POST['srb']['politicALp1']) ? 1:0;
                $this->tpoliticAL1 = !empty($_POST['srb']['politicALt1']) ? '"' .$_POST['srb']['politicALt1']. '"' : "NULL";
                
                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
                
                $this->pbusistatAL1 = isset($_POST['srb']['busistatALp1']) ? 1:0;
                $this->tbusistatAL1 = !empty($_POST['srb']['busistatALt1']) ? '"' .$_POST['srb']['busistatALt1']. '"' : "NULL";
            }

        }
        
        if($this->subid1 == 93) {
            
            if($this->clid == 103) { 
                $this->psinAL1 = isset($_POST['srb']['sinALp1']) ? 1:0;
                $this->tsinAL1 = !empty($_POST['srb']['sinALt1']) ? '"' .$_POST['srb']['sinALt1']. '"' : "NULL";

                $this->pGeogAL1 = isset($_POST['srb']['GeogALp1']) ? 1:0;
                $this->tGeogAL1 = !empty($_POST['srb']['GeogALt1']) ? '"' .$_POST['srb']['GeogALt1']. '"' : "NULL";

                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pagriAL1 = isset($_POST['srb']['agriALp1']) ? 1:0;
                $this->tagriAL1 = !empty($_POST['srb']['agriALt1']) ? '"' .$_POST['srb']['agriALt1']. '"' : "NULL";

                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";

            } else if($this->clid == 104) {

                $this->psinAL1 = isset($_POST['srb']['sinALp1']) ? 1:0;
                $this->tsinAL1 = !empty($_POST['srb']['sinALt1']) ? '"' .$_POST['srb']['sinALt1']. '"' : "NULL";

                $this->pGeogAL1 = isset($_POST['srb']['GeogALp1']) ? 1:0;
                $this->tGeogAL1 = !empty($_POST['srb']['GeogALt1']) ? '"' .$_POST['srb']['GeogALt1']. '"' : "NULL";

                $this->pomusicAL1 = isset($_POST['srb']['omusicALp1']) ? 1:0;
                $this->tomusicAL1 = !empty($_POST['srb']['omusicALt1']) ? '"' .$_POST['srb']['omusicALt1']. '"' : "NULL";

                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pagriAL1 = isset($_POST['srb']['agriALp1']) ? 1:0;
                $this->tagriAL1 = !empty($_POST['srb']['agriALt1']) ? '"' .$_POST['srb']['agriALt1']. '"' : "NULL";
                
                $this->pheconAL1 = isset($_POST['srb']['heconALp1']) ? 1:0;
                $this->theconAL1 = !empty($_POST['srb']['heconALt1']) ? '"' .$_POST['srb']['heconALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";

            }else {
                $this->psinAL1 = isset($_POST['srb']['sinALp1']) ? 1:0;
                $this->tsinAL1 = !empty($_POST['srb']['sinALt1']) ? '"' .$_POST['srb']['sinALt1']. '"' : "NULL";
                
                $this->pengAL1 = isset($_POST['srb']['engALp1']) ? 1:0;
                $this->tengAL1 = !empty($_POST['srb']['engALt1']) ? '"' .$_POST['srb']['engALt1']. '"' : "NULL";
                      
                $this->pGeogAL1 = isset($_POST['srb']['GeogALp1']) ? 1:0;
                $this->tGeogAL1 = !empty($_POST['srb']['GeogALt1']) ? '"' .$_POST['srb']['GeogALt1']. '"' : "NULL";

                $this->pomusicAL1 = isset($_POST['srb']['omusicALp1']) ? 1:0;
                $this->tomusicAL1 = !empty($_POST['srb']['omusicALt1']) ? '"' .$_POST['srb']['omusicALt1']. '"' : "NULL";

                $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
                $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";
                
                $this->pagriAL1 = isset($_POST['srb']['agriALp1']) ? 1:0;
                $this->tagriAL1 = !empty($_POST['srb']['agriALt1']) ? '"' .$_POST['srb']['agriALt1']. '"' : "NULL";
                
                $this->pheconAL1 = isset($_POST['srb']['heconALp1']) ? 1:0;
                $this->theconAL1 = !empty($_POST['srb']['heconALt1']) ? '"' .$_POST['srb']['heconALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
            }
            

        }
        
        if($this->subid1 == 94) {
            
            if($this->clid == 103) { 
                $this->plogicAL1 = isset($_POST['srb']['logicALp1']) ? 1:0;
                $this->tlogicAL1 = !empty($_POST['srb']['logicALt1']) ? '"' .$_POST['srb']['sinALt1']. '"' : "NULL";
                
                $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
                $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";
                
                $this->phistAL1 = isset($_POST['srb']['histALp1']) ? 1:0;
                $this->thistAL1 = !empty($_POST['srb']['histALt1']) ? '"' .$_POST['srb']['histALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
            } else {
                $this->plogicAL1 = isset($_POST['srb']['logicALp1']) ? 1:0;
                $this->tlogicAL1 = !empty($_POST['srb']['logicALt1']) ? '"' .$_POST['srb']['sinALt1']. '"' : "NULL";
                
                $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
                $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";
                
                $this->phistAL1 = isset($_POST['srb']['histALp1']) ? 1:0;
                $this->thistAL1 = !empty($_POST['srb']['histALt1']) ? '"' .$_POST['srb']['histALt1']. '"' : "NULL";
                
                $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
                $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
                
                $this->pdanceAL1 = isset($_POST['srb']['danceALp1']) ? 1:0;
                $this->tdanceAL1 = !empty($_POST['srb']['danceALt1']) ? '"' .$_POST['srb']['danceALt1']. '"' : "NULL";
            }

        }

        if($this->subid1 == 95) {
            
            $this->partAL1 = isset($_POST['srb']['artALp1']) ? 1:0; 
            $this->tartAL1 = !empty($_POST['srb']['artALt1']) ? '"' .$_POST['srb']['artALt1']. '"' : "NULL";
            
            $this->pdramaAL1 = isset($_POST['srb']['dramaALp1']) ? 1:0;
            $this->tdramaAL1 = !empty($_POST['srb']['dramaALt1']) ? '"' .$_POST['srb']['dramaALt1']. '"' : "NULL";
            
            $this->peconAL1 = isset($_POST['srb']['econALp1']) ? 1:0;
            $this->teconAL1 = !empty($_POST['srb']['econALt1']) ? '"' .$_POST['srb']['econALt1']. '"' : "NULL";
            
            $this->ppoliticAL1 = isset($_POST['srb']['politicALp1']) ? 1:0;
            $this->tpoliticAL1 = !empty($_POST['srb']['politicALt1']) ? '"' .$_POST['srb']['politicALt1']. '"' : "NULL";

            $this->pmediaAL1 = isset($_POST['srb']['mediaALp1']) ? 1:0;
            $this->tmediaAL1 = !empty($_POST['srb']['mediaALt1']) ? '"' .$_POST['srb']['mediaALt1']. '"' : "NULL";

            $this->pictAL1 = isset($_POST['srb']['ictALp1']) ? 1:0;
            $this->tictAL1 = !empty($_POST['srb']['ictALt1']) ? '"' .$_POST['srb']['ictALt1']. '"' : "NULL";
            
            $this->pbusistatAL1 = isset($_POST['srb']['busistatALp1']) ? 1:0;
            $this->tbusistatAL1 = !empty($_POST['srb']['busistatALt1']) ? '"' .$_POST['srb']['busistatALt1']. '"' : "NULL";

            $this->pbusistudAL1 = isset($_POST['srb']['busistudALp1']) ? 1:0;
            $this->tbusistudAL1 = !empty($_POST['srb']['busistudALt1']) ? '"' .$_POST['srb']['busistudALt1']. '"' : "NULL";
            

        }
        
        
        $this->subid2 = $_POST['srb']['subid2'];
        $this->p2 = isset($_POST['srb']['p2']) ? 1:0;
        $this->t2 = !empty($_POST['srb']['t2']) ? '"' .$_POST['srb']['t2']. '"' : "NULL";
        
        if($this->subid2 == 88) {
            
            $this->pchAL2 = isset($_POST['srb']['chALp2']) ? 1:0;
            $this->tchAL2 = !empty($_POST['srb']['chALt2']) ? '"' .$_POST['srb']['chALt2']. '"' : "NULL";
            
            $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
            $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

        }
        
        if($this->subid2 == 89) {
            
            $this->pphAL2 = isset($_POST['srb']['phALp2']) ? 1:0;
            $this->tphAL2 = !empty($_POST['srb']['phALt2']) ? '"' .$_POST['srb']['phALt2']. '"' : "NULL";
            
            $this->pagriAL2 = isset($_POST['srb']['agriALp2']) ? 1:0;
            $this->tagriAL2 = !empty($_POST['srb']['agriALt2']) ? '"' .$_POST['srb']['agriALt2']. '"' : "NULL";

        }
        
        if($this->subid2 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

            } else {
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pGeogAL2 = isset($_POST['srb']['GeogALp2']) ? 1:0;
                $this->tGeogAL2 = !empty($_POST['srb']['GeogALt2']) ? '"' .$_POST['srb']['GeogALt2']. '"' : "NULL";
                
                $this->pmathAL2 = isset($_POST['srb']['mathALp2']) ? 1:0;
                $this->tmathAL2 = !empty($_POST['srb']['mathALt2']) ? '"' .$_POST['srb']['mathALt2']. '"' : "NULL";
                
                $this->partAL2 = isset($_POST['srb']['artALp2']) ? 1:0;
                $this->tartAL2 = !empty($_POST['srb']['artALt2']) ? '"' .$_POST['srb']['artALt2']. '"' : "NULL";
            }
        }
        
        if($this->subid2 == 91) {
            
            $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
            $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
            
            $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
            $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
            
            $this->pGeogAL2 = isset($_POST['srb']['GeogALp2']) ? 1:0;
            $this->tGeogAL2 = !empty($_POST['srb']['GeogALt2']) ? '"' .$_POST['srb']['GeogALt2']. '"' : "NULL";
            
            $this->pagriAL2 = isset($_POST['srb']['agriALp2']) ? 1:0;
            $this->tagriAL2 = !empty($_POST['srb']['agriALt2']) ? '"' .$_POST['srb']['agriALt2']. '"' : "NULL";

        }
        
        if($this->subid2 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
                $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";
                
                $this->ppoliticAL2 = isset($_POST['srb']['politicALp2']) ? 1:0;
                $this->tpoliticAL2 = !empty($_POST['srb']['politicALt2']) ? '"' .$_POST['srb']['politicALt2']. '"' : "NULL";
                
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
                
                $this->pbusistatAL2 = isset($_POST['srb']['busistatALp2']) ? 1:0;
                $this->tbusistatAL2 = !empty($_POST['srb']['busistatALt2']) ? '"' .$_POST['srb']['busistatALt2']. '"' : "NULL";
            
            } else if($this->clid == 104) { 

                $this->phindiAL2 = isset($_POST['srb']['hindiALp2']) ? 1:0;
                $this->thindiAL2 = !empty($_POST['srb']['hindiALt2']) ? '"' .$_POST['srb']['hindiALt2']. '"' : "NULL";
                
                $this->partAL2 = isset($_POST['srb']['artALp2']) ? 1:0;
                $this->tartAL2 = !empty($_POST['srb']['artALt2']) ? '"' .$_POST['srb']['artALt2']. '"' : "NULL";
                
                $this->pdramaAL2 = isset($_POST['srb']['dramaALp2']) ? 1:0;
                $this->tdramaAL2 = !empty($_POST['srb']['dramaALt2']) ? '"' .$_POST['srb']['dramaALt2']. '"' : "NULL";
                
                $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
                $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";

                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

            } else {
                $this->pjapAL2 = isset($_POST['srb']['japALp2']) ? 1:0;
                $this->tjapAL2 = !empty($_POST['srb']['japALt2']) ? '"' .$_POST['srb']['japALt2']. '"' : "NULL";
                
                $this->pfrenchAL2 = isset($_POST['srb']['frenchALp2']) ? 1:0;
                $this->tfrenchAL2 = !empty($_POST['srb']['frenchALt2']) ? '"' .$_POST['srb']['frenchALt2']. '"' : "NULL";
                
                $this->pkoreanAL2 = isset($_POST['srb']['koreanALp2']) ? 1:0;
                $this->tkoreanAL2 = !empty($_POST['srb']['koreanALt2']) ? '"' .$_POST['srb']['koreanALt2']. '"' : "NULL";
                
                $this->phindiAL2 = isset($_POST['srb']['hindiALp2']) ? 1:0;
                $this->thindiAL2 = !empty($_POST['srb']['hindiALt2']) ? '"' .$_POST['srb']['hindiALt2']. '"' : "NULL";
                
                $this->partAL2 = isset($_POST['srb']['artALp2']) ? 1:0;
                $this->tartAL2 = !empty($_POST['srb']['artALt2']) ? '"' .$_POST['srb']['artALt2']. '"' : "NULL";
                
                $this->pdramaAL2 = isset($_POST['srb']['dramaALp2']) ? 1:0;
                $this->tdramaAL2 = !empty($_POST['srb']['dramaALt2']) ? '"' .$_POST['srb']['dramaALt2']. '"' : "NULL";
                
                $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
                $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";
                
                $this->ppoliticAL2 = isset($_POST['srb']['politicALp2']) ? 1:0;
                $this->tpoliticAL2 = !empty($_POST['srb']['politicALt2']) ? '"' .$_POST['srb']['politicALt2']. '"' : "NULL";
                
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
                
                $this->pbusistatAL2 = isset($_POST['srb']['busistatALp2']) ? 1:0;
                $this->tbusistatAL2 = !empty($_POST['srb']['busistatALt2']) ? '"' .$_POST['srb']['busistatALt2']. '"' : "NULL";

            }
        }
        
        if($this->subid2 == 93) {
            
            if($this->clid == 103) { 
                $this->psinAL2 = isset($_POST['srb']['sinALp2']) ? 1:0;
                $this->tsinAL2 = !empty($_POST['srb']['sinALt2']) ? '"' .$_POST['srb']['sinALt2']. '"' : "NULL";

                $this->pGeogAL2 = isset($_POST['srb']['GeogALp2']) ? 1:0;
                $this->tGeogAL2 = !empty($_POST['srb']['GeogALt2']) ? '"' .$_POST['srb']['GeogALt2']. '"' : "NULL";
                
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pagriAL2 = isset($_POST['srb']['agriALp2']) ? 1:0;
                $this->tagriAL2 = !empty($_POST['srb']['agriALt2']) ? '"' .$_POST['srb']['agriALt2']. '"' : "NULL";

                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

            } else if($this->clid == 104) {  

                $this->psinAL2 = isset($_POST['srb']['sinALp2']) ? 1:0;
                $this->tsinAL2 = !empty($_POST['srb']['sinALt2']) ? '"' .$_POST['srb']['sinALt2']. '"' : "NULL";

                $this->pGeogAL2 = isset($_POST['srb']['GeogALp2']) ? 1:0;
                $this->tGeogAL2 = !empty($_POST['srb']['GeogALt2']) ? '"' .$_POST['srb']['GeogALt2']. '"' : "NULL";

                $this->pomusicAL2 = isset($_POST['srb']['omusicALp2']) ? 1:0;
                $this->tomusicAL2 = !empty($_POST['srb']['omusicALt2']) ? '"' .$_POST['srb']['omusicALt2']. '"' : "NULL";
                
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pagriAL2 = isset($_POST['srb']['agriALp2']) ? 1:0;
                $this->tagriAL2 = !empty($_POST['srb']['agriALt2']) ? '"' .$_POST['srb']['agriALt2']. '"' : "NULL";
                
                $this->pheconAL2 = isset($_POST['srb']['heconALp2']) ? 1:0;
                $this->theconAL2 = !empty($_POST['srb']['heconALt2']) ? '"' .$_POST['srb']['heconALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

            } else {
                $this->psinAL2 = isset($_POST['srb']['sinALp2']) ? 1:0;
                $this->tsinAL2 = !empty($_POST['srb']['sinALt2']) ? '"' .$_POST['srb']['sinALt2']. '"' : "NULL";
                
                $this->pengAL2 = isset($_POST['srb']['engALp2']) ? 1:0;
                $this->tengAL2 = !empty($_POST['srb']['engALt2']) ? '"' .$_POST['srb']['engALt2']. '"' : "NULL";
                
                $this->pGeogAL2 = isset($_POST['srb']['GeogALp2']) ? 1:0;
                $this->tGeogAL2 = !empty($_POST['srb']['GeogALt2']) ? '"' .$_POST['srb']['GeogALt2']. '"' : "NULL";

                $this->pomusicAL2 = isset($_POST['srb']['omusicALp2']) ? 1:0;
                $this->tomusicAL2 = !empty($_POST['srb']['omusicALt2']) ? '"' .$_POST['srb']['omusicALt2']. '"' : "NULL";
                
                $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
                $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";
                
                $this->pagriAL2 = isset($_POST['srb']['agriALp2']) ? 1:0;
                $this->tagriAL2 = !empty($_POST['srb']['agriALt2']) ? '"' .$_POST['srb']['agriALt2']. '"' : "NULL";
                
                $this->pheconAL2 = isset($_POST['srb']['heconALp2']) ? 1:0;
                $this->theconAL2 = !empty($_POST['srb']['heconALt2']) ? '"' .$_POST['srb']['heconALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
            }
        }
        
        if($this->subid2 == 94) {
            
            if($this->clid == 103) { 
                $this->plogicAL2 = isset($_POST['srb']['logicALp2']) ? 1:0;
                $this->tlogicAL2 = !empty($_POST['srb']['logicALt2']) ? '"' .$_POST['srb']['sinALt2']. '"' : "NULL";
                
                $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
                $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";
                
                $this->phistAL2 = isset($_POST['srb']['histALp2']) ? 1:0;
                $this->thistAL2 = !empty($_POST['srb']['histALt2']) ? '"' .$_POST['srb']['histALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";

            } else {
                $this->plogicAL2 = isset($_POST['srb']['logicALp2']) ? 1:0;
                $this->tlogicAL2 = !empty($_POST['srb']['logicALt2']) ? '"' .$_POST['srb']['sinALt2']. '"' : "NULL";
                
                $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
                $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";
                
                $this->phistAL2 = isset($_POST['srb']['histALp2']) ? 1:0;
                $this->thistAL2 = !empty($_POST['srb']['histALt2']) ? '"' .$_POST['srb']['histALt2']. '"' : "NULL";
                
                $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
                $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
                
                $this->pdanceAL2 = isset($_POST['srb']['danceALp2']) ? 1:0;
                $this->tdanceAL2 = !empty($_POST['srb']['danceALt2']) ? '"' .$_POST['srb']['danceALt2']. '"' : "NULL";
            
            }
        }

        if($this->subid2 == 95) {
            
            $this->partAL2 = isset($_POST['srb']['artALp2']) ? 1:0; 
            $this->tartAL2 = !empty($_POST['srb']['artALt2']) ? '"' .$_POST['srb']['artALt2']. '"' : "NULL";
            
            $this->pdramaAL2 = isset($_POST['srb']['dramaALp2']) ? 1:0;
            $this->tdramaAL2 = !empty($_POST['srb']['dramaALt2']) ? '"' .$_POST['srb']['dramaALt2']. '"' : "NULL";
            
            $this->peconAL2 = isset($_POST['srb']['econALp2']) ? 1:0;
            $this->teconAL2 = !empty($_POST['srb']['econALt2']) ? '"' .$_POST['srb']['econALt2']. '"' : "NULL";
            
            $this->ppoliticAL2 = isset($_POST['srb']['politicALp2']) ? 1:0;
            $this->tpoliticAL2 = !empty($_POST['srb']['politicALt2']) ? '"' .$_POST['srb']['politicALt2']. '"' : "NULL";

            $this->pmediaAL2 = isset($_POST['srb']['mediaALp2']) ? 1:0;
            $this->tmediaAL2 = !empty($_POST['srb']['mediaALt2']) ? '"' .$_POST['srb']['mediaALt2']. '"' : "NULL";

            $this->pictAL2 = isset($_POST['srb']['ictALp2']) ? 1:0;
            $this->tictAL2 = !empty($_POST['srb']['ictALt2']) ? '"' .$_POST['srb']['ictALt2']. '"' : "NULL";
            
            $this->pbusistatAL2 = isset($_POST['srb']['busistatALp2']) ? 1:0;
            $this->tbusistatAL2 = !empty($_POST['srb']['busistatALt2']) ? '"' .$_POST['srb']['busistatALt2']. '"' : "NULL";

            $this->pbusistudAL2 = isset($_POST['srb']['busistudALp2']) ? 1:0;
            $this->tbusistudAL2 = !empty($_POST['srb']['busistudALt2']) ? '"' .$_POST['srb']['busistudALt2']. '"' : "NULL";
            

        }
        
        
        $this->subid3 = $_POST['srb']['subid3'];
        //$this->p3 = $_POST['srb']['p3'];
        //$this->t3 = $_POST['srb']['t3'];
        $this->p3 = isset($_POST['srb']['p3']) ? 1:0;
        $this->t3 = !empty($_POST['srb']['t3']) ? '"' .$_POST['srb']['t3']. '"' : "NULL";
        
        if($this->subid3 == 88) {
            
            $this->pchAL3 = isset($_POST['srb']['chALp3']) ? 1:0;
            $this->tchAL3 = !empty($_POST['srb']['chALt3']) ? '"' .$_POST['srb']['chALt3']. '"' : "NULL";
            
            $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
            $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";

        }
        
        if($this->subid3 == 89) {
            
            $this->pphAL3 = isset($_POST['srb']['phALp3']) ? 1:0;
            $this->tphAL3 = !empty($_POST['srb']['phALt3']) ? '"' .$_POST['srb']['phALt3']. '"' : "NULL";
            
            $this->pagriAL3 = isset($_POST['srb']['agriALp3']) ? 1:0;
            $this->tagriAL3 = !empty($_POST['srb']['agriALt3']) ? '"' .$_POST['srb']['agriALt3']. '"' : "NULL";

        }
        
        if($this->subid3 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
            } else {
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
                
                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";
                
                $this->pGeogAL3 = isset($_POST['srb']['GeogALp3']) ? 1:0;
                $this->tGeogAL3 = !empty($_POST['srb']['GeogALt3']) ? '"' .$_POST['srb']['GeogALt3']. '"' : "NULL";
                
                $this->pmathAL3 = isset($_POST['srb']['mathALp3']) ? 1:0;
                $this->tmathAL3 = !empty($_POST['srb']['mathALt3']) ? '"' .$_POST['srb']['mathALt3']. '"' : "NULL";
                
                $this->partAL3 = isset($_POST['srb']['artALp3']) ? 1:0;
                $this->tartAL3 = !empty($_POST['srb']['artALt3']) ? '"' .$_POST['srb']['artALt3']. '"' : "NULL";
            }

        }
        
        if($this->subid3 == 91) {
            
            $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
            $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
            
            $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
            $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";
            
            $this->pGeogAL3 = isset($_POST['srb']['GeogALp3']) ? 1:0;
            $this->tGeogAL3 = !empty($_POST['srb']['GeogALt3']) ? '"' .$_POST['srb']['GeogALt3']. '"' : "NULL";
            
            $this->pagriAL3 = isset($_POST['srb']['agriALp3']) ? 1:0;
            $this->tagriAL3 = !empty($_POST['srb']['agriALt3']) ? '"' .$_POST['srb']['agriALt3']. '"' : "NULL";

        }
        
        
        if($this->subid3 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
                $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";
                
                $this->ppoliticAL3 = isset($_POST['srb']['politicALp3']) ? 1:0;
                $this->tpoliticAL3 = !empty($_POST['srb']['politicALt3']) ? '"' .$_POST['srb']['politicALt3']. '"' : "NULL";
                
                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
                
                $this->pbusistatAL3 = isset($_POST['srb']['busistatALp3']) ? 1:0;
                $this->tbusistatAL3 = !empty($_POST['srb']['busistatALt3']) ? '"' .$_POST['srb']['busistatALt3']. '"' : "NULL";
            
            } else if($this->clid == 104) {

                $this->phindiAL3 = isset($_POST['srb']['hindiALp3']) ? 1:0;
                $this->thindiAL3 = !empty($_POST['srb']['hindiALt3']) ? '"' .$_POST['srb']['hindiALt3']. '"' : "NULL";
                
                $this->partAL3 = isset($_POST['srb']['artALp3']) ? 1:0;
                $this->tartAL3 = !empty($_POST['srb']['artALt3']) ? '"' .$_POST['srb']['artALt3']. '"' : "NULL";
                
                $this->pdramaAL3 = isset($_POST['srb']['dramaALp3']) ? 1:0;
                $this->tdramaAL3 = !empty($_POST['srb']['dramaALt3']) ? '"' .$_POST['srb']['dramaALt3']. '"' : "NULL";
                
                $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
                $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";

                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";

            }else {

                $this->pjapAL3 = isset($_POST['srb']['japALp3']) ? 1:0;
                $this->tjapAL3 = !empty($_POST['srb']['japALt3']) ? '"' .$_POST['srb']['japALt3']. '"' : "NULL";
                
                $this->pfrenchAL3 = isset($_POST['srb']['frenchALp3']) ? 1:0;
                $this->tfrenchAL3 = !empty($_POST['srb']['frenchALt3']) ? '"' .$_POST['srb']['frenchALt3']. '"' : "NULL";
                
                $this->pkoreanAL3 = isset($_POST['srb']['koreanALp3']) ? 1:0;
                $this->tkoreanAL3 = !empty($_POST['srb']['koreanALt3']) ? '"' .$_POST['srb']['koreanALt3']. '"' : "NULL";
                
                $this->phindiAL3 = isset($_POST['srb']['hindiALp3']) ? 1:0;
                $this->thindiAL3 = !empty($_POST['srb']['hindiALt3']) ? '"' .$_POST['srb']['hindiALt3']. '"' : "NULL";
                
                $this->partAL3 = isset($_POST['srb']['artALp3']) ? 1:0;
                $this->tartAL3 = !empty($_POST['srb']['artALt3']) ? '"' .$_POST['srb']['artALt3']. '"' : "NULL";
                
                $this->pdramaAL3 = isset($_POST['srb']['dramaALp3']) ? 1:0;
                $this->tdramaAL3 = !empty($_POST['srb']['dramaALt3']) ? '"' .$_POST['srb']['dramaALt3']. '"' : "NULL";
                
                $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
                $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";
                
                $this->ppoliticAL3 = isset($_POST['srb']['politicALp3']) ? 1:0;
                $this->tpoliticAL3 = !empty($_POST['srb']['politicALt3']) ? '"' .$_POST['srb']['politicALt3']. '"' : "NULL";
                
                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
                
                $this->pbusistatAL3 = isset($_POST['srb']['busistatALp3']) ? 1:0;
                $this->tbusistatAL3 = !empty($_POST['srb']['busistatALt3']) ? '"' .$_POST['srb']['busistatALt3']. '"' : "NULL";
            }

        }
        
        if($this->subid3 == 93) {
            
            if($this->clid == 103) { 

                $this->psinAL3 = isset($_POST['srb']['sinALp3']) ? 1:0;
                $this->tsinAL3 = !empty($_POST['srb']['sinALt3']) ? '"' .$_POST['srb']['sinALt3']. '"' : "NULL";

                $this->pGeogAL3 = isset($_POST['srb']['GeogALp3']) ? 1:0;
                $this->tGeogAL3 = !empty($_POST['srb']['GeogALt3']) ? '"' .$_POST['srb']['GeogALt3']. '"' : "NULL";

                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";

                $this->pagriAL3 = isset($_POST['srb']['agriALp3']) ? 1:0;
                $this->tagriAL3 = !empty($_POST['srb']['agriALt3']) ? '"' .$_POST['srb']['agriALt3']. '"' : "NULL";

                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";

            } else if($this->clid == 104) { 

                $this->psinAL3 = isset($_POST['srb']['sinALp3']) ? 1:0;
                $this->tsinAL3 = !empty($_POST['srb']['sinALt3']) ? '"' .$_POST['srb']['sinALt3']. '"' : "NULL";

                $this->pGeogAL3 = isset($_POST['srb']['GeogALp3']) ? 1:0;
                $this->tGeogAL3 = !empty($_POST['srb']['GeogALt3']) ? '"' .$_POST['srb']['GeogALt3']. '"' : "NULL";
                
                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";

                $this->pomusicAL3 = isset($_POST['srb']['omusicALp3']) ? 1:0;
                $this->tomusicAL3 = !empty($_POST['srb']['omusicALt3']) ? '"' .$_POST['srb']['omusicALt3']. '"' : "NULL";
                
                $this->pagriAL3 = isset($_POST['srb']['agriALp3']) ? 1:0;
                $this->tagriAL3 = !empty($_POST['srb']['agriALt3']) ? '"' .$_POST['srb']['agriALt3']. '"' : "NULL";
                
                $this->pheconAL3 = isset($_POST['srb']['heconALp3']) ? 1:0;
                $this->theconAL3 = !empty($_POST['srb']['heconALt3']) ? '"' .$_POST['srb']['heconALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";

            } else {
                $this->psinAL3 = isset($_POST['srb']['sinALp3']) ? 1:0;
                $this->tsinAL3 = !empty($_POST['srb']['sinALt3']) ? '"' .$_POST['srb']['sinALt3']. '"' : "NULL";
                
                $this->pengAL3 = isset($_POST['srb']['engALp3']) ? 1:0;
                $this->tengAL3 = !empty($_POST['srb']['engALt3']) ? '"' .$_POST['srb']['engALt3']. '"' : "NULL";
                
                $this->pGeogAL3 = isset($_POST['srb']['GeogALp3']) ? 1:0;
                $this->tGeogAL3 = !empty($_POST['srb']['GeogALt3']) ? '"' .$_POST['srb']['GeogALt3']. '"' : "NULL";
                
                $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
                $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";

                $this->pomusicAL3 = isset($_POST['srb']['omusicALp3']) ? 1:0;
                $this->tomusicAL3 = !empty($_POST['srb']['omusicALt3']) ? '"' .$_POST['srb']['omusicALt3']. '"' : "NULL";
                
                $this->pagriAL3 = isset($_POST['srb']['agriALp3']) ? 1:0;
                $this->tagriAL3 = !empty($_POST['srb']['agriALt3']) ? '"' .$_POST['srb']['agriALt3']. '"' : "NULL";
                
                $this->pheconAL3 = isset($_POST['srb']['heconALp3']) ? 1:0;
                $this->theconAL3 = !empty($_POST['srb']['heconALt3']) ? '"' .$_POST['srb']['heconALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
            }
        }
        
        if($this->subid3 == 94) {
            
            if($this->clid == 103) { 

                $this->plogicAL3 = isset($_POST['srb']['logicALp3']) ? 1:0;
                $this->tlogicAL3 = !empty($_POST['srb']['logicALt3']) ? '"' .$_POST['srb']['sinALt3']. '"' : "NULL";
                
                $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
                $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";
                
                $this->phistAL3 = isset($_POST['srb']['histALp3']) ? 1:0;
                $this->thistAL3 = !empty($_POST['srb']['histALt3']) ? '"' .$_POST['srb']['histALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";

            } else {
                $this->plogicAL3 = isset($_POST['srb']['logicALp3']) ? 1:0;
                $this->tlogicAL3 = !empty($_POST['srb']['logicALt3']) ? '"' .$_POST['srb']['sinALt3']. '"' : "NULL";
                
                $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
                $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";
                
                $this->phistAL3 = isset($_POST['srb']['histALp3']) ? 1:0;
                $this->thistAL3 = !empty($_POST['srb']['histALt3']) ? '"' .$_POST['srb']['histALt3']. '"' : "NULL";
                
                $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
                $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
                
                $this->pdanceAL3 = isset($_POST['srb']['danceALp3']) ? 1:0;
                $this->tdanceAL3 = !empty($_POST['srb']['danceALt3']) ? '"' .$_POST['srb']['danceALt3']. '"' : "NULL";
            
            }
        }
        
        if($this->subid3 == 95) {
            
            $this->partAL3 = isset($_POST['srb']['artALp3']) ? 1:0; 
            $this->tartAL3 = !empty($_POST['srb']['artALt3']) ? '"' .$_POST['srb']['artALt3']. '"' : "NULL";
            
            $this->pdramaAL3 = isset($_POST['srb']['dramaALp3']) ? 1:0;
            $this->tdramaAL3 = !empty($_POST['srb']['dramaALt3']) ? '"' .$_POST['srb']['dramaALt3']. '"' : "NULL";
            
            $this->peconAL3 = isset($_POST['srb']['econALp3']) ? 1:0;
            $this->teconAL3 = !empty($_POST['srb']['econALt3']) ? '"' .$_POST['srb']['econALt3']. '"' : "NULL";
            
            $this->ppoliticAL3 = isset($_POST['srb']['politicALp3']) ? 1:0;
            $this->tpoliticAL3 = !empty($_POST['srb']['politicALt3']) ? '"' .$_POST['srb']['politicALt3']. '"' : "NULL";

            $this->pmediaAL3 = isset($_POST['srb']['mediaALp3']) ? 1:0;
            $this->tmediaAL3 = !empty($_POST['srb']['mediaALt3']) ? '"' .$_POST['srb']['mediaALt3']. '"' : "NULL";

            $this->pictAL3 = isset($_POST['srb']['ictALp3']) ? 1:0;
            $this->tictAL3 = !empty($_POST['srb']['ictALt3']) ? '"' .$_POST['srb']['ictALt3']. '"' : "NULL";
            
            $this->pbusistatAL3 = isset($_POST['srb']['busistatALp3']) ? 1:0;
            $this->tbusistatAL3 = !empty($_POST['srb']['busistatALt3']) ? '"' .$_POST['srb']['busistatALt3']. '"' : "NULL";

            $this->pbusistudAL3 = isset($_POST['srb']['busistudALp3']) ? 1:0;
            $this->tbusistudAL3 = !empty($_POST['srb']['busistudALt3']) ? '"' .$_POST['srb']['busistudALt3']. '"' : "NULL";
            

        }
        
        
        $this->subid4 = $_POST['srb']['subid4'];
        //$this->p4 = $_POST['srb']['p4'];
        //$this->t4 = $_POST['srb']['t4'];
        $this->p4 = isset($_POST['srb']['p4']) ? 1:0;
        $this->t4 = !empty($_POST['srb']['t4']) ? '"' .$_POST['srb']['t4']. '"' : "NULL";
        
        if($this->subid4 == 88) {
            
            $this->pchAL4 = isset($_POST['srb']['chALp4']) ? 1:0;
            $this->tchAL4 = !empty($_POST['srb']['chALt4']) ? '"' .$_POST['srb']['chALt4']. '"' : "NULL";
            
            $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
            $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";

        }
        
        if($this->subid4 == 89) {
            
            $this->pphAL4 = isset($_POST['srb']['phALp4']) ? 1:0;
            $this->tphAL4 = !empty($_POST['srb']['phALt4']) ? '"' .$_POST['srb']['phALt4']. '"' : "NULL";
            
            $this->pagriAL4 = isset($_POST['srb']['agriALp4']) ? 1:0;
            $this->tagriAL4 = !empty($_POST['srb']['agriALt4']) ? '"' .$_POST['srb']['agriALt4']. '"' : "NULL";

        }
        
        if($this->subid4 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            } else {
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
                
                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pGeogAL4 = isset($_POST['srb']['GeogALp4']) ? 1:0;
                $this->tGeogAL4 = !empty($_POST['srb']['GeogALt4']) ? '"' .$_POST['srb']['GeogALt4']. '"' : "NULL";
                
                $this->pmathAL4 = isset($_POST['srb']['mathALp4']) ? 1:0;
                $this->tmathAL4 = !empty($_POST['srb']['mathALt4']) ? '"' .$_POST['srb']['mathALt4']. '"' : "NULL";
                
                $this->partAL4 = isset($_POST['srb']['artALp4']) ? 1:0;
                $this->tartAL4 = !empty($_POST['srb']['artALt4']) ? '"' .$_POST['srb']['artALt4']. '"' : "NULL";
            }

        }
        
        if($this->subid4 == 91) {
            
            $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
            $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            
            $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
            $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
            
            $this->pGeogAL4 = isset($_POST['srb']['GeogALp4']) ? 1:0;
            $this->tGeogAL4 = !empty($_POST['srb']['GeogALt4']) ? '"' .$_POST['srb']['GeogALt4']. '"' : "NULL";
            
            $this->pagriAL4 = isset($_POST['srb']['agriALp4']) ? 1:0;
            $this->tagriAL4 = !empty($_POST['srb']['agriALt4']) ? '"' .$_POST['srb']['agriALt4']. '"' : "NULL";

        }
        
        if($this->subid4 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
                $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";
                
                $this->ppoliticAL4 = isset($_POST['srb']['politicALp4']) ? 1:0;
                $this->tpoliticAL4 = !empty($_POST['srb']['politicALt4']) ? '"' .$_POST['srb']['politicALt4']. '"' : "NULL";
                
                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
                
                $this->pbusistatAL4 = isset($_POST['srb']['busistatALp4']) ? 1:0;
                $this->tbusistatAL4 = !empty($_POST['srb']['busistatALt4']) ? '"' .$_POST['srb']['busistatALt4']. '"' : "NULL";
            
            } else if($this->clid == 104) { 

                $this->phindiAL4 = isset($_POST['srb']['hindiALp4']) ? 1:0;
                $this->thindiAL4 = !empty($_POST['srb']['hindiALt4']) ? '"' .$_POST['srb']['hindiALt4']. '"' : "NULL";
                
                $this->partAL4 = isset($_POST['srb']['artALp4']) ? 1:0;
                $this->tartAL4 = !empty($_POST['srb']['artALt4']) ? '"' .$_POST['srb']['artALt4']. '"' : "NULL";
                
                $this->pdramaAL4 = isset($_POST['srb']['dramaALp4']) ? 1:0;
                $this->tdramaAL4 = !empty($_POST['srb']['dramaALt4']) ? '"' .$_POST['srb']['dramaALt4']. '"' : "NULL";
                
                $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
                $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";

                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";

            } else {
                $this->pjapAL4 = isset($_POST['srb']['japALp4']) ? 1:0;
                $this->tjapAL4 = !empty($_POST['srb']['japALt4']) ? '"' .$_POST['srb']['japALt4']. '"' : "NULL";
                
                $this->pfrenchAL4 = isset($_POST['srb']['frenchALp4']) ? 1:0;
                $this->tfrenchAL4 = !empty($_POST['srb']['frenchALt4']) ? '"' .$_POST['srb']['frenchALt4']. '"' : "NULL";
                
                $this->pkoreanAL4 = isset($_POST['srb']['koreanALp4']) ? 1:0;
                $this->tkoreanAL4 = !empty($_POST['srb']['koreanALt4']) ? '"' .$_POST['srb']['koreanALt4']. '"' : "NULL";
                
                $this->phindiAL4 = isset($_POST['srb']['hindiALp4']) ? 1:0;
                $this->thindiAL4 = !empty($_POST['srb']['hindiALt4']) ? '"' .$_POST['srb']['hindiALt4']. '"' : "NULL";
                
                $this->partAL4 = isset($_POST['srb']['artALp4']) ? 1:0;
                $this->tartAL4 = !empty($_POST['srb']['artALt4']) ? '"' .$_POST['srb']['artALt4']. '"' : "NULL";
                
                $this->pdramaAL4 = isset($_POST['srb']['dramaALp4']) ? 1:0;
                $this->tdramaAL4 = !empty($_POST['srb']['dramaALt4']) ? '"' .$_POST['srb']['dramaALt4']. '"' : "NULL";
                
                $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
                $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";
                
                $this->ppoliticAL4 = isset($_POST['srb']['politicALp4']) ? 1:0;
                $this->tpoliticAL4 = !empty($_POST['srb']['politicALt4']) ? '"' .$_POST['srb']['politicALt4']. '"' : "NULL";
                
                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
                
                $this->pbusistatAL4 = isset($_POST['srb']['busistatALp4']) ? 1:0;
                $this->tbusistatAL4 = !empty($_POST['srb']['busistatALt4']) ? '"' .$_POST['srb']['busistatALt4']. '"' : "NULL";

            }
        }
        
        if($this->subid4 == 93) {
            if($this->clid == 103) { 
                $this->psinAL4 = isset($_POST['srb']['sinALp4']) ? 1:0;
                $this->tsinAL4 = !empty($_POST['srb']['sinALt4']) ? '"' .$_POST['srb']['sinALt4']. '"' : "NULL";

                $this->pGeogAL4 = isset($_POST['srb']['GeogALp4']) ? 1:0;
                $this->tGeogAL4 = !empty($_POST['srb']['GeogALt4']) ? '"' .$_POST['srb']['GeogALt4']. '"' : "NULL";

                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pagriAL4 = isset($_POST['srb']['agriALp4']) ? 1:0;
                $this->tagriAL4 = !empty($_POST['srb']['agriALt4']) ? '"' .$_POST['srb']['agriALt4']. '"' : "NULL";

                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            
            } else if($this->clid == 104) { 

                $this->psinAL4 = isset($_POST['srb']['sinALp4']) ? 1:0;
                $this->tsinAL4 = !empty($_POST['srb']['sinALt4']) ? '"' .$_POST['srb']['sinALt4']. '"' : "NULL";

                $this->pGeogAL4 = isset($_POST['srb']['GeogALp4']) ? 1:0;
                $this->tGeogAL4 = !empty($_POST['srb']['GeogALt4']) ? '"' .$_POST['srb']['GeogALt4']. '"' : "NULL";

                $this->pomusicAL4 = isset($_POST['srb']['omusicALp4']) ? 1:0;
                $this->tomusicAL4 = !empty($_POST['srb']['omusicALt4']) ? '"' .$_POST['srb']['omusicALt4']. '"' : "NULL";
                
                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pagriAL4 = isset($_POST['srb']['agriALp4']) ? 1:0;
                $this->tagriAL4 = !empty($_POST['srb']['agriALt4']) ? '"' .$_POST['srb']['agriALt4']. '"' : "NULL";
                
                $this->pheconAL4 = isset($_POST['srb']['heconALp4']) ? 1:0;
                $this->theconAL4 = !empty($_POST['srb']['heconALt4']) ? '"' .$_POST['srb']['heconALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";

             } else {
                $this->psinAL4 = isset($_POST['srb']['sinALp4']) ? 1:0;
                $this->tsinAL4 = !empty($_POST['srb']['sinALt4']) ? '"' .$_POST['srb']['sinALt4']. '"' : "NULL";
                
                $this->pengAL4 = isset($_POST['srb']['engALp4']) ? 1:0;
                $this->tengAL4 = !empty($_POST['srb']['engALt4']) ? '"' .$_POST['srb']['engALt4']. '"' : "NULL";
                
                $this->pGeogAL4 = isset($_POST['srb']['GeogALp4']) ? 1:0;
                $this->tGeogAL4 = !empty($_POST['srb']['GeogALt4']) ? '"' .$_POST['srb']['GeogALt4']. '"' : "NULL";

                $this->pomusicAL4 = isset($_POST['srb']['omusicALp4']) ? 1:0;
                $this->tomusicAL4 = !empty($_POST['srb']['omusicALt4']) ? '"' .$_POST['srb']['omusicALt4']. '"' : "NULL";
                
                $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
                $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";
                
                $this->pagriAL4 = isset($_POST['srb']['agriALp4']) ? 1:0;
                $this->tagriAL4 = !empty($_POST['srb']['agriALt4']) ? '"' .$_POST['srb']['agriALt4']. '"' : "NULL";
                
                $this->pheconAL4 = isset($_POST['srb']['heconALp4']) ? 1:0;
                $this->theconAL4 = !empty($_POST['srb']['heconALt4']) ? '"' .$_POST['srb']['heconALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            }
        }
        
        if($this->subid4 == 94) {
            if($this->clid == 103) { 
                $this->plogicAL4 = isset($_POST['srb']['logicALp4']) ? 1:0;
                $this->tlogicAL4 = !empty($_POST['srb']['logicALt4']) ? '"' .$_POST['srb']['sinALt4']. '"' : "NULL";
                
                $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
                $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";
                
                $this->phistAL4 = isset($_POST['srb']['histALp4']) ? 1:0;
                $this->thistAL4 = !empty($_POST['srb']['histALt4']) ? '"' .$_POST['srb']['histALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            } else {
                $this->plogicAL4 = isset($_POST['srb']['logicALp4']) ? 1:0;
                $this->tlogicAL4 = !empty($_POST['srb']['logicALt4']) ? '"' .$_POST['srb']['sinALt4']. '"' : "NULL";
                
                $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
                $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";
                
                $this->phistAL4 = isset($_POST['srb']['histALp4']) ? 1:0;
                $this->thistAL4 = !empty($_POST['srb']['histALt4']) ? '"' .$_POST['srb']['histALt4']. '"' : "NULL";
                
                $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
                $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
                
                $this->pdanceAL4 = isset($_POST['srb']['danceALp4']) ? 1:0;
                $this->tdanceAL4 = !empty($_POST['srb']['danceALt4']) ? '"' .$_POST['srb']['danceALt4']. '"' : "NULL";
            
            }
        }
        
        if($this->subid4 == 95) {
            
            $this->partAL4 = isset($_POST['srb']['artALp4']) ? 1:0; 
            $this->tartAL4 = !empty($_POST['srb']['artALt4']) ? '"' .$_POST['srb']['artALt4']. '"' : "NULL";
            
            $this->pdramaAL4 = isset($_POST['srb']['dramaALp4']) ? 1:0;
            $this->tdramaAL4 = !empty($_POST['srb']['dramaALt4']) ? '"' .$_POST['srb']['dramaALt4']. '"' : "NULL";
            
            $this->peconAL4 = isset($_POST['srb']['econALp4']) ? 1:0;
            $this->teconAL4 = !empty($_POST['srb']['econALt4']) ? '"' .$_POST['srb']['econALt4']. '"' : "NULL";
            
            $this->ppoliticAL4 = isset($_POST['srb']['politicALp4']) ? 1:0;
            $this->tpoliticAL4 = !empty($_POST['srb']['politicALt4']) ? '"' .$_POST['srb']['politicALt4']. '"' : "NULL";

            $this->pmediaAL4 = isset($_POST['srb']['mediaALp4']) ? 1:0;
            $this->tmediaAL4 = !empty($_POST['srb']['mediaALt4']) ? '"' .$_POST['srb']['mediaALt4']. '"' : "NULL";

            $this->pictAL4 = isset($_POST['srb']['ictALp4']) ? 1:0;
            $this->tictAL4 = !empty($_POST['srb']['ictALt4']) ? '"' .$_POST['srb']['ictALt4']. '"' : "NULL";
            
            $this->pbusistatAL4 = isset($_POST['srb']['busistatALp4']) ? 1:0;
            $this->tbusistatAL4 = !empty($_POST['srb']['busistatALt4']) ? '"' .$_POST['srb']['busistatALt4']. '"' : "NULL";

            $this->pbusistudAL4 = isset($_POST['srb']['busistudALp4']) ? 1:0;
            $this->tbusistudAL4 = !empty($_POST['srb']['busistudALt4']) ? '"' .$_POST['srb']['busistudALt4']. '"' : "NULL";
            

        }
        
        
        $this->subid5 = $_POST['srb']['subid5'];
        //$this->p5 = $_POST['srb']['p5'];
        //$this->t5 = $_POST['srb']['t5'];
        $this->p5 = isset($_POST['srb']['p5']) ? 1:0;
        $this->t5 = !empty($_POST['srb']['t5']) ? '"' .$_POST['srb']['t5']. '"' : "NULL";
        
        if($this->subid5 == 88) {
            
            $this->pchAL5 = isset($_POST['srb']['chALp5']) ? 1:0;
            $this->tchAL5 = !empty($_POST['srb']['chALt5']) ? '"' .$_POST['srb']['chALt5']. '"' : "NULL";
            
            $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
            $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";

        }
        
        if($this->subid5 == 89) {
            
            $this->pphAL5 = isset($_POST['srb']['phALp5']) ? 1:0;
            $this->tphAL5 = !empty($_POST['srb']['phALt5']) ? '"' .$_POST['srb']['phALt5']. '"' : "NULL";
            
            $this->pagriAL5 = isset($_POST['srb']['agriALp5']) ? 1:0;
            $this->tagriAL5 = !empty($_POST['srb']['agriALt5']) ? '"' .$_POST['srb']['agriALt5']. '"' : "NULL";

        }
        
        if($this->subid5 == 90) {

            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            } else {
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
                
                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pGeogAL5 = isset($_POST['srb']['GeogALp5']) ? 1:0;
                $this->tGeogAL5 = !empty($_POST['srb']['GeogALt5']) ? '"' .$_POST['srb']['GeogALt5']. '"' : "NULL";
                
                $this->pmathAL5 = isset($_POST['srb']['mathALp5']) ? 1:0;
                $this->tmathAL5 = !empty($_POST['srb']['mathALt5']) ? '"' .$_POST['srb']['mathALt5']. '"' : "NULL";
                
                $this->partAL5 = isset($_POST['srb']['artALp5']) ? 1:0;
                $this->tartAL5 = !empty($_POST['srb']['artALt5']) ? '"' .$_POST['srb']['artALt5']. '"' : "NULL";
            }

        }
        
        if($this->subid5 == 91) {
            
            $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
            $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            
            $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
            $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
            
            $this->pGeogAL5 = isset($_POST['srb']['GeogALp5']) ? 1:0;
            $this->tGeogAL5 = !empty($_POST['srb']['GeogALt5']) ? '"' .$_POST['srb']['GeogALt5']. '"' : "NULL";
            
            $this->pagriAL5 = isset($_POST['srb']['agriALp5']) ? 1:0;
            $this->tagriAL5 = !empty($_POST['srb']['agriALt5']) ? '"' .$_POST['srb']['agriALt5']. '"' : "NULL";

        }
        
        if($this->subid5 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
                $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";
                
                $this->ppoliticAL5 = isset($_POST['srb']['politicALp5']) ? 1:0;
                $this->tpoliticAL5 = !empty($_POST['srb']['politicALt5']) ? '"' .$_POST['srb']['politicALt5']. '"' : "NULL";
                
                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
                
                $this->pbusistatAL5 = isset($_POST['srb']['busistatALp5']) ? 1:0;
                $this->tbusistatAL5 = !empty($_POST['srb']['busistatALt5']) ? '"' .$_POST['srb']['busistatALt5']. '"' : "NULL";
            
            } else if($this->clid == 104) {  

                $this->phindiAL5 = isset($_POST['srb']['hindiALp5']) ? 1:0;
                $this->thindiAL5 = !empty($_POST['srb']['hindiALt5']) ? '"' .$_POST['srb']['hindiALt5']. '"' : "NULL";
                
                $this->partAL5 = isset($_POST['srb']['artALp5']) ? 1:0;
                $this->tartAL5 = !empty($_POST['srb']['artALt5']) ? '"' .$_POST['srb']['artALt5']. '"' : "NULL";
                
                $this->pdramaAL5 = isset($_POST['srb']['dramaALp5']) ? 1:0;
                $this->tdramaAL5 = !empty($_POST['srb']['dramaALt5']) ? '"' .$_POST['srb']['dramaALt5']. '"' : "NULL";
                
                $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
                $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";

                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";

            } else {
                $this->pjapAL5 = isset($_POST['srb']['japALp5']) ? 1:0;
                $this->tjapAL5 = !empty($_POST['srb']['japALt5']) ? '"' .$_POST['srb']['japALt5']. '"' : "NULL";
                
                $this->pfrenchAL5 = isset($_POST['srb']['frenchALp5']) ? 1:0;
                $this->tfrenchAL5 = !empty($_POST['srb']['frenchALt5']) ? '"' .$_POST['srb']['frenchALt5']. '"' : "NULL";
                
                $this->pkoreanAL5 = isset($_POST['srb']['koreanALp5']) ? 1:0;
                $this->tkoreanAL5 = !empty($_POST['srb']['koreanALt5']) ? '"' .$_POST['srb']['koreanALt5']. '"' : "NULL";
                
                $this->phindiAL5 = isset($_POST['srb']['hindiALp5']) ? 1:0;
                $this->thindiAL5 = !empty($_POST['srb']['hindiALt5']) ? '"' .$_POST['srb']['hindiALt5']. '"' : "NULL";
                
                $this->partAL5 = isset($_POST['srb']['artALp5']) ? 1:0;
                $this->tartAL5 = !empty($_POST['srb']['artALt5']) ? '"' .$_POST['srb']['artALt5']. '"' : "NULL";
                
                $this->pdramaAL5 = isset($_POST['srb']['dramaALp5']) ? 1:0;
                $this->tdramaAL5 = !empty($_POST['srb']['dramaALt5']) ? '"' .$_POST['srb']['dramaALt5']. '"' : "NULL";
                
                $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
                $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";
                
                $this->ppoliticAL5 = isset($_POST['srb']['politicALp5']) ? 1:0;
                $this->tpoliticAL5 = !empty($_POST['srb']['politicALt5']) ? '"' .$_POST['srb']['politicALt5']. '"' : "NULL";
                
                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
                
                $this->pbusistatAL5 = isset($_POST['srb']['busistatALp5']) ? 1:0;
                $this->tbusistatAL5 = !empty($_POST['srb']['busistatALt5']) ? '"' .$_POST['srb']['busistatALt5']. '"' : "NULL";
            }

        }
        
        if($this->subid5 == 93) {
            if($this->clid == 103) { 
                $this->psinAL5 = isset($_POST['srb']['sinALp5']) ? 1:0;
                $this->tsinAL5 = !empty($_POST['srb']['sinALt5']) ? '"' .$_POST['srb']['sinALt5']. '"' : "NULL";

                $this->pGeogAL5 = isset($_POST['srb']['GeogALp5']) ? 1:0;
                $this->tGeogAL5 = !empty($_POST['srb']['GeogALt5']) ? '"' .$_POST['srb']['GeogALt5']. '"' : "NULL";

                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pagriAL5 = isset($_POST['srb']['agriALp5']) ? 1:0;
                $this->tagriAL5 = !empty($_POST['srb']['agriALt5']) ? '"' .$_POST['srb']['agriALt5']. '"' : "NULL";

                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            
            } else if($this->clid == 104) { 

                $this->psinAL5 = isset($_POST['srb']['sinALp5']) ? 1:0;
                $this->tsinAL5 = !empty($_POST['srb']['sinALt5']) ? '"' .$_POST['srb']['sinALt5']. '"' : "NULL";

                $this->pGeogAL5 = isset($_POST['srb']['GeogALp5']) ? 1:0;
                $this->tGeogAL5 = !empty($_POST['srb']['GeogALt5']) ? '"' .$_POST['srb']['GeogALt5']. '"' : "NULL";

                $this->pomusicAL5 = isset($_POST['srb']['omusicALp5']) ? 1:0;
                $this->tomusicAL5 = !empty($_POST['srb']['omusicALt5']) ? '"' .$_POST['srb']['omusicALt5']. '"' : "NULL";
                
                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pagriAL5 = isset($_POST['srb']['agriALp5']) ? 1:0;
                $this->tagriAL5 = !empty($_POST['srb']['agriALt5']) ? '"' .$_POST['srb']['agriALt5']. '"' : "NULL";
                
                $this->pheconAL5 = isset($_POST['srb']['heconALp5']) ? 1:0;
                $this->theconAL5 = !empty($_POST['srb']['heconALt5']) ? '"' .$_POST['srb']['heconALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";

            } else {
                $this->psinAL5 = isset($_POST['srb']['sinALp5']) ? 1:0;
                $this->tsinAL5 = !empty($_POST['srb']['sinALt5']) ? '"' .$_POST['srb']['sinALt5']. '"' : "NULL";
                
                $this->pengAL5 = isset($_POST['srb']['engALp5']) ? 1:0;
                $this->tengAL5 = !empty($_POST['srb']['engALt5']) ? '"' .$_POST['srb']['engALt5']. '"' : "NULL";
                
                $this->pGeogAL5 = isset($_POST['srb']['GeogALp5']) ? 1:0;
                $this->tGeogAL5 = !empty($_POST['srb']['GeogALt5']) ? '"' .$_POST['srb']['GeogALt5']. '"' : "NULL";

                $this->pomusicAL5 = isset($_POST['srb']['omusicALp5']) ? 1:0;
                $this->tomusicAL5 = !empty($_POST['srb']['omusicALt5']) ? '"' .$_POST['srb']['omusicALt5']. '"' : "NULL";
                
                $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
                $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";
                
                $this->pagriAL5 = isset($_POST['srb']['agriALp5']) ? 1:0;
                $this->tagriAL5 = !empty($_POST['srb']['agriALt5']) ? '"' .$_POST['srb']['agriALt5']. '"' : "NULL";
                
                $this->pheconAL5 = isset($_POST['srb']['heconALp5']) ? 1:0;
                $this->theconAL5 = !empty($_POST['srb']['heconALt5']) ? '"' .$_POST['srb']['heconALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            }
        }
        
        if($this->subid5 == 94) {
            
            if($this->clid == 103) { 
                $this->plogicAL5 = isset($_POST['srb']['logicALp5']) ? 1:0;
                $this->tlogicAL5 = !empty($_POST['srb']['logicALt5']) ? '"' .$_POST['srb']['sinALt5']. '"' : "NULL";
                
                $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
                $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";
                
                $this->phistAL5 = isset($_POST['srb']['histALp5']) ? 1:0;
                $this->thistAL5 = !empty($_POST['srb']['histALt5']) ? '"' .$_POST['srb']['histALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            } else {
                $this->plogicAL5 = isset($_POST['srb']['logicALp5']) ? 1:0;
                $this->tlogicAL5 = !empty($_POST['srb']['logicALt5']) ? '"' .$_POST['srb']['sinALt5']. '"' : "NULL";
                
                $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
                $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";
                
                $this->phistAL5 = isset($_POST['srb']['histALp5']) ? 1:0;
                $this->thistAL5 = !empty($_POST['srb']['histALt5']) ? '"' .$_POST['srb']['histALt5']. '"' : "NULL";
                
                $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
                $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
                
                $this->pdanceAL5 = isset($_POST['srb']['danceALp5']) ? 1:0;
                $this->tdanceAL5 = !empty($_POST['srb']['danceALt5']) ? '"' .$_POST['srb']['danceALt5']. '"' : "NULL";
            
            }
        }
        
        if($this->subid5 == 95) {
            
            $this->partAL5 = isset($_POST['srb']['artALp5']) ? 1:0; 
            $this->tartAL5 = !empty($_POST['srb']['artALt5']) ? '"' .$_POST['srb']['artALt5']. '"' : "NULL";
            
            $this->pdramaAL5 = isset($_POST['srb']['dramaALp5']) ? 1:0;
            $this->tdramaAL5 = !empty($_POST['srb']['dramaALt5']) ? '"' .$_POST['srb']['dramaALt5']. '"' : "NULL";
            
            $this->peconAL5 = isset($_POST['srb']['econALp5']) ? 1:0;
            $this->teconAL5 = !empty($_POST['srb']['econALt5']) ? '"' .$_POST['srb']['econALt5']. '"' : "NULL";
            
            $this->ppoliticAL5 = isset($_POST['srb']['politicALp5']) ? 1:0;
            $this->tpoliticAL5 = !empty($_POST['srb']['politicALt5']) ? '"' .$_POST['srb']['politicALt5']. '"' : "NULL";

            $this->pmediaAL5 = isset($_POST['srb']['mediaALp5']) ? 1:0;
            $this->tmediaAL5 = !empty($_POST['srb']['mediaALt5']) ? '"' .$_POST['srb']['mediaALt5']. '"' : "NULL";

            $this->pictAL5 = isset($_POST['srb']['ictALp5']) ? 1:0;
            $this->tictAL5 = !empty($_POST['srb']['ictALt5']) ? '"' .$_POST['srb']['ictALt5']. '"' : "NULL";
            
            $this->pbusistatAL5 = isset($_POST['srb']['busistatALp5']) ? 1:0;
            $this->tbusistatAL5 = !empty($_POST['srb']['busistatALt5']) ? '"' .$_POST['srb']['busistatALt5']. '"' : "NULL";

            $this->pbusistudAL5 = isset($_POST['srb']['busistudALp5']) ? 1:0;
            $this->tbusistudAL5 = !empty($_POST['srb']['busistudALt5']) ? '"' .$_POST['srb']['busistudALt5']. '"' : "NULL";
            

        }

        $this->subid6 = $_POST['srb']['subid6'];
        //$this->p6 = $_POST['srb']['p6'];
        //$this->t6 = $_POST['srb']['t6'];
        $this->p6 = isset($_POST['srb']['p6']) ? 1:0;
        $this->t6 = !empty($_POST['srb']['t6']) ? '"' .$_POST['srb']['t6']. '"' : "NULL";
        
        if($this->subid6 == 88) {
            
            $this->pchAL6 = isset($_POST['srb']['chALp6']) ? 1:0;
            $this->tchAL6 = !empty($_POST['srb']['chALt6']) ? '"' .$_POST['srb']['chALt6']. '"' : "NULL";
            
            $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
            $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

        }
        
        if($this->subid6 == 89) {
            
            $this->pphAL6 = isset($_POST['srb']['phALp6']) ? 1:0;
            $this->tphAL6 = !empty($_POST['srb']['phALt6']) ? '"' .$_POST['srb']['phALt6']. '"' : "NULL";
            
            $this->pagriAL6 = isset($_POST['srb']['agriALp6']) ? 1:0;
            $this->tagriAL6 = !empty($_POST['srb']['agriALt6']) ? '"' .$_POST['srb']['agriALt6']. '"' : "NULL";

        }
        
        if($this->subid6 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
            } else {
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pGeogAL6 = isset($_POST['srb']['GeogALp6']) ? 1:0;
                $this->tGeogAL6 = !empty($_POST['srb']['GeogALt6']) ? '"' .$_POST['srb']['GeogALt6']. '"' : "NULL";
                
                $this->pmathAL6 = isset($_POST['srb']['mathALp6']) ? 1:0;
                $this->tmathAL6 = !empty($_POST['srb']['mathALt6']) ? '"' .$_POST['srb']['mathALt6']. '"' : "NULL";
                
                $this->partAL6 = isset($_POST['srb']['artALp6']) ? 1:0;
                $this->tartAL6 = !empty($_POST['srb']['artALt6']) ? '"' .$_POST['srb']['artALt6']. '"' : "NULL";
            }

        }
        
        if($this->subid6 == 91) {
            
            $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
            $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
            
            $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
            $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
            
            $this->pGeogAL6 = isset($_POST['srb']['GeogALp6']) ? 1:0;
            $this->tGeogAL6 = !empty($_POST['srb']['GeogALt6']) ? '"' .$_POST['srb']['GeogALt6']. '"' : "NULL";
            
            $this->pagriAL6 = isset($_POST['srb']['agriALp6']) ? 1:0;
            $this->tagriAL6 = !empty($_POST['srb']['agriALt6']) ? '"' .$_POST['srb']['agriALt6']. '"' : "NULL";

        }
        
        if($this->subid6 == 92) {
            
            if($this->clid == 103) { 
                $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
                $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";
                
                $this->ppoliticAL6 = isset($_POST['srb']['politicALp6']) ? 1:0;
                $this->tpoliticAL6 = !empty($_POST['srb']['politicALt6']) ? '"' .$_POST['srb']['politicALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

                $this->pbusistatAL6 = isset($_POST['srb']['busistatALp6']) ? 1:0;
                $this->tbusistatAL6 = !empty($_POST['srb']['busistatALt6']) ? '"' .$_POST['srb']['busistatALt6']. '"' : "NULL";
            
            } else if($this->clid == 104) {  

                $this->phindiAL6 = isset($_POST['srb']['hindiALp6']) ? 1:0;
                $this->thindiAL6 = !empty($_POST['srb']['hindiALt6']) ? '"' .$_POST['srb']['hindiALt6']. '"' : "NULL";
                
                $this->partAL6 = isset($_POST['srb']['artALp6']) ? 1:0;
                $this->tartAL6 = !empty($_POST['srb']['artALt6']) ? '"' .$_POST['srb']['artALt6']. '"' : "NULL";
                
                $this->pdramaAL6 = isset($_POST['srb']['dramaALp6']) ? 1:0;
                $this->tdramaAL6 = !empty($_POST['srb']['dramaALt6']) ? '"' .$_POST['srb']['dramaALt6']. '"' : "NULL";
                
                $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
                $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";

                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

            } else {
                $this->pjapAL6 = isset($_POST['srb']['japALp6']) ? 1:0;
                $this->tjapAL6 = !empty($_POST['srb']['japALt6']) ? '"' .$_POST['srb']['japALt6']. '"' : "NULL";
                
                $this->pfrenchAL6 = isset($_POST['srb']['frenchALp6']) ? 1:0;
                $this->tfrenchAL6 = !empty($_POST['srb']['frenchALt6']) ? '"' .$_POST['srb']['frenchALt6']. '"' : "NULL";
                
                $this->pkoreanAL6 = isset($_POST['srb']['koreanALp6']) ? 1:0;
                $this->tkoreanAL6 = !empty($_POST['srb']['koreanALt6']) ? '"' .$_POST['srb']['koreanALt6']. '"' : "NULL";
                
                $this->phindiAL6 = isset($_POST['srb']['hindiALp6']) ? 1:0;
                $this->thindiAL6 = !empty($_POST['srb']['hindiALt6']) ? '"' .$_POST['srb']['hindiALt6']. '"' : "NULL";
                
                $this->partAL6 = isset($_POST['srb']['artALp6']) ? 1:0;
                $this->tartAL6 = !empty($_POST['srb']['artALt6']) ? '"' .$_POST['srb']['artALt6']. '"' : "NULL";
                
                $this->pdramaAL6 = isset($_POST['srb']['dramaALp6']) ? 1:0;
                $this->tdramaAL6 = !empty($_POST['srb']['dramaALt6']) ? '"' .$_POST['srb']['dramaALt6']. '"' : "NULL";
                
                $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
                $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";
                
                $this->ppoliticAL6 = isset($_POST['srb']['politicALp6']) ? 1:0;
                $this->tpoliticAL6 = !empty($_POST['srb']['politicALt6']) ? '"' .$_POST['srb']['politicALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
                
                $this->pbusistatAL6 = isset($_POST['srb']['busistatALp6']) ? 1:0;
                $this->tbusistatAL6 = !empty($_POST['srb']['busistatALt6']) ? '"' .$_POST['srb']['busistatALt6']. '"' : "NULL";

            }
        }
        
        if($this->subid6 == 93) {

            if($this->clid == 103) { 

                $this->psinAL6 = isset($_POST['srb']['sinALp6']) ? 1:0;
                $this->tsinAL6 = !empty($_POST['srb']['sinALt6']) ? '"' .$_POST['srb']['sinALt6']. '"' : "NULL";
                
                $this->pGeogAL6 = isset($_POST['srb']['GeogALp6']) ? 1:0;
                $this->tGeogAL6 = !empty($_POST['srb']['GeogALt6']) ? '"' .$_POST['srb']['GeogALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pagriAL6 = isset($_POST['srb']['agriALp6']) ? 1:0;
                $this->tagriAL6 = !empty($_POST['srb']['agriALt6']) ? '"' .$_POST['srb']['agriALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

            } else if($this->clid == 104) {

                $this->psinAL6 = isset($_POST['srb']['sinALp6']) ? 1:0;
                $this->tsinAL6 = !empty($_POST['srb']['sinALt6']) ? '"' .$_POST['srb']['sinALt6']. '"' : "NULL";

                $this->pGeogAL6 = isset($_POST['srb']['GeogALp6']) ? 1:0;
                $this->tGeogAL6 = !empty($_POST['srb']['GeogALt6']) ? '"' .$_POST['srb']['GeogALt6']. '"' : "NULL";

                $this->pomusicAL6 = isset($_POST['srb']['omusicALp6']) ? 1:0;
                $this->tomusicAL6 = !empty($_POST['srb']['omusicALt6']) ? '"' .$_POST['srb']['omusicALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pagriAL6 = isset($_POST['srb']['agriALp6']) ? 1:0;
                $this->tagriAL6 = !empty($_POST['srb']['agriALt6']) ? '"' .$_POST['srb']['agriALt6']. '"' : "NULL";
                
                $this->pheconAL6 = isset($_POST['srb']['heconALp6']) ? 1:0;
                $this->theconAL6 = !empty($_POST['srb']['heconALt6']) ? '"' .$_POST['srb']['heconALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

            } else {
                $this->psinAL6 = isset($_POST['srb']['sinALp6']) ? 1:0;
                $this->tsinAL6 = !empty($_POST['srb']['sinALt6']) ? '"' .$_POST['srb']['sinALt6']. '"' : "NULL";
                
                $this->pengAL6 = isset($_POST['srb']['engALp6']) ? 1:0;
                $this->tengAL6 = !empty($_POST['srb']['engALt6']) ? '"' .$_POST['srb']['engALt6']. '"' : "NULL";
                
                $this->pGeogAL6 = isset($_POST['srb']['GeogALp6']) ? 1:0;
                $this->tGeogAL6 = !empty($_POST['srb']['GeogALt6']) ? '"' .$_POST['srb']['GeogALt6']. '"' : "NULL";

                $this->pomusicAL6 = isset($_POST['srb']['omusicALp6']) ? 1:0;
                $this->tomusicAL6 = !empty($_POST['srb']['omusicALt6']) ? '"' .$_POST['srb']['omusicALt6']. '"' : "NULL";
                
                $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
                $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";
                
                $this->pagriAL6 = isset($_POST['srb']['agriALp6']) ? 1:0;
                $this->tagriAL6 = !empty($_POST['srb']['agriALt6']) ? '"' .$_POST['srb']['agriALt6']. '"' : "NULL";
                
                $this->pheconAL6 = isset($_POST['srb']['heconALp6']) ? 1:0;
                $this->theconAL6 = !empty($_POST['srb']['heconALt6']) ? '"' .$_POST['srb']['heconALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
            }
        }
        
        if($this->subid6 == 94) {
            
            if($this->clid == 103) { 

                $this->plogicAL6 = isset($_POST['srb']['logicALp6']) ? 1:0;
                $this->tlogicAL6 = !empty($_POST['srb']['logicALt6']) ? '"' .$_POST['srb']['sinALt6']. '"' : "NULL";
                
                $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
                $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";
                
                $this->phistAL6 = isset($_POST['srb']['histALp6']) ? 1:0;
                $this->thistAL6 = !empty($_POST['srb']['histALt6']) ? '"' .$_POST['srb']['histALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";

            } else {

                $this->plogicAL6 = isset($_POST['srb']['logicALp6']) ? 1:0;
                $this->tlogicAL6 = !empty($_POST['srb']['logicALt6']) ? '"' .$_POST['srb']['sinALt6']. '"' : "NULL";
                
                $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
                $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";
                
                $this->phistAL6 = isset($_POST['srb']['histALp6']) ? 1:0;
                $this->thistAL6 = !empty($_POST['srb']['histALt6']) ? '"' .$_POST['srb']['histALt6']. '"' : "NULL";
                
                $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
                $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
                
                $this->pdanceAL6 = isset($_POST['srb']['danceALp6']) ? 1:0;
                $this->tdanceAL6 = !empty($_POST['srb']['danceALt6']) ? '"' .$_POST['srb']['danceALt6']. '"' : "NULL";
            }

        }
        
        if($this->subid6 == 95) {
            
            $this->partAL6 = isset($_POST['srb']['artALp6']) ? 1:0; 
            $this->tartAL6 = !empty($_POST['srb']['artALt6']) ? '"' .$_POST['srb']['artALt6']. '"' : "NULL";
            
            $this->pdramaAL6 = isset($_POST['srb']['dramaALp6']) ? 1:0;
            $this->tdramaAL6 = !empty($_POST['srb']['dramaALt6']) ? '"' .$_POST['srb']['dramaALt6']. '"' : "NULL";
            
            $this->peconAL6 = isset($_POST['srb']['econALp6']) ? 1:0;
            $this->teconAL6 = !empty($_POST['srb']['econALt6']) ? '"' .$_POST['srb']['econALt6']. '"' : "NULL";
            
            $this->ppoliticAL6 = isset($_POST['srb']['politicALp6']) ? 1:0;
            $this->tpoliticAL6 = !empty($_POST['srb']['politicALt6']) ? '"' .$_POST['srb']['politicALt6']. '"' : "NULL";

            $this->pmediaAL6 = isset($_POST['srb']['mediaALp6']) ? 1:0;
            $this->tmediaAL6 = !empty($_POST['srb']['mediaALt6']) ? '"' .$_POST['srb']['mediaALt6']. '"' : "NULL";

            $this->pictAL6 = isset($_POST['srb']['ictALp6']) ? 1:0;
            $this->tictAL6 = !empty($_POST['srb']['ictALt6']) ? '"' .$_POST['srb']['ictALt6']. '"' : "NULL";
            
            $this->pbusistatAL6 = isset($_POST['srb']['busistatALp6']) ? 1:0;
            $this->tbusistatAL6 = !empty($_POST['srb']['busistatALt6']) ? '"' .$_POST['srb']['busistatALt6']. '"' : "NULL";

            $this->pbusistudAL6 = isset($_POST['srb']['busistudALp6']) ? 1:0;
            $this->tbusistudAL6 = !empty($_POST['srb']['busistudALt6']) ? '"' .$_POST['srb']['busistudALt6']. '"' : "NULL";
            

        }
        
        $this->subid7 = $_POST['srb']['subid7'];
        //$this->p7 = $_POST['srb']['p7'];
        //$this->t7 = $_POST['srb']['t7'];
        $this->p7 = isset($_POST['srb']['p7']) ? 1:0;
        $this->t7 = !empty($_POST['srb']['t7']) ? '"' .$_POST['srb']['t7']. '"' : "NULL";
        
        if($this->subid7 == 88) {
            
            $this->pchAL7 = isset($_POST['srb']['chALp7']) ? 1:0;
            $this->tchAL7 = !empty($_POST['srb']['chALt7']) ? '"' .$_POST['srb']['chALt7']. '"' : "NULL";
            
            $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
            $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";

        }
        
        if($this->subid7 == 89) {
            
            $this->pphAL7 = isset($_POST['srb']['phALp7']) ? 1:0;
            $this->tphAL7 = !empty($_POST['srb']['phALt7']) ? '"' .$_POST['srb']['phALt7']. '"' : "NULL";
            
            $this->pagriAL7 = isset($_POST['srb']['agriALp7']) ? 1:0;
            $this->tagriAL7 = !empty($_POST['srb']['agriALt7']) ? '"' .$_POST['srb']['agriALt7']. '"' : "NULL";

        }
        
        if($this->subid7 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
            } else {
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pGeogAL7 = isset($_POST['srb']['GeogALp7']) ? 1:0;
                $this->tGeogAL7 = !empty($_POST['srb']['GeogALt7']) ? '"' .$_POST['srb']['GeogALt7']. '"' : "NULL";
                
                $this->pmathAL7 = isset($_POST['srb']['mathALp7']) ? 1:0;
                $this->tmathAL7 = !empty($_POST['srb']['mathALt7']) ? '"' .$_POST['srb']['mathALt7']. '"' : "NULL";
                
                $this->partAL7 = isset($_POST['srb']['artALp7']) ? 1:0;
                $this->tartAL7 = !empty($_POST['srb']['artALt7']) ? '"' .$_POST['srb']['artALt7']. '"' : "NULL";
            }

        }
        
        if($this->subid7 == 91) {
            
            $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
            $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
            
            $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
            $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
            
            $this->pGeogAL7 = isset($_POST['srb']['GeogALp7']) ? 1:0;
            $this->tGeogAL7 = !empty($_POST['srb']['GeogALt7']) ? '"' .$_POST['srb']['GeogALt7']. '"' : "NULL";
            
            $this->pagriAL7 = isset($_POST['srb']['agriALp7']) ? 1:0;
            $this->tagriAL7 = !empty($_POST['srb']['agriALt7']) ? '"' .$_POST['srb']['agriALt7']. '"' : "NULL";

        }
        
        if($this->subid7 == 92) {
            
            if($this->clid == 103) { 
                $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
                $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";
                
                $this->ppoliticAL7 = isset($_POST['srb']['politicALp7']) ? 1:0;
                $this->tpoliticAL7 = !empty($_POST['srb']['politicALt7']) ? '"' .$_POST['srb']['politicALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
                
                $this->pbusistatAL7 = isset($_POST['srb']['busistatALp7']) ? 1:0;
                $this->tbusistatAL7 = !empty($_POST['srb']['busistatALt7']) ? '"' .$_POST['srb']['busistatALt7']. '"' : "NULL";
            
            } else if($this->clid == 104) {

                $this->phindiAL7 = isset($_POST['srb']['hindiALp7']) ? 1:0;
                $this->thindiAL7 = !empty($_POST['srb']['hindiALt7']) ? '"' .$_POST['srb']['hindiALt7']. '"' : "NULL";
                
                $this->partAL7 = isset($_POST['srb']['artALp7']) ? 1:0;
                $this->tartAL7 = !empty($_POST['srb']['artALt7']) ? '"' .$_POST['srb']['artALt7']. '"' : "NULL";
                
                $this->pdramaAL7 = isset($_POST['srb']['dramaALp7']) ? 1:0;
                $this->tdramaAL7 = !empty($_POST['srb']['dramaALt7']) ? '"' .$_POST['srb']['dramaALt7']. '"' : "NULL";
                
                $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
                $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";

                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
                
                $this->pbusistatAL7 = isset($_POST['srb']['busistatALp7']) ? 1:0;
                $this->tbusistatAL7 = !empty($_POST['srb']['busistatALt7']) ? '"' .$_POST['srb']['busistatALt7']. '"' : "NULL";

            } else {
                $this->pjapAL7 = isset($_POST['srb']['japALp7']) ? 1:0;
                $this->tjapAL7 = !empty($_POST['srb']['japALt7']) ? '"' .$_POST['srb']['japALt7']. '"' : "NULL";
                
                $this->pfrenchAL7 = isset($_POST['srb']['frenchALp7']) ? 1:0;
                $this->tfrenchAL7 = !empty($_POST['srb']['frenchALt7']) ? '"' .$_POST['srb']['frenchALt7']. '"' : "NULL";
                
                $this->pkoreanAL7 = isset($_POST['srb']['koreanALp7']) ? 1:0;
                $this->tkoreanAL7 = !empty($_POST['srb']['koreanALt7']) ? '"' .$_POST['srb']['koreanALt7']. '"' : "NULL";
                
                $this->phindiAL7 = isset($_POST['srb']['hindiALp7']) ? 1:0;
                $this->thindiAL7 = !empty($_POST['srb']['hindiALt7']) ? '"' .$_POST['srb']['hindiALt7']. '"' : "NULL";
                
                $this->partAL7 = isset($_POST['srb']['artALp7']) ? 1:0;
                $this->tartAL7 = !empty($_POST['srb']['artALt7']) ? '"' .$_POST['srb']['artALt7']. '"' : "NULL";
                
                $this->pdramaAL7 = isset($_POST['srb']['dramaALp7']) ? 1:0;
                $this->tdramaAL7 = !empty($_POST['srb']['dramaALt7']) ? '"' .$_POST['srb']['dramaALt7']. '"' : "NULL";
                
                $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
                $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";
                
                $this->ppoliticAL7 = isset($_POST['srb']['politicALp7']) ? 1:0;
                $this->tpoliticAL7 = !empty($_POST['srb']['politicALt7']) ? '"' .$_POST['srb']['politicALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
                
                $this->pbusistatAL7 = isset($_POST['srb']['busistatALp7']) ? 1:0;
                $this->tbusistatAL7 = !empty($_POST['srb']['busistatALt7']) ? '"' .$_POST['srb']['busistatALt7']. '"' : "NULL";
            }

        }
        
        if($this->subid7 == 93) {
            
            if($this->clid == 103) { 

                $this->psinAL7 = isset($_POST['srb']['sinALp7']) ? 1:0;
                $this->tsinAL7 = !empty($_POST['srb']['sinALt7']) ? '"' .$_POST['srb']['sinALt7']. '"' : "NULL";
                
                $this->pGeogAL7 = isset($_POST['srb']['GeogALp7']) ? 1:0;
                $this->tGeogAL7 = !empty($_POST['srb']['GeogALt7']) ? '"' .$_POST['srb']['GeogALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pagriAL7 = isset($_POST['srb']['agriALp7']) ? 1:0;
                $this->tagriAL7 = !empty($_POST['srb']['agriALt7']) ? '"' .$_POST['srb']['agriALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";

            } else if($this->clid == 104) { 

                $this->psinAL7 = isset($_POST['srb']['sinALp7']) ? 1:0;
                $this->tsinAL7 = !empty($_POST['srb']['sinALt7']) ? '"' .$_POST['srb']['sinALt7']. '"' : "NULL";

                $this->pGeogAL7 = isset($_POST['srb']['GeogALp7']) ? 1:0;
                $this->tGeogAL7 = !empty($_POST['srb']['GeogALt7']) ? '"' .$_POST['srb']['GeogALt7']. '"' : "NULL";

                $this->pomusicAL7 = isset($_POST['srb']['omusicALp7']) ? 1:0;
                $this->tomusicAL7 = !empty($_POST['srb']['omusicALt7']) ? '"' .$_POST['srb']['omusicALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pagriAL7 = isset($_POST['srb']['agriALp7']) ? 1:0;
                $this->tagriAL7 = !empty($_POST['srb']['agriALt7']) ? '"' .$_POST['srb']['agriALt7']. '"' : "NULL";
                
                $this->pheconAL7 = isset($_POST['srb']['heconALp7']) ? 1:0;
                $this->theconAL7 = !empty($_POST['srb']['heconALt7']) ? '"' .$_POST['srb']['heconALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";

            } else {
                $this->psinAL7 = isset($_POST['srb']['sinALp7']) ? 1:0;
                $this->tsinAL7 = !empty($_POST['srb']['sinALt7']) ? '"' .$_POST['srb']['sinALt7']. '"' : "NULL";
                
                $this->pengAL7 = isset($_POST['srb']['engALp7']) ? 1:0;
                $this->tengAL7 = !empty($_POST['srb']['engALt7']) ? '"' .$_POST['srb']['engALt7']. '"' : "NULL";
                
                $this->pGeogAL7 = isset($_POST['srb']['GeogALp7']) ? 1:0;
                $this->tGeogAL7 = !empty($_POST['srb']['GeogALt7']) ? '"' .$_POST['srb']['GeogALt7']. '"' : "NULL";

                $this->pomusicAL7 = isset($_POST['srb']['omusicALp7']) ? 1:0;
                $this->tomusicAL7 = !empty($_POST['srb']['omusicALt7']) ? '"' .$_POST['srb']['omusicALt7']. '"' : "NULL";
                
                $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
                $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";
                
                $this->pagriAL7 = isset($_POST['srb']['agriALp7']) ? 1:0;
                $this->tagriAL7 = !empty($_POST['srb']['agriALt7']) ? '"' .$_POST['srb']['agriALt7']. '"' : "NULL";
                
                $this->pheconAL7 = isset($_POST['srb']['heconALp7']) ? 1:0;
                $this->theconAL7 = !empty($_POST['srb']['heconALt7']) ? '"' .$_POST['srb']['heconALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
            }
        }
        
        if($this->subid7 == 94) {
            
            if($this->clid == 103) { 

                $this->plogicAL7 = isset($_POST['srb']['logicALp7']) ? 1:0;
                $this->tlogicAL7 = !empty($_POST['srb']['logicALt7']) ? '"' .$_POST['srb']['sinALt7']. '"' : "NULL";
                
                $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
                $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";
                
                $this->phistAL7 = isset($_POST['srb']['histALp7']) ? 1:0;
                $this->thistAL7 = !empty($_POST['srb']['histALt7']) ? '"' .$_POST['srb']['histALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";

            } else {
                $this->plogicAL7 = isset($_POST['srb']['logicALp7']) ? 1:0;
                $this->tlogicAL7 = !empty($_POST['srb']['logicALt7']) ? '"' .$_POST['srb']['sinALt7']. '"' : "NULL";
                
                $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
                $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";
                
                $this->phistAL7 = isset($_POST['srb']['histALp7']) ? 1:0;
                $this->thistAL7 = !empty($_POST['srb']['histALt7']) ? '"' .$_POST['srb']['histALt7']. '"' : "NULL";
                
                $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
                $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
                
                $this->pdanceAL7 = isset($_POST['srb']['danceALp7']) ? 1:0;
                $this->tdanceAL7 = !empty($_POST['srb']['danceALt7']) ? '"' .$_POST['srb']['danceALt7']. '"' : "NULL";
            }

        }
        
        if($this->subid7 == 95) {
            
            $this->partAL7 = isset($_POST['srb']['artALp7']) ? 1:0; 
            $this->tartAL7 = !empty($_POST['srb']['artALt7']) ? '"' .$_POST['srb']['artALt7']. '"' : "NULL";
            
            $this->pdramaAL7 = isset($_POST['srb']['dramaALp1']) ? 1:0;
            $this->tdramaAL7 = !empty($_POST['srb']['dramaALt7']) ? '"' .$_POST['srb']['dramaALt7']. '"' : "NULL";
            
            $this->peconAL7 = isset($_POST['srb']['econALp7']) ? 1:0;
            $this->teconAL7 = !empty($_POST['srb']['econALt7']) ? '"' .$_POST['srb']['econALt7']. '"' : "NULL";
            
            $this->ppoliticAL7 = isset($_POST['srb']['politicALp7']) ? 1:0;
            $this->tpoliticAL7 = !empty($_POST['srb']['politicALt7']) ? '"' .$_POST['srb']['politicALt7']. '"' : "NULL";

            $this->pmediaAL7 = isset($_POST['srb']['mediaALp7']) ? 1:0;
            $this->tmediaAL7 = !empty($_POST['srb']['mediaALt7']) ? '"' .$_POST['srb']['mediaALt7']. '"' : "NULL";

            $this->pictAL7 = isset($_POST['srb']['ictALp7']) ? 1:0;
            $this->tictAL7 = !empty($_POST['srb']['ictALt7']) ? '"' .$_POST['srb']['ictALt7']. '"' : "NULL";
            
            $this->pbusistatAL7 = isset($_POST['srb']['busistatALp1']) ? 1:0;
            $this->tbusistatAL7 = !empty($_POST['srb']['busistatALt7']) ? '"' .$_POST['srb']['busistatALt7']. '"' : "NULL";

            $this->pbusistudAL7 = isset($_POST['srb']['busistudALp7']) ? 1:0;
            $this->tbusistudAL7 = !empty($_POST['srb']['busistudALt7']) ? '"' .$_POST['srb']['busistudALt7']. '"' : "NULL";
            

        }
        
        $this->subid8 = $_POST['srb']['subid8'];
        //$this->p8 = $_POST['srb']['p8'];
        //$this->t8 = $_POST['srb']['t8'];
        $this->p8 = isset($_POST['srb']['p8']) ? 1:0;
        $this->t8 = !empty($_POST['srb']['t8']) ? '"' .$_POST['srb']['t8']. '"' : "NULL";
        
        if($this->subid8 == 88) {
            
            $this->pchAL8 = isset($_POST['srb']['chALp8']) ? 1:0;
            $this->tchAL8 = !empty($_POST['srb']['chALt8']) ? '"' .$_POST['srb']['chALt8']. '"' : "NULL";
            
            $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
            $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";

        }
        
        if($this->subid8 == 89) {
            
            $this->pphAL8 = isset($_POST['srb']['phALp8']) ? 1:0;
            $this->tphAL8 = !empty($_POST['srb']['phALt8']) ? '"' .$_POST['srb']['phALt8']. '"' : "NULL";
            
            $this->pagriAL8 = isset($_POST['srb']['agriALp8']) ? 1:0;
            $this->tagriAL8 = !empty($_POST['srb']['agriALt8']) ? '"' .$_POST['srb']['agriALt8']. '"' : "NULL";

        }
        
        if($this->subid8 == 90) {
            
            if($this->clid == 116 || $this->clid == 117) {
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
            } else {
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
                
                $this->pGeogAL8 = isset($_POST['srb']['GeogALp8']) ? 1:0;
                $this->tGeogAL8 = !empty($_POST['srb']['GeogALt8']) ? '"' .$_POST['srb']['GeogALt8']. '"' : "NULL";
                
                $this->pmathAL8 = isset($_POST['srb']['mathALp8']) ? 1:0;
                $this->tmathAL8 = !empty($_POST['srb']['mathALt8']) ? '"' .$_POST['srb']['mathALt8']. '"' : "NULL";
                
                $this->partAL8 = isset($_POST['srb']['artALp8']) ? 1:0;
                $this->tartAL8 = !empty($_POST['srb']['artALt8']) ? '"' .$_POST['srb']['artALt8']. '"' : "NULL";
            }

        }
        
        if($this->subid8 == 91) {
            
            $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
            $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
            
            $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
            $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
            
            $this->pGeogAL8 = isset($_POST['srb']['GeogALp8']) ? 1:0;
            $this->tGeogAL8 = !empty($_POST['srb']['GeogALt8']) ? '"' .$_POST['srb']['GeogALt8']. '"' : "NULL";
            
            $this->pagriAL8 = isset($_POST['srb']['agriALp8']) ? 1:0;
            $this->tagriAL8 = !empty($_POST['srb']['agriALt8']) ? '"' .$_POST['srb']['agriALt8']. '"' : "NULL";

        }
        
        if($this->subid8 == 92) {
            
            if($this->clid == 103) {
                $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
                $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";
                
                $this->ppoliticAL8 = isset($_POST['srb']['politicALp8']) ? 1:0;
                $this->tpoliticAL8 = !empty($_POST['srb']['politicALt8']) ? '"' .$_POST['srb']['politicALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
                
                $this->pbusistatAL8 = isset($_POST['srb']['busistatALp8']) ? 1:0;
                $this->tbusistatAL8 = !empty($_POST['srb']['busistatALt8']) ? '"' .$_POST['srb']['busistatALt8']. '"' : "NULL";
            
            } else if($this->clid == 104) {  

                $this->phindiAL8 = isset($_POST['srb']['hindiALp8']) ? 1:0;
                $this->thindiAL8 = !empty($_POST['srb']['hindiALt8']) ? '"' .$_POST['srb']['hindiALt8']. '"' : "NULL";
                
                $this->partAL8 = isset($_POST['srb']['artALp8']) ? 1:0;
                $this->tartAL8 = !empty($_POST['srb']['artALt8']) ? '"' .$_POST['srb']['artALt8']. '"' : "NULL";
                
                $this->pdramaAL8 = isset($_POST['srb']['dramaALp8']) ? 1:0;
                $this->tdramaAL8 = !empty($_POST['srb']['dramaALt8']) ? '"' .$_POST['srb']['dramaALt8']. '"' : "NULL";
                
                $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
                $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";

                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";

            } else {
                $this->pjapAL8 = isset($_POST['srb']['japALp8']) ? 1:0;
                $this->tjapAL8 = !empty($_POST['srb']['japALt8']) ? '"' .$_POST['srb']['japALt8']. '"' : "NULL";
                
                $this->pfrenchAL8 = isset($_POST['srb']['frenchALp8']) ? 1:0;
                $this->tfrenchAL8 = !empty($_POST['srb']['frenchALt8']) ? '"' .$_POST['srb']['frenchALt8']. '"' : "NULL";
                
                $this->pkoreanAL8 = isset($_POST['srb']['koreanALp8']) ? 1:0;
                $this->tkoreanAL8 = !empty($_POST['srb']['koreanALt8']) ? '"' .$_POST['srb']['koreanALt8']. '"' : "NULL";
                
                $this->phindiAL8 = isset($_POST['srb']['hindiALp8']) ? 1:0;
                $this->thindiAL8 = !empty($_POST['srb']['hindiALt8']) ? '"' .$_POST['srb']['hindiALt8']. '"' : "NULL";
                
                $this->partAL8 = isset($_POST['srb']['artALp8']) ? 1:0;
                $this->tartAL8 = !empty($_POST['srb']['artALt8']) ? '"' .$_POST['srb']['artALt8']. '"' : "NULL";
                
                $this->pdramaAL8 = isset($_POST['srb']['dramaALp8']) ? 1:0;
                $this->tdramaAL8 = !empty($_POST['srb']['dramaALt8']) ? '"' .$_POST['srb']['dramaALt8']. '"' : "NULL";
                
                $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
                $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";
                
                $this->ppoliticAL8 = isset($_POST['srb']['politicALp8']) ? 1:0;
                $this->tpoliticAL8 = !empty($_POST['srb']['politicALt8']) ? '"' .$_POST['srb']['politicALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
                
                $this->pbusistatAL8 = isset($_POST['srb']['busistatALp8']) ? 1:0;
                $this->tbusistatAL8 = !empty($_POST['srb']['busistatALt8']) ? '"' .$_POST['srb']['busistatALt8']. '"' : "NULL";
            }

        }
        
        if($this->subid8 == 93) {
            if($this->clid == 103) { 

                $this->psinAL8 = isset($_POST['srb']['sinALp8']) ? 1:0;
                $this->tsinAL8 = !empty($_POST['srb']['sinALt8']) ? '"' .$_POST['srb']['sinALt8']. '"' : "NULL";
                
                $this->pGeogAL8 = isset($_POST['srb']['GeogALp8']) ? 1:0;
                $this->tGeogAL8 = !empty($_POST['srb']['GeogALt8']) ? '"' .$_POST['srb']['GeogALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";
                
                $this->pagriAL8 = isset($_POST['srb']['agriALp8']) ? 1:0;
                $this->tagriAL8 = !empty($_POST['srb']['agriALt8']) ? '"' .$_POST['srb']['agriALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
            
            } else if($this->clid == 104) { 

                $this->psinAL8 = isset($_POST['srb']['sinALp8']) ? 1:0;
                $this->tsinAL8 = !empty($_POST['srb']['sinALt8']) ? '"' .$_POST['srb']['sinALt8']. '"' : "NULL";

                $this->pGeogAL8 = isset($_POST['srb']['GeogALp8']) ? 1:0;
                $this->tGeogAL8 = !empty($_POST['srb']['GeogALt8']) ? '"' .$_POST['srb']['GeogALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";

                $this->pomusicAL8 = isset($_POST['srb']['omusicALp8']) ? 1:0;
                $this->tomusicAL8 = !empty($_POST['srb']['omusicALt8']) ? '"' .$_POST['srb']['omusicALt8']. '"' : "NULL";
                
                $this->pagriAL8 = isset($_POST['srb']['agriALp8']) ? 1:0;
                $this->tagriAL8 = !empty($_POST['srb']['agriALt8']) ? '"' .$_POST['srb']['agriALt8']. '"' : "NULL";
                
                $this->pheconAL8 = isset($_POST['srb']['heconALp8']) ? 1:0;
                $this->theconAL8 = !empty($_POST['srb']['heconALt8']) ? '"' .$_POST['srb']['heconALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";

            } else {
                $this->psinAL8 = isset($_POST['srb']['sinALp8']) ? 1:0;
                $this->tsinAL8 = !empty($_POST['srb']['sinALt8']) ? '"' .$_POST['srb']['sinALt8']. '"' : "NULL";
                
                $this->pengAL8 = isset($_POST['srb']['engALp8']) ? 1:0;
                $this->tengAL8 = !empty($_POST['srb']['engALt8']) ? '"' .$_POST['srb']['engALt8']. '"' : "NULL";
                
                $this->pGeogAL8 = isset($_POST['srb']['GeogALp8']) ? 1:0;
                $this->tGeogAL8 = !empty($_POST['srb']['GeogALt8']) ? '"' .$_POST['srb']['GeogALt8']. '"' : "NULL";
                
                $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
                $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";

                $this->pomusicAL8 = isset($_POST['srb']['omusicALp8']) ? 1:0;
                $this->tomusicAL8 = !empty($_POST['srb']['omusicALt8']) ? '"' .$_POST['srb']['omusicALt8']. '"' : "NULL";
                
                $this->pagriAL8 = isset($_POST['srb']['agriALp8']) ? 1:0;
                $this->tagriAL8 = !empty($_POST['srb']['agriALt8']) ? '"' .$_POST['srb']['agriALt8']. '"' : "NULL";
                
                $this->pheconAL8 = isset($_POST['srb']['heconALp8']) ? 1:0;
                $this->theconAL8 = !empty($_POST['srb']['heconALt8']) ? '"' .$_POST['srb']['heconALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
            }
        }
        
        if($this->subid8 == 94) {
            
            if($this->clid == 103) { 

                $this->plogicAL8 = isset($_POST['srb']['logicALp8']) ? 1:0;
                $this->tlogicAL8 = !empty($_POST['srb']['logicALt8']) ? '"' .$_POST['srb']['sinALt8']. '"' : "NULL";
                
                $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
                $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";
                
                $this->phistAL8 = isset($_POST['srb']['histALp8']) ? 1:0;
                $this->thistAL8 = !empty($_POST['srb']['histALt8']) ? '"' .$_POST['srb']['histALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";

            } else {

                $this->plogicAL8 = isset($_POST['srb']['logicALp8']) ? 1:0;
                $this->tlogicAL8 = !empty($_POST['srb']['logicALt8']) ? '"' .$_POST['srb']['sinALt8']. '"' : "NULL";
                
                $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
                $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";
                
                $this->phistAL8 = isset($_POST['srb']['histALp8']) ? 1:0;
                $this->thistAL8 = !empty($_POST['srb']['histALt8']) ? '"' .$_POST['srb']['histALt8']. '"' : "NULL";
                
                $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
                $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
                
                $this->pdanceAL8 = isset($_POST['srb']['danceALp8']) ? 1:0;
                $this->tdanceAL8 = !empty($_POST['srb']['danceALt8']) ? '"' .$_POST['srb']['danceALt8']. '"' : "NULL";
            }

        }
        
        if($this->subid8 == 95) {
            
            $this->partAL8 = isset($_POST['srb']['artALp8']) ? 1:0; 
            $this->tartAL8 = !empty($_POST['srb']['artALt8']) ? '"' .$_POST['srb']['artALt8']. '"' : "NULL";
            
            $this->pdramaAL8 = isset($_POST['srb']['dramaALp8']) ? 1:0;
            $this->tdramaAL8 = !empty($_POST['srb']['dramaALt8']) ? '"' .$_POST['srb']['dramaALt8']. '"' : "NULL";
            
            $this->peconAL8 = isset($_POST['srb']['econALp8']) ? 1:0;
            $this->teconAL8 = !empty($_POST['srb']['econALt8']) ? '"' .$_POST['srb']['econALt8']. '"' : "NULL";
            
            $this->ppoliticAL8 = isset($_POST['srb']['politicALp8']) ? 1:0;
            $this->tpoliticAL8 = !empty($_POST['srb']['politicALt8']) ? '"' .$_POST['srb']['politicALt8']. '"' : "NULL";

            $this->pmediaAL8 = isset($_POST['srb']['mediaALp8']) ? 1:0;
            $this->tmediaAL8 = !empty($_POST['srb']['mediaALt8']) ? '"' .$_POST['srb']['mediaALt8']. '"' : "NULL";

            $this->pictAL8 = isset($_POST['srb']['ictALp8']) ? 1:0;
            $this->tictAL8 = !empty($_POST['srb']['ictALt8']) ? '"' .$_POST['srb']['ictALt8']. '"' : "NULL";
            
            $this->pbusistatAL8 = isset($_POST['srb']['busistatALp8']) ? 1:0;
            $this->tbusistatAL8 = !empty($_POST['srb']['busistatALt8']) ? '"' .$_POST['srb']['busistatALt8']. '"' : "NULL";

            $this->pbusistudAL8 = isset($_POST['srb']['busistudALp8']) ? 1:0;
            $this->tbusistudAL8 = !empty($_POST['srb']['busistudALt8']) ? '"' .$_POST['srb']['busistudALt8']. '"' : "NULL";
            

        }
        //Math Baskets
        $this->bs1 = array();

		
		$this->bs1[0] = $this->subid1 == 88 ? 1:0;
        $this->bs1[1] = $this->subid2 == 88 ? 1:0;
		$this->bs1[2] = $this->subid3 == 88 ? 1:0;
        $this->bs1[3] = $this->subid4 == 88 ? 1:0;
		$this->bs1[4] = $this->subid5 == 88 ? 1:0;
        $this->bs1[5] = $this->subid6 == 88 ? 1:0;
		$this->bs1[6] = $this->subid7 == 88 ? 1:0;
        $this->bs1[7] = $this->subid8 == 88 ? 1:0;
		
		
		//Bio Baskets
        $this->bs2 = array();

		
		$this->bs2[0] = $this->subid1 == 89 ? 1:0;
        $this->bs2[1] = $this->subid2 == 89 ? 1:0;
		$this->bs2[2] = $this->subid3 == 89 ? 1:0;
        $this->bs2[3] = $this->subid4 == 89 ? 1:0;
		$this->bs2[4] = $this->subid5 == 89 ? 1:0;
        $this->bs2[5] = $this->subid6 == 89 ? 1:0;
		$this->bs2[6] = $this->subid7 == 89 ? 1:0;
        $this->bs2[7] = $this->subid8 == 89 ? 1:0;
        
        
        //ETec Baskets
        $this->bs3 = array();

		
		$this->bs3[0] = $this->subid1 == 90 ? 1:0;
        $this->bs3[1] = $this->subid2 == 90 ? 1:0;
		$this->bs3[2] = $this->subid3 == 90 ? 1:0;
        $this->bs3[3] = $this->subid4 == 90 ? 1:0;
		$this->bs3[4] = $this->subid5 == 90 ? 1:0;
        $this->bs3[5] = $this->subid6 == 90 ? 1:0;
		$this->bs3[6] = $this->subid7 == 90 ? 1:0;
        $this->bs3[7] = $this->subid8 == 90 ? 1:0;
        
        
        //BTec Baskets
        $this->bs4 = array();

		
		$this->bs4[0] = $this->subid1 == 91 ? 1:0;
        $this->bs4[1] = $this->subid2 == 91 ? 1:0;
		$this->bs4[2] = $this->subid3 == 91 ? 1:0;
        $this->bs4[3] = $this->subid4 == 91 ? 1:0;
		$this->bs4[4] = $this->subid5 == 91 ? 1:0;
        $this->bs4[5] = $this->subid6 == 91 ? 1:0;
		$this->bs4[6] = $this->subid7 == 91 ? 1:0;
        $this->bs4[7] = $this->subid8 == 91 ? 1:0;
        
        //ART LANG  Baskets#01
        $this->bs5 = array();

		
		$this->bs5[0] = $this->subid1 == 92 ? 1:0;
        $this->bs5[1] = $this->subid2 == 92 ? 1:0;
		$this->bs5[2] = $this->subid3 == 92 ? 1:0;
        $this->bs5[3] = $this->subid4 == 92 ? 1:0;
		$this->bs5[4] = $this->subid5 == 92 ? 1:0;
        $this->bs5[5] = $this->subid6 == 92 ? 1:0;
		$this->bs5[6] = $this->subid7 == 92 ? 1:0;
        $this->bs5[7] = $this->subid8 == 92 ? 1:0;
        
        
        //ART LANG  Baskets#02
        $this->bs6 = array();

		
		$this->bs6[0] = $this->subid1 == 93 ? 1:0;
        $this->bs6[1] = $this->subid2 == 93 ? 1:0;
		$this->bs6[2] = $this->subid3 == 93 ? 1:0;
        $this->bs6[3] = $this->subid4 == 93 ? 1:0;
		$this->bs6[4] = $this->subid5 == 93 ? 1:0;
        $this->bs6[5] = $this->subid6 == 93 ? 1:0;
		$this->bs6[6] = $this->subid7 == 93 ? 1:0;
        $this->bs6[7] = $this->subid8 == 93 ? 1:0;
        
        
        //ART LANG  Baskets#03
        $this->bs7 = array();

		
		$this->bs7[0] = $this->subid1 == 94 ? 1:0;
        $this->bs7[1] = $this->subid2 == 94 ? 1:0;
		$this->bs7[2] = $this->subid3 == 94 ? 1:0;
        $this->bs7[3] = $this->subid4 == 94 ? 1:0;
		$this->bs7[4] = $this->subid5 == 94 ? 1:0;
        $this->bs7[5] = $this->subid6 == 94 ? 1:0;
		$this->bs7[6] = $this->subid7 == 94 ? 1:0;
        $this->bs7[7] = $this->subid8 == 94 ? 1:0;
        

        //Commerce  Baskets#03
        $this->bs8 = array();

		
		$this->bs8[0] = $this->subid1 == 95 ? 1:0;
        $this->bs8[1] = $this->subid2 == 95 ? 1:0;
		$this->bs8[2] = $this->subid3 == 95 ? 1:0;
        $this->bs8[3] = $this->subid4 == 95 ? 1:0;
		$this->bs8[4] = $this->subid5 == 95 ? 1:0;
        $this->bs8[5] = $this->subid6 == 95 ? 1:0;
		$this->bs8[6] = $this->subid7 == 95 ? 1:0;
        $this->bs8[7] = $this->subid8 == 95 ? 1:0;
        
        $this->pmal = ['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7','p8'];
        $this->tmal = ['t1', 't2', 't3', 't4', 't5', 't6', 't7','t8'];
        
       
        $this->pbal = ['pchAL1', 'pictAL1', 'pphAL1', 'pagriAL1', 'pmediaAL1', 'pGeogAL1', 'pmathAL1', 'partAL1', 'pjapAL1', 'pfrenchAL1', 'pkoreanAL1', 'phindiAL1', 'pdramaAL1', 'peconAL1', 'ppoliticAL1', 'pbusistatAL1','pbusistudAL1','pomusicAL1','pheconAL1', 'psinAL1', 'pengAL1', 'plogicAL1', 'phistAL1', 'pdanceAL1', 'pchAL2', 'pictAL2', 'pphAL2', 'pagriAL2', 'pmediaAL2', 'pGeogAL2', 'pmathAL2', 'partAL2', 'pjapAL2', 'pfrenchAL2', 'pkoreanAL2', 'phindiAL2', 'pdramaAL2', 'peconAL2', 'ppoliticAL2', 'pbusistatAL2','pbusistudAL2','pomusicAL2','pheconAL2', 'psinAL2', 'pengAL2', 'plogicAL2', 'phistAL2', 'pdanceAL2', 'pchAL3', 'pictAL3', 'pphAL3', 'pagriAL3', 'pmediaAL3', 'pGeogAL3', 'pmathAL3', 'partAL3', 'pjapAL3', 'pfrenchAL3', 'pkoreanAL3', 'phindiAL3', 'pdramaAL3', 'peconAL3', 'ppoliticAL3', 'pbusistatAL3','pbusistudAL3','pomusicAL3','pheconAL3', 'psinAL3', 'pengAL3', 'plogicAL3', 'phistAL3', 'pdanceAL3', 'pchAL4', 'pictAL4', 'pphAL4', 'pagriAL4', 'pmediaAL4', 'pGeogAL4', 'pmathAL4', 'partAL4', 'pjapAL4', 'pfrenchAL4', 'pkoreanAL4', 'phindiAL4', 'pdramaAL4', 'peconAL4', 'ppoliticAL4', 'pbusistatAL4','pbusistudAL4','pomusicAL4','pheconAL4', 'psinAL4', 'pengAL4', 'plogicAL4', 'phistAL4', 'pdanceAL4', 'pchAL5', 'pictAL5', 'pphAL5', 'pagriAL5', 'pmediaAL5', 'pGeogAL5', 'pmathAL5', 'partAL5', 'pjapAL5', 'pfrenchAL5', 'pkoreanAL5', 'phindiAL5', 'pdramaAL5', 'peconAL5', 'ppoliticAL5', 'pbusistatAL5','pbusistudAL5','pomusicAL5','pheconAL5', 'psinAL5', 'pengAL5', 'plogicAL5', 'phistAL5', 'pdanceAL5', 'pchAL6', 'pictAL6', 'pphAL6', 'pagriAL6', 'pmediaAL6', 'pGeogAL6', 'pmathAL6', 'partAL6', 'pjapAL6', 'pfrenchAL6', 'pkoreanAL6', 'phindiAL6', 'pdramaAL6', 'peconAL6', 'ppoliticAL6', 'pbusistatAL6','pbusistudAL6','pomusicAL6','pheconAL6', 'psinAL6', 'pengAL6', 'plogicAL6', 'phistAL6', 'pdanceAL6', 'pchAL7', 'pictAL7', 'pphAL7', 'pagriAL7', 'pmediaAL7', 'pGeogAL7', 'pmathAL7', 'partAL7', 'pjapAL7', 'pfrenchAL7', 'pkoreanAL7', 'phindiAL7', 'pdramaAL7', 'peconAL7', 'ppoliticAL7', 'pbusistatAL7','pbusistudAL7','pomusicAL7','pheconAL7', 'psinAL7', 'pengAL7', 'plogicAL7', 'phistAL7', 'pdanceAL7', 'pchAL8', 'pictAL8', 'pphAL8', 'pagriAL8', 'pmediaAL8', 'pGeogAL8', 'pmathAL8', 'partAL8', 'pjapAL8', 'pfrenchAL8', 'pkoreanAL8', 'phindiAL8', 'pdramaAL8', 'peconAL8', 'ppoliticAL8', 'pbusistatAL8','pbusistudAL8','pomusicAL8','pheconAL8', 'psinAL8', 'pengAL8', 'plogicAL8', 'phistAL8', 'pdanceAL8'];
        $this->tbal = ['tchAL1', 'tictAL1', 'tphAL1', 'tagriAL1', 'tmediaAL1', 'tGeogAL1', 'tmathAL1', 'tartAL1', 'tjapAL1', 'tfrenchAL1', 'tkoreanAL1', 'thindiAL1', 'tdramaAL1', 'teconAL1', 'tpoliticAL1', 'tbusistatAL1','tbusistudAL1','tomusicAL1','theconAL1', 'tsinAL1', 'tengAL1', 'tlogicAL1', 'thistAL1', 'tdanceAL1', 'tchAL2', 'tictAL2', 'tphAL2', 'tagriAL2', 'tmediaAL2', 'tGeogAL2', 'tmathAL2', 'tartAL2', 'tjapAL2', 'tfrenchAL2', 'tkoreanAL2', 'thindiAL2', 'tdramaAL2', 'teconAL2', 'tpoliticAL2', 'tbusistatAL2','tbusistudAL2','tomusicAL2','theconAL2', 'tsinAL2', 'tengAL2', 'tlogicAL2', 'thistAL2', 'tdanceAL2', 'tchAL3', 'tictAL3', 'tphAL3', 'tagriAL3', 'tmediaAL3', 'tGeogAL3', 'tmathAL3', 'tartAL3', 'tjapAL3', 'tfrenchAL3', 'tkoreanAL3', 'thindiAL3', 'tdramaAL3', 'teconAL3', 'tpoliticAL3', 'tbusistatAL3','tbusistudAL3','tomusicAL3','theconAL3', 'tsinAL3', 'tengAL3', 'tlogicAL3', 'thistAL3', 'tdanceAL3', 'tchAL4', 'tictAL4', 'tphAL4', 'tagriAL4', 'tmediaAL4', 'tGeogAL4', 'tmathAL4', 'tartAL4', 'tjapAL4', 'tfrenchAL4', 'tkoreanAL4', 'thindiAL4', 'tdramaAL4', 'teconAL4', 'tpoliticAL4', 'tbusistatAL4','tbusistudAL4','tomusicAL4','theconAL4', 'tsinAL4', 'tengAL4', 'tlogicAL4', 'thistAL4', 'tdanceAL4', 'tchAL5', 'tictAL5', 'tphAL5', 'tagriAL5', 'tmediaAL5', 'tGeogAL5', 'tmathAL5', 'tartAL5', 'tjapAL5', 'tfrenchAL5', 'tkoreanAL5', 'thindiAL5', 'tdramaAL5', 'teconAL5', 'tpoliticAL5', 'tbusistatAL5','tbusistudAL5','tomusicAL5','theconAL5', 'tsinAL5', 'tengAL5', 'tlogicAL5', 'thistAL5', 'tdanceAL5', 'tchAL6', 'tictAL6', 'tphAL6', 'tagriAL6', 'tmediaAL6', 'tGeogAL6', 'tmathAL6', 'tartAL6', 'tjapAL6', 'tfrenchAL6', 'tkoreanAL6', 'thindiAL6', 'tdramaAL6', 'teconAL6', 'tpoliticAL6', 'tbusistatAL6','tbusistudAL6','tomusicAL6','theconAL6', 'tsinAL6', 'tengAL6', 'tlogicAL6', 'thistAL6', 'tdanceAL6', 'tchAL7', 'tictAL7', 'tphAL7', 'tagriAL7', 'tmediaAL7', 'tGeogAL7', 'tmathAL7', 'tartAL7', 'tjapAL7', 'tfrenchAL7', 'tkoreanAL7', 'thindiAL7', 'tdramaAL7', 'teconAL7', 'tpoliticAL7', 'tbusistatAL7','tbusistudAL7','tomusicAL7','theconAL7', 'tsinAL7', 'tengAL7', 'tlogicAL7', 'thistAL7', 'tdanceAL7', 'tchAL8', 'tictAL8', 'tphAL8', 'tagriAL8', 'tmediaAL8', 'tGeogAL8', 'tmathAL8', 'tartAL8', 'tjapAL8', 'tfrenchAL8', 'tkoreanAL8', 'thindiAL8', 'tdramaAL8', 'teconAL8', 'tpoliticAL8', 'tbusistatAL8','tbusistudAL8','tomusicAL8','theconAL8', 'tsinAL8', 'tengAL8', 'tlogicAL8', 'thistAL8', 'tdanceAL8'];
        
        $this->sub = [
                        'subid1','subid2','subid3','subid4','subid5','subid6','subid7','subid8'
                     ];
        
        foreach($this->sub as $ss) {
            $_SESSION['fooal'][$ss] = $this->{$ss};
        }
        
        foreach($this->pmal as $p) {
            $_SESSION['fooal'][$p] = !empty($this->{$p})?1:0;
        }
        
        foreach($this->tmal as $t) {
            $_SESSION['fooal'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
            $this->console_log($_SESSION['fooal'][$t]);
        }
        
        foreach($this->pbal as $p) {
            $_SESSION['fooal'][$p] = !empty($this->{$p})?1:0;
            //$this->console_log($p . " - " . $_SESSION['fooal'][$p]);
        } 

        foreach($this->tbal as $t) {
            $_SESSION['fooal'][$t] = !empty($this->{$t})&&$this->{$t}!='NULL'?$this->{$t}:'';
        }

             
       foreach($this->sub as $ss) {
            if($this->{$ss} == 0) {
                echo '<script>alert("Please Select All Subject Slots")</script>';
                return false;
            }
        }

        $i=0;
        foreach($this->pmal as $p) {

            if (!in_array($this->{$this->sub[$i]}, [88, 89, 90, 91, 92, 93, 94, 95])) {
                // Code to execute if $this->{$this->sub[$i]} is not 17, 18, or 19
                if($this->{$p} == 0  &&  (is_null($this->{$this->tmal[$i]}) || $this->{$this->tmal[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots.")</script>';
                    return false;
                }
            }

            $i = $i + 1;
        }
        
        
        
        $i=0;
        
        foreach($this->pbal as $p) {
            if(isset($this->{$p})) {
                $this->console_log($p . ' - ' . $this->{$p});
                if(empty($this->{$p})  &&  (is_null($this->{$this->tbal[$i]}) || $this->{$this->tbal[$i]} === "NULL" )) {
                    echo '<script>alert("Please enter reason for empty timeslots")</script>';
                    return false;
                }
            }
            $i = $i + 1;
        }
        
        
        
	    $this->notify = $_POST['notify'];
	    // Rest is coming soon!	
	    return true;
    }
    
    
    function insertTimeSlotAL() {
	    
	    global $wpdb;

        //$wpdb->hide_errors();
        
        
        //$mb = new stClass();
        
        //$tbid = $mb->getTimeTable($this->clid);
        $tableName = $wpdb->prefix . "srb_timeslot";
      
        //Time Slot #1
        if($this->bs1[0] == 1) {                            //Math 
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'1',$this->pchAL1, $this->tchAL1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
        } else if($this->bs2[0] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'1',$this->pphAL1, $this->tphAL1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'1',$this->pagriAL1, $this->tagriAL1, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }	        
		
        } else if($this->bs3[0] == 1) { //E Tec
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {                            
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'1',$this->pGeogAL1, $this->tGeogAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'1',$this->pmathAL1, $this->tmathAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'1',$this->partAL1, $this->tartAL1, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
			        
        } else if($this->bs4[0] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'1',$this->pGeogAL1, $this->tGeogAL1, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'1',$this->pagriAL1, $this->tagriAL1, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[0] == 1) {                            //Art / Lang. B#01
            if($this->clid==103) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'1',$this->ppoliticAL1, $this->tpoliticAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'1',$this->pbusistatAL1, $this->tbusistatAL1, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'1',$this->phindiAL1, $this->thindiAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'1',$this->partAL1, $this->tartAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'1',$this->pdramaAL1, $this->tdramaAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'1',$this->pjapAL1, $this->tjapAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'1',$this->pfrenchAL1, $this->tfrenchAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'1',$this->pkoreanAL1, $this->tkoreanAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'1',$this->phindiAL1, $this->thindiAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'1',$this->partAL1, $this->tartAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'1',$this->pdramaAL1, $this->tdramaAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'1',$this->ppoliticAL1, $this->tpoliticAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'1',$this->pbusistatAL1, $this->tbusistatAL1, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }        
        } else if($this->bs6[0] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'1',$this->psinAL1, $this->tsinAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'1',$this->pGeogAL1, $this->tGeogAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'1',$this->pagriAL1, $this->tagriAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'1',$this->psinAL1, $this->tsinAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'1',$this->pGeogAL1, $this->tGeogAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'1',$this->pomusicAL1, $this->tomusicAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'1',$this->pagriAL1, $this->tagriAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'1',$this->pheconAL1, $this->theconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'1',$this->psinAL1, $this->tsinAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'1',$this->pengAL1, $this->tengAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'1',$this->pGeogAL1, $this->tGeogAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'1',$this->pomusicAL1, $this->tomusicAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'1',$this->pagriAL1, $this->tagriAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'1',$this->pheconAL1, $this->theconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }    
        } else if($this->bs7[0] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'1',$this->plogicAL1, $this->tlogicAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'1',$this->phistAL1, $this->thistAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'1',$this->plogicAL1, $this->tlogicAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'1',$this->phistAL1, $this->thistAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'1',$this->pdanceAL1, $this->tdanceAL1, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[0] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'1',$this->partAL1, $this->tartAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'1',$this->pdramaAL1, $this->tdramaAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'1',$this->peconAL1, $this->teconAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'1',$this->ppoliticAL1, $this->tpoliticAL1, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'1',$this->pmediaAL1, $this->tmediaAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'1',$this->pictAL1, $this->tictAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'1',$this->pbusistatAL1, $this->tbusistatAL1 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'1',$this->pbusistudAL1, $this->tbusistudAL1 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }	        
        } else {
            if($this->subid1 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid1,'1',$this->p1, $this->t1, FROM_UNIXTIME($this->sdate))")); 
                
                if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        //Time Slot #2
        if($this->bs1[1] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'2',$this->pchAL2, $this->tchAL2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2, FROM_UNIXTIME($this->sdate))"));
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
        } else if($this->bs2[1] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'2',$this->pphAL2, $this->tphAL2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'2',$this->pagriAL2, $this->tagriAL2, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }	        
		
        } else if($this->bs3[1] == 1) {                            //E Tec
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'2',$this->pGeogAL2, $this->tGeogAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'2',$this->pmathAL2, $this->tmathAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'2',$this->partAL2, $this->tartAL2, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
		
        } else if($this->bs4[1] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'2',$this->pGeogAL2, $this->tGeogAL2, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'2',$this->pagriAL2, $this->tagriAL2, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[1] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'2',$this->ppoliticAL2, $this->tpoliticAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'2',$this->pbusistatAL2, $this->tbusistatAL2, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'2',$this->phindiAL2, $this->thindiAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'2',$this->partAL2, $this->tartAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'2',$this->pdramaAL2, $this->tdramaAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }

            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'2',$this->pjapAL2, $this->tjapAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'2',$this->pfrenchAL2, $this->tfrenchAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'2',$this->pkoreanAL2, $this->tkoreanAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'2',$this->phindiAL2, $this->thindiAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'2',$this->partAL2, $this->tartAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'2',$this->pdramaAL2, $this->tdramaAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'2',$this->ppoliticAL2, $this->tpoliticAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'2',$this->pbusistatAL2, $this->tbusistatAL2, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
		
        } else if($this->bs6[1] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'2',$this->psinAL2, $this->tsinAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'2',$this->pGeogAL2, $this->tGeogAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'2',$this->pagriAL2, $this->tagriAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'2',$this->psinAL2, $this->tsinAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'2',$this->pGeogAL2, $this->tGeogAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'2',$this->pomusicAL2, $this->tomusicAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'2',$this->pagriAL2, $this->tagriAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'2',$this->pheconAL2, $this->theconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'2',$this->psinAL2, $this->tsinAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'2',$this->pengAL2, $this->tengAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'2',$this->pGeogAL2, $this->tGeogAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'2',$this->pomusicAL2, $this->tomusicAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'2',$this->pagriAL2, $this->tagriAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'2',$this->pheconAL2, $this->theconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[1] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'2',$this->plogicAL2, $this->tlogicAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'2',$this->phistAL2, $this->thistAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'2',$this->plogicAL2, $this->tlogicAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'2',$this->phistAL2, $this->thistAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'2',$this->pdanceAL2, $this->tdanceAL2, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[1] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'2',$this->partAL2, $this->tartAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'2',$this->pdramaAL2, $this->tdramaAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'2',$this->peconAL2, $this->teconAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'2',$this->ppoliticAL2, $this->tpoliticAL2, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'2',$this->pmediaAL2, $this->tmediaAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'2',$this->pictAL2, $this->tictAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'2',$this->pbusistatAL2, $this->tbusistatAL2 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'2',$this->pbusistudAL2, $this->tbusistudAL2 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }
			        
        } else {
            if($this->subid2 != 0) {
               $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid2,'2',$this->p2, $this->t2, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
		
		
		//Time Slot #3
		if($this->bs1[2] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'3',$this->pchAL3, $this->tchAL3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
		} else if($this->bs2[2] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'3',$this->pphAL3, $this->tphAL3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'3',$this->pagriAL3, $this->tagriAL3, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
		} else if($this->bs3[2] == 1) {                            //E Tec
            
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'3',$this->pGeogAL3, $this->tGeogAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'3',$this->pmathAL3, $this->tmathAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'3',$this->partAL3, $this->tartAL3, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
		} else if($this->bs4[2] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'3',$this->pGeogAL3, $this->tGeogAL3, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'3',$this->pagriAL3, $this->tagriAL3, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
		} else if($this->bs5[2] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'3',$this->ppoliticAL3, $this->tpoliticAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'3',$this->pbusistatAL3, $this->tbusistatAL3, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'3',$this->phindiAL3, $this->thindiAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'3',$this->partAL3, $this->tartAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'3',$this->pdramaAL3, $this->tdramaAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'3',$this->pjapAL3, $this->tjapAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'3',$this->pfrenchAL3, $this->tfrenchAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'3',$this->pkoreanAL3, $this->tkoreanAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'3',$this->phindiAL3, $this->thindiAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'3',$this->partAL3, $this->tartAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'3',$this->pdramaAL3, $this->tdramaAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'3',$this->ppoliticAL3, $this->tpoliticAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'3',$this->pbusistatAL3, $this->tbusistatAL3, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
		
            }
            
		} else if($this->bs6[2] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'3',$this->psinAL3, $this->tsinAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'3',$this->pGeogAL3, $this->tGeogAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'3',$this->pagriAL3, $this->tagriAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'3',$this->psinAL3, $this->tsinAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'3',$this->pGeogAL3, $this->tGeogAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'3',$this->pomusicAL3, $this->tomusicAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'3',$this->pagriAL3, $this->tagriAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'3',$this->pheconAL3, $this->theconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'3',$this->psinAL3, $this->tsinAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'3',$this->pengAL3, $this->tengAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'3',$this->pGeogAL3, $this->tGeogAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'3',$this->pomusicAL3, $this->tomusicAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'3',$this->pagriAL3, $this->tagriAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'3',$this->pheconAL3, $this->theconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
		} else if($this->bs7[2] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'3',$this->plogicAL3, $this->tlogicAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'3',$this->phistAL3, $this->thistAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'3',$this->plogicAL3, $this->tlogicAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'3',$this->phistAL3, $this->thistAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'3',$this->pdanceAL3, $this->tdanceAL3, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[2] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'3',$this->partAL3, $this->tartAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'3',$this->pdramaAL3, $this->tdramaAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'3',$this->peconAL3, $this->teconAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'3',$this->ppoliticAL3, $this->tpoliticAL3, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'3',$this->pmediaAL3, $this->tmediaAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'3',$this->pictAL3, $this->tictAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'3',$this->pbusistatAL3, $this->tbusistatAL3 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'3',$this->pbusistudAL3, $this->tbusistudAL3 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }			        
        } else {
            if($this->subid3 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid3,'3',$this->p3, $this->t3, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
        
        
        //Time Slot #4
        if($this->bs1[3] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'4',$this->pchAL4, $this->tchAL4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[3] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'4',$this->pphAL4, $this->tphAL4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'4',$this->pagriAL4, $this->tagriAL4, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[3] == 1) {                            //E Tec
            
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'4',$this->pGeogAL4, $this->tGeogAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'4',$this->pmathAL4, $this->tmathAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'4',$this->partAL4, $this->tartAL4, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }        
        } else if($this->bs4[3] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'4',$this->pGeogAL4, $this->tGeogAL4, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'4',$this->pagriAL4, $this->tagriAL4, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[3] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'4',$this->ppoliticAL4, $this->tpoliticAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'4',$this->pbusistatAL4, $this->tbusistatAL4, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'4',$this->phindiAL4, $this->thindiAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'4',$this->partAL4, $this->tartAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'4',$this->pdramaAL4, $this->tdramaAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'4',$this->pjapAL4, $this->tjapAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'4',$this->pfrenchAL4, $this->tfrenchAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'4',$this->pkoreanAL4, $this->tkoreanAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'4',$this->phindiAL4, $this->thindiAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'4',$this->partAL4, $this->tartAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'4',$this->pdramaAL4, $this->tdramaAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'4',$this->ppoliticAL4, $this->tpoliticAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'4',$this->pbusistatAL4, $this->tbusistatAL4, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs6[3] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'4',$this->psinAL4, $this->tsinAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'4',$this->pGeogAL4, $this->tGeogAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'4',$this->pagriAL4, $this->tagriAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'4',$this->psinAL4, $this->tsinAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'4',$this->pGeogAL4, $this->tGeogAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'4',$this->pomusicAL4, $this->tomusicAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'4',$this->pagriAL4, $this->tagriAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'4',$this->pheconAL4, $this->theconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'4',$this->psinAL4, $this->tsinAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'4',$this->pengAL4, $this->tengAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'4',$this->pGeogAL4, $this->tGeogAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'4',$this->pomusicAL4, $this->tomusicAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'4',$this->pagriAL4, $this->tagriAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'4',$this->pheconAL4, $this->theconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[3] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'4',$this->plogicAL4, $this->tlogicAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'4',$this->phistAL4, $this->thistAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'4',$this->plogicAL4, $this->tlogicAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'4',$this->phistAL4, $this->thistAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'4',$this->pdanceAL4, $this->tdanceAL4, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }	  
                }
        } else if($this->bs8[3] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'4',$this->partAL4, $this->tartAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'4',$this->pdramaAL4, $this->tdramaAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'4',$this->peconAL4, $this->teconAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'4',$this->ppoliticAL4, $this->tpoliticAL4, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'4',$this->pmediaAL4, $this->tmediaAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'4',$this->pictAL4, $this->tictAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'4',$this->pbusistatAL4, $this->tbusistatAL4 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'4',$this->pbusistudAL4, $this->tbusistudAL4 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }                   
        } else {
            if($this->subid4 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid4,'4',$this->p4, $this->t4, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        
        //Time Slot #5
        if($this->bs1[4] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'5',$this->pchAL5, $this->tchAL5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5, FROM_UNIXTIME($this->sdate))"));
			       
			       if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[4] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'5',$this->pphAL5, $this->tphAL5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'5',$this->pagriAL5, $this->tagriAL5, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[4] == 1) {                            //E Tec
            
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'5',$this->pGeogAL5, $this->tGeogAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'5',$this->pmathAL5, $this->tmathAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'5',$this->partAL5, $this->tartAL5, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs4[4] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'5',$this->pGeogAL5, $this->tGeogAL5, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'5',$this->pagriAL5, $this->tagriAL5, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[4] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'5',$this->ppoliticAL5, $this->tpoliticAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'5',$this->pbusistatAL5, $this->tbusistatAL5, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'5',$this->phindiAL5, $this->thindiAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'5',$this->partAL5, $this->tartAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'5',$this->pdramaAL5, $this->tdramaAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'5',$this->pjapAL5, $this->tjapAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'5',$this->pfrenchAL5, $this->tfrenchAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'5',$this->pkoreanAL5, $this->tkoreanAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'5',$this->phindiAL5, $this->thindiAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'5',$this->partAL5, $this->tartAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'5',$this->pdramaAL5, $this->tdramaAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'5',$this->ppoliticAL5, $this->tpoliticAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'5',$this->pbusistatAL5, $this->tbusistatAL5, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs6[4] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'5',$this->psinAL5, $this->tsinAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'5',$this->pGeogAL5, $this->tGeogAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'5',$this->pagriAL5, $this->tagriAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {   
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'5',$this->psinAL5, $this->tsinAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'5',$this->pGeogAL5, $this->tGeogAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'5',$this->pomusicAL5, $this->tomusicAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'5',$this->pagriAL5, $this->tagriAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'5',$this->pheconAL5, $this->theconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'5',$this->psinAL5, $this->tsinAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'5',$this->pengAL5, $this->tengAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'5',$this->pGeogAL5, $this->tGeogAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'5',$this->pomusicAL5, $this->tomusicAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'5',$this->pagriAL5, $this->tagriAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'5',$this->pheconAL5, $this->theconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[4] == 1) {                            //Art / Lang. B#03
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'5',$this->plogicAL5, $this->tlogicAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'5',$this->phistAL5, $this->thistAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'5',$this->plogicAL5, $this->tlogicAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'5',$this->phistAL5, $this->thistAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'5',$this->pdanceAL5, $this->tdanceAL5, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[4] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'5',$this->partAL5, $this->tartAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'5',$this->pdramaAL5, $this->tdramaAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'5',$this->peconAL5, $this->teconAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'5',$this->ppoliticAL5, $this->tpoliticAL5, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'5',$this->pmediaAL5, $this->tmediaAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'5',$this->pictAL5, $this->tictAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'5',$this->pbusistatAL5, $this->tbusistatAL5 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'5',$this->pbusistudAL5, $this->tbusistudAL5 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }

        } else {
            if($this->subid5 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid5,'5',$this->p5, $this->t5, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        
        //Time Slot #6
        if($this->bs1[5] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'6',$this->pchAL6, $this->tchAL6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6, FROM_UNIXTIME($this->sdate))"));
			   
			   if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs2[5] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'6',$this->pphAL6, $this->tphAL6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'6',$this->pagriAL6, $this->tagriAL6, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }	        
        
        } else if($this->bs3[5] == 1) {                            //E Tec
            
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'6',$this->pGeogAL6, $this->tGeogAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'6',$this->pmathAL6, $this->tmathAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'6',$this->partAL6, $this->tartAL6, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
			        
			        
        } else if($this->bs4[5] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'6',$this->pGeogAL6, $this->tGeogAL6, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'6',$this->pagriAL6, $this->tagriAL6, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[5] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'6',$this->ppoliticAL6, $this->tpoliticAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'6',$this->pbusistatAL6, $this->tbusistatAL6, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'6',$this->phindiAL6, $this->thindiAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'6',$this->partAL6, $this->tartAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'6',$this->pdramaAL6, $this->tdramaAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'6',$this->pjapAL6, $this->tjapAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'6',$this->pfrenchAL6, $this->tfrenchAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'6',$this->pkoreanAL6, $this->tkoreanAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'6',$this->phindiAL6, $this->thindiAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'6',$this->partAL6, $this->tartAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'6',$this->pdramaAL6, $this->tdramaAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'6',$this->ppoliticAL6, $this->tpoliticAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'6',$this->pbusistatAL6, $this->tbusistatAL6, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs6[5] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'6',$this->psinAL6, $this->tsinAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'6',$this->pGeogAL6, $this->tGeogAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'6',$this->pagriAL6, $this->tagriAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'6',$this->psinAL6, $this->tsinAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'6',$this->pGeogAL6, $this->tGeogAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'6',$this->pomusicAL6, $this->tomusicAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'6',$this->pagriAL6, $this->tagriAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'6',$this->pheconAL6, $this->theconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'6',$this->psinAL6, $this->tsinAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'6',$this->pengAL6, $this->tengAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'6',$this->pGeogAL6, $this->tGeogAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'6',$this->pomusicAL6, $this->tomusicAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'6',$this->pagriAL6, $this->tagriAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'6',$this->pheconAL6, $this->theconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[5] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'6',$this->plogicAL6, $this->tlogicAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'6',$this->phistAL6, $this->thistAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'6',$this->plogicAL6, $this->tlogicAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'6',$this->phistAL6, $this->thistAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'6',$this->pdanceAL6, $this->tdanceAL6, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[5] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'6',$this->partAL6, $this->tartAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'6',$this->pdramaAL6, $this->tdramaAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'6',$this->peconAL6, $this->teconAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'6',$this->ppoliticAL6, $this->tpoliticAL6, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'6',$this->pmediaAL6, $this->tmediaAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'6',$this->pictAL6, $this->tictAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'6',$this->pbusistatAL6, $this->tbusistatAL6 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'6',$this->pbusistudAL6, $this->tbusistudAL6 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }

        } else {
            if($this->subid6 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid6,'6',$this->p6, $this->t6, FROM_UNIXTIME($this->sdate))"));
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        
        
        //Time Slot #7
        if($this->bs1[6] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'7',$this->pchAL7, $this->tchAL7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs2[6] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'7',$this->pphAL7, $this->tphAL7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'7',$this->pagriAL7, $this->tagriAL7, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs3[6] == 1) {                            //E Tec
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'7',$this->pGeogAL7, $this->tGeogAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'7',$this->pmathAL7, $this->tmathAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'7',$this->partAL7, $this->tartAL7, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs4[6] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'7',$this->pGeogAL7, $this->tGeogAL7, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'7',$this->pagriAL7, $this->tagriAL7, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[6] == 1) {                            //Art / Lang. B#01
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'7',$this->ppoliticAL7, $this->tpoliticAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'7',$this->pbusistatAL7, $this->tbusistatAL7, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'7',$this->phindiAL7, $this->thindiAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'7',$this->partAL7, $this->tartAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'7',$this->pdramaAL7, $this->tdramaAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'7',$this->pjapAL7, $this->tjapAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'7',$this->pfrenchAL7, $this->tfrenchAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'7',$this->pkoreanAL7, $this->tkoreanAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'7',$this->phindiAL7, $this->thindiAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'7',$this->partAL7, $this->tartAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'7',$this->pdramaAL7, $this->tdramaAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'7',$this->ppoliticAL7, $this->tpoliticAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'7',$this->pbusistatAL7, $this->tbusistatAL7, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs6[6] == 1) {                            //Art / Lang. B#02
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'7',$this->psinAL7, $this->tsinAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'7',$this->pGeogAL7, $this->tGeogAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'7',$this->pagriAL7, $this->tagriAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'7',$this->psinAL7, $this->tsinAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'7',$this->pGeogAL7, $this->tGeogAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'7',$this->pomusicAL7, $this->tomusicAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'7',$this->pagriAL7, $this->tagriAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'7',$this->pheconAL7, $this->theconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'7',$this->psinAL7, $this->tsinAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'7',$this->pengAL7, $this->tengAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'7',$this->pGeogAL7, $this->tGeogAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'7',$this->pomusicAL7, $this->tomusicAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'7',$this->pagriAL7, $this->tagriAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'7',$this->pheconAL7, $this->theconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[6] == 1) {                            //Art / Lang. B#03
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'7',$this->plogicAL7, $this->tlogicAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'7',$this->phistAL7, $this->thistAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'7',$this->plogicAL7, $this->tlogicAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'7',$this->phistAL7, $this->thistAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'7',$this->pdanceAL7, $this->tdanceAL7, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }  
        } else if($this->bs8[6] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'7',$this->partAL7, $this->tartAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'7',$this->pdramaAL7, $this->tdramaAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'7',$this->peconAL7, $this->teconAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'7',$this->ppoliticAL7, $this->tpoliticAL7, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'7',$this->pmediaAL7, $this->tmediaAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'7',$this->pictAL7, $this->tictAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'7',$this->pbusistatAL7, $this->tbusistatAL7 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'7',$this->pbusistudAL7, $this->tbusistudAL7 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }

        } else {
            if($this->subid7 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES  ( $this->clid, $this->subid7,'7',$this->p7, $this->t7, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
			        
        }
        
        
        //Time Slot #8
        if($this->bs1[7] == 1) {
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 37 ,'8',$this->pchAL8, $this->tchAL8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs2[7] == 1) {                            //Bio
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 36 ,'8',$this->pphAL8, $this->tphAL8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'8',$this->pagriAL8, $this->tagriAL8, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
			        
        } else if($this->bs3[7] == 1) {                            //E Tec
            if($this->clid==116  || $this->clid==117) {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'8',$this->pGeogAL8, $this->tGeogAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 35 ,'8',$this->pmathAL8, $this->tmathAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'8',$this->partAL8, $this->tartAL8, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs4[7] == 1) {                            //B Tec
            $insety = $wpdb->query($wpdb->prepare("
			INSERT INTO " . $tableName . "
			( cl_id, sub_id, slot, isDone, reason, ts_date )
			VALUES  ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 44 ,'8',$this->pGeogAL8, $this->tGeogAL8, FROM_UNIXTIME($this->sdate)),
			        ( $this->clid, 38 ,'8',$this->pagriAL8, $this->tagriAL8, FROM_UNIXTIME($this->sdate))"));
			        
			        if(0==$insety) {
			            
			            $this->my_print_error();
			            return false;
			            
			        }
		
        } else if($this->bs5[7] == 1) {                            //Art / Lang. B#01
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'8',$this->ppoliticAL8, $this->tpoliticAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'8',$this->pbusistatAL8, $this->tbusistatAL8, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 61 ,'8',$this->phindiAL8, $this->thindiAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'8',$this->partAL8, $this->tartAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'8',$this->pdramaAL8, $this->tdramaAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 62 ,'8',$this->pjapAL8, $this->tjapAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 60 ,'8',$this->pfrenchAL8, $this->tfrenchAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 63 ,'8',$this->pkoreanAL8, $this->tkoreanAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 61 ,'8',$this->phindiAL8, $this->thindiAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 51 ,'8',$this->partAL8, $this->tartAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 54 ,'8',$this->pdramaAL8, $this->tdramaAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 45 ,'8',$this->ppoliticAL8, $this->tpoliticAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 48 ,'8',$this->pbusistatAL8, $this->tbusistatAL8, FROM_UNIXTIME($this->sdate))"));
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            }
            
		
        } else if($this->bs6[7] == 1) {                            //Art / Lang. B#02
            
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'8',$this->psinAL8, $this->tsinAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'8',$this->pGeogAL8, $this->tGeogAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'8',$this->pagriAL8, $this->tagriAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else if($this->clid==104) {  
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'8',$this->psinAL8, $this->tsinAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'8',$this->pGeogAL8, $this->tGeogAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'8',$this->pomusicAL8, $this->tomusicAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'8',$this->pagriAL8, $this->tagriAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'8',$this->pheconAL8, $this->theconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 58 ,'8',$this->psinAL8, $this->tsinAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 59 ,'8',$this->pengAL8, $this->tengAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 44 ,'8',$this->pGeogAL8, $this->tGeogAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 53 ,'8',$this->pomusicAL8, $this->tomusicAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8, FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 38 ,'8',$this->pagriAL8, $this->tagriAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 64 ,'8',$this->pheconAL8, $this->theconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs7[7] == 1) {                            //Art / Lang. B#03
            if($this->clid==103) { 
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'8',$this->plogicAL8, $this->tlogicAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'8',$this->phistAL8, $this->thistAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
            } else {
                $insety = $wpdb->query($wpdb->prepare("
                INSERT INTO " . $tableName . "
                ( cl_id, sub_id, slot, isDone, reason, ts_date )
                VALUES  ( $this->clid, 46 ,'8',$this->plogicAL8, $this->tlogicAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 66 ,'8',$this->phistAL8, $this->thistAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                        ( $this->clid, 52 ,'8',$this->pdanceAL8, $this->tdanceAL8, FROM_UNIXTIME($this->sdate))"));
                        
                        
                        if(0==$insety) {
                            
                            $this->my_print_error();
                            return false;
                            
                        }
                }
        } else if($this->bs8[7] == 1) {                            //Commerce. B#02
            $insety = $wpdb->query($wpdb->prepare("
            INSERT INTO " . $tableName . "
            ( cl_id, sub_id, slot, isDone, reason, ts_date )
            VALUES  ( $this->clid, 51 ,'8',$this->partAL8, $this->tartAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 54 ,'8',$this->pdramaAL8, $this->tdramaAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 43 ,'8',$this->peconAL8, $this->teconAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 45 ,'8',$this->ppoliticAL8, $this->tpoliticAL8, FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 47 ,'8',$this->pmediaAL8, $this->tmediaAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 42 ,'8',$this->pictAL8, $this->tictAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 48 ,'8',$this->pbusistatAL8, $this->tbusistatAL8 , FROM_UNIXTIME($this->sdate)),
                    ( $this->clid, 49 ,'8',$this->pbusistudAL8, $this->tbusistudAL8 , FROM_UNIXTIME($this->sdate))"));
                    
                    
                    if(0==$insety) {
                        
                        $this->my_print_error();
                        return false;
                        
                    }
        } else {
            if($this->subid8 != 0) {
                $insety = $wpdb->query($wpdb->prepare("
    			INSERT INTO " . $tableName . "
    			( cl_id, sub_id, slot, isDone, reason, ts_date )
    			VALUES ( $this->clid, $this->subid8,'8',$this->p8, $this->t8, FROM_UNIXTIME($this->sdate))")); 
    			
    			if(0==$insety) {
    			            
    			            $this->my_print_error();
    			            return false;
    			            
    			        }
            }
        }
	
		return true;
    }
    
    public function srb_check_timeslot_exsist() {

        $clid = $_POST['cl_id'];
        $date = $_POST['rdate'];
        $retArr = array();
        $msg = "";
        $timeslots = new TimeSlot();
        $su = new Subject();
        $cl = new stClass();
        $clsArr = $cl->getAll1011();
        $subArr = $su->getCoreSubjects();
        
        foreach($clsArr as $cl) {
            $retArr['classes'][] = array(
                    'cl_id' => $cl->getCid(),
                    'cl_name' => $cl->getCname()
                );
        }
        
        foreach($subArr as $su) {
            $retArr['subs'][] = array(
                    's_id' => $su->getSid(),
                    's_name' => $su->getSname(),
                    's_code' => $su->getCode()
                );
        }

        $slotarray = $timeslots->getByDateAndClassAll($clid, $date);
        //$this->console_log($slotarray);

        foreach($slotarray as $s) {
            $subname = $su->getOneSubject($s->getSubid())->getSname();
            $clname  = $cl->getOneClass($s->getClid())->getCname();
            $retArr['timeslots'][] = array(
                    'ts_id' => $s->getTsid(),
                    'cl_id' => $s->getClid(),
                    'cl_name' => $clname,
                    'sub_id' => $s->getSubid(),
                    'sub_name' => $subname,
                    'slot' => $s->getSlot(),
                    'is_done' => $s->getIsdone(),
                    'reason' => $s->getReason(),
                    'ts_date' => $s->getTsdate()
                );
        }
        
        echo json_encode($retArr);
        
        wp_die();
        
    }
    
    
    function my_print_error() {

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
    
    public function ays_color_inverse( $color ){
        $color = str_replace( '#', '', $color );
        if ( strlen( $color ) == 3 ){
            $color_short = str_split( $color );
            foreach( $color_short as $k => $c_short ){
                $color_short[$k] = $c_short . $c_short;
            }
            $color = implode( $color_short );
        }

        if ( strlen( $color ) != 6 ){
            return '#000000';
        }

        $rgb = '';
        for ( $x = 0; $x < 3; $x++ ){
            $c = 355 - hexdec( substr( $color, ( 3 * $x ), 3 ) );
            $c = ( $c < 0 ) ? 0 : dechex( $c );
            $rgb .= ( strlen( $c ) < 3 ) ? '0' . $c : $c;
        }

        return '#'.$rgb;
    }
    
    /**
     * Redirect
     *
     * @since    1.0.0
     */
    public function custom_redirect($admin_notice, $response, $slug='')
    {
        wp_redirect(esc_url_raw(add_query_arg(array(
            'blm_admin_add_notice' => $admin_notice,
            'blm_response' => $response,
        ) , admin_url('admin.php?page=' . $this->plugin_name.$slug))));

    }
    
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    /**
     * Print Admin Notices
     *
     * @since    1.0.0
     */
    public function print_plugin_public_notices()
    {
        if (isset($_REQUEST['blm_admin_add_notice']))
        {
            if ($_REQUEST['blm_admin_add_notice'] === "success")
            {
                $html = '<div class="notice notice-success is-dismissible"> 
							<h3>The request was successful. </h3>';
                $html .= '<pre style="color:green">' . $_REQUEST['blm_response'] . '</pre></div>';
                echo $html;
            } else {
				$html = '<div class="notice notice-error is-dismissible"> 
							<h3>The request was not successful. </h3>';
                $html .= '<pre style="color:red">' . $_REQUEST['blm_response'] . '</pre></div>';
                echo $html;
			}

            // handle other types of form notices
            
        }
        else
        {
            return;
        }

    }


}
