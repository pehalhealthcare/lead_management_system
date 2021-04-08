<?php

class Common_model extends CI_Model
{
     public function __construct()
     {
          parent::__construct();
          
     }

     public function adddata($table="",$data="")
     {
          if($this->db->insert($table,$data))
          {
               return true;
          }
          else
          {
               return false;
          }
     }

     public function viewdata($action="",$table="")
     {    
          if($action=="multiple")
          {
               $run = $this->db->get($table);

               $data = $run->result();

               return $data;
          }
          elseif($action=="single")
          {
               $run = $this->db->get($table);

               $data = $run->row();

               return $data;
          }
          
     }

     public function viewwheredata($column=array(),$table="")
     {
          $this->db->where($column);

          $run = $this->db->get($table);

          $data = $run->row();

          return $data;

          
     }

     public function updatedata($table="",$data="",$cond=array())
     {
          $this->db->where($cond);
          if($this->db->update($table, $data))
          {
               return true;
          }
          else
          {
               return false;
          }
     }

     public function deletedata($table,$data=array())
     {
          $this->db->where($data);
          if($this->db->delete($table))
          {
               return true;
          }
          else
          {
               return false;
          }
     }
}