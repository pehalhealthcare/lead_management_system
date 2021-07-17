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

     public function viewdata($table="",$action="")
     {    
          if($action=="multiple")
          {
               $this->db->where("is_active","1");
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

     public function joinQuery($query="")
     {
          $run= $this->db->query($query);

          return $run->result();
     }

     public function joinTables($t1="",$t2="",$type="",$t1_f1="",$t2_f1="",$cond="")
     {
          $this->db->select("*");
          $this->db->from($t1);
          $this->db->join($t2, $t2_f1.'='.$t1_f1 ,$type);
          $this->db->where($cond);
          $run = $this->db->get();

          return $run->result();

     }

     public function vieworderby($table="",$action="",$field="",$order="")
     {
          if($action=="multiple")
          {
               $this->db->where("is_active","1");
               $this->db->order_by($field,$order);
               $run = $this->db->get($table);
               // echo $this->db->last_query();
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

     public function viewwhereordata($c1=array(),$c2=array(),$table="")
     {
          $this->db->or_where($c2);
          
          $this->db->or_where($c1);

          $run = $this->db->get($table);

          $data = $run->result_array();

          // echo $this->db->last_query();

          return $data;

          
     }

     public function viewwheredataorderby($column=array(),$table="",$field,$order)
     {
          $this->db->where($column);

          $this->db->order_by($field,$order);

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
               // echo $this->db->last_query();
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
          if($this->db->update($table,array("is_active"=>"0")))
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