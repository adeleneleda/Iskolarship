<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewsponsordetails extends Main_Controller {	

	public function __construct() {
		parent::__construct(true, 1);
		$this->load->model('Viewsponsordetails_Model', 'Model');
	}
	
   public function index($donorid)
	{	
		/*echo "<br/><br/>";
		print_r($this->Model->getbasicinfo(1));
		echo "<br/><br/>";
		print_r($this->Model->getcurrentscholarships(1));
		echo "<br/><br/>";
		print_r($this->Model->getpastscholarshipswithwinners(1));
		echo "<br/><br/>";
		print_r($this->Model->getscholarfeedback(1));*/
		
		//$donorid = 1;
		$basicinfo = $this->Model->getbasicinfo($donorid);
		$currentscholarships = $this->Model->getcurrentscholarships($donorid);
		$pastscholarshipsandscholars = $this->Model->getpastscholarshipswithwinners($donorid);
		$scholarsfeedback = $this->Model->getscholarfeedback($donorid);
		$this->load_view('viewsponsordetails_view', compact('basicinfo', 'currentscholarships', 'pastscholarshipsandscholars', 'scholarsfeedback'));
	}
}
