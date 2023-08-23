<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

$srb_class_table = $wpdb->prefix . 'srb_class';
$srb_teacher_table = $wpdb->prefix . 'srb_teacher';
$srb_subject_table = $wpdb->prefix . 'srb_subject';
$srb_timetable_table = $wpdb->prefix . 'srb_timetable';
$srb_timeslot_table = $wpdb->prefix . 'srb_timeslot';
$srb_sub_teacher_table = $wpdb->prefix . 'srb_sub_teacher';
$srb_teacher_class_table = $wpdb->prefix . 'srb_teacher_class';
$srb_timetable_class_table = $wpdb->prefix . 'srb_timetable_class';

$wpdb->query("DROP TABLE IF EXISTS `".$srb_class_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_teacher_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_subject_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_timetable_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_timeslot_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_sub_teacher_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_teacher_class_table."`");
$wpdb->query("DROP TABLE IF EXISTS `".$srb_timetable_class_table."`");

delete_option( "srb_db_version");