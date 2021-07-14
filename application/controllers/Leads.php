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

          $customer_count = $this->common_model->viewwheredata(array("email"=>$this->input->post("email")),"mk_customer");

          $this->form_validation->set_rules('assigned_to', 'Assignee', 'required');


          if ($this->form_validation->run() == FALSE)
           {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/leads/add-leads');
               $this->load->view("inc/footer");
          } 
          else {
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
                              "assigned_by"=>$this->session->userID,
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
                                        $this->session->set_flashdata('message_name', 'Lead Data Inserted');
                                        return redirect("dashboard/leads");
                                   }
                              }
                         }
                         else
                         {
                              $insertdata = array(
                                   "lead_source" => $this->input->post("lead_source"),
                                   "category" => $this->input->post("category"),
                                   "assigned_to" => $this->input->post("assigned_to"),
                                   "assigned_by"=>$this->session->userID,
                                   "name" => $this->input->post("name"),
                                   "email" => $this->input->post("email"),
                                   "mobile" => $this->input->post("mobile"),
                                   "created_by" => $this->session->userID,
                                   "created_at" => date("Y-m-d l:i:s")
                              );
                              // echo 'No data';
                              $this->common_model->adddata("mk_lead", $insertdata);
                              if(count($customer_count)>0)
                              {
                                   $this->session->set_flashdata('message_name', 'Lead Data Image Not Available');
                                   return redirect("dashboard/leads");
                              }
                              else
                              {
                                   $this->common_model->adddata("mk_customer",$customerdata);
                                   $this->session->set_flashdata('message_name', 'Lead Data Image Not Available');
                                   return redirect("dashboard/leads");
                              }
                              
                         }
                    }
                    
               } else {
                    $insertdata = array(
                         "lead_source" => $this->input->post("lead_source"),
                         "category" => $this->input->post("category"),
                         "assigned_to" => $this->input->post("assigned_to"),
                         "assigned_by"=>$this->session->userID,
                         "name" => $this->input->post("name"),
                         "email" => $this->input->post("email"),
                         "mobile" => $this->input->post("mobile"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d l:i:s")
                    );

                    // echo 'No data';
                    $this->common_model->adddata("mk_lead", $insertdata);

                    if(count($customer_count)>0)
                    {

                    }
                    else
                    {
                         $this->common_model->adddata("mk_customer",$customerdata);
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
          if($this->session->category=="OA" || $this->session->category=="BA")
          {
               $data["leads"] = $this->common_model->viewwheredata(array("assigned_to"=>$this->session->userID),"mk_lead");
               $this->load->view("dashboard/leads/view-leads-agent", $data);
          }
          else
          {
               $data["leads"] = $this->common_model->vieworderby("mk_lead", "multiple","id","desc");
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
               "assigned_by"=>$this->session->userID,
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
          } 
          else {
               $this->upload->do_upload();
               $id = $this->input->post("lead_id");
               $imagedata = array('upload_data' => $this->upload->data());

               if ($imagedata["upload_data"]["file_name"]) {
                    $insertdata["lead_image"] = $imagedata["upload_data"]["file_name"];
               }

               $existCustomer = $this->common_model->viewwheredata(array("email" => $this->input->post("email")), "mk_customer");

               if ($this->common_model->updatedata("mk_lead", $insertdata, array("id" => $id))) {

                    if(count($existCustomer)==0)
                    {
                         $this->common_model->adddata("mk_customer",$customerdata);
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
                    
                    if(count($existCustomer)==0)
                    {
                         $this->common_model->adddata("mk_customer",$customerdata);
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

          $data["lead_customer"] = $this->common_model->viewwheredataorderby(array("lead_id" => $lead_id), "mk_lead_customer","id","desc");

          $data["activity"] = $this->common_model->viewdata("mk_activity_master", "multiple");

          // print_r($data["activity"]); die();

          $data["leads"] = $this->common_model->viewwheredata(array("id" => $lead_id), "mk_lead");

          $data["customer_item"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_customer_item");

          $data["opportunity"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "is_active" => 1), "mk_opportunity");

          $data["customers"] = $this->common_model->vieworderby("mk_customer", "multiple","customer_id","desc");

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");

          $data["services"] = $this->common_model->viewdata("mk_master_services", "multiple");

          $data["quotation"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_quotation");

          $data["order"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id), "mk_order");

          // $data["users"] = $this->common_model->viewwheredata(array(""=>""),"mk_registration_table");

          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/leads/assign_customer", $data);
          $this->load->view("inc/footer");
          // return redirect("dashboard/leads/assign_customer", $lead_id);
          // echo "Echo id".$lead_id;
     }

     public function opportunity_delete($id = "")
     {
          $data = array("is_active" => 0);

          $lead_id = $this->input->get("lead_id");

          

          if ($this->common_model->updatedata("mk_opportunity", $data, array("id" => $id))) {

               return redirect("dashboard/leads/assign/".$lead_id);
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

     public function generate_pdf($lead_id = "", $customer_id = "")
     {
          //     load library
          $dompdf = new Dompdf\Dompdf();

          //     $data["testing"] = "Karthik";

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $total_price = 0;
         foreach($data["customer_item"] as $customer_item)
         {
               $total_price = $total_price + $customer_item["total_price"];
         }
     //     echo $total_price;
         $pdf = base_url()."dashboard/lead/generate_quotation/".$lead_id."/".$customer_id;
          $insertdata = array(
               "quotation_no"=>time(),
               "lead_id"=>$lead_id,
               "pdf"=>$pdf,
               "item_total"=>$total_price,
               "customer_id"=>$customer_id
             
          );

          $datacheck = $this->common_model->viewwheredata(array("lead_id"=>$lead_id,"customer_id"=>$customer_id),"mk_quotation");

          if($datacheck)
          {
               $insertdata["modified_by"]=$this->session->userID;
               $insertdata["modified_at"]=date("Y-m-d h:i:s");

               if($this->common_model->updatedata("mk_quotation",$insertdata,array("lead_id"=>$lead_id,"customer_id"=>$customer_id)))
               {
                    echo "Data Updated";
               }
               
          }
          else
          {
               $insertdata["created_by"]=$this->session->userID;
               $insertdata["created_at"]=date("Y-m-d h:i:s");
              if($this->common_model->adddata("mk_quotation",$insertdata))
              {
                   echo "Data Inserted";
              }
          }
          // print_r($datacheck);
          // die();

          // $this->load->view('dashboard/leads/pdf_quotation',$data);

          //     return false;

          $html = $this->load->view('dashboard/leads/pdf_quotation', $data, true);

          $dompdf->loadHtml($html);

          // (Optional) Setup the paper size and orientation
          $dompdf->setPaper('A4', 'portrait');

          // Render the HTML as PDF
          $dompdf->render();

          // Get the generated PDF file contents
          $pdf = $dompdf->output();

          // Output the generated PDF to Browser
          $dompdf->stream(time() . ".pdf");
     }

     public function view_quotation($lead_id = "", $customer_id = "")
     {
          //     load library
          $dompdf = new Dompdf\Dompdf();

          //     $data["testing"] = "Karthik";

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $total_price = 0;
         foreach($data["customer_item"] as $customer_item)
         {
               $total_price = $total_price + $customer_item["total_price"];
         }
     //     echo $total_price;
         

        

         
          // print_r($datacheck);
          // die();

          $this->load->view('dashboard/leads/pdf_quotation',$data);

          return false;

     }

     public function generate_quotation($lead_id = "", $customer_id = "")
     {
        

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $data["lead"] = $this->common_model->viewwheredata(array("id" => $lead_id), "mk_lead");

          // print_r($data["lead"]); die();

          $data["qid"] = $this->input->get("qid");


          // print_r($data["qid"]); die();    

          $datacheck = $this->common_model->viewwheredata(array("lead_id"=>$lead_id,"customer_id"=>$customer_id),"mk_quotation");

         
          // print_r($datacheck);
          // die();
          
          $this->load->view('dashboard/leads/generate_quotation',$data);

          return false;

          
     }

     public function ordersubmit()
     {
          $data = array(
               "quotation_id"=>$this->input->post("qid"),
               "lead_id"=>$this->input->post("lead_id"),
               "assign_to_agent"=>$this->input->post("agent"),
               "assign_to_tl"=>$this->input->post("teamleader"),
               "order_no"=>"ORD_".time(),
               "decision"=>$this->input->post("decision"),
               "payment"=>$this->input->post("payment"),
               "status"=>1,
               "approved"=>"yes",
          );
          $lead_id=$this->input->post("lead_id");
          $datacheck = $this->common_model->viewwheredata(array("lead_id"=>$lead_id,"quotation_id"=>$this->input->post("qid")),"mk_order");          

          if($datacheck)
          {
               $data["modified_by"]=$this->session->userID;
               $data["modified_at"]=date("Y-m-d h:i:s");

               $array = array(
                    "lead_id"=>$lead_id,"quotation_id"=>$this->input->post("qid")
               );

              

                    if($_FILES["file"]["name"])
                    {
                         $target = "./uploads/order_docs/";
                         move_uploaded_file($_FILES["file"]["tmp_name"],$target.$_FILES["file"]["name"]);
                         $filename = $_FILES["file"]["name"];

                         $orderdata = array(
                              "document"=>$filename,
                              "order_id"=>$datacheck[0]["order_id"],
                              "created_by"=>$this->session->userID,
                              "created_at"=>date("Y-m-d h:i:s")
                         );

                    }
                    // print_r($orderdata); die();
               $this->common_model->adddata("mk_order_docs", $orderdata);

               if($this->common_model->updatedata("mk_order",$data,$array))
               {
                    $this->session->set_flashdata('message_name', 'Order Data Updated');
                    return redirect("/dashboard/leads/assign/".$lead_id);
               }
               

          }
          else
          {
               $data["created_by"]=$this->session->userID;
               $data["created_at"]=date("Y-m-d h:i:s");
               if($this->common_model->adddata("mk_order",$data))
               {
                    if($_FILES["file"]["name"])
                    {
                         $target = "./uploads/order_docs/";
                         move_uploaded_file($_FILES["file"]["tmp_name"],$target.$_FILES["file"]["name"]);

                         $filename = $_FILES["file"]["name"];

                         $dataorder=$this->common_model->lastinsert_id("mk_order","order_id");

                         // print_r($dataorder); die();

                         $orderdata = array(
                              "document"=>$filename,
                              "order_id"=>$dataorder[0]["order_id"],
                              "created_by"=>$this->session->userID,
                              "created_at"=>date("Y-m-d h:i:s")
                         );

                         $this->common_model->adddata("mk_order_docs", $orderdata);
                    }

                    $this->session->set_flashdata('message_name', 'Order Data Added');
                    return redirect("/dashboard/leads/assign/".$lead_id);
               }
          }
         
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
