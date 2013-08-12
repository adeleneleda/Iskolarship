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
	
	public function postScholarship2db($xtitle, $xdescription, $xprogram, $xgender, $xyearlv, $xmaxincome) {
		
		$title = '\'' .$xtitle. '\'';
		$description = '\'' .$xdescription. '\'';
		
		
		#insert the title and description (these are required?)
		$this->db->query('INSERT into scholarships (title, description, donorid) values(' .$title. ',' .$description. ',' .$this->session->userdata("donorid"). ')');
		
		$scholarshipidx = $this->db->query('Select scholarshipid from scholarships
							order by (scholarshipid) desc
							LIMIT 1;')->result_array();
		$scholarshipid = $scholarshipidx[0]['scholarshipid'];
		
		#handle each optional flag
		if($xprogram) {
			$xprogram = '\'' .$xprogram. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 1, ' .$xprogram. ')');
		}
		
		if($xgender) {
			$xgender = '\''. $xgender. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 2, ' .$xgender. ')');
		}
		
		if($xyearlv) {
			$xyearlv = '\''. $xyearlv. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 3, ' .$xyearlv. ')');
		}
		
		if($xmaxincome) {
			$xmaxincome = '\''. $xmaxincome. '\'';
			$this->db->query('INSERT into scholarshiprequirements(scholarshipid, requirementtypeid, requirement) values(' .$scholarshipid . ', 4, ' .$xmaxincome. ')');
		}
		
		return $scholarshipid;
	}
	
	public function get_scholarships($donorid) {
		//query para makuha lahat ng scholarships ng isang sponsor account
		$results = $this->db->query('SELECT * from scholarships where donorid = ' .$donorid); 
		$results = $results->result_array();
		
		return $results;
	}
}
?>