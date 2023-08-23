<?php
global $srb_db_version;
$srb_db_version = '1.0.1';
/**
 *  Fired during plugin activation
 *
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

class SRB_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    

    private static function activate()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        global $wpdb;
        global $srb_db_version;

        /*
        if( get_option('srb_db_version') ){
            update_option('srb_db_version', $srb_db_version);
        }
        else{
            add_option( 'srb_db_version', $srb_db_version );
            register_setting('srb_db_version', 'srb_db_version');
        }
        */
        $installed_ver = get_site_option("srb_db_version");
        $srb_class_table = $wpdb->prefix . 'srb_class';
        $srb_subject_table = $wpdb->prefix . 'srb_subject';
        $srb_teacher_table = $wpdb->prefix . 'srb_teacher';
        $srb_timeslot_table = $wpdb->prefix . 'srb_timeslot';
        $srb_teacher_subject_class_table = $wpdb->prefix . 'srb_teacher_subject_class';
        $srb_timetable_class_table = $wpdb->prefix . 'srb_timetable_class';
        $charset_collate = $wpdb->get_charset_collate();

        if ($installed_ver != $srb_db_version) {

            $sql = "CREATE TABLE `". $srb_class_table ."` (
                `cl_id` INT(20) NOT NULL,
	            `cl_name` VARCHAR(20),
	            `cl_teacher` INT(20),
	            `cl_teacher_name` VARCHAR(60),
	            `grade` VARCHAR(10),
	            `section`  VARCHAR(35),
	            PRIMARY KEY (`cl_id`)
            ) $charset_collate;";
            dbDelta( $sql );

            $sql = "CREATE TABLE `".$srb_subject_table."` (
                `sub_id` INT(20) NOT NULL,
	            `sub_name` VARCHAR(60),
	            `sub_code` INT(20),
	            PRIMARY KEY (`sub_id`)
            ) $charset_collate;";
            dbDelta( $sql );

            $sql = "CREATE TABLE `".$srb_teacher_table."` (
                `tea_id` INT(20) NOT NULL,
	            `tea_name` VARCHAR(60),
	            `tea_no` INT(20),
	            `NIC` VARCHAR(40),
	            PRIMARY KEY (`tea_id`)
            ) $charset_collate;";
            dbDelta( $sql );
            
            $sql = "CREATE TABLE `".$srb_timetable_class_table."` (

                `cl_id` INT(20) NOT NULL,
	            `academic_year` INT NOT NULL,
	            `day` VARCHAR(50),
	            `slot1` VARCHAR(50),
	            `slot2` VARCHAR(50),
	            `slot3` VARCHAR(50),
	            `slot4` VARCHAR(50),
	            `slot5` VARCHAR(50),
	            `slot6` VARCHAR(50),
	            `slot7` VARCHAR(50),
	            `slot8` VARCHAR(50),
	            PRIMARY KEY (`cl_id`,`academic_year`,`day`)
            )$charset_collate;";
            dbDelta( $sql );
            
	            
            $sql = "CREATE TABLE `".$srb_timeslot_table."` (
            	`ts_id` int(20) NOT NULL,
            	`cl_id` int(20) NOT NULL,
                `sub_id` int(20) DEFAULT NULL,
                `slot` varchar(20) DEFAULT NULL,
                `isDone` tinyint(1) DEFAULT NULL,
                `reason` varchar(100) DEFAULT NULL,
                `ts_date` datetime NOT NULL,
	            PRIMARY KEY (`ts_id`)
            )$charset_collate;";
            dbDelta( $sql );
            
            $sql = "CREATE TABLE `".$srb_teacher_subject_class_table."` ( 
            	`t_id` INT(20) NOT NULL , 
            	`cl_id` INT(20) NOT NULL ,
            	`sub_id` INT(20) NOT NULL,
            	`academic_year` INT NOT NULL , 
            	PRIMARY KEY( `t_id`, `cl_id`, `sub_id`)
            ) $charset_collate;";
            dbDelta( $sql );
        }
    }

    public static function srb_update_db_check()
    {
        global $srb_db_version;

        if (get_site_option('srb_db_version') != $srb_db_version) {
            self::activate();
            
        } 
            
        if(get_site_option('srb_db_version')) {
            update_site_option('srb_db_version', $srb_db_version);
        } else {
            add_site_option( 'srb_db_version', $srb_db_version );
        }   


    }
}

?>