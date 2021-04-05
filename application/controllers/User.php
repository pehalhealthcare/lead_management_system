<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          // $this->load->helper('phpass_helper');
          // $this->load->library('session');
          
     }
     public function index()
     {
          if($this->session->name)
          {
               return redirect("products");
          }
          // $user = "testing";
          // $this->session->name = $user;
          $username = $this->input->post("email");
          $password = $this->input->post("password");

         // unset($this->session->name);
         $data["title"] = "User Login";

         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
                

                if ($this->form_validation->run() == FALSE)
                {        
                         $this->load->view("inc/login-header",$data);
                        $this->load->view('user/login');
                        $this->load->view("inc/footer");
                }
                else
                {
                    $user = $this->user_model->userlogin($username,$password);
                    if($user!="")
                    {
                         $this->session->email = $user[0]->email;
                         $this->session->name = $user[0]->username;
                         
                         return redirect("/products");
                        
                    }
                    else
                    {
                         echo "No Data Found";
                    }
                }
     }

     public function register()
     {
          
     }

     public function logout()
     {
          // unset($this->session->name);
          session_destroy();
          $this->session->unset_userdata($_SESSION);
          
         return redirect(base_url());
     }
    
}