<?php

class User_model extends CI_Model
{
     public function __construct()
     {
          parent::__construct();

     }

     public function userlogin($useremail="",$password="",$role="")
     {    
          $this->db->where("email",$useremail);
          $this->db->where("role",$role);
          $this->db->where("password",hash("sha256",$password));
          $user = $this->db->get("mk_registration_table");

          if($user->result())
          {
               return $user->result();
          }
          else
          {
              return false;
          }

     }

     public function usercheck($useremail)
     {
          $this->db->where("email",$useremail);

          $user = $this->db->get("mk_registration_table");

          if($user->result())
          {
               return $user->result();
          }
          else
          {
              return false;
          }
     }

     public function password_reset($useremail,$password)
     {
          $this->db->where("email",$useremail);

          if($this->db->update("mk_registration_table", array("password"=>hash("sha256",$password))))
          {
               return true;
          }
          else
          {
               return false;
          }
     }

     public function user_detail($id)
     {
          $this->db->where("parent_id",$id);
          $user = $this->db->get("mk_registration_table");

          if($user->result())
          {
               return $user->result();
          }
          else
          {
               return array();
          }
     }
}