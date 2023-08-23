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

class Student {

    private $sid;
    private $sname;
    private $sindex;
    private $sclass;
    private $whatsapp;
    private $email;
    private $password;
    
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

    public function getIndex() {
        return $this->sindex;
    }

    public function setIndex($index) {
        $this->sindex = $sindex;
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
    
    public function getClass() {
        return $this->sclass;
    }

    public function setClass($sclass) {
        $this->sclass = $sclass;
    }

    public function getWhatsapp(){
        return $this->scode;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
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
				$wpdb->prefix . 'srb_student',
				array(
					'stu_id' => $this->sid,
					'index_no' => $this->sindex,
					'stu_name' => $this->sname,
					'cl_id' => $this->sclass,
				),
				array(
					'%d','%s','%s','%d'
				)
			);
			
			if($result) {
			    $content .= 'Student ID ' . $this->sid . ' Successfully Inserted In to student table ' . PHP_EOL; 
			}
            
            
		} catch (Exception $ex) {
			$this->console_log($ex);
		}
        
        

    }
    
    //Update 
    public function Update() {
            global $wpdb;
            $result = $wpdb->update(
                $wpdb->prefix . 'srb_student',
                array(

					'index_no' => $this->sindex,
					'stu_name' => $this->sname,
					'cl_id' => $this->sclass,
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
            $wpdb->prefix . 'srb_student',
            array(
                'stu_id' => $this->sid
            ),
            array(
                '%d'
            )
        );

    }
    
    public function getNextID() {
        global $wpdb;
        $sql="SELECT MAX(stu_id)+1 FROM `" .  $wpdb->prefix . 'srb_student' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getRowCount() {
        global $wpdb;
        $sql="SELECT COUNT(stu_id) FROM `" .  $wpdb->prefix . 'srb_student' . "`";
        return intval($wpdb-> get_var($sql));

    }
    
    public function getOneStudent($id, $code) {
        try{
            global $wpdb;
            $mb = new Student();
            //$sql="SELECT * FROM `" . $wpdb->prefix . "subject` WHERE sub_id=" . $id ;
            $mylink = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}srb_student WHERE stu_id = %s OR stu_code = %s", $id, $code ) );

            $mb->setSid($mylink->stu_id);
            $mb->setIndex($mylink->index_no);
            $mb->setSname($mylink->stu_name);
            $mb->setClass($mylink->cl_id);

        } catch(Exception $e) {

        }

        return $mb;

     }
     
    public function getAll() {
         try {
            
            global $wpdb;
            $this->stuAll = array();
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_student` ORDER BY `stu_class`"
            );
            
            foreach ( $results as $result => $row ) {

                $mb = new Student();
                $mb->setSid($mylink->stu_id);
                $mb->setIndex($mylink->index_no);
                $mb->setSname($mylink->stu_name);
                $mb->setClass($mylink->cl_id);
                
                array_push($this->stuAll, $mb);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->stuAll;
     }

    public function getStudentsByClass($clid) {
        try {
            global $wpdb;
            $this->stuAll = array();

            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_student` WHERE `cl_id`=".$clid
            );
            
            foreach ( $results as $result => $row ) {

                $mb = new Student();
                $mb->setSid($row->stu_id);
                $mb->setIndex($row->index_no);
                $mb->setSname($row->stu_name);
                $mb->setClass($row->cl_id);
                
                array_push($this->stuAll, $mb);

            }
        } catch(Exception $ex) {

        }

        return $this->stuAll;
    }
     
     public function verifyuser($code, $password) {
         
         try{
             global $wpdb;
             
             $mylink = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}srb_student WHERE stu_code = %s OR password = %s", $id, $password ) );
             
             if($mylink!=null) return true;
             
             return false;
             
         } catch(Exception $ex) {
             
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