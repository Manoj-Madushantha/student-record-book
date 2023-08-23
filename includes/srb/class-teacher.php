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

class Teacher {

    private $tid;
    private $teaname;
    private $code;
    private $nic;
    
    private $teaAll = array();
    private $srb_data_table = array();
    private $output;
	
    public function __construct() {
        global $wpdb;
        $this->srb_data_table['teacher'] = $wpdb->prefix . 'teacher';
        $this->output = '';
    }

    public function getTid() {
        return $this->tid;
    }

    public function setTid($tid) {
        $this->tid = $tid;
    }

    public function getTeaname() {
        return $this->teaname;
    }

    public function setTeaname($teaname) {
        $this->teaname = $teaname;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }
    
    public function getNIC(){
        return $this->nic;
    }

    public function setNIC($nic) {
        $this->nic = $nic;
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
				$wpdb->prefix . 'srb_teacher',
				array(
					'tea_id' => $this->tid,
					'tea_name' => $this->teaname,
					'tea_no' => $this->code,
					'NIC' => $this->nic,
				),
				array(
					'%d','%s','%d','%s'
				)
			);
			
			if($result) {
			    $content .= 'Teacher ID ' . $this->tid . ' Successfully Inserted In to teacher table ' . PHP_EOL; 
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
                $wpdb->prefix . 'srb_teacher',
                array(
                    'tea_id' => $this->tid,
					'tea_name' => $this->teaname,
					'tea_no' => $this->code,
					'NIC' => $this->nic,
                ),
                array(
                    'tea_id'=> $this->tid
                ),
                array(
                    '%d','%s','%d','%s'
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
            $wpdb->prefix . 'srb_teacher',
            array(
                'tea_id' => $this->tid
            ),
            array(
                '%d'
            )
        );

    }
    
    public function getNextID() {
        global $wpdb;
        $sql="SELECT MAX(tea_id)+1 FROM `" .  $wpdb->prefix . 'srb_teacher' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getRowCount() {
        global $wpdb;
        $sql="SELECT COUNT(tea_id) FROM `" .  $wpdb->prefix . 'srb_teacher' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getOneTeacher($id) {
        try{
            global $wpdb;
            $mb = new Teacher();
            $sql="SELECT * FROM `" . $wpdb->prefix . "srb_teacher` WHERE tea_id=" . $id ;
            $results = $wpdb->get_results($sql);
            
            foreach ( $results as $result => $row ) {
                
                $mb->setTid($row->tea_id);
                $mb->setTeaname($row->tea_name);
                $mb->setCode($row->tea_no);
            }

        } catch(Exception $e) {

        }

        return $mb;

     }
     
     public function getAll() {
         try {
            
            global $wpdb;
            $this->teaAll = array();
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_teacher` ORDER BY `tea_id`"
            );
            
            foreach ( $results as $result => $row ) {

                $mb = new Teacher();
                $mb->setTid($row->tea_id);
                $mb->setTeaname($row->tea_name);
                $mb->setCode($row->tea_no);
                $mb->setNIC($row->NIC);
                array_push($this->teaAll, $mb);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->teaAll;
     }
	
     public function getTeacherDetailsByTid($tid) {
        try {
            
            global $wpdb;
            $this->teaAll = array();
            
            $results = $wpdb->get_results(
                "SELECT
                    `wp_srb_teacher`.`tea_id`,
                    `wp_srb_teacher`.`tea_name`,
                    `wp_srb_teacher`.`tea_no`,
                    `wp_srb_class`.`cl_id`,
                    `wp_srb_class`.`cl_name`,
                    `wp_srb_subject`.`sub_id`,
                    `wp_srb_subject`.`sub_name`,
                    `wp_srb_teacher_subject_class`.`medium`,
                    `wp_srb_teacher_subject_class`.`academic_year` 
                FROM `wp_srb_teacher` 
                JOIN `wp_srb_teacher_subject_class` ON `wp_srb_teacher`.`tea_id` = `wp_srb_teacher_subject_class`.`t_id` 
                JOIN `wp_srb_class` ON `wp_srb_class`.`cl_id` = `wp_srb_teacher_subject_class`.`cl_id` 
                JOIN `wp_srb_subject` ON `wp_srb_subject`.`sub_id`=`wp_srb_teacher_subject_class`.`sub_id`  
                WHERE `wp_srb_teacher`.`tea_id`=" .$tid. " ORDER BY `wp_srb_class`.`cl_id`"
            );
            $this->console_log($results);
            foreach ( $results as $result => $row ) {

                $tdetail = array (
                    "tid"=> $row->tea_id,
                    "tname" => $row->tea_name,
                    "tcode" => $row->tea_no,
                    "clid" => $row->cl_id,
                    "clname" => $row->cl_name,
                    "subid" => $row->sub_id,
                    "subname" => $row->sub_name,
                    "medium" => $row->medium,
                    "academicyear" => $row->academic_year
                );
                
                array_push($this->teaAll, $tdetail);

            }
            
        } catch (Exception $ex) {
            $content = 'Error' . $ex;
            console_log($content);
            $this->setOutput($content);
        }
        
        return $this->teaAll;
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