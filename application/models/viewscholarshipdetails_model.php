<?php
require_once('base_model.php');
class Viewscholarshipdetails_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
	public function loadscholarshipdetails($scholarshipid) {
	$query = "select scholarshipid, title, scholarships.description as sdesc, firstname, lastname, middlename, namesuffix, donors.description as ddesc, expiry, slots
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
		#hindi gagana yung query na 'to unless may information SA LAHAT NG TABLES NA 'YAN
		#$query = "SELECT studentid, firstname, middlename, lastname, name
		#from scholarshipapplications join students using (studentid)
		#join persons using (personid)
		#join programs using (programid)
		#where scholarshipid = " .$scholarshipid. "
		#AND studentid NOT IN ( SELECT studentid from awardedscholarships where scholarshipid = " .$scholarshipid. ")";
		
		$query = "SELECT studentid, firstname, middlename, lastname
		from scholarshipapplications join students using (studentid)
		join persons using (personid)
		where scholarshipid = " .$scholarshipid. "
		AND studentid NOT IN ( SELECT studentid from awardedscholarships where scholarshipid = " .$scholarshipid. ")";
		$results = $this->db->query($query);
		$results = $results->result_array();
		
		return $results;
	}
	
	public function get_scholarship_grantees($scholarshipid) {
		#hindi gagana yung query na 'to unless may information SA LAHAT NG TABLES NA 'YAN
		#$query = "SELECT studentid, firstname, middlename, lastname, name
		#from awardedscholarships join students using (studentid)
		#join persons using (personid)
		#join programs using (programid)
		#where scholarshipid = " .$scholarshipid;
		
		$query = "SELECT studentid, firstname, middlename, lastname
		from awardedscholarships join students using (studentid)
		join persons using (personid)
		where scholarshipid = " .$scholarshipid;
		
		$results = $this->db->query($query);
		$results = $results->result_array();
		
		return $results;
	}
	
	public function grant_scholarship($scholarshipid, $studentid, $donorid) {
		$query = "INSERT INTO awardedscholarships (scholarshipid, studentid, insertedby) values ("
		. $scholarshipid . ","
		. $studentid . ","
		. $donorid . ");";
		$this->db->query($query);
	}

	public function applyforscholarship($scholarshipid, $studentid) {
		//Get who's logged in
		#$studentid = 1;
		$query = 'insert into scholarshipapplications(scholarshipid, studentid) values('.$scholarshipid.', '.$studentid.');';
		$this->db->query($query);
	}
	
}
