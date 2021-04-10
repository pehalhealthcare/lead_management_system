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

          $data = $run->result_array();

          // echo $this->db->last_query();

          return $data;

          
     }

     public function total_price($column=array(),$table,$field)
     {
          $this->db->where($column);
          
          $this->db->select_sum($field);
          
          $query = $this->db->get($table);

          // echo $this->db->last_query();


          return $query->result();
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

     public function lastinsert_id($table="",$field="")
     {    
          $query = $this->db->query("SELECT * FROM $table ORDER BY $field Desc LIMIT 0,1");

          return $query->result();
     }
}