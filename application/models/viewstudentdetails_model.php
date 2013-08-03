<?php
require_once('base_model.php');
class Viewstudentdetails_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
   public function gettotalmoney($studentid) {
		$query = "select sum(amount) as totalmoney from instantcashdonations join payments using (paymentid) where studentid = ".$studentid.";";
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
			{
				$temp = $results->result_array();
				return $temp[0]['totalmoney'];
			}
		return false;
   }
   
	public function getstudentinfo($studentid) {
		$query = "SELECT lastname, firstname, middlename, namesuffix, 
		birthday, sex, programs.name, yearlevel, familyincome, 
		reasonforneedingscholarship, targetmoney 
		FROM persons JOIN students using (personid) JOIN programs using (programid) WHERE studentid = ".$studentid.";";
		$results = $this->db->query($query);
		if($results->num_rows() > 0)
			{
				$temp = $results->result_array();
				return $temp[0];
			}
		return false;
	}
	
	public function saveinstantdonation($amount, $studentid) {
		$paymentinsert = 'insert into payments(amount) values('.$amount.');';
		$this->db->query($paymentinsert);
		$getpaymentid = 'select paymentid from payments where amount = '.$amount.' order by paymentid desc limit 1';
		$getpaymentid = $this->db->query($getpaymentid);
		$getpaymentid = $getpaymentid->result_array();
		$paymentid = $getpaymentid[0]['paymentid'];
		$instantcashdonationsinsert = 'insert into instantcashdonations(studentid, paymentid) values('.$studentid.', '.$paymentid.');';
		$this->db->query($instantcashdonationsinsert);
	}
}
