<div class="container-fluid">
     <div class="row">
          <div class="col-sm-12 col-md-3 mt-5">
               <?php echo validation_errors(); ?>

               <?php $attributes = array('class' => 'forgot-form');
               echo form_open('forgot-password', $attributes); ?>
               <div class="card bg-white border-0">
                    <img src="<?= base_url() ?>assets/images/logo.png" style="width:100%">
                    <div class="card-header bg-white border-0">
                         <h4 class="text-center">Forgot Password</h4>
                    </div>
                    <div class="card-body bg-white border-0">
                         <div class="form-group">
                              <p class="error"></p>
                              <div class="input-group mt-3">
                                   <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                                   </div>
                                   <input type="text" name="email" class="form-control email" value="<?php echo set_value('email'); ?>" size="50" />
                              </div>
                         </div>
                         <div class="input-group password-hide d-none mt-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                              </div>
                              <input type="password" name="password" class="form-control password" value="<?php echo set_value('password'); ?>" size="50" />
                         </div>
                         <div class="input-group password-hide d-none mt-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                              </div>
                              <input type="password" name="cpassword" class="form-control cpassword" value="<?php echo set_value('cpassword'); ?>" size="50" />
                         </div>

                    </div>
                    <div class="card-footer bg-white border-0">
                         <div class="form-group">
                              <input type="submit" class="form-control btn btn-primary submit" value="Forgot Password" />
                              <a href="<?= base_url()?>">Remember your password?</a>
                         </div>
                    </div>
               </div>
               </form>
          </div>
          <div class="col-sm-12 col-md-9 bg-primary height-full" style="min-height:100vh;">

          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          $(document).on("submit", ".forgot-form", function(e) {

               e.preventDefault();

               var email = $(".email").val();
               var password = $(".password").val();
               var cpassword = $(".cpassword").val();

               console.log(email.length);

               if (email.length > 0) {
                    $.ajax({
                         url: "usernamecheck",
                         method: "post",
                         data: {
                              email: email
                         },
                         success: function(res) {
                              if (res == "true") {
                                   $(".password-hide").removeClass("d-none");
                                   $(".error").text("");
                              } else {
                                   $(".password-hide").addClass("d-none");
                                   $(".error").text("Please enter correct user email");
                              }
                         }
                    })

               }

               if (email.length > 0 && password.length > 0 && cpassword == password) {
                    $.ajax({
                         url: "password-reset",
                         method: "post",
                         data: {
                              email: email,
                              password: password
                         },
                         success: function(res) {
                              if (res == "true") {
                                   $(".modal-title").text("Message");
                                   $(".modal-body").text("Password has been Reset");
                                   $("#myModal").show();
                                   // window.location.href="<?= base_url() ?>";
                              } else {
                                   $(".password-hide").addClass("d-none");
                                   $(".error").text("Please enter correct user email");
                              }
                         }
                    })
               }

          });
     });
</script>