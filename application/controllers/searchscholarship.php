<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class searchscholarship extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('searchscholarship_model', 'Model');
	}
	
	public function index() {
		$programs = $this->Model->get_programs();
        $yearlevels = $this->Model->get_yearlevels();
		$this->load_view('searchscholarship_view', compact('programs', 'yearlevels'));
		}
	
	public function conductsearch() {
	
		#start: optional tags
		if (isset($_POST['degree_cb'])) $xprogram = $this->input->post("degree_choice");
		else $xprogram = NULL;
		
		if (isset($_POST['gender_cb'])) $xgender = $this->input->post("gender_choice");
		else $xgender = NULL;
		
		if (isset($_POST['year_cb'])) $xyearlv = $this->input->post("year_choice");
		else $xyearlv = NULL;
		
		if (isset($_POST['income_cb'])) $xmaxincome = $this->input->post("max_income");
		else $xmaxincome = NULL;
		#end: optional tags
		
		$scholarships = $this->Model->conductsearch($xprogram, $xgender, $xyearlv, $xmaxincome);
		$this->load_view('searchscholarship_view', compact('scholarships'));
	}
}

?>