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
	
	public function loadscholarshipinfo() {
		$scholarshipid = 1;
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$this->load_view('viewscholarshipdetails_view', compact('scholarshipinfo', 'scholarshipid'));
	}
	
	public function applyforscholarship() {
		$scholarshipid = $this->input->post('scholarshipid');
		$this->Model->applyforscholarship($scholarshipid);
		$scholarshipinfo = $this->Model->loadscholarshipdetails($scholarshipid);
		$allowedExts = array("pdf");
        $temp = explode(".", $_FILES["reqtfile"]["name"]);
        $extension = end($temp);
		//Get kung sino naka login
        $studid = 1;
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