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

class Report {

    private $clid;
    private $rdate;
    private $numofclass;
    private $numofrecords ;
    private $classArry ;
    private $timeslots ;
    private $timeslotsbyclass = array() ;
    
    private $output;
	
    public function __construct() {
        $this->output = '';
    }


    public function getClid() {
        return $this->clid;
    }

    public function setClid($clid) {
        $this->clid = $clid;
    }
    
    public function getRdate() {
        return $this->rdate;
    }

    public function setRdate($rdate) {
        $this->rdate = $rdate;
    }
    
    public function getNumofclass(){
        return $this->numofclass;
    }
    
    public function setNumofclass($numofclass) {
        $this->numofclass = $numofclass;
    }
    
    public function getNumofrecords(){
        return $this->numofrecords;
    }
    
    public function setNumofrecords($numofrecords) {
        $this->numofrecords = $numofrecords;
    }
    
    
    public function getClassArray(){
        return $this->classArry;
    }
    
    public function setClassArray($classArry) {
        $this->classArry = $classArry;
    }
    
    public function getTimeslots(){
        return $this->timeslots;
    }
    
    public function setTimeslots($timeslots) {
        $this->timeslots = $timeslots;
    }
    
    public function getTimeslotsbyclass(){
        return $this->timeslotsbyclass;
    }
    
    public function setTimeslotsbyclass($timeslotsbyclass) {
        $this->timeslotsbyclass = $timeslotsbyclass;
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
                    'tb_id' => $this->tbid,
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
            $wpdb->prefix . 'srb_subject',
            array(
                'sub_id' => $this->sid
            ),
            array(
                '%d'
            )
        );

    }
    
    public function getClassReportByDate($rdate) {
        
        //try {
            

            $nrec = array();
            
            $timeslotsbycls = array();
            
            $tsts = new TimeSlot();
            
            $rp = new Report();
            
            $rp->setNumofclass($tsts->getDistinctCountClasses($rdate));
            
            $rp->setRdate($rdate);
            
            $rp->setClassArray($tsts->getDistinctClassesList($rdate));
            
            //foreach( $rp->getClassArray() as $clid ) {

                //$this->console_log($tsts->getRowCountByClass($clid, $rdate));
                //$this->console_log($tsts->getAll($clid, $rdate));
                //array_push($timeslotsbycls , $tsts->getAll($clid, $rdate));
                //array_push($nrec , $tsts->getRowCountByClass($clid, $rdate));
            //}
            
            //$rp->setNumofrecords($nrec);
            
            //$rp->setTimeslotsbyclass($timeslotsbycls);
            
            //$rp->setTimeslots($tsts->getByDateAll($rdate));
            
            //$this->console_log($timeslotsbycls);

        //} catch(Exception $e) {

        //}

        return $rp;

     }
    

    
    public function getClassReport($clid, $rdate) {
        try{
            global $wpdb;
            $rp = new Report();
            $tsts = new TimeSlot();
            $this->timeslots = $tsts->getAll($clid,$rdate);
            

        } catch(Exception $e) {

        }

        return $this->timeslots;

     }
     
   
     
     public function getCoreSubjects() {
         try {
            
            global $wpdb;
            $this->memAll = array();
            
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