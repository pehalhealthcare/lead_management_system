<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }

     public function index()
     {


          




          if ($this->session->category == "BA" || $this->session->category == "OA") {
               // $data["leads"] = $this->common_model->viewwheredata(array("assigned_to" => $this->session->userID), "mk_lead");
               // $data["order_forms"] = $this->common_model->viewwheredata(array("agent_id" => $this->session->userID), "mk_order_assign");
               $cond = array(
                    "agent_id"=>$this->session->userID,
               );

               $data["orders"] = $this->common_model->jointables("mk_order","mk_order_assign","left","mk_order.order_id","mk_order_assign.order_id",$cond);
               
               $data["dashoppo"] = $this->common_model->viewdata("mk_opportunity", "multiple");
               $data["quotation"] = $this->common_model->viewdata("mk_quotation", "multiple");
               
               $data["approved_leads"] = $this->common_model->viewwheredata(array("is_active" => 1), "mk_lead");
               $data["logcalls"] = $this->common_model->viewwheredata(array("activity_master_id" => 1), "mk_activity");
               $data["meetings"] = $this->common_model->viewwheredata(array("activity_master_id" => 2), "mk_activity");
               $data["agents"] = $this->common_model->viewwhereordata(array("category" => "BA"), array("category" => "OA"), "mk_registration_table");
               $data["teamleader"] = $this->common_model->viewwhereordata(array("category" => "BTL"), array("category" => "OTL"), "mk_registration_table");
          } 
          else {




               // echo "<pre>";print_r($data["opportunity"]); die();
               $data["dashoppo"] = $this->common_model->viewdata("mk_opportunity", "multiple");
               $data["approved_leads"] = $this->common_model->viewwheredata(array("is_active" => 1), "mk_lead");
               $data["logcalls"] = $this->common_model->viewwheredata(array("activity_master_id" => 1), "mk_activity");
               $data["meetings"] = $this->common_model->viewwheredata(array("activity_master_id" => 2), "mk_activity");
               $data["agents"] = $this->common_model->viewwhereordata(array("category" => "BA"), array("category" => "OA"), "mk_registration_table");

               $data["teamleader"] = $this->common_model->viewwhereordata(array("category" => "BTL"), array("category" => "OTL"), "mk_registration_table");

               $data["quotations"] = $this->common_model->viewdata("mk_quotation", "multiple");

               $data["orders"] = $this->common_model->viewdata("mk_order", "multiple");

               $data["orders_assign"] = $this->common_model->viewdata("mk_order_assign","multiple");

               // $data["agents"] = $this->common_model->viewdata("mk_registration_table","multiple");

               $data["cus_items"] = $this->common_model->viewdata("mk_customer_item","multiple");

               $data["cus_items"] = $this->common_model->viewdata("mk_customer_item","multiple");

               $data["service_items"] = $this->common_model->viewdata("mk_master_service_item","multiple");

               $data["product_items"] = $this->common_model->viewdata("mk_master_product_item","multiple");
               // 
          }

          // echo "<pre>"; print_r($data["agents"]); die();

          $data["customers"] = $this->common_model->common_model->viewdata("mk_customer", "multiple");


          $data["title"] = "Dashboard Team";

          $this->load->view("inc/header", $data);

          if ($this->session->category == "BA" || $this->session->category == "OA") {
               $this->load->view("dashboard/TL-Agent-Dashboard", $data);
          } else {
               $this->load->view("dashboard/index", $data);
          }
          $this->load->view("inc/footer");
     }
}
