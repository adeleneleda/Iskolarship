<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewscholarshipdetails extends Main_Controller {	

	public function __construct() {
		parent::__construct(true);
		$this->load->model('Viewscholarshipdetails_Model', 'Model');
	}
	
	public function index()
	{
		$this->loadscholarshipinfo();
	}
	
	public function loadscholarshipinfo($scholarshipid) {
		#$scholarshipid = 1;
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$this->load_view('viewscholarshipdetails_view', compact('scholarshipinfo', 'scholarshipid'));
	}
	
	public function loadscholarshipinfo_AsDonor($scholarshipid) {
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$applicants = $this->Model->get_scholarship_applicants($scholarshipid);
		$grantees = $this->Model->get_scholarship_grantees($scholarshipid);
		$this->load_view('viewscholarshipdetails_AsDonor_view', compact('scholarshipinfo', 'scholarshipid', 'applicants', 'grantees'));
	}
	
	public function loadscholarshipinfo_AsAdmin($scholarshipid) {
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$this->load_view('viewscholarshipdetails_AsAdmin_view', compact('scholarshipinfo'));
	}
	
	public function grant_scholarship() {
		$scholarshipid = $this->input->post("scholarshipid");
		$studentid = $this->input->post("studentid");
		#$scholarshipid = $this->input->post("donorid");
		#$donorid = 1; #hardcode muna
		$this->Model->grant_scholarship($scholarshipid, $studentid, $this->session->userdata("donorid"));
		$this->loadscholarshipinfo_AsDonor($scholarshipid);
	}
	
	public function applyforscholarship() {
		$studid = $this->session->userdata("studentid");
		$scholarshipid = $this->input->post('scholarshipid');
		$this->Model->applyforscholarship($scholarshipid, $studid);
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$allowedExts = array("pdf");
        $temp = explode(".", $_FILES["reqtfile"]["name"]);
        $extension = end($temp);
		//Get kung sino naka login
        
        if(($_FILES["reqtfile"]["type"] == "application/pdf") && in_array($extension, $allowedExts))
        {
            if ($_FILES["reqtfile"]["error"] > 0)
            {
                echo "Error: " . $_FILES["reqtfile"]["error"] . "<br>";
            }
            else
            {
                move_uploaded_file($_FILES["reqtfile"]["tmp_name"], "scholarshiprequirements/" . $studid . "_" . $scholarshipid . "cv.pdf");
            }
        }
        else
        {
            echo "Invalid file";
        }
		
		$this->load_view('viewscholarshipdetails_view', compact('scholarshipinfo', 'scholarshipid'));	
	}
	
	
	

}
