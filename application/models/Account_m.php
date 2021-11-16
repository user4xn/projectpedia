<?php 
/**
 * Account Model
 */
class Account_m extends CI_Model
{
  function getUser($email){
  	return $this->db->select('*')
                    ->from('user')
                    ->join('user_previlege', 'user.id = user_previlege.id_user')
                    ->where(array('email'=>$email))
                    ->get();
  }
}


 ?>