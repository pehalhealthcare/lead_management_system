<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }


     /*
     This method is used for all products view
     */
    public function index()
    {
         // print_r($_SESSION);
         $data["user"] = $_SESSION;

         $data["title"] = "Service Page";

         $data["products"] = $this->common_model->viewdata("mk_master_services", "multiple");

         $this->load->view("inc/header", $data);
         $this->load->view("dashboard/services/service_view", $data);
         $this->load->view("inc/footer", $data);
    }

    /*
    This method is used for adding products
    */
    public function addservices()
    {


         $data["title"] = "Add Services";
         $data["error"] = "";
         $data["user"] = $_SESSION;



         $this->form_validation->set_rules('fullname', 'Fullname', 'required');

         if ($this->form_validation->run() == FALSE) {
              $this->load->view("inc/header", $data);
              $this->load->view('dashboard/services/service_add', $data);
              $this->load->view("inc/footer", $data);
         } else {
              $config['upload_path']          = './uploads/';
              $config['allowed_types']        = 'gif|jpg|png|jpeg';

              $this->load->library('upload', $config);

              if ($this->upload->do_upload()) {

                   $imagedata = array('upload_data' => $this->upload->data());

                   $data = array(
                        "service_image" => $imagedata["upload_data"]["file_name"],
                        "service_name" => $this->input->post("fullname"),
                        "created_by" => $this->session->userID,
                        "created_at" => date("Y-m-d h:i:s")
                   );


                   if ($this->products_model->adddata("mk_master_services", $data) == true) {
                        $this->session->set_flashdata('message', 'Data Inserted Successfully');
                        return redirect("/dashboard/services");
                   }
              } else {
                   $this->session->set_flashdata('message', 'Data Not Inserted Successfully');
                   return redirect("/dashboard/services");
                   return redirect("/services");
              }
         }
    }


    public function editservices($id = "")
    {

         $data["user"] = $_SESSION;
         $data["products"] = $this->common_model->viewwheredata(array("service_id" => $id), "mk_master_services");
         $data["error"] = "";
         $data["title"] = "Edit Services";


         $this->form_validation->set_rules('fullname', 'Fullname', 'required');

         if ($this->form_validation->run() == FALSE) {
              if (!empty($data["products"])) 
              {
                   $this->load->view("inc/header", $data);
                   $this->load->view('dashboard/services/service_edit', $data);
                   $this->load->view("inc/footer", $data);
              } 
              else 
              {
                   
              }
         }
         else
         {
                   $config['upload_path']          = './uploads/';
                   $config['allowed_types']        = 'gif|jpg|png|jpeg';
                   //  $config['max_size']             = 100;
                   //  $config['max_width']            = 1024;
                   //  $config['max_height']           = 768;

                   $this->load->library('upload', $config);



                   if ($this->upload->do_upload()) 
                   {

                   $imagedata = array('upload_data' => $this->upload->data());
                   $data = array(
                        "service_image" => $imagedata["upload_data"]["file_name"],
                        "service_name" => $this->input->post("fullname"),
                        "modified_by" => $this->session->userID,
                        "modified_at" => date("Y-m-d h:i:s")
                   );

                   // print_r($data);

                   if ($this->common_model->updatedata("mk_master_services", $data, array("service_id" => $id)) == true) 
                   {
                        // print_r($data); 
                        $this->session->set_flashdata('message', 'Data Updated Successfully');
                        return redirect("/dashboard/services");
                   }
                   else
                   {
                        $this->session->set_flashdata('message', 'Data Not Updated Successfully');
                        return redirect("/dashboard/services");
                   }

                   }
                   else
                   {
                    $data = array(
                         "service_name" => $this->input->post("fullname"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );

                    $this->common_model->updatedata("mk_master_services", $data, array("service_id" => $id));
                    
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/services");
                   }
         }
    }

    /*
    This method is used for delete products
    */
    public function deleteservices($id = "")
    {
         $data = array("is_active"=>0);
         if ($this->common_model->updatedata("mk_master_services",$data, array("service_id" => $id)) == true) {
              $this->session->set_flashdata('message', 'Data Deleted Successfully');
              return redirect("dashboard/services");
         } else {
              $this->session->set_flashdata('message', 'Data Not Deleted Successfully');
              return redirect("dashboard/services");
         }
    }

     public function view_services_item($pid="")
     {
          $data["user"] = $_SESSION;

          $data["title"] = "Service Item";

          $data["products"] = $this->common_model->viewwheredata(array("service_id" => $pid,"is_active"=>1),"mk_master_service_item");

          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/services/item_view", $data);
          $this->load->view("inc/footer", $data);
     }

     public function add_services_item()
     {
          $data["title"] = "Add Service Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $data["products"] = $this->common_model->viewdata("mk_master_services", "multiple");


          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/services/item_add', $data);
               $this->load->view("inc/footer", $data);
          } else {
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';

               $this->load->library('upload', $config);



              
                    // $imagedata = array('upload_data' => $this->upload->data());

                    $data = array(
                         // "item_image" => $imagedata["upload_data"]["file_name"],
                         "item_name" => $this->input->post("fullname"),
                         "unit_price"=>$this->input->post("item_price"),
                         "tax_rate"=>$this->input->post("tax_rate"),
                         "service_id" => $this->input->post("product"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->adddata("mk_master_service_item", $data) == true) {
                         $this->session->set_flashdata('message', 'Data Inserted Successfully');
                         return redirect("/dashboard/services");
                   }
               
          }
     }

     public function edit_services_item($id = null)
     {
          $data["title"] = "Edit Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $data["items"] = $this->common_model->viewwheredata(array("item_id"=>$id),"mk_master_service_item");

          $data["products"] = $this->common_model->viewdata("mk_master_services", "multiple");


          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/services/item_edit', $data);
               $this->load->view("inc/footer", $data);
          } else {
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';

               $this->load->library('upload', $config);



               if ($this->upload->do_upload()) {

                    $imagedata = array('upload_data' => $this->upload->data());

                    $data = array(
                         "item_image" => $imagedata["upload_data"]["file_name"],
                         "item_name" => $this->input->post("fullname"),
                         "unit_price"=>$this->input->post("item_price"),
                         "tax_rate"=>$this->input->post("tax_rate"),
                         "service_id" => $this->input->post("product"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->updatedata("mk_master_service_item", $data,array("item_id"=>$id)) == true) {
                         echo "if condition";
                        
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/services");
                    }
               } 
               else {
                    $data = array(
                         "item_name" => $this->input->post("fullname"),
                         "unit_price"=>$this->input->post("item_price"),
                         "tax_rate"=>$this->input->post("tax_rate"),
                         "service_id" => $this->input->post("product"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );

                    if ($this->products_model->updatedata("mk_master_service_item", $data,array("item_id"=>$id)) == true) {
                         echo "if condition";
                        
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/services");
                    }
                    // return redirect("/dashboard/services");
               }
          }
     }

     public function delete_services_item($id = null)
     {
          $data = array("is_active"=>0);
          if ($this->common_model->updatedata("mk_master_service_item",$data, array("item_id" => $id)) == true) {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/services");
          } else {
               $this->session->set_flashdata('message', 'Data Not Deleted Successfully');
               return redirect("dashboard/services");
          }
     }
}