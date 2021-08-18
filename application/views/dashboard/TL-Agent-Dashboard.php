<div class="main-panel page has-sidebar-left height-full">
     <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">

          <div class="col-sm-12 bg-white p-3">
               <div class="page-header">
                    <h3 class="page-title">
                         <span class="page-title-icon bg-gradient-primary text-white mr-2">
                              <i class="mdi mdi-home"></i>
                         </span> Dashboard
                    </h3>
               </div>
               <div class="row">
               
               <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-danger card-img-holder text-white">
                              <div class="card-body">

                                   <h4 class="font-weight-normal mb-3">Total Leads Punch <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table-sm table-bordred">
                                             <tr>
                                                  <tH>Name</th>
                                                  <th>Agent Name</th>
                                                  <th>Office Phone</th>
                                                  <th>Email Address</th>
                                                  <th>Date Created</th>
                                                  <th>Actions</th>
                                             </tr>
                                             <?php $i = 0;
                                             $agent_name = "";
                                             foreach ($approved_leads as $leads) : $i++;
                                                  foreach ($agents as $agent) :
                                                       if ($agent["id"]==$this->session->userID && $agent["id"] == $leads["assigned_to"]) {
                                                            $agent_name = $agent["firstname"];
                                                       }
                                                  endforeach;
                                             ?>
                                                  <?php if ($i <= 5 && $agent_name) : ?>
                                                       <tr>
                                                            <td><?= $leads["name"] ?></td>
                                                            <td class="text-capitalize"> <?= $agent_name ?></td>
                                                            <td><?= $leads["mobile"] ?></td>
                                                            <td><?= $leads["email"] ?></td>
                                                            <td><?= $leads["created_at"] ?></td>
                                                            <td>
                                                                 <a href="<?= base_url() ?>dashboard/edit/leads/<?= $leads["id"] ?>" class="btn btn-warning  btn-sm  mt-2">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" data-id="<?= $leads["id"] ?>" class="btn btn-primary lead-data  btn-sm  mt-2">
                                                                      <i class="fa fa-eye"></i>
                                                                 </a>
                                                            </td>
                                                       </tr>
                                             <?php endif;
                                             endforeach; ?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-primary card-img-holder text-white">
                              <div class="card-body">

                                   <h4 class="font-weight-normal mb-3">Log Calls <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table-sm table-bordred">
                                             <tr>
                                                  <tH>Close</th>
                                                  <th>Subject </th>
                                                  <th>Related to</th>
                                                  <th>Date & Time</th>
                                                  <th>Accept</th>
                                                  <th>Status</th>
                                                  <th>Actions</th>
                                             </tr>
                                             <?php $i = 0;
                                             foreach ($logcalls as $logs) : $i++; ?>
                                                  <?php if ($i <= 5 && $logs["assigned_to"] == $this->session->userID) :

                                                  ?>
                                                       <tr>
                                                            <td><big>&times;</big></td>
                                                            <td><?= $logs["subject"] ?></td>
                                                            <td><?= $logs["related_to"] ?></td>
                                                            <td><?= $logs["start_date_time"] ?></td>
                                                            <td>Accepted</td>
                                                            <td><?= $logs["status"] ?></td>
                                                            <td>
                                                                 <a href="javascript:void(0)" data-id="<?= $logs["id"] ?>" class="btn btn-warning updatelogcall  btn-sm  mt-2">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" data-id="<?= $logs["id"] ?>" class="btn btn-primary  btn-sm  mt-2 viewlogcalls">
                                                                      <i class="fa fa-eye"></i>
                                                                 </a>
                                                            </td>
                                                       </tr>
                                             <?php endif;
                                             endforeach; ?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-warning card-img-holder text-white">
                              <div class="card-body">

                                   <h4 class="font-weight-normal mb-3">Meetings<i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                             <tr>
                                                  <tH>Close</th>
                                                  <th>Subject </th>
                                                  <th>Related to</th>
                                                  <th>Date & Time</th>
                                                  <th>Accept</th>

                                                  <th>Actions</th>
                                             </tr>
                                             <?php $i = 0;
                                             foreach ($meetings as $meet) : $i++; ?>
                                                  <?php if ($i <= 5 && $meet["assigned_to"] == $this->session->userID) : ?>
                                                       <tr>
                                                            <td><big>&times;</big></td>
                                                            <td><?= $meet["subject"] ?></td>
                                                            <td><?= $meet["related_to"] ?></td>
                                                            <td><?= $meet["start_date_time"] ?></td>
                                                            <td>Accepted</td>

                                                            <td>
                                                                 <a href="javascript:void(0)" data-id="<?= $meet["id"] ?>" class="btn btn-warning updatemeeting  btn-sm  mt-2">
                                                                      <i class="fa fa-pencil"></i>
                                                                 </a>
                                                                 <a href="javascript:void(0)" data-id="<?= $meet["id"] ?>" class="btn btn-primary  btn-sm  mt-2 viewmeeting">
                                                                      <i class="fa fa-eye"></i>
                                                            </td>
                                                       </tr>
                                             <?php endif;
                                             endforeach; ?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-success card-img-holder text-white">
                              <div class="card-body">

                                   <h4 class="font-weight-normal mb-3">Total Quotations <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                             <tr>
                                                  <tH>QUOTATION NUMBER</th>
                                                  <th>LEAD ID</th>
                                                  <th>CUSTOMER</th>
                                                  <!-- <th></th> -->
                                                  <th>Date & Time</th>

                                                  <th>Actions</th>
                                             </tr>
                                             <?php $i = 0;
                                             foreach ($quotations as $quotation) : $i++; ?>
                                                  <?php if ($i <= 5) : ?>
                                                       <tr>

                                                            <td><?= $quotation->quotation_no ?></td>
                                                            <td><?= $quotation->lead_id ?></td>
                                                            <td><?= $quotation->customer_id ?></td>
                                                            <td><?= $quotation->created_at ?></td>

                                                            <td>

                                                                 <a href="<?= base_url() ?>dashboard/lead/view_quotation/<?= $quotation->lead_id ?>/<?= $quotation->customer_id ?>" class="btn btn-primary btn-sm">
                                                                      <i class="fa fa-eye"></i>
                                                                 </a>
                                                            </td>
                                                       </tr>
                                             <?php endif;
                                             endforeach; ?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-info card-img-holder text-white">
                              <div class="card-body">

                                   <h4 class="font-weight-normal mb-3">Total Orders<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
                                        <table class="table-sm table-bordered bg-white">
                                             <tr>
                                                  <th>SI NO</th>
                                                  <th>LEAD ID</th>
                                                  <th>AGENT NAME</th>
                                                  <th>ITEM NAME</th>
                                                  <th>ORDER NO</th>
                                                  <th>PAYMENT</th>
                                                  <th>DECISION</th>
                                                  <th>APPROVED</th>
                                                  <th>STATUS</th>
                                                  <th>ACTIONS</th>
                                             </tr>
                                             <?php $i = 0;
                                             $customer = $agent_name = $agent = $s_item_name = $p_item_name = $product_item_id = $service_item_id = $assign_date = "";

                                             foreach ($orders as $order) :
                                                  $i++;
                                                  if ($i <= 5) :
                                                       foreach ($orders_assign as $order_assign) :
                                                            if ($order_assign->order_id == $order->order_id) :
                                                                 $agent = $order_assign->agent_id;
                                                                 $assign_date = $order_assign->created_at;
                                                            endif;
                                                       endforeach;

                                                       foreach ($agents as $agent_list) :
                                                            if ($agent == $agent_list["id"]) :
                                                                 $agent_name = $agent_list["firstname"];
                                                            endif;
                                                       endforeach;

                                                       foreach ($cus_items as $cus_item) :
                                                            if ($cus_item->lead_id == $order->lead_id && $cus_item->item_type == "product") :
                                                                 $product_item_id = $cus_item->item_id;
                                                                 $customer = $cus_item->customer_id;
                                                            endif;
                                                            if ($cus_item->lead_id == $order->lead_id && $cus_item->item_type == "service") :
                                                                 $service_item_id = $cus_item->item_id;
                                                                 $customer = $cus_item->customer_id;
                                                            endif;
                                                       endforeach;

                                                       foreach ($service_items as $service_item) :
                                                            if ($service_item_id == $service_item->item_id) :
                                                                 $s_item_name = $service_item->item_name;
                                                            endif;
                                                       endforeach;

                                                       foreach ($product_items as $product_item) :
                                                            if ($product_item_id == $product_item->item_id) :
                                                                 $p_item_name = $product_item->item_name;
                                                            endif;
                                                       endforeach;
                                             ?>
                                                       <tr class="<?= ($order->payment == "yes") ? "alert alert-success" : "alert alert-danger" ?>">
                                                            <td><?= $i; ?></td>
                                                            <td><?= $order->lead_id ?></td>
                                                            <td class="text-capitalize"><?= $agent_name ?></td>
                                                            <td><?= ($s_item_name) ? $s_item_name : $p_item_name ?></td>
                                                            <td><?= $order->order_no; ?></td>
                                                            <td><?= $order->payment ?></td>
                                                            <td><?= $order->decision ?></td>
                                                            <td><?= $order->approved ?></td>
                                                            <td><?= $assign_date ?></td>
                                                            <td>
                                                                 <!-- <a href="<?= base_url() ?>dashboard/operation/order/assign/<?= $order->order_id ?>" title="Assign Leads" class="btn btn-primary btn-sm  mt-2">
                                                                      <i class="fa fa-user"></i></a> -->
                                                                 <a href="<?= base_url() ?>dashboard/lead/generate_quotation/<?= $order->lead_id ?>/<?= $customer ?>" title="Assign Leads" class="btn btn-primary  btn-sm  mt-2">
                                                                      <i class="fa fa-eye"></i>
                                                                 </a>

                                                            </td>
                                                       </tr>
                                             <?php endif;
                                             endforeach; ?>
                                        </table>
                                   </div>

                              </div>
                         </div>
                    </div>
               </div>



          </div>

     </div>

