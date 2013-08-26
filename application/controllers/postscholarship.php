<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class postscholarship extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('postscholarship_model', 'Model');
	}
	
	public function index() {
		$programs = $this->Model->get_programs();
		$yearlevels = $this->Model->get_yearlevels();
		$this->load_view('postscholarship_view', compact('programs', 'yearlevels'));
	}
	
	public function postScholarship() {
		$xtitle = $this->input->post("title");
		$xdescription = $this->input->post("description");
		
		#start: optional tags
		$xprograms = array();
		if (isset($_POST['degree_cb'])) {
			$xprograms[] = $this->input->post("degree_choice1");
			$xprograms[] = $this->input->post("degree_choice2");
			$xprograms[] = $this->input->post("degree_choice3");
			$xprograms[] = $this->input->post("degree_choice4");
			$xprograms[] = $this->input->post("degree_choice5");
		}
		
		if (isset($_POST['gender_cb'])) $xgender = $this->input->post("gender_choice");
		else $xgender = NULL;
		
		$xyearlvs = array();
		if (isset($_POST['year_cb'])) {
			$xyearlvs = $this->input->post("year_choice1");
			$xyearlvs = $this->input->post("year_choice2");
			$xyearlvs = $this->input->post("year_choice3");
			$xyearlvs = $this->input->post("year_choice4");
		}
		
		if (isset($_POST['income_cb'])) {
			$xmaxincome = $this->input->post("max_income");
			$xminincome = $this->input->post("min_income");
		} else {
			$xmaxincome = NULL;
			$xminincome = NULL;
		}
		
		if (isset($_POST['gwa_cb'])) {
			$xmaxgwa = $this->input->post("max_gwa");
			$xmingwa = $this->input->post("min_gwa");
		} else {
			$xmaxgwa = NULL;
			$xmingwa = NULL;
		}
		#end: optional tags
		
		#save to database
		$scholarshipid = $this->Model->postScholarship2db($xtitle, $xdescription, $xprograms, $xgender, $xyearlvs, $xmaxincome, $xminincome, $xmaxgwa, $xmingwa);
		
		#upload the file
		move_uploaded_file($_FILES["file"]["tmp_name"], "scholarshippdfs/" . $scholarshipid . '.pdf');
		$programs = $this->Model->get_programs();
		$yearlevels = $this->Model->get_yearlevels();
		$this->goBackToSponsorHomepage();
		
	}
	
	public function goBackToSponsorHomepage() {
		#populate 
		$scholarships = $this->Model->get_scholarships($this->session->userdata("donorid"));
		$username = $this->session->userdata("username");
		$role = $this->session->userdata("role");
		$this->load_view('sponsorhomepage_view', compact('scholarships', 'username', 'role'));
		}
}

?>