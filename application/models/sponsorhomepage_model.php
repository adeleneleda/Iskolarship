<?
require_once('base_model.php');
class sponsorhomepage_model extends Base_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get_scholarships($donorid) {
		//query para makuha lahat ng scholarships ng isang sponsor account
		$results = $this->db->query('SELECT * from scholarships where isactive AND donorid = ' .$donorid); 
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
		
		// $counter = 0;
		// while($counter < sizeof($results)) {
			// print_r($results[$counter]['tags']);
			// print_r('<br>');
			// $counter++;
		// }
		
		return $results;
	}
}
?>