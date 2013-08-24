<?
require_once('base_model.php');
class EditStudentProfile_Model extends Base_Model {

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
    
    function get_banks()
    {
        $results = $this->db->query('SELECT bankid, name FROM banks;');
		$results = $results->result_array();
		return $results;
    }
    
    function get_studentdetails($studentid)
    {
        $query = "SELECT lastname, firstname, middlename, namesuffix, 
		birthday, sex, programid, yearlevel, familyincome, 
		reasonforneedingscholarship, targetmoney, accountnumber, runninggwa, studentdescription
		FROM persons JOIN students using (personid) WHERE studentid = ".$studentid.";";
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
        {
            $temp = $results->result_array();
            return $temp[0];
        }
		return false;
    }
    
    function get_contactdetails($personid)
    {
        $contact1 = $this->db->query('SELECT contactinfo FROM contactdetails WHERE personid = ' . $personid . ' and contacttypeid = 1;');
        $contact2 = $this->db->query('SELECT contactinfo FROM contactdetails WHERE personid = ' . $personid . ' and contacttypeid = 2;');
        $contact2 = $contact2->result_array();
        $results = array();
        if($contact1->num_rows() > 0)
        {
            $contact1 = $contact1->result_array();
            $results['mobilenumber'] = $contact1[0]['contactinfo'];
        }
        $results['emailadd'] = !empty($contact2) ? $contact2[0]['contactinfo'] : "";
        return $results;
    }
    
    function save_studentdetails($details, $pid, $studentid)
    {
        foreach ($details as &$value)
        {
            $value = '\'' . $value . '\'';
        }
        
        $this->db->query('UPDATE students SET yearlevel = ' . $details['yearlevel'] . ', programid = ' . $details['program'] . ', 
                        familyincome = ' . $details['familyincome'] . ', reasonforneedingscholarship = ' . $details['reason'] . ', 
                        targetmoney = ' . $details['targetmoney'] . ', bankid = ' . $details['bank'] . ', accountnumber = ' . $details['accountnumber'] . ', 
                        runninggwa = ' . $details['runninggwa'] . ', studentdescription = ' . $details['studentdescription']  
                        . ' WHERE studentid = ' . $studentid . ';');
        
        if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 1;')->num_rows() > 0)
        {
            $this->db->query('UPDATE contactdetails SET contactinfo = ' . $details['mobilenumber'] . ' WHERE personid = ' . $pid . ' and contacttypeid = 1;');
        }
        else
        {
            $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(1, ' . $pid . ', ' . $details['mobilenumber'] . ');');
        }
        
        if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 2;')->num_rows() > 0)
        {
            $this->db->query('UPDATE contactdetails SET contactinfo = ' . $details['emailadd'] . ' WHERE personid = ' . $pid . ' and contacttypeid = 2;');
        }
        else
        {
            $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(2, ' . $pid . ', ' . $details['emailadd'] . ');');
        }
        
        return;
    }
}