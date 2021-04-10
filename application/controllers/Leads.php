<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         
          if(!$this->session->name)
          {
               return redirect("/");
          }
     }

   
     public function add()
     {
          $data["title"] = "Dashboard | Create Leads";
          $insertdata = array(
          "application_number" => $this->input->post("application"),
          "fullname" => $this->input->post("full_name"),
          "email" => $this->input->post("email"),
          "mobile" => $this->input->post("mobile"),
          "lead_call" => $this->input->post("lead_call"),
          "reasons" => $this->input->post("reasons"),
          );

          $config['upload_path']          = './uploads/lead_image/';
          $config['allowed_types']        = 'gif|jpg|png|jpeg';
          //  $config['max_size']             = 100;
          //  $config['max_width']            = 1024;
          //  $config['max_height']           = 768;

          $this->load->library('upload', $config);
          
               
         
         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('mobile', 'Mobile', 'required');
                

                if ($this->form_validation->run() == FALSE)
                {        
                        $this->load->view("inc/header",$data);
                        $this->load->view('dashboard/leads/add-leads');
                        $this->load->view("inc/footer");
                }
                else
                {
                    if($this->upload->do_upload())
                    {
                         $imagedata = array('upload_data' => $this->upload->data());

                         $insertdata["lead_image"] = $imagedata["upload_data"]["file_name"];



                         if($this->common_model->adddata("mk_lead_data",$insertdata))
                         {
                              
                              $this->session->set_flashdata('message_name', 'Lead Data Inserted Succesfully');
                              
                              return redirect("dashboard/leads/agent/".$insertdata["application_number"]);
                              
                         }
                         else
                         {
                              // Set flash data 
                              $this->session->set_flashdata('message_name', 'Lead Data Not Inserted');
                              // After that you need to used redirect function instead of load view such as 
                              return redirect("dashboard/leads/agent/".$insertdata["application_number"]);

                              // Get Flash data on view 
                              
                                                            
                         }
                    }
                    else
                    {
                         
                         $this->session->set_flashdata('message_name', 'Lead Data Not Inserted');
                         // After that you need to used redirect function instead of load view such as 
                         return redirect("dashboard/leads/agent/".$insertdata["application_number"]);
                         
                    }
                }
     }

     

     public function viewdata()
     {
          $data["title"] = "Dashboard | Leads";
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/leads/view-leads",$data);
          $this->load->view("inc/footer");
     //   print_r($this->session->flashdata('message_name'));
     }

     public function assign_agent($application="")
     {
          $insertdata = array(
               "application_number" => $this->input->post("application"),
               "agent_id" =>  $this->input->post("agentID"),
               "teamleader_id" =>  $this->input->post("parentID"),
         );

          $this->form_validation->set_rules("application","Application","required");

          if($this->form_validation->run() == FALSE)
          {
               $data["title"] = "Dashboard | Assign Leads";
               $data["application"] = $application;
               $data["agents"] = $this->user_model->user_list();
               $this->load->view("inc/header",$data);
               $this->load->view("dashboard/leads/assign_agent",$data);
               $this->load->view("inc/footer");
          }
          else
          {
               
               if($this->common_model->adddata("mk_lead_assign",$insertdata))
               {
                    return redirect("dashboard/leads/quotation/".$insertdata["application_number"]."/".$insertdata["agent_id"]."/".$insertdata["teamleader_id"]);
               }
               else
               {
                    print_r($insertdata);
               }
          }
     }

     public function lead_quotation($application="",$agent_id="",$teamlead_id="")
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

          $this->form_validation->set_rules("item_name","Item Name","required");
          $this->form_validation->set_rules("item_quantity","Item Quantity","required");
          $this->form_validation->set_rules("item_price","Item Price","required");

          if($this->form_validation->run() == FALSE)
          {
               // echo "testing";
               $data["title"] = "Lead Quotation";
               $data["application"] = $application;
               $data["agent"] = $this->user_model->userdata($agent_id);
              
               $data["teamleader"] = $this->user_model->userdata($teamlead_id);
               // print_r($data["teamleader"]);
               $this->load->view("inc/header",$data);
               $this->load->view("dashboard/leads/lead_quotation",$data);
               $this->load->view("inc/footer");
          }
          else
          {
              if($this->common_model->adddata("mk_lead_quotation",$insertdata))
              {
                    $id=($this->common_model->lastinsert_id("mk_lead_quotation","id"));
                    return redirect("dashboard/lead/generate_pdf/".$id[0]->id);
              }
          }
          
     }

     public function generate_pdf($id="")
     {
          //     load library
          $dompdf = new Dompdf\Dompdf();

         $data["testing"] = "Karthik";

        
          
          $data["pdf_data"] = $this->common_model->viewwheredata(array("id"=>$id),"mk_lead_quotation");

          $data["total"] = $this->common_model->total_price(array("id"=>$id),"mk_lead_quotation","item_total_price");

          $data["taxtotal"] = $this->common_model->total_price(array("id"=>$id),"mk_lead_quotation","item_tax");

          // print_r($data["total"]);

          // $this->load->view('dashboard/leads/pdf_quotation',$data);

     //     return false;
 
          $html = $this->load->view('dashboard/leads/pdf_quotation',$data,true);
          
          $dompdf->loadHtml($html);
          
          // (Optional) Setup the paper size and orientation
          $dompdf->setPaper('A4', 'landscape');
          
          // Render the HTML as PDF
          $dompdf->render();
          
          // Get the generated PDF file contents
          $pdf = $dompdf->output();
          
          // Output the generated PDF to Browser
          $dompdf->stream();


  	    
  	     

     }


     public function assign()
     {
          $data["title"] = "Dashboard | Assign Leads";
          $username = $this->input->post("email");
       

         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
                

                if ($this->form_validation->run() == FALSE)
                {        
                        $this->load->view("inc/header",$data);
                        $this->load->view('dashboard/leads/maintenance-leads');
                        $this->load->view("inc/footer");
                }
                else
                {

                }
     }



}
?>