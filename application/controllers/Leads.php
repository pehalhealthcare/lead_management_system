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

                         // print_r($inserdata);

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
          $data["title"] = "Dashboard | Leads";
          $data["application"] = $application;
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/leads/assign_agent",$data);
          $this->load->view("inc/footer");
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