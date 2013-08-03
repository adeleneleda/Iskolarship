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
		$this->load_view('home-view', compact('username', 'role'));
	}
   
    public function login() {
		$role = $this->Model->login($_POST);
		if(!empty($role)) {
			$this->session->set_userdata("role", $role);
			$this->session->set_userdata("username", $_POST['username']);
		}
		echo $role;
    }
	
	public function logout() {
		$this->session->unset_userdata("role");
		$this->session->unset_userdata("username");
		$this->load_view('home-view', compact('username', 'role'));
    }
}
