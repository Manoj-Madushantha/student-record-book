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

class TimeTable {

    private $clid;
    private $academic_year;
    private $day;
    private $slot1;
    private $slot2;
    private $slot3;
    private $slot4;
    private $slot5;
    private $slot6;
    private $slot7;
    private $slot8;
    
    private $output;
	
    public function __construct() {

    }

    public function getClid() {
        return $this->clid;
    }

    public function setClid($clid) {
        $this->clid = $clid;
    }
    
    public function getAcademicyear() {
        return $this->academic_year;
    }

    public function setAcademicyear($academic_year) {
        $this->academic_year = $academic_year;
    }
    
    public function getDay() {
        return $this->day;
    }

    public function setDay($day) {
        $this->day = $day;
    }
    
    public function getSlot1() {
        return $this->slot1;
    }
    
    public function setSlot1($slot1) {
        $this->slot1 = $slot1;
    }
    
    public function getSlot2() {
        return $this->slot2;
    }
    
    public function setSlot2($slot2) {
        $this->slot2 = $slot2;
    }
    
    public function getSlot3() {
        return $this->slot3;
    }
    
    public function setSlot3($slot3) {
        $this->slot3 = $slot3;
    }
    
    public function getSlot4() {
        return $this->slot4;
    }
    
    public function setSlot4($slot4) {
        $this->slot4 = $slot4;
    }
    
    public function getSlot5() {
        return $this->slot5;
    }
    
    public function setSlot5($slot5) {
        $this->slot5 = $slot5;
    }
    
    public function getSlot6() {
        return $this->slot6;
    }
    
    public function setSlot6($slot6) {
        $this->slot6 = $slot6;
    }
    
    public function getSlot7() {
        return $this->slot7;
    }
    
    public function setSlot7($slot7) {
        $this->slot7 = $slot7;
    }
    
    public function getSlot8() {
        return $this->slot8;
    }
    
    public function setSlot8($slot8) {
        $this->slot8 = $slot8;
    }
    
    public function getOutput() {
        return $this->output;
    }
    
    public function setOutput($output) {
        $this->output = $output;
    }
    
   
    
    //Update 
    public function Update() {
        
            global $wpdb;
            $result = $wpdb->update(
                $wpdb->prefix . 'srb_timeslot',
                array(
                    'ts_id' => $this->rid,
                    'cl_id' => $this->clid,
                    'sub_id' => $this->subid,
                    'slot' => $this->slot,
                    'isDone' => $this->isdone,
                    'reason' => $this->reason,
                    'ts_date' => $this->rdate,
                ),
                array(
                    'ts_id'=> $this->rid
                ),
                array(
                    '%d','%d','%d','%d','%s','%d','%s','%d'
                ),
                array(
                    '%d'
                )
            );

    }
    //Delete
    public function delete() {
        global $wpdb;
        $result = $wpdb->delete(
            $wpdb->prefix . 'srb_timeslot',
            array(
                'ts_id' => $this->tsid
            ),
            array(
                '%d'
            )
        );

    }
    
