<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentSignUp extends CI_Controller {
	public function __construct() {
		parent::__construct(false);
		$this->load->model('StudentSignUp_Model', 'Model');
	}
    
    public function get_details()
    {
        $studentdetails = array();
        $studentdetails['username'] = $this->input->post("username");
        $studentdetails['password'] = $this->input->post("password");
        $studentdetails['lastname'] = $this->input->post("lastname");
        $studentdetails['firstname'] = $this->input->post("firstname");
        $studentdetails['middlename'] = $this->input->post("middlename");
        $studentdetails['namesuffix'] = $this->input->post("namesuffix");
        $studentdetails['sex'] = $this->input->post("sex");
        $studentdetails['birthday'] = $this->input->post("birthday");
        $studentdetails['mobilenumber'] = $this->input->post("mobilenumber");
        $studentdetails['emailadd'] = $this->input->post("emailadd");
        
        $this->Model->save_studentsignup($studentdetails);
        
        $this->load_view('signedup_view');
    }
    
    public function index()
    {
        $this->load_view('studentsignup_view');
    }
}
?>
