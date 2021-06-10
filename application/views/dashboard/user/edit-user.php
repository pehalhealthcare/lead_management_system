

<div class="col-sm-12 col-md-6 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php echo form_open(''); ?>

<div class="card bg-light">
     
          
          <div class="card-header col-sm-12 col-md-12">
               <h4 class="text-center">User Register</h4>     
          </div>
          <div class="card-body">
               <div class="row">
                    <div class="form-group  col-sm-12 col-md-6">
                         <label for="">First Name</label>
                         <input type="text" name="first_name" class="form-control" value="<?php echo ($userdata[0]->firstname) ? $userdata[0]->firstname : set_value('first_name'); ?>"  />
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                         <label for="">Last Name</label>
                         <input type="text" name="last_name" class="form-control" value="<?php echo $userdata[0]->lastname ? $userdata[0]->lastname : set_value('last_name'); ?>"  />
                    </div>

                    <!-- <div class="form-group col-sm-12 col-md-6">
                         <label for="">Department</label>
                         <input type="text" name="department" class="form-control" value="<?php echo $userdata[0]->department ? $userdata[0]->department : set_value('department'); ?>"  />
                    </div> -->


                    <div class="form-group col-sm-12 col-md-6">
                         <label for="">Email ID</label>
                         <input type="text" name="email" class="form-control" value="<?php echo $userdata[0]->email ? $userdata[0]->email : set_value('email'); ?>"  />
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                         <label>Password</label>
                         <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"  />
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                         <label>Confirm Password</label>
                         <input type="password" name="cpassword" class="form-control" value="<?php echo set_value('cpassword'); ?>"  />
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                         <label for="">Mobile</label>
                         <input type="text" name="mobile" class="form-control"  value="<?php echo $userdata[0]->mobile ? $userdata[0]->mobile : set_value('mobile'); ?>"  />
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                         <label for="">Role</label>
                         <Select class="role form-control" name="role" id="role">
                              <option value="">Select role</option>
                              <option <?= ($userdata[0]->role=="1") ? "selected" : "" ?> value="1">Admin</option>
                              <option <?= ($userdata[0]->role=="2") ? "selected" : "" ?> value="2">Group</option>
                         </Select>
                    </div>
                    <?php if($userdata[0]->role=="1"): ?>
                    <div class="form-group col-sm-12 col-md-6 admin-cat">
                         <label for="">Category</label>
                         <Select class="role form-control" name="category">
                              <option value="">Select Category</option>
                              <option <?= ($userdata[0]->category=="CA") ? "selected" : "" ?> value="CA">Category A</option>
                              <option <?= ($userdata[0]->category=="CB") ? "selected" : "" ?> value="CB">Category B</option>
                              <option <?= ($userdata[0]->category=="CC") ? "selected" : "" ?> value="CC">Category C</option>
                              <option <?= ($userdata[0]->category=="CD") ? "selected" : "" ?> value="CD">Category D</option>
                         </Select>
                    </div>
                    <?php endif;?>
                    <?php if($userdata[0]->role=="2"): ?>
                    <div class="form-group col-sm-12 group-cat col-md-6">
                         <label for="">Category</label>
                         <Select class="role form-control" name="category">
                              <option value="">Select Category</option>
                              <option <?= ($userdata[0]->category=="BTL") ? "selected" : "" ?> value="BTL">Business Team Leader</option>
                              <option <?= ($userdata[0]->category=="BA") ? "selected" : "" ?> value="BA">Business Agent</option>
                              <option <?= ($userdata[0]->category=="OTL") ? "selected" : "" ?> value="OTL">Operation Team Leader</option>
                              <option <?= ($userdata[0]->category=="OA") ? "selected" : "" ?> value="OA">Operation Agent</option>
                         </Select>
                    </div>
                    <?php endif;?>
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

<script>
     $(document).ready(function(){

          $("#role").on("change",function(){
               var value = ($(this).find(":selected").val());

               if(value==1)
               {
                    $(".admin-cat").removeClass("d-none");
                    $(".group-cat").addClass("d-none");
               }
               else if(value==2)
               {
                    $(".group-cat").removeClass("d-none");
                    $(".admin-cat").addClass("d-none");
               }
               else
               {
                    $(".admin-cat").addClass("d-none");
                    $(".group-cat").addClass("d-none");
               }
          });

     })
</script>
