<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
         
          if(!$this->session->name)
          {
               return redirect("/");
          }
     }

     /*
     This method is used for all products view
     */
     public function index()
     {
          // print_r($_SESSION);
          $data["user"]=$_SESSION;

          $data["title"] = "Products Page";

          $data["products"] = $this->products_model->viewdata("multiple","products");

          $this->load->view("inc/header",$data);
          $this->load->view("products/products-view",$data);
          $this->load->view("inc/footer",$data);

     }

     /*
     This method is used for adding products
     */
     public function addproducts()
     {
          

          $data["title"] = "Add Products"; 
          $data["error"] = "";
          $data["user"]=$_SESSION;

         

          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('mobile', 'Mobile', 'required');
          if ($this->form_validation->run() == FALSE)
          {
               $this->load->view("inc/header",$data);
               $this->load->view('products/products-add',$data);
               $this->load->view("inc/footer",$data);
          }
          else
          {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
               //  $config['max_size']             = 100;
               //  $config['max_width']            = 1024;
               //  $config['max_height']           = 768;

                $this->load->library('upload', $config);
               
               

               if($this->upload->do_upload())
               {

               $imagedata = array('upload_data' => $this->upload->data());
                
               $data = array(
               "product_image" => $imagedata["upload_data"]["file_name"],
               "product_name" => $this->input->post("fullname"),
               "mobile" => $this->input->post("mobile"),
               "email" => $this->input->post("email"),
               "product_type" => $this->input->post("product_type"));

                    
                    if($this->products_model->adddata("products",$data) == true)
                    {
                         return redirect("/products");
                    }
                    
               }
               else
               {
                    return redirect("/products");
               }

          }
          
     }

     /*+
    public function editproducts($id="")
    {

     $data["user"]=$_SESSION;
     $data["products"] = $this->products_model->viewwheredata(array("id"=>$id),"products");
     $data["error"] = "";
     $data["title"] = "Edit Products";  

    if(!empty($data["products"]))
    {  
     $this->load->view("inc/header",$data);  
     $this->load->view('products/products-edit',$data);
     $this->load->view("inc/footer",$data);
    }
    else
    {
         return redirect("products");
    }

     

    }

     /*
     This method is used for update products
     */
    public function updateproducts($id="")
    {
     
          $data["error"] = "";

          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('mobile', 'Mobile', 'required');
          if ($this->form_validation->run() == FALSE)
          {
               $this->load->view("inc/header",$data);  
               $this->load->view('products/products-edit',$data);
               $this->load->view("inc/footer",$data);
          }
          else
          {
               $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
               //  $config['max_size']             = 100;
               //  $config['max_width']            = 1024;
               //  $config['max_height']           = 768;

                $this->load->library('upload', $config);
               
               

               if($this->upload->do_upload())
               {
              
               $imagedata = array('upload_data' => $this->upload->data());
                
               $data = array(
               "product_image" => $imagedata["upload_data"]["file_name"],
               "product_name" => $this->input->post("fullname"),
               "mobile" => $this->input->post("mobile"),
               "email" => $this->input->post("email"),
               "product_type" => $this->input->post("product_type")
               );

               // print_r($data); 

               // return false;

                    if($this->products_model->updatedata("products",$data,array("id"=>$id)) == true)
                    {
                         // print_r($data); 
                         return redirect("/products");
                    }
                    
               }
               else
               {
                   return redirect("/products");
               }

          }
    }


    /*
     This method is used for delete products
     */
    public function deleteproducts($id="")
    {
      if($this->products_model->deletedata("products",array("id"=>$id))==true)
      {
           return redirect("/products");
      }
      else
      {
          return redirect("/products");
      }
    }






}