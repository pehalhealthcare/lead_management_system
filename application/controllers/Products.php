<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Products extends CI_Controller
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

          $data["title"] = "Products Page";

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");

          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/product/product_view", $data);
          $this->load->view("inc/footer", $data);
     }

     /*
     This method is used for adding products
     */
     public function addproducts()
     {


          $data["title"] = "Add Products";
          $data["error"] = "";
          $data["user"] = $_SESSION;



          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/product/product_add', $data);
               $this->load->view("inc/footer", $data);
          } else {
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';

               $this->load->library('upload', $config);

               if ($this->upload->do_upload()) {

                    $imagedata = array('upload_data' => $this->upload->data());

                    $data = array(
                         "product_image" => $imagedata["upload_data"]["file_name"],
                         "product_name" => $this->input->post("fullname"),
                         "created_by" => $this->session->userID,
                         "created_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->adddata("mk_master_product", $data) == true) {
                         $this->session->set_flashdata('message', 'Data Inserted Successfully');
                         return redirect("/dashboard/products");
                    }
               } else {
                    $this->session->set_flashdata('message', 'Data Not Inserted Successfully');
                    return redirect("/dashboard/products");
                    return redirect("/products");
               }
          }
     }


     public function editproducts($id = "")
     {

          $data["user"] = $_SESSION;
          $data["products"] = $this->common_model->viewwheredata(array("product_id" => $id), "mk_master_product");
          $data["error"] = "";
          $data["title"] = "Edit Products";


          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               if (!empty($data["products"])) {
                    $this->load->view("inc/header", $data);
                    $this->load->view('dashboard/product/product_edit', $data);
                    $this->load->view("inc/footer", $data);
               } else {
               }
          } else {
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';
               //  $config['max_size']             = 100;
               //  $config['max_width']            = 1024;
               //  $config['max_height']           = 768;

               $this->load->library('upload', $config);



               if ($this->upload->do_upload()) {

                    $imagedata = array('upload_data' => $this->upload->data());
                    $data = array(
                         "product_image" => $imagedata["upload_data"]["file_name"],
                         "product_name" => $this->input->post("fullname"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );

                    // print_r($data);

                    if ($this->common_model->updatedata("mk_master_product", $data, array("product_id" => $id)) == true) {
                         // print_r($data); 
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/products");
                    } else {
                         $this->session->set_flashdata('message', 'Data Not Updated Successfully');
                         return redirect("/dashboard/products");
                    }
               }
               else
               {
                    $data = array(
                         "product_name" => $this->input->post("fullname"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );
                    if ($this->common_model->updatedata("mk_master_product", $data, array("product_id" => $id)) == true) {
                         // print_r($data); 
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/products");
                    } else {
                         $this->session->set_flashdata('message', 'Data Not Updated Successfully');
                         return redirect("/dashboard/products");
                    }
               }
          }
     }

     /*
     This method is used for delete products
     */
     public function deleteproducts($id = "")
     {
          $data = array("is_active" => 0);
          if ($this->common_model->updatedata("mk_master_product", $data, array("product_id" => $id)) == true) {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/products");
          } else {
               $this->session->set_flashdata('message', 'Data Not Deleted Successfully');
               return redirect("dashboard/products");
          }
     }


     public function view_item($pid = "")
     {
          $data["user"] = $_SESSION;

          $data["title"] = "Products Item Page";

          $data["product_id"] = $pid;

          $data["products"] = $this->common_model->viewwheredata(array("product_id" => $pid, "is_active" => 1), "mk_master_product_item");

          $this->load->view("inc/header", $data);
          $this->load->view("dashboard/product/item_view", $data);
          $this->load->view("inc/footer", $data);
     }

     public function add_item()
     {
          $data["title"] = "Add Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");


          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/product/item_add', $data);
               $this->load->view("inc/footer", $data);
          } else {
               $config['upload_path']          = './uploads/';
               $config['allowed_types']        = 'gif|jpg|png|jpeg';

               $this->load->library('upload', $config);




               // $imagedata = array('upload_data' => $this->upload->data());

               $data = array(
                    // "item_image" => $imagedata["upload_data"]["file_name"],
                    "item_name" => $this->input->post("fullname"),
                    "partnumber" => $this->input->post("partnumber"),
                    "local_partnumber"=>$this->input->post("local_partnumber"),
                    "hsn" => $this->input->post("hsn"),
                    "unit_price" => $this->input->post("item_price"),
                    "tax_rate" => $this->input->post("tax_rate"),
                    "product_id" => $this->input->post("product"),
                    "created_by" => $this->session->userID,
                    "created_at" => date("Y-m-d h:i:s")
               );


               if ($this->products_model->adddata("mk_master_product_item", $data) == true) {
                    $this->session->set_flashdata('message', 'Data Inserted Successfully');
                    return redirect("/dashboard/products");
               }
          }
     }

     public function edit_item($id = null)
     {
          $data["title"] = "Edit Products Item";
          $data["error"] = "";
          $data["user"] = $_SESSION;



          $data["items"] = $this->common_model->viewwheredata(array("item_id" => $id), "mk_master_product_item");

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");


          $this->form_validation->set_rules('fullname', 'Fullname', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/product/item_edit', $data);
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
                         "partnumber" => $this->input->post("partnumber"),
                         "local_partnumber"=>$this->input->post("local_partnumber"),
                         "hsn" => $this->input->post("hsn"),
                         "unit_price" => $this->input->post("item_price"),
                         "tax_rate" => $this->input->post("tax_rate"),
                         "product_id" => $this->input->post("product"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );


                    if ($this->products_model->updatedata("mk_master_product_item", $data, array("item_id" => $id)) == true) {
                         echo "if condition";
                         // print_r($data);
                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/products");
                    }
               } else {
                    $data = array(
                         "item_name" => $this->input->post("fullname"),
                         "partnumber" => $this->input->post("partnumber"),
                         "local_partnumber"=>$this->input->post("local_partnumber"),
                         "unit_price" => $this->input->post("item_price"),
                         "hsn" => $this->input->post("hsn"),
                         "tax_rate" => $this->input->post("tax_rate"),
                         "product_id" => $this->input->post("product"),
                         "modified_by" => $this->session->userID,
                         "modified_at" => date("Y-m-d h:i:s")
                    );

                    if ($this->products_model->updatedata("mk_master_product_item", $data, array("item_id" => $id)) == true) {
                         echo "no image condition";

                         // print_r($data);

                         $this->session->set_flashdata('message', 'Data Updated Successfully');
                         return redirect("/dashboard/products");
                    }
                    // return redirect("/dashboard/products");
               }
          }
     }

     public function delete_item($id = null)
     {
          $data = array("is_active" => 0);
          if ($this->common_model->updatedata("mk_master_product_item", $data, array("item_id" => $id)) == true) {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/products");
          } else {
               $this->session->set_flashdata('message', 'Data Not Deleted Successfully');
               return redirect("dashboard/products");
          }
     }

     public function importproduct()
     {

        
               $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
               if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
                    $arr_file = explode('.', $_FILES['file']['name']);
                    $extension = end($arr_file);
                    if ('csv' == $extension) {
                         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    } else {
                         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    }
                    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();
                    // echo "<pre>";
                    // print_r($sheetData[0]);
                    $inserData = array();
                    $message = "";
                    $i = 0;
                    foreach ($sheetData as $data) {
                         $i++;
                         if ($i > 1) {
                              $inserData = array(
                                   "product_id" => $this->input->post("product_id"),
                                   "partnumber" => $data[0],
                                   "local_partnumber" => $data[1],
                                   "item_name" => $data[2],
                                   "hsn" => $data[3],
                                   "tax_rate" => $data[4],
                                   "unit_price" => $data[5]
                              );
                              // print_r($inserData);
                              if ($this->common_model->viewwheredata(array("partnumber" => $data[0],"product_id"=>$this->input->post("product_id")), "mk_master_product_item")) {
                                   $message = "Data already existed";
                              }
                              else
                              {
                                   if ($this->common_model->adddata("mk_master_product_item", $inserData)) {
                                        $message = "Data Inserted";
                                   } else {
                                        $message = "Data not Inserted";
                                   }

                              }
                         }
                    }

                    $this->session->set_flashdata('message', $message);
                    return redirect("dashboard/products");
               }
          
     }

     public function view_term()
     {
          $data["title"] = "Add Products Term";
          $data["terms"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $this->load->view("inc/header", $data);
          $this->load->view('dashboard/product/term_view', $data);
          $this->load->view("inc/footer", $data);
     }

     public function add_term()
     {
          $data["title"] = "Add Products Term";
          $data["error"] = "";
          $data["user"] = $_SESSION;

          $data["products"] = $this->common_model->viewdata("mk_master_product", "multiple");


          $this->form_validation->set_rules('terms', 'Terms', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/product/term_add', $data);
               $this->load->view("inc/footer", $data);
          } else {

               $data = array(
                    "term_name" => $this->input->post("terms"),
                    "created_by" => $this->session->userID,
                    "created_at" => date("Y-m-d h:i:s")
               );


               if ($this->products_model->adddata("mk_master_term", $data) == true) {
                    $this->session->set_flashdata('message', 'Data Inserted Successfully');
                    return redirect("dashboard/terms");
               } else {
                    $this->session->set_flashdata('message', 'Data Not Inserted Successfully');
                    return redirect("dashboard/terms");
               }
          }
     }

     public function edit_term($id = null)
     {
          $data["title"] = "Edit Products Term";
          $data["error"] = "";
          $data["user"] = $_SESSION;



          $data["terms"] = $this->common_model->viewwheredata(array("term_id" => $id), "mk_master_term");


          $this->form_validation->set_rules('terms', 'Terms', 'required');

          if ($this->form_validation->run() == FALSE) {
               $this->load->view("inc/header", $data);
               $this->load->view('dashboard/product/term_edit', $data);
               $this->load->view("inc/footer", $data);
          } else {

               $data = array(
                    "term_name" => $this->input->post("terms"),
                    "modified_by" => $this->session->userID,
                    "modified_at" => date("Y-m-d h:i:s")
               );


               if ($this->common_model->updatedata("mk_master_term", $data, array("term_id" => $id)) == true) {
                    $this->session->set_flashdata('message', 'Data Updated Successfully');
                    return redirect("dashboard/terms");
               } else {
                    $this->session->set_flashdata('message', 'Data Not Updated Successfully');
                    return redirect("dashboard/terms");
               }
          }
     }

     public function delete_term($id = null)
     {
          $data = array("is_active" => 0);
          if ($this->common_model->updatedata("mk_master_term", $data, array("term_id" => $id)) == true) {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/terms");
          } else {
               $this->session->set_flashdata('message', 'Data Deleted Successfully');
               return redirect("dashboard/terms");
          }
     }
}
