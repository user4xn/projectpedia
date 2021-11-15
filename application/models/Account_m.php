<?php 
/**
 * Account Model
 */
class Account_m extends CI_Model
{
  function getUser($email){
  	return $this->db->get_where('user', array('email'=>$email));
  }
}


 ?>