    public function getNextID() {
        global $wpdb;
        $sql="SELECT MAX(sub_id)+1 FROM `" .  $wpdb->prefix . 'srb_timeslot' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getRowCount() {
        global $wpdb;
        $sql="SELECT COUNT(cl_id) FROM `" .  $wpdb->prefix . 'srb_timeslot' . "`";
        return intval($wpdb-> get_var($sql));

    }
    

    
    public function getOne($clid, $rdate, $slot) {
        try{
            global $wpdb;
            $ts = new TimeSlot();
            $rdate = strtotime($rdate);
            

            $sql="SELECT * FROM `" . $wpdb->prefix . "srb_timeslot` WHERE cl_id=" . $clid . " AND slot=" . $slot . " AND ts_date=FROM_UNIXTIME(" . $rdate . ")" ;
            $resluts = $wpdb->get_results($sql);
            
            foreach ( $resluts as $result => $row ) {
                
                $ts->setTsid($row->ts_id);
                $ts->setClid($row->cl_id);
                $ts->setSubid($row->sub_id);
                $ts->setSlot($row->slot);
                $ts->setIsdone($row->isDone);
                $ts->setReason($row->reason);
                $ts->setTsdate($row->ts_date);
            }

        } catch(Exception $e) {

        }

        return $ts;

     }
     
    public function getSlotsByDay( $clid, $rdate ) {
         try {
            
            global $wpdb;
            $timestamp = strtotime($rdate);
            $day =  date('w', $timestamp);
            //print_r($day);
            switch($day) {
                case 1:
                    $day = 'mon';
                    break;
                case 2:
                    $day = 'tue';
                    break;
                case 3:
                    $day = 'wed';
                    break;
                case 4:
                    $day = 'thu';
                    break;
                case 5:
                    $day = 'fri';
                    break;
                default:
                    break;
            }
            //$numcl = $this->getRowCountClass($rdate);
            $row = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}srb_timetable_class WHERE `cl_id` = %d AND `day` = %s", $clid, $day ) );
            

                $ts = new TimeTable();
                
                $ts->setClid($row->cl_id);
                $ts->setAcademicyear($row->academic_year);
                $ts->setDay($row->day);
                $ts->setSlot1($row->slot1);
                $ts->setSlot2($row->slot2);
                $ts->setSlot3($row->slot3);
                $ts->setSlot4($row->slot4);
                $ts->setSlot5($row->slot5);
                $ts->setSlot6($row->slot6);
                $ts->setSlot7($row->slot7);
                $ts->setSlot8($row->slot8);
                    
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $ts;
     }

     public function timeTableExist($clid, $year) {
         
        try {
           
           global $wpdb;
           $this->results = array();
           $results = $wpdb->get_results(
               "SELECT * FROM `" . $wpdb->prefix . "srb_timetable_class`  WHERE `cl_id`=" . $clid . " AND `academic_year`=" . $year 
           );
           
           $num_rows = mysqli_num_rows($results);
           
           if($num_rows == 5) {
               $this->results = [$clid, $year];
           }
           
           
           
       } catch (Exception $ex) {
           $content .= 'Error' . $ex;
           $this->setOutput($content);
       }
       
       return $this->results;
    }
    
    
   public function getAll($clid, $year) {
       
       try {
           
           global $wpdb;
           $this->timeslotAll = array();
           $results = $wpdb->get_results(
               "SELECT * FROM `" . $wpdb->prefix . "srb_timetable_class`  WHERE `cl_id`=" . $clid . " AND `academic_year`=" . $year . " ORDER BY field(day, 'mon', 'tue', 'wed', 'thu', 'fri')"
           );
           
           foreach ( $results as $result => $row ) {

               $ts = new TimeTable();

               $ts->setClid($row->cl_id);
               $ts->setAcademicyear($row->academic_year);
               $ts->setDay($row->day);
               $ts->setSlot1($row->slot1);
               $ts->setSlot2($row->slot2);
               $ts->setSlot3($row->slot3);
               $ts->setSlot4($row->slot4);
               $ts->setSlot5($row->slot5);
               $ts->setSlot6($row->slot6);
               $ts->setSlot7($row->slot7);
               $ts->setSlot8($row->slot8);
               
               array_push($this->timeslotAll, $ts);
               
           }
           
       } catch (Exception $ex) {
           $content .= 'Error' . $ex;
           $this->setOutput($content);
       }
       //$this->console_log($this->timeslotAll);
       
       return $this->timeslotAll;
       
    }

    public function getExistClassAll($year) {
        
        try {
            
            global $wpdb;
            $this->classlist = array();
            $results = $wpdb->get_results(
                "SELECT DISTINCT cl_id FROM `" . $wpdb->prefix . "srb_timetable_class`  WHERE `academic_year`=" . $year
            );
            
            foreach ( $results as $result => $row ) {

                $ts = $row->cl_id;

                array_push($this->classlist, $ts);
                
            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->classlist;
        
     }
     
    }
     
     ?>