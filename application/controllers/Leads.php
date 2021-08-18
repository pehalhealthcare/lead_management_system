<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }


     public function add()
     {
          $data["title"] = "Dashboard | Create Leads";

          $data["agents"] = $this->user_model->user_list();

          $data["customers"] = $this->common_model->viewdata("mk_customer", "multiple");

          $insertdata = array();


          $customerdata = array(
               "name" => $this->input->post("name"),
               "email" => $this->input->post("email"),
               "mobile" => $this->input->post("mobile"),
          );

          $customer_count = $this->common_model->viewwheredata(array("email" => $this->input->post("email")), "mk_customer");

          $this->form_validation->set_rules('assigned_to', 'Assignee', 'required');


          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/leads/add-leads');
               $this->load->view("inc/footer");
          } else {
               $config['upload_path']          = './uploads/lead_image/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';

               $this->load->library('upload');

               $j = 0;
               if ($_FILES['image_name']['name']) {
                    $image = array();
                    $count = count($_FILES['image_name']['name']);
                    for ($i = 0; $i <= $count; $i++) {
                         $j++;
                         $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
                         $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
                         $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
                         $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
                         $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

                         $insertdata = array(
                              "lead_source" => $this->input->post("lead_source"),
                              "category" => $this->input->post("category"),
                              "assigned_to" => $this->input->post("assigned_to"),
                              "assigned_by" => $this->session->userID,
                              "name" => $this->input->post("name"),
                              "email" => $this->input->post("email"),
                              "mobile" => $this->input->post("mobile"),
                              "created_by" => $this->session->userID,
                              "created_at" => date("Y-m-d l:i:s")
                         );

                         // File upload configuration
                         $uploadPath = './uploads/lead_image/';
                         $config['upload_path'] = $uploadPath;
                         $config['allowed_types'] = 'jpg|jpeg|png|gif';

                         // Load and initialize upload library
                         $this->load->library('upload', $config);
                         $this->upload->initialize($config);

                         // Upload file to server
                         if ($this->upload->do_upload('file')) {
                              // Uploaded file data
                              $imageData = $this->upload->data();
                              $uploadImgData[$i]['image_name'] = $imageData['file_name'];
                              $insertdata["lead_image"] = $uploadImgData[$i]["image_name"];
                              if ($this->common_model->adddata("mk_lead", $insertdata)) {

                                   if ($j == $count) {

                                        if (count($customer_count) > 0) {
                                             $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                                             $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                                             $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                                             if ($customerlead) {
                                                  // $this->session->set_flashdata('message_name', 'Customer Data Not Inserted');
                                                  // return redirect("dashboard/leads");
                                             } else {
                                                  $leadcustomer = array(
                                                       "lead_id" => $lead_id[0]->id,
                                                       "customer_id" => $customer_id[0]->customer_id,
                                                       "created_by" => $this->session->userID,
                                                       "created_at" => date("Y-m-d h:i:s")
                                                  );

                                                  $insertnote = array(
                                                       "action_to" => $this->input->post("assigned_to"),
                                                       "action_by" => $this->session->userID,
                                                       "action_id" => time(),
                                                       "action" => "New Lead assigned to you",
                                                       "is_read" => 0

                                                  );

                                                  $this->common_model->adddata("mk_notifications", $insertnote);

                                                  $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                                                  $this->session->set_flashdata('message_name', 'Lead and Customer Data Inserted');
                                                  return redirect("dashboard/leads");
                                             }
                                        } else {

                                             if ($this->common_model->adddata("mk_customer", $customerdata)) {
                                                  $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                                                  $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                                                  $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                                                  if ($customerlead) {
                                                  } else {
                                                       $leadcustomer = array(
                                                            "lead_id" => $lead_id[0]->id,
                                                            "customer_id" => $customer_id[0]->customer_id,
                                                            "created_by" => $this->session->userID,
                                                            "created_at" => date("Y-m-d h:i:s")
                                                       );

                                                       $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                                                  }

                                                  $insertnote = array(
                                                       "action_to" => $this->input->post("assigned_to"),
                                                       "action_by" => $this->session->userID,
                                                       "action_id" => time(),
                                                       "action" => "New Lead assigned to you",
                                                       "is_read" => 0

                                                  );

                                                  $this->common_model->adddata("mk_notifications", $insertnote);

                                                  $this->session->set_flashdata('message_name', 'Lead and Customer Data Inserted');
                                                  return redirect("dashboard/leads");
                                             }
                                        }
                                   }
                              }
                         } else {
                              $insertdata = array(
                                   "lead_source" => $this->input->post("lead_source"),
                                   "category" => $this->input->post("category"),
                                   "assigned_to" => $this->input->post("assigned_to"),
                                   "assigned_by" => $this->session->userID,
                                   "name" => $this->input->post("name"),
                                   "email" => $this->input->post("email"),
                                   "mobile" => $this->input->post("mobile"),
                                   "created_by" => $this->session->userID,
                                   "created_at" => date("Y-m-d l:i:s")
                              );
                              // echo 'No data';
                              $this->common_model->adddata("mk_lead", $insertdata);
                              if (count($customer_count) > 0) {
                                   $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                                   $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                                   $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                                   if ($customerlead) {
                                   } else {
                                        $leadcustomer = array(
                                             "lead_id" => $lead_id[0]->id,
                                             "customer_id" => $customer_id[0]->customer_id,
                                             "created_by" => $this->session->userID,
                                             "created_at" => date("Y-m-d h:i:s")
                                        );

                                        $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                                   }

                                   $insertnote = array(
                                        "action_to" => $this->input->post("assigned_to"),
                                        "action_by" => $this->session->userID,
                                        "action_id" => time(),
                                        "action" => "New Lead assigned to you",
                                        "is_read" => 0

                                   );

                                   $this->common_model->adddata("mk_notifications", $insertnote);

                                   $this->session->set_flashdata('message_name', 'Customer Data Not Inserted');
                                   return redirect("dashboard/leads");
                              } else {
                                   if ($this->common_model->adddata("mk_customer", $customerdata)) {
                                        $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                                        $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                                        $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                                        if ($customerlead) {
                                        } else {
                                             $leadcustomer = array(
                                                  "lead_id" => $lead_id[0]->id,
                                                  "customer_id" => $customer_id[0]->customer_id,
                                                  "created_by" => $this->session->userID,
                                                  "created_at" => date("Y-m-d h:i:s")
                                             );

                                             $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                                        }

                                        $insertnote = array(
                                             "action_to" => $this->input->post("assigned_to"),
                                             "action_by" => $this->session->userID,
                                             "action_id" => time(),
                                             "action" => "New Lead assigned to you",
                                             "is_read" => 0

                                        );

                                        $this->common_model->adddata("mk_notifications", $insertnote);

                                        $this->session->set_flashdata('message_name', 'Lead and Customer Data Inserted');
                                        return redirect("dashboard/leads");
                                   }
                              }
                         }
                    }
               } else {
                    $insertdata = array(
                         "lead_source" => $this->input->post("lead_source"),
                         "category" => $this->input->post("category"),
                         "assigned_to" => $this->input->post("assigned_to"),
                         "assigned_by" => $this->session->userID,
                         "name" => $this->input->post("name"),
                         "email" => $this->input->post("email"),
                         "mobile" => $this->input->post("mobile"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d l:i:s")
                    );

                    // echo 'No data';
                    $this->common_model->adddata("mk_lead", $insertdata);

                    if (count($customer_count) > 0) {
                         $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                         $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                         $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                         if ($customerlead) {
                         } else {
                              $leadcustomer = array(
                                   "lead_id" => $lead_id[0]->id,
                                   "customer_id" => $customer_id[0]->customer_id,
                                   "created_by" => $this->session->userID,
                                   "created_at" => date("Y-m-d h:i:s")
                              );

                              $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                         }
                    } else {

                         if ($this->common_model->adddata("mk_customer", $customerdata)) {
                              $customer_id = ($this->common_model->lastinsert_id("mk_customer", "customer_id"));
                              $lead_id = $this->common_model->lastinsert_id("mk_lead", "id");

                              $customerlead = $this->common_model->viewwheredata(array("lead_id" => $lead_id[0]->id, "customer_id" => $customer_id[0]->customer_id), "mk_lead_customer");
                              if ($customerlead) {
                              } else {
                                   $leadcustomer = array(
                                        "lead_id" => $lead_id[0]->id,
                                        "customer_id" => $customer_id[0]->customer_id,
                                        "created_by" => $this->session->userID,
                                        "created_at" => date("Y-m-d h:i:s")
                                   );

                                   $this->common_model->adddata("mk_lead_customer", $leadcustomer);
                              }
                         }
                    }

                    $this->session->set_flashdata('message_name', 'Lead Data Not Inserted');
                    return redirect("dashboard/leads");
               }
          }
     }



     public function viewdata()
     {
          $data["title"] = "Dashboard | Leads";
          $this->load->view("inc/header", $data);

          // print_r($data["leads"]); return;
          if ($this->session->category == "OA" || $this->session->category == "BA") {
               $data["leads"] = $this->common_model->viewwheredata(array("assigned_to" => $this->session->userID), "mk_lead");
               $this->load->view("dashboard/leads/view-leads-agent", $data);
          }
          else if($this->session->category == "BTL")
          {
               $data["leads"] = $this->common_model->viewwheredata(array("assigned_by" => $this->session->userID), "mk_lead");
               $this->load->view("dashboard/leads/view-leads-agent", $data);
          }
          else {
               $data["leads"] = $this->common_model->vieworderby("mk_lead", "multiple", "id", "desc");
               $this->load->view("dashboard/leads/view-leads", $data);
          }

          $this->load->view("inc/footer");
          //   print_r($this->session->flashdata('message_name'));
     }


     public function lead_edit($id = "")
     {
          $data["title"] = "Dashboard | Edit Leads";

          $insertdata = array(
               "lead_source" => $this->input->post("lead_source"),
               "category" => $this->input->post("category"),
               "sub_category" => ($this->input->post("sub_category_1")) ? $this->input->post("sub_category_1") : $this->input->post("sub_category_2"),
               "assigned_to" => $this->input->post("assigned_to"),
               "assigned_by" => $this->session->userID,
               "name" => $this->input->post("name"),
               "email" => $this->input->post("email"),
               "mobile" => $this->input->post("mobile"),
               "created_by" => $this->input->post("assigned_by"),
               "created_at" => date("Y-m-d l:i:s")
          );

          $customerdata = array(
               "name" => $this->input->post("name"),
               "email" => $this->input->post("email"),
               "mobile" => $this->input->post("mobile"),
          );


          // 

          $data["agents"] = $this->user_model->user_list();

          $data["customers"] = $this->common_model->viewdata("mk_customer", "multiple");

          $data["customerID"] = $this->common_model->viewwheredata(array("lead_id" => $id), "mk_lead_customer");

          // print_r($data["customerID"]); die();

          $config['upload_path']          = './uploads/lead_image/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          //  $config['max_size']             = 100;
          //  $config['max_width']            = 1024;
          //  $config['max_height']           = 768;

          $this->load->library('upload', $config);

          $data["leads"] = $this->common_model->viewwheredata(array("id" => $id), "mk_lead");



          //     $this->form_validation->set_rules('status', 'Status', 'required');
          $this->form_validation->set_rules('assigned_to', 'Assignee', 'required');


          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/leads/edit-leads', $data);
               $this->load->view("inc/footer");
          } else {
               $this->upload->do_upload();
               $id = $this->input->post("lead_id");
               $imagedata = array('upload_data' => $this->upload->data());

               if ($imagedata["upload_data"]["file_name"]) {
                    $insertdata["lead_image"] = $imagedata["upload_data"]["file_name"];
               }

               $existCustomer = $this->common_model->viewwheredata(array("email" => $this->input->post("email")), "mk_customer");

               if ($this->common_model->updatedata("mk_lead", $insertdata, array("id" => $id))) {

                    if (count($existCustomer) == 0) {
                         $this->common_model->adddata("mk_customer", $customerdata);
                    }

                    $this->session->set_flashdata('message_name', 'Lead Data Updated Succesfully');

                    return redirect("dashboard/leads");
               } else {
                    // Set flash data 
                    $this->session->set_flashdata('message_name', 'Lead Data Not Updated');
                    // echo ;
                    // print_r($insertdata); die("no condition");
                    // After that you need to used redirect function instead of load view such as 
                    return redirect("dashboard/leads");

                    if (count($existCustomer) == 0) {
                         $this->common_model->adddata("mk_customer", $customerdata);
                    }

                    // Get Flash data on view 


               }
          }
     }

     public function destroy($id)
     {
          if ($this->common_model->deletedata("mk_lead", array("id" => $id))) {
               $this->session->set_flashdata('message_name', 'Lead Data Deleted');
               return redirect("dashboard/leads");
          } else {
               $this->session->set_flashdata('message_name', 'Lead Data Not Deleted');
               return redirect("dashboard/leads");
          }
     }

     public function assign_agent($application = "")
     {
          $insertdata = array(
               "application_number" => $this->input->post("application"),
               "agent_id" =>  $this->input->post("agentID"),
               "teamleader_id" =>  $this->input->post("parentID"),
          );

          $this->form_validation->set_rules("application", "Application", "required");

          if ($this->form_validation->run() == FALSE) {
               $data["title"] = "Dashboard | Assign Leads";
               $data["application"] = $application;
               $data["agents"] = $this->user_model->user_list();
               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/leads/assign_agent", $data);
               $this->load->view("inc/footer");
          } else {

               if ($this->common_model->adddata("mk_lead_assign", $insertdata)) {
                    return redirect("dashboard/leads/quotation/" . $insertdata["application_number"] . "/" . $insertdata["agent_id"] . "/" . $insertdata["teamleader_id"]);
               } else {
                    print_r($insertdata);
               }
          }
     }

     public function assign_customer($lead_id = "")
     {

          $data["title"] = "Dashboard | Assign Leads";
          $data["lead_id"] = $lead_id;

          $data["lead_customer"] = $this->common_model->viewwheredataorderby(array("lead_id" => $lead_id), "mk_lead_customer", "id", "desc");

          // print_r($data["lead_customer"]); die();

          $data["activity"] = $this->common_model->viewdata("mk_activity_master", "multiple");

          // print_r($data["activity"]); die();

          // print_r($this->session); die();

          if($this->session->category=="BA")
          {
               
               $data["leads"] = $this->common_model->viewwheredata(array("id" => $lead_id,"assigned_to"=>$this->session->userID), "mk_lead");
          }
          if($this->session->category=="BTL")
          {
              
               $data["leads"] = $this->common_model->viewwheredata(array("id" => $lead_id,"assigned_by"=>$this->session->userID), "mk_lead");
          }
          if($this->session->role==1)
          {
              
               $data["leads"] = $this->common_model->viewwheredata(array("id" => $lead_id), "mk_lead");
          }

          $data["customer_item"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_customer_item");

          $data["opportunity"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "is_active" => 1), "mk_opportunity");

          $data["customers"] = $this->common_model->vieworderby("mk_customer", "multiple", "customer_id", "desc");

          $data["cust_address"] = $this->common_model->vieworderby("mk_customer_address", "multiple", "address_id", "desc");

          // echo "<pre>"; print_r($data["cust_address"]); die();

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");

          $data["services"] = $this->common_model->viewdata("mk_master_services", "multiple");

          $data["quotation"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_quotation");

          $data["order"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_order");

          // echo $this->db->last_query();
          // print_r($data["order"]); die();

          $data["agents"] = $this->common_model->viewwheredata(array("category" => "BA"), "mk_registration_table");

          

          
          if($data["leads"])
          {
               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/leads/assign_customer", $data);
               $this->load->view("inc/footer");
          }
          else
          {
               $this->session->set_flashdata('message_name', 'You aren"t authorize to view the lead details');
               return redirect("/dashboard/leads");
          }

     }

     public function opportunity_delete($id = "")
     {
          $data = array("is_active" => 0);

          $lead_id = $this->input->get("lead_id");



          if ($this->common_model->updatedata("mk_opportunity", $data, array("id" => $id))) {

               return redirect("dashboard/leads/assign/" . $lead_id);
          }
     }

     public function activity_delete($id = "")
     {
          $data = array("is_active" => 0);

          if ($this->common_model->updatedata("mk_activity", $data, array("id" => $id))) {
               return redirect("dashboard/leads/assign/" . $id);
          }
     }

     public function lead_quotation($application = "", $agent_id = "", $teamlead_id = "")
     {

          $insertdata = array(
               "application_number" => $this->input->post("application_number"),
               "agent_id" => $this->input->post("agent_id"),
               "teamleader_id" => $this->input->post("teamleader_id"),
               "item_name" => $this->input->post("item_name"),
               "quantity" => $this->input->post("item_quantity"),
               "item_price" => $this->input->post("item_price"),
               "item_tax" => $this->input->post("item_tax"),
               "item_tax_amount" => $this->input->post("item_tax_amount"),
               "item_total_price" => $this->input->post("item_total"),
          );

          $this->form_validation->set_rules("item_name", "Item Name", "required");
          $this->form_validation->set_rules("item_quantity", "Item Quantity", "required");
          $this->form_validation->set_rules("item_price", "Item Price", "required");

          if ($this->form_validation->run() == FALSE) {
               // echo "testing";
               $data["title"] = "Lead Quotation";
               $data["application"] = $application;
               $data["agent"] = $this->user_model->userdata($agent_id);

               $data["teamleader"] = $this->user_model->userdata($teamlead_id);
               // print_r($data["teamleader"]);
               $this->load->view("inc/header", $data);
               $this->load->view("dashboard/leads/lead_quotation", $data);
               $this->load->view("inc/footer");
          } else {
               if ($this->common_model->adddata("mk_lead_quotation", $insertdata)) {
                    $id = ($this->common_model->lastinsert_id("mk_lead_quotation", "id"));
                    return redirect("dashboard/lead/generate_pdf/" . $id[0]->id);
               }
          }
     }



     public function ordersubmit()
     {

          if ($this->input->post("payment") == "yes") {
               $approved = "yes";
          } else {
               $approved = "no";
          }
          $data = array(
               "quotation_id" => $this->input->post("qid"),
               "lead_id" => $this->input->post("lead_id"),
               "assign_to_agent" => $this->input->post("agent"),
               "assign_to_tl" => $this->input->post("teamleader"),
               "decision" => $this->input->post("decision"),
               "payment" => $this->input->post("payment"),
               "status" => 1,
               "approved" => $approved,
          );



          $lead_id = $this->input->post("lead_id");

          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")), "mk_order");

          $quotation = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")), "mk_quotation");

          // print_r($data); die();
          $customer = $this->common_model->viewwheredata(array("customer_id" => $quotation[0]["customer_id"]), "mk_customer");

          // print_r($customer); die();

          if ($datacheck) {
               $data["modified_by"] = $this->session->userID;
               $data["modified_at"] = date("Y-m-d h:i:s");

               $array = array(
                    "lead_id" => $lead_id, "quotation_id" => $this->input->post("qid")
               );



               if ($_FILES["file1"]["name"]) {

                    $target = "./uploads/order_docs/";

                    move_uploaded_file($_FILES["file1"]["tmp_name"], $target . $_FILES["file1"]["name"]);
                    move_uploaded_file($_FILES["file2"]["tmp_name"], $target . $_FILES["file2"]["name"]);

                    $filename1 = $_FILES["file1"]["name"];

                    $filename2 = $_FILES["file2"]["name"];

                    $orderdata = array(
                         "document1" => $filename1,
                         "document2" => $filename2,
                         "order_id" => $datacheck[0]["order_id"],
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );

                    $this->common_model->adddata("mk_order_docs", $orderdata);
               }

               if ($this->common_model->updatedata("mk_order", $data, $array)) {
                    // $customer[0]["mobile"]
                    if ($this->email_template_2($customer[0]["email"])) {

                         $sms = $this->sms_template_2($customer[0]["name"], $customer[0]["mobile"]);
                         echo $sms;
                         echo json_encode(array("message" => "Data and mail sent successfully"));
                    } else {
                         echo json_encode(array("message" => "Mail not sent"));
                    }

                    if ($this->session->category == "CB" || $this->session->category == "CA" || $this->session->category == "CC") {
                         $adminlog =  $this->common_model->viewwheredata(array("admin" => $this->session->userID), "mk_admin_log");

                         $insertnote = array(
                              "action_to" => $adminlog[0]["agent_id"],
                              "action_by" => $this->session->userID,
                              "action_id" => time(),
                              "action" => "Admin approve the orders",
                              "is_read" => 0

                         );

                         $this->common_model->adddata("mk_notifications", $insertnote);
                    }

                    $this->session->set_flashdata('message_name', 'Order Data Updated');
                    return redirect("dashboard/leads/assign/" . $lead_id);
               }
          } else {
               $data["created_by"] = $this->session->userID;
               $data["created_at"] = date("Y-m-d h:i:s");
               if ($this->common_model->adddata("mk_order", $data)) {
                    if ($_FILES["file1"]["name"]) {
                         $target = "./uploads/order_docs/";

                         move_uploaded_file($_FILES["file1"]["tmp_name"], $target . $_FILES["file1"]["name"]);
                         move_uploaded_file($_FILES["file2"]["tmp_name"], $target . $_FILES["file2"]["name"]);

                         $filename1 = $_FILES["file1"]["name"];

                         $filename2 = $_FILES["file2"]["name"];

                         $orderdata = array(
                              "document1" => $filename1,
                              "document2" => $filename2,
                              "order_id" => $datacheck[0]["order_id"],
                              "created_by" => $this->session->userID,
                              "created_at" => date("Y-m-d h:i:s")
                         );

                         if ($this->email_template_2($customer[0]["email"])) {

                              $sms = $this->sms_template_2($customer[0]["name"], $customer[0]["mobile"]);
                              echo $sms;
                              echo json_encode(array("message" => "Data and mail sent successfully"));
                         } else {
                              echo json_encode(array("message" => "Mail not sent"));
                         }
                         $this->common_model->adddata("mk_order_docs", $orderdata);
                    }

                    if ($this->session->category == "CB" || $this->session->category == "CA" || $this->session->category == "CC") {
                         $adminlog =  $this->common_model->viewwheredata(array("admin" => $this->session->userID), "mk_admin_log");

                         $insertnote = array(
                              "action_to" => $adminlog[0]["agent_id"],
                              "action_by" => $this->session->userID,
                              "action_id" => time(),
                              "action" => "Admin approve the orders",
                              "is_read" => 0

                         );

                         $this->common_model->adddata("mk_notifications", $insertnote);
                    }

                    $this->session->set_flashdata('message_name', 'Order Data Added');
                    return redirect("dashboard/leads/assign/" . $lead_id);
                    // return "<script>window.parent.location.href = window.location.origin+'/dashboard/operation/order'; </script>";
               }
          }
     }

     public function email_template_2($customer_email = "", $attachment = "")
     {  

          $to = $customer_email;
          $subject = "Order Confirmation Mail";

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
          $headers .= 'From: <' . $this->session->email . '>' . "\r\n";
          // $headers .= 'Cc: myboss@example.com' . "\r\n";

          if (mail($to, $subject, $message, $headers)) {
               return true;
          } else {
               return false;
          }
     }

     public function sms_template_2($customer = "", $order = "", $mobile = "")
     {

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20" . $customer . "%20Thanks%20for%20contacting%20Medikart,%20and%20enquiry%20for%20Medical%20Devices/%20Service%20.%20Our%20representative%20has%20spoken%20to%20you%20,hope%20the%20query%20resolved%20and%20got%20the%20appropriate%20reply.%20If%20not%20,you%20can%20email%20at%20info@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";

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

     public function sms_template_1($customer = "", $mobile = "", $order = "")
     {
          // $order = "Dear {#var#} Thanks for contacting Medikart, and enquiry for Medical Devices/ Service . Our representative has spoken to you ,hope the query resolved and got the appropriate reply. If not ,you can email at info@medikart.co.in";

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20" . $customer . "%20Thanks%20for%20your%20order%20for%20" . $order . "%20Your%20order%20has%20been%20punched%20in%20our%20system%20The%20status%20of%20dispatch%20will%20be%20intimated%20to%20you%20soon%20If%20you%20dont%20receive%20any%20intimation%20,%20Please%20email%20at%20.%20customercare@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";

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


     public function assign()
     {
          $data["title"] = "Dashboard | Assign Leads";
          $username = $this->input->post("email");


          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');


          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/leads/maintenance-leads');
               $this->load->view("inc/footer");
          } else {
          }
     }
}
