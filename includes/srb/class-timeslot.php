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

class TimeSlot {

    private $tsid;
    private $clid;
    private $subid;
    private $slot;
    private $isdone;
    private $reason;
    private $tsdate;
    
    
    private $output;
	
    public function __construct() {

    }

    public function getTsid() {
        return $this->tsid;
    }

    public function setTsid($tsid) {
        $this->tsid = $tsid;
    }

    public function getClid() {
        return $this->clid;
    }

    public function setClid($clid) {
        $this->clid = $clid;
    }
    
    public function getSubid() {
        return $this->subid;
    }

    public function setSubid($subid) {
        $this->subid = $subid;
    }
    
    public function getSlot() {
        return $this->slot;
    }
    
    public function setSlot($slot) {
        $this->slot = $slot;
    }
    
    public function getIsdone() {
        return $this->isdone;
    }

    public function setIsdone($isdone) {
        $this->isdone = $isdone;
    }
    
    public function getReason() {
        return $this->reason;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function getTsdate() {
        return $this->tsdate;
    }
    
    public function setTsdate($tsdate) {
        $this->tsdate = $tsdate;
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
                    '%d','%d','%d','%s','%d','%s','%d'
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
    
    public function getRowCountByClass($clid, $date) {
        global $wpdb;
        $date = strtotime($date);
        $sql="SELECT COUNT(cl_id) FROM `" .  $wpdb->prefix . 'srb_timeslot' . "` WHERE cl_id=". $clid . " AND ts_date=FROM_UNIXTIME(". $date . ")" ;
        return intval($wpdb-> get_var($sql));

    }
    
    
    public function getDistinctCountClasses($date) {
        
        global $wpdb;
        $date = strtotime($date);
        $sql="select count(distinct cl_id) as DistinctValues from `" .  $wpdb->prefix . 'srb_timeslot' . "` WHERE ts_date=FROM_UNIXTIME(". $date . ")" ;
        return intval($wpdb-> get_var($sql));

    }
    
    public function getDistinctClassesList($date) {
        
        global $wpdb;
        $this->classArray = array();
        $date = strtotime($date);
        $sql="SELECT DISTINCT cl_id FROM `" .  $wpdb->prefix . 'srb_timeslot' . "` WHERE ts_date=FROM_UNIXTIME(". $date . ")" ;
        $resluts = $wpdb->get_results($sql);
        
        foreach ( $resluts as $result => $row ) {
            
               array_push($this->classArray, $row->cl_id); 

            }
        return $this->classArray;

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
     
    public function getByDateAll($rdate) {
         try {
            
            global $wpdb;
            $timeslotAll = array();
            //$rdate = strtotime($rdate);
            
            //$numcl = $this->getRowCountClass($rdate);
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_timeslot`  WHERE `ts_date`='" . $rdate . "'" 
            );
            
            foreach ( $results as $result => $row ) {

                $ts = new TimeSlot();
                
                $ts->setTsid($row->ts_id);
                $ts->setClid($row->cl_id);
                $ts->setSubid($row->sub_id);
                $ts->setSlot($row->slot);
                $ts->setIsdone($row->isDone);
                $ts->setReason($row->reason);
                $ts->setTsdate($row->ts_date);
                
                array_push($timeslotAll, $ts);

            }
            
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $timeslotAll;
     }
     
     
     public function getByDateAndClassAll($clid, $rdate) {
         
         try {
            
            global $wpdb;
            $this->timeslotAll = array();
            $rdate = strtotime($rdate);
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_timeslot`  WHERE `cl_id`=" . $clid . " AND `ts_date`=FROM_UNIXTIME(" . $rdate . ")"
            );
            
            foreach ( $results as $result => $row ) {

                $ts = new TimeSlot();
                $ts->setTsid($row->ts_id);
                $ts->setClid($row->cl_id);
                $ts->setSubid($row->sub_id);
                $ts->setSlot($row->slot);
                $ts->setIsdone($row->isDone);
                $ts->setReason($row->reason);
                $ts->setTsdate($row->ts_date);
                
                array_push($this->timeslotAll, $ts);
                
            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        //$this->console_log($this->timeslotAll);
        
        return $this->timeslotAll;
        
     }
     
     
    public function getAll($clid, $rdate) {
        try {
            
            global $wpdb;
            $this->timeslotAll = array();
            $rdate = strtotime($rdate);
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_timeslot`  WHERE `cl_id`=" . $clid . " AND `ts_date`=FROM_UNIXTIME(" . $rdate . ")"
            );
            
            foreach ( $results as $result => $row ) {

                $ts = new TimeSlot();
                
                $ts->setTsid($row->ts_id);
                $ts->setClid($row->cl_id);
                $ts->setSubid($row->sub_id);
                $ts->setSlot($row->slot);
                $ts->setIsdone($row->isDone);
                $ts->setReason($row->reason);
                $ts->setTsdate($row->ts_date);
                
                array_push($this->timeslotAll, $ts);
                
            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        //$this->console_log($this->timeslotAll);
        
        return $this->timeslotAll;
        
     }
     
     public function getCoreSubjects() {
         try {
            
            global $wpdb;
            $this->subAll = array();
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_code` IN (11, 21, 33, 31, 34, 32, 100) OR `sub_id` IN (18,19,20)"
            );
            
            foreach ( $results as $result => $row ) {

                $mb = new Subject();
                $mb->setSid($row->sub_id);
                $mb->setSname($row->sub_name);
                $mb->setCode($row->sub_code);
                
                array_push($this->subAll, $mb);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->subAll;
     }
     
     
	
	public function String($rslt) {
	    
	}
	
	
	 function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

}

?>