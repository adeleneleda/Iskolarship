<?
require_once('base_model.php');
class sponsorhomepage_model extends Base_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function get_scholarships() {
		//query para makuha lahat ng scholarships ng isang sponsor account
		// PALITAN MO YUNG 99 na kunin yung currently logged in donord
		$results = $this->db->query('SELECT * from scholarships where donorid = 1'); 
		$results = $results->result_array();
		
		return $results;
	}
}
?>