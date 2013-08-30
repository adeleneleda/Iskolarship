<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminStudentFiles extends CI_Controller {
	public function __construct() {
		parent::__construct(true);
		$this->load->model('AdminStudentFiles_Model', 'Model');
	}
    
    public function display_forapproval($studentid)
    {
        $studentsforapproval = $this->Model->get_applicants($studentid);
        $this->load_view('adminapprovestudent_view', compact('studentsforapproval', 'studentid'));
    }
    
    public function downloadpicture()
    {
        $filename = $this->input->post('filename');
        $filepath =  $this->input->post('filepath');
        header('Content-type: images/png');
        header('Content-Disposition: attachment; filename=' . $filename . '_profilepicture.png');
        readfile($filepath);
    }
    
    public function downloadcv() 
    {
        $filename = $this->input->post('filename');
        $filepath =  $this->input->post('filepath');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $filename . '_cv.pdf');
        readfile($filepath);
	}
	
	public function downloadcog() 
    {
        $filename = $this->input->post('filename');
        $filepath =  $this->input->post('filepath');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $filename . '_copyofgrades.pdf');
        readfile($filepath);
	}
    
    public function approvestudent($studentid)
    {
        $isapproved = $this->input->post("isapproved");
        $approvalreason = $this->input->post("approvalreason");
        $this->Model->approve_student($studentid, $isapproved, $approvalreason);
        $studentlist = $this->Model->get_applicants_number(); 
        $this->load_view('adminstudentfiles_view', compact('studentlist'));
    }
    
    public function index()
    {
        $studentlist = $this->Model->get_applicants_number(); 
        $this->load_view('adminstudentfiles_view', compact('studentlist'));
    }
}