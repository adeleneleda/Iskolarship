<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xadminscholarship extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('xadminscholarship_model', 'Model');
	}
	
	public function index() {
		
		$scholarships = $this->Model->get_scholarshipspending();
		#$username = $this->session->userdata("username");
		#$role = $this->session->userdata("role");
		#$this->load_view('sponsorhomepage_view', compact('scholarships', 'username', 'role'));
		$this->load_view('xadminscholarship_view', compact('scholarships'));
	}
	
	public function approve($scholarshipid) {
		$this->Model->approveScholarship($scholarshipid);
		$this->load_view('xadminscholarship_view', compact('scholarships'));
	}	
}

?>