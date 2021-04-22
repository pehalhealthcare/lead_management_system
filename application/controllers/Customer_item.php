<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_item extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
     }

     public function adddata($customer_id="",$purchase_order="")
     {
          $data["title"] = "Add Customer Item";
          $this->form_validation->set_rules("purchase_order_number","Purchase Number","required");

          $insertdata = array(
               "customer_id"=>$this->input->post(""),
               "purchase_order_id"=>$this->input->post("purchase_order_id"),
               "item_id"=>$this->input->post("item_id"),
               "quantity"=>$this->input->post("quantity"),
               "unit_price"=>$this->input->post("unit_price"),
               "total_price"=>$this->input->post("total_price"),
               "tax_rate"=>$this->input->post("tax_rate"),
               "tax_amount"=>$this->input->post("tax_amount"),
               "total_amount"=>$this->input->post("total_amount"),
          );   

          $data["products"] = $this->common_model->viewdata("mk_master_product","multiple");

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id"=>$customer_id),"mk_customer");

          $data["purchase_order"] = $purchase_order;

          // print_r($data["products"]); die();

          $this->form_validation->set_rules("purchase_order_number","Purchase Number","required");
          $this->form_validation->set_rules("item_id","Item Name","required");

          $cols = array(
               "purchase_order_id"=>$purchase_order,
               "customer_id"=>$customer_id
          );
          // $data["customer_item"] = $this->common_model->viewheredata($cols,"");

          // $this->form_validation->set_rules('status', 'Status', 'required');

          if($this->form_validation->run() == FALSE)
          {
               $data["customerItem"] = $this->common_model->viewwheredata(array("customer_id"=>$customer_id,"purchase_order_id"=>$purchase_order),"mk_customer_item");

               // print_r($customerItem); die();
               if($data["customerItem"])
               {
                    $this->load->view("inc/header",$data);
                    $this->load->view('dashboard/customer_item/edit-customeritem',$data);
                    $this->load->view("inc/footer");
               }
               else
               {
                    $this->load->view("inc/header",$data);
                    $this->load->view('dashboard/customer_item/add-customeritem',$data);
                    $this->load->view("inc/footer");

               }
               
          }
          else
          {
               if($this->common_model->adddata("mk_customer_item",$insertdata))
               {
                    $this->session->set_flashdata("message_name","Data Inserted successfully");
                    return redirect("dashboard/purchase-order");
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