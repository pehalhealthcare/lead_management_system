<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         
          if(!$this->session->name)
          {
               return redirect("/");
          }
     }

     public function index()
     {
          // print_r($this->session);
          if($this->session->category=="BA" || $this->session->category=="OA")
          {
               $data["leads"] = $this->common_model->viewwheredata(array("assigned_to"=>$this->session->userID),"mk_lead");
               $data["order_forms"] = $this->common_model->viewwheredata(array("agent_id"=>$this->session->userID),"mk_order_assign");
          }
          else
          {

               
               $data["quotation"] = $this->common_model->viewdata("mk_quotation","multiple");
               $data["approved_leads"] = $this->common_model->viewwheredata(array("is_active"=>1),"mk_lead");
               $data["disapproved_leads"] = $this->common_model->viewwheredata(array("is_active"=>0),"mk_lead");
               $data["complete_leads"] = $this->common_model->viewwheredata(array("approved"=>"yes"),"mk_order");
               // 
          }

         
          $data["customers"] = $this->common_model->common_model->viewdata("mk_customer","multiple");


          $data["title"] = "Dashboard";
          $this->load->view("inc/header",$data);
          if($this->session->category=="BA" || $this->session->category=="OA")
          {
               $this->load->view("dashboard/TL-Agent-Dashboard",$data);
          }
          else
          {
               $this->load->view("dashboard/index",$data);
          }
          $this->load->view("inc/footer");
     }
}
?>