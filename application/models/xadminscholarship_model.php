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
		
		return $results;
	}
	
	public function approveScholarship($scholarshipid) {
		$query = 'UPDATE scholarships SET isactive=TRUE';
		$this->db->query($query);
	}
}
?>