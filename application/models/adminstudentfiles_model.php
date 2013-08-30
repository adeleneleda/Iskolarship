<?
require_once('base_model.php');
class AdminStudentFiles_Model extends Base_Model {

    function __construct()
    {
        parent::__construct();
    }  
    
    public function get_applicants($studentid)
    {
        $approved = $this->db->query('SELECT isapproved from students WHERE studentid = ' . $studentid . ';');
        $approved = $approved->result_array();
        $approved = $approved[0]['isapproved'];
        
        if($approved == 't')
        {
            $query = "SELECT lastname, firstname, middlename, namesuffix, 
            birthday, sex, programs.name, yearlevels.description, familyincome, 
            reasonforneedingscholarship, targetmoney, accountnumber, runninggwa, studentdescription
            FROM persons JOIN studentspending using (personid) JOIN programs using (programid) JOIN yearlevels 
            on yearlevelid = yearlevel WHERE studentid = " . $studentid . ";";
        }
        else
        {
            $query = "SELECT lastname, firstname, middlename, namesuffix, 
            birthday, sex, programs.name, yearlevels.description, familyincome, 
            reasonforneedingscholarship, targetmoney, accountnumber, runninggwa, studentdescription
            FROM persons JOIN students using (personid) JOIN programs using (programid) JOIN yearlevels
            on yearlevelid = yearlevel WHERE studentid = " . $studentid . ";";
        }
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
        {
            $temp = $results->result_array();
            return $temp[0];
        }
		return false;
    }
    
    function get_contactdetails($studentid)
    {
        $personid = $this->db->query('SELECT personid FROM students WHERE studentid = ' . $studentid . ';');
        $personid = $personid->result_array();
        $personid = $personid[0]['personid'];
        $approved = $this->db->query('SELECT isapproved from students WHERE studentid = ' . $studentid . ';');
        $approved = $approved->result_array();
        $approved = $approved[0]['isapproved'];
        if($approved == 'f')
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
        else
        {
            $contact1 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $personid . ' and contacttypeid = 1;');
            $contact2 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $personid . ' and contacttypeid = 2;');
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
    }
    
    public function approve_student($studentid, $isapproved, $approvalreason)
    {
        $approve = $this->db->query('SELECT isapproved FROM students WHERE studentid = ' . $studentid .';');
        $approve = $approve->result_array();
        $approve = $approve[0]['isapproved'];
        if($isapproved == 0)
        {
            if($approve == 't')
            {
                $newinfo = $this->db->query('SELECT * FROM studentspending WHERE studentid = ' . $studentid . ';');
                $newinfo = $newinfo->result_array();
                $newinfo = $newinfo[0];
                foreach ($newinfo as &$value)
                {
                    $value = '\'' . $value . '\'';
                }
                
                $pid = $this->db->query('SELECT personid FROM students WHERE studentid = ' . $studentid . ';');
                $pid = $pid->result_array();
                $pid = $pid[0]['personid'];
                
                $contact1 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $pid . ' and contacttypeid = 1;');
                $contact2 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $pid . ' and contacttypeid = 2;');
                $contacts = array();
                if($contact1->num_rows() > 0)
                {
                    $contact1 = $contact1->result_array();
                    $contacts['mobilenumber'] = $contact1[0]['contactinfo'];
                    if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 1;')->num_rows() > 0)
                    {
                        $this->db->query('UPDATE contactdetails SET contactinfo = ' . $contacts['mobilenumber'] . ' WHERE personid = ' . $pid . ' and contacttypeid = 1;');
                    }
                    else
                    {
                        $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(1, ' . $pid . ', ' . $contacts['mobilenumber'] . ');');
                    }
                }
                
                if($contact2->num_rows() > 0)
                {
                    $contact2 = $contact2->result_array();
                    $contacts['emailadd'] = $contact2[0]['contactinfo'];
                    if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 2;')->num_rows() > 0)
                    {
                        $this->db->query('UPDATE contactdetails SET contactinfo = \'' . $contacts['emailadd'] . '\' WHERE personid = ' . $pid . ' and contacttypeid = 2;');
                    }
                    else
                    {
                        $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(2, ' . $pid . ', \'' . $contacts['emailadd'] . '\');');
                    }
                } 
                $this->db->query('UPDATE students SET yearlevel = ' . $newinfo['yearlevel'] . ', programid = ' . $newinfo['programid'] . ', familyincome = ' . $newinfo['familyincome'] . ', reasonforneedingscholarship = ' . $newinfo['reasonforneedingscholarship'] . ', targetmoney = ' . $newinfo['targetmoney'] . ', bankid = ' . $newinfo['bankid'] . ', accountnumber = ' . $newinfo['accountnumber'] . ', runninggwa = ' . $newinfo['runninggwa'] . ', studentdescription = ' . $newinfo['studentdescription'] . ' WHERE studentid = ' . $studentid . ';');
                $this->db->query('UPDATE students SET ispending = false WHERE studentid = ' . $studentid . ';');  
            }
            else
            {
                $pid = $this->db->query('SELECT personid FROM students WHERE studentid = ' . $studentid . ';');
                $pid = $pid->result_array();
                $pid = $pid[0]['personid'];
                $contact1 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $pid . ' and contacttypeid = 1;');
                $contact2 = $this->db->query('SELECT contactinfo FROM contactdetailspending WHERE personid = ' . $pid . ' and contacttypeid = 2;');
                $contacts = array();
                if($contact1->num_rows() > 0)
                {
                    $contact1 = $contact1->result_array();
                    $contacts['mobilenumber'] = $contact1[0]['contactinfo'];
                    if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 1;')->num_rows() > 0)
                    {
                        $this->db->query('UPDATE contactdetails SET contactinfo = ' . $contacts['mobilenumber'] . ' WHERE personid = ' . $pid . ' and contacttypeid = 1;');
                    }
                    else
                    {
                        $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(1, ' . $pid . ', ' . $contacts['mobilenumber'] . ');');
                    }
                }
                
                if($contact2->num_rows() > 0)
                {
                    $contact2 = $contact2->result_array();
                    $contacts['emailadd'] = $contact2[0]['contactinfo'];
                    if($this->db->query('SELECT * from contactdetails WHERE personid = ' . $pid . ' and contacttypeid = 2;')->num_rows() > 0)
                    {
                        $this->db->query('UPDATE contactdetails SET contactinfo = \'' . $contacts['emailadd'] . '\' WHERE personid = ' . $pid . ' and contacttypeid = 2;');
                    }
                    else
                    {
                        $this->db->query('INSERT INTO contactdetails(contacttypeid, personid, contactinfo) values(2, ' . $pid . ', \'' . $contacts['emailadd'] . '\');');
                    }
                } 
                $this->db->query('UPDATE students SET isapproved = true WHERE studentid = ' . $studentid . ';');
                $this->db->query('UPDATE students SET ispending = false WHERE studentid = ' . $studentid . ';');
                $this->db->query('UPDATE students SET reasonforapproval = \'' . $approvalreason . '\' WHERE studentid = ' . $studentid . ';');
            }
        }
        else
        {
            $this->db->query('UPDATE students SET reasonforapproval = \'' . $approvalreason . '\' WHERE studentid = ' . $studentid . ';');
            $this->db->query('UPDATE students SET ispending = false WHERE studentid = ' . $studentid . ';');
        }
        return;
    }
    
    public function get_applicants_number()
    {
        $query = "SELECT studentid, lastname, firstname, middlename, namesuffix
		FROM persons JOIN students using (personid) WHERE ispending = true;";
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
        {
            $temp = $results->result_array();
            return $temp;
        }
		return false;
    }
}