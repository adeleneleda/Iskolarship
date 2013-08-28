<?php
require_once('base_model.php');
class searchscholarship_model extends Base_Model {
   public function __construct()
   {
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
	
	public function conductsearch($xprogram, $xgender, $xyearlv, $xmaxincome) {
	
		#get all active scholarships
		$masterquery = 'SELECT scholarshipid, title, description from scholarships where isactive';
		
		
		#then for each optional field checked, intersect
	
		if($xprogram) {
			$xprogram = "'" . $xprogram . "'";
			
			$masterquery = $masterquery . ' INTERSECT SELECT scholarshipid, title, description 
			from scholarshiprequirements join scholarships using (scholarshipid)
			where isactive AND requirementtypeid = 1 AND requirement = ' . $xprogram;
		}
		
		if($xgender) {
			$xgender = "'" . $xgender . "'";
			
			$masterquery = $masterquery . ' INTERSECT SELECT scholarshipid, title, description
			from scholarshiprequirements join scholarships using (scholarshipid)
			where isactive AND requirementtypeid = 2 AND requirement = ' . $xgender;
			
		}
		
		if($xyearlv) {
			$xyearlv = "'" . $xyearlv . "'";
			
			$masterquery = $masterquery . ' INTERSECT SELECT scholarshipid, title, description
			from scholarshiprequirements join scholarships using (scholarshipid)
			where isactive AND requirementtypeid = 4 AND requirement = ' . $xyearlv;
		}
		if($xmaxincome) {
			$xmaxincome = "'" . $xmaxincome . "'";
			
			$masterquery = $masterquery . ' INTERSECT SELECT scholarshipid, title, description
			from scholarshiprequirements join scholarships using (scholarshipid)
			where isactive AND requirementtypeid = 3 AND requirement = ' . $xmaxincome;
		}

		$results = $this->db->query($masterquery);
		$results = $results->result_array();
		return $results;
	}
}
?>