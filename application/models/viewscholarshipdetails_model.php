<?php
require_once('base_model.php');
class Viewscholarshipdetails_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
	public function loadscholarshipdetails($scholarshipid) {
	$query = "select title, scholarships.description as sdesc, firstname, lastname, middlename, namesuffix, donors.description as ddesc, expiry, slots
	FROM scholarships join donors using (donorid) join persons using (personid) where scholarshipid = ".$scholarshipid.";";
	$results = $this->db->query($query);
	if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp[0];
		}
	return false;
	}
	
	public function get_scholarship_applicants($scholarshipid) {
		$query = "SELECT firstname, middlename, lastname, name
		from scholarshipapplications join students using (studentid)
		join persons using (personid)
		join programs using (programid)
		where scholarshipid = " .$scholarshipid.";";
		$results = $this->db->query($query);
		$results = $results->result_array();
		
		return $results;
	}

	public function applyforscholarship($scholarshipid) {
		//Get who's logged in
		$studentid = 1;
		$query = 'insert into scholarshipapplications(scholarshipid, studentid) values('.$scholarshipid.', '.$studentid.');';
		$this->db->query($query);
	}
	
}
