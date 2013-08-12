<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewstudentdetails extends Main_Controller {	

	public function __construct() {
		parent::__construct(true);
		$this->load->model('Viewstudentdetails_Model', 'Model');
	}
	
   public function index()
	{
		$this->loadstudentinfo();
	}
	
	public function loadstudentinfo() {
		//$studentid = $this->input->post('studentid');
		$studentid = $x;
		$studentinfo = $this->Model->getstudentinfo($studentid);
		$money = $this->Model->gettotalmoney($studentid);
		//print_r($studentinfo);
		//die();
		$this->load_view('viewstudentdetails_view', compact('studentinfo', 'studentid', 'money'));
	}
	
	public function viewstudentinfo($x) {
		//$studentid = $this->input->post('studentid');
		$studentid = $x;
		$studentinfo = $this->Model->getstudentinfo($studentid);
		$money = $this->Model->gettotalmoney($studentid);
		//print_r($studentinfo);
		//die();
		$this->load_view('viewstudentdetails_view', compact('studentinfo', 'studentid', 'money'));
	}

	public function downloadfile() {
	$filename = $this->input->post('filename');
	$filepath =  $this->input->post('filepath');
	//download.php
	//content type
	header('Content-type: application/pdf');
	//open/save dialog box
	header('Content-Disposition: attachment; filename=iskolarship.pdf');
	//read from server and write to buffer
	readfile($filepath);
	}
	
	
	public function downloadcog() {
	$filename = $this->input->post('filename');
	$filepath =  $this->input->post('filepath');
	//download.php
	//content type
	header('Content-type: application/pdf');
	//open/save dialog box
	header('Content-Disposition: attachment; filename=iskolarship_cog.pdf');
	//read from server and write to buffer
	readfile($filepath);
	}
	
	
	public function fundeducation() {
		$amount = $this->input->post('amount');
		$studentid = $this->input->post('studentid');
		$this->Model->saveinstantdonation($amount, $studentid);
		$studentinfo = $this->Model->getstudentinfo($studentid);
		$money = $this->Model->gettotalmoney($studentid);
		$this->load_view('viewstudentdetails_view', compact('studentinfo', 'studentid', 'money'));
	}
	
}