<?php
require_once('base_model.php');
class Viewstudentdetails_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
	public function getstudentinfo($studentid) {
		$query = "SELECT lastname, firstname, middlename, namesuffix, 
		birthday, sex, programs.name, yearlevel, familyincome, 
		reasonforneedingscholarship, targetmoney 
		FROM persons JOIN students using (personid) JOIN programs using (programid) WHERE studentid = ".$studentid.";";
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
			{
				$temp = $results->result_array();
				return $temp[0];
			}
		return false;
	}
}
