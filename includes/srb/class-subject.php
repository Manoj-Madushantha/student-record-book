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

class Subject {

    private $sid;
    private $sname;
    private $scode;
    
    private $subAll = array();
    private $output;
	
    public function __construct() {
        $this->output = '';
    }

    public function getSid() {
        return $this->sid;
    }

    public function setSid($sid) {
        $this->sid = $sid;
    }

    public function getSname() {
        return $this->sname;
    }

    public function setSname($sname) {
        $this->sname = $sname;
    }

    public function getCode(){
        return $this->scode;
    }

    public function setCode($scode) {
        $this->scode = $scode;
    }
    
    public function getOutput() {
        return $this->output;
    }
    
    public function setOutput($output) {
        $this->output = $output;
    }
    
    //Insert
    public function Insert() {
		try{
			global $wpdb;
			$content = '';
			$result = $wpdb->insert(
				$wpdb->prefix . 'srb_subject',
				array(
					'sub_id' => $this->sid,
					'sub_name' => $this->sname,
					'sub_code' => $this->scode,
				),
				array(
					'%d','%s','%d'
				)
			);
			
			if($result) {
			    $content .= 'Subject ID ' . $this->sid . ' Successfully Inserted In to subject table ' . PHP_EOL; 
			}
			//wp_mail($this->email, "MLM Your Username=". $this->username ." and password=". $this->password);

			$this->setOutput($content);
            //wp_die();
            //wp_mail($this->email, "MLM Your Username=". $this->username ." and password=". $this->password);
            
		} catch (Exception $ex) {
			$this->console_log($ex);
		}
        
        

    }
    
    //Update 
    public function Update() {
            global $wpdb;
            $result = $wpdb->update(
                $wpdb->prefix . 'srb_subject',
                array(
                    'sub_id' => $this->sid,
					'sub_name' => $this->sname,
					'sub_code' => $this->scode,
                ),
                array(
                    'sub_id'=> $this->sid
                ),
                array(
                    '%d','%s','%d'
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
    
    public function getNextID() {
        global $wpdb;
        $sql="SELECT MAX(sub_id)+1 FROM `" .  $wpdb->prefix . 'srb_subject' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getRowCount() {
        global $wpdb;
        $sql="SELECT COUNT(sub_id) FROM `" .  $wpdb->prefix . 'srb_subject' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getOneSubject($id) {
        try{
            global $wpdb;
            $mb = new Subject();
            //$sql="SELECT * FROM `" . $wpdb->prefix . "subject` WHERE sub_id=" . $id ;
            $mylink = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}srb_subject WHERE sub_id = %d", $id ) );

            $mb->setSid($mylink->sub_id);
            $mb->setSname($mylink->sub_name);
            $mb->setCode($mylink->sub_code);

        } catch(Exception $e) {

        }

        return $mb;

     }
     
     
    public function getAll() {
         try {
            
            global $wpdb;
            $this->memAll = array();
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_subject` ORDER BY `sub_id`"
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
     
     public function getCoreSubjects() {
         try {
            
            global $wpdb;
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE sub_id IN (1, 2, 3, 4, 5, 6, 17, 27, 18, 19) ORDER BY FIELD(sub_id, 1, 2, 3, 4, 5, 6, 27, 17, 18, 19)"
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
     
     public function getCoreSubjects69() {
         try {
            
            global $wpdb;
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (1,2,3,4,5,6,22,27,29,30,31,32,33,34)"
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
     
     public function getCoreSubjectsAL($clid) {
         try {
            global $wpdb;
            $this->subAll = [];
            $art_lang = [103,104,105,120,121,122];
            $maths = [106,107,108,109,123,124,125,126,147];
            $bio = [110,111,112,113,123,124,125,126];
            $etec = [114,115,116,117,133,134,135,136];
            $btec = [118,119,131,132];
            $commerce = [137,138,139,140,141,142,143,144,145,146];
            
            if(in_array($clid, $art_lang)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (41, 65, 27, 92, 93, 94) "
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            if(in_array($clid, $maths)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (36, 40, 41, 65, 27, 88) "
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            if(in_array($clid, $bio)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (37, 39, 41, 65, 27, 89) "
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            if(in_array($clid, $etec)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (55, 57, 41, 65, 27, 90) "
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            if(in_array($clid, $btec)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (56, 57, 41, 65, 27, 91)"
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            if(in_array($clid, $commerce)) {
                $results = $wpdb->get_results(
                    "SELECT * FROM `" . $wpdb->prefix . "srb_subject` WHERE `sub_id` IN (49, 50, 43, 41, 65, 27, 95) "
                );
            
                foreach ( $results as $result => $row ) {
    
                    $mb = new Subject();
                    $mb->setSid($row->sub_id);
                    $mb->setSname($row->sub_name);
                    $mb->setCode($row->sub_code);
                    array_push($this->subAll, $mb);
    
                }
                return $this->subAll;
            }
            
            
            return false;
            
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }       
        
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