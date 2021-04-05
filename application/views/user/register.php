

<div class="col-sm-12 col-md-3 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php echo form_open('/'); ?>
<div class="card bg-dark text-white">
     <div class="card-header">
          <h4 class="text-center">User Login</h4>     
     </div>
     <div class="card-body">
          <div class="form-group">
               <label for="">First Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('first_name'); ?>" size="50" />
          </div>

          <div class="form-group">
               <label for="">Last Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('last_name'); ?>" size="50" />
          </div>

          <div class="form-group">
               <label for="">Department</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('department'); ?>" size="50" />
          </div>


          <div class="form-group">
               <label for="">Email ID</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" size="50" />
          </div>

          <div class="form-group">
               <label for="">Mobile</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>" size="50" />
          </div>

          <div class="form-group">
               <label for="">Role</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('role'); ?>" size="50" />
          </div>

          

          <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" size="50" />
          </div>
     </div>
     <div class="card-footer">
          <div class="form-group">
               <input type="submit" class="btn btn-success" value="Submit" />
               <a href="">Forgot Password ?</a>
          </div>
     </div>
</div>
</form>
</div>


