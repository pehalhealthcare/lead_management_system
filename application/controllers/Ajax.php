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

          $customer = str_replace(" ", "%20", $this->input->post("customer-name"));

          $customercheck = $this->common_model->viewwheredata(array("email" => $this->input->post("email")), "mk_customer");

          if (empty($customercheck)) {
               if ($this->common_model->adddata("mk_customer", $insertdata)) {

                    $id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));



                    $insertaddress["customer_id"] = $id[0]->customer_id;

                    if ($this->common_model->adddata("mk_customer_address", $insertaddress)) {
                         $insertleaddata = array(
                              "lead_id" => $this->input->post("lead_id"),
                              "customer_id" => $insertaddress["customer_id"],
                              "created_at" => date("Y-m-d l:s:i"),
                              "created_by" => $this->session->userID
                         );

                         $whereData = array(
                              // "lead_id" => $this->input->post("lead_id"),
                              "customer_id" => $insertaddress["customer_id"]
                         );

                         

                         $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");

                         if (empty($datacheck)) {
                              if ($this->common_model->adddata("mk_lead_customer", $insertleaddata)) {
                                   $historydata = array(
                                        "actions" => "Customer added for lead",
                                        "lead_id" => $this->input->post("lead_id"),
                                        "created_by" => $this->session->userID,
                                        "created_at" => date("Y-m-d h:i:s")
                                   );

                                   $leadwhere = array(
                                        "id" => $this->input->post("lead_id"),
                                   );
          
                                   $leadupdate = array(
                                        "journey" => "In Process",
                                   );

                                   $this->common_model->updatedata("mk_lead",$leadupdate,$leadwhere);

                                   $this->common_model->adddata("mk_lead_history", $historydata);

                                   if ($this->email_template_1($this->input->post("email"))) {
                                        $sms = $this->sms_template_1($customer, $this->input->post("mobile"));
                                        echo $customer."-".$this->input->post("mobile");
                                        echo $sms;
                                        echo json_encode(array("message" => "Data and mail sent successfully"));
                                   } else {
                                        echo json_encode(array("message" => "Mail not sent"));
                                   }
                              }
                         }
                         // echo json_encode($id);
                    }
               } else {
                    echo json_encode(array("message" => "No data Inserted"));
               }
          } else {
               $wherecon = array("customer_id" => $customercheck[0]["customer_id"]);

               $insertleaddata = array(
                    "lead_id" => $this->input->post("lead_id"),
                    "customer_id" => $customercheck[0]["customer_id"],
                    "modified_at" => date("Y-m-d l:s:i"),
                    "modified_by" => $this->session->userID
               );

               $wherecond = array("lead_id" => $this->input->post("lead_id"), "customer_id" => $customercheck[0]["customer_id"]);

               if ($this->common_model->updatedata("mk_customer", $insertdata, $wherecon)) {
                    $whereData = array(
                         "customer_id" => $customercheck[0]["customer_id"],
                         "lead_id" => $this->input->post("lead_id")
                    );
                    if ($this->common_model->updatedata("mk_customer_address", $insertaddress, $wherecon)) {


                         $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");

                         if (empty($datacheck)) {
                              if ($this->common_model->adddata("mk_lead_customer", $insertleaddata)) {
                                   $historydata = array(
                                        "actions" => "customer details updated for lead",
                                        "lead_id" => $this->input->post("lead_id"),
                                        "created_by" => $this->session->userID,
                                        "created_at" => date("Y-m-d h:i:s")
                                   );
                                   $this->common_model->adddata("mk_lead_history", $historydata);
                                   if ($this->email_template_1($this->input->post("email"))) {

                                        $sms = $this->sms_template_1($customer, $this->input->post("mobile"));
                                        echo $customer."-".$this->input->post("mobile");
                                        echo $sms;
                                        echo json_encode(array("message" => "Data and mail sent successfully"));
                                   } else {
                                        echo json_encode(array("message" => "Mail not sent"));
                                   }

                                   // $this->email_template_1($this->input->post("email"));

                              }
                         } else {
                              // echo "Data Not Updated";
                              if ($this->common_model->updatedata("mk_lead_customer", $insertleaddata, $wherecond)) {
                                   if ($this->email_template_1($this->input->post("email"))) {

                                        $sms = $this->sms_template_1($customer, $this->input->post("mobile"));
                                        echo $customer."-".$this->input->post("mobile");
                                        echo $sms;
                                        echo json_encode(array("message" => "Data and mail sent successfully"));
                                   } else {
                                        echo json_encode(array("message" => "Mail not sent"));
                                   }
                              }
                         }
                    } else {
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
          if($this->input->post("product_id") && $this->input->post("lead_id"))
          {
               $product_id = $this->input->post("product_id");

               $cond = array("product_id" => $product_id, "is_active" => 1, "lead_id" => $this->input->post("lead_id"));
     
               $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");
     
               $data["item_new"] = $this->common_model->viewwheredata(array("product_id" => $product_id, "is_active" => 1), "mk_master_product_item");
     
          }

          if($this->input->post("product_name") && $this->input->post("product_id") && $this->input->post("lead_id"))
          {
               $product_id = $this->input->post("product_id");

               $product_name = $this->input->post("product_name");

               $cond = array("product_id" => $product_id, "is_active" => 1, "lead_id" => $this->input->post("lead_id"));
     
               $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");
     
               $data["item_new"] = $this->common_model->viewwherelikedata(array("item_name" => $product_name, "is_active" => 1), "mk_master_product_item");

          }
          

          echo json_encode($data);
     }

     public function getServiceItem()
     {
          if($this->input->post("service_id") && $this->input->post("lead_id"))
          {
               $service_id = $this->input->post("service_id");

               $cond = array("service_id" => $service_id, "is_active" => 1, "lead_id" => $this->input->post("lead_id"));
     
               $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");
     
               $data["item_new"] = $this->common_model->viewwheredata(array("service_id" => $service_id, "is_active" => 1), "mk_master_service_item");
          }
          if($this->input->post("service_id") && $this->input->post("lead_id") && $this->input->post("service_name"))
          {
               $service_id = $this->input->post("service_id");

               $service_name = $this->input->post("service_name");

               $cond = array("service_id" => $service_id, "is_active" => 1, "lead_id" => $this->input->post("lead_id"));
     
               $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");
     
               $data["item_new"] = $this->common_model->viewwherelikedata(array("item_name" => $service_name, "is_active" => 1), "mk_master_service_item");
          }
         

          echo json_encode($data);
     }

     public function getCustomerItem()
     {
          $lead_id = $this->input->post("lead_id");

          $cond = array("is_active" => 1, "lead_id" => $lead_id);

          $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");

          $data["product_item"] = $this->common_model->viewwheredata(array("is_active" => 1), "mk_master_product_item");

          $data["service_item"] = $this->common_model->viewwheredata(array("is_active" => 1), "mk_master_service_item");


          echo json_encode($data);
     }

     public function getcustomer()
     {
          $id = $this->input->post("id");

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $id), "mk_customer");

          $data["address"] = $this->common_model->viewwheredata(array("customer_id" => $id), "mk_customer_address");

          echo json_encode($data);
     }

     public function getcustomerinfo()
     {
          $value = $this->input->post("value");

          $data["customer"] = $this->common_model->viewwhereordata(array("name" => $value,"mobile"=>$value,"email"=>$value),array(), "mk_customer");

          // $data["address"] = $this->common_model->viewwheredata(array("customer_id" => $id), "mk_customer_address");

          echo json_encode($data);
     }

     public function getTerms()
     {
          $id = $this->input->post("customer_id");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $id, "is_active" => "1"), "mk_customer_term");

          echo json_encode($data);
     }

     public function submitCustomerTerm()
     {
          $cond = array(
               "customer_id" => $this->input->post("customer_id"),
               "term_id" => $this->input->post("term_id")
          );

          $data["customer_term"] = $this->common_model->viewwheredata($cond, "mk_customer_term");


          // print_r($data); die();

          if (empty($data["customer_term"])) {
               $insertdata = array(
                    "customer_id" => $this->input->post("customer_id"),
                    "term_id" => $this->input->post("term_id"),
                    "is_active" => $this->input->post("is_active"),
                    "created_at" => date("Y-m-d h:i:s"),
                    "created_by" => $this->session->userID
               );

               if ($this->common_model->adddata("mk_customer_term", $insertdata)) {
                    $historydata = array(
                         "actions" => "Customer terms added for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo json_encode(array("message" => "Data Inserted Successfully"));
               } else {
                    echo json_encode(array("message" => "Data Not Inserted Successfully"));
               }
          } else {
               $insertdata = array(
                    "customer_id" => $this->input->post("customer_id"),
                    "term_id" => $this->input->post("term_id"),
                    "is_active" => $this->input->post("is_active"),
                    "modified_at" => date("Y-m-d h:i:s"),
                    "modified_by" => $this->session->userID
               );
               $condition = array(
                    "customer_id" => $this->input->post("customer_id"),
                    "term_id" => $this->input->post("term_id")
               );
               if ($this->common_model->updatedata("mk_customer_term", $insertdata, $condition)) {
                    $historydata = array(
                         "actions" => "customer terms updated for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo json_encode(array("message" => "Data Updated Successfully"));
               }
          }
     }

     public function submitProductItem()
     {
          $count = ($this->input->post("quantity")) ? count($this->input->post("quantity")) : "0";

          // print_r($_POST); die();
          if ($count > 0) {
               $insertdata = array();
               for ($i = 0; $i < $count; $i++) {
                    $insertdata = array(
                         "customer_id" => $this->input->post("pcustomer_id"),
                         // "purchase_order_id" => $this->input->post("application"),
                         "item_id" => $this->input->post("item_id")[$i],
                         "quantity" => $this->input->post("quantity")[$i],
                         "unit_price" => $this->input->post("unit_price")[$i],
                         "selling_price" => $this->input->post("selling_price")[$i],
                         "tax_rate" => $this->input->post("tax_rate")[$i],
                         "tax_amount" => $this->input->post("tax_amount")[$i],
                         "total_price" => $this->input->post("total_price")[$i],
                         // "total_amount" => $this->input->post("total_amount"),
                         "created_at" => date("Y-m-d h:i:s"),
                         "created_by" => $this->session->userID,
                         "lead_id" => $this->input->post("lead_id"),
                         "product_id" => $this->input->post("product_id")
                    );
                    // print_r($insertdata); die();
                    $cols = array(
                         // "purchase_order_id" => $this->input->post("application"),
                         "customer_id" => $this->input->post("pcustomer_id"),
                         "item_id" => $this->input->post("item_id")[$i],
                         "lead_id" => $this->input->post("lead_id")
                    );

                    $datacheck = $this->common_model->viewwheredata($cols, "mk_customer_item");



                    if (count($datacheck) == 0) {
                         if ($this->common_model->adddata("mk_customer_item", $insertdata)) {
                              $historydata = array(
                                   "actions" => "Product items added for lead",
                                   "lead_id" => $this->input->post("lead_id"),
                                   "created_by" => $this->session->userID,
                                   "created_at" => date("Y-m-d h:i:s")
                              );
                              $this->common_model->adddata("mk_lead_history", $historydata);
                              echo json_encode(array("message" => "Data added Successfully"));
                         } else {
                              echo json_encode(array("message" => "Data Not added Successfully"));
                         }
                    } else {
                         $condition = array(
                              "customer_id" => $this->input->post("pcustomer_id"),
                              "item_id" => $this->input->post("item_id")[$i],
                              "lead_id" => $this->input->post("lead_id")
                         );
                         if ($this->common_model->updatedata("mk_customer_item", $insertdata, $condition)) {
                              $historydata = array(
                                   "actions" => "Product items updated for lead",
                                   "lead_id" => $this->input->post("lead_id"),
                                   "created_by" => $this->session->userID,
                                   "created_at" => date("Y-m-d h:i:s")
                              );
                              $this->common_model->adddata("mk_lead_history", $historydata);
                              echo json_encode(array("message" => "Data updated Successfully"));
                         }
                    }
               }
          }
     }

     public function singleproductsubmit()
     {
          $insertdata = array(
               "customer_id" => $this->input->post("pcustomer_id"),
               // "purchase_order_id" => $this->input->post("application"),
               "item_id" => $this->input->post("item_id"),
               "quantity" => $this->input->post("quantity"),
               "unit_price" => $this->input->post("unit_price"),
               "selling_unit_price" => $this->input->post("selling_unit_price"),
               "selling_price" => $this->input->post("selling_price"),
               "tax_rate" => $this->input->post("tax_rate"),
               "tax_amount" => $this->input->post("tax_amount"),
               "total_tax_amount" => $this->input->post("total_tax_amount"),
               "total_price_wo_tax" => $this->input->post("total_price_wo_tax"),
               "total_price" => $this->input->post("total_price"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID,
               "lead_id" => $this->input->post("lead_id"),
               "product_id" => $this->input->post("product_id"),
               "service_id" => $this->input->post("service_id")

          );
          // echo "checking product".$this->input->post("product_id");

          if ($this->input->post("product_id") && $this->input->post("product_id") != "null") {
               $cols = array(
                    "product_id" => $this->input->post("product_id"),
                    "customer_id" => $this->input->post("pcustomer_id"),
                    "item_id" => $this->input->post("item_id"),
                    "lead_id" => $this->input->post("lead_id")
               );

               $insertdata["item_type"] = "product";
          }

          // echo "checking service".$this->input->post("service_id");

          if ($this->input->post("service_id") && $this->input->post("service_id") != "null") {
               $cols = array(
                    "service_id" => $this->input->post("service_id"),
                    "customer_id" => $this->input->post("pcustomer_id"),
                    "item_id" => $this->input->post("item_id"),
                    "lead_id" => $this->input->post("lead_id")
               );

               $insertdata["item_type"] = "service";
          }


          // print_r($cols); die();

          $datacheck = $this->common_model->viewwheredata($cols, "mk_customer_item");

          if (empty($datacheck)) {
               echo "empty";
               $insertdata["is_active"] = $this->input->post("is_active");
               if ($this->common_model->adddata("mk_customer_item", $insertdata)) {
                    $historydata = array(
                         "actions" => "Product item added for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo json_encode(array("message" => "Data added Successfully"));
               } else {
                    echo json_encode(array("message" => "Data Not added Successfully"));
               }
          } else {
               $insertdata["is_active"] = $this->input->post("is_active");

               if ($datacheck[0]["item_type"] == "service") {
                    $condition = array(
                         "customer_id" => $this->input->post("pcustomer_id"),
                         "item_id" => $this->input->post("item_id"),
                         "lead_id" => $this->input->post("lead_id"),
                         "item_type" => "service"
                    );
               } else {
                    $condition = array(
                         "customer_id" => $this->input->post("pcustomer_id"),
                         "item_id" => $this->input->post("item_id"),
                         "lead_id" => $this->input->post("lead_id"),
                         "item_type" => "product"
                    );
               }

               if ($this->common_model->updatedata("mk_customer_item", $insertdata, $condition)) {
                    $historydata = array(
                         "actions" => "Product item updated for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo json_encode(array("message" => "Data updated Successfully"));
               }
          }
     }

     public function activityMeeting()
     {
          $data = array(
               "lead_id" => $this->input->post("lead_id"),
               "assigned_to" => $this->input->post("assigned_to"),
               "activity_master_id" => $this->input->post("mactivity_id"),
               "subject" => $this->input->post("subject"),
               "status" => $this->input->post("status"),
               "related_to" => $this->input->post("related_to"),
               "start_date_time" => $this->input->post("fromdate"),
               "end_date_time" => $this->input->post("todate"),
               "location" => $this->input->post("location"),
               "reminder" => $this->input->post("reminder"),
               "description" => $this->input->post("description"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          $this->form_validation->set_rules("subject", "Subject", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->adddata("mk_activity", $data)) {
                    $historydata = array(
                         "actions" => "schedule meeting created for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data Inserted successfully";
               }
          }
     }

     public function updateMeeting()
     {
          $id = $this->input->post("mactivity_id");
          $data = array(
               "lead_id" => $this->input->post("lead_id"),
               "assigned_to" => $this->input->post("assigned_to"),
               "activity_master_id" => $this->input->post("mactivity_id"),
               "subject" => $this->input->post("subject"),
               "status" => $this->input->post("status"),
               "related_to" => $this->input->post("related_to"),
               "start_date_time" => $this->input->post("fromdate"),
               "end_date_time" => $this->input->post("todate"),
               "location" => $this->input->post("location"),
               "reminder" => $this->input->post("reminder"),
               "description" => $this->input->post("description"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          $this->form_validation->set_rules("subject", "Subject", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->updatedata("mk_activity", $data, array("id" => $id))) {
                    $historydata = array(
                         "actions" => "schedule meeting is updated for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data updated successfully";
               }
          }
     }

     public function logCall()
     {
          $data = array(
               "lead_id" => $this->input->post("lead_id"),
               "assigned_to" => $this->input->post("assigned_to"),
               "activity_master_id" => $this->input->post("lactivity_id"),
               "subject" => $this->input->post("subject"),
               "direction" => $this->input->post("direction"),
               "status" => $this->input->post("status"),
               "related_to" => $this->input->post("related_to"),
               "communication_preferred" => $this->input->post("communication"),
               "lead_possibility" => $this->input->post("lead_possibility"),
               "start_date_time" => $this->input->post("fromdate"),
               // "end_date_time"=>$this->input->post("todate"),
               // "location"=>$this->input->post("location"),
               "reminder" => $this->input->post("reminder"),
               "description" => $this->input->post("description"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          $this->form_validation->set_rules("subject", "Subject", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->adddata("mk_activity", $data)) {
                    $historydata = array(
                         "actions" => "Log call created for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data Inserted successfully";
               }
          }
     }

     public function updatelogCall()
     {
          $id = $this->input->post("lactivity_id");
          $data = array(
               "lead_id" => $this->input->post("lead_id"),
               "assigned_to" => $this->input->post("assigned_to"),
               "subject" => $this->input->post("subject"),
               "direction" => $this->input->post("direction"),
               "status" => $this->input->post("status"),
               "related_to" => $this->input->post("related_to"),
               "communication_preferred" => $this->input->post("communication"),
               "lead_possibility" => $this->input->post("lead_possibility"),
               "start_date_time" => $this->input->post("fromdate"),
               // "end_date_time"=>$this->input->post("todate"),
               // "location"=>$this->input->post("location"),
               "reminder" => $this->input->post("reminder"),
               "description" => $this->input->post("description"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          $this->form_validation->set_rules("subject", "Subject", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->updatedata("mk_activity", $data, array("id" => $id))) {
                    $historydata = array(
                         "actions" => "Log call is updated for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data Updated successfully";
               }
          }
     }

     public function composeMail()
     {
          // print_r($_POST); die();
          $data = array(
               "from_add" => $this->input->post("from_address"),
               "to_add" => $this->input->post("to_address"),
               "cc" => $this->input->post("cc_address"),
               "bcc" => $this->input->post("bcc_address"),
               "lead_id" => $this->input->post("lead_id"),
               "assigned_to" => $this->input->post("assigned_to"),
               "activity_master_id" => $this->input->post("cactivity_id"),
               "subject" => $this->input->post("subject"),
               "related_to" => $this->input->post("related_to"),
               "body" => $this->input->post("body"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID
          );

          //    print_r($data); die();

          $this->form_validation->set_rules("subject", "Subject", "required");
          $this->form_validation->set_rules("to_address", "To Address", "required");
          $this->form_validation->set_rules("from_address", "From Address", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->adddata("mk_activity", $data)) {
                    $this->email->to($this->input->post("to_address"));
                    $this->email->from('onlineguruweb@gmail.com');
                    $this->email->subject('Here is your info ' . $this->input->post("subject"));
                    $this->email->message('Hi ' . $this->input->post("subject") . ' Here is the info you requested.');
                    if ($this->email->send()) {
                         $historydata = array(
                              "actions" => "Mail has been sent for the lead",
                              "lead_id" => $this->input->post("lead_id"),
                              "created_by" => $this->session->userID,
                              "created_at" => date("Y-m-d h:i:s")
                         );
                         $this->common_model->adddata("mk_lead_history", $historydata);
                         echo "Data Inserted successfully";
                    } else {
                         echo "Data Inserted successfully";
                    }
               }
          }
     }

     public function opportunity()
     {
          $data = array(
               "opportunity_name" => $this->input->post("opportunity_name"),
               "expected_amount" => $this->input->post("exp_amount"),
               "expected_date" => $this->input->post("exp_date"),
               "status" => $this->input->post("status"),
               "remarks" => $this->input->post("remarks"),
               "lead_id" => $this->input->post("lead_id"),
               "is_active" => 1,
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID,
          );

          $this->form_validation->set_rules("exp_amount", "Expected Amount", "required");
          $this->form_validation->set_rules("exp_date", "Expected Date", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->adddata("mk_opportunity", $data)) {
                    $historydata = array(
                         "actions" => "opportunity created for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data Inserted Successfully";
               }
          }
     }

     public function edit_opportunity()
     {
          $id = $this->input->post("opportunity_id");
          $data = array(
               "opportunity_name" => $this->input->post("opportunity_name"),
               "expected_amount" => $this->input->post("exp_amount"),
               "expected_date" => $this->input->post("exp_date"),
               "status" => $this->input->post("status"),
               "remarks" => $this->input->post("remarks"),
               "lead_id" => $this->input->post("lead_id"),
               "is_active" => 1,
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID,
          );

          $this->form_validation->set_rules("exp_amount", "Expected Amount", "required");
          $this->form_validation->set_rules("exp_date", "Expected Date", "required");

          if ($this->form_validation->run() == true) {
               if ($this->common_model->updatedata("mk_opportunity", $data, array("id" => $id))) {
                    $historydata = array(
                         "actions" => "opportunity updated for lead",
                         "lead_id" => $this->input->post("lead_id"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history", $historydata);
                    echo "Data Updated Successfully";
               }
          }
     }

     public function getActivity()
     {
          $data["activity"] = $this->common_model->viewwheredata(array("lead_id" => $this->input->post("lead_id"), "is_active" => 1), "mk_activity");

          $data["customer"] = $this->common_model->viewwheredata(array("category"=>"BA"),"mk_registration_table");

          echo json_encode($data);
     }


     public function getMeeting()
     {
          $data = $this->common_model->viewwheredata(array("id" => $this->input->post("activity_id")), "mk_activity");

          $customer = $this->common_model->viewwheredata(array("id"=>$data[0]["assigned_to"] ),"mk_registration_table");

          // echo $this->db->last_query();

          $data["customer"] = $customer[0]["firstname"];

          echo json_encode($data);
     }

     public function getLogCall()
     {
          $data = $this->common_model->viewwheredata(array("id" => $this->input->post("activity_id")), "mk_activity");

          $customer = $this->common_model->viewwheredata(array("id"=>$data[0]["assigned_to"] ),"mk_registration_table");

          // echo $this->db->last_query();

          $data["customer"] = $customer[0]["firstname"];

          echo json_encode($data);
     }



     public function getcustomerdata()
     {
          $data = $this->common_model->viewdata("mk_customer", "multiple");

          echo json_encode($data);
     }

     public function getLeadHistory()
     {
          $data = $this->common_model->viewwheredata(array("lead_id" => $this->input->post("lead_id")), "mk_lead_history");

          echo json_encode($data);
     }

     public function addCategory()
     {
          $data["title"] = "Add Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $this->form_validation->set_rules('category', 'Category', 'required');

          if ($this->form_validation->run() == FALSE) {
               echo json_encode(array("message" => "please enter the category field"));
          } else {
               $data = array(
                    "category" => $this->input->post("category"),
                    "is_active" => $this->input->post("status"),
                    "created_by" => $this->session->userID,
                    "created_at" => date("Y-m-d h:i:s")
               );


               if ($this->products_model->adddata("mk_master_lead_category", $data) == true) {
                    echo json_encode(array("message" => "Category Inserted Successfully"));
               }
          }
     }

     public function editCategory($id = null)
     {
          $data["title"] = "Edit Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $this->form_validation->set_rules('category', 'Category', 'required');

          if ($this->form_validation->run() == FALSE) {
               echo json_encode(array("message" => "please enter the category field"));
          } else {
               $data = array(
                    "category" => $this->input->post("category"),
                    "is_active" => $this->input->post("status"),
                    "modified_by" => $this->session->userID,
                    "modified_at" => date("Y-m-d h:i:s")
               );


               if ($this->products_model->updatedata("mk_master_lead_category", $data, array("id" => $id)) == true) {
                    echo json_encode(array("message" => "Category Updated Successfully"));
               }
          }
     }

     public function leadClose()
     {
          $data = array(
               "reason" => $this->input->post("reason"),
               "is_active" => 0
          );
          $id = $this->input->post("lead_id");

          if ($this->common_model->updatedata("mk_lead", $data, array("id" => $id))) {
               echo json_encode(array("message" => "Leads Closed Successfully"));
          }
     }

     public function leadReference()
     {
          $lead_id = $this->input->post("lead_id");
          $customer_id = $this->input->post("rcustomer_id");

          $data = array(
               "ref_1" => $this->input->post("ref1"),
               "ref_2" => $this->input->post("ref2"),
               "ref_3" => $this->input->post("ref3"),
               "ref_4" => $this->input->post("ref4"),
               "refer" => $this->input->post("refer"),
               "terms" => $this->input->post("terms"),
          );



          if ($this->common_model->updatedata("mk_customer_item", $data, array("lead_id" => $lead_id, "customer_id" => $customer_id))) {
               echo json_encode(array("message" => "Leads reference updated successfully"));
          }
     }

     public function ordersubmit()
     {
          $data = array(
               "quotation_id" => $this->input->post("qid"),
               "lead_id" => $this->input->post("lead_id"),
               "assign_to_agent" => $this->input->post("agent"),
               "assign_to_tl" => $this->input->post("teamleader"),
               "order_no" => "ORD_" . time(),
               "decision" => $this->input->post("decision"),
               "payment" => "no",
               "status" => 0,
               "approved" => $this->input->post("approved"),
          );
          $lead_id = $this->input->post("lead_id");
          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")), "mk_order");

          // print_r($data); die();

          $quotation = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")), "mk_quotation");

          $customer = $this->common_model->viewwheredata(array("customer_id" => $quotation[0]["customer_id"]), "mk_customer");

          // print_r($customer);

          if ($datacheck) {
               $data["modified_by"] = $this->session->userID;
               $data["modified_at"] = date("Y-m-d h:i:s");

               $array = array(
                    "lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")
               );
               if ($this->common_model->updatedata("mk_order", $data, $array)) {
                    $this->session->set_flashdata('message_name', 'Order Data Updated');

                    $leadwhere = array(
                         "id" => $this->input->post("lead_id"),
                    );

                    $leadupdate = array(
                         "journey" => "Complete",
                    );

                    $this->common_model->updatedata("mk_lead",$leadupdate,$leadwhere);

                    if ($this->email_template_1($customer[0]["email"])) {
                         echo $customer[0]["mobile"];
                         $sms = $this->sms_template_1($customer[0]["name"], $customer[0]["mobile"]);
                         echo $sms;
                         echo json_encode(array("message" => "Data and mail sent successfully"));
                    } else {
                         echo json_encode(array("message" => "Mail not sent"));
                    }
                    // return redirect("/dashboard/leads/assign/".$lead_id);
               }
          } else {
               $data["created_by"] = $this->session->userID;
               $data["created_at"] = date("Y-m-d h:i:s");
               if ($this->common_model->adddata("mk_order", $data)) {

                    $leadwhere = array(
                         "id" => $this->input->post("lead_id"),
                    );

                    $leadupdate = array(
                         "journey" => "Complete",
                    );

                    $this->common_model->updatedata("mk_lead",$leadupdate,$leadwhere);

                    if($this->email_template_1($customer[0]["email"]))
                    {
                         echo $customer[0]["mobile"];
                         $sms = $this->sms_template_1($customer[0]["name"], $customer[0]["mobile"]);
                         echo $sms;
                         echo json_encode(array("message" => "Data and mail sent successfully"));
                    }
                    else
                    {
                         echo json_encode(array("message" => "Mail not sent"));
                    }
                    $this->session->set_flashdata('message_name', 'Order Data Added');
                    // return redirect("/dashboard/leads/assign/".$lead_id);
               }
          }
     }

     public function orderdoc()
     {
          $filename1 = $_FILES["userfile"]["name"];
          $temp1 = $_FILES["userfile"]["tmp_name"];

          $filename2 = $_FILES["userfile2"]["name"];
          $temp2 = $_FILES["userfile2"]["tmp_name"];


          $data = array(
               "document1" => $filename1,
               "document2" => $filename2,
               "order_id" => $this->input->post("order_id"),
               "created_by" => $this->session->userID,
               "created_at" => date("Y-m-d h:i:s")
          );

          // echo $_FILES["userfile"]["size"]; die();
          if ($_FILES["userfile"]["size"] <= 2000000) {

               if (move_uploaded_file($temp1, "./uploads/order_docs/" . $filename1) && move_uploaded_file($temp2, "./uploads/order_docs/" . $filename2) ) {
                    if ($this->common_model->adddata("mk_order_docs", $data)) {
                         echo "Data Inserted";
                    } else {
                         echo "Not Inserted";
                    }
               } else {
                    echo "file not upload";
               }
          } else {
               echo "File size is greater";
          }
     }

     public function dowloadorderdocs()
     {
          $data = array(
               "order_id" => $this->input->post("order_id")
          );

          $result = $this->common_model->viewwheredata($data, "mk_order_docs");

          // echo $this->db->last_query();

          echo json_encode($result);
     }

     public function existcustomer()
     {
          if ($this->input->post("action") == "mobile") {
               $data = array(
                    "mobile" => $this->input->post("userdata")
               );
          }


          if ($this->input->post("action") == "email") {
               $data = array(
                    "email" => $this->input->post("userdata")
               );
          }


          $datacheck = $this->common_model->viewwheredata($data, "mk_customer");

          if ($datacheck) {
               echo json_encode(array("error" => "Customer Data already exists"));
          } else {
               // echo json_encode(array("success"=>"Customer Data Available"));
          }
     }

     

     public function email_template_1($customer_email = "",$attachement="")
     {
          
         
          // $message = $this->load->view("dashboard/email_templates/order_email");

          // $this->email->from('ravi@medikart.co.in', 'Your Name');
          // $this->email->to($customer_email);
          // // $this->email->cc('another@another-example.com');
          // // $this->email->bcc('them@their-example.com');

          // $this->email->subject('Thanks for the order');
          // $this->email->message($message);

          // $this->email->send();

          $to = $customer_email;
          $subject = "Order Mail Confirmation";

          $message = '
          <!DOCTYPE html>
          <html lang="en">

          <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>Order Email</title>
          </head>

          <body>
               <h5>Thank you for contacting Medikart Healthcare for enquiring the product</h5>
               
               <p>Dear Customer</p>
               <p>
                    As per our call record, your query has been resolved and solution has been provided by our representative.
               </p>
               <p>
                    In case of further details, resolution of your queries, you may write us at info@medikart.co.in or call
                    At +919811957360 Or WhatsApp Chat on the same No. - We would reply and resolve your queries within 48 hours.

               </p>
               <p>
                    Regards
               </p>
               <p>
                    MediKart
               </p>
              


          </body>

          </html>
          ';

          // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <manoj@medikart.co.in>' . "\r\n";
          // $headers .= 'Cc: myboss@example.com' . "\r\n";

          if (mail($to, $subject, $message, $headers)) {
               return true;
          } else {
               return false;
          }

          // die();
     }

     public function email_template_2($customer_email = "",$attachement)
     {

          $to = $customer_email;
          $subject = "Query Mail";

          $link = "";
          if($attachement)
          {
               $link = "
               <p>
               Here we have attach your quotation link. click this link to view your quotation
               <a href='$attachement'>Quotation</a>
               </p>";
          }

          $message = '
          <!DOCTYPE html>
          <html lang="en">
          
          <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>cofirmation Email</title>
          </head>
          
          <body>
               <h5>Dear Customer</h5>
               <p>
                    We would like to thank you for your order and giving us an opportunity to serve you.
               </p>
               <p>
                    As per our record, your order would be dispatched soon and the intimation of the same would be sent to you, either by call or Email.
               </p>
               <p>
                    Our team is working on the reconciliation of Payments, against this order, you will soon hear from us.
               </p>
               <p>
                    In case of further details, resolution of your queries, You may write us at ravi@medikart.co.in Or Call at +91-7290033617 Or
                     WhatsApp Chat on the same No.- we would reply and resolve your queries at the earliest
               </p>
               '.$link.'
               <p>
                    For Escalation: Email at varun.vaidya@medikart.co.in
               </p>
               <p>
                    Regards
               </p>
               <p>
                    MediKart
               </p>
          </body>
          
          </html>
          ';

          // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <manoj@medikart.co.in>' . "\r\n";
          // $headers .= 'Cc: myboss@example.com' . "\r\n";

          if (mail($to, $subject, $message, $headers)) {
               return true;
          } else {
               return false;
          }
     }

     public function email_template_3($customer_email = "")
     {
          $to = $customer_email;
          $subject = "Query Mail";


          $message = '
          <!DOCTYPE html>
          <html lang="en">

          <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>cofirmation Email</title>
          </head>

          <body>
               <h5>Dear Customer</h5>
               <p>
                    We would like to thank you for your order and giving us an opportunity to serve you.
               </p>
               <p>
                    As per our record, your order would be dispatched soon and the intimation of the same would be sent to you, either by call or Email.
               </p>
               <p>
                    Our team is working on the reconciliation of Payments, against this order, you will soon hear from us.
               </p>
               <p>
                    In case of further details, resolution of your queries, You may write us at ravi@medikart.co.in Or Call at +91-7290033617 Or
                    WhatsApp Chat on the same No.- we would reply and resolve your queries at the earliest
               </p>
               <p>
                    For Escalation: Email at varun.vaidya@medikart.co.in
               </p>
               <p>
                    Regards
               </p>
               <p>
                    MediKart
               </p>
          </body>

          </html>
          ';
          // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <manoj@medikart.co.in>' . "\r\n";
          // $headers .= 'Cc: myboss@example.com' . "\r\n";

          if (mail($to, $subject, $message, $headers)) {
               return true;
          } else {
               return false;
          }
     }

     public function sms_template_1($customer = "", $mobile = "", $order = "")
     {
          // $order = "Dear {#var#} Thanks for contacting Medikart, and enquiry for Medical Devices/ Service . Our representative has spoken to you ,hope the query resolved and got the appropriate reply. If not ,you can email at info@medikart.co.in";

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20".$customer."%20Thanks%20for%20contacting%20Medikart,%20and%20enquiry%20for%20Medical%20Devices/%20Service%20.%20Our%20representative%20has%20spoken%20to%20you%20,hope%20the%20query%20resolved%20and%20got%20the%20appropriate%20reply.%20If%20not%20,you%20can%20email%20at%20info@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";
          

          // echo $url;

          $url_one = $url;
          $url_two = "";

          $user_agent = 'Mozilla HotFox 1.0';

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url_one . $url_two);
          curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_NOBODY, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 30);
          $res = curl_exec($ch);
          curl_close($ch);

          echo $res;
     }

     public function sms_template_2($customer = "", $order = "", $mobile = "")
     {

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20".$customer."%20Thanks%20for%20your%20order%20for%20".$order."%20Your%20order%20has%20been%20punched%20in%20our%20system%20The%20status%20of%20dispatch%20will%20be%20intimated%20to%20you%20soon%20If%20you%20dont%20receive%20any%20intimation%20,%20Please%20email%20at%20.%20customercare@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";

          // echo $url;

          $url_one = $url;
          $url_two = "";

          $user_agent = 'Mozilla HotFox 1.0';

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url_one . $url_two);
          curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_NOBODY, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 30);
          $res = curl_exec($ch);
          curl_close($ch);

          // echo $res;
     }

     public function sendmail()
     {
          $cust_id = $this->input->post("customer");

          $lead_id = $this->input->post("lead_id");

         $customer = $this->common_model->viewwheredata(array("customer_id"=>$cust_id),"mk_customer");

          // print_r($customer);
          $attachement = base_url()."dashboard/quotation/".$lead_id."/".$cust_id;
          
         if($this->email_template_2($customer[0]["email"],$attachement))
         {
              echo $customer[0]["email"]." Mail sent successfully";
         }
         else
         {
          echo "Mail not sent";
         }

     }

     public function ordermail()
     {
          $cust_id = $this->input->post("customer");

          $lead_id = $this->input->post("lead_id");

          

         $customer = $this->common_model->viewwheredata(array("customer_id"=>$cust_id),"mk_customer");

          // print_r($customer);
         if($this->email_template_1($customer[0]["email"]))
         {
              echo "Mail sent successfully";
         }
         else
         {
          echo "Mail not sent";
         }

     }

}
