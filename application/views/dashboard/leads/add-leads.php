<div class="col-sm-12 col-md-6 mx-auto mt-5">
     <?php echo validation_errors(); ?>

     <?php echo form_open_multipart('dashboard/add/leads'); ?>
     <div class="card bg-light">
          <div class="card-header">
               <h4 class="text-center">Create Leads</h4>
          </div>
          <div class="card-body">

               <!-- <div class="form-group">
               <label for="">Application Number</label>
               <input type="text" name="application" class="form-control" value="<?php echo set_value('application') ? set_value('application') : time(); ?>"  />
          </div> -->

               <div class="form-group">
                    <label for="">Lead Image</label>
                    <input type="file" multiple="multiple" name="image_name[]" accept="image/*" class="form-control" id="">
               </div>

               <div class="form-group">
                    <label for="">Lead Source</label>
                    <select name="lead_source" required id="" class="form-control">
                         <option value="">Select Lead Source</option>
                         <option label="Whats App" value="whatsapp">Whats App</option>
                         <option label="India Mart" value="india_mart">India Mart</option>
                         <option label="Cold Call" value="Cold Call">Cold Call</option>
                         <option label="Existing Customer" value="Existing Customer">Existing Customer</option>
                         <option label="Self Generated" value="Self Generated">Self Generated</option>
                         <option label="Employee" value="Employee">Employee</option>
                         <option label="Partner" value="Partner">Partner</option>
                         <option label="Public Relations" value="Public Relations">Public Relations</option>
                         <option label="Direct Mail" value="Direct Mail">Direct Mail</option>
                         <option label="Conference" value="Conference">Conference</option>
                         <option label="Trade Show" value="Trade Show">Trade Show</option>
                         <option label="Web Site" value="Web Site">Web Site</option>
                         <option label="Word of mouth" value="Word of mouth">Word of mouth</option>
                         <option label="Email" value="Email">Email</option>
                         <option label="Campaign" value="Campaign">Campaign</option>
                         <option label="Other" value="Other">Other</option>
                    </select>
               </div>


               <div class="form-group">
                    <label for="">Lead Category</label>
                    <select name="category" required id="maincategory" class="form-control">
                         <option value="">Select Category</option>
                         <option value="1">Services</option>
                         <option value="2">Product</option>
                    </select>
               </div>

               <div class="form-group category_1 d-none">
                    <label for="">Select Sub Category</label>
                    <select name="sub_category" id="category_1" class="form-control">
                         <option value="">Choose Sub Category</option>
                         <option value="Sleep and Respiratory Diagnostics">Sleep and Respiratory Diagnostics</option>
                         <option value="Patinet HomeCare">Patinet HomeCare</option>
                         <option value="Rental services">Rental services</option>
                         <option value="Medicines arrangement">Medicines arrangement</option>
                         <option value="Blood Check facilities">Blood Check facilities</option>
                         <option value="Patient Transport">Patient Transport</option>
                         <option value="Patient Councseling">Patient Councseling</option>
                         <option value="Any other specify-1">Any other specify-1</option>
                         <option value="Any other specify-2">Any other specify-2</option>
                         <option value="Any other specify-3">Any other specify-3</option>
                    </select>
               </div>

               <div class="form-group category_2 d-none">
                    <label for="">Select Sub Category</label>
                    <select name="sub_category" id="category_2" class="form-control">
                         <option value="">Choose Sub Category</option>
                         <option value="CPAP Therapy">CPAP Therapy</option>
                         <option value="BIPAP therapy">BIPAP therapy</option>
                         <option value="NIV">NIV</option>
                         <option value="Ventilators">Ventilators</option>
                         <option value="Oxygen concentrators">Oxygen concentrators</option>
                         <option value="Portable oxygen concentrator">Portable oxygen concentrator</option>
                         <option value="Mask and Aceesories">Mask and Aceesories</option>
                         <option value="Wheel chair and support Aids">Wheel chair and support Aids</option>
                         <option value="Hospital Beds and other furniture">Hospital Beds and other furniture</option>
                         <option value="Bed Accessories ,Matress etc">Bed Accessories ,Matress etc</option>
                         <option value="Monitoring Devices">Monitoring Devices</option>
                         <option value="Nebulizers & Atomisers">Nebulizers & Atomisers</option>
                         <option value="Indoor pollution control devices & Purifiers">Indoor pollution control devices & Purifiers</option>
                         <option value="Any other specify-1">Any other specify-1</option>
                         <option value="Any other specify-2">Any other specify-2</option>
                         <option value="Any other specify-3">Any other specify-3</option>
                    </select>
               </div>



               <div class="form-group">
                    <label for="">Assigned To</label>
                    <select name="assigned_to" required id="" class="form-control">
                         <option value="">Select Assigned to</option>
                         <?php foreach ($agents as $agent) : if ($agent["role"] == "2" && $agent["category"] == "BA") : ?>
                                   <option value="<?= $agent["id"] ?> "><?php echo $agent["firstname"]; ?></option>
                         <?php endif;
                         endforeach; ?>
                    </select>
               </div>

               <input type="hidden" name="assigned_by" value="<?= $this->session->userID; ?>">

               <!-- <div class="form-group">
               <input type="radio" class="customer" name="customer" value="new" id="">New Customer
               <input type="radio" class="customer" name="customer" value="old" id="">Existing Customer
          </div> -->

               <!-- <div class="form-group d-none exist-customers">
               <label for="">Select Customer</label>
               <select name="customer" id="" class="form-control select-customer">
                    <option value="">Select Customers</option>
                    <?php foreach ($customers as $customer) : ?>
                         <option value="<?= $customer->customer_id ?>"><?= $customer->name ?></option>
                    <?php endforeach; ?>
               </select>
          </div> -->

               <!--      <div class="form-group d-none new-customer">
               <label for="">New Customer</label>
               <input type="text" name="customer" class="form-control input-customer" id="">
               <input type="hidden" name="customer_id" class="customer_id">
          </div> -->


               <!-- <div class="form-group">
               <label for="">Status</label>
               <select name="status" id="" class="form-control">
                    <option value="">Select Lead Call</option>
                    <option value="qualified">Qualified</option>
                    <option value="disqualified">DisQualified</option>
               </select>
          </div> -->

               <!-- <div class="form-group">
               <label for="">Reason with Queries</label>
               <input type="text" name="reasons" class="form-control" value="<?php echo set_value('reasons'); ?>"  />
          </div> -->

               <div class="form-group ">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name">
               </div>
               <div class="form-group bordered">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" placeholder="Enter Your Email">
               </div>
               <div class="form-group ">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" id="" placeholder="Enter Your Mobile" class="form-control">
               </div>


          </div>
          <div class="card-footer">
               <div class="form-group">
                    <input type="submit" class="btn btn-success" value="SAVE & CLOSE" />
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
                              <input type="text" name="address_1" placeholder="Enter Your Alternate Mobile" id="" class="form-control border-bottom border-primary">
                         </div>
                         <div class="form-group ">
                              <label for="">Address 2</label>
                              <input type="text" name="address_2" placeholder="Enter Your Alternate Mobile" id="" class="form-control border-bottom border-primary">
                         </div>
                         <div class="form-group ">
                              <label for="">Address 3</label>
                              <input type="text" name="address_3" placeholder="Enter Your Alternate Mobile" id="" class="form-control border-bottom border-primary">
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


<script>
     $(document).ready(function() {

          $("#maincategory").on("change",function(){
               var value = $(this).find(":selected").val()
               if(value==1)
               {
                    $(".category_1").removeClass("d-none");
                    $(".category_2").addClass("d-none");
               }
               else if(value==2)
               {
                    $(".category_2").removeClass("d-none");
                    $(".category_1").addClass("d-none");
               }
          });

          $(".customer").change(function() {
               if ($(".customer:checked").val() == "new") {
                    $(".exist-customers").addClass("d-none")
                    $("#customer-data").modal("show");
               } else {
                    $(".exist-customers").removeClass("d-none")
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