<div class="main-panel page has-sidebar-left height-full">
     <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
          <?php echo validation_errors(); ?>

          <?php echo form_open_multipart(''); ?>
          <div class="card bg-white">
               <div class="card-header">
                    <h4 class="text-center">Edit Leads</h4>
               </div>
               <div class="card-body">

                    <!-- <div class="form-group">
               <label for="">Application Number</label>
               <input type="text" name="application" class="form-control" value="<?php echo set_value('application') ? set_value('application') : time(); ?>"  />
          </div> -->

                    <div class="form-group">
                         <label for="userfile"><img src="<?= base_url() ?>uploads/lead_image/<?= ($leads[0]["lead_image"]) ? $leads[0]["lead_image"] : "no-image.jpg" ?>" width="50px"><br>Change<br></label>
                         <input type="file" name="userfile" accept="image/*" class="form-control d-none" id="userfile">
                         <input type="hidden" name="lead_id" value="<?= $leads[0]["id"] ?>">
                    </div>


                    <div class="form-group">
                         <label for="">Lead Source</label>
                         <select name="lead_source" id="" class="form-control">
                              <option value="">Select Lead Source</option>
                              <option <?= ($leads[0]["lead_source"] == "whatsapp") ? "selected" : "" ?> label="Whats App" value="whatsapp">Whats App</option>
                              <option <?= ($leads[0]["lead_source"] == "india_mart") ? "selected" : "" ?> label="India Mart" value="india_mart">India Mart</option>
                              <option <?= ($leads[0]["lead_source"] == "Cold Call") ? "selected" : "" ?> label="Cold Call" value="Cold Call">Cold Call</option>
                              <option <?= ($leads[0]["lead_source"] == "Existing Customer") ? "selected" : "" ?> label="Existing Customer" value="Existing Customer">Existing Customer</option>
                              <option <?= ($leads[0]["lead_source"] == "Self Generated") ? "selected" : "" ?> label="Self Generated" value="Self Generated">Self Generated</option>
                              <option <?= ($leads[0]["lead_source"] == "Employee") ? "selected" : "" ?> label="Employee" value="Employee">Employee</option>
                              <option <?= ($leads[0]["lead_source"] == "Partner") ? "selected" : "" ?> label="Partner" value="Partner">Partner</option>
                              <option <?= ($leads[0]["lead_source"] == "Public Relations") ? "selected" : "" ?> label="Public Relations" value="Public Relations">Public Relations</option>
                              <option <?= ($leads[0]["lead_source"] == "Direct Mail") ? "selected" : "" ?> label="Direct Mail" value="Direct Mail">Direct Mail</option>
                              <option <?= ($leads[0]["lead_source"] == "Conference") ? "selected" : "" ?> label="Conference" value="Conference">Conference</option>
                              <option <?= ($leads[0]["lead_source"] == "Trade Show") ? "selected" : "" ?> label="Trade Show" value="Trade Show">Trade Show</option>
                              <option <?= ($leads[0]["lead_source"] == "Web Site") ? "selected" : "" ?> label="Web Site" value="Web Site">Web Site</option>
                              <option <?= ($leads[0]["lead_source"] == "Word of mouth") ? "selected" : "" ?> label="Word of mouth" value="Word of mouth">Word of mouth</option>
                              <option <?= ($leads[0]["lead_source"] == "Email") ? "selected" : "" ?> label="Email" value="Email">Email</option>
                              <option <?= ($leads[0]["lead_source"] == "Campaign") ? "selected" : "" ?> label="Campaign" value="Campaign">Campaign</option>
                              <option <?= ($leads[0]["lead_source"] == "Other") ? "selected" : "" ?> label="Other" value="Other">Other</option>
                         </select>
                    </div>

                    <div class="form-group">
                         <label for="">Category</label>
                         <select name="category" id="maincategory" class="form-control maincategory">
                              <option value="">Select Category</option>
                              <option <?= ($leads[0]["category"] == "1") ? "selected" : "" ?> value="1">Services</option>
                              <option <?= ($leads[0]["category"] == "2") ? "selected" : "" ?> value="2">Product</option>
                         </select>
                    </div>

                    <div class="form-group category_1 <?= ($leads[0]["category"] == "1") ? "" : "d-none" ?> ">
                         <label for="">Select Sub Category</label>
                         <select name="sub_category_1" id="category_1" class="form-control">
                              <option value="">Choose Sub Category</option>
                              <option <?= ($leads[0]["sub_category"] == "Sleep and Respiratory Diagnostics") ? "selected" : "" ?> value="Sleep and Respiratory Diagnostics">Sleep and Respiratory Diagnostics</option>
                              <option <?= ($leads[0]["sub_category"] == "Patinet HomeCare") ? "selected" : "" ?> value="Patinet HomeCare">Patinet HomeCare</option>
                              <option <?= ($leads[0]["sub_category"] == "Rental services") ? "selected" : "" ?> value="Rental services">Rental services</option>
                              <option <?= ($leads[0]["sub_category"] == "Medicines arrangement") ? "selected" : "" ?> value="Medicines arrangement">Medicines arrangement</option>
                              <option <?= ($leads[0]["sub_category"] == "Blood Check facilities") ? "selected" : "" ?> value="Blood Check facilities">Blood Check facilities</option>
                              <option <?= ($leads[0]["sub_category"] == "Patient Transport") ? "selected" : "" ?> value="Patient Transport">Patient Transport</option>
                              <option <?= ($leads[0]["sub_category"] == "Patient Councseling") ? "selected" : "" ?> value="Patient Councseling">Patient Councseling</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-1") ? "selected" : "" ?> value="Any other specify-1">Any other specify-1</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-2") ? "selected" : "" ?> value="Any other specify-2">Any other specify-2</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-3") ? "selected" : "" ?> value="Any other specify-3">Any other specify-3</option>
                         </select>
                    </div>

                    <div class="form-group category_2 <?= ($leads[0]["category"] == "2") ? "" : "d-none" ?>">
                         <label for="">Select Sub Category</label>
                         <select name="sub_category_2" id="category_2" class="form-control">
                              <option value="">Choose Sub Category</option>
                              <option <?= ($leads[0]["sub_category"] == "CPAP Therapy") ? "selected" : "" ?> value="CPAP Therapy">CPAP Therapy</option>
                              <option <?= ($leads[0]["sub_category"] == "BIPAP therapy") ? "selected" : "" ?> value="BIPAP therapy">BIPAP therapy</option>
                              <option <?= ($leads[0]["sub_category"] == "NIV") ? "selected" : "" ?> value="NIV">NIV</option>
                              <option <?= ($leads[0]["sub_category"] == "Ventilators") ? "selected" : "" ?> value="Ventilators">Ventilators</option>
                              <option <?= ($leads[0]["sub_category"] == "Oxygen concentrators") ? "selected" : "" ?> value="Oxygen concentrators">Oxygen concentrators</option>
                              <option <?= ($leads[0]["sub_category"] == "Portable oxygen concentrator") ? "selected" : "" ?> value="Portable oxygen concentrator">Portable oxygen concentrator</option>
                              <option <?= ($leads[0]["sub_category"] == "Mask and Aceesories") ? "selected" : "" ?> value="Mask and Aceesories">Mask and Aceesories</option>
                              <option <?= ($leads[0]["sub_category"] == "Wheel chair and support Aids") ? "selected" : "" ?> value="Wheel chair and support Aids">Wheel chair and support Aids</option>
                              <option <?= ($leads[0]["sub_category"] == "Hospital Beds and other furniture") ? "selected" : "" ?> value="Hospital Beds and other furniture">Hospital Beds and other furniture</option>
                              <option <?= ($leads[0]["sub_category"] == "Bed Accessories ,Matress etc") ? "selected" : "" ?> value="Bed Accessories ,Matress etc">Bed Accessories ,Matress etc</option>
                              <option <?= ($leads[0]["sub_category"] == "Monitoring Devices") ? "selected" : "" ?> value="Monitoring Devices">Monitoring Devices</option>
                              <option <?= ($leads[0]["sub_category"] == "Nebulizers & Atomisers") ? "selected" : "" ?> value="Nebulizers & Atomisers">Nebulizers & Atomisers</option>
                              <option <?= ($leads[0]["sub_category"] == "Indoor pollution control devices & Purifiers") ? "selected" : "" ?> value="Indoor pollution control devices & Purifiers">Indoor pollution control devices & Purifiers</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-1") ? "selected" : "" ?> value="Any other specify-1">Any other specify-1</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-2") ? "selected" : "" ?> value="Any other specify-2">Any other specify-2</option>
                              <option <?= ($leads[0]["sub_category"] == "Any other specify-3") ? "selected" : "" ?> value="Any other specify-3">Any other specify-3</option>
                         </select>
                    </div>

                    <div class="form-group">
                         <label for="">Assigned To</label>
                         <select name="assigned_to" id="" class="form-control">
                              <option value="">Select Assignee</option>
                              <?php foreach ($agents as $agent) : if ($agent["role"] == "2" && $agent["category"] == "BA") : ?>
                                        <option <?= ($leads[0]["assigned_to"] == $agent["id"]) ? "selected" : "" ?> value="<?= $agent["id"] ?> "><?php echo $agent["firstname"]; ?></option>
                              <?php endif;
                              endforeach; ?>
                         </select>
                    </div>

                    <input type="hidden" name="assigned_by" value="<?= $this->session->userID; ?>">

                    <div class="form-group ">
                         <label for="">Name</label>
                         <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name" value="<?= ($leads[0]["name"]) ? $leads[0]["name"] : set_value('name'); ?>" />
                    </div>
                    <div class="form-group bordered">
                         <label for="">Email</label>
                         <input type="text" name="email" id="" class="form-control" placeholder="Enter Your Email" value="<?= ($leads[0]["email"]) ? $leads[0]["email"] : set_value('email'); ?>" />
                    </div>
                    <div class="form-group ">
                         <label for="">Mobile</label>
                         <input type="text" name="mobile" id="" placeholder="Enter Your Mobile" class="form-control" value="<?= ($leads[0]["mobile"]) ? $leads[0]["mobile"] : set_value('mobile'); ?>" />
                    </div>

                    <!-- <div class="form-group">
               <input type="radio" class="customer" name="customer" value="new" id="">New Customer
               <input type="radio" class="customer" name="customer" checked value="old" id="">Existing Customer
          </div> -->

                    <!-- <div class="form-group exist-customers">
               <label for="">Select Customer</label>
               <select name="customer" id="" class="form-control select-customer">
                    <option value="">Select Customers</option>
                    <?php foreach ($customers as $customer) : ?>
                         <option <?= ($customer->customer_id == $customerID[0]["customer_id"]) ? "selected" : "" ?> value="<?= $customer->customer_id ?>"><?= $customer->name ?></option>
                    <?php endforeach; ?>
               </select>
          </div> -->

                    <!-- <div class="form-group d-none new-customer">
               <label for="">New Customer</label>
               <input type="text" name="customer" class="form-control input-customer" id="">
               <input type="hidden" name="customer_id" class="customer_id">
          </div> -->


                    <!-- <div class="form-group">
               <label for="">Status</label>
               <select name="status" id="" class="form-control">
                    <option value="">Select Lead Call</option>
                    <option <?= ($leads[0]["status"] == "qualified") ? "selected" : "" ?> value="qualified">Qualified</option>
                    <option <?= ($leads[0]["status"] == "disqualified") ? "selected" : "" ?> value="disqualified">DisQualified</option>
               </select>
          </div> -->

                    <!-- <div class="form-group">
               <label for="">Reason with Queries</label>
               <input type="text" name="reasons" class="form-control" value="<?= ($leads[0]["reasons"]) ? $leads[0]["reasons"] : set_value('reasons'); ?>"  />
          </div> -->


               </div>
               <div class="card-footer">
                    <div class="form-group">
                         <input type="submit" class="btn btn-success" "UPDATE & CLOSE" />
                    </div>
               </div>
          </div>
          </form>
     </div>

     <div class="modal" id="customer-data">
          <div class="modal-dialog">
               <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                         <h4 class="modal-title">Create Customer</h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="" method="post" class="add-customer" enctype="multipart/form-data">
                         <div class="modal-body">

                              <div class="form-group ">
                                   <label for="">Surname</label>
                                   <select class="form-control border-bottom border-primary" name="surname">
                                        <option value="Mr">Mr</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mrs">Mrs</option>
                                   </select>
                              </div>
                              <div class="form-group ">
                                   <label for="">Name</label>
                                   <input type="text" name="name" id="" class="form-control border-bottom border-primary" placeholder="Enter Your Name">
                              </div>
                              <div class="form-group bordered">
                                   <label for="">Email</label>
                                   <input type="text" name="email" id="" class="form-control border-bottom border-primary" placeholder="Enter Your Email">
                              </div>
                              <div class="form-group ">
                                   <label for="">Mobile</label>
                                   <input type="text" name="mobile" id="" placeholder="Enter Your Mobile" class="form-control border-bottom border-primary">
                              </div>
                              <div class="form-group ">
                                   <label for="">Alternate Mobile</label>
                                   <input type="text" name="alternate_mobile" placeholder="Enter Your Alternate Mobile" id="" class="form-control border-bottom border-primary">
                              </div>
                              <div class="form-group ">
                                   <label for="">Address 1</label>
                                   <input type="text" name="address_1" placeholder="Enter Your Address" id="" class="form-control border-bottom border-primary">
                              </div>
                              <div class="form-group ">
                                   <label for="">Address 2</label>
                                   <input type="text" name="address_2" placeholder="Enter Your Address" id="" class="form-control border-bottom border-primary">
                              </div>
                              <div class="form-group ">
                                   <label for="">Address 3</label>
                                   <input type="text" name="address_3" placeholder="Enter Your Address" id="" class="form-control border-bottom border-primary">
                              </div>
                              <!-- <div class="form-group ">
                         <label for="">Status</label>
                         <select name="status" id="" class="form-control border-bottom border-primary">
                         <option value="1">Active</option>
                         <option value="0">Inactive</option>
                         </select>
                    </div>       -->
                         </div>


                         <!-- Modal footer -->
                         <div class="modal-footer">
                              <input type="submit" value="SAVE & CLOSE" class="btn btn-success">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

