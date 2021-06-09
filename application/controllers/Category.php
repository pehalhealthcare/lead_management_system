<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }

     public function view_category()
     {
          $data["user"] = $_SESSION;

          $data["title"] = "view Category";

          $data["categories"] = $this->common_model->viewdata("mk_master_lead_category","multiple");

          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/category/view-category", $data);
          $this->load->view("inc/footer", $data);
     }

    

     public function delete_category($id = null)
     {
          $data = array("is_active"=>0);
          if ($this->common_model->updatedata("mk_master_lead_category",$data, array("id" => $id)) == true) {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/category");
          } else {
               $this->session->set_flashdata('message', 'Data Not Deleted Successfully');
               return redirect("dashboard/category");
          }
     }
}