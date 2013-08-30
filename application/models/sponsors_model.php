<?
require_once('base_model.php');
class Sponsors_Model extends Base_Model {

    function __construct()
    {
        parent::__construct();
    }  
	
	function getsponsors() {
		$results = $this->db->query('select donorid, firstname, lastname, description from persons join donors using (personid);');
		$results = $results->result_array();
		return $results;
	}
}