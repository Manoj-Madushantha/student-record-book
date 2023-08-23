<?php 
/**
 * The file that defines define getters, setters and database related queries of 
 * entity.
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
 * The Entity class.
 *
 * This is used to define getters, setters and database related queries of 
 * entity.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Student Record Book
 * @subpackage Student Record Book/includes
 * @author     Manoj Madushantha <manojmadushantha@gmail.com>
*/

class stClass {

    private $cid;
    private $cname;
    private $ctid;
    private $ctname;
    private $cgrade;
    private $csection;
    private $catAll = array();
    private $output;
	
    public function __construct() {

    }

    public function getCid() {
        return $this->cid;
    }

    public function setCid($cid) {
        $this->cid = $cid;
    }

    public function getCname() {
        return $this->cname;
    }

    public function setCname($cname) {
        $this->cname = $cname;
    }
    
    public function getCtid() {
        return $this->ctid;
    }

    public function setCtid($ctid) {
        $this->ctid = $ctid;
    }
    
    public function getCtname() {
        return $this->ctname;
    }

    public function setCtname($ctname) {
        $this->ctname = $ctname;
    }
    
    public function getCgrade() {
        return $this->cgrade;
    }
    
    public function setCgrade($cgrade) {
        $this->cgrade = $cgrade;
    }
    
    public function getCsection() {
        return $this->csection;
    }
    
    public function setCsection($csection) {
        $this->csection = $csection;
    }

    public function getOutput() {
        return $this->output;
    }
    
    public function setOutput($output) {
        $this->output = $output;
    }

    public function Insert() {
        try{
			global $wpdb;
			$content = '';
			$result = $wpdb->insert (
				$wpdb->prefix . 'srb_class',
				array(
					'cl_id' => $this->cid,
					'cl_name' => $this->cname,
					'cl_teacher' => $this->ctid,
					'cl_teacher_name' => $this->ctname,
					'grade' => $this->cgrade,
					'section' => $this->csection
                ),
                array(
                    '%d', '%s' , '%d', '%s', '%s', '%s'
                )
            );
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
            $this->console_log($ex);
        }

        if($result) {
			$content .= 'Class ID ' . $this->cid .' Successfully Inserted In to class table ' . PHP_EOL; 
			$this->setOutput($content);
			
		}

    }

    //Update 
    public function Update() {

        try {
            global $wpdb;
            $content = '';
            $result = $wpdb->update(
                $this->$blm_data_table['TBL_MEMBER'],
                array(
                    'cl_id' => $this->cid,
					'cl_name' => $this->cname,
					'cl_teacher' => $this->ctid,
					'cl_teacher_name' => $this->ctname
                ),
                array(
                    'cl_id'=> $this->cid
                ),
                array(
                    '%d','%s','%d','%s'
                ),
                array(
                    '%d'
                )
            );
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }

        if($result) {
			$content .= 'Class ID' . $this->cid .'Successfully Updated In  class table ' . PHP_EOL; 
			$this->setOutput($content);
		}
    }

    //Delete
    public function delete() {

        try {
            global $wpdb;
            $content = '';
            $result = $wpdb->delete(
                $this->$blm_data_table['TBL_CTG'],
                array(
                    'cl_id' => $this->cid
                ),
                array(
                    '%d'
                )
            );
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }

        if($result) {
			$content .= 'Class ID' . $this->cid .'Successfully Deleted In  class table ' . PHP_EOL; 
			$this->setOutput($content);
		}

    }
    


    public function getNextID() {
        global $wpdb;
        $sql="SELECT MAX(cl_id)+1 FROM `" .  $wpdb->prefix . 'srb_class' . "`" ;
        return intval($wpdb-> get_var($sql));

    }

    public function getOneClass($id) {

       try{
            global $wpdb;
            $mb = new stClass();
            
            $mylink = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}srb_class WHERE cl_id = %d", $id ) );
            
            $mb->setCid($mylink->cl_id);
            $mb->setCname($mylink->cl_name);
            $mb->setCtid($mylink->cl_teacher);
            $mb->setCtname($mylink->cl_teacher_name);
            
        } catch(Exception $e) {
            $this->console_log($e);
        }

        return $mb;
        
    }
    
    
    //get All Categories
    public function getAll() {

        try {
            
            global $wpdb;
            $this->catAll = array();
            
            $results = $wpdb->get_results(
                "SELECT * FROM `" . $wpdb->prefix . "srb_class` ORDER BY `cl_name`"
            );
            
            foreach ( $results as $result => $row ) {

                $cat = new stClass();
                $cat->setCid($row->cl_id);
                $cat->setCname($row->cl_name);
                $cat->setCtid($row->cl_teacher);
                $cat->setCtname($row->cl_teacher_name);
                array_push($this->catAll, $cat);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->catAll;
        
    }
    
    //get 10 - 11
    public function getAll1011() {

        try {
            
            global $wpdb;
            $this->catAll = array();
            
            $results = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM {$wpdb->prefix}srb_class  WHERE `section`=%s ORDER BY `cl_name`" , "middle_section")
            );
            
            foreach ( $results as $result => $row ) {

                $cat = new stClass();
                $cat->setCid($row->cl_id);
                $cat->setCname($row->cl_name);
                $cat->setCtid($row->cl_teacher);
                $cat->setCtname($row->cl_teacher_name);
                array_push($this->catAll, $cat);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->catAll;
        
    }
    
    //get 6-9 grades
    public function getAll69() {

        try {
            
            global $wpdb;
            $this->catAll = array();
            
            $results = $wpdb->get_results(
                 $wpdb->prepare("SELECT * FROM {$wpdb->prefix}srb_class WHERE `section`=%s OR `section`=%s   ORDER BY `cl_name`", "junior_section", "junior_middle_section")
            );
            
            foreach ( $results as $result => $row ) {

                $cat = new stClass();
                $cat->setCid($row->cl_id);
                $cat->setCname($row->cl_name);
                $cat->setCtid($row->cl_teacher);
                $cat->setCtname($row->cl_teacher_name);
                array_push($this->catAll, $cat);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->catAll;
        
    }
    
    public function getAllAL() {

        try {
            
            global $wpdb;
            $this->catAll = array();
            
            $results = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM {$wpdb->prefix}srb_class  WHERE `section`=%s ORDER BY `cl_name`" , "al_section")
            );
            
            foreach ( $results as $result => $row ) {

                $cat = new stClass();
                $cat->setCid($row->cl_id);
                $cat->setCname($row->cl_name);
                $cat->setCtid($row->cl_teacher);
                $cat->setCtname($row->cl_teacher_name);
                array_push($this->catAll, $cat);

            }
            
        } catch (Exception $ex) {
            $content .= 'Error' . $ex;
            $this->setOutput($content);
        }
        
        return $this->catAll;
        
    }
    
    
    public function getTimeTable($id) {

      
        
    }
    
    public function toString() {
        
        return "Hello From Category";
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