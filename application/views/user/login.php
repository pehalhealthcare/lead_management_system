<div class="container-fluid">
     <div class="row">
          <div class="col-sm-12 col-md-3 mt-5">
               <?php echo validation_errors(); ?>
               <?php echo form_open('/'); ?>
               <div class="card bg-white border-0">
                    <div class="card-header bg-white border-0">
                         <img src="<?= base_url() ?>assets/images/logo.png" style="width:100%">
                         <h4 class="text-center">User Login</h4>
                    </div>
                    <div class="card-body">
                         <div class="form-group">
                              <?= ($error) ? '<p class="alert alert-danger">' . $error . '</p>' : "" ?>
                         </div>
                         <div class="input-group mt-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                              </div>


                              <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" size="50" />
                         </div>
                         <div class="input-group mt-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                              </div>

                              <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" size="50" />
                         </div>

                    </div>
                    <div class="card-footer bg-white border-0">
                         <div class="form-group">
                              <input type="submit" class="btn btn-primary form-control" value="Log In" />
                              <a href="<?= base_url()?>forgot-password">Forgot Password ?</a>
                         </div>
                    </div>
               </div>
               </form>
          </div>
          <div class="col-sm-12 col-md-9 bg-primary height-full" style="min-height:100vh;">

          </div>
     </div>
</div>