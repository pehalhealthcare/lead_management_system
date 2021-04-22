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
          "alternate_mobile"=>$this->input->post("alternate_mobile"),
          "created_at" => date("Y-m-d l:s:i"),
          "created_by" => $this->session->userID
     );

     $insertaddress = array(
          "address_1"=>$this->input->post("address_1"),
          "address_2"=>$this->input->post("address_2"),
          "address_3"=>$this->input->post("address_3"),
          "city"=>$this->input->post("city"),
          "state"=>$this->input->post("state"),
          "zip"=>$this->input->post("zip"),
          "created_at"=>date("Y-m-d h:i:s"),
          "created_by"=>$this->session->userID
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
               $id=($this->common_model->lastinsert_id("mk_customer","customer_id"));
               $insertaddress["customer_id"] = $id[0]->customer_id;
               if($this->common_model->adddata("mk_customer_address",$insertaddress))
               {
                    $this->session->set_flashdata('message_name', 'Customer Data Inserted');
                    return redirect("dashboard/leadcustomer");
               }
               
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

     $data["customeraddress"] = $this->common_model->viewwheredata(array("customer_id"=>$id,"is_primary"=>1),"mk_customer_address");

     $insertdata = array(
          "prefix"=>$this->input->post("surname"),
          "name" => $this->input->post("name"),
          "email"=> $this->input->post("email"),
          "mobile"=>$this->input->post("mobile"),
          "alternate_mobile"=>$this->input->post("alternate_mobile"),
          "modified_at" => date("Y-m-d l:s:i"),
          "modified_by" => $this->session->userID,

     );

     $insertaddress = array(
          "address_1"=>$this->input->post("address_1"),
          "address_2"=>$this->input->post("address_2"),
          "address_3"=>$this->input->post("address_3"),
          "city"=>$this->input->post("city"),
          "state"=>$this->input->post("state"),
          "zip"=>$this->input->post("zip"),
          "modified_at"=>date("Y-m-d h:i:s"),
          "modified_by"=>$this->session->userID
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
          if($this->common_model->updatedata($this->table,$insertdata,array("customer_id"=>$id)))
          {
               if($this->common_model->updatedata("mk_customer_address",$insertaddress,array("customer_id"=>$id)))
               {
                    $this->session->set_flashdata('message_name', 'Customer Data Updated');
                    // print_r(($insertdata));
                    // print_r($insertaddress);
                    return redirect("dashboard/leadcustomer");
               }
              
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