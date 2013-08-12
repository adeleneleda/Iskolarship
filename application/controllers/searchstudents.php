<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchstudents extends Main_Controller {

	public function __construct() {
		parent::__construct(true);
		$this->load->model('Searchstudents_Model', 'Model');
	}

	public function index(){
		if(isset($_POST['degree_cb'])) $xd = $this->input->post("degree_choice");
		else $xd = NULL;
		if(isset($_POST['year_cb'])) $xy = $this->input->post("year_choice");
		else $xy = NULL;
		$xgf = NULL; $xgt = NULL;
		if(isset($_POST['gwa_cb'])){
			$xgf = $this->input->post("gwa_from");
			$xgt = $this->input->post("gwa_to");
		}
		$xif = NULL; $xit = NULL;
		if(isset($_POST['income_cb'])){
			$xif = $this->input->post("income_from");
			$xit = $this->input->post("income_to");
		}
		$results = $this->Model->getstudents($xd, $xy, $xgf, $xgt, $xif, $xit);
		$programs = $this->Model->get_programs();
		$yearlevels = $this->Model->get_yearlevels();
		$this->load_view('searchstudents_view', compact('programs', 'yearlevels', 'results'));
	}

}

?>