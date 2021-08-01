<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();

     }

     public function generate_pdf($lead_id = "", $customer_id = "")
     {
          //     load library
          $dompdf = new Dompdf\Dompdf();

          //     $data["testing"] = "Karthik";

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["service_item"] = $this->common_model->viewdata("mk_master_service_item", "multiple");



          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          

          $total_price = 0;
          foreach ($data["customer_item"] as $customer_item) {
               $total_price = $total_price + $customer_item["total_price"];
          }
          //     echo $total_price;
          $pdf = base_url() . "dashboard/lead/generate_quotation/" . $lead_id . "/" . $customer_id;
          $insertdata = array(
               "quotation_no" => time(),
               "lead_id" => $lead_id,
               "pdf" => $pdf,
               "item_total" => $total_price,
               "customer_id" => $customer_id

          );

          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");

          if ($datacheck) {
               $insertdata["modified_by"] = $this->session->userID;
               $insertdata["modified_at"] = date("Y-m-d h:i:s");

               if ($this->common_model->updatedata("mk_quotation", $insertdata, array("lead_id" => $lead_id, "customer_id" => $customer_id))) {
                    echo "Data Updated";
               }
          } else {
               $insertdata["created_by"] = date("Y-m-d h:i:s");
               $insertdata["created_at"] = $this->session->userID;
               if ($this->common_model->adddata("mk_quotation", $insertdata)) {
                    echo "Data Inserted";
               }
          }
          // print_r($datacheck);
          // die();

          // $this->load->view('dashboard/leads/pdf_quotation',$data);

          //     return false;

          $html = $this->load->view('dashboard/leads/pdf_quotation', $data, true);

          $dompdf->loadHtml($html);

          // (Optional) Setup the paper size and orientation
          $dompdf->setPaper('A4', 'portrait');

          // Render the HTML as PDF
          $dompdf->render();

          // Get the generated PDF file contents
          $pdf = $dompdf->output();

          // Output the generated PDF to Browser
          $dompdf->stream(time() . ".pdf");
     }

     public function view_quotation($lead_id = "", $customer_id = "")
     {
          //     load library
          $dompdf = new Dompdf\Dompdf();

          //     $data["testing"] = "Karthik";

          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["service_item"] = $this->common_model->viewdata("mk_master_service_item", "multiple");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $total_price = 0;

          foreach ($data["customer_item"] as $customer_item) {
               $total_price = $total_price + $customer_item["total_price"];
          }
          //     echo $total_price;
          $pdf = base_url() . "dashboard/lead/generate_quotation/" . $lead_id . "/" . $customer_id;

          $insertdata = array(
               "quotation_no" => time(),
               "lead_id" => $lead_id,
               "pdf" => $pdf,
               "item_total" => $total_price,
               "customer_id" => $customer_id

          );

          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");

          if ($datacheck) {
               $insertdata["modified_by"] = $this->session->userID;
               $insertdata["modified_at"] = date("Y-m-d h:i:s");

               if ($this->common_model->updatedata("mk_quotation", $insertdata, array("lead_id" => $lead_id, "customer_id" => $customer_id))) {
                    // echo "Data Updated";
               }
          } else {
               $insertdata["created_by"] = $this->session->userID;
               $insertdata["created_at"] = date("Y-m-d h:i:s");
               if ($this->common_model->adddata("mk_quotation", $insertdata)) {
                    //     echo "Data Inserted";
               }
          }

          $data["quotation"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");

          // print_r($data["quotation"]); die();

          if ($data["quotation"]) {

               $qid = $this->input->get("qid");

               $data["qid"] = ($qid) ? $qid : $data["quotation"][0]["quotation_id"];

               $data["order"] = $this->common_model->viewwheredata(array("quotation_id" => $data["qid"]), "mk_order_assign");

               $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");

               $insertdata = array(
                    "quotation_id" => $data["qid"],
                    "lead_id" => $lead_id,
                    "order_no" => "ORD_" . time(),
                    "payment" => "no",
                    "status" => 1,
                    "approved" => "no",
               );





               $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $data["qid"]), "mk_order");


               $quotation = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $data["qid"]), "mk_quotation");

               if ($quotation) {
                    $customer = $this->common_model->viewwheredata(array("customer_id" => $quotation[0]["customer_id"]), "mk_customer");

                    if ($datacheck) {
                         $insertdata["modified_by"] = $this->session->userID;
                         $insertdata["modified_at"] = date("Y-m-d h:i:s");

                         $array = array(
                              "lead_id" => $lead_id,
                              "quotation_id" => $data["qid"]
                         );

                         if ($this->common_model->updatedata("mk_order", $insertdata, $array)) {
                              // $customer[0]["mobile"]
                              if($this->input->get("email"))
                              {
                                   if ($this->email_template_2($customer[0]["email"], $quotation[0]["pdf"])) {
                                        // $sms = $this->sms_template_2($customer[0]["mobile"], $this->input->post("mobile"));
                                        // echo $sms;
                                        // echo json_encode(array("message" => "Data and mail sent successfully"));
                                   } else {
                                        // echo json_encode(array("message" => "Mail not sent"));
                                   }
                              }
                              
                              $this->session->set_flashdata('message_name', 'Order Data Updated');
                              // return redirect("/dashboard/leads/assign/".$lead_id);
                         }
                    } else {

                         $insertdata["created_by"] = $this->session->userID;
                         $insertdata["created_at"] = date("Y-m-d h:i:s");

                         if ($this->common_model->adddata("mk_order", $insertdata)) {
                              if($this->input->get("email"))
                              {
                                   if ($this->email_template_2($customer[0]["email"],$data["quotation"][0]["pdf"])) {
                                        // $sms = $this->sms_template_2($customer[0]["mobile"], $this->input->post("mobile"));
                                        // echo $sms;
                                        // echo json_encode(array("message" => "Data and mail sent successfully"));
                                   } else {
                                        // echo json_encode(array("message" => "Mail not sent"));
                                   }
                              }
                              
                         }
                    }
               }
          }




          $this->load->view('dashboard/leads/pdf_quotation', $data);

          return false;
     }

     public function generate_quotation($lead_id = "", $customer_id = "")
     {


          $data["customer"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer");

          $data["custAddress"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_address");

          $data["product_item"] = $this->common_model->viewdata("mk_master_product_item", "multiple");

          $data["service_item"] = $this->common_model->viewdata("mk_master_service_item", "multiple");

          $data["customer_item"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id, "lead_id" => $lead_id, "is_active" => 1), "mk_customer_item");

          $data["master_term"] = $this->common_model->viewdata("mk_master_term", "multiple");

          $data["customer_term"] = $this->common_model->viewwheredata(array("customer_id" => $customer_id), "mk_customer_term");

          $data["lead"] = $this->common_model->viewwheredata(array("id" => $lead_id), "mk_lead");

          $data["quotation"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");



          $qid = $this->input->get("qid");

          $data["qid"] = ($qid) ? $qid : $data["quotation"][0]["quotation_id"];

          if ($data["quotation"]) {
               $data["order"] = $this->common_model->viewwheredata(array("quotation_id" => $data["qid"]), "mk_order_assign");
          }




          // print_r($data["qid"]); die();    

          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "customer_id" => $customer_id), "mk_quotation");

          $insertdata = array(
               "quotation_id" => $data["qid"],
               "lead_id" => $lead_id,
               "order_no" => "ORD_" . time(),
               "status" => 1,
          );





          $datacheck = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $data["qid"]), "mk_order");


          $quotation = $this->common_model->viewwheredata(array("lead_id" => $lead_id, "quotation_id" => $data["qid"]), "mk_quotation");

          if ($quotation) {
               $customer = $this->common_model->viewwheredata(array("customer_id" => $quotation[0]["customer_id"]), "mk_customer");

               if ($datacheck) {
                    $insertdata["modified_by"] = $this->session->userID;
                    $insertdata["modified_at"] = date("Y-m-d h:i:s");

                    $array = array(
                         "lead_id" => $lead_id,
                         "quotation_id" => $data["qid"]
                    );

                    if ($this->common_model->updatedata("mk_order", $insertdata, $array)) {
                         $customer[0]["mobile"];
                         if($this->input->get("email"))
                         {
                              if ($this->email_template_2($customer[0]["email"], $quotation[0]["pdf"])) {
                                   // $sms = $this->sms_template_2($customer[0]["mobile"], $this->input->post("mobile"));
                                   // echo $sms;
                                   // echo json_encode(array("message" => "Data and mail sent successfully"));
                              } else {
                                   // echo json_encode(array("message" => "Mail not sent"));
                              }
                         }
                         
                         $this->session->set_flashdata('message_name', 'Order Data Updated');
                         // return redirect("/dashboard/leads/assign/".$lead_id);
                    }
               } else {

                    $insertdata["created_by"] = $this->session->userID;
                    $insertdata["created_at"] = date("Y-m-d h:i:s");

                    if ($this->common_model->adddata("mk_order", $insertdata)) {
                         if($this->input->get("email"))
                         {
                              if ($this->email_template_2($customer[0]["email"], $data["quotation"][0]["pdf"])) {
                                   // $sms = $this->sms_template_2($customer[0]["mobile"], $this->input->post("mobile"));
                                   // echo $sms;
                                   // echo json_encode(array("message" => "Data and mail sent successfully"));
                              } else {
                                   // echo json_encode(array("message" => "Mail not sent"));
                              }

                         }
                        
                    }
               }
          }

          $data["orders"] = $this->common_model->viewwheredata(array("lead_id" => $lead_id),"mk_order");

          // print_r($data["orders"]); die();


          $this->load->view('dashboard/leads/generate_quotation', $data);
     }

     public function email_template_2($customer_email = "", $attachment = "")
     {

          // die($attachment);

          $to = $customer_email;
          $subject = "Query Mail";

          $message = '
          <!DOCTYPE html>
          <html lang="en">
          
          <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>cofirmation Email</title>
          </head>
          
          <body>
               <h5>Dear Customer</h5>
               <p>
                    We would like to thank you for your order and giving us an opportunity to serve you.
               </p>
               <p>
                    As per our record, your order would be dispatched soon and the intimation of the same would be sent to you, either by call or Email.
               </p>
               <p>
                    Our team is working on the reconciliation of Payments, against this order, you will soon hear from us.
               </p>
               <p>
                    In case of further details, resolution of your queries, You may write us at ravi@medikart.co.in Or Call at +91-7290033617 Or
                     WhatsApp Chat on the same No.- we would reply and resolve your queries at the earliest
               </p>
               <p>Here we have attach you quotation link</p>
               <a href="'.$attachment.'">Quotation</a>
               <p>
                    For Escalation: Email at varun.vaidya@medikart.co.in
               </p>
               <p>
                    Regards
               </p>
               <p>
                    MediKart
               </p>
               <iframe src="' . $attachment . '" width="100%" height="100%"></iframe>
          </body>
          
          </html>
          ';

          // Always set content-type when sending HTML email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <'. $this->session->email.'>' . "\r\n";
          // $headers .= 'Cc: myboss@example.com' . "\r\n";

          if (mail($to, $subject, $message, $headers)) {
               return true;
          } else {
               return false;
          }
     }

     public function sms_template_2($customer = "", $order = "", $mobile = "")
     {

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20" . $customer . "%20Thanks%20for%20contacting%20Medikart,%20and%20enquiry%20for%20Medical%20Devices/%20Service%20.%20Our%20representative%20has%20spoken%20to%20you%20,hope%20the%20query%20resolved%20and%20got%20the%20appropriate%20reply.%20If%20not%20,you%20can%20email%20at%20info@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";

          // echo $url;

          $url_one = $url;
          $url_two = "";

          $user_agent = 'Mozilla HotFox 1.0';

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url_one . $url_two);
          curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_NOBODY, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 30);
          $res = curl_exec($ch);
          curl_close($ch);

          // echo $res;
     }

     public function sms_template_1($customer = "", $mobile = "", $order = "")
     {
          // $order = "Dear {#var#} Thanks for contacting Medikart, and enquiry for Medical Devices/ Service . Our representative has spoken to you ,hope the query resolved and got the appropriate reply. If not ,you can email at info@medikart.co.in";

          $url = "http://nimbusit.info/api/pushsms.php?user=103058&key=010GT0u30GpTkSUgnlro&%20sender=MDKART&mobile=" . $mobile . "&%20text=Dear%20" . $customer . "%20Thanks%20for%20your%20order%20for%20" . $order . "%20Your%20order%20has%20been%20punched%20in%20our%20system%20The%20status%20of%20dispatch%20will%20be%20intimated%20to%20you%20soon%20If%20you%20dont%20receive%20any%20intimation%20,%20Please%20email%20at%20.%20customercare@medikart.co.in%20&%20entityid=1501651890000015375&templateid=1507162262983788026";

          // echo $url;

          $url_one = $url;
          $url_two = "";

          $user_agent = 'Mozilla HotFox 1.0';

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url_one . $url_two);
          curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_NOBODY, 0);
          curl_setopt($ch, CURLOPT_TIMEOUT, 30);
          $res = curl_exec($ch);
          curl_close($ch);

          echo $res;
     }
}