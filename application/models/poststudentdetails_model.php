<?
require_once('base_model.php');
class PostStudentDetails_Model extends Base_Model {

    function __construct()
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
    
    function save_studentdetails($details)
    {
        foreach ($details as &$value)
        {
            $value = '\'' . $value . '\'';
        }
        $this->db->query('INSERT INTO persons(lastname, firstname, middlename, namesuffix, sex, birthday)' . 
                        ' values(' . $details['lastname'] . ', ' . $details['firstname'] . ', ' . $details['middlename'] . ', ' . 
                        $details['namesuffix'] . ', ' . $details['sex'] . ', ' . $details['birthday'] .');');
        $pid = $this->db->query('SELECT personid FROM persons where lastname =' . $details['lastname'] . 'and firstname = ' . $details['firstname'] . 
                                ' and middlename =' . $details['middlename'] . ' and namesuffix = ' . $details['namesuffix'] . ' and sex = ' . 
                                $details['sex'] . ' and birthday = ' . $details['birthday'] . ';');
        $pid = $pid->result_array();
        $pid = $pid[0]['personid'];
        $this->db->query('INSERT INTO users(personid, login, password)' . ' values(' . $pid . ', ' . $details['username'] . ', ' . $details['password'] . ');');
        $this->db->query('INSERT INTO students(yearlevel, personid, programid, familyincome, reasonforneedingscholarship, targetmoney)' . 
                        ' values(' . $details['yearlevel'] . ', ' . $pid . ', ' . $details['program'] . ', ' . $details['familyincome'] . ', ' . 
                        $details['reason'] . ', ' . $details['targetmoney'] . ');');
        $sid = $this->db->query('SELECT studentid FROM students where personid = ' . $pid . ';');
        $sid = $sid->result_array();
        $sid = $sid[0]['studentid'];
        return $sid;
    }
}