</div>
<script>
     $(document).ready(function() {

          $(".maincategory").find(":selected").trigger("change");

          $(".customer").change(function() {
               if ($(".customer:checked").val() == "new") {
                    $(".exist-customers").addClass("d-none")
                    $("#customer-data").modal("show");
               } else {
                    $(".exist-customers").removeClass("d-none")
               }
          });

          $("#maincategory").on("change", function() {
               var value = $(this).find(":selected").val()
               if (value == 1) {
                    $(".category_1").removeClass("d-none");
                    $(".category_2").addClass("d-none");
               } else if (value == 2) {
                    $(".category_2").removeClass("d-none");
                    $(".category_1").addClass("d-none");
               }
          });

          $(".add-customer").on("submit", function(e) {
               e.preventDefault();
               var formdata = $(".add-customer").serialize();

               // console.log(formdata);
               $.ajax({
                    url: "<?= base_url() ?>ajax/addcustomerdata",
                    method: "post",
                    data: formdata,
                    success: function(status) {
                         console.log(status);
                         console.log(JSON.parse(status));
                         status = JSON.parse(status);
                         $(".new-customer").removeClass("d-none");
                         $(".input-customer").val(status[0]["name"]);
                         $(".customer_id").val(status[0]["customer_id"]);
                         $("#customer-data").modal("hide");
                    }
               })
          });
     })
</script>