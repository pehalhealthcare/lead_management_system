

<div class="col-sm-12 col-md-6 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php  echo form_open_multipart(''); ?>
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">Edit Leads</h4>     
     </div>
     <div class="card-body">

          <!-- <div class="form-group">
               <label for="">Application Number</label>
               <input type="text" name="application" class="form-control" value="<?php echo set_value('application') ? set_value('application') : time(); ?>"  />
          </div> -->

          <div class="form-group">
               <label for="userfile"><img src="<?= base_url()?>uploads/lead_image/<?= $leads[0]["lead_image"]?>" width="50px"><br>Change<br></label>
               <input type="file" name="userfile" accept="image/*" class="form-control d-none" id="userfile">
               <input type="hidden" name="lead_id" value="<?= $leads[0]["id"]?>">
          </div>

          <div class="form-group">
               <label for="">Order Type</label>
               <select name="lead_source" id="" class="form-control">
                    <option value="">Select Order Type</option>
                    <option <?= ($leads[0]["lead_source"]=="1") ? "selected" : "" ?> value="1">Services</option>
                    <option <?= ($leads[0]["lead_source"]=="2") ? "selected" : "" ?> value="2">Product</option>
                    <option <?= ($leads[0]["lead_source"]=="3") ? "selected" : "" ?> value="3">Both Product & Service</option>
               </select>
          </div>

          <div class="form-group">
               <label for="">Assigned To</label>
               <select name="assigned_to" id="" class="form-control">
                    <option value="">Select Assignee</option>
                    <?php foreach($agents as $agent): if($agent["role"]=="2" && $agent["category"]=="BA"):?>
                    <option <?= ($leads[0]["assigned_to"]==$agent["id"]) ? "selected" : "" ?>  value="<?= $agent["id"] ?> "><?php echo $agent["firstname"]; ?></option>
                    <?php endif; endforeach;?>
               </select>
          </div>

          <input type="hidden" name="assigned_by" value="<?= $this->session->userID;?>">

          <div class="form-group ">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name" value="<?= ($leads[0]["name"]) ? $leads[0]["name"] : set_value('name'); ?>"  />
               </div>
               <div class="form-group bordered">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" class="form-control" placeholder="Enter Your Email" value="<?= ($leads[0]["email"]) ? $leads[0]["email"] : set_value('email'); ?>"  />
               </div>
               <div class="form-group ">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" id="" placeholder="Enter Your Mobile" class="form-control" value="<?= ($leads[0]["mobile"]) ? $leads[0]["mobile"] : set_value('mobile'); ?>"  />
               </div>

          <!-- <div class="form-group">
               <input type="radio" class="customer" name="customer" value="new" id="">New Customer
               <input type="radio" class="customer" name="customer" checked value="old" id="">Existing Customer
          </div> -->
          
          <!-- <div class="form-group exist-customers">
               <label for="">Select Customer</label>
               <select name="customer" id="" class="form-control select-customer">
                    <option value="">Select Customers</option>
                    <?php foreach($customers as $customer):?>
                         <option <?= ($customer->customer_id==$customerID[0]["customer_id"]) ? "selected" : "" ?> value="<?= $customer->customer_id?>"><?= $customer->name?></option>
                    <?php endforeach;?>
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
                    <option <?= ($leads[0]["status"]=="qualified") ? "selected" : "" ?> value="qualified">Qualified</option>
                    <option <?= ($leads[0]["status"]=="disqualified") ? "selected" : "" ?> value="disqualified">DisQualified</option>
               </select>
          </div> -->

          <!-- <div class="form-group">
               <label for="">Reason with Queries</label>
               <input type="text" name="reasons" class="form-control" value="<?= ($leads[0]["reasons"]) ? $leads[0]["reasons"] : set_value('reasons'); ?>"  />
          </div> -->


     </div>
     <div class="card-footer">
          <div class="form-group">
               <input type="submit" class="btn btn-success" value="ADD" />
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
                         <input type="text" name="name" id=""  class="form-control border-bottom border-primary" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group bordered">
                         <label for="">Email</label>
                         <input type="text" name="email" id=""  class="form-control border-bottom border-primary" placeholder="Enter Your Email">
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
                    <input type="submit" value="ADD" class="btn btn-success">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
      </form> 
    </div>
  </div>
</div>


<script>
$(document).ready(function(){

     $(".customer").change(function(){
          if($(".customer:checked").val()=="new")
          {
               $(".exist-customers").addClass("d-none")
               $("#customer-data").modal("show");
          }
          else
          {
               $(".exist-customers").removeClass("d-none")
          }
     });

     $(".add-customer").on("submit",function(e){
          e.preventDefault();
          var formdata = $(".add-customer").serialize();

          // console.log(formdata);
          $.ajax({
               url:"<?= base_url()?>ajax/addcustomerdata",
               method:"post",
               data:formdata,
               success:function(status)
               {
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