<?
require_once('base_model.php');
class xadminscholarship_model extends Base_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get_scholarshipspending() {
		
		$results = $this->db->query('SELECT * from scholarships where isactive = false'); 
		$results = $results->result_array();
		#attach the tags to the scholarships
		$counter = 0;
		while($counter < sizeof($results)) {
			$tags = $this->db->query('SELECT x.description as reqtype, getreqvalue(requirementtypeid, requirement) as reqval
				from scholarships
				join scholarshiprequirements using (scholarshipid) 
				join requirementtypes x using (requirementtypeid)
				where scholarshipid = ' .$results[$counter]['scholarshipid']);
			$tags = $tags->result_array();
			$results[$counter]['tags'] = $tags;
			
			$counter++;
		}
		
		return $results;
	}
	
	public function approveScholarship($scholarshipid) {
		$query = 'UPDATE scholarships SET isactive=TRUE where scholarshipid = ' .$scholarshipid;
		$this->db->query($query);
	}
}
?>