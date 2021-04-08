<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         
          if(!$this->session->name)
          {
               return redirect("/");
          }
     }

     public function index()
     {
          $data["title"] = "Dashboard";
          $this->load->view("inc/header",$data);
          $this->load->view("dashboard/index",$data);
          $this->load->view("inc/footer");
     }
}
?>