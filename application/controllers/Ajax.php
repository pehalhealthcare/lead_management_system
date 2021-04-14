<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         
          if(!$this->session->name)
          {
               return redirect("/");
          }
     }

     public function addcustomerdata()
     {
          $insertdata = array(
               "prefix"=>$this->input->post("surname"),
               "name" => $this->input->post("name"),
               "email"=> $this->input->post("email"),
               "mobile"=>$this->input->post("mobile"),
               "is_active"=>$this->input->post("status"),
               "alternate_mobile"=>$this->input->post("alternate_mobile"),
               "created_at" => date("Y-m-d l:s:i"),
               "created_by" => $this->session->userID
          );
          if($this->common_model->adddata("mk_customer",$insertdata))
          {
               $id=($this->common_model->lastinsert_id("mk_customer","customer_id"));
               // print_r($id);
               echo json_encode($id);
               // $this->session->set_flashdata('message_name', 'Customer Data Inserted');
               // return redirect("dashboard/leadcustomer");
          }
          else
          {
               echo json_encode(array("message"=>"No data Inserted"));
               // $this->session->set_flashdata('message_name', 'Customer Data Not Inserted');
               // return redirect("dashboard/leadcustomer");
          }
     }
}