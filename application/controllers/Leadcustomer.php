<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leadcustomer extends CI_Controller
{
   
     protected $table = "mk_customer";
    
    public function __construct()
    {
         parent::__construct();

     
    }

    public function add()
    {
     $data["title"] = "Dashboard | Create Leads Customer";

     $insertdata = array(
          "prefix"=>$this->input->post("surname"),
          "name" => $this->input->post("name"),
          "email"=> $this->input->post("email"),
          "mobile"=>$this->input->post("mobile"),
          "is_active"=>$this->input->post("status"),
          "alternate_mobile"=>$this->input->post("alternate_mobile"),
          "created_at" => date("Y-m-d l:s:i"),
          "created_by" => $this->session->userID
     );

     $config['upload_path']          = './uploads/lead_image/';
     $config['allowed_types']        = 'gif|jpg|png|jpeg';

     $this->load->library('upload', $config);

     $this->form_validation->set_rules('name', 'Name', 'required');

     

     if ($this->form_validation->run() == FALSE)
     {  
          $this->load->view("inc/header",$data);
          $this->load->view('dashboard/leadcustomer/add-data');
          $this->load->view("inc/footer");

     }
     else
     {
          if($this->common_model->adddata($this->table,$insertdata))
          {
               $this->session->set_flashdata('message_name', 'Customer Data Inserted');
               return redirect("dashboard/leadcustomer");
          }
          else
          {
               $this->session->set_flashdata('message_name', 'Customer Data Not Inserted');
               return redirect("dashboard/leadcustomer");
          }

     }


    }

   

    public function viewdata()
    {
     $data["title"] = "Dashboard | Leads Customer";

     $data["leadcustomers"] = $this->common_model->viewdata($this->table,"multiple");

     $this->load->view("inc/header",$data);
     $this->load->view('dashboard/leadcustomer/view-data',$data);
     $this->load->view("inc/footer");
    }

    public function editdata($id="")
    {
     $data["title"] = "Dashboard | Edit Leads Customer";

     $data["leadcustomer"] = $this->common_model->viewwheredata(array("customer_id"=>$id),$this->table);

     $insertdata = array(
          "prefix"=>$this->input->post("surname"),
          "name" => $this->input->post("name"),
          "email"=> $this->input->post("email"),
          "mobile"=>$this->input->post("mobile"),
          "is_active"=>$this->input->post("status"),
          "alternate_mobile"=>$this->input->post("alternate_mobile"),
          "modified_at" => date("Y-m-d l:s:i"),
          "modified_by" => $this->session->userID
     );

     $config['upload_path']          = './uploads/lead_image/';
     $config['allowed_types']        = 'gif|jpg|png|jpeg';

     $this->load->library('upload', $config);

     $this->form_validation->set_rules('name', 'Name', 'required');

     if ($this->form_validation->run() == FALSE)
     {  
          $this->load->view("inc/header",$data);
          $this->load->view('dashboard/leadcustomer/edit-data');
          $this->load->view("inc/footer");

     }
     else
     {
          if($this->common_model->updatedata($this->table,$insertdata,array("customer_id",$id)))
          {
               $this->session->set_flashdata('message_name', 'Customer Data Updated');
               return redirect("dashboard/leadcustomer");
          }
          else
          {
               $this->session->set_flashdata('message_name', 'Customer Data Not Updated');
               return redirect("dashboard/leadcustomer");
          }

     }
    }

    public function  deletedata($id="")
    {
         if($this->common_model->deletedata($this->table,array("customer_id"=>$id)))
         {
          $this->session->set_flashdata('message_name', 'Customer Data Deleted');
          return redirect("dashboard/leadcustomer");
         }
         else
         {
               $this->session->set_flashdata('message_name', 'Customer Data Not Deleted');
               return redirect("dashboard/leadcustomer");
         }
    }
}