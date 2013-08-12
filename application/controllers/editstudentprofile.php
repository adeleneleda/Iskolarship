<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditStudentProfile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('EditStudentProfile_Model', 'Model');
	}
    
    public function get_details()
    {
        $studid = 19;
        $pid = 16;
        $studentdetails = array();
        $studentdetails['program'] = $this->input->post("program");
        $studentdetails['yearlevel'] = $this->input->post("yearlevel");
        $studentdetails['mobilenumber'] = $this->input->post("mobilenumber");
        $studentdetails['emailadd'] = $this->input->post("emailadd");
        $studentdetails['familyincome'] = $this->input->post("familyincome");
        $studentdetails['targetmoney'] = $this->input->post("targetmoney");
        $studentdetails['reason'] = $this->input->post("reason");
        $studentdetails['bank'] = $this->input->post("bank");
        $studentdetails['accountnumber'] = $this->input->post("accountnumber");
        $studentdetails['runninggwa'] = $this->input->post("runninggwa");
        $studentdetails['studentdescription'] = $this->input->post("studentdescription");
        $studentinfo = $this->Model->get_studentdetails($studid);
        if($studentdetails['reason'] == '')
        {
            $studentdetails['reason'] = $studentinfo['reasonforneedingscholarship'];
        }
        if($studentdetails['studentdescription'] == '')
        {
            $studentdetails['studentdescription'] = $studentinfo['studentdescription'];
        }
        $this->Model->save_studentdetails($studentdetails, $pid, $studid);
        
        
        $allowedExts = array("pdf");
        $temp = explode(".", $_FILES["cvfile"]["name"]);
        $extension = end($temp);
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
        
        $temp = explode(".", $_FILES["copyofgrades"]["name"]);
        $extension = end($temp);
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
        
        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["dpfile"]["name"]);
        $extension = end($temp);
        if(($_FILES["dpfile"]["type"] == "image/jpeg") || 
            ($_FILES["dpfile"]["type"] == "image/jpg") ||
            ($_FILES["dpfile"]["type"] == "image/png") && 
            in_array($extension, $allowedExts))
        {
            if ($_FILES["dpfile"]["error"] > 0)
            {
                echo "Error: " . $_FILES["dpfile"]["error"] . "<br>";
            }
            else
            {
                move_uploaded_file($_FILES["dpfile"]["tmp_name"], "studentprofilepictures/" . $studid . "_profilepicture." . $extension);
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
        $banks = $this->Model->get_banks();
        $studentid = 19;
		$studentinfo = $this->Model->get_studentdetails($studentid);
		//print_r($studentinfo);
		//die();
        $this->load_view('editstudentprofile_view', compact('programs', 'yearlevels', 'banks','studentinfo', 'studentid'));
    }
}
?>
