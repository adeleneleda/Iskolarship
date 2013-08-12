<?
require_once('base_model.php');
class Searchstudents_model extends Base_Model{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
    function getstudents($xd, $xy, $xgf, $xgt, $xif, $xit){
    	$whereclause = "select s.studentid, p.firstname, p.lastname, g.name, y.description, s.targetmoney from persons p, students s, programs g, yearlevels y where p.personid = s.personid and s.programid = g.programid and y.yearlevelid = s.yearlevel";
    	if($xd!=NULL){
    		$whereclause = $whereclause." and g.programid =" . $xd. "";
    	}
    	if($xy!=NULL){
    		$whereclause = $whereclause." and s.yearlevel =" . $xy. "";
    	}
    	/*
		if($xgf!=NULL){
			$whereclause = $whereclause." and s.gwa between " . $xgf . " and " . $xgt . "";
		}
    	*/
    	if($xif!=NULL){
			$whereclause = $whereclause." and s.familyincome between " . $xif . " and " . $xit . "";
		}
    	$results = $this->db->query($whereclause);
		$results = $results->result_array();
		return $results;
    }

	function get_programs()
	{
		$results = $this->db->query('SELECT programid, name FROM programs;');
		$results = $results->result_array();
		return $results;
	}
	
	function get_yearlevels()
	{
		$results = $this->db->query('SELECT yearlevelid, description FROM yearlevels;');
		$results = $results->result_array();
		return $results;
	}

}
?>