<?php
require_once('base_model.php');
class VIewscholarshipdetails_model extends Base_Model {
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

	public function applyforscholarship($scholarshipid) {
		
	}
	
}
