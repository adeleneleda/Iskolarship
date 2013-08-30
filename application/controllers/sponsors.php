<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsors extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Sponsors_Model', 'Model');
	}    
    public function index()
    {
		$sponsors = $this->Model->getsponsors();
        $this->load_view('sponsors_view', compact('sponsors'));
    }
}
?>
