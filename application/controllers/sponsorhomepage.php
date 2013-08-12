<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sponsorhomepage extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('sponsorhomepage_model', 'Model');
	}
	
	public function index() {
		#populate 
		$scholarships = $this->Model->get_scholarships($this->session->userdata("donorid"));
		$username = $this->session->userdata("username");
		$role = $this->session->userdata("role");
		$this->load_view('sponsorhomepage_view', compact('scholarships', 'username', 'role'));
		}
	}

?>