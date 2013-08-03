<?
require_once('base_model.php');
class Home_Model extends Base_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function login($userdata) {
		$results = $this->db->query("select case when studentid is null then 'donor' else 'student' end as type from users join persons using (personid) left outer join students on students.personid = persons.personid left outer join donors on donors.personid = persons.personid where login = '".$userdata['username']."' and password = '".$userdata['password']."';");
		
		if($results->num_rows() > 0) {
			$temp = $results->result_array();
			return $temp[0]['type'];
		}
		return false;
	}
	
	function get_details($userid) {
		$results = $this->db->query('SELECT * FROM proponent JOIN updesignation USING(updesignation_id) WHERE user_id='. $userid .';');
		
		if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp[0];
		}
		return false;
	}
	
	function get_loginerror($userdata) {
		$results = $this->db->query('SELECT * FROM users WHERE username="'.$userdata['login'].'";');
		
		if($results->num_rows() > 0)
		{
			return "UP Webmail and password do not match.";
		}
		return "Invalid UP Webmail account.";
	}
	
	function get_userroles($userid) {
		$results = $this->db->query('SELECT usertype FROM user_roles WHERE user_id='.$userid.';');
		if($results->num_rows() > 0)
		{
			$temp = $results->result_array();
			return $temp;
		}
		return false;
	}
}