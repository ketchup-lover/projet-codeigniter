<?php
class login_model extends CI_Model {

  public function __construct() 
  {
      $this->load->database();
  }

  function login($login, $password)
  {
    $this->db->select("*");
    $this->db->from("membres");
    $this->db->where("pseudo", $login);
    $this->db->where("pass", password_verify($password, "pass"));
    $query = $this->db->get();
    return $query->num_rows() > 0;
  }
  
 
  private function exists($login)
   {
    $this->db->select("*");
    $this->db->from("membres");
    $this->db->where("pseudo", $login);
    $query = $this->db->get();
    return $query->num_rows() > 0;
   }
  


  function register($mail, $login, $password) 
  {
    if ($this->exists($login)) return;       // The method “exists”. What it does is to search the table for an user containing the given login and returns true if it finds it.
    $this->db->insert('membres', array(
        'email' => $mail,
        'pseudo' => $login,
        'pass' => password_hash($password, PASSWORD_DEFAULT),
        'date_ins' => date("Y/m/d")
    )); 
  }

  function access_level($login)
  {
   $this->db->select("access_level");
   $this->db->from("membres");
   $this->db->where("pseudo", $login);
   $query = $this->db->get();
   if($query->num_rows() > 0)
   {
     return $query->result_array();
   }
   /*
   if($query != null)
   {
     return $query->num_rows() > 0;
   }
   else
   {
     return false;
   }
   */
  }
}


/*
https://picoledelimao.github.io/blog/2014/09/30/creating-user-authentication-with-code-igniter/
*/

?>


