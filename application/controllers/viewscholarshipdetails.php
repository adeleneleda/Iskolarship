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
		$this->load_view('viewscholarshipdetails_view', compact('scholarshipinfo', 'scholarshipid'));	
	}
	
	
	

	
}