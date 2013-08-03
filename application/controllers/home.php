<?php if (!defined('BASEPATH')) die();
class Home extends Main_Controller {

   public function index()
	{
    $this->load_view('home-view');
	}
   
}
