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
		$xdeadline = $this->input->post("deadline");
		$xslots = $this->input->post("slots");
		
		#NULL defaults
		
		#start: optional tags
		$xprograms = array();
		if (isset($_POST['degree_cb'])) {
			if($this->input->post("degree_choice1")) $xprograms[] = $this->input->post("degree_choice1");
			else $xprograms[] = NULL;
			
			if($this->input->post("degree_choice2")) $xprograms[] = $this->input->post("degree_choice2");
			else $xprograms[] = NULL;
			
			if($this->input->post("degree_choice3")) $xprograms[] = $this->input->post("degree_choice3");
			else $xprograms[] = NULL;
			
			if($this->input->post("degree_choice4")) $xprograms[] = $this->input->post("degree_choice4");
			else $xprograms[] = NULL;
			
			if($this->input->post("degree_choice5")) $xprograms[] = $this->input->post("degree_choice5");
			else $xprograms[] = NULL;
		
			// $xprograms[] = $this->input->post("degree_choice1");
			// $xprograms[] = $this->input->post("degree_choice2");
			// $xprograms[] = $this->input->post("degree_choice3");
			// $xprograms[] = $this->input->post("degree_choice4");
			// $xprograms[] = $this->input->post("degree_choice5");
		}
		else {
			$xprograms[] = NULL;
			$xprograms[] = NULL;
			$xprograms[] = NULL;
			$xprograms[] = NULL;
			$xprograms[] = NULL;
		}
		
		if (isset($_POST['gender_cb'])) $xgender = $this->input->post("gender_choice");
		else $xgender = NULL;
		
		$xyearlvs = array();
		if (isset($_POST['year_cb'])) {
			if($this->input->post("year_choice1")) $xyearlvs[] = $this->input->post("year_choice1");
			else $xyearlvs[] = NULL;
			
			if($this->input->post("year_choice2")) $xyearlvs[] = $this->input->post("year_choice2");
			else $xyearlvs[] = NULL;
			
			if($this->input->post("year_choice3")) $xyearlvs[] = $this->input->post("year_choice3");
			else $xyearlvs[] = NULL;
			
			if($this->input->post("year_choice4")) $xyearlvs[] = $this->input->post("year_choice4");
			else $xyearlvs[] = NULL;
		
			// $xyearlvs[] = $this->input->post("year_choice1");
			// $xyearlvs[] = $this->input->post("year_choice2");
			// $xyearlvs[] = $this->input->post("year_choice3");
			// $xyearlvs[] = $this->input->post("year_choice4");
		}
		else {
			$xyearlvs[] = NULL;
			$xyearlvs[] = NULL;
			$xyearlvs[] = NULL;
			$xyearlvs[] = NULL;
		}
		
		if (isset($_POST['income_cb'])) {
			if($this->input->post("max_income")) $xmaxincome = $this->input->post("max_income");
			else $xmaxincome = NULL;
			
			if($this->input->post("min_income")) $xminincome = $this->input->post("min_income");
			else $xminincome = NULL;
		}
		else {
			$xmaxincome = NULL;
			$xminincome = NULL;
		}	
		
		if (isset($_POST['gwa_cb'])) {
			if($this->input->post("max_gwa")) $xmaxgwa = $this->input->post("max_gwa");
			else $xmaxgwa = NULL;
			
			if($this->input->post("min_gwa")) $xmingwa = $this->input->post("min_gwa");			
			else $xmingwa = NULL;
		}
		else {
			$xmaxgwa = NULL;
			$xmingwa = NULL;
		}
		#end: optional tags
		
		#save to database
		$scholarshipid = $this->Model->postScholarship2db($xtitle, $xdescription, $xdeadline, $xslots, $xprograms, $xgender, $xyearlvs, $xmaxincome, $xminincome, $xmaxgwa, $xmingwa);
		
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