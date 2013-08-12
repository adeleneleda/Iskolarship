<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditStudentProfile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('EditStudentProfile_Model', 'Model');
	}
    
    public function get_details()
    {
        $studid = $this->session->userdata("studentid");;
        $pid = $this->session->userdata("personid");;
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
            move_uploaded_file($_FILES["cvfile"]["tmp_name"], "studentcvs/" . $studid . "_cv.pdf");
        }

        $temp = explode(".", $_FILES["copyofgrades"]["name"]);
        $extension = end($temp);
        if(($_FILES["copyofgrades"]["type"] == "application/pdf") && in_array($extension, $allowedExts))
        {
            move_uploaded_file($_FILES["copyofgrades"]["tmp_name"], "studentcopyofgrades/" . $studid . "_copyofgrades.pdf");
        }

        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["dpfile"]["name"]);
        $extension = end($temp);
        if(($_FILES["dpfile"]["type"] == "image/jpeg") || 
            ($_FILES["dpfile"]["type"] == "image/jpg") ||
            ($_FILES["dpfile"]["type"] == "image/png") && 
            in_array($extension, $allowedExts))
        {
            move_uploaded_file($_FILES["dpfile"]["tmp_name"], "studentprofilepictures/" . $studid . "_profilepicture." . $extension);
        }
            
        $this->load_view('signedup_view');
    }
    
    public function index()
    {
        $programs = $this->Model->get_programs();
        $yearlevels = $this->Model->get_yearlevels();
        $banks = $this->Model->get_banks();
		$studentinfo = $this->Model->get_studentdetails($this->session->userdata("studentid"));
        $contacts = $this->Model->get_contactdetails($this->session->userdata("personid"));
        $this->load_view('editstudentprofile_view', compact('programs', 'yearlevels', 'banks','studentinfo', 'studentid', 'contacts'));
    }
}
?>
