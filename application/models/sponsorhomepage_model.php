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
		$results = $this->db->query('SELECT * from scholarships where donorid = ' .$donorid); 
		$results = $results->result_array();
		
		return $results;
	}
}
?>