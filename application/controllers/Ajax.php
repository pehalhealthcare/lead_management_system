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
                              // "lead_id" => $this->input->post("lead_id"),
                              "customer_id" => $insertaddress["customer_id"]
                         );
               
                         $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");
               
                         if (empty($datacheck)) {
                              if ($this->common_model->adddata("mk_lead_customer", $insertleaddata)) {
                                   $historydata = array(
                                        "actions"=>"Customer added for lead",
                                        "lead_id"=>$this->input->post("lead_id"),
                                        "created_by"=>$this->session->userID,
                                        "created_at"=>date("Y-m-d h:i:s")
                                   );
                                   $this->common_model->adddata("mk_lead_history",$historydata);
                                   echo json_encode(array("message" => "data Inserted"));
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

               // $wherecond = array("lead_id"=>$this->input->post("lead_id"));

              if($this->common_model->updatedata("mk_customer",$insertdata,$wherecon))
              {
                    $whereData = array(
                         "customer_id" => $customercheck[0]["customer_id"],
                         "lead_id"=>$this->input->post("lead_id")
                    );
                    if($this->common_model->updatedata("mk_customer_address",$insertaddress,$wherecon))
                    {
                         

                         $datacheck = $this->common_model->viewwheredata($whereData, "mk_lead_customer");

                         if(empty($datacheck))
                         {
                                  if($this->common_model->adddata("mk_lead_customer",$insertleaddata))
                                  {
                                   $historydata = array(
                                        "actions"=>"customer details updated for lead",
                                        "lead_id"=>$this->input->post("lead_id"),
                                        "created_by"=>$this->session->userID,
                                        "created_at"=>date("Y-m-d h:i:s")
                                   );
                                   $this->common_model->adddata("mk_lead_history",$historydata);
                                    echo json_encode(array("message" => "Data Updated Successfully"));
                                  }
                         }
                         else
                         {
                              // if($this->common_model->updatedata("mk_lead_customer",$insertleaddata,$wherecond))
                              // {
                              //      echo json_encode(array("message" => "Data Updated Successfully"));
                              // }
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

          $cond = array("product_id" => $product_id,"is_active"=>1,"lead_id"=>$this->input->post("lead_id"));

          $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");

          $data["item_new"] = $this->common_model->viewwheredata(array("product_id" => $product_id,"is_active"=>1), "mk_master_product_item");

         
          echo json_encode($data);

          

         
     }

     public function getServiceItem()
     {
          $service_id = $this->input->post("service_id");

          $cond = array("service_id" => $service_id,"is_active"=>1,"lead_id"=>$this->input->post("lead_id"));

          $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");

          $data["item_new"] = $this->common_model->viewwheredata(array("service_id" => $service_id,"is_active"=>1), "mk_master_service_item");
         
          echo json_encode($data);


         
     }

     public function getCustomerItem()
     {
          $lead_id = $this->input->post("lead_id");

          $cond = array("is_active"=>1,"lead_id"=>$lead_id);

          $data["customer_item"] = $this->common_model->viewwheredata($cond, "mk_customer_item");

          $data["product_item"] = $this->common_model->viewwheredata(array("is_active"=>1), "mk_master_product_item");

          $data["service_item"] = $this->common_model->viewwheredata(array("is_active"=>1), "mk_master_service_item");

         
          echo json_encode($data);
     }

     public function getcustomer()
     {
          $id = $this->input->post("id");

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id"=>$id),"mk_customer");

          $data["address"] = $this->common_model->viewwheredata(array("customer_id"=>$id),"mk_customer_address");

          echo json_encode($data);
     }

     public function getTerms()
     {
          $id = $this->input->post("customer_id");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term","multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id"=>$id,"is_active"=>"1"),"mk_customer_term");

          echo json_encode($data);
     }

     public function submitCustomerTerm()
     {
         $cond = array("customer_id"=>$this->input->post("customer_id"),
         "term_id"=>$this->input->post("term_id"));

          $data["customer_term"] = $this->common_model->viewwheredata($cond,"mk_customer_term");


          // print_r($data); die();

          if(empty($data["customer_term"]))
          {
               $insertdata = array(
                    "customer_id"=>$this->input->post("customer_id"),
                    "term_id"=>$this->input->post("term_id"),
                    "is_active"=>$this->input->post("is_active"),
                    "created_at"=>date("Y-m-d h:i:s"),
                    "created_by"=>$this->session->userID
               );

               if($this->common_model->adddata("mk_customer_term",$insertdata))
               {
                    $historydata = array(
                         "actions"=>"Customer terms added for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo json_encode(array("message"=>"Data Inserted Successfully"));
               }
               else
               {
                    echo json_encode(array("message"=>"Data Not Inserted Successfully"));
               }
          }
          else
          {
               $insertdata = array(
                    "customer_id"=>$this->input->post("customer_id"),
                    "term_id"=>$this->input->post("term_id"),
                    "is_active"=>$this->input->post("is_active"),
                    "modified_at"=>date("Y-m-d h:i:s"),
                    "modified_by"=>$this->session->userID
               );
               $condition = array(
                    "customer_id"=>$this->input->post("customer_id"),
                    "term_id"=>$this->input->post("term_id")
               );
               if($this->common_model->updatedata("mk_customer_term",$insertdata,$condition))
               {
                    $historydata = array(
                         "actions"=>"customer terms updated for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo json_encode(array("message"=>"Data Updated Successfully"));
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
                         "selling_price"=>$this->input->post("selling_price")[$i],
                         "tax_rate" => $this->input->post("tax_rate")[$i],
                         "tax_amount" => $this->input->post("tax_amount")[$i],
                         "total_price" => $this->input->post("total_price")[$i],
                         // "total_amount" => $this->input->post("total_amount"),
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

                    

                    if (count($datacheck)==0) {
                         if ($this->common_model->adddata("mk_customer_item", $insertdata)) {
                              $historydata = array(
                                   "actions"=>"Product items added for lead",
                                   "lead_id"=>$this->input->post("lead_id"),
                                   "created_by"=>$this->session->userID,
                                   "created_at"=>date("Y-m-d h:i:s")
                              );
                              $this->common_model->adddata("mk_lead_history",$historydata);
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
                              $historydata = array(
                                   "actions"=>"Product items updated for lead",
                                   "lead_id"=>$this->input->post("lead_id"),
                                   "created_by"=>$this->session->userID,
                                   "created_at"=>date("Y-m-d h:i:s")
                              );
                              $this->common_model->adddata("mk_lead_history",$historydata);
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
               "selling_unit_price"=>$this->input->post("selling_unit_price"),
               "selling_price"=>$this->input->post("selling_price"),
               "tax_rate" => $this->input->post("tax_rate"),
               "tax_amount" => $this->input->post("tax_amount"),
               "total_tax_amount"=>$this->input->post("total_tax_amount"),
               "total_price_wo_tax"=>$this->input->post("total_price_wo_tax"),
               "total_price" => $this->input->post("total_price"),
               "created_at" => date("Y-m-d h:i:s"),
               "created_by" => $this->session->userID,
               "lead_id"=>$this->input->post("lead_id"),
               "product_id"=>$this->input->post("product_id"),
               "service_id"=>$this->input->post("service_id")
               
          );

          if($this->input->post("product_id"))
          {
               $cols = array(
                    "product_id" => $this->input->post("product_id"),
                    "customer_id" => $this->input->post("pcustomer_id"),
                    "item_id" => $this->input->post("item_id"),
                    "lead_id"=>$this->input->post("lead_id")
               );
     
          }

          if($this->input->post("service_id"))
          {
               $cols = array(
                    "service_id" => $this->input->post("service_id"),
                    "customer_id" => $this->input->post("pcustomer_id"),
                    "item_id" => $this->input->post("item_id"),
                    "lead_id"=>$this->input->post("lead_id")
               );
          }

          
          $datacheck = $this->common_model->viewwheredata($cols, "mk_customer_item");

          if(empty($datacheck))
          {
               $insertdata["is_active"] = $this->input->post("is_active");
               if ($this->common_model->adddata("mk_customer_item", $insertdata)) {
                    $historydata = array(
                         "actions"=>"Product item added for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo json_encode(array("message" => "Data added Successfully"));
               } else {
                    echo json_encode(array("message" => "Data Not added Successfully"));
               }
          }
          else
          {
               $insertdata["is_active"] = $this->input->post("is_active");
               $condition = array(
                    "customer_id" => $this->input->post("pcustomer_id"),
                    "item_id" => $this->input->post("item_id"),
                    "lead_id"=>$this->input->post("lead_id")
               );
               if ($this->common_model->updatedata("mk_customer_item", $insertdata, $condition)) {
                    $historydata = array(
                         "actions"=>"Product item updated for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo json_encode(array("message" => "Data updated Successfully"));
               }
          }

         
     }

     public function activityMeeting()
     {
        $data = array(
          "lead_id"=>$this->input->post("lead_id"),
          "assigned_to"=>$this->input->post("assigned_to"),
          "activity_master_id"=>$this->input->post("mactivity_id"),
          "subject"=>$this->input->post("subject"),
          "status"=>$this->input->post("status"),
          "related_to"=>$this->input->post("related_to"),
          "start_date_time"=>$this->input->post("fromdate"),
          "end_date_time"=>$this->input->post("todate"),
          "location"=>$this->input->post("location"),
          "reminder"=>$this->input->post("reminder"),
          "description"=>$this->input->post("description"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
        );

        $this->form_validation->set_rules("subject","Subject","required");

        if($this->form_validation->run()==true)
        {
               if($this->common_model->adddata("mk_activity",$data))
               {
                    $historydata = array(
                         "actions"=>"schedule meeting created for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data Inserted successfully";
               }
        }
     }

     public function updateMeeting()
     {
        $id=$this->input->post("mactivity_id");
        $data = array(
          "lead_id"=>$this->input->post("lead_id"),
          "assigned_to"=>$this->input->post("assigned_to"),
          "activity_master_id"=>$this->input->post("mactivity_id"),
          "subject"=>$this->input->post("subject"),
          "status"=>$this->input->post("status"),
          "related_to"=>$this->input->post("related_to"),
          "start_date_time"=>$this->input->post("fromdate"),
          "end_date_time"=>$this->input->post("todate"),
          "location"=>$this->input->post("location"),
          "reminder"=>$this->input->post("reminder"),
          "description"=>$this->input->post("description"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
        );

        $this->form_validation->set_rules("subject","Subject","required");

        if($this->form_validation->run()==true)
        {
               if($this->common_model->updatedata("mk_activity",$data,array("id"=>$id)))
               {
                    $historydata = array(
                         "actions"=>"schedule meeting is updated for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data updated successfully";
               }
        }
     }

     public function logCall()
     {
        $data = array(
          "lead_id"=>$this->input->post("lead_id"),
          "assigned_to"=>$this->input->post("assigned_to"),
          "activity_master_id"=>$this->input->post("lactivity_id"),
          "subject"=>$this->input->post("subject"),
          "direction"=>$this->input->post("direction"),
          "status"=>$this->input->post("status"),
          "related_to"=>$this->input->post("related_to"),
          "communication_preferred"=>$this->input->post("communication"),
          "lead_possibility"=>$this->input->post("lead_possibility"),
          "start_date_time"=>$this->input->post("fromdate"),
          // "end_date_time"=>$this->input->post("todate"),
          // "location"=>$this->input->post("location"),
          "reminder"=>$this->input->post("reminder"),
          "description"=>$this->input->post("description"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
        );
        
         $this->form_validation->set_rules("subject","Subject","required");

        if($this->form_validation->run()==true)
        {
               if($this->common_model->adddata("mk_activity",$data))
               {
                    $historydata = array(
                         "actions"=>"Log call created for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data Inserted successfully";
               }
        }
     }

     public function updatelogCall()
     {
        $id=$this->input->post("lactivity_id");
        $data = array(
          "lead_id"=>$this->input->post("lead_id"),
          "assigned_to"=>$this->input->post("assigned_to"),
          "subject"=>$this->input->post("subject"),
          "direction"=>$this->input->post("direction"),
          "status"=>$this->input->post("status"),
          "related_to"=>$this->input->post("related_to"),
          "communication_preferred"=>$this->input->post("communication"),
          "lead_possibility"=>$this->input->post("lead_possibility"),
          "start_date_time"=>$this->input->post("fromdate"),
          // "end_date_time"=>$this->input->post("todate"),
          // "location"=>$this->input->post("location"),
          "reminder"=>$this->input->post("reminder"),
          "description"=>$this->input->post("description"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
        );
        
         $this->form_validation->set_rules("subject","Subject","required");

        if($this->form_validation->run()==true)
        {
               if($this->common_model->updatedata("mk_activity",$data,array("id"=>$id)))
               {
                    $historydata = array(
                         "actions"=>"Log call is updated for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data Updated successfully";
               }
        }
     }

     public function composeMail()
     {
          // print_r($_POST); die();
        $data = array(
          "from_add"=>$this->input->post("from_address"),
          "to_add"=>$this->input->post("to_address"),
          "cc"=>$this->input->post("cc_address"),
          "bcc"=>$this->input->post("bcc_address"),
          "lead_id"=>$this->input->post("lead_id"),
          "assigned_to"=>$this->input->post("assigned_to"),
          "activity_master_id"=>$this->input->post("cactivity_id"),
          "subject"=>$this->input->post("subject"),
          "related_to"=>$this->input->post("related_to"),
          "body"=>$this->input->post("body"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
        );

     //    print_r($data); die();

         $this->form_validation->set_rules("subject","Subject","required");
         $this->form_validation->set_rules("to_address","To Address","required");
         $this->form_validation->set_rules("from_address","From Address","required");

        if($this->form_validation->run()==true)
        {
               if($this->common_model->adddata("mk_activity",$data))
               {
                    $this->email->to($this->input->post("to_address"));
                    $this->email->from('onlineguruweb@gmail.com');
                    $this->email->subject('Here is your info '.$this->input->post("subject"));
                    $this->email->message('Hi '.$this->input->post("subject").' Here is the info you requested.');
                    if($this->email->send())
                    {
                         $historydata = array(
                              "actions"=>"Mail has been sent for the lead",
                              "lead_id"=>$this->input->post("lead_id"),
                              "created_by"=>$this->session->userID,
                              "created_at"=>date("Y-m-d h:i:s")
                         );
                         $this->common_model->adddata("mk_lead_history",$historydata);
                         echo "Data Inserted successfully";
                    }
                    else
                    {
                         echo "Data Inserted successfully";
                    }
                   
               }
        }
     }

     public function opportunity()
     {
          $data = array(
               "opportunity_name"=>$this->input->post("opportunity_name"),
               "expected_amount"=>$this->input->post("exp_amount"),
               "expected_date"=>$this->input->post("exp_date"),
               "status"=>$this->input->post("status"),
               "remarks"=>$this->input->post("remarks"),
               "lead_id"=>$this->input->post("lead_id"),
               "is_active"=>1,
               "created_at"=>date("Y-m-d h:i:s"),
               "created_by"=>$this->session->userID,
          );

          $this->form_validation->set_rules("exp_amount","Expected Amount","required");
          $this->form_validation->set_rules("exp_date","Expected Date","required");

          if($this->form_validation->run()==true)
          {
               if($this->common_model->adddata("mk_opportunity",$data))
               {
                    $historydata = array(
                         "actions"=>"opportunity created for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data Inserted Successfully";
               }
          }
     }

     public function edit_opportunity()
     {
          $id = $this->input->post("opportunity_id");
          $data = array(
               "opportunity_name"=>$this->input->post("opportunity_name"),
               "expected_amount"=>$this->input->post("exp_amount"),
               "expected_date"=>$this->input->post("exp_date"),
               "status"=>$this->input->post("status"),
               "remarks"=>$this->input->post("remarks"),
               "lead_id"=>$this->input->post("lead_id"),
               "is_active"=>1,
               "created_at"=>date("Y-m-d h:i:s"),
               "created_by"=>$this->session->userID,
          );

          $this->form_validation->set_rules("exp_amount","Expected Amount","required");
          $this->form_validation->set_rules("exp_date","Expected Date","required");

          if($this->form_validation->run()==true)
          {
               if($this->common_model->updatedata("mk_opportunity",$data,array("id"=>$id)))
               {
                    $historydata = array(
                         "actions"=>"opportunity updated for lead",
                         "lead_id"=>$this->input->post("lead_id"),
                         "created_by"=>$this->session->userID,
                         "created_at"=>date("Y-m-d h:i:s")
                    );
                    $this->common_model->adddata("mk_lead_history",$historydata);
                    echo "Data Updated Successfully";
               }
          }
     }

     public function getActivity()
     {
          $data = $this->common_model->viewwheredata(array("lead_id"=>$this->input->post("lead_id"),"is_active"=>1), "mk_activity");

          echo json_encode($data);
     }


     public function getMeeting()
     {
          $data = $this->common_model->viewwheredata(array("id"=>$this->input->post("activity_id")), "mk_activity");

          echo json_encode($data);
     }

     public function getLogCall()
     {
          $data = $this->common_model->viewwheredata(array("id"=>$this->input->post("activity_id")), "mk_activity");

          echo json_encode($data);
     }



     public function getcustomerdata()
     {
          $data = $this->common_model->viewdata("mk_customer", "multiple");

          echo json_encode($data);
     }

     public function getLeadHistory()
     {
          $data = $this->common_model->viewwheredata(array("lead_id"=>$this->input->post("lead_id")), "mk_lead_history");

          echo json_encode($data);
     }

     public function addCategory()
     {
          $data["title"] = "Add Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $this->form_validation->set_rules('category', 'Category', 'required');

          if ($this->form_validation->run() == FALSE) {
               echo json_encode(array("message"=>"please enter the category field"));
          } 
          else {
                    $data = array(
                         "category" => $this->input->post("category"),
                         "is_active"=>$this->input->post("status"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->adddata("mk_master_lead_category", $data) == true) {
                         echo json_encode(array("message"=>"Category Inserted Successfully"));
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
               echo json_encode(array("message"=>"please enter the category field"));
          } 
          else {
                    $data = array(
                         "category" => $this->input->post("category"),
                         "is_active"=>$this->input->post("status"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->updatedata("mk_master_lead_category", $data,array("id"=>$id)) == true) {
                       echo json_encode(array("message"=>"Category Updated Successfully"));
                    }
              
          }
     }

     public function leadClose()
     {
          $data = array(
               "reason"=>$this->input->post("reason"),
               "is_active"=>0
          );
          $id = $this->input->post("lead_id");

          if($this->common_model->updatedata("mk_lead",$data,array("id"=>$id)))
          {
               echo json_encode(array("message"=>"Leads Closed Successfully"));
          }
     }
}
