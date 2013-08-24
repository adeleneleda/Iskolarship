<?
require_once('base_model.php');
class PostStudentFeedback_Model extends Base_Model {

    function __construct()
    {
        parent::__construct();
    }  
	
	function getscholarships($studentid) {
		$results = $this->db->query('select awardedscholarshipid, title, description from scholarships join awardedscholarships using (scholarshipid) where studentid = '.$studentid); 
		$results = $results->result_array();
		return $results;
	}
	
	function insertfeedback($awardedscholarshipid, $feedback) {
		$this->db->query('INSERT into scholarshipfeedback(awardedscholarshipid, feedback) values('.$awardedscholarshipid. ", '".$feedback."')");
	}
}