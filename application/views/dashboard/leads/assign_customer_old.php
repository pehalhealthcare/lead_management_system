    <div class="col-md-8 col-sm-9 mt-5 mx-auto">

         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                   <a class="nav-link active nav-tabs pills-home-tab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Customer</a>
              </li>

              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-oppo-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-oppo-tab" data-toggle="pill" href="#pills-oppo" role="tab" aria-controls="pills-oppo" aria-selected="true">Opportunity</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-activity-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Activity</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-profile-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Quotation</a>
              </li>

              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-history-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">History</a>
              </li>
         </ul>
         <div class="tab-content bg-white p-3" id="pills-tabContent">
              <!-- tab 1111111111111111111111111111111111111111111111111111 -->
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                   <div class="row">
                        <div class="col-sm-3">

                             <ul class="list-group">
                                  <li class="list-group-item text-right"><button title="Add New Customer" type="reset" class="btn btn-success create">+</button></li>
                                  <li class="list-group-item">
                                       <input type="search" id="customer-search" class="form-control" placeholder="Enter Customer Name" />
                                  </li>
                                  <ul class="list-group  customer-list">
                                       <?php $active = "";
                                        foreach ($customers as $customer) : ?>
                                            <?php if ($lead_customer) : ?>

                                                 <li class="list-group-item customers <?= ($lead_customer[0]["customer_id"] == $customer->customer_id) ? "active" : "" ?>" data-customer="<?= $customer->customer_id ?>" style="cursor: pointer;"><?= $customer->name ?></li>
                                            <?php else : ?>
                                                 <li class="list-group-item customers" data-customer="<?= $customer->customer_id ?>" style="cursor: pointer;"><?= $customer->name ?></li>
                                            <?php endif; ?>


                                       <?php endforeach; ?>
                                  </ul>
                             </ul>
                        </div>
                        <div class="col-sm-9">

                             <form action="" method="post" class="add-customer" enctype="multipart/form-data">
                                  <div class="row">

                                       <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                       <input type="hidden" name="customer_id" id="customer_id">

                                       <div class="form-group col-sm-12">

                                            <?php if ($leads[0]["lead_image"]) : ?>
                                                 <div class="col-sm-12 text-right">
                                                      <label>Lead Image</label><br>
                                                      <a href="<?= base_url() ?>uploads/lead_image/<?= $leads[0]["lead_image"]; ?>" target="_blank"><img src="<?= base_url() ?>uploads/lead_image/<?= $leads[0]["lead_image"]; ?>" width="100"></a>
                                                 </div>
                                            <?php else : ?>

                                                 <div class="row">
                                                      <div class="form-group col-sm-6">
                                                           <label for="">Name <span class="text-danger">*</span></label>
                                                           <input type="text" name="lname" id="" value="<?= $leads[0]["name"]; ?>" placeholder="" class="form-control  border">
                                                      </div>
                                                      <div class="form-group col-sm-6">
                                                           <label for="">Mobile <span class="text-danger">*</span></label>
                                                           <input type="text" name="lmobile" id="" value="<?= $leads[0]["mobile"]; ?>" placeholder="" class="form-control  border">
                                                      </div>
                                                      <div class="form-group col-sm-6">
                                                           <label for="">Email <span class="text-danger">*</span></label>
                                                           <input type="text" name="lemail" id="" value="<?= $leads[0]["email"]; ?>" placeholder="" class="form-control  border">
                                                      </div>
                                                 </div>
                                            <?php endif; ?>
                                       </div>
                                       <div class="form-group col-sm-6">

                                            <label for="">Surname <span class="text-danger">*</span></label>
                                            <select class="form-control border" required id="surname" name="surname">
                                                 <option value="">Select Surname</option>
                                                 <option value="Mr">Mr</option>
                                                 <option value="Ms">Ms</option>
                                                 <option value="Mrs">Mrs</option>
                                            </select>

                                       </div>

                                       <div class="form-group col-sm-6">
                                            <label for="">Address 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="address_1" required id="address_1" placeholder="for example door no" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="customer-name" required id="customer-name" placeholder="Enter Customer Name" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Address 2</label>
                                            <input type="text" name="address_2" id="address_2" placeholder="for example street/block" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Mobile <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" required id="mobile" placeholder="Enter Mobile" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Address 3</label>
                                            <input type="text" name="address_3" id="address_3" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" required id="email" placeholder="Enter Email" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">State <span class="text-danger">*</span></label>
                                            <input type="text" name="state" required id="state" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Alternate Mobile</label>
                                            <input type="text" name="alternate_mobile" id="alternate_mobile" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">City <span class="text-danger">*</span></label>
                                            <input type="text" name="city" required id="city" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Zip Code <span class="text-danger">*</span></label>
                                            <input type="text" name="zip" required id="zipcode" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">&nbsp;</label>

                                       </div>

                                  </div>
                                  <div class="col-sm-12 text-right">
                                       <input type="submit" class="btn btn-success button saveProceed" value="SAVE & PROCEED">
                                       <input type="button" class="btn btn-success addCustomerClose" value="SAVE & CLOSE">
                                  </div>
                             </form>
                        </div>

                   </div>





              </div>
              <div class="tab-pane fade bg-white p-3" id="pills-oppo" role="tabpanel" aria-labelledby="pills-oppo-tab">
                   <?php if (count($opportunity) == 0) : ?>
                        <form method="POST" action="" id="oppo-form" class="oppo-form">
                             <div class="col-sm-8 mx-auto row">
                                  <input type="hidden" name="lead_id" value="<?= $lead_id ?>">
                                  <div class="col-sm-6 form-group">
                                       <label for="">Opportunity Name</label>
                                       <input type="text" name="opportunity_name" id="" class="form-control border-bottom">
                                  </div>
                                  <div class="col-sm-6 form-group">
                                       <label for="">Expected Amount</label>
                                       <input type="text" name="exp_amount" id="" class="form-control border-bottom">
                                  </div>
                                  <div class="col-sm-6 form-group">
                                       <label for="">Expected Date</label>
                                       <input type="date" name="exp_date" id="" class="form-control border-bottom">
                                  </div>
                                  <div class="col-sm-6 form-group">
                                       <label for="">Status</label>
                                       <select name="status" id="" class="form-control border-bottom">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                       </select>
                                  </div>
                                  <div class="col-sm-6 form-group">
                                       <label for="">Remarks</label>
                                       <input type="text" name="remarks" id="" class="form-control border-bottom">
                                  </div>
                                  <div class="col-sm-12 form-group">

                                       <input type="submit" class="btn btn-success button" value="SAVE & PROCEED">
                                       <input type="button" value="SAVE & CLOSE" class="btn btn-success addOpportunityClose">
                                  </div>
                             </div>

                        </form>
                   <?php else : ?>
                        <table class="table table-bordered">
                             <tr>
                                  <th>Opportunity Name</th>
                                  <th>Expected Amount</th>
                                  <th>Expected Date</th>
                                  <th>Remarks</th>
                                  <th>Actions</th>
                             </tr>
                             <?php foreach ($opportunity as $oppos) : ?>
                                  <tr>
                                       <td><?= $oppos["opportunity_name"] ?></td>
                                       <td><?= $oppos["expected_amount"] ?></td>
                                       <td><?= $oppos["expected_date"] ?></td>
                                       <td><?= $oppos["remarks"] ?></td>
                                       <td>
                                            <button data-name="<?= $oppos["opportunity_name"] ?>" data-amount="<?= $oppos["expected_amount"] ?>" data-date="<?= $oppos["expected_date"] ?>" data-remarks="<?= $oppos["remarks"] ?>" data-id="<?= $oppos["id"] ?>" data-status="<?= $oppos["status"] ?>" class="btn btn-info edit-oppos"><i class="fa fa-pencil"></i></button>
                                            <a href="<?= base_url() ?>dashboard/lead/opporunity/delete/<?= $oppos["id"] ?>?lead_id=<?= $lead_id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                       </td>
                                  </tr>
                             <?php endforeach; ?>
                        </table>

                   <?php endif; ?>

              </div>

              <!-- tab 2222222222222222222222222222222222222222222222 -->
              <div class="tab-pane fade bg-white p-3" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-product-item-tab " id="pills-product-item-tab" data-toggle="pill" href="#pills-product-item" role="tab" aria-controls="pills-product-item" aria-selected="true">Product Items</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-service-item-tab " id="pills-service-item-tab" data-toggle="pill" href="#pills-service-item" role="tab" aria-controls="pills-service-item" aria-selected="true">Service Items</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-review-tab" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="true">Review</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-terms-tab" id="pills-terms-tab" data-toggle="pill" href="#pills-terms" role="tab" aria-controls="pills-terms" aria-selected="true">Terms</a>
                        </li>
                   </ul>
                   <div class="tab-content bg-white p-3" id="pills-tabContent">

                        <div class="tab-pane fade active show" id="pills-product-item" role="tabpanel" aria-labelledby="pills-product-item-tab">
                             <form action="" method="post" class="assign-product" enctype="multipart/form-data">
                                  <div class="row">
                                       <?php if (!empty($lead_customer)) : ?>
                                            <div class="form-group col-sm-6">

                                                 <label for="">Customer Name</label>
                                                 <?php foreach ($customers as $customer) : ?>
                                                      <?php if ($customer->customer_id == $lead_customer[0]["customer_id"]) : ?>
                                                           <input type="text" readonly value="<?= $customer->name ?>" class="form-control pcustomer" />
                                                           <input type="hidden" name="pcustomer_id" class="pcustomer_id" value="<?= $customer->customer_id ?>">
                                                      <?php endif; ?>
                                                 <?php endforeach; ?>

                                            </div>
                                       <?php endif; ?>
                                       <div class="form-group col-sm-12 row">
                                            <div class="col-sm-3">
                                                 <ul class="list-group">
                                                      <li class="list-group-item">
                                                           <input type="search" id="product-search" class="form-control" placeholder="Enter Product Name" />
                                                      </li>
                                                      <ul class="list-group product-list">
                                                           <?php foreach ($products as $product) : ?>
                                                                <li class="list-group-item select-product" style="cursor: pointer;" data-product="<?= $product->product_id ?>"><?= $product->product_name ?></li>
                                                           <?php endforeach; ?>
                                                      </ul>
                                                 </ul>
                                                 <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                            </div>
                                            <div class="col-sm-9 productDetails">
                                                 <caption>Product Details</caption>
                                                 <table class="table-responsive-md table-responsive-sm table-bordered product-table d-none">
                                                      <thead>
                                                           <th><input type="checkbox" name="" id="all-data"></th>
                                                           <th>Item Name</th>
                                                           <th>Quantity</th>
                                                           <th>Unit Price</th>
                                                           <!-- <th>Selling Unit Price</th>
                                                           <th>Selling Price</th> -->
                                                           <th>Tax Rate</th>
                                                           <!-- <th>Tax Amount</th> -->
                                                           <th>Total Price</th>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                                 </table>
                                            </div>


                                       </div>

                                  </div>
                             </form>

                        </div>
                        <!-- product items end -->

                        <!-- Service items started -->
                        <div class="tab-pane fade" id="pills-service-item" role="tabpanel" aria-labelledby="pills-service-item-tab">
                             <form action="" method="post" class="assign-service" enctype="multipart/form-data">
                                  <div class="row">
                                       <?php if (!empty($lead_customer)) : ?>
                                            <div class="form-group col-sm-6">

                                                 <label for="">Customer Name</label>
                                                 <?php foreach ($customers as $customer) : ?>
                                                      <?php if ($customer->customer_id == $lead_customer[0]["customer_id"]) : ?>
                                                           <input type="text" readonly value="<?= $customer->name ?>" class="form-control pcustomer" />
                                                           <input type="hidden" name="pcustomer_id" class="pcustomer_id" value="<?= $customer->customer_id ?>">
                                                      <?php endif; ?>
                                                 <?php endforeach; ?>

                                            </div>
                                       <?php endif; ?>
                                       <div class="form-group col-sm-12 row">
                                            <div class="col-sm-3">
                                                 <ul class="list-group">
                                                      <li class="list-group-item">
                                                           <input type="search" id="product-search" class="form-control" placeholder="Enter Service Name" />
                                                      </li>
                                                      <ul class="list-group product-list">
                                                           <?php foreach ($services as $service) : ?>
                                                                <li class="list-group-item select-service" style="cursor: pointer;" data-product="<?= $service->service_id ?>"><?= $service->service_name ?></li>
                                                           <?php endforeach; ?>
                                                      </ul>
                                                 </ul>
                                                 <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                            </div>
                                            <div class="col-sm-9 servicedetails">
                                                 <caption>Service Details</caption>
                                                 <table class="table table-bordered service-table">
                                                      <thead>
                                                           <th><input type="checkbox" name="" id="all-data"></th>
                                                           <th>Item Name</th>
                                                           <th>Quantity</th>
                                                           <th>Unit Price</th>
                                                           <!-- <th>Selling Unit Price</th>
                                                           <th>Selling Price</th> -->
                                                           <th>Tax Rate</th>
                                                           <!-- <th>Tax Amount</th> -->
                                                           <th>Total Price</th>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                                 </table>
                                            </div>


                                       </div>

                                  </div>
                             </form>

                        </div>
                        <!-- service items end -->

                        <!-- review part start -->
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                             <div class="row customer-items">

                             </div>
                             <div class="row total-items border border-success p-3">

                             </div>

                        </div>
                        <!-- review part end -->

                        <!-- terms part start -->
                        <div class="tab-pane fade" id="pills-terms" role="tabpanel" aria-labelledby="pills-terms-tab">

                             <div class="col-sm-12 text-right">
                                  <?php $customerID = "";
                                   foreach ($customers as $customer) : ?>
                                       <?php if ($customer->customer_id == $lead_customer[0]["customer_id"]) : $customerID = $customer->customer_id ?>

                                       <?php endif; ?>
                                  <?php endforeach; ?>
                                  <a href="<?= base_url() ?>dashboard/lead/generate_pdf/<?= $lead_id ?>/<?= $customerID ?>" class="btn btn-success"> PDF GENERATION</a>
                             </div>
                             <h4>Terms and conditions</h4>
                             <div class="col-sm-12 terms row">

                             </div>
                             <div class="col-sm-12 refer">
                                  <h4>Reference Details</h4>
                                  <div class="col-sm-6">
                                       <form action="" method="post" class="refer-form">
                                            <?php
                                             $ref_1 = $ref_2 = $ref_3 = $ref_4 = "";
                                             $refer = $terms = "";
                                             if ($customer_item) {
                                                  $ref_1 = ($customer_item[0]["ref_1"]) ? $customer_item[0]["ref_1"] : "";
                                                  $ref_2 =  ($customer_item[0]["ref_2"]) ? $customer_item[0]["ref_2"] : "";
                                                  $ref_3 = ($customer_item[0]["ref_3"]) ? $customer_item[0]["ref_3"] : "";
                                                  $ref_4 = ($customer_item[0]["ref_4"]) ? $customer_item[0]["ref_4"] : "";
                                                  $refer = ($customer_item[0]["refer"]) ? $customer_item[0]["refer"] : "";
                                                  $terms = ($customer_item[0]["terms"]) ? $customer_item[0]["terms"] : "";
                                             }

                                             ?>
                                            <input type="hidden" name="lead_id" value="<?= $lead_id ?>">
                                            <input type="hidden" class="rcustomer_id" name="rcustomer_id" value="" />
                                            <div class="form-group">
                                                 <label>Terms</label>
                                                 <input type="text" name="terms" value="<?= $terms ?>" class="form-control border" placeholder="Terms" id="">
                                            </div>
                                            <div class="form-group">
                                                 <label>Reference</label>
                                                 <input type="text" name="refer" value="<?= $refer ?>" class="form-control border" placeholder="Reference Number" id="">
                                            </div>
                                            <div class="form-group">
                                                 <label>Reference 1</label>
                                                 <input type="text" name="ref1" value="<?= $ref_1 ?>" class="form-control border" placeholder="Reference 1" id="">
                                            </div>
                                            <div class="form-group">
                                                 <label>Reference 2</label>
                                                 <input type="text" name="ref2" value="<?= $ref_2 ?>" class="form-control border" placeholder="Reference 2" id="">
                                            </div>
                                            <div class="form-group">
                                                 <label>Reference 3</label>
                                                 <input type="text" name="ref3" value="<?= $ref_3 ?>" class="form-control border" placeholder="Reference 3" id="">
                                            </div>
                                            <div class="form-group">
                                                 <label>Reference 4</label>
                                                 <input type="text" name="ref4" value="<?= $ref_4 ?>" class="form-control border" placeholder="Reference 4" id="">
                                            </div>
                                            <div class="form-group">
                                                 <input type="submit" class="btn btn-success" value="Save">
                                            </div>
                                       </form>
                                  </div>
                             </div>

                        </div>
                        <!-- terms part end -->
                   </div>
              </div>



              <!-- tab 3333333333333333333333333333333333333333333333333333333333333 -->
              <div class="tab-pane fade bg-white p-3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                   <div class="col-sm-12">
                        <div class="row">
                             <div class="col-sm-12">
                                  <div class="col-sm-3">
                                       <div class="form-group">
                                            <select class="form-control activity">
                                                 <option value="">Select Activity</option>
                                                 <?php foreach ($activity as $activities) : ?>
                                                      <?php if ($activities->name != "Compose Email") : ?>
                                                           <option data-activity="<?= strtolower(str_replace(" ", "_", $activities->name)) ?>" value="<?= $activities->id ?>"><?= $activities->name ?></option>
                                                 <?php endif;
                                                  endforeach; ?>
                                            </select>
                                       </div>
                                  </div>
                             </div>

                             <div class="col-sm-12 meeting d-none">

                                  <form method="post" id="activity-form" action="">
                                       <div class="row">
                                            <div class="col-sm-8 mx-auto row">
                                                 <input type="hidden" id="mactivity_id" name="mactivity_id" />
                                                 <input type="hidden" id="lead_id" name="lead_id" value="<?= $lead_id ?>" />
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Subject</label>
                                                      <input type="text" name="subject" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Status</label>
                                                      <select name="status" class="form-control border-bottom">
                                                           <option>Planned</option>
                                                           <option>Held</option>
                                                           <option>Not Held</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Start date</label>
                                                      <input type="text" id="startDate" name="fromdate" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Related to</label>
                                                      <select class="form-control border-bottom" name="related_to">
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
                                                      <input type="text" name="parent_name" value="<?= $this->session->name ?>" class="form-control border-bottom" id="">
                                                 </div>

                                                 <div class="form-group col-sm-6">
                                                      <label for="">End date</label>
                                                      <input type="text" name="todate" id="endDate" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Location</label>
                                                      <input type="text" name="location" class="form-control border-bottom">
                                                 </div>
                                                 <!-- <div class="form-group col-sm-6">
                                                      <label for="">Duration</label>
                                                      <select name="duration" class="form-control" id="">
                                                           <option>15 mins</option>
                                                           <option>30 mins</option>
                                                           <option>1 hour</option>
                                                           <option>1.5 hour</option>
                                                           <option>2 hour</option>
                                                           <option>3 hour</option>
                                                           <option>4 hour</option>
                                                           <option>5 hour</option>
                                                           <option>6 hour</option>
                                                           <option>1 day</option>
                                                           <option>2 days</option>
                                                           <option>3 days</option>
                                                           <option>1 week</option>
                                                      </select>
                                                 </div> -->
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Reminder</label><br />
                                                      <input type="checkbox" name="reminder" value="1" class="form-control-check border-bottom"> Remind me
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Assigned to</label>
                                                      <input type="text" name="assigned_to" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <label for="">Description</label>
                                                      <textarea name="description" class="form-control border-bottom" rows="5"></textarea>
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <input type="submit" class="btn btn-success button" value="SAVE & PROCEED">
                                                      <input type="button" class="btn btn-success continue" value="SAVE & CONTINUE">
                                                      <input type="button" class="btn btn-success addMeetingClose" value="SAVE & CLOSE">
                                                 </div>
                                            </div>
                                       </div>
                                  </form>

                             </div>

                             <div class="col-sm-12 log_call d-none">

                                  <form method="post" class="log_form" action="">
                                       <div class="row">
                                            <div class="col-sm-8 mx-auto row">
                                                 <input type="hidden" id="lactivity_id" class="lactivity_id" name="lactivity_id" />
                                                 <input type="hidden" id="lead_id" name="lead_id" value="<?= $lead_id ?>" />
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Subject</label>
                                                      <input type="text" name="subject" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Status</label>
                                                      <div class="row">
                                                           <div class="col-sm-6">
                                                                <select name="direction" class="form-control border-bottom">
                                                                     <option>Inbound</option>
                                                                     <option>Outbound</option>
                                                                </select>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                <select name="status" class="form-control border-bottom">
                                                                     <option>Planned</option>
                                                                     <option>Held</option>
                                                                     <option>Not Held</option>
                                                                </select>
                                                           </div>
                                                      </div>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Communication Preferred</label>
                                                      <select name="communication" id="" class="form-control border-bottom">
                                                           <option value="whatsapp">Whatsapp</option>
                                                           <option value="email">Email</option>
                                                           <option value="call">Call</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Lead Possibility</label>
                                                      <select name="lead_possibility" id="" class="form-control border-bottom">
                                                           <option value="qualified">Qualified</option>
                                                           <option value="disqualified">Disqualified</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Start date</label>
                                                      <input type="text" name="fromdate" id="fromdate" class="form-control border-bottom fromdate">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Related to</label>
                                                      <input type="text" name="related_to" class="form-control border-bottom" id="">
                                                 </div>


                                                 <div class="form-group col-sm-6">
                                                      <label for="">Reminder</label><br />
                                                      <input type="checkbox" name="reminder" value="1" class="form-control-check"> Remind me
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Assigned to</label>
                                                      <input type="text" name="assigned_to" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <label for="">Description</label>
                                                      <textarea name="description" class="form-control border-bottom" rows="5"></textarea>
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <input type="submit" class="btn btn-success button" value="SAVE & PROCEED">
                                                      <input type="button" class="btn btn-success continue" value="SAVE & CONTINUE">
                                                      <input type="button" class="btn btn-success addLogClose" value="SAVE & CLOSE">
                                                 </div>
                                            </div>
                                       </div>
                                  </form>

                             </div>

                             <div class="col-sm-12 activity-details">
                                  <div class="row">
                                       <table class="table table-bordered activity-table">
                                            <thead>
                                                 <tr>
                                                      <th>Subject</th>
                                                      <th>Status</th>
                                                      <!-- <th>Contact</th> -->
                                                      <th>Due Date</th>
                                                      <th>Assigned User</th>
                                                      <th>Actions</th>
                                                 </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                       </table>
                                  </div>
                             </div>
                        </div>
                   </div>
              </div>
              <div class="tab-pane fade bg-white p-3" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">

              </div>
         </div>
    </div>

    <div class="modal bd-example-modal-lg" id="edit-opportunity">
         <div class="modal-dialog modal-lg">
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


                                       <div class="col-sm-8 mx-auto row">
                                            <input type="hidden" name="lead_id" value="<?= $lead_id ?>" />
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

    <div class="modal bd-example-modal-lg" id="composemail">
         <div class="modal-dialog modal-lg">
              <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                        <h4 class="modal-title">Compose Mail</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <form class="compose_form" method="post" enctype="multipart/form-data">
                        <!-- Modal body -->
                        <div class="modal-body">
                             <div class="col-sm-12">
                                  <div class="row">
                                       <div class="col-sm-12 row">
                                            <input type="hidden" name="cactivity_id" id="cactivity_id">
                                            <input type="hidden" name="lead_id" value="<?= $lead_id ?>">

                                            <div class="col-sm-6">
                                                 <label for="">Related to</label>
                                                 <input type="text" class="form-control border-bottom" name="related_to" />
                                            </div>

                                            <div class="col-sm-6">
                                                 <label for="">Related to Other</label>
                                                 <input type="text" class="form-control border-bottom" name="related_to_other" />
                                            </div>
                                       </div>
                                       <div class="col-sm-12 row">
                                            <div class="col-sm-6">
                                                 <label for="">From</label>
                                                 <input type="email" name="from_address" id="" value="<?= $this->session->email ?>" readonly class="form-control border-bottom">
                                            </div>
                                            <div class="col-sm-6">
                                                 <label for="">To</label>
                                                 <input type="email" name="to_address" id="" class="form-control border-bottom">
                                            </div>
                                            <div class="col-sm-6">
                                                 <label for="">CC</label>
                                                 <input type="text" name="cc_address" id="" class="form-control border-bottom">
                                            </div>
                                            <div class="col-sm-6">
                                                 <label for="">BCC</label>
                                                 <input type="text" name="bcc_address" id="" class="form-control border-bottom">
                                            </div>
                                       </div>
                                       <div class="col-sm-12">
                                            <label>Subject</label>
                                            <input type="text" name="subject" id="" class="form-control border-bottom">
                                       </div>
                                       <div class="col-sm-12">
                                            <label>Body</label>
                                            <textarea rows="10" name="body" style="height: 25em;" class="ckeditor" id="editor"></textarea>
                                       </div>
                                  </div>
                             </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                             <div class="col-sm-12 row">
                                  <div class="col">
                                       <label for="attachement" class="btn btn-info attachement mt-2"><i class="fa fa-paperclip"></i></label>
                                       <input type="file" class="d-none" name="attachement" id="attachement">
                                       <label for="docs" class="btn btn-info docs mt-2"><i class="fa fa-file"></i></label>
                                       <input type="file" class="d-none" name="docs" id="docs">
                                       <button type="button" class="btn btn-primary save_draft"><i class="fa fa-floppy-o"></i></button>
                                       <button type="button" class="btn btn-danger" id="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                       <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i></button>
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
                        <h4 class="modal-title">UPDATE ACTIIVITY</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <form class="edit_meeting_form" method="post" enctype="multipart/form-data">
                        <!-- Modal body -->
                        <div class="modal-body">
                             <div class="col-sm-12">
                                  <div class="row">
                                       <input type="hidden" id="meactivity_id" name="mactivity_id" />
                                       <input type="hidden" id="lead_id" name="lead_id" value="<?= $lead_id ?>" />
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
                                            <input type="text" name="todate" id="endDate" class="form-control border-bottom mtodate">
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
                                            <input type="text" name="assigned_to" id="massigned" class="form-control border-bottom">
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
                        <h4 class="modal-title">UPDATE ACTIIVITY</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
                   <form class="editlogform" method="post" enctype="multipart/form-data">
                        <!-- Modal body -->
                        <div class="modal-body">
                             <div class="col-sm-12">
                                  <div class="row">
                                       <input type="hidden" id="logactivity_id" class="logactivity_id" name="lactivity_id" />
                                       <input type="hidden" id="lead_id" name="lead_id" value="<?= $lead_id ?>" />
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
                                            <input type="text" name="assigned_to" id="lassigned" class="form-control border-bottom">
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

    


    <style>
         .ck-editor__editable {
              min-height: 15em;
         }
    </style>
    <script>
         ClassicEditor
              .create(document.querySelector('#editor'))
              .catch(error => {
                   console.error(error);
              });

         var rcustomer_id = $(".pcustomer_id").val();

         $(".rcustomer_id").val($(".pcustomer_id").val());

         var local = "<?= count($lead_customer) ?>"
         //     if (local == 0) {
         //          localStorage.removeItem("tabs");
         //     } else {
         //          // localStorage.removeItem("tabs");
         //     }
         $(document).ready(function() {

              //     if (localStorage.getItem("tabs")) {
              //          var tabs = localStorage.getItem("tabs");
              //          if (tabs == $(tabs + "-tab").attr("href")) {

              //               $(".nav-tabs").removeClass("active");
              //               $(tabs + "-tab").addClass("active")

              //               $(".tab-pane").removeClass("active show");

              //               $(tabs).addClass("active");
              //               $(tabs).addClass("show");
              //          }

              //     }

              //     $(".nav-tabs").click(function() {
              //          localStorage.setItem("tabs", $(this).attr("href"));
              //     });

              $(".create").on("click", function() {
                   $(".add-customer").trigger("reset");
                   $(".button").val("SAVE & PROCEED")
                   $(".addCustomerClose").val("SAVE & CLOSE");
                   $(".customers").removeClass("active");
              });

              $(document).on("click", ".addCustomerClose", function() {

                   var formdata = $(".add-customer").serialize();


                   $.ajax({
                        url: "<?= base_url() ?>ajax/addcustomerdata",
                        method: "post",
                        data: formdata,
                        success: function(status) {
                             $("#closeBoxConfirm").modal("show");
                             $(".customers").removeClass("active");
                             $(".nav-tabs#pills-profile-tab").removeClass("disabled")
                             //     $(".add-customer").trigger("reset");

                             //     getcusotmer();
                        }
                   })



              });

              $(document).on("click", ".addOpportunityClose", function() {
                   var formdata = $("#oppo-form").serializeArray();

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/opportunity",
                        data: formdata,
                        success: function(res) {
                             localStorage.setItem("tabs", "#pills-contact");
                             $("#pills-activity-tab").removeClass("disabled");
                             $("#closeBoxConfirm").modal("show");
                             //$("#oppo-form").trigger("reset");
                        }
                   })

              });

              $(document).on("click", ".addMeetingClose", function() {
                   var formdata = $("#activity-form").serializeArray();

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/activitymeeting",
                        data: formdata,
                        success: function(res) {
                             //     $(".meeting").addClass("d-none");
                             localStorage.setItem("tabs", "#pills-profile");
                             $("#closeBoxConfirm").modal("show");
                             //$("#activity-form").trigger("reset");

                        }
                   })

              });

              $(document).on("click", ".addLogClose", function() {
                   var formdata = $(".log_form").serializeArray();

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/logCall",
                        data: formdata,
                        success: function(res) {
                             //     $(".log_call").addClass("d-none");
                             localStorage.setItem("tabs", "#pills-profile");
                             $("#closeBoxConfirm").modal("show");
                             $(".log_form").trigger("reset");
                             getActivity();
                        }
                   })

              });

              $(".customers").click(function() {
                   var id = $(this).data("customer");
                   $(".customers").removeClass("active");
                   $(this).addClass("active");
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getcustomer",
                        data: {
                             id: id
                        },
                        success: function(status) {

                             var res = JSON.parse(status);
                             $(".addCustomerClose").val("UPDATE & CLOSE");
                             $(".button").val("UPDATE & PROCEED")
                             //     val()
                             $("#surname option").each(function(k, v) {
                                  if ($(this).val() == res["customer"][0]["prefix"]) {
                                       $(this).attr("selected", "true");
                                  }
                             });
                             $("#customer-name").val(res["customer"][0]["name"]);
                             $("#email").val(res["customer"][0]["email"]);
                             $("#mobile").val(res["customer"][0]["mobile"]);
                             $("#alternate_mobile").val(res["customer"][0]["alternate_mobile"]);
                             $("#address_1").val(res["address"][0]["address_1"]);
                             $("#address_2").val(res["address"][0]["address_2"]);
                             $("#address_3").val(res["address"][0]["address_3"]);
                             $("#state").val(res["address"][0]["state"]);
                             $("#city").val(res["address"][0]["city"]);
                             $("#zipcode").val(res["address"][0]["zip"]);

                        }
                   })
              });

              $(document).on("click", ".edit-oppos", function() {
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
                   $("#staus").val();
                   $("#edit-opportunity").modal("show");
              })

              $(document).on("submit", "#edit-oppo", function(e) {
                   e.preventDefault();
                   var formdata = $(this).serializeArray();

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/edit_opportunity",
                        data: formdata,
                        success: function(res) {
                             $("#edit-opportunity").modal("hide");
                             location.reload();
                        }
                   })

              });

              $(document).on("click", "#pills-history-tab", function() {
                   getLeadHistory();
              });

              getLeadHistory();

              function getLeadHistory() {
                   var lead_id = "<?= $lead_id ?>";

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getleadhistory",
                        data: {
                             lead_id: lead_id
                        },
                        success: function(res) {
                             $("#pills-history").html('');
                             res = JSON.parse(res);
                             $.each(res, function(k, v) {
                                  var html = "<div class='col-sm-12 row'>";
                                  html += "<div class='col-sm-12 alert alert-info'><p>" + v["actions"] + "<p class='text-right'>created_at " + v["created_at"] + "</p></p></div>";
                                  html += "</div>";
                                  $("#pills-history").append(html)
                             });
                        }
                   })
              }


              $(document).on("submit", ".add-customer", function(e) {
                   e.preventDefault();
                   var formdata = $(".add-customer").serialize();


                   $.ajax({
                        url: "<?= base_url() ?>ajax/addcustomerdata",
                        method: "post",
                        data: formdata,
                        success: function(status) {


                             $(".nav-tabs#pills-oppo-tab").removeClass("disabled");
                             localStorage.setItem("tabs", "#pills-oppo");

                             $(".new-customer").removeClass("d-none");

                             $(".add-customer").trigger("reset");
                             location.reload();
                             //     getcusotmer();
                        }
                   })
              });

              $(".assign-customer").on("submit", function(e) {
                   e.preventDefault();
                   var formdata = $(".assign-customer").serialize();


                   $.ajax({
                        url: "<?= base_url() ?>ajax/assigncustomerdata",
                        method: "post",
                        data: formdata,
                        success: function(status) {

                        }
                   })
              });

              $(document).on("click", "#pills-review-tab", function(e) {

                   var leadID = $(".lead_id").val();
                   var custID = $(".pcustomer_id").val();
                   $.ajax({
                        url: "<?= base_url() ?>ajax/getcustomeritem",
                        method: "post",
                        data: {
                             lead_id: $(".lead_id").val()
                        },
                        success: function(status) {
                             $(".customer-items").html('');

                             // return false;
                             var status = JSON.parse(status);
                             var total_amount = 0;
                             var total_tax = 0;
                             $.each(status["customer_item"], function(k, v) {

                                  console.log("customer_item", v);

                                  var checked = "";
                                  var tax_amount = "";
                                  var total_tax_amount = "";
                                  var total_price = "";
                                  var quantity = "";
                                  var product_id = "";
                                  var item_id = "";
                                  var unit_price = "";
                                  var selling_price = "";
                                  var total_price_wo_tax = "";
                                  var item_name = "";

                                  $.each(status["product_item"], function(k1, v1) {
                                       // console.log("product_item",v1);
                                       if (status["product_item"] && v["item_id"] == v1["item_id"] && v["product_id"] != null) {
                                            item_name = (v1["item_name"]);
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            product_id = v1["product_id"] ? v1["product_id"] : "";
                                            item_id = v1["item_id"] ? v1["item_id"] : "";

                                       }

                                  });

                                  $.each(status["service_item"], function(k3, s1) {
                                       // console.log("service_item",s1);
                                       if (status["service_item"] && v["item_id"] == s1["item_id"] && v["service_id"] != null) {
                                            item_name = (s1["item_name"]);
                                            checked = (v["item_id"] == s1["item_id"]) ? "checked" : "";
                                            product_id = s1["service_id"] ? s1["service_id"] : "";
                                            item_id = s1["item_id"] ? s1["item_id"] : "";

                                       }
                                  });

                                  total_price = (v["total_price"]) ? v["total_price"] : "";
                                  //     total_price = total_price.toFixed(2);

                                  total_price_wo_tax = (v["total_price_wo_tax"]) ? v["total_price_wo_tax"] : "";
                                  //     total_price_wo_tax = total_price_wo_tax.toFixed(2);

                                  tax_amount = (v["tax_amount"]) ? v["tax_amount"] : "";

                                  total_tax_amount = (v["total_tax_amount"]) ? v["total_tax_amount"] : "";
                                  //     total_tax_amount = total_tax_amount.toFixed(2);

                                  quantity = (v["quantity"]) ? v["quantity"] : "";
                                  unit_price = (v["unit_price"]) ? v["unit_price"] : "";
                                  selling_unit_price = (v["selling_unit_price"]) ? v["selling_unit_price"] : "";
                                  selling_price = (v["selling_price"]) ? v["selling_price"] : "";

                                  if (v["product_id"] == product_id || v["service_id"] == product_id && v["item_id"] == item_id) {

                                       var html = '<div class="col-sm-12 col-md-3 mb-3 bg-white item_' + v["item_id"] + '"><div class="card bg-light text-dark border border-success"><div class="card-title p-3 border-bottom border-success">' + item_name + '<input readonly data-id="' + v["item_id"] + '" type="hidden" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control ritem_name_' + v["item_id"] + '""></div>';
                                       html += '<div class="card-body"><label>Quantity</label><input type="text" name="quantity[]" data-id="' + v["item_id"] + '"  placeholder="Enter Your Quantity" value="' + quantity + '" class="rquantity border-bottom form-control rquantity_' + v["item_id"] + '">';
                                       html += '<label>Unit Price</label><input type="text" readonly data-id="' + v["item_id"] + '"  value="' + unit_price + '" name="unit_price[]"  class="runit_price border-bottom form-control runit_price_' + v["item_id"] + '">';
                                       html += '<label>Tax Rate</label><input readonly type="text" data-id="' + v["item_id"] + '" value="' + v["tax_rate"] + '" name="tax_rate[]"  class="tax_rate form-control rtax_rate_' + v["item_id"] + '">';
                                       html += '<label>Selling Unit Price</label><input type="text" data-id="' + v["item_id"] + '"  value="' + selling_unit_price + '" name="rselling_unit_price[]"  class="rselling_unit_price border-bottom form-control rselling_unit_price_' + v["item_id"] + '">';
                                       html += '<label>Selling Price</label><input type="text" data-id="' + v["item_id"] + '" value="' + selling_price + '"  name="rselling_price[]" readonly class="rselling_price border-bottom form-control rselling_price_' + v["item_id"] + '">';
                                       html += '<label>Tax Amount</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="tax_amount[]" value="' + tax_amount + '" class="tax_amount form-control rtax_amount_' + v["item_id"] + '">';
                                       html += '<label>Total Tax Amount</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="tax_amount[]" value="' + total_tax_amount + '" class="rtotal_tax_amount form-control rtotal_tax_amount_' + v["item_id"] + '">';
                                       html += '<label>Total Price(Without Tax)</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="total_price[]" value="' + total_price_wo_tax + '"  class="rwototal_price form-control rwototal_price_' + v["item_id"] + '">';
                                       html += '<label>Total Price(With Tax)</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="total_price[]" value="' + total_price + '"  class="rtotal_price form-control rtotal_price_' + v["item_id"] + '">';
                                       html += '<input type="hidden" name="item_id[]" class="item_id_' + v["item_id"] + '" value="' + v["item_id"] + '"/>';
                                       html += '<input type="hidden" name="product_id" class="product_id" value="' + v["product_id"] + '"></div>';
                                       html += '<div class="card-footer"><button data-id="' + v["item_id"] + '" class="btn btn-danger remove remove_' + v["item_id"] + '">Remove</button></div></div></div>';
                                       total_amount = total_amount + parseFloat(total_price);
                                       total_tax = total_tax + parseFloat(total_tax_amount);
                                       $(".customer-items").append(html);

                                  }

                             });
                             if (total_amount) {
                                  var alltotal = '<hr /><div class="col-sm-12 col-md-4 total-price-amount">Total Amount ' + total_amount.toFixed(2) + '</div>';
                                  alltotal += '<div class="col-sm-12 col-md-4 total-tax-amount">Total Tax Amount ' + total_tax.toFixed(2) + '</div>';
                                  $(".total-items").html(alltotal);
                             }

                        }
                   });
              });

              $(".select-product").on("click", function(e) {
                   e.preventDefault();
                   var product_id = $(this).data("product");
                   $(".select-product").removeClass("active");
                   $(this).addClass("active");
                   $.ajax({
                        url: "<?= base_url() ?>ajax/getProductItem",
                        method: "post",
                        data: {
                             product_id: product_id,
                             lead_id: $(".lead_id").val()
                        },
                        success: function(status) {
                             $(".product-table tbody").html('');

                             // return false;
                             var status = JSON.parse(status);
                             $.each(status["item_new"], function(k, v) {

                                  var checked = "";
                                  var tax_amount = "";

                                  var total_price = "";
                                  var quantity = "";
                                  var unit_price = "";
                                  var selling_unit_price = "";
                                  var selling_price = "";
                                  $.each(status["customer_item"], function(k1, v1) {
                                       // return false;
                                       if (status["customer_item"] && v["item_name"] && v["item_id"] == v1["item_id"]) {
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            total_price = (v1["total_price"]) ? v1["total_price"] : "";
                                            tax_amount = (v1["tax_amount"]) ? v1["tax_amount"] : "";

                                            quantity = (v1["quantity"]) ? v1["quantity"] : "";
                                            unit_price = (v1["unit_price"]) ? v1["unit_price"] : "";

                                            selling_unit_price = (v1["selling_unit_price"]) ? v1["selling_unit_price"] : "";
                                            selling_price = (v1["selling_price"]) ? v1["selling_price"] : "";
                                       }



                                  });
                                  if (v["item_name"] && status["customer_item"]) {
                                       unit_price = (unit_price) ? unit_price : v["unit_price"];
                                   //     unit_price = unit_price.replace(',', '.')
                                       var html = '<tr><td><input type="checkbox" ' + checked + ' data-id="' + v["item_id"] + '" class="add" value="' + v["item_id"] + '" /></td><td><input readonly data-id="' + v["item_id"] + '" type="text" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control item_name_' + v["item_id"] + '""></td>';
                                       html += '<td><input type="text" name="quantity[]" data-id="' + v["item_id"] + '" placeholder="Enter Your Quantity" value="' + quantity + '" class="quantity border-bottom form-control quantity_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  value="' + unit_price + '" name="unit_price[]"  class="unit_price border-bottom form-control unit_price_' + v["item_id"] + '"></td>';
                                       //     html += '<td><input type="text" data-id="' + v["item_id"] + '"   name="selling_unit_price[]" value="' + selling_unit_price + '"  class="selling_unit_price border-bottom form-control selling_unit_price' + v["item_id"] + '"></td>';
                                       //     html += '<td><input type="text" data-id="' + v["item_id"] + '"   name="selling_price[]" value="' + selling_price + '"  class="selling_price border-bottom form-control selling_price_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '" value="' + v["tax_rate"] + '" name="tax_rate[]"  class="tax_rate form-control tax_rate_' + v["item_id"] + '"></td>';
                                       //     html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  name="tax_amount[]" value="' + tax_amount + '" class="tax_amount form-control tax_amount_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  name="total_price[]" value="' + total_price + '"  class="total_price form-control total_price_' + v["item_id"] + '">';
                                       html += '<input type="hidden" name="item_id[]" class="item_id_' + v["item_id"] + '" value="' + v["item_id"] + '"/>';
                                       html += '<input type="hidden" name="product_id" class="product_id" value="' + product_id + '"></td></tr>';

                                       $(".product-table tbody").append(html);
                                       $(".product-table").removeClass("d-none");
                                  }

                             });

                        }
                   });



              });


              $(".select-service").on("click", function(e) {
                   e.preventDefault();
                   var service_id = $(this).data("product");
                   $(".select-service").removeClass("active");
                   $(this).addClass("active");
                   $.ajax({
                        url: "<?= base_url() ?>ajax/getServiceItem",
                        method: "post",
                        data: {
                             service_id: service_id,
                             lead_id: $(".lead_id").val()
                        },
                        success: function(status) {
                             $(".service-table tbody").html('');

                             // return false;
                             var status = JSON.parse(status);
                             $.each(status["item_new"], function(k, v) {

                                  var checked = "";
                                  var tax_amount = "";

                                  var total_price = "";
                                  var quantity = "";
                                  var unit_price = "";
                                  var selling_unit_price = "";
                                  var selling_price = "";
                                  $.each(status["customer_item"], function(k1, v1) {
                                       // return false;
                                       if (status["customer_item"] && v["item_name"] && v["item_id"] == v1["item_id"]) {
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            total_price = (v1["total_price"]) ? v1["total_price"] : "";
                                            tax_amount = (v1["tax_amount"]) ? v1["tax_amount"] : "";
                                            service_id = (v1["service_id"]) ? v1["service_id"] : "";
                                            quantity = (v1["quantity"]) ? v1["quantity"] : "";
                                            unit_price = (v1["unit_price"]) ? v1["unit_price"] : "";
                                            selling_unit_price = (v1["selling_unit_price"]) ? v1["selling_unit_price"] : "";
                                            selling_price = (v1["selling_price"]) ? v1["selling_price"] : "";
                                       }



                                  });
                                  if (v["item_name"] && status["customer_item"]) {
                                       unit_price = (unit_price) ? unit_price : v["unit_price"];
                                       var html = '<tr><td><input type="checkbox" ' + checked + ' data-id="' + v["item_id"] + '" class="add" value="' + v["item_id"] + '" /></td><td><input readonly data-id="' + v["item_id"] + '" type="text" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control item_name_' + v["item_id"] + '""></td>';
                                       html += '<td><input type="text" name="quantity[]" data-id="' + v["item_id"] + '" placeholder="Enter Your Quantity" value="' + quantity + '" class="squantity border-bottom form-control squantity_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  value="' + unit_price + '" name="sunit_price[]"  class="sunit_price border-bottom form-control sunit_price_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '" value="' + v["tax_rate"] + '" name="stax_rate[]"  class="stax_rate form-control stax_rate_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  name="stotal_price[]" value="' + total_price + '"  class="stotal_price form-control stotal_price_' + v["item_id"] + '">';
                                       html += '<input type="hidden" name="item_id[]" class="item_id_' + v["item_id"] + '" value="' + v["item_id"] + '"/>';
                                       html += '<input type="hidden" name="service_id" class="service_id" value="' + service_id + '"></td></tr>';
                                       $(".service-table tbody").append(html);
                                  }

                             });

                        }
                   });



              });

              $(document).on("keyup", ".squantity", function() {

                   var id = $(this).data("id");

                   //     var tax_rate = $(".selling_price_" + id).val() * ($(".tax_rate_" + id).val() / 100);

                   var tax_rate = $(".sunit_price_" + id).val() * ($(".stax_rate_" + id).val() / 100);

                   //     console.log("testing",$(this).val());
                   //     return false;

                   total_tax = tax_rate.toFixed();



                   $(".stax_amount_" + id).val(total_tax);

                   //     var total_price = ($(".selling_price_" + id).val() * $(this).val()) + total_tax;

                   var total_price = ($(".sunit_price_" + id).val() * $(this).val());



                   $(".stotal_price_" + id).val(total_price);

                   var total = 0;

                   $(".stotal_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        if (total) {
                             $(".stotal_amount").val(total);
                        }



                   });

                   var tax_rate = $(".stax_rate_" + id).val();

                   var quantity = $(this).val();

                   var total_price = parseFloat(tax_rate) + 100;

                   var selling_unit_price = $(".sunit_price_" + id).val()

                   var selling_price = (selling_unit_price * 100) / total_price;

                   var tax_amount = selling_price * (tax_rate / 100);

                   var total_tax_amount = tax_amount * quantity;

                   selling_unit_price = selling_unit_price * quantity;

                   var selling_price_wo_tax = selling_price * quantity;


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(this).val(),
                        tax_rate: $(".stax_rate_" + id).val(),
                        tax_amount: tax_amount.toFixed(2),
                        unit_price: $(".sunit_price_" + id).val(),
                        selling_unit_price: $(".sunit_price_" + id).val(),
                        selling_price: selling_price.toFixed(2),
                        total_tax_amount: total_tax_amount.toFixed(2),
                        total_price_wo_tax: selling_price_wo_tax.toFixed(2),
                        total_price: $(".stotal_price_" + id).val(),
                        service_id: $(".service_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })
              });


              $(document).on("keyup", ".rselling_unit_price", function() {



                   var selling_unit_price = $(this).val();

                   var id = $(this).data("id");

                   if ($(this).val() <= $(".runit_price_" + id).val()) {

                        var tax_rate = $(".rtax_rate_" + id).val();

                        var quantity = $(".rquantity_" + id).val();

                        var total_price = parseFloat(tax_rate) + 100;

                        var selling_price = (selling_unit_price * 100) / total_price;

                        var tax_amount = selling_price * (tax_rate / 100);

                        var total_tax_amount = tax_amount * quantity;

                        selling_unit_price = selling_unit_price * quantity;

                        var selling_price_wo_tax = selling_price * quantity;

                        $(".rtotal_tax_amount_" + id).val(total_tax_amount.toFixed(2));

                        $(".rtax_amount_" + id).val(tax_amount.toFixed(2));

                        $(".rwototal_price_" + id).val(selling_price_wo_tax.toFixed(2));

                        $(".rtotal_price_" + id).val(selling_unit_price);

                        $(".rselling_price_" + id).val(selling_price.toFixed(2));

                        formdata = {
                             item_id: $(".item_id_" + id).val(),
                             quantity: $(".rquantity_" + id).val(),
                             tax_rate: $(".rtax_rate_" + id).val(),
                             total_tax_amount: $(".rtotal_tax_amount_" + id).val(),
                             tax_amount: $(".rtax_amount_" + id).val(),
                             unit_price: $(".runit_price_" + id).val(),
                             selling_price: $(".rselling_price_" + id).val(),
                             selling_unit_price: $(".rselling_unit_price_" + id).val(),
                             total_price_wo_tax: $(".rwototal_price_" + id).val(),
                             total_price: $(".rtotal_price_" + id).val(),
                             product_id: $(".product_id").val(),
                             pcustomer_id: $(".pcustomer_id").val(),
                             lead_id: $(".lead_id").val(),
                             is_active: "1"
                        };


                        var total_amount = 0
                        var total_tax = 0;

                        $(".rtotal_price").each(function(k, v) {
                             total_amount = total_amount + parseFloat($(this).val());
                        });
                        $(".rtotal_tax_amount").each(function(k, v) {
                             total_tax = total_tax + parseFloat($(this).val());
                        });

                        console.log(total_amount);

                        var alltotal = '<hr /><div class="col-sm-12 col-md-4 total-price-amount">Total Amount ' + total_amount + '</div>';
                        alltotal += '<div class="col-sm-12 col-md-4 total-tax-amount">Total Tax Amount ' + total_tax.toFixed(2) + '</div>';
                        $(".total-items").html(alltotal);

                        $.ajax({
                             method: "post",
                             url: "<?= base_url() ?>ajax/singleproductsubmit",
                             data: formdata,
                             success: function(status) {
                                  if (total_amount) {

                                  }
                             }
                        })

                   } else {
                        $(this).attr("disable", true).attr("readonly", true);
                        //     alert("Selling price is greater than unit price")
                   }


              })




              $(document).on("keyup", ".quantity", function() {

                   var id = $(this).data("id");

                   //     var tax_rate = $(".selling_price_" + id).val() * ($(".tax_rate_" + id).val() / 100);

                   var tax_rate = $(".unit_price_" + id).val() * ($(".tax_rate_" + id).val() / 100);

                   //     console.log("testing",$(this).val());
                   //     return false;

                   total_tax = tax_rate.toFixed();



                   $(".tax_amount_" + id).val(total_tax);

                   //     var total_price = ($(".selling_price_" + id).val() * $(this).val()) + total_tax;

                   var total_price = ($(".unit_price_" + id).val() * $(this).val());



                   $(".total_price_" + id).val(total_price);

                   var total = 0;

                   $(".total_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        if (total) {
                             $(".total_amount").val(total);
                        }



                   });

                   var tax_rate = $(".tax_rate_" + id).val();

                   var quantity = $(this).val();

                   var total_price = parseFloat(tax_rate) + 100;

                   var selling_unit_price = $(".unit_price_" + id).val()

                   var selling_price = (selling_unit_price * 100) / total_price;

                   var tax_amount = selling_price * (tax_rate / 100);

                   var total_tax_amount = tax_amount * quantity;

                   selling_unit_price = selling_unit_price * quantity;

                   var selling_price_wo_tax = selling_price * quantity;


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(this).val(),
                        tax_rate: $(".tax_rate_" + id).val(),
                        tax_amount: tax_amount.toFixed(2),
                        unit_price: $(".unit_price_" + id).val(),
                        selling_unit_price: $(".unit_price_" + id).val(),
                        selling_price: selling_price.toFixed(2),
                        total_tax_amount: total_tax_amount.toFixed(2),
                        total_price_wo_tax: selling_price_wo_tax.toFixed(2),
                        total_price: $(".total_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })
              });


              $(document).on("keyup", ".rquantity", function() {



                   var id = $(this).data("id");

                   var selling_unit_price = $(".rselling_unit_price_" + id).val() //$(this).val();

                   var tax_rate = $(".rtax_rate_" + id).val();

                   var quantity = $(this).val(); //$(".rquantity_" + id).val();

                   var total_price = parseFloat(tax_rate) + 100;

                   var selling_price = (selling_unit_price * 100) / total_price;

                   var tax_amount = selling_price * (tax_rate / 100);

                   var total_tax_amount = tax_amount * quantity;

                   selling_unit_price = selling_unit_price * quantity;

                   var selling_price_wo_tax = selling_price * quantity;

                   $(".rtotal_tax_amount_" + id).val(total_tax_amount.toFixed(2));

                   $(".rtax_amount_" + id).val(tax_amount.toFixed(2));

                   $(".rwototal_price_" + id).val(selling_price_wo_tax.toFixed(2));

                   $(".rtotal_price_" + id).val(selling_unit_price);

                   $(".rselling_price_" + id).val(selling_price.toFixed(2));

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".rquantity_" + id).val(),
                        tax_rate: $(".rtax_rate_" + id).val(),
                        total_tax_amount: $(".rtotal_tax_amount_" + id).val(),
                        tax_amount: $(".rtax_amount_" + id).val(),
                        unit_price: $(".runit_price_" + id).val(),
                        selling_price: $(".rselling_price_" + id).val(),
                        selling_unit_price: $(".rselling_unit_price_" + id).val(),
                        total_price_wo_tax: $(".rwototal_price_" + id).val(),
                        total_price: $(".rtotal_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };


                   var total_amount = 0
                   var total_tax = 0;

                   $(".rtotal_price").each(function(k, v) {
                        total_amount = total_amount + parseFloat($(this).val());
                   });
                   $(".rtotal_tax_amount").each(function(k, v) {
                        total_tax = total_tax + parseFloat($(this).val());
                   });

                   console.log(total_amount);

                   var alltotal = '<hr /><div class="col-sm-12 col-md-4 total-price-amount">Total Amount ' + total_amount + '</div>';
                   alltotal += '<div class="col-sm-12 col-md-4 total-tax-amount">Total Tax Amount ' + total_tax + '</div>';
                   $(".total-items").html(alltotal);

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             if (total_amount) {

                             }
                        }
                   })
              });

              $(document).on("keyup", ".runit_price", function() {

                   var id = $(this).data("id");

                   var tax_rate = $(".runit_price_" + id).val() * ($(".rtax_rate_" + id).val() / 100);

                   // return false;

                   total_tax = tax_rate * $(".rquantity_" + id).val();



                   $(".rtax_amount_" + id).val(total_tax);

                   var total_price = ($(".rquantity_" + id).val() * $(this).val()) + total_tax;



                   $(".rtotal_price_" + id).val(total_price);

                   var total = 0;

                   $(".rtotal_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        console.log(total);

                        if (total) {
                             $(".total-price-amount").html('Total Amount ' + total + '');
                        }
                   });


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(this).val(),
                        tax_rate: $(".rtax_rate_" + id).val(),
                        tax_amount: $(".rtax_amount_" + id).val(),
                        unit_price: $(".runit_price_" + id).val(),
                        total_price: $(".rtotal_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };


                   //     console.log(formdata); return false;

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })

              });

              $(document).on("click", ".remove", function() {

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".quantity_" + id).val(),
                        tax_rate: $(".tax_rate_" + id).val(),
                        tax_amount: $(".tax_amount_" + id).val(),
                        unit_price: $(".unit_price_" + id).val(),
                        total_price: $(".total_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "0"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             $(".customer-items .item_" + id).remove();

                        }
                   })
              });

              $(document).on("change", "#all-data", function() {
                   var formdata = $(".assign-product").serializeArray();
                   // console.log(formdata);
                   // return false;
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/submitProductItem",
                        data: formdata,
                        success: function(status) {
                             console.log(status);
                        }
                   })
              });

              $(document).on("change", ".add", function() {

                   console.log($(this).prop("checked"));

                   var id = $(this).data("id");

                   var formdata;

                   if ($(this).prop("checked") == false) {
                        formdata = {
                             item_id: $(".item_id_" + id).val(),
                             quantity: $(".quantity_" + id).val(),
                             tax_rate: $(".tax_rate_" + id).val(),
                             tax_amount: $(".tax_amount_" + id).val(),
                             unit_price: $(".unit_price_" + id).val(),
                             total_price: $(".total_price_" + id).val(),
                             product_id: $(".product_id").val(),
                             pcustomer_id: $(".pcustomer_id").val(),
                             lead_id: $(".lead_id").val(),
                             is_active: "0"
                        };
                   } else {
                        formdata = {
                             item_id: $(".item_id_" + id).val(),
                             quantity: $(".quantity_" + id).val(),
                             tax_rate: $(".tax_rate_" + id).val(),
                             tax_amount: $(".tax_amount_" + id).val(),
                             unit_price: $(".unit_price_" + id).val(),
                             total_price: $(".total_price_" + id).val(),
                             product_id: $(".product_id").val(),
                             pcustomer_id: $(".pcustomer_id").val(),
                             lead_id: $(".lead_id").val(),
                             is_active: "1"
                        };
                   }

                   // console.log(formdata); return false;

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             console.log(status);
                        }
                   })
              });

              //terms and conditions

              $(".pills-terms-tab").click(function() {
                   var customer_id = $(".pcustomer_id").val();
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getTerms",
                        data: {
                             customer_id: customer_id
                        },
                        success: function(status) {
                             status = JSON.parse(status);
                             $(".terms").html('');

                             $.each(status["master_term"], function(k, v) {
                                  var checked = "";
                                  $.each(status["customer_term"], function(k1, v1) {
                                       if (v["term_id"] == v1["term_id"] && v1["is_active"] == 1) {
                                            checked = (v["term_id"] == v1["term_id"]) ? "checked" : "";
                                       }

                                  });
                                  k = k + 1;
                                  var html = "";

                                  html += "<div class='col-sm-12'><input " + checked + " type='checkbox' class='term-check' value='" + v["term_id"] + "'> " + k + ' ' + v["term_name"] + "</div>";

                                  $(".terms").append(html);

                             });

                        }
                   });
              });

              $(document).on("change", ".term-check", function() {
                   if ($(this).prop("checked")) {
                        var data = {
                             term_id: $(this).val(),
                             customer_id: $(".pcustomer_id").val(),
                             is_active: 1,
                             lead_id: $(".lead_id").val()
                        }
                        $.ajax({
                             method: "post",
                             url: "<?= base_url() ?>ajax/submitCustomerTerm",
                             data: data,
                             success: function(status) {

                             }
                        })
                   } else {
                        var data = {
                             term_id: $(this).val(),
                             customer_id: $(".pcustomer_id").val(),
                             is_active: 0,
                             lead_id: $(".lead_id").val()
                        }

                        $.ajax({
                             method: "post",
                             url: "<?= base_url() ?>ajax/submitCustomerTerm",
                             data: data,
                             success: function(status) {

                             }
                        })
                   }
              });

              $("#customer-search").on("keyup", function() {
                   var value = $(this).val().toLowerCase();

                   $(".customer-list li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
              })

              $("#product-search").on("keyup", function() {
                   var value = $(this).val().toLowerCase();

                   $(".product-list li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
              })

              $(document).on("submit", "#oppo-form", function(e) {
                   e.preventDefault();
                   var formdata = $(this).serializeArray();
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/opportunity",
                        data: formdata,
                        success: function(res) {
                             localStorage.setItem("tabs", "#pills-contact");
                             $("#oppo-form").trigger("reset");
                             location.reload();
                        }
                   })
              });

              $(".activity").on("change", function() {
                   var activity = $(this).find(":selected").data("activity");

                   if (activity == "schedule_meeting") {
                        $("#mactivity_id").val($(this).val());
                        $(".log_call").addClass("d-none");
                        $(".meeting").removeClass("d-none");
                   } else if (activity == "log_call") {
                        $("#lactivity_id").val($(this).val());
                        $(".log_call").removeClass("d-none");
                        $(".meeting").addClass("d-none");
                   } else {
                        $("#cactivity_id").val($(this).val());
                        $("#composemail").modal("show");
                        $(".log_call").addClass("d-none");
                        $(".meeting").addClass("d-none");
                   }
              });


              $("#startDate").datepicker({
                   format: 'dd-mm-yyyy',
                   todayBtn: true,
                   todayHighlight: true,
                   autoclose: true,
              }).on('changeDate', function(selected) {
                   var minDate = new Date();
                   $('#endDate').datepicker('setStartDate', minDate);
              }).datepicker("setDate", "1");

              $("#fromdate").datepicker({
                   format: 'dd-mm-yyyy',
                   todayBtn: true,
                   todayHighlight: true,
                   autoclose: true,
              }).on('changeDate', function(selected) {
                   var minDate = new Date();
                   $('#endDate').datepicker('setStartDate', minDate);
              }).datepicker("setDate", "1");;


              $("#endDate").datepicker({
                   format: 'dd-mm-yyyy',
                   autoclose: true,
              }).on('changeDate', function(selected) {
                   var minDate = new Date(selected.date.valueOf());
                   $('#startDate').datepicker('setEndDate', minDate);
              });

              $(document).on("submit", "#activity-form", function(e) {
                   e.preventDefault();
                   var formdata = $(this).serializeArray();



                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/activitymeeting",
                        data: formdata,
                        success: function(res) {
                             $(".meeting").addClass("d-none");
                             $("#activity-form").trigger("reset");
                             getActivity();
                        }
                   })
              });

              $(document).on("submit", ".log_form", function(e) {
                   e.preventDefault();

                   var formdata = $(this).serializeArray();

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/logCall",
                        data: formdata,
                        success: function(res) {
                             // console.log(res); return false;
                             $(".log_call").addClass("d-none");
                             $(".log_form").trigger("reset");
                             getActivity();
                        }
                   })
              });

              $(document).on("submit", ".compose_form", function(e) {
                   e.preventDefault();

                   var formdata = ($(this).serializeArray());

                   // console.log(formdata); return false;

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/composeMail",
                        data: formdata,
                        success: function(res) {
                             //     console.log(res); return false;
                             $(".compose_form").trigger("reset");
                             $("#composemail").modal("hide");
                             $(".log_call").addClass("d-none");
                             $(".meeting").addClass("d-none");

                             //     getActivity();
                        }
                   })


              });

              getActivity();

              function getActivity() {
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getactivity",
                        data: {
                             lead_id: $("#lead_id").val()
                        },
                        success: function(res) {
                             res = JSON.parse(res);
                             console.log(res);
                             $(".activity-table tbody").html('');
                             $.each(res, function(k, v) {
                                  var meet = "";
                                  var name = "";
                                  var duedate = (v["start_date_time"]) ? v["start_date_time"] : v["end_date_time"];
                                  if (v["activity_master_id"] == 1) {
                                       meet = '<i class="fa fa-group" style="font-size:18px;"></i> ';
                                       name = "updatemeeting";
                                  } else if (v["activity_master_id"] == 2) {
                                       meet = '<i class="fa fa-phone" style="font-size:18px;"></i> ';
                                       name = "updatelogcall"
                                  } else if (v["activity_master_id"] == 3) {
                                       meet = '<i class="fa fa-paper-plane" style="font-size:18px;"></i> ';
                                       name = "updatecomposemail";
                                  }
                                  var html = '<tr><td>' + meet + v["subject"] + '</td>';
                                  html += '<td>' + v["status"] + '</td>';
                                  //     html += '<td>&nbsp;</td>';
                                  html += '<td>' + duedate + '</td>';
                                  html += '<td>' + v["assigned_to"] + '</td>'
                                  html += '<td><button data-id="' + v["id"] + '" data-activity="' + name + '" class="btn btn-info edit-activity"><i class="fa fa-pencil"></i></button> ';
                                  //     html += ' <button class="btn btn-primary"><i class="fa fa-times"></i></button>';
                                  html += ' <a href="<?= base_url() ?>dashboard/lead/activity/delete/' + v["id"] + '" class="btn btn-danger"><i class="fa fa-trash"></i></a> </td></tr>';
                                  if (v["activity_master_id"] != 3) {
                                       $(".activity-table tbody").append(html);
                                  }


                             });
                        }
                   })
              }

              $(document).on("click", ".edit-activity", function() {
                   var activity = $(this).data("activity");
                   var activity_id = $(this).data("id");

                   if (activity == "updatemeeting") {
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
                                  $("#massigned").val(res[0]["assigned_to"]);
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

                   } else if (activity == "updatelogcall") {
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

                                  $("#lassigned").val(res[0]["assigned_to"]);
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
                                  $("#" + activity).modal("show");
                             }
                        })

                   }

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


              $(document).on("submit", ".refer-form", function(e) {
                   e.preventDefault();

                   

                   

                   var formdata = $(this).serializeArray();

                   console.log(formdata);

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/leadreference",
                        data: formdata,
                        success: function(status) {
                             console.log("testing reference", status);
                        }
                   })

              });
         });
    </script>