</div>
</div>

<div class="modal bd-example-modal-lg" id="edit-opportunity">
     <div class="modal-dialog modal-md">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Edit Opportunity</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form method="POST" action="" id="edit-oppo" class="oppo-form">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <div class="col-sm-12">
                              <div class="row">


                                   <div class="col-sm-12 row">
                                        <input type="hidden" name="lead_id" value="" />
                                        <input type="hidden" name="opportunity_id" id="opportunity_id">
                                        <div class="col-sm-6 form-group">
                                             <label for="">Opportunity Name</label>
                                             <input type="text" name="opportunity_name" id="opportunity_name" class="form-control border-bottom">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                             <label for="">Expected Amount</label>
                                             <input type="text" name="exp_amount" id="exp_amount" class="form-control border-bottom">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                             <label for="">Expected Date</label>
                                             <input type="date" name="exp_date" id="exp_date" class="form-control border-bottom">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                             <label for="">Status</label>
                                             <select name="status" id="status" class="form-control border-bottom">
                                                  <option value="1">Active</option>
                                                  <option value="2">Inactive</option>
                                             </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                             <label for="">Remarks</label>
                                             <input type="text" name="remarks" id="remarks" class="form-control border-bottom">
                                        </div>

                                   </div>



                              </div>
                         </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <div class="col-sm-12 row">
                              <div class="col">
                                   <input type="submit" value="UPDATE & CLOSE" class="btn btn-success">
                                   <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                              </div>
                         </div>

                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal bd-example-modal-lg" id="updatemeeting">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">UPDATE MEETING</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form class="edit_meeting_form" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <div class="col-sm-12">
                              <div class="row">
                                   <input type="hidden" id="meactivity_id" name="mactivity_id" />
                                   <input type="hidden" id="lead_id" name="lead_id" value="" />
                                   <div class="form-group col-sm-6">
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" id="msubject" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Status</label>
                                        <select name="status" id="mstatus" class="form-control border-bottom">
                                             <option>Planned</option>
                                             <option>Held</option>
                                             <option>Not Held</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Start date</label>
                                        <input type="text" id="startDate" name="fromdate" class="form-control border-bottom mfromdate">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Related to</label>
                                        <select class="form-control border-bottom" id="mrelated_to" name="related_to">
                                             <option value="account">Account</option>
                                             <option value="contact">Contact</option>
                                             <option value="task">Task</option>
                                             <option value="opportunity">Opportunity</option>
                                             <option value="bug">Bug</option>
                                             <option value="case">Case</option>
                                             <option value="lead">Lead</option>
                                             <option value="project">Project</option>
                                             <option value="project_task">Project Task</option>
                                             <option value="targe">Target</option>
                                             <option value=contract"">Contract</option>
                                             <option value="invoice">Invoice</option>
                                             <option value="quote">Quote</option>
                                             <option value="product">Product</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        &nbsp;
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <input type="text" name="parent_name" id="mparent_name" value="<?= $this->session->name ?>" class="form-control border-bottom" id="">
                                   </div>

                                   <div class="form-group col-sm-6">
                                        <label for="">End date</label>
                                        <input type="text" name="todate" id="endDate" class="form-control border-bottom mtodate endDate">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Location</label>
                                        <input type="text" name="location" id="mlocation" class="form-control border-bottom">
                                   </div>

                                   <div class="form-group col-sm-6">
                                        <label for="">Reminder</label><br />
                                        <input type="checkbox" name="reminder" id="mreminder" value="1" class="form-control-check"> Remind me
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Assigned to</label>
                                        <input type="text" name="assigned_name" id="massigned" class="form-control border-bottom">
                                        <input type="hidden" name="assigned_to" id="massigned_id" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="mdescription" class="form-control border-bottom" rows="5"></textarea>
                                   </div>

                              </div>
                         </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <div class="col-sm-12 row">
                              <div class="col">
                                   <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-success" value="UPDATE & CLOSE">
                                   </div>
                              </div>
                         </div>

                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal bd-example-modal-lg" id="updatelogcall">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">UPDATE LOG CALL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form class="editlogform" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <div class="col-sm-12">
                              <div class="row">
                                   <input type="hidden" id="logactivity_id" class="logactivity_id" name="lactivity_id" />
                                   <input type="hidden" id="lead_id" name="lead_id" value="" />
                                   <div class="form-group col-sm-6">
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" id="lsubject" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Status</label>
                                        <div class="row">
                                             <div class="col-sm-6">
                                                  <select name="direction" id="ldirection" class="form-control border-bottom">
                                                       <option>Inbound</option>
                                                       <option>Outbound</option>
                                                  </select>
                                             </div>
                                             <div class="col-sm-6">
                                                  <select name="status" id="lstatus" class="form-control border-bottom">
                                                       <option>Planned</option>
                                                       <option>Held</option>
                                                       <option>Not Held</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Communication Preferred</label>
                                        <select name="communication" id="lcommunication" class="form-control border-bottom">
                                             <option value="whatsapp">Whatsapp</option>
                                             <option value="email">Email</option>
                                             <option value="call">Call</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Lead Possibility</label>
                                        <select name="lead_possibility" id="lead_possibility" class="form-control border-bottom">
                                             <option value="qualified">Qualified</option>
                                             <option value="disqualified">Disqualified</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Start date</label>
                                        <input type="text" name="fromdate" id="fromdate" class="form-control border-bottom lfromdate">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Related to</label>
                                        <input type="text" name="related_to" class="form-control border-bottom" id="lrelated_to">
                                   </div>


                                   <div class="form-group col-sm-6">
                                        <label for="">Reminder</label><br />
                                        <input type="checkbox" name="reminder" id="lreminder" value="1" class="form-control-check"> Remind me
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Assigned to</label>
                                        <input type="text" name="assigned_name" id="lassigned" class="form-control border-bottom">
                                        <input type="hidden" name="assigned_to" id="lassigned_id" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="ldescription" class="form-control border-bottom" rows="5"></textarea>
                                   </div>

                              </div>
                         </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <div class="col-sm-12 row">
                              <div class="col">
                                   <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-success" value="UPDATE & CLOSE">
                                   </div>
                              </div>
                         </div>

                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal bd-example-modal-lg" id="viewlogcalls">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">VIEW LOG CALL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form class="editlogform" method="post" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body">
                         <div class="col-sm-12">
                              <div class="row">
                                   <input type="hidden" id="logactivity_id" class="logactivity_id" name="lactivity_id" />
                                   <input type="hidden" id="lead_id" name="lead_id" value="" />
                                   <div class="form-group col-sm-6">
                                        <label for="">Subject</label>
                                        <input type="text" name="subject" disabled id="v_lsubject" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Status</label>
                                        <select name="status" disabled id="v_lstatus" class="form-control border-bottom">
                                             <option>Planned</option>
                                             <option>Held</option>
                                             <option>Not Held</option>
                                        </select>

                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Status</label>
                                        <select name="direction" disabled id="v_ldirection" class="form-control border-bottom">
                                             <option>Inbound</option>
                                             <option>Outbound</option>
                                        </select>

                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Communication Preferred</label>
                                        <select name="communication" disabled id="v_lcommunication" class="form-control border-bottom">
                                             <option value="whatsapp">Whatsapp</option>
                                             <option value="email">Email</option>
                                             <option value="call">Call</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Lead Possibility</label>
                                        <select name="lead_possibility" disabled id="v_lead_possibility" class="form-control border-bottom">
                                             <option value="qualified">Qualified</option>
                                             <option value="disqualified">Disqualified</option>
                                        </select>
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Start date</label>
                                        <input type="text" name="fromdate" disabled id="v_fromdate" class="form-control border-bottom v_lfromdate">
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Related to</label>
                                        <!-- <input type="text" name="related_to" class="form-control border-bottom" id="lrelated_to"> -->
                                        <select class="form-control border-bottom" disabled name="related_to" id="v_lrelated_to">
                                             <option value="account">Account</option>
                                             <option value="contact">Contact</option>
                                             <option value="task">Task</option>
                                             <option value="opportunity">Opportunity</option>
                                             <option value="bug">Bug</option>
                                             <option value="case">Case</option>
                                             <option value="lead">Lead</option>
                                             <option value="project">Project</option>
                                             <option value="project_task">Project Task</option>
                                             <option value="targe">Target</option>
                                             <option value=contract"">Contract</option>
                                             <option value="invoice">Invoice</option>
                                             <option value="quote">Quote</option>
                                             <option value="product">Product</option>
                                        </select>
                                   </div>


                                   <div class="form-group col-sm-6">
                                        <label for="">Reminder</label><br />
                                        <input type="checkbox" name="reminder" disabled id="v_lreminder" value="1" class="form-control-check"> Remind me
                                   </div>
                                   <div class="form-group col-sm-6">
                                        <label for="">Assigned to</label>
                                        <input type="text" name="assigned_name" disabled id="v_lassigned" class="form-control border-bottom">
                                        <input type="hidden" name="assigned_to" disabled id="v_lassigned_id" class="form-control border-bottom">
                                   </div>
                                   <div class="form-group col-sm-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="v_ldescription" disabled class="form-control border-bottom" rows="5"></textarea>
                                   </div>

                              </div>
                         </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                         <div class="col-sm-12 row">
                              <div class="col">
                                   <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-success" data-dismiss="modal" value="CLOSE">
                                   </div>
                              </div>
                         </div>

                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal bd-example-modal-lg" id="viewmeeting">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">VIEW MEETING</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                    <div class="col-sm-12">
                         <div class="row">
                              <input type="hidden" id="meactivity_id" name="mactivity_id" />
                              <input type="hidden" id="lead_id" name="lead_id" value="" />
                              <div class="form-group col-sm-6">
                                   <label for="">Subject</label>
                                   <input type="text" name="subject" disabled id="v_msubject" class="form-control border-bottom">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Status</label>
                                   <select name="status" id="v_mstatus" disabled class="form-control border-bottom">
                                        <option>Planned</option>
                                        <option>Held</option>
                                        <option>Not Held</option>
                                   </select>
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Start date</label>
                                   <input type="text" id="v_startDate" disabled name="fromdate" class="form-control border-bottom v_mfromdate">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Related to</label>
                                   <select class="form-control border-bottom" disabled id="v_mrelated_to" name="related_to">
                                        <option value="account">Account</option>
                                        <option value="contact">Contact</option>
                                        <option value="task">Task</option>
                                        <option value="opportunity">Opportunity</option>
                                        <option value="bug">Bug</option>
                                        <option value="case">Case</option>
                                        <option value="lead">Lead</option>
                                        <option value="project">Project</option>
                                        <option value="project_task">Project Task</option>
                                        <option value="targe">Target</option>
                                        <option value=contract"">Contract</option>
                                        <option value="invoice">Invoice</option>
                                        <option value="quote">Quote</option>
                                        <option value="product">Product</option>
                                   </select>
                              </div>
                              <div class="form-group col-sm-6">
                                   &nbsp;
                              </div>
                              <div class="form-group col-sm-6">
                                   <input type="text" name="parent_name" disabled id="v_mparent_name" value="<?= $this->session->name ?>" class="form-control border-bottom" id="">
                              </div>

                              <div class="form-group col-sm-6">
                                   <label for="">End date</label>
                                   <input type="text" name="todate" disabled id="v_endDate" class="form-control border-bottom v_mtodate endDate">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Location</label>
                                   <input type="text" name="location" disabled id="v_mlocation" class="form-control border-bottom">
                              </div>

                              <div class="form-group col-sm-6">
                                   <label for="">Reminder</label><br />
                                   <input type="checkbox" name="reminder" disabled id="v_mreminder" value="1" class="form-control-check"> Remind me
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Assigned to</label>
                                   <input type="text" name="assigned_name" id="v_massigned" class="form-control border-bottom">
                                   <input type="hidden" name="assigned_to" id="v_massigned_id" class="form-control border-bottom">
                              </div>
                              <div class="form-group col-sm-12">
                                   <label for="">Description</label>
                                   <textarea name="description" id="v_mdescription" disabled class="form-control border-bottom" rows="5"></textarea>
                              </div>

                         </div>
                    </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                    <div class="col-sm-12 row">
                         <div class="col">
                              <div class="form-group col-sm-12">
                                   <input type="button" class="btn btn-success" data-dismiss="modal" value="CLOSE">
                              </div>
                         </div>
                    </div>

               </div>

          </div>
     </div>
