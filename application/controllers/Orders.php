<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Orders extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }

     public function order_details()
     {
         
          if($this->session->category=="OA")
          {
               
               $cond = array(
                    "agent_id"=>$this->session->userID,
               );

               $data["orders"] = $this->common_model->jointables("mk_order","mk_order_assign","left","mk_order.order_id","mk_order_assign.order_id",$cond);
               //     echo "<pre>"; print_r($data); die();

               $data["title"] = "Dashboard | Agent orders";

               $data["admins"] = $this->common_model->viewwheredata(array("role"=>1),"mk_registration_table");

               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/order/view-agent-order", $data);
               $this->load->view("inc/footer", $data);

              
          }
          else 
          {
               $data["title"] = "Dashboard | View orders";

               $data["orders"] = $this->common_model->viewdata("mk_order","multiple");

               $data["orders_assign"] = $this->common_model->viewdata("mk_order_assign","multiple");

               $data["agents"] = $this->common_model->viewdata("mk_registration_table","multiple");

               $data["cus_items"] = $this->common_model->viewdata("mk_customer_item","multiple");

               $data["cus_items"] = $this->common_model->viewdata("mk_customer_item","multiple");

               $data["service_items"] = $this->common_model->viewdata("mk_master_service_item","multiple");

               $data["product_items"] = $this->common_model->viewdata("mk_master_product_item","multiple");
               
               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/order/view-order", $data);
               $this->load->view("inc/footer", $data);
          }
         
     }

     public function order_assign($order="")
     {
          $data["title"] = "Dashboard | Assign order";
          $data["order"] = $this->common_model->viewwheredata(array("order_id"=>$order),"mk_order");

          // print_r($data["order"]); die();


          $data["agents"] = $this->common_model->viewwheredata(array("category"=>"OA"),"mk_registration_table");

          $this->form_validation->set_rules("agent_id", "Agent", "required");

          if ($this->form_validation->run() == FALSE) 
          {
               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/order/assign-order", $data);
               $this->load->view("inc/footer", $data);
          }
          else
          {
              $insertdata = array(
               "quotation_id"=>$this->input->post("quid"),
               "agent_id"=>$this->input->post("agent_id"),
               "order_id"=>$this->input->post("order_id"),
               "lead_id"=>$this->input->post("lead_id"),
               "status"=>$this->input->post("status"),
               "created_by"=>$this->session->userID,
               "created_at"=>date("Y-m-d h:i:s")
              );
              $cond = array(
                   "order_id"=>$this->input->post("order_id"),
                   "lead_id"=>$this->input->post("lead_id")
               );

              $datacheck = $this->common_model->viewwheredata($cond,"mk_order_assign");
              if($datacheck)
              {
                   $this->common_model->updatedata("mk_order_assign",$insertdata,$cond);
                    $this->session->set_flashdata("message","Data updated successfully");
                    return redirect("/dashboard/operation/order");
              }
              else
              {
               if($this->common_model->adddata("mk_order_assign",$insertdata))
               {
                    $historydata = array(
                         "actions"=>"order details updated",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );

                    $this->common_model->adddata("mk_lead_history",$historydata);

                    $this->session->set_flashdata("message","Data Saved Successfully");
                    return redirect("/dashboard/operation/order");
 
               }
              }
              
          }
          
     }

     public function order_view($order_id="")
     {
          $data["title"] = "Dashboard | View  order details";
          $data["order"] = $this->common_model->viewwheredata(array("order_id"=>$order_id),"mk_order");

          $data["quotation"] = $this->common_model->viewwheredata(array("quotation_id"=>$data["order"][0]["quotation_id"]),"mk_quotation");

          // print_r($data["quotation"]); die();

          
          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/order/view-order-details", $data);
          $this->load->view("inc/footer", $data);

     }

     public function order_verification($customer="")
     {

     }

     public function payment_verification()
     {

     }

     public function customer_verification()
     {

     }
}
?>