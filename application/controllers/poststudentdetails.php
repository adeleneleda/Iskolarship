<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostStudentDetails extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('PostStudentDetails_Model', 'Model');
	}
    
    public function get_details()
    {
        $studentdetails = array();
        $studentdetails['username'] = $this->input->post("username");
        $studentdetails['password'] = $this->input->post("password");
        $studentdetails['lastname'] = $this->input->post("lastname");
        $studentdetails['firstname'] = $this->input->post("firstname");
        $studentdetails['middlename'] = $this->input->post("middlename");
        $studentdetails['namesuffix'] = $this->input->post("namesuffix");
        $studentdetails['sex'] = $this->input->post("sex");
        $studentdetails['birthday'] = $this->input->post("birthday");
        $studentdetails['program'] = $this->input->post("program");
        $studentdetails['yearlevel'] = $this->input->post("yearlevel");
        $studentdetails['mobilenumber'] = $this->input->post("mobilenumber");
        $studentdetails['emailadd'] = $this->input->post("emailadd");
        $studentdetails['familyincome'] = $this->input->post("familyincome");
        $studentdetails['targetmoney'] = $this->input->post("targetmoney");
        $studentdetails['reason'] = $this->input->post("reason");
        
        $allowedExts = array("pdf");
        $temp = explode(".", $_FILES["cvfile"]["name"]);
        $extension = end($temp);
        $studid = $this->Model->save_studentdetails($studentdetails);
        if(($_FILES["cvfile"]["type"] == "application/pdf") && in_array($extension, $allowedExts))
        {
            if ($_FILES["cvfile"]["error"] > 0)
            {
                echo "Error: " . $_FILES["cvfile"]["error"] . "<br>";
            }
            else
            {
                move_uploaded_file($_FILES["cvfile"]["tmp_name"], "studentcvs/" . $studid . "_cv.pdf");
            }
        }
        else
        {
            echo "Invalid file";
        }
        if(($_FILES["copyofgrades"]["type"] == "application/pdf") && in_array($extension, $allowedExts))
        {
            if ($_FILES["copyofgrades"]["error"] > 0)
            {
                echo "Error: " . $_FILES["copyofgrades"]["error"] . "<br>";
            }
            else
            {
                move_uploaded_file($_FILES["copyofgrades"]["tmp_name"], "studentcopyofgrades/" . $studid . "_copyofgrades.pdf");
            }
        }
        else
        {
            echo "Invalid file";
        }
        $this->load_view('signedup_view');
    }
    
    public function index()
    {
        $programs = $this->Model->get_programs();
        $yearlevels = $this->Model->get_yearlevels();
        $this->load_view('poststudentdetails_view', compact('programs', 'yearlevels'));
    }
}
?>
