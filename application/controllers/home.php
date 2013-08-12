<?php if (!defined('BASEPATH')) die();
class Home extends Main_Controller {

	public function __construct() {
		parent::__construct(true);
		$this->load->model('Home_Model', 'Model');
	}
	
    public function index()
	{
		$username = $this->session->userdata("username");
		$role = $this->session->userdata("role");
		if(empty($username)) $this->load_view('home-view');
		else if($role == "student") $this->load_view('searchscholarship_view');
		else if($role == "donor") $this->load_view('sponsorhomepage_view');
	}
   
    public function login() {
		$role = $this->Model->login($_POST);
		$details = $this->Model->get_details($_POST, $role);
		if(!empty($role)) {
			$this->session->set_userdata("role", $role);
			$this->session->set_userdata("username", $_POST['username']);
			$this->session->set_userdata("personid", $details['personid']);
			if($role == "student") $this->session->set_userdata("studentid", $details['studentid']);
			else if ($role == "donor") $this->session->set_userdata("donorid", $details['donorid']);
		}
		echo $role;
    }
	
	public function logout() {
		$this->session->unset_userdata("role");
		$this->session->unset_userdata("username");
		$this->load_view('home-view', compact('username', 'role'));
    }
}
