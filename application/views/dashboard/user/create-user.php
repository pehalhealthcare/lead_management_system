<div class="main-panel">
     <div class="content-wrapper mt-5">
          <?php echo validation_errors(); ?>

          <?php echo form_open(''); ?>

          <div class="card bg-white">
               <div class="card-header col-sm-12 col-md-12">
                    <h4 class="text-center">User Register</h4>
               </div>
               <div class="card-body">
                    <div class="row">
                         <div class="form-group  col-sm-12 col-md-6">
                              <label for="">First Name</label>
                              <input type="text" name="first_name" required class="form-control" value="<?php echo set_value('first_name'); ?>" />
                         </div>

                         <div class="form-group col-sm-12 col-md-6">
                              <label for="">Last Name</label>
                              <input type="text" name="last_name" required class="form-control" value="<?php echo set_value('last_name'); ?>" />
                         </div>

                         <!-- <div class="form-group col-sm-12 col-md-6">
                         <label for="">Department</label>
                         <input type="text" name="department" class="form-control" value="<?php echo set_value('department'); ?>"  />
                    </div> -->


                         <div class="form-group col-sm-12 col-md-6">
                              <label for="">Email ID</label>
                              <input type="email" name="email" required class="form-control" value="<?php echo set_value('email'); ?>" />
                         </div>

                         <div class="form-group col-sm-12 col-md-6">
                              <label>Password</label>
                              <input type="password" name="password" required class="form-control" value="<?php echo set_value('password'); ?>" />
                         </div>

                         <div class="form-group col-sm-12 col-md-6">
                              <label>Confirm Password</label>
                              <input type="password" name="cpassword" required class="form-control" value="<?php echo set_value('cpassword'); ?>" />
                         </div>

                         <div class="form-group col-sm-12 col-md-6">
                              <label for="">Mobile</label>
                              <input type="text" name="mobile" required class="form-control" value="<?php echo set_value('mobile'); ?>" />
                         </div>

                         <div class="form-group col-sm-12 col-md-6">
                              <label for="">Role</label>
                              <Select class="role form-control" required name="role" id="role">
                                   <option value="">Select role</option>
                                   <option value="1">Admin</option>
                                   <option value="2">Group</option>
                              </Select>
                         </div>

                         <div class="form-group col-sm-12 col-md-6 admin-cat d-none">
                              <label for="">Category</label>
                              <Select class="role form-control" name="category">
                                   <option value="">Select Category</option>
                                   <option value="CA">Category A</option>
                                   <option value="CB">Category B</option>
                                   <option value="CC">Category C</option>
                                   <option value="CD">Category D</option>
                              </Select>
                         </div>

                         <div class="form-group col-sm-12 group-cat col-md-6 d-none">
                              <label for="">Category</label>
                              <Select class="role form-control" name="category">
                                   <option value="">Select Category</option>
                                   <option value="BTL">Business Team Leader</option>
                                   <option value="BA">Business Agent</option>
                                   <option value="OTL">Operation Team Leader</option>
                                   <option value="OA">Operation Agent</option>
                              </Select>
                         </div>
                    </div>
               </div>
               <div class="card-footer col-sm-12 col-md-12">
                    <div class="form-group">
                         <input type="submit" class="btn btn-success" value="Register" />
                    </div>
               </div>

          </div>
          </form>
     </div>
</div>

<script>
     $(document).ready(function() {

          $("#role").on("change", function() {
               var value = ($(this).find(":selected").val());

               if (value == 1) {
                    $(".admin-cat").removeClass("d-none");
                    $(".group-cat").addClass("d-none");
               } else if (value == 2) {
                    $(".group-cat").removeClass("d-none");
                    $(".admin-cat").addClass("d-none");
               } else {
                    $(".admin-cat").addClass("d-none");
                    $(".group-cat").addClass("d-none");
               }
          });

     })
</script>