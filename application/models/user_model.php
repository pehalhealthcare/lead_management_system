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
          // $this->db->where("role",$role);
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

     public function userdata($userID)
     {
          $this->db->where("id",$userID);

          $userdata = $this->db->get("mk_registration_table");

          if($userdata->result())
          {
               return $userdata->result();
          }
          else
          {
               return array();
          }
     }

     public function user_list()
     {
          $res = $this->db->get("mk_registration_table");

          if($res->result())
          {
               return $res->result_array();
          }
          else
          {
               return array();
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