<?php

class User_model extends CI_Model
{
     public function __construct()
     {
          parent::__construct();

     }

     public function userlogin($useremail="",$password="")
     {    
          $this->db->where("email",$useremail);
          $this->db->where("password",md5($password));
          $user = $this->db->get("user");

          if($user->result())
          {
               return $user->result();
          }
          else
          {
              return false;
          }

     }
}