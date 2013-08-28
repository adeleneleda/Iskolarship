<?
require_once('base_model.php');
class postscholarship_model extends Base_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
	
	public function postScholarship2db($xtitle, $xdescription, $xdeadline, $xslots, $xprograms, $xgender, $xyearlvs, $xmaxincome, $xminincome, $xmaxgwa, $xmingwa) {
		
		$title = '\'' .$xtitle. '\'';
		$description = '\'' .$xdescription. '\'';
		$deadline = '\'' .$xdeadline. '\'';
		$slots = $xslots;
		
		
		#insert the title and description (these are required?)
		$this->db->query('INSERT into scholarships (title, description, expiry, slots, donorid) 
		values(' .$title. ',' .$description. ',' .$deadline. ',' .$slots. ',' .$this->session->userdata("donorid"). ')');
		
		$scholarshipidx = $this->db->query('Select scholarshipid from scholarships
							order by (scholarshipid) desc
							LIMIT 1;')->result_array();
		$scholarshipid = $scholarshipidx[0]['scholarshipid'];
		
		#handle each optional flag
		foreach ($xprograms as $xprogram) {
			if($xprogram) {
				$xprogram = '\'' .$xprogram. '\'';
				$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 1, ' .$xprogram. ')');
			}
		}
		
		if($xgender) {
			$xgender = '\''. $xgender. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 2, ' .$xgender. ')');
		}
		
		foreach ($xyearlvs as $xyearlv) {
			if($xyearlv) {
				$xyearlv = '\''. $xyearlv. '\'';
				$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 3, ' .$xyearlv. ')');
			}
		}
		
		if($xmaxincome) {
			$xmaxincome = '\''. $xmaxincome. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 4, ' .$xmaxincome. ')');
		}
		
		if($xminincome) {
			$xminincome = '\''. $xminincome. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 5, ' .$xminincome. ')');
		}
		
		if($xmingwa) {
			$xmingwa = '\''. $xmingwa. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 6, ' .$xmingwa. ')');
		}
		
		if($xmaxgwa) {
			$xmaxgwa = '\''. $xmaxgwa. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 7, ' .$xmaxgwa. ')');
		}
		
		return $scholarshipid;
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