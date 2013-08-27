<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostStudentFeedback extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('PostStudentFeedback_Model', 'Model');
	}    
    public function index()
    {
		//$studentid = 1;
		$studentid = $this->session->userdata("studentid");;
		$scholarships = $this->Model->getscholarships($studentid);
        $this->load_view('poststudentfeedback_view', compact('scholarships', 'studentid'));
    }
	
	public function submitstudentfeedback() {
		/*$awardedscholarshipid = $this->input->post('awardedscholarshipid');
		$feedback = $this->input->post('feedback');
		$awardedscholarshipid = $this->input->post('awardedscholarshipid');
		$this->Model->insertfeedback($awardedscholarshipid, $feedback);*/
		redirect('poststudentfeedback');
	}
	
	
}
?>
