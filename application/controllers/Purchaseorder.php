<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaseorder extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
     }

     public function adddata($id="")
     {
          $data["title"] = "Create Purchase Order";
          $this->form_validation->set_rules("purchase_order_number","Purchase Number","required");

          $customer_id = $this->common_model->viewwheredata(array("lead_id"=>$id),"mk_lead_customer");

          $data["customer_id"] = $this->common_model->viewwheredata(array("customer_id"=>$customer_id[0]["customer_id"]),"mk_customer");

          $data["customers"] = $this->common_model->viewdata("mk_customer","multiple");

          $data["leadcustomer"] = $this->common_model->viewwheredata(array("lead_id"=>$id),"mk_lead_customer");

          // print_r($data["customer"]);

          $insertdata = array(
               "purchase_order_number"=>$this->input->post("purchase_order_number"),
               "customer_id"=>$this->input->post("customer_id"),
               "lead_id"=>$id,
               "status"=>$this->input->post("status"),
               "comments"=>$this->input->post("comments"),
               "created_at"=>date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );
          // $this->form_validation->set_rules('status', 'Status', 'required');

          if($this->form_validation->run() == FALSE)
          {
               $purchasedata = $this->common_model->viewwheredata(array("customer_id"=>$customer_id[0]["customer_id"],"lead_id"=>$id),"mk_purchase_order");
               
               // print_r($purchasedata); die();
               if($purchasedata)
               {
                    // echo $purchasedata[0]["purchase_order_number"];
                    // echo $id;
                    return redirect("dashboard/add/customer-item/".$id."/".$purchasedata[0]["purchase_order_number"]);
               }
               else
               {
                    $this->load->view("inc/header",$data);
                    $this->load->view('dashboard/purchase/add-purchase',$data);
                    $this->load->view("inc/footer");

               }

               
          }
          else
          {
               if($this->common_model->adddata("mk_purchase_order",$insertdata))
               {

                    $id = $this->common_model->lastinsert_id("mk_purchase_order","purchase_order_id");
                    $this->session->set_flashdata("message_name","Data Inserted successfully");
                    return redirect("dashboard/add/customer-item/".$id[0]->customer_id."/".$id[0]->purchase_order_number);
               }
               else
               {
                    $this->session->set_flashdata("message_name","Data Not Inserted successfully");
                    return redirect("dashboard/purchase-order");
               }
          }
     }

     public function viewdata()
     {

     }

     public function editdata($id="")
     {

     }

     public function deletedata($id="")
     {

     }
}