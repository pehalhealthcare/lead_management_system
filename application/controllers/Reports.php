<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

          if (!$this->session->name) {
               return redirect("/");
          }
     }

     public function customize_report()
     {
          $data["title"] = "Dashboard | Customize Report";
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/custom-reports");
          $this->load->view("inc/footer");
     }

     public function customize_report_field()
     {
          $data["title"] = "Dashboard | Customize Report Fields";
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/custom-report-fields");
          $this->load->view("inc/footer");
     }

     public function product_report()
     {
          $data["title"] = "Dashboard | Product Report";

          $data["items"] = $this->common_model->viewdata("mk_master_product_item","multiple");
          

          $data["customers"] = $this->common_model->viewdata("mk_customer","multiple");

          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/product-report");
          $this->load->view("inc/footer");
     }

     public function service_report()
     {
          $data["title"] = "Dashboard | Service Report";

          $data["items"] = $this->common_model->viewdata("mk_master_service_item","multiple");
          

          $data["customers"] = $this->common_model->viewdata("mk_customer","multiple");

          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/service-report");
          $this->load->view("inc/footer");
     }

     public function lead_report()
     {
          $data["title"] = "Dashboard | Lead Report";

          $data["leads"] = $this->common_model->viewdata("mk_lead","multiple");

          $data["orders"] = $this->common_model->viewdata("mk_order","multiple");

          $data["quotation"] = $this->common_model->viewdata("mk_quotation","multiple");

          $data["agents"] = $this->common_model->viewwheredata(array("category"=>"BA"),"mk_registration_table");

          $data["users"] = $this->common_model->viewdata("mk_registration_table","multiple");
          
          // print_r($data["users"]);

          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/leads-report");
          $this->load->view("inc/footer");
     }

     public function quotation_report()
     {
          $data["title"] = "Dashboard | Quotation Report";
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/reports/quotation-report");
          $this->load->view("inc/footer");
     }
}
