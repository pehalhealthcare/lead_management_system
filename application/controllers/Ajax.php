<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }

     public function addcustomerdata()
     {
          $insertdata = array(
               "prefix" => $this->input->post("surname"),
               "name" => $this->input->post("customer-name"),
               "email" => $this->input->post("email"),
               "mobile" => $this->input->post("mobile"),
               "alternate_mobile" => $this->input->post("alternate_mobile"),
               // "country"=>$this->input->post("country"),
               "created_at" => date("Y-m-d l:s:i"),
               "created_by" => $this->session->userID
          );

          $insertaddress = array(
               "address_1" => $this->input->post("address_1"),
               "address_2" => $this->input->post("address_2"),
               "address_3" => $this->input->post("address_3"),
               "city" => $this->input->post("city"),
               "state" => $this->input->post("state"),
               "zip" => $this->input->post("zip"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          $customercheck = $this->common_model->viewwheredata(array("email"=>$this->input->post("email")),"mk_customer");

          if(empty($customercheck))
          {
               if ($this->common_model->adddata("mk_customer", $insertdata)) 
               {
     
                    $id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
     
                    
     
                    $insertaddress["customer_id"] = $id[0]->customer_id;
     
                    if ($this->common_model->adddata("mk_customer_address", $insertaddress)) 
                    {
                         $insertleaddata = array(
                              "lead_id" => $this->input->post("lead_id"),
                              "customer_id" => $insertaddress["customer_id"],
                              "created_at" => date("Y-m-d l:s:i"),
                              "created_by" => $this->session->userID
                         );
               
                         $whereData = array(
                              "lead_id" => $this->input->post("lead_id"),
                              "customer_id" => $insertaddress["customer_id"]
                         );
               
                         $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");
               
                         if (empty($datacheck)) {
                              if ($this->common_model->adddata("mk_lead_customer", $insertleaddata)) {
                                   echo json_encode(array("message" => "data Inserted"));
                              } else {
                                   echo json_encode(array("message" => "No data Inserted"));
                              }
                         }
                         // echo json_encode($id);
                    }
               } 
               else {
                    echo json_encode(array("message" => "No data Inserted"));
                    
               }
          }
          else
          {
              $wherecon = array("customer_id"=>$customercheck[0]["customer_id"]);

              $insertleaddata = array(
               "lead_id" => $this->input->post("lead_id"),
               "customer_id" => $customercheck[0]["customer_id"],
               "modified_at" => date("Y-m-d l:s:i"),
               "modified_by" => $this->session->userID
             );

              $wherecond = array("lead_id"=>$this->input->post("lead_id"));

              if($this->common_model->updatedata("mk_customer",$insertdata,$wherecon))
              {
                    if($this->common_model->updatedata("mk_customer_address",$insertaddress,$wherecon))
                    {
                         if($this->common_model->updatedata("mk_lead_customer",$insertleaddata,$wherecond))
                         {
                              echo json_encode(array("message" => "Data Updated Successfully"));
                         }
                    }
                    else
                    {
                         echo json_encode(array("message" => "Data Not Updated Successfully"));
                    }
              }

          }

          return false;

          
     }

     public function assigncustomerdata()
     {
          $insertdata = array(
               "lead_id" => $this->input->post("lead_id"),
               "customer_id" => ($this->input->post("customer_id")) ? $this->input->post("customer_id") : $this->input->post("customer"),
               "created_at" => date("Y-m-d l:s:i"),
               "created_by" => $this->session->userID
          );

          $whereData = array(
               "lead_id" => $this->input->post("lead_id"),
               "customer_id" => ($this->input->post("customer_id")) ? $this->input->post("customer_id") : $this->input->post("customer")
          );

          $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");

          if (empty($datacheck)) {
               if ($this->common_model->adddata("mk_lead_customer", $insertdata)) {
                    echo json_encode(array("message" => "data Inserted"));
               } else {
                    echo json_encode(array("message" => "No data Inserted"));
               }
          }
     }

     public function getProductItem()
     {
          $product_id = $this->input->post("product_id");

          $itemcheck = $this->common_model->viewwheredata(array("product_id" => $product_id), "mk_customer_item");

          $item = $this->common_model->viewwheredata(array("product_id" => $product_id), "mk_master_product_item");

          // echo count($itemcheck); die();

          if(count($itemcheck)>0)
          {
               echo json_encode($itemcheck);
          }
          else
          {
               echo json_encode($item);
          }

         
     }

     public function getcustomer()
     {
          $id = $this->input->post("id");

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id"=>$id),"mk_customer");

          $data["address"] = $this->common_model->viewwheredata(array("customer_id"=>$id),"mk_customer_address");

          echo json_encode($data);
     }

     public function submitProductItem()
     {
          $count = ($this->input->post("quantity")) ? count($this->input->post("quantity")) : "0";

          // echo $count; die();
          if ($count > 0) {
               $insertdata = array();
               for ($i = 0; $i < $count; $i++) {
                    $insertdata = array(
                         "customer_id" => $this->input->post("pcustomer_id"),
                         "purchase_order_id" => $this->input->post("application"),
                         "item_id" => $this->input->post("item_id")[$i],
                         "quantity" => $this->input->post("quantity")[$i],
                         "unit_price" => $this->input->post("unit_price")[$i],
                         "tax_rate" => $this->input->post("tax_rate")[$i],
                         "tax_amount" => $this->input->post("tax_amount")[$i],
                         "total_price" => $this->input->post("total_price")[$i],
                         "total_amount" => $this->input->post("total_amount"),
                         "created_at" => date("Y-m-d h:i:s"),
                         "created_by" => $this->session->userID,
                         "lead_id"=>$this->input->post("lead_id"),
                         "product_id"=>$this->input->post("product_id")
                    );
                    // print_r($insertdata); die();
                    $cols = array(
                         // "purchase_order_id" => $this->input->post("application"),
                         "customer_id" => $this->input->post("pcustomer_id"),
                         "item_id" => $this->input->post("item_id")[$i],
                         "lead_id"=>$this->input->post("lead_id")
                    );

                    $datacheck = $this->common_model->viewwheredata($cols, "mk_customer_item");

                    // print_r($datacheck); echo count($datacheck);  

                    // print_r($insertdata);
                    
                    // die();

                    if (count($datacheck)==0) {
                         if ($this->common_model->adddata("mk_customer_item", $insertdata)) {
                              echo json_encode(array("message" => "Data added Successfully"));
                         } else {
                              echo json_encode(array("message" => "Data Not added Successfully"));
                         }
                    } else {
                         $condition = array(
                              "customer_id" => $this->input->post("pcustomer_id"),
                              "item_id" => $this->input->post("item_id")[$i],
                              "lead_id"=>$this->input->post("lead_id")
                         );
                         if ($this->common_model->updatedata("mk_customer_item", $insertdata, $condition)) {
                              echo json_encode(array("message" => "Data updated Successfully"));
                         }
                    }
               }
          } 
          // else {
          //      $condition = array(
          //           "purchase_order_id" => $this->input->post("application"),
          //           "customer_id" => $this->input->post("customer_id"),
          //           "item_id" => $this->input->post("item_id")
          //      );
          //      $updatedata = array("is_active" => 0);
          //      // print_r($updatedata);
          //      if ($this->common_model->updatedata("mk_customer_item", $updatedata, $condition)) {
          //           echo json_encode(array("message" => "Data updated Successfully"));
          //      } else {
          //           echo json_encode(array("message" => "Data Not updated Successfully"));
          //      }
          // }
     }

     public function getcustomerdata()
     {
          $data = $this->common_model->viewdata("mk_customer", "multiple");

          echo json_encode($data);
     }
}