</div>

<div class="modal bd-example-modal-lg" id="lead-details">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Lead Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item">
                              <a class="nav-link active" id="lcontact-tab" data-toggle="tab" href="#lcontact" role="tab" aria-controls="lcontact" aria-selected="false">Approved Quotations</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" id="lprofile-tab" data-toggle="tab" href="#lprofile" role="tab" aria-controls="lprofile" aria-selected="false">Completed Quotations</a>
                         </li>

                    </ul>
                    <div class="tab-content" id="myTabContent bg-white">



                         <div class="tab-pane fade bg-white active show" id="lprofile" role="tabpanel" aria-labelledby="lprofile-tab">
                              <div class="table-responsive">
                                   <table class="table table-bordred">
                                        <thead>
                                             <tr>
                                                  <th>Customer Name</th>
                                                  <!-- <th>Agent Name</th> -->
                                                  <th>Customer Phone</th>
                                                  <th>Customer Email</th>
                                                  <th>Date Created</th>
                                             </tr>
                                        </thead>
                                        <tbody class="order-lead">

                                        </tbody>
                                   </table>
                              </div>
                         </div>

                         <div class="tab-pane fade bg-white" id="lcontact" role="tabpanel" aria-labelledby="lcontact-tab">
                              <div class="table-responsive">
                                   <table class="table table-bordred">
                                        <thead>
                                             <tr>
                                                  <th>Customer Name</th>
                                                  <!-- <th>Agent Name</th> -->
                                                  <th>Customer Phone</th>
                                                  <th>Customer Email</th>
                                                  <th>Date Created</th>
                                             </tr>
                                        </thead>
                                        <tbody class="quotation-leads">

                                        </tbody>
                                   </table>
                              </div>
                         </div>

                    </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                    <div class="col-sm-12 row">
                         <div class="col">
                              <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                         </div>
                    </div>

               </div>

          </div>
     </div>
