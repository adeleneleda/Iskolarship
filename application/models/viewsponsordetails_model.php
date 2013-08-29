<?php
require_once('base_model.php');
class Viewsponsordetails_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
   public function getbasicinfo($donorid) {
	$query = "SELECT donors.description, firstname, middlename, lastname from persons join donors using (personid) where donorid = ".$donorid.";";
	$results = $this->db->query($query);
	if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp[0];
		}
	return false;
   }
   
   public function getcurrentscholarships($donorid) {
	$query = "SELECT scholarshipid, title, description, slots from scholarships where isactive = true and donorid = ".$donorid.";";
	$results = $this->db->query($query);
	if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp;
		}
	return false;
   }
   
   public function getpastscholarshipswithwinners($donorid) {
	$query = "SELECT scholarshipid, title, description, string_agg(lastname || ', ' || firstname, E'<br//>')
   from scholarships join awardedscholarships using (scholarshipid) 
   join students using (studentid) join persons using (personid) where donorid = ".$donorid.
   " GROUP BY scholarshipid, title, description;";
	$results = $this->db->query($query);
	if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp;
		}
	return false;
   }
   
   public function getscholarfeedback($donorid) {
	$query = "SELECT title, studentid, scholarshipfeedback.insertedon, feedback, lastname, firstname, name
   FROM scholarships join awardedscholarships using (scholarshipid)
   join scholarshipfeedback using (awardedscholarshipid)
   join students using (studentid)  join programs using (programid)  join persons using (personid) where donorid = ".$donorid." ORDER BY insertedon DESC;";
	$results = $this->db->query($query);
	if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp;
		}
	return false;
   }   
   
}
