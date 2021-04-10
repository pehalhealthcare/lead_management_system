

<div class="col-sm-12 col-md-3 mx-auto mt-5">
<?php echo validation_errors(); ?>
<?php echo form_open('/'); ?>
<div class="card bg-dark text-white">
     <div class="card-header">
     <img src="<?= base_url()?>assets/images/logo.jpeg" style="width:100%">
          <h4 class="text-center">User Login</h4>     
     </div>
     <div class="card-body">
          <div class="form-group">
               <?= ($error) ? '<p class="alert alert-danger">'.$error.'</p>' : "" ?>
          </div>
          <div class="form-group">
          <label for="">Useremail</label>
          <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" size="50" />
          </div>
          <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" size="50" />
          </div>

          <!-- <div class="form-group">
               <label for="">Select Role</label>
               <Select class="role form-control" name="role">
                    <option value="">Select your role</option>
                    <option value="1">Admin</option>
                    <option value="2">Group</option>
               </Select>
          </div> -->

          
     </div>
     <div class="card-footer">
          <div class="form-group">
          <input type="submit" class="btn btn-success" value="Submit" />
          <a href="forgot-password">Forgot Password ?</a>
          </div>
     </div>
</div>
</form>
</div>


