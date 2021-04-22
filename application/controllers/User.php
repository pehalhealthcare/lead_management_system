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
               return redirect("dashboard/leads");
          }
          // $user = "testing";
          // $this->session->name = $user;
          $username = $this->input->post("email");
          $password = $this->input->post("password");
          $role = $this->input->post("role");

         // unset($this->session->name);
         $data["title"] = "User Login";
         $data["error"] = "";

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
                         $this->session->name = $user[0]->firstname;
                         $this->session->userID = $user[0]->id;

                         // print_r($user);
                         
                         return redirect("dashboard/leads");
                        
                    }
                    else
                    {
                         $data["error"] = "Please check your credentials";
                         $this->load->view("inc/login-header",$data);
                         $this->load->view('user/login',$data);
                         $this->load->view("inc/footer");
                    }
                }
     }

     public function add_user()
     {
          $data["title"] = "User Register";
          $email = $this->input->post("email");

          $insertdata = array(
               "firstname" => $this->input->post("first_name"),
               "lastname" => $this->input->post("last_name"),
               "mobile" =>    $this->input->post("mobile"),
               "email" =>    $this->input->post("email"),
               "password" => hash("sha256",$this->input->post("password")),
               "role" => $this->input->post("role"),
               "category" => $this->input->post("category"),
               "department" => $this->input->post("department"),
               "parent_id" => $this->session->userID
          );
          


         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
                

                if ($this->form_validation->run() == FALSE)
                {        
                        $this->load->view("inc/header",$data);
                        $this->load->view('dashboard/user/create-user');
                        $this->load->view("inc/footer");
                }
                else
                {
                    if($this->user_model->usercheck($email) == true)
                    {
                         $data["error"] = "User Already Registered";
                        $this->load->view("inc/header",$data);
                        $this->load->view('dashboard/user/create-user');
                        $this->load->view("inc/footer");
                    }
                    else
                    {
                         if($this->common_model->adddata("mk_registration_table",$insertdata))
                         {
                              return redirect("dashboard/user");
                              print_r($insertdata);
                         }
                         else
                         {
                              $data["error"] = "User Already Registered";
                              $this->load->view("inc/header",$data);
                              $this->load->view('dashboard/user/create-user');
                              $this->load->view("inc/footer");
                         }
                    }
                }
     }

     public function view_user()
     {
          $data["title"] = "Dashboard | User Details";
          $data["userdetails"] = $this->user_model->user_detail($this->session->userID);
          // print_r($data);
          $this->load->view("inc/header",$data);
          $this->load->view('dashboard/user/view-user',$data);
          $this->load->view("inc/footer");
     }

     public function forgotpassword()
     {
          $username = $this->input->post("email");
          $password = $this->input->post("password");

         // unset($this->session->name);
         $data["title"] = "Forgot Password";
         $data["validate"] = "d-none";

         $this->form_validation->set_rules('email', 'Email', 'required');
         
                

                if ($this->form_validation->run() == FALSE)
                {        
                        $this->load->view("inc/login-header",$data);
                        $this->load->view('user/forgotpassword');
                        $this->load->view("inc/footer");
                }
                else
                {

                    $user = $this->user_model->usercheck($username);

                    if($user)
                    {
                         $data["validate"] = "";

                         $this->form_validation->set_rules('password', 'Password', 'required');
                         $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
                         if($this->form_validation->run() == FALSE)
                         {
                              $this->load->view("inc/login-header",$data);
                              $this->load->view('user/forgotpassword');
                              $this->load->view("inc/footer");
                         }
                         else
                         {
                               print_r($_POST);
                         }
                         
                    }
                    else
                    {
                         $this->load->view("inc/login-header",$data);
                         $this->load->view('user/forgotpassword');
                         $this->load->view("inc/footer");
                    }
                    

                    // $user = $this->user_model->userlogin($username,$password);
                    // if($user!="")
                    // {
                    //      $this->session->email = $user[0]->email;
                    //      $this->session->name = $user[0]->username;
                         
                    //      return redirect("/products");
                        
                    // }
                    // else
                    // {
                    //      echo "No Data Found";
                    // }
                }
     }

     public function usernamecheck()
     {
          $username = $this->input->post("email");
          $user = $this->user_model->usercheck($username);
          if($user)
          {
              echo "true";
          }
          else
          {
              echo "false";
          }
     }

     public function password_reset()
     {
          $username = $this->input->post("email");
          $password = $this->input->post("password");

          $user = $this->user_model->password_reset($username,$password);
          if($user)
          {
              echo "true";
          }
          else
          {
              echo "false";
          }

     }

     public function logout()
     {
          // unset($this->session->name);
          session_destroy();
          $this->session->unset_userdata($_SESSION);
          
         return redirect(base_url());
     }
    
}