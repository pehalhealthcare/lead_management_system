

<div class="col-sm-12 col-md-3 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php echo form_open('/'); ?>
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">User Register</h4>     
     </div>
     <div class="card-body">
          <div class="form-group">
               <label for="">First Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('first_name'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Last Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('last_name'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Department</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('department'); ?>"  />
          </div>


          <div class="form-group">
               <label for="">Email ID</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Mobile</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Role</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('role'); ?>"  />
          </div>

          

          <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"  />
          </div>
     </div>
     <div class="card-footer">
          <div class="form-group">
               <input type="submit" class="btn btn-success" value="Register" />
          </div>
     </div>
</div>
</form>
</div>