</div>


<script>
     $(document).ready(function() {

          $(document).on("click", ".lead-data", function() {
               var lead_id = $(this).data("id");
               $("#lead-details").modal("show");

               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/getleads",
                    data: {
                         lead_id: lead_id
                    },
                    success: function(status) {
                         var html = html1 = html2 = html3 = "";
                         lead_data = JSON.parse(status);

                         agent_name = "";

                         $(".agent-leads").html(html);

                         $.each(lead_data["orders"], function(orderkey, order) {


                              if (order["approved"] == "yes" && order["payment"] == "yes") {
                                   $.each(lead_data["leads"], function(k, leads) {
                                        console.log("leads", leads);
                                        html1 += "<tr>";
                                        html1 += "<td>" + leads["name"] + "</td>";
                                        // html += "<td>"+agent_name+"</td>";
                                        html1 += "<td>" + leads["mobile"] + "</td>";
                                        html1 += "<td>" + leads["email"] + "</td>";
                                        html1 += "<td>" + leads["created_at"] + "</td>";
                                        html1 += "</tr>";
                                   });
                              }

                              if (order["approved"] == "yes") {
                                   $.each(lead_data["leads"], function(k, leads) {
                                        console.log("leads", leads);
                                        html2 += "<tr>";
                                        html2 += "<td>" + leads["name"] + "</td>";
                                        // html += "<td>"+agent_name+"</td>";
                                        html2 += "<td>" + leads["mobile"] + "</td>";
                                        html2 += "<td>" + leads["email"] + "</td>";
                                        html2 += "<td>" + leads["created_at"] + "</td>";
                                        html2 += "</tr>";
                                   });
                              }


                         });

                         $(".order-lead").html(html1);

                         $(".quotation-leads").html(html2);

                    }
               });
          });

          $(document).on("click", ".viewmeeting", function() {
               $("#viewmeeting").modal("show");

               var activity_id = $(this).data("id");

               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/getmeeting",
                    data: {
                         activity_id: activity_id
                    },
                    success: function(res) {
                         res = JSON.parse(res);
                         $("#v_meactivity_id").val(res[0]["id"]);
                         $("#v_msubject").val(res[0]["subject"]);
                         $(".v_mfromdate").val(res[0]["start_date_time"]);
                         $(".v_mtodate").val(res[0]["end_date_time"]);
                         $("#v_mlocation").val(res[0]["location"]);
                         $("#v_massigned").val(res["customer"]);
                         $("#v_massigned_id").val(res[0]["assigned_to"]);
                         $("#v_mdescription").val(res[0]["description"]);
                         $("#v_mrelated_to option").each(function(v) {
                              if ($(this).val() == res[0]["related_to"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });
                         $("#mstatus option").each(function(v) {
                              if ($(this).val() == res[0]["status"]) {
                                   $(this).attr("selected", true);
                              }
                         });
                         if ($("#mreminder").val() == res[0]["reminder"]) {
                              $("#mreminder").prop("checked", true);
                         }

                    }
               })
          });

          $(document).on("click", ".viewlogcalls", function() {
               $("#viewlogcalls").modal("show");

               var activity_id = $(this).data("id");

               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/getlogcall",
                    data: {
                         activity_id: activity_id
                    },
                    success: function(res) {
                         res = JSON.parse(res);
                         $("#v_logactivity_id").val(res[0]["id"]);
                         $("#v_lsubject").val(res[0]["subject"]);
                         $(".v_lfromdate").val(res[0]["start_date_time"]);

                         $("#v_lassigned").val(res["customer"]);
                         $("#v_lassigned_id").val(res[0]["assigned_to"]);

                         $("#v_ldescription").val(res[0]["description"]);

                         $("#v_lcommunication option").each(function(v) {
                              if ($(this).val() == res[0]["communication_preferred"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         $("#v_lead_possibility option").each(function(v) {
                              if ($(this).val() == res[0]["lead_possibility"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         $("#v_ldirection option").each(function(v) {
                              if ($(this).val() == res[0]["direction"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });



                         $("#v_lrelated_to option").each(function(v) {
                              if ($(this).val() == res[0]["related_to"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });
                         $("#v_lstatus option").each(function(v) {
                              if ($(this).val() == res[0]["status"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         if ($("#v_lreminder").val() == res[0]["reminder"]) {
                              $("#v_lreminder").prop("checked", true);
                         }

                    }
               })
          });

          $(document).on("click", ".edit-oppo", function() {
               $("#edit-opportunity").modal("show");

               var name = $(this).data("name");
               var amount = $(this).data("amount");
               var remarks = $(this).data("remarks");
               var odate = $(this).data("date");
               var status = $(this).data("status");
               var id = $(this).data("id");
               $("#opportunity_name").val(name);
               $("#exp_amount").val(amount);
               $("#remarks").val(remarks);
               $("#exp_date").val(odate);
               $("#opportunity_id").val(id)
               $("#staus").val(status);
          });

          $(document).on("click", ".updatemeeting", function() {
               $("#updatemeeting").modal("show");

               var activity_id = $(this).data("id");

               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/getmeeting",
                    data: {
                         activity_id: activity_id
                    },
                    success: function(res) {
                         res = JSON.parse(res);
                         $("#meactivity_id").val(res[0]["id"]);
                         $("#msubject").val(res[0]["subject"]);
                         $(".mfromdate").val(res[0]["start_date_time"]);
                         $(".mtodate").val(res[0]["end_date_time"]);
                         $("#mlocation").val(res[0]["location"]);
                         $("#massigned").val(res["customer"]);
                         $("#massigned_id").val(res[0]["assigned_to"]);
                         $("#mdescription").val(res[0]["description"]);
                         $("#mrelated_to option").each(function(v) {
                              if ($(this).val() == res[0]["related_to"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });
                         $("#mstatus option").each(function(v) {
                              if ($(this).val() == res[0]["status"]) {
                                   $(this).attr("selected", true);
                              }
                         });
                         if ($("#mreminder").val() == res[0]["reminder"]) {
                              $("#mreminder").prop("checked", true);
                         }
                         $("#" + activity).modal("show");
                    }
               })
          });

          $(document).on("click", ".updatelogcall", function() {
               $("#updatelogcall").modal("show");

               var activity_id = $(this).data("id");

               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/getlogcall",
                    data: {
                         activity_id: activity_id
                    },
                    success: function(res) {
                         res = JSON.parse(res);
                         $("#logactivity_id").val(res[0]["id"]);
                         $("#lsubject").val(res[0]["subject"]);
                         $(".lfromdate").val(res[0]["start_date_time"]);

                         $("#lassigned").val(res["customer"]);
                         $("#lassigned_id").val(res[0]["assigned_to"]);

                         $("#ldescription").val(res[0]["description"]);

                         $("#lcommunication option").each(function(v) {
                              if ($(this).val() == res[0]["communication_preferred"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         $("#lead_possibility option").each(function(v) {
                              if ($(this).val() == res[0]["lead_possibility"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         $("#ldirection option").each(function(v) {
                              if ($(this).val() == res[0]["direction"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });



                         $("#lrelated_to option").each(function(v) {
                              if ($(this).val() == res[0]["related_to"]) {
                                   $(this).attr("selected", true);
                              }
                              // val(res[0][""])
                         });
                         $("#lstatus option").each(function(v) {
                              if ($(this).val() == res[0]["status"]) {
                                   $(this).attr("selected", true);
                              }
                         });

                         if ($("#lreminder").val() == res[0]["reminder"]) {
                              $("#lreminder").prop("checked", true);
                         }

                    }
               })
          });

          $(document).on("submit", ".editlogform", function(e) {
               e.preventDefault();
               var formdata = $(this).serializeArray();
               // console.log(formdata);
               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/updatelogcall",
                    data: formdata,
                    success: function(res) {
                         $(".updatelogcall").modal("hide");
                         location.reload();
                    }
               })
          });

          $(document).on("submit", ".edit_meeting_form", function(e) {
               e.preventDefault();
               var formdata = $(this).serializeArray();
               // console.log(formdata);
               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/updatemeeting",
                    data: formdata,
                    success: function(res) {
                         $(".updatemeeting").modal("hide");
                         location.reload();
                    }
               })
          });


     })
</script>